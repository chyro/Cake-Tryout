<?php

class WinnersController extends AppController {

	public function index() {
		$this->set('winners', $this->Winner->findWinners());
		$this->set('upcoming', $this->Winner->findUpcoming());
	}

	//TODO: Create a "Sponsors" table, use that here

	public function preview() {
		//$this->set('winners', $this->Winner->findWinners(2));
		//$this->set('upcoming', $this->Winner->findUpcoming());
		if (empty($this->request->params['requested']))
			throw new ForbiddenException();
		return array($this->Winner->findWinners(2), $this->Winner->findUpcoming());

	}

	// Admin functions routed to /admin (scaffolded):
	//- add winner ($date, $name, $prize, $sponsor)
	//- set upcoming prize
}
