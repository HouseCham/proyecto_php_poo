<h1>Create new product</h1>

<form action="<?= base_url ?>product/save" method="POST">

    <label for="product">Name</label>
    <input type="text" name="product" class="input" required />

    <label for="description">Description</label>
    <textarea name="description" cols="30" class="input" rows="10"></textarea>

    <label for="price">Price</label>
    <input type="text" name="price" class="input" required />

    <label for="stock">Stock</label>
    <input type="number" name="stock" class="input" required />

    <label for="category">Category</label>
    <?php $categories = Utils::showCategories(); ?>
    <select name="category">
        <?php while ($category = $categories->fetch_object()) : ?>
            <option value="<?= $category->id ?>">
                <?= $category->category ?>
            </option>
        <?php endwhile; ?>
    </select>

    <label for="image">Image</label>
    <input type="file" name="image" class="input"/>

    <input type="submit" class="button" value="Submit">
</form>