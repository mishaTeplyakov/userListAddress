<?php
use yii\helpers\Html;


?>
<div class="address-redact">

    <gh1><?= Html::encode($this->title) ?></gh1>

    <?= $this->render('_form', [
        'address' => $address,
    ]) ?>

</div>