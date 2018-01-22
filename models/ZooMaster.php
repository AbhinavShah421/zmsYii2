<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zoo_master".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 */
class ZooMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zoo_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zoo_name', 'address'], 'required'],
            [['zoo_name'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'zoo_name' => 'Name',
            'address' => 'Address',
        ];
    }
}
