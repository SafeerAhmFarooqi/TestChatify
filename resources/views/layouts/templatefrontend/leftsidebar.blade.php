<div class="col-md-3 static">
    <div class="profile-card">
    <a class="navbar-brand" href="index.php"><img src="{{asset('user_frontend/images/users/user-12.jpg')}}" alt="logo" style="width:60px;border-radius:50%;margin-top:-10px"></a>
   

        <h5><a href="index.php" class="text-white">

     
        {{Auth::user()->firstname }} 
</a></h5><br>
      
        <!-- <a href="#" class="text-white"><i class="ion ion-android-person-add"></i> 1,299 followers</a> -->
    </div><!--profile card ends-->
    <ul class="nav-news-feed">
      <li><i class="icon ion-ios-paper"></i><div><a href="home">My Newsfeed</a></div></li>
      <li><i class="icon ion-ios-people-outline"></i><div><a href="{{route('profile')}}">Profile</a></div></li>
      <li><i class="icon ion-ios-people-outline"></i><div>{{--<a href="{{route('profile')}}"> --}}<a href="{{route('download.pdf')}}">Get PDF</a></div></li>
      <li><i class="icon ion-ios-people-outline"></i><div>{{--<a href="{{route('profile')}}"> --}}<a>PDF Pass : {{Auth::user()->pdf_password}} </a></div></li>
      <li><i class="icon ion-ios-people"></i><div><a href="nearuser.php">People Nearby</a></div></li>
      <li><i class="icon ion-chatboxes"></i><div><a href="message.php">Messages</a></div></li>
      <li><i class="icon ion-ios-people-outline"></i><div><a href="{{route('groups.index')}}">Groups</a></div></li>

      <li><i class="icon ion-ios-people-outline"></i><div><a href="{{route('users.index')}}">Users</a></div></li>
      <li><i class="icon ion-ios-people-outline"></i><div><a href="vouchers.php">Vouchers</a></div></li>
      <li><i class="icon ion-ios-people-outline"></i><div><a href="savings.php">Savings</a></div></li>

      <!-- 
      <li><i class="icon ion-images"></i><div><a href="newsfeed-images.html">Images</a></div></li>
      <li><i class="icon ion-ios-videocam"></i><div><a href="newsfeed-videos.html">Videos</a></div></li> -->
    </ul><!--news-feed links ends-->
 <!--    <div id="chat-block">
      <div class="title">Chat online</div>
      <ul class="online-users list-inline">
        <li><a href="newsfeed-messages.html" title="Linda Lohan"><img src="images/users/user-2.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
        <li><a href="newsfeed-messages.html" title="Sophia Lee"><img src="images/users/user-3.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
        <li><a href="newsfeed-messages.html" title="John Doe"><img src="images/users/user-4.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
        <li><a href="newsfeed-messages.html" title="Alexis Clark"><img src="images/users/user-5.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
        <li><a href="newsfeed-messages.html" title="James Carter"><img src="images/users/user-6.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
        <li><a href="newsfeed-messages.html" title="Robert Cook"><img src="images/users/user-7.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
        <li><a href="newsfeed-messages.html" title="Richard Bell"><img src="images/users/user-8.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
        <li><a href="newsfeed-messages.html" title="Anna Young"><img src="images/users/user-9.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
        <li><a href="newsfeed-messages.html" title="Julia Cox"><img src="images/users/user-10.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
      </ul>
    </div> --><!--chat block ends-->
  </div> 