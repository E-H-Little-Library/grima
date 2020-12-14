<?php

require_once("../grima-lib.php");

class ChangeCallNumber extends GrimaTask {
	
	function do_task() {
		$fields = preg_split('/\r\n|\r|\n/',$this['newField']);
		$holding = new Holding();
		$holding->loadFromAlma($this['mms_id'], $this['holding_id']);
		
		foreach ($fields as $field) {
			$first=true;
			$fieldNumber = "0";
			$firstIndicator = "";
			$secondIndicator="";
			
			$subfields = explode(' $$',$field);
			print_r($subfields);
			$fieldArray = array();
			foreach ($subfields as $subfield) {
				if($first){
					$first = false;
					
					$firstFields = explode(" ", $subfield);
					$fieldNumber = $firstFields[0];
					if(substr($firstFields[1],0,1) != "_"){
						$firstIndicator=substr($firstFields[1],0,1);
					}
					if(substr($firstFields[1],1,1) != "_"){
						$secondIndicator=substr($firstFields[1],1,1);
					}
				} else {
					$code = substr($subfield,0,1);
					$contents = substr($subfield,2);
					if(array_key_exists($code, $fieldArray)){
						$fieldArray[$code][] = $contents;
					} else {
						$fieldArray[$code] = array();
						$fieldArray[$code][] = $contents;
					}
				}
			}
			echo("field number: " . $fieldNumber);
			echo(" firstIndicator: " . $firstIndicator);
			echo(" secondIndicator: " . $secondIndicator);
			echo(" field array: ");
			print_r($fieldArray);
			$holding->deleteField($fieldNumber);
			$holding->appendField($fieldNumber, $firstIndicator, $secondIndicator, $fieldArray);
			$holding->updateAlma();
			echo("field number: " . $fieldNumber);
		}
	}
	
	function print_success() {
		GrimaTask::call('PrintHolding', array('mms_id' => $this['mms_id'],'holding_id' => $this['holding_id']));
	}

}

ChangeCallNumber::RunIt();
