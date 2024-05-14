<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h4 class="lead">Aplicacion creada por Leonardo F. Bode candidatura Factor Energia </h4>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">API Query Questions</h5>
                        <p class="card-text">Puedes consultar preguntas realizadas en Stackoverflow segun un tag que se le envia, por defecto salen las ultimas 30 preguntas que se han realizado o han tenido actividad.</p>
                        <?= yii\helpers\Html::a('Ir a la API query de preguntas ', ['/api-query/questions'], ['class' => 'btn btn-dark']) ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">API Query History</h5>
                        <p class="card-text">Puedes consultar el historial de preguntas realizadas en api-query/questions y luego poder seleccionar alguna para recuperar la respuesta de la BD, no se almacenan las consultas que no retornen resultados.</p>
                        <?= yii\helpers\Html::a('Ir a API query historial', ['/api-query/history'], ['class' => 'btn btn-dark']) ?>
                    </div>
                </div>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-md-12 mt-4 text-center">
            <?= yii\helpers\Html::img('@web/images/image2.png', ['class' => 'img-fluid', 'style' => 'max-width: 500px;']) ?>
        </div>
    </div>

    </div>
</div>
