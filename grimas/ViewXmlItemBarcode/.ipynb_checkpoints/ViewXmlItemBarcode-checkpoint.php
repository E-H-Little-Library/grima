<?php

require_once("../grima-lib.php");

class ViewXmlItemBarcode extends GrimaTask {

	function do_task() {
		$this->item = new Item();
        $this->item->loadFromAlmaBarcode($this['barcode']);
	}

	function print_success() {
		XMLtoWeb($this->item->xml);
	}

}

ViewXmlItemBarcode::RunIt();

