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

$sample_product = new Product("bro", 120);
$name = $sample_product->get_name();

$products = new Product_DB();
$products->load_product_csv_db('storage/products_database.csv');
echo "products->db:<br>";
echo $products->db;
echo "<br>products->get_db:<br>";
$db = $products->get_db();
echo $db;

echo $db[1]->name;
echo "<br>foreach:<br>";
foreach($db as $product){
  echo $product->name;
  echo $product->plu;
}

// var_dump($products->db);
echo "<br>ended<br>";

?>

<!-- <?php if (count($products) > 0): ?>
  <table>
    <thead>
      <tr>
        <th><?php echo implode('</th><th>', array_keys(current($products->product_db))); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $row): array_map('htmlentities', $row); ?>
        <tr>
          <td><?php echo implode('</td><td>', $row); ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?> -->

</html>
