<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2 class="mb-4">Iniciar sesión</h2>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= esc(session()->getFlashdata('error')) ?>
    </div>
<?php endif; ?>

<form action="<?= base_url('/login') ?>" method="post">
    <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" name="email" id="email" class="form-control" value="<?= old('email') ?>" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Entrar</button>
</form>

<p class="mt-3">¿No tienes una cuenta? <a href="<?= base_url('/register') ?>">Regístrate aquí</a></p>

<?= $this->endSection() ?>