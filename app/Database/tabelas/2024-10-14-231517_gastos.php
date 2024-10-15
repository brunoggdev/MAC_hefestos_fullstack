<?php

use Hefestos\Database\Tabela;

return ( new Tabela('gastos') )
    ->id()
    ->int('id_usuario')
    ->int('valor')
    ->string('descricao', nullable: true)
    ->datetime('criado_em')
    ->datetime('atualizado_em')
    ->foreignKey('id_usuario', 'usuarios', 'id');