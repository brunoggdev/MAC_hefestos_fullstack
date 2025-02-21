<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $titulo ?? '' ?></title>

    <script>
        const BASE_URL = '<?= url_base() ?>';
    </script>

    <!-- jQuery 3.7 -->
    <script defer src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Bootstrap 5.3 -->
    <!-- Css do Bootstrap padrão - Não utilizando em favor do bootswatch que adiciona vários estilos diferentes -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->

    <!-- Css do bootswatch. Apenas adiciona estilos diferentes ao Bootstrap (usando flatly - use o que preferir :) -->
    <script>
        (function() {
            // Obtém o tema salvo ou define um padrão
            const bootswatchTheme = localStorage.getItem('bootswatch-theme') || 'journal';
            const bsTheme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

            // Aplica o tema diretamente no HTML para evitar o efeito de troca perceptível
            document.documentElement.setAttribute('data-bs-theme', bsTheme);
            document.addEventListener("DOMContentLoaded", function() {
                const select = document.getElementById('bootswatch-select').value = bootswatchTheme;
            });
            // Muda a URL da folha de estilos antes do carregamento do Bootstrap
            document.write(`<link id="bootswatch-link" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/${bootswatchTheme}/bootstrap.min.css" crossorigin="anonymous">`);
        })();
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Scripts do Bootstrap -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/theme-toggles@4.10.1/css/lightbulb.min.css">
    <!-- importando o nosso arquivo de funções auxiliares -->
    <?= importar_js('helpers_hefestos', true) ?>
    <?= importar_js('geral', true) ?>
</head>

<body>
    <div class="d-flex justify-content-end position-fixed top-0 end-0 pe-4" style="padding-top: 0.75rem;">
        <!-- Bootswatch Theme Toggle -->
        <div class="theme-switcher">
            <select id="bootswatch-select" class="form-select" aria-label="Bootswatch theme">
                <option value="cerulean">Cerulean</option>
                <option value="cosmo">Cosmo</option>
                <option value="cyborg">Cyborg</option>
                <option value="darkly">Darkly</option>
                <option value="flatly">Flatly</option>
                <option value="journal">Journal</option>
                <option value="litera">Litera</option>
                <option value="lumen">Lumen</option>
                <option value="lux">Lux</option>
                <option value="materia">Materia</option>
                <option value="minty">Minty</option>
                <option value="morph">Morph</option>
                <option value="pulse">Pulse</option>
                <option value="quartz">Quartz</option>
                <option value="sandstone">Sandstone</option>
                <option value="simplex">Simplex</option>
                <option value="sketchy">Sketchy</option>
                <option value="slate">Slate</option>
                <option value="solar">Solar</option>
                <option value="spacelab">Spacelab</option>
                <option value="superhero">Superhero</option>
                <option value="united">United</option>
                <option value="vapor">Vapor</option>
                <option value="yeti">Yeti</option>
                <option value="zephyr">Zephyr</option>
            </select>
        </div>



        <div id="theme-toggler" class="ms-3">

            <label class="theme-toggle" title="Toggle theme" for="theme-toggle" data-label-on="Dark" data-label-off="Light">
                <input type="checkbox" id="theme-toggle" />
                <span class="theme-toggle-sr">Toggle theme</span>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                    width="2em"
                    height="2em"
                    class="theme-toggle__lightbulb"
                    stroke-width="0.7"
                    stroke="currentColor"
                    fill="currentColor"
                    stroke-linecap="round"
                    viewBox="0 0 32 32">
                    <path
                        stroke-width="0"
                        d="M9.4 9.9c1.8-1.8 4.1-2.7 6.6-2.7 5.1 0 9.3 4.2 9.3 9.3 0 2.3-.8 4.4-2.3 6.1-.7.8-2 2.8-2.5 4.4 0 .2-.2.4-.5.4-.2 0-.4-.2-.4-.5v-.1c.5-1.8 2-3.9 2.7-4.8 1.4-1.5 2.1-3.5 2.1-5.6 0-4.7-3.7-8.5-8.4-8.5-2.3 0-4.4.9-5.9 2.5-1.6 1.6-2.5 3.7-2.5 6 0 2.1.7 4 2.1 5.6.8.9 2.2 2.9 2.7 4.9 0 .2-.1.5-.4.5h-.1c-.2 0-.4-.1-.4-.4-.5-1.7-1.8-3.7-2.5-4.5-1.5-1.7-2.3-3.9-2.3-6.1 0-2.3 1-4.7 2.7-6.5z" />
                    <path d="M19.8 28.3h-7.6" />
                    <path d="M19.8 29.5h-7.6" />
                    <path d="M19.8 30.7h-7.6" />
                    <path
                        pathLength="1"
                        class="theme-toggle__lightbulb__coil"
                        fill="none"
                        d="M14.6 27.1c0-3.4 0-6.8-.1-10.2-.2-1-1.1-1.7-2-1.7-1.2-.1-2.3 1-2.2 2.3.1 1 .9 1.9 2.1 2h7.2c1.1-.1 2-1 2.1-2 .1-1.2-1-2.3-2.2-2.3-.9 0-1.7.7-2 1.7 0 3.4 0 6.8-.1 10.2" />
                    <g class="theme-toggle__lightbulb__rays">
                        <path pathLength="1" d="M16 6.4V1.3" />
                        <path pathLength="1" d="M26.3 15.8h5.1" />
                        <path pathLength="1" d="m22.6 9 3.7-3.6" />
                        <path pathLength="1" d="M9.4 9 5.7 5.4" />
                        <path pathLength="1" d="M5.7 15.8H.6" />
                    </g>
                </svg>
            </label>
        </div>


    </div>