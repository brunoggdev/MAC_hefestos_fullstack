<div class="container d-flex align-items-center justify-content-center" style="min-height: 100dvh;">
    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
        <div class="card-body">
            <!-- <h1 class="card-title text-center mb-4 fs-4">Minha Agenda Capitalista</h1> -->
            <h2 class="card-title text-center mb-4">Cadastro</h2>
            <form action="<?=base_url('cadastro')?>" method="POST">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Como nos referimos à você?" required>
                    <label for="nome">Primeiro nome/apelido</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="senha" placeholder="Digite sua senha" required>
                    <label for="password">Senha</label>
                </div>

                <?php if(sessao()->tem('erro')): ?>
                    <div class="alert alert-danger" role="alert">
                    <i class="bi bi-exclamation-square-fill"></i> <?=sessao('erro')?>
                    </div>
                <?php endif; ?>
                
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="remember" name="lembrar">
                    <label class="form-check-label" for="remember">
                        Lembrar de mim
                    </label>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                </div>
            </form>
        </div>
        <div class="text-center mt-3 mb-2">
            <a href="<?=base_url('login')?>" class="text-muted">Já tem uma conta? Faça login</a>
        </div>
        <div class="text-center mt-3 mb-2">
            <a href="#" class="text-muted">Esqueceu sua senha?</a>
        </div>
    </div>
</div>