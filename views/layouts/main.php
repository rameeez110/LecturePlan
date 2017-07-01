<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;
use yii\web\View;
use app\models\UserProfile;

$ajaxUrlSearch = Url::to(['site/search']);
$att = Yii::$app->homeUrl.'/attachment/';
$us = Yii::$app->homeUrl.'/userProfile/';

$this->registerJs(
    "
 $('#search-query').keyup(function() {

        var search = $('#search-query').val();
         // alert(attachmentId);
        var data = {     // create object
            search: search,
            }
	    $.ajax({
            type: 'POST',
            url: '$ajaxUrlSearch',
            data:  data,
            success: function(result){

            var html = '';
           /* for (var i in result.attchmentId) {
            //alert(result.attchmentId[i]);
            //alert(result.attchmentTitle[i]);
          }*/
          //for (var i in result.profileId) {
          for (var i in result.attchmentId) {
          html+= '<a href=\'$att'+result.attchmentId[i]+'\'><span class=\'search-att\'>'+result.attchmentTitle[i]+'</span></a>';

           // alert(result.profileId[i]);
           // alert(result.name[i]);
          }
          for (var i in result.profileId) {
          html+= '<a href=\'$us'+result.profileId[i]+'\'><span class=\'search-user\'>'+result.name[i]+'</span></a>';

           // alert(result.profileId[i]);
           // alert(result.name[i]);
          }
          $('#parent-s').css('display', 'block');
          $('#parent-s').html(html);
            //var results = '';
                    //alert(result);
                    if(result!=null)
                    {
                    /*for(var i=1; i<result.length; i++){
                        results+= result[i].attachment_title;
                        }*/
                        //alert(result['attachment_title']);
                        //$('#parent-s').html(results);
                            /*current.closest('.view').find('#result').html(result[1]);
                            }
                            if(result[4] == 'L'){
                            $('.like').attr('title','Like');
                            }
                            else if(result[4] == 'U'){
                            $('.like').attr('title','UnLike');*/
                            }
                            }
        });
        });
",
    View::POS_HEAD,
    'search-query-button-handler'
);

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/screen.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/print.css" media="print">
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/ie.css" media="screen, projection">
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/twitter.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/font-awesome.min.css">
</head>
<body>
<?php $this->beginBody() ?>

<div class="container" id="page">

<!-- Header Start -->



<div class="topbar js-topbar">

    <div class="global-nav" data-section-term="top_nav">
        <div class="global-nav-inner">
            <div class="container">

                <h1 class="fa fa-graduation-cap bird-topbar-etched" >
                </h1>

                <?php
                $loggedInUser = Yii::$app->user->id;
                $baseUrl = Yii::$app->request->baseUrl;
                $urlLogout = Url::to(['site/logout']);

                if($loggedInUser) {
                    $isUserLoggedIn = 1;
                }
                else {
                    $isUserLoggedIn = 0;
                }
                ?>

                <?php if($isUserLoggedIn == 1) { ?>

                    <div class="logout-button-div">

                        <a href="<?php echo $urlLogout; ?>" data-method="post" title="Logout">
                            <button id="logout-button" type="button" class="" data-placement="bottom" data-component-term="">
                                <span class="fa fa-times"></span>
                                <span class="text"></span>
                            </button>
                        </a>

                    </div>

                    <div role="navigation" style="display: inline-block;"><ul class="nav js-global-actions" id="global-actions">
                            <li id="global-nav-home" class="home" data-global-action="home">
                                <a class="js-nav js-tooltip js-dynamic-tooltip" data-placement="bottom" href="<?php echo Yii::$app->request->baseUrl; ?>" data-component-term="home_nav" data-nav="home">
                                    <span class="text">Timeline</span>
                                </a>
                            </li>

                            <li class="dm-nav">
                                <a role="button" href="<?php echo Url::to(['attachment/index']); ?>" class="js-tooltip js-dynamic-tooltip global-dm-nav" data-placement="bottom" data-original-title="">
                                    <span class="text">Attachments</span>
                                    <span class="dm-new"><span class="count-inner"></span></span>
                                </a>
                            </li>

                            <li class="dm-nav">
                                <a role="button" href="<?php echo Url::to(['site/followers']); ?>" class="js-tooltip js-dynamic-tooltip global-dm-nav" data-placement="bottom" data-original-title="">
                                    <span class="text">Followers</span>
                                    <span class="dm-new"><span class="count-inner"></span></span>
                                </a>

                            </li>

                            <!--

              <li class="people notifications" data-global-action="connect">
                <a class="js-nav js-tooltip js-dynamic-tooltip" data-placement="bottom" href="<?php echo Yii::$app->request->baseUrl; ?>/index.php/site/notifications" data-component-term="connect_nav" data-nav="connect" data-original-title="">
                  <span class="text">Notifications</span>
                    <span class="count">
                      <span class="count-inner">0</span>
                    </span>
                </a>
              </li>

              -->

                    </div>

                <?php } ?>


                <div class="pull-right" style="display: inline-block;"><div role="search">
                        <form class="t1-form form-search js-search-form" action="/search" id="global-nav-search">
                            <div id="s" style="position: relative">
                                <label class="visuallyhidden" for="search-query">Search query</label>
                                <input class="search-input" type="text" id="search-query" placeholder="Search Lecture Plan" name="q" autocomplete="off" spellcheck="false" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-dropdown-1">
                                <div id="parent-s">
                                </div>
                            </div>
          <span class="search-icon js-search-action">
      <button type="submit" class="fa fa-search" tabindex="-1">
          <span class="visuallyhidden">Search Lecture Plan</span>
      </button>
    </span>
                            <div role="listbox" class="dropdown-menu typeahead" id="typeahead-dropdown-1">
                                <div aria-hidden="true" class="dropdown-caret">
                                    <div class="caret-outer"></div>
                                    <div class="caret-inner"></div>
                                </div>
                                <div role="presentation" class="dropdown-inner js-typeahead-results"><div role="presentation" class="typeahead-recent-searches block0">
                                        <h3 id="recent-searches-heading" class="typeahead-category-title recent-searches-title">Recent searches</h3><button type="button" tabindex="-1" class="btn-link clear-recent-searches">Clear All</button>
                                        <ul role="presentation" class="typeahead-items recent-searches-list">

                                            <li role="presentation" class="typeahead-item typeahead-recent-search-item">
                                                <span class="icon close" aria-hidden="true"><span class="visuallyhidden">Remove</span></span>
                                                <a role="option" aria-describedby="recent-searches-heading" class="js-nav" href="" data-search-query="" data-query-source="" data-ds="recent_search" tabindex="-1"></a>
                                            </li>
                                        </ul>
                                    </div><div role="presentation" class="typeahead-saved-searches block1">
                                        <h3 id="saved-searches-heading" class="typeahead-category-title saved-searches-title">Saved searches</h3>
                                        <ul role="presentation" class="typeahead-items saved-searches-list">

                                            <li role="presentation" class="typeahead-item typeahead-saved-search-item">
                                                <span class="icon close" aria-hidden="true"><span class="visuallyhidden">Remove</span></span>
                                                <a role="option" aria-describedby="saved-searches-heading" class="js-nav" href="" data-search-query="" data-query-source="" data-ds="saved_search" tabindex="-1"></a>
                                            </li>
                                        </ul>
                                    </div><ul role="presentation" class="typeahead-items typeahead-topics block2" style="display: none;">

                                        <li role="presentation" class="typeahead-item typeahead-topic-item">
                                            <a role="option" class="js-nav" href="" data-search-query="" data-query-source="typeahead_click" data-ds="topics" tabindex="-1">
                                            </a>
                                        </li>
                                    </ul><ul role="presentation" class="typeahead-items typeahead-accounts social-context js-typeahead-accounts block3" style="display: none;">

                                        <li role="presentation" data-user-id="" data-user-screenname="" data-remote="true" data-score="" class="typeahead-item typeahead-account-item js-selectable">

                                        </li>
                                        <li role="presentation" class="js-selectable typeahead-accounts-shortcut js-shortcut"><a role="option" class="js-nav" href="" data-search-query="" data-query-source="typeahead_click" data-shortcut="true" data-ds="account_search"></a></li>
                                    </ul></div>
                            </div>

                        </form>
                    </div>

                    <ul class="nav right-actions">

                        <?php

                        $urlProfileLink = "";
                        $urlProfileImage = "";
                        $urlNewAttachment = "";

                        if($loggedInUser) {

                            $userProfile = UserProfile::find()
                                ->where(['user_id' => $loggedInUser])
                                ->one();

                            if($userProfile) {
                                $urlProfileImage = $baseUrl."/profileImages/".$userProfile->profile_picture;
                                $urlProfileLink = Url::to(['UserProfile/view'])."?id=".$loggedInUser;
                                $urlNewAttachment = Url::to(['attachment/create']);
                            }
                        }
                        else {

                        }
                        ?>

                        <?php if($isUserLoggedIn == 1) {?>

                            <li class="me dropdown session js-session" data-global-action="t1me" id="user-dropdown">
                                <a href="<?php echo $urlProfileLink; ?>" class="btn js-tooltip settings dropdown-toggle js-dropdown-toggle" id="user-dropdown-toggle" title="Profile and settings" data-placement="bottom" role="button" aria-haspopup="true">
                                    <img class="avatar size32" src="<?php echo $urlProfileImage;?>" alt="Profile and settings" data-user-id="125591222">
                                </a>
                            </li>

                            <li role="complementary" aria-labelledby="global-new-tweet-button" class="topbar-tweet-btn">

                                <a href="<?php echo $urlNewAttachment; ?>" title="New Attachment">
                                    <button id="global-new-tweet-button" type="button" class="js-global-new-tweet js-tooltip btn primary-btn tweet-btn js-dynamic-tooltip" data-placement="bottom" data-component-term="new_tweet_button">
                                        <span class="fa fa-plus"></span>
                                        <span class="text"></span>
                                    </button>
                                </a>

                            </li>

                        <?php } ?>

                    </ul>

                </div>


            </div>
        </div>
    </div>

</div>

<!-- Header End -->

<div class="app_content">
    <?php echo $content; ?>
</div>

<div class="clear"></div>

<div id="footer">

</div><!-- footer -->

</div><!-- page -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
