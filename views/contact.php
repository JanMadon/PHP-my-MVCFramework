<?php
/** @var $model \app\models\ContactForm */

use janm\phpmvc\form\TextareaField;

$this->title = 'Contact';
?>

<h1>Contact us</h1>

<?php $form = \janm\phpmvc\form\Form::begin('', 'post') ?>

<?php echo $form->input($model, 'subject') ?>
<?php echo $form->input($model, 'email') ?>
<?php echo $form->textarea($model, 'body') ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php echo \janm\phpmvc\form\Form::end() ?>
