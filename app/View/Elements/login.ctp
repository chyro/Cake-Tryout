<?php
	if(isset($Auth) && $Auth->loggedIn()){//Do not allow re-login
?>
<p>You are logged in as <?php echo $Auth->user('login'); ?>.<br/>
	<?php echo $this->html->link(
		$this->html->image("/img/btn_logout.png", array('alt'=>'logout', 'title'=>'logout')),
		array("controller"=>"users", "action"=>"logout"), array('escape'=>false));?>
</p>
<?php
} else {
	echo $this->Form->create('User', array('controller' => 'users', 'action' => 'login'));
	echo $this->Form->input('login', array("size"=>33, "maxlength"=>32, "style"=>"width:150px;float:right;margin-bottom:7px;margin-left:5px;"));
	echo $this->Form->input('password', array("size"=>33, "maxlength"=>32, "style"=>"width:150px;float:right;margin-bottom:7px;margin-left:5px;", "value"=>""));
?>
	<p>Not a member?<br/>
		<a href="<?php echo $this->html->url(array("controller"=>"users","action"=>"register")); ?>">
			Register here!</a></p>
<?php
	echo $this->Form->submit("/img/btn_login.png");
	echo $this->Form->end();
}
