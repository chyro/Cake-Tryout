<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		MMC - <?php echo $title_for_layout; ?>
	</title>
	<?php echo $this->Html->css('global'); ?>
	<?php //TODO: echo $this->Html->meta('icon'); ?>
	<style>
	/*
	Styles for the menu
	*/

	.menu{
		clear:both;
		text-align:center;
		margin-top:10px;
		height:50px;
	}
	.menu img{
		border:0;
	}
	</style>
	<?php echo $this->Html->css('login'); ?>
	<?php echo $this->Html->css('front'); ?>
</head>
<body>
<div class="main dropshadow">
	<div class="title">
		<?php echo $this->html->image("/img/Logo.png",array("style"=>"width:100%;height:100px;")); //TODO: no style here! ?>
		<div class="login_shortcut"><div class='login_form'>
			<?php
				echo $this->element("login");
			?>
		</div></div>
	</div>
	<div class="top_banner"><div class="rotating">
		<?php echo $this->html->image("/img/Banner.jpeg",array("style"=>"width:750px;height:270px")); //TODO: no style here! ?>
	</div></div>
	<div class="menu">
<?php
		//TODO: Restore the hover function
		$menu_links = array();
		$menu_links[] = $this->html->link(
			$this->html->image("/img/menu/Home.png",array('alt'=>'Home', 'title'=>'Home')),
			"/", array('escape' => false));
		$menu_links[] = $this->html->link(
			$this->html->image("/img/menu/My Account.png",array('alt'=>'My Account', 'title'=>'My Account')),
			array("controller"=>"users","action"=>"profile"), array('escape' => false));
		$menu_links[] = $this->html->link(
			$this->html->image("/img/menu/Join The Club.png",array('alt'=>'Join The Club', 'title'=>'Join The Club')),
			array("controller"=>"users","action"=>"register"), array('escape' => false));
		$menu_links[] = $this->html->link(
			$this->html->image("/img/menu/Discounts.png",array('alt'=>'Discounts', 'title'=>'Discounts')),
			"/partners", array('escape' => false));
		$menu_links[] = $this->html->link(
			$this->html->image("/img/menu/Prizes.png",array('alt'=>'Prizes', 'title'=>'Prizes')),
			array("controller"=>"winners"), array('escape' => false));
		$menu_links[] = $this->html->link(
			$this->html->image("/img/menu/Feedback.png",array('alt'=>'Feedback', 'title'=>'Feedback')),
			"http://metropolis.co.jp/metropolis-members-club-bug-report/", array('escape' => false));
		echo implode($this->html->image("/img/menu/spacer.png",array("alt"=>" | ")),$menu_links);
?>
	</div>

	<div class="page_content">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
	</div>
	<div class='border_cleaner'>&nbsp;</div>

	<div class="footer">
		Metropolis Member Club (C) 2013. Japan Partnership Inc All rights reserved. Thank you for visiting.
		<?php echo $this->html->link("Disclaimer",array('controller' => 'pages', 'action' => 'display', 'disclaimer')); ?>
		|
		<?php echo $this->html->link("Privacy Policy",array('controller' => 'pages', 'action' => 'display', 'privacy')); ?>
		|
		<?php echo $this->html->link("Terms of Use",array('controller' => 'pages', 'action' => 'display', 'terms')); ?>
	</div>

</div>

<div class='border_cleaner'>&nbsp;</div>
<?php //echo $this->element('sql_dump'); ?>
<div class='border_cleaner'>&nbsp;</div>

<!-- Page count scripts -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-7090437-3");
pageTracker._trackPageview();
</script>

</body>
</html>
