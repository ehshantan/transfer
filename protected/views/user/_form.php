<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget(
        'CActiveForm',
        array(
            'id' => 'user-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        )
    ); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'batch_id'); ?>
        <?php echo $form->textField($model, 'batch_id', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'batch_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'birthdate'); ?>
        <?php echo $form->textField($model, 'birthdate'); ?>
        <?php echo $form->error($model, 'birthdate'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'birthplace'); ?>
        <?php echo $form->textField($model, 'birthplace', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'birthplace'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'address'); ?>
        <?php echo $form->textArea($model, 'address', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'address'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'phone'); ?>
        <?php echo $form->textField($model, 'phone', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'phone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'handphone'); ?>
        <?php echo $form->textField($model, 'handphone', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'handphone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'hall'); ?>
        <?php echo $form->textField($model, 'hall', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'hall'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'group_id'); ?>
        <?php echo $form->textField($model, 'group_id', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'group_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'roles'); ?>
        <?php echo $form->textArea($model, 'roles', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'roles'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'active'); ?>
        <?php echo $form->textField($model, 'active'); ?>
        <?php echo $form->error($model, 'active'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
