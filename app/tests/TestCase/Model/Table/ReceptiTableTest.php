<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReceptiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReceptiTable Test Case
 */
class ReceptiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ReceptiTable
     */
    protected $Recepti;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Recepti',
        'app.Uporabniki',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Recepti') ? [] : ['className' => ReceptiTable::class];
        $this->Recepti = $this->getTableLocator()->get('Recepti', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Recepti);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ReceptiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ReceptiTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
