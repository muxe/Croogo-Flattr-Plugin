<?php
	$config['Flattr'] = array(
		/*
		 * Flattr Helper Settings
		 * see app/pluginsflattr/views/helpers/flattr.php for descriptions
		 */
		'uid' => '',
		'lang' => 'en_GB',
		'compact' => true,
		'hidden' => false,
		
		/*
		 * Flattr Plugin Settings
		 */
	
		/*
		 * Flattr Buttons are shown below nodes of the following types
		 * with the according flattr category
		 * $node_types[<node_type>][<flattr_category>]
		 */
		'node_types' => array(
			'blog' => 'text'
		),
	);
?>