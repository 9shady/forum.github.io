 <?php
//connect to server and select database; we'll need it soon
 $conn = mysqli_connect("localhost", "root","", "database");
      
$post_id = $_GET['post_id'];
   
   //check to see if we're showing the form or adding the
        print "
         <html>
         <head>
        <title>Post Your Reply</title>
         </head>
       <body>
         <h1>Post Your Reply</h1>
         
         <form method = POST action = 'reply.php'>

       <p><strong>Your E-Mail Address:</strong><br>
       <input type='text' name = 'post_owner' size=40 maxlength=150>
 
         <P><strong>Post Text:</strong><br>
        <textarea name ='post_text' rows=8 cols=40 wrap=virtual></textarea>

        
 
         <P><input type='submit' name = 'submit' value='Add Post'></p>

        </form>
       </body>
       </html>";
     
    
                 





     
   
  