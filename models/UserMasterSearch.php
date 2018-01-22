<?php

namespace app\models;

// use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserMaster;

/**
 * UserMasterSearch represents the model behind the search form of `app\models\UserMaster`.
 */
class UserMasterSearch extends UserMaster
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['fname', 'lname', 'email', 'address', 'zip_code', 'role', 'phone_no', 'password'], 'safe'],
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
        $query = UserMaster::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        		'pagination' => [
        				'pageSize' => 5,
        		],
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
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'zip_code', $this->zip_code])
            ->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['like', 'phone_no', $this->phone_no])
            ->andFilterWhere(['like', 'password', $this->password]);

        return $dataProvider;
    }
    
    public function createDatalist($search){
    	
    	$res=new UserMaster();
    	$res = UserMaster::find()->andFilterWhere(['like','fname', $search ])->asArray()->all();
    	
    	return $res;
    }
}
