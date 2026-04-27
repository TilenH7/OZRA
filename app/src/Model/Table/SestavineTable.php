<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sestavine Model
 *
 * @method \App\Model\Entity\Sestavine newEmptyEntity()
 * @method \App\Model\Entity\Sestavine newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Sestavine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sestavine get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sestavine findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Sestavine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sestavine[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sestavine|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sestavine saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sestavine[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sestavine[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sestavine[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sestavine[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SestavineTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('sestavine');
        $this->setDisplayField('ime');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('ime')
            ->maxLength('ime', 100)
            ->requirePresence('ime', 'create')
            ->notEmptyString('ime')
            ->add('ime', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['ime']), ['errorField' => 'ime']);

        return $rules;
    }
}
