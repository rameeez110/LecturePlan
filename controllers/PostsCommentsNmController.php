<?php

namespace app\controllers;

use Yii;
use app\models\PostsCommentsNm;
use app\models\PostsCommentsNmSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostsCommentsNmController implements the CRUD actions for PostsCommentsNm model.
 */
class PostsCommentsNmController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all PostsCommentsNm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostsCommentsNmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PostsCommentsNm model.
     * @param string $postId
     * @param string $commentId
     * @return mixed
     */
    public function actionView($postId, $commentId)
    {
        return $this->render('view', [
            'model' => $this->findModel($postId, $commentId),
        ]);
    }

    /**
     * Creates a new PostsCommentsNm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PostsCommentsNm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'postId' => $model->postId, 'commentId' => $model->commentId]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PostsCommentsNm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $postId
     * @param string $commentId
     * @return mixed
     */
    public function actionUpdate($postId, $commentId)
    {
        $model = $this->findModel($postId, $commentId);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'postId' => $model->postId, 'commentId' => $model->commentId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PostsCommentsNm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $postId
     * @param string $commentId
     * @return mixed
     */
    public function actionDelete($postId, $commentId)
    {
        $this->findModel($postId, $commentId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PostsCommentsNm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $postId
     * @param string $commentId
     * @return PostsCommentsNm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($postId, $commentId)
    {
        if (($model = PostsCommentsNm::findOne(['postId' => $postId, 'commentId' => $commentId])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
