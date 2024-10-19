<?php

use App\Controllers\UsuariosController;
use Hefestos\Rotas\Rota;

Rota::get('/', fn() => montarPagina('login'));
Rota::get('/login', fn() => montarPagina('login'));

Rota::get('/home', [UsuariosController::class, 'index']);