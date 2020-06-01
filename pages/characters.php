<?php
if(!defined('INITIALIZED'))
	exit;

$name = '';
if(isset($_REQUEST['name']))
	$name = (string) $_REQUEST['name'];

if(!empty($name))
{
	$player = new Player();
	$player->find($name);
	if (($player->getName() == "Rook Sample") || ($player->getName() == "Druid Sample") || ($player->getName() == "Sorcerer Sample") || ($player->getName() == "Paladin Sample") || ($player->getName() == "Knight Sample")){
		$search_error = 'Character <b>'.htmlspecialchars($name).'</b> does not exist.';
	}else{
	if($player->isLoaded())
	{
		$rows_number = 0;
		$account = $player->getAccount();
		
		$main_content .= '
			<div class="TableContainer" >
			<table class="Table3" cellpadding="0" cellspacing="0" >
				<div class="CaptionContainer" >
					<div class="CaptionInnerContainer" > 
						<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
						<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>						
						<div class="Text" >Character Information</div>
						<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
						<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
						<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
					</div>
				</div>
				<tr>
					<td><div class="InnerTableContainer" >
							<table style="width:100%;" >
								<tr>
									<td><div class="TableShadowContainerRightTop" >
											<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
										</div>
										<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
											<div class="TableContentContainer" >
												<table class="TableContent" width="100%" >
												<tr>';
			$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
			$main_content .= '
				<tr bgcolor="' . $bgcolor . '">
					<td width=20%>Name:</td>
					<td>' . htmlspecialchars($player->getName()) . (($player->isDeleted()) ? ', will be deleted at ' . date("M j Y, H:i:s", $player->getDeletion()) : '') . '</td>
				<tr>';
		$player_id = $player->getID();
		$former_sql = "SELECT * FROM `player_former_names` WHERE `player_id` = '$player_id' ORDER BY `date` DESC LIMIT ".$config['site']['formerNames_amount']."";
		$get_names_count = $SQL->query($former_sql)->fetchAll();
		$get_names_count2 = $SQL->query($former_sql)->fetch();
		if($SQL->query($former_sql)->fetchColumn() > 0 && $get_names_count2['date'] >= time()) {
			$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
			$main_content .= '
				<tr bgcolor="' . $bgcolor . '">
					<td width=20%>Former Names:</td>
					<td>';
				$f_names = "";
				foreach($get_names_count as $fomer_name)
					$f_names .= $fomer_name['former_name'].', ';
				$f_names = substr($f_names,0,-2);
				$main_content .= $f_names;
				$main_content .= '
					</td>
				<tr>';
		}
		if(in_array($player->getGroup(), $config['site']['groups_support']))
		{
			$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
			$main_content .= '
				<tr bgcolor="' . $bgcolor . '">
					<td>Group:</td>
					<td>' . htmlspecialchars(Website::getGroupName($player->getGroup())) . '</td>
				</tr>';
		}
			$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
			$main_content .= '
				<tr bgcolor="' . $bgcolor . '">
					<td>Sex:</td>
					<td>' . htmlspecialchars((($player->getSex() == 0) ? 'Female' : 'Male')) . '</td>
				</tr>';
				
			$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
			$main_content .= '
				<tr bgcolor="' . $bgcolor . '">
					<td>Vocation:</td>
					<td>' . htmlspecialchars(Website::getVocationName($player->getVocation())) . '</td>
				</tr>';
			
			$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
			$main_content .= '
				<tr bgcolor="' . $bgcolor . '">
					<td>Level:</td>
					<td>' . htmlspecialchars($player->getLevel()) . '</td>
				</tr>';
			
			$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
			$main_content .= '
				<tr bgcolor="' . $bgcolor . '">
					<td>World:</td>
					<td>' . htmlspecialchars($config['server']['serverName']) . '</td>
				</tr>';
			
			$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
			$main_content .= '
				<tr bgcolor="' . $bgcolor . '">
					<td>Residence:</td>
					<td>' . htmlspecialchars($towns_list[$player->getTownID()]) . '</td>
				</tr>';

			if ($player->getMarriageStatus() > 0) {
				$player_married = new Player();
				$player_married->loadById($player->getMarriage());
				$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
				$main_content .= '
					<tr bgcolor="' . $bgcolor . '">
						<td>Married to:</td>
						<td><a href="?subtopic=characters&name='.urlencode($player_married->getName()).'">' . htmlspecialchars($player_married->getName()) . '</a></td>
					</tr>';
			}
				
			$house = $SQL->query("SELECT * FROM `houses` WHERE `owner` = '" . $player->getID() . "'")->fetch();
        if (!empty($house[0])) {

            $main_content .= '<TR ><TD>House:</TD><TD>';
            $main_content .= $house['name'] . ' (' . $towns_list[$house['town_id']] . ')' . '</TD></TR>';
        }
				
			$rank_of_player = $player->getRank();
			if(!empty($rank_of_player))
			{
				$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
				$main_content .= '
					<tr bgcolor="' . $bgcolor . '">
						<td>Guild Membership:</td>
						<td>' . htmlspecialchars($rank_of_player->getName()) . ' of the <a href="?subtopic=guilds&action=view&GuildName='. urlencode($rank_of_player->getGuild()->getName()) .'">' . htmlspecialchars($rank_of_player->getGuild()->getName()) . '</a>
						</td>
						</tr>';
			}
			
			$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
			$main_content .= '
				<tr bgcolor="' . $bgcolor . '">
					<td>Last login:</td>
					<td>' . (($player->getLastLogin() > 0) ? date("j F Y, g:i a", $player->getLastLogin()) : 'Never logged in.') . '</td>
				</tr>';
			
			$comment = $player->getComment();
			$newlines = array("\r\n", "\n", "\r");
			$comment_with_lines = str_replace($newlines, '<br />', $comment, $count);
			if($count < 50)
				$comment = $comment_with_lines;
			if(!empty($comment))
			{
			$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
				$main_content .= '
					<tr bgcolor="' . $bgcolor . '">
						<td>Comment:</td>
						<td>' . $comment . '</td>
					</tr>';
			}
			
			$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
			if ($account->getPremDays() > 0){
                $main_content .= '
					<tr bgcolor="' . $bgcolor . '">
						<td>Account Status:</td>
						<td>Premium Account</td>
					</tr>';
            }
			else if($config['server']['freePremium'] == "yes"){
                $main_content .= '
					<tr bgcolor="' . $bgcolor . '">
						<td>Account Status:</td>
						<td>Premium Account</td>
					</tr>';
            }else{
                $main_content .= '
					<tr bgcolor="' . $bgcolor . '">
						<td>Account Status:</td>
						<td>Free Account</td>
					</tr>';
            }

			
			$main_content .= '	</tr>
												<tr>
													
												</tr>
												</table>
											</div>
										</div>
										<div class="TableShadowContainer" >
											<div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bm.gif);" >
												<div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bl.gif);" ></div>
												<div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-br.gif);" ></div>
											</div>
										</div>
									</td>
								</tr>
							</table>
						</div>
					</td>
				</tr>
			</table>
		</div></br>';

	include_once "system/load.newclasses.php";
        $verifica_item_id = function ($pid) use ($player) {
            $kalabok = (array_keys($player->getItems()->getItem($pid)) === [] ? '' : array_keys($player->getItems()->getItem($pid))[0]);


            $hidden = $player->isItemHidden();
            if($hidden){
                return '<td style="background-color: #d4c0a1; text-align: center;"><img src="./layouts/tibiacom/images/shop/items/hidden.png" class="CharItems"></td>';
            }
            if ($player->getItems()->getItem($pid)[$kalabok]->data['itemtype'] == NULL) {
                return '<td style="background-color: #d4c0a1; text-align: center;"><img src="./layouts/tibiacom/images/shop/items/' . $pid . '.gif" class="CharItems"></td>';
            } else {
                $item_id = $player->getItems()->getItem($pid)[$kalabok]->data['itemtype'];
                return '<td align="center" style="background-color: #D4C0A1;"><img src="./layouts/tibiacom/images/shop/items/' . $item_id . '.png" class="CharItems"></td>';
            }
        };
        $player_info = $player->data;
        $cur_outfit = "<img style='text-decoration:none;margin: 0 0 0 -13px;' class='outfitImgsell2' src='http://outfits.ferobraglobal.com/animoutfit.php?id={$player_info['looktype']}&addons={$player_info['lookaddons']}&head={$player_info['lookhead']}&body={$player_info['lookbody']}&legs={$player_info['looklegs']}&feet={$player_info['lookfeet']}' alt='' name=''>";

        $cur_exp = $player->getExperience();
        $cur_lvl_exp = $player->getExpForLevel($player->getLevel());
        $cur_real_exp = $cur_exp - $cur_lvl_exp;
        $next_lvl_exp = $player->getExpForLevel($player->getLevel() + 1);
        $next_lvl_exp_need = $next_lvl_exp - $cur_lvl_exp;

        $next_lvl_percent = (float)round(((($cur_real_exp / $next_lvl_exp_need) * 100)), 2, PHP_ROUND_HALF_DOWN);
        $next_lvl_percent = ($next_lvl_percent == 100 ? 99.99 : $next_lvl_percent);

        $plus_content = '<div class="account_plus_information">';
        $plus_content .= '
            <div class="TableContentAndRightShadow1" style="background-image:url(./layouts/tibiacom/images/global/content/table-shadow-rm.gif);">
                <div class="TableContainer1">
                    <table class="Table3" width="100%" style="background-color: rgb(212, 192, 161);">
                        <tbody>
                            <tr>
                                <td>
                                    <div id="TransferConditionsToggleButton" class="BigToggleButton" onclick="CollapseTable(\'TransferConditionsContainer\'); $(\'#labelshow\').html($(\'#labelshow\').html() == \'show\' ? \'hide\' : \'show\');">
                                    <link href="./layouts/tibiacom/css/bootstrap.css" rel="stylesheet" type="text/css">
                                        <div id="Indicator_TransferConditionsContainer" class="CircleSymbolPlus" style="position: absolute; height: 18px; width: 18px; top: -8px; right: -8px; z-index: 99; cursor: pointer; background-image: url(./layouts/tibiacom/images/global/content/circle-symbol-plus.gif);"></div>
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Click here to <span id="labelshow">show</span> <b>additional informations</b>.
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>';
        $plus_content .= '
            <div id="TransferConditionsContainer" style="display: none;">
                <br/>
                <table width="100%" style="padding: 5px 10px;">
                    <tbody>
                        <tr style="background-image: url(./layouts/tibiacom/images/global/content/scroll.gif)!important;">
                            <td style="padding-right: 5px;">
                                <table width="100%" class="Table30">
                                    <tbody>
                                        <tr bgcolor="#D4C0A1">
                                            <td align="center" width="100px"><b>Current<br>outfit:</b></td>
                                            <td>' . $cur_outfit . '</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="Table30" width="100%" style="border-spacing: 2px; padding: 0px;">
                                    <tbody>
                                        <tr>
                                            <td colspan="3" style="background-color: #D4C0A1; text-align: center;">
                                                <b>Inventory:</b>
                                            </td>
                                        </tr>
                                        <tr>';

        $plus_content .= $verifica_item_id(2);
        $plus_content .= $verifica_item_id(1);
        $plus_content .= $verifica_item_id(3);
        $plus_content .= '</tr><tr>';
        $plus_content .= $verifica_item_id(6);
        $plus_content .= $verifica_item_id(4);
        $plus_content .= $verifica_item_id(5);
        $plus_content .= '</tr><tr>';
        $plus_content .= $verifica_item_id(9);
        $plus_content .= $verifica_item_id(7);
        $plus_content .= $verifica_item_id(10);
        $plus_content .= '</tr><tr>';
        $plus_content .= '               <td style="background-color: #D4C0A1; text-align: center;">
                                                <b>Soul:</b><br>' . $player->getSoul() . '
                                            </td>';
        $plus_content .= $verifica_item_id(8);
        $plus_content .= '
                                            <td style="background-color: #D4C0A1; text-align: center;">
                                                <b>Cap:</b><br>' . $player->getCapacity() . '
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table width="100%" class="Table30">
                                    <tbody>
                                        <tr bgcolor="#F1E0C6" style="text-align: center">
                                            <td width="80px"><b>Health:</b></td>
                                            <td>
                                                ' . $player->getHealth() . '/' . $player->getHealthMax() . '(' . (round(($player->getHealth() / $player->getHealthMax()), 2, PHP_ROUND_HALF_UP) * 100) . '%)
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="' . (round(($player->getHealth() / $player->getHealthMax()), 2, PHP_ROUND_HALF_UP) * 100) . '" aria-valuemin="0" aria-valuemax="100" style=" width:' . (($player->getHealth() / $player->getHealthMax()) * 100) . '%;" ></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#D4C0A1" style="text-align: center">
                                            <td><b>Mana:</b></td>
                                            <td>
                                                ' . $player->getMana() . '/' . $player->getManaMax() . ' (' . (round(($player->getMana() / $player->getManaMax()), 2, PHP_ROUND_HALF_UP) * 100) . '%)
                                                <div class="progress">
                                                    <div class="progress-bar bg-default" role="progressbar" aria-valuenow="' . (round(($player->getMana() / $player->getManaMax()), 2, PHP_ROUND_HALF_UP) * 100) . '" aria-valuemin="0" aria-valuemax="100" style="width:' . (($player->getMana() / $player->getManaMax()) * 100) . '%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table width="100%" class="Table30">
                                    <tbody>
                                        <tr bgcolor="#F1E0C6">
                                            <td width="80px"><b>Exp:</b></td>
                                            <td>Have <b>' . $player->getExperience() . '</b> and need <b>' . ($player->getExpForLevel($player->getLevel() + 1) - $player->getExperience()) . '</b> to Level <b>' . ($player->getLevel() + 1) . '</b>.</td>
                                        </tr>
                                        <tr bgcolor="#D4C0A1">
                                            <td><b>Percent:</b></td>
                                            <td style="text-align: center">
                                                ' . $next_lvl_percent . '%
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="' . $next_lvl_percent . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $next_lvl_percent . '%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table width="100%" class="Table30">
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;"><a href="?subtopic=highscores&list=5"><img class="SkillIcon" src="images/skills/level.gif" alt="" style="border-style: none"></a></td>
                                            <td style="text-align: center;"><a href="?subtopic=highscores&list=9"><img class="SkillIcon" src="images/skills/ml.gif" alt="" style="border-style: none"></a></td>
                                            <td style="text-align: center;"><a href="?subtopic=highscores&list=7"><img class="SkillIcon" src="images/skills/fist.gif" alt="" style="border-style: none"></a></td>
                                            <td style="text-align: center;"><a href="?subtopic=highscores&list=3"><img class="SkillIcon" src="images/skills/club.gif" alt="" style="border-style: none"></a></td>
                                            <td style="text-align: center;"><a href="?subtopic=highscores&list=11"><img class="SkillIcon" src="images/skills/sword.gif" alt="" style="border-style: none"></a></td>
                                            <td style="text-align: center;"><a href="?subtopic=highscores&list=2"><img class="SkillIcon" src="images/skills/axe.gif" alt="" style="border-style: none"></a></td>
                                            <td style="text-align: center;"><a href="?subtopic=highscores&list=4"><img class="SkillIcon" src="images/skills/dist.gif" alt="" style="border-style: none"></a></td>
                                            <td style="text-align: center;"><a href="?subtopic=highscores&list=10"><img class="SkillIcon" src="images/skills/def.gif" alt="" style="border-style: none"></a></td>
                                            <td style="text-align: center;"><a href="?subtopic=highscores&list=6"><img class="SkillIcon" src="images/skills/fish.gif" alt="" style="border-style: none"></a></td>
                                        </tr>
                                        <tr bgcolor="#D4C0A1">
                                            <td style="text-align: center;"><strong>Level</strong></td>
                                            <td style="text-align: center;"><strong>ML</strong></td>
                                            <td style="text-align: center;"><strong>Fist</strong></td>
                                            <td style="text-align: center;"><strong>Mace</strong></td>
                                            <td style="text-align: center;"><strong>Sword</strong></td>
                                            <td style="text-align: center;"><strong>Axe</strong></td>
                                            <td style="text-align: center;"><strong>Dist</strong></td>
                                            <td style="text-align: center;"><strong>Def</strong></td>
                                            <td style="text-align: center;"><strong>Fish</strong></td>
                                        </tr>
                                        <tr bgcolor="#F1E0C6">
                                            <td style="text-align: center;">' . $player->getLevel() . '</td>
                                            <td style="text-align: center;">' . $player->getMagLevel() . '</td>
                                            <td style="text-align: center;">' . $player->getSkill(0) . '</td>
                                            <td style="text-align: center;">' . $player->getSkill(1) . '</td>
                                            <td style="text-align: center;">' . $player->getSkill(2) . '</td>
                                            <td style="text-align: center;">' . $player->getSkill(3) . '</td>
                                            <td style="text-align: center;">' . $player->getSkill(4) . '</td>
                                            <td style="text-align: center;">' . $player->getSkill(5) . '</td>
                                            <td style="text-align: center;">' . $player->getSkill(6) . '</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            ';
        $plus_content .= '</div><br/>';
//            $main_content .="<div class='TableContainer'>";
//            $main_content .=$make_content_header("Aditional Information");
//            $main_content .=$make_table_header();
        $main_content .= $plus_content;
		
	//quest list
	if(isset($config['site']['quests']) && is_array($config['site']['quests']) && count($config['site']['quests']) > 0)
		{
			$main_content .= '<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><TR BGCOLOR="'.$config['site']['vdarkborder'].'"><TD align="left" COLSPAN=2 CLASS=white><B>Quests</B></TD></TD align="right"></TD></TR>';		
			$number_of_quests = 0;
			foreach($config['site']['quests'] as $questName => $storageID)
			{
				$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
				$number_of_quests++;
				$main_content .= '<TR BGCOLOR="' . $bgcolor . '"><TD WIDTH=95%>' . $questName . '</TD>';
				if($player->getStorage($storageID) === null)
				{
					$main_content .= '<TD><img src="images/false.png"/></TD></TR>';
				}
				else
				{
					$main_content .= '<TD><img src="images/true.png"/></TD></TR>';
				}
			}
			$main_content .= '</TABLE></td></tr></table><br />';
		}
		
			//deaths list
			$player_deaths = new DatabaseList('PlayerDeath');
			$player_deaths->setFilter(new SQL_Filter(new SQL_Filter(new SQL_Field('player_id'), SQL_Filter::EQUAL, $player->getId()), SQL_Filter::CRITERIUM_AND,new SQL_Filter(new SQL_Field('id', 'players'), SQL_Filter::EQUAL, new SQL_Field('player_id', 'player_deaths'))));
			$player_deaths->addOrder(new SQL_Order(new SQL_Field('time'), SQL_Order::DESC));
			$player_deaths->setLimit(5);
	
			foreach($player_deaths as $death)
			{
				$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
				$deads++;
				$dead_add_content .= '<tr bgcolor="'.$bgcolor.'"><td width="20%" align="center">'.date("j M Y, H:i", $death->getTime()).'</td><td>Died at level ' . $death->getLevel() . ' by ' . $death->getKillerString();
				if($death->getMostDamageString() != '' && $death->getKillerString() != $death->getMostDamageString())
					$dead_add_content .= ' and ' . $death->getMostDamageString();
				$dead_add_content .= "</td></tr>";
			}
	
			if($deads > 0)
				$main_content .= '<table border="0" cellspacing="1" cellpadding="4" width="100%"><tr bgcolor="'.$config['site']['vdarkborder'].'"><td colspan="2" class="white" ><b>Character Deaths</b></td></tr>' . $dead_add_content . '</table><br />';
				
			if(!$player->isHidden()) {
				$main_content .= '
					<table border="0" cellspacing="1" cellpadding="4" width="100%" >
						<tr bgcolor="#505050">
							<td colspan="2" class="white" ><b>Account Information</b></td>
						</tr>';
				if ($account->getLoyalty() >= 50) {
					$accountTitle = ''; // none
					foreach($loyalty_title as $loypoints => $loytitle) {														
						if($account->getLoyalty() >= $loypoints) {
							# player rank
							$accountTitle = $loytitle;
						} 
					}
					
					$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
					$main_content .= '
						<tr bgcolor="'.$bgcolor.'" >
							<td width="20%">Loyalty Title:</td>
							<td>'.$accountTitle.' of '.$config['server']['serverName'].'</td>
						</tr>';
				}
					$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
					$main_content .= '
						<tr bgcolor="'.$bgcolor.'" >
							<td>Created:</td>
							<td>'.date("j F Y, g:i a", $account->getCreateDate()).'</td>
						</tr>';
				if($account->isBanned() > 0) {
					$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
					$main_content .= '
						<tr bgcolor="'.$bgcolor.'" >
							<td style="color:red;">Banished:</td>
							<td style="color:red;">'.date("j F Y, g:i a", strtotime($account->getBanTime())).'</td>
						</tr>';
				}
				$main_content .= '
					</table>
					<br />';
			}
			if(!$player->isHidden()) {
				$main_content .= '
					<table border="0" cellspacing="1" cellpadding="4" width="100%" >
						<tr bgcolor="#505050">
							<td colspan="5" class="white" ><b>Characters</b></td>
						</tr>';
					$main_content .= '
						<tr bgcolor="' . $bgcolor . '">
							<td><strong>Name</strong></td>
							<td><strong>World</strong></td>
							<td><strong>Status</strong></td>
							<td>&nbsp;</td>
						<tr>';
					$account_players = $account->getPlayersList();
					$player_number = 0;
					foreach($account_players as $player_list)
					{
						if(($name == $player_list->getName()) || (!$player_list->isHidden()))
						{
							$player_number++;
							$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
							if(!$player_list->isOnline())
								$player_list_status = '<font class="red"><strong>offline</strong></font>';
							else
								$player_list_status = '<font class="green"><strong>online</strong></font>';
							
							$main_content .= '
								<tr bgcolor="' . $bgcolor . '">
									<td width="35%">'.$player_number.'. '.htmlspecialchars($player_list->getName()).'</td>
									<td width="35%">'.htmlspecialchars($config['server']['serverName']).'</td>	
									<td width="70%">'.(($player_list->isDeleted()) ? 'deleted' : $player_list_status).'</td>
									<td>
										<table border="0" cellspacing="0" cellpadding="0">
											<form action="" method="post">
												<tr>
													<td>
														<input type="hidden" name="name" value="'.htmlspecialchars($player_list->getName()).'">
														<input type="image" name="View '.htmlspecialchars($player_list->getName()).'" alt="View '.htmlspecialchars($player_list->getName()).'" src="' .$layout_name. '/images/global/buttons/sbutton_view.gif" border="0" width="120" height="18">
													</td>
												</tr>
											</form>
										</table>
									</td>
								</tr>';
						}
					}
					
					$main_content .= '</table><br />';
			}
	}
	else
		$search_error = 'Character <b>'.htmlspecialchars($name).'</b> does not exist.';
}}
if(!empty($search_error))
{
	$main_content .= '
		<TABLE WIDTH=100% BORDER=0 CELLSPACING=1 CELLPADDING=4>
			<TR>
				<TD BGCOLOR="#505050" CLASS=white><B>Could not find character</B></TD>
			</TR>
			<TR>
				<TD BGCOLOR="#D4C0A1"><TABLE BORDER=0 CELLPADDING=1>
						<TR>
							<TD>'.$search_error.'</TD>
						</TR>
					</TABLE>
				</TD>
			</TR>
		</TABLE>
		<br />
		<br />';
}
$main_content .= '
	<form action="" method="post">
		<table width="100%" border="0" cellspacing="1" cellpadding="4">
			<tr>
				<td bgcolor="#505050" class="white"><b>Search Character</b></td>
			</tr>
			<tr>
				<td bgcolor="#D4C0A1">
					<table border="0" cellpading="1">
						<TR>
							<td>Name:</td>
							<td><input name="name" value="" size="29" maxlenght="29"></td>
							<td><input type="image" name="Submit" src="'.$layout_name.'/images/global/buttons/sbutton_submit.gif" border="0" width="120" height="18"></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</form>';