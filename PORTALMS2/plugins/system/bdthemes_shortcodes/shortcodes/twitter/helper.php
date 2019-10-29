<?php
	/**
	* @package		BDT Twitter Widget
	* @copyright	Web Design Services. All rights reserved. All rights reserved.
	* @license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
	*/

	// no direct access
	defined('_JEXEC') or die;

	require_once dirname(__FILE__).'/lib/twitteroauth/twitteroauth.php';
	require_once dirname(__FILE__).'/lib/twitter-text/Autolink.php';

 if(!class_exists('Su_Shortcode_twitter_Helper',false)) {
	class Su_Shortcode_twitter_Helper {
		private $data;
		private $cacheFile;

		public function __construct() {
			$this->cacheFile = dirname(__FILE__) . '/cache';
		}

		public function getData($atts) {
			$twitterConnection = new TwitterOAuth(
				trim($atts['consumer_key']), // Consumer Key
				trim($atts['consumer_secret']), // Consumer secret
				trim($atts['access_token']), // Access token
				trim($atts['access_secret'])	// Access token secret
			);

			if($atts['source'] === 'user') {
				$twitterData = $twitterConnection->get(
					'statuses/user_timeline',
					array(
						'screen_name' => trim($atts['twitter_id']),
						'count'       => trim($atts['limit'])
					)
				);
			}
			elseif ($atts['source'] === 'search') {
				$twitterData = $twitterConnection->get(
					'search/tweets',
					array(
						'q'     => trim($atts['search']),
						'count' => trim($atts['limit'])
					)
				);
				if(!isset($twitterData->errors))
					$twitterData = $twitterData->statuses;
			}

			// if there are no errors
			if(!isset($twitterData->errors)) {
				$tweets = array();
				if (is_array($twitterData)) {
					foreach($twitterData as $tweet) {
						$tweetDetails               = new stdClass();
						$tweetDetails->text         = Twitter_Autolink::create($tweet->text)->setNoFollow(false)->addLinks();
						$tweetDetails->time         = $this->getTime($tweet->created_at);
						$tweetDetails->id           = $tweet->id_str;
						$tweetDetails->screenName   = $tweet->user->screen_name;
						$tweetDetails->displayName  = $tweet->user->name;
						$tweetDetails->profileImage = $tweet->user->profile_image_url_https;
						$tweets[]                   = $tweetDetails;
					}
				}
				$data = new stdClass();
				$data->tweets = $tweets;

				$this->data = $data;
				return $data;
			}
			else {
				return ;
			}
		}	

		// parse time in a twitter style
		private function getTime($date) {
			//get current timestampt
		    $b = strtotime("now"); 
		    //get timestamp when tweet created
		    $c = strtotime($date);
		    //get difference
		    $d = $b - $c;
		    //calculate different time values
			$minute = 60;
			$hour   = $minute * 60;
			$day    = $hour * 24;
			$week   = $day * 7;
	        
	    	if(is_numeric($d) && $d > 0) {
		        //if less then 3 seconds
		        if($d < 3) return "right now";
		        //if less then minute
		        if($d < $minute) return floor($d) . " seconds ago";
		        //if less then 2 minutes
		        if($d < $minute * 2) return "about 1 minute ago";
		        //if less then hour
		        if($d < $hour) return floor($d / $minute) . " minutes ago";
		        //if less then 2 hours
		        if($d < $hour * 2) return "about 1 hour ago";
		        //if less then day
		        if($d < $day) return floor($d / $hour) . " hours ago";
		        //if more then day, but less then 2 days
		        if($d > $day && $d < $day * 2) return "yesterday";
		        //if less then year
		        if($d < $day * 365) return floor($d / $day) . " days ago";
		        //else return more than a year
		        return "over a year ago";
	    	}
		}
	}
}