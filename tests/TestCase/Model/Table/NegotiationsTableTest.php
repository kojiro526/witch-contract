<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NegotiationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NegotiationsTable Test Case
 */
class NegotiationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NegotiationsTable
     */
    public $Negotiations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.negotiations',
        'app.persons'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Negotiations') ? [] : ['className' => NegotiationsTable::class];
        $this->Negotiations = TableRegistry::get('Negotiations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Negotiations);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
