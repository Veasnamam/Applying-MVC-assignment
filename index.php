<?php
require ('./model/database.php');
require ('./model/item_db.php');
require ('./model/category_db.php');

$title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, "description",FILTER_SANITIZE_STRING); 
$category_name = filter_input(INPUT_POST, "category_name", FILTER_SANITIZE_STRING);


$categoryid = filter_input(INPUT_POST, "categoryid", FILTER_VALIDATE_INT);
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}
else if(isset($_GET['action'])){
    $action = $_GET['action'];
}
else {
    $action = 'list_items';
}

if ($action == 'list_items'){
    $categoryid = filter_input(INPUT_GET, 'categoryid', FILTER_VALIDATE_INT);
    //Get the current categoryID
    if (!isset($categoryid)){
        $categoryid=NULL;
    }
    //Get the product and category data
    $category_name = get_category_name($categoryid);
    $categories = get_categories();
    $items = get_items_by_category($categoryid);

    //Display Item list
    include ("./view/item_list.php");
} 
else if ($action == 'list_categories'){
    $category_name = get_category_name($categoryid);
    $categories = get_categories();

    include ("./view/category_list.php");
}
else if ($action == 'delete_item'){
    //Get the IDs and delete
    $itemnum = $_POST['itemnum'];
    delete_item($itemnum);
    
    //Display The itemlist page for the current category
    header("Location: .?itemnum=$itemnum");
    
}  
else if($action == 'delete_category'){
    $categories = get_categories();
    $categoryid = $_POST['categoryid'];
    delete_category($categoryid);
    
    header("Location: .?category=$categoryid");

} 
else if ($action == 'show_add_form'){
    $categories = get_categories();

   include ("./view/item_add.php");
}
else if ($action == 'add_item'){


if (empty($title) || empty($description) ){
    $error = "<script> alert('Error! Insert into all fields and try again.')</script>";
    include('error.php');
} 
else {
    add_item($categoryid, $title, $description);
    
    
    //Display the item list page for the current category
    header("Location: .?itemnum=$itemnum");
}
}
else if ($action == 'show_category_form'){
    include ("./view/category_add.php");
}
else if ($action == 'add_category'){
    $categories = get_categories();
    if (empty($category_name)){
        $error = "<script> alert('Error! Insert into all fields and try again')</script>";
        include ('error.php');
    }
    else{
        add_category($categoryid, $category_name);
       
        include ("./view/category_list.php");
    }
}
?>