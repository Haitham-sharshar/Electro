<?php include "electro_dp.php"; ?>
<?php include "Templet/front/header.php"; ?>

                                          <!-- New Product Here -->
             <?php $result= $conn->query("SELECT * FROM product WHERE category =".$_GET['id']);
         while($row=$result->fetch()){
            $pr=<<<PR
                  <div class="product">
                        <div class="product-img">
                          <img src="./img/product01.png" alt="">
                          <div class="product-label">
                              <span class="new">New</span>
                          </div>
                       </div>
                        <div class="product-body">
                          <p class="product-category">Category</p>
                          <h3 class="product-name"><a href="product.php?id={$row['id']}">{$row['name']}</a></h3>
                          <h4 class="product-price">$980.00 <del class="product-old-price">{$row['price']}</del></h4>
                          <div class="product-rating">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                          </div>
                          <div class="product-btns">
                              <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                              <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                              <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                          </div>
                       </div>
                        <div class="add-to-cart">
                          <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
          </div>	
        
   PR;
     echo $pr;
              }    ?> 	
								<!-- /product -->
                </div>
							<div id="slick-nav-1" class="products-slick-nav"></div>
				        </div>
								<!-- /tab -->
							  </div>
						 </div>
					</div>
					  <!-- Products tab & slick -->
				    </div>
	   			<!-- /row -->
			</div>
			<!-- /container -->
		</div>
                 
    </div>      

 <?php include "Templet/front/footer.php";?>