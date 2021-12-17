<?php

function is_logged_in()
{
	$ci = get_instance();
	if (!$ci->session->userdata('username')) {
		redirect('index.php/kpbpjs'); //helper tidak mengenal $this
	} else 
	{
		$role_id = $ci->session->userdata('role_id');
		$menu = $ci->uri->segment(1); 
		http://example.com/index.php/news/local/metro/crime_is_up
		/*The segment numbers would be this:

		news
		local
		metro
		crime_is_up*/

	}
}


