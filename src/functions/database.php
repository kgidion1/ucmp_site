<?php
require_once('config.php');
 class MysqlDatabase{ 

  private $conn;
  private $mysql_real_escape_string_exists;
  private $magic_quotes_active;
  function __construct(){
   $this->open_connection();
   $this->magic_quotes_ative = get_magic_quotes_gpc();
   $this->mysql_real_escape_string_exists = function_exists('mysql_real_escape_string');
  }
  
  public function open_connection(){
   $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
   if(!$this->conn){
   die("Database connection failed: ".mysqli_error($this->conn)); }
//   } else{
//     $db_select = mysqli_select_db($this->conn,DB_NAME);
//	 if(!$db_select){
//     die("Database selection failed: ".mysqli_error($this->conn));
//    }
//   }
  }
  
  public function close_connection(){
   if(isset($this->conn)){
    mysqli_close($this->conn);
    unset($this->conn);
   }
  }
  
  public function query($sql){
   $result = mysqli_query($this->conn, $sql);
   $this->confirm_query($result);
   return $result;
  }
  
   public function escape_value($value){    
	if($this->mysql_real_escape_string_exists){
	  if($this->magic_quotes_active){$value = stripslashes($value);}
	  $value = mysqli_real_escape_string($this->conn,$value);
	}
	else{
	  if(!$this->magic_quotes_active){
	   $value = addslashes($value);
	  }
	}
    return $value;
	}
	
  
   public function fetch_array($result_set){   
    return mysqli_fetch_array($result_set);
	}
	
   public function num_rows($result_set){
   return mysqli_num_rows($result_set);
  }

  public function fetch_row($result_set){
    return mysqli_fetch_row($result_set);
  }
  
  private function confirm_query($result){
   if(!$result){
   die("Datase query failed ". mysqli_error($this->conn));
   }
  }
    
public function getContacts(){
  return  $this->fetch_array($this->query("SELECT * FROM contacts"));
}

    

public function sendmail($to, $subject, $body){
$auto_contacts = $this->getContacts();
$from = $auto_contacts["email"];
    
require_once '../swiftmailer/swift_required.php';

// Create the mail transport configuration
$transport = Swift_MailTransport::newInstance();

// Create the message
$message = Swift_Message::newInstance();

///$cid = $message->embed(Swift_Image::fromPath('../../img/autologo.png'));

$htm = '<html><body style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif">';
$htm.= $body;
$htm.= '<br/><br/><br/><p>Best Regards, <br/>Administrator@AUTO</p>';
//$htm.= '<img style="width:150px" src="'.$cid.'"/>';
$htm.= '<p><b>The Association of Uganda Tour Operators</b></p>';
$htm.= '<p>'.$auto_contacts["address"].'<br/>P.O. Box '.$auto_contacts["pobox"].'a<br/>Telephone: '.$auto_contacts["phone"].'</p>';
$htm.= '<b></b>';

$htm.= '</body></html>';


$message->setTo($to);//array
$message->setSubject($subject);
$message->setBody($htm, "text/html");
$message->setFrom($from);

$message->attach(Swift_Attachment::fromPath("img/autologo.png")->setDisposition('inline'));
 //Send the email
$mailer = Swift_Mailer::newInstance($transport);
$mailer->send($message);

    return 1;
    
  die;
}
     
      
 }
 
 $database = new MysqlDatabase();
// echo $database->getContacts()["phone"];
 //echo $database->sendmail("", "","")
?>