<?php

namespace app\controllers;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
* This is the class for controller "SensorController".
*/
class SensorController extends base\SensorController
{

	public function behaviors(){
		return [
		'verbs' => [
		    'class' => VerbFilter::className(),
		    'actions' => [
		        'delete' => ['post'],
		    ],
		],
		'access' => [
		            'class' => \yii\filters\AccessControl::className(),
		            'rules' => [
		                // allow authenticated users
		                [
		                    'allow' => true,
		                    'roles' => ['admin'],
		                ],
		                // everything else is denied
		            ],
		        ],            
		];
	}

}
