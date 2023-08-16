<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              carbonbetter.com
 * @since             1.0.0
 * @package           Carbon_Better
 *
 * @wordpress-plugin
 * Plugin Name:       Carbon Better
 * Plugin URI:        carbonbetter.com
 * Description:       General Purpose CarbonBetter Helper files and utilities
 * Version:           1.0.0
 * Author:            Nick Mendoza
 * Author URI:        carbonbetter.com
 * License:           proprietary
 * Text Domain:       carbon-better
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('CARBON_BETTER_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-carbon-better-activator.php
 */
function activate_carbon_better()
{
    require_once plugin_dir_path(__FILE__).'includes/class-carbon-better-activator.php';
    Carbon_Better_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-carbon-better-deactivator.php
 */
function deactivate_carbon_better()
{
    require_once plugin_dir_path(__FILE__).'includes/class-carbon-better-deactivator.php';
    Carbon_Better_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_carbon_better');
register_deactivation_hook(__FILE__, 'deactivate_carbon_better');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__).'includes/class-carbon-better.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_carbon_better()
{

    $plugin = new Carbon_Better();
    $plugin->run();

}

/**
 * Runs the initial function that sets everything up.
 */
run_carbon_better();

function carbon_better_add_cognito_forms_vars(array $vars): array
{
    $vars[] = 'form';
    $vars[] = 'first-name';
    $vars[] = 'last-name';
    $vars[] = 'email';

    return $vars;
}
add_filter('query_vars', 'carbon_better_add_cognito_forms_vars');

/**
 * Parses and formats URL requests for cognitoforms.
 */
function carbon_better_redirect_cognito_forms(): void
{
    global $wp;

    if (stripos("/{$wp->request}/", '/carbon-better-builder/') !== false) {

        $form = urldecode(get_query_var('form'));
        $firstName = urldecode(get_query_var('first-name'));
        $lastName = urldecode(get_query_var('last-name'));
        $email = urldecode(get_query_var('email'));
        $entry = [
            'LetsPlantATreeTogether' => [
                'Name' => [
                    'First' => $firstName,
                    'Last' => $lastName,
                ],
                'Email' => $email,
            ],
        ];
        $entryFormatted = json_encode($entry);

        $queryString = http_build_query([
            'entry' => $entryFormatted,
        ]);
        $url = 'https://www.cognitoforms.com/EEG6/ProvisionRetailLeadCaptureForm?' . $queryString;

        wp_redirect($url);
        die;

//        wp_die($url);
//        wp_die("<pre>" . print_r(['form' => $form, 'firstname' => $firstName, 'lastname' => $lastName, 'email' => $email], true) . "</pre>");

    }
}
add_action('wp_head', 'carbon_better_redirect_cognito_forms');
