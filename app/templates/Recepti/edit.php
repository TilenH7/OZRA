<?php $this->assign('title', 'Uredi recept'); ?>

<div class="form-card">
    <p class="eyebrow">Recepti</p>
    <h1>Uredi recept</h1>
    <p style="color:#666;margin-bottom:1.5rem">Posodobi podatke o receptu.</p>

    <?= $this->Flash->render() ?>

    <?= $this->Form->create($recepti) ?>

    <div class="form-group">
        <label>Naslov *</label>
        <?= $this->Form->control('naslov', ['label' => false, 'placeholder' => 'Npr. Špageti carbonara', 'required' => true]) ?>
    </div>

    <div class="form-group">
        <label>Kategorije</label>
        <div class="kategorije-checkboxes" id="kategorije-chips">
            <?php
            $vseKategorije = ['kosilo' => 'Kosilo', 'vecerja' => 'Večerja', 'zajtrk' => 'Zajtrk', 'sladica' => 'Sladica', 'glavna_jed' => 'Glavna jed', 'juha' => 'Juha', 'solata' => 'Solata', 'pijaca' => 'Pijača'];
            $trenutneKat = explode(', ', $recepti->kategorija ?? '');
            foreach ($vseKategorije as $key => $label):
                $selected = in_array($key, $trenutneKat) ? 'selected' : '';
            ?>
            <label class="kategorija-chip <?= $selected ?>" onclick="toggleChip(this)">
                <input type="checkbox" name="kategorije[]" value="<?= $key ?>" <?= $selected ? 'checked' : '' ?>>
                <?= $label ?>
            </label>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="form-group">
        <label>Kratek opis</label>
        <?= $this->Form->control('opis', ['label' => false, 'placeholder' => 'Kratek opis recepta...', 'rows' => 3]) ?>
    </div>

    <div class="form-group">
        <label>Navodila za pripravo *</label>
        <?= $this->Form->control('navodila', ['label' => false, 'placeholder' => 'Korak 1: ...', 'rows' => 6, 'required' => true]) ?>
    </div>

    <div class="form-group">
        <label>URL slike (neobvezno)</label>
        <?= $this->Form->control('slika', ['label' => false, 'placeholder' => 'https://...', 'type' => 'url']) ?>
    </div>

    <?= $this->Form->button('Shrani spremembe', ['class' => 'button primary', 'style' => 'width:100%']) ?>
    <?= $this->Html->link('Prekliči', ['action' => 'view', $recepti->id], ['class' => 'button ghost', 'style' => 'width:100%;text-align:center;margin-top:0.5rem;display:block']) ?>

    <?= $this->Form->end() ?>
</div>

<script>
function toggleChip(label) {
    const checkbox = label.querySelector('input');
    checkbox.checked = !checkbox.checked;
    label.classList.toggle('selected', checkbox.checked);
}
</script>