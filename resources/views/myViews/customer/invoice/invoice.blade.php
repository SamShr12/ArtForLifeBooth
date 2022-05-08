<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/css/bootstrap.min.css'>
  <title>Invoice</title>

</head>
<style>
  .invoice-head td {
  padding: 0 8px;
}
.container {
  padding-top:30px;
}
.invoice-body{
  background-color:transparent;
}
.invoice-thank{
  margin-top: 60px;
  padding: 5px;
}
address{
  margin-top:15px;
}
</style>
<body>
<div class="container">
    	<div class="row">
    		<div class="span4">
				<h1>ArtForLife</h1>
    			<address>
			        <strong>ArtForLife Pvt Ltd</strong><br>
                 
			          Kathmandu Nepal<br>
                Nepal-122001
		    	</address>
    		</div>
    		<div class="span4 well">
    			<table class="invoice-head">
    				<tbody>
    					<tr>
    						<td class="pull-right"><strong>Customer :</strong></td>
    						<td>{{$name}}</td>
    					</tr>
              <tr>
    						<td class="pull-right"><strong>Email  :</strong></td>
    						<td>{{$email}}</td>
    					</tr>
    					<tr>
    						<td class="pull-right"><strong>Invoice :</strong></td>
    						<td>{{$invoice}}</td>
    					</tr>
    					<tr>
    						<td class="pull-right"><strong>Date  :</strong></td>
    						<td>{{$date}}</td>
    					</tr>
    					
    				</tbody>
    			</table>
    		</div>
    	</div>
    	<div class="row">
    		<div class="span8">
    			<h2>Invoice</h2>
    		</div>
    	</div>
    	<div class="row">
		  	<div class="span8 well invoice-body">
		  		<table class="table table-bordered">
					<thead>
						<tr>
              <th>Product</th>
							<th>Description</th>
              <th>Quantity</th>
							<th>Amount</th>
						</tr>
					</thead>
					<tbody>
            @foreach($cart as $c)
					<tr>
						<td>{{$c->product_name}}</td>
						<td>artforlife.com</td>
						<td>{{$c->product_quantity}}</td>
            <td>{{$c->price}}</td>
						</tr>
            @endforeach
            <tr><td colspan="4"></td></tr>
            <tr>
							<td colspan="2">&nbsp;</td>
							<td><strong>Total</strong></td>
							<td><strong>Rs. {{$amount+(($amount/100)*10)}}</strong></td>
						</tr>
					</tbody>
				</table>
		  	</div>
  		</div>
  		<div class="row">
  			<div class="span8 well invoice-thank">
  				<h5 style="text-align:center;">Thank You!</h5>
  			</div>
  		</div>
  		<div class="row">
  	    	<div class="span3">
  		        <strong>Phone:</strong>+977-12345678
  	    	</div>
  	    	<div class="span3">
  		        <strong>Email:</strong> <a href="#">sam@artforlife.com</a>
  	    	</div>
  	    	<div class="span3">
  		        <strong>Website:</strong> <a href="#">ArtForLife</a>
  	    	</div>
  		</div>
    </div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/js/bootstrap.min.js'></script>
</body>
</html>
