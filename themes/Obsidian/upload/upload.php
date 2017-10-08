<?php
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp'); // valid extensions
$path = '';
if(!isset($_SESSION)){
		session_name("opengamepanel_web");
		session_start();
	}
	foreach($valid_extensions as $ext) {
		if(file_exists($_SESSION['user_id'].".".$ext)){
unlink($_SESSION['user_id'].".".$ext);
		}
	}
if(isset($_FILES['image']))
{
	//echo "test";
 $tmp = $_FILES['image']['tmp_name'];

 // get uploaded file's extension
 $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

 // can upload same image using rand function
 $final_image = $_SESSION['user_id'].".".$ext;

 // check's valid format
 if(in_array($ext, $valid_extensions)) 
 {     
  $path = $path.strtolower($final_image); 

  if(move_uploaded_file($tmp,$path)) 
  {
   echo "<img id='avatar'  src='themes/Obsidian/upload/".$path."?".time()."' />";
  }
 } 
 else 
 {
  echo '<img id="avatar" src="themes/Obsidian/images/error.png">';
 }
}

?>