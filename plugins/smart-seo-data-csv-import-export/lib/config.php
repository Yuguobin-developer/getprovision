<?php
$upload_dir = wp_upload_dir();
set_time_limit(0);

// the total # of posts to export in 1 iteration
define( 'FL_SEO_BATCH_EXPORT_SIZE', 50 );
// the total # of posts to import in a single iteration
define( 'FL_SEO_BATCH_IMPORT_SIZE', 10 );
define( 'FL_UPLOADS', $upload_dir['basedir'] );
define( 'FL_UPLOADS_BASE_URL', $upload_dir['baseurl'] );
define( 'FL_SEO_PLUGIN_FILE', 'smart-seo-data-csv-import-export/smart-seo-data-csv-import-export.php' );
define( 'FL_SEO_LICENSE_MANAGER', "http://www.freddielore.com/plugin-api/smart-seo-data-csv-import-export/license/license.php" );
define( 'FL_SEO_VERSION', '7.1.0' );
define( 'FL_SEO_SLUG', plugin_basename(__FILE__) ); 
define( 'FL_SEO_UPDATE_URL', 'http://www.freddielore.com/plugin-api/smart-seo-data-csv-import-export/smart-seo-data-csv-import-export.php' );
define( 'FL_SEO_PLUGIN_PATH', plugin_dir_url( __FILE__ ) );

// Google Drive
define( 'SMARTSEO_LIB_PATH', dirname( __FILE__ ) . '/' );
define( 'SMARTSEO_CLIENTID', '673153745747-jskque8qn3idc14l9o2v9r344ggucj4t.apps.googleusercontent.com' );
define( 'SMARTSEO_CLIENTSECRET', 'TgwBMdzL7u7-l8JuyukMoQvQ' );
define( 'SMARTSEO_REDIRECT', 'http://atomicwebdesign.com.au/plugin-api/oauth2callback.php' );
define( 'SMARTSEO_SCOPE', 'https://www.googleapis.com/auth/drive.file' ); // Readonly scope.
define( 'SMARTSEO_DEV_KEY', '' );

define( 'SMARTSEO_STORE_URL', 'https://labs.freddielore.com/smart-seo-data-csv-import-export/' );
define( 'SMARTSEO_PRODUCT_NAME', 'Smart SEO Data CSV Import/Export' );