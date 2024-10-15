<?php

namespace App\Controllers;

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

        $this->login();
    }


    public function login()
    {
        $usuario = $this->usuarios->autenticar(...$this->dadosPost());

        if (!$usuario) {
            return redirecionar('/login')->com('erro', 'Email ou senha inválidos');
        }

        sessao()->guardar('usuario', $usuario);

        return redirecionar('/home');
    }
}
