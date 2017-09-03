<div class="site-index">

    <?php if($tyre): ?>
        <div>Бренд: <?= $tyre->brand;?></div>
        <div>Модель: <?= $tyre->model;?></div>
        <div>Ширина: <?= $tyre->width;?></div>
        <div>Высота: <?= $tyre->height;?></div>
        <div>Конструкция: <?= $tyre->construction;?></div>
        <div>Диаметр: <?= $tyre->diameter;?></div>
        <div>Индекс нгрузки: <?= $tyre->loadidx;?></div>
        <div>Индекс скорости: <?= $tyre->loadspeed;?></div>
        <div>Сезон: <?= $tyre->season;?></div>
        <div>Камерность: <?= $tyre->camer;?></div>
        <div>Ранфлет: <?= $tyre->runflat;?></div>
        <div>Характеризующие аббревиатуры: <?= $tyre->abbr;?></div>


    <?php else: ?>
        <div> Распознать характеристики не удалось</div>
    <?php endif; ?>
</div>