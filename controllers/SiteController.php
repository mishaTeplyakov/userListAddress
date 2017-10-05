<?php

namespace app\controllers;

use app\models\User;
use function Sodium\compare;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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
                'only' => ['logout'],
                'rules' => [
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
     * @return string
     */
    public function actionIndex()
    {
        $users = User::find();

        $countUsers = clone $users;

        $pages = new Pagination
        ([
            'totalCount' => $countUsers->count(),
            'pageSize' => 5
        ]);

        $models = $users
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index',
            [
                'models' => $models,
                'pages' => $pages
            ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionView(){
        $id = Yii::$app->request->get('id');

        $user = User::findOne($id);

        $count = clone $user;

        /*$pages = new Pagination
        ([
            'totalCount' => $count->count(),
            'pageSize' => 5
        ]);

        $models = $user
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();*/

        if(empty($user)) throw new HttpException(404,'Такой страницы нет...');
        return $this->render('view',compact('user'));
    }



}
