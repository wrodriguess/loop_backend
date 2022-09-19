<?php
class Scheduling
{
    private $conn;

    public $id;
    public $id_user;
    public $id_vehicle;
    public $date;
    public $hour;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = "INSERT INTO scheduling
            SET
                id_user= :id_user, id_vehicle = :id_vehicle, date = :date, hour = :hour";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_user", $this->id_user);
        $stmt->bindParam(":id_vehicle", $this->id_vehicle);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":hour", $this->hour);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function read()
    {
        $query = "SELECT * FROM scheduling";

        $res = $this->conn->query($query);

        return $res;
    }

    public function readOne()
    {
        $query = "SELECT * FROM scheduling WHERE id = :id";

        $res = $this->conn->prepare($query);
        $res->bindValue(':id', $this->id);
        $res->execute();

        $res = $res->fetch(PDO::FETCH_ASSOC);

        $this->id_user = $res['id_user'] ?? null;
        $this->id_vehicle = $res['id_vehicle'] ?? null;
        $this->date = $res['date'] ?? null;
        $this->hour = $res['hour'] ?? null;
    }

    public function hoursAvailable()
    {

        $businessHours = [];

        for ($i = 8; $i <= 18; $i++) {
            array_push($businessHours, "$i:00");
        }

        $query = "SELECT * FROM scheduling";
        $res = $this->conn->query($query);

        print_r(json_decode($res));





        return $res;
    }
}
