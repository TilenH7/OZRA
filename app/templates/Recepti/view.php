<?php
/** @var \App\Model\Entity\Recepti $recepti */
$this->assign('title', $recepti->naslov);
$lahkoUpravlja = $lahkoUpravlja ?? false;
?>
<article class="detail-hero">
    <div class="detail-image" style="background-image:url('<?= h($recepti->slika ?: 'https://images.unsplash.com/photo-1495521821757-a1efb6729352?auto=format&fit=crop&w=1200&q=80') ?>')"></div>
    <div class="detail-content glass-card">
        <span class="pill"><?= h($recepti->kategorija ?: 'Brez kategorije') ?></span>
        <h1><?= h($recepti->naslov) ?></h1>
        <p><?= h($recepti->opis) ?></p>
        <small>Avtor: <?= h($recepti->uporabniki->uporabnisko_ime ?? 'neznan') ?> · <?= h($recepti->ustvarjen) ?></small>
        <div class="hero-actions">
            <?php if ($lahkoUpravlja): ?>
                <?= $this->Html->link('Uredi', ['action' => 'edit', $recepti->id], ['class' => 'button primary']) ?>
                <?= $this->Form->postLink('Izbriši', ['action' => 'delete', $recepti->id], ['class' => 'button ghost', 'confirm' => 'Res izbrišem ta recept?']) ?>
            <?php endif; ?>
            <?= $this->Html->link('Nazaj', ['action' => 'index'], ['class' => 'button ghost']) ?>
        </div>
    </div>
</article>

<section class="content-card">
    <h2>Navodila</h2>
    <p><?= nl2br(h($recepti->navodila)) ?></p>
</section>

<section class="content-card">
    <h2>Komentarji</h2>
    <?php if (!empty($recepti->komentarji)): ?>
        <div class="comments-list">
            <?php foreach ($recepti->komentarji as $komentar): ?>
                <div class="comment-box">
                    <strong><?= h($komentar->uporabniki->uporabnisko_ime ?? 'Uporabnik') ?></strong>
                    <p><?= h($komentar->vsebina) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Ta recept še nima komentarjev.</p>
    <?php endif; ?>
</section>
