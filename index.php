<?php
$users = [
    array("id" => 1, "login" => "user1", "password" => "password1", "full_name" => "User 1"),
    array("id" => 2, "login" => "user2", "password" => "password2", "full_name" => "User 2"),
    array("id" => 3, "login" => "user3", "password" => "password3", "full_name" => "User 3"),
  ];

function userExists($login, $password, $users){
    foreach ($users as $value){
       if ( $login == $value['login'] && $password == $value['password'] ) 
            return $value;
     }
     return false;  
}

function userExistsCookie($login, $users){
    foreach ($users as $value){
       if ( $login == $value['login'] ) 
            return $value;
     }
     return false;  
}

if (isset($_POST['submit'])){
   $name=$_POST['login'];
   $password=$_POST['password'];
   $user_login = userExists($name,$password,$users);
   if ($user_login){
    $fullname = $user_login['full_name'];
    setcookie( "login", $user_login['login'], time()+(60*60*24*7) );
   }
   else{
    $fullname="there";
    $invalid = true;
   }

}
else{
    if (isset($_COOKIE['login'])){
        $user_login = userExistsCookie($_COOKIE['login'],$users);
        if ($user_login){
            $fullname=$user_login['full_name'];
        }
        else{
            $fullname="there";
        }
    }
    else{
        $fullname="there";
    }
}
?>

<!DOCTYPE html>

<html lang="en">
    
    <head>
        
        <link rel="stylesheet" type="text/css" href="twitter-clone.css">
        <title>nomz. the social media platform for food</title>
        <meta charset="UTF-8">
        <meta name="description" content="The social media platform for food">
        <meta name="keywords" content="yelp,food,instagram,social media,microblog,food pictures,pics">
        <meta name="author" content="Electra Chong and Marine Dejean">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <script src="ajax.js"></script>
        <script src="toggle.js"></script>
        <script src="post_a_status.js"></script>
        <script src="load_more.js"></script>
        <script src="reply.js"></script>
    </head>
    
    <body>

        
        <!-- Container for the website content -->
        <div id="container">
            
            <?php
                include_once "views/header.php";
            ?>
            
            <!-- Main section with food posts -->
            <main>
                <h2><button id="createAPostLink">Create a post</button></h2>
                
                <form id="postForm">
                    <label for="location"> Include a location: </label>
                    <input id="location" type="checkbox" name="location" value="include_location"> 
                    <label for="postarea"> Write a post: 
                    <textarea id="postarea">Write a post</textarea></label><br>
                    <input type="submit" value="Post">    
                </form>
                
                <noscript>
                <form>
                    <label for="location_noscript"> Include a location: </label>
                    <input id="location_noscript" type="checkbox" name="location" value="include_location"> Include a location<br>
                    <label for="postarea_noscript"> Write a post: 
                    <textarea id="postarea_noscript">Write a post</textarea></label><br>
                    <input type="submit" value="Post">    
                </form>
                </noscript>
                
                <h2>Latest Posts</h2>
                <div class="post">
                    
                    <div class="imgContainer">
                        <img class="avatar" src="https://lh3.googleusercontent.com/-Tm967oOIucU/VrKXjI1cNwI/AAAAAAAAAD8/3vKPYkxhBWo/s128-Ic42/IMG_4812.JPG" alt="Josh's picture" />
                    </div>
                    
                    <p class="username"><a href="#">Josh</a></p>
                    <p class="date">45min ago</p> 
                    <img class="foodpic" src="https://lh3.googleusercontent.com/-LL6a3BXAghQ/VrKXj3bDwSI/AAAAAAAAAD8/EOivkku8_lM/s912-Ic42/IMG_4814.JPG" alt="Josh's food" />
                    <p class="postText">Lorem ipsum dolor sit amet, varius ultricies libero proin. Dui mauris, sit viverra magna nec pede. Natoque turpis, vel dolor risus sem ac odio torquent, et suscipit hendrerit amet lectus, nulla ac pellentesque cum mi tortor ante. Leo ut, per justo nunc eu nisl. In elit tincidunt mauris sapien torquent. Viverra auctor, tristique eget gravida feugiat faucibus quisque. <a href="#" class="replyLink" data-postlink="post1">«Reply»</a></p>                        
                    
                    <form class="replyForm" id="post1">
                        <label for="location1"> Include a location: </label>
                        <input id="location1" type="checkbox" name="location" value="include_location"><br>
                        <label for="postarea1"> Write a post: </label>
                        <textarea id="postarea1">Write a post</textarea><br>
                        <input type="submit" value="Post">    
                    </form>
                
                </div>
                
                
                <div class="post">
                    <img class="avatar" src="https://lh3.googleusercontent.com/-GVIcgw09mPI/VrKWtM1vGiI/AAAAAAAAAC8/UzW04AYCJVw/h240/IMG_4809.JPG" alt="Electra's picture" />
                    <p class="username"><a href="#">Electra</a></p>
                    <p class="date">3hrs ago</p>
                    <img class="foodpic" src="https://lh3.googleusercontent.com/-XUj9yNptOOI/VrKUkeDCDiI/AAAAAAAAACo/So7xW_oJV5o/s912-Ic42/2016-02-03%25252012.31.32.jpg" alt="Electra's food" />
                    <p class="postText">Orci sit ante nibh nonummy quis commodo. Vitae ultricies suscipit metus penatibus interdum. At risus rhoncus eget, id hymenaeos a, mi posuere natus. Nec sagittis quis volutpat, mauris justo aenean fringilla sit egestas laoreet. At sodales, mus dis pharetra penatibus nonummy fringilla sed. Iaculis condimentum lacus nullam laoreet nullam vitae. <a href="#" class="replyLink" data-postlink="post2">«Reply»</a></p>  
                    
                    <form class="replyForm" id="post2">
                        <label for="location2"> Include a location: </label>
                        <input id="location2" type="checkbox" name="location" value="include_location"><br>
                        <label for="postarea2"> Write a post: </label>
                        <textarea id="postarea2">Write a post</textarea><br>
                        <input type="submit" value="Post">    
                    </form>
                </div>

                
                <div class="post">
                    <img class="avatar" src="https://lh3.googleusercontent.com/-N2fRR7KmOr4/VrKXfnSXQwI/AAAAAAAAADU/fuO0d7mQQlU/s128-Ic42/IMG_4805.JPG" alt="Steven's picture"/>
                    <p class="username"><a href="#">Steven</a></p>
                    <p class="date">6hrs ago</p>
                    <img class="foodpic" src="https://lh3.googleusercontent.com/-PEtyOolz_lA/VrKUj2O2KPI/AAAAAAAAACo/z9fbxbCS6Wo/s912-Ic42/2016-02-03%25252012.30.52.jpg" alt="Steven's food" />
                    <p class="postText">Dignissim tristique massa luctus suscipit, magna volutpat laoreet, nam quis mi, vulputate porttitor pede dui sit elit mi. Venenatis in dis tincidunt sapien, proin elementum pharetra turpis id in, sapien commodo, ac pellentesque semper dui. Sit tellus consequat vestibulum, luctus lacus eum ac dolor amet, tellus senectus nec fringilla massa. Leo mauris lacus mauris conubia varius. <a href="#" class="replyLink" data-postlink="post3">«Reply»</a></p>
                    
                    <form class="replyForm" id="post3">
                        <label for="location3"> Include a location: </label>
                        <input id="location3" type="checkbox" name="location" value="include_location"><br>
                        <label for="postarea3"> Write a post: </label>
                        <textarea id="postarea3">Write a post</textarea><br>
                        <input type="submit" value="Post">    
                    </form>
                </div>
                
                <div class="post">
                    <img class="avatar" src="https://lh3.googleusercontent.com/-C4Kpf8iSx0g/VrKZhxSmclI/AAAAAAAAAEM/1W7K-72O0vA/h240/IMG_4810%2B%25281%2529.JPG" alt="Ian's picture" />
                    <p class="username"><a href="#">Ian</a></p> <br>
                    <p class="date">Feb 2, 2016</p>
                    <img class="foodpic" src="https://lh3.googleusercontent.com/-UpVoCpgMzEQ/VrKUlPZt1UI/AAAAAAAAACo/fkE6hyTuKQs/s912-Ic42/2016-02-03%25252012.49.44.jpg" alt="Ian's food" />
                    <p class="postText">Quis et lorem phasellus, tincidunt pellentesque pellentesque in, sed sociis sit torquent, turpis justo, in aliquam nec. <a href="#" class="replyLink" data-postlink="post4">«Reply»</a></p>
                                                    
                    <form class="replyForm" id="post4">
                         <label for="location4"> Include a location: </label>
                        <input id="location4" type="checkbox" name="location" value="include_location"><br>
                        <label for="postarea4"> Write a post: </label>
                        <textarea id="postarea4">Write a post</textarea><br>
                        <input type="submit" value="Post">    
                    </form>
                </div>
                
                <div class="post">
                    <img class="avatar" src="https://lh3.googleusercontent.com/-JlP48I3EEL0/VrKbbR5i37I/AAAAAAAAAE8/hmSRf8N9rQY/s128-Ic42/IMG_4779.png" alt="Alex's picture" />
                    <p class="username"><a href="#">Alex</a></p>
                    <p class="date">Feb 3, 2016</p>
                    <img class="foodpic-horizontal" src="https://lh3.googleusercontent.com/-Lt1AFUO5cKk/VrKXjIYWmYI/AAAAAAAAAD8/oOPjUKqjifI/s1280-Ic42/IMG_4778.JPG" alt="Alex's food"/>
                    <p class="postText">Condimentum at sed, lacus sed aliquam eu cursus, nulla odio lorem mauris amet. Cubilia egestas ut erat at. Nibh wisi in nisl fusce blandit, orci convallis a sed ligula phasellus et, venenatis cras congue ut, ridiculus rutrum in viverra, tincidunt mauris aliquet massa aliquet hendrerit. <a href="#" class="replyLink" data-postlink="post5">«Reply»</a></p>
                    
                    <form class="replyForm" id="post5">
                        <label for="location5"> Include a location: </label>
                        <input id="location5" type="checkbox" name="location" value="include_location"><br>
                        <label for="postarea5"> Write a post: </label>
                        <textarea id="postarea5">Write a post</textarea><br>
                        <input type="submit" value="Post">    
                    </form>
                </div>
                
                <div class="post">
                    <img class="avatar" src="https://holbertonintranet.s3.amazonaws.com/users/photos/000/000/021/thumb/01.jpg?1453328441" alt="Rick's picture" />
                    <p class="username"><a href="#">Rick</a></p> <br>
                    <p class="date">Feb 2, 2016</p>
                    <img class="foodpic" src="https://lh3.googleusercontent.com/-F1oZn2-ER-k/VvA3YpIvZyI/AAAAAAAAAHQ/z_KPqH-81mgo8_gDBm2Q7RQ_DzDV6nXsQCCo/s1024-Ic42/2016-02-04%2B13.39.20.jpg" alt="Rick's food" />
                    <p class="postText">Quis et lorem phasellus, tincidunt pellentesque pellentesque in, sed sociis sit torquent, turpis justo, in aliquam nec. <a href="#" class="replyLink" data-postlink="post6">«Reply»</a></p>
                                                    
                    <form class="replyForm" id="post6">
                        <label for="location6"> Include a location: </label>
                        <input id="location6" type="checkbox" name="location" value="include_location"><br>
                        <label for="postarea6"> Write a post: </label>
                        <textarea id="postarea6">Write a post</textarea><br>
                        <input type="submit" value="Post">    
                    </form>
                </div>
           
                <div class="post">
                    <img class="avatar" src="https://lh3.googleusercontent.com/-Cug4E-q48R4/VrKz-PBGMzI/AAAAAAAAAGc/WRnANid1ox8/h240/IMG_4822.JPG" alt="Bennett's picture" />
                    <p class="username"><a href="#">Bennett</a></p> <br>
                    <p class="date">Feb 2, 2016</p>
                    <img class="foodpic" src="https://lh3.googleusercontent.com/-weymTdk7gkU/VvA3YoMC1EI/AAAAAAAAAHU/xIPLEp6JzooERv58bLSSuwKsOJ6HtUMMACCo/s1024-Ic42/2016-02-03%2B17.56.38.jpg" alt="Bennett's food" />
                    <p class="postText">Quis et lorem phasellus, tincidunt pellentesque pellentesque in, sed sociis sit torquent, turpis justo, in aliquam nec. <a href="#" class="replyLink" data-postlink="post7">«Reply»</a></p>
                                                    
                    <form class="replyForm" id="post7">
                        <label for="location7"> Include a location: </label>
                        <input id="location7" type="checkbox" name="location" value="include_location"><br>
                        <label for="postarea7"> Write a post: </label>
                        <textarea id="postarea7">Write a post</textarea><br>
                        <input type="submit" value="Post">    
                    </form>
                </div>
                
                 <div class="post">
                    <img class="avatar" src="https://lh3.googleusercontent.com/-GVIcgw09mPI/VrKWtM1vGiI/AAAAAAAAAC8/UzW04AYCJVw/h240/IMG_4809.JPG" alt="Electra's picture" />
                    <p class="username"><a href="#">Electra</a></p>
                    <p class="date">3hrs ago</p>
                    <img class="foodpic" src="https://lh3.googleusercontent.com/-XUj9yNptOOI/VrKUkeDCDiI/AAAAAAAAACo/So7xW_oJV5o/s912-Ic42/2016-02-03%25252012.31.32.jpg" alt="Electra's food" />
                    <p class="postText">Orci sit ante nibh nonummy quis commodo. Vitae ultricies suscipit metus penatibus interdum. At risus rhoncus eget, id hymenaeos a, mi posuere natus. Nec sagittis quis volutpat, mauris justo aenean fringilla sit egestas laoreet. At sodales, mus dis pharetra penatibus nonummy fringilla sed. Iaculis condimentum lacus nullam laoreet nullam vitae. <a href="#" class="replyLink" data-postlink="post8">«Reply»</a></p>  
                    
                    <form class="replyForm" id="post8">
                        <label for="location8"> Include a location: </label>
                        <input id="location8" type="checkbox" name="location" value="include_location"><br>
                        <label for="postarea8"> Write a post: </label>
                        <textarea id="postarea8">Write a post</textarea><br>
                        <input type="submit" value="Post">    
                    </form>
                </div>

                
                <div class="post">
                    <img class="avatar" src="https://lh3.googleusercontent.com/-N2fRR7KmOr4/VrKXfnSXQwI/AAAAAAAAADU/fuO0d7mQQlU/s128-Ic42/IMG_4805.JPG" alt="Steven's picture"/>
                    <p class="username"><a href="#">Steven</a></p>
                    <p class="date">6hrs ago</p>
                    <img class="foodpic" src="https://lh3.googleusercontent.com/-PEtyOolz_lA/VrKUj2O2KPI/AAAAAAAAACo/z9fbxbCS6Wo/s912-Ic42/2016-02-03%25252012.30.52.jpg" alt="Steven's food" />
                    <p class="postText">Dignissim tristique massa luctus suscipit, magna volutpat laoreet, nam quis mi, vulputate porttitor pede dui sit elit mi. Venenatis in dis tincidunt sapien, proin elementum pharetra turpis id in, sapien commodo, ac pellentesque semper dui. Sit tellus consequat vestibulum, luctus lacus eum ac dolor amet, tellus senectus nec fringilla massa. Leo mauris lacus mauris conubia varius. <a href="#" class="replyLink" data-postlink="post9">«Reply»</a></p>
                    
                    <form class="replyForm" id="post9">
                        <label for="location9"> Include a location: </label>
                        <input id="location9" type="checkbox" name="location" value="include_location"><br>
                        <label for="postarea9"> Write a post: </label>
                        <textarea id="postarea9">Write a post</textarea><br>
                        <input type="submit" value="Post">      
                    </form>
                </div>
                
                <div class="post">
                    <img class="avatar" src="https://lh3.googleusercontent.com/-C4Kpf8iSx0g/VrKZhxSmclI/AAAAAAAAAEM/1W7K-72O0vA/h240/IMG_4810%2B%25281%2529.JPG" alt="Ian's picture" />
                    <p class="username"><a href="#">Ian</a></p> <br>
                    <p class="date">Feb 2, 2016</p>
                    <img class="foodpic" src="https://lh3.googleusercontent.com/-UpVoCpgMzEQ/VrKUlPZt1UI/AAAAAAAAACo/fkE6hyTuKQs/s912-Ic42/2016-02-03%25252012.49.44.jpg" alt="Ian's food" />
                    <p class="postText">Quis et lorem phasellus, tincidunt pellentesque pellentesque in, sed sociis sit torquent, turpis justo, in aliquam nec. <a href="#" class="replyLink" data-postlink="post10">«Reply»</a></p>
                                                    
                    <form class="replyForm" id="post10">
                        <label for="location10"> Include a location: </label>
                        <input id="location10" type="checkbox" name="location" value="include_location"><br>
                        <label for="postarea10"> Write a post: </label>
                        <textarea id="postarea10">Write a post</textarea><br>
                        <input type="submit" value="Post">     
                    </form>
                </div>
              
                   <h3><button type="button" id="MoreStatuses">See more statuses</button></h3>
                 <div id="extra_statuses"></div>
              
                    
            </main>
            
            <!-- Sidebar featuring users -->
                
                <section id="featuredUsers">
                    <h2>Featured Users</h2>

                    <div class="featuredUser">

                        <img class="featurePic" src="https://lh3.googleusercontent.com/-76sqZBaqAow/VrKgOFVNG7I/AAAAAAAAAF4/0-1f21-rp9E/h240/IMG_4774%2B%25281%2529.JPG" alt="Rona's face" /> 

                        <div class="featureTag">
                            <p class="featureName"><a href="#">Rona</a></p>
                            <p>Tagline</p>
                        </div>

                        <p class="quote">Morbi hymenaeos duis cursus commodo mauris, ligula urna integer ullamcorper.</p>

                    </div>

                    <div class="featuredUser">

                        <img class="featurePic" src="https://lh3.googleusercontent.com/-Cug4E-q48R4/VrKz-PBGMzI/AAAAAAAAAGc/WRnANid1ox8/h240/IMG_4822.JPG" alt="Bennett's face" />

                        <div class="featureTag">
                            <p class="featureName"><a href="#">Bennett</a></p>
                            <p>Tagline</p>
                        </div>

                        <p class="quote">Sociosqu molestie, praesent magna eleifend, amet enim leo gravida, lectus ligula eleifend sed.</p>

                    </div>

                    <div class="featuredUser">

                        <img class="featurePic" src="https://lh3.googleusercontent.com/-7-bFdeXUQuU/VrKXkKQxn7I/AAAAAAAAAD8/-ANetChXDRw/s128-Ic42/IMG_4819.JPG" alt="Siphan's face" />

                        <div class="featureTag">
                            <p class="featureName"><a href="#">Siphan</a></p>
                            <p>Tagline</p>
                        </div>

                        <p class="quote">Elit aliquam lectus, condimentum wisi sit, rem praesent vel justo</p>

                    </div>
                    
                </section>
                
                <!-- Sidebar featuring ad -->

                <section id="impossibleFitnessAd">
                    
                    <h2>Impossible Octopus Fitness!</h2>
                    
                    <p>Find out more here:</p>
                    
                   <a href="http://impossible-octopus-fitness.netne.net/"><img id="OctopusAd" src="https://dl.dropboxusercontent.com/s/st20imnzozyctdp/impossible-baby-octopus.jpg" alt="Impossible Octopus Fitness description page"></a>
                </section>
                
            
            <!-- Welcome message -->
            <section>
                <h3 id="Welcome">Welcome! We are currently in beta status. :)</h3>
            </section>
            
        <footer>
            <ul id="footer_links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">My statuses</a></li>
                        <li><a href="#">All users</a></li>
                        <li><a href="http://impossible-octopus-fitness.netne.net/">About</a></li>
            </ul>  
        </footer>
        </div>
        
    </body>
    

</html>
