<?php

namespace frontend\controllers;

use common\models\Media;
use common\models\Rate;
use common\models\TicketSearch;
use common\models\Usersubject;
use Yii;
use common\models\Stream;
use common\models\StreamSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use common\models\UsersubjectSearch;

/**
 * StreamController implements the CRUD actions for Stream model.
 */
class StreamController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Stream models.
     * @return mixed
     */
    public function actionList($subject_id)
    {


        $searchModel = new StreamSearch();
        $searchModel -> subject_id = $subject_id ;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [

            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);


    }
    public function actionShow($subject_id)
    {


        $searchModel = new StreamSearch();
        $searchModel -> subject_id = $subject_id ;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('show', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);


    }

    public function actionIndex()
    {

            $searchModel = new StreamSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,

            ]);


    }

    public function actionUdone()
    {

        $searchModel = new StreamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('udone', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);


    }

    public function actionKartabl()
    {
        $user = Yii::$app->user->id;
        $searchModel = new UsersubjectSearch();
        $searchModel -> user_id = $user;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('kartabl', [

            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    
    public function actionDone()
    {
        $user = Yii::$app->user->id;
        $searchModel = new UsersubjectSearch();
        $searchModel -> user_id = $user;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('done', [

            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Stream model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $searchModel = new TicketSearch();
        $searchModel->stream_id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Stream model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $user = Yii::$app->user->id;
        $model = new Stream();
        $model->user_id = $user;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Stream model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Stream model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Stream model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Stream the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Stream::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    
    public function actionFinish($id)
    {
        $stream = Stream::findOne($id);
        $stream ->status = 2 ;
        $stream -> save();
      return  $this->redirect(['done']);
    }

}
