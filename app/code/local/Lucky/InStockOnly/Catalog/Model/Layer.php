<?php

class Lucky_InStockOnly_Catalog_Model_Layer extends Mage_Catalog_Model_Layer {

  /**
   * Add a statusInStock requirement for visibility
   */
  public function prepareProductCollection($collection){
    parent::prepareProductCollection($collection);
    $collection->joinField(
      'stock_status',
      'cataloginventory/stock_status',
      'stock_status',
      'product_id=entity_id', array(
        'stock_status' => Mage_CatalogInventory_Model_Stock_Status::STATUS_IN_STOCK,
        'website_id' => Mage::app()->getWebsite()->getWebsiteId(),
      )
    );
    return $this;
  }

}