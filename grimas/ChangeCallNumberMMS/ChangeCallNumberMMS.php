<?php

require_once("../grima-lib.php");

class ChangeCallNumberMMS extends GrimaTask {

	function do_task() {
		$this->bib = new Bib();
		$this->bib->loadFromAlma($this['mms_id']);
		$this->bib->getHoldings();
		foreach ($this->bib->holdings as $holding) {
			$holding->getItemList();
		}
		$this->splatVars['bib'] = $this->bib;
		$this->splatVars['newField'] = $this['newField'];
	}
}

ChangeCallNumberMMS::RunIt();
