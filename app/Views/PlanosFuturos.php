<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/estilo.css')?>">
</head>
<body>
    
<?= $this->extend('layout/main') ?>
<?= $this->section('conteudo') ?>
<h1><?= $conteudo['Titulo']; ?></h1>
<p><?= $conteudo['Texto']; ?></p>
<?= $this->endSection() ?>
</body>
</html>