<?php 

	class Youtube {

		private $videoId = null;

		public function __construct($videoId) {
			if(!empty($videoId)) {
				$this->videoId = $videoId;
			}
			else {
				echo 'Wrong video id';
				die;
			}
		}

		public function render() {
			
			$html = '<iframe width="420" height="315" ';
			$html .= 'src="http://www.youtube.com/embed/'.$this->videoId.'">';
			$html .= '</iframe>';

			return $html;
		}
	}

	$video = new Youtube('');
	echo $video->render();

?>