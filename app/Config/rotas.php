<?php

use App\Controllers\UsuariosController;
use Hefestos\Rotas\Rota;

Rota::get('/', fn() => pagina('login'));
Rota::get('/login', fn() => pagina('login'));
Rota::get('/cadastro', fn() => pagina('cadastro'));

Rota::post('/login', [UsuariosController::class, 'logar']);
Rota::post('/logout', [UsuariosController::class, 'deslogar']);
Rota::post('/cadastro', [UsuariosController::class, 'cadastrar']);

Rota::get('/home', fn() => pagina('home', ['usuario' => usuario()]))->filtro('logado');