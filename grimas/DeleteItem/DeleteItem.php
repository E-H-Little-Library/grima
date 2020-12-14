<?php

require_once("../grima-lib.php");

class DeleteItem extends GrimaTask {

	function do_task() {
		$item = new Item();
		$item->loadFromAlmaBCorX($this['item']);
		$holding_id = $item['holding_id'];
		$mms_id = $item['mms_id'];
		$item->deleteFromAlma();
		$holding = new Holding();
		$holding->loadFromAlma($mms_id, $holding_id);
		$holding->getItemList();
		try{
			$itemListHolding = $holding->itemList->items;
			if(count($itemListHolding)==0){
				$this->addMessage('success','There are no items attached to this holding any more. Click <a class="alert-link" href="../DeleteHolding/DeleteHolding.php?mms_id=' . $mms_id . '&holding_id=' . $holding_id . '" >here</a> to delete it.');
			}
		} catch(Exception $e)  {
			$this->addMessage('success','There are no items attached to this holding any more. Click <a class="alert-link" href="../DeleteHolding/DeleteHolding.php?mms_id=' . $mms_id . '&holding_id=' . $holding_id . '" >here</a> to delete it.');
		}

		

	}
}

DeleteItem::RunIt();
