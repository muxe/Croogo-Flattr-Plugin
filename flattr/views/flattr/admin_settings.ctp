<div class="flattr_settings">
	<h2><?php echo $title_for_layout; ?></h2>
	<?php 
		echo $this->Form->create('Settings', array('url' => array(
		    'plugin' => 'flattr',
		    'controller' => 'flattr',
		    'action' => 'settings',
			'admin' => true,
		))); 
	?>
	<?php echo $this->Form->input('uid', array('value' => Configure::read('Flattr.uid'), 'label' => 'UID')); ?>
	<?php 
		if (Configure::read('Flattr.compact')) {
			echo $this->Form->input('compact', array('label' => 'Compact Button', 'type' => 'checkbox', 'checked' => 'checked'));
		} else {
			echo $this->Form->input('compact', array('label' => 'Compact Button', 'type' => 'checkbox'));
		}
	?>
	<?php 
		if (Configure::read('Flattr.hidden')) {
			echo $this->Form->input('hidden', array('label' => 'Hidden (from listing on flattr.com)', 'type' => 'checkbox', 'checked' => 'checked'));
		} else {
			echo $this->Form->input('hidden', array('label' => 'Hidden (from listing on flattr.com)', 'type' => 'checkbox'));
		}
	?>
	<?php echo $this->Form->input('lang', array('options' => $langs, 'selected' => Configure::read('Flattr.lang'), 'label' => 'Language of content')); ?>
	<?php echo $this->Form->input('category', array('options' => $categories, 'selected' => Configure::read('Flattr.category'), 'label' => 'Category of content')); ?>
	<?php echo $this->Form->input('node_types', array('options' => $types, 'selected' => explode(',', Configure::read('Flattr.node_types')), 'label' => 'Display Button for these Content Types (press and hold ctrl to select multiple)', 'multiple' => 'multiple')); ?>
	<?php echo $this->Form->end('save'); ?>
</div>