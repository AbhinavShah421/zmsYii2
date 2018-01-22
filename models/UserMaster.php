<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "user_master".
 *
 * @property int $id
 * @property string $fname
 * @property string $lname
 * @property string $email
 * @property string $address
 * @property string $zipcode
 * @property string $role
 * @property string $phoneno
 * @property string $password
 * @property int $status
 */
class UserMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fname', 'lname', 'email', 'address', 'zip_code', 'role', 'phone_no', 'password', 'status'], 'required'],
        		[['status','phone_no'], 'integer'],
            [['fname', 'lname'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 100],
            [['zip_code', 'phone_no', 'password'], 'string', 'max' => 32],
            [['role'], 'string', 'max' => 10],
        	['email','email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fname' => 'Fname',
            'lname' => 'Lname',
            'email' => 'Email',
            'address' => 'Address',
            'zip_code' => 'Zipcode',
            'role' => 'Role',
            'phone_no' => 'Phoneno',
            'password' => 'Password',
            'status' => 'Status',
        ];
    }
    
    
    public static function getUser($username, $password)
    {    	
    	return UserMaster::findOne(["email"=>$username,"password"=>$password]);
    	
    }
    public static function listUser(){
    	$query = new Query;

    	if(isset($_SESSION['role']) &&  $_SESSION['role']=='admin'){
    		$query	->SELECT(['user_master.id as managerid','user_master.fname as fname',
    				'user_master.lname as lname', 'zoo_master.id as zooid',
    				'zoo_master.zoo_name','zoo_master.address'])
    				->from('user_zoo_map')
    				->join('INNER JOIN','user_master','user_zoo_map.user_id = user_master.id')
    				->join('INNER JOIN','zoo_master','user_zoo_map.zoo_id = zoo_master.id');
    				
    	}
    	else{
    		
    		$query->SELECT(['user_master.id as managerid','user_master.fname as fname',
    				'user_master.lname as lname', 'zoo_master.id as zooid',
    				'zoo_master.zoo_name','zoo_master.address'])
    		->from('user_master')    		
    		->join('INNER JOIN','user_zoo_map','user_zoo_map.user_id = user_master.id and user_zoo_map.user_id='.yii::$app->session["id"])
    		->join('INNER JOIN','zoo_master','user_zoo_map.zoo_id = zoo_master.id and user_zoo_map.user_id='.yii::$app->session["id"]);
    	}
    	
    	
    							$command = $query->createCommand();
    							$data = $command->queryAll();
//     							print_r($command);die;
    							return $data;
    }
    public static function addUser(){
    	
    }
    
}
