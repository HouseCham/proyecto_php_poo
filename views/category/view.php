<?php if (isset($category)) : ?>
    <h1>BLA BLA BLA</h1>
    <?php if ($products->num_rows == 0) : ?>
        <p>There are no products to show</p>
    <?php else : ?>
        <?php while ($product = $products->fetch_object()) : ?>
            <div class="product">
                <a href="<?= base_url ?>product/view&id=<?= $product->id ?>">
                    <?php if ($product->image != null) : ?>
                        <img src="<?= base_url ?>uploads/images/<?= $product->image ?>" alt="" class="product_img">
                    <?php else : ?>
                        <!-- default image -->
                    <?php endif; ?>
                    <h2><?= $product->product ?></h2>
                    <p><?= $product->price ?></p>
                </a>
                <a href="#" class="button">Buy</a>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php else : ?>
    <h1>This category doesnt exists</h1>
<?php endif; ?>