<?php
if(!defined('INITIALIZED'))
	exit;

if($action == "") {

	$guilds_list = new DatabaseList('Guild');
	$guilds_list->addOrder(new SQL_Order(new SQL_Field('name'), SQL_Order::ASC));
	
	$main_content .= '
	<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%>
			<TR>
				<TD><table border="0" cellspacing="0" cellpadding="0" >
						<form action="?subtopic=guilds&action=create" method="post" >
							<tr>
								<td style="border:0px;" >
									<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
										<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
											<input class="ButtonText" type="image" name="FoundGuild" alt="FoundGuild" src="'.$layout_name.'/images/global/buttons/_sbutton_foundguild.gif" >
										</div>
									</div>
								</td>
							</tr>
						</form>
					</table>
				</TD>
			</TR>
		</TABLE>
		<BR/>
		<div class="TableContainer" >
			<table class="Table3" cellpadding="0" cellspacing="0" >
				<div class="CaptionContainer" >
					<div class="CaptionInnerContainer" > 
						<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
						<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>						
						<div class="Text" >Active Guilds on ' .htmlspecialchars($config['server']['serverName']). '</div>
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
													<TR BGCOLOR=#D4C0A1>
														<TD WIDTH=64><B>Logo</B></TD>
														<TD WIDTH=100%><B>Description</B></TD>
														<TD WIDTH=56><B>&#160;</B></TD>
													</TR>';
												$showed_guilds = 1;
												if(count($guilds_list) > 0)
												{
													foreach($guilds_list as $guild)
													{
														if(is_int($showed_guilds / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $showed_guilds++;
														$description = $guild->getDescription();
														$newlines   = array("\r\n", "\n", "\r");
														$description_with_lines = str_replace($newlines, '<br />', $description, $count);
														if($count < $config['site']['guild_description_lines_limit'])
															$description = $description_with_lines;
														$main_content .= '
															<TR BGCOLOR='.$bgcolor.'>
																<TD><IMG SRC="'. $guild->getGuildLogoLink() .'" WIDTH=64 HEIGHT=64></TD>
																<TD><B>'.htmlspecialchars($guild->getName()).'</B><BR>'.$description.'</TD>
																<TD>
																	<table border="0" cellspacing="0" cellpadding="0" >
																		<form action="?subtopic=guilds&action=view" method="post" >
																			<tr>
																				<td style="border:0px;" ><input type="hidden" name=GuildName value="'.htmlspecialchars($guild->getName()).'" >
																					<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
																						<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
																							<input class="ButtonText" type="image" name="View" alt="View" src="'.$layout_name.'/images/global/buttons/_sbutton_view.gif" >
																						</div>
																					</div>
																				</td>
																			</tr>
																		</form>';
																	if($group_id_of_acc_logged >= $config['site']['access_admin_panel'])
																		$main_content .= '
																		<form action="?subtopic=guilds&action=deletebyadmin" method="post">
																			<tr>
																				<td style="border:0px;" >
																					<input type="hidden" name="guild" value="'.$guild->getId().'">
																					<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_red.gif)" >
																						<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_red_over.gif);" ></div>
																							<input class="ButtonText" type="image" name="Delete" alt="Delete" src="'.$layout_name.'/images/global/buttons/_sbutton_delete.gif" >
																						</div>
																					</div>
																				</td>
																			</tr>
																		</form>';
																	$main_content .= '
																	</table>
																</TD>
															</TR>';
													}
												}
												$main_content .= '
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
		</div>';
}
if($action == "view")
{
	$guild_name = (string) $_REQUEST['GuildName'];
	$guild = new Guild();
	$guild->loadByName($guild_name);
	if(!$guild->isLoaded())
		$guild_errors[] = 'Guild with name <b>'.$guild_name.'</b> doesn\'t exist.';
	
	if(!empty($guild_errors))
	{
		//errors
			$main_content .= '
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
								<div class="Text" >Error</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>';
											foreach($guild_errors as $guild_error)
												$main_content .= '<p>'.$guild_error;
										$main_content .= '
											</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
				</div><BR>
				<TABLE BORDER=0 WIDTH=100%>
					<TR>
						<TD ALIGN=center>
							<table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=guilds" method="post" >
									<tr>
										<td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>
					</TR>
				</TABLE>';
		//show errors
	}
	else
	{
		//check is it vice or/and leader account (leader has vice + leader rights)
		$guild_leader_char = $guild->getOwner();
		$rank_list = $guild->getGuildRanksList();
		$guild_leader = FALSE;
		$guild_vice = FALSE;
		if($logged)
		{
			$account_players = $account_logged->getPlayers();
			foreach($account_players as $player)
			{
				$players_from_account_ids[] = $player->getId();
				$player_rank = $player->getRank();
				if(!empty($player_rank))
					foreach($rank_list as $rank_in_guild)
						if($rank_in_guild->getId() == $player_rank->getId())
						{
							$players_from_account_in_guild[] = $player->getName();
							if($player_rank->getLevel() > 1)
							{
								$guild_vice = TRUE;
								$level_in_guild = $player_rank->getLevel();
							}
							if($guild->getOwner()->getId() == $player->getId())
							{
								$guild_vice = TRUE;
								$guild_leader = TRUE;
							}
						}
			}
		}
		
		//show guild page
		$description = $guild->getDescription();
		$newlines   = array("\r\n", "\n", "\r");
		$description_with_lines = str_replace($newlines, '<br />', $description, $count);
		if($count < $config['site']['guild_description_lines_limit'])
			$description = $description_with_lines;
		$guild_owner = $guild->getOwner();
		if($guild_owner->isLoaded())
			$guild_owner = $guild_owner->getName();		
		
		$main_content .= '
			<TABLE BORDER=0 WIDTH=100%>
				<TR>
					<TD WIDTH=64><IMG SRC="' . $guild->getGuildLogoLink() . '" WIDTH=64 HEIGHT=64></TD>
					<TD ALIGN=center WIDTH=100%><H1>'.htmlspecialchars($guild->getName()).'</H1></TD>
					<TD WIDTH=64><IMG SRC="' . $guild->getGuildLogoLink() . '" WIDTH=64 HEIGHT=64></TD>
				</TR>
			</TABLE>
			<BR>
			<TABLE Width=100%>
				<colgroup>
				<col width="90%">
				<col width="10%">
				</colgroup>
				<TR>
					<TD style="vertical-align:top; padding-right: 5px;"><div class="TableContainer" >
							<table class="Table1" cellpadding="0" cellspacing="0" >
								<div class="CaptionContainer" >
									<div class="CaptionInnerContainer" > 
										<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>									
										<div class="Text" >Guild Information</div>
										<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
										<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
									</div>
								</div>
								<tr>
									<td><div class="InnerTableContainer" >';
									//show guild page
									$description = $guild->getDescription();
									$newlines   = array("\r\n", "\n", "\r");
									$description_with_lines = str_replace($newlines, '<br />', $description, $count);
									if($count < $config['site']['guild_description_lines_limit'])
										$description = $description_with_lines;
										$main_content .= '
											<table style="width:100%;" >
												<TR>
													<TD>
														<div id="GuildInformationContainer">
															'.$description.'<br><br>
															The guild was founded on '.$config['server']['serverName'].' on '.date("M d Y",$guild->getCreateDate()).'.<BR>
															It is currently active.<BR>
														</div>
													</TD>
												</TR>
											</table>
										</div>
									</td>
								</tr>
							</table>
						</div>
					</TD>
					<TD style="vertical-align:top;">
						<div class="TableContainer" >
							<table class="Table1" cellpadding="0" cellspacing="0" >
								<div class="CaptionContainer" >
									<div class="CaptionInnerContainer" > 
										<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
										<div class="Text" >Navigation</div>
										<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
										<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
									</div>
								</div>
								<tr>
									<td>
										<div class="InnerTableContainer" >
											<table style="width:100%;" >
												<tr>
													<td align="center"><div id="NavigationContainer">
															<table border="0" cellspacing="0" cellpadding="0" >
																<form action="?subtopic=guilds" method="post" >
																	<tr>
																		<td style="border:0px;" >
																		<div style="height:18px;"></div>
																			<input type="hidden" name=action value=guildwars >
																			<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
																			<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
																				<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
																					<input class="ButtonText" type="image" name="Guild Wars" alt="Guild Wars" src="'.$layout_name.'/images/global/buttons/_sbutton_guildwars.gif" >
																				</div>
																			</div>
																		</td>
																	</tr>
																</form>
															</table>
															<div style="font-size:1px;height:4px;" ></div>
															<div style="font-size:1px;height:4px;" ></div>
														</div>
													</td>
												</tr>
											</table>
										</div>
									</td>
								</tr>
							</table>
						</div>';
				if($guild_leader)
					$main_content .= '
						<div style="font-size:1px;height:6px;" ></div>
						<div class="TableContainer" >
							<table class="Table1" cellpadding="0" cellspacing="0" >
								<div class="CaptionContainer" >
									<div class="CaptionInnerContainer" > 
										<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>										
										<div class="Text" >Administration</div>
										<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
										<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
									</div>
								</div>
								<tr>
									<td><div class="InnerTableContainer" >
											<table style="width:100%;" >
												<TR>
													<TD align="center">
														<div id="AdministrationContainer">
															<table border="0" cellspacing="0" cellpadding="0" >
																<form action="?subtopic=guilds" method="post" >
																	<tr>
																		<td style="border:0px;" >
																			<input type="hidden" name=action value=description >
																			<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
																			<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
																				<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
																					<input class="ButtonText" type="image" name="Edit Description" alt="Edit Description" src="'.$layout_name.'/images/global/buttons/_sbutton_editdescription.gif" >
																				</div>
																			</div>
																		</td>
																	</tr>
																</form>
															</table>															
															<div style="font-size:1px;height:4px;" ></div>													
															<table border="0" cellspacing="0" cellpadding="0" >
																<form action="?subtopic=guilds" method="post" >
																	<tr>
																		<td style="border:0px;" >
																			<input type="hidden" name=action value=disband >
																			<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
																			<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
																				<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
																					<input class="ButtonText" type="image" name="Disband Guild" alt="Disband Guild" src="'.$layout_name.'/images/global/buttons/_sbutton_disbandguild.gif" >
																				</div>
																			</div>
																		</td>
																	</tr>
																</form>
															</table>
															<div style="font-size:1px;height:4px;" ></div>
															<table border="0" cellspacing="0" cellpadding="0" >
																<form action="?subtopic=guilds" method="post" >
																	<tr>
																		<td style="border:0px;" >
																			<input type="hidden" name=action value=resignleadership >
																			<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
																			<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
																				<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
																					<input class="ButtonText" type="image" name="Resign Leadership" alt="Resign Leadership" src="'.$layout_name.'/images/global/buttons/_sbutton_resignleadership.gif" >
																				</div>
																			</div>
																		</td>
																	</tr>
																</form>
															</table>
														</div>
													</td>
												</tr>
											</table>
										</div>
									</td>
								</tr>
							</table>
						</div>';
				$main_content .= '
					</TD>
				</TR>
			</TABLE>
			<script type="text/javascript" >
			$(document).ready(function() {
				var g_GuildInformationContainerHeight = $(\'#GuildInformationContainer\').height();
				if($(\'#AdministrationContainer\').length > 0) {
				  var g_AdministrationContainerHeight = $(\'#AdministrationContainer\').height() + 28;
				  var g_NavigationContainerHeight = $(\'#NavigationContainer\').height() + 28;
				} else {
				  var g_NavigationContainerHeight = $(\'#NavigationContainer\').height();
				  var g_AdministrationContainerHeight = 0;
				}
				//alert(g_GuildInformationContainerHeight+\' \'+g_NavigationContainerHeight+\' \'+g_AdministrationContainerHeight);
				if(g_GuildInformationContainerHeight < g_NavigationContainerHeight + g_AdministrationContainerHeight) {
				  $(\'#GuildInformationContainer\').css(\'height\', g_NavigationContainerHeight + g_AdministrationContainerHeight);
				} else {
				  if($(\'#AdministrationContainer\').length > 0) {
					$(\'#NavigationContainer\').css(\'height\', g_GuildInformationContainerHeight * 0.7 - 28);
					$(\'#AdministrationContainer\').css(\'height\', g_GuildInformationContainerHeight * 0.3 - 28);
				  } else {
					$(\'#NavigationContainer\').css(\'height\', g_GuildInformationContainerHeight);
				  }
				}
			  });</script> 
			<BR>
			<div class="TableContainer" >
				<table class="Table3" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" />
								</span>
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" />
								</span>
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" />
								</span>
							
							<div class="Text" >Guild Members</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" />
								</span>
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" />
								</span>
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" />
								</span>
						</div>
					</div>
					<tr>
							<td>
						<div class="InnerTableContainer" >
							<table style="width:100%;" >
								<tr><td>
									<div class="TableShadowContainerRightTop" >
										<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
									</div>
									<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
										<div class="TableContentContainer" >
											<table class="TableContent" width="100%" >
												<tr class="LabelH">
													<td>Rank <small style="font-weight:normal;" >[<a href="#" >sort</a>]</small> 
													<img class="sortarrow" src="'.$layout_name.'/images/global/content/order_desc.gif" /></td>
													<td>Name and Title</td>
													<td>Vocation <small style="font-weight:normal;" >[<a href="#" >sort</a>]</small> 
													<img class="sortarrow" src="'.$layout_name.'/images/global/general/blank.gif" /></td>
													<td>Level <small style="font-weight:normal;" >[<a href="#" >sort</a>]</small> 
													<img class="sortarrow" src="'.$layout_name.'/images/global/general/blank.gif" /></td>
													<td>Status</td>
												</tr>';
											#show players
											$showed_players = 1;
											foreach($rank_list as $rank) {
												$oi = 0;
												if(!isset($_REQUEST['onlyshowonline']) || $_REQUEST['onlyshowonline'] == 0)
													$players_with_rank = $rank->getPlayersList();
												else
													$players_with_rank = $rank->getOnlinePlayersList();
												$players_with_rank_number = count($players_with_rank);
												if($players_with_rank_number > 0) {
													if(is_int($showed_players / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; }
													$showed_players++;
													foreach($players_with_rank as $player) {
														$oi++;
														$main_content .= '
															<TR BGCOLOR='.$bgcolor.'>
																<TD>'.(($oi == 1) ? htmlspecialchars($rank->getName()) : '').'</TD>
																<TD>
																	<A HREF="?subtopic=characters&name='.urlencode($player->getName()).'">'.htmlspecialchars($player->getName()).'</A>';
																	if ($player->getGuildNick() != "")
																		$main_content .= ' (' . $player->getGuildNick() . ')';
															$main_content .= '
																</TD>
																	<TD>' . htmlspecialchars(Website::getVocationName($player->getVocation())) . '</TD>
																	<TD>' . htmlspecialchars($player->getLevel()) . '</TD>
																	<TD class="onlinestatus"><span '.((!$player->isOnline()) ? 'class="red"' : 'class="green"').'>'.((!$player->isOnline()) ? 'offline' : '<strong>online</strong>').'</span>
																</TD>
															</TR>';
													}
												}
											}
											$main_content .= '
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
								<tr>
									<td>';
								if(!isset($_REQUEST['onlyshowonline']) || $_REQUEST['onlyshowonline'] == 0)
									$main_content .= '
										<table class="InnerTableButtonRow" cellpadding="0" cellspacing="0" >
											<tr>
												<td></td>
												<td align="right" style="padding-right:7px;width:100%;" >
													<form action="?subtopic=guilds" method="post" style="padding:0px;margin:0px;" >
														<input type="hidden" name="action" value="view" >
														<input type="hidden" name="onlyshowonline" value="1" >
														<input type="hidden" name="GuildName" value="'.$_REQUEST['GuildName'].'" >
														<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
															<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
																<input class="ButtonText" type="image" name="Show Online" alt="Show Online" src="'.$layout_name.'/images/global/buttons/_sbutton_showonline.gif" >
															</div>
														</div>
													</form>
												</td>
											</tr>
										</table>';
								else
									$main_content .= '
										<table class="InnerTableButtonRow" cellpadding="0" cellspacing="0" >
											<tr>
												<td></td>
												<td align="right" style="padding-right:7px;width:100%;" >
													<form action="?subtopic=guilds" method="post" style="padding:0px;margin:0px;" >
														<input type="hidden" name="action" value="view" >
														<input type="hidden" name="onlyshowonline" value="0" >
														<input type="hidden" name="GuildName" value="'.$_REQUEST['GuildName'].'" >
														<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
															<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
																<input class="ButtonText" type="image" name="Show All" alt="Show All" src="'.$layout_name.'/images/global/buttons/_sbutton_showall.gif" >
															</div>
														</div>
													</form>
												</td>
											</tr>
										</table>';
								$main_content .= '
									</td>
								</tr>
							</table>
						</div>
						</td>
					</tr>
				</table>
			</div>';
		if($logged) {
			$main_content .= '
				<TABLE BORDER=0 class="fixed">
					<TR>
					<col width="140px">
					<col width="140px">
					<col width="140px">
					<col width="140px">
					<col width="140px">
					<col width="140px">';
				if($guild_vice)
					$main_content .= '					
						<TD>
							<table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=guilds" method="post" >
									<tr>
										<td style="border:0px;" >
											<input type="hidden" name=action value=members >
											<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
											<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Edit Members" alt="Edit Members" src="'.$layout_name.'/images/global/buttons/_sbutton_editmembers.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>';
					if($guild_leader)
					#Edit players ranks
						$main_content .= '
							<TD>
								<table border="0" cellspacing="0" cellpadding="0" >
									<form action="?subtopic=guilds" method="post" >
										<tr>
											<td style="border:0px;" >
												<input type="hidden" name=action value=ranks >
												<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
												<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
													<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
														<input class="ButtonText" type="image" name="Edit Ranks" alt="Edit Ranks" src="'.$layout_name.'/images/global/buttons/_sbutton_editranks.gif" >
													</div>
												</div>
											</td>
										</tr>
									</form>
								</table>
							</TD>';
				if($players_from_account_in_guild > 0)
						$main_content .= '
							<TD>
								<table border="0" cellspacing="0" cellpadding="0" >
									<form action="?subtopic=guilds" method="post" >
										<tr>
											<td style="border:0px;" >
												<input type="hidden" name=action value=leave >
												<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
												<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
													<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
														<input class="ButtonText" type="image" name="Leave Guild" alt="Leave Guild" src="'.$layout_name.'/images/global/buttons/_sbutton_leaveguild.gif" >
													</div>
												</div>
											</td>
										</tr>
									</form>
								</table>
							</TD>';
				$main_content .= '
					</TR>
				</TABLE>';
		}
		$main_content .= '
		<BR>
			<div class="TableContainer" >
				<table class="Table3" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
							<div class="Text" >Invited Characters</div>
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
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%" >';
												$invited_list = $guild->listInvites();
												if(count($invited_list) == 0)
													$main_content .= '
														<TR BGCOLOR=#F1E0C6>
															<TD>No invited characters found.</TD>
														</TR>';
												else {
													$main_content .= '
														<TR BGCOLOR=#D4C0A1>
															<TD WIDTH=70%><B>Name</B></TD>
															<TD WIDTH=30%><B>Invitation Date</B></TD>
														</TR>';
													$show_accept_invite = 0;
													$showed_invited = 1;
													foreach($invited_list as $invited_player) {
														if(count($account_players) > 0)
															foreach($account_players as $player_from_acc)
																if($player_from_acc->getName() == $invited_player->getName())
																	$show_accept_invite++;
														if(is_int($showed_invited / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $showed_invited++;
														$main_content .= '
															<TR BGCOLOR='.$bgcolor.'>
																<TD><A HREF="?subtopic=characters&name='.urlencode($invited_player->getName()).'">'.htmlspecialchars($invited_player->getName()).'</A></TD>';
															$invitedID = $invited_player->getId();
															$getInviteDate = $SQL->query("SELECT `date` FROM `guild_invites` WHERE `player_id` = '$invitedID'")->fetch();
															$main_content .= '
																<TD>'.date("M d Y",$getInviteDate['date']).'</TD>
															</TR>';
													}
													
												}
												$main_content .= '
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
			</div>';
		
			$main_content .= '
				<TABLE BORDER=0 class="fixed">
					<col width="140px">
					<col width="140px">
					<col width="140px">
					<col width="140px">
					<col width="140px">
					<TR>';
				if($guild_vice)
					$main_content .= '
						<TD><table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=guilds" method="post" >
									<tr>
										<td style="border:0px;" >
											<input type="hidden" name=action value=invite >
											<input type="hidden" name=GuildName value="'.$guild->getName().'" >
											<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Invite Character" alt="Invite Character" src="'.$layout_name.'/images/global/buttons/_sbutton_invitecharacter.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>';
				if($show_accept_invite > 0)
					$main_content .= '
						<TD>
							<table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=guilds" method="post" >
									<tr>
										<td style="border:0px;" >
											<input type="hidden" name=action value=join >
											<input type="hidden" name=GuildName value="'.$guild->getName().'" >
											<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Join Guild" alt="Join Guild" src="'.$layout_name.'/images/global/buttons/_sbutton_joinguild.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>';
				$main_content .= '
					</TR>
				</TABLE>';
		$main_content .= '
			<BR>
			<TABLE BORDER=0 WIDTH=100%>
				<TR>
					<TD ALIGN=center><IMG SRC="'.$layout_name.'/images/global/general/blank.gif" WIDTH=80 HEIGHT=1 BORDER=0<BR></TD>					
					<TD ALIGN="center">
						<form action="?subtopic=guilds" method="post" style="padding:0px;margin:0px;" >
							<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
								<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
									<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
								</div>
							</div>
						</form>
					</TD>
					<TD ALIGN=center><IMG SRC="'.$layout_name.'/images/global/general/blank.gif" WIDTH=80 HEIGHT=1 BORDER=0<BR></TD>
				</TR>
			</TABLE>';
	}
}
if($action == "create") {
	$guild_name = trim($_REQUEST['name']);
	$leader = $_REQUEST['leader'];
	$todo = $_REQUEST['todo'];
	$guild_password = trim($_REQUEST['password']);	
	if(!$logged)
		$guild_errors[] = 'You are not logged in. You can\'t create guild.';
	if(empty($guild_errors)) 
	{
		$account_players = $account_logged->getPlayers();
		foreach($account_players as $player)
		{
			$player_rank = $player->getRank();
			if(empty($player_rank))
				if($player->getLevel() >= $config['site']['guild_need_level'])
					if(!$config['site']['guild_need_pacc'] || $account_logged->isPremium())
						$array_of_player_nig[] = $player->getName();
		}
	}
	if(count($array_of_player_nig) == 0)
		$guild_errors[] = 'On your account all characters are in guilds or have too low level to create new guild.';
	if($todo == "save") {
		if(!check_guild_name($guild_name)) {
			$guild_errors[] = 'Invalid guild name format.';
		}
		if(!check_name($leader)) {
			$guild_errors[] = 'Invalid character name format.';
		}
		if(empty($guild_errors)) {
			$player = new Player();
			$player->find($leader);
			if(!$player->isLoaded())
				$guild_errors[] = 'Character <b>'.htmlspecialchars($leader).'</b> doesn\'t exist.';
		}
		if(empty($guild_errors)) {
			$guild = new Guild();
			$guild->find($guild_name);
			if($guild->isLoaded())
				$guild_errors[] = 'Guild <b>'.htmlspecialchars($guild_name).'</b> already exist. Select other name.';
		}
		if(empty($guild_errors)) {
			$bad_char = TRUE;
			foreach($array_of_player_nig as $nick_from_list)
				if($nick_from_list == $player->getName())
					$bad_char = FALSE;
			if($bad_char)
				$guild_errors[] = 'Character <b>'.htmlspecialchars($leader).'</b> isn\'t on your account or is already in guild.';
		}
		if(empty($guild_errors)) {
			if($player->getLevel() < $config['site']['guild_need_level'])
				$guild_errors[] = 'Character <b>'.htmlspecialchars($leader).'</b> has too low level. To create guild you need character with level <b>'.$config['site']['guild_need_level'].'</b>.';
			if($config['site']['guild_need_pacc'] && !$account_logged->isPremium())
				$guild_errors[] = 'Character <b>'.htmlspecialchars($leader).'</b> is on FREE account. To create guild you need PREMIUM account.';
		}
		if(empty($guild_errors)) {
			if (!$account_logged->isValidPassword($guild_password))
				$guild_errors[] = 'Wrong password, please check it and try again.';
		}
	}
	
	if(!empty($guild_errors)) {
		$main_content .= '
			<div class="TableContainer" >
				<table class="Table1" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>						
							<div class="Text" >Error</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						</div>
					</div>
					<tr>
						<td>
							<div class="InnerTableContainer" >
								<table style="width:100%;" >
									<tr>
										<td>';
									foreach($guild_errors as $guild_error)
										$main_content .= '<p>'.$guild_error.'</p>';
									$main_content .= '
										</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div><BR>
			<TABLE BORDER=0 WIDTH=100%>
				<TR>
					<TD ALIGN=center>
						<table border="0" cellspacing="0" cellpadding="0" >
							<form action="?subtopic=guilds" method="post" >
								<tr>
									<td style="border:0px;" >';
									if ($logged)
										if(count($array_of_player_nig) > 0)
											$main_content .= '
												<input type="hidden" name=action value=create >';
									$main_content .= '
										<input type="hidden" name=name value="'.$guild_name.'" >
										<input type="hidden" name=leader value="'.$leader.'" >
										<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
											<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
												<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
											</div>
										</div>
									</td>
								</tr>
							</form>
						</table>
					</TD>
				</TR>
			</TABLE>';
	} else {
		if($todo == "save")
		{
			$new_guild = new Guild();
			$new_guild->setCreationData(time());
			$new_guild->setName($guild_name);
			$new_guild->setOwner($player);
			$new_guild->setDescription('New guild. Leader must edit this text :)');
			$new_guild->setGuildLogo('image/gif', Website::getFileContents('./images/guildlogos/default_logo.gif'));
			
			$new_guild->save();
			$ranks = $new_guild->getGuildRanksList(true);
			foreach($ranks as $rank)
				if($rank->getLevel() == 3)
				{
					$player->setRank($rank);
					$player->save();
				}
			$main_content .= '
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>						
								<div class="Text" >Guild Founded!</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>You have founded the '.htmlspecialchars($guild_name).'. Now go ahead and invite the first members.</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
				</div><br>
				<TABLE BORDER=0 WIDTH=100%>
					<TR>
						<TD ALIGN=center>
							<table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=guilds" method="post" >
									<tr>
										<td style="border:0px;" >
											<input type="hidden" name=action value=view >
											<input type="hidden" name=GuildName value="'.$guild_name.'" >
											<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Continue" alt="Continue" src="'.$layout_name.'/images/global/buttons/_sbutton_continue.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>
					</TR>
				</TABLE>';
		} else {
			#form to create
			$main_content .= 'Do you want to found a new guild? none of your characters may hold one of the two highest ranks in any other guild.<BR><BR>Now enter the name of the new guild, specify the name of your character that should become the first leader and confirm with your account password. Then click on "Submit". Note that the first two data cannot be changed later.<BR><BR>';
			$main_content .= '
				<FORM ACTION="?subtopic=guilds" METHOD="post">
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>						
								<div class="Text" >Found Guild</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<TR>
											<TD BGCOLOR=#D4C0A1>
												<TABLE BORDER=0 CELLPADDING=1>
													<TR>
														<TD>Guild Name:</TD>
														<TD><INPUT NAME="name" VALUE="'.$_REQUEST['name'].'" SIZE=30 MAXLENGTH=29></TD>
													</TR>
													<TR>
														<TD>Leader:</TD>
														<TD>
															<SELECT NAME="leader">';
																if(count($array_of_player_nig) > 0) {
																	sort($array_of_player_nig);
																	foreach($array_of_player_nig as $nick)
																		$main_content .= '<OPTION>'.htmlspecialchars($nick).'</OPTION>';
																}
														$main_content .= '
															</SELECT>
														</TD>
													</TR>
													<TR>
														<TD>Password:</TD>
														<TD><INPUT TYPE=password NAME="password" SIZE=30 MAXLENGTH=29></TD>
													</TR>
												</TABLE>
											</TD>
										</TR>
									</table>
								</div>
							</td>
						</tr>
					</table>
				</div><BR>
				<TABLE BORDER=0 WIDTH=100%>
					<TR>
						<TD ALIGN=center><IMG SRC="'.$layout_name.'/images/global/general/blank.gif" WIDTH=120 HEIGHT=1 BORDER=0><BR></TD>
						<TD ALIGN=center>
							<table border="0" cellspacing="0" cellpadding="0" >
								<tr>
									<td style="border:0px;" >
										<input type="hidden" name="todo" value="save" >
										<input type="hidden" name="action" value="create" >
										<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
											<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
												<input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/global/buttons/_sbutton_submit.gif" >
											</div>
										</div>
									</td>
								<tr>
							</form>
							</table>
						</TD>
						<TD ALIGN=center>
							<table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=guilds" method="post" >
									<tr>
										<td style="border:0px;" >
											<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>
						<TD ALIGN=center><IMG SRC="'.$layout_name.'/images/global/general/blank.gif" WIDTH=120 HEIGHT=1 BORDER=0><BR></TD>
					</TR>
				</TABLE>';
		}
	}
}
if ($action == "invite") {
	//set rights in guild
	$guild_name = (string) $_REQUEST['GuildName'];
	$name = $_REQUEST['character'];
	if(!$logged)
		$guild_errors[] = 'You are not logged in. You can\'t invite players.';
	if(empty($guild_errors))
	{
		$guild = new Guild();
		$guild->loadByName($guild_name);
		if(!$guild->isLoaded())
			$guild_errors[] = 'Guild with ID <b>'.$guild_id.'</b> doesn\'t exist.';
	}
	if(empty($guild_errors))
	{
		$rank_list = $guild->getGuildRanksList();
		$guild_leader = FALSE;
		$guild_vice = FALSE;
		$account_players = $account_logged->getPlayers();
		foreach($account_players as $player)
		{
			$player_rank = $player->getRank();
			if(!empty($player_rank))
				foreach($rank_list as $rank_in_guild)
					if($rank_in_guild->getId() == $player_rank->getId())
					{
						$players_from_account_in_guild[] = $player->getName();
						if($player_rank->getLevel() > 1)
						{
							$guild_vice = TRUE;
							$level_in_guild = $player_rank->getLevel();
						}
						if($guild->getOwner()->getId() == $player->getId())
						{
							$guild_vice = TRUE;
							$guild_leader = TRUE;
						}
					}
		}
	}
	if(!$guild_vice)
		$guild_errors[] = 'You are not a leader or vice leader of guild ID <b>'.$guild_name.'</b>.';
	if($_REQUEST['invitation'] == 'yes')
	{
		if(!check_name($name))
			$guild_errors[] = 'Invalid name format.';
		if(empty($guild_errors))
		{
			$player = new Player();
			$player->find($name);
			if(!$player->isLoaded())
				$guild_errors[] = 'Character <b>'.htmlspecialchars($name).'</b> doesn\'t exist.';
			else
			{
				$rank_of_player = $player->getRank();
				if(!empty($rank_of_player))
					$guild_errors[] = 'Character <b>'.htmlspecialchars($name).'</b> is already in guild. He must leave guild before you can invite him.';
			}
		}
		if(empty($guild_errors))
		{
			$invited_list = $guild->listInvites();
			if(count($invited_list) > 0)
				foreach($invited_list as $invited)
					if($invited->getName() == $player->getName())
						$guild_errors[] = '<b>'.htmlspecialchars($player->getName()).'</b> is already invited to your guild.';
		}
	}
	if($_REQUEST['invitation'] == 'no') {
		$player_remove_invite = $_REQUEST['character'];
		$player_noinvite = new Player();
		$player_noinvite->find($player_remove_invite);
		if($player_noinvite->isLoaded())
			$player_noinvite_id = $player_noinvite->getId();
		
	}
	
	if(!empty($guild_errors)) {
		$main_content .= '
			<div class="TableContainer" >
				<table class="Table1" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
							<div class="Text" >Error</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						</div>
					</div>
					<tr>
						<td>
							<div class="InnerTableContainer" >
								<table style="width:100%;" >
									<tr>
										<td class="red" >';
										foreach($guild_errors as $guild_error)
											$main_content .= '<p>'.$guild_error;
									$main_content .= '
										</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div><BR>';
	} else {
		if($_REQUEST['invitation'] == 'yes') {
			$guild->invite($player);
			//mensagem do char invitado
			$main_content .= '
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>						
								<div class="Text" >Character Invited</div>
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
											<td>'.htmlspecialchars($player->getName()).' has been invited.</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
				</div>
				<BR>';
		}
		if($_REQUEST['invitation'] == 'no') {
			$guild->deleteInvite($player_noinvite);
			$main_content .= '
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>								
								<div class="Text" >Invitation Cancelled</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>The invitation of '.$player_remove_invite.' has been cancelled.</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
				</div>
				<BR>';
		}
	}
		$main_content .= '
			Enter the name of a character you want to invite to your guild and click on "Submit".<BR><BR>';
		$main_content .= '
			<div class="TableContainer" >
				<table class="Table1" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>						
							<div class="Text" >Invite Character</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						</div>
					</div>
					<tr>
						<td>
							<div class="InnerTableContainer" >
								<table style="width:100%;" >
									<TR>
										<TD BGCOLOR=#D4C0A1>
											<FORM ACTION="?subtopic=guilds" METHOD=post>
												<TABLE BORDER=0 CELLPADDING=1>
													<TR>
														<TD>Name:</TD>
														<TD><INPUT NAME="character" VALUE="" SIZE=30 MAXLENGTH=30></TD>
														<TD WIDTH=100% ALIGN=right>
															<table border="0" cellspacing="0" cellpadding="0" >
																<tr>
																	<td style="border:0px;" >
																		<input type="hidden" name=action value=invite >
																		<input type="hidden" name=invitation value=yes >
																		<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
																		<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
																			<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
																				<input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/global/buttons/_sbutton_submit.gif" >
																			</div>
																		</div>
																	</td>													
																</tr>
															</table>
														</TD>
													</TR>
												</TABLE>
											</form>
										</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div>';
		$invited_list = $guild->listInvites();
		if(count($invited_list) > 0) {
			$main_content .= '
				<BR>
				If you want to cancel an invitation, select the according character and click on "Submit".<BR><BR>
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>								
								<div class="Text" >Cancel Invitation</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<TR>
											<TD BGCOLOR=#D4C0A1>
												<FORM ACTION="?subtopic=guilds" METHOD=post>
													<TABLE BORDER=0 CELLPADDING=1>
														<TR>
															<TD>Name:</TD>
															<TD>
																<SELECT NAME="character">';
															foreach($invited_list as $invited)
																$main_content .= '
																	<OPTION VALUE="'.$invited->getName().'">'.$invited->getName().'</OPTION>';
															$main_content .= '
																</SELECT>
															</TD>
															<TD WIDTH=100% ALIGN=right>
																<table border="0" cellspacing="0" cellpadding="0" >
																	<tr>
																		<td style="border:0px;" >
																			<input type="hidden" name=action value=invite >
																			<input type="hidden" name=invitation value=no >
																			<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
																			<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
																				<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
																					<input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/global/buttons/_sbutton_submit.gif" >
																				</div>
																			</div>
																		</td>														
																	<tr>
																</table>
															</TD>
														</TR>
													</TABLE>
												</FORM>
											</TD>
										</TR>
									</table>
								</div>
							</td>
						</tr>
					</table>
				</div>';
		}
		
		$main_content .= '
			<BR>
			<TABLE BORDER=0 WIDTH=100%>
				<TR>
					<TD ALIGN=center><table border="0" cellspacing="0" cellpadding="0" >
							<form action="?subtopic=guilds&action=view" method="post" >
								<tr>
									<td style="border:0px;" >
										<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
										<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
											<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
												<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
											</div>
										</div>
									</td>
								</tr>
							</form>
						</table>
					</TD>
				</TR>
			</TABLE>';
}
if($action == "leave") {
	//set rights in guild
	$guild_name = (string) $_REQUEST['GuildName'];
	$name = $_REQUEST['character'];
	if(!$logged)
		$guild_errors[] = 'You are not logged in. You can\'t leave guild.';
	if(empty($guild_errors))
	{
		$guild = new Guild();
		$guild->loadByName($guild_name);
		if(!$guild->isLoaded())
			$guild_errors[] = 'Guild <b>'.$guild_name.'</b> doesn\'t exist.';
	}

	if(empty($guild_errors))
	{
		$guild_owner_id = $guild->getOwner()->getId();
		if($_REQUEST['leaveguild'] == 'yes')
		{
			if(!check_name($name))
				$guild_errors[] = 'Invalid name format.';
			if(empty($guild_errors))
			{
				$player = new Player();
				$player->find($name);
				if(!$player->isLoaded())
					$guild_errors[] = 'Character <b>'.htmlspecialchars($name).'</b> doesn\'t exist.';
				else
					if($player->getAccount()->getId() != $account_logged->getId())
						$guild_errors[] = 'Character <b>'.htmlspecialchars($name).'</b> isn\'t from your account!';
			}
			if(empty($guild_errors))
			{
				$player_loaded_rank = $player->getRank();
				if(!empty($player_loaded_rank) && $player_loaded_rank->isLoaded())
				{
					if($player_loaded_rank->getGuild()->getId() != $guild->getId())
						$guild_errors[] = 'Character <b>'.htmlspecialchars($name).'</b> isn\'t from guild <b>'.htmlspecialchars($guild->getName()).'</b>.';
				}
				else
					$guild_errors[] = 'Character <b>'.htmlspecialchars($name).'</b> isn\'t in any guild.';
			}
			if(empty($guild_errors))
				if($guild_owner_id == $player->getId())
					$guild_errors[] = 'You can\'t leave guild. You are an owner of guild.';
		}
		else
		{
			$account_players = $account_logged->getPlayers();
			foreach($account_players as $player_fac)
			{
				$player_rank = $player_fac->getRank();
				if(!empty($player_rank))
					if($player_rank->getGuild()->getId() == $guild->getId())
						if($guild_owner_id != $player_fac->getId())
							$array_of_player_ig[] = $player_fac->getName();
			}
		}
	}
	if(!empty($guild_errors)) {
		$main_content .= '
			<div class="TableContainer" >
				<table class="Table1" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
							<div class="Text" >Error</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						</div>
					</div>
					<tr>
						<td>
							<div class="InnerTableContainer" >
								<table style="width:100%;" >
									<tr>
										<td class="red" >';
										foreach($guild_errors as $guild_error)
											$main_content .= '<p>'.$guild_error;
									$main_content .= '
										</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div><BR>';
	} else {
		if($_REQUEST['leaveguild'] == 'yes') {
			$player->setRank();
			$player->save();
			$main_content .= '				
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>								
								<div class="Text" >Guild Left</div>
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
											<td>You have left the guild.</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
				</div><BR>
				<TABLE BORDER=0 WIDTH=100%>
					<TR>
						<TD ALIGN=center><table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=guilds&page=view" method="post" >
									<tr>
										<td style="border:0px;" >
											<input type="hidden" name=action value=view >
											<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
											<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>
					</TR>
				</TABLE>';
		} else {
			$main_content .= '
				The following of your characters are members of this guild. If you want to leave, select a character and click on "Submit".<BR><BR>';
			$main_content .= '
				<FORM ACTION="?subtopic=guilds" METHOD=post>
					<div class="TableContainer" >
						<table class="Table1" cellpadding="0" cellspacing="0" >
							<div class="CaptionContainer" >
								<div class="CaptionInnerContainer" > 
									<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>				
									<div class="Text" >Guild Members</div>
									<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
									<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								</div>
							</div>
							<tr>
								<td><div class="InnerTableContainer" >
										<table style="width:100%;" >
											<TR>';
										if(count($array_of_player_ig) > 0) {
											$main_content .= '
												<TD BGCOLOR=#D4C0A1>';
												sort($array_of_player_ig);
												foreach($array_of_player_ig as $player_to_leave)
													$main_content .= '										
														<INPUT TYPE=radio NAME="character" VALUE="'.htmlspecialchars($player_to_leave).'" '.((count($array_of_player_ig) == 1) ? 'checked' : '').'>'.htmlspecialchars($player_to_leave).'<BR>';
											$main_content .= '</TD>';
										} else {
											$main_content .= '<TD BGCOLOR=#D4C0A1>Any of your characters can\'t leave guild.</TD>';
										}
										$main_content .= '										
											</TR>
										</table>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<BR>
					<TABLE BORDER=0 WIDTH=100%>
						<TR align="center">
							<TD ALIGN=center>
								<table border="0" cellspacing="0" cellpadding="0" >
									<tr>
										<td style="border:0px;" >
											<input type="hidden" name=action value=leave >
											<input type="hidden" name="leaveguild" value="yes">
											<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
											<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/global/buttons/_sbutton_submit.gif" >
												</div>
											</div>
										</td>					
									<tr>
								</form>
							</table>
						</TD>
						<TD ALIGN=center>
							<table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=guilds&action=view" method="post" >
									<tr>
										<td style="border:0px;" >
											<input type="hidden" name=action value=view >
											<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
											<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>
					</TR>
				</TABLE>';
		}
	}
}
if($action == "join") {
	//set rights in guild
	$guild_name = (string) $_REQUEST['GuildName'];
	$name = $_REQUEST['character'];
	if(!$logged)
		$guild_errors[] = 'You are not logged in. You can\'t accept invitations.';
	if(empty($guild_errors))
	{
		$guild = new Guild();
		$guild->loadByName($guild_name);
		if(!$guild->isLoaded())
			$guild_errors[] = 'Guild <b>'.$guild_name.'</b> doesn\'t exist.';
	}

	if($_REQUEST['joinguild'] == 'yes')
	{
		if(!check_name($name))
			$guild_errors[] = 'Invalid name format.';
		if(empty($guild_errors))
		{
			$player = new Player();
			$player->find($name);
			if(!$player->isLoaded())
			{
				$guild_errors[] = 'Player with name <b>'.htmlspecialchars($name).'</b> doesn\'t exist.';
			}
			else
			{
				$rank_of_player = $player->getRank();
				if(!empty($rank_of_player))
				{
					$guild_errors[] = 'Character with name <b>'.htmlspecialchars($name).'</b> is already in guild. You must leave guild before you join other guild.';
				}
			}
		}
	}
	if($_REQUEST['joinguild'] == 'yes')
	{
		if(empty($guild_errors))
		{
			$is_invited = FALSE;
			$invited_list = $guild->listInvites();
			if(count($invited_list) > 0)
			{
				foreach($invited_list as $invited)
				{
					if($invited->getName() == $player->getName())
					{
						$is_invited = TRUE;
					}
				}
			}
			if(!$is_invited)
			{
				$guild_errors[] = 'Character '.htmlspecialchars($player->getName()).' isn\'t invited to guild <b>'.htmlspecialchars($guild->getName()).'</b>.';
			}
		}
	} else
	{
		if(empty($guild_errors))
		{
			$acc_invited = FALSE;
			$account_players = $account_logged->getPlayers();
			$invited_list = $guild->listInvites();
			if(count($invited_list) > 0)
			{
				foreach($invited_list as $invited)
				{
					foreach($account_players as $player_from_acc)
					{
						if($invited->getName() == $player_from_acc->getName())
						{
							$acc_invited = TRUE;
							$list_of_invited_players[] = $player_from_acc->getName();
						}
					}
				}
			}
		}
		if(!$acc_invited)
		{
			$guild_errors[] = 'Any character from your account isn\'t invited to <b>'.htmlspecialchars($guild->getName()).'</b>.';
		}
	}
	if(!empty($guild_errors)) {
		$main_content .= '
			<div class="TableContainer" >
				<table class="Table1" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
							<div class="Text" >Error</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						</div>
					</div>
					<tr>
						<td>
							<div class="InnerTableContainer" >
								<table style="width:100%;" >
									<tr>
										<td class="red" >';
										foreach($guild_errors as $guild_error)
											$main_content .= '<p>'.$guild_error;
									$main_content .= '
										</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div><BR>';
	}else
	{
		if($_REQUEST['joinguild'] == 'yes') {
			$guild->acceptInvite($player);
			$main_content .= '				
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>								
								<div class="Text" >Guild Join</div>
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
											<td>You have joined the guild.</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
				</div><BR>
				<TABLE BORDER=0 WIDTH=100%>
					<TR>
						<TD ALIGN=center><table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=guilds&action=view" method="post" >
									<tr>
										<td style="border:0px;" >
											<input type="hidden" name=action value=view >
											<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
											<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>
					</TR>
				</TABLE>';
		} else {
			$main_content .= '
				The following of your characters are invited for this guild. If you want to join, select a character and click on "Submit".<BR><BR>';
			$main_content .= '
				<FORM ACTION="?subtopic=guilds" METHOD=post>
					<div class="TableContainer" >
						<table class="Table1" cellpadding="0" cellspacing="0" >
							<div class="CaptionContainer" >
								<div class="CaptionInnerContainer" > 
									<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>				
									<div class="Text" >Join Guild</div>
									<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
									<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								</div>
							</div>
							<tr>
								<td><div class="InnerTableContainer" >
										<table style="width:100%;" >
											<TR>';
										if(count($list_of_invited_players) > 0) {
											$main_content .= '
												<TD BGCOLOR=#D4C0A1>';
												sort($list_of_invited_players);
												foreach($list_of_invited_players as $invited_player_from_list)
													$main_content .= '										
														<INPUT TYPE=radio NAME="character" VALUE="'.htmlspecialchars($invited_player_from_list).'" '.((count($list_of_invited_players) == 1) ? 'checked' : '').'>'.htmlspecialchars($invited_player_from_list).'<BR>';
											$main_content .= '</TD>';
										} else {
											$main_content .= '<TD BGCOLOR=#D4C0A1>Any of your characters can\'t join guild.</TD>';
										}
										$main_content .= '										
											</TR>
										</table>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<BR>
					<TABLE BORDER=0 WIDTH=100%>
						<TR align="center">
							<TD ALIGN=center>
								<table border="0" cellspacing="0" cellpadding="0" >
									<tr>
										<td style="border:0px;" >
											<input type="hidden" name=action value=join >
											<input type="hidden" name="joinguild" value="yes">
											<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
											<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/global/buttons/_sbutton_submit.gif" >
												</div>
											</div>
										</td>					
									<tr>
								</form>
							</table>
						</TD>
						<TD ALIGN=center>
							<table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=guilds&action=view" method="post" >
									<tr>
										<td style="border:0px;" >
											<input type="hidden" name=action value=view >
											<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
											<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>
					</TR>
				</TABLE>';
		}
	}
}
if($action == "ranks") {
	//set rights in guild
	$guild_name = (string) $_REQUEST['GuildName'];
	$ranktorename = (int) $_REQUEST['ranktorename'];
	$new_rankname = (string) trim($_REQUEST['newrankname']);
	$rank_name = $_REQUEST['rank_name'];
	if(!$logged)
		$guild_errors[] = 'You are not logged in. You can\'t accept invitations.';
	if(empty($guild_errors)) {
		$guild = new Guild();
		$guild->loadByName($guild_name);
		if(!$guild->isLoaded())
			$guild_errors[] = 'Guild <b>'.$guild_name.'</b> doesn\'t exist.';
	}
	if(empty($guild_errors)) {
		$guild_leader_char = $guild->getOwner();
		$rank_list = $guild->getGuildRanksList();
		$guild_leader = FALSE;
		$account_players = $account_logged->getPlayers();
		foreach($account_players as $player)
			if($guild_leader_char->getId() == $player->getId())
			{
				$guild_leader = TRUE;
				$level_in_guild = 3;
			}
		if(!$guild_leader)
			$guild_errors[] = 'You are not leader of the Guild.';
	}
	if($_REQUEST['changerankname'] == "yes") {
		$rank_rename = new GuildRank();
		$rank_rename->load($ranktorename);
		if(!$rank_rename->isLoaded())
			$guild_errors[] = 'This rank doesn\'t exist.';
		if(!check_rank_name($new_rankname))
			$guild_errors[] = 'Invalid rank name. Please use only a-Z, 0-9 and spaces.';
	}
	
	if($_REQUEST['add_rank'] == "yes")
		if(!check_rank_name($rank_name))
			$guild_errors[] = 'Invalid rank name format.';
			
	if(!empty($guild_errors)) {
		//errors
		$main_content .= '
			<div class="TableContainer" >
				<table class="Table1" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
							<div class="Text" >Guild Rank Errors</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						</div>
					</div>
					<tr>
						<td>
							<div class="InnerTableContainer" >
								<table style="width:100%;" >
									<tr>
										<td class="red" >';
										foreach($guild_errors as $guild_error)
											$main_content .= '<p>'.$guild_error;
									$main_content .= '
										</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div><BR>';
	} else {
		if($_REQUEST['changerankname'] == "yes") {
			//renamed
			$rank_rename->setName($new_rankname);
			$rank_rename->save();
			$main_content .= '				
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>								
								<div class="Text" >Guild Rank</div>
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
											<td>The name of the rank was changed successfully.</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
				</div><BR>
				<TABLE BORDER=0 WIDTH=100%>
					<TR>
						<TD ALIGN=center><table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=guilds&action=view" method="post" >
									<tr>
										<td style="border:0px;" >
											<input type="hidden" name=action value=view >
											<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
											<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>
					</TR>
				</TABLE>';
			} elseif($_REQUEST['add_rank'] == "yes") {
			$new_rank = new GuildRank();
			$new_rank->setGuild($guild);
			$new_rank->setLevel(1);
			$new_rank->setName($rank_name);
			$new_rank->save();
			
			$main_content .= '				
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>								
								<div class="Text" >Guild Rank</div>
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
											<td>The rank was added to Guild.</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
				</div><BR>
				<TABLE BORDER=0 WIDTH=100%>
					<TR>
						<TD ALIGN=center><table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=guilds&action=view" method="post" >
									<tr>
										<td style="border:0px;" >
											<input type="hidden" name=action value=view >
											<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
											<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>
					</TR>
				</TABLE>';
		} else {
			$main_content .= '
				To change the name of a rank, simply edit name in the corresponding field and confirm the change by clicking on "Submit".<BR>
				<BR>
				<div class="TableContainer" >
					<table class="Table5" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>						
								<div class="Text" >Edit Guild Ranks</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>
												<div class="TableShadowContainerRightTop" >
													<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
												</div>
												<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
													<div class="TableContentContainer" >
														<table class="TableContent" width="100%" >
															<TR>
																<TD BGCOLOR=#D4C0A1>
																	<TABLE BORDER=0 CELLPADDING=2>
																		<FORM ACTION="?subtopic=guilds" METHOD=post>
																			<TR>
																				<TD>Set&nbsp;rank&nbsp;name</TD>
																				<TD>
																					<SELECT NAME="ranktorename">';
																				$rank_number = 0;
																				foreach($rank_list as $rank) {
																					$rank_number++;
																					$main_content .= '
																						<OPTION VALUE="'.$rank->getID().'">'.$rank_number.': '.$rank->getName().'</OPTION>';
																				}
																				$main_content .= '
																					</SELECT>
																				</TD>
																				<TD>to:</TD>
																				<TD><INPUT NAME="newrankname" VALUE="'.$_REQUEST['newrankname'].'" SIZE=30 MAXLENGTH=29></TD>
																				<TD WIDTH=100% ALIGN=right>
																					<table border="0" cellspacing="0" cellpadding="0" >
																						<tr>
																							<td style="border:0px;" >
																								<input type="hidden" name=action value=ranks >
																								<input type="hidden" name="changerankname" value="yes">
																								<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
																								<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
																									<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
																										<div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
																										<input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/global/buttons/_sbutton_submit.gif" >
																									</div>
																								</div>
																							</td>																	
																						<tr>
																					</table>
																				</TD>
																			</TR>
																		</FORM>
																	</TABLE>
																</TD>
															</TR>
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
				</div>
				<BR>
				<div class="TableContainer" >
					<table class="Table5" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>								
								<div class="Text" >Add new rank</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>
												<div class="TableShadowContainerRightTop" >
													<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
												</div>
												<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
													<div class="TableContentContainer" >
														<table class="TableContent" width="100%">
															<TR>
																<TD BGCOLOR=#D4C0A1>
																<FORM ACTION="?subtopic=guilds" METHOD=post>
																	<TABLE BORDER=0 CELLPADDING=3>
																		<tr>
																			<td valign="middle">New rank name:</td>
																			<td valign="middle">																				
																				<input type="text" name="rank_name" size="50" value="'.$_REQUEST['rank_name'].'">																				
																			</td>
																			<td valign="middle">
																					<input type="hidden" name=action value=ranks >
																					<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
																					<input type="hidden" name="add_rank" value="yes">
																					<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
																						<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
																							<div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
																							<input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/global/buttons/_sbutton_submit.gif" >
																						</div>
																					</div>
																				</FORM>
																			</td>
																		</tr>
																	</TABLE>
																</TD>
															</TR>
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
							</table>
						</div>
					</td>
				</tr>
				<br>
				<TABLE BORDER=0 WIDTH=100%>
					<TR>
						<TD ALIGN=center>
							<table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=guilds&action=view" method="post" >
									<tr>
										<td style="border:0px;" >
											<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
											<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>
					</TR>
				</TABLE>';
		}
	}
}

#organize ranks

if($action == "members") {
	
	#infos
	$guild_name = (string) $_REQUEST['GuildName'];
	$player_name = $_REQUEST['character'];
	$new_rank = (int) $_REQUEST['newrank'];
	$newtitle = trim($_REQUEST['newtitle']);
	
	if(!$logged)
		$guild_errors[] = 'You are not logged in. You can\'t change rank.';
		
	if(empty($guild_errors)) {
		$guild = new Guild();
		$guild->loadByName($guild_name);
		if(!$guild->isLoaded())
			$guild_errors[] = 'Guild <b>'.$guild_name.'</b> doesn\'t exist.';
	}
	
	if(empty($guild_errors)) {
		if($_REQUEST['promote'] == "yes")
			if(!isset($_REQUEST['function']) || $_REQUEST['function'] == "")
				$guild_errors[] = 'Select an action.';
	}
	
	if(empty($guild_errors)) {
		$rank_list = $guild->getGuildRanksList();
		$guild_leader = FALSE;
		$guild_vice = FALSE;
		$account_players = $account_logged->getPlayers();
		foreach($account_players as $player)
		{
			$player_rank = $player->getRank();
			if(!empty($player_rank))
				foreach($rank_list as $rank_in_guild)
					if($rank_in_guild->getId() == $player_rank->getId())
					{
						$players_from_account_in_guild[] = $player->getName();
						if($player_rank->getLevel() > 1) {
							$guild_vice = TRUE;
							$level_in_guild = $player_rank->getLevel();
						}
						if($guild->getOwner()->getId() == $player->getId()) {
							$guild_vice = TRUE;
							$guild_leader = TRUE;
						}
					}
		}
		
		//if(!$guild_vice)
			//$guild_errors[] = 'You are not leader or vice leader in the Guild.';
	}
	
	if(empty($guild_errors)) {
		foreach($rank_list as $rank)
		{
			if($guild_leader || $rank->getLevel() < $level_in_guild)
			{
				$ranks[$rid]['0'] = $rank->getId();
				$ranks[$rid]['1'] = $rank->getName();
				$rid++;
				$players_with_rank = $rank->getPlayersList();
				if(count($players_with_rank) > 0)
				{
					foreach($players_with_rank as $player)
					{
						if($guild->getOwner()->getId() != $player->getId() || $guild_leader)
						{
							$players_with_lower_rank[$sid]['0'] = htmlspecialchars($player->getName());
							$players_with_lower_rank[$sid]['1'] = htmlspecialchars($player->getName()).' ('.htmlspecialchars($rank->getName()).')';
							$sid++;
						}
					}
				}
			}
		}
		
		if($_REQUEST['promote'] == 'yes') {
			$player_to_change = new Player();
			$player_to_change->find($player_name);
			if(!$player_to_change->isLoaded())
				$guild_errors[] = 'Player with name '.htmlspecialchars($player_name).'</b> doesn\'t exist.';
		}
	}
	
	if(empty($guild_errors))
		if($_REQUEST['promote'] == 'yes') {
			if($_REQUEST['function'] == "setrank") {
				$rank = new GuildRank();
				$rank->load($new_rank);
				if(!$rank->isLoaded())
					$guild_errors[] = 'Rank with this ID doesn\'t exist.';
			}
			if($_REQUEST['function'] == "settile") {
				if(strlen($newtitle) >= 30)
					$guild_errors[] = 'Too long guild nick. Max. 30 chars, your: '.strlen($newtitle);
			}
			if($_REQUEST['function'] == "exclude") {
				if($guild->getOwner()->getName() == $player_to_change->getName())
					$guild_errors[] = 'It\'s not exclude guild owner!';
				
			}
		}
	
	if(!empty($guild_errors)) {
		//errors
		$main_content .= '
			<div class="TableContainer" >
				<table class="Table1" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
							<div class="Text" >Members Errors</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						</div>
					</div>
					<tr>
						<td>
							<div class="InnerTableContainer" >
								<table style="width:100%;" >
									<tr>
										<td>';
										foreach($guild_errors as $guild_error)
											$main_content .= '<p>'.$guild_error;
									$main_content .= '
										</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div><BR>
			<TABLE BORDER=0 WIDTH=100%>
					<TR>
						<TD ALIGN=center><table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=guilds&action=view" method="post" >
									<tr>
										<td style="border:0px;" >
											<input type="hidden" name=action value=members >
											<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
											<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>
					</TR>
				</TABLE>';
	} else {
		if($_REQUEST['promote'] == "yes") {
			if($_REQUEST['function'] == "setrank") {
				$player_to_change->setRank($rank);
				$player_to_change->save();
				$main_content .= '				
					<div class="TableContainer" >
						<table class="Table1" cellpadding="0" cellspacing="0" >
							<div class="CaptionContainer" >
								<div class="CaptionInnerContainer" > 
									<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>								
									<div class="Text" >Members</div>
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
												<td>Rank of player '.htmlspecialchars($player_to_change->getName()).' has been changed to '.htmlspecialchars($rank->getName()).'.</td>
											</tr>
										</table>
									</div>
								</td>
							</tr>
						</table>
					</div><BR>
					<TABLE BORDER=0 WIDTH=100%>
						<TR>
							<TD ALIGN=center><table border="0" cellspacing="0" cellpadding="0" >
									<form action="?subtopic=guilds&action=view" method="post" >
										<tr>
											<td style="border:0px;" >
												<input type="hidden" name=action value=view >
												<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
												<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
													<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
														<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
													</div>
												</div>
											</td>
										</tr>
									</form>
								</table>
							</TD>
						</TR>
					</TABLE>';
				unset($players_with_lower_rank);
				unset($ranks);
				$rid = 0;
				$sid= 0;
				foreach($rank_list as $rank)
				{
					if($guild_leader || $rank->getLevel() < $level_in_guild)
					{
						$ranks[$rid]['0'] = $rank->getId();
						$ranks[$rid]['1'] = $rank->getName();
						$rid++;
						$players_with_rank = $rank->getPlayersList();
						if(count($players_with_rank) > 0)
						{
							foreach($players_with_rank as $player)
							{
								if($guild->getOwner()->getId() != $player->getId() || $guild_leader)
								{
									$players_with_lower_rank[$sid]['0'] = htmlspecialchars($player->getName());
									$players_with_lower_rank[$sid]['1'] = htmlspecialchars($player->getName()).' ('.htmlspecialchars($rank->getName()).')';
									$sid++;
								}
							}
						}
					}
				}
			}
			if($_REQUEST['function'] == "settitle") {
				$player_to_change->setGuildNick($newtitle);
				$player_to_change->save();
				$main_content .= '				
					<div class="TableContainer" >
						<table class="Table1" cellpadding="0" cellspacing="0" >
							<div class="CaptionContainer" >
								<div class="CaptionInnerContainer" > 
									<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>								
									<div class="Text" >Members</div>
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
												<td>Title of player '.htmlspecialchars($player_to_change->getName()).' has been changed.</td>
											</tr>
										</table>
									</div>
								</td>
							</tr>
						</table>
					</div><BR>
					<TABLE BORDER=0 WIDTH=100%>
						<TR>
							<TD ALIGN=center><table border="0" cellspacing="0" cellpadding="0" >
									<form action="?subtopic=guilds&action=view" method="post" >
										<tr>
											<td style="border:0px;" >
												<input type="hidden" name=action value=view >
												<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
												<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
													<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
														<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
													</div>
												</div>
											</td>
										</tr>
									</form>
								</table>
							</TD>
						</TR>
					</TABLE>';
			}
			if($_REQUEST['function'] == "exclude") {
				$player_to_change->setRank();
				$player_to_change->save();
				$main_content .= '				
					<div class="TableContainer" >
						<table class="Table1" cellpadding="0" cellspacing="0" >
							<div class="CaptionContainer" >
								<div class="CaptionInnerContainer" > 
									<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>								
									<div class="Text" >Members</div>
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
												<td>Player with name '.htmlspecialchars($player->getName()).' has been excluded from your guild.</td>
											</tr>
										</table>
									</div>
								</td>
							</tr>
						</table>
					</div><BR>
					<TABLE BORDER=0 WIDTH=100%>
						<TR>
							<TD ALIGN=center>
								<table border="0" cellspacing="0" cellpadding="0" >
									<form action="?subtopic=guilds&action=view" method="post" >
										<tr>
											<td style="border:0px;" >
												<input type="hidden" name=action value=view >
												<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
												<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
													<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
														<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
													</div>
												</div>
											</td>
										</tr>
									</form>
								</table>
							</TD>
						</TR>
					</TABLE>';
			}
		} else {
			$main_content .= '
			Select a member and the action you want to perform, then click on "Submit".<BR><BR>
			<FORM ACTION="?subtopic=guilds" METHOD=post>
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>								
								<div class="Text" >Edit Members</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<TR>
											<TD BGCOLOR=#D4C0A1>
												<TABLE BORDER=0 CELLPADDING=1>
													<TR>
														<TD VALIGN=top>
															<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=1>
																<TR>
																	<TD>Name:</TD>
																	<TD>
																		<SELECT NAME="character">';
																	foreach($players_with_lower_rank as $player_to_list)
																		$main_content .= '
																			<option value="'.$player_to_list['0'].'">'.$player_to_list['1'].'</option>';
																	$main_content .= '
																		</SELECT>
																	</TD>
																</TR>
															</TABLE>
														</TD>
														<TD>&#160;&#160;&#160;</TD>
														<TD VALIGN=top>
															<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=1>
																<TR>
																	<TD>Action:</TD>
																	<TD><INPUT TYPE=radio NAME="function" VALUE="setrank" '.(($_REQUEST['function'] == "setrank") ? 'checked' : '').'>
																		Set rank to
																		<SELECT NAME="newrank">';
																	foreach($ranks as $rank)
																		$main_content .= '
																			<option value="'.htmlspecialchars($rank['0']).'" '.(($_REQUEST['newrank'] == $rank['0'])).'>'.htmlspecialchars($rank['1']).'</option>';
																	$main_content .= '
																		</SELECT>
																	</TD>
																</TR>';
														if($guild_leader) {
															$main_content .= '
																<TR>
																	<TD></TD>
																	<TD><INPUT TYPE=radio NAME="function" VALUE="settitle" '.(($_REQUEST['function'] == "settitle") ? 'checked' : '').'>
																		Set title to
																		<INPUT NAME="newtitle" SIZE=30 MAXLENGTH=29></TD>
																</TR>';
															$main_content .= '
																<TR>
																	<TD></TD>
																	<TD><INPUT TYPE=radio NAME="function" VALUE="exclude" '.(($_REQUEST['function'] == "exclude") ? 'checked' : '').'>
																		Exclude from guild </TD>
																</TR>';
														}
														$main_content .= '
															</TABLE>
														</TD>
													</TR>
												</TABLE>
											</TD>
										</TR>
									</table>
								</div>
							</td>
						</tr>
					</table>
				</div>
			<BR>
			<TABLE BORDER=0 WIDTH=100%>
				<TR align="center">
					<TD ALIGN=center>
						<table border="0" cellspacing="0" cellpadding="0" >
							<tr>
								<td style="border:0px;" >
									<input type="hidden" name=action value=members >
									<input type="hidden" name="promote" value="yes">
									<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
									<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
										<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
											<input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/global/buttons/_sbutton_submit.gif" >
										</div>
									</div>
								</td>			
							<tr>
						</table>
					</TD>
					</FORM>
					<TD ALIGN=center>
						<table border="0" cellspacing="0" cellpadding="0" >
							<form action="?subtopic=guilds&action=view" method="post" >
								<tr>
									<td style="border:0px;" >
										<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
										<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
											<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
												<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
											</div>
										</div>
									</td>
								</tr>
							</form>
						</table>
					</TD>
				</TR>
			</TABLE>';
		}
	}
	
	
	
} #members condition

if($action == "disband") {
	$guild_name = (string) $_REQUEST['GuildName'];
	$password = (string) trim($_REQUEST['password']);
	if(!$logged)
		$guild_errors[] = 'You are not logged in. You can\'t disband this Guild.';
	if(empty($guild_errors)) {
		$guild = new Guild();
		$guild->loadByName($guild_name);
		if(!$guild->isLoaded())
			$guild_errors[] = 'Guild <b>'.$guild_name.'</b> doesn\'t exist.';
	}
	if(empty($guild_errors)) {
		$guild_leader_char = $guild->getOwner();
			$rank_list = $guild->getGuildRanksList();
			$guild_leader = FALSE;
			$account_players = $account_logged->getPlayers();
			foreach($account_players as $player)
				if($guild->getOwner()->getId() == $player->getId())
				{
					$guild_vice = TRUE;
					$guild_leader = TRUE;
					$level_in_guild = 3;
				}
				if(!$guild_leader)
					$guild_errors[] = 'You are not leader of Guild.';
	}
	if(empty($guild_errors)) {
		if($_REQUEST['disband'] == "yes")
			if(!$account_logged->isValidPassword($password))
				$guild_errors[] = 'Wrong password.';
	}
	if(!empty($guild_errors)) {
		//errors
		$main_content .= '
			<div class="TableContainer" >
				<table class="Table1" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
							<div class="Text" >Error</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						</div>
					</div>
					<tr>
						<td>
							<div class="InnerTableContainer" >
								<table style="width:100%;" >
									<tr>
										<td>';
										foreach($guild_errors as $guild_error)
											$main_content .= '<p>'.$guild_error;
									$main_content .= '
										</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div><BR>
			<TABLE BORDER=0 WIDTH=100%>
						<TR>
							<TD ALIGN=center>
								<table border="0" cellspacing="0" cellpadding="0" >
									<form action="?subtopic=guilds" method="post" >
										<input type="hidden" name="action" value="disband">
										<input type="hidden" name="GuildName" value="'.$_REQUEST['GuildName'].'">
										<tr>
											<td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
													<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
														<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
													</div>
												</div>
											</td>
										</tr>
									</form>
								</table>
							</TD>
						</TR>
					</TABLE>';
	} else {
			if($_REQUEST['disband'] == "yes") {
				$guild->delete();
				$main_content .= '
					<div class="TableContainer" >
						<table class="Table1" cellpadding="0" cellspacing="0" >
							<div class="CaptionContainer" >
								<div class="CaptionInnerContainer" > 
									<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
									<div class="Text" >Guild Disbanded</div>
									<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
									<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								</div>
							</div>
							<tr>
								<td>
									<div class="InnerTableContainer" >
										<table style="width:100%;" >
											<tr>
												<td>You have disbanded the '.$_REQUEST['GuildName'].'.</td>
											</tr>
										</table>
									</div>
								</td>
							</tr>
						</table>
					</div><BR>
					<TABLE BORDER=0 WIDTH=100%>
						<TR>
							<TD ALIGN=center>
								<table border="0" cellspacing="0" cellpadding="0" >
									<form action="?subtopic=guilds" method="post" >
										<tr>
											<td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
													<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
														<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
													</div>
												</div>
											</td>
										</tr>
									</form>
								</table>
							</TD>
						</TR>
					</TABLE>';
			} else {
				$main_content .= '
					Do you really want to disband your guild? Confirm this decision with your password and click on "Submit".<BR>
					<BR>
					<FORM ACTION="?subtopic=guilds" METHOD=post>
						<div class="TableContainer" >
							<table class="Table1" cellpadding="0" cellspacing="0" >
								<div class="CaptionContainer" >
									<div class="CaptionInnerContainer" > 
										<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>						
										<div class="Text" >Disband Guild</div>
										<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
										<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
									</div>
								</div>
								<tr>
									<td>
										<div class="InnerTableContainer" >
											<table style="width:100%;" >
												<TR>
													<TD BGCOLOR=#D4C0A1><TABLE BORDER=0 CELLPADDING=1>
															<TR>
																<TD>Password:</TD>
																<TD><INPUT TYPE=password NAME="password" SIZE=30 MAXLENGTH=29></TD>
															</TR>
														</TABLE>
													</TD>
												</TR>
											</table>
										</div>
									</td>
								</tr>
							</table>
						</div>
						<BR>
						<TABLE BORDER=0 WIDTH=100%>
							<TR>
								<TD ALIGN=center><IMG SRC="'.$layout_name.'/images/global/general/blank.gif" WIDTH=120 HEIGHT=1 BORDER=0><BR></TD>
								<TD ALIGN=center><table border="0" cellspacing="0" cellpadding="0" >
									<tr>
										<td style="border:0px;" >
											<input type="hidden" name=action value=disband>
											<input type="hidden" name="disband" value="yes">
											<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
											<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/global/buttons/_sbutton_submit.gif" >
												</div>
											</div>
										</td>					
									<tr>
								</form>
							</table>
						</TD>
						<TD ALIGN=center>
							<table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=guilds&action=view" method="post" >
									<tr>
										<td style="border:0px;" >
											<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
											<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
													<div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>
						<TD ALIGN=center><IMG SRC="'.$layout_name.'/images/global/general/blank.gif" WIDTH=120 HEIGHT=1 BORDER=0><BR></TD>
					</TR>
				</TABLE>';
			}
	}
}
if($action == "description") {
	$guild_name = (string) $_REQUEST['GuildName'];
	if(empty($guild_errors))
	{
		$guild = new Guild();
		$guild->loadByName($guild_name);
		if(!$guild->isLoaded())
			$guild_errors[] = 'Guild <b>'.$guild_name.'</b> doesn\'t exist.';
	}
	if(empty($guild_errors)) {
		$guild_leader_char = $guild->getOwner();
		$rank_list = $guild->getGuildRanksList();
		$guild_leader = FALSE;
		$account_players = $account_logged->getPlayers();
		foreach($account_players as $player)
			if($guild->getOwner()->getId() == $player->getId()) {
				$guild_vice = TRUE;
				$guild_leader = TRUE;
				$level_in_guild = 3;
			}
		if(!$guild_leader)
			$guild_errors[] = 'You are not the Guild Leader.';
	}
	if(empty($guild_errors)) {
		$max_image_size_b = $config['site']['guild_image_size_kb'] * 1024;
		if($_REQUEST['guildlogo'] == "yes") {			
			$file = $_FILES['newlogo'];
		if(is_uploaded_file($file['tmp_name']))
			switch($file['error']) {
				case UPLOAD_ERR_OK:
					break; // all ok
				case UPLOAD_ERR_INI_SIZE:
				case UPLOAD_ERR_FORM_SIZE:
					$guild_errors[] = 'Image is too large';
					break;
				case UPLOAD_ERR_PARTIAL:
					$guild_errors[] = 'Image was only partially uploaded';
					break;
				case UPLOAD_ERR_NO_TMP_DIR:
					$guild_errors[] = 'Upload folder not found';
					break;
				case UPLOAD_ERR_CANT_WRITE:
					$guild_errors[] = 'Unable to write uploaded file';
					break;
				case UPLOAD_ERR_EXTENSION:
					$guild_errors[] =  'Upload failed due to extension';
					break;
				default:
					$guild_errors[] =  'Unknown error';
			}
			if(is_uploaded_file($file['tmp_name'])) {
				if($file['size'] > $max_image_size_b)
					$guild_errors[] = 'Uploaded image is too big. Size: <b>'.$file['size'].' bytes</b>, Max. size: <b>'.$max_image_size_b.' bytes</b>.';
				$info = getimagesize($file['tmp_name']);
				if(!$info)
					$guild_errors[] = 'Uploaded file is not an image!';
			}
		}
	}
	if(!empty($guild_errors)) {
		if($_REQUEST['changedescription'] == "yes") {
			//errors
			$main_content .= '
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
								<div class="Text" >Guild Description Error</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>';
											foreach($guild_errors as $guild_error)
												$main_content .= '<p>'.$guild_error;
										$main_content .= '
											</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
				</div><BR>
				<TABLE BORDER=0 WIDTH=100%>
					<TR>
						<TD ALIGN=center>
							<table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=guilds" method="post" >
									<input type="hidden" name="GuildName" value="'.$_REQUEST['GuildName'].'">
									<tr>
										<td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>
					</TR>
				</TABLE>';
		}
		if($_REQUEST['guildlogo'] == "yes") {
			//errors
			$main_content .= '
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
								<div class="Text" >Guild Logo Error</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>';
											foreach($guild_errors as $guild_error)
												$main_content .= '<p>'.$guild_error;
										$main_content .= '
											</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
				</div><BR>
				<TABLE BORDER=0 WIDTH=100%>
					<TR>
						<TD ALIGN=center>
							<table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=guilds" method="post" >
									<input type="hidden" name="GuildName" value="'.$_REQUEST['GuildName'].'">
									<tr>
										<td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>
					</TR>
				</TABLE>';
		}
	} else {
		if($_REQUEST['changedescription'] == "yes") {
			$description = htmlspecialchars(substr(trim($_REQUEST['description']),0,$config['site']['guild_description_chars_limit']));
			$guild->set('description', $description);
			$guild->save();
			$main_content .= '
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
								<div class="Text" >Guild Description Changed</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>Your Guild Description was changed succefully.</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
				</div><BR>
				<TABLE BORDER=0 WIDTH=100%>
					<TR>
						<TD ALIGN=center>
							<table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=guilds" method="post" >
									<input type="hidden" name="action" value="view">
									<input type="hidden" name="GuildName" value="'.$_REQUEST['GuildName'].'">
									<tr>
										<td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>
					</TR>
				</TABLE>';
		}
		elseif($_REQUEST['guildlogo'] == "yes") {
			if(!is_uploaded_file($file['tmp_name'])) {
				$guild->setGuildLogo('image/gif', Website::getFileContents('./images/default_guild_logo.gif'));
				$guild->save();
			} else {
				$guild->setGuildLogo($info['mime'], file_get_contents($file['tmp_name']));
				$guild->save();
			}
			$main_content .= '
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
								<div class="Text" >Guild Logo Changed</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>Your Guild Logo was changed succefully.</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
				</div><BR>
				<TABLE BORDER=0 WIDTH=100%>
					<TR>
						<TD ALIGN=center>
							<table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=guilds" method="post" >
									<input type="hidden" name="action" value="view">
									<input type="hidden" name="GuildName" value="'.$_REQUEST['GuildName'].'">
									<tr>
										<td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>
					</TR>
				</TABLE>';
		}
		else {
				$main_content .= 'If you want to change the description or the URL of the official homepage of your guild, edit the corresponding field and click on the "Submit" button.<BR><BR>';
	//formulario com as ações
	$main_content .= '
		<FORM ACTION="?subtopic=guilds" METHOD=post>
			<div class="TableContainer" >
				<table class="Table1" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>								
							<div class="Text" >Change Description</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						</div>
					</div>
					<tr>
						<td>
							<div class="InnerTableContainer" >
								<table style="width:100%;" >
									<tr>
										<td valign="top">Description:</td>
										<td><textarea name="description" cols="60" rows="15">'.$guild->getDescription().'</textarea></td>
										<td align="right" valign="bottom">
											<table border="0" cellspacing="0" cellpadding="0" >
												<tr>
													<td style="border:0px;" >
														<input type="hidden" name="changedescription" value="yes">
														<input type="hidden" name="action" value="description">
														<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
														<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
															<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
																<input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/global/buttons/_sbutton_submit.gif" >
															</div>
														</div>
													</td>
												</tr>
												</form>
											</table>
										</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div><BR>
			If you want to change the logo of your guild, enter the path to a 64*64 pixels GIF icon and click on the "Submit" button.<BR>Leave the path empty if you want to use the default logo.<BR><BR>
			<FORM ACTION="?subtopic=guilds" METHOD=post enctype="multipart/form-data">
			<div class="TableContainer" >
				<table class="Table1" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>								
							<div class="Text" >Guild Logo</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						</div>
					</div>
					<tr>
						<td>
							<div class="InnerTableContainer" >
								<table style="width:100%;" >
									<tr>
										<td valign="top">Current logo:</td>
										<td><IMG SRC="'. $guild->getGuildLogoLink() .'" WIDTH=64 HEIGHT=64></td>
										<td></td>
									</tr>
									<tr>
										<td valign="top">New logo:</td>
										<td><input type="file" name="newlogo"></td>
										<td align="right">
											<table border="0" cellspacing="0" cellpadding="0" >
												<tr>
													<td style="border:0px;" >
														<input type="hidden" name="guildlogo" value="yes">
														<input type="hidden" name="action" value="description">
														<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
														<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
															<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
																<input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/global/buttons/_sbutton_submit.gif" >
															</div>
														</div>
													</td>
												</tr>
												</form>
											</table>
										</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div><BR>
			<TABLE BORDER=0 WIDTH=100%>
				<TR align="center">
					<TD ALIGN=center>
						<table border="0" cellspacing="0" cellpadding="0" >
							<form action="?subtopic=guilds&action=view" method="post" >
								<tr>
									<td style="border:0px;" >
										<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
										<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
											<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
												<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
											</div>
										</div>
									</td>
								</tr>
							</form>
						</table>
					</TD>
				</TR>
			</TABLE>';
		}
	}
}
if($action == "resignleadership") {
	$guild_name = (string) $_REQUEST['GuildName'];
	$pass_to = (string) $_REQUEST['character'];
	$password = trim($_REQUEST['password']);
	if(empty($guild_errors))
	{
		$guild = new Guild();
		$guild->loadByName($guild_name);
		if(!$guild->isLoaded())
			$guild_errors[] = 'Guild <b>'.$guild_name.'</b> doesn\'t exist.';
	}
	if(empty($guild_errors))
	{
		if($_POST['resign'] == 'yes')
		{
			if(!$account_logged->isValidPassword($password))
				$guild_errors[] = 'Password is wrong.';
			if(!check_name($pass_to))
				$guild_errors[] = 'Invalid player name format.';
			if(empty($guild_errors))
			{
				$to_player = new Player();
				$to_player->find($pass_to);
				if(!$to_player->isLoaded())
					$guild_errors[] = 'Player with name <b>'.htmlspecialchars($pass_to).'</b> doesn\'t exist.';
				if(empty($guild_errors))
				{
					$to_player_rank = $to_player->getRank();
					if(!empty($to_player_rank))
					{
						$to_player_guild = $to_player_rank->getGuild();
						if($to_player_guild->getId() != $guild->getId())
							$guild_errors[] = 'Player with name <b>'.htmlspecialchars($to_player->getName()).'</b> isn\'t from your guild.';
					}
					else
						$guild_errors[] = 'Player with name <b>'.htmlspecialchars($to_player->getName()).'</b> isn\'t from your guild.';
				}
			}
		}
	}
	if(empty($guild_errors)) {
		if($logged) {
			$guild_leader_char = $guild->getOwner();
			$guild_leader = FALSE;
			$account_players = $account_logged->getPlayers();
			foreach($account_players as $player)
				if($guild_leader_char->getId() == $player->getId()) {
					$guild_vice = TRUE;
					$guild_leader = TRUE;
					$level_in_guild = 3;
				}
			if($guild_leader) {
				if($_POST['resign'] == 'yes') {
					$newleaderID = $to_player->getID();
					$oldleaderID = $guild_leader_char->getId();
					$newrank = $guild_leader_char->getRank()->getID();
					$oldrank = $to_player_rank->getID();
					$up = $SQL->query("UPDATE `guild_membership` SET `rank_id` = '$newrank' WHERE `player_id` = '$newleaderID'");
					if($up)
						$up2 = $SQL->query("UPDATE `guild_membership` SET `rank_id` = '$oldrank' WHERE `player_id` = '$oldleaderID'");
					if($up2) {
						$guild->setOwner($to_player);
						$guild->save();
					}
					$saved = TRUE;
					
					$main_content .= '
						<div class="TableContainer" >
							<table class="Table1" cellpadding="0" cellspacing="0" >
								<div class="CaptionContainer" >
									<div class="CaptionInnerContainer" > 
										<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
										<div class="Text" >New Guild Leadership</div>
										<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
										<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
									</div>
								</div>
								<tr>
									<td>
										<div class="InnerTableContainer" >
											<table style="width:100%;" >
												<tr>
													<td>The new leader is '.$to_player->getName().'.</td>
												</tr>
											</table>
										</div>
									</td>
								</tr>
							</table>
						</div><BR>
						<TABLE BORDER=0 WIDTH=100%>
							<TR>
								<TD ALIGN=center>
									<table border="0" cellspacing="0" cellpadding="0" >
										<form action="?subtopic=guilds" method="post" >
											<input type="hidden" name="action" value="view">
											<input type="hidden" name="GuildName" value="'.$_REQUEST['GuildName'].'">
											<tr>
												<td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
														<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
															<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
														</div>
													</div>
												</td>
											</tr>
										</form>
									</table>
								</TD>
							</TR>
						</TABLE>';
				} else {
					//formulario com as ações
					$main_content .= '
						Select a member to your new Guild Leader and click "Submit" button.<BR><BR>
						<FORM ACTION="?subtopic=guilds" METHOD=post>
							<div class="TableContainer" >
								<table class="Table1" cellpadding="0" cellspacing="0" >
									<div class="CaptionContainer" >
										<div class="CaptionInnerContainer" > 
											<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
											<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>								
											<div class="Text" >Resign Leadership</div>
											<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
											<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
											<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										</div>
									</div>
									<tr>
										<td>
											<div class="InnerTableContainer" >
												<table style="width:100%;" >
													<TR>
														<TD BGCOLOR=#D4C0A1>
															<TABLE BORDER=0 CELLPADDING=1>
																<TR>
																	<TD>
																		<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=1>
																			<TR>
																				<TD>Resign Leadership to:</TD>
																			</TR>
																		</TABLE>
																	</TD>
																	<TD>&#160;&#160;&#160;</TD>
																	<TD>
																		<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=1>
																			<TR>
																				<TD align="right" valign="top">
																					<SELECT NAME="character">';
																				$rank_list = $guild->getGuildRanksList();
																				foreach($rank_list as $rank) {
																					$players_with_rank = $rank->getPlayersList();
																					foreach($players_with_rank as $player) {
																						if($guild_leader_char->getName() != $player->getName()) {
																							$main_content .= '<OPTION>' . $player->getName() . '</OPTION>';
																						}
																					}
																				}
																				$main_content .='																					
																					</SELECT>
																				</TD>
																			</TR>
																		</TABLE>
																	</TD>
																</TR>
															</TABLE>
														</TD>
													</TR>
													<TR>
														<TD>
															<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=1>
																<TR>
																	<TD>Password:</TD>
																	<TD><input type="password" name="password"></TD>
																</TR>
															</TABLE>													
														</TD>
													</TR>
												</table>
											</div>
										</td>
									</tr>
								</table>
							</div>
						<BR>
						<TABLE BORDER=0 WIDTH=100%>
							<TR align="center">
								<TD ALIGN=center>
									<table border="0" cellspacing="0" cellpadding="0" >
										<tr>
											<td style="border:0px;" >
												<input type="hidden" name=action value=resignleadership >
												<input type="hidden" name="resign" value="yes">
												<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
												<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
													<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
														<input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/global/buttons/_sbutton_submit.gif" >
													</div>
												</div>
											</td>			
										<tr>
									</table>
								</TD>
								</FORM>
								<TD ALIGN=center>
									<table border="0" cellspacing="0" cellpadding="0" >
										<form action="?subtopic=guilds&action=view" method="post" >
											<tr>
												<td style="border:0px;" >
													<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
													<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
														<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
															<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
														</div>
													</div>
												</td>
											</tr>
										</form>
									</table>
								</TD>
							</TR>
						</TABLE>';
				}
			} 
			else
				$guild_errors[] = 'You are not a leader of guild!';
		}
		else
			$guild_errors[] = 'You are not logged. You can\'t manage guild.';
	}
	if(!empty($guild_errors)) {
		//errors
			$main_content .= '
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
								<div class="Text" >Guild Leadership Error</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>';
											foreach($guild_errors as $guild_error)
												$main_content .= '<p>'.$guild_error;
										$main_content .= '
											</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
				</div><BR>
				<TABLE BORDER=0 WIDTH=100%>
					<TR>
						<TD ALIGN=center>
							<table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=guilds" method="post" >
									<input type="hidden" name="action" value="view">
									<input type="hidden" name="GuildName" value="'.$_REQUEST['GuildName'].'">
									<tr>
										<td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>
					</TR>
				</TABLE>';
	}
}
if($action == "guildwars") {
	
	# Guild wars status
	# 1 - War Started
	# 2 - War Rejected
	# 3 - War Canceled
	
	
	$guild_name = (string) $_REQUEST['GuildName'];
	$guild = new Guild();
	$guild->loadByName($guild_name);
	if(!$guild->isLoaded())
		$guild_errors[] = 'Guild with name <b>'.$guild_name.'</b> doesn\'t exist.';
	
	$guild_id = $guild->getID();
	if(empty($guild_errors)) {
		//check is it vice or/and leader account (leader has vice + leader rights)
		$guild_leader_char = $guild->getOwner();
		$rank_list = $guild->getGuildRanksList();
		$guild_leader = FALSE;
		$guild_vice = FALSE;
		if($logged)
		{
			$account_players = $account_logged->getPlayers();
			foreach($account_players as $player)
			{
				$players_from_account_ids[] = $player->getId();
				$player_rank = $player->getRank();
				if(!empty($player_rank))
					foreach($rank_list as $rank_in_guild)
						if($rank_in_guild->getId() == $player_rank->getId())
						{
							$players_from_account_in_guild[] = $player->getName();
							if($player_rank->getLevel() > 1)
							{
								$guild_vice = TRUE;
								$level_in_guild = $player_rank->getLevel();
							}
							if($guild->getOwner()->getId() == $player->getId())
							{
								$guild_vice = TRUE;
								$guild_leader = TRUE;
							}
						}
			}
		}
	}
	if($guild_leader)
		$main_content .= '
			<center>
				<table border="0" cellspacing="0" cellpadding="0" >
					<form action="?subtopic=guilds" method="post" >
						<tr>
							<td style="border:0px;" >
								<input type="hidden" name=action value=declarewar >
								<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
								<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
									<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
										<input class="ButtonText" type="image" name="Declare War" alt="Declare War" src="'.$layout_name.'/images/global/buttons/_sbutton_declarewar.gif" >
									</div>
								</div>
							</td>
						</tr>
					</form>
				</table>
			</center>
			<br/>';
			/*
		$main_content .= '
			<div class="TableContainer" >
				<table class="Table5" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>						
							<div class="Text" >Declarations of War</div>
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
										<td>The guild Lino Lucky has currently no open war declarations.</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<br/>';
			*/
			$main_content .= "<script type=\"text/javascript\"><!--
		function show_hide(flip)
		{
				var tmp = document.getElementById(flip);
				if(tmp)
						tmp.style.display = tmp.style.display == 'none' ? '' : 'none';
		}
		--></script>";
	$main_content .= '
		<div class="TableContainer" >
			<table class="Table5" cellpadding="0" cellspacing="0" >
				<div class="CaptionContainer" >
					<div class="CaptionInnerContainer" > 
						<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
						<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>						
						<div class="Text" >Guild Wars</div>
						<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
						<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
						<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
					</div>
				</div>
				<tr>
					<td>
						<div class="InnerTableContainer" >
							<table style="width:100%;" >';
							$main_content .= '
								<tr>
									<td>
										<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%" >
														<tr class="LabelV">
															<td>Aggressor</td>
															<td>Information</td>
															<td>Enemy</td>
														</tr>';
														$warFrags = array();
														foreach($SQL->query('SELECT * FROM `guildwar_kills` WHERE `killerguild` = ' . $guild_id . ' OR `targetguild` = ' . $guild_id . ' ORDER BY `time` DESC')->fetchAll() as $frag)
														{
															$warFrags[$frag['warid']][] = $frag;
														}
												
														$count = 0;
														foreach($SQL->query('SELECT `guild_wars`.`id`, `guild_wars`.`guild1`, `guild_wars`.`guild2`, `guild_wars`.`name1`, `guild_wars`.`name2`, `guild_wars`.`status`, `guild_wars`.`started`, `guild_wars`.`ended`, (SELECT COUNT(1) FROM `guildwar_kills` WHERE `guildwar_kills`.`warid` = `guild_wars`.`id` AND `guildwar_kills`.`killerguild` = `guild_wars`.`guild1`) guild1_kills, (SELECT COUNT(1) FROM `guildwar_kills` WHERE `guildwar_kills`.`warid` = `guild_wars`.`id` AND `guildwar_kills`.`killerguild` = `guild_wars`.`guild2`) guild2_kills FROM `guild_wars` WHERE `guild1` = ' . $guild_id . ' OR `guild2` = ' . $guild_id . ' ORDER BY CASE `status` WHEN 0 THEN 2 WHEN 1 THEN 1 WHEN 4 THEN 3 WHEN 3 THEN 4 WHEN 2 THEN 5 END, `started` DESC') as $war)
														{
															$count++;
															$main_content .= "<tr style=\"background: " . (is_int($count / 2) ? $config['site']['darkborder'] : $config['site']['lightborder']) . ";\">
														<td align=\"center\"><a href=\"?subtopic=guilds&action=view&GuildName=".$war['name1']."\"><img src=\"guild_image.php?id=" . $war['guild1'] . "\" width=\"64\" height=\"64\" border=\"0\"/><br />".htmlspecialchars($war['name1'])."</a></td>
														<td align=\"center\">";
															switch($war['status'])
															{
																case 0:
																{
																	$main_content .= "<b>Pending acceptation</b><br />Invited on " . date("M d Y, H:i:s", $war['started']) . " for " . (($war['ended'] - $war['started']) / 3600) . " hours war.<br />";
																	if($guild_leader && $war['guild2'] == $guild->getID())
																	{
																		$main_content .= '<br /><a href="?subtopic=guilds&action=guildwar_accept&GuildName=' . $guild_name . '&war=' . $war['id'] . '" onclick="return confirm(\'Are you sure that you want ACCEPT that invitation for 2 hours war?\');" style="cursor: pointer;">accept invitation to war</a>';
																		$main_content .= '<br /><br /><a href="?subtopic=guilds&action=guildwar_reject&GuildName=' . $guild_name . '&war=' . $war['id'] . '" onclick="return confirm(\'Are you sure that you want REJECT that invitation for 2 hours war?\');" style="cursor: pointer;">reject invitation to war</a>';
																	}
																	if($guild_leader && $war['guild1'] == $guild->getID())
																	{
																		$main_content .= '<br /><br /><a href="?subtopic=guilds&action=guildwar_cancel&GuildName=' . $guild_name . '&war=' . $war['id'] . '" onclick="return confirm(\'Are you sure that you want CANCEL that invitation for 2 hours war?\');" style="cursor: pointer;">cancel invitation to war</a>';
																	}
																	$main_content .= '</font>';
																	break;
																}
																case 1:
																{
																	$main_content .= "<font size=\"12\"><span style=\"color: red;\">" . $war['guild1_kills'] . "</span><font color=black> : </font><span style=\"color: lime;\">" . $war['guild2_kills'] . "</span></font><br /><br /><span style=\"color: darkred; font-weight: bold;\">On a brutal war</span><br /><font color=black>Began on " . date("M d Y, H:i:s", $war['started']) . ", will end up after server restart after " . date("M d Y, H:i:s", $war['started'] + (2*3600)) . ".<br /></font>";
																	$main_content .= "<br /><br />";
																	if(in_array($war['status'], array(1,4)))
																	{
																		$main_content .= "<a onclick=\"show_hide('war-details:" . $war['id'] . "'); return false;\" style=\"cursor: pointer;\">War Details</a>";
																	}
																	break;
																}
																case 2:
																{
																	$main_content .= "<b>Rejected invitation</b><br />Invited on " . date("M d Y, H:i:s", $war['started']) . ", rejected on " . date("M d Y, H:i:s", $war['ended']) . ".</font>";
																	break;
																}
																case 3:
																{
																	$main_content .= "<b>Canceled invitation</b><br />Sent invite on " . date("M d Y, H:i:s", $war['started']) . ", canceled on " . date("M d Y, H:i:s", $war['ended']) . ".</font>";
																	break;
																}
																case 4:
																{
																	$main_content .= "<b><i>Ended</i></b><br />Began on " . date("M d Y, H:i:s", $war['started']) . ", ended on " . date("M d Y, H:i:s", $war['ended']) . ". Frag statistics: <span style=\"color: red;\">" . $war['guild1_kills'] . "</span> to <span style=\"color: lime;\">" . $war['guild2_kills'] . "</span>.";
																	$main_content .= "<br /><br />";
																	if(in_array($war['status'], array(1,4)))
																	{
																		$main_content .= "<a onclick=\"show_hide('war-details:" . $war['id'] . "'); return false;\" style=\"cursor: pointer;\">&raquo; Details &laquo;</a>";
																	}
																	$main_content .= "</font>";
																	break;
																}
																default:
																{
																	$main_content .= "Unknown, please contact with gamemaster.";
																	break;
																}
															}
															$main_content .= "</td>
														<td align=\"center\"><a href=\"?subtopic=guilds&action=view&GuildName=".$war['name2']."\"><img src=\"guild_image.php?id=" . $war['guild2'] . "\" width=\"64\" height=\"64\" border=\"0\"/><br />".htmlspecialchars($war['name2'])."</a></td>
														</tr>
														<tr id=\"war-details:" . $war['id'] . "\" style=\"display: none; background: " . (is_int($count / 2) ? $config['site']['darkborder'] : $config['site']['lightborder']) . ";\">
														<td colspan=\"3\">";
															if(in_array($war['status'], array(1,4)))
															{
																if(isset($warFrags[$war['id']]))
																{
																	foreach($warFrags[$war['id']] as $frag)
																	{
																		$main_content .= date("j M Y, H:i", $frag['time']) . " <span style=\"font-weight: bold; color: " . ($frag['killerguild'] == $war['guild1'] ? "red" :"lime") . ";\">+</span><a href=\"?subtopic=characters&name=" . urlencode($frag['killer']) . "\"><b>".htmlspecialchars($frag['killer'])."</b></a> killed <a href=\"?subtopic=characters&name=".urlencode($frag['target'])."\"> " . htmlspecialchars($frag['target']) . "</a>";
																	}
																}
																else
																	$main_content .= "<center>There were no frags on this war so far.</center>";
															}
															else
																$main_content .= "</td></tr>";
														}
												$main_content .= '
													</table>
												</div>
											</div>
										</div>
									</td>
								</tr>';
						if($count == 0)
							$main_content .= "
								<tr>
									<td>The guild ".$guild_name." is currently not involved in a guild war.</td>
								</tr>";
						$main_content .= '
							</table>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<br/>';
		/*
	$main_content .= '
		<div class="TableContainer" >
			<table class="Table5" cellpadding="0" cellspacing="0" >
				<div class="CaptionContainer" >
					<div class="CaptionInnerContainer" > 
						<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
						<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>						
						<div class="Text" >Guild War History</div>
						<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
						<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
						<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
					</div>
				</div>
				<tr>
					<td>
						<div class="InnerTableContainer">
							<table style="width:100%;">
								<tr>
									<td>The guild Lino Lucky has never participated in a guild war.</td>
								</tr>
							</table>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<br/>';
		*/
	$main_content .= '
		<center>
			<table border="0" cellspacing="0" cellpadding="0" >
				<form action="?subtopic=guilds&action=view" method="post" >
					<tr>
						<td style="border:0px;" >
							<input type="hidden" name=GuildName value="'.$_REQUEST['GuildName'].'" >
							<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
								<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
									<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
								</div>
							</div>
						</td>
					</tr>
				</form>
			</table>
		</center>
		';
}
if($action == 'declarewar')
{
	$guild_name = (string) $_REQUEST['GuildName'];
	if(!$logged)
		$guild_errors[] = 'You are not logged.';
	if(empty($guild_errors))
	{
		$guild = new Guild();
		$guild->loadByName($guild_name);
		if(!$guild->isLoaded())
			$guild_errors[] = 'Guild <b>'.$guild_name.'</b> doesn\'t exist.';
		if(empty($guild_errors))
		{
			$guild_leader_char = $guild->getOwner();
			$guild_leader = FALSE;
			$account_players = $account_logged->getPlayers();
			foreach($account_players as $player)
			{
				if($guild_leader_char->getId() == $player->getId())
				{
					$guild_leader = TRUE;
				}
			}
			if($guild_leader)
			{
				$currentWars = array();
				$wars = new DatabaseList('GuildWar');
				foreach($wars as $war)
				{
					if($war->getStatus() == GuildWar::STATE_INVITED || $war->getStatus() == GuildWar::STATE_ON_WAR)
					{
						if($war->getGuild1ID() == $guild->getID())
							$currentWars[$war->getGuild2ID()] = $war->getStatus();
						elseif($war->getGuild2ID() == $guild->getID())
							$currentWars[$war->getGuild1ID()] = $war->getStatus();
					}
				}

				$main_content .= '<center><h1>' . htmlspecialchars($guild->getName()) . ' vs. ???</h2></center><br /><h3>Choose your enemy!</h3><br /><table width="100%" border="0" cellspacing="1" cellpadding="4">';

				$guildsList = new DatabaseList('Guild');
				$guildsList->addOrder(new SQL_Order(new SQL_Field('name'), SQL_Order::ASC));
				$shown_guilds = 0;
				foreach($guildsList as $enemyGuild)
				{
					if(is_int($shown_guilds / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $shown_guilds++;
					$main_content .= '<tr BGCOLOR="'.$bgcolor.'"><td width="70px"><IMG SRC="guild_image.php?id='. $enemyGuild->getID() .'" WIDTH="64" HEIGHT="64"></td><td valign="top"><B>'.htmlspecialchars($enemyGuild->getName()).'</B></td><td>';
					if($enemyGuild->getID() != $guild->getID())
					{
						if(isset($currentWars[$enemyGuild->getID()]))
						{
							// in war or invited
							if($currentWars[$enemyGuild->getID()] == GuildWar::STATE_INVITED)
							{
								// guild already invited you or you invited that guild
								$main_content .= 'There is already invitation between your and this guild.';
							}
							else
							{
								// you are on war with this guild
								$main_content .= 'There is already war between your and this guild.';
							}
						}
						else
						{
							// can invite
							$main_content .= '<a href="?subtopic=guilds&action=guildwar_invite&GuildName=' . urlencode($guild->getName()) . '&enemy=' . $enemyGuild->getID() . '" onclick="return confirm(\'Are you sure that you want invite that guild?\')">INVITE FOR WAR</a>';
						}
					}
					else
					{
						// your own guild
						$main_content .= 'YOUR GUILD';
					}
					$main_content .= '</td></tr>';
				}
				$main_content .= '</table>';
			}
			else
				$guild_errors[] = 'You are not a leader of guild!';
		}
	}
	if(!empty($guild_errors))
	{
		$main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/global/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/global/content/attentionsign.gif);" /></div><b>The Following Errors Have Occurred:</b><br/>';
		foreach($guild_errors as $guild_error)
			$main_content .= '<li>'.$guild_error.'</li>';
		$main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/global/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></div>  </div></div><br>';
		$main_content .= '<br/><center><form action="?subtopic=guilds" METHOD=post><div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" ></div></div></form></center>';
	}
}
if($action == 'guildwar_invite')
{
	$guild_name = (string) $_REQUEST['GuildName'];
	$enemy_id = (int) $_REQUEST['enemy'];
	if(!$logged)
		$guild_errors[] = 'You are not logged.';
	if(empty($guild_errors))
	{
		$guild = new Guild();
		$guild->loadByName($guild_name);
		$enemyGuild = new Guild($enemy_id);
		if(!$guild->isLoaded() || !$enemyGuild->isLoaded())
			$guild_errors[] = 'Guild <b>'.$guild_id.'</b> or <b>'.$enemy_id.'</b> doesn\'t exist.';
		if(empty($guild_errors))
		{
			$guild_leader_char = $guild->getOwner();
			$guild_leader = FALSE;
			$account_players = $account_logged->getPlayers();
			foreach($account_players as $player)
			{
				if($guild_leader_char->getId() == $player->getId())
				{
					$guild_leader = TRUE;
				}
			}
			if($guild_leader)
			{
				if($enemyGuild->getID() != $guild->getID())
				{
					$currentWars = array();
					$wars = new DatabaseList('GuildWar');
					foreach($wars as $war)
					{
						if($war->getStatus() == GuildWar::STATE_INVITED || $war->getStatus() == GuildWar::STATE_ON_WAR)
						{
							if($war->getGuild1ID() == $guild->getID())
								$currentWars[$war->getGuild2ID()] = $war->getStatus();
							elseif($war->getGuild2ID() == $guild->getID())
								$currentWars[$war->getGuild1ID()] = $war->getStatus();
						}
					}
					if(isset($currentWars[$enemyGuild->getID()]))
					{
						// in war or invited
						if($currentWars[$enemyGuild->getID()] == GuildWar::STATE_INVITED)
						{
							// guild already invited you or you invited that guild
							$guild_errors[] = 'There is already invitation between your and this guild.';
						}
						else
						{
							// you are on war with this guild
							$guild_errors[] = 'There is already war between your and this guild.';
						}
					}
					else
					{
						// can invite
						$war = new GuildWar();
						$war->setGuild1ID($guild->getID());
						$war->setGuild2ID($enemyGuild->getID());
						$war->setGuild1Name($guild->getName());
						$war->setGuild2Name($enemyGuild->getName());
						$war->setStatus(GuildWar::STATE_INVITED);
						$war->setStarted(time());
						$war->setEnded(0);
						$war->save();
						header("Location: ?subtopic=guilds&action=view&GuildName=".urlencode($guild_name)."");
						$main_content .= 'War invitation sent. Redirecting...';
					}
				}
				else
				{
					$guild_errors[] = 'You cannot invite same guild!';
				}
			}
			else
				$guild_errors[] = 'You are not a leader of guild!';
		}
	}
	if(!empty($guild_errors))
	{
		$main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div><b>The Following Errors Have Occurred:</b><br/>';
		foreach($guild_errors as $guild_error)
			$main_content .= '<li>'.$guild_error.'</li>';
		$main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br>';
		$main_content .= '<br/><center><form action="?subtopic=guilds" METHOD=post><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></form></center>';
	}
}
if($action == 'guildwar_cancel')
{
	$guild_name = (string) $_REQUEST['GuildName'];
	$war_id = (int) $_REQUEST['war'];
	if(!$logged)
		$guild_errors[] = 'You are not logged.';
	if(empty($guild_errors))
	{
		$guild = new Guild();
		$guild->loadByName($guild_name);
		if(!$guild->isLoaded())
			$guild_errors[] = 'Guild <b>'.$guild_name.'</b> doesn\'t exist.';
		if(empty($guild_errors))
		{
			$guild_leader_char = $guild->getOwner();
			$guild_leader = FALSE;
			$account_players = $account_logged->getPlayers();
			foreach($account_players as $player)
			{
				if($guild_leader_char->getId() == $player->getId())
				{
					$guild_leader = TRUE;
				}
			}
			if($guild_leader)
			{
				$war = new GuildWar($war_id);
				if(!$war->isLoaded())
					$guild_errors[] = 'War with ID <b>'.$war_id.'</b> doesn\'t exist.';

				if(empty($guild_errors))
				{
					if($war->getGuild1ID() != $guild->getID() || $war->getStatus() != GuildWar::STATE_INVITED)
					{
						$guild_errors[] = 'Your guild did not invite to that war.';
					}

					if(empty($guild_errors))
					{
						$war->setStatus(GuildWar::STATE_CANCELED);
						$war->setEnded(time());
						$war->save();
						header("Location: ?subtopic=guilds&action=view&GuildName=".$guild_name."");
						$main_content .= 'War invitation rejected. Redirecting...';
					}
				}
			}
			else
				$guild_errors[] = 'You are not a leader of guild!';
		}
	}
	if(!empty($guild_errors))
	{
		$main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div><b>The Following Errors Have Occurred:</b><br/>';
		foreach($guild_errors as $guild_error)
			$main_content .= '<li>'.$guild_error.'</li>';
		$main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br>';
		$main_content .= '<br/><center><form action="?subtopic=guilds" METHOD=post><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></form></center>';
	}
}
if($action == 'guildwar_reject')
{
	$guild_name = (string) $_REQUEST['GuildName'];
	$war_id = (int) $_REQUEST['war'];
	if(!$logged)
		$guild_errors[] = 'You are not logged.';
	if(empty($guild_errors))
	{
		$guild = new Guild();
		$guild->loadByName($guild_name);
		if(!$guild->isLoaded())
			$guild_errors[] = 'Guild <b>'.$guild_name.'</b> doesn\'t exist.';
		if(empty($guild_errors))
		{
			$guild_leader_char = $guild->getOwner();
			$guild_leader = FALSE;
			$account_players = $account_logged->getPlayers();
			foreach($account_players as $player)
			{
				if($guild_leader_char->getId() == $player->getId())
				{
					$guild_leader = TRUE;
				}
			}
			if($guild_leader)
			{
				$war = new GuildWar($war_id);
				if(!$war->isLoaded())
					$guild_errors[] = 'War with ID <b>'.$war_id.'</b> doesn\'t exist.';

				if(empty($guild_errors))
				{
					if($war->getGuild2ID() != $guild->getID() || $war->getStatus() != GuildWar::STATE_INVITED)
					{
						$guild_errors[] = 'Your guild is not invited to that war.';
					}

					if(empty($guild_errors))
					{
						$war->setStatus(GuildWar::STATE_REJECTED);
						$war->setEnded(time());
						$war->save();
						header("Location: ?subtopic=guilds&action=view&GuildName=".urlencode($guild_name)."");
						$main_content .= 'War invitation rejected. Redirecting...';
					}
				}
			}
			else
				$guild_errors[] = 'You are not a leader of guild!';
		}
	}
	if(!empty($guild_errors))
	{
		$main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div><b>The Following Errors Have Occurred:</b><br/>';
		foreach($guild_errors as $guild_error)
			$main_content .= '<li>'.$guild_error.'</li>';
		$main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br>';
		$main_content .= '<br/><center><form action="?subtopic=guilds" METHOD=post><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></form></center>';
	}
}
if($action == 'guildwar_accept')
{
	$guild_name = (string) $_REQUEST['GuildName'];
	$war_id = (int) $_REQUEST['war'];
	if(!$logged)
		$guild_errors[] = 'You are not logged.';
	if(empty($guild_errors))
	{
		$guild = new Guild();
		$guild->loadByName($guild_name);
		if(!$guild->isLoaded())
			$guild_errors[] = 'Guild <b>'.$guild_name.'</b> doesn\'t exist.';
		if(empty($guild_errors))
		{
			$guild_leader_char = $guild->getOwner();
			$guild_leader = FALSE;
			$account_players = $account_logged->getPlayers();
			foreach($account_players as $player)
			{
				if($guild_leader_char->getId() == $player->getId())
				{
					$guild_leader = TRUE;
				}
			}
			if($guild_leader)
			{
				$war = new GuildWar($war_id);
				if(!$war->isLoaded())
					$guild_errors[] = 'War with ID <b>'.$war_id.'</b> doesn\'t exist.';

				if(empty($guild_errors))
				{
					if($war->getGuild2ID() != $guild->getID() || $war->getStatus() != GuildWar::STATE_INVITED)
					{
						$guild_errors[] = 'Your guild is not invited to that war.';
					}

					if(empty($guild_errors))
					{
						$war->setStatus(GuildWar::STATE_ON_WAR);
						$war->setStarted(time());
						$war->setEnded(0);
						$war->save();
						header("Location: ?subtopic=guilds&action=view&GuildName=".urlencode($guild_name)."");
						$main_content .= 'War invitation accepted. Redirecting...';
					}
				}
			}
			else
				$guild_errors[] = 'You are not a leader of guild!';
		}
	}
	if(!empty($guild_errors))
	{
		$main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div><b>The Following Errors Have Occurred:</b><br/>';
		foreach($guild_errors as $guild_error)
			$main_content .= '<li>'.$guild_error.'</li>';
		$main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br>';
		$main_content .= '<br/><center><form action="?subtopic=guilds" METHOD=post><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></form></center>';
	}
}
if($action == 'deletebyadmin')
{
	$guild_id = (int) $_REQUEST['guild'];
	if(empty($guild_errors))
	{
		$guild = new Guild();
		$guild->load($guild_id);
		if(!$guild->isLoaded())
			$guild_errors[] = 'Guild with ID <b>'.$guild_id.'</b> doesn\'t exist.';
	}
	if(empty($guild_errors))
	{
		if($logged)
		{
			if($group_id_of_acc_logged >= $config['site']['access_admin_panel'])
			{
				if($_POST['todo'] == 'save')
				{
					$guild->delete();
					$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Guild Deleted</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>Guild with ID <b>'.$guild_id.'</b> has been deleted.</td></tr>          </table>        </div>  </table></div></td></tr><br/><center><form action="?subtopic=guilds" METHOD=post><div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" ></div></div></form></center>';
				}
				else
					$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Guild Deleted</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>Are you sure you want delete guild <b>'.htmlspecialchars($guild->getName()).'</b>?<br>
					<form action="?subtopic=guilds&guild='.$guild_id.'&action=deletebyadmin" METHOD=post><input type="hidden" name="todo" value="save"><input type="submit" value="Yes, delete"></form>
					</td></tr>          </table>        </div>  </table></div></td></tr><br/><center><form action="?subtopic=guilds" METHOD=post><div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" ></div></div></form></center>';
			}
			else
				$guild_errors[] = 'You are not an admin!';
		}
		else
			$guild_errors[] = 'You are not logged. You can\'t delete guild.';
	}
	if(!empty($guild_errors))
	{
		$main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/global/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/global/content/attentionsign.gif);" /></div><b>The Following Errors Have Occurred:</b><br/>';
		foreach($guild_errors as $guild_error)
			$main_content .= '<li>'.$guild_error.'</li>';
		$main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/global/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></div>  </div></div><br>';
		$main_content .= '<br/><center><form action="?subtopic=guilds" METHOD=post><div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" ></div></div></form></center>';
	}
}