<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Список пользователей';
?>

<table class="table">
<thead>
    <tr>
        <th>Фото</th>
        <th>Имя и фамилия</th>
        <th>Email</th>
        <th>Дата</th>
    </tr>
</thead>
<?php foreach ($models as $user):?>
        <tbody>
            <tr>
                <td><img src="<?=$user->getPhoto($user->sex);?>"></td>
                <td><a href="<?=Url::to(['address/index','id' => $user->id])?>"><?=$user->name ." ". $user->surname?></a></td>
                <td><?=$user->email?></td>
                <td><?=$user->getDate()?></td>
            </tr>
        </tbody>
<?php endforeach;?>
</table>
<?php

echo LinkPager::widget([
    'pagination' => $pages,
]);
?>
