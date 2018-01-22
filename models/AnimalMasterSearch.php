<?php

namespace app\models;
use yii\data\Pagination;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AnimalMaster;
use yii\db\Query;
/**
 * AnimalMasterSearch represents the model behind the search form of `app\models\AnimalMaster`.
 */
class AnimalMasterSearch extends AnimalMaster
{
	public $zoo_name, $type;
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'zoo_id','age'], 'integer'],
            [['name', 'type_id','type', 'diet','zoo_name'], 'safe'],
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
    	if(isset($_SESSION['role']) &&  $_SESSION['role']=='admin'){
        $query = AnimalMaster::find();
        $query->joinWith(['zooMaster']);
        $query->joinWith(['animalType']);
    	}
    	else if(isset($_SESSION['role'])){        
    		
    		$query = AnimalMaster::find()->select(['animal_master.*','zoo_master.zoo_name'])
    		->from('animal_master')
    		->join('INNER JOIN','user_zoo_map','user_zoo_map.zoo_id=animal_master.zoo_id and user_zoo_map.user_id='.yii::$app->session["id"])
    		->join('INNER JOIN','zoo_master','user_zoo_map.zoo_id=zoo_master.id and user_zoo_map.user_id='.yii::$app->session["id"])
    	    ->joinWith(['animalType']); 
    	}
    	else{
    		$query = AnimalMaster::find();
    	}
        // add conditions that should always apply here
    	
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        		'pagination' => [
        				'pageSize' => 5,
        		],
        ]);
			$dataProvider->sort->attributes['zoo_name']=[
					'asc'=>['zoo_name'=>SORT_ASC],
					'desc'=>['zoo_name'=>SORT_DESC],
					];
			$dataProvider->sort->attributes['type']=[
					'asc'=>['type'=>SORT_ASC],
					'desc'=>['type'=>SORT_DESC],
			];
			$this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'zoo_id' => $this->zoo_id,
        		
        ]);

        $query->andFilterWhere(['like', 'animal_master.name', $this->name])
            ->andFilterWhere(['like', 'type_id', $this->type_id])
            ->andFilterWhere(['like', 'animal_type.type', $this->type])
            ->andFilterWhere(['like', 'age', $this->age])
            ->andFilterWhere(['like', 'zoo_master.zoo_name', $this->zoo_name])
            ->andFilterWhere(['like', 'diet', $this->diet]);

        return $dataProvider;
    }
    public function createDatalist($search){  	
    	
       
       $query = new Query;
       if(isset($_SESSION['role']) &&  $_SESSION['role']!='admin'){
       	$query->select(['name','animal_master.id','user_zoo_map.zoo_id'])
       	->from('animal_master')
       	->join('INNER JOIN','user_zoo_map','user_zoo_map.zoo_id=animal_master.zoo_id and user_zoo_map.user_id='.yii::$app->session["id"]);
       	$command = $query->createCommand();
       	
       	$data = $command->queryAll(); 
       	return $data;
       }
       else{
       	$res=new AnimalMaster();
       	$res = AnimalMaster::find()->andFilterWhere(['like','name', $search ])->asArray()->all();
       	
       	return $res;
       }
       
       
      
    }
}
