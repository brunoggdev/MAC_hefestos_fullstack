<?php

namespace App\Models;

use App\Entidades\Usuario;
use Hefestos\Core\Model;

class UsuariosModel extends Model
{
    // tabela do banco de dados ao qual o model está relacionado
    protected string $tabela = 'usuarios';
    protected string $retorno_padrao = Usuario::class;


    /**
     * Retorna um usuario com base no email e senha informados ou false caso não coincidam
     * @author Brunoggdev
     */
    public function autenticar(string $email, string $senha): Usuario|false
    {
        $usuario = $this->primeiroOnde('email', $email);

        if (!$usuario || !password_verify($senha, $usuario->senha)) {
            return false;
        }
        
        return $usuario;
    }


    /**
     * Salva o token de lembrete do usuario informado
     * @author Brunoggdev
     */
    public function lembrar(Usuario $usuario, string $token): void
    {
        $this->update(['lembrar_token' => hash('sha256', $token)], $usuario->id);
    }

    /**
     * Salva o token de lembrete do usuario informado
     * @author Brunoggdev
     */
    public function esquecer(Usuario $usuario): void
    {
        $this->update(['lembrar_token' => null], $usuario->id);
    }


    /**
     * Retorna, se existir, o usuário com o token de lembrança informado
     */
    public function usuarioLembrado(string $token):Usuario
    {
        return $this->primeiroOnde('lembrar_token', hash('sha256', $token));
    }
}