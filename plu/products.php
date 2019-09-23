<?php
echo "Imported file 'products.php'<br>";
/* Read and Write products to 'database'*/

class Product{
  // Product Object
  public $name;
  public $plu;
  // private $picture;  // To be implemented

  function __construct($p_plu, $p_name){
    $this->plu = $p_plu;
    $this->name = $p_name;
  }

  function get_name(){
    return $this->name;
  }
}

class Product_DB{
  // public $db = array();
  public $db = array();

  function load_product_json_db($json_db_file){
    $file_exists = file_exists($json_db_file);
    if ($file_exists){
      // Decode json as object
      $json = json_decode(file_get_contents($json_db_file));
      // Create products array
      // $products = array();
      foreach ($json as $j_product){
        $tmp_product = new Product($j_product->name, $j_product->plu);
        array_push($this->product_db, $tmp_product);
      }
      $success_msg = 'Found ' . count($this->product_db) . ' products in file: ' . $json_db_file;
      error_log($success_msg . PHP_EOL, 3, 'error_log.txt');
      // error_log(print_r($users, true) . PHP_EOL, 3, 'error_log.txt');  //extra debug
      return $this->product_db; // return users
    }else{
      $fail_msg = 'File not found! Coudn\'t get products from file.';
      print $fail_msg . '</br>';
      error_log($fail_msg . PHP_EOL, 3, 'error_log.txt');
      return False;
    }
  } //End function

  function load_product_csv_db($csv_db_file){
    // Open the file for reading
    if (($fh = fopen($csv_db_file, "r")) !== FALSE){
      $temp_arr = array();
      while (($data = fgetcsv($fh, 1000, ",")) !== FALSE){
        // TODO data[2] contains the link for the picture
        $tmp_product = new Product($data[0], $data[1]);
        array_push($temp_arr, $tmp_product);
      }
      $this->db = $temp_arr;
      fclose($fh);  // Close the file
    }else{
      echo 'file not found!';
    } //end open file
    // Testing:
    // echo "<pre> Data in array";
    // var_dump($this->db);
    // echo "</pre>";
    return $this->db;
  }

  function get_db(){
    return $this->db;
  }

  function add_product($product){
    // Takes in Product() object and adds it to the list
    if($this->_check_product_in_db($product)){
      // Product already in database
      return False;
    }else{
      array_push($this->db, $product);
      return True;
    }
  }

  function _check_product_in_db($product){
    // Check if product is in array
    if (in_array($product, $this->db)){
      echo 'Product already in the database.';
      return True;
    }
    echo 'Product not in the database.';
    return False;
  }

}

// function write_product(){
//       $data = array ('aaa,bbb,ccc,dddd',
//                    '123,456,789',
//                    '"aaa","bbb"');
//
//     $fp = fopen('data.csv', 'w');
//     foreach($data as $line){
//              $val = explode(",",$line);
//              fputcsv($fp, $val);
//     }
//     fclose($fp);
// }

function check_product_in_db($product, $product_db){
  // Check if product is in array
  if (in_array($product, $product_db)){
    echo 'Product already in the database.';
    return True;
  }
  echo 'Product not in the database.';
  return False;
}

?>
