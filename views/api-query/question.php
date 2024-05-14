<?php

use yii\helpers\Html;

$this->title = 'Question Details';
?>

<div class="question-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <table class="table" style="margin: 0 auto; background-color: blue;">
        <thead>
            <tr>  
                <th style="text-align: center;" >Tag Buscada</th>
                <th style="text-align: center;" >From Date</th>
                <th style="text-align: center;" >To Date</th>
                <th style="text-align: center;" >Created</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td style="text-align: center;"><?= Html::encode($resultData[0]['tagged']) ?></td>
            <td style="text-align: center;"><?= Html::encode($resultData[0]['fromdate']) ?></td>
            <td style="text-align: center;"><?= Html::encode($resultData[0]['todate']) ?></td>
            <td style="text-align: center;"><?= Html::encode($resultData[0]['created']) ?></td>
            </tr>
        </tbody>
    </table>

    

    <div style="margin-top: 40px;"></div>
    <h3>Resultado:</h3>
    
    <table class="table">
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
            <?php foreach ($resultData[0]['result']['items'] as $data): ?>
            <tr>
                <td><?= implode(', ', $data['tags']) ?></td>
                <td><?= Html::encode($data['owner']['display_name']) ?></td>
                <td>
                    <?= Html::a('<i class="fa fa-link"></i>', $data['link'], ['target' => '_blank']) ?>
                </td>
                <td><?= Html::encode($data['score']) ?></td>
                <td><?= Html::encode($data['view_count']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>