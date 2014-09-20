<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $helpers = array('Html', 'Form');
	public $components = array(
		'Session',
		'Auth' => array(
			'loginRedirect' => array('controller' => 'users', 'action' => 'profile'),
			'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'top'),
			'authenticate' => array(
				'Form' => array(
					'fields' => array('username' => 'login'),
					'passwordHasher' => array('className' => 'Simple', 'hashType' => 'sha1')
				)
			),
			'authorize' => array("Controller")
		),
		'Security' => array(
			'csrfUseOnce' => false
		) // tokens against XSS attacks
	);
	var $scaffold="admin";
	
	// isAuthorized used only on "denied" actions for logged in users.
	//depends on Auth['authorize'] (component config)
	public function isAuthorized($user) {
		if (strpos($this->action, 'admin_') === 0) return ($user['role'] === 'admin');

		//if ($this->action === 'add') { return true; } <=> $this->Auth->allow('add');

		//return parent::isAuthorized($user);
		return false;
	}

	function beforeFilter(){
		if (isset($this->params['admin'])) {
			$this->layout = 'admin';
		}
		
		if (strpos($this->action, 'admin_') === 0)
			$this->Auth->deny(); // require auth for all admin pages
		else
			$this->Auth->allow(); // only auth some few, specific actions

		//$this->Auth->allow('admin_index', 'admin_add', 'admin_delete', 'admin_view', 'admin_edit'); // this makes everyone able to access admin scaffolds
		Configure::write('Security.hash', null); // not using system salt (login as salt)
	}

	function beforeRender(){
		$this->set('Auth', $this->Auth); // Views don't get Components, but this one is often useful.
	}

}
