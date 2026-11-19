<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $conteudo['Titulo'] ?? 'Meu Site'; ?></title>
    <!-- O base_url() aponta diretamente para a pasta /public/ -->
    <link rel="stylesheet" href="<?= base_url('assets/css/estilo.css') ?>">
</head>
<body>

    <header>
        <?= $this->include('admin/menu') ?>
    </header>

    <main class="container">
        <!-- Aqui é injetado o conteúdo de cada página -->
        <?= $this->renderSection('conteudo') ?>
    </main>

</body>
</html>
