<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CallsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CallsTable Test Case
 */
class CallsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CallsTable
     */
    public $Calls;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.calls',
        'app.calls_areas',
        'app.calls_categories',
        'app.calls_subcategories',
        'app.calls_status',
        'app.calls_urgency',
        'app.calls_solutions',
        'app.calls_files',
        'app.calls_responses',
        'app.users',
        'app.notices',
        'app.notices_users',
        'app.roles',
        'app.notices_roles',
        'app.roles_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Calls') ? [] : ['className' => 'App\Model\Table\CallsTable'];
        $this->Calls = TableRegistry::get('Calls', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Calls);

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
