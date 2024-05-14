<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$model = new \app\models\ApiQuery();


?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger">
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>


<div class="api-query-form">
    <h2>Api Stack Exchange</h2> 
    <?php $form = ActiveForm::begin([
        'action' => ['questions'],
        'method' => 'post',
    ]); ?>
    
    <?= $form->field($model, 'tagged')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fromdate')->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
    ]) ?>

    <?= $form->field($model, 'todate')->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>


<?php if (isset($result['items'])): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tags</th>
                    <th>Name</th>
                    <th>Link</th>
                    <th>Score</th>
                    <th>View Count</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($result['items'] as $item): ?>
                    <tr>
                        <td><?= implode(', ', $item['tags']) ?></td>
                        <td><?= Html::encode($item['owner']['display_name']) ?></td>
                        <td>
                            <?= Html::a('<i class="fa fa-link"></i>', $item['link'], ['target' => '_blank']) ?>
                        </td>
                        <td><?= Html::encode($item['score']) ?></td>
                        <td><?= Html::encode($item['view_count']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>


