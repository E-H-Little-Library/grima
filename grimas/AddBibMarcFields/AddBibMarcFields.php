<?php

require_once("../grima-lib.php");

class AddBibMarcFields extends GrimaTask {
	
	function do_task() {
		$fields = preg_split('/\r\n|\r|\n/',$this['newFields']);
		$bib = new Bib();
		$bib->loadFromAlma($this['mms_id']);
		# BIBS
		
		foreach ($fields as $field) {
			$first=true;
			$fieldNumber = "0";
			$firstIndicator = "";
			$secondIndicator="";
			
			$subfields = explode(' $$',$field);
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

			$bib->appendField($fieldNumber, $firstIndicator, $secondIndicator, $fieldArray);
			$bib->updateAlma();
		}
	}
	
	function print_success() {
		GrimaTask::call('PrintBib', array('mms_id' => $this['mms_id']));
	}

}

AddBibMarcFields::RunIt();
