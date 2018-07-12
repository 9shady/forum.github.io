  <?php
   if ((!$_POST['topic_owner']) || (!$_POST['topic_title'])
      || (!$_POST['post_text'])) {
      header("Location: addtopic.html?emptyslot");
       exit;
   }
   
   //connect to server and select database
  $conn = mysqli_connect("localhost", "root","", "database");
  
  
  //create and issue the first query
  $add_topic = "INSERT INTO forum_topics (topic_title,topic_create_time,topic_owner) VALUES ('$_POST[topic_title]','now()', '$_POST[topic_owner]');";
  mysqli_query($conn,$add_topic);
  
  //get the id of the last query 
  $topic_id = mysqli_insert_id($conn);
  
  //create and issue the second query
  $add_post = "INSERT INTO forum_posts(topic_id,post_text,post_create_time,post_owner) VALUES ( '$topic_id',
      '$_POST[post_text]', 'date(Y-m-d H:i:s)', '$_POST[topic_owner]');";
  mysqli_query($conn,$add_post) ;
  
  ?>
  <html>
  <head>
  <title>New Topic Added</title>
  </head>
  <body>
  <h1>New Topic Added</h1>
  <?php
         echo  "<P>The <strong>$_POST[topic_title]</strong> topic has been added.</p>"  ;
         header("Location: topiclist.php"); 
  ?>
  </body>
  </html>