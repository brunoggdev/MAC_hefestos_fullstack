<?php

namespace App\Entidades;

use Hefestos\Core\Entidade;

class Gasto implements Entidade
{

    public int $id;

    public function __construct(array $dados) {
        $this->id = (int) $dados['id'] ?? null;
    }

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