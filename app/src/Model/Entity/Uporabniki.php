<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Uporabniki Entity
 *
 * @property int $id
 * @property string $uporabnisko_ime
 * @property string $geslo
 * @property string $eposta
 * @property string|null $profilna_slika
 * @property \Cake\I18n\FrozenTime|null $ustvarjen
 */
class Uporabniki extends Entity
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
        'uporabnisko_ime' => true,
        'geslo' => true,
        'eposta' => true,
        'profilna_slika' => true,
        'ustvarjen' => true,
    ];
}
