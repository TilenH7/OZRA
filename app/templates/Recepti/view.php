<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recepti $recepti
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Recepti'), ['action' => 'edit', $recepti->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Recepti'), ['action' => 'delete', $recepti->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recepti->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Recepti'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Recepti'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="recepti view content">
            <h3><?= h($recepti->naslov) ?></h3>
            <table>
                <tr>
                    <th><?= __('Uporabniki') ?></th>
                    <td><?= $recepti->has('uporabniki') ? $this->Html->link($recepti->uporabniki->uporabnisko_ime, ['controller' => 'Uporabniki', 'action' => 'view', $recepti->uporabniki->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Naslov') ?></th>
                    <td><?= h($recepti->naslov) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slika') ?></th>
                    <td><?= h($recepti->slika) ?></td>
                </tr>
                <tr>
                    <th><?= __('Kategorija') ?></th>
                    <td><?= h($recepti->kategorija) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($recepti->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ustvarjen') ?></th>
                    <td><?= h($recepti->ustvarjen) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Opis') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($recepti->opis)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Navodila') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($recepti->navodila)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
