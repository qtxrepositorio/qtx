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
        'app.users',
        'app.notices',
        'app.notices_users',
        'app.roles',
        'app.notices_roles',
        'app.roles_users',
        'app.calls_responses'
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
}