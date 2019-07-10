<!DOCTYPE html>
<html>
<head>
	<title>Welcome To My PFM</title>
	<link rel="stylesheet" type="text/css" href="./src/Public_designs/css/style.css">
</head>
<body>
	<h1 class="test">Hello Welcome</h1>
	<div class="main">
		<div class="area">
			<!-- <form> -->
				<div id="price_area">
					<tr class="">
						<td><input id="price" type="text" name="price" placeholder="enter price" v-model="price"></td>
					</tr>
					<button type="submit" name="submit_btn" value="submit" v-on:click="chkPrice()">Submit</button>					
				</div>
			<!-- </form> -->
			<div class="category_area">
			<!-- <form> -->
				<div id="test">	
					category_area
				</div>
			<!-- </form> -->
			</div>			
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="./src/Public_designs/js/main.js"></script>
</body>
<script type="text/javascript">
	window.onscroll = function(){
	  console.log(screenY);
	};
</script>
</html>