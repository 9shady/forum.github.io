
<?php
$conn = mysqli_connect("localhost", "root","", "database");


$post_id=$_GET['post_id'];

    $sql1="SELECT post_owner , post_text from forum_posts WHERE post_id = '$post_id' ;";
    $result1= mysqli_query($conn , $sql1);
    $row=mysqli_fetch_assoc($result1);
    $s=$row['post_owner'];

    $q=$row['post_text'];
     $display_block = "
    
  
     <table width=100% cellpadding=3 cellspacing=1 border=1>
     <tr>
     <th>AUTHOR</th>
     <th>POST</th>
 
    </tr>
    <tr>
        <td width=35% valign=top>$s<br></td>
        <td width=65% valign=top>$q<br>
        </td>
           
         </tr>";
    
 
?>
  
       
  <html>
  <head>
  <title>REPLIES TO POSTS</title>
  </head>
  <body>
  <h1>Replies to Posts</h1>
  <?php 
   echo $display_block;
  $sql = "SELECT post_owner1 , post_text1 FROM forum_reply;";

    $result = mysqli_query($conn,$sql);

 


   while($reply_info=mysqli_fetch_assoc($result))
   { 
   	  $post_owner1 = $reply_info['post_owner1'];
        $post_text1 = $reply_info['post_text1'];   
   echo "<tr>
        <td width=35% valign=top>$post_owner1<br></td>
        <td width=65% valign=top>$post_text1<br><br>
         </tr>"; 
   } 

   echo "<a href='topiclist.php'>BACK TO TOPIC LIST</a>";
    ?>
  </body>
  </html>

