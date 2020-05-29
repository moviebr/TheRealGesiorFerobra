<?php
if (!defined('INITIALIZED'))
    exit;

if (!$logged)
    if ($action == "logout")
        $main_content .= '
			<div class="TableContainer" >
				<table class="Table1" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
							<div class="Text">Logout Successful</div>
							<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
						</div>
					</div>
					<tr>
						<td><div class="InnerTableContainer" >
								<table style="width:100%;" >
									<tr>
										<td>You have logged out of your ' . htmlspecialchars($config['server']['serverName']) . ' account. In order to view your account you need to <a href="?subtopic=accountmanagement" >log in</a> again.</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div>';
    else {
        $passB = '<span>Password:</span>';
        $logB = '<span>Account Name:</span>';
        if (isset($isTryingToLogin)) {
            $main_content .= '
				<div class="SmallBox" >
					<div class="MessageContainer" >
						<div class="BoxFrameHorizontal" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-horizontal.gif);" /></div>
						<div class="BoxFrameEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
						<div class="BoxFrameEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
						<div class="ErrorMessage" >
							<div class="BoxFrameVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></div>
							<div class="BoxFrameVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></div>
							<div class="AttentionSign" style="background-image:url(' . $layout_name . '/images/global/content/attentionsign.gif);" /></div>
							<b>The Following Errors Have Occurred:</b><br/>';
            switch (Visitor::getLoginState()) {
                case Visitor::LOGINSTATE_NO_ACCOUNT:
                    $main_content .= 'Account with that name doesn\'t exist.<br/>';
                    $logB = '<span style="color:red;">Account Name:</span>';
                    break;
                case Visitor::LOGINSTATE_WRONG_PASSWORD:
                    $main_content .= 'Wrong password to account.<br/>';
                    $passB = '<span style="color:red;">Password:</span>';
                    break;
            }
            $main_content .= '
					</div>
						<div class="BoxFrameHorizontal" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-horizontal.gif);" /></div>
						<div class="BoxFrameEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
						<div class="BoxFrameEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" />
					</div>
				</div>
			</div><br/>';
        }
        $main_content .= '
			<form action="?subtopic=accountmanagement" method="post" style="margin: 0px; padding: 0px;">
				<div class="TableContainer" >
					<table class="Table4" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span> 
								<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span> 
								<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
								<div class="Text" >Account Login</div>
								<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span> 
								<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span> 
								<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span> 
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>
												<div class="TableShadowContainerRightTop" >
													<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
												</div>
												<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
													<div class="TableContentContainer" >
														<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
															<tr>
																<td>
																	<table style="float: left; width: 370px;" cellpadding="0" cellspacing="0" >
																		<tr>
																			<td class="LabelV120" ><span>' . $logB . '</span></td>
																			<td><input type="password" name="account_login" size="35" maxlength="30" ></td>
																		</tr>
																		<tr>
																			<td class="LabelV120" ><span>' . $passB . '</span></td>
																			<td><input type="password" name="password_login" size="35" maxlength="29" ></td>
																		</tr>
																	</table>
																	<div style="float: right; font-size: 1px;" >
																		<input type="hidden" name="page" value="overview" >
																			<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
																					<input class="ButtonText" type="image" name="Login" alt="Login" src="' . $layout_name . '/images/global/buttons/_sbutton_login.gif" >
																				</div>
																			</div>
																		</form>
																		<div style="width: 2px; height: 2px;" ></div>
																		<form action="?subtopic=lostaccount" method="post" style="padding:0px;margin:0px;" >
																			<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
																					<input class="ButtonText" type="image" name="Account lost?" alt="Account lost?" src="' . $layout_name . '/images/global/buttons/_sbutton_accountlost.gif" >
																				</div>
																			</div>
																		</form>
																	</div>
																</td>
															</tr>
														</table>
													</div>
												</div>
												<div class="TableShadowContainer" >
													<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
														<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
														<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
													</div>
												</div>
												<tr>
									<td>
										<div class="TableShadowContainerRightTop">
											<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif)"></div>
										</div>
										<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif)">
										<div class="TableContentContainer" >
										<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
										<tr>
										<td>
										<div style="float: right; width: 135px;" >
										<form action="#" method="post" style="padding:0px;margin:0px;" >
										<input type="hidden" name="page" value="useauthenticator" >
										<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
										<input class="ButtonText" type="image" name="Use Authenticator" alt="Use Authenticator" src="' . $layout_name . '/images/global/buttons/_sbutton_useauthenticator.gif" >
										</div>
										</div>
										</form>
										</div>
										If your ' . htmlspecialchars($config['server']['serverName']) . ' Account is already connected to an authenticator, click on "Use Authenticator". A field will be displayed which allows you to provide your authenticator token along with your account data upon login. Otherwise, you will be asked for your authenticator token in the next step.<p>An authenticator is a security feature which helps to prevent any unauthorised access to your Tibia account! You can connect your account to an authenticator via your account management page.</p></td></tr>
												</table>
											</div>
										</div>
										<div class="TableShadowContainer">
											<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif)">
												<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif)"></div>
												<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif)"></div>
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
				<br/>';
				
	$main_content .='
					<center>
					<h1>Do you have a Facebook profile?</h1>
				</center>
				<div class="TableContainer" >
					<table class="Table4" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
								<div class="Text" >Facebook Linkup</div>
								<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>
												<div class="TableShadowContainerRightTop" >
													<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
												</div>
												<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
													<div class="TableContentContainer" >
														<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
															<tr>
																<td >
																	<div id="FB_LoginButton" style="background-image:url(' . $layout_name . '/images/global/buttons/fb_original_button_small.png);">
																	<span>Log in</span></div>
																		</form>
																	</div>
																	Log into Facebook to create a ' . htmlspecialchars($config['server']['serverName']) . ' account via Facebook or to play ' . htmlspecialchars($config['server']['serverName']) . ' if you already have a ' . htmlspecialchars($config['server']['serverName']) . ' account connected to your Facebook profile!
														</table>
													</div>
												</div>
												<div class="TableShadowContainer" >
													<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
														<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
														<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
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
	';
				
	$main_content .='
				<center>
					<h1>New to ' . $config['server']['serverName'] . '?</h1>
				</center>
				<div class="TableContainer" >
					<table class="Table4" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
								<div class="Text" >New Player</div>
								<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>
												<div class="TableShadowContainerRightTop" >
													<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
												</div>
												<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
													<div class="TableContentContainer" >
														<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
															<tr>
																<td >
																	<div style="float: right; margin-top: 20px;" >
																		<form class="MediumButtonForm" action="?subtopic=createaccount" method="post" >
																			<div class="MediumButtonBackground" style="background-image:url(' . $layout_name . '/images/global/buttons/mediumbutton.gif)" onMouseOver="MouseOverMediumButton(this);" onMouseOut="MouseOutMediumButton(this);" ><div class="MediumButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/mediumbutton-over.gif)" onMouseOver="MouseOverMediumButton(this);" onMouseOut="MouseOutMediumButton(this);" ></div>
																				<input class="MediumButtonText" type="image" name="Create Account" alt="Create Account" src="' . $layout_name . '/images/global/buttons/mediumbutton_createaccount.png" />
																			</div>
																		</form>
																	</div>
																	<div id="LoginCreateAccountBox" >
																		<p><b>' . $config['server']['serverName'] . '...</b></p>
																		<div style="margin-left: 10px;" >
																			<p>... where hardcore gaming meets fantasy.</p>
																			<p>... where friendships last a lifetime.</p>
																			<p>... unites adventurers since 1997!</p>
																		</div>
																	</div>
														</table>
													</div>
												</div>
												<div class="TableShadowContainer" >
													<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
														<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
														<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
													</div>
												</div>
											</td>
										</tr>
									</table>
								</div>
							</table>
						</div>
					</td>
				</tr>';
    }
else {
    //Here start our new accountmanagement ;D
    if ($action == "") {
        if ($account_logged->getPremDays() > 0)
            $account_statusOver = '
				<span class="green">
					<span class="BigBoldText">Premium Account</span>
				</span>';
        else
            $account_statusOver = '
				<span class="red">
					<span class="BigBoldText">Free Account</span>
				</span>';

        if ($account_logged->getPremDays() > 0)
            $account_statusPic = '<img class="AccountStatusImage" src="' . $layout_name . '/images/account/account-status_green.gif" alt="free account">';
        else
            $account_statusPic = '<img class="AccountStatusImage" src="' . $layout_name . '/images/account/account-status_red.gif" alt="free account">';

        $main_content .= '
			<center>
				<table>
					<tbody>
						<tr>
							<td><img src="' . $layout_name . '/images/global/content/headline-bracer-left.gif"></td>
							<td style="text-align:center;vertical-align:middle;horizontal-align:center;font-size:17px;font-weight:bold;">Welcome to your account ' . $account_logged->getRLName() . '!<br></td>
							<td><img src="' . $layout_name . '/images/global/content/headline-bracer-right.gif"></td>
						</tr>
					</tbody>
				</table>
			</center>
			<br>';
        $main_content .= '
			<div class="TableContainer">
				<div class="CaptionContainer">
					<div class="CaptionInnerContainer"> 
						<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span> 
						<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span> 
						<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"></span> 
						<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span>
						<div class="Text">Account Status</div>
						<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span> 
						<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"></span> 
						<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span> 
						<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span> 
					</div>
				</div>
				<table class="Table5" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td>
								<div class="InnerTableContainer">
									<table style="width:100%;">
										<tbody>
											<tr>
												<td>
													<div class="TableShadowContainerRightTop">
														<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);"></div>
													</div>
													<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);">
														<div class="TableContentContainer">
															<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																<tbody>
																	<tr>';
        if ($config['server']['freePremium'] == "yes") {
            $main_content .= '
																		<td><img class="AccountStatusImage" src="' . $layout_name . '/images/account/account-status_green.gif" alt="free account"></td>
																		<td width="100%" valign="middle">
																			<span class="green">
																				<span class="BigBoldText">Premium Account</span>
																			</span>
																			<small>
																				<br>The server is configured to free premium account , good game !<br>
																				(Balance of premium points: ' . (($account_logged->getPremiumPoints() > 0) ? '<font class="red">' . $account_logged->getPremiumPoints() . '</font>' : '<font class="red">0</font>') . ' Points)
																			</small>
																		</td>';
        } else {
            $main_content .= '
																		<td>' . $account_statusPic . '</td>
																		<td width="100%" valign="middle">
																			' . $account_statusOver . '';
            $daysVip = $account_logged->getPremDays();
            $vipDays = $daysVip * 86400;
            $resDate = time() + $vipDays;
            if ($account_logged->getPremDays() > 0){
            $main_content .= '
																			<small><br>Your premium time expires at <font style="text-transform:capitalize;">' . strftime('%b %d %Y, %H:%M:%S', $resDate) . '</font></small>';
            }
            $main_content .= '
																		</td>';
        }
        $main_content .= '
																		<td>
																			<form action="?subtopic=accountmanagement&action=manage" method="post" style="padding:0px;margin:0px;">
																				<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)">
																					<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);">
																						</div>
																						<input class="ButtonText" type="image" name="Manage Account" alt="Manage Account" src="' . $layout_name . '/images/global/buttons/_sbutton_manageaccount.gif">
																					</div>
																				</div>
																			</form>';
        $main_content .= '
																			<div style="font-size:1px;height:4px;"></div>
																				<form action="?subtopic=accountmanagement&action=donate" method="post" style="padding:0px;margin:0px;">
																					<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_green.gif)">
																						<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_green_over.gif);"></div>
																							<input class="ButtonText" type="image" name="Get Coins" alt="Get Coins" src="' . $layout_name . '/images/global/buttons/_sbutton_gettibiacoins.gif">
																						</div>
																					</div>
																				</form>';
        if ($group_id_of_acc_logged >= $config['site']['access_admin_panel']) {
            $main_content .= '
																				<div style="font-size:1px;height:4px;"></div>
																				<form action="?subtopic=adminpanel" method="post" style="padding:0px;margin:0px;">
																					<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_green.gif)">
																						<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_green_over.gif);"></div>
																							<input class="ButtonText" type="image" name="Logout" alt="Logout" src="' . $layout_name . '/images/global/buttons/_sbutton_painel.gif">
																						</div>
																					</div>
																				</form>';
        }
        //if($config['server']['freePremium'] == "no" || $account_logged->getPremDays() > 0)
        $main_content .= '
																				<div style="font-size:1px;height:4px;"></div>
																				<form action="?subtopic=accountmanagement&action=logout" method="post" style="padding:0px;margin:0px;">
																					<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_red.gif)">
																						<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_red_over.gif);"></div>
																							<input class="ButtonText" type="image" name="Logout" alt="Logout" src="' . $layout_name . '/images/global/buttons/_sbutton_logout.gif">
																						</div>
																					</div>
																				</form>';
        $main_content .= '
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>';
														/*
														<div class="TableShadowContainer">
															<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);">
															<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);"></div>
															<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);"></div>
														</div>
														</div>';

        $main_content .= '
														<tr>
														<td>
														<div class="TableShadowContainerRightTop">
														<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif)"></div>
														</div>
														<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif)">
														<div class="TableContentContainer">
														<table class="TableContent" width="100%">
														<tr>
														<style> .premiumbenefits {display: flex;margin: 0px auto;} .premiumbenefits > div { display: flex;align-items: center;flex: 1; margin: auto 5x;</style>
														<td class="premiumbenefits"><div style="justify-content: flex-start">
														<img class="PremiumFeatureImage1" src="' . $layout_name . '/images/premiumfeatures/PremiumIcon-Stamina.png" alt="premium feature 1" style="margin:0px 5px"/>
														<div>50% XP boost for 2 hours every day</div></div>
														<div style="justify-content: center">
														<img class="PremiumFeatureImage1" src="' . $layout_name . '/images/premiumfeatures/PremiumIcon-Death.png" alt="premium feature 1" style="margin:0px 5px"/>
														<div>lose 30% less on death with a promotion</div></div>
														<div style="justify-content: flex-end">
														<img class="PremiumFeatureImage1" src="' . $layout_name . '/images/premiumfeatures/PremiumIcon-Travel.png" alt="premium feature 1" style="margin:0px 5px"/>
														<div>use instant travel system</div></div></td></tr>    </table>  </div></div>
														';*/

        $main_content .= '
														<div class="TableShadowContainer">
															<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);">
															<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);"></div>
															<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);"></div>
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
			</div>
			<br>';


					$main_content .='
				<div class="TableContainer">
					<div class="CaptionContainer">
							<div class="CaptionInnerContainer">
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span>
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>								
								<div class="Text">Tickets</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span>
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span>
							</div>
						</div><table class="Table3" cellpadding="0" cellspacing="0">				
						<tbody><tr>
							<td>
								<div class="InnerTableContainer">
										<table style="width:100%;">
											<tbody><tr>
												<td>
													<div class="TableShadowContainerRightTop">
														<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);"></div>
													</div>
													<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);">
														<div class="TableContentContainer">
															<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																<tbody><tr>
																	<td>
																		<div style="float: right; margin-top: 7px;">
																			<form action="?subtopic=ticket" method="post" style="padding:0px;margin:0px;">
																				<div class="MediumButtonBackground" style="background-image:url('.$layout_name.'/images/global/buttons/mediumbutton.gif)" onmouseover="MouseOverMediumButton(this);" onmouseout="MouseOutMediumButton(this);"><div class="MediumButtonOver" style="background-image: url(&quot;'.$layout_name.'/images/global/buttons/mediumbutton-over.gif&quot;); visibility: hidden;" onmouseover="MouseOverMediumButton(this);" onmouseout="MouseOutMediumButton(this);"></div><input class="MediumButtonText" type="image" name="Open Ticket" alt="Open Ticket" src="'.$layout_name.'/images/global/buttons/open_ticket.png"></div>
																			</form>
																		</div>
																		<b>Open a support ticket</b>
																		<span class="HelperDivIndicator" onMouseOver="ActivateHelperDiv($(this), \'Ticket System:\', \'<p><b>Recommended:</b><ul><li>Fill in all required fields.</li><li>Lack of respect for inappropriate use will have consequences.</li><li>If necessary post screenshots to facilitate our understanding of the problem.</li></ul>\', \'\');" onMouseOut="$(\'#HelperDivContainer\').hide();" >
																		<img style="border:0px;" src="'.$layout_name.'/images/global/content/info.gif"></span></a></span>
																		</span></span><br>
																		<small>Support for the various questions you have.</small><br>
																		<p>Use this tool with caution because only then can we work for the server progress, help us know what problems you have faced along his journey through in '.$config['server']['serverName'].'.</p>
																	</td>
																</tr>	
															</tbody></table>
														</div>
													</div>
													<div class="TableShadowContainer">
														<div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bm.gif);">
															<div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bl.gif);"></div>
															<div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-br.gif);"></div>
														</div>
													</div>
												<p/>	
												<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);">
													<div class="TableContentContainer">
														<table class="TableContent" width="100%">
															<tbody>
															<tr style="background-color:#D4C0A1;">
																	<td class="LabelV">Ticket</td>
																	<td class="LabelV">Player</td>
																	<td class="LabelV">Subject</td>
																	<td class="LabelV">Status</td>
																	<td class="LabelV">Last answer</td>
																	<td class="LabelV">Category</td>
															</tr>';
					                            $account_id = $account_logged->getID();
					                            $tickets = $SQL->query("SELECT * FROM `tickets` WHERE `ticket_author_acc_id` = ".$account_id." ORDER BY `ticket_date` DESC LIMIT 5");
					                            if($tickets){
					                                foreach ($tickets as $tickets_content){
                                                        $main_content .= "
                                                                <tr>
                                                                    <td><a href='?subtopic=ticket&amp;action=showticket&amp;do=number&amp;id={$tickets_content['ticket_id']}'>#{$tickets_content['ticket_id']}</a></td>
                                                                    <td><a href='?subtopic=characters&amp;name={$tickets_content['ticket_author']}'>{$tickets_content['ticket_author']}</td>
                                                                    <td>{$tickets_content['ticket_subject']}</td>";
                                                        if($tickets_content['ticket_status'] == "Waiting"){
                                                            $main_content .= "
                                                                    <td style='color: gray !important;'>{$tickets_content['ticket_status']}</td>";
                                                        }elseif ($tickets_content['ticket_status'] == "Closed"){
                                                            $main_content .= "
                                                                    <td style='color: red !important;'>{$tickets_content['ticket_status']}</td>";
                                                        }else{
                                                            $main_content .= "
                                                                    <td>{$tickets_content['ticket_status']}</td>";
                                                        }
                                                        $main_content .= "
                                                                    <td>{$tickets_content['ticket_last_reply']}</td>
                                                                    <td>{$tickets_content['ticket_category']}</td>
                                                                </tr>
                                                                ";
                                                    }
                                                }


                                                $main_content .= '
                                                            <tr bgcolor="#D4C0A1">                                                                
                                                                <td align="left" colspan="5"><small>To see all your tickets click on <i>Show all</i></small></td>
                                                                <td><a href="?subtopic=accountmanagement&action=showtickets"><small>Show All</small></a></td>
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
									</tbody></table>
								</div>
							</td>
						</tr>
					</tbody></table>
				</div><br>';

        $main_content .= '
				<div class="TableContainer" >
				<table class="Table5" cellpadding="0" cellspacing="0">
				<div class="CaptionContainer" > 
				<div class="CaptionInnerContainer" > 
				<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
				<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
				<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        
				<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        
				<div class="Text" >Download Client</div>        
				<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
				<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>
				<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
				<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
				</div>
				</div>
				<tr>
				<td>
				<div class="InnerTableContainer" >
				<table style="width:100%;" ><tr><td><div class="TableShadowContainerRightTop" >
				<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" >
				</div></div><div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
				<div class="TableContentContainer" >
				<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
				<tr><td><div style="height: 55px;" ><div id="DowloadBox" style="position: relative; float:right;" >
				<a href="?subtopic=downloadclient" >
				<img style="width: 45px; height: 45px; border: 0px; margin-right: 10px;" src="' . $layout_name . '/images/account/download_windows.gif" /></a>
				<br/>
				<a style="position: absolute; bottom: -5px; right: 0px;" href="?subtopic=downloadclient" >Download</a></div>
				<span style="position: relative; top: 18px;" >Click <a href="?subtopic=downloadclient" >here</a> to download the latest Tibia client!</span>
				</div></td></tr>    </table>  </div></div><div class="TableShadowContainer" >  
				<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
				<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" >
				</div>    
				<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
				</div></div></td></tr>          </table>        </div>      </td>    </tr>  </table></div><br/>
					';
        //REGISTRAR
        $account_reckey = $account_logged->getCustomField("key");
        if (empty($account_reckey))
            $main_content .= '
				<div class="SmallBox" >
					<div class="MessageContainer" >
						<div class="BoxFrameHorizontal" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-horizontal.gif);" /></div>
						<div class="BoxFrameEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
						<div class="BoxFrameEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
						<div class="Message" >
							<div class="BoxFrameVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></div>
							<div class="BoxFrameVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></div>
							<table class="HintBox" >
								<tr>
									<td>
										<div class="BoxButtons" >
											<form action="?subtopic=accountmanagement&action=registeraccount" method="post" style="padding:0px;margin:0px;" >
												<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
													<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
														<div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
														<input class="ButtonText" type="image" name="Register Account" alt="Register Account" src="' . $layout_name . '/images/global/buttons/_sbutton_registeraccount.gif" >
													</div>
												</div>
											</form>
											<div style="font-size:1px;height:4px;" ></div>
										</div>
										<p><b>Your account is not registered!</b></p>
										<p>You can register your account for increased protection. Click on "Register Account" and get your free recovery key today!</p>
									</td>
								<tr>
							</table>
						</div>
						<div class="BoxFrameHorizontal" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-horizontal.gif);" /></div>
							<div class="BoxFrameEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
							<div class="BoxFrameEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
						</div>
					</div><br/>';
        //IF BANK TRANSFER TO CONFIRM
        //if(empty($account_reckey))
        $getTransfer = $SQL->query("SELECT COUNT(*) FROM `z_shop_donates` WHERE `status` = 'confirm' AND `account_name` = '" . $account_logged->getName() . "'")->fetch();
        if ($getTransfer[0] > 0) {
            $main_content .= '
					<div class="SmallBox" >
						<div class="MessageContainer" >
							<div class="BoxFrameHorizontal" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-horizontal.gif);" /></div>
							<div class="BoxFrameEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
							<div class="BoxFrameEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
							<div class="Message" >
								<div class="BoxFrameVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></div>
								<div class="BoxFrameVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></div>
								<table class="HintBox" >
									<tr>
										<td>
											<div class="BoxButtons" >
												<form action="?subtopic=accountmanagement&action=paymentshistory" method="post" style="padding:0px;margin:0px;" >
													<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
														<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
															<div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
															<input class="ButtonText" type="image" name="Confirm Transfer" alt="Confirm Transfer" src="' . $layout_name . '/images/global/buttons/_sbutton_confirm.gif" >
														</div>
													</div>
												</form>
												<div style="font-size:1px;height:4px;" ></div>
											</div>
											<p><b>' . $getTransfer[0] . ' donate' . (($getTransfer[0] >= 2) ? 's' : '') . ' pending of confirmation!</b></p>
											<p>You bought premium points in our shop using or donate system, but need to confirm your donation. Click "Confirm" to see which donate is pending confirmation.</p>
										</td>
									<tr>
								</table>
							</div>
							<div class="BoxFrameHorizontal" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-horizontal.gif);" /></div>
								<div class="BoxFrameEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
								<div class="BoxFrameEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
							</div>
						</div><br/>';
        }
        //IF BANK TRANSFER TO CONFIRM ADMIN
        //if(empty($account_reckey))
        if ($group_id_of_acc_logged >= $config['site']['access_admin_panel']) {
            $getTransferAdmin = $SQL->query("SELECT COUNT(*) FROM `z_shop_donates` WHERE `status` = 'confirmed'")->fetch();
            if ($getTransferAdmin[0] > 0) {
                $main_content .= '
					<div class="SmallBox" >
						<div class="MessageContainer" >
							<div class="BoxFrameHorizontal" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-horizontal.gif);" /></div>
							<div class="BoxFrameEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
							<div class="BoxFrameEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
							<div class="Message" >
								<div class="BoxFrameVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></div>
								<div class="BoxFrameVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></div>
								<table class="HintBox" >
									<tr>
										<td>
											<div class="BoxButtons" >
												<form action="?subtopic=adminpanel&action=history" method="post" style="padding:0px;margin:0px;" >
													<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
														<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
															<div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
															<input class="ButtonText" type="image" name="Confirm Transfer" alt="Confirm Transfer" src="' . $layout_name . '/images/global/buttons/_sbutton_confirm.gif" >
														</div>
													</div>
												</form>
												<div style="font-size:1px;height:4px;" ></div>
											</div>
											<p><b>' . $getTransferAdmin[0] . ' donate' . (($getTransfer[0] >= 2) ? 's' : '') . ' confirmed!</b></p>
											<p>You have some donate confirmations. Confirm and give the premium points to the player.</p>
										</td>
									<tr>
								</table>
							</div>
							<div class="BoxFrameHorizontal" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-horizontal.gif);" /></div>
								<div class="BoxFrameEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
								<div class="BoxFrameEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
							</div>
						</div><br/>';
            }
        }
        //CHARACTERS
        $main_content .= '
				<div class="RowsWithOverEffect">
					<div class="TableContainer">
						<div class="CaptionContainer">
							<div class="CaptionInnerContainer"> 
								<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"></span> 
								<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span>
								<div class="Text">Characters</div>
								<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span> 
								<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span> 
								<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span> 
							</div>
						</div>
						<table class="Table3" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td>
										<div class="InnerTableContainer">
											<table style="width:100%;">
												<tbody>
													<tr>
														<td>
															<div class="TableShadowContainerRightTop">
																<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);"></div>
															</div>
															<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);">
																<div class="TableContentContainer">
																	<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																		<tbody>
																			<tr class="LabelH">
																				<td></td>
																				<td style="width:40%;">Name</td>
																				<td style="width:120px!important;">World</td>
																				<td style="width:90px!important;">Status</td>
																				<td style="width:90px!important;">&nbsp;</td>
																			</tr>';

        $account_players = $account_logged->getPlayersList();
        //show list of players on account
        $var = 0;
        foreach ($account_players as $account_player) {
            $player_number_counter++;

            if ($var == 0) {
                $preview = ' previewstate="0"';
                $display = 'block';
                $displayNum = 'none';
                $displayBold = 'bold';
                $displayFont = '13';
            } else {
                $preview = '';
                $display = 'none';
                $displayNum = 'inline';
                $displayBold = 'normal';
                $displayFont = '10';
            }

            $main_content .= '
																			<tr id="CharacterRow_' . $player_number_counter . '" 
																				onmouseover="InRowWithOverEffect(&#39;CharacterRow_' . $player_number_counter . '&#39;,';

            if (is_int($player_number_counter / 2))
                $main_content .= '&#39;#e7d1af&#39;';
            else
                $main_content .= '&#39;#ffedd1&#39;';


            $main_content .= '
																				);"
																				onmouseout="OutRowWithOverEffect(&#39;CharacterRow_' . $player_number_counter . '&#39;,';

            if (is_int($player_number_counter / 2))
                $main_content .= '&#39;#d5c0a1&#39;';
            else
                $main_content .= '&#39;#f1e0c6&#39;';

            $main_content .= '
																				);" 
																				onclick="FocusCharacter(' . $player_number_counter . ', &#39;' . urlencode($account_player->getName()) . '&#39;, ' . $config['site']['max_players_per_account'] . ');" 
																				class="Odd" style="font-weight: ' . $displayBold . ';';

            if (is_int($player_number_counter / 2))
                $main_content .= 'background-color: #d5c0a1;">';
            else
                $main_content .= 'background-color: #f1e0c6;">';


            $main_content .= '
																				<td style="width:40px;text-align:center;padding:2px;">
																					<span id="CharacterNumberOf_' . $player_number_counter . '" style="display: ' . $displayNum . ';">' . $player_number_counter . '.</span>
																					<span id="PlayButtonOf_' . $player_number_counter . '" style="display: ' . $display . ';">
																						<!--<span name="FlashClientPlayButton" id="FlashClientPlayButton" playlink="?subtopic=play&name=' . htmlspecialchars($account_player->getName()) . '" ' . $preview . '> -->';

            if ($account_player->isDeleted()) {
                $main_content .= '<img style="border:0px;" src="' . $layout_name . '/images/account/play-not-button.gif">';
            } else if (!$config['site']['flash_client_enabled']) {
                $main_content .= '<img style="border:0px;" alt="Flash client disabled" src="' . $layout_name . '/images/account/play-button-disabled.gif">';
            } else {
                $main_content .= '
																								<img style="border:0px;" onmouseover="InMiniButton(this, &#39;&#39;);" onmouseout="OutMiniButton(this, &#39;&#39;);" src="' . $layout_name . '/images/account/play-button.gif">';
            }

            $main_content .= '
																						<!-- </span> -->
																					</span>
																				</td>
																				<td id="CharacterCell2_' . $player_number_counter . '">
																					<span style="white-space:nowrap;vertical-align:middle;">
																						<span id="CharacterNameOf_' . $player_number_counter . '" style="font-size: ' . $displayFont . 'pt;">' . htmlspecialchars($account_player->getName()) . '</span><br>
																						<span id="CharacterNameOf_' . $player_number_counter . '"><small>' . htmlspecialchars(Website::getVocationName($account_player->getVocation())) . ' - Level ' . $account_player->getLevel() . '</small></span>
																					</span>
																				</td>
																				<td id="CharacterCell2_' . $player_number_counter . '">
																					<span style="white-space:nowrap;">' . htmlspecialchars($config['server']['serverName']) . '</span>
																				</td>
																				<td id="CharacterCell3_' . $player_number_counter . '">';
            if ($account_player->isDeleted())
                $main_content .= 'deleted';
            else {
                if ($account_player->isOnline() && $account_player->isHidden())
                    $main_content .= 'hidden, <font class="green"><b>online</b></font>';
                elseif ($account_player->isOnline())
                    $main_content .= '<font class="green"><b>online</b></font>';
                elseif ($account_player->isHidden())
                    $main_content .= 'hidden';
            }
            $main_content .= '
																				</td>
																				<td id="CharacterCell4_' . $player_number_counter . '" style="text-align:center;">
																					<span id="CharacterOptionsOf_' . $player_number_counter . '" style="display: ' . $display . ';">
																						<span style="font-weight:normal;">[<a href="?subtopic=accountmanagement&action=changecharacterinformation&name=' . urlencode($account_player->getName()) . '">Edit</a>]</span>';
            if ($account_player->isDeleted()) {
                $main_content .= '<br><span style="font-weight:normal;">[<a href="?subtopic=accountmanagement&action=undeletecharacter&name=' . urlencode($account_player->getName()) . '">Undelete</a>]</span>';
            } else {
                $main_content .= '<br><span style="font-weight:normal;">[<a href="?subtopic=accountmanagement&action=deletecharacter&name=' . urlencode($account_player->getName()) . '">Delete</a>]</span>';
            }

            $main_content .= '
																					</span>
																				</td>
																			</tr>';
            $var++;
        }
        $main_content .= '
																		</tbody>
																	</table>
																</div>
															</div>
															<div class="TableShadowContainer">
																<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);">
																	<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);"></div>
																	<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);"></div>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<table class="InnerTableButtonRow" cellpadding="0" cellspacing="0">
																<tbody>
																	<tr>
																		<td></td>
																		<td align="right" style="padding-right:7px;width:100%;">
																			<form action="?subtopic=accountmanagement&action=createcharacter" method="post" style="padding:0px;margin:0px;">
																				<input type="hidden" name="selectedcharacter" value="Draz Mytos">
																				<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)">
																					<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);"></div>
																						<input class="ButtonText" type="image" name="Create Character" alt="Create Character" src="' . $layout_name . '/images/global/buttons/_sbutton_createcharacter.gif">
																					</div>
																				</div>
																			</form>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<br>';
        $main_content .= '
				<script>
					EnablePlayButton();
				</script>';
        //MIGRATION TOOL ;D
        $main_content .= '
					<div class="SmallBox">
						<div class="MessageContainer">
							<div class="BoxFrameHorizontal" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-horizontal.gif);"></div>
							<div class="BoxFrameEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></div>
							<div class="BoxFrameEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></div>
							<div class="Message">
								<div class="BoxFrameVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></div>
								<div class="BoxFrameVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></div>
								<table class="HintBox">
									<tbody>
										<tr>
											<td>
												<p><b>New Account Management</b></p>
												<p>This is the main page of managing your account, here you will have the key to your account information displayed and updated, enjoy! </p>
											</td>
										</tr>
										<tr></tr>
									</tbody>
								</table>
							</div>
							<div class="BoxFrameHorizontal" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-horizontal.gif);"></div>
							<div class="BoxFrameEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></div>
							<div class="BoxFrameEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></div>
						</div>
					</div>
					<br>';

    }
    //Here finish our new account management

    if ($action == "manage") {
        $getProdutsCat = $SQL->query("SELECT * FROM `z_shop_category` WHERE `hide` = 0 ORDER BY `id` ASC")->fetchAll();

        if ($account_logged->getPremDays() > 0)
            $account_status = '<b><font class="green">Premium Account, ' . $account_logged->getPremDays() . ' days left</font></b>';
        else
            $account_status = '<b><font class="red">Free Account</font></b>';

        $main_content .= '
			<div class="SmallBox" >
				<div class="MessageContainer" >
					<div class="BoxFrameHorizontal" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-horizontal.gif);" /></div>
					<div class="BoxFrameEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
					<div class="BoxFrameEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
					<div class="Message">
						<div class="BoxFrameVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></div>
						<div class="BoxFrameVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></div>
						<table style="width:100%;" >
							<td style="width:100%;text-align:center;" ><nobr>[<a href="#General+Information" >General Information</a>]</nobr> <nobr>[<a href="#Donates" >Donates</a>]</nobr> ' . ((count($getProdutsCat) >= 1) ? '<nobr>[<a href="#Products+Available" >Products Available</a>]</nobr>' : '') . ' <nobr>[<a href="#Products+Ready+To+Use" >Products Ready To Use</a>]</nobr> <nobr>[<a href="#History" >History</a>]</nobr> <nobr>[<a href="#Registration" >Registration</a>]</nobr></td>
							<td>
								<table border="0" cellspacing="0" cellpadding="0" >
									<form action="?subtopic=accountmanagement" method="post" >
										<tr>
											<td style="border:0px;" >
												<input type="hidden" name=page value=overview >
												<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
													<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Overview" alt="Overview" src="' . $layout_name . '/images/global/buttons/_sbutton_overview.gif" >
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
				<div class="BoxFrameHorizontal" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-horizontal.gif);" /></div>
				<div class="BoxFrameEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
				<div class="BoxFrameEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
			</div>
		</div>
		<br/>';

        $main_content .= '
			<a name="General+Information" ></a>
			<div class="TopButtonContainer" >
				<div class="TopButton" >
					<a href="#top" >
						<image style="border:0px;" src="' . $layout_name . '/images/global/content/back-to-top.gif" />
					</a>
				</div>
			</div>
			<div class="TableContainer" >
				<table class="Table3" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
							<div class="Text" >General Information</div>
							<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
						</div>
					</div>
					<tr>					
						<td>					
							<div class="InnerTableContainer" >
								<table style="width:100%;" >
									<tr>
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%" >
														<tr style="background-color:#D4C0A1;" >
															<td class="LabelV" >Account Name:</td>
															<td style="width:90%;" >
																<div style="position:relative;width:100%;" >
																	<span id="DisplayAccountID" >' . str_repeat('*', strlen(htmlspecialchars($account_logged->getName()))) . '</span>
																	<span id="MaskedAccountID" style="visibility:hidden;display:none" >' . str_repeat('*', strlen(htmlspecialchars($account_logged->getName()))) . '</span>
																	<span id="ReadableAccountID" style="visibility:hidden;display:none" >' . htmlspecialchars($account_logged->getName()) . '</span>
																	<img id="ButtonAccountID" onMouseDown="ToggleMaskedText(\'AccountID\');" style="position:absolute;right:0px;top:2px;cursor:pointer;" src="' . $layout_name . '/images/global/general/show.gif" />
																</div>
															</td>
														</tr>
														<tr style="background-color:#F1E0C6;" >
															<td class="LabelV" >Email Address:</td>
															<td style="width:90%;" >
																<div style="position:relative;width:100%;" >
																	<span id="DisplayEMail" >' . str_repeat('*', strlen(htmlspecialchars($account_logged->getEmail()))) . '</span>
																	<span id="MaskedEMail" style="visibility:hidden;display:none" >' . str_repeat('*', strlen(htmlspecialchars($account_logged->getEmail()))) . '</span>
																	<span id="ReadableEMail" style="visibility:hidden;display:none" >' . htmlspecialchars($account_logged->getEmail()) . '</span>
																	<img id="ButtonEMail" onMouseDown="ToggleMaskedText(\'EMail\');" style="position:absolute;right:0px;top:2px;cursor:pointer;" src="' . $layout_name . '/images/global/general/show.gif" />
																</div>
															</td>
														</tr>
														<tr style="background-color:#D4C0A1;" >
															<td class="LabelV" >Created:</td>
															<td>' . date("M d Y, G:i:s", $account_logged->getCreateDate()) . '</td>
														</td>';
        $getLastLogin = $SQL->query("SELECT `lastlogin` FROM `players` WHERE `account_id` = '" . $account_logged->getID() . "' ORDER BY `lastlogin` DESC LIMIT 1")->fetch();
        $main_content .= '
														<tr style="background-color:#F1E0C6;" >
															<td class="LabelV" >Last Login:</td>
															<td>' . (($getLastLogin['lastlogin'] > 0) ? date("M d Y, G:i:s", $getLastLogin['lastlogin']) : 'You never logged in the game.') . '</td>
														</tr>';
        $main_content .= '
														<tr style="background-color:#D4C0A1;" >
															<td class="LabelV" >Account Status:</td>';
        if ($config['server']['freePremium'] == "yes") {
            $main_content .= '
															<td>
																<b><font class="green">Premium Account</font></b><br>
															</td>';
        } else {
        	$daysVip = $account_logged->getPremDays();
            $vipDays = $daysVip * 86400;
            $resDate = time() + $vipDays;
            $main_content .= '
															<td>' . $account_status . '<br>';
																if ($account_logged->getPremDays() > 0){
																	$main_content .= '<small>(Premium Time expires at ' . strftime('%b %d %Y, %H:%M:%S', $resDate) . '</small>
															</td>';
        }}
        $main_content .= '
														</tr>
														<tr style="background-color:#F1E0C6;" >
															<td class="LabelV" >Premium Points:</td>
															<td>' . $account_logged->getPremiumPoints() . ' premium points<br>';
        $accname = $account_logged->getName();
        //INSERT INTO `pagseguro_transactions`(`transaction_code`, `name`, `payment_method`, `status`, `item_count`, `data`, `payment_amount`)
        $sql_points = "SELECT * FROM `pagseguro_transactions` WHERE `name` = '$accname' AND `status` = 'PAID' ORDER BY `data` DESC LIMIT 1";
        $last_points_bought = $SQL->query($sql_points)->fetch();
        if ($last_points_bought) {
            $getServiceInfo = $SQL->query("SELECT `count` FROM `z_shop_offer` WHERE `id` = '" . $last_points_bought['service_id'] . "'")->fetch();
            $main_content .= '
															<small>(Your last donation was on ' . date("M d Y", strtotime($last_points_bought['data'])) . '. You donated to get ' . $last_points_bought['item_count'] . ' Premium Points.)</small>';
        } else
            $main_content .= '
																<small>(You have not donated to get premium points yet. <a href="?subtopic=accountmanagement&action=donate" title="Buy now!">Buy now!</a>)</small>';
        $main_content .= '
															</td>
														</tr>';
        $accountTitle = ''; // none
        foreach ($loyalty_title as $loypoints => $loytitle) {

            if ($account_logged->getLoyalty() >= $loypoints) {
                # player rank
                $accountTitle = $loytitle;
            } else {
                // first rank after geting highest title
                $nextTitle = $loytitle;
                $nextPoints = $loypoints;
                break;
            }
        }
        /*if ($accountTitle != '')
            $loyaltyTitle = $accountTitle . ' of ' . $config['server']['serverName'] . (($nextPoints == 0) ? ' (You got the most highest title in the ' . $config['server']['serverName'] . '.)' : ' (Promotion to: ' . $nextTitle . ' of ' . $config['server']['serverName'] . ' at ' . $nextPoints . ' Loyalty Points)');
        else
            $loyaltyTitle = 'No title (Promotion to: Scout of ' . $config['server']['serverName'] . ' at 50 Loyalty Points)';

        $main_content .= '
														<tr style="background-color:#D4C0A1;">
															<td class="LabelV">Loyalty Points</td>
															<td>' . $account_logged->getLoyalty() . '</td>														
														</tr>
														<tr style="background-color:#F1E0C6;" >
															<td class="LabelV">Loyalty Title</td>
															<td>' . $loyaltyTitle . '</td>
														</tr>';
        */$main_content .= '
													</table>
												</div>
											</div>
											<div class="TableShadowContainer" >
												<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
													<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
													<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
												</div>
											</div>
										</td>
										</tr>
										<tr>
											<td width="30%">
												<table class="InnerTableButtonRow" cellpadding="0" cellspacing="0" >
													<tr>
														<td>
															<table border="0" cellspacing="0" cellpadding="0" >
																<form action="?subtopic=accountmanagement&action=changepassword" method="post" >
																	<tr>
																		<td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
																				<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
																					<input class="ButtonText" type="image" name="Change Password" alt="Change Password" src="' . $layout_name . '/images/global/buttons/_sbutton_changepassword.gif" >
																				</div>
																			</div>
																		</td>
																	</tr>
																</form>
															</table>
														<td>
														<td width="80%">
															<table border="0" cellspacing="0" cellpadding="0" >
																<form action="?subtopic=accountmanagement&action=changeemail" method="post" >
																	<tr>
																		<td style="border:0px;" >
																			<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
																				<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
																					<input class="ButtonText" type="image" name="Change Email" alt="Change Email" src="' . $layout_name . '/images/global/buttons/_sbutton_changeemail.gif" >
																				</div>
																			</div>
																		</td>
																	</tr>
																</form>
															</table>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</div>
							</table>
						</div>
					</td>
				</tr>
				<br/>';

        /*$main_content .= '
			<a name="Loyalty+Highscore+Character" ></a>
				<div class="TopButtonContainer" >
					<div class="TopButton" >
						<a href="#top" >
							<image style="border:0px;" src="' . $layout_name . '/images/global/content/back-to-top.gif" />
						</a>
					</div>
				</div>
				<form action="?subtopic=accountmanagement" method="post">
					<div class="TableContainer" >
						<table class="Table5" cellpadding="0" cellspacing="0">
							<div class="CaptionContainer" >
								<div class="CaptionInnerContainer" > 
									<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span> 
									<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span> 
									<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
									<div class="Text" >Loyalty Highscore Character</div>
									<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span> 
									<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span> 
									<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span> 
								</div>
							</div>
							<tr>
								<td>
									<div class="InnerTableContainer" >
										<table style="width:100%;" >
											<tr>
												<td>
													<div class="TableShadowContainerRightTop" >
														<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
													</div>
													<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
														<div class="TableContentContainer" >
															<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
																<tr>
																	<td>
																		<div style="float:right;" >
																			<input type="hidden" name="step" value="setloyaltycharacter" >
																				<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
																					<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
																						<input class="ButtonText" type="image" name="Submit" alt="Submit" src="' . $layout_name . '/images/global/buttons/_sbutton_submit.gif" >
																			</div>
																		</div>
																	</div>
																	<b>Selected Character for Loyalty Highscores</b>&nbsp;&nbsp;&nbsp;
																	<select name="character" size="1">';
        foreach ($account_logged->getPlayersList() as $players) {
            if (!$players->isHidden())
                $main_content .= '
																				<option value="' . $players->getName() . '">' . $players->getName() . '</option>';
        }
        $main_content .= '
																	</select>
																	<br/>
																	Please note that you can only select characters here which are not hidden. <br />
																	Hidden characters are not displayed in the Loyalty Highscores!</td>
															</tr>
														</table>
													</div>
												</div>
												<div class="TableShadowContainer" >
													<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
														<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
														<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
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
				<br>';*/

        $main_content .= '
			<a name="Donates" ></a>
			<div class="TopButtonContainer" >
				<div class="TopButton" >
					<a href="#top" >
						<image style="border:0px;" src="' . $layout_name . '/images/global/content/back-to-top.gif" />
					</a>
				</div>
			</div>
			<div class="TableContainer" >
				<table class="Table3" cellpadding="0" cellspacing="0">
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
							<div class="Text" >Donates</div>
							<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
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
												<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
														<tr>
															<td><div style="float: right; width: 135px;" >
																	<form action="?subtopic=accountmanagement&action=donate" method="post" style="padding:0px;margin:0px;" >
																		<input type="hidden" name="step" value="1" >
																		<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
																			<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
																				<input class="ButtonText" type="image" name="Donate" alt="Donate" src="' . $layout_name . '/images/global/buttons/_sbutton_gettibiacoins.gif" >
																			</div>
																		</div>
																	</form>
																	<div style="font-size:1px;height:4px;" ></div>
																	<form action="?subtopic=accountmanagement&action=donateshistory" method="post" style="padding:0px;margin:0px;" >
																		<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
																			<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
																				<input class="ButtonText" type="image" name="View History" alt="View History" src="' . $layout_name . '/images/global/buttons/_sbutton_viewhistory.gif" >
																			</div>
																		</div>
																	</form>
																</div>
																<b>Donate to ' . $config['server']['serverName'] . '</b> <span style=" margin-left: 5px;" ><span class="HelperDivIndicator" onMouseOver="ActivateHelperDiv($(this), \'Information:\', \'Just click on donate if really interested in helping the server to grow.<br/><br/>If you have more than 3 donations unconfirmed or false , your account may be banned, or even permanent exclusion.\', \'\');" onMouseOut="$(\'#HelperDivContainer\').hide();" >
																							<image style="border:0px;" src="' . $layout_name . '/images/global/content/info.gif" />
																							</span></span><br/>
																Your donations are an incentive for us always bring the best.<br/>
																<ul>
																	<li>Your donations will be reversed in premium points.</li>
																	<li>Note that some types of donations need to be confirmed. Will be listed below the outstanding donations that needs confirmation.</li>
																</ul>
															</td>
														</tr>
													</table>
												</div>
											</div>
											<div class="TableShadowContainer" >
												<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
													<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
													<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
												</div>
											</div>
										</td>
									</tr>';
        $getDonates = $SQL->query("SELECT * FROM `z_shop_donates` WHERE `status` = 'confirm' AND `account_name` = '" . $account_logged->getName() . "'")->fetchAll();
        $num = 0;
        if ($getDonates[0] > 0) {
            $main_content .= '
									<tr>
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
														<tr bgcolor="' . $config['site']['darkborder'] . '">
															<td class="LabelV" width="15%">Date</td>
															<td class="LabelV">Service</td>
															<td width="10%"></td>
														</tr>';
            foreach ($getDonates as $donate) {
                $bgcolor = (($num++ % 2 == 1) ? $config['site']['darktborder'] : $config['site']['lightborder']);
                $main_content .= '
														<tr bgcolor="' . $bgcolor . '">
															<td>' . date("M d Y", $donate['date']) . '</td>
															<td>' . $donate['premium_points'] . ' premium points por R$ ' . $donate['price'] . '</td>
															<td>[<a href="?subtopic=accountmanagement&action=confirmdonate&id=' . $donate['id'] . '">Confirm</a>]</td>
														</tr>';
            }
            $main_content .= '
													</table>
												</div>
											</div>
											<div class="TableShadowContainer" >
												<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
													<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
													<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
												</div>
											</div>
										</td>
									</tr>';
        }
        $main_content .= '
								</table>
							</div>
						</table>
					</div>
				</td>
			</tr>
			<br/>';

        $main_content .= '
			<a name="Products+Available" ></a>
			<div class="TopButtonContainer" >
				<div class="TopButton" >
					<a href="#top" >
						<image style="border:0px;" src="' . $layout_name . '/images/global/content/back-to-top.gif" />
					</a>
				</div>
			</div>
			<div class="TableContainer" >
				<table class="Table5" cellpadding="0" cellspacing="0">
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
							<div class="Text" >Products Available</div>
							<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
						</div>
					</div>
					<tr>
						<td><div class="InnerTableContainer" >
								<table style="width:100%;" >';

        foreach ($getProdutsCat as $choiceCats) {
            $main_content .= '
										<tr>
											<td>
												<div class="TableShadowContainerRightTop" >
													<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
												</div>
												<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
													<div class="TableContentContainer" >
														<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
															<tr>
																<td>
																	<b>' . $choiceCats['name'] . '</b>
																	<div style="float:right;" >
																		<form action="?subtopic=accountmanagement&action=services" method="post" style="padding:0px;margin:0px;" >
																			<input type="hidden" name="ServiceCategoryID" value="' . $choiceCats['id'] . '" >
																			<input type="hidden" name="step" value="1" >
																			<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_green.gif)" >
																				<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_green_over.gif);" ></div>
																					<input class="ButtonText" type="image" name="Get ' . $choiceCats['name'] . '" alt="Get ' . $choiceCats['name'] . '" src="' . $layout_name . '/images/global/buttons/' . $choiceCats['button'] . '" >
																				</div>
																			</div>
																		</form>
																	</div>
																	<br/>
																	' . $choiceCats['desc'] . '</td>
															</tr>
														</table>
													</div>
												</div>
												<div class="TableShadowContainer" >
													<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
														<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
														<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
													</div>
												</div>
											</td>
										</tr>';
        }


        $main_content .= '
								</table>
							</div>
						</table>
					</div>
				</td>
			</tr>
			<br/>';

        $main_content .= '
			<a name="Products+Ready+To+Use" ></a>
			<div class="TopButtonContainer" >
				<div class="TopButton" >
					<a href="#top" >
						<image style="border:0px;" src="' . $layout_name . '/images/global/content/back-to-top.gif" />
					</a>
				</div>
			</div>
			<div class="TableContainer" >
				<table class="Table3" cellpadding="0" cellspacing="0">
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
							<div class="Text" >Products Ready To Use</div>
							<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
						</div>
					</div>
					<tr>
						<td>
							<div class="InnerTableContainer" >
								<table style="width:100%;" >';
        $getReadyUse = $SQL->query("SELECT * FROM `z_shop_payment` WHERE `status` = 'ready' AND `account_name` = '" . $account_logged->getName() . "' ORDER BY `date` DESC")->fetchAll();
        if (count($getReadyUse) == 0)
            $main_content .= '
									<tr>
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
														<tr>
															<td>You currently have no products available to use.</td>
														</tr>
													</table>
												</div>
											</div>
											<div class="TableShadowContainer" >
												<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
													<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
													<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
												</div>
											</div>
										</td>
									</tr>';
        else
            foreach ($getReadyUse as $ready) {
                $getServiceInfos = $SQL->query("SELECT * FROM `z_shop_offer` WHERE `id` = '" . $ready['service_id'] . "'")->fetch();
                $main_content .= '
										<tr>
											<td>
												<div class="TableShadowContainerRightTop" >
													<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
												</div>
												<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
													<div class="TableContentContainer" >
														<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
															<tr class="LabelH" >
																<td style="width: 100px;" >Date</td>
																<td>Service</td>
																<td></td>
															</tr>
															<tr style="background-color:#F1E0C6;" >
																<td>' . date("d/M/Y", $ready['date']) . '</td>
																<td>' . $getServiceInfos['offer_name'] . '</td>
																<td width="10%">[<a href="?subtopic=accountmanagement&action=readytouse&serviceID=' . $ready['id'] . '" >Active</a>]</td>';
                $main_content .= '
															</tr>
														</table>
													</div>
												</div>
												<div class="TableShadowContainer" >
													<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
														<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
														<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
													</div>
												</div>
											</td>
										</tr>';
            }
        $main_content .= '
								</table>
							</div>
						</table>
					</div>
				</td>
			</tr>
			<br/>';
        #history of products bought
        $main_content .= '
				<a name="History" ></a>
				<div class="TopButtonContainer" >
					<div class="TopButton" >
						<a href="#top" >
							<image style="border:0px;" src="' . $layout_name . '/images/global/content/back-to-top.gif" />
						</a>
					</div>
				</div>
				<div class="TableContainer" >
					<table class="Table5" cellpadding="0" cellspacing="0">
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
								<div class="Text" >History</div>
								<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
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
													<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
												</div>
												<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
													<div class="TableContentContainer" >
														<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
															<tr>
																<td>
																	<div style="float:right;" >
																		<form action="?subtopic=accountmanagement&action=paymentshistory" method="post" style="padding:0px;margin:0px;" >
																			<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
																				<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
																					<input class="ButtonText" type="image" name="View History" alt="View History" src="' . $layout_name . '/images/global/buttons/_sbutton_viewhistory.gif" >
																				</div>
																			</div>
																		</form>
																	</div>
																	<b>Payments History</b><br/>
																	Contains all historical data of your payments.
																</td>
															</tr>
														</table>
													</div>
												</div>
												<div class="TableShadowContainer" >
													<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
														<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
														<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
													</div>
												</div>
											</td>
										</tr>';

        $main_content .= '
										<tr>
											<td>
												<div class="TableShadowContainerRightTop" >
													<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
												</div>
												<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
													<div class="TableContentContainer" >
														<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
															<tr>
																<td>
																	<div style="float:right;" >
																		<form action="?subtopic=accountmanagement&action=donateshistory" method="post" style="padding:0px;margin:0px;" >
																			<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
																				<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
																					<input class="ButtonText" type="image" name="View History" alt="View History" src="' . $layout_name . '/images/global/buttons/_sbutton_viewhistory.gif" >
																				</div>
																			</div>
																		</form>
																	</div>
																	<b>Donations History</b><br/>
																	Contains all historical data of your donates.
																</td>
															</tr>
														</table>
													</div>
												</div>
												<div class="TableShadowContainer" >
													<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
														<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
														<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
													</div>
												</div>
											</td>
										</tr>';

        $main_content .= '
									</table>
								</div>
							</table>
						</div>
					</td>
				</tr>
				<br/>';
        //Real life data
        $main_content .= '
			<a name="Registration" ></a>
			<div class="TopButtonContainer" >
				<div class="TopButton" >
					<a href="#top" >
						<image style="border:0px;" src="' . $layout_name . '/images/global/content/back-to-top.gif" />
					</a>
				</div>
			</div>
			<div class="TableContainer" >
				<table class="Table5" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
							<div class="Text" >Registration</div>
							<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
						</div>
					</div>
					<tr>
						<td><div class="InnerTableContainer" >
								<table style="width:100%;" >
									<tr>
										<td><div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%" >';
        $registration = $account_logged->getKey();
        if (!empty($registration)) {
            $main_content .= '
														<tr width=100%>
															<td class="LabelV" >Location:</td>
															<td width=80%>' . $account_logged->getRLName() . '<br/>
																' . $account_logged->getLocation() . ' <br/>';
            /*$main_content .= '
															<td rowspan="2" style="vertical-align:top;horizontal-align:right;padding-right:0px;" ><table border="0" cellspacing="0" cellpadding="0" >
																	<form action="?subtopic=accountmanagement&page=changeregistration" method="post" >
																		<tr>
																			<td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
																					<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
																						<input class="ButtonText" type="image" name="Edit" alt="Edit" src="'.$layout_name.'/images/global/buttons/_sbutton_edit.gif" >
																					</div>
																				</div>
																			</td>
																		</tr>
																	</form>
																</table>
															</td>';
															*/
            $main_content .= '
														</tr>
														<tr>
															<td><nobr><b>Date of Birth:</b></td>
															<td>' . $account_logged->getBirthDate() . '</nobr></td>
														</tr>
														<tr>
															<td><b>Gender:</b></td>
															<td>' . $account_logged->getGender() . '</td>
														</tr>';
        } else {
            $main_content .= '
														<tr>
															<td class="red" ><b>Your account is not registered yet.</b></td>
															<td align=right><table border="0" cellspacing="0" cellpadding="0" >
																	<form action="?subtopic=accountmanagement&action=registeraccount" method="post" >
																		<tr>
																			<td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
																					<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
																						<input class="ButtonText" type="image" name="Register Account" alt="Register Account" src="' . $layout_name . '/images/global/buttons/_sbutton_registeraccount.gif" >
																					</div>
																				</div>
																			</td>
																		</tr>
																	</form>
																</table>
															</td>
														</tr>';
        }

        $main_content .= '
													</table>
												</div>
											</div>
											<div class="TableShadowContainer" >
												<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
													<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
													<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
												</div>
											</div>
										</td>
									</tr>
								</table>
							</div>
						</table>
					</div>
				</td>
			</tr>';
    }
    //Send Gift a friend
    if ($action == "friendGift") {
        $orderID = $_REQUEST['serviceID'];
        $getPaymentInfo = $SQL->query("SELECT * FROM `z_shop_payment` WHERE `id` = '$orderID' AND `account_name` = '" . $account_logged->getName() . "'")->fetch();
        if ($getPaymentInfo['account_name'] != $account_logged->getName())
            header("Location: ./?subtopic=accountmanagement&action=manage");
        $getItemInfo = $SQL->query("SELECT * FROM `z_shop_offer` WHERE `id` = '" . $getPaymentInfo['service_id'] . "'")->fetch();

        if ($_POST['transferService'] == "yes") {

            $friend_account_name = $_REQUEST['friendAccount'];
            $serviceId = $_REQUEST['giftID'];

            $transfer_service = $SQL->query("UPDATE `z_shop_payment` SET `account_name` = '$friend_account_name' WHERE `id` = '$orderID'");
            if ($transfer_service)
                $main_content .= '
							<div class="TableContainer" >
								<table class="Table1" cellpadding="0" cellspacing="0" >
									<div class="CaptionContainer" >
										<div class="CaptionInnerContainer" > 
											<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
											<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
											<div class="Text" >Successfully Transferred Service.</div>
											<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
											<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
											<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										</div>
									</div>
									<tr>
										<td>
											<div class="InnerTableContainer" >
												<table style="width:100%;" >
													<tr>
														<td>You sent the service to your friend successfully.</td>
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
											<form action="?subtopic=accountmanagement&action=manage" method="post">
												<tr>
													<td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
															<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
																<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
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
            $main_content .= '<p>You can only transfer service to a friend who is added to your <strong>vip list (in-game)</strong>. Below, choose the friend and click "Submit".</p> <p>Ps: If your friend is not down is because you recently added, then exit and re-enter on your character in the game, then press F5 will appear here.</p>';
            $main_content .= '
				<form method="post" action="">
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
								<div class="Text" >Transfer ' . $getItemInfo['offer_name'] . ' to Friend</div>
								<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td class="LabelV">Transfer to friend:</td>
											<td>
												<select name="friendAccount">';
            $getVipList = $SQL->query("SELECT `player_id` FROM `account_viplist` WHERE `account_id` = '" . $account_logged->getID() . "'")->fetchAll();
            foreach ($getVipList as $vip) {
                $player_vip = new Player();
                $player_vip->loadById($vip['player_id']);

                $main_content .= '<option value="' . $player_vip->getAccount()->getName() . '">' . $player_vip->getName() . '</option>';
            }
            $main_content .= '
												</select>
												<input type="hidden" name="giftID" value="' . $orderID . '">
											</td>
											<td>
												<TABLE BORDER=0 WIDTH=100%>
													<TR>
														<TD ALIGN=center>
															<input type="hidden" name="transferService" value="yes">
															<table border="0" cellspacing="0" cellpadding="0" >
																<tr>
																	<td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_green.gif)" >
																			<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_green_over.gif);" ></div>
																				<input class="ButtonText" id="playerGift" type="image" name="Submit" alt="Submit" src="' . $layout_name . '/images/global/buttons/_sbutton_submit.gif" >
																			</div>
																		</div>
																	</td>
																</tr>															
															</table>
															</form>
														</TD>
													</TR>
												</TABLE>
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
								<form action="?subtopic=accountmanagement&action=manage" method="post">
									<tr>
										<td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
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
    if ($action == "readytouse") {

        $paymentId = (int)$_REQUEST['serviceID'];
        $getPaymentInfo = $SQL->query("SELECT * FROM `z_shop_payment` WHERE `id` = '$paymentId' AND `account_name` = '" . $account_logged->getName() . "'")->fetch();
        $character_id = (int)$_REQUEST['character'];
        $newcharName = (string)trim($_REQUEST['newcharname']);
        $newaccountname = (string)trim($_REQUEST['newaccountname']);
        $getItemInfo = $SQL->query("SELECT * FROM `z_shop_offer` WHERE `id` = '" . $getPaymentInfo['service_id'] . "'")->fetch();

        if ($getPaymentInfo['status'] != "ready")
            if ($_REQUEST['active_service'] == "yes")
                $ready_errors[] = "You have no service to activate right now.";

        if (empty($ready_errors))
            if ($newaccountname == "")
                if ($_REQUEST['active_service'] == "yes" && $getItemInfo['id'] == 7)
                    $ready_errors[] = "Please enter the new name of your account.";
        if (empty($ready_errors))
            if ($_REQUEST['active_service'] == "yes" && $getItemInfo['id'] == 7) {
                if (strlen($newaccountname) < 3)
                    $ready_errors[] = 'This account name is too short!';
                elseif (strlen($newaccountname) > 10)
                    $ready_errors[] = 'This account name is too long!';
                else
                    $newaccountname = strtoupper($newaccountname);
            }
        if (empty($ready_errors))
            if ($_REQUEST['active_service'] == "yes" && $getItemInfo['id'] == 7)
                if (!ctype_alnum($newaccountname))
                    $ready_errors[] = 'This account name has an invalid format. Your account name may only consist of numbers 0-9 and letters A-Z!';
                elseif (!preg_match('/[A-Z0-9]/', $newaccountname))
                    $ready_errors[] = 'Your account name must include at least one letter A-Z!';
                else {
                    $acc = new Account($newaccountname, Account::LOADTYPE_NAME);
                    if ($acc->isLoaded())
                        $ready_errors[] = 'This account name is already used. Please select another one!';
                }
        if ($character_id == "")
            if ($_REQUEST['active_service'] == "yes" && $getItemInfo['id'] <= 6)
                $ready_errors[] = "You do not have characters that account.";
        if (empty($ready_errors)) {
            if ($_REQUEST['active_service'] == "yes" && $getItemInfo['id'] <= 6) {
                $player = new Player();
                $player->loadById($character_id);
                if (!$player->isLoaded())
                    $ready_errors[] = "Informed character does not exist.";
            }
        }
        if (empty($ready_errors))
            if ($_REQUEST['active_service'] == "yes")
                if ($getPaymentInfo['service_category_id'] == 2 && $getItemInfo['offer_type'] == "changename") {
                    $new_name = new Player();
                    $new_name->loadByName($newcharName);
                    if ($new_name->isLoaded())
                        $ready_errors[] = "<strong>" . $newcharName . "</strong> has already been used on another character, please choose another name.";
                }

        if (empty($ready_errors))
            if ($_REQUEST['active_service'] == "yes")
                if ($getPaymentInfo['service_category_id'] == 2 && $getItemInfo['offer_type'] == "changename")
                    if (!check_name_new_char($newcharName) || empty($newcharName))
                        $ready_errors[] = "Please type a valid name for your character.";
        if (empty($ready_errors))
            if ($_REQUEST['active_service'] == "yes")
                if ($getPaymentInfo['service_category_id'] == 2 && $getItemInfo['offer_type'] == "changename")
                    if (!ctype_upper($newcharName[0]))
                        $ready_errors[] = 'The first letter of a name has to be a capital letter!';
        if (empty($ready_errors))
            if ($_REQUEST['active_service'] == "yes")
                if ($getPaymentInfo['service_category_id'] == 2 && $getItemInfo['offer_type'] == "changename") {
                    foreach (explode(' ', $newcharName) as $k => $v) {
                        $words[$k] = str_split($v);
                        $len = strlen($v);
                        if ($len == 1) {
                            $ready_errors[] = 'This name contains a word with only one letter. Please use more than one letter for each word!';
                            break;
                        } elseif ($len > 14) {
                            $ready_errors[] = 'This name contains a word that is too long. Please use no more than 14 letters for each word!';
                            break;
                        }
                    }
                }
        if (empty($ready_errors))
            if ($_REQUEST['active_service'] == "yes")
                if ($getPaymentInfo['service_category_id'] == 2 && $getItemInfo['offer_type'] == "changename") {
                    $total = 0;
                    foreach ($words as $k => $p) {
                        if (isset($ready_errors))
                            break;
                        $total++;
                        if ($total > 3) {
                            $ready_errors[] = 'This name contains more than 3 words. Please choose another name!';
                            break;
                        }
                        $len = 0;
                        foreach ($p as $i => $j) {
                            $len++;
                            if ($i != 0 && ctype_upper($j)) {
                                $ready_errors[] = 'In names capital letters are only allowed at the beginning of a word!';
                                break;
                            } elseif ($i == $len - 1) {
                                $ff = null;
                                for ($h = 0; $h < strlen($v); $h++) {
                                    if (in_array(strtolower($v[$h]), array('a', 'e', 'i', 'o', 'u')) !== false) {
                                        $ff = true;
                                        break;
                                    }
                                }
                                if (!$ff) {
                                    $ready_errors[] = 'This name contains a word without vowels. Please choose another name!';
                                    break;
                                }
                            }
                        }
                    }
                }
        if (!empty($ready_errors)) {
            $main_content .= '
							<div class="TableContainer" >
								<table class="Table1" cellpadding="0" cellspacing="0" >
									<div class="CaptionContainer" >
										<div class="CaptionInnerContainer" > 
											<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
											<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
											<div class="Text" >Services Page Errors</div>
											<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
											<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
											<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										</div>
									</div>
									<tr>
										<td>
											<div class="InnerTableContainer" >
												<table style="width:100%;" >
													<tr>
														<td>';
            foreach ($ready_errors as $error)
                $main_content .= $error . '<br>';
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
											<form action="?subtopic=accountmanagement&action=readytouse" method="post">
												<input type="hidden" name="serviceID" value="' . $_REQUEST['serviceID'] . '">
												<tr>
													<td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
															<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
																<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
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
            if ($_REQUEST['active_service'] == "yes") {

                $serviceInfo = (int)$_REQUEST['serviceInfo'];
                $getItemId = $SQL->query("SELECT * FROM `z_shop_offer` WHERE `id` = '$serviceInfo'")->fetch();
                $serviceID = (int)$_REQUEST['serviceID'];
                $player_id = (int)$_REQUEST['character'];
                $newcharName = (string)trim($_REQUEST['newcharname']);
                $player = new Player();
                $player->loadById($player_id);
                if ($player->isLoaded())
                    $player_name = addslashes($player->getName());
                if ($getItemId['category'] >= 3) {
                    if ($getItemId['category'] == 5) {
                        $add_service = $SQL->query("INSERT INTO `z_ots_comunication` (`name`, `type`, `action`, `param1`, `param2`, `param3`, `param4`, `param5`, `param6`, `param7`, `delete_it`) VALUES ('$player_name', 'login', 'give_item', '" . $getItemId['itemid'] . "', '" . $getItemId['count'] . "', '', '', 'item', '" . addslashes($getItemId['offer_name']) . "', '" . $getItemId['id'] . "', '1')");

                        if ($add_service)
                            $update_payment = $SQL->query("UPDATE `z_shop_payment` SET `status` = 'received' WHERE `id` = '$serviceID' AND `account_name` = '" . $account_logged->getName() . "'");
                        else
                            $main_content .= 'There was an error , contact the administrator to resolve.';
                    }

                    if ($getItemId['category'] == 4) {
                        $add_service = $SQL->query("INSERT INTO `z_ots_comunication` (`name`, `type`, `action`, `param1`, `param2`, `param3`, `param4`, `param5`, `param6`, `param7`, `delete_it`) VALUES ('$player_name', 'login', 'give_outfit', '', '', '" . $getItemId['addon_name'] . "', '', 'outfit', '" . addslashes($getItemId['offer_name']) . "', '" . $getItemId['id'] . "', '1')");

                        if ($add_service)
                            $update_payment = $SQL->query("UPDATE `z_shop_payment` SET `status` = 'received' WHERE `id` = '$serviceID' AND `account_name` = '" . $account_logged->getName() . "'");
                        else
                            $main_content .= 'There was an error , contact the administrator to resolve.';
                    }

                    if ($getItemId['category'] == 3) {
                        $add_service = $SQL->query("INSERT INTO `z_ots_comunication` (`name`, `type`, `action`, `param1`, `param2`, `param3`, `param4`, `param5`, `param6`, `param7`, `delete_it`) VALUES ('$player_name', 'login', 'give_mount', '', '', '', '" . $getItemId['mount_id'] . "', 'mount', '" . addslashes($getItemId['offer_name']) . "', '" . $getItemId['id'] . "', '1')");

                        if ($add_service)
                            $update_payment = $SQL->query("UPDATE `z_shop_payment` SET `status` = 'received' WHERE `id` = '$serviceID' AND `account_name` = '" . $account_logged->getName() . "'");
                        else
                            $main_content .= 'There was an error , contact the administrator to resolve.';
                    }

                    $main_content .= '
						<div class="TableContainer" >
							<table class="Table1" cellpadding="0" cellspacing="0" >
								<div class="CaptionContainer" >
									<div class="CaptionInnerContainer" > 
										<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
										<div class="Text" >Services Actived</div>
										<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
										<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									</div>
								</div>
								<tr>
									<td>
										<div class="InnerTableContainer" >
											<table style="width:100%;" >
												<tr>
													<td>Your ' . $getItemId['offer_name'] . ' is active in your character ' . $player->getName() . '. Just log into your character and you receive it in the game.</td>
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
										<form action="?subtopic=accountmanagement&action=manage" method="post">
											<tr>
												<td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
														<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
															<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
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
                if ($getItemId['category'] == 2) {
                    if ($getItemId['offer_type'] == "changename") {
                        $datetoHide = time() + ($config['site']['formerNames'] * 86400);
                        $record_old_name = $SQL->query("INSERT INTO `player_former_names` (`player_id`,`former_name`,`date`) VALUES ('" . $player->getID() . "','" . $player->getName() . "','" . $datetoHide . "')");
                        if ($record_old_name) {
                            $player->setName($newcharName);
                            $player->save();
                            $update_payment = $SQL->query("UPDATE `z_shop_payment` SET `status` = 'received' WHERE `id` = '$serviceID' AND `account_name` = '" . $account_logged->getName() . "'");
                        }

                        $main_content .= '
							<div class="TableContainer" >
								<table class="Table1" cellpadding="0" cellspacing="0" >
									<div class="CaptionContainer" >
										<div class="CaptionInnerContainer" > 
											<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
											<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
											<div class="Text" >Services Actived</div>
											<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
											<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
											<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										</div>
									</div>
									<tr>
										<td>
											<div class="InnerTableContainer" >
												<table style="width:100%;" >
													<tr>
														<td>You have successfully changed the name of your character. The new name is ' . $newcharName . '</td>
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
											<form action="?subtopic=accountmanagement&action=manage" method="post">
												<tr>
													<td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
															<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
																<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
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
                    if ($getItemId['offer_type'] == "changesex") {
                        $add_service = $SQL->query("INSERT INTO `z_ots_comunication` (`name`, `type`, `action`, `param1`, `param2`, `param3`, `param4`, `param5`, `param6`, `param7`, `delete_it`) VALUES ('$player_name', 'login', 'change_sex', '', '', '', '', 'sex', '" . $getItemId['offer_name'] . "', '" . $player->getSex() . "', '1')");
                        //$update_payment = $SQL->query("UPDATE `z_shop_payment` SET `status` = 'received' WHERE `id` = '$serviceID'");

                        $main_content .= '
							<div class="TableContainer" >
								<table class="Table1" cellpadding="0" cellspacing="0" >
									<div class="CaptionContainer" >
										<div class="CaptionInnerContainer" > 
											<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
											<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
											<div class="Text" >Services Actived</div>
											<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
											<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
											<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										</div>
									</div>
									<tr>
										<td>
											<div class="InnerTableContainer" >
												<table style="width:100%;" >
													<tr>
														<td>You character\'s gender was changed successfully.</td>
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
											<form action="?subtopic=accountmanagement&action=manage" method="post">
												<tr>
													<td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
															<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
																<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
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
                    if ($getItemId['offer_type'] == "newrk") {
                        //Function to generate NUMBERS
                        function generateRK($length)
                        {
                            $vowels = "AEIOU";
                            $consonants = "BDGHJLMNPQRSTVWXYZ0123456789";
                            $password = "";
                            $alt = time() % 2;
                            for ($i = 0; $i < $length; $i++) {
                                if ($alt == 1) {
                                    $password .= $consonants[(rand() % strlen($consonants))];
                                    $alt = 0;
                                } else {
                                    $password .= $vowels[(rand() % strlen($vowels))];
                                    $alt = 1;
                                }
                            }
                            return $password;
                        }

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $hash = md5(implode($_POST));
                            if (isset($_SESSION['hash']) && $_SESSION['hash'] == $hash) {
                                header("Location: ?subtopic=accountmanagement&action=manage");
                            } else {
                                $_SESSION['hash'] = $request;
                                $recoveryKey = generateRk(4) . '-' . generateRk(4) . '-' . generateRk(4) . '-' . generateRk(4);
                                $newRk = $account_logged;
                                $newRk->setKey($recoveryKey);
                                $newRk->save();
                                $update_payment = $SQL->query("UPDATE `z_shop_payment` SET `status` = 'received' WHERE `id` = '$serviceID' AND `account_name` = '" . $account_logged->getName() . "'");
                            }
                        }

                        if ($newRk)
                            $main_content .= '
								<div class="TableContainer" >
									<table class="Table1" cellpadding="0" cellspacing="0" >
										<div class="CaptionContainer" >
											<div class="CaptionInnerContainer" > 
												<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
												<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
												<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
												<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>										
												<div class="Text" >New Recovery Key</div>
												<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
												<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
												<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
												<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
											</div>
										</div>
										<tr>
											<td>
												<div class="InnerTableContainer" >
													<table style="width:100%;" >
														Thank you for your purchase, below is your new recovery key that can be used to recover your account if lost.<br/>
														<br/>
														<font size="5">&nbsp;&nbsp;&nbsp;<b>Recovery Key: ' . $account_logged->getKey() . '</b></font><br/>
														<br/>
														<br/>
														<b>Important:</b>
														<ul>
															<li>Write down this recovery key carefully.</li>
															<li>Store it at a safe place! Do not save it on your computer!</li>
															<li>You will not receive an email containing this recovery key.</li>
															<li>If you lose will have to buy another again by our Shop.</li>
														</ul>
													</table>
												</div>
											</table>
										</div>
									</td>
								</tr>
								<br/>
								<center>
									<table border="0" cellspacing="0" cellpadding="0" >
										<form action="?subtopic=accountmanagement" method="post" >
											<tr>
												<td style="border:0px;" ><input type="hidden" name=action value=manage >
													<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
														<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
															<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
														</div>
													</div>
												</td>
											</tr>
										</form>
									</table>
								</center>';

                    }
                    if ($getItemId['offer_type'] == "changeaccountname") {
                        $updateOrderNewAccount = $SQL->query("UPDATE `z_shop_payment` SET `account_name` = '$newaccountname' WHERE `account_name` = '" . $account_logged->getName() . "'");
                        $account = $account_logged;
                        $account->setName($newaccountname);
                        $account->save();
                        $update_payment = $SQL->query("UPDATE `z_shop_payment` SET `status` = 'received' WHERE `id` = '$serviceID' AND `account_name` = '" . $account_logged->getName() . "'");
                        $main_content .= '
							<div class="TableContainer" >
								<table class="Table1" cellpadding="0" cellspacing="0" >
									<div class="CaptionContainer" >
										<div class="CaptionInnerContainer" > 
											<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
											<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
											<div class="Text" >Services Actived</div>
											<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
											<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
											<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										</div>
									</div>
									<tr>
										<td>
											<div class="InnerTableContainer" >
												<table style="width:100%;" >
													<tr>
														<td>You have changed the name of your account successfully. The new name is ' . $newaccountname . '.</td>
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
											<form action="?subtopic=accountmanagement&action=manage" method="post">
												<tr>
													<td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
															<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
																<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
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
            } else {
                $getServiceInfo = $SQL->query("SELECT * FROM `z_shop_offer` WHERE `id` = '" . $getPaymentInfo['service_id'] . "'")->fetch();
                $main_content .= '
				<form method="post" action="?subtopic=accountmanagement&action=readytouse">
					<div class="TableContainer" >
						<table class="Table3" cellpadding="0" cellspacing="0">
							<div class="CaptionContainer" >
								<div class="CaptionInnerContainer" > 
									<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>								
									<div class="Text" >Service Details</div>
									<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
									<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								</div>
							</div>
							<tr>
								<td>
									<div class="InnerTableContainer" >
										<table style="width:100%;" >
											<tr>
												<td>If necessary choose a character for which you want to activate the service and then click "Submit".</td>
											</tr>
											<tr>
												<td>
													<div class="TableShadowContainerRightTop" >
														<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
													</div>
													<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
														<div class="TableContentContainer" >
															<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
																<tr>
																	<td class="LabelV150" >Date of purchase:</td>
																	<td>' . date("M d Y", $getPaymentInfo['date']) . '</td>
																</tr>
																<tr>
																	<td class="LabelV150" >Service:</td>
																	<td>' . $getServiceInfo['offer_name'] . '</td>
																</tr>
															</table>
														</div>
													</div>
													<div class="TableShadowContainer" >
														<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
															<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
															<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
														</div>
													</div>
												</td>
											</tr>';
                if ($getServiceInfo['category'] >= "3") {
                    $main_content .= '
											<tr>
												<td>
													<div class="TableShadowContainerRightTop" >
														<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
													</div>
													<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
														<div class="TableContentContainer" >
															<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
																<tr>
																	<td width="32px">';
                    if ($getServiceInfo['category'] == "5")
                        $main_content .= '
																		<img src="./' . $layout_name . '/images/shop/items/' . $getServiceInfo['itemid'] . '.gif">';
                    if ($getServiceInfo['category'] == "4")
                        $main_content .= '<img src="./' . $layout_name . '/images/shop/outfits/' . strtolower($getServiceInfo['addon_name']) . '_male.gif">';
                    if ($getServiceInfo['category'] == "3")
                        $main_content .= '<img src="./' . $layout_name . '/images/shop/mounts/' . str_replace(" ", "_", $getServiceInfo['offer_name']) . '.gif">';
                    $main_content .= '
																	</td>
																	<td>
																		Select the character to receive service: 
																		<select name="character">';
                    $account_players = $account_logged->getPlayersList();
                    foreach ($account_players as $player)
                        $main_content .= '
																			<option value="' . $player->getID() . '">' . $player->getName() . '</option>';
                    $main_content .= '
																		</select>
																	</td>
																</tr>
															</table>
														</div>
													</div>
													<div class="TableShadowContainer" >
														<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
															<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
															<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
														</div>
													</div>
												</td>
											</tr>';


                } else {
                    if ($getServiceInfo['offer_type'] == "changename") {
                        $main_content .= '
												<tr>
													<td>
														<div class="TableShadowContainerRightTop" >
															<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
														</div>
														<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
															<div class="TableContentContainer" >
																<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
																	<tr>
																		<td class="LabelV150">New Character name:</td>
																		<td><input type="text" name="newcharname" size="30"></td>
																		<td>
																			to: 
																			<select name="character">';
                        $account_players = $account_logged->getPlayersList();
                        foreach ($account_players as $player)
                            $main_content .= '
																				<option value="' . $player->getID() . '">' . $player->getName() . '</option>';
                        $main_content .= '
																			</select>
																		</td>
																	</tr>
																	<tr>
																		<td colspan="3">To change your character\'s name, <strong>it must be offline</strong>.</td>
																	</tr>
																</table>
															</div>
														</div>
														<div class="TableShadowContainer" >
															<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
																<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
																<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
															</div>
														</div>
													</td>
												</tr>';
                    }
                    if ($getServiceInfo['offer_type'] == "changesex") {
                        $main_content .= '
												<tr>
													<td>
														<div class="TableShadowContainerRightTop" >
															<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
														</div>
														<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
															<div class="TableContentContainer" >
																<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
																	<tr>
																		<td class="LabelV150">Change the gender of:</td>
																		<td>
																			to: 
																			<select name="character">';
                        $account_players = $account_logged->getPlayersList();
                        foreach ($account_players as $player)
                            $main_content .= '
																				<option value="' . $player->getID() . '">' . $player->getName() . '</option>';
                        $main_content .= '
																			</select>
																		</td>
																	</tr>
																	<tr>
																		<td colspan="2">To change your character\'s gender, <strong>it must be offline</strong>.</td>
																	</tr>
																</table>
															</div>
														</div>
														<div class="TableShadowContainer" >
															<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
																<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
																<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
															</div>
														</div>
													</td>
												</tr>';
                    }
                    if ($getServiceInfo['offer_type'] == "newrk") {
                        $main_content .= '
												<tr>
													<td>
														<div class="TableShadowContainerRightTop" >
															<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
														</div>
														<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
															<div class="TableContentContainer" >
																<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
																	<tr>
																		<td class="LabelV150">Generate a new recovery key to account ?</td>
																		<td>' . $account_logged->getName() . '</td>
																	</tr>
																</table>
															</div>
														</div>
														<div class="TableShadowContainer" >
															<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
																<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
																<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
															</div>
														</div>
													</td>
												</tr>';
                    }
                    if ($getServiceInfo['offer_type'] == "changeaccountname") {
                        $main_content .= '
												<tr>
													<td>
														<div class="TableShadowContainerRightTop" >
															<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
														</div>
														<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
															<div class="TableContentContainer" >
																<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
																	<tr>
																		<td class="LabelV150">Type a new Accoun Name</td>
																		<td><input type="text" name="newaccountname" size="30"></td>
																	</tr>
																</table>
															</div>
														</div>
														<div class="TableShadowContainer" >
															<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
																<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
																<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
															</div>
														</div>
													</td>
												</tr>';
                    }
                }
                $main_content .= '	
										</table>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<div class="SubmitButtonRow" >
						<div class="LeftButton" >
								<input type="hidden" name="active_service" value="yes">
								<input type="hidden" name="serviceID" value="' . $_REQUEST['serviceID'] . '">
								<input type="hidden" name="serviceInfo" value="' . $getServiceInfo['id'] . '">
								<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_green.gif)" >
									<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_green_over.gif);" ></div>
										<input class="ButtonText" type="image" name="Submit" alt="Submit" src="' . $layout_name . '/images/global/buttons/_sbutton_submit.gif" >
									</div>
								</div>
							</form>
						</div>
						<div class="RightButton" >
							<form action="?subtopic=accountmanagement&action=manage" method="post" style="padding:0px;margin:0px;" >
								<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
									<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
										<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
									</div>
								</div>
							</form>
						</div>
					</div>';
            }
        }
    }
    if ($action == "deletecharacter") {
        if (!isset($_REQUEST['step'])) {
            $charName = trim(stripslashes($_REQUEST['name']));
            $delChar = new Player();
            $delChar->find($charName);
            if ($delChar->isLoaded()) {
                $delPlayerName = $delChar->getName();
                $delPlayerAcc = new Account();
                $delPlayerAcc->loadByName($_SESSION['account']);
                if($delChar->data['account_id'] == $delPlayerAcc->data['id']) {


                    if (isset($_REQUEST['function']) && $_REQUEST['function'] == "deletecharacter") {
                        $spanColor = "";
                        $delPassword = trim(stripslashes($_POST['password']));
                        if (!$account_logged->isValidPassword($delPassword)) {
                            $erro = "Password is not correct!";
                            $spanColor = "class=red";
                        }
                        if (empty($erro)) {
                            $delChar->setDeleted(1);
                            $delChar->setDeletion(time() + ($config['site']['daystodelete'] * 86400));
                            $delChar->save();
                            header("Location: ?subtopic=accountmanagement&action=deletecharacter&step=deletecharacter&name=$charName");
                        } else {
                            $main_content .= '
							<div class="SmallBox" >
								<div class="MessageContainer" >
									<div class="BoxFrameHorizontal" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-horizontal.gif);" /></div>
									<div class="BoxFrameEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
									<div class="BoxFrameEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
									<div class="ErrorMessage" >
										<div class="BoxFrameVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></div>
										<div class="BoxFrameVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></div>
										<div class="AttentionSign" style="background-image:url(' . $layout_name . '/images/global/content/attentionsign.gif);" /></div>
										<b>The following error has occurred:</b><br/>
										' . $erro . '
									</div>
									<div class="BoxFrameHorizontal" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-horizontal.gif);" /></div>
									<div class="BoxFrameEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
									<div class="BoxFrameEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
								</div>
							</div>
							<br/>';
                        }
                    }
                    $main_content .= '
					To delete this character enter your password and click on "Submit".<br/>
					You can undelete the character within the first 7 days after the deletion.<br/>
					After this time the character is deleted for good and cannot be restored anymore!<br/>
					<br/>
					<form action="?subtopic=accountmanagement&action=deletecharacter&name=' . $charName . '" method="post" >
						<div class="TableContainer" >
							<table class="Table1" cellpadding="0" cellspacing="0" >
								<div class="CaptionContainer" >
									<div class="CaptionInnerContainer" > 
										<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>										
										<div class="Text">Delete Character</div>
										<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
										<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									</div>
								</div>
								<tr>
									<td><div class="InnerTableContainer" >
											<table style="width:100%;" >
												<tr>
													<td class="LabelV" ><span >Character Name:</td>
													<td style="width:90%;" >' . htmlspecialchars($delChar->getName()) . '</td>
												</tr>
												<tr>
													<td class="LabelV" ><span ' . $spanColor . '>Password:</td>
													<td><input type="password" name="password" size="30" maxlength="29" ></td>
												</tr>';
                    if (!empty($erro))
                        $main_content .= '
												<tr>
													<td></td>
													<td><span class="FormFieldError">' . $erro . '</span></td>
												</tr>';
                    $main_content .= '
											</table>
										</div>
									</table>
								</div>
							</td>
						</tr>
						<br/>
						<table style="width:100%" >
						<tr align="center" >
							<td><table border="0" cellspacing="0" cellpadding="0" >
								<tr>
									<td style="border:0px;" >
										<input type="hidden" name=function value="deletecharacter" >
										<input type="hidden" name=selectedcharacter value="' . htmlspecialchars($delChar->getName()) . '" >
										<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
											<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
												<div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
												<input class="ButtonText" type="image" name="Submit" alt="Submit" src="' . $layout_name . '/images/global/buttons/_sbutton_submit.gif" >
											</div>
										</div>
									</td>								
								<tr>
							</form>
						</table>
					</td>
					<td>
						<table border="0" cellspacing="0" cellpadding="0" >
							<form action="?subtopic=accountmanagement" method="post" >
								<tr>
									<td style="border:0px;" >
										<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
											<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
												<div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
												<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
											</div>
										</div>
									</td>
								</tr>
							</form>
						</table>
					</td>
				</tr>
			</table>';
                }else{
                    header("Location: ?subtopic=accountmanagement");
                }
            } else {
                header("Location: ?subtopic=accountmanagement");
            }
        }
        if ($_REQUEST['step'] == "deletecharacter") {
            $charToDelete = new Player();
            $charToDelete->loadByName($_REQUEST['name']);

            $main_content .= '
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>								
								<div class="Text" >Character Deleted</div>
								<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td><div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>The character <b>' . htmlspecialchars($charToDelete->getName()) . '</b> has been scheduled for deletion. It will be removed permanently from your account on <strong>' . date("M j Y, H:i:s", $charToDelete->getDeletion()) . '</strong>.</td>
										</tr>
									</table>
								</div>
							</table>
						</div>
					</td>
				</tr>
				<br>
				<center>
					<table border="0" cellspacing="0" cellpadding="0" >
						<form action="?subtopic=accountmanagement" method="post" >
							<tr>
								<td style="border:0px;" >
									<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
										<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
											<div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
											<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
										</div>
									</div>
								</td>
							</tr>
						</form>
					</table>
				</center>';
        }
    }
    if ($action == "undeletecharacter") {
        if (!isset($_REQUEST['step'])) {
            $charName = trim(stripslashes($_REQUEST['name']));
            $main_content .= '
				To undelete this character click on "Submit".<br/>
				Note that characters can only be restored within the first 2 months (60 days) after the deletion.<br/>
				<br/>
				<form action="?subtopic=accountmanagement&action=undeletecharacter&step=undeletecharacter" method="post" >
					<div class="TableContainer" >
						<table class="Table1" cellpadding="0" cellspacing="0" >
							<div class="CaptionContainer" >
								<div class="CaptionInnerContainer" > 
									<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>									
									<div class="Text" >Undelete Character</div>
									<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
									<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								</div>
							</div>
							<tr>
								<td><div class="InnerTableContainer" >
										<table style="width:100%;" >
											<tr>
												<td class="LabelV" ><span >Character Name:</span></td>
												<td style="width:90%;" >' . $charName . '</td>
											</tr>
										</table>
									</div>
								</table>
							</div>
						</td>
					</tr>
					<br/>
					<table style="width:100%" >
					<tr align="center" >
						<td><table border="0" cellspacing="0" cellpadding="0" >
							<tr>
								<td style="border:0px;" ><input type="hidden" name=name value="' . $charName . '" >
									<input type="hidden" name=selectedcharacter value="' . $charName . '" >
									<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
										<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
											<div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
											<input class="ButtonText" type="image" name="Submit" alt="Submit" src="' . $layout_name . '/images/global/buttons/_sbutton_submit.gif" >
										</div>
									</div>
								</td>							
							<tr>
						</form>
					</table>
				</td>
				<td>
					<table border="0" cellspacing="0" cellpadding="0" >
						<form action="?subtopic=accountmanagement" method="post" >
							<tr>
								<td style="border:0px;" >
									<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
										<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
											<div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
											<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
										</div>
									</div>
								</td>
							</tr>
						</form>
					</table>
				</td>
			</tr>
		</table>';
        }
        if ($_REQUEST['step'] == "undeletecharacter") {
            $charName = htmlspecialchars($_REQUEST['name']);
            $undeleteChar = new Player();
            $undeleteChar->find($charName);
            if ($undeleteChar->isLoaded()) {
                $undeleteChar->setDeletion(0);
                $undeleteChar->setDeleted(0);
                $undeleteChar->save();
            }

            $main_content .= '
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>								
								<div class="Text" >Character Undeleted</div>
								<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td><div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>The character <b>' . $charName . '</b> has been undeleted.</td>
										</tr>
									</table>
								</div>
							</table>
						</div>
					</td>
				</tr>
				<br>
				<center>
					<table border="0" cellspacing="0" cellpadding="0" >
						<form action="?subtopic=accountmanagement" method="post" >
							<tr>
								<td style="border:0px;" >
									<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
										<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
											<div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
											<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
										</div>
									</div></td>
							</tr>
						</form>
					</table>
				</center>';
        }
    }
    //Register account and get Recovery key
    if ($action == "registeraccount"){
        if (empty($account_reckey)) {
            $main_content .= '
				<div id="ProgressBar">
					<div id="Headline">Register Account</div>
					<div id="MainContainer">
						<div id="BackgroundContainer"> 
							<img id="BackgroundContainerLeftEnd" src="' . $layout_name . '/images/global/content/stonebar-left-end.gif"/>
							<div id="BackgroundContainerCenter">
								<div id="BackgroundContainerCenterImage" style="background-image:url(' . $layout_name . '/images/global/content/stonebar-center.gif);">
							</div>
						</div>
						<img id="BackgroundContainerRightEnd" src="' . $layout_name . '/images/global/content/stonebar-right-end.gif"/> 
					</div>
					<img id="TubeLeftEnd" src="' . $layout_name . '/images/global/content/progressbar/progress-bar-tube-left-green.gif"/>';
            $main_content .= ' 
					<img id="TubeRightEnd" src="' . $layout_name . '/images/global/content/progressbar/progress-bar-tube-right-' . (($_REQUEST['step'] != 3) ? "blue" : "green") . '.gif"/>
					<div id="FirstStep" class="Steps">
						<div class="SingleStepContainer"> 
							<img class="StepIcon" src="' . $layout_name . '/images/global/content/progressbar/progress-bar-icon-2-green.gif"/>
							<div class="StepText" ' . ((!isset($_REQUEST['step'])) ? "style=font-weight:bold" : "style=font-weight:normal") . ';">Registration Data</div>
						</div>
					</div>
					<div id="StepsContainer1">
						<div id="StepsContainer2">
							<div class="Steps" style="width:50%">
								<div class="TubeContainer"> 
									<img class="Tube" src="' . $layout_name . '/images/global/content/progressbar/progress-bar-tube-green' . (($_REQUEST['step'] >= 2) ? "" : "-blue") . '.gif"/> 
								</div>
								<div class="SingleStepContainer"> 
									<img class="StepIcon" src="' . $layout_name . '/images/global/content/progressbar/progress-bar-icon-3-' . (($_REQUEST['step'] >= 2) ? "green" : "blue") . '.gif"/>
									<div class="StepText" ' . (($_REQUEST['step'] == 2) ? "style=font-weight:bold" : "style=font-weight:normal") . ';" >Verification</div>
								</div>
							</div>
							<div class="Steps" style="width:50%">
								<div class="TubeContainer"> ';
            if (!isset($_REQUEST['step']))
                $main_content .= '
									<img class="Tube" src="' . $layout_name . '/images/global/content/progressbar/progress-bar-tube-blue.gif"/>';
            elseif ($_REQUEST['step'] == 2)
                $main_content .= '
									<img class="Tube" src="' . $layout_name . '/images/global/content/progressbar/progress-bar-tube-green-blue.gif"/>';
            elseif ($_REQUEST['step'] == 3)
                $main_content .= '
									<img class="Tube" src="' . $layout_name . '/images/global/content/progressbar/progress-bar-tube-green.gif"/>';
            $main_content .= ' 
								</div>
								<div class="SingleStepContainer"> 
									<img class="StepIcon" src="' . $layout_name . '/images/global/content/progressbar/progress-bar-icon-4-' . (($_REQUEST['step'] == 3) ? "green" : "blue") . '.gif"/>
									<div class="StepText" ' . (($_REQUEST['step'] == 3) ? "style=font-weight:bold" : "style=font-weight:normal") . ';">Recovery Key</div>
								</div>
							</div>
						</div>
					</div>
				</div>';
            if (!isset($_REQUEST['step'])) {
                $main_content .= '
				Account registration offers many important advantages:
				<ul>
					<li>Registered users get a recovery key, which can be used to recover their accounts if they have lost access to the assigned email address.</li>
					<li>Registered users can request a new recovery key for a small fee.</li>
					<li>Extra Services can only be bought for registered accounts.</li>
					<li>Finally, only registered users can become tutor.</li>
				</ul>
				<b>NOTE:</b> The data given in the registration will be used exclusively for compiling internal statistical surveys. It will be treated in a strictly confidential manner.<br/>
				<br/>
				Please enter correct and complete data to make sure we can provide you with the best possible support. Above all, give your full address to make sure that our postal recovery letters will reach you. Note that all data entered in the registration can be re-edited later on.<br/>
				<br/>
				<form action="?subtopic=accountmanagement&action=registeraccount&step=2" method=post>
					<div class="TableContainer" >
						<table class="Table1" cellpadding="0" cellspacing="0" >
							<div class="CaptionContainer" >
								<div class="CaptionInnerContainer" > 
									<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>									
									<div class="Text">Enter Registration Data</div>
									<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
									<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								</div>
							</div>
							<tr>
								<td><div class="InnerTableContainer" >
										<table style="width:100%;" >
											<tr>
												<td class="LabelV" width="120px" ><span >First Name:</span></td>
												<td><input name="firstname" value=""size="30" maxlength="30" required></td>
											</tr>
											<tr>
												<td class="LabelV" ><span >Last Name:</span></td>
												<td><input name="lastname" value="" size="30" maxlength="30" required></td>
											</tr>
											<tr>
												<td class="LabelV" ><span >City:</span></td>
												<td><input name="city" value="" size="40" maxlength="50" required></td>
											</tr>
												<td class="LabelV" ><span >Date of Birth:</span></td>
												<td>
													<select size="1" name="dateofbirthday" required>
														<option value="0">---</option>';
                for ($s = 1; $s < 31; $s++)
                    $main_content .= '<option value="' . $s . '">' . $s . '</option>';
                $main_content .= '
													</select>
													<select size="1" name="dateofbirthmonth" required>
														<option value="0">---</option>';
                $months = array(1 => "January", 2 => "February", 3 => "March", 4 => "April", 5 => "May", 6 => "June", 7 => "July", 8 => "August", 9 => "September", 10 => "October", 11 => "November", 12 => "December");
                $months_number = 0;
                foreach ($months as $m) {
                    $months_number++;
                    $main_content .= '<option value="' . $months_number . '">' . $m . '</option>';
                }
                $main_content .= '
													</select>';
                $main_content .= '
													<select size="1" name="dateofbirthyear" required>
														<option value="0">---</option>';
                for ($i = 2009; $i > 1901; $i--) {
                    $main_content .= '<option value="' . $i . '">' . $i . '</option>';
                }
                $main_content .= '	
													</select>
												</td>
											</tr>
											<tr>
												<td class="LabelV" ><span >Gender:</span></td>
												<td>
													<select size="1" name="gender">
														<option value="">---</option>
														<option value="female">female</option>
														<option value="male">male</option>
													</select>
												</td>
											</tr>
										</table>
									</div>
								</table>
							</div>
						</td>
					</tr>
					<br/>
					<table style="width:100%;" >
					<tr align="center">
						<td><table border="0" cellspacing="0" cellpadding="0" >
							<tr>
								<td style="border:0px;" >
									<input type="hidden" name=function value=confirmdata >
									<input type="hidden" name=source value=start >
									<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
										<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
											<input class="ButtonText" type="image" name="Continue" alt="Continue" src="' . $layout_name . '/images/global/buttons/_sbutton_continue.gif" >
										</div>
									</div>
								</td>							
							<tr>
						</form>
					</table>
				</td>
				<td><table border="0" cellspacing="0" cellpadding="0" >
						<form action="?subtopic=accountmanagement&action=manage" method="post" >
							<tr>
								<td style="border:0px;" >
									<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
										<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
											<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
										</div>
									</div>
								</td>
							</tr>
						</form>
					</table>
				</td>
			</tr>
		</table>
		</div>';
            } elseif ($_REQUEST['step'] == 2) {
                if ($_POST['function'] == "confirmdata") {
                    //Get values from form, and prepare to get RK
                    $firstName = ucfirst(trim(stripslashes($_POST['firstname'])));
                    $lastname = ucfirst(trim(stripslashes($_POST['lastname'])));
                    $city = ucfirst(trim(stripslashes($_POST['city'])));
                    $dateofbirth = (int)$_POST['dateofbirthday'] . '/' . (int)$_POST['dateofbirthmonth'] . '/' . (int)$_POST['dateofbirthyear'];
                    $gender = $_POST['gender'];
                    $fullname = $firstName . ' ' . $lastname;

                    $main_content .= '
						Please review the data you have entered. If you would like to correct data, click on "Back".<br/>
						<br/>
						<div class="TableContainer" >
							<table class="Table1" cellpadding="0" cellspacing="0" >
								<div class="CaptionContainer" >
									<div class="CaptionInnerContainer" > 
										<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>										
										<div class="Text" >Verify Registration Data</div>
										<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
										<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>

										<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									</div>
								</div>
								<tr>
									<td><div class="InnerTableContainer" >
											<table style="width:100%;" >
												<tr>
													<td class="LabelV" >First Name:</td>
													<td style="width:90%;" >' . $firstName . '</td>
												</tr>
												<tr>
													<td class="LabelV" >Last Name:</td>
													<td>' . $lastname . '</td>
												</tr>
												<tr>
													<td class="LabelV" >City:</td>
													<td>' . $city . '</td>
												</tr>
												<tr>
													<td class="LabelV" >Date of Birth:</td>
													<td>' . $dateofbirth . '</td>
												</tr>
												<tr>
													<td class="LabelV" >Gender:</td>
													<td>' . $gender . '</td>
												</tr>
												<form action="?subtopic=accountmanagement&action=registeraccount&step=3" method="post" >												
											</table>
										</div>
									</table>
								</div>
							</td>
						</tr>
						<br/>
						<table style="width:100%;" >
							<tr align="center">
								<td><table border="0" cellspacing="0" cellpadding="0" >
										<tr>
											<td style="border:0px;" >
												<input type="hidden" name=function value=getrecoverykey >
												<input type="hidden" name=firstname value="' . $firstName . '" >
												<input type="hidden" name=lastname value="' . $lastname . '">
												<input type="hidden" name=city value="' . $city . '">
												<input type="hidden" name=dateofbirthday value=' . (int)$_POST['dateofbirthday'] . '>
												<input type="hidden" name=dateofbirthmonth value=' . (int)$_POST['dateofbirthmonth'] . '>
												<input type="hidden" name=dateofbirthyear value=' . (int)$_POST['dateofbirthyear'] . '>
												<input type="hidden" name=gender value="' . $gender . '">
												<input type="hidden" name=source value=main>
												<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
													<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
														<input class="ButtonText" type="image" name="Submit" alt="Submit" src="' . $layout_name . '/images/global/buttons/_sbutton_submit.gif" >
													</div>
												</div></td>
										<tr></form>
									</table></td>
								<td>
									<table border="0" cellspacing="0" cellpadding="0" >
										<form action="?subtopic=accountmanagement&action=registeraccount" method="post" >
											<tr>
												<td style="border:0px;" >
													<input type="hidden" name=firstname value="' . $firstName . '" >
													<input type="hidden" name=lastname value="' . $lastname . '">
													<input type="hidden" name=city value="' . $city . '">
													<input type="hidden" name=dateofbirthday value=' . (int)$_POST['dateofbirthday'] . '>
													<input type="hidden" name=dateofbirthmonth value=' . (int)$_POST['dateofbirthmonth'] . '>
													<input type="hidden" name=dateofbirthyear value=' . (int)$_POST['dateofbirthyear'] . '>
													<input type="hidden" name=gender value="' . $gender . '">
													<input type="hidden" name=source value=main>
													<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
														<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
															<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
														</div>
													</div>
												</td>
											</tr>
										</form>
									</table>
								</td>
							</tr>
						</table>
						</div>';

                } else {
                    header("Location: ?subtopic=accountmanagement&action=manage");
                }
            } elseif ($_REQUEST['step'] == 3) {
                if ($_POST['function'] == "getrecoverykey") {
                    //Get values from form, and prepare to get RK
                    $firstName = ucfirst(trim(stripslashes($_POST['firstname'])));
                    $lastname = ucfirst(trim(stripslashes($_POST['lastname'])));
                    $city = ucfirst(trim(stripslashes($_POST['city'])));
                    $dateofbirth = (int)$_POST['dateofbirthday'] . '/' . (int)$_POST['dateofbirthmonth'] . '/' . (int)$_POST['dateofbirthyear'];
                    $gender = $_POST['gender'];
                    $fullname = $firstName . ' ' . $lastname;

                    //Function to generate NUMBERS
                    function generateRK($length)
                    {
                        $vowels = "AEIOUY";
                        $consonants = "BDGHJLMNPQRSTVWXZ0123456789";
                        $password = "";
                        $alt = time() % 2;
                        for ($i = 0; $i < $length; $i++) {
                            if ($alt == 1) {
                                $password .= $consonants[(rand() % strlen($consonants))];
                                $alt = 0;
                            } else {
                                $password .= $vowels[(rand() % strlen($vowels))];
                                $alt = 1;
                            }
                        }
                        return $password;
                    }

                    $recoveryKey = generateRk(4) . '-' . generateRk(4) . '-' . generateRk(4) . '-' . generateRk(4);

                    $reg = $account_logged;
                    $reg->setRLName($fullname);
                    $reg->setLocation($city);
                    $reg->setBirthDate($dateofbirth);
                    $reg->setGender($gender);
                    $reg->setKey($recoveryKey);
                    $reg->save();

                    if ($reg)
                        $main_content .= '
						<div class="TableContainer" >
							<table class="Table1" cellpadding="0" cellspacing="0" >
								<div class="CaptionContainer" >
									<div class="CaptionInnerContainer" > 
										<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>										
										<div class="Text" >Account Registered</div>
										<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
										<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									</div>
								</div>
								<tr>
									<td>
										<div class="InnerTableContainer" >
											<table style="width:100%;" >
												Thank you for registering your account! You can now recover your account if you have lost access to the assigned email address by using the following<br/>
												<br/>
												<font size="5">&nbsp;&nbsp;&nbsp;<b>Recovery Key: ' . $account_logged->getKey() . '</b></font><br/>
												<br/>
												<br/>
												<b>Important:</b>
												<ul>
													<li>Write down this recovery key carefully.</li>
													<li>Store it at a safe place! Do not save it on your computer!</li>
													<li>You will not receive an email containing this recovery key.</li>
													<li>If you lose your recovery key, you can request a new one for a small fee at the Lost Account Interface.</li>
												</ul>
											</table>
										</div>
									</table>
								</div>
							</td>
						</tr>
						<br/>
						<center>
							<table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=accountmanagement" method="post" >
									<tr>
										<td style="border:0px;" ><input type="hidden" name=action value=manage >
											<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</center>
						</div>';
                    else die();

                } else {
                    header("Location: ?subtopic=accountmanagement&action=manage");
                }
            }
        }}

    if ($action == "changecharacterinformation") {
        if (!isset($_REQUEST['step'])) {
            $characterName = trim(stripslashes($_REQUEST['name']));
            $playerComment = new Player();
            $playerComment->find($characterName);
            if ($playerComment->isLoaded()) {
                $playerName = $playerComment->getName();
                $playerAcc = new Account();
                $playerAcc->loadByName($_SESSION['account']);
                if ($playerComment->data['account_id'] == $playerAcc->data['id']) {
//        var_dump($playerComment->data['account_id'], $playerAcc->data['id']);


                    $main_content .= '
			Here you can see and edit the information about your character.<br/>
			If you do not want to specify a certain field, just leave it blank.<br/>
			<br/>
			<div class="TableContainer" >
				<table class="Table5" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>				
							<div class="Text" >Character Data</div>
							<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
						</div>
					</div>
					<tr>		
						<td>		
							<div class="InnerTableContainer" >
								<table style="width:100%;" >
									<tr>
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%" >
														<tr>
															<td class="LabelV" style="vertical-align:middle;" >Name:</td>
															<td style="width:80%;" >' . $playerName . '</td>
														</tr>
														<tr>
															<td class="LabelV" style="vertical-align:middle;" >Sex:</td>
															<td>' . htmlspecialchars((($playerComment->getSex() == 0) ? 'female' : 'male')) . '</td>
														</tr>
													</table>
												</div>
											</div>
											<div class="TableShadowContainer" >
												<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
													<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
													<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
												</div>
											</div>
										</td>
									</tr>
								</td>
							</tr>									
						</table>
					</div>
				</table>
			</div>
		</td>
	</tr>
	<br/>
	<br/>';
                    $main_content .= '
			<div class="TableContainer" >
				<table class="Table5" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
							<div class="Text" >Edit Character Information</div>
							<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
						</div>
					</div>
					<tr>
						<td>
							<div class="InnerTableContainer" >
							<table style="width:100%;" >
								<form action="?subtopic=accountmanagement&action=changecharacterinformation&step=change" method="post" >
									<tr>
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%" >
														<tr>
															<td class="LabelV" >Hide Account:</td>
															<td style="width:80%;" ><input type="checkbox" name="accountvisible" ' . (($playerComment->isHidden()) ? "checked=checked" : "") . '  value="1" />
																check to hide your account information</td>
														</tr>
														<tr>
															<td class="LabelV" ><span >Comment:</span></td>
															<td style="width:80%;" ><textarea name="comment" rows="10" cols="50" wrap="virtual" >' . $playerComment->getComment() . '</textarea></td>
														</tr>
														<tr>
															<td class="LabelV" style="white-space:normal;" ><span >Forum Signature:</span></td>
															<td style="width:80%;" ><textarea name="signature" rows="4" cols="50" wrap="virtual" >' . $playerComment->getSignature() . '</textarea></td>
														</tr>
													</table>
												</div>
											</div>
											<div class="TableShadowContainer" >
												<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
													<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
													<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td><table style="width:100%" >
											<tr align="center" >
												<td><table border="0" cellspacing="0" cellpadding="0" >
													<tr>
														<td style="border:0px;" ><input type="hidden" name=name value="' . htmlspecialchars($playerName) . '" >
															<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
																<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
																	<input class="ButtonText" type="image" name="Submit" alt="Submit" src="' . $layout_name . '/images/global/buttons/_sbutton_submit.gif" >
																</div>
															</div>
														</td>													
													<tr>
												</form>
											</table>		
										</td>
										<td><table border="0" cellspacing="0" cellpadding="0" >
												<form action="?subtopic=accountmanagement" method="post" >
													<tr>
														<td style="border:0px;" >
															<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
																<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
																	<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
																</div>
															</div></td>
														</tr>
													</form>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>
				</table>
			</div>
		</td>
	</tr>';
                } else {
                    $main_content .= '
               <center>
               Você não tem permissão para fazer isso.<br><br>               
               <table border="0" cellspacing="0" cellpadding="0">							
								<tbody>
								<tr>
									<td style="border:0px;">
										<div class="BigButton" style="background-image:url(./layouts/tibiacom/images/global/buttons/sbutton.gif)">
											<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
												<div class="BigButtonOver" style="background-image:url(./layouts/tibiacom/images/global/buttons/sbutton_over.gif);"></div>
												<a href="./?subtopic=accountmanagement">
												<input class="ButtonText" type="image" name="Back" alt="Back" src="./layouts/tibiacom/images/global/buttons/_sbutton_back.gif">
											    </a>
											</div>
										</div>
									</td>
								</tr>
							
						</tbody></table>
					</center>               
               ';
                }
            } else {
                $main_content .= '
               <center>
               Esse personagem não existe.<br><br>               
               <table border="0" cellspacing="0" cellpadding="0">							
								<tbody>
								<tr>
									<td style="border:0px;">
										<div class="BigButton" style="background-image:url(./layouts/tibiacom/images/global/buttons/sbutton.gif)">
											<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
												<div class="BigButtonOver" style="background-image:url(./layouts/tibiacom/images/global/buttons/sbutton_over.gif);"></div>
												<a href="./?subtopic=accountmanagement">
												<input class="ButtonText" type="image" name="Back" alt="Back" src="./layouts/tibiacom/images/global/buttons/_sbutton_back.gif">
											    </a>
											</div>
										</div>
									</td>
								</tr>
							
						</tbody></table>
					</center>               
               ';

            }
        }
        if ($_REQUEST['step'] == "change") {
            $characterName = trim(stripslashes($_POST['name']));
            $charChangeInfo = new Player();
            $charChangeInfo->find($characterName);
            if ($charChangeInfo->isLoaded()) {
                $comment = trim(stripslashes($_POST['comment']));
                $signature = trim(stripslashes($_POST['signature']));
                $hidden = (int)$_POST['accountvisible'];
                $charChangeInfo->setComment($comment);
                $charChangeInfo->setSignature($signature);
                $charChangeInfo->setHidden($hidden);
                $charChangeInfo->save();
                $main_content .= '
					<div class="TableContainer" >
						<table class="Table1" cellpadding="0" cellspacing="0" >
							<div class="CaptionContainer" >
								<div class="CaptionInnerContainer" > 
									<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>								
									<div class="Text" >Character Information Changed</div>
									<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
									<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								</div>
							</div>
							<tr>
								<td><div class="InnerTableContainer" >
										<table style="width:100%;" >
											<tr>
												<td>The character information has been changed.</td>
											</tr>
										</table>
									</div>
								</table>
							</div>
						</td>
					</tr>
					<br>
					<center>
						<table border="0" cellspacing="0" cellpadding="0" >
							<form action="?subtopic=accountmanagement" method="post" >
								<tr>
									<td style="border:0px;" >
										<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
											<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
												<div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
												<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
											</div>
										</div>
									</td>
								</tr>
							</form>
						</table>
					</center>';
            }
        }
    }

    if ($action == "changepassword") {
        if (!isset($_REQUEST['passwordchanged']) && $_REQUEST['passwordchanged'] != "done") {
            if (isset($_POST['step']) && $_POST['step'] == "change") {
                if (empty($_POST['newpassword']))
                    $newpassword_errors[] = "Please enter a new password!";
                elseif (empty($_POST['newpassword2']))
                    $new2password_errors[] = "Please enter the new password again!";
                elseif (empty($_POST['oldpassword']))
                    $oldpassword_errors[] = "Please enter your current password!";
                if ($_POST['newpassword'] != $_POST['newpassword2'])
                    $new2password_errors[] = "The new passwords do not match!";
                if (strlen($_POST['newpassword']) < 8 || strlen($_POST['newpassword']) > 30)
                    $newpassword_errors[] = "The new password must have at least 8 and less than 30 letters!";
                $newpassRed = 'class"red"';
                if (!preg_match('/[a-zA-Z]/', $_POST['newpassword'])) {
                    $newpassword_errors[] = 'The password must contain at least one letter A-Z or a-z!';
                    $newpassRed = 'class"red"';
                } elseif (!preg_match('/[0-9]/', $_POST['newpassword'])) {
                    $newpassword_errors[] = 'The password must contain at least one letter other than A-Z or a-z!';
                    $newpassRed = "class=red";
                }
                if (!empty($_POST['oldpassword']))
                    if (!$account_logged->isValidPassword($_POST['oldpassword']))
                        $oldpassword_errors[] = "Current password is not correct!";

                if (!empty($newpassword_errors) || !empty($new2password_errors) || !empty($oldpassword_errors)) {
                    $main_content .= '
						<div class="SmallBox" >
							<div class="MessageContainer" >
								<div class="BoxFrameHorizontal" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-horizontal.gif);" /></div>
								<div class="BoxFrameEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
								<div class="BoxFrameEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
								<div class="ErrorMessage" >
									<div class="BoxFrameVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></div>
									<div class="BoxFrameVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></div>
									<div class="AttentionSign" style="background-image:url(' . $layout_name . '/images/global/content/attentionsign.gif);" /></div>
									<b>The following errors have occurred:</b><br/>';
                    if (!empty($newpassword_errors))
                        foreach ($newpassword_errors as $newpassError)
                            $main_content .= $newpassError . '<br />';
                    if (!empty($new2password_errors))
                        foreach ($new2password_errors as $newpass2Error)
                            $main_content .= $newpass2Error . '<br />';
                    if (!empty($oldpassword_errors))
                        foreach ($oldpassword_errors as $oldpassError)
                            $main_content .= $oldpassError . '<br />';
                    $main_content .= '
								</div>
								<div class="BoxFrameHorizontal" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-horizontal.gif);" /></div>
								<div class="BoxFrameEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
								<div class="BoxFrameEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>
							</div>
						</div>
						<br/>';
                } else {
                    $account_logged->setPassword($_POST['newpassword']);
                    $account_logged->save();
                    header("Location: ?subtopic=accountmanagement&action=passowordchanged");
                }
            }
            $main_content .= 'Please enter your current password and a new password. Please verify your new password by entering it twice.<br/><br/>';

            $main_content .= '
				<form action="?subtopic=accountmanagement&action=changepassword" method="post" >
					<div class="TableContainer" >
						<table class="Table1" cellpadding="0" cellspacing="0" >
							<div class="CaptionContainer" >
								<div class="CaptionInnerContainer" > 
									<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>
									<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>								
									<div class="Text" >Change Password</div>
									<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
									<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								</div>
							</div>';
            $main_content .= '
							<tr>
								<td>
									<div class="InnerTableContainer" >
										<table style="width:100%;" >
											<tr>
												<td class="LabelV" ><span ' . ((!empty($newpassword_errors)) ? "class=red" : "") . '>New Password:</span></td>
												<td style="width:90%;" ><input type="password" name="newpassword" size="30" maxlength="29" ></td>
											</tr>
											<tr>
												<td class="LabelV" ><span ' . ((!empty($new2password_errors)) ? "class=red" : "") . '>New Password Again:</span></td>
												<td><input type="password" name="newpassword2" size="30" maxlength="29" ></td>
											</tr>
											<tr>
												<td class="LabelV" ><span ' . ((!empty($oldpassword_errors)) ? "class=red" : "") . '>Current Password:</span></td>
												<td><input type="password" name="oldpassword" size="30" maxlength="29" ></td>
											</tr>
										</table>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<br/>
					<table style="width:100%;" >
					<tr align="center">
						<td>
							<table border="0" cellspacing="0" cellpadding="0" >
								<tr>
									<td style="border:0px;" >
										<input type="hidden" name="step" value="change" >
										<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
											<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
												<input class="ButtonText" type="image" name="Submit" alt="Submit" src="' . $layout_name . '/images/global/buttons/_sbutton_submit.gif" >
											</div>

										</div>
									</td>						
								<tr>
							</form>
						</table>
					</td>
				<td>
					<table border="0" cellspacing="0" cellpadding="0" >
						<form action="?subtopic=accountmanagement&action=manage" method="post" >
							<tr>
								<td style="border:0px;" >
									<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
										<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
											<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
										</div>
									</div>
								</td>
							</tr>
						</form>
					</table>
				</td>
			</tr>
		</table>';
        } else
            $main_content .= '
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > <span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>								
								<div class="Text" >Password Changed</div>
								<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>Your password has been changed.</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
				</div>
				<center>
					<table border="0" cellspacing="0" cellpadding="0" >
						<form action="https://secure.tibia.com/account/?subtopic=accountmanagement" method="post" >
							<tr>
								<td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
										<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
											<div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
											<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
										</div>
									</div>
								</td>
							</tr>
						</form>
					</table>
				</center>';
    }

    if ($action == "passowordchanged"){
        $main_content .= '
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > <span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>								
								<div class="Text" >Password Changed</div>
								<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>Your password has been changed.</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
				</div>
				<br />
				<center>
					<table border="0" cellspacing="0" cellpadding="0" >
						<form action="?subtopic=accountmanagement&action=manage" method="post" >
							<tr>
								<td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
										<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
											<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
										</div>
									</div>
								</td>
							</tr>
						</form>
					</table>
				</center>';}

    if ($action == "paymentshistory") {

        $account_name = $account_logged->getName();
        $get_payments = $SQL->query("SELECT * FROM `z_shop_donates` WHERE `account_name` = '$account_name' ORDER BY `date` DESC")->fetchAll();

        $main_content .= '
			<div class="TableContainer" >
				<table class="Table2" cellpadding="0" cellspacing="0">
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
							<div class="Text" >Payment History</div>
							<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
						</div>
					</div>
					<tr>
						<td><div class="InnerTableContainer" >
								<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
									<tr class="LabelH" >
										<td>Date</td>
										<td>Method</td>
										<td>Price</td>
										<td>Status</td>
										<td>Action</td>
									</tr>';
        if (count($get_payments) > 0) {
            foreach ($get_payments as $payments) {
                $main_content .= '
											<tr bgcolor="' . $config['site']['darkborder'] . '">
												<td>' . date("M d Y, H:i:s", $payments['date']) . '</td>
												<td>' . $payments['method'] . '</td>
												<td>R$ ' . $payments['price'] . '</td>
												<td>' . $payments['status'] . '</td>
												<td>' . (($payments['status'] == "confirm") ? '[<a style="white-space: nowrap" href="?subtopic=accountmanagement&action=confirmdonate&orderID=' . $payments['id'] . '" >Confirm</a>]<br/>' : '') . '</td>';
                $main_content .= '
											</tr>';
            }

        } else {
            $main_content .= '
										<tr bgcolor="#F1E0C6" >
											<td colspan="6" >No entries yet.</td>
										</tr>';
        }
        $main_content .= '
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<table style="width:100%;" >
				<tr align="center" >
					<td>
						<form action="?subtopic=accountmanagement&action=manage" method="post" style="padding:0px;margin:0px;" >
							<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
								<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
									<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
								</div>
							</div>
						</form>
					</td>
				</tr>
			</table>';
    }
    if ($action == "confirmtransfer") {
        $orderID = (int)$_REQUEST['orderID'];
        $transConfirm = $SQL->query("SELECT * FROM `z_shop_payment` WHERE `id` = '$orderID'")->fetch();
        if ($transConfirm['status'] != "confirm")
            $confirmErrors[] = "You do not have transfer to be confirmed.";
        if (!empty($confirmErrors)) {
            $main_content .= '
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
								<div class="Text" >Services Page Errors</div>
								<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>';
            foreach ($confirmErrors as $error)
                $main_content .= $error . '<br>';
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
								<form action="?subtopic=accountmanagement&action=manage" method="post">
									<tr>
										<td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
											<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
												<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</TD>
					</TR>
				</TABLE>';
        } else {//CONFIRMAR TRANSFER
            $confirmmsg = trim($_REQUEST['confirmmsg']);
            if (empty($confirmmsg))
                $confirm_errors[] = "Please enter the data of your bank transfer so that we can confirm.";

            if ($_REQUEST['confirm'] == "yes") {
                if (!empty($confirm_errors)) {
                    $main_content .= '
						<div class="TableContainer" >
							<table class="Table1" cellpadding="0" cellspacing="0" >
								<div class="CaptionContainer" >
									<div class="CaptionInnerContainer" > 
										<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
										<div class="Text" >Confirmation Errors</div>
										<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
										<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									</div>
								</div>
								<tr>
									<td>
										<div class="InnerTableContainer" >
											<table style="width:100%;" >
												<tr>
													<td>';
                    foreach ($confirm_errors as $error)
                        $main_content .= $error . '<br>';
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
										<form action="?subtopic=accountmanagement&action=confirmtransfer" method="post">
											<input type="hidden" name="orderID" value="' . $_REQUEST['orderID'] . '">
											<tr>
												<td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
													<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
														<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
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
                    $accountName = $account_logged->getName();
                    $orderId = $_REQUEST['orderID'];
                    $update_order = $SQL->query("UPDATE `z_shop_payment` SET `status` = 'confirmed' WHERE `account_name` = '$accountName' AND `id` = '$orderId'");
                    $add_confirmation = $SQL->query("INSERT INTO `z_shop_payment_confirm` (`account_name`,`order_id`,`confirm_msg`,`date`) VALUES ('$accountName','$orderId','$confirmmsg','" . time() . "')");
                    $main_content .= '
						<div class="TableContainer" >
							<table class="Table1" cellpadding="0" cellspacing="0" >
								<div class="CaptionContainer" >
									<div class="CaptionInnerContainer" > 
										<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
										<div class="Text" >Confirmation Success</div>
										<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
										<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									</div>
								</div>
								<tr>
									<td>
										<div class="InnerTableContainer" >
											<table style="width:100%;" >
												<tr>
													<td>Your donation has been successfully confirmed. In 24 hours your points will be credited </td>
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
										<form action="?subtopic=accountmanagement&action=manage" method="post">
											<tr>
												<td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
													<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
														<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
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
                $getOrder = $SQL->query("SELECT * FROM `z_shop_offer` WHERE `id` = '" . $transConfirm['service_id'] . "'")->fetch();
                $main_content .= '
							<form method="post" action="?subtopic=accountmanagement&action=confirmtransfer">
							<div class="TableContainer">
								<div class="CaptionContainer">
									<div class="CaptionInnerContainer"> 
										<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span> 
										<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span> 
										<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"></span> 
										<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span>
										<div class="Text">Confirm your transfer</div>
										<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span> 
										<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"></span> 
										<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span> 
										<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span> 
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
																	<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
																</div>
																<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
																	<div class="TableContentContainer" >';

                $main_content .= '
																		<table class="TableContent" width="100%">
																			<tr style="background-color:#D4C0A1;" >
																				<td class="LabelV">Confirm your transfer with transfer data:</td>
																				<td style="width:90%;" ><textarea name="confirmmsg" cols="50" rows="8"></textarea></td>
																			</tr>
																			<tr style="background-color:#F1E0C6;" >
																				<td class="LabelV">Product Info</td>
																				<td>' . $getOrder['offer_name'] . ', price: R$ ' . $getOrder['price'] . '</td>
																			</tr>																
																		</table>
																	</div>
																</div>
																<div class="TableShadowContainer" >
																	<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
																		<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
																		<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
																	</div>
																</div>
															</td>
														</tr>
														<tr>
															<td>After confirmed your donation our team will be up to 24 hours to credit your premium points.</td>
														</tr>
													</table>
												</div>
											</td>
										</tr>							
									</tbody>
								</table>
							</div>
							<div class="SubmitButtonRow" >
								<div class="LeftButton" >
										<input type="hidden" name="confirm" value="yes">
										<input type="hidden" name="accountID" value="' . $account_logged->getID() . '">
										<input type="hidden" name="orderID" value="' . $orderID . '">
										<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_green.gif)" >
											<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_green_over.gif);" ></div>
												<input class="ButtonText" type="image" name="Next" alt="Next" src="' . $layout_name . '/images/global/buttons/_sbutton_next.gif" >
											</div>
										</div>
									</form>
								</div>
								<div class="RightButton" >
									<form action="?subtopic=accountmanagement&action=manage" method="post" style="padding:0px;margin:0px;" >
										<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
											<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
												<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
											</div>
										</div>
									</form>
								</div>
							</div>';
            }
        }
    }

    if ($action == "donateshistory") {
        $main_content .= '
						<div class="TableContainer" >
							<table class="Table5" cellpadding="0" cellspacing="0">
							<div class="CaptionContainer" >
								<div class="CaptionInnerContainer" > 
									<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span> 
									<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span> 
									<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
									<div class="Text" >Donates History</div>
									<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span> 
									<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
									<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span> 
									<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span> 
								</div>
							</div>
							<tr>
								<td>
									<div class="InnerTableContainer">
										<table style="width:100%;" >
											<tr>
												<td>
													<div class="TableShadowContainerRightTop" >
														<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
													</div>
													<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
														<div class="TableContentContainer" >
															<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;">
																<tr bgcolor="' . $config['site']['darkborder'] . '">';
        $getHistoryDonate = $SQL->query("SELECT * FROM `z_shop_donates` WHERE `account_name` = '" . $account_logged->getName() . "' ORDER BY `date` DESC")->fetchAll();
        $main_content .= '
																	<td class="LabelV">Date</td>
																	<td class="LabelV">Service</td>
																	<td class="LabelV">Price</td>
																	<td class="LabelV">Method</td>
																	<td class="LabelV">Bank Name</td>
																	<td class="LabelV">Status</td>
																	<td class="LabelV"></td>
																</tr>';
        if ($getHistoryDonate[0] > 0) {
            $n = 0;
            foreach ($getHistoryDonate as $doHistory) {
                $bgcolor = (($n++ % 2 == 1) ? $config['site']['darkborder'] : $config['site']['lightborder']);
                $main_content .= '
																<tr bgcolor="' . $bgcolor . '">
																	<td>' . date("M d Y", $doHistory['date']) . '</td>
																	<td>' . $doHistory['premium_points'] . ' Premium Points</td>
																	<td>' . $doHistory['price'] . ' BRL</td>
																	<td>' . $doHistory['method'] . '</td>';
                $bankref = explode("-", $doHistory['reference']);
                $bankName = $bankref[1];
                $main_content .= '<td>' . $bankName . '</td>';
                $main_content .= '
																	<td>' . $doHistory['status'] . '</td>
																	<td>' . (($doHistory['status'] == "confirm") ? '[<a href="?subtopic=accountmanagement&action=confirmdonate&id=' . $doHistory['id'] . '">Confirm</a>]' : '') . '</td>
																</tr>';
            }
        }
        $main_content .= '						
															</table>
														</div>
													</div>											
													<div class="TableShadowContainer" >
														<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
															<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
															<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
														</div>
													</div>
												</td>
											</tr>';
        $main_content .= '
										</table>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<TABLE BORDER=0 WIDTH=100%>
						<TR>
							<TD ALIGN=center>
								<table border="0" cellspacing="0" cellpadding="0" >
									<form action="?subtopic=accountmanagement&action=manage" method="post">
										<tr>
											<td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
													<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
														<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
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

    if ($action == "confirmdonate") {
        $donateID = (int)$_REQUEST['id'];
        $getDonate = $SQL->query("SELECT * FROM `z_shop_donates` WHERE `id` = '$donateID'")->fetchAll();

        if ($getDonate[0] == 0) {
            $main_content .= '
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
								<div class="Text" >Send Points Errors</div>
								<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>Sorry, but you do not currently have any pending donation confirmation.</td>
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
								<form action="?subtopic=accountmanagement&action=manage" method="post">
									<tr>
										<td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
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

            if ($_REQUEST['confirmed'] == "yes") {

                $donateID = (int)$_REQUEST['id'];
                $confirmText = trim($_REQUEST['confirMsg']);
                $donateDate = time();
                $donateAccount = $account_logged->getName();

                if (strlen($confirmText) <= 20)
                    $confirm_errors[] = "Your confirmation must have at least 20 characters .";
                if (!empty($confirm_errors)) {
                    $main_content .= '
						<div class="TableContainer" >
							<table class="Table1" cellpadding="0" cellspacing="0" >
								<div class="CaptionContainer" >
									<div class="CaptionInnerContainer" > 
										<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>							
										<div class="Text" >Confirmation Errors</div>
										<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
										<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
									</div>
								</div>
								<tr>
									<td>
										<div class="InnerTableContainer" >
											<table style="width:100%;" >
												<tr>
													<td>';
                    foreach ($confirm_errors as $c_error)
                        $main_content .= $c_error . '<br>';
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
										<form action="?subtopic=accountmanagement&action=confirmdonate" method="post">
											<input type="hidden" name="id" value="' . $donateID . '">
											<tr>
												<td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
														<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
															<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
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
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $hash = md5(implode($_POST));
                        if (isset($_SESSION['hash']) && $_SESSION['hash'] == $hash) {
                            // Refresh! Não faz nada ou re-exibe o formulário preenchido
                        } else {
                            $_SESSION['hash'] = $request;
                            $update_donate_status = $SQL->query("UPDATE `z_shop_donates` SET `status` = 'confirmed' WHERE `id` = '$donateID' AND `account_name` = '$donateAccount'");
                            $add_confirmation = $SQL->query("INSERT INTO `z_shop_donate_confirm` (`date`,`account_name`,`donate_id`,`msg`) VALUES ('$donateDate','$donateAccount','$donateID','$confirmText')");
                        }
                    }
                    $main_content .= '
							<div class="TableContainer">
								<div class="CaptionContainer">
									<div class="CaptionInnerContainer"> 
										<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span> 
										<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span> 
										<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"></span> 
										<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span>
										<div class="Text">Donation confirmed</div>
										<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span> 
										<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"></span> 
										<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span> 
										<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span> 
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
																	<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
																</div>
																<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
																	<div class="TableContentContainer" >
																		<table class="TableContent" width="100%">
																			<tr>
																				<td>You just confirmed a donation made to our server. Within 24 hours we will be checking your confirmation, then crediting your points. Thank you very much!</td>
																			</tr>';
                    $main_content .= '
																		</table>
																	</div>
																</div>
																<div class="TableShadowContainer" >
																	<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
																		<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
																		<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
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
							<TABLE BORDER=0 WIDTH=100%>
								<TR>
									<TD ALIGN=center>
										<table border="0" cellspacing="0" cellpadding="0" >
											<form action="?subtopic=accountmanagement&action=manage" method="post">
												<tr>
													<td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
															<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
																<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
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
				<form method="post" action="?subtopic=accountmanagement&action=confirmdonate">
				<div class="TableContainer">
					<div class="CaptionContainer">
						<div class="CaptionInnerContainer"> 
							<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span>
							<div class="Text">Confirm your donate</div>
							<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span> 
							<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span> 
							<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span> 
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
														<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
													</div>
													<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
														<div class="TableContentContainer" >
															<table class="TableContent" width="100%">
																<tr bgcolor="#D4C0A1">
																	<td>
																		<strong>Confirm your donate using textbox</strong><br>
																		<small>(Tell all the data needed for confirmation, such as: Bank, the transaction date, etc.)</small>
																	</td>
																	<td>
																		<textarea name="confirMsg" rows="10" cols="55"></textarea>
																	</td>
																</tr>';

                $main_content .= '
															</table>
														</div>
													</div>
													<div class="TableShadowContainer" >
														<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);" >
															<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);" ></div>
															<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);" ></div>
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

                $main_content .= '
				<div class="SubmitButtonRow" >
					<div class="LeftButton" >
						<input type="hidden" name="confirmed" value="yes" >
						<input type="hidden" name="id" value="' . $donateID . '">
						<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_green.gif)" >
							<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_green_over.gif);" ></div>
								<input class="ButtonText" type="image" name="Next" alt="Next" src="' . $layout_name . '/images/global/buttons/_sbutton_next.gif" >
							</div>
						</div>
					</div>
					</form>
					<div class="RightButton" >
						<form method="post" action="?subtopic=accountmanagement&action=manage" >
							<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" >
								<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div>
									<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" >
								</div>
							</div>
						</form>
					</div>
				</div>';
            }
        }
    }

    if ($action == "services"){
        include 'accountmanagement/shop.php';
    }
    //## CREATE CHARACTER on account ###
    if ($action == "createcharacter") {
        $main_content .= '
                <script type="text/javascript">
                            var nameHttp;
                            function checkName()
                            {
                                    if(document.getElementById("newcharname").value=="")
                                    {
                                        document.getElementById("name_check").innerHTML = \'<b><font color="red">Please enter new character name.</font></b>\';
                                        return;
                                    }
                                    nameHttp=GetXmlHttpObject();
                                    if (nameHttp==null)
                                    {
                                        return;
                                    }
                                    var newcharname = document.getElementById("newcharname").value;
                                    var url="?subtopic=ajax_check_name&name=" + newcharname + "&uid="+Math.random();
                                    nameHttp.onreadystatechange=NameStateChanged;
                                    nameHttp.open("GET",url,true);
                                    nameHttp.send(null);
                            }
                
                            function NameStateChanged() 
                            { 
                                    if (nameHttp.readyState==4)
                                    { 
                                        document.getElementById("name_check").innerHTML=nameHttp.responseText;
                                    }
                            }
                </script>
                ';
        $newchar_name = ucwords(strtolower(trim($_POST['newcharname'])));
        $newchar_sex = $_POST['newcharsex'];
        $newchar_vocation = $_POST['newcharvocation'];
        $newchar_town = $_POST['newchartown'];
        if ($_POST['savecharacter'] != 1) {
            $main_content .= 'Please choose a name';
            if (count($config['site']['newchar_vocations']) > 1)
                $main_content .= ', vocation';
            $main_content .= ' and sex for your character. <br/>In any case the name must not violate the naming conventions stated in the <a href="?subtopic=tibiarules" target="_blank" >' . htmlspecialchars($config['server']['serverName']) . ' Rules</a>, or your character might get deleted or name locked.';
            if ($account_logged->getPlayersList()->count() >= $config['site']['max_players_per_account'])
                $main_content .= '<b><font color="red"> You have maximum number of characters per account on your account. Delete one before you make new.</font></b>';
            $main_content .= '<br/><br/>
<form action="?subtopic=accountmanagement&action=createcharacter" method="post" >
<input type="hidden" name=savecharacter value="1" >
<div class="TableContainer" >  
<table class="Table3" cellpadding="0" cellspacing="0" >
    <div class="CaptionContainer" >
          <div class="CaptionInnerContainer" >
          <span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" />
          </span>
          <span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" />
          </span>
          <span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" >
          
</span><span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" />
</span><div class="Text" >Create Character</div>
        <span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" />
        </span>
        <span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" >        
</span>
<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" />
</span>
<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" />
</span>
</div>    
</div>
<tr>      
<td>        
<div class="InnerTableContainer" >          
<table style="width:100%;" >
<tr>
<td>
<div class="TableShadowContainerRightTop" >  
<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" >
</div>
</div>
<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" > 
 <div class="TableContentContainer" >
 <table class="TableContent" width="100%" >
 <tr class="LabelH" >
 <td style="width:50%;" >
 <span id="charactername_label"' . (isset($e['acc']) ? ' class="red"' : '') . '>Name</td>
 <td><span >Sex</td>
 </tr><tr class="Odd" >
 <td>
 <!--
 <input id="newcharname" name="newcharname" onkeyup="checkName();" value="' . htmlspecialchars($newchar_name) . '" size="30" maxlength="29" >
 <tr>
    <td class="LabelV150" >
		<span id="accountname_label"' . (isset($e['acc']) ? ' class="red"' : '') . ' >Account Name:</span>
	</td>
    <td>
        <div id="accountname_indicator" class="InputIndicator" style="background-image:url(' . $layout_name . '/images/global/general/' . ($_POST['step'] != 'docreate' || isset($e['acc']) ? 'n' : '') . 'ok.gif);" ></div>
    </td>
</tr>
<tr>
    <td></td>
    <td><span id="accountname_errormessage" class="FormFieldError">' . (isset($e['acc']) ? $e['acc'] : '') . '</span></td>
</tr>
-->
 <input id="newcharname" name="newcharname" class="CipAjaxInput" style="width:206px;float:left;" value="' . (isset($_POST['newcharname']) ? htmlspecialchars(substr($_POST['newcharname'], 0, 50)) : '') . '" size="30" maxlength="50" onBlur="SendAjaxCip({DataType: \'Container\'}, {Href: \'./ajax_character.php\',PostData: \'a_CharacterName=\'+encodeURIComponent(getElementById(\'newcharname\').value),Method: \'POST\'});" />
 <div id="charactername_indicator" class="InputIndicator" style="background-image:url(' . $layout_name . '/images/global/general/' . ($_POST['step'] != 'docreate' || isset($e['acc']) ? 'n' : '') . 'ok.gif);" ></div>
 <br>
 <span id="charactername_errormessage" class="FormFieldError">' . (isset($e['acc']) ? $e['acc'] : '') . '</span>
 <BR>
 <font size="1" face="verdana,arial,helvetica">
<!--<div id="name_check">Please enter your character name.</div>-->
 </font>
 </td>
 <td>';
            $main_content .= '<input type="radio" name="newcharsex" value="1" ';
            if ($newchar_sex == 1)
                $main_content .= 'checked="checked" ';
            $main_content .= '>male<br/>';
            $main_content .= '<input type="radio" name="newcharsex" value="0" ';
            if ($newchar_sex == "0")
                $main_content .= 'checked="checked" ';
            $main_content .= '>female<br/></td></tr></table></div></div></table></div>';
            if (count($config['site']['newchar_towns']) > 1 || count($config['site']['newchar_vocations']) > 1)
                $main_content .= '<div class="InnerTableContainer" >          <table style="width:100%;" ><tr>';
            if (count($config['site']['newchar_vocations']) > 1) {
                $main_content .= '<td><table class="TableContent" width="100%" ><tr class="Odd" valign="top"><td width="160"><br /><b>Select your vocation:</b></td><td><table class="TableContent" width="100%" >';
                foreach ($config['site']['newchar_vocations'] as $char_vocation_key => $sample_char) {
                    $main_content .= '<tr><td><input type="radio" name="newcharvocation" value="' . $char_vocation_key . '" ';
                    if ($newchar_vocation == $char_vocation_key)
                        $main_content .= 'checked="checked" ';
                    $main_content .= '>' . htmlspecialchars($vocation_name[$char_vocation_key]) . '</td></tr>';
                }
                $main_content .= '</table></table></td>';
            }
            if (count($config['site']['newchar_towns']) > 1) {
                $main_content .= '<td><table class="TableContent" width="100%" ><tr class="Odd" valign="top"><td width="160"><br /><b>Select your city:</b></td><td><table class="TableContent" width="100%" >';
                foreach ($config['site']['newchar_towns'] as $town_id) {
                    $main_content .= '<tr><td><input type="radio" name="newchartown" value="' . $town_id . '" ';
                    if ($newchar_town == $town_id)
                        $main_content .= 'checked="checked" ';
                    $main_content .= '>' . htmlspecialchars($towns_list[$town_id]) . '</td></tr>';
                }
                $main_content .= '</table></table></td>';
            }
            if (count($config['site']['newchar_towns']) > 1 || count($config['site']['newchar_vocations']) > 1)
                $main_content .= '</tr></table></div>';
            $main_content .= '</table></div></td></tr><br/><table style="width:100%;" ><tr align="center" ><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="' . $layout_name . '/images/global/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
        } else {
            if (empty(strlen($newchar_name) >= 5))
                $newchar_errors[] = 'Please enter a name for your character with 5 letters or more.';
            if (empty($newchar_sex) && $newchar_sex != "0")
                $newchar_errors[] = 'Please select the sex for your character!';
            if (count($config['site']['newchar_vocations']) > 1) {
                if (empty($newchar_vocation))
                    $newchar_errors[] = 'Please select a vocation for your character.';
            } else
                $newchar_vocation = $config['site']['newchar_vocations'][0];
            if (count($config['site']['newchar_towns']) > 1) {
                if (empty($newchar_town))
                    $newchar_errors[] = 'Please select a town for your character.';
            } else
                $newchar_town = $config['site']['newchar_towns'][0];
            if (empty($newchar_errors)) {
                if (!check_name_new_char($newchar_name))
                    $newchar_errors[] = 'This name contains invalid letters, words or format. Please use only a-Z, - , \' and space.<br> Remember not to use more than 3 letters repeated together.';
                if(preg_match('/[^a-zA-Z ]/', $newchar_name))
                    $newchar_errors[] = 'This name contains invalid letters, words or format. Please use only a-Z, - , \' and space.<br> Remember not to use more than 3 letters repeated together.';
                if ($newchar_sex != 1 && $newchar_sex != "0")
                    $newchar_errors[] = 'Sex must be equal <b>0 (female)</b> or <b>1 (male)</b>.';
                if (count($config['site']['newchar_vocations']) > 1) {
                    $newchar_vocation_check = FALSE;
                    foreach ($config['site']['newchar_vocations'] as $char_vocation_key => $sample_char)
                        if ($newchar_vocation == $char_vocation_key)
                            $newchar_vocation_check = TRUE;
                    if (!$newchar_vocation_check)
                        $newchar_errors[] = 'Unknown vocation. Please fill in form again.';
                } else
                    $newchar_vocation = 0;
            }
            if (empty($newchar_errors)) {
                $check_name_in_database = new Player();
                $check_name_in_database->find($newchar_name);
                if ($check_name_in_database->isLoaded())
                    $newchar_errors[] .= 'This name is already used. Please choose another name!';
                $number_of_players_on_account = $account_logged->getPlayersList()->count();
                if ($number_of_players_on_account >= $config['site']['max_players_per_account'])
                    $newchar_errors[] .= 'You have too many characters on your account <b>(' . $number_of_players_on_account . '/' . $config['site']['max_players_per_account'] . ')</b>!';
            }
            if (empty($newchar_errors)) {
                $char_to_copy_name = $config['site']['newchar_vocations'][$newchar_vocation];
                $char_to_copy = new Player();
                $char_to_copy->find($char_to_copy_name);
                if (!$char_to_copy->isLoaded())
                    $newchar_errors[] .= 'Wrong characters configuration. Try again or contact with admin. ADMIN: Edit file config/config.php and set valid characters to copy names. Character to copy <b>' . htmlspecialchars($char_to_copy_name) . '</b> doesn\'t exist.';
            }
            if (empty($newchar_errors)) {
                // load items and skills of player before we change ID
                $char_to_copy->getItems()->load();
                $char_to_copy->loadStorages();
                if ($newchar_sex == "0")
                    $char_to_copy->setLookType(136);
                    $char_to_copy->setID(null); // save as new character
                    $char_to_copy->setLastIP(0);
                    $char_to_copy->setHidden(0);
                    $char_to_copy->setLastLogin(0);
                    $char_to_copy->setLastLogout(0);
                    $char_to_copy->setName($newchar_name);
                    $char_to_copy->setAccount($account_logged);
                    $char_to_copy->setSex($newchar_sex);
                    $char_to_copy->setPosX(0);
                    $char_to_copy->setPosY(0);
                    $char_to_copy->setPosZ(0);
                    $char_to_copy->setBalance(0);
                    $char_to_copy->setCreateIP(Visitor::getIP());
                    $char_to_copy->setCreateDate(time());
                    $char_to_copy->setSave(); // make character saveable
                    $char_to_copy->save(); // now it will load 'id' of new player
                if ($char_to_copy->isLoaded()) {
                    $char_to_copy->saveItems();
                    foreach ($char_to_copy->storages as $key=>$value){
                        $SQL->query("INSERT INTO `player_storage` (`player_id`, `key`, `value`) VALUES (".$char_to_copy->data['id'].", ".$key.", ".$value.")");
                    }
                    $main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Character Created</div>        <span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>The character <b>' . htmlspecialchars($newchar_name) . '</b> has been created.<br/>Please select the outfit when you log in for the first time.<br/><br/><b>See you on ' . $config['server']['serverName'] . '!</b></td></tr>          </table>        </div>  </table></div></td></tr><br/><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
                } else {
                    echo "Error. Can\'t create character. Probably problem with database. Try again or contact with admin.";
                    exit;
                }
            } else {
                $main_content .= '
                        <script>
                        window.onload = function() {
                          SendAjaxCip({DataType: \'Container\'}, {Href: \'./ajax_character.php\',PostData: \'a_CharacterName=\'+encodeURIComponent(document.getElementById(\'newcharname\').value),Method: \'POST\'});
                        }
                        </script>
<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url(' . $layout_name . '/images/global/content/attentionsign.gif);" /></div><b>The Following Errors Have Occurred:</b><br/>';
                foreach ($newchar_errors as $newchar_error)
                    $main_content .= '<li>' . $newchar_error;
                $main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>  </div></div><br/>';
                $main_content .= 'Please choose a name';
                if (count($config['site']['newchar_vocations']) > 1)
                    $main_content .= ', vocation';
                $main_content .= ' and sex for your character. 
                                    <br/>In any case the name must not violate the naming conventions stated in the 
                                    <a href="?subtopic=tibiarules" target="_blank" >' . $config['server']['serverName'] . ' Rules</a>
                                    , or your character might get deleted or name locked.<br/>
                                    <br/>
                                    <form action="?subtopic=accountmanagement&action=createcharacter" method="post" >
                                    <input type="hidden" name=savecharacter value="1" >
                                    <div class="TableContainer" >
                                      <table class="Table3" cellpadding="0" cellspacing="0" >
                                          <div class="CaptionContainer" >
                                                <div class="CaptionInnerContainer" >
                                                <span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
                                                <span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
                                                <span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>
                                                <span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
                                                <div class="Text" >Create Character</div>
                                                        <span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
                                                        <span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>
                                                        <span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
                                                        <span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
                                                </div>
                                          </div>                                                            
                                          <tr><td><div class="InnerTableContainer" >
                                          <table style="width:100%;" >
                                            <tr>
                                            <td>
                                            <div class="TableShadowContainerRightTop" >
                                              <div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);" ></div>
                                             </div>
                                              <div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);" >
                                                <div class="TableContentContainer" >
                                                <table class="TableContent" width="100%" >
                                                <tr class="LabelH" >
                                                <td style="width:50%;" ><span >Name</td>
                                                <td><span >Sex</td>
                                                </tr>
                                                <tr class="Odd" ><td>
                                                <!--<input id="newcharname" name="newcharname" onkeyup="checkName();" size="30" maxlength="29" >-->
                                                <input id="newcharname" name="newcharname" class="CipAjaxInput" style="width:206px;float:left;" value="' . $newchar_name . '" size="30" maxlength="50" onblur="SendAjaxCip({DataType: \'Container\'}, {Href: \'./ajax_character.php\',PostData: \'a_CharacterName=\'+encodeURIComponent(getElementById(\'newcharname\').value),Method: \'POST\'});">
                                                <div id="charactername_indicator" class="InputIndicator" style="background-image:url(account/nok.gif)"></div>
                                                <BR>
                                                <font size="1" face="verdana,arial,helvetica">
                                                <span id="charactername_errormessage" class="FormFieldError">Please enter your character name.</span>
                                                </font>
                                                </td>
                                                <td>';
                $main_content .= '<input type="radio" name="newcharsex" value="1" ';
                if ($newchar_sex == 1)
                    $main_content .= 'checked="checked" ';
                $main_content .= '>male<br/>';
                $main_content .= '<input type="radio" name="newcharsex" value="0" ';
                if ($newchar_sex == "0")
                    $main_content .= 'checked="checked" ';
                $main_content .= '>female<br/></td></tr></table></div></div></table></div>';
                if (count($config['site']['newchar_towns']) > 1 || count($config['site']['newchar_vocations']) > 1)
                    $main_content .= '<div class="InnerTableContainer" >          <table style="width:100%;" ><tr>';
                if (count($config['site']['newchar_vocations']) > 1) {
                    $main_content .= '<td><table class="TableContent" width="100%" ><tr class="Odd" valign="top"><td width="160"><br /><b>Select your vocation:</b></td><td><table class="TableContent" width="100%" >';
                    foreach ($config['site']['newchar_vocations'] as $char_vocation_key => $sample_char) {
                        $main_content .= '<tr><td><input type="radio" name="newcharvocation" value="' . htmlspecialchars($char_vocation_key) . '" ';
                        if ($newchar_vocation == $char_vocation_key)
                            $main_content .= 'checked="checked" ';
                        $main_content .= '>' . htmlspecialchars($vocation_name[0][$char_vocation_key]) . '</td></tr>';
                    }
                    $main_content .= '</table></table></td>';
                }
                if (count($config['site']['newchar_towns']) > 1) {
                    $main_content .= '<td><table class="TableContent" width="100%" ><tr class="Odd" valign="top"><td width="160"><br /><b>Select your city:</b></td><td><table class="TableContent" width="100%" >';
                    foreach ($config['site']['newchar_towns'] as $town_id) {
                        $main_content .= '<tr><td><input type="radio" name="newchartown" value="' . htmlspecialchars($town_id) . '" ';
                        if ($newchar_town == $town_id)
                            $main_content .= 'checked="checked" ';
                        $main_content .= '>' . htmlspecialchars($towns_list[$town_id]) . '</td></tr>';
                    }
                    $main_content .= '</table></table></td>';
                }
                if (count($config['site']['newchar_towns']) > 1 || count($config['site']['newchar_vocations']) > 1)
                    $main_content .= '</tr></table></div>';
                $main_content .= '</table></div></td></tr><br/><table style="width:100%;" ><tr align="center" ><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="' . $layout_name . '/images/global/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
            }
        }
    }
    //############# CHANGE E-MAIL ###################
    if ($action == "changeemail") {
        $account_email_new_time = $account_logged->getCustomField("email_new_time");
        if ($account_email_new_time > 10) {
            $account_email_new = $account_logged->getCustomField("email_new");
        }
        if ($account_email_new_time < 10) {
            if ($_POST['changeemailsave'] == 1) {
                $account_email_new = trim($_POST['new_email']);
                $post_password = trim($_POST['password']);
                if (empty($account_email_new)) {
                    $change_email_errors[] = "Please enter your new email address.";
                } else {
                    if (!check_mail($account_email_new)) {
                        $change_email_errors[] = "E-mail address is not correct.";
                    }
                }
                if (empty($post_password)) {
                    $change_email_errors[] = "Please enter password to your account.";
                } else {
                    if (!$account_logged->isValidPassword($post_password)) {
                        $change_email_errors[] = "Wrong password to account.";
                    }
                }
                if (empty($change_email_errors)) {
                    $account_email_new_time = time() + $config['site']['email_days_to_change'] * 24 * 3600;
                    $account_logged->set("email_new", $account_email_new);
                    $account_logged->set("email_new_time", $account_email_new_time);
                    $account_logged->save();
                    $main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        <div class="Text" >New Email Address Requested</div>        <span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>You have requested to change your email address to <b>' . htmlspecialchars($account_email_new) . '</b>. The actual change will take place after <b>' . date("j F Y, G:i:s", $account_email_new_time) . '</b>, during which you can cancel the request at any time.</td></tr>          </table>        </div>  </table></div></td></tr><br/><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
                } else {
                    //show errors
                    $main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url(' . $layout_name . '/images/global/content/attentionsign.gif);" /></div><b>The Following Errors Have Occurred:</b><br/>';
                    foreach ($change_email_errors as $change_email_error) {
                        $main_content .= '<li>' . $change_email_error . '</li>';
                    }
                    $main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></div>  </div></div><br/>';
                    //show form
                    $main_content .= 'Please enter your password and the new email address. Make sure that you enter a valid email address which you have access to. <b>For security reasons, the actual change will be finalised after a waiting period of ' . $config['site']['email_days_to_change'] . ' days.</b><br/><br/><form action="?subtopic=accountmanagement&action=changeemail" method="post" ><div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Change Email Address</div>        <span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ></tr><td class="LabelV" ><span >New Email Address:</span></td>  <td style="width:90%;" ><input name="new_email" value="' . htmlspecialchars($_POST['new_email']) . '" size="30" maxlength="50" ></td><tr></tr><td class="LabelV" ><span >Password:</span></td>  <td><input type="password" name="password" size="30" maxlength="29" ></td></tr>          </table>        </div>  </table></div></td></tr><br/><table style="width:100%;" ><tr align="center"><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><input type="hidden" name=changeemailsave value=1 ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="' . $layout_name . '/images/global/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
                }
            } else {
                $main_content .= 'Please enter your password and the new email address. Make sure that you enter a valid email address which you have access to. <b>For security reasons, the actual change will be finalised after a waiting period of ' . $config['site']['email_days_to_change'] . ' days.</b><br/><br/><form action="?subtopic=accountmanagement&action=changeemail" method="post" ><div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Change Email Address</div>        <span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ></tr><td class="LabelV" ><span >New Email Address:</span></td>  <td style="width:90%;" ><input name="new_email" value="' . htmlspecialchars($_POST['new_email']) . '" size="30" maxlength="50" ></td><tr></tr><td class="LabelV" ><span >Password:</span></td>  <td><input type="password" name="password" size="30" maxlength="29" ></td></tr>          </table>        </div>  </table></div></td></tr><br/><table style="width:100%;" ><tr align="center"><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><input type="hidden" name=changeemailsave value=1 ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="' . $layout_name . '/images/global/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
            }
        } else {
            if ($account_email_new_time < time()) {
                if ($_POST['changeemailsave'] == 1) {
                    $account_logged->set("email_new", "");
                    $account_logged->set("email_new_time", 0);
                    $account_logged->setEmail($account_email_new);
                    $account_logged->save();
                    $main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Email Address Change Accepted</div>        <span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>You have accepted <b>' . htmlspecialchars($account_logged->getEmail()) . '</b> as your new email adress.</td></tr>          </table>        </div>  </table></div></td></tr><br/><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
                } else {
                    $main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Email Address Change Accepted</div>        <span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>Do you accept <b>' . htmlspecialchars($account_email_new) . '</b> as your new email adress?</td></tr>          </table>        </div>  </table></div></td></tr><br /><table width="100%"><tr><td width="30">&nbsp;</td><td align=left><form action="?subtopic=accountmanagement&action=changeemail" method="post"><input type="hidden" name="changeemailsave" value=1 ><INPUT TYPE=image NAME="I Agree" SRC="' . $layout_name . '/images/global/buttons/sbutton_iagree.gif" BORDER=0 WIDTH=120 HEIGHT=17></FORM></td><td align=left><form action="?subtopic=accountmanagement&action=changeemail" method="post"><input type="hidden" name="emailchangecancel" value=1 ><input type=image name="Cancel" src="' . $layout_name . '/images/global/buttons/sbutton_cancel.gif" BORDER=0 WIDTH=120 HEIGHT=17></form></td><td align=right><form action="?subtopic=accountmanagement" method="post" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" ></div></div></form></td><td width="30">&nbsp;</td></tr></table>';
                }
            } else {
                $main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Change of Email Address</div>        <span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>A request has been submitted to change the email address of this account to <b>' . htmlspecialchars($account_email_new) . '</b>.<br/>The actual change will take place on <b>' . date("j F Y, G:i:s", $account_email_new_time) . '</b>.<br>If you do not want to change your email address, please click on "Cancel".</td></tr>          </table>        </div>  </table></div></td></tr><br/><table style="width:100%;" ><tr align="center"><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement&action=changeemail" method="post" ><tr><td style="border:0px;" ><input type="hidden" name="emailchangecancel" value=1 ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Cancel" alt="Cancel" src="' . $layout_name . '/images/global/buttons/_sbutton_cancel.gif" ></div></div></td></tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
            }
        }
        if ($_POST['emailchangecancel'] == 1) {
            $account_logged->set("email_new", "");
            $account_logged->set("email_new_time", 0);
            $account_logged->save();
            $main_content = '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Email Address Change Cancelled</div>        <span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>Your request to change the email address of your account has been cancelled. The email address will not be changed.</td></tr>          </table>        </div>  </table></div></td></tr><br/><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
        }
    }

//########### CHANGE PUBLIC INFORMATION (about account owner) ######################
    if ($action == "changeinfo") {
        $new_rlname = htmlspecialchars(trim($_POST['info_rlname']));
        $new_location = htmlspecialchars(trim($_POST['info_location']));
        if ($_POST['changeinfosave'] == 1) {
            //save data from form
            $account_logged->set("rlname", $new_rlname);
            $account_logged->set("location", $new_location);
            $account_logged->save();
            $main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Public Information Changed</div>        <span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>Your public information has been changed.</td></tr>          </table>        </div>  </table></div></td></tr><br><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
        } else {
            //show form
            $account_rlname = $account_logged->getCustomField("rlname");
            $account_location = $account_logged->getCustomField("location");
            $main_content .= 'Here you can tell other players about yourself. This information will be displayed alongside the data of your characters. If you do not want to fill in a certain field, just leave it blank.<br/><br/><form action="?subtopic=accountmanagement&action=changeinfo" method=post><div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Change Public Information</div>        <span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td class="LabelV" >Real Name:</td><td style="width:90%;" ><input name="info_rlname" value="' . $account_rlname . '" size="30" maxlength="50" ></td></tr><tr><td class="LabelV" >Location:</td><td><input name="info_location" value="' . $account_location . '" size="30" maxlength="50" ></td></tr></table>        </div>  </table></div></td></tr><br/><table width="100%"><tr align="center"><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><input type="hidden" name="changeinfosave" value="1" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="' . $layout_name . '/images/global/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
        }
    }
    if ($action == "donate_new"){
        include 'accountmanagement/donate_tibia_like.php';
    }if ($action == "donate"){
        include 'accountmanagement/donate_tibia_like.php';
    }
    if($action == "showtickets"){
        include 'accountmanagement/showtickets.php';
    }
}