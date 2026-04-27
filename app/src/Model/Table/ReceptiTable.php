<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recepti Model
 *
 * @property \App\Model\Table\UporabnikiTable&\Cake\ORM\Association\BelongsTo $Uporabniki
 *
 * @method \App\Model\Entity\Recepti newEmptyEntity()
 * @method \App\Model\Entity\Recepti newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Recepti[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Recepti get($primaryKey, $options = [])
 * @method \App\Model\Entity\Recepti findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Recepti patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Recepti[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Recepti|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Recepti saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Recepti[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Recepti[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Recepti[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Recepti[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ReceptiTable extends Table
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

        $this->setTable('recepti');
        $this->setDisplayField('naslov');
        $this->setPrimaryKey('id');

        $this->belongsTo('Uporabniki', [
            'foreignKey' => 'uporabnik_id',
            'joinType' => 'INNER',
        ]);
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
            ->integer('uporabnik_id')
            ->notEmptyString('uporabnik_id');

        $validator
            ->scalar('naslov')
            ->maxLength('naslov', 150)
            ->requirePresence('naslov', 'create')
            ->notEmptyString('naslov');

        $validator
            ->scalar('opis')
            ->allowEmptyString('opis');

        $validator
            ->scalar('navodila')
            ->requirePresence('navodila', 'create')
            ->notEmptyString('navodila');

        $validator
            ->scalar('slika')
            ->maxLength('slika', 255)
            ->allowEmptyString('slika');

        $validator
            ->scalar('kategorija')
            ->allowEmptyString('kategorija');

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
        $rules->add($rules->existsIn('uporabnik_id', 'Uporabniki'), ['errorField' => 'uporabnik_id']);

        return $rules;
    }
}
