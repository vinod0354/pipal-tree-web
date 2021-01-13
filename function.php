<?php 
function escape_string($string)
{
    global $conn;
    return mysqli_real_escape_string($conn,$string);
}
function redirect($location)
{
    header("Location: $location");
}
function set_message($msg)
{
if(!empty($msg))
{
    $_SESSION['message'] = $msg;
}
else
{
    $msg = "";
}
}
function display_message()
{
    if(isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}
function query($sql)
{
    global $conn;
    return mysqli_query($conn,$sql);
}
function confirm($result)
{
    global $conn;
    if(!$result)
    {
        die("QUERY_FAILED" . mysqli_error($conn));
    }
}
function fetch_array($result)
{
    return mysqli_fetch_array($result);
}

function cart()
{
    $total = 0;
    $item_quantity = 0;
    foreach($_SESSION as $keys => $values)
    {
        if($values > 0)
        {
                if(substr($keys , 0, 8) == "product_")
                {
                $length = strlen($keys - 8);
                $id = substr($keys, 8 , $length);
                $sql = "SELECT * FROM products WHERE product_id = " .escape_string($id). " ";
                $query = query($sql);
                confirm($query);
                while($row = fetch_array($query))
                {
                    $correl_id=$row['correl_id'];
                    $product_id=$row['product_id'];
                    $_SESSION['prod_id']=$product_id;
                    $val = $_SESSION['cur_val'];
                    $cur = $_SESSION['cur_type'];
                    $price= $val * $row['price'];
                    $_SESSION['prod_price']=$price; 
                    $sub = $price * $values;
                    $_SESSION['prod_price_value']=$sub;
                    $item_quantity += $values; 
                    $_SESSION['prod_quantity']=$values;
                    $product_name = $row['product_name'];
                    $sql2="SELECT * FROM product_images WHERE correl_id='$correl_id' AND product_image LIKE '%main_%'";
                    $prodres=query($sql2);
                    confirm($prodres);
                    while($img=fetch_array($prodres))
                    {
                        $product_image=$img['product_image'];
                    }
                   
                    $cart = <<< DELEMETER
                    <tr>
                        <td class='product-thumbnail'>
                            <a href='product.php?id=$correl_id'>
                                <img src='/admin/uploads/{$product_image}' class='img-fluid' alt=''>
                            </a>
                        </td>
                        <td class='product-name'>
                            <span class='text' style='display: block; width: 100px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;'>{$product_name}</span>
                        </td>

                        <td class='product-price'><span class='price'>{$cur} {$price}</span></td>
                        <td class='product-quantity'>
                            <div class='pro-qty d-inline-block mx-0'>
                                <a href='cart-function.php?remove={$row['product_id']}' class='inc qty-btn'>-</a>
                                    <input type='text' value='{$values}'>
                                <a href='cart-function.php?add={$row['product_id']}' class='inc qty-btn'>+</a>
                            </div>
                        </td>
                        <td class='total-price'><span class='price'>{$cur} {$sub}</span></td>
                        <td class='product-remove'>
                            <a href='cart-function.php?delete={$row['product_id']}'>
                                <i class='ion-android-close'></i>
                            </a>
                        </td>
                    </tr>
DELEMETER;
                    echo $cart;
                }
                $_SESSION['item_total'] = $total += $sub;
                $_SESSION['item_quantity'] = $item_quantity; 
            }
        }
    }
}

function cart_count()
{
    $item_number = 1;
    $product_name = '';
    foreach($_SESSION as $keys => $values)
    {
        if($values > 0)
        {
                if(substr($keys , 0, 8) == "product_")
            {
                $length = strlen($keys - 8);
                $id = substr($keys, 8 , $length);
                $sql = "SELECT * FROM products WHERE product_id = " .escape_string($id). " ";
                $query = query($sql);
                confirm($query);
                while($row = fetch_array($query))
                {
                    $product_name += $row['product_name'];
                    $item_number += $product_name;
                        $cart_count=<<<DELEMETER

                        <span class='count'>{$item_number}</span>
DELEMETER;
                        echo $cart_count;
                        $item_number++;
                }
                $_SESSION['item_number']=$item_number;
            }
        }
        
    }
}

function reports()
{
    $total = 0;
    $item_quantity = 0;

    foreach($_SESSION as $keys => $values)
    {
        if($values > 0)
        {
                if(substr($keys , 0, 8) == "product_")
            {
                $length = strlen($keys - 8);
                $id = substr($keys, 8 , $length);
                $sql = "SELECT * FROM products WHERE product_id = " .escape_string($id). " ";
                $query = query($sql);
                confirm($query);
                while($row = fetch_array($query))
                {
                    $product_id=$row['product_id'];
                    $product_name=$row['product_name'];
                    $product_price = $row['price'];
                    $product_quantity = $row['available_stcok'];
                    $val = $_SESSION['cur_val'];
                    $cur = $_SESSION['cur_type'];
                    $price = $val * $row['price'];
                    $sub = $price * $values;
                    $item_quantity += $values; 
                    $report=<<<DELEMETER
                   

                        <ul>
                            <li>$product_name X $values <span>{$cur} {$sub}</span></li>

                        </ul>
DELEMETER;
                    echo $report;
                   
                }
                
                $_SESSION['item_total'] = $total += $sub;
                $_SESSION['item_quantity'] = $item_quantity;
                
            }
        }
        
    }
}

function cart_overlay()
{
    $total = 0;
    $item_quantity = 0;
    foreach($_SESSION as $keys => $values)
    {
        if($values > 0){
            if(substr($keys , 0, 8) == "product_"){
                $length = strlen($keys - 8);
                $id = substr($keys, 8 , $length);
                $sql = "SELECT * FROM products WHERE product_id = " .escape_string($id). " ";
                $query = query($sql);
                confirm($query);
                while($row = fetch_array($query))
                {
                    $correl_id=$row['correl_id'];
                    $product_id=$row['product_id'];
                    $product_name=$row['product_name'];
                    $product_quantity = $row['available_stcok'];
                    $val = $_SESSION['cur_val'];
                    $cur = $_SESSION['cur_type'];
                    $price= $val * $row['price'];
                    $sub = $price * $values;
                    $item_quantity += $values;

                    $sql2="SELECT * FROM product_images WHERE correl_id='$correl_id' AND product_image LIKE '%main_%'";
                    $prodres=query($sql2);
                    confirm($prodres);
                    while($img=fetch_array($prodres)){
                        $product_image=$img['product_image'];
                    }
                    $cart_overlay=<<<DELEMETER

                    <div class='single-cart-product'>
                        <span class='cart-close-icon'>
                            <a class='cart-delete' data-id='$product_id'><i class='ti-close'></i></a>
                        </span>
                        <div class='image'>
                            <a href='product.php?id=$correl_id'>
                                <img src='/admin/uploads/$product_image' class='img-fluid' alt=''>
                            </a>
                        </div>
                        <div class='content'>
                            <h5><a href='product.php?id=$correl_id'>$product_name</a></h5>
                            <p><span class='cart-count'>$values x </span> <span class='discounted-price'>{$cur} {$sub}</span></p>
                        </div>
                    </div>
                   
DELEMETER;
                    echo $cart_overlay;
                }
                $_SESSION['item_total'] = $total += $sub;
                $_SESSION['item_quantity'] = $item_quantity;
            }
        }
    }
}

function customer_cart()
{
    $total = 0;
    $item_quantity = 0;
    foreach($_SESSION as $keys => $values)
    {
        if($values > 0)
        {
                if(substr($keys , 0, 8) == "product_")
            {
                $length = strlen($keys - 8);
                $id = substr($keys, 8 , $length);
                $sql = "SELECT * FROM products WHERE product_id = " .escape_string($id). " ";
                $query = query($sql);
                confirm($query);
                while($row = fetch_array($query))
                {
                    $product_id=$row['product_id'];
                    $product_name=$row['product_name'];

                    $product_price = $row['price'];
                    $product_quantity = $row['available_stcok'];
                    $sub = $row['price'] * $values;
                    $item_quantity += $values; 

                    $sql_login="SELECT * FROM cust_login_master where `email_id`='{$_SESSION['usernow']}'";
                    $query_login=query($sql_login);
                    confirm($query_login);
                    if($query_login->num_rows>0)
                    {
                        while($row=fetch_array($query_login))
                        {
                            $id=$row['id'];
                            
                        }
                    }

                    $sql2="SELECT * FROM cart_products WHERE `customer_id` ='$id' AND product_id={$product_id} ";
                    $login_query=query($sql2);
                    confirm($login_query);
                   if($login_query->num_rows>0)
                   {
                    //    $update_sql="UPDATE `cart_products` SET `quantity`='{$values}' WHERE `customer_id` ='{$_SESSION['usernow']}' AND product_id={$product_id} ";
                    //    $update_query=query($update_sql);
                    //    confirm($update_query);
                    //    echo $update_query;
                    $deletesql="DELETE FROM cart_products WHERE `customer_id` ='$id'";
                    $deleteres=query($deletesql);
                    confirm($deleteres);


                    $insertsql = query("INSERT INTO cart_products(customer_id,product_id,quantity,price)VALUES('$id','{$product_id}','{$values}' , '{$product_price}')");
                    confirm($insertsql);

                   }else{
                    $insert_cust = query("INSERT INTO cart_products(customer_id,product_id,quantity,price)VALUES('$id','{$product_id}','{$values}' , '{$product_price}')");
                    confirm($insert_cust);
                    // echo $insert_cust;
                   }

                }

                
            }
        }
        
    }
}

function order_summary()
{
    $total = 0;
    $item_quantity = 0;
    foreach($_SESSION as $keys => $values)
    {
        if($values > 0)
        {
                if(substr($keys , 0, 8) == "product_")
            {
                $length = strlen($keys - 8);
                $id = substr($keys, 8 , $length);
                $sql = "SELECT * FROM products WHERE product_id = " .escape_string($id). " ";
                $query = query($sql);
                confirm($query);
                while($row = fetch_array($query))
                {
                    $correl_id=$row['correl_id'];
                    $val = $_SESSION['cur_val'];
                    $cur = $_SESSION['cur_type'];
                    $price= $val * $row['price'];
                    $sub=$price * $values;
                    $item_quantity += $values; 
                    $product_name = $row['product_name'];
                    
                    $sql2="SELECT * FROM product_images WHERE correl_id='$correl_id' AND product_image LIKE '%main_%'";
                    $prodres=query($sql2);
                    confirm($prodres);
                    while($img=fetch_array($prodres)){
                        $product_image=$img['product_image'];
                    }
                   
                    $order_summary = <<<DELEMETER
                    
                    <tr>
                        <td class='product-thumbnail'>
                            <a href='single-prod.php?id=$correl_id'>
                                <img src='/admin/uploads/{$product_image}' class='img-fluid' alt=''>
                            </a>
                        </td>
                        <td class='product-name'>
                            <span class='text'>{$product_name}</span>
                        </td>

                        <td class='product-price'><span class='price'>{$cur} {$price}</span></td>

                        <td class='product-quantity'>                          
                                <span class='price'>{$values}</span>                           
                        </td>
                        <td class='total-price'><span class='price'>{$cur} {$sub}</span></td>
                    </tr>
DELEMETER;
                    echo $order_summary;

                }
                $_SESSION['item_total'] = $total += $sub;
                $_SESSION['item_quantity'] = $item_quantity; 
            }
        }
        
    }
}

?>
