<?php

namespace App\Repository;

use PDO;

abstract class AbstractRepository
{
    protected PDO $pdo;
    protected string $table;
    protected string $primaryKey = 'id';

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE {$this->primaryKey} = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public abstract function create(object $object): ?object;  //La creación y la actualización son más dependientes del nº de columnas de la tabla y menos sencillo de generalizar.
    // Podría haber otro método abstracto para update

    public function deleteById(object $object)
    {
        $stmt = $this->pdo->prepare(
            "DELETE FROM {$this->table} WHERE {$this->primaryKey} = ?  "
        );
        $stmt->execute([$object->getId()]);

        return $stmt->rowCount() === 1;
    }
}
