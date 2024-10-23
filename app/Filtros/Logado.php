<?php

namespace App\Filtros;

class Logado
{
    /**
     * Aplica o filtro configurado
     */
    public function aplicar()
    {
        if (!usuario()) {

            $token = $_COOKIE['lembrar'] ?? null;

            if (!$token) {
                return redirecionar('/login')->com('toast', [
                    'texto' => 'Você precisa estar logado para acessar esta página.',
                    'cor' => 'info'
                ]);
            }
            
            $usuario = usuarios()->autenticar(null, $token);
            if ($usuario) {
                sessao()->guardar('usuario', $usuario);
                sessao()->regenerarId();
            }

        }


    }
}
