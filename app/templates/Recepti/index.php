<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Recepti> $recepti
 */
?>
<div class="recepti index content">
    <?= $this->Html->link(__('New Recepti'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Recepti') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('uporabnik_id') ?></th>
                    <th><?= $this->Paginator->sort('naslov') ?></th>
                    <th><?= $this->Paginator->sort('slika') ?></th>
                    <th><?= $this->Paginator->sort('kategorija') ?></th>
                    <th><?= $this->Paginator->sort('ustvarjen') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recepti as $recepti): ?>
                <tr>
                    <td><?= $this->Number->format($recepti->id) ?></td>
                    <td><?= $recepti->has('uporabniki') ? $this->Html->link($recepti->uporabniki->uporabnisko_ime, ['controller' => 'Uporabniki', 'action' => 'view', $recepti->uporabniki->id]) : '' ?></td>
                    <td><?= h($recepti->naslov) ?></td>
                    <td><?= h($recepti->slika) ?></td>
                    <td><?= h($recepti->kategorija) ?></td>
                    <td><?= h($recepti->ustvarjen) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $recepti->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $recepti->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $recepti->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recepti->id)]) ?>
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
