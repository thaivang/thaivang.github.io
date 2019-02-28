<?php
if(!isset($_POST['submit']))//isset is a function
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$subject = $_POST['subject']
$message = $_POST['message'];

//Validate first
if(empty($name)||empty($visitor_email)||empty($email_subject)||empty($message)) 
{
    echo "Fields can't be empty!";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

// $email_from = 'thaivangxd@gmail.com';//<== update the email address
// $email_subject = "New Form submission";
// $email_body = "You have received a new message from the user $name.\n".
//     "Here is the message:\n $message".
    
$mailto = "thaivangxd@gmail.com";//<== update the email address
$headers = "From: $email_from \r\n";
$txt = "New mail from Portfolio site".%name."./n/n".$message;
mail($mailto,$subject,$txt, $headers);
header("Location: index.php?mailsend");//email comfirmation


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 