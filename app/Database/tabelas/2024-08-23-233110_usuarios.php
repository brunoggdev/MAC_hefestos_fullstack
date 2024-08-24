<?php

use Hefestos\Database\Tabela;

return ( new Tabela('usuarios') )
    ->id()
    ->string('nome')
    ->string('email')
    ->string('senha')
    ->datetime('criado_em')
    ->datetime('atualizado_em');