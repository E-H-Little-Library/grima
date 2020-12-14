<?php

require_once("../grima-lib.php");

class ChangeItemRecord extends GrimaTask {

	function do_task() {
		$item = new Item();
		$item->loadFromAlmaBarcode($this['original_barcode']);
		
		$fields = array('barcode',
		'modification_date',
		'physical_material_type_code',
		'physical_material_type',
		'policy',
		'item_policy',
		'provenance',
		'is_magnetic',
		'arrival_date',
		'year_of_issue',
		'enumeration_a',
		'enumeration_b',
		'enumeration_c',
		'enumeration_d',
		'enumeration_e',
		'enumeration_f',
		'enumeration_g',
		'enumeration_h',
		'chronology_i',
		'chronology_j',
		'chronology_k',
		'chronology_l',
		'chronology_m',
		'description',
		'storage_location_id',
		'receiving_operator',
		'process_type',
		'in_temp_location',
 		'pages',
		'pieces',
		'public_note',
		'fulfillment_note',
		'internal_note_1',
		'internal_note_2',
		'internal_note_3',
		'statistics_note_1',
		'statistics_note_2',
		'statistics_note_3',
		'requested',
		'physical_condition',
		'temp_library',
	'temp_location' );

		
		for($x = 0; $x<count($fields); $x++){
			$item[$fields[$x]] = $this[$fields[$x]];
		}
			
			
		$item->updateAlma();
	}
    
    function print_success() {
		GrimaTask::call('ViewItemRecord', array('barcode' => $this['barcode']));
	}

}

ChangeItemRecord::RunIt();
