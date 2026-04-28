<?php $this->assign('title', 'Registracija'); ?>
<div class="auth-page">
    <div class="auth-card">
        <p class="eyebrow">Kuharska zbirka</p>
        <h1>Registracija</h1>
        <p>Ustvari nov račun.</p>

        <?= $this->Flash->render() ?>

        <?= $this->Form->create(null) ?>
            <?= $this->Form->control('uporabnisko_ime', [
                'label' => 'Uporabniško ime',
                'required' => true,
                'placeholder' => 'janez123'
            ]) ?>
            <?= $this->Form->control('eposta', [
                'label' => 'E-pošta',
                'type' => 'email',
                'required' => true,
                'placeholder' => 'janez@example.com'
            ]) ?>
            <?= $this->Form->control('geslo', [
                'label' => 'Geslo',
                'type' => 'password',
                'required' => true,
            ]) ?>
            <?= $this->Form->control('geslo_potrditev', [
                'label' => 'Potrdi geslo',
                'type' => 'password',
                'required' => true,
            ]) ?>
            <?= $this->Form->button('Registracija', ['class' => 'button primary']) ?>
        <?= $this->Form->end() ?>

        <p style="margin-top:1rem">Že imaš račun? <?= $this->Html->link('Prijava', ['action' => 'login']) ?></p>
    </div>
</div>