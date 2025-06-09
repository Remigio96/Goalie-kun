<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2 class="mb-4">Crear cuenta</h2>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <p><?= esc($error) ?></p>
        <?php endforeach ?>
    </div>
<?php endif; ?>

<form action="<?= base_url('/register') ?>" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= old('name') ?>" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" name="email" id="email" class="form-control" value="<?= old('email') ?>" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Registrarse</button>
</form>

<p class="mt-3">¿Ya tienes cuenta? <a href="<?= base_url('/login') ?>">Inicia sesión aquí</a></p>

<?= $this->endSection() ?>