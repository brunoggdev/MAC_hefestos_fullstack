<?php

namespace App\MAC\Autenticacao;

use App\Entidades\Usuario;
use App\Models\UsuariosModel;

class Autenticacao
{
    /**
     * Loga o usuário informado
     */
    public static function login(Usuario $usuario, bool $lembrar = false): void
    {
        if (isset($usuario->senha)) {
            unset($usuario->senha);
        }

        if ($lembrar) {
            $token = bin2hex(random_bytes(32));

            (new UsuariosModel)->lembrar($usuario, $token);

            setcookie('lembrar', $token, time() + (86400 * 30), "/");// cookike expira em 30 dias
        }

        sessao()->guardar('usuario', $usuario);
        sessao()->regenerarId();
    }


    /**
     * Desloga o usuário e remove o token de lembrança
     */
    public static function logout(): void
    {
        // expirar token de lembrança
        if (isset($_COOKIE['lembrar'])) {
            setcookie('lembrar', '', time() - 3600, "/");
            (new UsuariosModel)->esquecer(usuario());
        }

        sessao()->limpar('usuario');
    }
}
