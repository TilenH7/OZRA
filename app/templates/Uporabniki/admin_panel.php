<div class="dashboard-page">
    <div class="hero-card">
        <p class="eyebrow">Admin panel</p>
        <h1>Dobrodošel/a, <?= h($uporabnik['uporabnisko_ime']) ?>.</h1>
        <p>Tukaj lahko upravljaš uporabnike, recepte, sestavine in komentarje.</p>

        <div class="actions">
            <?= $this->Html->link('Uporabniki', ['action' => 'index'], ['class' => 'button-primary']) ?>
            <?= $this->Html->link('Odjava', ['action' => 'logout'], ['class' => 'button-secondary']) ?>
        </div>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <strong><?= h($stats['uporabniki']) ?></strong>
            <span>uporabniki</span>
        </div>
    </div>
</div>