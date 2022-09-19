<?php
class User
{
    private $conn;

    public $id;
    public $name;
    public $email;
    public $telephone;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = "INSERT INTO user
            SET
                name= :name, email = :email, telephone = :telephone";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":telephone", $this->telephone);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function read()
    {
        $query = "SELECT * FROM user";

        $res = $this->conn->query($query);

        return $res;
    }

    public function readOne()
    {
        $query = "SELECT * FROM user WHERE id = :id";

        $res = $this->conn->prepare($query);
        $res->bindValue(':id', $this->id);
        $res->execute();

        $res = $res->fetch(PDO::FETCH_ASSOC);

        $this->name = $res['name'] ?? null;
        $this->email = $res['email'] ?? null;
        $this->telephone = $res['telephone'] ?? null;
    }
}
