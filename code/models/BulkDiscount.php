<?php
class BulkDiscount extends DataObject {

	private static $db = array(
		'Title' => 'Varchar(250)',
		'Discount' => 'Decimal(18,2)',
		'Expiry' => 'Date',
		'ProductNumber' => 'Int'
	);
	
	private static $has_one = array(
		'Product' => 'Product'
	);
	
	private static $has_many = array(
		//'Items' => 'Item'
	);
	
	private static $summary_fields = array(
		'Title' => 'Title',
		'ProductNumber' => 'Minimum number of products',
		'SummaryOfDiscount' => 'Discount',
		'Expiry' => 'Expiry'
	);
	
	public function canView($member = null){
        return true;
    }

	public function getCMSFields() {
		$fields = FieldList::create(
			TabSet::create('Root',
				Tab::create('Discount',
					TextField::create('Title', _t('Coupon.TITLE', 'Title')),
					TextField::create('ProductNumber', 'Minimum number of products'),
					NumericField::create('Discount', 'Discount percentage')->setRightTitle('As a percentage (%)'),
					DateField::create('Expiry', 'Expiry date')->setConfig('showcalendar', true)
				)
			)
		);
		
		return $fields;
	}
	
	public function Label() {
		return $this->Title . ' ' . $this->SummaryOfDiscount() . ' discount';
	}
	
	public function SummaryOfDiscount() {
		return $this->Discount . ' %';
	}
}