<?php
/** @var iterable $zadnjiRecepti */
/** @var iterable $popularneKategorije */
/** @var array $stats */
$this->assign('title', 'Domov');
?>
<section class="hero">
    <div class="hero-copy">
        <span class="eyebrow">Kuharska zbirka</span>
        <h1>Recepti, sestavine in komentarji v eni čisti aplikaciji.</h1>
        <p>OZRA je preprost CakePHP projekt za pregled, dodajanje in urejanje receptov. Dizajn uporablja tvojo vijolično-modro-mint paleto.</p>
        <div class="hero-actions">
            <?= $this->Html->link('Poglej recepte', ['controller' => 'Recepti', 'action' => 'index'], ['class' => 'button primary']) ?>
            <?= $this->Html->link('Dodaj recept', ['controller' => 'Recepti', 'action' => 'add'], ['class' => 'button ghost']) ?>
        </div>
    </div>
    <div class="hero-card glass-card">
        <h2>Pregled baze</h2>
        <div class="stats-grid">
            <div><strong><?= (int)$stats['recepti'] ?></strong><span>recepti</span></div>
            <div><strong><?= (int)$stats['uporabniki'] ?></strong><span>uporabniki</span></div>
            <div><strong><?= (int)$stats['sestavine'] ?></strong><span>sestavine</span></div>
            <div><strong><?= (int)$stats['komentarji'] ?></strong><span>komentarji</span></div>
        </div>
    </div>
</section>

<section class="section-head">
    <div>
        <span class="eyebrow">Sveže iz baze</span>
        <h2>Zadnji recepti</h2>
    </div>
    <?= $this->Html->link('Vsi recepti', ['controller' => 'Recepti', 'action' => 'index'], ['class' => 'text-link']) ?>
</section>

<div class="recipe-grid">
    <?php foreach ($zadnjiRecepti as $recept): ?>
        <article class="recipe-card">
            <div class="recipe-image" style="background-image:url('<?= h($recept->slika ?: 'https://images.unsplash.com/photo-1495521821757-a1efb6729352?auto=format&fit=crop&w=1200&q=80') ?>')"></div>
            <div class="recipe-body">
                <span class="pill"><?= h($recept->kategorija ?: 'Brez kategorije') ?></span>
                <h3><?= $this->Html->link(h($recept->naslov), ['controller' => 'Recepti', 'action' => 'view', $recept->id]) ?></h3>
                <p><?= h($this->Text->truncate((string)$recept->opis, 115)) ?></p>
                <small>Avtor: <?= h($recept->uporabniki->uporabnisko_ime ?? 'neznan') ?></small>
            </div>
        </article>
    <?php endforeach; ?>
</div>

<section class="category-strip">
    <h2>Kategorije</h2>
    <div class="category-list">
        <?php foreach ($popularneKategorije as $kat): ?>
            <?= $this->Html->link(h($kat->kategorija) . ' · ' . (int)$kat->stevilo, ['controller' => 'Recepti', 'action' => 'index', '?' => ['kategorija' => $kat->kategorija]], ['class' => 'category-chip']) ?>
        <?php endforeach; ?>
    </div>
</section>
