<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * CallsResponses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Calls
 *
 * @method \App\Model\Entity\CallsResponse get($primaryKey, $options = [])
 * @method \App\Model\Entity\CallsResponse newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CallsResponse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CallsResponse|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CallsResponse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CallsResponse[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CallsResponse findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CallsResponsesTable extends Table
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

        $this->table('calls_responses');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Calls', [
            'foreignKey' => 'call_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('text');

        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->boolean('visualized')
            ->allowEmpty('visualized');

        return $validator;
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
        $rules->add($rules->existsIn(['call_id'], 'Calls'));

        return $rules;
    }

    public function deleteResponeses($call_id){

        $connection = ConnectionManager::get('default');
        $noticesRoles = $connection->execute("DELETE
            FROM [calls_responses]
        WHERE [call_id] = $call_id");

    }
}
