<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Call Entity
 *
 * @property int $id
 * @property string $subject
 * @property string $text
 * @property int $area_id
 * @property int $category_id
 * @property int $subcategory_id
 * @property int $status_id
 * @property int $urgency_id
 * @property int $solution_id
 * @property int $created_by
 * @property int $attributed_to
 * @property bool $visualized
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\CallsArea $calls_area
 * @property \App\Model\Entity\CallsCategory $calls_category
 * @property \App\Model\Entity\CallsSubcategory $calls_subcategory
 * @property \App\Model\Entity\CallsStatus $calls_status
 * @property \App\Model\Entity\CallsUrgency $calls_urgency
 * @property \App\Model\Entity\CallsSolution $calls_solution
 * @property \App\Model\Entity\CallsFile[] $calls_files
 * @property \App\Model\Entity\CallsResponse[] $calls_responses
 * @property \App\Model\Entity\User[] $users
 */
class Call extends Entity
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
