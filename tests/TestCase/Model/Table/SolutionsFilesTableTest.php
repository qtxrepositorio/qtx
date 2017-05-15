<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SolutionsFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SolutionsFilesTable Test Case
 */
class SolutionsFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SolutionsFilesTable
     */
    public $SolutionsFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.solutions_files',
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
        $config = TableRegistry::exists('SolutionsFiles') ? [] : ['className' => 'App\Model\Table\SolutionsFilesTable'];
        $this->SolutionsFiles = TableRegistry::get('SolutionsFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SolutionsFiles);

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
