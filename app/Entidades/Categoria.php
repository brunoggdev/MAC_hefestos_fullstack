<?php

namespace App\Entidades;

use Hefestos\Core\Entidade;

class Categoria implements Entidade
{
    public function chavePrimaria(): string
    {
        return 'id';
    }
    
    public function paraArray(): array
    {
        return [
            'id' => $this->id,
        ];
    }
}