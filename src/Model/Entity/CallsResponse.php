<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CallsResponse Entity
 *
 * @property int $id
 * @property string $text
 * @property int $created_by
 * @property int $call_id
 * @property bool $visualized
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\Call $call
 */
class CallsResponse extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
