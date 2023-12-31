<?php

namespace app\controllers;
use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Security;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new User();
    
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $security = new Security();
            $user = new User([
                'username' => $model->username,  
                'password' => $security->generatePasswordHash($model->password),
                'authKey' => $security->generateRandomString(),
                'accessToken' => $security->generateRandomString(),
                'status' => $model->status,
                'role' => $model->role,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
    
            if ($user->save()) {
                if ($user->role === 'student') {
                    return $this->redirect(['student/create']);
                } elseif ($user->role === 'teacher') {
                    return $this->redirect(['teacher/create']);
                } else {
                    return $this->redirect(['index']);
                }
            } 
        }
    
        return $this->render('create', ['model' => $model]);
    }
    

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionExportCsv($username,$role)
    {
        $query = User::find();
        if (!empty($username)) {
            $query->andWhere(['like', 'name', $username]);
        }
        if (!empty($role)) {
            $query->andWhere(['role' => $role]);
        }
    
        $data = $query->all();
    
        $output = fopen('php://output', 'w');
    
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        Yii::$app->response->headers->add('Content-Type', 'text/csv');
        Yii::$app->response->headers->add('Content-Disposition', 'attachment; filename="users.csv"');
    
        fputcsv($output, ['ID', 'Nama Pengguna', 'Status', 'Peranan', 'Tarikh Ciptaan']); 
    
        foreach ($data as $row) {
            $status = ($row->status == 10) ? 'Aktif' : 'Tidak Aktif';
            fputcsv($output, [$row->id, $row->username, $status, $row->role, $row->created_at]);
        }
    
        fclose($output);
    
        Yii::$app->end();
    }
    
}
