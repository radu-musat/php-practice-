<?php

class ProductImage extends BaseClass
{
    const TABLE_NAME = 'images';
    public $image_path;
    public $product_id;

    public static function getTable()
    {
        return self::TABLE_NAME;
    }
}
