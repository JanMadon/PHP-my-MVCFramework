<?php
/** @var $model \app\models\ContactForm */

use app\core\form\TextareaField;

$this->title = 'Contact';
?>

<h1>Contact us</h1>

<?php $form = \app\core\form\Form::begin('', 'post') ?>

<?php echo $form->input($model, 'subject') ?>
<?php echo $form->input($model, 'email') ?>
<?php echo $form->textarea($model, 'body') ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php echo \app\core\form\Form::end() ?>
