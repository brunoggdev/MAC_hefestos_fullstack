<?php

namespace App\Controllers;

use App\Entidades\Usuario;
use App\Models\UsuariosModel;
use Hefestos\Core\Controller;

class UsuariosController extends Controller
{

    public function __construct(
        protected UsuariosModel $usuarios,
    ) {}


    public function cadastrar()
    {
        $usuario = $this->dadosPost();
        // TODO: Validar dados

        $id_inserido = $this->usuarios->insert($usuario);

        if (!$id_inserido) {
            return redirecionar('/cadastro')->com('erro', 'Tivemos um erro durante o cadastro. Tente novamente.');
        }

        $this->logar();
    }


    public function logar()
    {
        $dados_form = $this->dadosPost();
        $usuario = $this->usuarios->autenticar(...$dados_form);

        if (!$usuario) {
            return redirecionar('/login')->com('erro', 'Email ou senha inválidos');
        }

        if (isset($dados_form['lembrar'])) {
            $this->lembrarUsuario($usuario);
        }

        sessao()->guardar('usuario', $usuario);
        sessao()->regenerarId();

        return redirecionar('/home');
    }


    /**
     * Gera e guarda token de lembrete do usuario
     */
    private function lembrarUsuario(Usuario $usuario): void
    {
        $token = bin2hex(random_bytes(32));

        $this->usuarios->lembrar($usuario, $token);
        
        // cookike expira em 30 dias
        setcookie('lembrar', $token, time() + (86400 * 30), "/");
    }
}
