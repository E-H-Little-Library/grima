<?php

require_once("../grima-lib.php");

class DeleteHolding extends GrimaTask {

	function do_task() {
		$holding = new Holding();
		$holding->loadFromAlma($this['mms_id'], $this['holding_id']);
		$holding->deleteFromAlma();
		
		$this->bib = new Bib();
		$this->bib->loadFromAlma($this['mms_id']);
		$this->bib->getHoldings();
		try{
			$holdingList = $this->bib->holdingsList->entries;
			if(count($holdingList)==0){
				$this->addMessage('success','There are no holdings attached to this bib any more. Click <a href="../DeleteBib/DeleteBib.php?mms_id=' . $this['mms_id'] . '&target="_blank">here</a> to delete it.');	
			}
		} catch(Exception $e)  {
			$this->addMessage('success','There are no holdings attached to this bib any more. Click <a href="../DeleteBib/DeleteBib.php?mms_id=' . $this['mms_id'] . '&target="_blank">here</a> to delete it.');	
		}
	}
}

DeleteHolding::RunIt();
