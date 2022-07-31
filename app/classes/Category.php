<?php

class Category extends BaseClass
{
    const TABLE_NAME = 'categories';

    public $id;
    public $name;
    public $products = [];

    public function setProducts()
    {
       $this->products = Product::findBy('category_id',  intval($this->id));
    }

    public static function getTable()
    {
        return self::TABLE_NAME;
    }
}
