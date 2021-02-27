<?php
	# Look at the result of executing...
	# http://axiom.utm.utoronto.ca/~csc309/guessGameAjax/getHistory.php
	#
	# YOUR CODE GOES HERE
    session_start(); 
    session_save_path("sess");

    if(isset($_SESSION['history'])){
        $reply=array();    
        $reply['history']=$_SESSION['history'];
        $reply['status']='ok';
    } else {  
        $reply['status']="error: no history. Execute newGame.php first.";
    }

    header('Content-Type: application/json');
    print json_encode($reply);
?>
