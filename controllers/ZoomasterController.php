<?php

namespace app\controllers;

use Yii;
use app\models\ZooMaster;
use app\models\ZooMasterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\EmpZooMaster;
use app\models\UserZooMap;


/**
 * ZoomasterController implements the CRUD actions for ZooMaster model.
 */
class ZoomasterController extends SiteController
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
 * is login filter before action
 * {@inheritDoc}
 * @see \yii\web\Controller::beforeAction()
 */
//     public function beforeAction($action)
//     {
//     	if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
// //     		return false;
//     		$model = new LoginForm();
//     		return $this->renderAjax('login', [
//     				'model' => $model,
//     		]);
//     	}
//     	return $action;   	
//     }
    
    /**
     * Lists all ZooMaster models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ZooMasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(isset($_POST['listzoo'])){
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
     * Displays a single ZooMaster model.
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
     * Creates a new ZooMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ZooMaster();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        if(isset($_POST['addzoo']))
        	return $this->renderAjax('create', [
        			'model' => $model,
        	]);
        	else
        return $this->render('create', [
            'model' => $model,
        ]);
       
    }

    /**
     * Updates an existing ZooMaster model.
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
    public function actionUpdatezoo(){
    	  	
    	$zooId	=	isset($_POST['ZooMaster']['id'])?$_POST['ZooMaster']['id']:$_POST['modifyid'];
    	if(isset($zooId)){
    		
    		$model = $this->findModel($zooId);
    		
    		if ($model->load(Yii::$app->request->post()) && $model->save()) {
    			return $this->redirect(['view', 'id' => $zooId]);
    		}
    		
    		return $this->renderAjax('update', [
    				'model' => $model,
    		]);
    	}
    }

    /**
     * Deletes an existing ZooMaster model.
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
     * Finds the ZooMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ZooMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ZooMaster::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionManagezoo(){
    	$model= new UserZooMap();
    	return $this->renderAjax('managezoo',['model'=>$model]);
    }
    public function actionDatalistzoo(){
    	
    	
    	if(isset($_GET['search'])){
    		
    		$searchModel = new ZooMasterSearch();
    		$data= $searchModel->createDatalist($_GET['search']);
    		return $this->renderAjax('options',['data'=>$data]);
    	}
    }
  
}
