<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NoticesUsers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Notices
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\NoticesUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\NoticesUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NoticesUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NoticesUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NoticesUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NoticesUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NoticesUser findOrCreate($search, callable $callback = null)
 */
class NoticesUsersTable extends Table
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

        $this->table('notices_users');
        $this->displayField('notice_id');
        $this->primaryKey(['notice_id', 'user_id']);

        $this->belongsTo('Notices', [
            'foreignKey' => 'notice_id',
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
        $rules->add($rules->existsIn(['notice_id'], 'Notices'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
