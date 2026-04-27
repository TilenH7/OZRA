<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Sestavine> $sestavine
 */
?>
<div class="sestavine index content">
    <?= $this->Html->link(__('New Sestavine'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Sestavine') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('ime') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sestavine as $sestavine): ?>
                <tr>
                    <td><?= $this->Number->format($sestavine->id) ?></td>
                    <td><?= h($sestavine->ime) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $sestavine->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sestavine->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sestavine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sestavine->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
