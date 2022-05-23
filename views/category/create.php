<h1>Create new category</h1>
<form action="<?= base_url ?>category/save" method="POST">
    <label for="category">Category</label>
    <input class="input" type="text" name="category" placeholder="category name" required/>
    <br>
    <input type="submit" class="button"/>
</form>