<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CallsFixture
 *
 */
class CallsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => '10', 'autoIncrement' => true, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null],
        'subject' => ['type' => 'string', 'length' => '100', 'null' => false, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'text' => ['type' => 'string', 'length' => '500', 'null' => true, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'area_id' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'category_id' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'subcategory_id' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'status_id' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'urgency_id' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'solution_id' => ['type' => 'integer', 'length' => '10', 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'created_by' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'attributed_to' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'visualized' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => 0, 'precision' => null, 'comment' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_call_area_key' => ['type' => 'foreign', 'columns' => ['area_id'], 'references' => ['calls_areas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_call_categorie_key' => ['type' => 'foreign', 'columns' => ['category_id'], 'references' => ['calls_categories', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_call_solution_key' => ['type' => 'foreign', 'columns' => ['solution_id'], 'references' => ['calls_solutions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_call_status_key' => ['type' => 'foreign', 'columns' => ['status_id'], 'references' => ['calls_status', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_call_subcategorie_key' => ['type' => 'foreign', 'columns' => ['subcategory_id'], 'references' => ['calls_subcategories', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_call_urgency_key' => ['type' => 'foreign', 'columns' => ['urgency_id'], 'references' => ['calls_urgency', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_sender_call_key' => ['type' => 'foreign', 'columns' => ['created_by'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_receiver_call_key' => ['type' => 'foreign', 'columns' => ['attributed_to'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'subject' => 'Lorem ipsum dolor sit amet',
            'text' => 'Lorem ipsum dolor sit amet',
            'area_id' => 1,
            'category_id' => 1,
            'subcategory_id' => 1,
            'status_id' => 1,
            'urgency_id' => 1,
            'solution_id' => 1,
            'created_by' => 1,
            'attributed_to' => 1,
            'visualized' => 1,
            'created' => 1494866075,
            'modified' => 1494866075
        ],
    ];
}
