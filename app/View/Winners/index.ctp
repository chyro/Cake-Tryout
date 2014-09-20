<?php
$default_logo = '/img/prize_news/ZWIESEL.jpg'; // TODO: put in a config file somewhere
//TODO: Move the CSS to its rightful place (although I always thought it made sense to
// put the style unique to a view inside the view)
?>
<style>
	/*Page Layout*/
	ul#prizes{width:100%;margin:0px;padding:0px;list-style-type:none;}
	#prizes li{
		width:30%;margin-left:1.5%;margin-right:1.5%;float:left;height:175px;overflow:auto;
		margin-bottom:10px;
	}
	#prizes li.grand_prize{width:63%;}
	
	/*Past and future small prizes:*/
	#prizes{font:0.7em Georgia;}
	#prizes li{text-align:center;}
	#prizes li .title{
		float:left;width:95%;height:25px;
		font-size:1.2em;color:white;padding-left:5%;padding-top:7px;font-weight:bold;
		text-align:left;
	}
	#prizes li .logo{max-width:100%;max-height:80px;margin:5px 0;}
	#prizes li .desc{float:left;width:90%;margin:0 5%;text-align:left;}
	
	#prizes li.future_prize{background-color:#cccae2;}
	#prizes li.future_prize .title{background-color:#653d95;}
	#prizes li.past_prize{background-color:#f4f8f9;}
	#prizes li.past_prize .title{background-color:#95b1b6;}
	
	/*Past and future big prizes:*/
	#prizes li.grand_prize{text-align:left;position:relative}
	#prizes li.grand_prize .logo{position:absolute;bottom:10px;left:3%;max-width:20%;}
	
	#prizes li.future_prize.grand_prize{background-color:#e0e2e6;}
	#prizes li.future_prize.grand_prize .header{
		font-size:1.7em;font-weight:bold;color:#653D95;
		float:left;width:auto;margin:20px 0 0 20px;
	}
	#prizes li.future_prize.grand_prize .desc{
		font-size:2em;font-weight:bold;
		float:left;width:auto;margin:0 0 0 20px;
	}
	#prizes li.future_prize.grand_prize .footnote{font-size:1em;width:70%;position:absolute;right:5%;bottom:10px}
	#prizes li.past_prize.grand_prize{background-color:#f4f8f9;}
	#prizes li.past_prize.grand_prize .winner{font-size:3em;float:left;width:90%;margin:30px 0 0 20px;}
</style>
<ul id="prizes">
<?php
foreach($upcoming as $upcoming_item) :
	$upcoming_item = reset($upcoming_item);
	$logo = !empty($upcoming_item['logo']) ? $upcoming_item['logo'] : $default_logo;
		//UPCOMING
?>
	<li class='future_prize'>
		<span class='title'>Upcoming prize!</span>
	    <img  class='logo' src='<?php echo $this->html->url($logo); ?>' />
		<span class='desc'>One lucky MMC member will win <?php echo $upcoming_item['prize']; ?>
			courtesy of <?php echo $upcoming_item['sponsor']; ?>. </span>
	</li>
<?php
endforeach;
foreach($winners as $winner) :
	$winner = reset($winner);
	$logo = !empty($winner['logo']) ? $winner['logo'] : $default_logo;
		$date = date("F jS, Y",strtotime($winner['date']));
		//PAST WINNER
?>
	<li class='past_prize'>
		<span class='title'><?php echo $date; ?></span>
		<img  class='logo' src='<?php echo $this->html->url($logo); ?>' />
		<span class='desc'>Congratulations to <?php echo $winner['name']; ?>
			who won <?php echo $winner['prize']; ?> courtesy of <?php echo $winner['sponsor']; ?>. </span>
	</li>
<?php
endforeach;
?>
</ul>
