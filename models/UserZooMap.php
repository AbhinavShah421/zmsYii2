<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "emp_zoo_master".
 *
 * @property int $id
 * @property int $empid
 * @property int $zooid
 */
class UserZooMap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_zoo_map';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'zoo_id'], 'required'],
            [['user_id', 'zoo_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'zoo_id' => 'Zoo ID',
        ];
    }
}
