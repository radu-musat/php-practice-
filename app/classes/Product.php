<?php

class Product extends BaseClass
{
    const TABLE_NAME = 'products';
    public $id;
    public $name;
    public $price;
    public $discount;
    public $category_id;

    public function getDiscount()
    {
        return intval($this->price - (intval($this->price) * intval($this->discount) / 100));
    }

    public static function getTable()
    {
        return self::TABLE_NAME;
    }

    public function getProductImages() {
        return ProductImage::findBy('product_id', $this->id);
    }
}
