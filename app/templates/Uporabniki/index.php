<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Uporabniki> $uporabniki
 */
?>
<div class="uporabniki index content">
    <?= $this->Html->link(__('New Uporabniki'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Uporabniki') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('uporabnisko_ime') ?></th>
                    <th><?= $this->Paginator->sort('geslo') ?></th>
                    <th><?= $this->Paginator->sort('eposta') ?></th>
                    <th><?= $this->Paginator->sort('profilna_slika') ?></th>
                    <th><?= $this->Paginator->sort('ustvarjen') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($uporabniki as $uporabniki): ?>
                <tr>
                    <td><?= $this->Number->format($uporabniki->id) ?></td>
                    <td><?= h($uporabniki->uporabnisko_ime) ?></td>
                    <td><?= h($uporabniki->geslo) ?></td>
                    <td><?= h($uporabniki->eposta) ?></td>
                    <td><?= h($uporabniki->profilna_slika) ?></td>
                    <td><?= h($uporabniki->ustvarjen) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $uporabniki->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $uporabniki->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $uporabniki->id], ['confirm' => __('Are you sure you want to delete # {0}?', $uporabniki->id)]) ?>
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
