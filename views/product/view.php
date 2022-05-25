<?php if (isset($oneProduct)) : ?>
    <div id="single_product">
        <h1><?= $oneProduct->product ?></h1>
        <img src="<?= base_url ?>/uploads/images/<?= $oneProduct->image ?>" alt="<?= $oneProduct->image ?>">
        <p><?= $oneProduct->description ?></p>
        <span><?= $oneProduct->price ?></span>
        <a href="#" class="button">Buy</a>
    </div>
<?php else : ?>
    <h1>This product doesnt exists</h1>
<?php endif; ?>