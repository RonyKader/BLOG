<?php 
	/**
	* Formate Class
	*/
	class Formate
	{
		public function formateDate( $date )
		{
			return date( 'F j, Y, g:i A', strtotime( $date ));
		}

		public function shortText( $text, $limit = 200 )
		{
			$text = $text." ";
			$text = substr( $text, 0, $limit );
			$text = $text . " .....";
			return $text;
		}

		public function inputValidation( $data )
		{
			$data = trim( $data );
			$data = htmlspecialchars( $data );
			$data = stripslashes( $data );
				return $data; 
		}
	}

 ?>