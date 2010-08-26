<?php
/**
 * FlattrHook Helper
 *
 * Flattr Hook, hooks in and renders a nice flattr button
 * 
 */
class FlattrHookHelper extends AppHelper {
	/**
	 * Other helpers used by this helper
	 *
	 * @var array
	 * @access public
	 */
	public $helpers = array(
        'Layout',
    	'Flattr.Flattr',
	);
	/**
	 * Called after activating the hook in ExtensionsHooksController::admin_toggle()
	 *
	 * @param object $controller Controller
	 * @return void
	 */
	public function onActivate(&$controller) {
	}
	/**
	 * Called after deactivating the hook in ExtensionsHooksController::admin_toggle()
	 *
	 * @param object $controller Controller
	 * @return void
	 */
	public function onDeactivate(&$controller) {
	}

	/**
	 * Called after LayoutHelper::nodeMoreInfo()
	 *
	 * @return string
	 */
	public function afterNodeMoreInfo() {
		Configure::load('flattr.flattr');
		$node_types = Configure::read('Flattr.node_types');
		if(array_key_exists($this->Layout->node('type'), $node_types)) {
			return $this->Flattr->button(array(
        		'title' => $this->Layout->node('title'),
        		'desc' => $this->Layout->node('excerpt'),
        		'uid' => Configure::read('Flattr.uid'),
        		'cat' => $node_types[$this->Layout->node('type')],
        		'compact' => Configure::read('Flattr.compact'),
        		'hidden' => Configure::read('Flattr.hidden'),
        		'url' => Router::url($this->Layout->node('path'), true)
			));
		}
	}
}
?>