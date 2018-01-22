<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UserMaster;

class SiteController extends Controller
{
// 	public $defaultAction = 'login';
	
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    
    /**
     * befor action
     * 
     */
    
    public function beforeAction($action)
    {	
//     	print_r($action->id);die;
    	/* if ($action->id == 'error'){
    		return	$this->redirect(array('/site/login'));
    	}
    		else{ */
		    	if(($action->id=="login" || $action->id=="loginsubmit")&&(!isset($_SESSION['user']) || empty($_SESSION['user'])))
		    	{
		    		
		    		return $action;
		    	}
		    	else if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
		    	
		//    		   		return false;
		     	return	$this->redirect(array('/site/login'));
		//     	return	$action->id="login";
		    	}
		
		    	else{
		    		
		     	return $action;
		     	
		    	}
    		//}
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
    	
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
    	
    	/* if(isset($_POST['dashboard']))
    		return $this->renderAjax('index');
    		else    		
    		{ */
    			if(isset($_SESSION['user'])){
    				$userList	=	UserMaster::listUser();
    				return $this->render('index',['users'=>$userList,
    						
    				]);
    			}
    				else{
    					$model = new LoginForm();
    					return $this->renderAjax('login', [
    					            'model' => $model,
    					        ]);
//     		}		
    		}
    		
    	}

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
//     	print_r($_SESSION);die;
//     	$this->layout=false;	
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
         if(isset($_SESSION['user'])){
      	 return $this->render('index');
      	 
         }
      	else 
        return $this->renderAjax('login', [
            'model' => $model,
        ]);
        
                    
        
    }

    public function actionLoginsubmit()
    {   
    	$userModel	=null;
    	if(!empty($_POST['LoginForm']))
    	{
    		$userModel	=	UserMaster::getUser($_POST['LoginForm']['username'], $_POST['LoginForm']['password']);
    		$session= Yii::$app->session; $session->open();
    		$session->set('user',$userModel->fname.' '.$userModel->lname);
    		$session->set('role',$userModel->role);
    		$session->set('id',$userModel->id);
    		
    	}
    	if(!empty($userModel)){
    	return json_encode($userModel->attributes);
    	
 		//return json_encode(["status"=>true,"message"=>"successfully logged in"]);
    	}
    	return json_encode(["status"=>false,"message"=>"Invalid login detail"]);
    }
    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionUserlogout(){
    	Yii::$app->session->destroy();
    	$this->redirect(array('/'));
    }
 
    
}
