<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LocalsDocumentTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LocalsDocumentTable Test Case
 */
class LocalsDocumentTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LocalsDocumentTable
     */
    public $LocalsDocument;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.locals_document'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('LocalsDocument') ? [] : ['className' => 'App\Model\Table\LocalsDocumentTable'];
        $this->LocalsDocument = TableRegistry::get('LocalsDocument', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LocalsDocument);

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
