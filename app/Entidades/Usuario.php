<?php

namespace App\Entidades;

use Hefestos\Core\Entidade;

class Usuario implements Entidade
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