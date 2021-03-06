<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\modules\user\models\User $user
 */

$this->title = $user->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-header">
    	<h2><i class="fa fa-user"></i><span class="break">用户信息</span></h2>
    	<div class="box-icon">
		</div>
    </div>
    <div class="box-content">
    <p>
        <?= Html::a(Yii::t('user', 'Update'), ['update', 'id' => $user->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('user', 'Delete'), ['delete', 'id' => $user->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('user', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $user,
        'attributes' => [
            'id',
            'role',
            'status',
            'email:email',
            'new_email:email',
            'username',
            'profile.full_name',
            'password',
            'auth_key',
            'api_key',
            'login_ip',
            'login_time',
            'create_ip',
            'create_time',
            'update_time',
            'ban_time',
            'ban_reason',
        ],
    ]) ?>

</div>
</div>
