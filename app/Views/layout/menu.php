<nav class="navbar">
<a href="<?= site_url('home') ?>" class="nav-link <?= in_array(uri_string(), ['', 'home'], true) ? 'active' : '' ?>">Home</a>
<a href="<?= site_url('contato') ?>" class="nav-link <?= url_is('contato') ? 'active' : ''?>">Contato</a>
<a href="<?= site_url('minhahab') ?>" class="nav-link <?= url_is('minhahab') ? 'active' : ''?>"> Skills</a>
<a href="<?= site_url('minhahis') ?>" class="nav-link <?= url_is('minhahis') ? 'active' : ''?>">História</a>
<a href="<?= site_url('planofuturo') ?>" class="nav-link <?= url_is('planofuturo') ? 'active' : ''?>">Planos</a>
</nav>