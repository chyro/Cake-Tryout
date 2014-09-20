<?php

class UsersController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny('profile'); // can't see profile unless logged in

		if ($this->request->params['action'] == 'login') { 
			$this->Security->validatePost = false; // avoiding issues with timeouts and whatnot
		} 
	}

	public function login() {
		if ($this->request->is('post')) {
			$this->request->data['User']['password'] = $this->data['User']['login'] . $this->data['User']['password']; // adding salt before auth
			if ($this->Auth->login()) {
				$data = $this->User->findById($this->Auth->user('id'));
				$user = $data['User'];
				// First Time Initialization...
				if (empty($user['card_number'])) {
					$this->loadModel('CardNumber');
					$this->CardNumber->create();
					$this->CardNumber->save(array());
					$user['card_number'] = $this->CardNumber->getInsertID();
					$this->User->save($user);
				}
				$this->Auth->redirect();
			} else {
				$this->Session->setFlash('Your username or password was incorrect.');
			}
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

	public function register() {
		if ($this->request->is('post')) {
			if (!empty($this->data['User']['name'])){ //honeypot
				$this->Session->setFlash('You have been labelled as spam. If this is not the case, please try again.');
				throw new Exception("Spam Protection");
			}
			$random_password = $this->User->generatePassword();
			$this->request->data['User']['password'] = $this->request->data['User']['login'] . $random_password; // adding salt before encrypting
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('You have been registered. You will receive a confirmation email.'));
				//$this->Session->setFlash(__($random_password.' // '.AuthComponent::password($this->data['User']['password']).')'));
				$message = "Thank you for registering with Metropolis Members Club. Your\n"
						."account has been created, you can login using the following\n"
						."details:\n"
						."\t- login: ".$this->data['User']['login']."\n"
						."\t- password: ".$random_password."\n"
						."\n"
						."In order to be eligible for prizes and to receive your card,\n"
						."please fill in your address in your account page.\n"
						."\n"
						."If you believe you received this email by mistake, please ignore\n"
						."it. The account will be disabled automatically.";
				App::uses('CakeEmail', 'Network/Email');
				$email = new CakeEmail('default');
				// $email->template("register")->emailFormat('html') //View/Emails/html/register.ctp
				// $email->template("register","notice")->emailFormat('html') // same + layout View/Layouts/Emails/html/notice.ctp
				// $email->viewVars(array("first_name" => $this->request->data['User']['first_name']))
				$email->to($this->request->data['User']['email']);
				$email->subject("Metropolis Members Club Registration");
				$email->send($message);
				// <=> CakeEmail::deliver($to, $subject, $message, array('from' => 'support@metropolis.co.jp'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Failed to register. Please, try again.'));
			}
		}
	}

	public function profile() {
		//if (!$this->Auth->loggedIn()) //this action is "denied" => already logged in

		if ($this->request->is('post') || $this->request->is('put')) {
			if (array_key_exists("password", $this->request->data['User'])) {
				if (array_key_exists("verify_password", $this->request->data['User'])
						&& $this->request->data['User']['password'] != $this->request->data['User']['verify_password']) {
					throw new Exception("Password fields are not identical.");
				}
				$this->request->data['User']['password'] = $this->Auth->user('login') . $this->request->data['User']['password'];
			}
			$this->User->save($this->request->data);
			$this->Session->setFlash(__('Profile Changed.'));
			unset($this->request->data['User']['password']);
			unset($this->request->data['User']['verify_password']);
		}

		$this->User->id = $this->Auth->user('id');
		$user = $this->User->read();
		unset($user['User']['password']);
		$this->set('user', $user); // for overview
		if (!$this->request->data) $this->request->data = $user; // for form default data
	}

	// Admin functions routed to /admin

	// Returns a random user, presumably the next prize winner
	public function admin_random_user() {
		$this->set('random_users', $this->User->find('all', array( 
			'conditions' => array('User.role !=' => 'admin'), 
			'order' => 'rand()',
			'limit' => 3
		)));
	}

	// Lets administrators change anyone's password
	public function admin_change_password() {
		if ($this->request->is('post')) {
			$criteria = $this->data['User']['user'];
			if (!($user = $this->User->findByLogin($criteria))
					&& !($user = $this->User->findByEmail($criteria))
					&& !($user = $this->User->findByCardNumber($criteria))) {
				throw new NotFoundException(__('No such user'));
			}
			$user['User']['password'] = $user['User']['login'] . $this->data['User']['password'];
			$this->User->save($user);

			$this->set('user',$this->User->findById($user['User']['id']));
		}
	}

	// Returns all users as downloadable CSV file
	public function admin_csv() {
		$users = $this->User->find('all');
		$this->set('users', $users);
		$this->layout = false;
	}
}
