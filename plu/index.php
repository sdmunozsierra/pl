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


# Get post product
$post_product = post_add_product();

# POST add product
if($post_product){
  if($products->add_product($post_product)){
    echo "Product added to database.<br>";
    $products->save_product_csv_db('storage/products_database.csv');
  }else{
    echo "Product not added to database.<br>";
  }
}

# POST add picture
post_add_picture_to_product($products);

# Display table
display_table($products->db, $products->a_db);

# Test alias automatic
$products->set_alias(3000, "ALIAS");


function display_table($db, $a_db, $sorted=True){
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
    if ($product->picture !== ""){
      echo "<td><img src='" . $product->picture . "' alt='' border=3 height=100 width=100></img></td>";
    }
    echo "</tr>";
  }
  foreach ($a_db as $product){
    echo "<tr>";
    echo "<td style=\"color:lime\">" . $product->name . "</td>";
    echo "<td style=\"color:lime\">" . $product->plu . "</td>";
    // if ($product->picture !== ""){
    //   echo "<td><img src='" . $product->picture . "' alt='' border=3 height=100 width=100></img></td>";
    // }
    echo "</tr>";
  }
  echo "</table>";
}

?>

<!-- Add Product Form -->
<form action="index.php" method="POST">
  Product name:
  <input type="text" name="product_name" value="product_name">
  <br>
  Product plu:
  <input type="text" name="product_plu" value="product_plu">
  <br><br>
  <input type="submit" name ="add_product" value="Add Product">
</form>

<!-- Add Picture Form -->
<form action="index.php" method="POST" enctype="multipart/form-data">
  Add picture to product PLU:
  <input type="text" name="product_plu" value="3000">
  <br>
  File location:
  <input type="file" name="picture" id="picture"><br>
  <input type="submit" name ="add_picture" value="Add Picture">
</form>

<!-- <form action="upload_file.php" method="post"
enctype="multipart/form-data"> -->
</form>

</html>
