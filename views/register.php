<?php
/** @var $model \app\models\User */

$this->title = 'Register';
?>


<h1>Create an account</h1>

<?php $form = \janm\phpmvc\form\Form::begin('', 'post') ?>
    <?php echo $form->input($model, 'firstname') ?>
    <?php echo $form->input($model, 'lastname') ?>
    <?php echo $form->input($model, 'email') ?>
    <?php echo $form->input($model, 'password')->passwordField() ?>
    <?php echo $form->input($model, 'confirmPassword')->passwordField() ?>

    <button type="submit" class="btn btn-primary">Submit</button>
<?php \janm\phpmvc\form\Form::end() ?>

<!--<form action="" method="post">-->
<!--    <div class="row">-->
<!--        <div class="col">-->
<!--            <div class="form-group">-->
<!--                <label class="form-label">Firstname</label>-->
<!--                <input type="text" name="firstname" value="--><?php //echo $model->firstname ?><!--"-->
<!--                       class="form-control --><?php //echo $model->hasError('firstname') ? 'is-invalid' : '' ?><!--"/>-->
<!--                <div class="invalid-feedback"> --><?php //echo $model->getFirstError('firstname') ?><!-- </div>-->
<!--            </div>-->
<!--            <div class="form-group">-->
<!--                <label class="form-label">Lastname</label>-->
<!--                <input type="text" name="lastname"-->
<!--                       class="form-control"/>-->
<!--                <div class="invalid-feedback"> </div>-->
<!--            </div>-->
<!--            <div class="form-group">-->
<!--                <label class="form-label">Email</label>-->
<!--                <input type="text" name="email"-->
<!--                       class="form-control"/>-->
<!--                <div class="invalid-feedback"> </div>-->
<!--            </div>-->
<!--            <div class="form-group">-->
<!--                <label class="form-label">Password</label>-->
<!--                <input type="text" name="password"-->
<!--                       class="form-control"/>-->
<!--                <div class="invalid-feedback"> </div>-->
<!--            </div>-->
<!--            <div class="form-group">-->
<!--                <label class="form-label">confirmPassword</label>-->
<!--                <input type="text" name="confirmPassword"-->
<!--                       class="form-control"/>-->
<!--                <div class="invalid-feedback"> </div>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    </div>-->
<!---->
<!--    <button type="submit" class="btn btn-primary">Submit</button>-->
<!--</form>-->