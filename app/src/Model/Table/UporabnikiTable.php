<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Uporabniki Model
 *
 * @method \App\Model\Entity\Uporabniki newEmptyEntity()
 * @method \App\Model\Entity\Uporabniki newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Uporabniki[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Uporabniki get($primaryKey, $options = [])
 * @method \App\Model\Entity\Uporabniki findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Uporabniki patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Uporabniki[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Uporabniki|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Uporabniki saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Uporabniki[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Uporabniki[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Uporabniki[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Uporabniki[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UporabnikiTable extends Table
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

        $this->setTable('uporabniki');
        $this->setDisplayField('uporabnisko_ime');
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
            ->scalar('uporabnisko_ime')
            ->maxLength('uporabnisko_ime', 50)
            ->requirePresence('uporabnisko_ime', 'create')
            ->notEmptyString('uporabnisko_ime')
            ->add('uporabnisko_ime', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('geslo')
            ->maxLength('geslo', 255)
            ->requirePresence('geslo', 'create')
            ->notEmptyString('geslo');

        $validator
            ->scalar('eposta')
            ->maxLength('eposta', 100)
            ->requirePresence('eposta', 'create')
            ->notEmptyString('eposta')
            ->add('eposta', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('profilna_slika')
            ->maxLength('profilna_slika', 255)
            ->allowEmptyString('profilna_slika');

        $validator
            ->dateTime('ustvarjen')
            ->allowEmptyDateTime('ustvarjen');

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
        $rules->add($rules->isUnique(['uporabnisko_ime']), ['errorField' => 'uporabnisko_ime']);
        $rules->add($rules->isUnique(['eposta']), ['errorField' => 'eposta']);

        return $rules;
    }
}
