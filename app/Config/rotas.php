<?php

use App\Controllers\UsuariosController;
use Hefestos\Rotas\Rota;

Rota::get('/', fn() => view('login'));
Rota::get('/login', fn() => view('login'));

Rota::get('/home', [UsuariosController::class, 'index']);