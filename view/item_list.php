<?php include ('header.php'); ?>
<main>
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Category</th>
        </tr>
        <?php foreach($items as $item): ?>
        <tr>
            <td><?php echo $item['Title']?></td>
            <td><?php echo $item['Description']?></td>
            <td><?php echo $item['categoryName']?> </td>

            <td><form action="." method="post">
                <input type="hidden" name="action" value="delete_item"/>
                <input type="hidden" name="itemnum" value="<?php echo $item['ItemNum'];?>"/>
                <input type="hidden" name="categoryid" value="<?php echo $item['categoryID'];?>"/>
                <input type="submit" value="Delete"/>
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p> <a href="?action=show_add_form">Add ToDo Item</a></p>
    <p><a href="?action=show_category_form">Add Category</a></p>
    <p><a href="?action=list_categories">View Category list</a></p>
</main>
<?php include ('footer.php');?>