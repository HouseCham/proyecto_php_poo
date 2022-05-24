<h1>Gestion de productos</h1>
<a href="<?=base_url?>product/create" class="button category_btn">New Product</a>
<table id="category_table">
    <tr>
        <th>Id</th>
        <th>Product</th>
        <th>Price</th>
        <th>Stock</th>
    </tr>
    <?php while ($product = $products->fetch_object()) : ?>
        <tr>
            <td>
                <?= $product->id; ?>
            </td>
            <td>
                <?= $product->product; ?>
            </td>
            <td>
                <?= $product->price; ?>
            </td>
            <td>
                <?= $product->stock; ?>
            </td>
        </tr>
    <?php endwhile; ?>
</table>