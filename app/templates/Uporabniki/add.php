<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Uporabniki $uporabniki
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Uporabniki'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="uporabniki form content">
            <?= $this->Form->create($uporabniki) ?>
            <fieldset>
                <legend><?= __('Add Uporabniki') ?></legend>
                <?php
                    echo $this->Form->control('uporabnisko_ime');
                    echo $this->Form->control('geslo');
                    echo $this->Form->control('eposta');
                    echo $this->Form->control('profilna_slika');
                    echo $this->Form->control('ustvarjen', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
