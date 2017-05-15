<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CallsSolutionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CallsSolutionsTable Test Case
 */
class CallsSolutionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CallsSolutionsTable
     */
    public $CallsSolutions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.calls_solutions',
        'app.calls_subcategories',
        'app.calls_categories',
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
        $config = TableRegistry::exists('CallsSolutions') ? [] : ['className' => 'App\Model\Table\CallsSolutionsTable'];
        $this->CallsSolutions = TableRegistry::get('CallsSolutions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CallsSolutions);

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
