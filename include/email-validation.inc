<?php
// using Manuel Lemos's email validation class

/*
 * email_validation.php
 *
 * @(#) $Header$
 *
 */

class email_validation_class
{
 var $email_regular_expression="^([-!#\$%&'*+./0-9=?A-Z^_`a-z{|}~ ])+@([-!#\$%&'*+/0-9=?A-Z^_`a-z{|}~ ]+\\.)+[a-zA-Z]{2,4}\$";
 var $timeout=0;
 var $localhost="";
 var $localuser="";
 var $debug=0;

 Function OutputDebug($message)
 {
  echo $message,"\n";
 }

 Function GetLine($connection)
 {
  for($line="";;)
  {
   if(feof($connection))
    return(0);
   $line.=fgets($connection,100);
   $length=strlen($line);
   if($length>=2
   && substr($line,$length-2,2)=="\r\n")
   {
    $line=substr($line,0,$length-2);
    if($this->debug)
     $this->OutputDebug("< $line");
    return($line);
   }
  }
 }

 Function PutLine($connection,$line)
 {
  if($this->debug)
   $this->OutputDebug("> $line");
  return(fputs($connection,"$line\r\n"));
 }

 Function ValidateEmailAddress($email)
 {
  return(eregi($this->email_regular_expression,$email)!=0);
 }

 Function ValidateEmailHost($email,$hosts=0)
 {
  if(!$this->ValidateEmailAddress($email))
   return(0);
  $user=strtok($email,"@");
  $domain=strtok("");
  if(GetMXRR($domain,&$hosts,&$weights))
  {
   $mxhosts=array();
   for($host=0;$host<count($hosts);$host++)
    $mxhosts[$weights[$host]]=$hosts[$host];
   KSort($mxhosts);
   for(Reset($mxhosts),$host=0;$host<count($mxhosts);Next($mxhosts),$host++)
    $hosts[$host]=$mxhosts[Key($mxhosts)];
  }
  else
  {
   $hosts=array();
   if(strcmp(@gethostbyname($domain),$domain)!=0)
    $hosts[]=$domain;
  }
  return(count($hosts)!=0);
 }

 Function VerifyResultLines($connection,$code)
 {
  while(($line=$this->GetLine($connection)))
  {
   if(!strcmp(strtok($line," "),$code))
    return(1);
   if(strcmp(strtok($line,"-"),$code))
    return(0);
  }
  return(-1);
 }

 Function ValidateEmailBox($email)
 {
  if(!$this->ValidateEmailHost($email,&$hosts))
   return(0);
  if(!strcmp($localhost=$this->localhost,"")
  && !strcmp($localhost=getenv("SERVER_NAME"),"")
  && !strcmp($localhost=getenv("HOST"),""))
     $localhost="localhost";
  if(!strcmp($localuser=$this->localuser,"")
  && !strcmp($localuser=getenv("USERNAME"),"")
  && !strcmp($localuser=getenv("USER"),""))
     $localuser="root";
  for($host=0;$host<count($hosts);$host++)
  {
   if($this->debug)
    $this->OutputDebug("Connecting to host \"".$hosts[$host]."\"...");
   if(($connection=($this->timeout ? fsockopen($hosts[$host],25,&$errno,&$error,$this->timeout) : fsockopen($hosts[$host],25))))
   {
    if($this->debug)
     $this->OutputDebug("Connected.");
    if($this->VerifyResultLines($connection,"220")>0
    && $this->PutLine($connection,"HELO $localhost")
    && $this->VerifyResultLines($connection,"250")>0
    && $this->PutLine($connection,"MAIL FROM: <$localuser@$localhost>")
    && $this->VerifyResultLines($connection,"250")>0
    && $this->PutLine($connection,"RCPT TO: <$email>")
    && ($result=$this->VerifyResultLines($connection,"250"))>=0)
    {
     if($this->debug)
      $this->OutputDebug("This host states that the address is ".($result ? "" : "not ")."valid.");
     fclose($connection);
     if($this->debug)
      $this->OutputDebug("Disconnected.");
     return($result);
    } else { // Jesus M. Castagnetto
     if($this->debug)
      $this->OutputDebug("Unable to validate the address with this host.");
     fclose($connection);
     if($this->debug)
      $this->OutputDebug("Disconnected.");
     return false;
    }
   }
   else
   {
    if($this->debug)
     $this->OutputDebug("Failed.");
    return false; // JMC
   }
   
  }
  return(-1);
 }
};


// checks that is an *outside* host, and removes the
// SPAM protection, before passing the address to the validation class

function clean_AntiSPAM ($email) {
    $remove_spam = "[-_]?(NO|I[-_]?HATE|DELETE|REMOVE)[-_]?(THIS)?(ME|SPAM)?[-_]?";
    return eregi_replace($remove_spam,"",trim($email));
}


function is_emailable_address( $email, $debug=0 ) {
    $hosts_regex="lists\.php\.net|chek.*\.com";
    $excluded_hosts = ereg($hosts_regex,$email);
    if (!$excluded_hosts && $email != "") {
        $validator = new email_validation_class;
        $validator->timeout=10;
        $validator->debug=$debug;
        return $validator->ValidateEmailBox($email);
    } else {
        return false;
    }
}

// test of the validation function
// remove this part once all changes seem to work
/*
$test_add = array (
    "wrong-email-address@lists.php.net","jcastagnetto@yahoo.com", 
    "some-wrong@asdas.com", "jcastagnetto-NO-SPAM@yahoo.com", 
    "jcastagnetto@NoSpam-yahoo.com", "jmcastagnetto@chek2.com", 
    "jcastagnetto-i-hate-spam@NOSPAMyahoo.com", 
    "asasasd324324@php.net", "jcastagnetto-delete-this-@yahoo.com",
    "wrong-address-with@@@@-remove_me-and-some-i-hate_SPAM-stuff");

while (list(,$v) = each($test_add)) {
    echo "The address: $v (".clean_AntiSpam($v).") is";
    if (!is_emailable_address(clean_AntiSPAM($v)))
        echo " not";
    echo " valid\n";
}
*/
?>
