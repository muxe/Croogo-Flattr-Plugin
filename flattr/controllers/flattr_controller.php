<?php
	class FlattrController extends FlattrAppController {
		public $uses = array('Setting');
		
		var $langs = array(
			'sq_AL' => 'Albanian', 
			'ar_DZ' => 'Arabic',
			'be_BY' => 'Belarusian',
			'bg_BG' => 'Bulgarian',
			'ca_ES' => 'Catalan',
			'zh_CN' => 'Chinese',
			'hr_HR' => 'Croatian',
			'cs_CZ' => 'Czech',
			'da_DK' => 'Danish',
			'nl_NL' => 'Dutch',
			'en_GB' => 'English',
			'et_EE' => 'Estonian',
			'fi_FI' => 'Finnish',
			'fr_FR' => 'French',
			'de_DE' => 'German',
			'el_GR' => 'Greek',
			'iw_IL' => 'Hebrew',
			'hi_IN' => 'Hindi',
			'hu_HU' => 'Hungarian',
			'is_IS' => 'Icelandic',
			'in_ID' => 'Indonesian',
			'ga_IE' => 'Irish',
			'it_IT' => 'Italian',
			'ja_JP' => 'Japanese',
			'ko_KR' => 'Korean',
			'lv_LV' => 'Latvian',
			'lt_LT' => 'Lithuanian',
			'mk_MK' => 'Macedonian',
			'ms_MY' => 'Malay',
			'mt_MT' => 'Maltese',
			'no_NO' => 'Norwegian',
			'pl_PL' => 'Polish',
			'pt_PT' => 'Portuguese',
			'ro_RO' => 'Romanian',
			'ru_RU' => 'Russian',
			'sr_RS' => 'Serbian',
			'sk_SK' => 'Slovak',
			'sl_SI' => 'Slovenian',
			'es_ES' => 'Spanish',
			'sv_SE' => 'Swedish',
			'th_TH' => 'Thai',
			'tr_TR' => 'Turkish',
			'uk_UA' => 'Ukrainian',
			'vi_VN' => 'Vietnamese',
		);
		
		var $categories = array(
			'text' => 'Written text',
			'images' => 'Images',
			'video' => 'Video',
			'audio' => 'Audio',
			'software' => 'Software',
			'rest' => 'The rest',
		);
		
		public function admin_settings() {
			if (!empty($this->data)) {
				//debug($this->data);
				if (isset($this->data['Settings']['uid'])) {
					$this->Setting->write('Flattr.uid', $this->data['Settings']['uid']);
				}
				if (isset($this->data['Settings']['compact'])) {
					$this->Setting->write('Flattr.compact', $this->data['Settings']['compact']);
				}
				if (isset($this->data['Settings']['hidden'])) {
					$this->Setting->write('Flattr.hidden', $this->data['Settings']['hidden']);
				}
				if (isset($this->data['Settings']['lang'])) {
					$this->Setting->write('Flattr.lang', $this->data['Settings']['lang']);
				}
				if (isset($this->data['Settings']['node_types'])) {
					$this->Setting->write('Flattr.node_types', implode(',', $this->data['Settings']['node_types']));
				}
				if (isset($this->data['Settings']['category'])) {
					$this->Setting->write('Flattr.category', $this->data['Settings']['category']);
				}
				$this->Session->setFlash(__('Settings Saved', true));
			}
			
			$this->set('title_for_layout', __('Flattr Settings', true));
			$this->set('langs', $this->langs);
			$this->set('categories', $this->categories);
			$this->loadModel('Type');
			$this->set('types', $this->Type->find('list', array('fields' => array('Type.alias', 'Type.title'))));
			
		}
	}
?>