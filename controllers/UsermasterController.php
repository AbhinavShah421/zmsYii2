<?php

namespace app\controllers;

use Yii;
use app\models\UserMaster;
use app\models\UserMasterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsermasterController implements the CRUD actions for UserMaster model.
 */
class UsermasterController extends SiteController
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
    
    public function beforeSave($password) {
    	return md5($password);
    }

    /**
     * Lists all UserMaster models.
     * @return mixed
     */
    public function actionIndex()
    {
    	
        $searchModel = new UserMasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if(isset($_POST['listusers'])){
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
     * Displays a single UserMaster model.
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
     * Creates a new UserMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserMaster();
        if(isset($_POST['username'])){
        	
        	return $this->renderAjax('create', [
        			'model' => $model,
        	]);
        }else{
        if ($model->load(Yii::$app->request->post()) && ($model->password=$this->beforeSave($model->password)) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
        }
    }

    /**
     * Updates an existing UserMaster model.
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
    
    public function actionUpdateuser(){
    	
 
    	$userId	=	isset($_POST['UserMaster']['id'])?$_POST['UserMaster']['id']:$_POST['modifyid'];
    	if(isset($userId)){
    		
    		$model = $this->findModel($userId);
    		
    		if ($model->load(Yii::$app->request->post()) && $model->save()) {
    			return $this->redirect(['view', 'id' => $userId]);
    		}
    		
    		return $this->renderAjax('update', [
    				'model' => $model,
    		]);
    	}
    }

    /**
     * Deletes an existing UserMaster model.
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
     * Finds the UserMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserMaster::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionDatalistuser(){
    	
    	if(isset($_GET['search'])){
    		
    		$searchModel = new UserMasterSearch();
    		$data= $searchModel->createDatalist($_GET['search']);
    		
    		return $this->renderAjax('options',['data'=>$data]);
    	}
    }
}
