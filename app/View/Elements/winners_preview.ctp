<?php
list($winners, $upcoming) = $this->requestAction(array('controller' => 'winners', 'action' => 'preview'));
?>

<div class='silverbox' id='prizes_next'>
	<div class='title'>Upcoming Prize!</div>
<?php
$default_logo = 'img/prize_news/adidas.png'; // TODO: put in a config file somewhere
foreach($upcoming as $upcoming_item) :
	$upcoming_item = reset($upcoming_item);
	$logo = !empty($upcoming_item['logo']) ? $upcoming_item['logo'] : $default_logo;
		//UPCOMING
?>
  	<div class='content'>
		<div class="sponsor_box">
			<table><tr><td>
				<img src="<?php echo $logo; ?>" class="logo" />
			</td><td>
				One lucky MMC member will win <?php echo $upcoming_item['prize']; ?>
				courtesy of <?php echo $upcoming_item['sponsor']; ?>.</td>
			</tr></table>
			<div class="border_cleaner">&nbsp;</div>
		</div>
	</div>
	<div class="border_cleaner">&nbsp;</div>
<?php
endforeach;
?>
</div>

<div class='silverbox' id='prizes_prev'>
	<div class='title'>Previous Winners</div>
<?
foreach($winners as $winner) :
	$winner = reset($winner);
	$logo = !empty($winner['logo']) ? $winner['logo'] : $default_logo;
		$date = date("F jS, Y",strtotime($winner['date']));
		//PAST WINNER
?>
		<div class='content'>
			<div class="sponsor_box">
			  	<table><tr><td>
			  		<img src="<?php echo $logo; ?>" class="logo" />
			  	</td><td>
			  		<b>Congratulations to:</b><br/>
					<strong><?php echo $winner['name']; ?></strong><br />
					who won <?php echo $winner['prize']; ?>
					courtesy of <?php echo $winner['sponsor']; ?>.
				</td></tr></table>
				<div class="border_cleaner">&nbsp;</div>
			</div>
		</div>
<?php
endforeach;
?>
</div>
