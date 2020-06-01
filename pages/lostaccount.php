<?php

if (!defined('INITIALIZED'))
    exit;

if ($config['site']['send_emails']) {
    if (!$logged) {
        if (!isset($_REQUEST['step'])) {
            $main_content .= '
				 <B>Welcome to the Lost Account Interface!</B><BR>
				<BR>
				If you have lost access to your account, this interface can help you. Of course, you need to prove that your claim to the account is justified. Enter the requested data and follow the instructions carefully. Please understand there is no way to get access to your lost account if the interface cannot help you. Two further options to change account data are available if you have a registered account.<BR>
				<BR>
				By using the Lost Account Interface you can
				<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%>
					<TR>
						<TD><IMG SRC="' . $layout_name . '/images/global/general/blank.gif" WIDTH=10 HEIGHT=1 BORDER=0></TD>
						<TD>
							<TABLE CELLSPACING=1 CELLPADDING=0 BORDER=0 WIDTH=100%>
								<TR>
									<TD COLSPAN=2><IMG SRC="' . $layout_name . '/images/global/general/blank.gif" WIDTH=1 HEIGHT=1 BORDER=0></TD>
								</TR>
								<TR>
									<TD VALIGN=top><IMG SRC="' . $layout_name . '/images/global/content/bullet.gif" WIDTH=12 HEIGHT=15 BORDER=0></TD>
									<TD>get a new password if you have lost the current password,</TD>
								</TR>
								<TR>
									<TD VALIGN=top><IMG SRC="' . $layout_name . '/images/global/content/bullet.gif" WIDTH=12 HEIGHT=15 BORDER=0></TD>
									<TD>receive your account name if you do not know it anymore,</TD>
								</TR>
								<TR>
									<TD VALIGN=top><IMG SRC="' . $layout_name . '/images/global/content/bullet.gif" WIDTH=12 HEIGHT=15 BORDER=0></TD>
									<TD>get your account back if it has been hacked,</TD>
								</TR>
								<TR>
									<TD VALIGN=top><IMG SRC="' . $layout_name . '/images/global/content/bullet.gif" WIDTH=12 HEIGHT=15 BORDER=0></TD>
									<TD>change the email address of your account instantly (only available to registered accounts),</TD>
								</TR>
								<TR>
									<TD VALIGN=top><IMG SRC="' . $layout_name . '/images/global/content/bullet.gif" WIDTH=12 HEIGHT=15 BORDER=0></TD>
									<TD>request a new recovery key (only available to registered accounts).</TD>
								</TR>
							</TABLE>
						</TD>
						<TD><IMG SRC="' . $layout_name . '/images/global/general/blank.gif" WIDTH=10 HEIGHT=1 BORDER=0></TD>
					</TR>
				</TABLE>
				<BR>
				<BR>
				As a first step to use the Lost Account Interface please enter the name of a character on the lost account and click on "Submit".<BR>
				<BR>
				<FORM ACTION="?subtopic=lostaccount" METHOD=post>
					<INPUT TYPE=hidden NAME="step" VALUE="problem">
					<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
						<TR>
							<TD BGCOLOR="#505050" CLASS=white><B>Enter Character Name</B></TD>
						</TR>
						<TR>
							<TD BGCOLOR="#D4C0A1">Character name:
								<INPUT NAME="character" SIZE=30 MAXLENGTH=30></TD>
						</TR>
					</TABLE>
					<BR>
					<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%>
					<TR>
						<TD ALIGN=center><IMG SRC="' . $layout_name . '/images/global/general/blank.gif" WIDTH=120 HEIGHT=1 BORDER=0></TD>
						<TD ALIGN=center><TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0>
							<TR>
								<TD><INPUT TYPE=image NAME="Submit" ALT="Submit" SRC="' . $layout_name . '/images/global/buttons/sbutton_submit.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD>
							</TR>
						</FORM>
					</TABLE>
				</TD>
				<TD ALIGN=center><IMG SRC="' . $layout_name . '/images/global/general/blank.gif" WIDTH=120 HEIGHT=1 BORDER=0></TD>
			</TR>
		</TABLE>';
        }
        if ($_REQUEST['step'] == "problem") {
            $character = trim(stripslashes($_POST['character']));
            $char = new Player();
            $char->find($character);
            if ($char->isLoaded()) {
                $main_content .= '
					 The Lost Account Interface can help you to solve all problems listed below. Please select your problem and click on "Submit".<BR>
					<BR>
					<FORM ACTION="?subtopic=lostaccount" METHOD=post>
						<INPUT TYPE=hidden NAME="character" VALUE="' . $character . '">
						<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
							<TR>
								<TD BGCOLOR="#505050" CLASS=white><B>Specify Your Problem</B></TD>
							</TR>
							<TR>
								<TD BGCOLOR="#D4C0A1"><INPUT TYPE=radio NAME="step" VALUE="password">
									I have forgotten my password.<BR>
									<INPUT TYPE=radio NAME="step" VALUE="name">
									I have forgotten my account name.<BR>
									<INPUT TYPE=radio NAME="step" VALUE="both">
									I have forgotten both my password and my account name.<BR>
									<INPUT TYPE=radio NAME="step" VALUE="email">
									I want to change the email address of my account instantly.<BR>
								</TD>
							</TR>
						</TABLE>
						<BR>
						<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%>
						<TR>
							<TD ALIGN=center><IMG SRC="' . $layout_name . '/images/global/general/blank.gif" WIDTH=120 HEIGHT=1 BORDER=0></TD>
							<TD ALIGN=center><TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0>
								<TR>
									<TD><INPUT TYPE=image NAME="Submit" ALT="Submit" SRC="' . $layout_name . '/images/global/buttons/sbutton_submit.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD>
								</TR>
							</FORM>
						</TABLE>
					</TD>
					<TD ALIGN=center><IMG SRC="' . $layout_name . '/images/global/general/blank.gif" WIDTH=120 HEIGHT=1 BORDER=0></TD>
				</TR>
			</TABLE>';
            } else {
                $main_content .= '
					<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
						<TR>
							<TD BGCOLOR="#505050" CLASS=white><B>Error</B></TD>
						</TR>
						<TR>
							<TD BGCOLOR="#D4C0A1"><TABLE>
									<TR>
										<TD> Character <B>' . $character . '</B> does not exist. Please make sure to enter the character name correctly. Note that characters are deleted automatically if they have not been used for a long time. </TD>
									</TR>
								</TABLE>
							</TD>
						</TR>
					</TABLE>
					<BR>
					<CENTER>
						<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0>
							<FORM ACTION=?subtopic=lostaccount METHOD=post>
								<TR>
									<TD><INPUT TYPE=image NAME="Back" ALT="Back" SRC="' . $layout_name . '/images/global/buttons/sbutton_back.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD>
								</TR>
							</FORM>
						</TABLE>
					</CENTER>';
            }
        }
        if ($_REQUEST['step'] == "both") {
            
            $character = trim(stripslashes($_POST['character']));
            $main_content .= '
				Please follow the instructions below to get a new password and to receive your account name via email.
				<OL>
					<LI>Choose "Yes, send it by email" if you still have access to the email account to which your Tibia account is assigned.</LI>
					<LI>Enter the email address to which your Tibia account is assigned in the field "Account email address".</LI>
					<LI>Click on "Submit".</LI>
					<LI>Please understand that for security reasons you can only request both your account name and new password if your account has not been used for a certain period of time. If this requirement is met, you will receive an email with your account name, a link and a confirmation key. Click on the given link, or copy and paste it into your internet browser. If your account has been used recently, the Lost Account Interface will tell you how long you have to wait before you can request your account data. However, if you have a registered account, you can have new account data sent to you instantly if you confirm your request by using your recovery key.</LI>
					<LI>The link will take you to a page on which you will be asked to enter your account name and to confirm the request by using the confirmation key. Please note that you need to use this link in the following 24 hours. Otherwise the confirmation key will become invalid and you will have to request a new confirmation key.</LI>
					<LI>If you have entered correct data, you will receive another email with a new password for your Tibia account. In case you do not receive the new password you have to make another request.</LI>
				</OL>
				<FORM ACTION="?subtopic=lostaccount" METHOD=post>
					<INPUT TYPE=hidden NAME="character" VALUE="' . $character . '">
					<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
						<TR>
							<TD BGCOLOR="#505050" CLASS=white><B>Request Account Name and New Password</B></TD>
						</TR>
						<TR>
							<TD BGCOLOR="#D4C0A1"><INPUT TYPE=radio NAME="step" VALUE="sendboth" CHECKED>
								Yes, send it by email.<BR>
								<TABLE CELLSPACING=0 CELLPADDING=1 BORDER=0 ALIGN=center>
									<TR>
										<TD>Account email address:</TD>
										<TD><INPUT NAME="email" VALUE="" SIZE=30 MAXLENGTH=50></TD>
									</TR>
								</TABLE>
								<BR>
								<INPUT TYPE=radio NAME="step" VALUE="email">
								I have lost access to that email account.<BR>
								<INPUT TYPE=radio NAME="step" VALUE="email">
								I do not know that email address anymore.<BR></TD>
						</TR>
					</TABLE>
					<BR>
					<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%>
					<TR>
						<TD ALIGN=center><IMG SRC="' . $layout_name . '/images/global/general/blank.gif" WIDTH=120 HEIGHT=1 BORDER=0></TD>
						<TD ALIGN=center><TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0>
							<TR>
								<TD><INPUT TYPE=image NAME="Submit" ALT="Submit" SRC="' . $layout_name . '/images/global/buttons/sbutton_submit.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD>
							</TR>
						</FORM>
					</TABLE>
				</TD>
				<TD ALIGN=center><IMG SRC="' . $layout_name . '/images/global/general/blank.gif" WIDTH=120 HEIGHT=1 BORDER=0></TD>
			</TR>
		</TABLE>';
        }
        if ($_REQUEST['step'] == "name") {
            $character = trim(stripslashes($_POST['character']));
            $main_content .= '
				Please follow the instructions below to receive your account name via email.
				<OL>
					<LI>Choose "Yes, send it by email" if you still have access to the email account to which your Tibia account is assigned.</LI>
					<LI>Enter the email address to which your Tibia account is assigned in the field "Account email address".</LI>
					<LI>Enter the password of your Tibia account in the field "Password".</LI>
					<LI>Click on "Submit".</LI>
					<LI>Within a short time you will receive an email with your account name.</LI>
				</OL>
				<FORM ACTION="?subtopic=lostaccount" METHOD=post>
					<INPUT TYPE=hidden NAME="character" VALUE="' . $character . '">
					<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
						<TR>
							<TD BGCOLOR="#505050" CLASS=white><B>Request Account Name</B></TD>
						</TR>
						<TR>
							<TD BGCOLOR="#D4C0A1"><INPUT TYPE=radio NAME="step" VALUE="sendname" CHECKED>
								Yes, send it by email.<BR>
								<TABLE CELLSPACING=0 CELLPADDING=1 BORDER=0 ALIGN=center>
									<TR>
										<TD>Account email address:</TD>
										<TD><INPUT NAME="email" VALUE="" SIZE=30 MAXLENGTH=50></TD>
									</TR>
									<TR>
										<TD>Password:</TD>
										<TD><INPUT TYPE="password" NAME="password" VALUE="" SIZE=30 MAXLENGTH=30></TD>
									</TR>
								</TABLE>
								<BR>
								<INPUT TYPE=radio NAME="step" VALUE="email">
								I have lost access to that email account.<BR>
								<INPUT TYPE=radio NAME="step" VALUE="email">
								I do not know that email address anymore.<BR>
								<INPUT TYPE=radio NAME="step" VALUE="both">
								I have also forgotten the password of my account.<BR></TD>
						</TR>
					</TABLE>
					<BR>
					<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%>
					<TR>
						<TD ALIGN=center><IMG SRC="' . $layout_name . '/images/global/general/blank.gif" WIDTH=120 HEIGHT=1 BORDER=0></TD>
						<TD ALIGN=center><TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0>
							<TR>
								<TD><INPUT TYPE=image NAME="Submit" ALT="Submit" SRC="' . $layout_name . '/images/global/buttons/sbutton_submit.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD>
							</TR>
						</FORM>
					</TABLE>
				</TD>
				<TD ALIGN=center><IMG SRC="' . $layout_name . '/images/global/general/blank.gif" WIDTH=120 HEIGHT=1 BORDER=0></TD>
			</TR>
		</TABLE>';
        }
        if ($_REQUEST['step'] == "password") {
            $character = trim(stripslashes($_POST['character']));
            $main_content .= '
				Please follow the instructions below to get a new password via email.
				<OL>
					<LI>Choose "Yes, send it by email" if you still have access to the email account to which your Tibia account is assigned.</LI>
					<LI>Enter the email address to which your Tibia account is assigned in the field "Account email address".</LI>
					<LI>Enter your account name in the field "Account name".</LI>
					<LI>Click on "Submit".</LI>
					<LI>Within a short time you will receive an email with a link and a confirmation key. Click on the given link, or copy and paste it into your internet browser.</LI>
					<LI>The link will take you to a page on which you will be asked to enter your account name and to confirm the request by using the confirmation key. Please note that you need to use this link in the following 24 hours. Otherwise the confirmation key will become invalid and you will have to request a new confirmation key.</LI>
					<LI>If you have entered correct data, you will receive another email with a new password for your Tibia account. In case you do not receive the new password you have to make another request.</LI>
				</OL>
				<FORM ACTION="?subtopic=lostaccount" METHOD=post>
					<INPUT TYPE=hidden NAME="character" VALUE="' . $character . '">
					<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
						<TR>
							<TD BGCOLOR="#505050" CLASS=white><B>Request New Password</B></TD>
						</TR>
						<TR>
							<TD BGCOLOR="#D4C0A1"><INPUT TYPE=radio NAME="step" VALUE="sendconfirmation" CHECKED>
								Yes, send it by email.<BR>
								<TABLE CELLSPACING=0 CELLPADDING=1 BORDER=0 ALIGN=center>
									<TR>
										<TD>Account email address:</TD>
										<TD><INPUT NAME="email" VALUE="" SIZE=30 MAXLENGTH=50></TD>
									</TR>
									<TR>
										<TD>Account name:</TD>
										<TD><INPUT TYPE="password" NAME="accountname" VALUE="" SIZE=30 MAXLENGTH=30></TD>
									</TR>
								</TABLE>
								<BR>
								<INPUT TYPE=radio NAME="step" VALUE="email">
								I have lost access to that email account.<BR>
								<INPUT TYPE=radio NAME="step" VALUE="email">
								I do not know that email address anymore.<BR>
								<INPUT TYPE=radio NAME="step" VALUE="both">
								I have also forgotten my account name.<BR></TD>
						</TR>
					</TABLE>
					<BR>
					<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%>
					<TR>
						<TD ALIGN=center><IMG SRC="' . $layout_name . '/images/global/general/blank.gif" WIDTH=120 HEIGHT=1 BORDER=0></TD>
						<TD ALIGN=center><TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0>
							<TR>
								<TD><INPUT TYPE=image NAME="Submit" ALT="Submit" SRC="' . $layout_name . '/images/global/buttons/sbutton_submit.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD>
							</TR>
						</FORM>
					</TABLE>
				</TD>
				<TD ALIGN=center><IMG SRC="' . $layout_name . '/images/global/general/blank.gif" WIDTH=120 HEIGHT=1 BORDER=0></TD>
			</TR>
		</TABLE>';
        }
        if ($_REQUEST['step'] == "sendname") {
            $character = trim(stripslashes($_POST['character']));
            $email = trim(stripslashes($_POST['email']));
            $password = trim(stripslashes($_POST['password']));
            
            $char = new Player();
            $char->find($character);
            $account = new Account();
            $account->loadById($char->getAccountID());
            
            if (!$account->isValidPassword($password) || $email != $account->getEmail()) {
                $main_content .= '
					<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
						<TR>
							<TD BGCOLOR="#505050" CLASS=white><B>Error</B></TD>
						</TR>
						<TR>
							<TD BGCOLOR="#D4C0A1"><TABLE>
									<TR>
										<TD>Incorrect account name or email address.</TD>
									</TR>
								</TABLE>
							</TD>
						</TR>
					</TABLE>
					<BR>
					<CENTER>
						<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0>
							<FORM ACTION=?subtopic=lostaccount METHOD=post>
								<TR>
									<TD><INPUT TYPE=hidden NAME=step VALUE=name>
										<INPUT TYPE=hidden NAME=character VALUE="' . $character . '">
										<INPUT TYPE=hidden NAME=email VALUE="' . $email . '">
										<INPUT TYPE=hidden NAME=password VALUE="' . $password . '">
										<INPUT TYPE=image NAME="Back" ALT="Back" SRC="' . $layout_name . '/images/global/buttons/sbutton_back.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD>
								</TR>
							</FORM>
						</TABLE>
					</CENTER>';
            } else {
                
                $mailBody = '
					<html>
						<body>
							<p>Dear ' . $config['server']['serverName'] . ' player,</p>
							<p>You have requested the account name of your ' . $config['server']['serverName'] . ' account.<br />
							The account name is:<br /> 
							' . $account->getName() . '</p>
								
							<p>Kind regards,<br />
							Your ' . $config['server']['serverName'] . ' Team</p>
						</body>
					</html>';
                
                $mail = new SendMail();
                if ($mail->send($account->getEmail(), $account->getRLName(), "Account name for " . $config['server']['serverName'], "Account name for " . $config['server']['serverName'], "Account name for " . $config['server']['serverName'], $mailBody)) {
                    $main_content .= '
						<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
							<TR>
								<TD BGCOLOR="#505050" CLASS=white><B>Account Name Sent</B></TD>
							</TR>
							<TR>
								<TD BGCOLOR="#D4C0A1"><TABLE>
										<TR>
											<TD>The account name has been sent to the email address your account is assigned to.</TD>
										</TR>
									</TABLE>
								</TD>
							</TR>
						</TABLE>
						<BR>
						<CENTER>
							<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0>
								<FORM ACTION=?subtopic=accountmanagement METHOD=post>
									<TR>
										<TD><INPUT TYPE=image NAME="Login" ALT="Login" SRC="' . $layout_name . '/images/global/buttons/sbutton_login.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD>
									</TR>
								</FORM>
							</TABLE>
						</CENTER>';
                }
                
            }
            
        }
        if ($_REQUEST['step'] == "sendconfirmation") {
            
            $character = trim(stripslashes($_POST['character']));
            $email = trim(stripslashes($_POST['email']));
            $account_name = strtoupper(trim(stripslashes($_POST['accountname'])));
            
            $char = new Player();
            $char->find($character);
            $account = new Account();
            $account->loadById($char->getAccountID());
            
            if ($email != $account->getEmail() || $account_name != $account->getName()) {
                $main_content .= '
					<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
						<TR>
							<TD BGCOLOR="#505050" CLASS=white><B>Error</B></TD>
						</TR>
						<TR>
							<TD BGCOLOR="#D4C0A1"><TABLE>
									<TR>
										<TD>Incorrect account name or email address.</TD>
									</TR>
								</TABLE>
							</TD>
						</TR>
					</TABLE>
					<BR>
					<CENTER>
						<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0>
							<FORM ACTION=?subtopic=lostaccount METHOD=post>
								<TR>
									<TD><INPUT TYPE=hidden NAME=step VALUE=password>
										<INPUT TYPE=hidden NAME=character VALUE="' . $character . '">
										<INPUT TYPE=hidden NAME=email VALUE="' . $email . '">
										<INPUT TYPE=hidden NAME=accountname VALUE="' . $account_name . '">
										<INPUT TYPE=image NAME="Back" ALT="Back" SRC="' . $layout_name . '/images/global/buttons/sbutton_back.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD>
								</TR>
							</FORM>
						</TABLE>
					</CENTER>';
            } else {
                
                $acceptedChars = '123456789zxcvbnmasdfghjklqwertyuiop';
                $newcode = NULL;
                for ($i = 0; $i < 20; $i++) {
                    $cnum[$i] = $acceptedChars[mt_rand(0, 33)];
                    $newcode .= $cnum[$i];
                }
                
                $codeDate = time();
                $idAccount = $account->getID();
                $emailcode = $SQL->prepare("INSERT INTO links (account_id, code, code_date) VALUES (:accid, :ncode , :cdate)");
                $emailcode->execute(['accid' => $idAccount, 'ncode'=> $newcode, 'cdate' => $codeDate]);
                
                
                $emailcode = $SQL->query("INSERT INTO " . $SQL->tableName('links') . " (" . $SQL->fieldName('account_id') . ", " . $SQL->fieldName('code') . ", " . $SQL->fieldName('code_date') . ") VALUES ('$idAccount', '$newcode', '$codeDate')");
                
                if ($emailcode) {
                    $mailBody = '
						<html>
							<body>
								<p>Dear ' . $config['server']['serverName'] . ' player,</p>
								<p>A request for a new password of your ' . $config['server']['serverName'] . ' account has been<br />
								submitted. Please confirm the request at <a href="'. $config['base_url'] . '?subtopic=lostaccount&step=confirmation&confirmationkey=' . urlencode($newcode) . '">'. $config['base_url'] . '?subtopic=lostaccount&step=confirmation&confirmationkey=' . urlencode($newcode) . '</a><br />
								in order to get the password sent to this email address.</p>
								
								<p>If clicking on the link does not work in your email program please<br /> 
								copy and paste it into your browser. The link is possibly split<br /> 
								up due to a word-wrap. Please make sure to copy the complete link.</p>
								
								<p>Alternatively, if you should encounter any problems using the above<br />
								link, please go to<br />
								<a href="'. $config['base_url'] . '?subtopic=lostaccount&step=confirmation">'. $config['base_url'] . '?subtopic=lostaccount&step=confirmation</a><br />
								and confirm the request with your account name and the following<br />
								confirmation key:<br />
								' . $newcode . '</p>
								
								<p>Please note if you do not confirm the request for a new password<br />
								within the next 24 hours the request will be cancelled and no<br />
								new password will be assigned.</p>
								
								<p>If you have confirmed the request with your account name and the<br />
								confirmation key, you will receive another email with your password.</p>
								
								<p>Simply ignore this message if you have not requested a new<br />
								password or do not want the password to change anymore.</p>
								
								<p>Kind regards,<br />
								Your ' . $config['server']['serverName'] . ' Team</p>
							</body>
						</html>';
                }
                
                $mail = new SendMail();
                if ($mail->send($account->getEmail(), $account->getRLName(), "Confirmation key for new password " . $config['server']['serverName'], "Confirmation key for new password " . $config['server']['serverName'], "Confirmation key for new password " . $config['server']['serverName'], $mailBody)) {
                    $main_content .= '
						<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
							<TR>
								<TD BGCOLOR="#505050" CLASS=white><B>Confirmation Key Sent</B></TD>
							</TR>
							<TR>
								<TD BGCOLOR="#D4C0A1"><TABLE>
										<TR>
											<TD>The email with a confirmation key has been sent to your email address. When you receive the email, please click on the link, or copy and paste it into your internet browser. Please note that you need to use this link in the following 24 hours. It will expire after this time has passed and you will have to request a new confirmation key.</TD>
										</TR>
									</TABLE>
								</TD>
							</TR>
						</TABLE>';
                } else {
                    $main_content .= '
						<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
							<TR>
								<TD BGCOLOR="#505050" CLASS=white><B>Error</B></TD>
							</TR>
							<TR>
								<TD BGCOLOR="#D4C0A1"><TABLE>
										<TR>
											<TD>' . $mail->ErrorInfo . '</TD>
										</TR>
									</TABLE>
								</TD>
							</TR>
						</TABLE>';
                }
            }
        }
        if ($_REQUEST['step'] == "email") {
            $character = trim(stripslashes($_POST['character']));
            $main_content .= '
				Enter a valid email address that is not yet used for a Tibia account in the field "New email address" and click on "Submit".<BR>
				<BR>
				<FORM ACTION="?subtopic=lostaccount" METHOD=post>
					<INPUT TYPE=hidden NAME="character" VALUE="' . $character . '">
					<INPUT TYPE=hidden NAME="step" VALUE="email2">
					<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
						<TR>
							<TD BGCOLOR="#505050" CLASS=white><B>Change Email Address</B></TD>
						</TR>
						<TR>
							<TD BGCOLOR="#D4C0A1">New email address:
								<INPUT NAME="email" VALUE="" SIZE=30 MAXLENGTH=50>
							</TD>
						</TR>
					</TABLE>
					<BR>
					<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%>
					<TR>
						<TD ALIGN=center><IMG SRC="' . $layout_name . '/images/global/general/blank.gif" WIDTH=120 HEIGHT=1 BORDER=0></TD>
						<TD ALIGN=center><TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0>
							<TR>
								<TD><INPUT TYPE=image NAME="Submit" ALT="Submit" SRC="' . $layout_name . '/images/global/buttons/sbutton_submit.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD>
							</TR>
						</FORM>
					</TABLE>
				</TD>
				<TD ALIGN=center><IMG SRC="' . $layout_name . '/images/global/general/blank.gif" WIDTH=120 HEIGHT=1 BORDER=0></TD>
			</TR>
		</TABLE>';
        }
        if ($_REQUEST['step'] == "email2") {
            $character = trim(stripslashes($_POST['character']));
            $email = trim(stripslashes($_POST['email']));
            
            $char = new Player();
            $char->find($character);
            $account = new Account();
            $account->loadById($char->getAccountID());
            
            $getEmail = $SQL->prepare("SELECT `id` FROM `accounts` where email = :email");
            $getEmail->execute(['email'=> $email]);
            $getEmail = $getEmail->fetchAll();
            
            if (count($getEmail) >= 1)
                $error = "The new email address is already assigned to an account. Please enter another email address.";
            
            if (!isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
                $error = "Please enter a valid email address.";
            
            if (empty($error)) {
                $main_content .= '
					 Please follow the instructions below to change your email address to <B>' . $email . '</B>.
					<OL>
						<LI>Choose "Yes, change the email address" if you know the recovery key of your Tibia account.</LI>
						<LI>Enter the recovery key of your Tibia account in the field "Recovery key".</LI>
						<LI>Click on "Submit".</LI>
						<LI>If you have entered everything correctly, an email with your account name and new password will be sent to your new email address. Please note that if you do not log into your Tibia account with the new password in the following 24 hours the email and password change will be cancelled and your old email address and password will be valid again.</LI>
					</OL>
					<FORM ACTION="?subtopic=lostaccount" METHOD=post>
						<INPUT TYPE=hidden NAME="character" VALUE="' . $character . '">
						<INPUT TYPE=hidden NAME="email" VALUE="' . $email . '">
						<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
							<TR>
								<TD BGCOLOR="#505050" CLASS=white><B>Change Email Address</B></TD>
							</TR>
							<TR>
								<TD BGCOLOR="#D4C0A1"><INPUT TYPE=radio NAME="step" VALUE="checkemail" CHECKED>
									Yes, change the email address.<BR>
									<TABLE CELLSPACING=0 CELLPADDING=1 BORDER=0 ALIGN=center>
										<TR>
											<TD>Recovery key:</TD>
											<TD>
												<INPUT NAME="key1" VALUE="' . trim(stripslashes($_POST['key1'])) . '" SIZE=5 MAXLENGTH=5>
												-
												<INPUT NAME="key2" VALUE="' . trim(stripslashes($_POST['key2'])) . '" SIZE=5 MAXLENGTH=5>
												-
												<INPUT NAME="key3" VALUE="' . trim(stripslashes($_POST['key3'])) . '" SIZE=5 MAXLENGTH=5>
												-
												<INPUT NAME="key4" VALUE="' . trim(stripslashes($_POST['key4'])) . '" SIZE=5 MAXLENGTH=5>
											</TD>
										</TR>
									</TABLE>
									<BR>
									<INPUT TYPE=radio NAME="step" VALUE="key">
									I have forgotten the recovery key of my Tibia account.<BR>
								</TD>
							</TR>
						</TABLE>
						<BR>
						<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%>
						<TR>
							<TD ALIGN=center><IMG SRC="' . $layout_name . '/images/global/general/blank.gif" WIDTH=120 HEIGHT=1 BORDER=0></TD>
							<TD ALIGN=center><TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0>
								<TR>
									<TD><INPUT TYPE=image NAME="Submit" ALT="Submit" SRC="' . $layout_name . '/images/global/buttons/sbutton_submit.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD>
								</TR>
							</FORM>
						</TABLE>
					</TD>
					<TD ALIGN=center><IMG SRC="' . $layout_name . '/images/global/general/blank.gif" WIDTH=120 HEIGHT=1 BORDER=0></TD>
				</TR>
			</TABLE>';
            } else {
                $main_content .= '
					<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
						<TR>
							<TD BGCOLOR="#505050" CLASS=white><B>Error</B></TD>
						</TR>
						<TR>
							<TD BGCOLOR="#D4C0A1"><TABLE>
									<TR>
										<TD>' . $error . '</TD>
									</TR>
								</TABLE>
							</TD>
						</TR>
					</TABLE>
					<BR>
					<CENTER>
						<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0>
							<FORM ACTION=?subtopic=lostaccount METHOD=post>
								<TR>
									<TD><INPUT TYPE=hidden NAME=step VALUE=email>
										<INPUT TYPE=hidden NAME=character VALUE="' . $character . '">
										<INPUT TYPE=hidden NAME=email VALUE="' . $email . '">
										<INPUT TYPE=hidden NAME=key1 VALUE="' . trim(stripslashes($_POST['key1'])) . '">
										<INPUT TYPE=hidden NAME=key2 VALUE="' . trim(stripslashes($_POST['key2'])) . '">
										<INPUT TYPE=hidden NAME=key3 VALUE="' . trim(stripslashes($_POST['key3'])) . '">
										<INPUT TYPE=hidden NAME=key4 VALUE="' . trim(stripslashes($_POST['key4'])) . '">
										<INPUT TYPE=image NAME="Back" ALT="Back" SRC="' . $layout_name . '/images/global/buttons/sbutton_back.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD>
								</TR>
							</FORM>
						</TABLE>
					</CENTER>';
            }
        }
        if ($_REQUEST['step'] == "checkemail") {
            
            $error = NULL;
            
            $character = trim(stripslashes($_POST['character']));
            $email = trim(stripslashes($_POST['email']));
            $recoveryKey = trim(stripslashes($_POST['key1'])) . '-' . trim(stripslashes($_POST['key2'])) . '-' . trim(stripslashes($_POST['key3'])) . '-' . trim(stripslashes($_POST['key4']));
            
            $char = new Player();
            $char->find($character);
            $account = new Account();
            $account->loadById($char->getAccountID());
            
            if ($account->getKey() != strtoupper($recoveryKey))
                $error = "Please enter a valid Recovery Key.";
            
            if (empty($error)) {
                $account->setEmail($email);
                $account->save();
                
                $acceptedChars = '123456789zxcvbnmasdfghjklqwertyuiop';
                $newpass = NULL;
                for ($i = 0; $i < 8; $i++) {
                    $cnum[$i] = $acceptedChars[mt_rand(0, 33)];
                    $newpass .= $cnum[$i];
                }
                
                $account->setPassword($newpass);
                $account->save();
                
                $mailBody = "
					<p>Dear " . $config['server']['serverName'] . " player,</p>

					<p>The email address of your " . $config['server']['serverName'] . " account has been changed.</p>
					
					<p>The name of your account is:<br />
						" . $account->getName() . "</p>
					
					<p>The new password for your account is:<br />
						" . $newpass . "</p>
					
					<p>For security reasons, please memorise the password or keep it in<br />
					a safe place but do no store it on your computer. Delete this mail<br />
					once you have logged into your account successfully!</p>
					
					<p>Kind regards,<br />
					Your " . $config['server']['serverName'] . " Team</p>";
                
                $mail = new SendMail();
                if ($mail->send($email, $email, "Account name and new password for " . $config['server']['serverName'], "Account name and new password for " . $config['server']['serverName'], "Account name and new password for " . $config['server']['serverName'], $mailBody)) {
                    $main_content .= '
						<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
							<TR>
								<TD BGCOLOR="#505050" CLASS=white><B>Email Address Changed</B></TD>
							</TR>
							<TR>
								<TD BGCOLOR="#D4C0A1"><TABLE>
										<TR>
											<TD>Your account name and new password has been sent to the new email address. Please note that if you do not log into your Tibia account with the new password in the following 24 hours the email and password change will be cancelled. Your old email address and password will then be valid again.</TD>
										</TR>
									</TABLE></TD>
							</TR>
						</TABLE>
						<BR>
						<CENTER>
							<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0>
								<FORM ACTION=?subtopic=accountmanagement METHOD=post>
									<TR>
										<TD><INPUT TYPE=image NAME="Login" ALT="Login" SRC="' . $layout_name . '/images/global/buttons/sbutton_login.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD>
									</TR>
								</FORM>
							</TABLE>
						</CENTER>';
                } else {
                    $main_content .= '
						<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
							<TR>
								<TD BGCOLOR="#505050" CLASS=white><B>Error</B></TD>
							</TR>
							<TR>
								<TD BGCOLOR="#D4C0A1"><TABLE>
										<TR>
											<TD>Contact an Administrator, email can not be sent.</TD>
										</TR>
									</TABLE>
								</TD>
							</TR>
						</TABLE>
						<BR>
						<CENTER>
							<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0>
								<FORM ACTION=?subtopic=lostaccount METHOD=post>
									<TR>
										<TD>
											<INPUT TYPE=image NAME="Back" ALT="Back" SRC="' . $layout_name . '/images/global/buttons/sbutton_back.gif" BORDER=0 WIDTH=120 HEIGHT=18>
										</TD>
									</TR>
								</FORM>
							</TABLE>
						</CENTER>';
                }
            } else {
                $main_content .= '
					<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
						<TR>
							<TD BGCOLOR="#505050" CLASS=white><B>Error</B></TD>
						</TR>
						<TR>
							<TD BGCOLOR="#D4C0A1"><TABLE>
									<TR>
										<TD>' . $error . '</TD>
									</TR>
								</TABLE>
							</TD>
						</TR>
					</TABLE>
					<BR>
					<CENTER>
						<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0>
							<FORM ACTION=?subtopic=lostaccount METHOD=post>
								<TR>
									<TD><INPUT TYPE=hidden NAME=step VALUE=email2>
										<INPUT TYPE=hidden NAME=character VALUE="' . $character . '">
										<INPUT TYPE=hidden NAME=email VALUE="' . $email . '">
										<INPUT TYPE=hidden NAME=key1 VALUE="' . trim(stripslashes($_POST['key1'])) . '">
										<INPUT TYPE=hidden NAME=key2 VALUE="' . trim(stripslashes($_POST['key2'])) . '">
										<INPUT TYPE=hidden NAME=key3 VALUE="' . trim(stripslashes($_POST['key3'])) . '">
										<INPUT TYPE=hidden NAME=key4 VALUE="' . trim(stripslashes($_POST['key4'])) . '">
										<INPUT TYPE=image NAME="Back" ALT="Back" SRC="' . $layout_name . '/images/global/buttons/sbutton_back.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD>
								</TR>
							</FORM>
						</TABLE>
					</CENTER>';
            }
        }
        if ($_REQUEST['step'] == "sendboth") {
            
            $character = trim(stripslashes($_POST['character']));
            $email = trim(stripslashes($_POST['email']));
            
            $char = new Player();
            $char->find($character);
            $account = new Account();
            $account->loadById($char->getAccountID());
            
            if (!isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
                $error = "Please enter a valid email address.";
            if ($account->getEmail() != $email)
                $error = "Incorrect email or character name.";
            
            if (empty($error)) {
                $acceptedChars = '123456789zxcvbnmasdfghjklqwertyuiop';
                $newcode = NULL;
                for ($i = 0; $i < 20; $i++) {
                    $cnum[$i] = $acceptedChars[mt_rand(0, 33)];
                    $newcode .= $cnum[$i];
                }
                
                $codeDate = time();
                $idAccount = $account->getID();
                
                $emailcode = $SQL->prepare("INSERT INTO links (account_id, code, code_date) VALUES (:accid, :code, :code_date)");
                $emailcode->execute(['accid'=> $idAccount, 'code'=> $newcode, 'code_date'=> $codeDate]);
                $emailcode = $emailcode->fetchAll();
                
                $mailBody = '
					<p>Dear ' . $config['server']['serverName'] . ' player,</p>

					<p>You have requested both your account name and a new password.<br />
					Your account name is:<br />
						' . $account->getName() . '</p>
					
					<p>Please confirm the request at<br />
					   <a href="'. $config['base_url'] . '?subtopic=lostaccount&step=confirmation&confirmationkey=' . urlencode($newcode) . '">'. $config['base_url'] . '?subtopic=lostaccount&step=confirmation&confirmationkey=' . urlencode($newcode) . '</a><br />
					in order to get the password sent to this email address.</p>
					
					<p>If clicking on the link does not work in your email program please<br />
					copy and paste it into your browser. The link is possibly split<br />
					up due to a word-wrap. Please make sure to copy the complete link.</p>
					
					<p>Alternatively, if you should encounter any problems using the above<br />
					link, please go to<br />
					   <a href="'. $config['base_url'] . '?subtopic=lostaccount&step=confirmation">'. $config['base_url'] . '?subtopic=lostaccount&step=confirmation</a><br />
					and confirm the request with your account name and the following<br />
					confirmation key:<br />
						' . $newcode . '</p>
					
					<p>Please note if you do not confirm the request for a new password<br />
					within the next 24 hours the request will be cancelled and no<br />
					new password will be assigned.</p>
					
					<p>If you have confirmed the request with your account name and the<br />
					confirmation key, you will receive another email with your password.</p>
					
					<p>Simply ignore this message if you have not requested a new<br />
					password or do not want the password to change anymore.</p>
					
					<p>Kind regards,<br />
					Your ' . $config['server']['serverName'] . ' Team</p>';
                
                $mail = new SendMail();
                if ($mail->send($account->getEmail(), $account->getRLName(), "Account name and confirmation key for " . $config['server']['serverName'], "Account name and confirmation key for " . $config['server']['serverName'], "Account name and confirmation key for " . $config['server']['serverName'], $mailBody)) {
                    $main_content .= '
						<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
							<TR>
								<TD BGCOLOR="#505050" CLASS=white><B>Account Name and Confirmation Key Sent</B></TD>
							</TR>
							<TR>
								<TD BGCOLOR="#D4C0A1"><TABLE>
										<TR>
											<TD>The email with your account name and the confirmation key has been sent to your email address. When you receive the email, please click on the link, or copy and paste it into your internet browser. Please note that you need to use this link in the following 24 hours. It will expire after this time has passed and you will have to request a new confirmation key.</TD>
										</TR>
									</TABLE>
								</TD>
							</TR>
						</TABLE>';
                }
            } else {
                $main_content .= '
					<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
						<TR>
							<TD BGCOLOR="#505050" CLASS=white><B>Error</B></TD>
						</TR>
						<TR>
							<TD BGCOLOR="#D4C0A1"><TABLE>
									<TR>
										<TD>' . $error . '</TD>
									</TR>
								</TABLE>
							</TD>
						</TR>
					</TABLE>
					<BR>
					<CENTER>
						<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0>
							<FORM ACTION=?subtopic=lostaccount METHOD=post>
								<TR>
									<TD><INPUT TYPE=hidden NAME=step VALUE=both>
										<INPUT TYPE=hidden NAME=character VALUE="' . $character . 'f">
										<INPUT TYPE=hidden NAME=email VALUE="' . $email . '">
										<INPUT TYPE=image NAME="Back" ALT="Back" SRC="' . $layout_name . '/images/global/buttons/sbutton_back.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD>
								</TR>
							</FORM>
						</TABLE>
					</CENTER>';
            }
        }
        if ($_REQUEST['step'] == "confirmation") {
            $confirmationkey = trim(stripslashes($_REQUEST['confirmationkey']));
            $main_content .= '
				 To get a new password for your Tibia account please select "Yes, I want to get a new password", enter your account name and the confirmation key and click on "Submit".<BR>
				<BR>
				<FORM ACTION="?subtopic=lostaccount" METHOD=post>
					<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
						<INPUT TYPE=hidden NAME="step" VALUE="sendpassword">
						<TR>
							<TD BGCOLOR="#505050" COLSPAN=2 CLASS=white><B>Confirm Request for New Password</B></TD>
						</TR>
						<TR>
							<TD BGCOLOR="#D4C0A1"><INPUT TYPE=radio NAME="confirmation" VALUE="yes">
								Yes, I want to get a new password.<BR>
								<TABLE CELLSPACING=0 CELLPADDING=1 BORDER=0 ALIGN=center>
									<TR>
										<TD>Account name:</TD>
										<TD><INPUT TYPE="password" NAME="accountname" VALUE="" SIZE=30 MAXLENGTH=30></TD>
									</TR>
									<TR>
										<TD>Confirmation key:</TD>
										<TD><INPUT NAME="confirmationkey" VALUE="' . $confirmationkey . '" SIZE=30 MAXLENGTH=30></TD>
									</TR>
								</TABLE>
								<BR>
							</TD>
						</TR>
					</TABLE>
					<BR>
					<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%>
					<TR>
						<TD ALIGN=center><IMG SRC="' . $layout_name . '/images/global/general/blank.gif" WIDTH=120 HEIGHT=1 BORDER=0></TD>
						<TD ALIGN=center><TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0>
							<TR>
								<TD><INPUT TYPE=image NAME="Submit" ALT="Submit" SRC="' . $layout_name . '/images/global/buttons/sbutton_submit.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD>
							</TR>
						</FORM>
					</TABLE>
				</TD>
				<TD ALIGN=center><IMG SRC="' . $layout_name . '/images/global/general/blank.gif" WIDTH=120 HEIGHT=1 BORDER=0></TD>
			</TR>
		</TABLE>';
        }
        if ($_REQUEST['step'] == "sendpassword") {
            
            $account_name = trim(stripslashes($_POST['accountname']));
            $confirmationkey = trim(stripslashes($_POST['confirmationkey']));
            
            if (!isset($_POST['confirmation']))
                $error = "Please confirm that you you want to get a new password.";
            
            $account = new Account();
            $account->loadByName($account_name);
            if (!$account->isLoaded())
                $error = "Please enter a valid account name.";
            
            $accountID = $account->getID();
            
            if (empty($_POST['accountname']))
                $error = "Please enter a valid account name.";
            if (empty($_POST['confirmationkey']))
                $error = "Please enter a valid confirmation key.";
            
            $key = $SQL->prepare("SELECT account_id FROM links WHERE code = :confirmation_key");
            $key->execute(['confirmation_key'=>$confirmationkey]);
            $key = $key->fetchAll();
            
            if (count($key) == 0)
                $error = "Please enter a valid confirmation key.";
            
            $code_account = $SQL->prepare("SELECT account_id FROM links WHERE account_id = :accid");
            $code_account->execute(['accid'=>$accountID]);
            $code_account = $code_account->fetchAll();
            
            if (count($code_account) == 0)
                $error = "Please enter a valid account name.";
            
            if (empty($error)) {
                
                $acceptedChars = '123456789zxcvbnmasdfghjklqwertyuiop';
                $newpass = NULL;
                for ($i = 0; $i < 8; $i++) {
                    $cnum[$i] = $acceptedChars[mt_rand(0, 33)];
                    $newpass .= $cnum[$i];
                }
                
                $account->setPassword($newpass);
                $account->save();
                
                $delCode = $SQL->prepare("DELETE FROM links WHERE code = :ckey");
                $delCode->execute(['ckey'=> $confirmationkey]);
                $delCode = $delCode->fetchAll();
                
                $mailBody = '
						<html>
							<body>
								<p>Dear ' . $config['server']['serverName'] . ' player,</p>
								<p>You have requested a new password for your ' . $config['server']['serverName'] . ' account.<br />
								The password for your account is:<br /> 
								' . $newpass . '</p>
								
								<p>In case you do not receive the new password you have to make<br /> 
								another request.</p>
								
								<p>For security reasons, please memorise the password or keep it<br />
								in a safe place but do not store it on your computer. Delete<br />
								this mail once you have logged into your account successfully!</p>
								
								<p>Kind regards,<br />
								Your ' . $config['server']['serverName'] . ' Team</p>
							</body>
						</html>';
                
                $mail = new SendMail();
                if ($mail->send($account->getEmail(), $account->getRLName(), "New Password for " . $config['server']['serverName'], "New Password for " . $config['server']['serverName'], "New Password for " . $config['server']['serverName'], $mailBody)) {
                    
                    $main_content .= '
					<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
						<TR>
							<TD BGCOLOR="#505050" CLASS=white><B>New Password Sent</B></TD>
						</TR>
						<TR>
							<TD BGCOLOR="#D4C0A1"><TABLE>
									<TR>
										<TD>A new password has been sent to the email address your account is assigned to.</TD>
									</TR>
								</TABLE>
							</TD>
						</TR>
					</TABLE>
					<BR>
					<CENTER>
						<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0>
							<FORM ACTION=?subtopic=accountmanagement METHOD=post>
								<TR>
									<TD><INPUT TYPE=image NAME="Login" ALT="Login" SRC="' . $layout_name . '/images/global/buttons/sbutton_login.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD>
								</TR>
							</FORM>
						</TABLE>
					</CENTER>';
                }
            } else {
                $main_content .= '
					<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
						<TR>
							<TD BGCOLOR="#505050" CLASS=white><B>Error</B></TD>
						</TR>
						<TR>
							<TD BGCOLOR="#D4C0A1">
								<TABLE>
									<TR>';
                $main_content .= '
										<TD>' . $error . '</TD>';
                $main_content .= '
									</TR>
								</TABLE>
							</TD>
						</TR>
					</TABLE>
					<BR>
					<CENTER>
						<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0>
							<FORM ACTION=?subtopic=lostaccount METHOD=post>
								<TR>
									<TD><INPUT TYPE=hidden NAME=step VALUE=confirmation>
										<INPUT TYPE=hidden NAME=confirmation VALUE="">
										<INPUT TYPE=hidden NAME=accountname VALUE="' . $account_name . '">
										<INPUT TYPE=hidden NAME=confirmationkey VALUE="' . $confirmationkey . '">
										<INPUT TYPE=image NAME="Back" ALT="Back" SRC="' . $layout_name . '/images/global/buttons/sbutton_back.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD>
								</TR>
							</FORM>
						</TABLE>
					</CENTER>';
            }
        }
    } else {
        $main_content .= '
			<div class="TableContainer" >
				<table class="Table1" cellpadding="0" cellspacing="0">
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>
							<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
							<div class="Text" >Lost Account?</div>
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
										<td>You can not use the lost account interface as long as you are logged in to your account.</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<br/>
			<center>
				<form action="?subtopic=accountmanagement&action=logout" method="post" style="padding:0px;margin:0px;" >
					<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_red.gif)" >
						<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
							<div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_red_over.gif);" ></div>
							<input class="ButtonText" type="image" name="Logout" alt="Logout" src="' . $layout_name . '/images/global/buttons/_sbutton_logout.gif" >
						</div>
					</div>
				</form>
			</center>';
    }
}
