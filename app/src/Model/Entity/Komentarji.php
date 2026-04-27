<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Komentarji Entity
 *
 * @property int $id
 * @property int $uporabnik_id
 * @property int $recept_id
 * @property string $vsebina
 * @property \Cake\I18n\FrozenTime|null $ustvarjen
 *
 * @property \App\Model\Entity\Uporabniki $uporabniki
 * @property \App\Model\Entity\Recepti $recepti
 */
class Komentarji extends Entity
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
        'recept_id' => true,
        'vsebina' => true,
        'ustvarjen' => true,
        'uporabniki' => true,
        'recepti' => true,
    ];
}
