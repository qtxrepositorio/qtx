<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 *
 */
class UsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => '10', 'autoIncrement' => true, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null],
        'name' => ['type' => 'string', 'length' => '100', 'null' => false, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'cpf' => ['type' => 'string', 'length' => '11', 'null' => false, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'username' => ['type' => 'string', 'length' => '50', 'null' => false, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => '255', 'null' => false, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'status' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => 0, 'precision' => null, 'comment' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'email' => ['type' => 'string', 'length' => '100', 'null' => true, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
            'name' => 'Lorem ipsum dolor sit amet',
            'cpf' => 'Lorem ips',
            'username' => 'Lorem ipsum dolor sit amet',
            'password' => 'Lorem ipsum dolor sit amet',
            'status' => 1,
            'created' => 1493294077,
            'modified' => 1493294077,
            'email' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
