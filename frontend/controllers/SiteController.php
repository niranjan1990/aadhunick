<?php
namespace frontend\controllers;

use app\models\Feedback;
use frontend\models\Bills;
use frontend\models\Brands;
use frontend\models\Inventorystock;
use frontend\models\Watches;
use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\Exception;
use yii\base\InvalidParamException;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('dashboard');
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact()) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionDashboard(){
        return $this->render('dashboard');
    }

    public function actionInventory(){
        $model = new Inventorystock();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->refresh();
        } else {
            return $this->render('inventory', [
                'model' => $model,
            ]);
        }
    }

    public function actionStock(){
        return $this->render('stock');
    }

    public function actionBill(){
        $model = new Bills();
        if (Yii::$app->request->isPost) {
            $bills = Yii::$app->request->post('Bills');
            for ($i=0; $i < sizeof($bills['watches_id']); $i++){
                $model = new Bills();
                $model->billrecord = $bills['billrecord'];
                $model->watches_id = $bills['watches_id'][$i];
                $model->pament_mode = $bills['pament_mode'][$i];
                $model->quantity = $bills['quantity'][$i];
                if(($bills['watches_id'][$i]=='')
                    ||($bills['pament_mode'][$i]=='')||($bills['quantity'][$i]=='')){
                    continue;
                } else{
                    if(!$model->save())
                    throw new Exception('Bill not saved'. Json::encode($model->getErrors()));
                }
            }
        }
        return $this->render('bill',['model'=>$model,]);
    }

    public function actionReturns(){
        return $this->render('returns');
    }

   /* public function actionFeedbackForm(){
        return $this->render('feedbackForm');
    }*/

    public function actionFeedback(){
        $model = new Feedback();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($feed = $model->feed())
            Yii::$app->session->setFlash('success', 'thank you for your feedback');
            return $this->refresh();
        }else{
            return $this->render('feedbackForm',['model'=>$model,]);
        }

        /*return $this->render('FeedbackForm',['model'=>$model]);*/
        /*return $this->render('feedbackform');*/
    }


}
