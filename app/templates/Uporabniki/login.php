<div class="auth-page">
    <div class="auth-card">
        <p class="eyebrow">Kuharska zbirka</p>
        <h1>Prijava</h1>
        <p>Prijavi se z emailom in geslom.</p>

        <?= $this->Flash->render() ?>

        <?= $this->Form->create(null) ?>
            <?= $this->Form->control('eposta', [
                'label' => 'Email',
                'type' => 'email',
                'required' => true,
                'placeholder' => 'nina@example.com'
            ]) ?>

            <?= $this->Form->control('geslo', [
                'label' => 'Geslo',
                'type' => 'password',
                'required' => true,
                'placeholder' => 'admin123'
            ]) ?>

            <?= $this->Form->button('Prijava', ['class' => 'button-primary']) ?>
        <?= $this->Form->end() ?>

        <div class="login-help">
            <strong>Test prijave:</strong><br>
            Admin: nina@example.com / admin123<br>
            Uporabnik: marko@example.com / user123
        </div>
    </div>
</div>