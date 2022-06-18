<div class="header-area">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo animation wow zoomIn"> <a href="../index.php"><img src="../images/pnglogohamropcnew.png" class="img-fluid" alt=""> </a></div>
                </div>  
                <div class="col-md-10">
                    <div class="menu-area">
                        <div class="menu">
                            <ul class="nav justify-content-end">
                             <form method="post">
	                           <input type="textbox" name="search-input" required/>
	                           <input type="submit" name="search-submit" value="Search"/>
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
                                    header ('location: search.php');
	                            }else{
                                    echo '<div class="alert-messagesearch">No Search Product Found.</div>';
	                            }
                                }
                             ?>
        
                                <li><a href="../index.php"><b>Home</b></a></li>
                                <li><a href="../shop.php"><b>Shop</b></a></li>  
                                
                                <?php
                                if(isset($_SESSION['email'])){
                                    echo '<li><a href="../my_profile.php"><b>My Profile</b></a></li>';
                                }
                                if(isset($_SESSION['type'])){
                                    if($_SESSION['type']=='admin'){
                                        echo '<li><a href="./producttable.php"><b>Admin</b></a></li>';
                                    }
                                }
                                ?>
                                <?php
                                if (isset($_SESSION['userID'])) {
                                    echo '<li><a href="../log_out.php"><button><b>Logout</b></button></a></li>';
                                    echo '<li><a href="../cart.php"><i class="fas fa-cart-plus"></i></a></li>';
                                }
                                else {
                                    echo '<li><a href="log_in.php"><button><b>Login</b></button></a></li>';
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


 


