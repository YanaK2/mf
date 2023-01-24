<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use app\models\ProdSearch;
use app\models\Prod;


$this->title = 'О нас';
$this->params['breadcrumbs'][] = $this->title;
?>




    <!--  <div id='carouselExampleSlidesOnly' class='carousel slide' data-bs-ride='carousel'>
          <div class='carousel-inner'>
              <div class='carousel-item active'>
                  <img src='' class='d-block w-100' alt='Image'>
              </div>
              <div class='carousel-item'>
                  <img src='' class='d-block w-100' alt='Image2'>
              </div>
              <div class='carousel-item'>
                  <img src='' class='d-block w-100' alt='Image3'>
              </div>
          </div>
      </div>
      -->
<div class="">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <img class="card-img-left" src='\rootImage\logo.png' width="100" height="100"
             alt='Иллюстрация' align='left' vspace='5' hspace='5'>
        Наш интернет магазин MF предлагает Вам цветы и флористические услуги только высшего качества.
        Мы внимательно контролируем логистику и сроки доставки каждого букета. У нас работает команда
        профессиональных флористов, которые подберут и составят яркий букет на любой вкус и случай.
    </p>
<div class="site-about">

    <?php $prods=Prod::find()->orderBy(['time'=>SORT_DESC])->limit(5)->all();
    $items=[];

    foreach ($prods as $prod){
        $items[]="<div class='bg-light m-1 p-5 d-flex flex-column justify-content-center'>
    <h1 class='text-center m-2'>{$prod->name}</h1>
    <img class='m-auto' style='height: 300px; width:300px;align-content: center' src='{$prod->photo}' alt='photo'/></div>";
    }
    echo yii\bootstrap5\Carousel::widget(['items'=>$items]);
    ?>
</div>
   <!-- <code><?= __FILE__ ?></code>-->
</div>
