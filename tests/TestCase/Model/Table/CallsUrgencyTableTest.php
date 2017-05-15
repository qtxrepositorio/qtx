<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CallsUrgencyTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CallsUrgencyTable Test Case
 */
class CallsUrgencyTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CallsUrgencyTable
     */
    public $CallsUrgency;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.calls_urgency'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CallsUrgency') ? [] : ['className' => 'App\Model\Table\CallsUrgencyTable'];
        $this->CallsUrgency = TableRegistry::get('CallsUrgency', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CallsUrgency);

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
