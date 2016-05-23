<?php
require_once "Config.php";

class ToddSQL extends Config
{
    private $db;

    public function __construct()
    {
        $this->connect();
    }
    public function __destruct()
    {}

    private function connect()
    {
        $this->db = new PDO('mysql:host=' . $this->database["server"] . ';dbname=' . $this->database["database"] . ';charset=utf8mb4', $this->database["username"], $this->database["password"]);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getRecordset($sql, $params = array())
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function executeQuery($sql, $params = array())
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
    }
}