<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Winner $Winner
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'last_name';

	public function beforeSave($options = array()) {
		if (!empty($this->data['User']['id'])
				&& $this->data['User']['id'] != AuthComponent::user('id')
				&& AuthComponent::user('role') != "admin")
			throw new Exception("not allowed (".$this->data['User']['id']."/".AuthComponent::user('id').")");
		
		//Encrypting password (backward compatibility)
		// *** This sucks! It encodes from the scaffolded admin panel, it encodes when saving modifications to the user...
		// Plus, manual salt doesn't handle scaffolded passwords...
		if(!empty($this->data['User']['password']) && strlen($this->data['User']['password']) < 40) {
			// sha1-encrypted passwords are length 40. This check makes sure passwords are not encrypted twice.
			//Salt was hopefully added when submitted. In case of scaffold, you're in trouble.
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
			//or...
			//$this->data['User']['password'] = $this->hashUser($this->data);
			//or...
			//$passwordHasher = new SimplePasswordHasher();
			//$this->data['User']['password'] = $passwordHasher->hash($this->data['User']['password']);
		}
		return true;
	}

	//http://snippets.dzone.com/posts/show/3123
	public function generatePassword($length=8){
		$base='ABCDEFGHKLMNOPQRSTWXYZabcdefghjkmnpqrstwxyz123456789';
		$max=strlen($base)-1;
		$activatecode='';
		mt_srand((double)microtime()*1000000);
		while(strlen($activatecode)<$length+1)
			$activatecode.=$base{mt_rand(0,$max)};
		return $activatecode;
	}

 /**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'login' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Winner' => array(
			'className' => 'Winner',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
