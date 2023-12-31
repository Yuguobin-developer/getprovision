<?php

namespace AC\ListScreenFactory;

use AC\ListScreen;
use DateTime;

trait ListSettingsTrait {

	private function add_settings( ListScreen $list_screen, array $settings ): ListScreen {
		$columns = $settings['columns'] ?? [];
		$preferences = $settings['preferences'] ?? [];
		$group = $settings['group'] ?? '';
		$date = $settings['date'] ?? new DateTime();

		if ( is_string( $date ) ) {
			$date = DateTime::createFromFormat( 'Y-m-d H:i:s', $date );
		}

		$list_screen->set_title( $settings['title'] ?? '' );
		$list_screen->set_layout_id( $settings['list_id'] ?? '' );
		$list_screen->set_preferences( $preferences ?: [] );
		$list_screen->set_settings( $columns ?: [] );
		$list_screen->set_updated( $date );

		if ( $group ) {
			$list_screen->set_group( $group );
		}

		return $list_screen;
	}

}