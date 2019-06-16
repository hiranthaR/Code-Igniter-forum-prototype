<?php

class Auth extends CI_Controller
{

	public function login()
	{
		if (session_status() == PHP_SESSION_NONE) session_start();
		$data = $this->input->post();
		require_once('Pages.php');
		$PagesController = new Pages();
		$PagesController->views('home',$data);
	}

}
