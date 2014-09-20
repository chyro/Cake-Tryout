<?php

class BarcodesController extends AppController {
	/* //allowed to all
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny('stuff');
	}*/

	public function img($barnum) {
		require_once(current(App::path('Vendor')) . DS . "BarcodeGen.php");
		$bcg = new BarcodeGen();
		$barcode_raw = $bcg->draw($barnum);

		$this->autoRender = false;
		header('Content-type: image/png');
		echo($barcode_raw);
	}
}
