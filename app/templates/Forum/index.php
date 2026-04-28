<?php $this->assign('title', 'Forum'); ?>
<section class="page-header">
    <div>
        <span class="eyebrow">Skupnost</span>
        <h1>Forum</h1>
        <p>Deli svoje recepte z skupnostjo.</p>
    </div>
    <?php if ($prijavljenUporabnik): ?>
        <?= $this->Html->link('Nova objava', ['action' => 'add'], ['class' => 'button primary']) ?>
    <?php else: ?>
        <?= $this->Html->link('Prijava za objavljanje', ['controller' => 'Uporabniki', 'action' => 'login'], ['class' => 'button primary']) ?>
    <?php endif; ?>
</section>

<div class="recipe-grid">
    <?php foreach ($objave as $objava): ?>
    <article class="recipe-card">
        <div class="recipe-image" style="background-image:url('<?= h($objava->slika ?: 'https://images.unsplash.com/photo-1495521821757-a1efb6729352?auto=format&fit=crop&w=1200&q=80') ?>')"></div>
        <div class="recipe-body">
            <span class="pill"><?= h($objava->kategorija ?: 'Brez kategorije') ?></span>
            <h3><?= $this->Html->link(h($objava->naslov), ['action' => 'view', $objava->id]) ?></h3>
            <p><?= h($this->Text->truncate((string)$objava->opis, 120)) ?></p>
            <small>Avtor: <?= h($objava->uporabniki->uporabnisko_ime ?? 'neznan') ?> · <?= count($objava->komentarji) ?> komentarjev</small>
            <div class="card-actions">
                <?= $this->Html->link('Odpri', ['action' => 'view', $objava->id]) ?>
                <?php if ($prijavljenUporabnik && ($prijavljenUporabnik['vloga'] === 'admin' || (int)$objava->uporabnik_id === (int)$prijavljenUporabnik['id'])): ?>
                    <?= $this->Form->postLink('Izbriši', ['action' => 'delete', $objava->id], ['confirm' => 'Res izbrišem?']) ?>
                <?php endif; ?>
            </div>
        </div>
    </article>
    <?php endforeach; ?>
</div>

<div class="paginator soft-paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('‹') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next('›') ?>
    </ul>
    <p><?= $this->Paginator->counter('Stran {{page}} / {{pages}}') ?></p>
</div>