<?php

use app\models\Follow;
use app\models\UserProfile;

	// Getting logged in user

	$loggedInUser = Yii::$app->user->id;
	$baseUrl = Yii::$app->request->baseUrl;
	
	if(!empty($loggedInUser)) {
	
		// Getting followers
		
//		$followers = Follow::model()->findAllByAttributes(array('user_id_follower'=>$loggedInUser));

        $followers = Follow::find()
            ->where(['user_id_follower' => $loggedInUser])
            ->All();

		if(!empty($followers)) {
			
			if(sizeof($followers) > 0) {
			
			foreach($followers as $follower) {
			
				$followingUserId = $follower->user_id_following;
				
				if($followingUserId) {
					
//					$followerData = UserProfile::model()->findByAttributes(array('user_id'=>$followingUserId));
                    $followerData = UserProfile::find()
                        ->where(['user_id' => $followingUserId])
                        ->All();

					if($followerData) {
					
						echo "<div class='follower-div'>";
						
						foreach ($followerData as $key=>$value) {
						
							$followerId = $followerData->user_profile_id;
							
							if(!strcmp($key, "name")) {
								echo "<div class='follower-title'>";
									echo "<a href='".$baseUrl."/index.php/UserProfile/".$followerId."'>".$value."</a>";
								echo "</div>";
							}
							if(!strcmp($key, "profile_picture")) {
								echo "<div class='profile-picture-follower'>";
								echo "<img src='".$baseUrl."/profileImages/".$value."' alt='Smiley face'>";
								echo "</div>";
							}
							if(!strcmp($key, "age")) {
								echo "<div class='follower-age'>";
									echo "<span>".$value . "</span> Years";
								echo "</div>";
							}
							if(!strcmp($key, "work_address")) {
								echo "<div class='follower-work-address'>";
									echo "Works at <span>".$value."</span>";
								echo "</div>";
							}
							if(!strcmp($key, "qualification")) {
								echo "<div class='follower-qualification'>";
									echo "Did <span>".$value."</span>";
								echo "</div>";
							}
						}
						
						echo "</div>";
						
					}
				}
			}
			}
		}
		else {
			
			echo "<div class='no_followers'>";
				echo "Looks like you don't have any followers yet";
				
			echo "</div>";
			
			echo "<div class='no_followers_tips'>";
					echo "<div class='no_followers_tips_header'>Here are few tips to get noticed</div>";
					echo "<ul>";
						echo "<li>";
							echo "Make sure you have completed your profile.";
						echo "</li>";
						echo "<li>";
							echo "Please add attachments with enough tags to get into the search list.";
						echo "</li>";
						echo "<li>";
							echo "Make sure your profile picture is real.";
						echo "</li>";
						echo "<li>";
							echo "Also make sure your profile picture looks promising and shows your real face.";
						echo "</li>";
					echo "</ul>";
			echo "</div>";
			
			
		}
	}
?>
