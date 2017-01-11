<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 2016/12/7
 * Time: 10:55
 * Email:liyongsheng@meicai.cn
 */

/* @var $this yii\web\View */
/* @var $model \app\models\News */
use yii\bootstrap\Html;
use app\widgets\LastNews;
use app\widgets\ConfigPanel;
use yii\widgets\ListView;
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label'=>'产品', 'url'=>['/products/list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .img-box{
        height: 400px;width:400px; text-align: center;vertical-align: middle;display: table-cell;
    }
    .img-box img{
        display: inline;
        max-width:400px;max-height: 400px;
    }
</style>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-lg-3">
                <?=\app\widgets\Category::widget(['type'=>\app\models\Content::TYPE_PRODUCTS,
                    'options'=>['class'=>'panel panel-default panel-'.\yii\helpers\ArrayHelper::getValue($this->params,'themeColor')]
                ])?>
                <?=\app\widgets\LastNews::widget(['options'=>['class'=>'panel panel-default panel-'.\yii\helpers\ArrayHelper::getValue($this->params,'themeColor')]
                ])?>
                <?=\app\widgets\ConfigPanel::widget(['configName'=>'contact_us',
                    'options'=>['class'=>'panel panel-default panel-'.\yii\helpers\ArrayHelper::getValue($this->params,'themeColor')]
                ])?>
            </div>
            <div class="col-lg-9">
                <div class="panel-body">
                    <?= ListView::widget([
                        'dataProvider' => $dataProvider,
                        'layout' => "<div class='panel-body'>{items}</div>\n<div class='panel-body'>{pager}</div>",
                        'itemView'=>function($item){
                            return '<img src="'.$item->file_url.'"/>';
                        }
                    ]); ?>
                </div>
                <div class="panel-body" style="text-align: center">
                    <div class="row">
                        <div class="col-lg-3">
                            <?=$this->render('@app/views/news/_share')?>
                        </div>
                        <div class="col-lg-9 text-right">
                            <?php if($previous = $model->previous()):?>
                                上一相册 <?=Html::a($previous->title, ['/photos/index', 'id'=>$previous->id])?>
                            <?php endif;?>
                            <?php if($next = $model->next()):?>
                                下一相册 <?=Html::a($next->title, ['/photos/index', 'id'=>$next->id])?>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>