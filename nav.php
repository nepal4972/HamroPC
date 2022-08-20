<div class="header-area">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo animation wow zoomIn"> <a href="index"><img src="images/pnglogohamropcnew.png" class="img-fluid" alt=""> </a></div>
                </div>  
                <div class="col-md-10">
                    <div class="menu-area">
                        <div class="menu">
                            <ul class="nav justify-content-end">
                             <form method="post">
	                           <input class="search-border" type="textbox" name="search-input" required/>
	                           <input class="search" type="submit" name="search-submit" value="Search"/>
                               <style>
                                .search{
                                    background-color:rgba(10, 8, 129, 0.7);
                                    color:white;
                                }
                               </style>
                             </form>
                             
                             <?php
                               if(isset($_POST['search-submit'])){
                               $str=mysqli_real_escape_string($link,$_POST['search-input']);
	                           $sql="select * from product where name like '%$str%' or description like '%$str%'";
                               $goto=mysqli_query($link,$sql);
	                            if(mysqli_num_rows($goto)>0){
                                    $row = mysqli_fetch_assoc($goto);
                                    $_SESSION['number'] = $goto;
                                    $_SESSION['row'] = $row['productID'];
                                    header ('location: search');
	                            }else{
                                    echo '<div class="alert-messagesearch">No Search Product Found.</div>';
	                            }
                                }
                             ?>
        
                                <li><a href="index"><b>Home</b></a></li>
                                <li><a href="shop"><b>Shop</b></a></li>
                                
                                <?php
                                if(isset($_SESSION['email'])){
                                    echo '<li><a href="my_profile"><b>My Profile</b></a></li>';
                                }
                                if(isset($_SESSION['type'])){
                                    if($_SESSION['type']=='admin'){
                                        echo '<li><a href="./admin/dashboard"><b>Admin</b></a></li>';
                                    }
                                }
                                ?>
                
                                <?php
                                if (isset($_SESSION['userID'])) {?>
                                    <li><a href="log_out" onclick="return confirm('You Are Sure You Want To Logout?');"><button><b>Logout</b></button></a></li>
                                    <li><a href="cart"><i class="fas fa-cart-plus"></i></a></li>
                              <?php  }
                                else {
                                    echo '<li><a href="log_in"><button><b>Login</b></button></a></li>';
                                }
                                ?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


 


