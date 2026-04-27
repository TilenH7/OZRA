<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Komentarji $komentarji
 * @var string[]|\Cake\Collection\CollectionInterface $uporabniki
 * @var string[]|\Cake\Collection\CollectionInterface $recepti
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $komentarji->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $komentarji->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Komentarji'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="komentarji form content">
            <?= $this->Form->create($komentarji) ?>
            <fieldset>
                <legend><?= __('Edit Komentarji') ?></legend>
                <?php
                    echo $this->Form->control('uporabnik_id', ['options' => $uporabniki]);
                    echo $this->Form->control('recept_id', ['options' => $recepti]);
                    echo $this->Form->control('vsebina');
                    echo $this->Form->control('ustvarjen', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
