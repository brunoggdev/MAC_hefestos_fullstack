<?php

use App\Controllers\UsuariosController;
use Hefestos\Rotas\Rota;

Rota::get('/', fn() => pagina('login'));
Rota::get('/login', fn() => pagina('login'));
Rota::get('/cadastro', fn() => pagina('cadastro'));

Rota::post('/login', [UsuariosController::class, 'login']);

Rota::get('/home', [UsuariosController::class, 'index']);