<?php
/** @var $model \app\models\User */

$this->title = 'Login';
?>

<h1>login</h1>

<?php $form = \app\core\form\Form::begin('', 'post') ?>
<?php echo $form->input($model, 'email') ?>
<?php echo $form->input($model, 'password')->passwordField() ?>

<button type="submit" class="btn btn-primary">Submit</button>
<?php \app\core\form\Form::end() ?>
