<h1>Productos destacados</h1>
<?php while ($product = $products->fetch_object()) : ?>
    <div class="product">
        <a href="<?=base_url?>product/view&id=<?=$product->id?>">
            <img src="uploads/images/<?= $product->image ?>" alt="" class="product_img">
            <h2><?= $product->product ?></h2>
            <p><?= $product->price ?></p>
        </a>
        <a href="#" class="button">Buy</a>
    </div>
<?php endwhile; ?>