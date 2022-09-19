<?php
class Vehicle
{
    private $conn;

    public $id;
    public $id_car_yard;
    public $brand;
    public $model;
    public $description;
    public $value;
    public $photo;
    public $address;
    public $locale;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = "SELECT * FROM vehicle JOIN car_yard WHERE vehicle.id_car_yard = car_yard.id";

        $res = $this->conn->query($query);

        return $res;
    }

    public function readOne()
    {
        $query = "SELECT * FROM vehicle JOIN car_yard WHERE vehicle.id_car_yard = car_yard.id AND vehicle.id = :id";

        $res = $this->conn->prepare($query);
        $res->bindValue(':id', $this->id);
        $res->execute();

        $res = $res->fetch(PDO::FETCH_ASSOC);

        $this->brand = $res['brand'] ?? null;
        $this->model = $res['model'] ?? null;
        $this->description = $res['description'] ?? null;
        $this->value = $res['value'] ?? null;
        $this->photo = $res['photo'] ?? null;
        $fullAddress = $res['address'] . ", " . $res['address_number'] . " - " . $res['city'];
        $this->address = $fullAddress ?? null;
        $locale = $res['city'] . " - " . $res['state'];
        $this->locale = $locale ?? null;
        $this->id_car_yard = $res['id_car_yard'] ?? null;

        // FALTA RETORNAR OS DADOS DO INNER JOIN
    }
}
