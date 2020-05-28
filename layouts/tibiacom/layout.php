<?php
if(!defined('INITIALIZED'))
    exit;
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$config['server']['serverName']?> - Free Multiplayer Online Role Playing Game</title>
    <meta http-equiv="content-language" content="pt-br">
    <meta name="keywords" content="free online game, free multiplayer game, free online rpg, free mmorpg, mmorpg, mmog, online role playing game, online multiplayer game, internet game, online rpg, rpg">

    <!--  regular browsers -->
    <link rel="shortcut icon" href="<?php echo $layout_name; ?>/images/global/general/favicon.ico" type="image/x-icon">
    <!-- For iPad with high-resolution Retina display running iOS = 7: -->
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $layout_name; ?>/images/global/general/apple-touch-icon-152x152.png">
    <!-- For iPad with high-resolution Retina display running iOS = 6: -->
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $layout_name; ?>/images/global/general/apple-touch-icon-144x144.png">
    <!-- For iPhone with high-resolution Retina display running iOS = 7: -->
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $layout_name; ?>/images/global/general/apple-touch-icon-120x120.png">
    <!-- For iPhone with high-resolution Retina display running iOS = 6: -->
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $layout_name; ?>/images/global/general/apple-touch-icon-114x114.png">
    <!-- For the iPad mini and the first- and second-generation iPad on iOS = 7: -->
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $layout_name; ?>/images/global/general/apple-touch-icon-76x76.png">
    <!-- For the iPad mini and the first- and second-generation iPad on iOS = 6: -->
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $layout_name; ?>/images/global/general/apple-touch-icon-72x72.png">
    <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
    <link rel="apple-touch-icon" href="<?php echo $layout_name; ?>/images/global/general/apple-touch-icon.png">
    <!-- Fallback for older devices: -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo $layout_name; ?>/images/global/general/apple-touch-icon-precomposed.png">

    <link href="<?php echo $layout_name; ?>/basic_d.css" rel="stylesheet" type="text/css">
    <?php
    if($_REQUEST['subtopic'] == "latestnews" || $_REQUEST['subtopic'] == "newsarchive")
        echo '<link href="'.$layout_name.'/news.css" rel="stylesheet" type="text/css">';
    ?>
    <script src="<?php echo $layout_name; ?>/jquery.js" ></script>
    <script src="<?php echo $layout_name; ?>/jquery-ui.core.js" ></script>
    <script src="<?php echo $layout_name; ?>/jquery-ui.widgets.js" ></script>
    <script src="<?php echo $layout_name; ?>/jquery.mask.js"></script>
    <script src="<?php echo $layout_name; ?>/ajaxcip.js"></script>
    <script src="<?php echo $layout_name; ?>/ajaxmonteiro.js"></script>
    <?php
    if($_REQUEST['subtopic'] == "createaccount")
        echo '<script src="'.$layout_name.'/create_character.js"></script>';
    ?>
    <script src="<?php echo $layout_name; ?>/generic.js"></script>
    <script>
        var loginStatus=0;
        loginStatus='<?php if($logged){ ?>true<?php } else { ?>false<?php } ?>';
        <?php if ($_REQUEST['subtopic'] == 'accountmanagement' && $_REQUEST['action'] == 'donate'){?>
        var activeSubmenuItem='donate';
        <?php }else{?>
        var activeSubmenuItem='<?php echo $subtopic; ?>';
        <?php }?>
        var JS_DIR_IMAGES=0;
        JS_DIR_IMAGES='<?php echo $layout_name; ?>/images/';
        var JS_DIR_ACCOUNT=0;
        JS_DIR_ACCOUNT='';
        var g_FormName='';
        var g_FormField='';
        var g_Deactivated=false;
        var g_FlashClientInPopUp= true;
    </script>
    <script>
        if(top.location != window.location) {
            g_FlashClientInPopUp = false;
        }
    </script>
    <script src="<?php echo $layout_name; ?>/initialize.js"></script>
    <script src="<?php echo $layout_name; ?>/swfobject.js" ></script>
    <?php if($_REQUEST['subtopic'] == "accountmanagement") { ?>
        <script type="text/javascript">
            function openGameWindow(a_URL)
            {
                var Height = 768;
                var Width = 1024;
                var Top = (screen.height - Height) / 2;
                var Left = (screen.width - Width) / 2;
                var NewWindow = window.open(a_URL + '&window=2',
                    "Tibia",
                    "width=" + Width + ",height=" + Height + ",top=" + Top + ",left=" + Left + ",dependent=no,hotkeys=no,location=no,menubar=no,resizable=yes,scrollbars=no,status=no,toolbar=no"
                );
                if (NewWindow != null) {
                    NewWindow.focus();
                }
            }
        </script>
    <?php } ?>
</head>

<body onbeforeunload="SaveMenu();"
      style="background-image:url(<?php echo $layout_name; ?>/images/global/header/background-artwork.jpg);
              background-size: 100%;
              background-position: top center;
              background-repeat: no-repeat;
              "
      onunload="SaveMenu();"
      onload="SetFormFocus()"
      data-twttr-rendered="true">
<div id="DeactivationContainer" onclick="DisableDeactivationContainer();"></div>

<div id="MainHelper1">
    <div id="MainHelper2">
        <div id="Bodycontainer">
            <div id="ContentRow">
                <div id="MenuColumn">
                    <div id="LeftArtwork">
                        <a href="./?subtopic=latestnews">
                            <img id="TibiaLogoArtworkTop"
                                 src="<?php echo $layout_name; ?>/images/global/header/tibia-logo-artwork-top.gif"
                                 alt="logoartwork"
                                 name="Ferobra Global"
                            >
                        </a>
                    </div>

                    <div id="Loginbox">
                        <div id="LoginTop" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/box-top.gif)"></div>
                        <div id="BorderLeft" class="LoginBorder" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif)"></div>
                        <div id="LoginButtonContainer" style="background-image:url(<?php echo $layout_name; ?>/images/global/loginbox/loginbox-textfield-background.gif)">
                            <div id="PlayNowContainer"><form class="MediumButtonForm" action="?subtopic=accountmanagement" method="post"><input type="hidden" name="page" value="overview"><div class="MediumButtonBackground" style="background-image:url(<?php echo $layout_name; ?>/images/global/buttons/mediumbutton.gif)" onmouseover="MouseOverMediumButton(this);" onmouseout="MouseOutMediumButton(this);"><div class="MediumButtonOver" style="background-image:url(<?php echo $layout_name; ?>/images/global/buttons/mediumbutton-over.gif)" onmouseover="MouseOverMediumButton(this);" onmouseout="MouseOutMediumButton(this);"></div><input class="MediumButtonText" type="image" name="Play Now" alt="Play Now" src="<?php echo $layout_name; ?>/images/global/buttons/mediumbutton_playnow.png"></div></form>
                            </div>
                        </div>
                        <div class="Loginstatus" style="background-image:url(<?php echo $layout_name; ?>/images/global/loginbox/loginbox-textfield-background.gif)">
                            <div id="LoginstatusText"
                                 onclick="LoginstatusTextAction(this);"
                                 onmouseover="MouseOverLoginBoxText(this);"
                                 onmouseout="MouseOutLoginBoxText(this);">
                                <div id="LoginstatusText_1"
                                     class="LoginstatusText"
                                     style="background-image: url(<?php echo $layout_name; ?>/images/global/loginbox/loginbox-font-create-account.gif);">
                                </div>
                                <div id="LoginstatusText_2"
                                     class="LoginstatusText"
                                     style="background-image: url(<?php echo $layout_name; ?>/images/global/loginbox/loginbox-font-create-account-over.gif);">
                                </div>
                            </div>
                        </div>
                        <div id="BorderRight" class="LoginBorder" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif)"></div>
                        <div id="LoginBottom" class="Loginstatus" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/box-bottom.gif)"></div>
                    </div>

                    <div class="SmallMenuBox" style="top: 4px;" >
                        <div id="LoginTop" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/box-top.gif)" ></div>
                        <div id="BorderLeft" class="LoginBorder" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif); height: 39px;" ></div>
                        <div id="LoginButtonContainer" style="background-image:url(<?php echo $layout_name; ?>/images/global/loginbox/loginbox-textfield-background.gif)" >
                            <div id="PlayNowContainer" ><form class="MediumButtonForm" action="?subtopic=downloadclient&step=downloadagreement" method="post" ><div class="MediumButtonBackground" style="background-image:url(<?php echo $layout_name; ?>/images/global/buttons/mediumbutton.gif)" onMouseOver="MouseOverMediumButton(this);" onMouseOut="MouseOutMediumButton(this);" ><div class="MediumButtonOver" style="background-image:url(<?php echo $layout_name; ?>/images/global/buttons/mediumbutton-over.gif)" onMouseOver="MouseOverMediumButton(this);" onMouseOut="MouseOutMediumButton(this);" ></div><input class="MediumButtonText" type="image" name="Download" alt="Download" src="<?php echo $layout_name; ?>/images/global/buttons/mediumbutton_download.png" /></div></form></div>
                        </div>
                        <div id="BorderRight" class="LoginBorder" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif); height: 39px;" ></div>
                        <div id="LoginBottom" class="Loginstatus" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/box-bottom.gif); top: 39px;" ></div>
                    </div>

                    <div id="Menu">
                        <div id="MenuTop" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/box-top.gif);"></div>
                        <div id="news" class="menuitem">
								<span onclick="MenuItemAction('news')">
  									<div class="MenuButton" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/button-background.gif);">
    									<div onmouseover="MouseOverMenuItem(this);" onmouseout="MouseOutMenuItem(this);"><div class="Button" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/button-background-over.gif);"></div>
											<span id="news_Lights" class="Lights" style="visibility: hidden;">
												<div class="light_lu" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
												<div class="light_ld" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
												<div class="light_ru" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
											</span>
											<div id="news_Icon" class="Icon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-news.gif);"></div>
											<div id="news_Label" class="Label" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/label-news.gif);"></div>
											<div id="news_Extend" class="Extend" style="background-image: url(<?php echo $layout_name; ?>/images/global/general/minus.gif);"></div>
										</div>
									</div>
								</span>
                            <div id="news_Submenu" class="Submenu">
                                <a href="?subtopic=latestnews">
                                    <div id="submenu_latestnews" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                        <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        <div id="ActiveSubmenuItemIcon_latestnews" class="ActiveSubmenuItemIcon" style="background-image: url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                        <div id="ActiveSubmenuItemLabel_latestnews" class="SubmenuitemLabel">Latest News</div>
                                        <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                    </div>
                                </a>
                                <a href="?subtopic=newsarchive">
                                    <div id="submenu_newsarchive" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                        <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        <div id="ActiveSubmenuItemIcon_newsarchive" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                        <div id="ActiveSubmenuItemLabel_newsarchive" class="SubmenuitemLabel">News Archive</div>
                                        <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div id="community" class="menuitem">
								<span onclick="MenuItemAction('community')">
  									<div class="MenuButton" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/button-background.gif);">
    									<div onmouseover="MouseOverMenuItem(this);" onmouseout="MouseOutMenuItem(this);"><div class="Button" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/button-background-over.gif);"></div>
      										<span id="community_Lights" class="Lights" style="visibility: visible;">
												<div class="light_lu" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
												<div class="light_ld" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
												<div class="light_ru" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
      										</span>
											<div id="community_Icon" class="Icon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-community.gif);"></div>
											<div id="community_Label" class="Label" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/label-community.gif);"></div>
											<div id="community_Extend" class="Extend" style="background-image: url(<?php echo $layout_name; ?>/images/global/general/plus.gif);"></div>
    									</div>
  									</div>
								</span>
                            <div id="community_Submenu" class="Submenu">
                                <a href="?subtopic=characters">
                                    <div id="submenu_characters" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                        <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        <div id="ActiveSubmenuItemIcon_characters" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                        <div id="ActiveSubmenuItemLabel_characters" class="SubmenuitemLabel">Characters</div>
                                        <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                    </div>
                                </a>
                                    <a href="?subtopic=worlds">
                                        <div id="submenu_worlds" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                            <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                            <div id="ActiveSubmenuItemIcon_worlds" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                            <div id="ActiveSubmenuItemLabel_worlds" class="SubmenuitemLabel">Worlds</div>
                                            <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        </div>
                                    </a>
                                <a href="?subtopic=highscores">
                                    <div id="submenu_highscores" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                        <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        <div id="ActiveSubmenuItemIcon_highscores" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                        <div id="ActiveSubmenuItemLabel_highscores" class="SubmenuitemLabel">Highscores</div>
                                        <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                    </div>
                                </a>
                                <a href="?subtopic=killstatistics">
                                    <div id="submenu_killstatistics" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                        <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        <div id="ActiveSubmenuItemIcon_killstatistics" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                        <div id="ActiveSubmenuItemLabel_killstatistics" class="SubmenuitemLabel">Kill Statistics</div>
                                        <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                    </div>
                                </a>
                                <a href="?subtopic=houses">
                                    <div id="submenu_houses" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                        <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        <div id="ActiveSubmenuItemIcon_houses" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                        <div id="ActiveSubmenuItemLabel_houses" class="SubmenuitemLabel">Houses</div>
                                        <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                    </div>
                                </a>
                                <a href="?subtopic=guilds">
                                    <div id="submenu_guilds" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                        <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        <div id="ActiveSubmenuItemIcon_guilds" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                        <div id="ActiveSubmenuItemLabel_guilds" class="SubmenuitemLabel">Guilds</div>
                                        <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                    </div>
                                </a>
                                <a href="?subtopic=polls">
                                    <div id="submenu_polls" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                        <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        <div id="ActiveSubmenuItemIcon_polls" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                        <div id="ActiveSubmenuItemLabel_polls" class="SubmenuitemLabel">Polls</div>
                                        <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div id="forum" class="menuitem">
								<span onclick="MenuItemAction('forum')">
  									<div class="MenuButton" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/button-background.gif);">
    									<div onmouseover="MouseOverMenuItem(this);" onmouseout="MouseOutMenuItem(this);"><div class="Button" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/button-background-over.gif);"></div>
      										<span id="forum_Lights" class="Lights" style="visibility: visible;">
												<div class="light_lu" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
												<div class="light_ld" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
												<div class="light_ru" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
      										</span>
      										<div id="forum_Icon" class="Icon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-forum.gif);"></div>
      										<div id="forum_Label" class="Label" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/label-forum.gif);"></div>
      										<div id="forum_Extend" class="Extend" style="background-image: url(<?php echo $layout_name; ?>/images/global/general/plus.gif);"></div>
    									</div>
  									</div>
								</span>
                            <div id="forum_Submenu" class="Submenu">
                                <a href="?subtopic=forum">
                                    <div id="submenu_forum" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                        <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        <div id="ActiveSubmenuItemIcon_forum" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                        <div id="ActiveSubmenuItemLabel_forum" class="SubmenuitemLabel">Server Forum</div>
                                        <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div id="account" class="menuitem">
								<span onclick="MenuItemAction('account')">
  									<div class="MenuButton" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/button-background.gif);">
    									<div onmouseover="MouseOverMenuItem(this);" onmouseout="MouseOutMenuItem(this);"><div class="Button" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/button-background-over.gif);"></div>
      										<span id="account_Lights" class="Lights" style="visibility: visible;">
												<div class="light_lu" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
												<div class="light_ld" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
												<div class="light_ru" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
      										</span>
      										<div id="account_Icon" class="Icon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-account.gif);"></div>
      										<div id="account_Label" class="Label" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/label-account.gif);"></div>
      										<div id="account_Extend" class="Extend" style="background-image: url(<?php echo $layout_name; ?>/images/global/general/plus.gif);"></div>
    									</div>
  									</div>
								</span>
                            <div id="account_Submenu" class="Submenu">
                                <a href="?subtopic=accountmanagement&page=overview">
                                    <div id="submenu_accountmanagement" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                        <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        <div id="ActiveSubmenuItemIcon_accountmanagement" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                        <div id="ActiveSubmenuItemLabel_accountmanagement" class="SubmenuitemLabel">Account Management</div>
                                        <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                    </div>
                                </a>
                                <?php if($group_id_of_acc_logged >= $config['site']['access_admin_panel']) { ?>
                                    <a href="?subtopic=adminpanel">
                                        <div id="submenu_adminpanel" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                            <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                            <div id="ActiveSubmenuItemIcon_adminpanel" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                            <div id="ActiveSubmenuItemLabel_adminpanel" class="SubmenuitemLabel">Admin Panel</div>
                                            <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        </div>
                                    </a>
                                <?php } ?>
                                <?php if(!$logged){ ?>
                                    <a href="?subtopic=createaccount">
  										<div id="submenu_createaccount" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
											<div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
											<div id="ActiveSubmenuItemIcon_createaccount" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
											<div id="ActiveSubmenuItemLabel_createaccount" class="SubmenuitemLabel">Create Account</div>
											<div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
  										</div>
									</a>
                                <?php } ?>
                                <a href="?subtopic=downloadclient&step=downloadagreement">
                                    <div id="submenu_downloadclient" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                        <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        <div id="ActiveSubmenuItemIcon_downloadclient" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                        <div id="ActiveSubmenuItemLabel_downloadclient" class="SubmenuitemLabel">Download Client</div>
                                        <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                    </div>
                                </a>
                                <a href="?subtopic=lostaccount">
                                    <div id="submenu_lostaccount" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                        <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        <div id="ActiveSubmenuItemIcon_lostaccount" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                        <div id="ActiveSubmenuItemLabel_lostaccount" class="SubmenuitemLabel">Lost Account</div>
                                        <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div id="library" class="menuitem">
								<span onclick="MenuItemAction('library')">
  									<div class="MenuButton" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/button-background.gif);">
    									<div onmouseover="MouseOverMenuItem(this);" onmouseout="MouseOutMenuItem(this);"><div class="Button" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/button-background-over.gif);"></div>
      										<span id="library_Lights" class="Lights" style="visibility: visible;">
        										<div class="light_lu" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
												<div class="light_ld" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
												<div class="light_ru" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
      										</span>
										  	<div id="library_Icon" class="Icon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-library.gif);"></div>
										  	<div id="library_Label" class="Label" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/label-library.gif);"></div>
										  	<div id="library_Extend" class="Extend" style="background-image: url(<?php echo $layout_name; ?>/images/global/general/plus.gif);"></div>
    									</div>
  									</div>
								</span>
                            <div id="library_Submenu" class="Submenu">
                                <a href="?subtopic=experiencetable">
                                    <div id="submenu_experiencetable" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                        <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        <div id="ActiveSubmenuItemIcon_experiencetable" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                        <div id="ActiveSubmenuItemLabel_experiencetable" class="SubmenuitemLabel">Experience Table</div>
                                        <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                    </div>
                                </a>
                                <a href="?subtopic=serverinfo">
                                    <div id="submenu_serverinfo" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                        <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        <div id="ActiveSubmenuItemIcon_serverinfo" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                        <div id="ActiveSubmenuItemLabel_serverinfo" class="SubmenuitemLabel">Server Info</div>
                                        <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div id="support" class="menuitem">
								<span onclick="MenuItemAction('support')">
  									<div class="MenuButton" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/button-background.gif);">
    									<div onmouseover="MouseOverMenuItem(this);" onmouseout="MouseOutMenuItem(this);"><div class="Button" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/button-background-over.gif);"></div>
      										<span id="support_Lights" class="Lights" style="visibility: visible;">
												<div class="light_lu" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
												<div class="light_ld" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
												<div class="light_ru" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
      										</span>
      										<div id="support_Icon" class="Icon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-support.gif);"></div>
      										<div id="support_Label" class="Label" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/label-support.gif);"></div>
      										<div id="support_Extend" class="Extend" style="background-image: url(<?php echo $layout_name; ?>/images/global/general/plus.gif);"></div>
    									</div>
  									</div>
								</span>
                            <div id="support_Submenu" class="Submenu">
                                <a href="?subtopic=tibiarules">
                                    <div id="submenu_tibiarules" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                        <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        <div id="ActiveSubmenuItemIcon_tibiarules" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                        <div id="ActiveSubmenuItemLabel_tibiarules" class="SubmenuitemLabel">Regras no Thunder</div>
                                        <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                    </div>
                                </a>
                                <a href="?subtopic=team">
                                    <div id="submenu_team" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                        <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        <div id="ActiveSubmenuItemIcon_team" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                        <div id="ActiveSubmenuItemLabel_team" class="SubmenuitemLabel">Suporte no Thunder</div>
                                        <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                    </div>
                                </a>
                            <?php if($_REQUEST["subtopic"] == "erro"){?>
                                <a href="?subtopic=erro">
                                    <div id="submenu_erro" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                        <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        <div id="ActiveSubmenuItemIcon_erro" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                        <div id="ActiveSubmenuItemLabel_erro" class="SubmenuitemLabel">Erro</div>
                                        <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                    </div>
                                </a>
                            <?php } ?>
							<?php if (isset($_SESSION['account'])){?>
							    <a href="?subtopic=ticket">
                                    <div id="submenu_ticket" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                        <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        <div id="ActiveSubmenuItemIcon_ticket" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                        <div id="ActiveSubmenuItemLabel_ticket" class="SubmenuitemLabel">Suporte via Ticket</div>
                                        <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                    </div>
                                </a>
							<?php } ?>
                            </div>
                        </div>
                        <div id="shop" class="menuitem">
								<span onclick="MenuItemAction('shop')">
  									<div class="MenuButton" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/button-background.gif);">
    									<div onmouseover="MouseOverMenuItem(this);" onmouseout="MouseOutMenuItem(this);"><div class="Button" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/button-background-over.gif);"></div>
      										<span id="shop_Lights" class="Lights" style="visibility: visible;">
												<div class="light_lu" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
												<div class="light_ld" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
												<div class="light_ru" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/green-light.gif);"></div>
      										</span>
      										<div id="shop_Icon" class="Icon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-shops.gif);"></div>
      										<div id="shop_Label" class="Label" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/label-shops.gif);"></div>
      										<div id="shop_Extend" class="Extend" style="background-image: url(<?php echo $layout_name; ?>/images/global/general/plus.gif);"></div>
    									</div>
  									</div>
								</span>
                            <div id="shop_Submenu" class="Submenu">
                                <?php if (isset($_SESSION['account'])){?>
                                    <a href="?subtopic=accountmanagement&action=services&ServiceCategoryID=2">
                                        <div id="submenu_shop" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                            <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                            <div id="ActiveSubmenuItemIcon_shop" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                            <div id="ActiveSubmenuItemLabel_shop" class="SubmenuitemLabel">Shopping</div>
                                            <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        </div>
                                    </a>
                                <?php }else{?>
                                    <a href="?subtopic=shop">
                                        <div id="submenu_shop" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                            <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                            <div id="ActiveSubmenuItemIcon_shop" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                            <div id="ActiveSubmenuItemLabel_shop" class="SubmenuitemLabel">Shopping</div>
                                            <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        </div>
                                    </a>
                                <?php }?>
                                <a href="?subtopic=accountmanagement&action=donate">
                                    <div id="submenu_donate" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                        <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        <div id="ActiveSubmenuItemIcon_donate" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                        <div id="ActiveSubmenuItemLabel_donate" class="SubmenuitemLabel">Doar</div>
                                        <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                    </div>
                                </a>
                                <?php if($_REQUEST['subtopic'] == 'tankyou'){?>
                                    <a>
                                        <div id="submenu_tankyou" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                                            <div class="LeftChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                            <div id="ActiveSubmenuItemIcon_tankyou" class="ActiveSubmenuItemIcon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-activesubmenu.gif);"></div>
                                            <div id="ActiveSubmenuItemLabel_tankyou" class="SubmenuitemLabel">Obrigado!</div>
                                            <div class="RightChain" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/chain.gif);"></div>
                                        </div>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <div id="MenuBottom" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/box-bottom.gif);"></div>
                    </div>
                    <script>InitializePage();</script>
                </div>

                <div id="ContentColumn">
                    <div id="Content" class="Content">
                        <div id="ContentHelper">
                            <script type="text/javascript" src="<?php echo $layout_name; ?>/newsticker.js"></script>
                            <?php echo $news_content; ?>
                            <div id="NewsArchive" class="Box">
                                <div class="Corner-tl" style="background-image:url(<?php echo $layout_name; ?>/images/global/content/corner-tl.gif);"></div>
                                <div class="Corner-tr" style="background-image:url(<?php echo $layout_name; ?>/images/global/content/corner-tr.gif);"></div>
                                <div class="Border_1" style="background-image:url(<?php echo $layout_name; ?>/images/global/content/border-1.gif);"></div>
                                <div class="BorderTitleText" style="background-image:url(<?php echo $layout_name; ?>/images/global/content/title-background-green.gif);"></div>
                                <?php
                                $headline = ucfirst($_REQUEST['subtopic']);
                                if($_REQUEST['subtopic'] == "latestnews")
                                    $headline = "Novidades";
                                elseif($_REQUEST['subtopic'] == "accountmanagement")
                                    $headline = "Account Management";
                                elseif($_REQUEST['subtopic'] == "createaccount")
                                    $headline = "Crie sua Conta";
                                elseif($_REQUEST['subtopic'] == "whoisonline")
                                    $headline = "Quem está Online";
                                elseif($_REQUEST['subtopic'] == "adminpanel")
                                    $headline = "Painel de Gerenciamento";
                                elseif($_REQUEST['subtopic'] == "tankyou")
                                    $headline = "Obrigado";
                                ?>
                                <img id="ContentBoxHeadline" class="Title" src="pages/headline.php?txt=<?PHP echo ucwords(str_replace('_', ' ', strtolower($headline))); ?>" alt="Contentbox headline">
                                <div class="Border_2">
                                    <div class="Border_3">
                                        <div class="BoxContent" style="background-image:url(<?php echo $layout_name; ?>/images/global/content/scroll.gif);">
                                            <?php echo $main_content; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="Border_1" style="background-image:url(<?php echo $layout_name; ?>/images/global/content/border-1.gif);"></div>
                                <div class="CornerWrapper-b"><div class="Corner-bl" style="background-image:url(<?php echo $layout_name; ?>/images/global/content/corner-bl.gif);"></div></div>
                                <div class="CornerWrapper-b"><div class="Corner-br" style="background-image:url(<?php echo $layout_name; ?>/images/global/content/corner-br.gif);"></div></div>
                            </div>

                            <div id="ThemeboxesColumn">
                                <div id="DeactivationContainerThemebox" onclick="DisableDeactivationContainer();"></div>
                                <div id="RightArtwork">
                                    <img id="Monster" src="<?php echo $layout_name; ?>/images/global/header/monsters/dragonlord.gif" alt="Monster of the Week">
                                    <img id="PedestalAndOnline" src="<?php echo $layout_name; ?>/images/global/header/pedestal-and-online.gif" alt="Monster Pedestal and Players Online Box">
                                    <?php

                                    if ( ! session_id() ) @ session_start();

                                    $last = null;
                                    if (!isset($_SESSION)) {
                                        $_SESSION = [];
                                    }

                                    if (isset($_SESSION['server_status_last_check'])) {
                                        $last = $_SESSION['server_status_last_check'];
                                    }
                                    if ($last == null || time() > $last + 30) {
                                        $_SESSION['server_status_last_check'] = time();
                                        $_SESSION['server_status'] = $config['status']['serverStatus_online'];
                                    }


                                    if($_SESSION['server_status'] == 1){
                                        $qtd_players_online = $SQL->query("SELECT count(*) as total from `players_online`")->fetch();
                                        if($qtd_players_online["total"] == "1"){
                                            $players_online = $qtd_players_online["total"].'<br>Player Online';
                                        }else{
                                            $players_online = $qtd_players_online["total"].'<br>Players Online';
                                        }
                                    }
                                    else{
                                        $players_online = 'Server<br>Offline';
                                    }
                                    ?>
                                    <div id="PlayersOnline" onclick="window.location = '?subtopic=worlds';"><?php echo $players_online; ?></div>
                                </div>
                                <div id="Themeboxes">
                                    <?php
                                    $skills = $SQL->query('SELECT * FROM players WHERE deleted = 0 AND group_id = 1 AND account_id != 1 ORDER BY level DESC LIMIT 5');
                                    ?>
                                    <!-- premium theme box -->
                                    <style>
                                        .ribbon-double {
                                            background:url(<?php echo $layout_name; ?>/images/shop/ribbon-double.png) no-repeat;
                                            width: 80px;
                                            height: 80px;
                                            position:absolute;
                                            right: 0;
                                            top: -1px;
                                        }
                                    </style>
                                    <!-- Premium theme box -->
                                    <div id="PremiumBox" class="Themebox" style="background-image:url(<?php echo $layout_name; ?>/images/global/themeboxes/premium/premiumbox.gif);">
                                        <div id="doublePointsSelector">
                                            <?php
                                            $doubleStatus = $SQL->query("SELECT `value` FROM `server_config` WHERE `config` = 'double'")->fetch();
                                            if($doubleStatus['value'] == "active")
                                                echo '<div class="ribbon-double"></div>';
                                            ?>
                                        </div>

                                        <div class="ThemeboxButton">
                                            <form action="?subtopic=accountmanagement&action=services&ServiceCategoryID=2" method="post" style="padding:0px;margin:0px;">
                                                <div class="BigButton" style="background-image:url(<?php echo $layout_name; ?>/images/global/buttons/sbutton_green.gif)">
                                                    <div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
                                                        <div class="BigButtonOver" style="background-image:url(<?php echo $layout_name; ?>/images/global/buttons/sbutton_green_over.gif);">
                                                        </div>
                                                        <input class="ButtonText" type="image" name="Get Premium" alt="Get Premium" src="<?php echo $layout_name; ?>/images/global/buttons/_sbutton_gettibiacoins.gif">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="Bottom" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/box-bottom.gif);">
                                        </div>
                                    </div>
                                    <!-- Facebook theme box -->
                                    <div id="NetworksBox" class="Themebox" style="background-image:url(<?php echo $layout_name; ?>/images/global/themeboxes/networks/networksbox.png);">
                                        <div id="FacebookBlock" >
                                            <a id="FacebookPageLink" target="_blank" href="<?php echo $config['social']['facebook']; ?>" >
                                                <img src="<?php echo $layout_name; ?>/images/global/themeboxes/networks/tibia-facebook-page-logo.png" /></a>
                                            <div id="FacebookLikeButton" >
                                                <div class="fb-like" data-href="<?php echo $config['social']['facebook']; ?>" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
                                            </div>
                                            <div id="FacebookShareButton" >
                                                <div class="fb-share-button" data-href="<?php echo $config['social']['facebook']; ?>" data-layout="button"></div>
                                            </div>
                                            <div id="FacebookLikes" >
                                                <div class="fb-like" data-href="<?php echo $config['social']['facebook']; ?>" data-width="250" data-layout="standard" data-action="recommend" data-show-faces="false" ></div>
                                            </div>
                                        </div>
                                        <div class="Bottom" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/box-bottom.gif);">
                                        </div>

                                        <!-- current poll theme box -->
                                        <?php
                                        $date = time();
                                        $getPolls = $SQL->query("SELECT * FROM `z_polls` LIMIT 1")->fetchAll();
                                        foreach($getPolls as $poll) {
                                            if($poll['end'] >= time()) {
                                                ?>
                                                <div id="CurrentPollBox" class="Themebox" style="background-image:url(<?php echo $layout_name; ?>/images/global/themeboxes/current-poll/currentpollbox.gif);">
                                                    <div id="CurrentPollText"><?php echo $poll['question']; ?></div>
                                                    <div class="ThemeboxButton">
                                                        <form action="?subtopic=polls&id=<?php echo $poll['id']; ?>" method="post" style="padding:0px;margin:0px;"><div class="BigButton" style="background-image:url(<?php echo $layout_name; ?>/images/global/buttons/sbutton.gif)"><div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="background-image:url(<?php echo $layout_name; ?>/images/global/buttons/sbutton_over.gif);"></div><input class="ButtonText" type="image" name="Vote Now" alt="Vote Now" src="<?php echo $layout_name; ?>/images/global/buttons/_sbutton_votenow.gif"></div></div></form>      </div>
                                                    <div class="Bottom" style="background-image:url(<?php echo $layout_name; ?>/images/global/general/box-bottom.gif);"></div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div id="Footer">
                                <script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>
                                Copyright by <a href="https://www.cipsoft.com" target="_new"><b>CipSoft GmbH</b></a>. All rights reserveds<br>
                                <a href=?subtopic=forum><b>Game Forum</b></a> | <a href=<?php echo $config['social']['facebook']; ?>><b>Facebook</b></a> | <a href=?subtopic=team><b>Support Game</b></a><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="HelperDivContainer" style="background-image: url(<?php echo $layout_name; ?>/images/global/content/scroll.gif);">
            <div class="HelperDivArrow" style="background-image: url(<?php echo $layout_name; ?>/images/global/content/helper-div-arrow.png);"></div>
            <div id="HelperDivHeadline"></div>
            <div id="HelperDivText"></div>
            <center><img class="Ornament" src="<?php echo $layout_name; ?>/images/global/content/ornament.gif"></center><br>
        </div>
    </div>
    </div>
    <div id="fb-root"></div>
    <script type="text/javascript">
        // disable all control elements which are not part of the content container element
        if (g_Deactivated == true) {
            $(document).ready(function() {
                document.getElementById('Monster').setAttribute('onclick', '');
                document.getElementById('PlayersOnline').setAttribute('onclick', '');
                document.getElementById('DeactivationContainer').setAttribute('onclick', '');
                document.getElementById('LoginButtonContainer').style.zIndex = '1';
                document.getElementById('DeactivationContainer').style.display = 'block';
                document.getElementById('DeactivationContainer').style.zIndex = '50';
                document.getElementById('DeactivationContainerThemebox').style.display = 'block';
                document.getElementById('Monster').style.cursor = 'auto';
                document.getElementById('PlayersOnline').style.cursor = 'auto';
                document.getElementById('ThemeboxesColumn').style.opacity = '0.30';
                document.getElementById('ThemeboxesColumn').style.MozOpacity = '0.30';
                document.getElementById('ThemeboxesColumn').filters.alpha.opacity = '0.75';
                document.getElementById('ThemeboxesColumn').style.filter = 'alpha(opacity=50); opacity: 0.30';
            });
        }
    </script>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&appId=329021967165778&version=v2.3";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</body>
</html>