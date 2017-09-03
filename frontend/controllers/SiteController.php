<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\interfaces\ItemAttributeRepositoryInterface;
use frontend\interfaces\ItemRepositoryInterface;
use frontend\forms\ItemForm;

/**
 * Site controller
 */
class SiteController extends Controller
{

    private $_itemReposytory;
    private $_tyreRpository;


    public function __construct($id,
                                $module,
                                ItemAttributeRepositoryInterface $tyreRepo,
                                ItemRepositoryInterface $itemRepo,
                                $config = []
                                )
    {
        $this->_itemReposytory = $itemRepo;
        $this->_tyreRpository = $tyreRepo;
        parent::__construct($id, $module, $config);
    }





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




    public function actionIndex()
    {

        // Указать что смущает пробел который есть в образце ,  которого нт в примерах

        $model = new ItemForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            // создем парсер посредством фабрики для типа товара 'шины'
            $parser = Yii::$app->parserFabric->create('tyre');

            $tyre = $parser->parse($model->item);

            if($tyre){
                //отдаем репозиторию товара на сохранение строчку полного названия товара
                $item_id = $this->_itemReposytory->save($model->item, true);

                //отдаем репозиторию аттрибутов на сохранение value object с распарсенными товарами и id в таблице товаров
                $this->_tyreRpository->save($tyre, $item_id);
            }else{
                //если распарситьне удалось прото сохраняем товар
                $this->_itemReposytory->save($model->item, false);
            }

            return $this->render('parse', ['tyre' => $tyre]);
        }

        return $this->render('index', ['model' => $model]);
    }


}
