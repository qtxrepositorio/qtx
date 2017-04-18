<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CallsResponsesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CallsResponsesTable Test Case
 */
class CallsResponsesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CallsResponsesTable
     */
    public $CallsResponses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.calls_responses',
        'app.calls'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CallsResponses') ? [] : ['className' => 'App\Model\Table\CallsResponsesTable'];
        $this->CallsResponses = TableRegistry::get('CallsResponses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CallsResponses);

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
