<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Komentarji $komentarji
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Komentarji'), ['action' => 'edit', $komentarji->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Komentarji'), ['action' => 'delete', $komentarji->id], ['confirm' => __('Are you sure you want to delete # {0}?', $komentarji->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Komentarji'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Komentarji'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="komentarji view content">
            <h3><?= h($komentarji->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Uporabniki') ?></th>
                    <td><?= $komentarji->has('uporabniki') ? $this->Html->link($komentarji->uporabniki->uporabnisko_ime, ['controller' => 'Uporabniki', 'action' => 'view', $komentarji->uporabniki->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Recepti') ?></th>
                    <td><?= $komentarji->has('recepti') ? $this->Html->link($komentarji->recepti->naslov, ['controller' => 'Recepti', 'action' => 'view', $komentarji->recepti->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($komentarji->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ustvarjen') ?></th>
                    <td><?= h($komentarji->ustvarjen) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Vsebina') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($komentarji->vsebina)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
