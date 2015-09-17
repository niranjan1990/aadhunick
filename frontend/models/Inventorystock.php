<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "inventorystock".
 *
 * @property integer $id
 * @property integer $brand_id
 * @property integer $watches_id
 * @property integer $quantity
 *
 * @property Watches $watches
 * @property Brands $brand
 */
class Inventorystock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventorystock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand_id', 'watches_id', 'quantity'], 'required'],
            [['brand_id', 'watches_id', 'quantity'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_id' => 'Brand ID',
            'watches_id' => 'Watches ID',
            'quantity' => 'Quantity',
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
    public function getBrand()
    {
        return $this->hasOne(Brands::className(), ['id' => 'brand_id']);
    }
}
