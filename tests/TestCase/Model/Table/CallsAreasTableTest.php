<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CallsAreasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CallsAreasTable Test Case
 */
class CallsAreasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CallsAreasTable
     */
    public $CallsAreas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.calls_areas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CallsAreas') ? [] : ['className' => 'App\Model\Table\CallsAreasTable'];
        $this->CallsAreas = TableRegistry::get('CallsAreas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CallsAreas);

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
