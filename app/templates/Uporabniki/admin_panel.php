<?php $this->assign('title', 'Admin panel'); ?>

<div style="max-width:1000px;margin:2rem auto;padding:0 1rem">
    <div style="background:white;border-radius:16px;padding:2rem;margin-bottom:2rem;box-shadow:0 4px 20px rgba(0,0,0,0.08)">
        <p class="eyebrow">Administracija</p>
        <h1 style="margin:0">Admin panel</h1>
    </div>

    <!-- Statistika -->
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;margin-bottom:2rem">
        <div style="background:white;border-radius:12px;padding:1.5rem;text-align:center;box-shadow:0 2px 10px rgba(0,0,0,0.06)">
            <div style="font-size:2.5rem;font-weight:700;color:#7400B8"><?= $stats['uporabniki'] ?></div>
            <div style="color:#666;margin-top:0.3rem">Uporabniki</div>
        </div>
        <div style="background:white;border-radius:12px;padding:1.5rem;text-align:center;box-shadow:0 2px 10px rgba(0,0,0,0.06)">
            <div style="font-size:2.5rem;font-weight:700;color:#7400B8"><?= $stats['recepti'] ?></div>
            <div style="color:#666;margin-top:0.3rem">Recepti</div>
        </div>
        <div style="background:white;border-radius:12px;padding:1.5rem;text-align:center;box-shadow:0 2px 10px rgba(0,0,0,0.06)">
            <div style="font-size:2.5rem;font-weight:700;color:#7400B8"><?= $stats['komentarji'] ?></div>
            <div style="color:#666;margin-top:0.3rem">Komentarji</div>
        </div>
    </div>

    <!-- Uporabniki -->
    <div style="background:white;border-radius:12px;padding:1.5rem;margin-bottom:2rem;box-shadow:0 2px 10px rgba(0,0,0,0.06)">
        <h2 style="margin-top:0;margin-bottom:1rem;font-size:1.2rem">Uporabniki</h2>
        <table style="width:100%;border-collapse:collapse">
            <thead>
                <tr style="border-bottom:2px solid #f0f0f0">
                    <th style="text-align:left;padding:0.6rem;color:#666;font-size:0.85rem">ID</th>
                    <th style="text-align:left;padding:0.6rem;color:#666;font-size:0.85rem">Uporabniško ime</th>
                    <th style="text-align:left;padding:0.6rem;color:#666;font-size:0.85rem">E-pošta</th>
                    <th style="text-align:left;padding:0.6rem;color:#666;font-size:0.85rem">Vloga</th>
                    <th style="text-align:right;padding:0.6rem;color:#666;font-size:0.85rem">Akcija</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vsiUporabniki as $u): ?>
                <tr style="border-bottom:1px solid #f5f5f5">
                    <td style="padding:0.7rem 0.6rem;color:#999;font-size:0.85rem"><?= $u->id ?></td>
                    <td style="padding:0.7rem 0.6rem;font-weight:600"><?= h($u->uporabnisko_ime) ?></td>
                    <td style="padding:0.7rem 0.6rem;color:#555"><?= h($u->eposta) ?></td>
                    <td style="padding:0.7rem 0.6rem">
                        <span style="background:<?= $u->vloga === 'admin' ? '#f5f0ff' : '#f0f9ff' ?>;color:<?= $u->vloga === 'admin' ? '#7400B8' : '#0077cc' ?>;padding:0.2rem 0.6rem;border-radius:20px;font-size:0.8rem;font-weight:600">
                            <?= h($u->vloga ?? 'uporabnik') ?>
                        </span>
                    </td>
                    <td style="padding:0.7rem 0.6rem;text-align:right">
                        <?= $this->Form->postLink('Izbriši', ['action' => 'izbrisiUporabnika', $u->id], ['confirm' => 'Res izbrišem?', 'style' => 'color:#e53e3e;font-size:0.85rem;text-decoration:none']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Recepti -->
    <div style="background:white;border-radius:12px;padding:1.5rem;margin-bottom:2rem;box-shadow:0 2px 10px rgba(0,0,0,0.06)">
        <h2 style="margin-top:0;margin-bottom:1rem;font-size:1.2rem">Recepti</h2>
        <table style="width:100%;border-collapse:collapse">
            <thead>
                <tr style="border-bottom:2px solid #f0f0f0">
                    <th style="text-align:left;padding:0.6rem;color:#666;font-size:0.85rem">ID</th>
                    <th style="text-align:left;padding:0.6rem;color:#666;font-size:0.85rem">Naslov</th>
                    <th style="text-align:left;padding:0.6rem;color:#666;font-size:0.85rem">Avtor</th>
                    <th style="text-align:right;padding:0.6rem;color:#666;font-size:0.85rem">Akcija</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vsiRecepti as $r): ?>
                <tr style="border-bottom:1px solid #f5f5f5">
                    <td style="padding:0.7rem 0.6rem;color:#999;font-size:0.85rem"><?= $r->id ?></td>
                    <td style="padding:0.7rem 0.6rem;font-weight:600"><?= h($r->naslov) ?></td>
                    <td style="padding:0.7rem 0.6rem;color:#555"><?= h($r->uporabniki->uporabnisko_ime ?? '-') ?></td>
                    <td style="padding:0.7rem 0.6rem;text-align:right">
                        <?= $this->Form->postLink('Izbriši', ['action' => 'izbrisiRecept', $r->id], ['confirm' => 'Res izbrišem?', 'style' => 'color:#e53e3e;font-size:0.85rem;text-decoration:none']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Komentarji -->
    <div style="background:white;border-radius:12px;padding:1.5rem;margin-bottom:2rem;box-shadow:0 2px 10px rgba(0,0,0,0.06)">
        <h2 style="margin-top:0;margin-bottom:1rem;font-size:1.2rem">Komentarji</h2>
        <?php if (empty($vsiKomentarji->toArray())): ?>
            <p style="color:#999">Ni komentarjev.</p>
        <?php else: ?>
        <table style="width:100%;border-collapse:collapse">
            <thead>
                <tr style="border-bottom:2px solid #f0f0f0">
                    <th style="text-align:left;padding:0.6rem;color:#666;font-size:0.85rem">ID</th>
                    <th style="text-align:left;padding:0.6rem;color:#666;font-size:0.85rem">Vsebina</th>
                    <th style="text-align:left;padding:0.6rem;color:#666;font-size:0.85rem">Avtor</th>
                    <th style="text-align:right;padding:0.6rem;color:#666;font-size:0.85rem">Akcija</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vsiKomentarji as $k): ?>
                <tr style="border-bottom:1px solid #f5f5f5">
                    <td style="padding:0.7rem 0.6rem;color:#999;font-size:0.85rem"><?= $k->id ?></td>
                    <td style="padding:0.7rem 0.6rem"><?= h($this->Text->truncate($k->vsebina, 60)) ?></td>
                    <td style="padding:0.7rem 0.6rem;color:#555"><?= h($k->uporabniki->uporabnisko_ime ?? '-') ?></td>
                    <td style="padding:0.7rem 0.6rem;text-align:right">
                        <?= $this->Form->postLink('Izbriši', ['action' => 'izbrisiKomentar', $k->id], ['confirm' => 'Res izbrišem?', 'style' => 'color:#e53e3e;font-size:0.85rem;text-decoration:none']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>

    <p><?= $this->Html->link('← Nazaj na recepte', ['controller' => 'Recepti', 'action' => 'index']) ?></p>
</div>