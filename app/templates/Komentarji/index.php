<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Komentarji> $komentarji
 */
?>
<div class="komentarji index content">
    <?= $this->Html->link(__('New Komentarji'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Komentarji') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('uporabnik_id') ?></th>
                    <th><?= $this->Paginator->sort('recept_id') ?></th>
                    <th><?= $this->Paginator->sort('ustvarjen') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($komentarji as $komentarji): ?>
                <tr>
                    <td><?= $this->Number->format($komentarji->id) ?></td>
                    <td><?= $komentarji->has('uporabniki') ? $this->Html->link($komentarji->uporabniki->uporabnisko_ime, ['controller' => 'Uporabniki', 'action' => 'view', $komentarji->uporabniki->id]) : '' ?></td>
                    <td><?= $komentarji->has('recepti') ? $this->Html->link($komentarji->recepti->naslov, ['controller' => 'Recepti', 'action' => 'view', $komentarji->recepti->id]) : '' ?></td>
                    <td><?= h($komentarji->ustvarjen) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $komentarji->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $komentarji->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $komentarji->id], ['confirm' => __('Are you sure you want to delete # {0}?', $komentarji->id)]) ?>
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
