<?php

namespace app\controllers;

use Yii;
use app\models\Subject;
use app\models\SubjectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SubjectController implements the CRUD actions for Subject model.
 */
class SubjectController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Subject models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SubjectSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Subject model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Subject model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Subject();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->image) {
                $imagePath = 'uploads/' . pathinfo($model->image, PATHINFO_FILENAME) . '.' . pathinfo($model->image, PATHINFO_EXTENSION);
            }
            $model->image->saveAs($imagePath);
            $model->image = $imagePath;
            $subject = new Subject([
                'teacherid' => $model->teacherid,  
                'name' => $model->name,
                'description' => $model->description,
                'image' => $model->image,
            ]);
    
            if ($subject->save()) {
                    return $this->redirect(['index']);
            } 
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Subject model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldProfilePic = $model->image;
    
        if ($model->load(Yii::$app->request->post()) && $model->save()){
            $model->image = UploadedFile::getInstance($model, 'image');
    
            if ($model->image){
                $imageName = Yii::$app->security->generateRandomString(10) . '_' . time() . '.' . $model->image->extension;
                $imagePath = 'uploads/' . $imageName;
                $model->image->saveAs($imagePath);
                $model->image = $imagePath;
                if ($oldProfilePic && $oldProfilePic !== $imagePath) {
                    unlink($oldProfilePic);
                }
            }else{
                $model->image = $oldProfilePic;
            }
    
            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Subject model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Subject model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Subject the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Subject::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
