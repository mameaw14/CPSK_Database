<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('get_fb_data'))
{
  function get_fb_data()
  	{
        $ci=& get_instance();
        $ci->load->helper('cookie'); 
		$signed_request = get_cookie('fbsr_278732322505601');
		if($signed_request)
			return _parse_signed_request($signed_request);
		return null;
	}	
}
if (!function_exists('_parse_signed_request'))
{
	function _parse_signed_request($signed_request) {
		list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

		$secret = "2275079bb9891d9ce0000a51454df124"; // Use your app secret here

		// decode the data
		$sig = base64_url_decode($encoded_sig);
		$data = json_decode(base64_url_decode($payload), true);

		// confirm the signature
		$expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
		if ($sig !== $expected_sig) {
			error_log('Bad Signed JSON signature!');
			return null;
		}

		return $data;
	}
}

if (!function_exists('base64_url_decode'))
{
	function base64_url_decode($input) {
		return base64_decode(strtr($input, '-_', '+/'));
	}
}

if (!function_exists('get_user_id'))
{
	function get_user_id(){
		$data = get_fb_data();
		if($data) return $data['user_id'];
		return null;
	}
}

if (!function_exists('is_logged_in'))
{
	function is_logged_in(){
		$ci=& get_instance();
	    $ci->load->helper('cookie'); 
		$cookie = get_cookie('fbsr_278732322505601');
		if($cookie)
			return TRUE;
		return FALSE;
	}
}

if (!function_exists('get_user_std'))
{
	function get_user_std(){
		$ci=& get_instance();
	    $ci->load->model('student_model');
	    $std_id = $ci->student_model->get_fromfbid(get_user_id(),'student_id');

		return $std_id;
	}
}