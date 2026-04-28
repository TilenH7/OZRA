<?php
/** @var \App\View\AppView $this */
$appTitle = 'OZRA recepti';
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
            <span class="brand-mark">O</span>
            <span>OZRA</span>
        </a>
        <div class="nav-links">
            <?= $this->Html->link('Recepti', ['controller' => 'Recepti', 'action' => 'index']) ?>
            <?= $this->Html->link('Sestavine', ['controller' => 'Sestavine', 'action' => 'index']) ?>
            <?= $this->Html->link('Uporabniki', ['controller' => 'Uporabniki', 'action' => 'index']) ?>
            <?= $this->Html->link('Komentarji', ['controller' => 'Komentarji', 'action' => 'index']) ?>
        </div>
    </nav>

    <main class="main-shell">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>

    <footer class="ozra-footer">
        <span>Barvna paleta: #7400B8 → #80FFDB</span>
        <span>Made for OZRA</span>
    </footer>
</body>
</html>
