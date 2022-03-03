<?php include ('header.php');?>
    <h2>Categories</h2>    
    <table>
        <tr>
            <th>Categories</th>
        </tr>
        
        <?php if(is_array($categories) || is_object($categories))
        {
            foreach($categories as $category) {?>
        <tr>
            <td>
                <a href="?categoryid=<?php echo $category['categoryID'];?>">
                    <?php echo $category['categoryName']; ?></a>       
            </td>

            <td><form action="." method="post">
                <input type="hidden" name="action" value="delete_category"/>
                <input type="hidden" name="categoryid" value="<?php echo $category['categoryID'];?>"/>
                <input type="submit" value="Delete"/>
        </tr>
        <?php } }?>

    </table>
    
    <p><a href="?action=list_items">View ToDo item list</a></p>
    <p> <a href="?action=show_add_form">Add ToDo Item</a></p>
    <p><a href="?action=show_category_form">Add Category</a></p>


<?php include ('footer.php'); ?>