<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExternalDocumentsFixture
 *
 */
class ExternalDocumentsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => '10', 'autoIncrement' => true, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null],
        'number_document' => ['type' => 'string', 'length' => '10', 'null' => true, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'local' => ['type' => 'string', 'length' => '45', 'null' => false, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'client_id' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'client_name' => ['type' => 'string', 'length' => '45', 'null' => false, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'client_contact' => ['type' => 'string', 'length' => '45', 'null' => false, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'treatment_id' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'reference' => ['type' => 'string', 'length' => '45', 'null' => false, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'subject' => ['type' => 'string', 'length' => '45', 'null' => false, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'user_id' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'user_function' => ['type' => 'string', 'length' => '45', 'null' => false, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_treatment' => ['type' => 'foreign', 'columns' => ['treatment_id'], 'references' => ['treatments', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_sender_external_document' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'number_document' => 'Lorem ip',
            'local' => 'Lorem ipsum dolor sit amet',
            'client_id' => 1,
            'client_name' => 'Lorem ipsum dolor sit amet',
            'client_contact' => 'Lorem ipsum dolor sit amet',
            'treatment_id' => 1,
            'reference' => 'Lorem ipsum dolor sit amet',
            'subject' => 'Lorem ipsum dolor sit amet',
            'user_id' => 1,
            'user_function' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
