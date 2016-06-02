<?php

   session_start();
   // print_r($_SESSION["user"]);
   if(! isset($_SESSION["user"])){
       header("Location: index.php");
   }
   require("connection.php");
   if(isset($_GET['page'])){

       $pages=array("products", "cart");

       if(in_array($_GET['page'], $pages)) {

           $_page=$_GET['page'];

       }else{

           $_page="products";

       }

   }else{

       $_page="products";

   }

?>
<html>
<head>


   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Hacklunch</title>

   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/main.css" media="screen" title="no title" charset="utf-8">
</head>

<body>
 <!-- Fixed navbar -->
     <nav class="navbar navbar-default navbar-fixed-top">
       <div class="container">
         <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="#">Hacklunch</a>
         </div>
         <div id="navbar" class="navbar-collapse collapse">

           <ul class="nav navbar-nav navbar-right">

             <li><a href="logout.php">Logout<span class="sr-only">(current)</span></a></li>
           </ul>
         </div><!--/.nav-collapse -->
       </div>
     </nav>


   <div class="container">
<div class="space">

</div>
       <div class="main">

           <?php require($_page.".php"); ?>

       </div><!--end of main-->

       <div id="sidebar">
       <h1>Cart</h1>
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
       <hr />
       <a href="home.php?page=cart">Go to cart</a>
   <?php

   }else{

       echo "<p>Your Cart is empty. Please add some products.</p>";

   }

?>

       </div><!--end of sidebar-->

   </div><!--end container-->
   <!-- Bootstrap core JavaScript
       ================================================== -->
       <!-- Placed at the end of the document so the pages load faster -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
       <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
       <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
       <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
       <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
