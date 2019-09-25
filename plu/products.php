<?php
/* Product Management File */

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

  function get_db(){
    return $this->db;
  }

  function remove_from_db($product){
    $key = array_search($product, $this->db, True);
    unset($this->db[$key]);
  }


  /* Reads the csv file database */
  function load_product_csv_db($csv_db_file){
    if (($fh = fopen($csv_db_file, "r")) !== FALSE){
      $temp_arr = array();
      while (($data = fgetcsv($fh, 1000, ",")) !== FALSE){
        $tmp_product = new Product($data[0], $data[1]);
        if($data[2] !== ''){
          $tmp_product->picture = $data[2];
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
    // echo '<pre>Saving file...</pre>';
    $fp = fopen($csv_db_file, 'w');
    foreach($this->db as $tmp){
      $val = $tmp->plu . "," . $tmp->name . "," . $tmp->picture;
      $val = explode(',', $val);
      fputcsv($fp, $val);
    }
    fclose($fp);
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
    }
    return False;  // Product not in list
  }

  function set_alias($plu, $alias){
    if($product = $this->_get_product_by_plu($plu)){
      $tmp_product = new Product($product->plu, $alias);
      // Check for alias already in place
      if ($product->name == $tmp_product->name){
        return False;
      }
      if ($product-> picture !== ''){
        $tmp_product->picture = $product->picture;
      }
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

/* Return a product from POST */
function post_add_product(){
  if(isset($_POST['add_product'])){
    if(isset($_POST['product_name']) && isset($_POST['product_plu'])){
      // Clean input
      $p_name = $_POST['product_name'];
      $p_plu = $_POST['product_plu'];
      $p_name = stripslashes($p_name);
      $p_plu = stripslashes($p_plu);
      $p_name = htmlentities($p_name);
      $p_plu = htmlentities($p_plu);

      echo "Adding product to list" . $p_name . " " . $p_plu;
      $product = new Product($p_plu, $p_name);
      return $product;
    }else{
      return Null;
    }
  } // End Add Product
}

function post_add_picture_to_product($products_db){
  if(isset($_POST['add_picture']) && isset($_POST['product_plu'])){
    if (isset($_FILES["picture"]["name"])){
    }
    if ($_FILES["picture"]["error"] > 0){
      //bad file
      echo "Error: " . $_FILES["picture"]["error"] . "<br>";
    }else{
      //good file
      // Find product
      $product = $products_db->_get_product_by_plu($_POST['product_plu']);
      if ($product == False){
        echo "ERROR: Cannot add picture to inexistent product.";
      }else{
        // Add picture to product
        // $file_loc = $_POST['product_picture_file'];
        $file_loc = "/storage/pictures/" . $product->plu . ".jpg";
        $target = getcwd() . $file_loc;

        // Place the file where it needs to be
        move_uploaded_file($_FILES["picture"]["tmp_name"], $target);
        $product->picture = $file_loc;

        // Save picture location to db
        $products_db->save_product_csv_db('storage/products_database.csv');
      }
    }
  }
}

/* Reorders the database according to the checklists */
function post_reorder_list($products_db){
  if(isset($_POST['reorder'])){
    foreach ($_POST['checkbox'] as $plu){
      $plu = str_replace('/','',$plu);
      $product = $products_db->_get_product_by_plu($plu);
      if ($product == False){
        echo "ERROR: Cannot reorder list with given plu";
        return False;
      }
      // unset($products_db->db[$product]);
      $products_db->remove_from_db($product);
      array_unshift($products_db->db, $product);
    }
    return True;
  }
}

?>
