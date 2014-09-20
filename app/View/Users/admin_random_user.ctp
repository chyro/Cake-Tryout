<h1>Random User</h1>

<p>Here is a random user, presumably the winner of the current draw.</p>

<?php echo $this->element('user_view', array('user' => array_pop($random_users))); ?>

<?php if ($random_users): ?>
<p> If that user is not good enough (e.g. that's the very guy offering the prize),
	here are a couple more: </p>
<?php while($user = array_pop($random_users))
	echo $this->element('user_view', array('user' => $user));
?>
<?php endif; ?>
