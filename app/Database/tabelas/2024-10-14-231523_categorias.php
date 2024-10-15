<?php

use Hefestos\Database\Tabela;

return ( new Tabela('categorias') )
    ->id()
    ->string('nome')
    ->datetime('criado_em')
    ->datetime('atualizado_em');