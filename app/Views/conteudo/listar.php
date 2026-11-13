<?= $this->extend('layout/main') ?>
<?= $this->section('titulo') ?>Conteúdos<?= $this->endSection() ?>
<?= $this->section('conteudo') ?>

<header class="pagina-cabecalho">
    <h1>Conteúdos cadastrados</h1>
    <p>Gerencie os textos que aparecem nas páginas do site.</p>
</header>

<?php if ($mensagem = session()->getFlashdata('mensagem')): ?>
    <div class="alerta alerta-sucesso"><?= esc($mensagem) ?></div>
<?php endif; ?>

<?php if (empty($conteudos)): ?>
    <div class="alerta alerta-vazio">Nenhum conteúdo encontrado.</div>
<?php else: ?>
    <div class="tabela-wrapper">
        <table class="tabela">
            <thead>
                <tr>
                    <th class="col-id">Id</th>
                    <th class="col-titulo">Título</th>
                    <th class="col-texto">Texto</th>
                    <th class="col-acao">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($conteudos as $item): ?>
                    <tr>
                        <td class="col-id"><?= esc($item['Id']) ?></td>
                        <td class="col-titulo"><?= esc($item['Titulo']) ?></td>
                        <td class="col-texto"><?= nl2br(esc($item['Texto'] ?? '')) ?></td>
                        <td class="col-acao">
                            <a class="btn-acao" href="<?= site_url('conteudos/editar/' . $item['Id']) ?>">
                                Editar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>
