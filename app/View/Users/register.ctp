<?php echo $this->Html->css('register'); ?>
<div class="register">
	<div class="title">Register</div>
<div class="registration_form">
<?php
	if($Auth->loggedIn()){ //Do not allow re-register
?>
<p>You are logged in as <?php echo $Auth->user('login'); ?>. Multiple accounts are not allowed.<br/>
	<?php echo $this->html->link(
		$this->html->image("/img/btn_logout.png", array('alt'=>'logout', 'title'=>'logout')),
		array("controller"=>"users", "action"=>"logout"), array('escape'=>false));?>
</p>
<?php
} else {
	echo $this->Form->create('User', array('controller' => 'users', 'action' => 'register'));
	echo $this->Form->input('login');
	echo $this->Form->input('first_name');
	echo $this->Form->input('last_name');
	echo $this->Form->input('email');

	?><div style="visibility:hidden;height:0;"><?php echo $this->Form->input('name');//honeypot ?> </div><?php

	echo $this->Form->end('register');
}
?>
</div>
</div>