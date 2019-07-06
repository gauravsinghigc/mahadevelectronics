<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

?><meta name="GENERATOR" content="Evrsoft First Page">
<form method="post" action="pgRedirect.php">
													<input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "MHDE" . rand(10000,99999999)?>" hidden="">
					</td>
													<input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $_SESSION['id'];?>" hidden>
													<input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" hidden>
													<input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" hidden>
						<input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="<?php price(); ?>" hidden>
						<input type='text' name='pg_way' value='<?php echo $pg_way;?>' hidden>
								   <button class="btn-danger btn btn-sm" type='submit' name='submit'value="CheckOut"> Pay <b>Rs.<?php price(); ?></b></button>