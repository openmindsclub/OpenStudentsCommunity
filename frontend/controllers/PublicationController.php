<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Publication;
use frontend\models\PublicationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;


/**
 * PublicationController implements the CRUD actions for Publication model.
 */
class PublicationController extends Controller
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
     * Lists all Publication models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PublicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Publication model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $model = new Publication();
        //testing the date through an ajax callback
        if(Yii::$app->request->isAjax && $model->load($_POST))
        {
           Yii::$app->response->format = 'json';
           return  ActiveForm::validate($model);
        }



        if ($model->load(Yii::$app->request->post()) )
        {        
            //completing the model data to add it in the db
            $model->publication_directory = "";
            $model->user_id = Yii::$app->user->id;
            $model->publication_creation_time = Date('Y-m-d H:i:s');
            $model->publication_rate=0;
            $model->save();
            //need the publication id to save the directory
            //savong the directory
              $model->publication_directory = 
            'uploads/'.$model->domain.'/'.$model->specialty.'/'.$model->module_id.'/'.$model->publication_id;

            //Creating a session to save the files path
            $session = yii::$app->session;
            if(! $session->isActive)
            {
                $session->open();
            }
            $session->set('directory_path', $model->publication_directory);
            $session->close();

            //puting the text content of the publication in an information file.
            if(! file_exists($model->publication_directory))
                mkdir($model->publication_directory,0777,true);
            $file =fopen($model->publication_directory.'/'.'readMe.txt', 'w') or die("Unable to open file!");
            fwrite($file, $model->publication_text_content);

            //saving the model with the new directory path
            $model->save();
          
            return $this->redirect(['upload', 'id' => $model->publication_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    //Method called when we need to load a files
     public function actionUpload()
        {
            $fileName = 'file';
            

            //opening the session to get the path of the path of the directory
            $session = yii::$app->session;
            if(! $session->isActive)
            {
                $session->open();
            }
            $uploadPath = $session->get('directory_path');
            
            $session->close();

            //testing if the directory doesn't exist
            if(! file_exists($uploadPath))
                mkdir($uploadPath,0777,true);

            if (isset($_FILES[$fileName]))
             {
                $file = UploadedFile::getInstanceByName($fileName);
                    
                if ($file->saveAs($uploadPath . '/' . $file->name)) {
        

                    echo \yii\helpers\Json::encode($file);    
                }
            }

            else
            {
                return $this->render('upload');
            }

            return null;
        }

    /**
     * Updates an existing Publication model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->publication_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Publication model.
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
     * Finds the Publication model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Publication the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Publication::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
