<?php
/*
*	BulkDiscount_Product extends Product
*/
class BulkDiscount_Product extends DataExtension {
	private static $has_many = array(
		'BulkDiscounts' => 'BulkDiscount'
	);
	
	public function updateCMSFields(FieldList $fields){
		
		// Bulk discounts
		$bulkconf = GridFieldConfig_RelationEditor::create(10);//->addComponent(new GridFieldSortableRows('SortOrder'));		
		$fields->addFieldToTab('Root.BulkDiscounts', new GridField('BulkDiscounts', 'BulkDiscounts', $this->owner->BulkDiscounts(), $bulkconf));
		
		return $fields;
	}
}