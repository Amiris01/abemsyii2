<?php

namespace app\controllers;

use app\models\Student;
use Yii;
use app\models\StudentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
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
     * Lists all Student models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Student model.
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
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Student();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->profile_pic = UploadedFile::getInstance($model, 'profile_pic');
            if ($model->profile_pic) {
                $imagePath = 'uploads/' . pathinfo($model->profile_pic, PATHINFO_FILENAME) . '.' . pathinfo($model->profile_pic, PATHINFO_EXTENSION);
            }
            $model->profile_pic->saveAs($imagePath);
            $model->profile_pic = $imagePath;
            $student = new Student([
                'userid' => $model->userid,  
                'name' => $model->name,
                'age' => $model->age,
                'status' => $model->status,
                'parent_name' => $model->parent_name,
                'address' => $model->address,
                'parent_contact' => $model->parent_contact,
                'profile_pic' => $model->profile_pic,
            ]);
    
            if ($student->save()) {
                    return $this->redirect(['index']);
            } 
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Student model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldProfilePic = $model->profile_pic; // Store the old profile pic
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // Handle image upload only if a new image is uploaded
            $model->profile_pic = UploadedFile::getInstance($model, 'profile_pic');
    
            if ($model->profile_pic) {
                // Generate a unique filename based on the current timestamp
                $imageName = Yii::$app->security->generateRandomString(10) . '_' . time() . '.' . $model->profile_pic->extension;
    
                // Save the image to the 'uploads' directory
                $imagePath = 'uploads/' . $imageName;
                $model->profile_pic->saveAs($imagePath);
    
                // Set the profile_pic attribute to the new image path
                $model->profile_pic = $imagePath;
    
                // Delete the old profile pic if it exists and is different from the new one
                if ($oldProfilePic && $oldProfilePic !== $imagePath) {
                    unlink($oldProfilePic);
                }
            } else {
                // If no new image was uploaded, retain the existing image path
                $model->profile_pic = $oldProfilePic;
            }
    
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
    
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    

    /**
     * Deletes an existing Student model.
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
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Student::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDashboard()
    {
        return $this->render('dashboard');
    }
}
