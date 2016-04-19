<header>
                
                <div id="logoContainer">
                    <img id="logo" src="http://twinsfunnfood.com/assets/twins/images/food.png" alt="logo of fork with knife" width="100" height="100" />
                    <p id="tagline">Share your nomz</p>
                </div>
                
                <div id="welcome">
                <!-- Show website name -->
                <h1>nomz.</h1>

		
		<div class="wrong-credentials">
		       <strong><?php 
               if (isset($invalid)){
                    echo "Invalid Credentials";
                } 
               ?></strong>
		       	    </div>
				
                </div>   
                    <ul id="settings">
                        <li id="editProfile"><a href="#">Edit my profile </a></li>
                        <li><a href="logout.php"> Logout</a></li>
                    </ul>
                    
                    <ul id="navigation">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">My statuses</a></li>
                        <li><a href="#">All users</a></li>
                        <li><a href="http://impossible-octopus-fitness.netne.net/">About</a></li>
                     </ul>     
                
		     <h2>Hello, <?php echo "{$fullname}!";
             ?>
                </h2>
		<p> <?php 
            if (isset($_POST['submit'])){
                echo "Your rot13’d login is: " . str_rot13($name);
            } 
        ?></p>
		<p> <?php 
        if (isset($_POST['submit'])){
            echo "The length of your login is: " . strlen($name); 
        }
        ?></p>
            </header>