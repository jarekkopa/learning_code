<?php
class ConectDb
{
    private $host = 'localhost';
    private $user = 'roor';
    private $password = '';
    private $dbname = 'shop';

    private $statement;
    private $connection;
    private $query;

    public function __construct()
    {
        try
        {
            $this->connection = new PDO("mysql:host=$this->host;dbname=shop", $this->user, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            // echo "Connected successfully"; 
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function query($query)
    {
        $this->statement = $this->connection->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($param, $value, $type);
    }
    public function execute()
    {
        return $this->statement->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
}