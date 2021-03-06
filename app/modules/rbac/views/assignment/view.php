<?php

use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var yii\web\View                         $this
 * @var yii\data\ActiveDataProvider          $dataProvider
 * @var yii2mod\rbac\models\AssignmentSearch $searchModel
 */
$this->title = '权限分配';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="box">
    <div class="box-header">
    	<h2><i class="fa fa-user"></i><span class="break"><?php echo Html::encode($this->title); ?></span></h2>
    	<div class="box-icon">
		</div>
    </div>
    <div class="box-content">
        <h1>用户: <?php echo $model->{$usernameField}; ?></h1>

        <div class="row">
            <div class="col-lg-5">
                <?php
                echo Html::textInput('search_av', '', [
                        'class' => 'role-search form-control',
                        'data-target' => 'available',
                        'placeholder' => 'Search:'
                    ]) . '<br>';
                echo Html::listBox('roles', '', $available, [
                    'id' => 'available',
                    'multiple' => true,
                    'size' => 20,
                    'style' => 'width:100%',
                    'class' => 'form-control'
                ]);
                ?>
            </div>
            <div class="col-lg-2">
                <div class="move-buttons">
                    <?php
                    echo Html::a('<i class="glyphicon glyphicon-chevron-left"></i>', '#', [
                        'class' => 'btn btn-success',
                        'data-action' => 'delete'
                    ]);
                    ?>
                    <?php
                    echo Html::a('<i class="glyphicon glyphicon-chevron-right"></i>', '#', [
                        'class' => 'btn btn-success',
                        'data-action' => 'assign'
                    ]);
                    ?>
                </div>
            </div>
            <div class="col-lg-5">
                <?php
                echo Html::textInput('search_asgn', '', [
                        'class' => 'role-search form-control',
                        'data-target' => 'assigned',
                        'placeholder' => 'Search:'
                    ]) . '<br>';
                echo Html::listBox('roles', '', $assigned, [
                    'id' => 'assigned',
                    'multiple' => true,
                    'size' => 20,
                    'style' => 'width:100%',
                    'class' => 'form-control',
                ]);
                ?>
            </div>
        </div>
    </div>
    </div>
<?php
$this->registerJs("rbac.init({
        name: " . json_encode($id) . ",
        route: '" . Url::toRoute(['role-search']) . "',
        routeAssign: '" . Url::toRoute(['assign', 'id' => $id, 'action' => 'assign']) . "',
        routeDelete: '" . Url::toRoute(['assign', 'id' => $id, 'action' => 'delete']) . "',
        routeSearch: '" . Url::toRoute(['route-search']) . "'
    });", yii\web\View::POS_READY);
