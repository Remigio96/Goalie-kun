<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Bienvenido/a, <?= esc(session('name')) ?> 👋</h2>
    <a href="<?= base_url('/logout') ?>" class="btn btn-outline-danger">Cerrar sesión</a>
</div>

<div class="alert alert-info">
    <p>Este es tu panel principal. Desde aquí podrás ver tus metas de ahorro, registrar movimientos y personalizar tu cuenta.</p>
</div>

<!-- Ejemplo de espacio para futuros componentes -->
<div class="row">
    <div class="col-md-6">
        <div class="card border-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Tu próximo paso</h5>
                <p class="card-text">Crea tu primera meta de ahorro y empieza a registrar tus avances.</p>
                <a href="#" class="btn btn-primary">Crear meta</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>