<?php 
/**
* Session Class
*/
class Session
{
	
	public static function init()
	{
		session_start();
		ob_start();
	}	

	public static function SessionSet( $key, $val )
	{
		$_SESSION[$key] = $val;
	}

	public static function SessionGet( $key )
	{
		if ( isset( $_SESSION[$key])) 
		{
			return $_SESSION[$key];
		}
	}

	public static function CheckSession()
	{
		self::init();
		if ( self::SessionGet("login") == false ) {
			self::DestroySession();
			header( "Location: login.php" );
		}

	}

	public static function DestroySession()
	{
		session_destroy();
		header( "Location: login.php" );
	}

}

 ?>