<!-- views/login.php -->
<div class="container vh-100 d-flex align-items-center justify-content-center">
    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Entrar</h2>
            <form action="<?= url_base('login') ?>" method="POST">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="senha" placeholder="Digite sua senha" required>
                    <label for="password">Senha</label>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                </div>
            </form>
        </div>
        <div class="text-center mt-3 mb-2">
            <a href="#" class="text-muted">Esqueceu sua senha?</a>
        </div>
    </div>
</div>
