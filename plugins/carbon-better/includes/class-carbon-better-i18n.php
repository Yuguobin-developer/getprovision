<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       carbonbetter.com
 * @since      1.0.0
 *
 * @package    Carbon_Better
 * @subpackage Carbon_Better/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Carbon_Better
 * @subpackage Carbon_Better/includes
 * @author     Nick Mendoza <nick@carbonbetter.com>
 */
class Carbon_Better_i18n
{
    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0.0
     */
    public function load_plugin_textdomain()
    {

        load_plugin_textdomain(
            'carbon-better',
            false,
            dirname(dirname(plugin_basename(__FILE__))).'/languages/'
        );

    }


}
