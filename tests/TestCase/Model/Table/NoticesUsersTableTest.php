<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NoticesUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NoticesUsersTable Test Case
 */
class NoticesUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NoticesUsersTable
     */
    public $NoticesUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.notices_users',
        'app.notices',
        'app.users',
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
        $config = TableRegistry::exists('NoticesUsers') ? [] : ['className' => 'App\Model\Table\NoticesUsersTable'];
        $this->NoticesUsers = TableRegistry::get('NoticesUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NoticesUsers);

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
