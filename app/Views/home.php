<?php
// Apenas informando o editor da tipagem das variáveis
/** @var App\Entidades\Usuario $usuario */
$usuario;
?>

Olá <?= $usuario->nome ?>, você está na página inicial.

<form action="<?=url_base('logout')?>" method="POST">
    <button type="submit" class="btn btn-danger">Deslogar</button>
</form>