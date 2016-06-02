<?php

    if(isset($_POST['submit'])){

        foreach($_POST['quantity'] as $key => $val) {
            if($val==0) {
                unset($_SESSION['cart'][$key]);
            }else{
                $_SESSION['cart'][$key]['quantity']=$val;
            }
        }

    }

?>

<h1>View cart</h1>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/main.css" media="screen" title="no title" charset="utf-8">
<a href="home.php?page=products">Go back to the products page.</a>
<form method="post" action="home.php?page=cart">


  <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Items Price</th>
        </tr>
   </thead>
        <?php

            $sql="SELECT * FROM products WHERE id_product IN (";

                    foreach($_SESSION['cart'] as $id => $value) {
                        $sql.=$id.",";
                    }

                    $sql=substr($sql, 0, -1).") ORDER BY name ASC";
                    $query=mysql_query($sql);
                    $totalprice=0;
                    while($row=mysql_fetch_array($query)){
                        $subtotal=$_SESSION['cart'][$row['id_product']]['quantity']*$row['price'];
                        $totalprice+=$subtotal;
                    ?>
                    <tbody>
                       <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><input type="text" name="quantity[<?php echo $row['id_product'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?>" /></td>
                            <td><?php echo $row['price'] ?>$</td>
                            <td><?php echo $_SESSION['cart'][$row['id_product']]['quantity']*$row['price'] ?>$</td>
                        </tr>
                    <?php

                    }
        ?>
                    <tr>
                        <td colspan="4">Total Price: <?php echo $totalprice ?></td>
                    </tr>
                       </tbody>

    </table>
    <br />
    <button type="submit" name="submit">Update Cart</button>
    <a href="checkout.php">Checkout</a>

</form>
<br />
<p>To remove an item set its quantity to 0. </p>
