<?php




?>



<div class="nav-side-menu">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-content1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="menu-list collapse navbar-collapse" id="menu-content1">
  
            <ul id="menu-content" class="menu-content collapse out nav navbar-nav">
                <li class="dashboard">
                  <a href="<?=Yii::$app->urlManager->baseUrl?>/site/index">
                  <i class="fa fa-dashboard fa-lg"></i> Dashboard
                  </a>
                </li>
                  <?php if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){echo'
                <li  data-toggle="collapse" data-target="#products" class="main-menu collapsed">
                  <a href="#"><i class="fa fa-gift fa-lg"></i>User<span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li class="" id="add_user" name="Add new user">Add New</li>
                     <li  data-toggle="collapse" data-target="#modify" class="collapsed">
		                  <a href="#">Mondify <span class="arrow"></span></a>
		                </li><ul class=" collapse"  id="modify">		            	                
							<input type="text" list="browsers" name="search" id="suggest" class="search-query" placeholder="Search">				      			
							<datalist id="browsers">
							  
							  </datalist>	 		                    
		                </ul>		
	                    		                                    
                    <li class="list_user" id="list_user">List Users</li>
                    
                </ul>';
								}
							?>


                <li data-toggle="collapse" data-target="#service" class="main-menu collapsed">
                  <a href="#"><i class="fa fa-globe fa-lg"></i>Animals<span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="service">
                  <li class="addanimal"><a href="<?=Yii::$app->urlManager->baseUrl?>/animalmaster/create">Add New</a></li>
                   <li  data-toggle="collapse" data-target="#modifyanimal" class="collapsed">
		                  <a href="#">Mondify <span class="arrow"></span></a>
		                </li>
		                <ul class=" collapse"  id="modifyanimal">		            	                
							<input type="text" list="datalistanimals" name="searchAnimal" id="suggestAnimal" class="search-query" placeholder="Search">				      			
							<datalist id="datalistanimals">
							  
							  </datalist>	 		                    
		                </ul>
                       
<!--                   <li>Manage Animals</li> -->
                  <li id="listAnimals">List Animals</li>
                </ul>


                <?php if(isset($_SESSION['role']) &&  $_SESSION['role']=='admin'){echo' <li data-toggle="collapse" data-target="#new" class="main-menu collapsed">
                  <a href="#"><i class="fa fa-car fa-lg"></i> Zoo <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                  <li class="add_zoo">Add New</li>                 
                  <li class="managezoo" id="managezoo">Manage Zoo</li>                 
	                    <li class="" data-toggle="collapse" data-target="#viewzoo" class="collapsed">
		                  <a href="#">Modify<span class="arrow"></span></a>
		                </li>
		                <ul class=" collapse"  id="viewzoo">		            	                
							<input type="text" list="listzoo" name="searchzoo" id="suggestzoo" class="search-query" placeholder="Search">				      			
							<datalist id="listzoo">							  
							  </datalist>	 		                    
		                </ul>
                  <li class="zoodata">List Zoo</li>
                </ul>';
							}
                             ?>


                <!--  <li>
                  <a href="#">
                  <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                  </li>

                 <li>
                  <a href="#">
                  <i class="fa fa-users fa-lg"></i> Users
                  </a>
                </li>
                 -->
            </ul>
     </div>
</div>
<!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!--   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
