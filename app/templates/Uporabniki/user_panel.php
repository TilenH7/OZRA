<?php $this->assign('title', 'Moj profil'); ?>

<div class="auth-page">
    <div class="auth-card" style="max-width:560px">
        <p class="eyebrow">Uporabniški panel</p>
        <h1>Živjo, <?= h($uporabnik['uporabnisko_ime']) ?>.</h1>
        <p>Upravljaj s svojim računom.</p>

        <!-- Podatki -->
        <div style="background:#f5f0ff;border-radius:10px;padding:1.2rem;margin-bottom:1.5rem">
            <h3 style="margin-bottom:1rem">Tvoji podatki</h3>
            <div style="display:flex;flex-direction:column;gap:0.6rem">
                <div style="display:flex;justify-content:space-between">
                    <span style="color:#666">Uporabniško ime</span>
                    <strong><?= h($uporabnik['uporabnisko_ime']) ?></strong>
                </div>
                <div style="display:flex;justify-content:space-between">
                    <span style="color:#666">E-pošta</span>
                    <strong><?= h($uporabnik['eposta']) ?></strong>
                </div>
                <div style="display:flex;justify-content:space-between">
                    <span style="color:#666">Vloga</span>
                    <strong><?= h($uporabnik['vloga'] ?? 'uporabnik') ?></strong>
                </div>
            </div>
        </div>

        <!-- Akcije -->
        <div style="display:flex;gap:1rem">
            <?= $this->Html->link('Preglej recepte', ['controller' => 'Recepti', 'action' => 'index'], ['class' => 'button primary', 'style' => 'flex:1;text-align:center']) ?>
            <?= $this->Html->link('Odjava', ['action' => 'logout'], ['class' => 'button ghost', 'style' => 'flex:1;text-align:center']) ?>
        </div>
    </div>
</div>
