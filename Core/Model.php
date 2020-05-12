<?php

namespace Core;

use App\Config;
use PDO;

abstract class Model
{
    public static $db = null;

    public static function db()
    {
        if (!is_null(self::$db)) {
            return self::$db;
        }
        self::$db = new PDO('mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8', Config::DB_USER, Config::DB_PASSWORD);
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return self::$db;
    }

    public static function query($query)
    {
        return self::db()->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}