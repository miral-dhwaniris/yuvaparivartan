


<?php


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['login_info']))
{
    
    if(!isset($_GET['r']))
    {
        
        if(!isset($_POST['Users']))
        {
            echo '<script>window.location="index.php?r=users/login";</script>';
//            header('Location:index.php?r=users/login');
            exit;
        }
    }
}
//var_dump($_SESSION);
//        exit;
        
// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/dropdown_values.php');
require(__DIR__ . '/common_function.php');
require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');







(new yii\web\Application($config))->run();
