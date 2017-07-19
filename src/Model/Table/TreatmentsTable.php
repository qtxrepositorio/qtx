<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Treatments Model
 *
 * @property \Cake\ORM\Association\HasMany $ExternalDocuments
 *
 * @method \App\Model\Entity\Treatment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Treatment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Treatment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Treatment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Treatment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Treatment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Treatment findOrCreate($search, callable $callback = null)
 */
class TreatmentsTable extends Table
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

        $this->table('treatments');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('ExternalDocuments', [
            'foreignKey' => 'treatment_id'
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
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
