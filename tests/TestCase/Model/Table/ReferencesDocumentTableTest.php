<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReferencesDocumentTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReferencesDocumentTable Test Case
 */
class ReferencesDocumentTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReferencesDocumentTable
     */
    public $ReferencesDocument;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.references_document'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ReferencesDocument') ? [] : ['className' => 'App\Model\Table\ReferencesDocumentTable'];
        $this->ReferencesDocument = TableRegistry::get('ReferencesDocument', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReferencesDocument);

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
