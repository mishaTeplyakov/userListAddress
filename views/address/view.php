<?php

?>

<ul class="media-list">
    <li class="media">
        <a class="pull-left" href="">
            <img class="media-object" src="<?=$user->getPhoto($user->sex);?>">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><?=$user->name ." ". $user->surname?></h4>
            <p>Email: <?=$user->email?></p>
            <p>Date: <?=$user->date?></p>
        </div>
    </li>
</ul>
<a>
    <?= \yii\bootstrap\Html::a('Добавить адрес', ['add-address', 'id' => $user->id], ['class' => 'btn btn-primary btn-sm']) ?>
</a>
<table class="table">
    <thead>
        <tr>
            <th>Почтовый индекс</th>
            <th>Страна</th>
            <th>Город</th>
            <th>Улица</th>
            <th>№ дома</th>
            <th>Деуствия</th>
        </tr>
    </thead>
<?php foreach ($user->address as $item):?>
    <tbody>
        <tr>
            <td><?=$item->post_index?></td>
            <td><?=$item->country?></td>
            <td><?=$item->city?></td>
            <td><?=$item->street?></td>
            <td><?=$item->num_home?></td>
            <td>
                <div class="btn-group-vertical">
                    <?= \yii\bootstrap\Html::a('Редактировать адрес',
                        ['redact-address', 'id' => $item->id], ['class' => 'btn btn-primary btn-sm'])
                    ?>
                    <?= \yii\bootstrap\Html::a('Удалить адрес',
                        ['delete-address', 'id' => $item->id], ['class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => 'Вы уверены, что хотите удалить этот пункт?',
                                'method' => 'post',
                            ],
                        ])
                    ?>
                </div>
            </td>
        </tr>
    </tbody>
<?php endforeach;?>
</table>
