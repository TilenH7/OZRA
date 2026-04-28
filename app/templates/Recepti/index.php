<?php
/** @var \App\View\AppView $this */
/** @var iterable<\App\Model\Entity\Recepti> $recepti */
$this->assign('title', 'Recepti');
?>
<section class="page-header">
    <div>
        <span class="eyebrow">Knjižnica</span>
        <h1>Recepti</h1>
        <p>Filtriraj po naslovu, opisu ali kategoriji.</p>
    </div>
    <?= $this->Html->link('Nov recept', ['action' => 'add'], ['class' => 'button primary']) ?>
</section>

<div class="filter-card">
    <?= $this->Form->create(null, ['type' => 'get', 'class' => 'filter-form']) ?>
        <?= $this->Form->control('q', ['label' => false, 'placeholder' => 'Išči recept...', 'value' => $iskanje ?? '']) ?>
        <?= $this->Form->control('kategorija', ['label' => false, 'empty' => 'Vse kategorije', 'options' => $kategorije, 'value' => $kategorija ?? '']) ?>
        <?= $this->Form->button('Išči', ['class' => 'button primary']) ?>
        <?= $this->Html->link('Reset', ['action' => 'index'], ['class' => 'button ghost']) ?>
    <?= $this->Form->end() ?>
</div>

<div class="recipe-grid">
    <?php foreach ($recepti as $recept): ?>
        <article class="recipe-card">
            <div class="recipe-image" style="background-image:url('<?= h($recept->slika ?: 'https://images.unsplash.com/photo-1495521821757-a1efb6729352?auto=format&fit=crop&w=1200&q=80') ?>')"></div>
            <div class="recipe-body">
                <span class="pill"><?= h($recept->kategorija ?: 'Brez kategorije') ?></span>
                <h3><?= $this->Html->link(h($recept->naslov), ['action' => 'view', $recept->id]) ?></h3>
                <p><?= h($this->Text->truncate((string)$recept->opis, 120)) ?></p>
                <small>Avtor: <?= h($recept->uporabniki->uporabnisko_ime ?? 'neznan') ?></small>
                <div class="card-actions">
                    <?= $this->Html->link('Odpri', ['action' => 'view', $recept->id]) ?>
                    <?= $this->Html->link('Uredi', ['action' => 'edit', $recept->id]) ?>
                    <?= $this->Form->postLink('Izbriši', ['action' => 'delete', $recept->id], ['confirm' => 'Res izbrišem ta recept?']) ?>
                </div>
            </div>
        </article>
    <?php endforeach; ?>
</div>

<div class="paginator soft-paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('«') ?>
        <?= $this->Paginator->prev('‹') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next('›') ?>
        <?= $this->Paginator->last('»') ?>
    </ul>
    <p><?= $this->Paginator->counter('Stran {{page}} / {{pages}}, prikazano {{current}} od {{count}}') ?></p>
</div>
