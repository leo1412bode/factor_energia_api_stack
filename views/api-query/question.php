<?php

use yii\helpers\Html;

$this->title = 'Question Details';
?>

<div class="question-view">
    <h2><?= Html::encode($this->title) ?></h2>

    <table class="table" style="margin: 0 auto; background-color: blue;">
        <thead class="text-center">
            <tr>  
                <th>Tag Buscada</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
            <td ><?= Html::encode($resultData[0]['tagged']) ?></td>
            <td ><?= Html::encode($resultData[0]['fromdate']) ?></td>
            <td ><?= Html::encode($resultData[0]['todate']) ?></td>
            <td ><?= Html::encode($resultData[0]['created']) ?></td>
            </tr>
        </tbody>
    </table>

    

    <div style="margin-top: 40px;"></div>
    <h3>Result:</h3>
    
    <table class="table">
        <thead class="text-center">
            <tr>
                <th>Tags</th>
                <th>Name</th>
                <th>Link</th>
                <th>Date of create</th>
                <th>Score</th>
                <th>View Count</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php if (empty($resultData[0]['result']['items'])): ?>
            <tr>
                <td colspan="5" style="text-align: center;">No se obtuvieron resultados de la API.</td>
            </tr>
            <?php else: ?>
            <?php foreach ($resultData[0]['result']['items'] as $data): ?>
                <tr>
                <td><?= implode(', ', $data['tags']) ?></td>
                <td><?= Html::encode($data['owner']['display_name']) ?></td>
                <td>
                    <?= Html::a('<i class="fa fa-link"></i>', $data['link'], ['target' => '_blank']) ?>
                </td>
                <td><?= date('Y-m-d', $data['creation_date']) ?></td>
                <td><?= Html::encode($data['score']) ?></td>
                <td><?= Html::encode($data['view_count']) ?></td>
                </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
        </tbody>
    </table>
</div>