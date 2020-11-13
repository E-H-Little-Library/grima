<?php

require_once("../grima-lib.php");

class ChangeInternalNote extends GrimaTask {

	function do_task() {
		$item = new Item();
		$item->loadFromAlmaBarcode($this['barcode']);
        $noteNumber = 'internal_note_' . $this['number'];
		$item[$noteNumber] = $this['note'];
		$item->updateAlma();
	}
    
    function print_success() {
		GrimaTask::call('ViewXmlItemBarcode', array('barcode' => $this['barcode']));
	}

}

ChangeInternalNote::RunIt();
