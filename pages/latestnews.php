<?php
if(!defined('INITIALIZED'))
	exit;
//var_dump($config['server']);

//Barrinha la em cima
$news_content .= '<div id="PlayersOnline" class="Box">
            <div class="Corner-tl" style="background-image:url(layouts/tibiacom/images/global/content/corner-tl.gif);"></div>
                <div class="Corner-tr" style="background-image:url(layouts/tibiacom/images/global/content/corner-tr.gif);"></div>
                    <div class="Border_1" style="background-image:url(layouts/tibiacom/images/global/content/border-1.gif);"></div>
                        <div class="BorderTitleText" style="background-image:url(layouts/tibiacom/images/global/content/newsheadline_background.gif); height: 28px;">
                            <div class="InfoBar">
                                <img class="InfoBarBigLogo" src="layouts/tibiacom/images/global/header/info/icon-cast.png">
                                <span class="InfoBarNumbers">
                                <img class="InfoBarSmallElement" src="layouts/tibiacom/images/global/header/info/icon-streamers.png">
                                <span class="InfoBarSmallElement">0</span>
                                <img class="InfoBarSmallElement" src="layouts/tibiacom/images/global/header/info/icon-viewers.png">
                                <span class="InfoBarSmallElement">0</span>
                            	</span>&nbsp;&nbsp;
                            	<img class="InfoBarSmallElement" src="layouts/tibiacom/images/global/header/info/icon-download.png">
                            	<span class="InfoBarNumbers">
                                <span class="InfoBarSmallElement"><a href="/?subtopic=downloadclient&step=downloadagreement">Download</a></span>
                            	</span>';

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
                                            $players_online = $qtd_players_online["total"].' Player Online';
                                        }else{
                                            $players_online = $qtd_players_online["total"].' Players Online';
                                        }
                                    }
                                    else{
                                        $players_online = 'Server Offline';
                                    }
                                    
                                                        $news_content .= '
                                                    <span class="InfoBarNumbers" style="float:right; margin-top:5px;">
                                                    <span class="InfoBarSmallElement show_online_data">'. $players_online .'</span>
                                                    </span>
                                                    <img class="InfoBarBigLogo" src="layouts/tibiacom/images/global/header/info/icon-players-online.png" style="float:right;" style="margin-top:5px;">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="Border_1" style="background-image:url(layouts/tibiacom/images/global/content/border-1.gif);"></div>
                                        <div class="CornerWrapper-b">
                                            <div class="Corner-bl" style="background-image:url(layouts/tibiacom/images/global/content/corner-bl.gif);"></div>
                                        </div>
                                        <div class="CornerWrapper-b">
                                            <div class="Corner-br" style="background-image:url(layouts/tibiacom/images/global/content/corner-br.gif);"></div>
                                        </div>
                                    </div>';
//News Ticker
$news_content .= '
	<div id="NewsTicker" class="Box">
		<div class="Corner-tl" style="background-image:url('.$layout_name.'/images/global/content/corner-tl.gif);"></div>
		<div class="Corner-tr" style="background-image:url('.$layout_name.'/images/global/content/corner-tr.gif);"></div>
		<div class="Border_1" style="background-image:url('.$layout_name.'/images/global/content/border-1.gif);"></div>
		<div class="BorderTitleText" style="background-image:url('.$layout_name.'/images/global/content/title-background-green.gif);"></div>
    	<img id="ContentBoxHeadline" class="Title" src="headline.php?text=News Ticker" alt="Contentbox headline">
    	<div class="Border_2">
      		<div class="Border_3">
        		<div class="BoxContent" style="background-image:url('.$layout_name.'/images/global/content/scroll.gif);">';
				//Show Tickers
				$tickers = $SQL->query('SELECT * FROM '.$SQL->tableName('newsticker').' ORDER BY '.$SQL->fieldName('date').' DESC LIMIT 7;');
				$number_of_tickers = 0;
				if(is_object($tickers))
				{
					foreach($tickers as $ticker) 
					{
						if(is_int($number_of_tickers / 2))
							$color = "Odd";
						else
							$color = "Even";
							
						$tickers_to_add .= '
							<div id="TickerEntry-'.$number_of_tickers.'" class="Row" onclick=\'TickerAction("TickerEntry-'.$number_of_tickers.'")\'>
								<div class="'.$color.'">
									<div class="NewsTickerIcon" style="background-image:url('.$layout_name.'/images/global/content/'.$ticker['icon'].'_small.gif)"></div>
									<div id="TickerEntry-'.$number_of_tickers.'-Button" class="NewsTickerExtend" style="background-image:url('.$layout_name.'/images/global/general/plus.gif)"></div>
									<div class="NewsTickerText">
										<span class="NewsTickerDate">'.date("M j Y", $ticker['date']).' - </span>
										<div id="TickerEntry-'.$number_of_tickers.'-ShortText" class="NewsTickerShortText">'.short_text($ticker['text'], 100).'</div>
										<div id="TickerEntry-'.$number_of_tickers.'-FullText" class="NewsTickerFullText">'.$ticker['text'].'</div>
									</div>
								</div>
							</div>';
						$number_of_tickers++;
					}
				}
				$news_content .= $tickers_to_add;
					
				$news_content .= '
				</div>
			</div>
		</div>
		<div class="Border_1" style="background-image: url('.$layout_name.'/images/global/content/border-1.gif);"></div>
		<div class="CornerWrapper-b"><div class="Corner-bl" style="background-image: url('.$layout_name.'/images/global/content/corner-bl.gif);"></div></div>
		<div class="CornerWrapper-b"><div class="Corner-br" style="background-image: url('.$layout_name.'/images/global/content/corner-br.gif);"></div></div>
	</div>';
//End Tickers

//Featured Article
	$news_content .= '
		<div id="FeaturedArticle" class="Box">
			<div class="Corner-tl" style="background-image:url('.$layout_name.'/images/global/content/corner-tl.gif);"></div>
			<div class="Corner-tr" style="background-image:url('.$layout_name.'/images/global/content/corner-tr.gif);"></div>
			<div class="Border_1" style="background-image:url('.$layout_name.'/images/global/content/border-1.gif);"></div>
			<div class="BorderTitleText" style="background-image:url('.$layout_name.'/images/global/content/title-background-green.gif);"></div>
			<img id="ContentBoxHeadline" class="Title" src="headline.php?text=Featured Article" alt="Contentbox headline">
    		<div class="Border_2">
      			<div class="Border_3">
        			<div class="BoxContent" style="background-image:url('.$layout_name.'/images/global/content/scroll.gif);">
						<div id="TeaserThumbnail">
							<img src="'.$layout_name.'/images/news/announcement.gif" width="150" height="100" border="0" alt="">
						</div>
                    <div style="position: relative; top: -9px; margin-bottom: 10px;"><br>
				 <font size="2px"></font><center><font size="2px"><b> IP:</b> '.$config['site']['ipServer'].' |&nbsp;  <b>Port:</b> 7171 |&nbsp;  <b>Version:</b> 8.60</font> <br> </a></center><br><font size="2px"><b>'.$config['server']['serverName'].'</b> - <a href="/?subtopic=serverinfo" <b="">Informações do Servidor</a> - <small>(learn to do <b><a href="/?subtopic=serverinfo&action=tutorialdonate" <b="">Donate</a></b> and use our <b><a href="/?subtopic=serverinfo&action=tutorialshop" <b="">Shop Online</a></b>)</small> <br><br> Welcome to <b><font color="green">'.$config['server']['serverName'].'</font></b>, we count on map most complete of all servers currently, Cooldown and reworked Spells for a more dynamic and fun PvP.<br>Several bugs fixed and being fixed daily. Come check out the best server of all time! <br><a href="/?subtopic=createaccount" <b="">Create your account now</a> here your fun is guaranteed!
                </font> </div>
						<a id="Link" style="position: absolute; margin-bottom: 10px; top: 40px;" href="?subtopic=newsarchive&view=1">» read more</a>
						</div>
      				</div>
    			</div>
			<div class="Border_1" style="background-image:url('.$layout_name.'/images/global/content/border-1.gif);"></div>
			<div class="CornerWrapper-b"><div class="Corner-bl" style="background-image:url('.$layout_name.'/images/global/content/corner-bl.gif);"></div></div>
			<div class="CornerWrapper-b"><div class="Corner-br" style="background-image:url('.$layout_name.'/images/global/content/corner-br.gif);"></div></div>
  		</div>
	';
//End Featured Article

//Functions
function replaceSmile($text, $smile)
{
    $smileys = array(
						':p' => 1, 
						':eek:' => 2, 
						':rolleyes:' => 3, 
						';)' => 4, 
						':o' => 5, 
						':D' => 6,  
						':(' => 7, 
						':mad:' => 8,
						':)' => 9,
						':cool:' => 10
					);
    if($smile == 1)
        return $text;
    else
    {
        foreach($smileys as $search => $replace)
            $text = str_replace($search, '<img src="./images/forum/smile/'.$replace.'.gif" />', $text);
        return $text;
    }
}

function replaceAll($text, $smile)
{
    $rows = 0;

    while(stripos($text, '[code]') !== false && stripos($text, '[/code]') !== false )
    {
        $code = substr($text, stripos($text, '[code]')+6, stripos($text, '[/code]') - stripos($text, '[code]') - 6);
        if(!is_int($rows / 2)) { $bgcolor = 'ABED25'; } else { $bgcolor = '23ED25'; } $rows++;
        $text = str_ireplace('[code]'.$code.'[/code]', '<i>Code:</i><br /><table cellpadding="0" style="background-color: #'.$bgcolor.'; width: 480px; border-style: dotted; border-color: #CCCCCC; border-width: 2px"><tr><td>'.$code.'</td></tr></table>', $text);
    }
    $rows = 0;
    while(stripos($text, '[quote]') !== false && stripos($text, '[/quote]') !== false )
    {
        $quote = substr($text, stripos($text, '[quote]')+7, stripos($text, '[/quote]') - stripos($text, '[quote]') - 7);
        if(!is_int($rows / 2)) { $bgcolor = 'AAAAAA'; } else { $bgcolor = 'CCCCCC'; } $rows++;
        $text = str_ireplace('[quote]'.$quote.'[/quote]', '<table cellpadding="0" style="background-color: #'.$bgcolor.'; width: 480px; border-style: dotted; border-color: #007900; border-width: 2px"><tr><td>'.$quote.'</td></tr></table>', $text);
    }
    $rows = 0;
    while(stripos($text, '[url]') !== false && stripos($text, '[/url]') !== false )
    {
        $url = substr($text, stripos($text, '[url]')+5, stripos($text, '[/url]') - stripos($text, '[url]') - 5);
        $text = str_ireplace('[url]'.$url.'[/url]', '<a href="'.$url.'" target="_blank">'.$url.'</a>', $text);
    }
    while(stripos($text, '[player]') !== false && stripos($text, '[/player]') !== false )
    {
        $player = substr($text, stripos($text, '[player]')+8, stripos($text, '[/player]') - stripos($text, '[player]') - 8);
        $text = str_ireplace('[player]'.$player.'[/player]', '<a href="?subtopic=characters&name='.urlencode($player).'">'.$player.'</a>', $text);
    }
    while(stripos($text, '[img]') !== false && stripos($text, '[/img]') !== false )
    {
        $img = substr($text, stripos($text, '[img]')+5, stripos($text, '[/img]') - stripos($text, '[img]') - 5);
        $text = str_ireplace('[img]'.$img.'[/img]', '<img src="'.$img.'">', $text);
    }
	while(stripos($text, '[letter]') !== false && stripos($text, '[/letter]') !== false )
    {
        $letter = substr($text, stripos($text, '[letter]')+8, stripos($text, '[/letter]') - stripos($text, '[letter]') - 8);
        $text = str_ireplace('[letter]'.$letter.'[/letter]', '<img src="./images/forum/letters/letter_martel_'.$letter.'.gif">', $text);
    }
    while(stripos($text, '[b]') !== false && stripos($text, '[/b]') !== false )
    {
        $b = substr($text, stripos($text, '[b]')+3, stripos($text, '[/b]') - stripos($text, '[b]') - 3);
        $text = str_ireplace('[b]'.$b.'[/b]', '<b>'.$b.'</b>', $text);
    }
    while(stripos($text, '[i]') !== false && stripos($text, '[/i]') !== false )
    {
        $i = substr($text, stripos($text, '[i]')+3, stripos($text, '[/i]') - stripos($text, '[i]') - 3);
        $text = str_ireplace('[i]'.$i.'[/i]', '<i>'.$i.'</i>', $text);
    }
    while(stripos($text, '[u]') !== false && stripos($text, '[/u]') !== false )
    {
        $u = substr($text, stripos($text, '[u]')+3, stripos($text, '[/u]') - stripos($text, '[u]') - 3);
        $text = str_ireplace('[u]'.$u.'[/u]', '<u>'.$u.'</u>', $text);
    }
    return replaceSmile($text, $smile);
}

function showPost($topic, $text, $smile)
{
    $post = '';
    if(!empty($topic))
        $post .= '<b>'.replaceSmile($topic, $smile).'</b>';
    $post .= replaceAll($text, $smile);
    return $post;
}
//End Functions

//Most Powerfull Guilds
	$main_content .= '
<div class="InnerTableContainer">
					<div class="TableShadowContainerRightTop">
						<div class="TableShadowRightTop" style="background-image: url('.$layout_name.'/images/global/content/table-shadow-rt.gif);"></div>
					</div>
						<div class="TableContentAndRightShadow" style="background-image: url('.$layout_name.'/images/global/content/table-shadow-rm.gif);">
							<div class="TableContentContainer">
								<table class="TableContent" style="border: 1px solid #faf0d7;">
									<tbody>
										<tr style="background-color: #505050;">
										</tr>
											<tr class="Table" style="background-color: #d4c0a1;">
												<td style="width: 800; border: 1px; border-style: solid; border-color: #FAF0D7;">
													<div class="NewsHeadline">
														<div class="NewsHeadlineBackground" style="background-image:url(' . $layout_name . '/images/global/content/newsheadline_background.gif)">
															<table border="0">
																<tr>
																	<div class="MostPowerfullGuilds">Most Powerfull Guilds</div>						
																</tr>
															</table>
														</div>
													</div>
													
												<table border="0" cellspacing="3" cellpadding="4" width="100%">
											<tr>';
																							$guildsPower = $SQL->query('SELECT `g`.`id` AS `id`, `g`.`name` AS `name`, COUNT(`g`.`name`) as `frags` FROM `players` p LEFT JOIN `player_deaths` pd ON `pd`.`killed_by` = `p`.`name` LEFT JOIN `guild_membership` gm ON `p`.`id` = `gm`.`player_id` LEFT JOIN `guilds` g ON `gm`.`guild_id` = `g`.`id` WHERE `pd`.`unjustified` = 1 GROUP BY `name` ORDER BY `frags` DESC, `name` ASC LIMIT 0, 4')->fetchAll();
												$main_content .= '<tr>';
											foreach($guildsPower as $guildp) {
												$main_content .= '
													<td style="width: 25%; text-align: center;">
														<a href="?subtopic=guilds&action=view&GuildName=' . $guildp['name'] . '"><img src="guild_image.php?id=' . $guildp['id'] . '" width="64" height="64" border="0"/><br />' . $guildp['name'] . '</a><br />' . $guildp['frags'] . ' kills
													</td>';
											}
												$main_content .= '
																			</tr>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											<div class="TableShadowContainer">
										<div class="TableBottomShadow" style="background-image: url('.$layout_name.'/images/global/content/table-shadow-bm.gif);">
									<div class="TableBottomLeftShadow" style="background-image: url('.$layout_name.'/images/global/content/table-shadow-bl.gif);"></div>
								<div class="TableBottomRightShadow" style="background-image: url('.$layout_name.'/images/global/content/table-shadow-br.gif);"></div>
							</div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
<br />';
//Most Powerfull Guilds End

//Here start news
	$last_threads = $SQL->query('SELECT ' . $SQL->tableName('players') . '.' . $SQL->fieldName('name') . ', ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('post_text') . ', ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('post_topic') . ', ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('icon_id') . ', ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('news_icon') . ', ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('post_smile') . ', ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('id') . ', ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('replies') . ', ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('post_date') . ' FROM ' . $SQL->tableName('players') . ', ' . $SQL->tableName('z_forum') . ' WHERE ' . $SQL->tableName('players') . '.' . $SQL->fieldName('id') . ' = ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('author_guid') . ' AND ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('section') . ' = 1 AND ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('first_post') . ' = ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('id') . ' ORDER BY ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('post_date') . ' DESC LIMIT ' . $config['site']['news_limit'])->fetchAll();
	
    if(isset($last_threads[0]))
    {
        foreach($last_threads as $thread)
        {
            $main_content .= '
				<div class="NewsHeadline">
					<div class="NewsHeadlineBackground" style="background-image:url('.$layout_name.'/images/global/content/newsheadline_background.gif)">
						<img src="'.$layout_name.'/images/global/content/'.$thread['news_icon'].'.gif" class="NewsHeadlineIcon" alt=\'\' />
						<div class="NewsHeadlineDate">'.date('M d Y', $thread['post_date']).' -</div>
    					<div class="NewsHeadlineText">'.htmlspecialchars($thread['post_topic']).'</div>
					</div>
				</div>
				<table style=\'clear:both\' border=0 cellpadding=0 cellspacing=0 width=\'100%\'>
				<tr>';
            $main_content .= '
				<td style=\'padding-left:10px;padding-right:10px;\' >' . showPost('', $thread['post_text'], $thread['post_smile']) . '<br>';
			if($group_id_of_acc_logged >= $config['site']['access_admin_panel'])
				$main_content .= '
					<p align="right"><a href="?subtopic=forum&action=edit_post&id=' . $thread['id'] . '">» Edit this news</a></p>';
				$main_content .= '
					<p align="right"><a href="?subtopic=forum&action=show_thread&id=' . $thread['id'] . '">» Comment on this news</a></p>
				</td>';
        
			$main_content .= '
				<td>
					<img src="'.$layout_name.'/images/global/general/blank.gif" width=10 height=1 border=0 alt=\'\' />
				</td>
			</tr>
		</table><br />';
		}
    }
    else
        $main_content .= '';