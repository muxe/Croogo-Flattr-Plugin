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
	 * Called after LayoutHelper::nodeMoreInfo()
	 *
	 * @return string
	 */
	public function afterNodeMoreInfo() {
		$uid = Configure::read('Flattr.uid');
		if (!empty($uid)){
			$node_types = explode(',', Configure::read('Flattr.node_types'));
			if(in_array($this->Layout->node('type'), $node_types)) {
				$ret = '<div class="flattr">';
				$ret .= $this->Flattr->button(array(
	        		'title' => $this->Layout->node('title'),
	        		'desc' => $this->Layout->node('excerpt'),
	        		'uid' => $uid,
	        		'cat' => Configure::read('Flattr.category'),
	        		'compact' => Configure::read('Flattr.compact'),
	        		'hidden' => Configure::read('Flattr.hidden'),
	        		'url' => Router::url($this->Layout->node('path'), true)
				));
				$ret .= '</div>';
				return $ret;
			}
		} else {
			$ret = '<div class="flattr">';
			$ret .= 'Please configure Flattr in the admin section';
			$ret .= '</div>';
			return $ret;
		}
	}
}
?>