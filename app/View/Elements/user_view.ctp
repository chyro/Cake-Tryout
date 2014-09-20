<?php
if (!isset($user) || !$user) throw new NotFoundException(__('No user provided'));
if (is_array($user) && array_key_exists("User", $user)) $user = $user['User'];
if (is_array($user)) $user = json_decode(json_encode($user), false);
?>
<div class="user_view">
<div class="unfo_col">
	<h2>User Overview</h2>
	<div class="unfo_col user_identity"><ul>
		<li><?php echo $this->html->image("/img/default_avatar.png", array('alt'=>$user->login)); ?>
		<li><span class="login"><?php echo($user->first_name." ".$user->last_name); ?></span>
	</ul></div>
<div class="unfo_col user_data"><ul>
	<li class="stats">Member since <?php echo($user->created); ?>
	<?php if($user->age) echo("<li>".$user->age." y.o."); ?>
	<?php if($user->country) echo("<li>".$user->country); ?>
	<?php if($user->email) echo("<li>email: ".$user->email); ?>
	<?php if($user->address) echo("<li>Address: ".$user->address); ?>
</ul></div>
</div>
<div class="unfo_col mmc_data">
	<h2>Account Data</h2>
	<ul>
		<li><?php echo $this->html->image("/barcodes/img/".$user->card_number,array("alt"=>$user->card_number)); ?>
		<li><?php echo $user->card_number ? "Member number:" . $user->card_number : "You don't have a card number yet."; ?>
		<!-- li>MMC Level: <?php //echo($user->level_points); ?>
		<li>Current point balance: <?php //echo($user->points_balance); ?> -->
	</ul>
</div>
<div class="border_cleaner"></div>
</div>
