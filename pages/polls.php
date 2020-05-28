<?php 
if(!defined('INITIALIZED'))
	exit;
/* Polls System By Averatec from pervera.pl & otland.net */ 

if($logged) { 
    $link = "polls"; // your link to polls in index.php 
    $dark = $config['site']['darkborder']; 
    $light = $config['site']['lightborder']; 
    $color[] = 'red'; // for <15%
    $color[] = 'orange'; // for <35%
    $color[] = 'yellow'; // for <=50%
    $color[] = 'green'; // for >50%
    $time = time(); 
    $POLLS = $SQL->query('SELECT * FROM '.$SQL->tableName('z_polls').''); 
    $level = 120; // need level to vote 

    function color($number, $color1, $color2, $color3, $color4) 
    { 
        if($number < 15) 
        return '<font color='.$color1.'><b>'.$number.'%</b></font>'; 
        elseif($number < 35 and $number >= 15) 
        return '<font color='.$color2.'><b>'.$number.'%</b></font>'; 
        elseif($number <= 50 and $number >=35) 
        return '<font color='.$color3.'><b>'.$number.'%</b></font>'; 
        elseif($number > 50) 
        return '<font color='.$color4.'><b>'.$number.'%</b></font>'; 
    } 
     
    /* Checking Account */ 
    $account_players = $account_logged->getPlayers(); 
    foreach($account_players as $player) 
    { 
        $player = $player->getLevel(); 
        if($player >= $level) 
        $allow=true;         
    } 
     
    if(empty($_REQUEST['id']) and $_REQUEST['control'] != "true")  // list of polls 
    { 
        $active = $SQL->query('SELECT * FROM `z_polls` where `end` > '.$time.''); // active polls 
        $closed = $SQL->query('SELECT * FROM `z_polls` where `end` < '.$time.' order by `end` desc'); // closed polls 
        /* Active Polls */ 
        $main_content .= '<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><TR BGCOLOR='.$config['site']['vdarkborder'].'><TD COLSPAN=2 CLASS=white><B>Active Polls</B></TD></TR>'; 
        if(is_int($number_of_rows / 2)) { $bgcolor = $dark; } else { $bgcolor = $light; } $number_of_rows++; 
        $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><td width=75%><b>Topic</b></td><td><b>End</b></td></tr>'; 
        if(is_int($number_of_rows / 2)) { $bgcolor = $dark; } else { $bgcolor = $light; } $number_of_rows++; 
        foreach($active as $poll) 
        { 
            $main_content .= '<tr BGCOLOR="'.$bgcolor.'"><td><a href="?subtopic='.$link.'&id='.$poll['id'].'">'.$poll['question'].'</a></td><td>'.date("M j Y", $poll['end']).'</td></tr>'; 
            $empty_active = true; 
        } 
         
        if(!$empty_active) 
        { 
            $main_content .= '<tr BGCOLOR="'.$bgcolor.'"><td colspan=2><center><i>Don\'t have open polls.</i></center></td></tr>'; 
        } 
         
        $main_content .= "</table><br><br>"; 
        /* Closed Polls */ 
        $main_content .= '<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><TR BGCOLOR='.$config['site']['vdarkborder'].'><TD COLSPAN=2 CLASS=white><B>Closed Polls</B></TD></TR>'; 
        if(is_int($number_of_rows / 2)) { $bgcolor = $dark; } else { $bgcolor = $light; } $number_of_rows++; 
        $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><td width=75%><b>Topic</b></td><td><b>End</b></td></tr>'; 
        if(is_int($number_of_rows / 2)) { $bgcolor = $dark; } else { $bgcolor = $light; } $number_of_rows++; 
        foreach($closed as $poll) 
        { 
            $main_content .= '<tr BGCOLOR="'.$bgcolor.'"><td><a href="?subtopic='.$link.'&id='.$poll['id'].'">'.$poll['question'].'</a></td><td>'.date("M j Y", $poll['end']).'</td></tr>'; 
            $empty_closed = true; 
        } 
         
        if(!$empty_closed) 
        { 
            $main_content .= '<tr BGCOLOR="'.$bgcolor.'"><td colspan=2><center><i>Don\'t have closed polls.</i></center></td></tr>'; 
        } 
         
        $main_content .= "</table>"; 
        $showed=true; 
    } 
     
    if(!empty($_REQUEST['id']) and $_REQUEST['control'] != "true") 
    { 
        foreach($POLLS as $POLL) 
        { 
            if($_REQUEST['id'] == $POLL['id']) 
            { 
                $ANSWERS = $SQL->query('SELECT * FROM '.$SQL->tableName('z_polls_answers').' where `poll_id` = '.addslashes(htmlspecialchars(trim($_REQUEST['id']))).' order by `answer_id`'); 
                $votes_all = $POLL['votes_all']; 
                 
                if($votes_all == 0) 
                { 
                    $i=1; 
                    foreach($ANSWERS as $answer) 
                    { 
                        $percent[$i] = 0; 
                        $i++; 
                    } 
                } 
                else 
                { 
                    $i=1; 
                    foreach($ANSWERS as $answer) 
                    { 
                        $percent[$i] = round(((100*$answer['votes'])/$votes_all),2); 
                        $i++; 
                    } 
                } 
                 
                if($POLL['end'] > $time) // active poll 
                { 
                    if($_REQUEST['vote'] == true and $allow == true) 
                    { 
                        if($account_logged->getCustomField('vote') < $_REQUEST['id'] and !empty($_POST['answer'])) 
                        { 
                            if(isset($_POST['continue'])) 
                            { 
                                $vote = addslashes(htmlspecialchars(trim($_REQUEST['id']))); 
                                $account_logged->setCustomField("vote", $vote); 
                                $UPDATE_poll = $SQL->query('UPDATE `z_polls` SET `votes_all` = `votes_all` + 1 where `id` = '.addslashes(htmlspecialchars(trim($_REQUEST['id']))).''); 
                                $UPDATE_answer = $SQL->query('UPDATE `z_polls_answers` SET `votes` = `votes` + 1 where `answer_id` = '.addslashes(htmlspecialchars(trim($_POST['answer']))).' and`poll_id` = '.addslashes(htmlspecialchars(trim($_REQUEST['id']))).''); 
                                header('Location: index.php?subtopic='.$link.'&id='.$_REQUEST['id'].''); 
                            } 
                        } 
                        else 
                        { 
                            header('Location: index.php?subtopic='.$link.'&id='.$_REQUEST['id'].''); 
                        } 
                    } 
                     
                    if($account_logged->getCustomField('vote') < $_REQUEST['id'] and $allow == true) 
                    { 
                        $main_content .= '<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><TR BGCOLOR='.$config['site']['vdarkborder'].'><TD COLSPAN=2 CLASS=white><B>Vote</B></TD></TR>'; 
                        $main_content .= '<TR BGCOLOR="'.$dark.'"><td COLSPAN=2 CLASS=white><b>'.$POLL['question'].'</b></td></tr> 
                        <form action="index.php?subtopic='.$link.'&id='.$_REQUEST['id'].'&vote=true" method="POST"> '; 
                        $ANSWERS_input = $SQL->query('SELECT * FROM '.$SQL->tableName('z_polls_answers').' where `poll_id` = '.$_REQUEST['id'].' order by `answer_id`'); 
                        $i=1; 
                        foreach($ANSWERS_input as $answer) 
                        { 
                            if(is_int($i / 2)) { 
                                $bgcolor = $dark; 
                            } 
                            else 
                            { 
                                $bgcolor = $light; 
                            } 
                            $main_content .= '<tr BGCOLOR="'.$bgcolor.'"><td><input type=radio name=answer value="'.$i.'">'.$answer['answer'].'</td></tr>'; 
                            $i++; 
                        } 
                        $main_content .= '</table><input type="submit" name="continue" value="Submit" class="input2" /></form><br><br>'; 
                    } 
                    elseif($account_logged->getCustomField('vote') >= $_REQUEST['id']) 
                    { 
                        $result[] = '<br><b>You have already voted.</b><br>'; 
                    } 
                     
                    $result[] = '<br>All players with a character of at least level '.$level.' may vote.<br>'; 

                    $main_content .= '<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><TR BGCOLOR='.$config['site']['vdarkborder'].'><TD COLSPAN=3 CLASS=white><B>Results</B></TD></TR>'; 
                    $main_content .= '<TR BGCOLOR="'.$dark.'"><td COLSPAN=3 CLASS=white><b>'.$POLL['question'].'</b></td></tr>'; 
                    $ANSWERS_show = $SQL->query('SELECT * FROM '.$SQL->tableName('z_polls_answers').' where `poll_id` = '.$_REQUEST['id'].' order by `answer_id`'); 
                    $i=1; 
                    foreach($ANSWERS_show as $answer) 
                    { 
                        if(is_int($i / 2)) { 
                            $bgcolor = $dark; 
                        } 
                        else 
                        { 
                            $bgcolor = $light; 
                        } 
                        $x=0; 
                        $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><td width=60%>'.$answer['answer'].'</td><td width=20%><img src="bar.php?long='.(int) $percent[$i].'"></td><td>'.$answer['votes'].'('.color($percent[$i], $color[0], $color[1], $color[2], $color[3]).')</td></tr>'; 
                        $i++; 
                    } 
                    $main_content .= '</table>'; 
                     
                    foreach($result as $error) 
                    { 
                        $main_content .= $error; 
                    } 
                     
                    $main_content .= '<br>The poll started at '.date("M j Y", $POLL['start']).'<br>'; 
                    $main_content .= 'The poll will end at '.date("M j Y", $POLL['end']).'<br>'; 
                    $main_content .= '<br>Total votes <b>'.$POLL['votes_all'].'</b><br>';                     
                     
                } 
                else // closed poll 
                { 
                    $main_content .= '<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><TR BGCOLOR='.$config['site']['vdarkborder'].'><TD COLSPAN=3 CLASS=white><B>Results</B></TD></TR>'; 
                    $main_content .= '<TR BGCOLOR="'.$dark.'"><td COLSPAN=3 CLASS=white><b>'.$POLL['question'].'</b></td></tr>'; 
                    $ANSWERS_show = $SQL->query('SELECT * FROM '.$SQL->tableName('z_polls_answers').' where `poll_id` = '.$_REQUEST['id'].' order by `answer_id`'); 
                    $i=1; 
                    foreach($ANSWERS_show as $answer) 
                    { 
                        if(is_int($i / 2)) { 
                            $bgcolor = $dark; 
                        } 
                        else 
                        { 
                            $bgcolor = $light; 
                        } 
                        $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><td width=60%>'.$answer['answer'].'</td><td width=20%><img src="bar.php?long='.(int) $percent[$i].'"></td><td>'.$answer['votes'].'('.color($percent[$i], $color[0], $color[1], $color[2], $color[3]).')</td></tr>'; 
                        $i++; 
                    } 
                    $main_content .= '</table><br><br>'; 
                     
                    $main_content .= '<br>The poll started at '.date("M j Y", $POLL['start']).'<br>'; 
                    $main_content .= 'The poll ended at '.date("M j Y", $POLL['end']).'<br>'; 
                    $main_content .= '<br>Total votes <b>'.$POLL['votes_all'].'</b><br>'; 
                     
                } 
                $showed=true; 
                $main_content .= '<div class=\'hr1\'></div><a href="index.php?subtopic='.$link.'"><font size="2"><b>Go to list of polls</b></font></a>'; 
            } 
        } 
    } 
     
    if($group_id_of_acc_logged >= $config['site']['access_admin_panel'] and $_REQUEST['control'] != "true") 
    { 
        $main_content .= '<br><a href="?subtopic='.$link.'&control=true"><b>Panel Control</b></a><br><br>'; 
    } 
     
    /* Control Panel - Only Add Poll Function */ 
      
    if($group_id_of_acc_logged >= $config['site']['access_admin_panel'] and $_REQUEST['control'] == "true") 
    { 
        if(isset($_POST['submit'])) 
        { 
            $_SESSION['answers'] = $_POST['answers']; 
            $main_content .= '<form method="post" action=""><b><font size=3>Adding Poll</font></b><br><br> 
            <input type=text name=question value="" /> Question<br> 
            <input type=text name=end value="" /> Time to end, in days<br>'; 
             
            for( $x = 1; $x <= $_SESSION['answers']; $x++ ) 
            { 
                $main_content .= '<input type=text name='.$x.' value="" /> Answer no. '.$x.'<br>'; 
            } 
            $main_content .= '<input type="submit" name="finish" value="Submit" class="input2"/></form><br><br>'; 
            $show=true; 
        } 

        if(isset($_POST['finish'])) 
        { 
                $id = $SQL->query('SELECT MAX(id) FROM `z_polls`')->fetch(); 
                $id_next = $id[0] + 1; 
                 
                for( $x = 1; $x <= $_SESSION['answers']; $x++ ) 
                { 
                    $INSERT_answer = $SQL->query('INSERT INTO `z_polls_answers` (`poll_id`,`answer_id`,`answer`) VALUES ('.$SQL->quote($id_next).','.$SQL->quote($x).','.$SQL->quote($_POST[$x]).')'); 
                } 
                $end = $time+24*60*60*$_POST['end']; 
                $INSERT_poll = $SQL->query('INSERT INTO `z_polls` (`id`,`question`,`end`,`answers`,`start`) VALUES ('.$SQL->quote($id_next).','.$SQL->quote($_POST['question']).','.$SQL->quote($end).','.$SQL->quote($_SESSION['answers']).','.$SQL->quote($time).')'); 
        } 
             
        $POLLS_check = $SQL->query('SELECT MAX(end) FROM '.$SQL->tableName('z_polls').''); 
        foreach($POLLS_check as $checked) 
        { 
            if($checked[0] > $time) 
            $check=true; 
            else 
            $check=false; 
        } 
        if(!$show) 
        { 
            if(!$check) 
            { 
                $main_content .= '<form method="post" action=""><b><font size=3>Adding Poll</font></b><br><br> 
                <input type=text name=answers value="" /> Number of Answers<br> 
                <input type="submit" name="submit" value="Submit" class="input2"/></form><br><br>'; 
            } 
            else 
            { 
                $main_content .= '<b><font size=3><br>Cannot be two and more active polls.<br><br></font></b>'; 
            } 
        } 
        $showed=true; 
        $main_content .= '<br><div class=\'hr1\'></div><a href="index.php?subtopic='.$link.'"><font size="2"><b>Go to list of polls</b></font></a>'; 
    } 
     
    if(!$showed) 
    { 
        $main_content .= 'This poll doesn\'t exist.<br>'; 
        $main_content .= '<div class=\'hr1\'></div><a href="index.php?subtopic='.$link.'"><font size="2"><b>Go to list of  polls</b></font></a>'; 
    } 
     
} 
else 
{ 
        $main_content .= '
			Please enter your account number and your password.<br/>
			<a href="?subtopic=createaccount" >Create an account</a> if you do not have one yet.<br/>
			<br/>
			<form action="?subtopic=polls&id='.$_REQUEST['id'].'" method="post" >
				<div class="TableContainer" >
					<table class="Table1" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>								
								<div class="Text" >Account Login</div>
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
											<td class="LabelV" ><span >Account Number:</span></td>
											<td style="width:100%;" ><input type="password" name="account_login" SIZE="10" maxlength="10" ></td>
										</tr>
										<tr>
											<td class="LabelV" ><span >Password:</span></td>
											<td><input type="password" name="password_login" size="30" maxlength="29" ></td>
										</tr>
									</table>
								</div>
							</table>
						</div>
					</td>
				</tr>
				<br/>
				<table width="100%" >
				<tr align="center" >
					<td><table border="0" cellspacing="0" cellpadding="0" >
						<tr>
							<td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
									<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
										<input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/global/buttons/_sbutton_submit.gif" >
									</div>
								</div>
							</td>						
						<tr>
					</form>
				</table>
			</td>
			<td><table border="0" cellspacing="0" cellpadding="0" >
					<form action="?subtopic=lostaccount" method="post" >
						<tr>
							<td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
									<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
										<input class="ButtonText" type="image" name="Account lost?" alt="Account lost?" src="'.$layout_name.'/images/global/buttons/_sbutton_accountlost.gif" >
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