<h1>Shopping car</h1>

<table>
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Units</th>
    </tr>
    <?php foreach ($cart as $index => $element) : ?>
        <?php $product = $element['product']; ?>
        <tr>
            <td>
                <img src="<?=base_url?>uploads/images/<?=$product->image?>" alt="" class="cart_img">
            </td>
            <td><?=$product->product?></td>
            <td><?=$element['price']?></td>
            <td><?=$element['units']?></td>
        </tr>
    <?php endforeach; ?>

</table>