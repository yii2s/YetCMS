<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\user\models\User $user
 * @var app\modules\user\models\Profile $profile
 */

$this->title = Yii::t('user', 'Update {modelClass}: ', [
  'modelClass' => 'User',
]) . ' ' . $user->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $user->id, 'url' => ['view', 'id' => $user->id]];
$this->params['breadcrumbs'][] = Yii::t('user', 'Update');
?>
<div class="box">
	<div class="box-header">
    	<h2><i class="fa fa-user"></i><span class="break">用户更新</span></h2>
    	<div class="box-icon">
		</div>
    </div>
    <div class="box-content">
    <?= $this->render('_form', [
        'user' => $user,
        'profile' => $profile,
    ]) ?>

</div>
</div>
