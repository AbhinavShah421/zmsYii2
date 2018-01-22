<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ZooMaster;

/**
 * ZooMasterSearch represents the model behind the search form of `app\models\ZooMaster`.
 */
class ZooMasterSearch extends ZooMaster
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['zoo_name', 'address'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ZooMaster::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'zoo_name', $this->zoo_name])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
    public function createDatalist($search){
    	
    	$res = ZooMaster::find()->andFilterWhere(['like','zoo_name', $search ])->asArray()->all();
    	
    	return $res;
    }
}
