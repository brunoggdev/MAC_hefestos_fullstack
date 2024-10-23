<?php

namespace App\Entidades;

use App\Models\UsuariosModel;
use DateTime;
use Hefestos\Core\Entidade;

class Usuario implements Entidade
{
    public int $id;
    public string $nome;
    public string $senha;
    public string $email;
    public array $permissoes;
    public DateTime $criado_em;
    public DateTime $editado_em;
    public bool $logado = false;

    /**
     * Cria um novo objeto de Usuario
     * @param array{
     *     id: int,
     *     nome: string,
     *     senha: ?string,
     *     email: string,
     *     permissoes: array|json,
     *     criado_em: DateTime|string,
     *     editado_em: DateTime|string
     * } $dados
     * @author Brunoggdev
     */
    public function __construct(array $dados)
    {
        $this->id = (int) $dados['id'] ?? null;
        $this->nome = $dados['nome'] ?? null;
        $this->senha = $dados['senha'] ?? null;
        $this->email = $dados['email'] ?? null;
        $this->permissoes = is_string($dados['permissoes']) ? json_decode($dados['permissoes'], true) : $dados['permissoes'] ?? null;
        $this->criado_em = $dados['criado_em'] ? new DateTime($dados['criado_em']) : null;
        $this->editado_em = $dados['editado_em'] ? new DateTime($dados['editado_em']) : null;
    }

    public function chavePrimaria(): string
    {
        return 'id';
    }

    public function paraArray(): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'email' => $this->email,
            'permissoes' => json_encode($this->permissoes),
            'criado_em' => $this->criado_em->format('Y-m-d H:i:s'),
            'editado_em' => $this->editado_em->format('Y-m-d H:i:s')
        ];
    }


    /**
     * Decide se um usuário tem permissão para executar uma ação
     * @author Brunoggdev
     */
    public function pode(string $acao): bool
    {
        return in_array($acao, $this->permissoes);
    }
}
