<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CallsImagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CallsImagesTable Test Case
 */
class CallsImagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CallsImagesTable
     */
    public $CallsImages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.calls_images',
        'app.calls',
        'app.users',
        'app.notices',
        'app.notices_users',
        'app.roles',
        'app.notices_roles',
        'app.roles_users',
        'app.calls_categories',
        'app.calls_responses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CallsImages') ? [] : ['className' => 'App\Model\Table\CallsImagesTable'];
        $this->CallsImages = TableRegistry::get('CallsImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CallsImages);

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
