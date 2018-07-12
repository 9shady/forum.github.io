   <?php
   //connect to server and select database
   $conn = mysqli_connect("localhost", "root","", "database");
      
 
  
  //gather the topics
   $get_topics = "SELECT * from forum_topics order by topic_create_time desc";
  $get_topics_res = mysqli_query($conn,$get_topics);
 if (mysqli_num_rows($get_topics_res) < 1) {
   //there are no topics, so say so
    $display_block = "<P><em>No topics exist.</em></p>";
} else {
     //create the display string
    $display_block = "
    <table cellpadding=3 cellspacing=1 border=1>
     <tr>
    <th>TOPIC TITLE</th>
     <th># of POSTS</th>
    </tr>";
  
    while ($topic_info = mysqli_fetch_assoc($get_topics_res)) {
         $topic_id = $topic_info['topic_id'];
       $topic_title = stripslashes($topic_info['topic_title']);
        $topic_create_time = $topic_info['topic_create_time'];
         $topic_owner = stripslashes($topic_info['topic_owner']);

         //get number of posts
        $get_num_posts = "SELECT count(post_id) from forum_posts
              where topic_id = '$topic_id' ";
       $get_num_posts_res = mysqli_query($conn,$get_num_posts);
         $num_posts = mysqli_num_rows($get_num_posts_res);
  
         //add to display
      $display_block .= "
        <tr>
       <td> <a href ='showtopic.php?topic_id=$topic_id'> <strong>$topic_title</strong></a><br>
       Created on $topic_create_time by $topic_owner</td>
       <td align=center>$num_posts</td>
        </tr>";
    }

     //close up the table
    $display_block .= "</table>";
  }
?>
 <html>
<head>
  <title>Topics in My Forum</title>
</head>
 <body>
  <h1>Topics in My Forum</h1>
 <?php print $display_block; ?>
  <P>Would you like to <a href="addtopic.html">add a topic</a>?</p>
 </body>
 </html>