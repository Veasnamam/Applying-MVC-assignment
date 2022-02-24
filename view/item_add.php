<?php
    include ('header.php');
?>
<section>
            <h2>Add Item</h2>
            <form action="index.php" method="POST" id="add_item_form">
                <input type="hidden" name="action" value="add_item"/>
            <div class="row">
                <div class="col-75">
                <input type="text" id="title" name="title" placeholder="Title"><br>
                </div>
            </div>

            <div class="row">
                <div class="col-75">
                <input type="text" id="description" name="description" placeholder="Description">
                </div>
            </div>

            <div class="row">
                <div class="col-75">
                    <select name="categoryid">
                        <?php foreach ($categories as $category) :?>
                            <option value="<?php echo $category['categoryID'];?>">
                                <?php echo $category['categoryName'];?>
                            </option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="row">
                <button type="submit" value="Add Item">Add Item</button>
            </div>
            </form>
            <p><a href="index.php?action=list_items">View ToDo item list</a></p>
            <p><a href="?action=show_category_form">Add Category</a></p>
            <p><a href="?action=list_categories">View Category list</a></p>
</section>

<?php include ('footer.php'); ?>