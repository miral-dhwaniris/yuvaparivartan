<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\UserLevels;
/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>


<!--..-->


<style>
    
    
    @import "bourbon";
/*
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,700);
@import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css);
@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css);*/

$shadow-color: #23203b;
$input-color: lighten(#AB9E95, 10%);
$input-border-color: #5E5165;
$button-background-color: #27AE60;

* {
  margin: 0;
  padding: 0;
}

html { 
  /*background: url(https://dl.dropboxusercontent.com/u/159328383/background.jpg) no-repeat center center fixed;*/ 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

body {
  background: transparent;
}

body, input, button {
  font-family: 'Source Sans Pro', sans-serif;
}

@mixin normalize-input {
  display: block;
  width: auto;
  height: auto;
  border: none;
  outline: none;
  box-shadow: none;
  background: none;
  border-radius: 0px;
}

.login {
  padding: 15px;
  width: 400px;
  min-height: 400px;
  margin: 2% auto 0 auto;

  .heading {
    text-align: center;
    margin-top: 1%;

    h2 {
      font-size: 3em;
      font-weight: 300;
      color: rgba(255, 255, 255, 0.7);
      display: inline-block;
      padding-bottom: 5px;
      text-shadow: 1px 1px 3px $shadow-color;
    }
  }

  form {
    .input-group {
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      border-top: 1px solid rgba(255, 255, 255, 0.1);

      &:last-of-type {
        border-top: none;
      }

      span {
        background: transparent;
        min-width: 53px;
        border: none;

        i {
          font-size: 1.5em;
          color: rgba(255, 255, 255, 0.2);
        }
      }
    }

    input.form-control {
      @include normalize-input;

      padding: 10px;
      font-size: 1.6em;
      width: 100%;
      background: transparent;
      color: $input-color;

      &:focus {
        border: none;
      }
    }

    button {
      margin-top: 20px;
      background: $button-background-color;
      border: none;
      font-size: 1.6em;
      font-weight: 300;
      padding: 5px 0;
      width: 100%;
      border-radius: 3px;
      color: lighten($button-background-color, 40%);
      border-bottom: 4px solid darken($button-background-color, 10%);

      &:hover {
        background: tint($button-background-color, 4%);
        -webkit-animation: hop 1s;
        animation: hop 1s;
      }
    }
  }
}

.float {
  display: inline-block;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: transform;
  transition-property: transform;
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
}

.float:hover, .float:focus, .float:active {
  -webkit-transform: translateY(-3px);
  transform: translateY(-3px);
}

/* Large Devices, Wide Screens */

@media only screen and (max-width : 1500px) {
}

@media only screen and (max-width : 1200px) {
  .login {
    width: 600px;
    font-size: 2em;
  }
}

@media only screen and (max-width : 1100px) {
  .login {
    margin-top: 2%;
    width: 600px;
    font-size: 1.7em;
  }
}

/* Medium Devices, Desktops */
@media only screen and (max-width : 992px) {
  .login {
    margin-top: 1%;
    width: 550px;
    font-size: 1.7em;
    min-height: 0;
  }
}

/* Small Devices, Tablets */
@media only screen and (max-width : 768px) {
  .login {
    margin-top: 0;
    width: 500px;
    font-size: 1.3em;
    min-height: 0;
  }
}

/* Extra Small Devices, Phones */ 
@media only screen and (max-width : 480px) {
  .login {

    h2 {
      margin-top: 0;
    }

    margin-top: 0;
    width: 400px;
    font-size: 1em;
    min-height: 0;
  }
}

/* Custom, iPhone Retina */ 
@media only screen and (max-width : 320px) {
  .login {
    margin-top: 0;
    width: 200px;
    font-size: 0.7em;
    min-height: 0;
  }
}

    .absolutem{
        position: absolute;
        left: 0;
        top: 0;
        background: url('../images/background.JPG') no-repeat #FFFFFF;
        background-size: cover;
        width: 100%;
        height: 100%;
        /*z-index: 0;*/
    }
    .box_style
    {
        padding: 100px;
        border: #FFFFFF solid 2px;
        width: 600px;
        display: block;
        margin: auto;
        margin-top: 20px;
        background: #CCCCCC;
        border-radius: 10px;
        /*box-shadow: 0px 0px 10px #000000;*/
    }
</style>

<div class="users-form  absolutem">
    
    
    <div class="login">
    <?php

    if(isset($error))
    {
    display_array($error);
    }
    ?>
    <div class="heading">
    <img src="../images/logo.png"style=" position: absolute;left: 20px;top: 20px">
    <h2 style="color: #FB9101;margin-top: 200px; font-size: 30px;">Sign in</h2>
      <?php $form = ActiveForm::begin(); ?>

        
        
        <div class="input-group input-group-lg">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <input name='Users[user_name]' type="text" class="form-control" placeholder="Username or email">
            </div>

          <div class="input-group input-group-lg">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input name='Users[password]' type="password" class="form-control" placeholder="Password">
          </div>

          <?= Html::submitButton('Login',['class'=>'btn btn-primary','style'=>'']) ?>
         <?php ActiveForm::end(); ?>
    </div>
   </div>
<!--    <div style="width: 50%;margin: 0 auto; color: #FFFFFF">
        <h3 style="color: #E11836">About SMART</h3>
        SMART (Skills-for-Market Training) is the flagship vocational training program of the Tech Mahindra Foundation. Launched in October 2012, its vision is to be a model VT program for socio-economically disadvantaged youth, enabling them to actualize their potential in a career of their choice. SMART follows a structured and process-oriented approach to employability training, with well defined curricula for all the courses. The program is implemented by a network of committed NGOs, with TMF working as a resource center to ensure quality in the program. 
    </div>-->
    
    

</div>
