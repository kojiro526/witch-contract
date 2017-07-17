<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Negotiations Model
 *
 * @property \App\Model\Table\PersonsTable|\Cake\ORM\Association\BelongsTo $Persons
 *
 * @method \App\Model\Entity\Negotiation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Negotiation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Negotiation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Negotiation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Negotiation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Negotiation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Negotiation findOrCreate($search, callable $callback = null, $options = [])
 */
class NegotiationsTable extends Table
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

        $this->setTable('negotiations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Persons', [
            'foreignKey' => 'person_id',
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
            ->date('negotiated_at')
            ->requirePresence('negotiated_at', 'create')
            ->notEmpty('negotiated_at');

        $validator
            ->requirePresence('body', 'create')
            ->notEmpty('body');

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
        $rules->add($rules->existsIn(['person_id'], 'Persons'));

        return $rules;
    }
}
