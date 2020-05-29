<?php

if (!$logged) {
    $main_content .= '
		<div class="TableContainer" >
				<table class="Table1" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>
							<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
							<div class="Text">Error</div>
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
										<td>You need <a href="?subtopic=accountmanagement">login</a> first to send a ticket.</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div>';
    return;
}
/** @var $action string */
if ($action == "createticket") {
    $categories = [1 => 'Help', 2 => 'Donate', 3 => 'Suggestions', 4 => 'Report Bug', 5 => 'Claims',
        6 => 'Banishment', 7 => 'Character Problem', 8 => 'Account Problem', 9 => 'Forum',
        10 => 'Others'];
    $category = (int)$_POST['reportCategory'];
    $playerID = (string)strip_tags($_POST['reportPlayer']);
    $playerName = $playerID;
    $subject = htmlspecialchars(trim(strip_tags($_POST['reportSubject'], '<b>')));
    $description = $_POST['reportText'];
//		$date = date('M m Y', time());
    $date = date("Y-m-d H:i:s");
//		$generateId = rand(238493, 995849);
    $accid = $account_logged->getID();
    
    if ($category > 0 && $categories[$category]) {
        $category = $categories[$category];
    } else {
        $main_content .= '
			<div class="TableContainer" >
				<table class="Table1" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>
							<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
							<div class="Text">Error</div>
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
										<td>Please select a category.</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<br>
			<center>
			<a href="?subtopic=ticket"><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)">
						<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="visibility: hidden; background-image: url(&quot;' . $layout_name . '/images/global/buttons/sbutton_over.gif&quot;);"></div>
							<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif">
						</div>
					</div></a>
			</center>';
        return;
    }
    
    if (!$playerID) {
        $main_content .= '
			<div class="TableContainer" >
				<table class="Table1" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>
							<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
							<div class="Text">Error</div>
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
										<td>Invalid player ID. Please contact Administrator by email.</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<br>
			<center>
			<a href="?subtopic=ticket"><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)">
						<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="visibility: hidden; background-image: url(&quot;' . $layout_name . '/images/global/buttons/sbutton_over.gif&quot;);"></div>
							<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif">
						</div>
					</div></a>
			</center>';
        
        return;
    }
    
    if (isset($account_logged)) {
        if ($playerName == "") {
            $main_content .= '
			<div class="TableContainer" >
				<table class="Table1" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>
							<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
							<div class="Text">Error</div>
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
										<td>Invalid player name. Please contact Administrator by email.</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<br>
			<center>
			<a href="?subtopic=ticket"><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)">
						<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="visibility: hidden; background-image: url(&quot;' . $layout_name . '/images/global/buttons/sbutton_over.gif&quot;);"></div>
							<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif">
						</div>
					</div></a>
			</center>';
            return;
        }
    }
    
    if (strlen($subject) == 0 || strlen($subject) > 40) {
        $main_content .= '
			<div class="TableContainer" >
				<table class="Table1" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>
							<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
							<div class="Text">Error</div>
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
										<td>Subject is empty or have more of 40 characters</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<br>
			<center>
			<a href="?subtopic=ticket"><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)">
						<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="visibility: hidden; background-image: url(&quot;' . $layout_name . '/images/global/buttons/sbutton_over.gif&quot;);"></div>
							<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif">
						</div>
					</div></a>
			</center>';
        return;
    }
    
    if (strlen($description) == 0 || strlen($description) > 1000) {
        $main_content .= '
						<div class="TableContainer" >
				<table class="Table1" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);" ></span>
							<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);" /></span>
							<div class="Text">Error</div>
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
										<td>Description is empty or have more than 1000 characters.</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<br>
			<center>
			<a href="?subtopic=ticket"><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)">
						<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="visibility: hidden; background-image: url(&quot;' . $layout_name . '/images/global/buttons/sbutton_over.gif&quot;);"></div>
							<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif">
						</div>
					</div></a>
			</center>';
        return;
    }

    $insert = $SQL->prepare("INSERT INTO `tickets`(`ticket_subject`, `ticket_author`, `ticket_author_acc_id`,`ticket_last_reply`, `ticket_admin_reply`,`ticket_date`, `ticket_ended`, `ticket_status`, `ticket_category`, `ticket_description`) VALUES (:subject, :playerName, :accid, 'You', 0, :date, 'Not closed', 'Waiting', :category, :description)");
    $insert->execute(['subject' => $subject, 'playerName' => $playerName, 'accid' => $accid, 'date' => $date, 'category' => $category, 'description' => $description]);
    $generateId = $SQL->query("SELECT LAST_INSERT_ID() as id from `tickets`")->fetchAll()[0]['id'];
    $main_content .= '
<div class="BoxContent" style="background-image:url(' . $layout_name . '/images/global/content/scroll.gif)">
    <center>
        <table>
            <tbody>
                <tr>
                    <td><img src="' . $layout_name . '/images/global/content/headline-bracer-left.gif"></td>
                    <td style="text-align:center;vertical-align:middle;horizontal-align:center;font-size:17px;font-weight:bold;">Tickets - ' . $config['server']['serverName'] . ' Support<br></td>
                    <td><img src="' . $layout_name . '/images/global/content/headline-bracer-right.gif"></td>
                </tr>
            </tbody>
        </table>
    </center>
    <br>
    <div class="TableContainer">
        <div class="CaptionContainer">
            <div class="CaptionInnerContainer">
                <span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>
                <span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>
                <span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"> </span>
                <span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span>
                <div class="Text"> Ticket View </div>
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
                                        <td colspan="2">
                                            <div class="TableShadowContainerRightTop">
                                                <div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);"> </div>
                                            </div>
                                            <div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);">
                                                <div class="TableContentContainer">
                                                    <table class="TableContent" width="100%">
                                                        <tbody>
                                                            <tr style="background-color:#F1E0C6;">
                                                                <td class="LabelV"> Ticket </td>
                                                                <td>' . $generateId . '</td>
                                                            </tr>
                                                            <tr style="background-color:#D4C0A1;">
                                                                <td class="LabelV"> Subject </td>
                                                                <td>' . $subject . '</td>
                                                            </tr>
                                                            <tr style="background-color:#F1E0C6;">
                                                                <td class="LabelV"> Created By </td>
                                                                <td><a href="?subtopic=characters&amp;name=">' . $playerName . '</a></td>
                                                            </tr>
                                                            <tr style="background-color:#D4C0A1;">
                                                                <td class="LabelV" width="20%"> Date </td>
                                                                <td width="80%">' . $date . '</td>
                                                            </tr>
                                                            <tr style="background-color:#F1E0C6;">
                                                                <td class="LabelV" width="20%"> Ended in </td>
                                                                <td width="80%">Not Defined</td>
                                                            </tr>
                                                            <tr style="background-color:#D4C0A1;">
                                                                <td class="LabelV"> Status </td>
                                                                <td><font color="gray"><b>Waiting</b></font></td>
                                                            </tr>
                                                            <tr style="background-color:#F1E0C6;">
                                                                <td class="LabelV"> Category </td>
                                                                <td>' . $category . '</td>
                                                            </tr>
                                                            <tr style="background-color:#D4C0A1;">
                                                                <td class="LabelV"> Description </td>
                                                                <td width="70%" style="word-wrap: break-word;">
                                                                    <p>
                                                                        ' . $description . '
                                                                    </p>
                                                                </td>
                                                            </tr>
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
                                        <td width="30%">
                                            <div class="TableShadowContainerRightTop">
                                                <div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);"> </div>
                                            </div>
                                            <div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);">
                                                <div class="TableContentContainer">
                                                    <table class="TableContent" width="100%" height="80px">
                                                        <tbody>
                                                            <tr>
                                                                <td><small><strong>Name:</strong> Support System</small></td>
                                                            </tr>
                                                            <tr>
                                                                <td><small><strong>Position:</strong> Automatic Message </small></td>
                                                            </tr>
                                                            <tr>
                                                                <td><small><strong>Reply:</strong> #1 &nbsp;&nbsp;&nbsp;(02 Feb 2017)</small></td>
                                                            </tr>
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
                                        <td class="CipPost">
                                            <div class="TableShadowContainerRightTop">
                                                <div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);"> </div>
                                            </div>
                                            <div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);">
                                                <div class="TableContentContainer">
                                                    <table class="TableContent" width="100%" height="80px">
                                                        <tbody>
                                                            <tr style="background-color:#D4C0A1;">
                                                                <td>
                                                                    <div style="max-height: 80px; overflow-y: auto;">
                                                                        <small>
                                                                            <p>Olá, <b>' . $playerName . '</b>. Nossa Staff acaba de receber seu Ticket e tentará resolve-lo o mais rápido prossivel. Lembrando que o prazo múnimo para resposta do Ticket é de 24 Horas, peço que tenha paciencia e não envie inúmeras mensagens.</p>
                                                                        </small>
                                                                    </div>
                                                                </td>
                                                            </tr>
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
                                                        <td width="143px">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <form action="?subtopic=accountmanagement&amp;action=showticket&amp;do=closeticket&amp;id=' . $generateId . '" method="post"></form>
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="border:0px;">
                                                                            <div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)">
                                                                                <div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
                                                                                    <div class="BigButtonOver" style="visibility: hidden; background-image: url(&quot;' . $layout_name . '/images/global/buttons/sbutton_over.gif&quot;);"></div>
                                                                                    <input class="ButtonText" type="image" name="closeask" value="Submit" alt="Close Ticket" src="' . $layout_name . '/images/global/buttons/_sbutton_closeticket.gif">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
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
    <form action="?subtopic=ticket&amp;action=showticket&amp;do=reply&amp;id=' . $generateId . '" method="post">
        <div class="TableContainer" style="margin-top:20px">
            <div class="CaptionContainer">
                <div class="CaptionInnerContainer">
                    <span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>
                    <span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>
                    <span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"> </span>
                    <span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span>
                    <div class="Text"> Reply </div>
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
                                                    <div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);"> </div>
                                                </div>
                                                <div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);">
                                                    <div class="TableContentContainer">
                                                        <table class="TableContent" width="100%">
                                                            <tbody>
                                                                <tr style="background-color:#D4C0A1;">
                                                                    <td>
                                                                        <textarea style="width:700px; height:150px;" name="reportText"></textarea>
                                                                    </td>
                                                                </tr>
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
                                                            <td width="143px">
                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="border:0px;">
                                                                                <div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)">
                                                                                    <div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
                                                                                        <div class="BigButtonOver" style="visibility: hidden; background-image: url(&quot;' . $layout_name . '/images/global/buttons/sbutton_over.gif&quot;);"></div>
                                                                                        <input class="ButtonText" type="image" name="finish" value="Submit" src="' . $layout_name . '/images/global/buttons/_sbutton_submit.gif">
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
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
    </form>
    <br><br>
    <table border="0" width="100%">
        <tbody>
            <tr>
                <td align="center">
                    <form action="?subtopic=accountmanagement" method="post" style="padding:0px;margin:0px;" class="ng-pristine ng-valid">
                        <div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)">
                            <div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
                                <div class="BigButtonOver" style="visibility: hidden; background-image: url(&quot;' . $layout_name . '/images/global/buttons/sbutton_over.gif&quot;);"></div>
                                <input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif">
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>
    ';
    return;
}

if ($action == "showticket") {
    
    $metodo = $_GET['do'];
    $idTicket = (int)$_GET['id'];
    
    if ($metodo == 'closeticket') {
        $date = date('M m Y', time());
        $query = $SQL->prepare("UPDATE tickets SET ticket_status = 'Closed', ticket_ended = '$date' WHERE ticket_id = :idticket");
        $query->execute(['idticket' => $idTicket]);
    }
    
    if ($metodo == 'reply') {
        $idTicket = $_GET['id'];
        $mensagem = $_POST['reportText'];
        $date = date("Y-m-d H:i:s");
        $dadosTicket = $SQL->prepare("SELECT * FROM tickets WHERE ticket_id = :idticket");
        $dadosTicket->execute(['idticket' => $idTicket]);
        
        
        if (strlen($mensagem) < 10 || strlen($mensagem) > 1000) {
            $main_content .= "<center><h2>Description need to have 10 up to 1000 characters.</h2></center>";
            
        } else {
            foreach ($dadosTicket as $resultado) {
                $replyAuthor = $resultado['ticket_author'];
                $replyAuthorId = $resultado['ticket_author_acc_id'];
            }
            
            if ($replyAuthorId == $account_logged->getID()) {
                $replyAuthorTrue = $replyAuthor;
            } else {
                if ($group_id_of_acc_logged >= $config['site']['access_admin_panel']) {
                    $players_from_logged_acc = $account_logged->getPlayersList();
                    foreach ($players_from_logged_acc as $player) {
                        if ($player->getGroupID() == 5) {
                            $replyAuthorTrue = $player->getName();
                        }
                    }
                }
            }
            
            $query = $SQL->prepare("INSERT INTO `tickets_reply`(`ticket_id`, `reply_author`, `reply_message`, `reply_date`) VALUES ( :idticket, :replyAuthorTrue, :msg, :date )");
            $query->execute(['idticket' => $idTicket, 'replyAuthorTrue' => $replyAuthorTrue, 'msg' => $mensagem, 'date' => $date]);
            if ($group_id_of_acc_logged >= $config['site']['access_admin_panel']) {
                $query = $SQL->prepare("UPDATE `tickets` SET `ticket_last_reply` = 'Staff', `ticket_admin_reply` = 1 WHERE ticket_id = :id");
                $query->execute(['id'=>$idTicket]);
            } else {
                $SQL->prepare("UPDATE `tickets` SET `ticket_admin_reply` = 0, `ticket_last_reply`= 'You' WHERE ticket_id = :id");
                $query->execute(['id'=>$idTicket]);
            }
        }
    }
    
    $ticket = $SQL->prepare("SELECT * FROM tickets WHERE ticket_id = :idticket");
    $ticket->execute(['idticket' => $idTicket]);
    foreach ($ticket as $result) {
        $subject = $result['ticket_subject'];
        $playerName = $result['ticket_author'];
        $date = $result['ticket_date'];
        $ended = $result['ticket_ended'];
        $status = $result['ticket_status'];
        $category = $result['ticket_category'];
        $description = $result['ticket_description'];
        $authorid = $result['ticket_author_acc_id'];
    }
    
    if ($authorid != $account_logged->getID()) {
        if ($group_id_of_acc_logged >= $config['site']['access_admin_panel']) {
        
        } else {
            return;
        }
    }
    
    $main_content .= '<div class="BoxContent" style="background-image:url(' . $layout_name . '/images/global/content/scroll.gif)">
		<center>
				<table>
					<tbody>
						<tr>
							<td><img src="' . $layout_name . '/images/global/content/headline-bracer-left.gif"></td>
							<td style="text-align:center;vertical-align:middle;horizontal-align:center;font-size:17px;font-weight:bold;">Tickets - ' . $config['server']['serverName'] . ' Support<br></td>
							<td><img src="' . $layout_name . '/images/global/content/headline-bracer-right.gif"></td>
						</tr>
					</tbody>
				</table>
			</center>
			<br>
							<div class="TableContainer">
					<div class="CaptionContainer">
							<div class="CaptionInnerContainer"> 
								<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>
								<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>
								<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"> </span>
								<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span>								
								<div class="Text"> Ticket View </div>
								<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span>
								<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>
							</div>
						</div><table class="Table3" cellpadding="0" cellspacing="0">
						
						<tbody><tr>
							<td><div class="InnerTableContainer">
									<table style="width:100%;"><tbody><tr>
											<td colspan="2"><div class="TableShadowContainerRightTop">
													<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);"> </div>
												</div>
												<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);">
													<div class="TableContentContainer">
																<table class="TableContent" width="100%">
															<tbody><tr style="background-color:#F1E0C6;">
																<td class="LabelV"> Ticket </td>
																<td>' . $idTicket . '</td>
															</tr>
															<tr style="background-color:#D4C0A1;">
																<td class="LabelV"> Subject </td>
																<td>' . $subject . '</td>
															</tr>
															<tr style="background-color:#F1E0C6;">
																<td class="LabelV"> Created By </td>
																<td><a href="?subtopic=characters&amp;name=">' . $playerName . '</a></td>
															</tr>
															<tr style="background-color:#D4C0A1;">
																<td class="LabelV" width="20%"> Date </td>
																<td width="80%">' . $date . '</td>
															</tr>
															<tr style="background-color:#F1E0C6;">
																<td class="LabelV" width="20%"> Ended in </td>
																<td width="80%">' . $ended . '</td>
																</tr>
															<tr style="background-color:#D4C0A1;"><td class="LabelV"> Status </td>';
    
    if ($status == 'Waiting') {
        $main_content .= '<td><font color="gray"><b>' . $status . '</b></font></td>';
    }
    if ($status == 'Closed') {
        $main_content .= '<td><font color="red"><b>' . $status . '</b></font></td>';
    }
    $main_content .= '
															</tr>
															<tr style="background-color:#F1E0C6;">
																<td class="LabelV"> Category </td>
																<td>' . $category . '</td>
															</tr>
															<tr style="background-color:#D4C0A1;">
																<td class="LabelV"> Description </td>
																<td width="70%" style="word-wrap: break-word;">
																<p>
																	' . $description . '
																</p>
															</td>
															</tr>
														</tbody></table>
													</div>
												</div>
												<div class="TableShadowContainer">
													<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);">
														<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);"></div>
														<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);"></div>
													</div>
												</div>
											</td>
										</tr>';
    $ticketReply = $SQL->prepare("SELECT * FROM `tickets_reply` WHERE `ticket_id` = :id");
    $ticketReply->execute(['id'=>$idTicket]);
    $index = 1;
    
    if ($ticketReply) {
        foreach ($ticketReply as $resultadoReply) {
            $player = new Player();
            $player->find($resultadoReply['reply_author']);
            $main_content .= '
                                                                        <tr>
                                                                                    <td width="30%">
                                                                                        <div class="TableShadowContainerRightTop">
                                                                                            <div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);"> </div>
                                                                                        </div>
                                                                                        <div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);">
                                                                                            <div class="TableContentContainer">														
                                                                                                <table class="TableContent" width="100%" height="80px">
                                                                                                    <tbody><tr>
                                                                                                        <td><small><strong>Name:</strong> <a href="?subtopic=characters&amp;name=">' . $resultadoReply['reply_author'] . '</a></small></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><small><strong>Position:</strong>&nbsp' . htmlspecialchars(Website::getGroupName($player->getGroup())) . '</small></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><small><strong>Reply:</strong> #' . $index . ' &nbsp;&nbsp;&nbsp;' . $resultadoReply['reply_date'] . '</small></td>
                                                                                                    </tr>
                                                                                                </tbody></table>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="TableShadowContainer">
                                                                                            <div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);">
                                                                                                <div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);"></div>
                                                                                                <div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="CipPost">
                                                                                        <div class="TableShadowContainerRightTop">
                                                                                            <div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);"> </div>
                                                                                        </div>
                                                                                        <div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);">
                                                                                            <div class="TableContentContainer"><table class="TableContent" width="100%" height="80px">
                                                                                                    <tbody><tr style="background-color:#D4C0A1;">
                                                                                                        <td><div style="max-height: 80px; overflow-y: auto;"><small>
                                                                                                            ' . $resultadoReply['reply_message'] . '
                                                                                                            </small></div></td>
                                                                                                    </tr>
                                                                                                </tbody></table></div>
                                                                                        </div>
                                                                                        <div class="TableShadowContainer">
                                                                                            <div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);">
                                                                                                <div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);"></div>
                                                                                                <div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                        </tr>';
            $index++;
        }
    }
    $main_content .= '
										<tr>
												<td>
													<table class="InnerTableButtonRow" cellpadding="0" cellspacing="0">
														<tbody><tr>
															<td width="143px"><table border="0" cellspacing="0" cellpadding="0">
															
																
																	<form action="?subtopic=ticket&amp;action=showticket&amp;do=closeticket&amp;id=' . $idTicket . '" method="post">
																	
																	<tbody>';
    if ($status <> 'Closed') {
        $main_content .= '
																	<tr>
																		<td style="border:0px;"><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)">
																				<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="visibility: hidden; background-image: url(&quot;' . $layout_name . '/images/global/buttons/sbutton_over.gif&quot;);"></div>
																					<input class="ButtonText" type="image" name="closeask" value="Submit" alt="Close Ticket" src="' . $layout_name . '/images/global/buttons/_sbutton_closeticket.gif">
																				</div>
																			</div>
																		</td>
																	</tr>';
    }
    $main_content .= ' </form></tbody>
																
																</table>
															</td>
														</tr>
													</tbody></table>
												</td>
											</tr>
										</tbody>
										
												</table>
								</div>
							</td>
						</tr>
					</tbody></table></div>';
    
    if ($status != 'Closed') {
        $main_content .= '
					<form action="?subtopic=ticket&amp;action=showticket&amp;do=reply&amp;id=' . $idTicket . '" method="post">
						<div class="TableContainer" style="margin-top:20px">
							<div class="CaptionContainer">
									<div class="CaptionInnerContainer"> 
										<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>
										<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>
										<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"> </span>
										<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span>
										<div class="Text"> Reply </div>
										<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span>
										<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"></span>
										<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>
										<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>
									</div>
								</div><table class="Table3" cellpadding="0" cellspacing="0">
								
								<tbody><tr>
									<td>
										<div class="InnerTableContainer">
											<table style="width:100%;">
												<tbody><tr>
													<td>
														<div class="TableShadowContainerRightTop">
															<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);"> </div>
														</div>
														<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);">
															<div class="TableContentContainer">
																<table class="TableContent" width="100%">
																	<tbody><tr style="background-color:#D4C0A1;">
																		<td>
																			<textarea style="width:700px; height:150px;" name="reportText"></textarea>
																		</td>
																	</tr>
																</tbody></table>
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
													<td><table class="InnerTableButtonRow" cellpadding="0" cellspacing="0">
															<tbody><tr>
																<td width="143px">
																	<table border="0" cellspacing="0" cellpadding="0">
																		<tbody><tr>
																			<td style="border:0px;">
																				<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)">
																					<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="visibility: hidden; background-image: url(&quot;' . $layout_name . '/images/global/buttons/sbutton_over.gif&quot;);"></div>
																						<input class="ButtonText" type="image" name="finish" value="Submit" src="' . $layout_name . '/images/global/buttons/_sbutton_submit.gif">
																					</div>
																				</div>
																			</td>
																		</tr>
																	</tbody></table>
																</td>
															</tr>
														</tbody></table>
													</td>
												</tr>
											</tbody></table>
										</div>
									</td>
								</tr>
							</tbody></table>
						</div>
					</form>';
    }
    
    $main_content .= '<br><br>
				<table border="0" width="100%">
				<tbody><tr>
				<td align="center">
						<form action="?subtopic=accountmanagement" method="post" style="padding:0px;margin:0px;" class="ng-pristine ng-valid">
							<div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)">
								<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="visibility: hidden; background-image: url(&quot;' . $layout_name . '/images/global/buttons/sbutton_over.gif&quot;);"></div>
									<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif">
								</div>
							</div>
						</form>
					</td>
				</tr>
			</tbody></table></div>';
    return;
    
}

if ($action == '') {
    $main_content .= '
	<div class="BoxContent" style="background-image:url(' . $layout_name . '/images/global/content/scroll.gif)">

			<center>
				<table>
					<tbody>
						<tr>
							<td><img src="' . $layout_name . '/images/global/content/headline-bracer-left.gif"></td>
							<td style="text-align:center;vertical-align:middle;horizontal-align:center;font-size:17px;font-weight:bold;">Tickets - ' . $config['server']['serverName'] . ' Support<br></td>
							<td><img src="' . $layout_name . '/images/global/content/headline-bracer-right.gif"></td>
						</tr>
					</tbody>
				</table>
			</center>
			<br>
					<p>This is the support area, use in their favor, to get support on various issues. All fields are mandatory.</p><form action="?subtopic=ticket&amp;action=createticket" method="post" style="padding:0px;margin:0px;">
					<input type="hidden" name="dateTicket" value="1486059963">
					<input type="hidden" name="identificationTicket" value="24DD240">
					<div class="TableContainer">
						<div class="CaptionContainer">
								<div class="CaptionInnerContainer"> 
									<span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>
									<span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>
									<span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"></span>
									<span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span>
									<div class="Text">Tickets</div>
									<span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span>
									<span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"></span>
									<span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>
									<span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>
								</div>
							</div><table class="Table3" cellpadding="0" cellspacing="0"><tbody><tr>
								<td>
									<div class="InnerTableContainer">
										<table>
											<tbody><tr>
												<td>
													<table width="100%">
														<tbody><tr>
															<td>
																<div class="TableShadowContainerRightTop">
																	<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);"></div>
																</div>
																<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);">
																	<div class="TableContentContainer">
																		<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																			<tbody><tr>
																				<td class="LabelV" width="30%">Category:</td>
																				<td>
																					<select name="reportCategory">
																					<option value="">Select</option>
																					<option value="1">Help</option>
																					<option value="2">Donate</option>
																					<option value="3">Suggestions</option>
																					<option value="4">Report Bug</option>
																					<option value="5">Claims</option>
																					<option value="6">Banishment</option>
																					<option value="7">Character Problem</option>
																					<option value="8">Account Problem</option>
																					<option value="9">Forum</option>
																					<option value="10">Others</option>
																				</select>
																				</td>
																			</tr>
																		</tbody></table>
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
																<div class="TableShadowContainerRightTop">
																	<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);"></div>
																</div>
																<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);">
																	<div class="TableContentContainer">
																		<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																			<tbody><tr>
																				<td class="LabelV" width="30%">Character</td>
																				<td>
																					<select name="reportPlayer">';
    
    if (isset($account_logged)) {
        $characters = $account_logged->getPlayersList();
        foreach ($characters as $char) {
            $main_content .= '<option value="' . $char->getName() . '">' . $char->getName() . '</option>';
        }
    }
    $main_content .= '
																					</select>
																				</td>
																			</tr>
																		</tbody></table>
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
																<div class="TableShadowContainerRightTop">
																	<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);"></div>
																</div>
																<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);">
																	<div class="TableContentContainer">
																		<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																			<tbody><tr>
																				<td class="LabelV" width="30%">Subject:</td>
																				<td><input type="text" name="reportSubject" maxlength="20" value=""></td>
																			</tr>
																		</tbody></table>
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
																<div class="TableShadowContainerRightTop">
																	<div class="TableShadowRightTop" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);"></div>
																</div>
																<div class="TableContentAndRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);">
																	<div class="TableContentContainer">
																		<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																			<tbody><tr>
																				<td class="LabelV" width="30%">Description:</td>
																				<td>
																					<textarea style="width:600px; height:150px;" name="reportText"></textarea>
																				</td>
																			</tr>
																		</tbody></table>
																	</div>
																</div>
																<div class="TableShadowContainer">
																	<div class="TableBottomShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);">
																		<div class="TableBottomLeftShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);"></div>
																		<div class="TableBottomRightShadow" style="background-image:url(' . $layout_name . '/images/global/content/table-shadow-br.gif);"></div>
																	</div>
																	<br>
																	<center>
																	<input type="hidden" name="save" value="ticket">
																		<div class="MediumButtonBackground" style="background-image:url(' . $layout_name . '/images/global/buttons/mediumbutton.gif)" onmouseover="MouseOverMediumButton(this);" onmouseout="MouseOutMediumButton(this);"><div class="MediumButtonOver" style="visibility: hidden; background-image: url(' . $layout_name . '/images/global/buttons/mediumbutton-over.gif);" onmouseover="MouseOverMediumButton(this);" onmouseout="MouseOutMediumButton(this);"></div>
																		<input class="MediumButtonText" type="image" name="submit" value="Submit" alt="Open Ticket" src="' . $layout_name . '/images/global/buttons/create_ticket.png"></div>
																	</div>
																	</center>
															</td>
														</tr>
													</tbody></table>
												</td>
											</tr>
										</tbody></table>
									</div>
								</td></tr></tbody></table>
							</div></form>
					<br>
				<table border="0" width="100%">
					<tbody><tr>
						<td align="center">
							<table border="0" cellspacing="0" cellpadding="0">
								<form action="?subtopic=accountmanagement" method="post">
									<tbody><tr>
										<td style="border:0px;"><div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)">
												<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="visibility: hidden; background-image: url(&quot;' . $layout_name . '/images/global/buttons/sbutton_over.gif&quot;);"></div>
													<input class="ButtonText" type="image" name="Back" alt="Back" src="' . $layout_name . '/images/global/buttons/_sbutton_back.gif">
												</div>
											</div>
											</form>
										</td>
									</tr>					
								</tbody>							
							</table>
						</td>
					</tr>
				</tbody></table></div>
	';
}