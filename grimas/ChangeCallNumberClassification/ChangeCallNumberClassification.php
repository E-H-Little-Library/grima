<?php
require_once("../grima-lib.php");
class ChangeCallNumberClassification extends GrimaTask {

	function do_task() {
		$holding = new Holding();
		$holding->loadFromAlmaBarcode($this['barcode']);
		$holding->setFirstIndicator('852', $this['indicator']);
        $this['mms_id'] = $holding['mms_id'];
        $this['holding_id'] = $holding['holding_id'];
        
		$holding->updateAlma();
	}
	function print_success() {
		GrimaTask::call('PrintHolding', array('mms_id' => $this['mms_id'], 'holding_id' => $this['holding_id']));
	}

}
ChangeCallNumberClassification::RunIt();
