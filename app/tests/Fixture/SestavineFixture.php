<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SestavineFixture
 */
class SestavineFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'sestavine';
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
                'ime' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
