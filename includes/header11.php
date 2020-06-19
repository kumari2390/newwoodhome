 <!-- Header Area Start -->
    <div class="header-area">

        <!-- Header Top Start -->
        <div class="header-top">
            <div class="container" >
                <div class="row justify-content-lg-between">

                    <!--Left Start-->
                    <div class="col-lg-auto d-none d-lg-block">
                        <div class="header-text">
                            <p></p>
                        </div>
                    </div>
                    <!--Left End-->

                    <!--Right Start-->
                    <div class="col-lg-auto col-12 d-flex justify-content-center">
                        <ul class="header-top-menu">

                            <li><a href="contact.php"><i class="fa fa-question"></i>Help</a></li>
                         <li><a href="combo.php"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                            <li><a href="cart.php"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                           <li><a href="checkout.php"><i class="icon fa fa-check"></i>My Orders</a></li>
                             <?php
                         if(!isset($_SESSION['user_id'])){
                             ?>
                            <li><a href="sign-in.php"><i class="icon fa fa-lock"></i>Login</a></li>
							   <?php
                          }else{
            
                                ?>		  
						  
		  <li class="dropdown-toggle" id="menu1" data-toggle="dropdown" style="cursor: pointer;"><i class="icon fa fa-user"></i> <?php if(isset($_SESSION['user_email']) && $_SESSION['user_email'] != '') echo $_SESSION['user_email']; ?><span class="caret"></span></li>
             <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style="position: absolute;   right: 0;   max-width: 160px;   left: inherit;   top: 100%;    border-radius: 0px;
    border: 0px;">
          <li role="presentation" style="display: block;   padding: 0;">
            <a role="menuitem" tabindex="-1" href="logout.php" style="line-height: 2;   padding: 5px 15px;"><i class="fa fa-sign-out" aria-hidden="true"></i> LOGOUT</a>
          </li>
          <li role="presentation" style="display: block;   padding: 0;">
            <a role="menuitem" tabindex="-1" href="my-account.php" style="line-height: 2;   padding: 5px 15px;"><i class="fa fa-user"> </i> MY ACCOUNT</a>
          </li>
     
        </ul>
              
      <?php
              }
            ?>	  
                </ul>
                    </div>
                    <!--Right End-->

                </div>
            </div>
        </div>
        <!-- Header Top End -->
		
		

 <!-- Header Bottom Start -->
        	<div class="header-bottom">
        	    <div class="container-fluid">
        	        <div class="row position-relative justify-content-between align-items-center">
                       
                        <!--Logo Start-->
                        <div class="header-logo col-auto">
                            <a href="index.php"><img src="img/logo.png" alt=""></a>
                        </div><!--Logo End-->
									<!--Header Bottom Right Start-->
							
                       <!--Main Menu Start-->
				   <div class="position-static col-auto d-none d-lg-block">
                   <nav class="main-menu" style="display: block;margin-top: 21px;">
                    <ul>
                        <li><a href="index.php" class="dropdown-toggle" data-toggle="">Shop By Categories</a>
                            <ul class="sub-menu">
							
								<?php 
									$sel_cats = "SELECT cat_id, cat_nm FROM categories WHERE status = 1";
                                    $all_cats = $db->get($sel_cats);
									foreach($all_cats AS $all_cat) {
										$cat_id = $all_cat['cat_id'];
										$sel_sub_cats = "SELECT sub_id, sub_nm FROM sub_categories WHERE sub_cat_id = ? AND status=?";
                                        $all_sub_cats = $db->get($sel_sub_cats, array($cat_id,1));
										
								?>
                                <li class="hover-me"><a href="#"><?=$all_cat['cat_nm']?><i class="fa fa-angle-double-right" style="float:right; margin-top:3px;" aria-hidden="true"></i></a>
								    <div class="sub-menu-2"  style="margin-top: -32px;">
                                        <ul>
											<?php 
											   //Fetch the sub categories
												foreach($all_sub_cats AS $subcat_data){
											?>
                                            <li><a href="category.php?cat_id=<?php echo base64_encode($cat_id)."&sub_cat=".base64_encode($subcat_data['sub_id']);?>"><?=$subcat_data['sub_nm'];?></a></li>
											
												<?php }?>
                                            
                                        </ul>
                                        </div>                               
					              </li>
									<?php }?>
                                                  
                                        </ul>
                                    </li>
                                    <li><a href="request-for-quatation.php">Request For Quatation</a> </li>
                                
									 <li><a class="mega-title" href="hot_deals.php">Hot Deals</a> </li>   
                                        <li> <a class="mega-title" href="newarrivals.php">New Arrivals</a></li>         
                                           <li> <a class="mega-title" href="topselling.php">Top Selling</a> </li>   
                                           <li> <a class="mega-title" href="combo.php">Combo</a>  </li>    
                                           
                                  
                               
                                </ul>
                            </nav>
						</div><!--Main Menu Start-->
                   
                        <div class="col-auto d-flex">
                            
                            <!--Header Search Start-->
                            <div class="header-search dropdown">
                                <button data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-search"></i></button>
                                <div class="header-search-dropdown dropdown-menu dropdown-menu-right">
                                    <form method="GET" action="search.php" autocomplete="off" style="margin:0">
                                    <input type="hidden" name="search_param" value="all" id="search_param"> 
                                        <input type="text" placeholder="Search" autocomplete="off" id="search-field" name="search" >
                                        <div class="search_box" id="search_box"></div>
                                        <button class="btn-search"><i class="fa fa-search"></i></button>
                                    </form>	
                                </div>
                            </div><!--Header Search End-->
                            
                            <!--Header Mini Cart Start-->
                            <div class="header-cart dropdown">
                            <?php
          $tot_cnt = $tot_cart_price = 0;
          if(isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0)
          {
            $user_id = $_SESSION['user_id'];
            $sel_carts = "SELECT a.id, a.pro_id, a.pro_qty, a.size, p.offer_price, p.price, p.image, p.short_title FROM user_cart AS a LEFT JOIN products AS p ON p.product_id = a.pro_id WHERE a.user_id = ?";
            $datas = $db->get($sel_carts, array($user_id));
            foreach ($datas as $cart_data) {
              $tot_cnt++;
              $price = $cart_data['price'];
              if($cart_data['offer_price'] > 0) $price = $cart_data['offer_price'];
              if($cart_data['size'] == "ton") $price = $price * 1000;
              else if($cart_data['size'] == "quintal") $price = $price * 100;
              $tot_cart_price += $price * $cart_data['pro_qty'];
            }
          }
          ?>
                 <button data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-shopping-cart"></i><span class="num"><?php echo $tot_cnt;?></span></button>
                                <div class="header-cart-dropdown dropdown-menu dropdown-menu-right">
                                    <ul class="header-cart-product">
                                    
                                    
                                        <li>
                                            <a href="detail.php?product=<?php echo base64_encode($pro_id);?>" class="image"><img src="uploads/<?php echo $cart_data['image'];?>"  alt=""></a>
                                            <div class="content">
                                                <a href="detail.php?product=<?php echo base64_encode($pro_id);?>" class="title"><?php echo $cart_data['short_title'];?></a>
                                                <span class="details">S, Orange</span>
                                                <span class="price">1 x ₹ 16.00</span>
                                                <a href="#" class="remove"><i class="fa fa-close"></i></a>
                                            </div>
                                        </li>
                                  
                                    </ul>
                                    <div class="header-cart-total">
                                        <h6 class="total">Total: <span class="total">₹ <?php echo number_format($tot_cart_price);?></span></h6>
                                    </div>
                                    <div class="header-cart-buttons">
                                        <a class="button" href="checkout.php">Checkout <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div><!--Header Mini Cart End-->
                            
						</div>
					
						
                        
                        <!--Mobile Menu Start-->
                        <div class="mobile-menu col-12 d-lg-none"></div><!--Mobile Menu End-->
                   
        	        </div>
        	    </div>
        	</div>
        	<!--Header Bottom End-->
        	
        </div>
		<!-- Header Area End -->
		