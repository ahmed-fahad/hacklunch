<?php






   if(isset($_SESSION['cart'])){

       $sql="SELECT * FROM products WHERE id_product IN (";

       foreach($_SESSION['cart'] as $id => $value) {
           $sql.=$id.",";
          // $sql1= "INSERT INTO cart (contents) VALUES ('" . $_SESSION["cart"]. "')";
       }

       $sql=substr($sql, 0, -1).") ORDER BY name ASC";
       $query=mysql_query($sql);
       // $query1= mysql_query($sql1);
       while($row=mysql_fetch_array($query)){

       ?>
           <p><?php echo $row['name'] ?> x <?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?></p>
       <?php

       }
   ?>
