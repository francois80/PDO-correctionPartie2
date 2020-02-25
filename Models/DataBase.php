<?php

require_once '../params.php';

/**
 * Description of DataBase
 *
 * @author s albrecht
 */
class DataBase {

    public $db;
    protected static $instance = null;

    public function __construct() {
        
    }

    public static function getInstance() {
        if (is_null(self::$instance)) {
            $dsn = 'mysql:dbname=' . DB . ';host=' . HOST . ';charset=UTF8';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ];
            try {
                self::$instance = new PDO($dsn, USER, PASS, $options);
            } catch (PDOException $ex) {
                die('La connexion à la bdd a échoué !' . $ex->getMessage());
            }
        }
        return self::$instance;
    }

}
