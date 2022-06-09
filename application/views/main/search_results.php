<?php foreach($products as $product): ?>
	
	<!-- Product 1 -->
	<div class="product-item men">
		<div class="product discount product_filter">
			<div class="product_image">
				<a href="<?php echo base_url('products/product_view/' . $product->id);?>">
					<img src="<?php echo base_url(''.$product->image);?>" alt="">
				</a>
			</div>
			<div class="favorite favorite_left"></div>
			<!-- <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div> -->
			<div class="product_info">
				<h6 class="product_name"><a href="single.html"><?=$product->name ?></a></h6>
				<div class="product_price"><?php echo 'KES '.$product->price; ?></div>
			</div>
		</div>
		<div class="red_button add_to_cart_button"><a href="<?= base_url('products/addToCart/'.$product->id);?>">add to order</a></div>
	</div>
		
<?php endforeach ; ?>
