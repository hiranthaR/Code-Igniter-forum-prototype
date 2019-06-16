<?php

/**
 * Created by IntelliJ IDEA.
 * User: hiruu
 * Date: 6/14/19
 * Time: 7:23 PM
 */
class Pages extends CI_Controller
{

	public function views($page = 'login', $data = null)
	{

		if (!file_exists(APPPATH . 'views/pages/' . $page . ".php")) {
			show_404();
		}

		$this->load->view('templates/header');
		$this->load->view('pages/' . $page, $data);
		$this->load->view('templates/footer');
	}

}
