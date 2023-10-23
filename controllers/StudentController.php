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
        $oldProfilePic = $model->profile_pic;

        $attributes = Yii::$app->request->post($model->formName());
        unset($attributes['created_at']);
    
        if ($model->load(Yii::$app->request->post()) && $model->save()){
            $model->profile_pic = UploadedFile::getInstance($model, 'profile_pic');
    
            if ($model->profile_pic){
                $imageName = Yii::$app->security->generateRandomString(10) . '_' . time() . '.' . $model->profile_pic->extension;
                $imagePath = 'uploads/' . $imageName;
                $model->profile_pic->saveAs($imagePath);
                $model->profile_pic = $imagePath;
                if ($oldProfilePic && $oldProfilePic !== $imagePath) {
                    unlink($oldProfilePic);
                }
            }else{
                $model->profile_pic = $oldProfilePic;
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

    public function actionExportCsv($name)
{

    $query = Student::find();
    if (!empty($name)) {
        $query->andWhere(['like', 'name', $name]);
    }

    $data = $query->all();

    $output = fopen('php://output', 'w');

    Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
    Yii::$app->response->headers->add('Content-Type', 'text/csv');
    Yii::$app->response->headers->add('Content-Disposition', 'attachment; filename="student.csv"');

    fputcsv($output, ['ID', 'Nama Pelajar', 'Umur', 'Status', 'Nama Penjaga', 'Alamat', 'No. Telefon Penjaga']); 

    foreach ($data as $row) {
        $status = ($row->status == 10) ? 'Aktif' : 'Tidak Aktif';
        fputcsv($output, [$row->id, $row->name, $row->age,$status,$row->parent_name, $row->address,$row->parent_contact]);
    }

    fclose($output);

    Yii::$app->end();
}

}
