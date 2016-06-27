<?php
namespace Nourhan\Database;

use PDO;
use PDOException;

class DB
{

    protected $serverName;
    protected $port;
    protected $dbName;
    protected $username;
    protected $password;
    protected $conn;

    /**
     * DB constructor. By default connect to Homestead virtual DB server and to the 'kourtis' database schema.
     * @param string $servername
     * @param string $port
     * @param string $dbname
     * @param string $username
     * @param string $password
     */

    public function __construct($serverName = "127.0.0.1", $port = "33060", $dbName = "project1",$username = "homestead", $password = "secret" )
    {
        $this->serverName = $serverName;
        $this->port = $port;
        $this->dbname = $dbName;
        $this->username = $username;
        $this->password = $password;

        $this->connect();

//        $stmt = $this->conn->prepare("SELECT * FROM project1.carousel");
//        $stmt->execute();
//        // set the resulting array to associative
//        $stmt->setFetchMode(PDO::FETCH_ASSOC);
//        $result = $stmt->fetchAll();
//        var_dump($result);
    }

    public function connect()
    {
        try{
            $conn = new PDO("mysql:host=$this->serverName;port:$this->port;dbname=$this->dbName", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn = $conn;
//            echo "Connection Established!";
        }   catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


    public function uploadCarousel($name)
    {
        $stmt = $this->conn->prepare("insert into project1.carousel(name) VALUES (?)");
        try{
            $stmt->bindValue(1,$name);
            $stmt->execute();
            echo "DONE!";
        }   catch(Exception $e){
                              echo "ERROR";
        }
    }

    public function getCarousel()
    {
        $stmt = $this->conn->prepare("select * from project1.carousel");
        $stmt->execute();
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        return $result;
    }



}