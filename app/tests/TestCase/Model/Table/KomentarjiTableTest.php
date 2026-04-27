<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KomentarjiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KomentarjiTable Test Case
 */
class KomentarjiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\KomentarjiTable
     */
    protected $Komentarji;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Komentarji',
        'app.Uporabniki',
        'app.Recepti',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Komentarji') ? [] : ['className' => KomentarjiTable::class];
        $this->Komentarji = $this->getTableLocator()->get('Komentarji', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Komentarji);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\KomentarjiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\KomentarjiTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
