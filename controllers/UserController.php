<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\UserMaster;

class UserController extends SiteController
{
	public function actionDashboard(){
		
		if(isset($_POST['list_user']))
		{  
		
		$userList	=	UserMaster::listUser();
		
		return $this->renderAjax('dashboard',['users'=>$userList]);
			
		}
		
	}
	
	public function actionAdduser(){
		$user= UserMaster::addUser();
		
	}
}


?>