<nav class="navbar">
    <div class="navbar-links">
        <a href="<?= site_url('home') ?>" class="nav-link <?= in_array(uri_string(), ['', 'home'], true) ? 'active' : '' ?>">Home</a>
        <a href="<?= site_url('contato') ?>" class="nav-link <?= url_is('contato') ? 'active' : '' ?>">Contato</a>
        <a href="<?= site_url('minhahab') ?>" class="nav-link <?= url_is('minhahab') ? 'active' : '' ?>">Skills</a>
        <a href="<?= site_url('minhahis') ?>" class="nav-link <?= url_is('minhahis') ? 'active' : '' ?>">História</a>
        <a href="<?= site_url('planofuturo') ?>" class="nav-link <?= url_is('planofuturo') ? 'active' : '' ?>">Planos</a>
    </div>

    <div class="navbar-auth">
        <?php if (auth()->loggedIn()): ?>
            <a href="<?= site_url('conteudos') ?>" class="nav-link <?= url_is('conteudos*') ? 'active' : '' ?>">Conteúdos</a>
            <form action="<?= site_url('admin/sair') ?>" method="post" class="logout-form">
                <?= csrf_field() ?>
                <button type="submit" class="nav-link logout-button">Sair</button>
            </form>
        <?php else: ?>
            <a href="<?= url_to('login') ?>" class="nav-cta">Entrar</a>
        <?php endif; ?>
    </div>
</nav>
