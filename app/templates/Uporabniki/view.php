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
            <?= $this->Html->link(__('Edit Uporabniki'), ['action' => 'edit', $uporabniki->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Uporabniki'), ['action' => 'delete', $uporabniki->id], ['confirm' => __('Are you sure you want to delete # {0}?', $uporabniki->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Uporabniki'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Uporabniki'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="uporabniki view content">
            <h3><?= h($uporabniki->uporabnisko_ime) ?></h3>
            <table>
                <tr>
                    <th><?= __('Uporabnisko Ime') ?></th>
                    <td><?= h($uporabniki->uporabnisko_ime) ?></td>
                </tr>
                <tr>
                    <th><?= __('Geslo') ?></th>
                    <td><?= h($uporabniki->geslo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Eposta') ?></th>
                    <td><?= h($uporabniki->eposta) ?></td>
                </tr>
                <tr>
                    <th><?= __('Profilna Slika') ?></th>
                    <td><?= h($uporabniki->profilna_slika) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($uporabniki->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ustvarjen') ?></th>
                    <td><?= h($uporabniki->ustvarjen) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
