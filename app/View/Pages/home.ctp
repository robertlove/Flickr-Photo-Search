<?php echo $this->Form->create('Photo', array('type' => 'get', 'action' => 'search')); ?>
<div data-role="fieldcontain">
    <?php echo $this->Form->input('text', array('label' => false, 'placeholder' => __('Search for photos on Flickr...', true), 'type' => 'search', 'div' => false)); ?>
</div>
<div data-role="fieldcontain">
    <?php echo $this->Form->submit(__('Search', true), array('div' => false)); ?>
</div>
<?php echo $this->Form->end(); ?>