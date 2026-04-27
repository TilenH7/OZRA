<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * KomentarjiFixture
 */
class KomentarjiFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'komentarji';
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
                'uporabnik_id' => 1,
                'recept_id' => 1,
                'vsebina' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'ustvarjen' => '2026-04-27 20:44:20',
            ],
        ];
        parent::init();
    }
}
