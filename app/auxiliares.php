<?php
/* ----------------------------------------------------------------------
Neste aquivo você pode definir suas funções auxiliares com o comportamento
que desejar e elas ficarão disponíveis em toda sua aplicação.
---------------------------------------------------------------------- */

use App\Entidades\Usuario;

/**
 * Carrega a view informada com o header e footer padrão 
 * além das modais e js específicos
*/
function pagina(string $nome_da_view, array $dados = []):string
{
    return comp('header', ['titulo' => extrair_item('titulo', $dados)])
        .view($nome_da_view, $dados)
        .componente("modais_$nome_da_view")
        .importar_js($nome_da_view, true)
        .comp('footer');
}


/**
 * Atalho para interagir com o usuário logado
 */
function usuario(): ?Usuario
{
    return sessao()->pegar('usuario');
}


/**
 * Alias para url_base
 */
function base_url(string $caminho_extra = ''): string
{
    return url_base($caminho_extra);
}