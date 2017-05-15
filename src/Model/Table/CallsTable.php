<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Calls Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CallsAreas
 * @property \Cake\ORM\Association\BelongsTo $CallsCategories
 * @property \Cake\ORM\Association\BelongsTo $CallsSubcategories
 * @property \Cake\ORM\Association\BelongsTo $CallsStatus
 * @property \Cake\ORM\Association\BelongsTo $CallsUrgency
 * @property \Cake\ORM\Association\BelongsTo $CallsSolutions
 * @property \Cake\ORM\Association\HasMany $CallsFiles
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

        $this->belongsTo('CallsAreas', [
            'foreignKey' => 'area_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CallsCategories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CallsSubcategories', [
            'foreignKey' => 'subcategory_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CallsStatus', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CallsUrgency', [
            'foreignKey' => 'urgency_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CallsSolutions', [
            'foreignKey' => 'solution_id'
        ]);
        $this->hasMany('CallsFiles', [
            'foreignKey' => 'call_id'
        ]);
        $this->hasMany('CallsResponses', [
            'foreignKey' => 'call_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'created_by'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'attributed_to'
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['area_id'], 'CallsAreas'));
        $rules->add($rules->existsIn(['category_id'], 'CallsCategories'));
        $rules->add($rules->existsIn(['subcategory_id'], 'CallsSubcategories'));
        $rules->add($rules->existsIn(['status_id'], 'CallsStatus'));
        $rules->add($rules->existsIn(['urgency_id'], 'CallsUrgency'));
        $rules->add($rules->existsIn(['solution_id'], 'CallsSolutions'));

        return $rules;
    }
}
