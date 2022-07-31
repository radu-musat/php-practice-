<?php
class User extends BaseClass
{
    const TABLE_NAME = 'users';
    public $username;
    public $password;
    public $email;
    public $phone;

    public static function getTable()
    {
        return self::TABLE_NAME;
    }
}
