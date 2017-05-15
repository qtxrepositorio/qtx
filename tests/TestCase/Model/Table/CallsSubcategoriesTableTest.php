<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CallsSubcategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CallsSubcategoriesTable Test Case
 */
class CallsSubcategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CallsSubcategoriesTable
     */
    public $CallsSubcategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('CallsSubcategories') ? [] : ['className' => 'App\Model\Table\CallsSubcategoriesTable'];
        $this->CallsSubcategories = TableRegistry::get('CallsSubcategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CallsSubcategories);

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
