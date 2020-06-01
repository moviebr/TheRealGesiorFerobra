<?php
// Editado por Movie
if(!defined('INITIALIZED'))
	exit;
if($logged)
{
	if($group_id_of_acc_logged >= $config['site']['access_admin_panel'])
	{
		if($action == "") {
			$main_content .= '
				<center>
					<table>
						<tbody>
							<tr>
								<td><img src="'.$layout_name.'/images/global/content/headline-bracer-left.gif"></td>
								<td style="text-align:center;vertical-align:middle;horizontal-align:center;font-size:17px;font-weight:bold;">Admin Panel, welcome '.$account_logged->getRLName().'!<br></td>
								<td><img src="'.$layout_name.'/images/global/content/headline-bracer-right.gif"></td>
							</tr>
						</tbody>
					</table>
				</center>
				<br>';				
				
				$main_content .= '
				<div class="TableContainer">
					<div class="CaptionContainer">
						<div class="CaptionInnerContainer"> 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
							<div class="Text">General Information</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
						</div>
					</div>
					<table class="Table3" cellpadding="0" cellspacing="0">
						<tbody>
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
														<div class="TableContentContainer" >';
														$playersCount = $SQL->query("SELECT COUNT(*) FROM `players`")->fetch();
														$accountsCount = $SQL->query("SELECT COUNT(*) FROM `accounts`")->fetch();
														$guildsCount = $SQL->query("SELECT COUNT(*) FROM `guilds`")->fetch();
														$shopsCount = $SQL->query("SELECT COUNT(*) FROM `z_shop_offer`")->fetch();
														$main_content .= '
															<table class="TableContent" width="100%">
																<tr style="background-color:#D4C0A1;" >
																	<td class="LabelV" >Accounts on database:</td>
																	<td style="width:90%;" >'.$accountsCount[0].' Accounts</td>
																</tr>
																<tr style="background-color:#F1E0C6;" >
																	<td class="LabelV" >Players on database:</td>
																	<td style="width:90%;" >'.$playersCount[0].' Players - <a href="./?subtopic=adminpanel&action=manageplayers">Manage Players</a></td>
																</tr>
																<tr style="background-color:#D4C0A1;" >
																	<td class="LabelV" >Guilds on database:</td>
																	<td style="width:90%;" >'.$guildsCount[0].' Guilds</td>
																</tr>
																<tr style="background-color:#F1E0C6;" >
																	<td class="LabelV" >Products on shop:</td>
																	<td style="width:90%;" >'.$shopsCount[0].' Products</td>
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
						</tbody>
					</table>
				</div><br>';
			$main_content .= '
				<div class="TableContainer">
					<div class="CaptionContainer">
						<div class="CaptionInnerContainer"> 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
							<div class="Text">Newsticker</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
						</div>
					</div>
					<table class="Table3" cellpadding="0" cellspacing="0">
						<tbody>
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
																<tr style="background-color:#D4C0A1;" >
																	<td class="LabelV" >The last one:</td>';
																$get_ticker = $SQL->query("SELECT * FROM `newsticker` ORDER BY `date` DESC LIMIT 1")->fetchAll();
																if (count($get_ticker) > 0)
																	foreach($get_ticker as $ticker)
																		$main_content .= '
																			<td style="width:90%;" >
																				<img src="'.$layout_name.'/images/global/content/'.$ticker['icon'].'_small.gif" style=" vertical-align: middle;"> '.$ticker['text'].'
																				<a href="#" id="delTicker">Delete</a>
																				<input type="hidden" name="tickerID" value="'.$ticker['id'].'"><br />
																				<small><strong>Posted '.date("M d Y, H:i:s",$ticker['date']).'</strong></small>
																			</td>';
																else
																	$main_content .= '<td style="width:90%;" >No tickers added yet</td>';																
															$main_content .= '
																</tr>
																<tr style="background-color:#F1E0C6;" >
																	<td class="LabelV" >Add one:</td>
																	<td>																		
																		<table class="TableContent" width="100%">
																			<tr>
																				<td width="100%"><input type="text" name="tickerText" style="width:100%;" placeholder="Max lenght 255 characters" maxlenght="255"></td>
																			</tr>
																			<tr>
																				<td width="90%">
																					<select name="tickerIcon" style="width:100%;">
																						<option value="">Select an Icon</option>
																						<option value="newsicon_technical">Technical Icon</option>
																						<option value="newsicon_cipsoft">Staff Icon</option>
																						<option value="newsicon_development">Development Icon</option>
																						<option value="newsicon_community">Community Icon</option>
																					</select>
																				</td>
																				<td><input id="insertTicker" type="submit" name="insert" value="Add Ticker"></td>
																			</tr>
																		</table>																												
																	</td>
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
						</tbody>
					</table>
				</div><br>';
            include 'ticketspanel.php';
			$main_content .= '
				<br>
				<div class="TableContainer">
					<div class="CaptionContainer">
						<div class="CaptionInnerContainer"> 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
							<div class="Text">Shop System</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
						</div>
					</div>
					<table class="Table3" cellpadding="0" cellspacing="0">
						<tbody>
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
																<tr>
																	<td valign="middle" class="LabelV" width="90%">Double Points Status</td>';
																$doubleStatus = $SQL->query("SELECT `value` FROM `server_config` WHERE `config` = 'double'")->fetch();
																$main_content .= '
																	<td>
																		<a href="#" id="doubleStatus"><img src="'.$layout_name.'/images/shop/'.(($doubleStatus['value'] == "active") ? 'on' : 'off').'.png" width="47px" height="23px" title="Ativo"></a>
																	</td>
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
															<table class="TableContent" width="100%">';
															
														$get_Categories = $SQL->query("SELECT * FROM `z_shop_category` ORDER BY `name` ASC");
														$cat_number = 0;
														foreach($get_Categories as $cat) {
															$bgcolor = (($cat_number++ % 2 == 1) ?  $config['site']['lightborder'] : $config['site']['darkborder']);
															$main_content .= '
																	<tr bgcolor="'.$bgcolor.'">
																		<td><strong>'.$cat['name'].'</strong></td>
																		<td width="70%">
																			<a href="#" id="categoryStatus">'.(($cat['hide'] == 0) ? 'Disable' : 'Enable').'</a>
																			<input type="hidden" class="ServiceId" name="ServiceId" value="'.$cat['id'].'">
																		</td>
																		<td>
																			<a '.(($cat['hide'] >= 1) ? 'style="display:none;"' : '').' class="manageAction" href="?subtopic=adminpanel&action=shopmanage&serviceId='.$cat['id'].'">Manage</a>
																		</td>
																	</tr>';
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
							<tr>
								<td align="center">
									<form method="post" action="?subtopic=adminpanel&action=history">
										<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green.gif)" >
											<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green_over.gif);" ></div>
												<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_viewhistory.gif" >
											</div>
										</div>
									</form>
								</td>
							</tr>
						</tbody>
					</table>
				</div><br>
					<center>
						<form method="post" action="?subtopic=accountmanagement">
							<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
								<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
									<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
								</div>
							</div>
						</form>
					</center>';
		}
		if($action == "manageplayers") {
			$main_content .= '
				<center>
					<table>
						<tbody>
							<tr>
								<td><img src="'.$layout_name.'/images/global/content/headline-bracer-left.gif"></td>
								<td style="text-align:center;vertical-align:middle;horizontal-align:center;font-size:17px;font-weight:bold;">Manage Players</td>
								<td><img src="'.$layout_name.'/images/global/content/headline-bracer-right.gif"></td>
							</tr>
						</tbody>
					</table>
				</center>
				<br>';
				
			if(!isset($_REQUEST['playerview'])) {
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
											<td><input name="playerview" value="'.$_REQUEST['playerview'].'" size="29" maxlenght="29"></td>
											<td><input type="image" name="Submit" src="'.$layout_name.'/images/global/buttons/sbutton_submit.gif" border="0" width="120" height="18"></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</form>';
			} else {
				$player_name = trim($_REQUEST['playerview']);
				$player = new Player();
				$player->find($player_name);
				if(!$player->isLoaded()) {
					$main_content .= '
							<div class="TableContainer" >
								<table class="Table1" cellpadding="0" cellspacing="0" >
									<div class="CaptionContainer" >
										<div class="CaptionInnerContainer" > 
											<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
											<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
											<div class="Text" >Player Page Error</div>
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
														<td>The character with name '.$player_name.' doesn\'t exist. Please try again.</td>
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
											<form action="?subtopic=adminpanel&action=manageplayers" method="post">
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
							<div class="TableContainer" >
								<table class="Table5" cellpadding="0" cellspacing="0">
									<div class="CaptionContainer" >
										<div class="CaptionInnerContainer" > 
											<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span> 
											<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span> 
											<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
											<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
											<div class="Text" >'.$player->getName().'</div>
											<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span> 
											<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
											<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span> 
											<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span> 
										</div>
									</div>
									<tr>
										<td>
											<div class="InnerTableContainer">
												<table style="width:100%;" >
													<tr>
														<td>
															<div class="TableShadowContainerRightTop" >
																<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
															</div>
															<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
																<div class="TableContentContainer" >
																	<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
																		<tr>
																			<td class="LabelV">Add Premium Points</td>
																			<td>
																				<input type="number" name="addPoints">
																				<input type="hidden" name="accountPoints" value="'.$player->getAccount()->getName().'">
																				<button type="submit" id="addP" name="addP">Add Points</button>
																			</td>
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
							</div>
							<TABLE width="100%">
								<tr align="center">
									<td>
										<form action="?subtopic=adminpanel&action=manageplayers" method="post" style="padding:0px;margin:0px;" >
											<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
												</div>
											</div>
										</form>
									</td>
								</tr>
							</TABLE>';
				}
			}
		}
		if($action == "history") {
			$main_content .= '
				<table class="Table5" cellpadding="0" cellspacing="0" width="100%">
					<tbody>
						<tr>
							<td>
								<div class="InnerTableContainer">
									<table style="width:100%;">
										<tbody>
											<tr>
												<td>
													<div class="TableShadowContainerRightTop">
														<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);"></div>
													</div>
													<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);">
														<div class="TableContentContainer">
															<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																<tbody>
																	<tr>
																		<td><img class="AccountStatusImage" src="'.$layout_name.'/images/account/account-status_green.gif" alt="free account"></td>
																		<td width="100%" valign="middle">';
																	function porcentagem_xn ( $porcentagem, $total ) {
																			return ( $porcentagem / 100 ) * $total;
																		}
																	$getBalance = $SQL->query("SELECT `price` FROM `z_shop_donates` WHERE YEAR(FROM_UNIXTIME(date)) = YEAR(CURDATE()) AND MONTH(FROM_UNIXTIME(date)) = MONTH(CURDATE()) AND `status` = 'received'")->fetchAll();
																	foreach($getBalance as $balance) {
																		$somaBalance += $balance['price'];
																	}
																		$main_content .= '
																			<span class="red">
																				<span class="BigBoldText">R$ '.number_format($somaBalance, 2, ',', '.').'</span>
																			</span>
																		</td>				
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
													<div class="TableShadowContainer">
														<div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bm.gif);">
														<div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bl.gif);"></div>
														<div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-br.gif);"></div>
													</div>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			<br>';
			$main_content .= '
			<div class="SmallBox" >
				<div class="MessageContainer" >
					<div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/global/content/box-frame-horizontal.gif);" /></div>
					<div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></div>
					<div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></div>
					<div class="Message">
						<div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></div>
						<div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></div>
						<table style="width:100%;" >
							<td style="width:100%;text-align:center;" ><nobr>[<a href="#Ultimos+Servicos" >Últimos serviços comprados</a>]</nobr> <nobr>[<a href="#Confirmed" >Daoações confirmadas</a>]</nobr> <nobr>[<a href="#Pagseguro" >Pagseguro</a>]</nobr> <nobr>[<a href="#Bank+Transfer" >Transferência bancárias</a>]</nobr> <nobr>[<a href="#Paypal" >Paypal</a>]</nobr></td>
						</tr>
					</table>
				</div>
				<div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/global/content/box-frame-horizontal.gif);" /></div>
				<div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></div>
				<div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></div>
			</div>
		</div>
		<br/>';
			$main_content .= '
				<a name="Ultimos+Servicos" ></a>
				<div class="TopButtonContainer" >
					<div class="TopButton" >
						<a href="#top" >
							<image style="border:0px;" src="'.$layout_name.'/images/global/content/back-to-top.gif" />
						</a>
					</div>
				</div>
				<div class="TableContainer">
					<div class="CaptionContainer">
						<div class="CaptionInnerContainer"> 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
							<div class="Text">5 últimos serviços comprados no site</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
						</div>
					</div>
					<table class="Table3" cellpadding="0" cellspacing="0">
						<tbody>
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
															<table class="TableContent" width="100%">';
														$get_Services = $SQL->query("SELECT * FROM `z_shop_payment` ORDER BY `date` DESC LIMIT 5")->fetchAll();
														$getCountServices = $SQL->query("SELECT COUNT(*) FROM `z_shop_payment` WHERE `status` = 'received'")->fetchColumn();
														if($getCountServices > 0) {
															$main_content .= '
																	<tr>';
															foreach($get_Services as $service) {
																$get_historyService = $SQL->query("SELECT * FROM `z_shop_offer` WHERE `id` = '".$service['service_id']."'")->fetch();
																$pathToService = "";
																if ($get_historyService['category'] == 2)
																	$pathToService = "images/payment/".$get_historyService['default_image'];
																elseif ($get_historyService['category'] == 3)
																	$pathToService = "images/shop/outfits/".strtolower(str_replace(" ","_",$get_historyService['addon_name']))."_male.gif";
																elseif ($get_historyService['category'] == 4)
																	$pathToService = "images/shop/items/".$get_historyService['itemid'].".gif";
																
																$main_content .= '
																		<td>
																			<center>
																				<img src="'.$layout_name.'/'.$pathToService.'" alt="Tibiamax"/><br>
																				<small><strong>'.$get_historyService['offer_name'].'</strong></small><br>
																				<small>(Comprado com a conta: <strong>'.$service['account_name'].'</strong>)</small>
																			</center>
																		</td>';
																
															}
																$main_content .= '
																	</tr>';
														} else
															$main_content .= '
																<tr bgcolor="'.$config['site']['lightborder'].'">
																	<td colspan="5">Nenhum serviço comprado ainda.</td>
																</tr>';
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
											</tr>';
									if($getCountServices > 5)
										$main_content .= '
											<tr>
												<td align="center">
													<form method="post" action="?subtopic=adminpanel&action=historymore">
														<input type="hidden" name="service" value="items">
														<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green.gif)" >
															<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green_over.gif);" ></div>
																<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_vermais.gif" >
															</div>
														</div>
													</form>

												</td>
											</tr>';
									$main_content .= '
										</table>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div><br>';
			$main_content .= '
				<a name="Confirmed" ></a>
				<div class="TopButtonContainer" >
					<div class="TopButton" >
						<a href="#top" >
							<image style="border:0px;" src="'.$layout_name.'/images/global/content/back-to-top.gif" />
						</a>
					</div>
				</div>
				<div class="TableContainer">
					<div class="CaptionContainer">
						<div class="CaptionInnerContainer"> 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
							<div class="Text">Últimas 10 doações confirmadas</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
						</div>
					</div>
					<table class="Table3" cellpadding="0" cellspacing="0">
						<tbody>
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
																<tr bgcolor="#D4C0A1">';
															$get_OrdersConfirmed = $SQL->query("SELECT * FROM `z_shop_donates` WHERE `status` = 'confirmed' ORDER BY `date` DESC LIMIT 10")->fetchAll();
															$getCountOrders = $SQL->query("SELECT COUNT(*) FROM `z_shop_donates` WHERE `status` = 'confirmed'")->fetchColumn();
																$main_content .= '
																	<td class="LabelV">Date</td>
																	<td class="LabelV">Service</td>
																	<td class="LabelV">Price</td>																	
																	<td class="LabelV">Method</td>
																	<td class="LabelV">Bank Name</td>
																	<td class="LabelV">Status</td>
																	<td class="LabelV"></td>
																</tr>';
														
														$n = 0;
														if($getCountOrders > 0)														
															foreach($get_OrdersConfirmed as $order) {
																$bgcolor = (($n++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
																$main_content .= '
																	<tr bgcolor="'.$bgcolor.'">
																		<td>'.date("M d Y, G:i:s", $order['date']).'</td>
																		<td>'.$order['points'].' Premium Points</td>
																		<td>'.$order['price'].' BRL</td>
																		<td>'.$order['method'].'</td>';
																		$bankref = explode("-",$order['reference']);
																		$bankName = $bankref[1];
																		$main_content .= '<td>'.$bankName.'</td>';
																$main_content .= '
																		<td>'.$order['status'].'</td>
																		<td>'.(($order['status'] == "confirmed") ? '[<a href="?subtopic=adminpanel&action=sendPoints&orderID='.$order['id'].'">view</a>]' : '').'</td>
																	</tr>';
															}
														else
															$main_content .= '
																<tr bgcolor="'.$config['site']['lightborder'].'">
																	<td colspan="7">Nenhuma doação confirmada ainda.</td>
																</tr>';
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
						</tbody>
					</table>
				</div><br>';
			$main_content .= '
				<a name="Pagseguro" ></a>
				<div class="TopButtonContainer" >
					<div class="TopButton" >
						<a href="#top" >
							<image style="border:0px;" src="'.$layout_name.'/images/global/content/back-to-top.gif" />
						</a>
					</div>
				</div>
				<div class="TableContainer">
					<div class="CaptionContainer">
						<div class="CaptionInnerContainer"> 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
							<div class="Text">10 últimas doações realizadas por PagSeguro</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
						</div>
					</div>
					<table class="Table3" cellpadding="0" cellspacing="0">
						<tbody>
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
																<tr bgcolor="#D4C0A1">
																	<td class="LabelV">Data</td>
																	<td class="LabelV">Código da Transação</td>
																	<td class="LabelV">Referência/Nome da conta</td>
																	<td class="LabelV">Valor</td>
																	<td class="LabelV">Status</td>
																	
																</tr>';
														$status_pagamento = array(
															1 => "Aguardando pagamento",
															2 => "Em análise",
															3 => "Paga",
															4 => "Disponivel",
															5 => "Em disputa",
															6 => "Devolvida",
															7 => "Cancelada",
															8 => "Chargeback debitado",
															9 => "Em contestação"
														);
														$get_Pagseguro = $SQL->query("SELECT * FROM `pagseguro` ORDER BY `date` DESC LIMIT 10")->fetchAll();
														$getCountPagseguro = $SQL->query("SELECT COUNT(*) FROM `pagseguro`")->fetchColumn();
														$n = 0;
														if($getCountPagseguro > 0)														
															foreach($get_Pagseguro as $pagseguro) {
																$bgcolor = (($n++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
																$refPagseguro = explode("-",$pagseguro['reference']);
																$refPag = $refPagseguro[0];
																$getPriceService = $SQL->query("SELECT `price` FROM ``");
																$main_content .= '
																	<tr bgcolor="'.$bgcolor.'">
																		<td>'.$pagseguro['date'].'</td>';
																	$main_content .= '
																		<td>'.$pagseguro['code'].'</td>
																		<td>'.$pagseguro['reference'].'</td>';
																	$getReference = explode("-",$pagseguro['reference']);
																	$pagseguroReference = $getReference[0];
																	$getValor = $SQL->query("SELECT `price` FROM `z_shop_donates` WHERE `reference` = '$pagseguroReference'")->fetch();
																	$main_content .= '
																		<td>'.number_format($getValor['price'], 2, ',', '.').'</td>
																		<td>'.$status_pagamento[$pagseguro['status']].'</td>';
																$main_content .= '
																	</tr>';
															}
														else
															$main_content .= '
																<tr bgcolor="'.$config['site']['lightborder'].'">
																	<td colspan="5">Nenhuma doação realizada ainda.</td>
																</tr>';
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
											</tr>';
									if($getCountPagseguro > 10)
										$main_content .= '
											<tr>
												<td align="center">
													<form method="post" action="?subtopic=adminpanel&action=historymore">
														<input type="hidden" name="service" value="pagseguro">
														<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green.gif)" >
															<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green_over.gif);" ></div>
																<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_vermais.gif" >
															</div>
														</div>
													</form>

												</td>
											</tr>';
									$main_content .= '
										</table>
									</div>
								</td>
							</tr>
							
						</tbody>
					</table>
				</div><br>';
				$main_content .= '
				<a name="Bank+Transfer" ></a>
				<div class="TopButtonContainer" >
					<div class="TopButton" >
						<a href="#top" >
							<image style="border:0px;" src="'.$layout_name.'/images/global/content/back-to-top.gif" />
						</a>
					</div>
				</div>
				<div class="TableContainer">
					<div class="CaptionContainer">
						<div class="CaptionInnerContainer"> 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
							<div class="Text">10 últimas doações realizadas por transferência bancária</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
						</div>
					</div>
					<table class="Table3" cellpadding="0" cellspacing="0">
						<tbody>
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
																<tr bgcolor="#D4C0A1">
																	<td class="LabelV">Data</td>
																	<td class="LabelV">Referência</td>
																	<td class="LabelV">Nome da conta</td>
																	<td class="LabelV">Valor</td>
																	<td class="LabelV">Status</td>
																</tr>';
														$get_Transfers = $SQL->query("SELECT * FROM `z_shop_donates` WHERE `method` = 'banktransfer' ORDER BY `date` DESC LIMIT 10")->fetchAll();
														$getCountTransfers = $SQL->query("SELECT COUNT(*) FROM `z_shop_donates` WHERE `method` = 'banktransfer'")->fetchColumn();
														$n = 0;
														if($getCountTransfers > 0)														
															foreach($get_Transfers as $transfer) {
																$bgcolor = (($n++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
																$main_content .= '
																	<tr bgcolor="'.$bgcolor.'">
																		<td>'.date("M d Y, G:i:s",$transfer['date']).'</td>';
																	$main_content .= '
																		<td>'.$transfer['reference'].'</td>
																		<td>'.$transfer['account_name'].'</td>
																		<td>'.number_format($transfer['price'], 2, ',', '.').'</td>
																		<td>'.$transfer['status'].'</td>';
																$main_content .= '
																	</tr>';
															}
														else
															$main_content .= '
																<tr bgcolor="'.$config['site']['lightborder'].'">
																	<td colspan="5">Nenhuma doação realizada ainda.</td>
																</tr>';
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
											</tr>';
									if($getCountTransfers > 10)
										$main_content .= '
											<tr>
												<td align="center">
													<form method="post" action="?subtopic=adminpanel&action=historymore">
														<input type="hidden" name="service" value="transfer">
														<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green.gif)" >
															<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green_over.gif);" ></div>
																<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_vermais.gif" >
															</div>
														</div>
													</form>

												</td>
											</tr>';
									$main_content .= '
										</table>
									</div>
								</td>
							</tr>
							
						</tbody>
					</table>
				</div><br>';
			$main_content .= '
				<a name="Paypal" ></a>
				<div class="TopButtonContainer" >
					<div class="TopButton" >
						<a href="#top" >
							<image style="border:0px;" src="'.$layout_name.'/images/global/content/back-to-top.gif" />
						</a>
					</div>
				</div>
				<div class="TableContainer">
					<div class="CaptionContainer">
						<div class="CaptionInnerContainer"> 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
							<div class="Text">10 últimas doações realizadas por PayPal</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
						</div>
					</div>
					<table class="Table3" cellpadding="0" cellspacing="0">
						<tbody>
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
																<tr bgcolor="#D4C0A1">
																	<td class="LabelV">Data</td>
																	<td class="LabelV">Referência</td>
																	<td class="LabelV">Nome da conta</td>
																	<td class="LabelV">Valor</td>
																	<td class="LabelV">Status</td>
																</tr>';
														$get_Paypal = $SQL->query("SELECT * FROM `z_shop_donates` WHERE `method` = 'paypal' ORDER BY `date` DESC LIMIT 10")->fetchAll();
														$getCountPaypal = $SQL->query("SELECT COUNT(*) FROM `z_shop_donates` WHERE `method` = 'paypal'")->fetchColumn();
														$n = 0;
														if($getCountPaypal > 0)														
															foreach($get_Paypal as $paypal) {
																$bgcolor = (($n++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
																$main_content .= '
																	<tr bgcolor="'.$bgcolor.'">
																		<td>'.date("M d Y, G:i:s",$paypal['date']).'</td>';
																	$main_content .= '
																		<td>'.$paypal['reference'].'</td>
																		<td>'.$paypal['account_name'].'</td>
																		<td>'.number_format($paypal['price'], 2, ',', '.').'</td>
																		<td>'.$paypal['status'].'</td>';
																$main_content .= '
																	</tr>';
															}
														else
															$main_content .= '
																<tr bgcolor="'.$config['site']['lightborder'].'">
																	<td colspan="5">Nenhuma doação realizada ainda.</td>
																</tr>';
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
											</tr>';
									if($getCountPaypal > 10)
										$main_content .= '
											<tr>
												<td align="center">
													<form method="post" action="?subtopic=adminpanel&action=historymore">
														<input type="hidden" name="service" value="paypal">
														<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green.gif)" >
															<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green_over.gif);" ></div>
																<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_vermais.gif" >
															</div>
														</div>
													</form>

												</td>
											</tr>';
									$main_content .= '
										</table>
									</div>
								</td>
							</tr>
							
						</tbody>
					</table>
				</div><br>';
			
			$main_content .= '
				<center>
					<form method="post" action="?subtopic=adminpanel">
						<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
							<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
								<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
							</div>
						</div>
					</form>
				</center>';
		}
		if($action == "historymore") {
			$serviceGo = trim($_POST['service']);
			
			if ($serviceGo == "items") {
				$main_content .= '
					<table class="Table5" cellpadding="0" cellspacing="0" width="100%">
						<tbody>
							<tr>
								<td>
									<div class="InnerTableContainer">
										<table style="width:100%;">
											<tbody>
												<tr>
													<td>
														<div class="TableShadowContainerRightTop">
															<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);"></div>
														</div>
														<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);">
															<div class="TableContentContainer">
																<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																	<tbody>
																		<tr>
																			<td><img class="AccountStatusImage" src="'.$layout_name.'/images/account/account-status_green.gif" alt="free account"></td>
																			<td width="100%" valign="middle">';
																		$getItemsMonth = $SQL->query("SELECT COUNT(*) FROM `z_shop_payment` WHERE YEAR(FROM_UNIXTIME(date)) = YEAR(CURDATE()) AND MONTH(FROM_UNIXTIME(date)) = MONTH(CURDATE()) AND `status` = 'received'")->fetchColumn();
																		$getItemsTotal = $SQL->query("SELECT COUNT(*) FROM `z_shop_payment` WHERE `status` = 'received'")->fetchColumn();

																			$main_content .= '
																				<span class="green">
																					<span class="BigBoldText">'.$getItemsMonth.' itens comprados</span>
																				</span>
																				<small>
																					<br>Itens comprados no mês de '.date('F').'.<br>
																					(Desde o último reset o já foram comprados <span class="green">'.$getItemsTotal.' itens</span>)
																				</small>
																			</td>				
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
														<div class="TableShadowContainer">
															<div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bm.gif);">
															<div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bl.gif);"></div>
															<div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-br.gif);"></div>
														</div>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<br>';
			} elseif ($serviceGo == "pagseguro") {
				$main_content .= '
					<table class="Table5" cellpadding="0" cellspacing="0" width="100%">
						<tbody>
							<tr>
								<td>
									<div class="InnerTableContainer">
										<table style="width:100%;">
											<tbody>
												<tr>
													<td>
														<div class="TableShadowContainerRightTop">
															<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);"></div>
														</div>
														<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);">
															<div class="TableContentContainer">
																<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																	<tbody>
																		<tr>
																			<td><img class="AccountStatusImage" src="'.$layout_name.'/images/account/account-status_green.gif" alt="free account"></td>
																			<td width="100%" valign="middle">';
																		function porcentagem_xn ( $porcentagem, $total ) {
																				return ( $porcentagem / 100 ) * $total;
																			}
																		$getPag = $SQL->query("SELECT * FROM `pagseguro` WHERE `status` = '3'")->fetchAll();
																		foreach($getPag as $pag){
																			$getPagRef = explode("-",$pag['reference']);
																			$getPagBalanceMonth = $SQL->query("SELECT `price` FROM `z_shop_donates` WHERE YEAR(FROM_UNIXTIME(date)) = YEAR(CURDATE()) AND MONTH(FROM_UNIXTIME(date)) = MONTH(CURDATE()) AND `reference` = '".$getPagRef[0]."' AND `status` = 'received'")->fetch();
																			$getPagBalanceTotal = $SQL->query("SELECT `price` FROM `z_shop_donates` WHERE `reference` = '".$getPagRef[0]."' AND `status` = 'received'")->fetch();
																			$pagMonth += $getPagBalanceMonth['price'];
																			$pagTotal += $getPagBalanceTotal['price'];
																		}
																			$main_content .= '
																				<span class="green">
																					<span class="BigBoldText">R$ '.number_format($pagMonth, 2, ',', '.').'</span>
																				</span>
																				<small>
																					<br>O saldo acima é referente ao total de todas as doações realizadas no mês de '.date('F').'.<br>
																					As doações realizadas desde o último reset representam um total de <span class="green">'.number_format($pagTotal, 2, ',', '.').'</span><br>
																					(Natanael possui 40% dos lucros, um total de <span class="green">R$ '.number_format(porcentagem_xn(40,$pagMonth), 2, ',', '.').'</span> no mês de '.date('F').' e <span class="green">R$ '.number_format(porcentagem_xn(40,$pagTotal), 2, ',', '.').'</span> desde o último reset)
																				</small>
																			</td>				
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
														<div class="TableShadowContainer">
															<div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bm.gif);">
															<div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bl.gif);"></div>
															<div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-br.gif);"></div>
														</div>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<p>A lista abaixo mostra as últimas 40 doações realizadas por '.$serviceGo.'.</p>';
				$main_content .= '
				<div class="TableContainer">
					<div class="CaptionContainer">
						<div class="CaptionInnerContainer"> 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
							<div class="Text">Doações realizadas por '.$serviceGo.'</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
						</div>
					</div>
					<table class="Table3" cellpadding="0" cellspacing="0">
						<tbody>
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
																<tr bgcolor="#D4C0A1">
																	<td class="LabelV">Data</td>
																	<td class="LabelV">Código da Transação</td>
																	<td class="LabelV">Referência/Nome da conta</td>
																	<td class="LabelV">Valor</td>
																	<td class="LabelV">Status</td>
																	
																</tr>';
														$status_pagamento = array(
															1 => "Aguardando pagamento",
															2 => "Em análise",
															3 => "Paga",
															4 => "Disponivel",
															5 => "Em disputa",
															6 => "Devolvida",
															7 => "Cancelada",
															8 => "Chargeback debitado",
															9 => "Em contestação"
														);
														$get_Pagseguro = $SQL->query("SELECT * FROM `pagseguro` ORDER BY `date` DESC LIMIT 40")->fetchAll();
														$getCountPagseguro = $SQL->query("SELECT COUNT(*) FROM `pagseguro`")->fetchColumn();
														$n = 0;
														if($getCountPagseguro > 0)														
															foreach($get_Pagseguro as $pagseguro) {
																$bgcolor = (($n++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
																$refPagseguro = explode("-",$pagseguro['reference']);
																$refPag = $refPagseguro[0];
																$getPriceService = $SQL->query("SELECT `price` FROM ``");
																$main_content .= '
																	<tr bgcolor="'.$bgcolor.'">
																		<td>'.$pagseguro['date'].'</td>';
																	$main_content .= '
																		<td>'.$pagseguro['code'].'</td>
																		<td>'.$pagseguro['reference'].'</td>';
																	$getReference = explode("-",$pagseguro['reference']);
																	$pagseguroReference = $getReference[0];
																	$getValor = $SQL->query("SELECT `price` FROM `z_shop_donates` WHERE `reference` = '$pagseguroReference'")->fetch();
																	$main_content .= '
																		<td>'.number_format($getValor['price'], 2, ',', '.').'</td>
																		<td>'.$status_pagamento[$pagseguro['status']].'</td>';
																$main_content .= '
																	</tr>';
															}
														else
															$main_content .= '
																<tr bgcolor="'.$config['site']['lightborder'].'">
																	<td colspan="5">Nenhuma doação realizada ainda.</td>
																</tr>';
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
											</tr>';
									$main_content .= '
										</table>
									</div>
								</td>
							</tr>
							
						</tbody>
					</table>
				</div><br>';
			} else {
				$getMonthBalance = "";
				$getTotalBalance = "";
				if ($serviceGo == "paypal") {
					$getMonthBalance = "SELECT `price` FROM `z_shop_donates` WHERE YEAR(FROM_UNIXTIME(date)) = YEAR(CURDATE()) AND MONTH(FROM_UNIXTIME(date)) = MONTH(CURDATE()) AND `status` = 'received' AND `method` = 'paypal'";
					$getTotalBalance = "SELECT `price` FROM `z_shop_donates` WHERE `status` = 'received' AND `method` = 'paypal'";
					$method = "paypal";
				} elseif ($serviceGo == "transfer") {
					$getMonthBalance = "SELECT `price` FROM `z_shop_donates` WHERE YEAR(FROM_UNIXTIME(date)) = YEAR(CURDATE()) AND MONTH(FROM_UNIXTIME(date)) = MONTH(CURDATE()) AND `status` = 'received' AND `method` = 'banktransfer'";
					$getTotalBalance = "SELECT `price` FROM `z_shop_donates` WHERE `status` = 'received' AND `method` = 'banktransfer'";
					$method = "banktransfer";
				}
				$main_content .= '
					<table class="Table5" cellpadding="0" cellspacing="0" width="100%">
						<tbody>
							<tr>
								<td>
									<div class="InnerTableContainer">
										<table style="width:100%;">
											<tbody>
												<tr>
													<td>
														<div class="TableShadowContainerRightTop">
															<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);"></div>
														</div>
														<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);">
															<div class="TableContentContainer">
																<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																	<tbody>
																		<tr>
																			<td><img class="AccountStatusImage" src="'.$layout_name.'/images/account/account-status_green.gif" alt="free account"></td>
																			<td width="100%" valign="middle">';
																		function porcentagem_xn ( $porcentagem, $total ) {
																				return ( $porcentagem / 100 ) * $total;
																			}
																		$getM = $SQL->query($getMonthBalance)->fetchAll();
																		$getT = $SQL->query($getTotalBalance)->fetchAll();
																		foreach($getM as $monthBalance) {
																			$balancoMensal += $monthBalance['price'];
																		}
																		foreach($getT as $totalBalance) {
																			$balancoTotal += $totalBalance['price'];
																		}
																			$main_content .= '
																				<span class="green">
																					<span class="BigBoldText">R$ '.number_format($balancoMensal, 2, ',', '.').'</span>
																				</span>
																				<small>
																					<br>O saldo acima é referente ao total de todas as doações realizadas no mês de '.date('F').'.<br>
																					As doações realizadas desde o último reset representam um total de <span class="green">'.number_format($balancoTotal, 2, ',', '.').'</span><br>
																					(Natanael possui 40% dos lucros, um total de <span class="green">R$ '.number_format(porcentagem_xn(40,$balancoMensal), 2, ',', '.').'</span> no mês de '.date('F').' e <span class="green">R$ '.number_format(porcentagem_xn(40,$balancoTotal), 2, ',', '.').'</span> desde o último reset)
																				</small>
																			</td>				
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
														<div class="TableShadowContainer">
															<div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bm.gif);">
															<div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bl.gif);"></div>
															<div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-br.gif);"></div>
														</div>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<br>';
				$main_content .= '
				<a name="Paypal" ></a>
				<div class="TopButtonContainer" >
					<div class="TopButton" >
						<a href="#top" >
							<image style="border:0px;" src="'.$layout_name.'/images/global/content/back-to-top.gif" />
						</a>
					</div>
				</div>
				<div class="TableContainer">
					<div class="CaptionContainer">
						<div class="CaptionInnerContainer"> 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
							<div class="Text">10 últimas doações realizadas por PayPal</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
						</div>
					</div>
					<table class="Table3" cellpadding="0" cellspacing="0">
						<tbody>
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
																<tr bgcolor="#D4C0A1">
																	<td class="LabelV">Data</td>
																	<td class="LabelV">Referência</td>
																	<td class="LabelV">Nome da conta</td>
																	<td class="LabelV">Valor</td>
																	<td class="LabelV">Status</td>
																</tr>';
														$get_Mov = $SQL->query("SELECT * FROM `z_shop_donates` WHERE `method` = '$method' ORDER BY `date` DESC LIMIT 40")->fetchAll();
														$get_MovCount = $SQL->query("SELECT COUNT(*) FROM `z_shop_donates` WHERE `method` = '$method'")->fetchColumn();
														$n = 0;
														if($get_MovCount > 0)														
															foreach($get_Mov as $mov) {
																$bgcolor = (($n++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
																$main_content .= '
																	<tr bgcolor="'.$bgcolor.'">
																		<td>'.date("M d Y, G:i:s",$mov['date']).'</td>';
																	$main_content .= '
																		<td>'.$mov['reference'].'</td>
																		<td>'.$mov['account_name'].'</td>
																		<td>'.number_format($mov['price'], 2, ',', '.').'</td>
																		<td>'.$mov['status'].'</td>';
																$main_content .= '
																	</tr>';
															}
														else
															$main_content .= '
																<tr bgcolor="'.$config['site']['lightborder'].'">
																	<td colspan="5">Nenhuma doação realizada ainda.</td>
																</tr>';
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
											</tr>';
									$main_content .= '
										</table>
									</div>
								</td>
							</tr>
							
						</tbody>
					</table>
				</div><br>';
			}
			
			$main_content .= '
				<center>
					<form method="post" action="?subtopic=adminpanel&action=history">
						<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
							<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
								<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
							</div>
						</div>
					</form>
				</center>';
		}
		if($action == "sendPoints") {
			if(!isset($_REQUEST['orderID']))
				$points_errors[] = "You must enter the order ID.";
			if(!empty($points_errors)) {
				$main_content .= '
						<div class="TableContainer" >
							<table class="Table1" cellpadding="0" cellspacing="0" >
								<div class="CaptionContainer" >
									<div class="CaptionInnerContainer" > 
										<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
										<div class="Text" >Send Points Errors</div>
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
													foreach($points_errors as $p_error)
														$main_content .= $p_error . '<br>';
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
										<form action="?subtopic=adminpanel&action=history" method="post">
											<input type="hidden" name="ServiceCategoryID" value="'.$serviceCategoryID.'" />
											<input type="hidden" name="step" value="1">
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
				
				if($_REQUEST['confirm'] == "yes") {
					
					$orderID = $_REQUEST['orderID'];
					$orderAccount = $_REQUEST['orderAccName'];
					$doubleStatus = $SQL->query("SELECT `value` FROM `server_config` WHERE `config` = 'double'")->fetch();
					if ($doubleStatus['value'] == "active")
						$orderPoints = 2 * $_REQUEST['orderPoints'];
					else
					$orderPoints = $_REQUEST['orderPoints'];
					$loyaltyPoints = $_REQUEST['orderPoints'];
					$account_points = new Account();
					$account_points->loadByName($orderAccount);
	
					$account_points->setPremiumPoints($account_points->getPremiumPoints() + $orderPoints);
					$account_points->setLoyalty($account_points->getLoyalty() + $loyaltyPoints);
					$account_points->save();
					
					$update_order = $SQL->query("UPDATE `z_shop_donates` SET `status` = 'received' WHERE `id` = '$orderID' AND `account_name` = '".$account_points->getName()."'");
					
					$main_content .= '
						<div class="TableContainer" >
							<table class="Table1" cellpadding="0" cellspacing="0" >
								<div class="CaptionContainer" >
									<div class="CaptionInnerContainer" > 
										<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
										<div class="Text" >Points Sent</div>
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
													<td>You sent <strong>'.$orderPoints.'</strong> points to account <strong>'.$orderAccount.'</strong>.</td>
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
										<form action="?subtopic=adminpanel&action=history" method="post">
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
					
				}elseif($_REQUEST['confirm'] == "no") {
					$orderID = $_REQUEST['orderID'];
					$orderAccount = $_REQUEST['orderAccName'];
					
					$update_order = $SQL->query("UPDATE `z_shop_donates` SET `status` = 'rejected' WHERE `id` = '$orderID' AND `account_name` = '$orderAccount'");
					
					$main_content .= '
						<div class="TableContainer" >
							<table class="Table1" cellpadding="0" cellspacing="0" >
								<div class="CaptionContainer" >
									<div class="CaptionInnerContainer" > 
										<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
										<div class="Text" >Confirmation Rejected</div>
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
													<td>You have rejected this confirmation succefully.</td>
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
										<form action="?subtopic=adminpanel&action=history" method="post">
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
					$orderID = $_REQUEST['orderID'];
					$getpayInfo = $SQL->query("SELECT * FROM `z_shop_donates` WHERE `id` = '$orderID'")->fetch();
					$getorderInfo = $SQL->query("SELECT * FROM `z_shop_donate_confirm` WHERE `donate_id` = '$orderID'")->fetch();
					$doubleStatus = $SQL->query("SELECT `value` FROM `server_config` WHERE `config` = 'double'")->fetch();
					$main_content .= '
						<div class="TableContainer">
							<div class="CaptionContainer">
								<div class="CaptionInnerContainer"> 
									<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
									<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
									<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
									<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
									<div class="Text">Donate Confirmation</div>
									<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
									<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
									<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
									<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
								</div>
							</div>
							<table class="Table3" cellpadding="0" cellspacing="0">
								<tbody>
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
																		<tr bgcolor="'.$config['site']['darkborder'].'">
																			<td class="LabelV" width="50%">Donate Method</td>
																			<td>'.$getpayInfo['method'].'</td>
																		</tr>
																		<tr bgcolor="'.$config['site']['lightborder'].'">
																			<td class="LabelV">Buyer\'s Account Name</td>
																			<td>'.$getpayInfo['account_name'].'</td>
																		</tr>
																		<tr bgcolor="'.$config['site']['darkborder'].'">
																			<td class="LabelV">Confirmation Text</td>
																			<td>"<i>'.$getorderInfo['msg'].'</i>"</td>
																		</tr>
																		<tr bgcolor="'.$config['site']['lightborder'].'">
																			<td class="LabelV">Send '.(($doubleStatus['value'] == "active") ? (2 * $getpayInfo['points']) : $getpayInfo['points']).' premium points to account '.$getpayInfo['account_name'].' ?</td>
																			<td>																			
																				<table border="0" cellspacing="0" cellpadding="0" >
																					<form action="?subtopic=adminpanel&action=sendPoints" method="post">
																						<input type="hidden" name="orderID" value="'.$orderID.'">
																						<input type="hidden" name="orderAccName" value="'.$getpayInfo['account_name'].'">
																						<input type="hidden" name="orderPoints" value="'.$getpayInfo['points'].'">
																						<input type="hidden" name="confirm" value="yes">
																						<tr>
																							<td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green.gif)" >
																								<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green_over.gif);" ></div>
																										<input class="ButtonText" type="image" name="Confirm" alt="Confirm" src="'.$layout_name.'/images/global/buttons/_sbutton_confirm.gif" >
																									</div>
																								</div>
																							</td>
																						</tr>
																					</form>
																				</table>
																				<table border="0" cellspacing="0" cellpadding="0" >
																					<form action="?subtopic=adminpanel&action=sendPoints" method="post">
																						<input type="hidden" name="orderID" value="'.$orderID.'">
																						<input type="hidden" name="orderAccName" value="'.$getpayInfo['account_name'].'">
																						<input type="hidden" name="confirm" value="no">
																						<tr>
																							<td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_red.gif)" >
																								<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_red_over.gif);" ></div>
																										<input class="ButtonText" type="image" name="Cancel" alt="Cancel" src="'.$layout_name.'/images/global/buttons/_sbutton_cancel.gif" >
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
								</tbody>
							</table>
						</div>
						<TABLE BORDER=0 WIDTH=100%>
								<TR>
									<TD ALIGN=center>
										<table border="0" cellspacing="0" cellpadding="0" >
											<form action="?subtopic=adminpanel&action=history" method="post">
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
		}
		if($action == "shopmanage") {
			if(isset($_REQUEST['serviceId']))
				$serviceId = $_REQUEST['serviceId'];
			else header("Location: ?subtopic=adminpanel");
			
			if ($serviceId == 2) {
				$main_content .= '
					<center>
						<table>
							<tbody>
								<tr>
									<td><img src="'.$layout_name.'/images/global/content/headline-bracer-left.gif"></td>
									<td style="text-align:center;vertical-align:middle;horizontal-align:center;font-size:17px;font-weight:bold;">Managing Extra Services</td>
									<td><img src="'.$layout_name.'/images/global/content/headline-bracer-right.gif"></td>
								</tr>
							</tbody>
						</table>
					</center>
					<br>';
				$main_content .= '
				<div class="TableContainer">
					<div class="CaptionContainer">
						<div class="CaptionInnerContainer"> 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
							<div class="Text">Extra Services</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
						</div>
					</div>
					<table class="Table3" cellpadding="0" cellspacing="0">
						<tbody>
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
																<tr bgcolor="#D4C0A1">
																	<td class="LabelV">Name</td>
																	<td class="LabelV">Price</td>
																	<td class="LabelV">Status</td>
																	<td class="LabelV"> </td>
																</tr>';
															$getExtraServices = $SQL->query("SELECT * FROM `z_shop_offer` WHERE `category` = '$serviceId' ORDER BY `offer_name` ASC")->fetchAll();
															$offer_number = 0;
															foreach($getExtraServices as $g_extra) {
																if($g_extra['offer_type'] != "changesex")
																$main_content .= '
																	<tr bgcolor="'.$config['site']['lightborder'].'">
																		<td width="46%">'.$g_extra['offer_name'].'</td>
																		<td>
																			<input type="number" name="extraValue" value="'.$g_extra['points'].'" '.(($g_extra['hide'] == 1) ? 'disabled' : '').'>
																			<input type="submit" name="extraUpdate" id="extraUpdate" value="Update" '.(($g_extra['hide'] == 1) ? 'disabled' : '').'>
																			<input type="hidden" name="offerID" value="'.$g_extra['id'].'">
																		</td>
																		<td class="settingStatus">'.(($g_extra['hide'] == 0) ? '<font style="color:green;">Enabled</font>' : '<font style="color:red;">Disabled</font>').'</td>
																		<td><a href="#" id="extraStatus">'.(($g_extra['hide'] == 0) ? 'Disable' : 'Enable').'</a></td>
																	</tr>';
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
						</tbody>
					</table>
				</div><br>
				<div class="msgStatus" style="color:green; padding: 5px; background:#c2f4b2; border:1px solid #165303; display:none;"></div><br>
				<center>
					<form method="post" action="?subtopic=adminpanel">
						<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
							<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
								<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
							</div>
						</div>
					</form>
				</center><br>';
			}
			if ($serviceId == 3) {
				$main_content .= '
					<center>
						<table>
							<tbody>
								<tr>
									<td><img src="'.$layout_name.'/images/global/content/headline-bracer-left.gif"></td>
									<td style="text-align:center;vertical-align:middle;horizontal-align:center;font-size:17px;font-weight:bold;">Manage your Outfit Sales</td>
									<td><img src="'.$layout_name.'/images/global/content/headline-bracer-right.gif"></td>
								</tr>
							</tbody>
						</table>
					</center>
					<br>';
				$main_content .= '
					<div class="msgStatusSuccess" style="text-align:center;color:green; padding: 5px; background:#c2f4b2; border:1px solid #165303;margin-bottom:15px;display:none;">Success !</div>
					<div class="msgStatusError" style="text-align:center;color:red; padding: 5px; background:#e59d9d; border:1px solid red;margin-bottom:15px;display:none;">Error !</div>
					<div class="TableContainer">
						<div class="CaptionContainer">
							<div class="CaptionInnerContainer"> 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
								<div class="Text">Adding New Outfit</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							</div>
						</div>
						<table class="Table3" cellpadding="0" cellspacing="0">
							<tbody>
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
																	<tr style="background-color:#D4C0A1;" >
																		<td class="LabelV">Select Outfit</td>
																		<td class="LabelV">Premium Points</td>
																	</tr>
																	<tr style="background-color:'.$config['site']['lightborder'].';" >
																		<td>
																			<select name="selectOutfit">
																				<option value="">Select an Outfit</option>';
																		$outfitsList = simplexml_load_file($config['site']['serverPath'].'/data/XML/outfits.xml');
																		foreach($outfitsList->outfit as $olist) {
																			if ($olist['type'] == 0)
																			$main_content .= '
																				<option value="'.$olist['name'].'">'.$olist['name'].'</option>';
																		}
																		$main_content .= '
																			</select>
																		</td>
																		<td><input type="number" name="outfitPrice"></td>
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
												<tr>
													<td>
													<center>
													<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green.gif)" >
														<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green_over.gif);" ></div>
															<input id="outfitSubmit" class="ButtonText" type="image" name="outfitSubmit" alt="Submit" src="'.$layout_name.'/images/global/buttons/_sbutton_submit.gif" >
														</div>
													</div>
													</center>
													</td>
												</tr>
											</table>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div><br>
					<center>
						<form method="post" action="?subtopic=adminpanel">
							<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
								<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
									<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
								</div>
							</div>
						</form>
					</center><br>';
				$main_content .= '
					<div class="TableContainer">
						<div class="CaptionContainer">
							<div class="CaptionInnerContainer"> 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
								<div class="Text">Outfits list sale</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							</div>
						</div>
						<table class="Table3" cellpadding="0" cellspacing="0">
							<tbody>
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
																	<tr style="background-color:#D4C0A1;" >
																		<td class="LabelV">*</td>
																		<td class="LabelV">Ouftit Name</td>
																		<td class="LabelV">Price</td>
																		<td class="LabelV">*</td>
																	</tr>';
															$get_Outfits = $SQL->query("SELECT * FROM `z_shop_offer` WHERE `category` = '$serviceId' ORDER BY `offer_date` DESC")->fetchAll();
															$outfit_number = 0;
															foreach($get_Outfits as $g_out) {
																$bgcolor = (($outfit_number++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
																$main_content .= '
																	<tr style="background-color:'.$bgcolor.';" >
																		<td width="64px"><img src="'.$layout_name.'/images/shop/outfits/'.strtolower(str_replace(" ","_",$g_out['addon_name'])).'_male.gif"</td>
																		<td>'.$g_out['addon_name'].'</td>
																		<td>'.$g_out['points'].' Premium Points</td>
																		<td width="135px">
																			<form id="delOutfit" method="post" style="padding:0px;margin:0px;" >
																				<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_red.gif)" >
																					<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_red_over.gif);" ></div>
																						<input type="hidden" class="delOutfitId" name="delOutfitId" value="'.$g_out['id'].'">
																						<input class="ButtonText delOutfit" type="image" name="Delete" alt="Delete" src="'.$layout_name.'/images/global/buttons/_sbutton_delete.gif" >
																					</div>
																				</div>
																			</form>
																		</td>
																	</tr>';
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
							</tbody>
						</table>
					</div>';
			}
			if($serviceId == 4) {
				$main_content .= '
					<center>
						<table>
							<tbody>
								<tr>
									<td><img src="'.$layout_name.'/images/global/content/headline-bracer-left.gif"></td>
									<td style="text-align:center;vertical-align:middle;horizontal-align:center;font-size:17px;font-weight:bold;">Manage your Items Sales</td>
									<td><img src="'.$layout_name.'/images/global/content/headline-bracer-right.gif"></td>
								</tr>
							</tbody>
						</table>
					</center>
					<br>';
					
				$main_content .= '
					<div class="msgStatusSuccess" style="text-align:center;color:green; padding: 5px; background:#c2f4b2; border:1px solid #165303;margin-bottom:15px;display:none;"></div>
					<div class="msgStatusError" style="text-align:center;color:red; padding: 5px; background:#e59d9d; border:1px solid red;margin-bottom:15px;display:none;"></div>
					<div class="TableContainer">
						<div class="CaptionContainer">
							<div class="CaptionInnerContainer"> 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
								<div class="Text">Adding New Item</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							</div>
						</div>
						<table class="Table3" cellpadding="0" cellspacing="0">
							<tbody>
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
																	<tr style="background-color:#D4C0A1;" >
																		<td class="LabelV">Item ID</td>
																		<td class="LabelV">Item Name</td>
																		<td class="LabelV">Item Description</td>
																		<td class="LabelV">Amount</td>
																		<td class="LabelV">Premium Points</td>
																	</tr>
																	<tr bgcolor="'.$config['site']['lightborder'].'">
																		<td><input style="width:60px;" type="number" name="itemID" placeholder="Item Id"></td>
																		<td><input style="width:120px;" type="text" name="itemName" placeholder="Item Name"></td>
																		<td><input type="text" name="itemDesc" placeholder="Item Description" maxlenght="255"></td>
																		<td><input style="width:65px;" type="number" name="itemAmount" placeholder="Amount"></td>
																		<td><input type="number" style="width:75px;" name="itemPrice" placeholder="Item Price"></td>
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
												<tr>
													<td>
													<center>
													<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green.gif)" >
														<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green_over.gif);" ></div>
															<input id="itemSubmit" class="ButtonText" type="image" name="itemSubmit" alt="Submit" src="'.$layout_name.'/images/global/buttons/_sbutton_submit.gif" >
														</div>
													</div>
													</center>
													</td>
												</tr>
											</table>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div><br>
					<center>
						<form method="post" action="?subtopic=adminpanel">
							<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
								<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
									<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
								</div>
							</div>
						</form>
					</center><br>';
					
				$main_content .= '
					<div class="TableContainer">
						<div class="CaptionContainer">
							<div class="CaptionInnerContainer"> 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
								<div class="Text">Items list sale</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							</div>
						</div>
						<table class="Table3" cellpadding="0" cellspacing="0">
							<tbody>
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
																	<tr style="background-color:#D4C0A1;" >
																		<td class="LabelV">Item ID</td>
																		<td class="LabelV">Item Name</td>
																		<td class="LabelV">Item Description</td>
																		<td class="LabelV">Price</td>
																	</tr>';
															$get_Items = $SQL->query("SELECT * FROM `z_shop_offer` WHERE `category` = '$serviceId' ORDER BY `offer_date` DESC")->fetchAll();
															$item_number = 0;
															foreach($get_Items as $g_item) {
																$bgcolor = (($item_number++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
																$main_content .= '
																	<tr style="background-color:'.$bgcolor.';" >
																		<td width="32px">
																		<img src="'.$layout_name.'/images/shop/items/'.strtolower($g_item['itemid']).'.gif"</td>
																		<td>'.$g_item['itemid'].'</td>
																		<td>'.$g_item['offer_name'].'</td>
																		<td>'.((!empty($g_item['offer_description'])) ? $g_item['offer_description'] : 'No description').'</td>
																		<td>'.$g_item['points'].' Premium Points</td>																		
																		<td width="135px">
																			<form id="delItem" method="post" style="padding:0px;margin:0px;" >
																				<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_red.gif)" >
																					<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_red_over.gif);" ></div>
																						<input type="hidden" class="delItemId" name="delItemId" value="'.$g_item['id'].'">
																						<input class="ButtonText delItem" type="image" name="Delete" alt="Delete" src="'.$layout_name.'/images/global/buttons/_sbutton_delete.gif" >
																					</div>
																				</div>
																			</form>
																		</td>
																	</tr>';
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
							</tbody>
						</table>
					</div>';
			}
			if ($serviceId == 6) {
				$main_content .= '
					<center>
						<table>
							<tbody>
								<tr>
									<td><img src="'.$layout_name.'/images/global/content/headline-bracer-left.gif"></td>
									<td style="text-align:center;vertical-align:middle;horizontal-align:center;font-size:17px;font-weight:bold;">Manage your premium points packages</td>
									<td><img src="'.$layout_name.'/images/global/content/headline-bracer-right.gif"></td>
								</tr>
							</tbody>
						</table>
					</center>
					<br>';
				$main_content .= '<p>You must add a package of premium points for your player can buy products in your shop.</p>';
				$main_content .= '
					<div class="msgStatusSuccess" style="text-align:center;color:green; padding: 5px; background:#c2f4b2; border:1px solid #165303;margin-bottom:15px;display:none;"></div>
					<div class="msgStatusError" style="text-align:center;color:red; padding: 5px; background:#e59d9d; border:1px solid red;margin-bottom:15px;display:none;"></div>
					<div class="TableContainer">
						<div class="CaptionContainer">
							<div class="CaptionInnerContainer"> 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
								<div class="Text">Adding new package of premium points</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							</div>
						</div>
						<table class="Table3" cellpadding="0" cellspacing="0">
							<tbody>
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
																	<tr style="background-color:#D4C0A1;" >
																		<td class="LabelV">Amount of premium points</td>
																		<td class="LabelV">Price (R$)</td>
																		<td class="LabelV">Description</td>
																	</tr>
																	<tr bgcolor="'.$config['site']['lightborder'].'">
																		<td><input type="number" name="pointsAmount" placeholder="Amount of premium points"></td>
																		<td><input id="campoMoney" type="text" name="pointsPrice" placeholder="Price Ex. 10.00"></td>
																		<td><input type="text" name="pointsDesc" placeholder="Premium points short description" maxlenght="255"></td>
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
												<tr>
													<td>
													<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green.gif)" >
														<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green_over.gif);" ></div>
															<input id="pointsSubmit" class="ButtonText" type="image" name="pointsSubmit" alt="Submit" src="'.$layout_name.'/images/global/buttons/_sbutton_submit.gif" >
														</div>
													</div>
													</td>
												</tr>
											</table>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div><br>
					<center>
						<form method="post" action="?subtopic=adminpanel">
							<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
								<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
									<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
								</div>
							</div>
						</form>
					</center><br>';
				$main_content .= '
					<div class="TableContainer">
						<div class="CaptionContainer">
							<div class="CaptionInnerContainer"> 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
								<div class="Text">Premium Points list sale</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
							</div>
						</div>
						<table class="Table3" cellpadding="0" cellspacing="0">
							<tbody>
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
																	<tr style="background-color:#D4C0A1;" >
																		<td class="LabelV">Amount of Premium Points</td>
																		<td class="LabelV">Price</td>
																		<td class="LabelV">Description</td>
																		<td class="LabelV">*</td>
																	</tr>';
															$get_Points = $SQL->query("SELECT * FROM `z_shop_offer` WHERE `category` = '$serviceId' ORDER BY `offer_date` DESC")->fetchAll();
															$points_number = 0;
															foreach($get_Points as $g_point) {
																$bgcolor = (($points_number++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
																$main_content .= '
																	<tr style="background-color:'.$bgcolor.';" >
																		<td>'.$g_point['count'].' Premium Points</td>
																		<td>R$ '.number_format($g_point['price'],2,',','.').'</td>
																		<td>'.((!empty($g_point['offer_description'])) ? $g_point['offer_description'] : 'No description').'</td>																	
																		<td width="135px">
																			<form id="delPoint" method="post" style="padding:0px;margin:0px;" >
																				<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_red.gif)" >
																					<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_red_over.gif);" ></div>
																						<input type="hidden" class="delPointId" name="delPointId" value="'.$g_point['id'].'">
																						<input class="ButtonText delPoint" type="image" name="Delete" alt="Delete" src="'.$layout_name.'/images/global/buttons/_sbutton_delete.gif" >
																					</div>
																				</div>
																			</form>

																		</td>
																	</tr>';
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
							</tbody>
						</table>
					</div>';
			}
		}
	}
}