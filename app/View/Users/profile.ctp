<div class='user_details'>
	<div class='title'>User Info</div>
<?php echo $this->element('user_view', array('user' => $user)); ?>
</div>
<div class='border_cleaner'>&nbsp;</div>
<div class='user_info_form'>
	<div class='title collapser'>Update User Data</div>
	<div class='collapsable collapsed'>
<?php
	echo $this->Form->create('User');

	echo("<p class='title'>Required information</p>\n");
	echo $this->Form->hidden('id');
	echo $this->Form->input('first_name');
	echo $this->Form->input('last_name');
	echo $this->Form->radio('gender',array('M' => 'Male', 'F' => 'Female'));
	echo $this->Form->input('age');

	echo("<p class='title'>Complimentary information</p>\n");
	echo $this->Form->radio('marital_status',array('M' => 'Married', 'S' => 'Single'));
	echo $this->Form->input('children');
	echo $this->Form->input('address');
	echo $this->Form->input('country', array('label'=>'Country of Origin'));

	echo $this->Form->end('Save Profile');
?>
	</div>
	<br/>
	<div class='title collapser'>Change password</div>
	<div class='collapsable collapsed'>
<?php
	echo $this->Form->create('User');
	echo $this->Form->hidden('id');
	echo $this->Form->input('password',array('label'=>'Password'));
	echo $this->Form->input('verify_password',array('label'=>'Verify Password', 'type'=>'password'));
	echo $this->Form->end('Change Password');
?>
	</div>
</div>
