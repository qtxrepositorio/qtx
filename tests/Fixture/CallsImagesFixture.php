<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CallsImagesFixture
 *
 */
class CallsImagesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => '10', 'autoIncrement' => true, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null],
        'text' => ['type' => 'string', 'length' => '500', 'null' => true, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'image' => ['type' => 'string', 'length' => '255', 'null' => true, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'call_id' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_call_image_key' => ['type' => 'foreign', 'columns' => ['call_id'], 'references' => ['calls', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'text' => 'Lorem ipsum dolor sit amet',
            'image' => 'Lorem ipsum dolor sit amet',
            'call_id' => 1,
            'created' => 1494249733
        ],
    ];
}
