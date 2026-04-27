<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recepti $recepti
 * @var string[]|\Cake\Collection\CollectionInterface $uporabniki
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $recepti->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $recepti->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Recepti'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="recepti form content">
            <?= $this->Form->create($recepti) ?>
            <fieldset>
                <legend><?= __('Edit Recepti') ?></legend>
                <?php
                    echo $this->Form->control('uporabnik_id', ['options' => $uporabniki]);
                    echo $this->Form->control('naslov');
                    echo $this->Form->control('opis');
                    echo $this->Form->control('navodila');
                    echo $this->Form->control('slika');
                    echo $this->Form->control('kategorija');
                    echo $this->Form->control('ustvarjen', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
