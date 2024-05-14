<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "api_queries".
 *
 * @property int $id
 * @property string $tagged
 * @property int|null $todate
 * @property int|null $fromdate
 * @property string|null $result
 */
class ApiQuery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'api_queries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tagged'], 'required'],
            [['todate', 'fromdate'], 'string'],
            [['result'], 'string'],
            [['tagged'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tagged' => 'Tagged',
            'todate' => 'Todate',
            'fromdate' => 'Fromdate',
            'result' => 'Result',
        ];
    }
}
