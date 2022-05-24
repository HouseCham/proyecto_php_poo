<?php if(isset($edit) && isset($productToEdit) && is_object($productToEdit)): ?>
    <h1>Edit product <?= $productToEdit->product ?></h1>
    <?php $url_action = base_url."product/save&id=".$productToEdit->id; ?>
<?php else: ?>
    <h1>Create new product</h1>
    <?php $url_action = base_url."product/save"; ?>
<?php endif; ?>

<form action="<?= $url_action; ?>" method="POST" enctype="multipart/form-data">
    <label for="product">Name</label>
    <input type="text" name="product" class="input" value="<?= isset($productToEdit) && is_object($productToEdit) ? $productToEdit->product : '' ?>" required />

    <label for="description">Description</label>
    <textarea name="description" cols="30" class="input" rows="10"><?= isset($productToEdit) && is_object($productToEdit) ? $productToEdit->description : '' ?></textarea>

    <label for="price">Price</label>
    <input type="text" name="price" class="input" value="<?= isset($productToEdit) && is_object($productToEdit) ? $productToEdit->price : '' ?>" required />

    <label for="stock">Stock</label>
    <input type="number" name="stock" class="input" value="<?= isset($productToEdit) && is_object($productToEdit) ? $productToEdit->stock : '' ?>" required />

    <label for="category">Category</label>
    <?php $categories = Utils::showCategories(); ?>
    <select name="category">
        <?php while ($category = $categories->fetch_object()) : ?>
            <option value="<?= $category->id ?>" <?= isset($productToEdit) && is_object($productToEdit) && $category->id == $productToEdit->category_id ? 'selected' : '' ?>>
                <?= $category->category ?>
            </option>
        <?php endwhile; ?>
    </select>

    <label for="image">Image</label>
    <?php if(isset($productToEdit) && is_object($productToEdit) && !empty($productToEdit->image)):?>
        <img src="<?=base_url?>/uploads/images/<?=$productToEdit->image?>" alt="<?=$productToEdit->image?>" class="thumb">
    <?php endif; ?>
    <input type="file" name="image" class="input"/>

    <input type="submit" class="button" value="Submit">
</form>