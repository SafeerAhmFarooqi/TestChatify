@include('layouts.templatefrontend.header');
 
<!--Header End-->
<div class="container">
<!-- Timeline
================================================= -->
<div class="timeline">
<div class="timeline-cover">
<!--Timeline Menu for Large Screens-->
<div class="timeline-nav-bar hidden-sm hidden-xs">
<div class="row">
<div class="col-md-3">
<div class="profile-info">
<!-- <img src="images/users/user-1.jpg" alt="" class="img-responsive profile-photo"> -->
@if($user->profile_pic)
<img src="{{asset('storage/user_profile_pics/'.$user->profile_pic)}}" class="img-responsive profile-photo">
@else
<img src="{{asset('storage/user_profile_pics/photoicon.jpg')}}" class="img-responsive profile-photo">
@endif

<h3 style="font-weight: bold !important">{{Auth::user()->firstname}}</h3>
<p class="text-muted">{{Auth::user()->email}}</p>
</div>
</div>
<div class="col-md-9">
<ul class="list-inline profile-menu">
<li><a href="{{route('home')}}">Home</a></li>
<li><a href="{{route('profile.index')}}">Basic Inforamtion</a></li>
<li><a href="{{route('profile.edit',Auth::user()->id)}}">Profile Image</a></li>
<!--<li><a href="timeline-album.html">Album</a></li>
<li><a href="timeline-friends.html">Friends</a></li> -->
</ul>
<ul class="follow-me list-inline">
<!-- <li>1,299 people following her</li>
<li><button class="btn-primary">Add Friend</button></li> -->
</ul>
</div>
</div>
</div><!--Timeline Menu for Large Screens End-->
<!--Timeline Menu for Small Screens-->
<div class="navbar-mobile hidden-lg hidden-md">
<div class="profile-info">
<img src="images/users/user-1.jpg" alt="" class="img-responsive profile-photo">
<h4>Sarah Cruiz</h4>
<p class="text-muted">Creative Director</p>
</div>
<div class="mobile-menu">
<ul class="list-inline">
<li><a href="timline.html">Timeline</a></li>
<li><a href="timeline-about.html" class="active">About</a></li>
<li><a href="timeline-album.html">Album</a></li>
<li><a href="timeline-friends.html">Friends</a></li>
</ul>
<button class="btn-primary">Add Friend</button>
</div>
</div><!--Timeline Menu for Small Screens End-->
</div>
<div id="page-contents" style="position: relative;">
<div class="row">
<div class="col-md-3">
<!--Edit Profile Menu-->
<ul class="edit-menu">
<!-- <li><i class="icon ion-ios-information-outline"></i><a href="edit-profile-basic.html">Basic Information</a></li> -->
<li><i class="icon ion-ios-briefcase-outline"></i><a href="{{route('profile.index')}}">Basic Information</a></li>
<li class="active"><i class="icon ion-ios-heart-outline"></i><a href="{{route('profile.edit',Auth::user()->id)}}">Profile Image</a></li>
<li><i class="icon ion-ios-locked-outline"></i><a href="{{route('profile.show',Auth::user()->id)}}">Privacy</a></li>
<!-- <li><i class="icon ion-ios-settings"></i><a href="edit-profile-settings.html">Account Settings</a></li>
<li><i class="icon ion-ios-locked-outline"></i><a href="edit-profile-password.html">Change Password</a></li> -->
</ul>
</div>
<div class="col-md-7">
<!-- Edit Work and Education
================================================= -->
<div class="edit-profile-container">
<div class="block-title">
<h4 class="grey"><i class="icon ion-ios-book-outline"></i>Edit Profile Image</h4>
<div class="line"></div>
<!-- <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p> -->
<!-- <div class="line"></div> -->
</div>
<div class="edit-block">

@if($user->profile_pic)	
<img src="{{asset('storage/user_profile_pics/'.$user->profile_pic)}}" class="img-responsive">
@else
<img src="{{asset('storage/user_profile_pics/photoicon.jpg')}}" style="width: 40%; height: 40%;" class="img-responsive">
@endif

 <form method="POST" action="{{route('edit_p_pic',$user->id)}}" class="form-sample" enctype="multipart/form-data">

	@csrf
	@method('PUT')

<div class="row">
	<div class="form-group col-xs-6">
		<label for="date-from"></label>
		<input id="date-from" class="form-control input-group-lg" type="file" name="profile_pic">
	</div>
</div>

<div class="row">
	<div class="form-group col-xs-6">
		<input type="submit" name="update" class="btn btn-primary" value="Update">
	</div>
</div>





</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Footer
================================================= -->
<footer id="footer">
<div class="container">
<div class="row">
<div class="footer-wrapper">
<div class="col-md-3 col-sm-3">
<a href="#"><img src="images/logo-black.png" alt="" class="footer-logo" /></a>
<ul class="list-inline social-icons">
<li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
<li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
<li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
<li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
<li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
</ul>
</div>
<div class="col-md-2 col-sm-2">
<h5>For individuals</h5>
<ul class="footer-links">
<li><a href="#">Signup</a></li>
<li><a href="#">login</a></li>
<li><a href="#">Explore</a></li>
<li><a href="#">Finder app</a></li>
<li><a href="#">Features</a></li>
<li><a href="#">Language settings</a></li>
</ul>
</div>
<div class="col-md-2 col-sm-2">
<h5>For businesses</h5>
<ul class="footer-links">
<li><a href="#">Business signup</a></li>
<li><a href="#">Business login</a></li>
<li><a href="#">Benefits</a></li>
<li><a href="#">Resources</a></li>
<li><a href="#">Advertise</a></li>
<li><a href="#">Setup</a></li>
</ul>
</div>
<div class="col-md-2 col-sm-2">
<h5>About</h5>
<ul class="footer-links">
<li><a href="#">About us</a></li>
<li><a href="#">Contact us</a></li>
<li><a href="#">Privacy Policy</a></li>
<li><a href="#">Terms</a></li>
<li><a href="#">Help</a></li>
</ul>
</div>
<div class="col-md-3 col-sm-3">
<h5>Contact Us</h5>
<ul class="contact">
<li><i class="icon ion-ios-telephone-outline"></i>+1 (234) 222 0754</li>
<li><i class="icon ion-ios-email-outline"></i>info@thunder-team.com</li>
<li><i class="icon ion-ios-location-outline"></i>228 Park Ave S NY, USA</li>
</ul>
</div>
</div>
</div>
</div>
<div class="copyright">
<p>Thunder Team © 2016. All rights reserved</p>
</div>
</footer>
<!--preloader-->
<div id="spinner-wrapper">
<div class="spinner"></div>
</div>
<!-- Scripts
================================================= -->
 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&amp;callback=initMap"></script>
    <script src="{{asset('user_frontend/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('user_frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('user_frontend/js/jquery.sticky-kit.min.js')}}"></script>
    <script src="{{asset('user_frontend/js/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('user_frontend/js/script.js')}}"></script>
<script>
function newsfeedsectionLoad(){
$.ajax({
type: 'post',
url: "newsfeedsection.php",
success: function(data) {
$("#newsfeed").html(data); // or ondiv, didn't get it
}
});
}
$(document).ready(function(){
setInterval(function(){
newsfeedsectionLoad();
}, 30000);
});
$(document).on("click",".post-like", async function() {
var postId = $(this).attr("data-id");
var response = await AsyncAjaxRequest("postgroup.php", {action: "like", postId: postId});
$(this).toggleClass("post-dislike post-like");
$(".ion-thumbsup").toggleClass("text-grey text-blue");
reloadGroup();
});
$(document).on("click",".post-dislike", async function() {
var postId = $(this).attr("data-id");
var response = await AsyncAjaxRequest("postgroup.php", {action: "dislike", postId: postId});
$(this).toggleClass("post-dislike post-like");
$(".ion-thumbsup").toggleClass("text-grey text-blue");
reloadGroup();
});
</script>
<!-- comments -->
<script>
$(document).ready(function(){
$("form#myform").submit(function(event) {
event.preventDefault();
$("#spinner-wrapper").show().delay( 90000 ).hide();
var comment = $("#comment").val();
var postid = $("#postid").val();
var username = $("#username").val();
// var newmsg = $("#newmsg").val();
if(comment==''){
alert('Write something before comment');
};
$.ajax({
type: "POST",
url: "comment.php",
data: "comment=" + comment + "&postid=" + postid+ "&username=" + username,
//success: function(){alert('success');}
});
newsfeedsectionLoad();
$('input[type="text"],textarea').val('');
});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
//Uplaod Image
$(document).on("submit", "#submit_form", function(e){
e.preventDefault();
$("#spinner-wrapper").show().delay( 90000 ).hide();
var formData = new FormData(this);
$.ajax({
url : "post.php",
type : "POST",
data : formData,
contentType : false,
processData: false,
success: function(data){
if(data == "0")
alert('unable to post');
newsfeedsectionLoad();
}
});
});
//Delete Image
$(document).on("click","#delete_btn", function(){
if(confirm("Are you sure you want to remove this image?")){
var path = $("#delete_btn").data("path");
$.ajax({
url:'deletepost.php',
type : "POST",
data : {path : path},
success: function(data){
if(data != ""){
$("#preview").hide();
$("#image_preview").html('');
}
}
});
}
});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
//Uplaod Image
$("#submit_formgroup").on("submit", function(e){
e.preventDefault();
$("#spinner-wrapper").show().delay( 90000 ).hide();
var formData = new FormData(this);
$.ajax({
url : "postgroup.php",
type : "POST",
data : formData,
contentType : false,
processData: false,
success: function(data){
// document.getElementById("#posttext").reset();
// $("#table").load(location.href+" #table","");
// $("#blah").hide();
// $("#preview").show();
// $("#image_preview").html(data);
// $("#upload_file").val('');
}
});
});
});
async function AsyncAjaxRequest(sURL, objData = {}, contentType = 'application/x-www-form-urlencoded; charset=UTF-8', processData = true) {
var response = await $.ajax({
url: sURL,
type: "POST",
data: objData,
contentType: contentType,
processData: processData,
success: function(res) {
response = res
},
error: function(err) {
console.log(err);
}
});
return(response);
}
</script>
</body>
</html>