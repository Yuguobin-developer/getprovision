<?php 
if (!class_exists('FL_Google_API')) {
	class FL_Google_API extends FL_SEO_CSV_Import_Helper{
		
		// the google service client
		public $gclient;

		public $gdrive;

		// defaults
		public function __construct() {
			if( is_admin() ){

				if ( ! class_exists( 'SmartSEO_Google_Client' ) ) {
					require_once SMARTSEO_LIB_PATH . 'Google/Client.php';
					require_once SMARTSEO_LIB_PATH . 'Google/Service/Drive.php';

				}

				$this->gclient = new SmartSEO_Google_Client();
				$this->gclient->setApprovalPrompt( 'force' );
				$this->gclient->setAccessType( 'offline' );

				$this->gclient->setClientId( SMARTSEO_CLIENTID );
				$this->gclient->setClientSecret( SMARTSEO_CLIENTSECRET );
				$this->gclient->setRedirectUri( SMARTSEO_REDIRECT );
				$this->gclient->setDeveloperKey( SMARTSEO_DEV_KEY );

				$this->gclient->setScopes( SMARTSEO_SCOPE );

				try {

					$this->smartseo_connect();

					$this->gdrive = new SmartSEO_Google_Service_Drive( $this->gclient );

					// This function refresh token and use for debugging
					//$this->gclient->refreshToken( $this->token->refresh_token );


				} 

				catch ( SmartSEO_Google_IO_Exception $e ) {
					// echo sprintf( esc_html__( '%1$s Oops, it appears that you are offline. %2$s %5$s %2$s %3$s Don\'t worry, This error message is only visible to Administrators. %4$s %2$s ', 'smartseo' ), '<br /><br />', '<br />', '<i>', '</i>', esc_textarea( $e->getMessage() ) );
				}

				catch ( SmartSEO_Google_Service_Exception $e ) {

					// Show error message only for logged in users.
					if ( current_user_can( 'manage_options' ) ) {
						// echo sprintf( esc_html__( '%1$s Oops, Something went wrong. %2$s %5$s %2$s %3$s Don\'t worry, This error message is only visible to Administrators. %4$s %2$s ', 'smartseo' ), '<br /><br />', '<br />', '<i>', '</i>', esc_textarea( $e->getMessage() ) );
					}
				} 
				catch ( SmartSEO_Google_Auth_Exception $e ) {
					// Show error message only for logged in users.
					if ( current_user_can( 'manage_options' ) ) {

						// echo sprintf( esc_html__( '%1$s Oops, Try to %2$s Reset %3$s Authentication. %4$s %7$s %4$s %5$s Don\'t worry, This error message is only visible to Administrators. %6$s %4$s', 'smartseo' ), '<br /><br />', '<a href=' . esc_url( admin_url( 'options-general.php?page=fl-seo-data-csv&tab=csv_export' ) ) . 'title="Reset">', '</a>', '<br />', '<i>', '</i>', esc_textarea( $e->getMessage() ) );
					}
				}

				add_action( 'wp_ajax_is_google_authenticated', array(&$this, 'fl_google_authentication_check'));
				add_action( 'wp_ajax_export_to_drive', array(&$this, 'fl_google_export_to_drive'));

			}
		}

		/**
		 * Connect with Google Drive API and get authentication token and save it.
		 */

		public function smartseo_connect() {

			$ga_google_authtoken = get_option( 'smartseo_google_access_token' );
			$token = NULL;

			if ( empty( $ga_google_authtoken ) ) {

				$auth_code = '';
				
				if( isset( $_GET['code'] ) ){
					$auth_code = urldecode( $_GET['code'] );
				}

				if ( empty( $auth_code ) ) { 
					return false; 
				}

				try {
					$access_token = $this->gclient->authenticate( $auth_code );
				} 
				catch ( Exception $e ) {
					// echo 'SmartSEO (Bug): ' . esc_textarea( $e->getMessage() );
					return false;
				}

				if ( $access_token ) {

					$this->gclient->setAccessToken( $access_token );

					$token = json_decode( $this->gclient->getAccessToken() );

					update_option( 'smartseo_google_access_token', $access_token );
					update_option( 'smartseo_google_refresh_token', $token->refresh_token );

					return true;
				} 
				else {

					return false;
				}
			} 
			else {
				
				$this->gclient->setAccessToken( $ga_google_authtoken );

				if( $this->gclient->isAccessTokenExpired() ){

					$refresh_token = get_option( 'smartseo_google_refresh_token' );
					if ( !empty( $refresh_token ) ) {
						$this->gclient->refreshToken( get_option( 'smartseo_google_refresh_token' ) );
					}
				}
			}

			$this->token = $token;

			return true;
		}

		public function fl_google_authentication_check(){

			$google_link = sprintf( '%s&next=%s&state=%s',
										$this->gclient->createAuthUrl(),
										$this->base64url_encode( get_admin_url() . 'options-general.php?page=fl-seo-data-csv&tab=csv_export&file=' . $_POST['file'] ),
										$this->base64url_encode( get_admin_url() . 'options-general.php?page=fl-seo-data-csv&tab=csv_export&file=' . $_POST['file'] ) );

			$resp = array( 
				'code' => 403,
				'message' => 'Invalid operation',
				'next' => $google_link
			);

			if ($_SERVER['REQUEST_METHOD'] === 'POST') {

				$google_authtoken = get_option( 'smartseo_google_access_token' );

				if ( empty( $google_authtoken ) ) {
					$resp['code'] = 403;
					$resp['message'] = 'No token exists';
				} 
				else { 

					try {
						if( $this->gclient->isAccessTokenExpired() ) {
							
							$resp['code'] = 403;
							$resp['message'] = 'Token has expired';

							$refresh_token = get_option( 'smartseo_google_refresh_token' );
							if ( !empty( $refresh_token ) ) {
								$this->gclient->refreshToken( get_option( 'smartseo_google_refresh_token' ) );
								$resp['code'] = 200;
								$resp['message'] = 'Token has been refreshed';
								$resp['next'] = 'proceed';
							}
							
						}
						else{
							$resp['code'] = 200;
							$resp['message'] = 'Token is valid';
							$resp['next'] = 'proceed';
						}
					} 
					catch ( Exception $e ) {
						$resp['code'] = 500;
						$resp['message'] = 'Something is not right. ' . $e->getMessage();
					}
				}
			}

			wp_send_json( $resp );

		}

		public function fl_google_export_to_drive(){
			$resp = array( 
				'code' => 403,
				'message' => 'Invalid operation',
				'next' => ''
			);

			if ($_SERVER['REQUEST_METHOD'] === 'POST') {

				try {

					//$this->smartseo_connect();

					// echo '<pre>';
					// print_r( $this->gclient );
					// echo '</pre>';

					$metadata = new SmartSEO_Google_Service_Drive_DriveFile(
						array(
					    	'name' => sanitize_title( $_POST['path'] ),
					    	'mimeType' => 'application/vnd.google-apps.spreadsheet'
					    )
					);

					$metadata->setTitle( sanitize_title( $_POST['path'] ) );

					$content = file_get_contents( $_POST['path'] );

					if( $content ){
						$file = $this->gdrive->files->insert( $metadata, array(
						    'data' => $content,
						    'mimeType' => 'text/csv',
						    'uploadType' => 'multipart') );

						// echo '<pre>';
						// print_r( $file );
						// echo '</pre>';

						if( $file ){
							$resp['file'] = $file->alternateLink;
							$resp['message'] = 'Success!';
							$resp['code'] = 200;
						}
					}
					else{
						$resp['message'] = 'Empty file!';
					}

				} 
				catch ( Exception $e ) {
					$resp['code'] = 500;
					$resp['message'] = 'Something is not right. ' . $e->getMessage();
				}
			}

			wp_send_json( $resp );
		}
	}
}

global $pagenow;

new FL_Google_API();
?>