<?php
function get_items_by_category($categoryid){
    global $db;
    $query = 'SELECT c.categoryID, c.categoryName, t.Title, t.Description, t.categoryID, t.ItemNum
              FROM todoitems t
              JOIN categories c
                ON t.categoryID = c.categoryID
              ORDER BY t.ItemNum ASC' ;
    $items = $db->query($query);
    return $items;
}

function get_items($itemnum){
    global $db;
    $query = "SELECT * FROM todoitems
              WHERE ItemNum = '$itemnum'";
    $item = $db->query($query);
    $item = $item->fetch();
    return $item;
}

function delete_item($itemnum){
    global $db;
    $query = "DELETE FROM todoitems
              WHERE ItemNum = '$itemnum'";
    $db->exec($query);
}


function add_item($categoryid, $title, $description){
    global $db;
    $query = "INSERT INTO todoitems 
                (categoryID, Title, Description)
              VALUES
                ('$categoryid', '$title', '$description')";
    $db->exec($query);
}
?>