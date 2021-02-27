<?php
	# YOUR CODE GOES HERE
	# Look at the results of executing ...
	# http://axiom.utm.utoronto.ca/~csc309/guessGameAjax/guess.php?guess=sdufhdsuf
	# http://axiom.utm.utoronto.ca/~csc309/guessGameAjax/guess.php?guess=26
	# http://axiom.utm.utoronto.ca/~csc309/guessGameAjax/guess.php?guess=3

    session_start(); 
    session_save_path("sess");

	$reply = array();

    if(!isset($_SESSION['secret_number'])){
        $reply['status']='error: no secret number. Execute newGame.php first.';
        goto leave;
    }

	if(!isset($_REQUEST['message']) || $_REQUEST['message'] == ""){ 
        $reply['status']='error: guess parameter not supplied'; 
        goto leave;
    } 
	if(!in_array($_REQUEST['message'],array('1','2','3','4','5','6','7','8','9','10'))){
        $reply['status']='error: guess must be between 1 and 10, inclusive.';
        goto leave;
    } 

    $guess=intval($_REQUEST['message']);
    $secret_number = $_SESSION['secret_number'];
    $comparison="";
    $msg="";
    if($guess<$secret_number){
        $comparison="<";
    } else if($guess>$secret_number){
        $comparison=">";
    } else {
        $comparison="=";
    }

    $_SESSION['history'][]=array("guess" => $guess, "comparison" => $comparison);

    $reply['status']='ok';
	$reply['messages'] = $_REQUEST['message'];
    $reply['comparison'] = $comparison;
    $reply['hint'] = $secret_number;
    goto leave;

    leave:
        print json_encode($reply);
?>
