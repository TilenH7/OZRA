<?php
/** @var \App\View\AppView $this */
$appTitle = 'Kuharski recepti';
?>
<!DOCTYPE html>
<html lang="sl">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= h($appTitle) ?><?= $this->fetch('title') ? ' · ' . h($this->fetch('title')) : '' ?></title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'ozra']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="ozra-nav">
        <a class="brand" href="<?= $this->Url->build('/') ?>">
            <span class="brand-mark">KR</span>
            <span>Kuharski recepti</span>
        </a>
        <div class="nav-links">
            <?= $this->Html->link('Recepti', ['controller' => 'Recepti', 'action' => 'index']) ?>
            <?= $this->Html->link('Forum', ['controller' => 'Forum', 'action' => 'index']) ?>
            <?php 
            $session = $this->request->getSession()->read('Auth.User');
            if ($session): ?>
                <?php if ($session['vloga'] === 'admin'): ?>
                    <?= $this->Html->link('Admin', ['controller' => 'Uporabniki', 'action' => 'adminPanel']) ?>
                <?php endif; ?>
                <?= $this->Html->link($session['uporabnisko_ime'], ['controller' => 'Uporabniki', 'action' => 'userPanel']) ?>
                <?= $this->Html->link('Odjava', ['controller' => 'Uporabniki', 'action' => 'logout']) ?>
            <?php else: ?>
                <?= $this->Html->link('Prijava', ['controller' => 'Uporabniki', 'action' => 'login']) ?>
                <?= $this->Html->link('Registracija', ['controller' => 'Uporabniki', 'action' => 'registracija']) ?>
            <?php endif; ?>
        </div>
    </nav>

    <main class="main-shell">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>

    <footer class="ozra-footer">
    <span>© <?= date('Y') ?> Kuharski recepti. Vse pravice pridržane</span>
    </footer>
</body>
</html>
