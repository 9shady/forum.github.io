 <?php
 
  if (!$_GET['topic_id']) {
      header("Location: topiclist.php");
      exit;
   }
   
 
   $conn = mysqli_connect("localhost", "root","", "database");
  
     
 
  $verify_topic = "SELECT topic_title from forum_topics where topic_id = $_GET[topic_id]";
  $verify_topic_res = mysqli_query($conn,$verify_topic);
 
  if (mysqli_num_rows($verify_topic_res) < 1) {
      //this topic does not exist
     $display_block = "<P><em>You have selected an invalid topic.
      Please <a href='topiclist.php'>try again</a>.</em></p>";
  } else {
      $topic_title = stripslashes(mysqli_num_rows($verify_topic_res));
  
 
     $get_posts = "SELECT * from forum_posts where topic_id = $_GET[topic_id]
          order by post_create_time asc";
  
     $get_posts_res = mysqli_query($conn,$get_posts);
  
 
     $display_block = "
     <P>Showing posts for the <strong>$topic_title</strong> topic:</p>
  
     <table width=100% cellpadding=3 cellspacing=1 border=1>
     <tr>
     <th>AUTHOR</th>
     <th>POST</th>
 
    </tr>";
 
 
 
    while ($posts_info = mysqli_fetch_assoc($get_posts_res)) {
         $post_id = $posts_info['post_id'];
         $post_text = nl2br(stripslashes($posts_info['post_text']));
         $post_create_time = $posts_info['post_create_time'];
         $post_owner = stripslashes($posts_info['post_owner']);
         //add to display
         $display_block .= "
         <tr>
        <td width=35% valign=top>$post_owner<br>[$post_create_time]<br><a href= 'showreply.php?post_id=$post_id'>ALL REPLIES</a></td>
        <td width=65% valign=top>$post_text<br><br>
          <a href='replytopost.php?post_id=$post_id'><strong>REPLY TO
          POST</strong></a></td>
           
         </tr>";
    }
  
      $display_block .= "</table>";
  }
  ?>
  <html>
  <head>
  <title>Posts in Topic</title>
  </head>
  <body>
  <h1>Posts in Topic</h1>
  <?php print $display_block;
   echo "<a href='topiclist.php'>BACK TO TOPIC LIST</a>";
   ?>
  </body>
  </html>