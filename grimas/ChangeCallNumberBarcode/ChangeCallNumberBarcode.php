<?php
require_once("../grima-lib.php");
class ChangeCallNumberBarcode extends GrimaTask {

	function do_task() {
		$holding = new Holding();
		$holding->loadFromAlmaBarcode($this['barcode']);
		$this['mms_id'] = $holding['mms_id'];
        $this['holding_id'] = $holding['holding_id'];
	}
	function print_success() {
		GrimaTask::call('ChangeCallNumber', array('mms_id' => $this['mms_id'], 'holding_id' => $this['holding_id'], 'newField' => $this['newField']));
	}

}
ChangeCallNumberBarcode::RunIt();
