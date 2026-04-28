<div class="dashboard-page">
    <div class="hero-card">
        <p class="eyebrow">Uporabniški panel</p>
        <h1>Živjo, <?= h($uporabnik['uporabnisko_ime']) ?>.</h1>
        <p>Prijavljen/a si kot navaden uporabnik.</p>

        <div class="actions">
            <?= $this->Html->link('Preglej recepte', ['controller' => 'Recepti', 'action' => 'index'], ['class' => 'button-primary']) ?>
            <?= $this->Html->link('Odjava', ['action' => 'logout'], ['class' => 'button-secondary']) ?>
        </div>
    </div>

    <div class="profile-card">
        <h2>Tvoji podatki</h2>
        <p><strong>Uporabniško ime:</strong> <?= h($uporabnik['uporabnisko_ime']) ?></p>
        <p><strong>Email:</strong> <?= h($uporabnik['eposta']) ?></p>
        <p><strong>Vloga:</strong> <?= h($uporabnik['vloga']) ?></p>
    </div>
</div>