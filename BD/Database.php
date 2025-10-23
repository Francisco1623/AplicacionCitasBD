<?php

class Database{
    private static ?PDO $instance = null;
    /** Conexión con nuestra base de datos */
    public static function getInstance(){
        if (!self::$instance) {
            $config = require __DIR__ . '/config.php';
            $db = $config['db'];
            self::$instance = new PDO("mysql:host={$db['host']};dbname={$db['dbname']}", $db['user'], $db['pass']);
        }
        return self::$instance;
    }
}