<?php
namespace app\controllers;


use app\models\Address;
use app\models\User;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class AddressController extends Controller
{



    public function actionIndex(){
        $id = Yii::$app->request->get('id');

        $user = User::findOne($id);

        return $this->render('index',compact('user'));
    }

    protected function findModel($id)
    {
        if (($model = Address::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Запрошенная страница не существует.');
    }


    public function actionAddAddress(){
        $address = new Address();

        if ($address->load(Yii::$app->request->post()) && $address->save()) {
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->render('create', [
            'address' => $address,
        ]);
    }

    public function actionsRedactAddress($id){

            $address = Address::findOne($id);

            if ($address->load(Yii::$app->request->post()) && $address->save()) {
                return $this->redirect(Yii::$app->request->referrer);
            }else {
                return $this->render('redact', [
                    'address' => $address,
                ]);
            }

    }

    public function actionDeleteAddress($id){
        
        $this->findModel($id)->delete();
        return $this->redirect(Yii::$app->request->referrer);
    }
}