<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RolesUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RolesUsersTable Test Case
 */
class RolesUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RolesUsersTable
     */
    public $RolesUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.roles_users',
        'app.roles',
        'app.notices',
        'app.users',
        'app.notices_users',
        'app.notices_roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RolesUsers') ? [] : ['className' => 'App\Model\Table\RolesUsersTable'];
        $this->RolesUsers = TableRegistry::get('RolesUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RolesUsers);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
