<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    body {
        background: linear-gradient(to right, #f7f9fc, #dee8ff);
        min-height: 100vh;
    }

    .welcome-section {
        animation: fadeIn 1s ease-in-out;
        margin-top: 4rem;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .welcome-icon {
        font-size: 5rem;
        color: #0d6efd;
    }

    .welcome-card {
        background: #fff;
        border-radius: 1rem;
        padding: 3rem 2rem;
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.05);
    }
</style>

<div class="d-flex justify-content-center align-items-center welcome-section">
    <div class="welcome-card text-center col-md-6">

        <div class="welcome-icon mb-3">🏑</div>

        <h1 class="mb-3">Bienvenido a <strong>Goalie-kun</strong></h1>

        <p class="lead mb-4">
            Administra tus metas de ahorro de forma visual, sencilla y efectiva.
        </p>

        <div class="d-grid gap-3 d-md-flex justify-content-md-center">
            <a href="<?= base_url('/register') ?>" class="btn btn-primary btn-lg px-4">Crear cuenta</a>
            <a href="<?= base_url('/login') ?>" class="btn btn-outline-secondary btn-lg px-4">Iniciar sesión</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
