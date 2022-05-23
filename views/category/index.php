<h1>Gestionar categorias</h1>
<a href="<?=base_url?>category/create" class="button category_btn">New Category</a>
<table id="category_table">
    <tr>
        <th>Id</th>
        <th>Category</th>
    </tr>
    <?php while ($cat = $categories->fetch_object()) : ?>
        <tr>
            <td>
                <?= $cat->id; ?>
            </td>
            <td>
                <?= $cat->category; ?>
            </td>
        </tr>
    <?php endwhile; ?>
</table>