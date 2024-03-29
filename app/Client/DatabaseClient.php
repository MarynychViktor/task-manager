<?php

namespace App\Client;


use App\Exception\DatabaseException;
use PDO;

class DatabaseClient implements DatabaseClientInterface
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('sqlite:database.db');
    }

    /**
     * @inheritDoc
     */
    public function query(string $sqlQuery, array $parameters = [], int $mode = PDO::FETCH_ASSOC): array
    {

        $statement = $this->pdo->prepare($sqlQuery);

        foreach ($parameters as $key => $value) {
            $statement->bindValue($key, $value);
        }

        if (!$statement->execute()) {
            throw new DatabaseException("DatabaseException: Failed to execute: {$sqlQuery}");
        }

        return $statement->fetchAll($mode);
    }

    /**
     * @inheritDoc
     */
    public function execute(string  $sqlQuery, array $parameters = []): void
    {
        $statement = $this->pdo->prepare($sqlQuery);

        foreach ($parameters as $key => $value) {
            $statement->bindValue($key, $value);
        }

        if (!$statement->execute()) {
            throw new DatabaseException("DatabaseException: Failed to execute: {$sqlQuery}");
        }
    }
}
