<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NoticesRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NoticesRolesTable Test Case
 */
class NoticesRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NoticesRolesTable
     */
    public $NoticesRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.notices_roles',
        'app.notices',
        'app.users',
        'app.notices_users',
        'app.roles',
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
        $config = TableRegistry::exists('NoticesRoles') ? [] : ['className' => 'App\Model\Table\NoticesRolesTable'];
        $this->NoticesRoles = TableRegistry::get('NoticesRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NoticesRoles);

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
