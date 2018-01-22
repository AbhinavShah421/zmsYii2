<?php

namespace app\controllers;

use Yii;
use app\models\AnimalMaster;
use app\models\AnimalMasterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use PHPUnit\Framework\Constraint\Attribute;

/**
 * AnimalmasterController implements the CRUD actions for AnimalMaster model.
 */
class AnimalmasterController extends SiteController
{
	
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        		
        ];
    }

    
    
    /**
     * Lists all AnimalMaster models.
     * @return mixed
     */
    public function actionIndex()
    {   
    	
        $searchModel = new AnimalMasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//            print_r($dataProvider);die;
        if(isset($_POST['listanimals'])){
        	return $this->renderAjax('index', [
        			'searchModel' => $searchModel,
        			'dataProvider' => $dataProvider,
        	]);
        }else{
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        }
    }

    /**
     * Displays a single AnimalMaster model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AnimalMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AnimalMaster();
        
  
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
     /*    if(isset($_POST['addanimal']))
        { 
        	return $this->renderAjax('create', [
        			'model' => $model,
        	]);
        } */
        else{
        return $this->render('create', [
            'model' => $model,
        ]);
        }
    }

    /**
     * Updates an existing AnimalMaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
            
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionUpdateanimal(){
    	
    	$animalId	=	isset($_POST['AnimalMaster']['id'])?$_POST['AnimalMaster']['id']:$_POST['modifyid'];
    	if(isset($animalId)){
    	
    		$model = $this->findModel($animalId);
    		
    		if ($model->load(Yii::$app->request->post()) && $model->save()) {
     			return $this->redirect(['view', 'id' => $animalId]);
    		}
    		
    		return $this->renderAjax('update', [
    				'model' => $model,
    		]);
    		}
    	}
    	
    

    /**
     * Deletes an existing AnimalMaster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AnimalMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AnimalMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AnimalMaster::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    

   
   public function actionDatalistanimals(){
      if(isset($_GET['search'])){
      	$searchModel = new AnimalMasterSearch();
      	$data= $searchModel->createDatalist($_GET['search']);
         
       return $this->renderAjax('options',['data'=>$data]);
      }
   }
    

}
