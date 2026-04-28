<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Uporabniki extends Entity
{
    protected $_accessible = [
        'uporabnisko_ime' => true,
        'geslo' => true,
        'eposta' => true,
        'profilna_slika' => true,
        'vloga' => true,
        'ustvarjen' => true,
    ];
}