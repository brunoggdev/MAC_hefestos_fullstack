<?php

namespace App\Controllers;

use App\MAC\Autenticacao\Autenticacao;
use App\Models\UsuariosModel;
use Hefestos\Core\Controller;

class UsuariosController extends Controller
{

    public function __construct(
        protected UsuariosModel $usuarios,
    ) {}


    public function cadastrar()
    {
        // TODO: Validar dados
        $usuario = [
            'nome' => $this->dadosPost('nome'),
            'email' => $this->dadosPost('email'),
            'senha' => encriptar($this->dadosPost('senha')),
        ];

        $id_inserido = $this->usuarios->insert($usuario);

        if (!$id_inserido) {
            return redirecionar('/cadastro')->com('erro', 'Tivemos um erro durante o cadastro. Tente novamente.');
        }

        return $this->logar();
    }


    public function logar()
    {
        $dados_form = $this->dadosPost(['email', 'senha']);
        $usuario = $this->usuarios->autenticar(...$dados_form);

        if (!$usuario) {
            return redirecionar('/login')->com('erro', 'Email ou senha inválidos');
        }

        Autenticacao::login($usuario, $this->dadosPost('lembrar')); 

        return redirecionar('/home');
    }


    /**
     * Desloga o usuário e remove o token de lembrança
     */
    public function deslogar()
    {
        Autenticacao::logout();

        return redirecionar('/login');
    }
}
