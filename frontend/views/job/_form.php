<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use frontend\models\CDeviceType;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\Job */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <div class="col-md-2">
            <?= $form->field($model, 'date_add')->textInput(['disabled' => TRUE]) ?>
        </div>
        <div class="col-md-3">
            <?php
                $dtype = CDeviceType::find()->all();                
                $items = ArrayHelper::map($dtype,'id', 'name');
            ?>
            
        <?php
            echo $form->field($model, 'device_type')->widget(Select2::classname(), [
            'data' => $items,
            'language' => 'th',
            'options' => ['placeholder' => 'เลือก ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
          
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'device_sn')->textInput(['maxlength' => true]) ?>
        </div>        
        <div class="col-md-4">
            <?= $form->field($model, 'customer')->textInput(['maxlength' => true]) ?>
        </div>
    </div>    

    
    <?php
        echo $form->field($model, 'date_recept')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'ปปปป-ดด-วว'],
            'pickerButton' => [
                'icon' => 'ok',
            ],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
        ?>

    <?= $form->field($model, 'job_rapid')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'job_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_end')->textInput() ?>

    <?= $form->field($model, 'job_note')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
