<?php

require_once("../grima-lib.php");

class  ViewItemRecord extends GrimaTask {
	
	function do_task() {
		$item = new Item();
		$item->loadFromAlmaBarcode($this['barcode']);
		
		$fields = array('item_pid',
		'barcode',
		'creation_date',
		'modification_date',
		'base_status',
		'physical_material_type_code',
		'physical_material_type',
		'location',
		'location_code',
		'library',
		'library_code',
		'policy',
		'item_policy',
		'provenance',
		'po_line',
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
		'alternative_call_number',
		'alternative_call_number_type',
		'storage_location_id',
		'receiving_operator',
		'process_type',
		'in_temp_location',
 		'mms_id',
		'holding_id',
		'title',
		'call_number',
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
	
	$fields2 = array('item pid',
		'barcode',
		'creation date',
		'modification date',
		'base status',
		'physical material type code',
		'physical material type',
		'location',
		'location code',
		'library',
		'library code',
		'policy',
		'item policy',
		'provenance',
		'po line',
		'is magnetic',
		'arrival date',
		'year of issue',
		'enumeration a',
		'enumeration b',
		'enumeration c',
		'enumeration d',
		'enumeration e',
		'enumeration f',
		'enumeration g',
		'enumeration h',
		'chronology i',
		'chronology j',
		'chronology k',
		'chronology l',
		'chronology m',
		'description',
		'alternative call number',
		'alternative call number type',
		'storage location id',
		'receiving operator',
		'process type',
		'in temp location',
 		'mms id',
		'holding id',
		'title',
		'call number',
		'pages',
		'pieces',
		'public note',
		'fulfillment note',
		'internal note 1',
		'internal note 2',
		'internal note 3',
		'statistics note 1',
		'statistics note 2',
		'statistics note 3',
		'requested',
		'physical condition',
		'temp library',
	'temp location' );
	
	$fields3 = array(
		'barcode',
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
	
	  echo nl2br("<style>table, th, td {border: 1px solid black;}</style>");
		echo nl2br("<table>");
		echo nl2br("<tr><th>Field</th><th>Contents</th></tr>");
		for($x = 0; $x<count($fields); $x++){
			echo nl2br("<tr><th>". strval($fields2[$x] ). "</th>");
			echo nl2br("<th>" .  strval($item[strval($fields[$x] )])  ."</th></tr>");
		}
		echo nl2br("</table>");

		$arguments = "?original_barcode=" . $this['barcode'] ;
		for($x = 0; $x<count($fields3); $x++){
			if(strlen($item[strval($fields3[$x] )]) > 0){
				$arguments .= strval("&" . strval($fields3[$x]) . "=" . strval($item[strval($fields3[$x] )]));
			}
		}
		
		echo nl2br("To change this record click <a href='../ChangeItemRecord/ChangeItemRecord.php" . strval($arguments) . "'>here</a>. \r\n");
		echo nl2br("To view a new record click <a href='../ViewInternalNote/ViewInternalNote.php'>here</a>. \r\n");
	}
    
    function print_success() {
		
		
		
	}

}

ViewItemRecord::RunIt();
