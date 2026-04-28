<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recepti $recepti
 * @var \Cake\Collection\CollectionInterface|string[] $uporabniki
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Recepti'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="recepti form content">
            <?= $this->Form->create($recepti) ?>
            <fieldset>
                <legend>Dodaj recept</legend>
                <?php
                    if (!empty($jeAdmin)) {
                        echo $this->Form->control('uporabnik_id', ['options' => $uporabniki, 'label' => 'Avtor']);
                    }
                    echo $this->Form->control('naslov', ['label' => 'Naslov']);
                    echo $this->Form->control('opis', ['label' => 'Opis']);
                    echo $this->Form->control('navodila', ['label' => 'Navodila']);
                    echo $this->Form->control('slika', ['label' => 'URL slike']);
                    echo $this->Form->control('kategorija', ['label' => 'Kategorija']);
                ?>
            </fieldset>
            <?= $this->Form->button('Shrani recept') ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
