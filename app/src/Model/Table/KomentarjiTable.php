<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Komentarji Model
 *
 * @property \App\Model\Table\UporabnikiTable&\Cake\ORM\Association\BelongsTo $Uporabniki
 * @property \App\Model\Table\ReceptiTable&\Cake\ORM\Association\BelongsTo $Recepti
 *
 * @method \App\Model\Entity\Komentarji newEmptyEntity()
 * @method \App\Model\Entity\Komentarji newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Komentarji[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Komentarji get($primaryKey, $options = [])
 * @method \App\Model\Entity\Komentarji findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Komentarji patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Komentarji[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Komentarji|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Komentarji saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Komentarji[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Komentarji[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Komentarji[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Komentarji[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class KomentarjiTable extends Table
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

        $this->setTable('komentarji');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Uporabniki', [
            'foreignKey' => 'uporabnik_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Recepti', [
            'foreignKey' => 'recept_id',
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
            ->integer('recept_id')
            ->notEmptyString('recept_id');

        $validator
            ->scalar('vsebina')
            ->requirePresence('vsebina', 'create')
            ->notEmptyString('vsebina');

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
        $rules->add($rules->existsIn('recept_id', 'Recepti'), ['errorField' => 'recept_id']);

        return $rules;
    }
}
