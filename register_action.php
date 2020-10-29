<?php require_once 'dbconnect.php'; ?>
<?php require_once 'library.php'; ?>
<?php
    
    if(chkLogin()){
        header("Location: admin-home.php");
    }
?>
<?php
$collection = $manager->mydb->newusers;

   if(isset($_POST['reg'])){
       
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $temp  = $_POST['pass'];
        $options = array('cost' => 10);
        $pass = password_hash($temp, PASSWORD_BCRYPT, $options);
        $vdkey= md5(time());

        $arrays = array(
            
            "First Name"    => $fname,
            "Last Name"     => $lname,
            "Email Address" => $email,
            "Password"      => $pass,
            "Verification Key" => $vdkey,
            // "Verified Status" => "0"
        
        );
        
        $query = chkemail($email);
        if($query){
            register($arrays);
            $url = 'https://api.sendgrid.com/';
            $user = 'azure_0d2d394690009b4de41f31c498f29d65@azure.com';
            $pass = 'I8921d@j131!ds21';
           
            $params = array(
                 'api_user' => $user,
                 'api_key' => $pass,
                 'to' => $email,
                 'subject' => 'Testing-CONFIRM IT',
                 'html' => "<h1> https://saltapplication.azurewebsites.net//register.php?vkey=.$vdkey</h1>",
                 'text' => 'https://saltapplication.azurewebsites.net//register.php?vkey=.$vdkey.',
                 'from' => 'salt.application@gmail.com',
              );
           
            $request = $url.'api/mail.send.json';
           
            // Generate curl request
            $session = curl_init($request);
           
            // Tell curl to use HTTP POST
            curl_setopt ($session, CURLOPT_POST, true);
           
            // Tell curl that this is the body of the POST
            curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
           
            // Tell curl not to return headers, but do return the response
            curl_setopt($session, CURLOPT_HEADER, false);
            curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
           
            // obtain response
            $response = curl_exec($session);
            curl_close($session);
           
            // print everything out
            print_r($response);
            //  header("Location: login.php");


            
            }
       else{
        echo "Email already registered!";
           echo"<br>";
        echo "Please <a href='register.php'>Register</a> with another email ID";
       }
}

?>