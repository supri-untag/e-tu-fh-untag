<?php

namespace Supri\ETU\UNTAG\Repository;

use Supri\ETU\UNTAG\Domain\Stock;

class ItemStcokRepository
{
    private \PDO $PDO;

    /**
     * @param \PDO $PDO
     */
    public function __construct(\PDO $PDO)
    {
        $this->PDO = $PDO;
    }

    public function add(Stock $stock):Stock
    {
        $this->PDO->prepare('INSERT INTO item(id, name, code, brand, type, stock, barcode) VALUES (?,?,?,?,?,?,?)')
    }

    public function update():void
    {

    }

    public function delete():void
    {

    }

    public function deleteAll():void
    {

    }
}