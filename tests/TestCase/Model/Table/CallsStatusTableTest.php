<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CallsStatusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CallsStatusTable Test Case
 */
class CallsStatusTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CallsStatusTable
     */
    public $CallsStatus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.calls_status'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CallsStatus') ? [] : ['className' => 'App\Model\Table\CallsStatusTable'];
        $this->CallsStatus = TableRegistry::get('CallsStatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CallsStatus);

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
