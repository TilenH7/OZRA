<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UporabnikiFixture
 */
class UporabnikiFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'uporabniki';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'uporabnisko_ime' => 'Lorem ipsum dolor sit amet',
                'geslo' => 'Lorem ipsum dolor sit amet',
                'eposta' => 'Lorem ipsum dolor sit amet',
                'profilna_slika' => 'Lorem ipsum dolor sit amet',
                'ustvarjen' => '2026-04-27 20:43:31',
            ],
        ];
        parent::init();
    }
}
