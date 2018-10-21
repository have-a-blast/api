<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ActivityFilters Model
 *
 * @property \App\Model\Table\LocationsTable|\Cake\ORM\Association\BelongsTo $Locations
 * @property \App\Model\Table\ActivityFilterDateTypesTable|\Cake\ORM\Association\BelongsTo $ActivityFilterDateTypes
 *
 * @method \App\Model\Entity\ActivityFilter get($primaryKey, $options = [])
 * @method \App\Model\Entity\ActivityFilter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ActivityFilter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ActivityFilter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActivityFilter|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActivityFilter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ActivityFilter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ActivityFilter findOrCreate($search, callable $callback = null, $options = [])
 */
class ActivityFiltersTable extends Table
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

        $this->setTable('activity_filters');
        $this->setDisplayField('user_id');
        $this->setPrimaryKey('user_id');

        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);
        $this->belongsTo('ActivityFilterDateTypes', [
            'foreignKey' => 'date_type_id',
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
            ->nonNegativeInteger('user_id')
            ->allowEmpty('user_id', 'create');

        $validator
            ->boolean('using_current_location')
            ->requirePresence('using_current_location', 'create')
            ->notEmpty('using_current_location');

        $validator
            ->requirePresence('distance', 'create')
            ->notEmpty('distance');

        $validator
            ->date('start_date')
            ->allowEmpty('start_date');

        $validator
            ->date('end_date')
            ->allowEmpty('end_date');

        $validator
            ->requirePresence('from_age', 'create')
            ->notEmpty('from_age');

        $validator
            ->requirePresence('to_age', 'create')
            ->notEmpty('to_age');

        $validator
            ->boolean('matching_personality')
            ->requirePresence('matching_personality', 'create')
            ->notEmpty('matching_personality');

        $validator
            ->boolean('verified_user')
            ->requirePresence('verified_user', 'create')
            ->notEmpty('verified_user');

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
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['date_type_id'], 'ActivityFilterDateTypes'));

        return $rules;
    }
}
