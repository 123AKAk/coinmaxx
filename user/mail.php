        <?php 
        // email here
        //include_once 'confirm-mail.html';
        $name = "CoinMaxx";
        $to = "favourakak@gmail.com";  
        $subject = "Welcome to CoinMaxx";  
        $message = "Hello! This is a simple email message.";  
        $from = "info@coinmaxx.online";  
        $headers = "From: $from"; 
        
        //$text = Template::get_contents("confirm-mail.html", array('name' => $name, 'email' => $from, 'subject' => $subject, 'messages' => $message));
        $text  = "mhjuihbbjjjkjkj";
        echo '<pre>';
        echo $text;
        echo '<pre>';
        
        $mail = @mail($to, $subject, $text, $headers); 
        if($mail) {
          echo "<p>Mail Sent.</p>"; 
        }
        else {
          echo "<p>Mail Fault.</p>"; 
        }
        // email end here
        
        ?>  