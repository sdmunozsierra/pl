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
    <link rel="stylesheet" type="text/css" href="../css/blog.css">
</head>

<?php
require_once('products.php');

$products = new Product_DB();
$products->load_product_csv_db('storage/products_database.csv');
echo "<br>products->get_db:<br>";
$db = $products->get_db();
echo $db;

// echo $db[1]->name;
// echo "<br>foreach:<br>";
// foreach($db as $product){
//   echo $product->name;
//   echo $product->plu;
// }

// var_dump($products->db);
echo "<br>ended<br>";

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
?>

</html>
