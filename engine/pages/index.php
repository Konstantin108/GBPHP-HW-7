<?php

function indexAction()
{
	return render(
	    'home',
	    [
	        'title' => 'Home',
	    ]
	);
}