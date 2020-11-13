<?php

require_once("../grima-lib.php");

class ChangeStorageLocationID extends GrimaTask {

	function do_task() {
		$item = new Item();
		$item->loadFromAlmaBarcode($this['barcode']);
		$item['storage_location_id'] = $this['slid'];
		$item->updateAlma();
	}
    
    function print_success() {
		GrimaTask::call('ViewXmlItemBarcode', array('barcode' => $this['barcode']));
	}

}

ChangeStorageLocationID::RunIt();
