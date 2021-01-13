<? require "dbconn.php" ?>
<?php 
if(isset($_GET['add'])){
   $sql="SELECT * FROM products  WHERE product_id=" .escape_string($_GET['add']). " ";
   $query = query($sql);
   confirm($query);

   while($row = fetch_array($query))
   {
      if($row['available_stcok']!=$_SESSION['product_'. $_GET['add']])
      {
         $_SESSION['product_'.$_GET['add']]+=1;
         redirect('cart.php',false);
      }
      else
      {
         set_message("<div class='alert alert-warning'>We only have ". $row['available_stcok']. " " . "{$row['product_name']} " . "available</div>");
         redirect('cart.php',false);
      }
   }
}

if(isset($_GET['remove']))
{
   $_SESSION['product_' . $_GET['remove']]--;

   if($_SESSION['product_' . $_GET['remove']]<1)
   {
      unset($_SESSION['item_total']);
      unset($_SESSION['item_quantity']);
      redirect("cart.php");
      
   }else
   {
      
      redirect("cart.php");

   }
}

if(isset($_GET['delete']))
{
   $_SESSION['product_' . $_GET['delete']]='0';
   unset($_SESSION['item_total']);
   unset($_SESSION['item_quantity']);
   unset($_SESSION['item_number']);
 
   redirect('cart.php',false);
}

if(isset($_GET['buy']))
{
   $sql="SELECT * FROM products  WHERE product_id=" .escape_string($_GET['buy']). " ";
   $query = query($sql);
   confirm($query);

   while($row = fetch_array($query))
   {
      if($row['available_stcok']!=$_SESSION['product_'. $_GET['buy']])
      {
         $_SESSION['product_'.$_GET['buy']]+=1;
         redirect('checkout.php',false);
      }
      else
      {
         set_message("We only have ". $row['available_stcok']. " " . "{$row['product_name']} " . "available" );
         redirect('checkout.php',false);
      }
   }
}

if(isset($_GET['id'])){
   $payment_id=$_GET['id'];
   $order_id=$_SESSION['orderID'];
   $sql="UPDATE `orders` SET `payment_methods_id`='$payment_id' ,`payment_status`='Success' WHERE order_reference_number='$order_id'";
   $res=$conn->query($sql);
}

if(isset($_GET['price']))
{
   $id = $_GET['price'];
   $apikey = 'aba009fc2844198a559e';
  
   $from_Currency = "INR";
   $to_Currency = $id;
   $query =  "{$from_Currency}_{$to_Currency}";

   // change to the free URL if you're using the free version
   $json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
   $obj = json_decode($json, true);

   $val = floatval($obj["$query"]);


   $total = $val * $amount;
   $_SESSION['cur_val'] = $val;
   $_SESSION['cur_type'] = $id;
   return number_format($total, 2, '.', '');
}

?>