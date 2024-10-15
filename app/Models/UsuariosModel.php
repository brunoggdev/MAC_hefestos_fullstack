<?php

namespace App\Models;

use App\Entidades\Usuario;
use Hefestos\Core\Model;

class UsuariosModel extends Model
{
    // tabela do banco de dados ao qual o model está relacionado
    protected string $tabela = 'usuarios';


    /**
     * Retorna um usuario com base no email e senha informados ou false caso não coincidam
     * @author Brunoggdev
     */
    public function autenticar(string $email, string $senha): Usuario|false
    {
        $usuario = $this->primeiroOnde('email', $email);

        if (!$usuario || !password_verify($senha, $usuario['senha'])) {
            return false;
        }

        unset($usuario['senha']);
        
        return new Usuario($usuario);
    }


    /**
     * Retorna um array com os dados do usuario logado
     * @author Brunoggdev
     */
    public function dadosUsuario(): array
    {
        return $this->buscar(usuario()->id);
    }
}