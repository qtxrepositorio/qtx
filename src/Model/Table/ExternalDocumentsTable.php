<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExternalDocuments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Clients
 * @property \Cake\ORM\Association\BelongsTo $Treatments
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\ExternalDocument get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExternalDocument newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ExternalDocument[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExternalDocument|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExternalDocument patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExternalDocument[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExternalDocument findOrCreate($search, callable $callback = null)
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

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Treatments', [
            'foreignKey' => 'treatment_id',
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
            ->requirePresence('local', 'create')
            ->notEmpty('local');

        $validator
            ->requirePresence('client_name', 'create')
            ->notEmpty('client_name');

        $validator
            ->requirePresence('client_contact', 'create')
            ->notEmpty('client_contact');

        $validator
            ->requirePresence('reference', 'create')
            ->notEmpty('reference');

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
        $rules->add($rules->existsIn(['client_id'], 'Clients'));
        $rules->add($rules->existsIn(['treatment_id'], 'Treatments'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
