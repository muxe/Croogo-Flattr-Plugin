<?php
class FlattrActivation {
/**
 * onActivate will be called if this returns true
 *
 * @param  object $controller Controller
 * @return boolean
 */
    public function beforeActivation(&$controller) {
        return true;
    }
/**
 * Called after activating the plugin in ExtensionsPluginsController::admin_toggle()
 *
 * @param object $controller Controller
 * @return void
 */
    public function onActivation(&$controller) {
    	$controller->Setting->write('Flattr.uid', '');
    	$controller->Setting->write('Flattr.compact', false);
    	$controller->Setting->write('Flattr.hidden', false);
    	$controller->Setting->write('Flattr.lang', 'en_GB');
    	$controller->Setting->write('Flattr.category', 'text');
    	$controller->Setting->write('Flattr.node_types', '');
    }
/**
 * onDeactivate will be called if this returns true
 *
 * @param  object $controller Controller
 * @return boolean
 */
    public function beforeDeactivation(&$controller) {
        return true;
    }
/**
 * Called after deactivating the plugin in ExtensionsPluginsController::admin_toggle()
 *
 * @param object $controller Controller
 * @return void
 */
    public function onDeactivation(&$controller) {
    	$controller->Setting->deleteKey('Flattr.uid');
    	$controller->Setting->deleteKey('Flattr.compact');
    	$controller->Setting->deleteKey('Flattr.hidden');
    	$controller->Setting->deleteKey('Flattr.lang');
    	$controller->Setting->deleteKey('Flattr.category');
    	$controller->Setting->deleteKey('Flattr.node_types');
    }
}
?>