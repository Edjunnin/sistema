<?= $this->extend('admin/main') ?>
<?= $this->section('conteudo') ?>

<h1>Conteúdos cadastrados!!!!!</h1>

    <?php if ($mensagem = session()->getFlashdata('mensagem')): ?>
        <p><?= esc($mensagem) ?></p>
    <?php endif; ?>

    <?php if (empty($conteudos)): ?>
        <p>Nenhum conteúdo encontrado.</p>
    <?php else: ?>
        <table class="tabela-estilizada">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Texto</th>
                    <th>Ação</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($conteudos as $item): ?>
                    <tr>
                        <td><?= esc($item['Id']) ?></td>
                        <td><?= esc($item['Titulo']) ?></td>
                        <td><?= nl2br(esc($item['Texto'] ?? '')) ?></td>
                        <td>
                            <a href="<?= site_url('conteudos/editar/' . $item['Id']) ?>">
                                Editar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

<?= $this->endSection() ?>
