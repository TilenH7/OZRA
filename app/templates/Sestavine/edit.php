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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sestavine->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sestavine->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Sestavine'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sestavine form content">
            <?= $this->Form->create($sestavine) ?>
            <fieldset>
                <legend><?= __('Edit Sestavine') ?></legend>
                <?php
                    echo $this->Form->control('ime');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
