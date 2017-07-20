<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TreatmentsDocumentTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TreatmentsDocumentTable Test Case
 */
class TreatmentsDocumentTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TreatmentsDocumentTable
     */
    public $TreatmentsDocument;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.treatments_document'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TreatmentsDocument') ? [] : ['className' => 'App\Model\Table\TreatmentsDocumentTable'];
        $this->TreatmentsDocument = TableRegistry::get('TreatmentsDocument', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TreatmentsDocument);

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
