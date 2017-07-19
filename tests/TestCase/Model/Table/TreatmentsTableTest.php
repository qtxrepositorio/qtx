<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TreatmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TreatmentsTable Test Case
 */
class TreatmentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TreatmentsTable
     */
    public $Treatments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.treatments',
        'app.external_documents'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Treatments') ? [] : ['className' => 'App\Model\Table\TreatmentsTable'];
        $this->Treatments = TableRegistry::get('Treatments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Treatments);

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
