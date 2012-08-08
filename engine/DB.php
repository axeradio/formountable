<?php

/**
 * Database access.
 * @author Samuel Coleman <105709c@acadiau.ca>
 */
class DB
{
    /**
     * @var PDO $instance
     */
    private static $instance;

    /**
     * Singleton class disallows constructor calls.
     */
    private function DB()
    {
    }

    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}
