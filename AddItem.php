<?php

declare(strict_types = 1);

class AddItem extends ConectDb
{
    private $id;
    private $name;

    public function setId(int $id)
    {
        $this->id = $id;
    }

    

}