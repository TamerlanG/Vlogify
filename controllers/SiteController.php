<?php

namespace app\controllers;

use app\models\ArticleForm;
use app\models\Articles;
use app\models\CommentForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public $layout = 'base';
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
        $data = Articles::getAll(3);
        return $this->render('index', [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays single article page.
     *
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $article = Articles::findOne($id);
        $comments = Articles::getArticleComments($id);

        $model = new CommentForm();

        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            if($model->createComment($article->id)){
                return $this->refresh();
            }
        }

        return $this->render('single', [
            'article' => $article,
            'model' => $model,
            'comments' => $comments,
        ]);
    }


    /**
     * Displays add article page.
     *
     * @return string
     */
    public function actionAddArticle()
    {

        $model = new ArticleForm();

        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            if($model->createArticle()){
                return $this->redirect('index');
            }
        }
        return $this->render('add-article', [
            'model' => $model,
        ]);
    }
}
