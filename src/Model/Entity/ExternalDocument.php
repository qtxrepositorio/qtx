<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExternalDocument Entity
 *
 * @property int $id
 * @property string $number_document
 * @property int $local_id
 * @property int $client_id
 * @property string $client_name
 * @property string $client_contact
 * @property int $treatment_id
 * @property int $reference_id
 * @property string $subject
 * @property int $user_id
 * @property string $user_function
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\TreatmentsDocument $treatments_document
 * @property \App\Model\Entity\ReferencesDocument $references_document
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
