<?php

namespace Source\Database;

use \PDO;
use \PDOException;

class Connect{
    private const HOST = "127.0.0.1"; //localhost
    private const USER = "root";
    private const DBNAME = "db_planocontas";
    private const PASSWD = "root";

    private const OPTION = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL,
    ];

    private static $instance;

    public static function getInstance(): PDO {
        if (empty(self::$instance)) {
            try{
                self::$instance = new PDO(
                    "mysql:host=" . self::HOST . ";dbname=" . self::DBNAME,
                    self::USER,
                    self::PASSWD,
                    self::OPTION
                );
            }
            catch (PDOException $exception) {
                die("<h1> Erro ao conectar...</h1>");
            }
        }
        return self::$instance;
    }
}
?>