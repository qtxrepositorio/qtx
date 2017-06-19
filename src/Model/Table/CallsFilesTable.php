<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * CallsFiles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Calls
 *
 * @method \App\Model\Entity\CallsFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\CallsFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CallsFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CallsFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CallsFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CallsFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CallsFile findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CallsFilesTable extends Table
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

        $this->table('calls_files');
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
            ->allowEmpty('files');

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

    public function deleteFiles($call_id)
    {
        $connection = ConnectionManager::get('default');
        $callsFiles = $connection->execute("SELECT * FROM calls_files WHERE call_id = '$call_id'");

        $x = $connection->execute("DELETE
                FROM [calls_files]
                WHERE [call_id] = $call_id");

        foreach ($callsFiles as $key) {
            echo unlink(getcwd()
                . '/files/calls_files/'
                . strval($key['call_id'])
                . '/' . strval($key['archive']));
        }
    }

}
