<?php
/**
 * Flattr Helper
 *
 * Helps including a Flattr Button.
 * For Autosubmit the following is needed: uid, title, desc, category
 * 
 * Tested on Cake 1.3.3
 * Uses Flattr Api 0.5.0
 * See https://flattr.com/support/integrate/js for more Info on Flattr Api
 * 
 * example usage:
 * 
 * <?php echo $this->Flattr->button(array(
 * 	'uid' => '12345678'
 * 	'title' => $blog['Blog']['title'], 
 * 	'desc' => $blog['Blog']['description'], 
 * 	'tags' => array('cake', 'php', 'rocks'),
 * 	'lang' => 'de_DE',
 * 	'cat' => 'video',
 * 	'compact' => true,
 * 	'hidden' => true
 * )); ?>
 *
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @version       $1.0$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
class FlattrHelper extends Helper {
	
	/**
	 * Insert your username or userid here or pass it in the options array
	 * @var string
	 */
	var $uid = '';
	
	/**
	 * The default language
	 * for all languages see: http://api.flattr.com/odapi/languages/human
	 * @var string
	 */
	var $lang = 'en_GB';
	
	/**
	 * The default Category
	 * for all categories see: http://api.flattr.com/odapi/categories/human
	 * @var string
	 */
	var $cat = 'text';
	
	/**
	 * The title
	 * atleast 5 characters in length
	 * up to 100 characters
	 * @var string
	 */
	var $title = '';
	
	/**
	 * The description
	 * atleast 5 characters in length
	 * up to 1000 characters
	 * BR is allowed
	 * @var string
	 */
	var $desc = '';
	
	/*
	 * We need the Html helper for the script and the link
	 */
	var $helpers = array('Html');

	/**
	 * Creates a Flattr Button
	 * 
	 * $options['url']
	 * 		Needed: The URL string (defaults to the current URL)
	 * $options['uid']
	 * 		Needed: Your username or userid
	 * $options['title']
	 * 		Needed: The Title
	 * 			atleast 5 characters in length
	 * 			up to 100 characters
	 * $options['desc']
	 * 		Needed: The Description
	 *			atleast 5 characters in length
	 * 			up to 1000 characters
	 * $options['cat']
	 * 		The category (http://api.flattr.com/odapi/categories/human)
	 * $options['lang']
	 * 		The language (http://api.flattr.com/odapi/languages/human)
	 * $options['tags']
	 * 		array of Tags (array('cake', 'php', 'rocks'))
	 * $options['compact']
	 * 		boolean if a compact button should be used
	 * $options['hidden']
	 * 		boolean if you want this to be hidden from public listing
	 *
	 * 
	 * @param mixed $options Options Array
	 */
	function button($options = array()) {
		
		//include the loader in $scripts_for_layout
		$this->Html->scriptBlock("
			/* <![CDATA[ */
			    (function() {
			        var s = document.createElement('script'), t = document.getElementsByTagName('script')[0];
			        
			        s.type = 'text/javascript';
			        s.async = true;
			        s.src = 'http://api.flattr.com/js/0.5.0/load.js?mode=auto';
			        
			        t.parentNode.insertBefore(s, t);
			    })();
			/* ]]> */",
			array('inline' => false)
		);
		
		//set default values
		if (!isset($options['uid'])) {
			$options['uid'] = $this->uid;
		}
		if (!isset($options['lang'])) {
			$options['lang'] = $this->lang;
		}
		if (!isset($options['cat'])) {
			$options['cat'] = $this->cat;
		}
		if (!isset($options['title'])) {
			$options['title'] = '';
		}
		if (!isset($options['desc'])) {
			$options['desc'] = '';
		}
		if (!isset($options['url'])) {
			$options['url'] = Router::url($this->here, true);
		}
		
		//build the rev string
		$rev = 'flattr;uid:' . $options['uid'] . ';language:' . $options['lang'] . ';category:' . $options['cat'] . ';';
		//add optional options to rev
		if (isset($options['tags']) && is_array($options['tags'])) {
			$rev .= 'tags:' . implode(',', $options['tags']) . ';';
		}
		if (isset($options['hidden']) && $options['hidden']) {
			$rev .= 'hidden:1;';
		}
		if (isset($options['compact']) && $options['compact']) {
			$rev .= 'button:compact;';
		}
		//build and return the link
		return $this->Html->link($options['desc'], $options['url'], array('class' => "FlattrButton", 'style' => "display:none;", 'title' => $options['title'], 'rev' => $rev));
	}
}