<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "bills".
 *
 * @property integer $id
 * @property integer $watches_id
 * @property integer $watches_price
 * @property integer $quantity
 * @property string $billrecord
 * @property string $created_at
 */
class Bills extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bills';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['watches_id', 'pament_mode', 'quantity', 'billrecord'], 'required'],
            [['watches_id', 'pament_mode', 'quantity'], 'integer'],
            [['billrecord', 'created_at'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'watches_id' => 'Watches ID',
            'watches_price' => 'Watches Price',
            'quantity' => 'Quantity',
            'billrecord' => 'Billrecord',
            'created_at' => 'Created At',
        ];
    }
}
