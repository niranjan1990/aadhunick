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
 * @property integer $pament_mode
 * @property integer $quantity
 * @property string $billrecord
 * @property string $created_at
 *
 * @property Watches $watches
 * @property Payment $pamentMode
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
            'pament_mode' => 'Pament Mode',
            'quantity' => 'Quantity',
            'billrecord' => 'Billrecord',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWatches()
    {
        return $this->hasOne(Watches::className(), ['id' => 'watches_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPamentMode()
    {
        return $this->hasOne(Payment::className(), ['id' => 'pament_mode']);
    }
}
