<?php

require_once("../grima-lib.php");

class ViewInternalNote extends GrimaTask {
	
	function do_task() {
		$item = new Item();
		$item->loadFromAlmaBarcode($this['barcode']);
		$barcode = $this['barcode'];
		echo nl2br("The nonempty internal note fields are below: \r\n");
		if(strlen($item['internal_note_1'] ) > 0){
			echo nl2br("Internal Note Field 1: " . $item['internal_note_1']  . "\r\n");
		}
		if(strlen($item['internal_note_2'] ) > 0){
			echo nl2br("Internal Note Field 2: " . $item['internal_note_2'] . "\r\n");
		}
		if(strlen($item['internal_note_3'] ) > 0){
			echo nl2br("Internal Note Field 3:" . $item['internal_note_3'] . "\r\n");
		}
		echo nl2br("\r\n");
	}
    
    function print_success() {
		echo nl2br("To change one of these fields click <a href='../ChangeInternalNote/ChangeInternalNote.php?barcode=" . strval($this['barcode']) . "'>here</a>. \r\n");
		echo nl2br("To view the fields of a new record click <a href='../ViewInternalNote/ViewInternalNote.php'>here</a>. \r\n");
		
		
	}

}

ViewInternalNote::RunIt();
