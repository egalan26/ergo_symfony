<?php

namespace App\Integrations\Notion\Infrastructure\Models;

class BaseNotionModel
{
    protected mixed $id;

    /**
     * @param mixed $id
     * @return BaseNotionModel
     */
    public function setId(mixed $id): BaseNotionModel
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId(): mixed
    {
        return $this->id;
    }


}