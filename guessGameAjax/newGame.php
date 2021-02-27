<?php
	session_start(); 
	session_save_path("sess");
	header('Content-Type: application/json');

	# YOUR CODE GOES HERE
	# Look at the results of executing...
	# http://axiom.utm.utoronto.ca/~csc309/guessGameAjax/newGame.php

	# HINT: Create a new secret number and initialize the history

	$_SESSION['secret_number']=rand(1,10);
    $_SESSION['history']=array();

    $reply=array();
    $reply['status']='ok';

	print json_encode($reply);
?>
