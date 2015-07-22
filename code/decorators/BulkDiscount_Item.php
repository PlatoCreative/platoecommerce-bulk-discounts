<?php
/*
*	BulkDiscount_Item extends Item
*/
class BulkDiscount_Item extends DataExtension {
	
	private static $db = array(
		'BulkDiscountPercent' => 'Decimal(18,2)',
		'BulkDiscountNumber' => 'Int'
	);
	
	private static $has_one = array(
		//'BulkDiscount' => 'BulkDiscount'
	);
	
	private static $has_many = array(
	);
	
	public function updateCalculatePrice(){
		$discount = BulkDiscount::get()->where("ProductNumber <= '" . $this->owner->Quantity . "' AND Expiry >= CURDATE() AND ProductID = '" . $this->owner->ProductID . "'")->sort('ProductNumber', 'DESC')->first();  

		if($discount && $discount->exists()){
			$this->owner->BulkDiscountPercent = $discount->Discount;
			$this->owner->BulkDiscountNumber = $discount->ProductNumber;
			$this->owner->Price = $this->owner->Price - ($this->owner->Price * ($discount->Discount / 100));
		} else {
			$this->owner->BulkDiscountPercent = 0;
			$this->owner->BulkDiscountNumber = 0;	
		}
	}
}