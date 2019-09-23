<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PLU System</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- Bulma Version 0.7.2-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.7.4/css/bulma.min.css" />
    <!-- <link rel="stylesheet" type="text/css" href="../css/blog.css"> -->
</head>

<?php
require_once('products.php');

$products = new Product_DB();
$products->load_product_csv_db('storage/products_database.csv');
echo "<br>products->get_db:<br>";

// $db = $products->get_db();
// echo $db;
// echo $db[1]->name;
// echo "<br>foreach:<br>";
// foreach($db as $product)
//   echo $product->name;
//   echo $product->plu;

// var_dump($products->db);
echo "<br>ended<br>";

display_table($products->db);

if(isset($_POST['product_name']) && isset($_POST['product_plu'])){
  // Clean input
  $p_name = $_POST['product_name'];
  $p_plu = $_POST['product_plu'];
  $p_name = stripslashes($p_name);
  $p_plu = stripslashes($p_plu);
  $p_name = htmlentities($p_name);
  $p_plu = htmlentities($p_plu);

  // Add to list
  echo "Adding product to list" . $p_name . " " . $p_plu;
  $product = new Product($p_name, $p_plu);
  if($products->add_product($product)){
    echo "Product added to database.<br>";
    display_table($products->db);
  }else{
    echo "Product not added to database.<br>";
  }
}

function display_table($db, $sorted=True){
  // Sort Array if needed
  if($sorted){
    usort($db, function($a, $b)
    {
        return strcmp($a->name, $b->name);
    });
  }

  // Create table
  echo "<table>";
  echo "<tr>";
  echo "<th>NAME</th>";
  echo "<th>PLU</th>";
  echo "</tr>";
  foreach ($db as $product){
    echo "<tr>";
    echo "<td>" . $product->name . "</td>";
    echo "<td>" . $product->plu . "</td>";
    echo "</tr>";
  }
  echo "</table>";
}

?>

<!-- Input Form -->
<form action="index.php" method="POST">
  Product name:<br>
  <input type="text" name="product_name" value="product_name">
  <br>
  Product plu:<br>
  <input type="text" name="product_plu" value="product_plu">
  <br><br>
  <input type="submit" value="Submit">
</form>

</html>
