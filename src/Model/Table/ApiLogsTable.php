<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApiLogs Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\ApiLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\ApiLog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ApiLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ApiLog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApiLog|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApiLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ApiLog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ApiLog findOrCreate($search, callable $callback = null, $options = [])
 */
class ApiLogsTable extends Table
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

        $this->setTable('api_logs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
            ->nonNegativeInteger('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('ip_address')
            ->maxLength('ip_address', 45)
            ->requirePresence('ip_address', 'create')
            ->notEmpty('ip_address');

        $validator
            ->scalar('request_method')
            ->maxLength('request_method', 10)
            ->requirePresence('request_method', 'create')
            ->notEmpty('request_method');

        $validator
            ->scalar('request_url')
            ->maxLength('request_url', 45)
            ->requirePresence('request_url', 'create')
            ->notEmpty('request_url');

        $validator
            ->requirePresence('request_headers', 'create')
            ->notEmpty('request_headers');

        $validator
            ->allowEmpty('request_body');

        $validator
            ->requirePresence('status_code', 'create')
            ->notEmpty('status_code');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
