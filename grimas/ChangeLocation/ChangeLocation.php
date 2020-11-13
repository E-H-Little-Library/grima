<?php

require_once("../grima-lib.php");

class ChangeLocation extends GrimaTask {

	function do_task() {
		$item = new Item();
		$item->loadFromAlmaBarcode($this['barcode']);
		$item['location'] = $this['location'];
        $item['location_code'] = $this['location_code'];
		$item->updateAlma();
	}
    
    function print_success() {
		GrimaTask::call('ViewXmlItemBarcode', array('barcode' => $this['barcode']));
	}

}

ChangeLocation::RunIt();
