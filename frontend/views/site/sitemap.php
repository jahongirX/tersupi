<?php

$this->title = \common\components\StaticFunctions::getSettings('title') . " - " . Yii::t('main','sitemap');

$lang = Yii::$app->session->get('lang');
if (empty($lang)) {
    $lang = Yii::$app->language;
}

use common\models\Menu;

function renderSitemap($id){

    $out = '';
    $menu = Menu::find()->where('status=1')->andWhere(['id' => $id, 'type' => 0])->one();
    $_query = Menu::find()->where('status=1')->andWhere(['parent' => $id,'type' => 0]);

    if( $_query->exists() )
    {
        $out .= '<li> <a href="#"> <i class="fa fa-folder-open"></i> ';
        $out .= $menu->title . '</a>';
        $out .= '<ul class="map-dropdown">';
        $items = $_query->orderBy(['order_by' => SORT_ASC])->all();
        foreach ($items as $item){
            $submenu = Menu::find()->where(['parent'=>$item->id])->all();
            if(!empty($submenu)){
                $out .= '<li class="map-dropdown-li"><a href="#"> <i class="fa fa-folder-open"></i>' . $item->title .'</a><ul class="map-sub-dropdown">';
                foreach ($submenu as $subitem){
                    if($subitem->url != '/')
                        $out .= '<li><a href="'.$subitem->url.'"> <i class="fa fa-link"></i> '.$subitem->title.'</a></li>';
                    else
                        $out .= '<li><i class="fa fa-link"></i> '.$subitem->title.'</li>';
                }
                $out .= '</ul></li>';
            }else{
                if($item->url != '/')
                    $out .= '<li><a  href="'.$item->url. '"> <i class="fa fa-link"></i>' . $item->title .'</a></li>';
                else
                    $out .= '<li> <i class="fa fa-link"></i> ' . $item->title .'</li>';
            }


        }

        $out .= '</ul>';

    } else {

        if(!empty($menu->url))
            $out .= '<li><a href="' .$menu->url. '"> <i class="fa fa-link"></i> '.$menu->title.'</a></li>';
        else
            $out .= '<li><i class="fa fa-link"></i> '.$menu->title.'</li>';

    }

    return $out;

}
?>

<!-- Page Banner Section Start -->
<div class="page-banner bg-color-05">
    <div class="page-banner__wrapper">
        <div class="container">



            <!-- Page Banner Caption Start -->
            <div class="page-banner__caption text-center">
                <h2 class="page-banner__main-title card p-5"><?=Yii::t('main','sitemap')?></h2>
            </div>
            <!-- Page Banner Caption End -->

        </div>
    </div>
</div>
<!-- Page Banner Section End -->

<!-- Blog Start -->
<div class="blog-section section-padding-01">
    <div class="container">

        <!-- Page Breadcrumb Start -->
        <div class="page-breadcrumb mb-15">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=\yii\helpers\Url::Home()?>"><?=Yii::t('main','home')?></a></li>
                <li class="breadcrumb-item active"><?=Yii::t('main','sitemap')?></li>
            </ul>
        </div>
        <!-- Page Breadcrumb End -->

        <div class="row gy-10">
            <div class="col-lg-8 col-xl-9">

                <div class="blog-details">

                    <div class="blog-details__content">


                        <div class="post_detail mb-5">
                            <h3 class="blog-details__title"><?=Yii::t('main','sitemap')?></h3>
                            <ul>
                                <?php

                                foreach ($models as $model) {

                                    echo renderSitemap( $model->id );

                                }

                                ?>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>

            <?=\frontend\widgets\Sidebar::widget()?>

        </div>

    </div>

</div>
