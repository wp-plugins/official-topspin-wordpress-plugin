<?php

### Hooks
register_activation_hook(TOPSPIN_PLUGIN_FILE,'topspin_activate');
register_deactivation_hook(TOPSPIN_PLUGIN_FILE, 'topspin_deactivate');

### Functions
function topspin_run_sql_file($filename) {
	$file = TOPSPIN_PLUGIN_PATH.'/sql/'.$filename;
	if(file_exists($file)) {
		global $wpdb;
		ob_start();
		include($file);
		$sql = ob_get_contents();
		ob_end_clean();
		$wpdb->query($sql);
	}
}

function topspin_activate() {
	##	Create Tables
	topspin_run_sql_file('topspin_currency.sql');
	topspin_run_sql_file('topspin_currency_insert.sql');
	topspin_run_sql_file('topspin_items.sql');
	topspin_run_sql_file('topspin_items_tags.sql');
	topspin_run_sql_file('topspin_offer_types.sql');
	topspin_run_sql_file('topspin_offer_types_insert.sql');
	topspin_run_sql_file('topspin_settings.sql');
	topspin_run_sql_file('topspin_stores.sql');
	topspin_run_sql_file('topspin_stores_offer_type.sql');
	topspin_run_sql_file('topspin_stores_tag.sql');
	topspin_run_sql_file('topspin_tags.sql');
	
	##	Activate Cron
	wp_schedule_event(time(),'every_5_min','topspin_cron_fetch_items');

}

function topspin_deactivate() {
	wp_clear_scheduled_hook('topspin_cron_fetch_items');
}

?>