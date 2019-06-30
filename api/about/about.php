<?php

class About
{
	public function __construct() 
	{
		// echo 'this is from about';
	}
	public function index($vars=null)
	{
		//phpinfo();
	    echo "このサイトに関するページです。\n";
	}
	public function edit($vars=null)
	{
		echo "edit\n";
	}
}
