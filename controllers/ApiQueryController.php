<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\ApiQuery;


class ApiQueryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Acción para mostrar las preguntas de la API según los filtros proporcionados.
     * @return string La vista con los datos de las preguntas
     */
    public function actionQuestions()
    {

        $tagged = '';
        $todate = '';
        $fromdate = '';

        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post('ApiQuery');
            $tagged = $data['tagged'];
            $todate = $data['todate'];
            $fromdate = $data['fromdate'];
        }

        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'https://api.stackexchange.com/2.2/questions', [
                'query' => [
                    'tagged' => $tagged,
                    'todate' => $todate,
                    'fromdate' => $fromdate,
                    'site' => 'stackoverflow',
                ]
            ]);


            $result = json_decode($response->getBody()->getContents(), true);

            $query = new ApiQuery();
            $query->tagged = $tagged;
            $query->todate = $todate;
            $query->fromdate = $fromdate;
            $query->result = json_encode($result);
            $query->save();
        } catch (\Exception $e) {
            Yii::$app->session->setFlash('error', 'Hubo un error al realizar la solicitud a la API: ' . $e->getMessage());
            return $this->redirect(['index']);
        }

        return $this->render('questions', ['result' => $result]);
    }

    /**
     * Acción para mostrar el historial de consultas de la API.
     * @return string La vista con los datos del historial de consultas realizadas
     */
    public function actionHistorys()
    {
        try {
            $apiQueries = ApiQuery::find()->orderBy(['id' => SORT_DESC])->all();

            $resultData = [];
            foreach ($apiQueries as $apiQuery) {
                $result = json_decode($apiQuery->result, true);

                $resultData[] = [
                    'id' => $apiQuery->id,
                    'tagged' => $apiQuery->tagged,
                    'fromdate' => $apiQuery->fromdate,
                    'todate' => $apiQuery->todate,
                    'created' => $apiQuery->created_at,
                    'tags' => $result['items'][0]['tags'],
                    'owner' => $result['items'][0]['owner'],
                    'link' => $result['items'][0]['link'],
                    'score' => $result['items'][0]['score'],
                    'view_count' => $result['items'][0]['view_count'],
                ];
            }

            // Renderizar la vista con los datos del historial de consultas
            return $this->render('historys', [
                'resultData' => $resultData,
            ]);
        } catch (\Exception $e) {
            // Manejar cualquier excepción y redirigir a la acción de índice
            Yii::$app->session->setFlash('error', 'Hubo un error al recuperar las consultas de la API: ' . $e->getMessage());
            return $this->redirect(['index']);
        }
    }

    /**
     * Acción para mostrar una pregunta específica.
     * @param int $id El ID de la consulta de la API
     * @return string La vista con los datos de la pregunta
     */
    public function actionQuestion($id)
    {
        try {
            // Buscar la consulta de la API por su ID en la BD
            $apiQuery = ApiQuery::find()->where(['id' => $id])->one();
            if (!$apiQuery) {
                throw new \Exception('ID de consulta de API inválido');
            }
            $resultData = [];
            $result = json_decode($apiQuery->result, true);

            $resultData[] = [
                'id' => $apiQuery->id,
                'tagged' => $apiQuery->tagged,
                'fromdate' => $apiQuery->fromdate,
                'todate' => $apiQuery->todate,
                'created' => $apiQuery->created_at,
                'result' => $result
            ];
    
            // Renderizar la vista con los datos de la pregunta
            return $this->render('question', [
                'resultData' => $resultData,
            ]);
        } catch (\Exception $e) {
            // Manejar cualquier excepción y redirigir a la acción de historial
            Yii::$app->session->setFlash('error', 'Hubo un error al recuperar la consulta de la API: ' . $e->getMessage());
            return $this->redirect(['historys']);
        }
    }
}
