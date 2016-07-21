<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RolesUsers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Roles
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\RolesUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\RolesUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RolesUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RolesUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RolesUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RolesUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RolesUser findOrCreate($search, callable $callback = null)
 */
class RolesUsersTable extends Table
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

        $this->table('roles_users');
        $this->displayField('role_id');
        $this->primaryKey(['role_id', 'user_id']);

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
        $rules->add($rules->existsIn(['role_id'], 'Roles'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
