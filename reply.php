<?php
 
  include_once "replytopost.php";

  mysqli_connect("localhost", "root","", "database");

  $sql = "INSERT INTO forum_reply(post_id,post_owner1,post_text1) VALUES('$post_id','$_POST[post_owner]','$_POST[post_text]');" ;  
       
        mysqli_query($conn,$sql);
        header("LOCATION: topiclist.php");