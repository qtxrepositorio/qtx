<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NoticesRoles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Notices
 * @property \Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \App\Model\Entity\NoticesRole get($primaryKey, $options = [])
 * @method \App\Model\Entity\NoticesRole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NoticesRole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NoticesRole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NoticesRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NoticesRole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NoticesRole findOrCreate($search, callable $callback = null)
 */
class NoticesRolesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('notices_roles');
        $this->displayField('notice_id');
        $this->primaryKey(['notice_id', 'role_id']);

        $this->belongsTo('Notices', [
            'foreignKey' => 'notice_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['notice_id'], 'Notices'));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }
}
