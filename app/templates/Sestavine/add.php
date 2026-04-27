<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sestavine $sestavine
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Sestavine'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sestavine form content">
            <?= $this->Form->create($sestavine) ?>
            <fieldset>
                <legend><?= __('Add Sestavine') ?></legend>
                <?php
                    echo $this->Form->control('ime');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
