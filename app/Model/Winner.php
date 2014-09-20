<?php
App::uses('AppModel', 'Model');
/**
 * Winner Model
 *
 */
class Winner extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	public function findWinners($max=0) {
		$options = array(
			"order"=>"Winner.date DESC",
			"conditions"=>array(
				"Winner.name !="=>null,
				"Winner.date !="=>null,
				"Winner.date <= NOW()"
			)
		);
		if($max) $options['limit'] = $max;
        return $this->find('all',$options);
	}

	public function findUpcoming($max=0) {
		$options = array(
			"order"=>"Winner.date DESC",
			"conditions"=>array("OR"=>array(
				"Winner.name"=>null,
				"Winner.date"=>null,
				"Winner.date > NOW()"
			))
		);
		if($max) $options['limit'] = $max;
        return $this->find('all',$options);
	}

}
