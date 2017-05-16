<?php

	/**
	 * A simple function that return url for image name. You MUST give file extension. 
	 * Usage Exemple : echo get_image_url('test.jpg'); 
	 * @param [imageName]
	 * @return [string] localhost/egghome/public/img/test.jpg
	 */

	function get_image_url($image_name) { 
		return URL.'public/img/'.$image_name;
	}

?>