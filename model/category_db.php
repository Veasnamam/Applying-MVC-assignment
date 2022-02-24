<?php
function get_categories(){
    global $db;
    $query = "SELECT * FROM categories 
              ORDER BY categoryID";
    $categories = $db->query($query);
    return $categories;
}

function get_category_name($categoryid){
    global $db;
    $query = "SELECT * FROM categories
              WHERE categoryID = :categoryid";
    $category = $db->prepare($query);
    $category->bindValue(':categoryid', $categoryid);
    $category = $category->fetch();
}
function add_category($categoryid, $category_name){
    global $db;
    $query = "INSERT INTO categories
                (categoryID, categoryName)
              VALUES
                ('$categoryid', '$category_name')";
    $db->exec($query);
}

function delete_category($categoryid){
    global $db;
    $query = "DELETE FROM categories
              WHERE categoryID = '$categoryid'";
    $db->exec($query);

}
?>