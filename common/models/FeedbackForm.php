<?php
/**
 * Created by PhpStorm.
 * User: napster
 * Date: 8/22/2015
 * Time: 1:43 AM
 */

namespace common\models;
use Yii;
use yii\base\Model;
use yii\base\models;

class FeedbackForm extends Model{
    public $name;
    public $email;

    public function rules()
    {
        return[
            [['name','email'],'required'],
            ['email','email'],
        ];
    }
}