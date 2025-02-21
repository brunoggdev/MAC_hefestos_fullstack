<?php

namespace App\Filtros;

use App\MAC\Autenticacao\Autenticacao;
use App\Models\UsuariosModel;

class UsuarioLogado
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
        $token = ($_COOKIE['lembrar'] ?? '');

        if (!$token || !($usuario = (new UsuariosModel)->usuarioLembrado($token))) {
            return redirecionar('/login')->com('toast', [
                'texto' => 'Realize o login ou crie uma conta para continuar.',
                'cor' => 'info'
            ]);
        };

        // Caso tenhamos um usuário, fazemos o login e seguimos normalmente
        Autenticacao::login($usuario);
    }
}
