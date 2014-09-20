<div id='news_column'>
	<div id='site_register'>
		<?php echo $this->html->link(
			$this->html->image("/img/prize_news/join_big.png",
				array('alt'=>'Join The Club', 'title'=>'Join The Club', 'style'=>'width:100%')),
			$this->html->url(array("controller"=>"users","action"=>"register")), array('escape' => false)); ?>
	</div>
<?php
echo $this->element("winners_preview");
?>
</div>
<div id='site_overview'>
	<h2>Thank you for visiting the Metropolis Members Club beta homepage and <b>welcome</b>!</h2>
	<p>You're probably interested in winning a pair of United direct flights to America or Asia, so read on...</p>
	<p><b>Over the coming months, Metropolis Members Club aims to:</b></p>
	<ul>
		<li>regularly give away fantastic prizes*
		<li>become a lifestyle hub to connect you to special offers and discounts from our MMC partners
		<li>organize exclusive events for you and your friends and family in MMC
	</ul>
	<p>As Metropolis Members Club evolves with your help, we hope to add to this list of benefits to ensure you <b>Love Living in Tokyo</b>.</p>
	<p>Right now, MMC is in its infancy, and we need you to evaluate the registration process and give feedback on what you want the Metropolis Members Club to be and what you want it to do for you. For your chance to win the pair of tickets from United, you need only register on this website. That's it, and best of all, it's <b>free</b>!</p>
	<p>Registration only takes a few moments, and we require only your name and a valid email address. Use the <a href="http://metropolis.co.jp/metropolis-members-club-bug-report/">FEEDBACK</a> button in the menu bar to report problems or bugs, or give suggestions for future MMC developments.</p>
	<p>After completing the registration, we will send you a unique MMC card which will allow you to start enjoying benefits from our listed <?php echo $this->html->link("PARTNERS", "/partners"); ?> right away.</p>
	<p>Thank you for your time. We look forward to meeting you at future MMC events!</p>
	<p>* <span style="color: silver; font-size: 0.85em;">The Metropolis Members Club is open to all. Residents of Japan are eligible for prize giveaways. Metropolis employees and their family members are ineligible for prizes.</span></p>
</div>
