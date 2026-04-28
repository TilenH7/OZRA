<?php $this->assign('title', 'Nova objava'); ?>

<div class="form-card">
    <p class="eyebrow">Forum</p>
    <h1>Nova objava</h1>
    <p style="color:#666;margin-bottom:1.5rem">Objava bo avtomatsko dodana tudi med recepte.</p>

    <?= $this->Flash->render() ?>

    <?= $this->Form->create($recept) ?>

    <div class="form-group">
        <label>Naslov recepta *</label>
        <?= $this->Form->control('naslov', ['label' => false, 'placeholder' => 'Npr. Babičina juha', 'required' => true]) ?>
    </div>

    <div class="form-group">
        <label>Kategorije</label>
        <div class="kategorije-checkboxes">
            <?php
            $vseKategorije = ['kosilo' => 'Kosilo', 'vecerja' => 'Večerja', 'zajtrk' => 'Zajtrk', 'sladica' => 'Sladica', 'glavna_jed' => 'Glavna jed', 'juha' => 'Juha', 'solata' => 'Solata', 'pijaca' => 'Pijača'];
            foreach ($vseKategorije as $key => $label): ?>
            <label class="kategorija-chip" onclick="toggleChip(this)">
                <input type="checkbox" name="kategorije[]" value="<?= $key ?>">
                <?= $label ?>
            </label>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="form-group">
        <label>Kratek opis</label>
        <?= $this->Form->control('opis', ['label' => false, 'placeholder' => 'Kratek opis...', 'rows' => 3]) ?>
    </div>

    <div class="form-group">
        <label>Navodila za pripravo *</label>
        <?= $this->Form->control('navodila', ['label' => false, 'placeholder' => 'Korak 1: ...', 'rows' => 6, 'required' => true]) ?>
    </div>
    <div class="form-group">
        <label>URL slike (neobvezno)</label>
        <?= $this->Form->control('slika', ['label' => false, 'placeholder' => 'https://...', 'type' => 'url']) ?>
    </div>
    
    <?= $this->Form->button('Objavi', ['class' => 'button primary', 'style' => 'width:100%']) ?>
    <?= $this->Html->link('Prekliči', ['action' => 'index'], ['class' => 'button ghost', 'style' => 'width:100%;text-align:center;margin-top:0.5rem;display:block']) ?>

    <?= $this->Form->end() ?>
</div>

<script>
function toggleChip(label) {
    const checkbox = label.querySelector('input');
    checkbox.checked = !checkbox.checked;
    label.classList.toggle('selected', checkbox.checked);
}
</script>