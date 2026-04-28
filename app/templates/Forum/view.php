<?php $this->assign('title', h($objava->naslov)); ?>
<section class="page-header">
    <div>
        <span class="eyebrow"><?= h($objava->kategorija) ?></span>
        <h1><?= h($objava->naslov) ?></h1>
        <small>Avtor: <?= h($objava->uporabniki->uporabnisko_ime ?? 'neznan') ?></small>
    </div>
    <?= $this->Html->link('← Nazaj na forum', ['action' => 'index']) ?>
</section>

<div class="content-block" style="margin-bottom:2rem">
    <p><?= nl2br(h($objava->opis)) ?></p>
    <h3>Navodila</h3>
    <p><?= nl2br(h($objava->navodila)) ?></p>
</div>

<div class="comments-block">
    <h2>Komentarji (<?= count($objava->komentarji) ?>)</h2>

    <?php foreach ($objava->komentarji as $komentar): ?>
    <div class="comment" style="border-left:3px solid #7400B8;padding:0.5rem 1rem;margin-bottom:1rem">
        <strong><?= h($komentar->uporabniki->uporabnisko_ime ?? 'neznan') ?></strong>
        <p><?= h($komentar->vsebina) ?></p>
        <?php if ($prijavljenUporabnik && ($prijavljenUporabnik['vloga'] === 'admin' || (int)$komentar->uporabnik_id === (int)$prijavljenUporabnik['id'])): ?>
            <?= $this->Form->postLink('Izbriši', ['controller' => 'Komentarji', 'action' => 'izbrisi', $komentar->id], ['confirm' => 'Res izbrišem?']) ?>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>

    <?php if ($prijavljenUporabnik): ?>
    <h3>Dodaj komentar</h3>
    <?= $this->Form->create(null, ['url' => ['controller' => 'Komentarji', 'action' => 'dodaj', $objava->id]]) ?>
        <?= $this->Form->control('vsebina', ['label' => false, 'placeholder' => 'Napiši komentar...', 'rows' => 3]) ?>
        <?= $this->Form->button('Objavi', ['class' => 'button primary']) ?>
    <?= $this->Form->end() ?>
    <?php else: ?>
    <p><?= $this->Html->link('Prijavi se za komentiranje', ['controller' => 'Uporabniki', 'action' => 'login']) ?></p>
    <?php endif; ?>
</div>