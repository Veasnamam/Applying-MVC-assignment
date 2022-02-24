<?php
    include ('header.php');
?>

<section>
    <h2>Add Category</h2>
    <form action="index.php" method="POST" id="add_category_form">
        <input type="hidden" name="action" value = "add_category"/>
        <div class="row">
            <div class="col-75">
                <input type="text" id="category_name" name="category_name" placeholder="Category Name"/>
            </div>
        </div>

        
        <div class="row">
            <button type="submit" value="Add Category">Add Category</button>
        </div>
    </form>
    <p><a href="index.php?action=list_categories">View Category list</a></p>
    <p><a href="index.php?action=list_items">View ToDo item list</a></p>
    <p> <a href="?action=show_add_form">Add ToDo Item</a></p>
</section>

<?php include ('footer.php'); ?>