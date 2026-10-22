<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $conteudo['Titulo'] ?? 'Meu Site'; ?></title>
        <link rel="stylesheet" href="<?= base_url('assets/css/estilo.css') ?>">
    </head>
<body>
    
    <header>
        <?=$this->include('layout/menu') ?>
    </header>
    <main class="container">
    <?= $this->renderSection('Conteudo') ?>

</body>
</html>