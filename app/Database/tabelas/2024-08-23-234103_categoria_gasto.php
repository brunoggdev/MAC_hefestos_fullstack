<?php

use Hefestos\Database\Tabela;

return ( new Tabela('categoria_gasto') )
    ->id()
    ->int('id_gasto')
    ->int('id_categoria')
    ->datetime('criado_em')
    ->foreignKey('id_gasto', 'gastos', 'id')
    ->foreignKey('id_categoria', 'categorias', 'id');