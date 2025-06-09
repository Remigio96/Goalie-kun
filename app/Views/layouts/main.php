<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Goalie-kun') ?></title>

    <!-- Bootstrap 5.3.6 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/') ?>">🏑 Goalie-kun</a>
        </div>
    </nav>

    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>

    <footer class="text-center mt-5 mb-3 text-muted">
        <small>&copy; <?= date('Y') ?> Goalie-kun. Todos los derechos reservados.</small>
    </footer>
<!-- JavaScript personalizado -->
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>
</html>
