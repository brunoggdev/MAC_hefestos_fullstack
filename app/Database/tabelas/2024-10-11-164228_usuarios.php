<?php

use Hefestos\Database\Tabela;

return ( new Tabela('usuarios') )
    ->id()
    ->string('nome')
    ->string('email')
    ->string('senha')
    ->text('lembrar_token', nullable: true)
    ->json('permissoes', nullable: true)
    ->datetime('criado_em')
    ->datetime('atualizado_em');