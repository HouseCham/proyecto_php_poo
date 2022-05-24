<h1>Gestion de productos</h1>
<a href="<?=base_url?>product/create" class="button category_btn">New Product</a>

<!-- SESSION create product -->
<?php if(isset($_SESSION['product']) && $_SESSION['product'] == "complete"): ?>
    <strong class="alert_green">El producto se ha agregado correctamente</strong>
<?php elseif(isset($_SESSION['product']) && $_SESSION['product'] != "complete"): ?>
    <strong class="alert_red">El producto NO se ha agregado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('product'); ?>

<!-- SESSION create product -->
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == "complete"): ?>
    <strong class="alert_green">El producto se ha eliminado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != "complete"): ?>
    <strong class="alert_red">El producto NO se ha eliminado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>


<table id="category_table">
    <tr>
        <th>Id</th>
        <th>Product</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Actions</th>
    </tr>
    <?php while ($product = $products->fetch_object()) : ?>
        <tr>
            <td> <?= $product->id; ?> </td>
            <td> <?= $product->product; ?> </td>
            <td> <?= $product->price; ?> </td>
            <td> <?= $product->stock; ?> </td>
            <td>
                <a href="<?=base_url?>product/delete&id=<?=$product->id;?>" class="button product_btn btn_red">Delete</a>
                <a href="<?=base_url?>product/edit&id=<?=$product->id;?>" class="button product_btn btn_yellow">Edit</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>