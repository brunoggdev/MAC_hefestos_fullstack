<?php

use Hefestos\Database\Tabela;

return ( new Tabela('usuarios') )
    ->id()
    ->string('nome')
    ->string('email')
    ->string('senha')
    ->text('lembrar_token')
    ->json('permissoes')
    ->datetime('criado_em')
    ->datetime('atualizado_em');