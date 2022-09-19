<?php
class CarYard
{
    private $conn;

    public $id;
    public $address;
    public $address_number;
    public $address_complement;
    public $city;
    public $state;
    public $zip_code;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = "SELECT * FROM car_yard";

        $res = $this->conn->query($query);

        return $res;
    }

    public function readOne()
    {
        $query = "SELECT * FROM car_yard WHERE id = :id";

        $res = $this->conn->prepare($query);
        $res->bindValue(':id', $this->id);
        $res->execute();

        $res = $res->fetch(PDO::FETCH_ASSOC);

        $this->address = $res['address'] ?? null;
        $this->address_number = $res['address_number'] ?? null;
        $this->address_complement = $res['address_complement'] ?? null;
        $this->city = $res['city'] ?? null;
        $this->state = $res['state'] ?? null;
        $this->zip_code = $res['zip_code'] ?? null;
    }
}
