<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Recepti Entity
 *
 * @property int $id
 * @property int $uporabnik_id
 * @property string $naslov
 * @property string|null $opis
 * @property string $navodila
 * @property string|null $slika
 * @property string|null $kategorija
 * @property \Cake\I18n\FrozenTime|null $ustvarjen
 *
 * @property \App\Model\Entity\Uporabniki $uporabniki
 */
class Recepti extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'uporabnik_id' => true,
        'naslov' => true,
        'opis' => true,
        'navodila' => true,
        'slika' => true,
        'kategorija' => true,
        'ustvarjen' => true,
        'uporabniki' => true,
    ];
}
