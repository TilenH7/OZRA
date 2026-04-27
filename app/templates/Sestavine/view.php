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
            <?= $this->Html->link(__('Edit Sestavine'), ['action' => 'edit', $sestavine->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sestavine'), ['action' => 'delete', $sestavine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sestavine->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sestavine'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sestavine'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sestavine view content">
            <h3><?= h($sestavine->ime) ?></h3>
            <table>
                <tr>
                    <th><?= __('Ime') ?></th>
                    <td><?= h($sestavine->ime) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sestavine->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
