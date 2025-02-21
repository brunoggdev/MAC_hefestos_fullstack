<?php

namespace App\Entidades;

use DateTimeImmutable;
use Hefestos\Core\Entidade;

class Usuario implements Entidade
{
    public ?int $id;
    public ?string $nome;
    public ?string $senha;
    public ?string $email;
    public ?DateTimeImmutable $criado_em;
    public ?DateTimeImmutable $editado_em;
    public ?bool $logado = false;

    /**
     * Cria um novo objeto de Usuario
     * @param array{
     *     id: int,
     *     nome: string,
     *     senha: ?string,
     *     email: string,
     *     criado_em: DateTime|string,
     *     editado_em: DateTime|string
     * } $dados
     * @author Brunoggdev
     */
    public function __construct(array $dados)
    {
        $this->inicializar($dados);
    }

    /**
     * Inicializa os atributos do objeto
     * @author Brunoggdev
     */
    private function inicializar(array $dados): void
    {
        $this->id = (int) $dados['id'] ?? null;
        $this->nome = $dados['nome'] ?? null;
        $this->senha = $dados['senha'] ?? null;
        $this->email = $dados['email'] ?? null;
        $this->criado_em = $dados['criado_em'] ? new DateTimeImmutable($dados['criado_em']) : null;
        $this->editado_em = $dados['atualizado_em'] ? new DateTimeImmutable($dados['atualizado_em']) : null;
    }


    public function paraArray(): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'email' => $this->email,
            'criado_em' => $this->criado_em->format('Y-m-d H:i:s'),
            'editado_em' => $this->editado_em->format('Y-m-d H:i:s')
        ];
    }
}
