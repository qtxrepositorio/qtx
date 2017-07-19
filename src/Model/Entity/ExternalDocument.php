<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExternalDocument Entity
 *
 * @property int $id
 * @property string $number_document
 * @property string $local
 * @property int $client_id
 * @property string $client_name
 * @property string $client_contact
 * @property int $treatment_id
 * @property string $reference
 * @property string $subject
 * @property int $user_id
 * @property string $user_function
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Treatment $treatment
 * @property \App\Model\Entity\User $user
 */
class ExternalDocument extends Entity
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
