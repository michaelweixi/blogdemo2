<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
	'language'=> 'zh-CN',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\Adminuser',
            'enableAutoLogin' => true,
        ],
    	'session'=>[
    			'name'=>'PHPBACKSESSION',
    			'savePath'=>sys_get_temp_dir(),
    	],
    	'request'=>[
    			'cookieValidationKey'=>'sdfjjksloeedf78789judf',
    			'csrfParam'=>'_adminCSRF',
    	],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        	'suffix'=>'.html',
            'rules' => [
            	'<controller:(post|comment)>s'=>'<controller>/index',
            	'<controller:\w+>/<id:\d+>'=>'<controller>/view',
            	'<controller:\w+>/<id:\d+>/<action:(create|update|delete)>'=>'<controller>/<action>',
            ],
        ],
        
    ],
    'params' => $params,
];
