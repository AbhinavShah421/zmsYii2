<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "animal_master".
 *
 * @property int $id
 * @property string $name
 * @property string $type_id
 * @property string $age
 * @property string $diet
 * @property int $zoo_id
 */
class AnimalMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'animal_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type_id', 'age', 'type','diet', 'zoo_id','zoo_name'], 'required'],
            [['zoo_id'], 'integer'],
            [['name', 'diet'], 'string', 'max' => 30],
            [['type_id'], 'string', 'max' => 20],
            [['age'], 'integer', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type_id' => 'Type ID',
        	'type'=>'Catagory',
            'age' => 'Age',
            'diet' => 'Diet',
            'zoo_id' => 'Zoo ID',
        	'zoo_name'=>'Zoo Name'
        ];
    }
    public function getZooMaster(){
    	return $this->hasOne(ZooMaster::className(),['id'=>'zoo_id']);
    }
    public function getZoo_name(){
    	return $this->zooMaster->zoo_name;
    }
    
    public function getAnimalType(){
    	return $this->hasOne(AnimalType::className(),['id'=>'type_id']);
    }
    public function getType(){
    	return $this->animalType->type;
    }
}
