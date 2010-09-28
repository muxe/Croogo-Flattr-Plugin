<?php
	Router::connect('/admin/flattr/settings', array(
	    'plugin' => 'flattr',
	    'controller' => 'flattr',
	    'action' => 'settings',
		'admin' => true,
	));
?>