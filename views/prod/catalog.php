<?php

use app\models\Prod;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProdSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Каталог товаров';
$this->params['breadcrumbs'][] = $this->title;?>
<h1>Каталог товаров</h1>
  <div class="btn-group m-1">
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            По цене</button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="catalog?sort=price">По возрастанию</a></li>
            <li><a class="dropdown-item" href="catalog?sort=-price">По убыванию</a></li>
        </ul>
    </div>

    <div class="btn-group m-1">
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            По новизне</button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="catalog?sort=-time">Новые</a></li>
            <li><a class="dropdown-item" href="catalog?sort=time">Старые</a></li>
        </ul>
    </div>

    <div class="btn-group m-1">
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            По стране поставщика</button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="catalog?sort=country">По возрастанию (А-Я)</a></li>
            <li><a class="dropdown-item" href="catalog?sort=-country">По убыванию (Я-А)</a></li>
        </ul>
    </div>

    <div class="btn-group m-1">
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            По названию</button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="catalog?sort=name">По возрастанию (А-Я)</a></li>
            <li><a class="dropdown-item" href="catalog?sort=-name">По убыванию (Я-А)</a></li>
        </ul>
    </div>

    <div class="btn-group m-1">
        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Фильтр по категориям</button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="catalog?ProdSearch[id_cat]=2">Цветы</a></li>
            <li><a class="dropdown-item" href="catalog?ProdSearch[id_cat]=3">Упаковка</a></li>
            <li><a class="dropdown-item" href="catalog?ProdSearch[id_cat]=4">Дополнительно</a></li>
        </ul>
    </div>

<?php $prods=$dataProvider->getModels();
echo "<div class='d-flex flex-row flex-wrap justify-content-start align-items-end'>";
foreach ($prods as $prod){
    if ($prod->count>0) {
        echo "<div class='card m-1' style='width: 22%; min-width: 300px;'>
 <a href='/prod/view?id_prod={$prod->id_prod}'><img src='{$prod->photo}'
class='card-img-top' style='height: 300px; width: 300px;' alt='image'></a>
 <div class='card-body'>
 <h5 class='card-title'>{$prod->name}</h5>
 <p class='text-danger'>{$prod->price} руб</p>";
        echo (Yii::$app->user->isGuest ? "<a href='/prod/view?
id_prod={$prod->id_prod}' class='btn btn-primary'>Просмотр товара</a>": "<p
onclick='add_prod({$prod->id_prod},1)' class='btn btn-primary'>Добавить в корзину</p>");
        echo "</div>
</div>";}
}
echo "</div>";
?>

