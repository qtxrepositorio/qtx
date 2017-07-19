<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExternalDocuments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $LocalsDocument
 * @property \Cake\ORM\Association\BelongsTo $Clients
 * @property \Cake\ORM\Association\BelongsTo $TreatmentsDocument
 * @property \Cake\ORM\Association\BelongsTo $ReferencesDocument
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\ExternalDocument get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExternalDocument newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ExternalDocument[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExternalDocument|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExternalDocument patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExternalDocument[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExternalDocument findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExternalDocumentsTable extends Table
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

        $this->table('external_documents');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('LocalsDocument', [
            'foreignKey' => 'local_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('TreatmentsDocument', [
            'foreignKey' => 'treatment_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ReferencesDocument', [
            'foreignKey' => 'reference_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->allowEmpty('number_document');

        $validator
            ->requirePresence('client_name', 'create')
            ->notEmpty('client_name');

        $validator
            ->requirePresence('client_contact', 'create')
            ->notEmpty('client_contact');

        $validator
            ->requirePresence('subject', 'create')
            ->notEmpty('subject');

        $validator
            ->requirePresence('user_function', 'create')
            ->notEmpty('user_function');

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
        $rules->add($rules->existsIn(['local_id'], 'LocalsDocument'));
        $rules->add($rules->existsIn(['client_id'], 'Clients'));
        $rules->add($rules->existsIn(['treatment_id'], 'TreatmentsDocument'));
        $rules->add($rules->existsIn(['reference_id'], 'ReferencesDocument'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
