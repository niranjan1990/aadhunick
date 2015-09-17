<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "watches".
 *
 * @property integer $id
 * @property string $modelno
 * @property integer $brands_id
 * @property integer $marketplace_id
 * @property integer $price
 *
 * @property Bills[] $bills
 * @property Inventorystock[] $inventorystocks
 * @property Price[] $prices
 * @property Marketplace $marketplace
 * @property Brands $brands
 */
class Watches extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'watches';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modelno', 'brands_id', 'marketplace_id', 'price'], 'required'],
            [['brands_id', 'marketplace_id', 'price'], 'integer'],
            [['modelno'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'modelno' => 'Modelno',
            'brands_id' => 'Brands ID',
            'marketplace_id' => 'Marketplace ID',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBills()
    {
        return $this->hasMany(Bills::className(), ['watches_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventorystocks()
    {
        return $this->hasMany(Inventorystock::className(), ['watches_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrices()
    {
        return $this->hasMany(Price::className(), ['watches_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketplace()
    {
        return $this->hasOne(Marketplace::className(), ['id' => 'marketplace_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrands()
    {
        return $this->hasOne(Brands::className(), ['id' => 'brands_id']);
    }
}