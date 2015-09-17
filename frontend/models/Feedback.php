<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $feedstamp
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email','email'],
            [['name', 'email', 'feedstamp'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'feedstamp' => 'Feedstamp',
        ];
    }

    public function feed()
    {
        if ($this->validate()) {
            $feed = new Feedback();
            $feed->name = $this->name;
            $feed->email = $this->email;
            $feed->save();
            return true;
        }else{
            return false;
        }
    }
}
