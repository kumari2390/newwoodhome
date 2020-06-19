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
                                    

               <!-- started Shop By Categories -->
                                    <li><a href="#">Shop By Categories <i class='fas fa-angle-down'></i></a>
                                        <ul class="mega-menu">
                                          
                                            <li>
                                               
                                                <ul>
												
								<?php 
									$sel_cats = "SELECT cat_id, cat_nm FROM categories WHERE status = 1 ORDER BY cat_id  LIMIT 0, 4";
                                    $all_cats = $db->get($sel_cats);
									foreach($all_cats AS $all_cat) {
										$cat_id = $all_cat['cat_id'];
										$sel_sub_cats = "SELECT sub_id, sub_nm FROM sub_categories WHERE sub_cat_id = ? AND status=?";
                                        $all_sub_cats = $db->get($sel_sub_cats, array($cat_id,1));
										
								?>
                                                    
                                 <li class="hover-me"><a href="#"><?=$all_cat['cat_nm']?></i></a>
                                                        <div class="sub-menu-2">
                                                        <ul>
															<?php 
											   //Fetch the sub categories
												foreach($all_sub_cats AS $subcat_data){
											?>
														
                                                            <li><a href="category.php?cat_id=<?php echo base64_encode($cat_id)."&sub_cat=".base64_encode($subcat_data['sub_id']);?>"><i class='fas fa-angle-right'></i><?=$subcat_data['sub_nm'];?></a></li>
                                                                    
												<?php } ?>
                                                                                
                                                        </ul>
                                                         </div>
                                                   </li>
                                        
									<?php } ?>
                                       
                                                </ul>
												
												
                                            </li>
											
											
											
											
											

                                               
                                          


                                            <li>
                                                
                                                <ul>
												
														<?php 
									$sel_cats = "SELECT cat_id, cat_nm FROM categories WHERE status = 1 ORDER BY cat_id  LIMIT 4, 4";
                                    $all_cats = $db->get($sel_cats);
									foreach($all_cats AS $all_cat) {
										$cat_id = $all_cat['cat_id'];
										$sel_sub_cats = "SELECT sub_id, sub_nm FROM sub_categories WHERE sub_cat_id = ? AND status=?";
                                        $all_sub_cats = $db->get($sel_sub_cats, array($cat_id,1));
										
								?>
                                                    
                                                    <li class="hover-me"><a href="#"><?=$all_cat['cat_nm']?></a>
                                                        <div class="sub-menu-2">
                                                                 <ul>
															<?php 
											   //Fetch the sub categories
												foreach($all_sub_cats AS $subcat_data){
											?>
														
                                                            <li><a href="category.php?cat_id=<?php echo base64_encode($cat_id)."&sub_cat=".base64_encode($subcat_data['sub_id']);?>"><i class='fas fa-angle-right'></i><?=$subcat_data['sub_nm'];?></a></li>
                                                                    
												<?php } ?>
                                                                                
                                                        </ul>
                                                         </div>
                                                   </li>
                                           
                                            

                                               
                                       
										   
									<?php } ?>
                                           </ul>
                                          </li>
										  
										  
										  
										  
										  
										  

                                            <li>
											
											
                                               
                                                <ul>
																				<?php 
									$sel_cats = "SELECT cat_id, cat_nm FROM categories WHERE status = 1 ORDER BY cat_id  LIMIT 8, 4";
                                    $all_cats = $db->get($sel_cats);
									foreach($all_cats AS $all_cat) {
										$cat_id = $all_cat['cat_id'];
										$sel_sub_cats = "SELECT sub_id, sub_nm FROM sub_categories WHERE sub_cat_id = ? AND status=?";
                                        $all_sub_cats = $db->get($sel_sub_cats, array($cat_id,1));
										
								?>
                                                    <li class="hover-me"><a href="#"><?=$all_cat['cat_nm']?></a>
                                                        <div class="sub-menu-2">
                                                             <ul>
															<?php 
											   //Fetch the sub categories
												foreach($all_sub_cats AS $subcat_data){
											?>
														
                                                            <li><a href="category.php?cat_id=<?php echo base64_encode($cat_id)."&sub_cat=".base64_encode($subcat_data['sub_id']);?>"><i class='fas fa-angle-right'></i><?=$subcat_data['sub_nm'];?></a></li>
                                                                    
												<?php } ?>
                                                                                
                                                        </ul>
                                                         </div>
                                                   
                                                   </li>
                                        

                                          
                                     
										   
									<?php } ?>
                                                </ul>
												
												
                                            </li>
											
											
											
											
											
											
                                            <li>
                                                
                                                <ul>
											<?php 
									$sel_cats = "SELECT cat_id, cat_nm FROM categories WHERE status = 1 ORDER BY cat_id  LIMIT 12, 4";
                                    $all_cats = $db->get($sel_cats);
									foreach($all_cats AS $all_cat) {
										$cat_id = $all_cat['cat_id'];
										$sel_sub_cats = "SELECT sub_id, sub_nm FROM sub_categories WHERE sub_cat_id = ? AND status=?";
                                        $all_sub_cats = $db->get($sel_sub_cats, array($cat_id,1));
										
								?>
                                                    <li class="hover-me"><a href="#"><?=$all_cat['cat_nm']?></a>
                                                        <div class="sub-menu-2">
                                                               <ul>
															<?php 
											   //Fetch the sub categories
												foreach($all_sub_cats AS $subcat_data){
											?>
														
                                                            <li><a href="category.php?cat_id=<?php echo base64_encode($cat_id)."&sub_cat=".base64_encode($subcat_data['sub_id']);?>"><i class='fas fa-angle-right'></i><?=$subcat_data['sub_nm'];?></a></li>
                                                                    
												<?php } ?>
                                                                                
                                                        </ul>
                                                         </div>
                                                   </li>
                                              
                                       
										   
										   
										   
                                    
                                                   
									<?php } ?>												   
                                                </ul>
                                            </li>
                                            
                                        </ul>
										
										
										
                                    </li>

   <!-- end Shop By Categories -->




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
                                    <form action="#">
                                        <input type="text" placeholder="Search" autocomplete="off">
                                        <button class="btn-search"><i class="fa fa-search"></i></button>
                                    </form>	
                                </div>
                            </div><!--Header Search End-->
                            
                            <!--Header Mini Cart Start-->
                            <div class="header-cart dropdown">
                                <button data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-shopping-cart"></i><span class="num">2</span></button>
                                <div class="header-cart-dropdown dropdown-menu dropdown-menu-right">
                                    <ul class="header-cart-product">
                                        <li>
                                            <a href="product-details.html" class="image"><img src="img/cart-img/1.jpg" alt=""></a>
                                            <div class="content">
                                                <a href="product-details.html" class="title">Printed Dress</a>
                                                <span class="details">S, Orange</span>
                                                <span class="price">1 x £ 16.00</span>
                                                <a href="#" class="remove"><i class="fa fa-close"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="product-details.html" class="image"><img src="img/cart-img/2.jpg" alt=""></a>
                                            <div class="content">
                                                <a href="product-details.html" class="title">Printed Summer Dress</a>
                                                <span class="details">S, Orange</span>
                                                <span class="price">2 x £ 36.00</span>
                                                <a href="#" class="remove"><i class="fa fa-close"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="header-cart-total">
                                        <h6 class="total">Total: <span class="total">£ 86.00</span></h6>
                                    </div>
                                    <div class="header-cart-buttons">
                                        <a class="button" href="checkout.html">Checkout <i class="fa fa-angle-right"></i></a>
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
		