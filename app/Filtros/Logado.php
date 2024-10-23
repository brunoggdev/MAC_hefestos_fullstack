<?php

namespace App\Filtros;

use App\MAC\Autenticacao\Autenticacao;
use App\Models\UsuariosModel;

class Logado
{
    /**
     * Aplica o filtro configurado
     */
    public function aplicar()
    {
        // se usuário já estiver logado, apenas possiga
        if (usuario()) {
            return;
        }

        // se não estiver logado mas tivermos um token de lembrança, tentamos busca-lo
        $token = $_COOKIE['lembrar'] ?? '';
        $usuario = (new UsuariosModel)->usuarioLembrado($token);

        if (!$usuario) {
            return redirecionar('/login')->com('toast', [
                'texto' => 'Você precisa estar logado para acessar esta página.',
                'cor' => 'info'
            ]);
        }

        // Caso tenhamos um usuário, fazemos o login e seguimos normalmente
        Autenticacao::login($usuario);
    }
}
