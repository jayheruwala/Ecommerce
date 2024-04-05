<?php
$conn = mysqli_connect('localhost','root','','ecommerce');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Invoice Template Design</title>
	<link rel="stylesheet" type="text/css" href="Assets/css/styles.css">
</head>
<body>
<?php
$orderId = $_GET['orderId'];
$findOrder = "SELECT * FROM `order_user` WHERE order_id = $orderId";
$findOrderResult = mysqli_query($conn,$findOrder);
if(mysqli_num_rows($findOrderResult) > 0){
	while($fetch = mysqli_fetch_assoc($findOrderResult)){
		$no = 1;
		$subTotal = 0;
		$grandTotal = 0;
		$date = $fetch['order_Date_Time'];
		$dates = explode(' ',$date);
?>
<div class="wrapper">
	<div class="invoice_wrapper">
		<div class="header">
			<div class="logo_invoice_wrap">
				<div class="logo_sec">
					<!-- <img src="codingboss.png" alt="code logo"> -->
					<div class="title_wrap">
						<p class="title bold">ElectroX</p>
						<!-- <p class="sub_title">Privite Limited</p> -->
					</div>
				</div>
				<div class="invoice_sec">
					<p class="invoice bold">INVOICE</p>
					<p class="invoice_no">
						<span class="bold">Invoice</span>
						<span>#Ord-<?php echo $fetch['order_id']; ?></span>
					</p>
					<p class="date">
						<span class="bold">Date</span>
						<span><?php echo $dates[0]; ?></span>
					</p>
				</div>
			</div>
			<?php
			$userId = $fetch['user_id'];
			$userQuery = mysqli_query($conn,"SELECT * FROM `register` WHERE `user_id` = $userId");
			if($userQuery == true){
				$userFetch = mysqli_fetch_assoc($userQuery);
			?>
			
			<div class="bill_total_wrap">
				<div class="bill_sec">
					<p>Bill To</p> 
	          		<p class="bold name"><?php echo $userFetch['name'] ?></p>
			        <span style="text-transform:lowercase;">
					Address - <?php echo $userFetch['address'] ?><br/>
			        Mobile No - <?php echo $userFetch['mobile_no'] ?><br/>
					Email Id - <?php echo $userFetch['email_id'] ?>
			        </span>
				</div>
				<div class="total_wrap">
					<!-- <p>Total Due</p>
	          		<p class="bold price">USD: $1200</p> -->
				</div>
			</div>
			<?php
			}
			?>
		</div>
		<div class="body" id="invoice">
			<div class="main_table">
				<div class="table_header">
					<div class="row">
						<div class="col col_no">NO.</div>
						<div class="col col_des">ITEM DESCRIPTION</div>
						<div class="col col_price">PRICE</div>
						<div class="col col_qty">QTY</div>
						<div class="col col_total">TOTAL</div>
					</div>
				</div>
				<?php
				$findItem = mysqli_query($conn,"SELECT * FROM `order_item` WHERE `order_id`=$orderId ");
				if(mysqli_num_rows($findItem) > 0){
					while($fetchItem = mysqli_fetch_assoc($findItem)){
						?>
				
				<div class="table_body">
					<div class="row">
						<div class="col col_no">
							<p><?php echo $no ?></p>
						</div>
						<?php
						$tableName = $fetchItem['tableName'];
						$productId = $fetchItem['product_id'];
						$product = mysqli_query($conn,"SELECT * FROM $tableName WHERE `product_id` = $productId");
						$fetchProduct = mysqli_fetch_assoc($product);
						?>
						<div class="col col_des">
							<p class="bold"><?php echo $fetchProduct['product_name'] ?></p>
							<!-- <p>Lorem ipsum dolor sit.</p> -->
						</div>
						<div class="col col_price">
							<p>&#8377;<?php echo $fetchItem['price'] ?></p>
						</div>
						<div class="col col_qty">
							<p><?php echo $fetchItem['Quantity'] ?></p>
						</div>
						<div class="col col_total">
							<?php $subTotal += ($fetchItem['price'] * $fetchItem['Quantity']) 
							?>
							<p>&#8377;<?php echo ($fetchItem['price'] * $fetchItem['Quantity']) ?></p>
						</div>
					</div>
				</div>
				<?php
				$no+=1;
					}
				}
				?>
			</div>
			<div class="paymethod_grandtotal_wrap">
				<div class="paymethod_sec">
					<!-- <p class="bold">Payment Method</p>
					<p>Visa, master Card and We accept Cheque</p> -->
				</div>
				<div class="grandtotal_sec">
			        <p class="bold">
			            <span>SUB TOTAL</span>
						<?php
						$grandTotal = $subTotal;
						?>
			            <span>&#8377;<?php echo $subTotal ?></span>
			        </p>
			        <p>
			            <span>Shipping</span>
						
			            <span>&#8377;<?php 
						if($subTotal < 5000){
							echo "100";
							$grandTotal+=100;
						}
						else{
							echo "00";
						}
						?></span>
			        </p>
			        <!-- <p>
			            <span>Discount 10%</span>
			            <span>-&#8377;00</span>
			        </p> -->
			       	<p class="bold">
			            <span>Grand Total</span>
			            <span>&#8377;<?php echo $grandTotal  ?></span>
			        </p>
				</div>
			</div>
		</div>
		<div class="footer">
			<p>Thank you and Best Wishes</p>
			<div class="terms">
		        <p class="tc bold">Terms & Coditions</p>
		        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit non praesentium doloribus. Quaerat vero iure itaque odio numquam, debitis illo quasi consequuntur velit, explicabo esse nesciunt error aliquid quis eius!</p>
		    </div>
		</div>
	</div>
	<style>
		.btnInvoice{
			width:100%;
			text-align:center;
			margin-top:10px;
			padding:15px;
		}
		.btnInvoice button{
			padding:10px 15px;
			font-size:18px;
			background-color: #0000ff;
 			color:white;
  			font-weight: 500;
  			border:none;
  			border-radius:3px;
			cursor: pointer;
		}
	</style>
	<div class="btnInvoice" id="disable">
<button class="downloadBtn" onClick="download()">Download</button>
</div>
</div>

<?php
	}
}
?>

<script>
	 var button=document.getElementById('disable');
	function download() {
		button.style.display="none";
		window.print();
		button.style.display="block";
	}
</script>

</body>
</html>