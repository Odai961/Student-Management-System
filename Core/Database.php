<?php

namespace Core;

use PDO;
use PDOStatement;

class Database
{
    protected PDO $connection;
    protected PDOStatement $statement;

    public function __construct($config, $username = 'root', $password = '12345')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function all()
    {
        return $this->statement->fetchAll();
    }

    public function findOrFail($code=404)
    {
        $result = $this->statement->fetch();
        if (!$result) {
            abort($code);
        }
        return $result;
    }
}