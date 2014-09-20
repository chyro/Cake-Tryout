<?php if (empty($user)){
	echo $this->Form->create('User');
	echo $this->Form->input('user');
	echo $this->Form->input('password');
	echo $this->Form->end('change password');
} else { ?>
	<p>Successfully change the password (<?php echo $user["User"]["login"]; ?>).</p>
<?php }