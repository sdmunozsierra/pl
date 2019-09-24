<?php
echo "Imported file 'products.php'<br>";
/* Read and Write products to 'database'*/

/* Product Object */
class Product{
  public $plu;
  public $name;
  public $picture = '';

  function __construct($p_plu, $p_name){
    $this->plu = $p_plu;
    $this->name = $p_name;
  }
}

/* Product DB */
class Product_DB{
  public $db = array();
  public $a_db = array();

  /* Reads the csv file database */
  function load_product_csv_db($csv_db_file){
    if (($fh = fopen($csv_db_file, "r")) !== FALSE){
      $temp_arr = array();
      while (($data = fgetcsv($fh, 1000, ",")) !== FALSE){
        $tmp_product = new Product($data[0], $data[1]);
        if($data[2] !== ''){
          $tmp_product->$data[2];
        }
        array_push($temp_arr, $tmp_product);
      }
      $this->db = $temp_arr;
      fclose($fh);  // Close the file
    }else{
      echo 'file not found!';
    } //end open file
    return $this->db;
  }

  /* Saves (Updates) the csv file database */
  function save_product_csv_db($csv_db_file){
    echo '<pre>Saving file...</pre>';
    $fp = fopen($csv_db_file, 'w');
    foreach($this->db as $tmp){
      $val = $tmp->plu . "," . $tmp->name . "," . $tmp->picture;
      $val = explode(',', $val);
      fputcsv($fp, $val);
    }
    fclose($fp);
  }

  function get_db(){
    return $this->db;
  }

  /* Takes in Product() and adds it to the db */
  function add_product($product){
    if($this->_check_product_in_db($product)){
      return False;  // Product already in database
    }else{
      array_push($this->db, $product);
      return True;
    }
  }

  function _check_product_in_db($product){
    // return True if product is in db
    if (in_array($product, $this->db)){
      echo 'Product already in the database.';
      return True;
    }
    echo 'Product not in the database.';
    return False;
  }

  function _get_product_by_plu($plu){
    foreach($this->db as $product){
      if($product->plu == $plu){  // Found product
        return $product;
      }
      return False;  // Product not in list
    }
  }

  function set_alias($plu, $alias){
    if($product = $this->_get_product_by_plu($plu)){
      $tmp_product = new Product($product->plu, $alias);
      array_push($this->a_db, $tmp_product);
    }
  }

}// End Class


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
