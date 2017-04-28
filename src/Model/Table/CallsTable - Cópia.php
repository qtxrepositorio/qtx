<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Calls Model
 *
 * @property \Cake\ORM\Association\HasMany $CallsResponses
 *
 * @method \App\Model\Entity\Call get($primaryKey, $options = [])
 * @method \App\Model\Entity\Call newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Call[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Call|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Call patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Call[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Call findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CallsTable extends Table
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

        $this->table('calls');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        /*$this->hasOne('Users', [
            'foreignKey' => 'created_by'
        ]);

        $this->hasOne('Users', [
            'foreignKey' => 'attributed_to'
        ]);*/

        $this->belongsTo('Users', [
            'foreignKey' => 'created_by',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'attributed_to',
            'joinType' => 'INNER'
        ]);



        $this->hasOne('Categories', [
            'foreignKey' => 'call_id'
        ]);

        $this->hasMany('CallsResponses', [
            'foreignKey' => 'call_id'
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
            ->requirePresence('subject', 'create')
            ->notEmpty('subject');

        $validator
            ->allowEmpty('text');

        $validator
            ->requirePresence('urgency', 'create')
            ->notEmpty('urgency');

        $validator
            ->requirePresence('category', 'create')
            ->notEmpty('category');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->integer('attributed_to')
            ->requirePresence('attributed_to', 'create')
            ->notEmpty('attributed_to');

        $validator
            ->boolean('visualized')
            ->allowEmpty('visualized');

        return $validator;
    }
}
