<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Specialty;
use frontend\models\SpecialtySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SpecialtyController implements the CRUD actions for Specialty model.
 */
class SpecialtyController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Specialty models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SpecialtySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Specialty model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Specialty model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Specialty();

        if ($model->load(Yii::$app->request->post()) ) {
            
            $model->save();
            return $this->redirect(['view', 'id' => $model->specialty_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Specialty model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->specialty_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Specialty model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Specialty model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Specialty the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Specialty::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


       public function actionLists($id)
    {
        
        $countSpecialties = Specialty::find()
                ->where(['domain_id' => $id])
                ->count();

        $specialties = Specialty::find()
                ->where(['domain_id' => $id])
                ->all();
            if($countSpecialties>0)
            foreach($specialties as $specialty){
                echo "<option value='".$specialty->specialty_id."'>".$specialty->specialty_name."</option>";
            }
        
        else{
            echo "<option>-</option>";
        }
        
        //echo "<option>-</option>";

    }

     public function beforeAction($action) 
    {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
    }
}
