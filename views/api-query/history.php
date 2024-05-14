<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $resultData array */

$this->title = 'API Query History';
?>

<div class="api-query-history">
    <h2><?= Html::encode($this->title) ?></h2>

    <table class="table">
        <thead class="text-center">
            <tr>
                <th>Link</th>    
                <th>Search Tag</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php foreach ($resultData as $data): ?>
                <tr>
                    <td><?= Html::a('<i class="fa fa-link"></i>', ['question', 'id' => $data['id']]) ?></td>
                    <td><?= Html::encode($data['tagged']) ?></td>
                    <td><?= Html::encode($data['fromdate']) ?></td>
                    <td><?= Html::encode($data['todate']) ?></td>
                    <td><?= Html::encode($data['created']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>