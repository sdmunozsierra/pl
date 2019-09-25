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
</head>

<style>
.custom-bg-hero{
  background-color: #05386B;
}
.custom-bg{
  background-color: #EDF5E1;
}

.btn-2{
  background-color: #05386B;
  color: white;
}
</style>
<!-- Title -->
<section class="hero has-text-centered custom-bg-hero">
  <div class="hero-body">
    <div class="container">
      <h1 class="title" style="color:white">Albertsons PLU</h1>
    </div>
  </div>
</section>


<section class="section custom-bg">
<div class="container">
<div class="columns is-centered is-vcentered is-mobile">
<div class="box">
<div class="column is-narrow has-text-centered">
<div class="container">
<h2 class="title">Fruits in the Database</h2>
</div>
<?php
require_once('products.php');

$products = new Product_DB();
$products->load_product_csv_db('storage/products_database.csv');


# Get post product
$post_product = post_add_product();

# POST add product
if($post_product){
  # Check for product in database
  if($products->_get_product_by_plu($post_product->plu)){
    echo "Product already exists. Not added to database.<br>";
    echo "Adding as alias.<br>";
    if($products->set_alias($post_product->plu, $post_product->name) == False){
      echo "ERROR: Alias already exists.<br>";
    }
  }else{
    if($products->add_product($post_product)){
      echo "Product added to database.<br>";
      $products->save_product_csv_db('storage/products_database.csv');
    }
  }
}

# POST add picture
post_add_picture_to_product($products);

# POST checkbox
$reordered = post_reorder_list($products);

# Test alias automatic
$products->set_alias(3000, "ALIAS");

# Display table
display_table($products->db, $products->a_db);

function display_table($db, $a_db, $sorted=False){
  // Sort Array if needed
  if($sorted){
    usort($db, function($a, $b)
    {
      return strcmp($a->name, $b->name);
    });
  }

  // Create table
  echo "<form action='index.php' method='POST'>";
  echo "<div class='table'><table>";
  echo "<th></th>";
  echo "<th>NAME</th>";
  echo "<th>PLU</th>";
  echo "<th></th>";
  echo "</tr>";
  foreach ($db as $product){
    echo "<tr>";
    if ($product->picture !== ""){
      echo "<td><img src='" . $product->picture . "' alt='' height=40 width=40></img></td>";
    }else{
      echo "<td>";
    }
    echo "<td>" . $product->name . "</td>";
    echo "<td>" . $product->plu . "</td>";

    // Checkboxes
    echo "<td><input type='checkbox' name='checkbox[]' value=" . $product->plu . "/></td>";
    echo "</tr>";
  }
  foreach ($a_db as $product){
    echo "<tr>";
    if ($product->picture !== ""){
      echo "<td><img src='" . $product->picture . "' alt='' height=40 width=40></img></td>";
    }else{
      echo "<td>";
    }
    echo "<td style=\"color:lime\">" . $product->name . "</td>";
    echo "<td style=\"color:lime\">" . $product->plu . "</td>";
    echo "</tr>";
  }
  echo "</table></div>";
  echo "<input class='button btn-2' type='submit' name ='reorder' value='Reorder List'>";
  echo "</form>";
}

?>
</div>
</div>
</div>
</div>
</section>

<section class="section custom-bg">
<div class="container">
<div class="columns is-centered is-vcentered is-mobile">
<div class="box">
<div class="column is-narrow has-text-centered">
<div class="container">
<h2 class="title">Add Fruit</h2>
<!-- Add Product Form -->
<form action="index.php" method="POST">
  <div class="label">Product name:</div>
  <input class='input' type="text" name="product_name" value="Watermellon">
  <br>
  <div class="label">Product PLU:</div>
  <input class='input' type="text" name="product_plu" value="5002">
  <br>
  <br>
  <input class="button btn-2" type="submit" name ="add_product" value="Add Product">
</form>
</div>
</div>
</div>
</div>
</section>

<section class="section custom-bg">
<div class="container">
<div class="columns is-centered is-vcentered is-mobile">
<div class="box">
<div class="column is-narrow has-text-centered">
<div class="container">
<h2 class="title">Add Picture</h2>
<!-- Add Picture Form -->
<form action="index.php" method="POST" enctype="multipart/form-data">
  <div class="label">Fruit PLU to add Picture:</div>
  <input class='input' type="text" name="product_plu" value="3000">
  <br>
  <div class="label">File Location:</div>
  <input class='file' type="file" name="picture" id="picture"><br>
  <input class='button btn-2' type="submit" name ="add_picture" value="Add Picture">
</form>
</div>
</div>
</div>
</div>
</section>

</section>
</html>
