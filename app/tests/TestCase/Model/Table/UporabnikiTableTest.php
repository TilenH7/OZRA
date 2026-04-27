<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UporabnikiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UporabnikiTable Test Case
 */
class UporabnikiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UporabnikiTable
     */
    protected $Uporabniki;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
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
        $config = $this->getTableLocator()->exists('Uporabniki') ? [] : ['className' => UporabnikiTable::class];
        $this->Uporabniki = $this->getTableLocator()->get('Uporabniki', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Uporabniki);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UporabnikiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UporabnikiTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
