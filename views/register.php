<h1>Create an account</h1>

<?php $form = \app\core\form\Form::begin('', 'post') ?>
    <?php echo $form->field($model, 'firstname') ?>
    <?php echo $form->field($model, 'lastname') ?>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <?php echo $form->field($model, 'confirmPassword')->passwordField() ?>

    <button type="submit" class="btn btn-primary">Submit</button>
<?php \app\core\form\Form::end() ?>


<form action="" method="post">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label class="form-label">Firstname</label>
                <input type="text" name="firstnam" value="<?php echo $model->firstname ?>"
                       class="form-control<?php echo $model->hasError('firstname') ? 'is-invalid' : '' ?>">
                <div class="invalid-feedback">
                    <?php echo $model->getfirstError('firstname') ?>
                </div>

            </div>
            <div class="col">
                <label class="form-label">LastName</label>
                <input type="text" name="lastname">
            </div>
        </div>

    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>