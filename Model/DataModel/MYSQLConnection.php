<?php


class MYSQLConnection
{
    private const serverName = 'localhost';
    private const database = 'test';
    private const username = 'test';
    private const password = 'test';
    private const connectionString = 'mysql:host=' . self::serverName . ";dbname=" . self::database;

    private ?PDO $connection = null;

    public function __construct()
    {
        $this->connection = new PDO(self::connectionString, self::username, self::password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (!isset($this->connection)) {
            throw new PDOException("Connection not established");
        }
    }

//    public function query($query){
//        if (!isset($this->connection)) {
//            throw new PDOException("Connection not established");
//        }
//
//        $stmt = $this->connection->prepare($query);
//        $stmt->execute();
//
//        return $stmt;
//    }
}