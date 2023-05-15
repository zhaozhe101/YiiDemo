<?php

namespace app\controllers;

use PHPUnit\Framework\Constraint\Count;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;
use Yii;
use yii\web\db;

class CountryController extends Controller
{
    public function actionIndex()
    {
        $query = Country::find();
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'countries' => $countries,
            'pagination' => $pagination,
        ]);
    }
}