<?php

use app\models\Attachment;
use app\models\UserProfile;
use app\models\Follow;

// Getting logged in user

$loggedInUser = Yii::$app->user->id;

if(!empty($loggedInUser)) {

    // Get attachments of logged in user

    $attachmentsUser = Attachment::find()
        ->where(['user_id' => $loggedInUser])
        ->All();

    if(!empty($attachmentsUser)) {

        if(sizeof($attachmentsUser) > 0) {

            foreach ($attachmentsUser as $feed) {

                echo "<div class='timeline_item'>";

                $baseUrl = Yii::$app->request->baseUrl;

                foreach ($feed as $key=>$value) {

                    $attachmentId = $feed->attachment_id;

                    if(!strcmp($key, "user_id")) {

                        $fromUser = $value;

                        // Get user details

                        $userProfile = UserProfile::find()
                            ->where(['user_id' => $fromUser])
                            ->One();

                        echo "<div class='profile-picture'>";
                        echo "<img src='".$baseUrl."/profileImages/".$userProfile->profile_picture."' alt='Smiley face'>";
                        echo "</div>";

                    }
                    else if(!strcmp($key, "attachment_title")) {
                        echo "<div class='attachment-title'>";
                        echo "<a href='".$baseUrl."/attachment/view?id=".$attachmentId."'>".$value."</a>";
                        echo "</div>";
                    }
                    else if(!strcmp($key, "attachment_time")) {
                        echo "<div class='attachment-time'>";
                        echo "9h";
                        echo "</div>";
                    }
                    else if(!strcmp($key, "attachment_details")) {
                        echo "<div class='attachment-details'>";
                        echo "Description : ";
                        echo $value;
                        echo "</div>";
                    }
                    else if(!strcmp($key, "attachment_meta")) {

                        echo "<div class='attachment-meta'>";
                        if(!strcmp($feed->attachment_type, "document")) {
                            echo "<embed src='".$baseUrl."/attachment/".$value."' alt='pdf' pluginspage='http://www.adobe.com/products/acrobat/readstep2.html'>";
                        }
                        if(!strcmp($feed->attachment_type, "image")) {

                            echo "<img src='".$baseUrl."/attachment/".$value."' alt='Smiley face'>";

                        }
                        echo "</div>";
                    }
                    else if(!strcmp($key, "attachment_tags")) {
                        echo "<div class='attachment-tags'>";
                        echo "Tags : ";
                        echo "<a href='".$baseUrl."/index.php/attachment/index?tag=".$value."' >".$value."</a>";
                        echo "</div>";
                    }
                }

                echo "</div>";
            }
        }

    }

    $followings = Follow::find()
        ->where(['user_id_following' => $loggedInUser])
        ->All();

    if(!empty($followings)) {

        // Now get attachments of that user

        foreach($followings as $following) {

            $attachment = Attachment::find()
                ->where(['user_id' => $following->user_id_follower])
                ->asArray()
                ->all();

            if(!empty($attachment)) {

                echo "<div class='timeline_item'>";

                $baseUrl = Yii::$app->request->baseUrl;

                foreach ($attachment as $key=>$value) {
//
//                    $attachmentId = $attachment->attachment_id;

                    if(!strcmp($key, "user_id")) {

                        $fromUser = $value;

                        // Get user details

                        $userProfile = UserProfile::find()
                            ->where(['user_id' => $fromUser])
                            ->One();

                        echo "<div class='profile-picture'>";
                        echo "<img src='".$baseUrl."/profileImages/".$userProfile->profile_picture."' alt='Smiley face'>";
                        echo "</div>";

                    }
                    else if(!strcmp($key, "attachment_title")) {
                        echo "<div class='attachment-title'>";
                        echo "<a href='".$baseUrl."/index.php/Attachment/".$attachmentId."'>".$value."</a>";
                        echo "</div>";
                    }
                    else if(!strcmp($key, "attachment_time")) {
                        echo "<div class='attachment-time'>";
                        echo "9h";
                        echo "</div>";
                    }
                    else if(!strcmp($key, "attachment_details")) {
                        echo "<div class='attachment-details'>";
                        echo "Description : ";
                        echo $value;
                        echo "</div>";
                    }
                    else if(!strcmp($key, "attachment_meta")) {
                        echo "<div class='attachment-meta'>";
                        echo "<img src='".$baseUrl."/attachment/".$value."' alt='Smiley face'>";
                        echo "</div>";
                    }
                    else if(!strcmp($key, "attachment_tags")) {
                        echo "<div class='attachment-tags'>";
                        echo "Tags : ";
                        echo "<a href='".$baseUrl."/index.php/attachment/index?tag=".$value."' >".$value."</a>";
                        echo "</div>";
                    }
                }

                echo "</div>";
            }
        }
    }
}
?>
