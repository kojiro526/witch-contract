<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use App\Status\Persons\StatusPerson;
use App\Lib\PersonStateFactory;

/**
 * Person Entity
 *
 * @property int $id
 * @property string $name
 * @property int $age
 * @property int $status
 * @property string $reliability
 * @property int $expectation
 * @property int $hope
 * @property int $uncleanness
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Negotiation[] $negotiations
 */
class Person extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'age' => true,
        'reliability' => true,
        'expectation' => true,
        'hope' => true,
        'uncleanness' => true,
        '*' => false
    ];
    
    public function findNegotiations(){
        $negotiations_table = TableRegistry::get('Negotiations');
        return $negotiations_table->find()->where(['Negotiations.person_id' => $this->id]);
    }
    
    public function findRecentNegotiations($limit = null){
        $query = $this->findNegotiations();
        $query->order(['Negotiations.negotiated_at' => 'desc', 'Negotiations.id' => 'desc']);
        if(empty($limit)){
            $query->limit($limit);
        }
        return $query;
    }
    
    public function getStatus(){
        return PersonStateFactory::createInstance($this->status);
    }
}
