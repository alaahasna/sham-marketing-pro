<section id="main-content">
          <section class="wrapper site-min-height">

<!--1-->
            <h3>View Product Request</h3>

            <table class="table" style="width: 80%;">
            <tr>
                <th>Product title</th>
                <th>Price * 1</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            <?php
            if(isset($_GET['session'])){
              $session_id = $_GET['session'];
            }
            $sum_price = 0;
                $select_team = @mysql_query("select * from cart where session_id='".$session_id."' and requested='Yes' order by id desc");
                while($team = @mysql_fetch_assoc($select_team)){
                  $select_product_info = @mysql_query("select * from products where id='".$team['product_id']."'") or die(mysql_error());
                  $product_info = @mysql_fetch_assoc($select_product_info);
                  $sum_price += $team['quantity'] * $product_info['price'];
                  echo '
                    <tr>
                        <td>'.$product_info['title'].'</td>
                        <td>'.$product_info['price'].'</td>
                        <td>'.$team['quantity'].'</td>
                        <td>'.$team['quantity'] * $product_info['price'].'</td>
                    </tr>
                  ';
                }
                ?>
            </table>
            <?php
            $select_request_product = @mysql_query("select * from request_product where session_id='".$session_id."'") or die(mysql_error());
            $request_product = @mysql_fetch_assoc($select_request_product);
            $select_user_info = @mysql_query("select * from users where id='".$request_product['user_id']."'") or die(mysql_error());
            $user_info = @mysql_fetch_assoc($select_user_info);
            ?>
            <table class="table">
            <caption>User Information:</caption>
                <tr>
                    <th>Full name:</th>
                    <td><?php echo $user_info['first_name']." ". $user_info['last_name'];?></td>
                </tr>
                <tr>
                    <th>Address:</th>
                    <td><?php echo $user_info['address'];?></td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td><?php echo $user_info['phone'];?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?php echo $user_info['email'];?></td>
                </tr>
            </table>
            <h3>Total Price: <?php echo $sum_price;?></h3>
<!--1
<div class="showback">
      					<h4><i class="fa fa-angle-right"></i> Alerts Examples</h4>
							<div class="alert alert-success"><b>Well done!</b> You successfully read this important alert message.</div>
							<div class="alert alert-info"><b>Heads up!</b> This alert needs your attention, but it's not super important.</div>
							<div class="alert alert-warning"><b>Warning!</b> Better check yourself, you're not looking too good.</div>
							<div class="alert alert-danger"><b>Oh snap!</b> Change a few things up and try submitting again.</div>
      				</div>
<!-- sidebar menu end-->
</section>
</section>