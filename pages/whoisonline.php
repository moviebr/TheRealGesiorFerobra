<?php
if(!defined('INITIALIZED'))
	exit;

if(!isset($_REQUEST['order']))
	$order = "name_asc";
else $order = $_REQUEST['order'];

$orderico = explode("_",$order);

switch($order) {
	case "name_desc":
		$ordername = "name";
		$orderby = "DESC";
		break;
	case "level_asc":
		$ordername = "level";
		$orderby = "ASC";
		break;
	case "level_desc":
		$ordername = "level";
		$orderby = "DESC";
		break;
	case "vocation_asc":
		$ordername = "vocation";
		$orderby = "ASC";
		break;
	case "vocation_desc":
		$ordername = "vocation";
		$orderby = "DESC";
		break;
	default:
		$ordername = "name";
		$orderby = "ASC";
		break;
}

$players_online_data = $SQL->query('SELECT ' . $SQL->tableName('accounts') . '.' . $SQL->fieldName('flag') . ', ' . $SQL->tableName('players') . '.' . $SQL->fieldName('name') . ', ' . $SQL->tableName('players') . '.' . $SQL->fieldName('vocation') . ', ' . $SQL->tableName('players') . '.' . $SQL->fieldName('level') . ', ' . $SQL->tableName('players') . '.' . $SQL->fieldName('skull') . ', ' . $SQL->tableName('players') . '.' . $SQL->fieldName('looktype') . ', ' . $SQL->tableName('players') . '.' . $SQL->fieldName('lookaddons') . ', ' . $SQL->tableName('players') . '.' . $SQL->fieldName('lookhead') . ', ' . $SQL->tableName('players') . '.' . $SQL->fieldName('lookbody') . ', ' . $SQL->tableName('players') . '.' . $SQL->fieldName('looklegs') . ', ' . $SQL->tableName('players') . '.' . $SQL->fieldName('lookfeet') . ' FROM ' . $SQL->tableName('accounts') . ', ' . $SQL->tableName('players') . ', ' . $SQL->tableName('players_online') . ' WHERE ' . $SQL->tableName('players') . '.' . $SQL->fieldName('id') . ' = ' . $SQL->tableName('players_online') . '.' . $SQL->fieldName('player_id') . ' AND ' . $SQL->tableName('accounts') . '.' . $SQL->fieldName('id') . ' = ' . $SQL->tableName('players') . '.' . $SQL->fieldName('account_id') . ' ORDER BY ' . $SQL->fieldName($ordername). ' '. $orderby)->fetchAll();

$number_of_players_online = 0;
$players_rows = '';

if($config['server']['worldType'] == "pvp") {
	$serverType = "Open PvP";
	$icon = "open";
}
if($config['server']['worldType'] == "no-pvp") {
	$serverType = "Optional PvP";
	$icon = "optional";
}
if($config['server']['worldType'] == "pvp-enforced") {
	$serverType = "Hardcore PvP";
	$icon = "hardcore";
}


foreach($players_online_data as $player) {
	$bgcolor = (($number_of_players_online++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
	$players_rows .= '
		<tr bgcolor="' . $bgcolor . '" style="text-align:right;" >
			<td style="width:70%;text-align:left;" ><a href="?subtopic=characters&name=' . urlencode($player['name']) . '" >' . htmlspecialchars($player['name']) . '</a></td>
			<td style="width:10%;" >' . $player['level'] . '</td>
			<td style="width:20%;" >' . htmlspecialchars($vocation_name[$player['vocation']]) . '</td>
		</tr>';
}

$main_content .= '
<form action="./?subtopic=worlds" method="post">
   <div class="TableContainer">
      <div class="CaptionContainer">
         <div class="CaptionInnerContainer">
            <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>        
            <div class="Text">World Selection</div>
            <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span>      
         </div>
      </div>
      <table class="Table1" cellpadding="0" cellspacing="0">
         <tbody>
            <tr>
               <td>
                  <div class="InnerTableContainer">
                     <table style="width:100%;">
                        <tbody>
                           <tr>
                              <td style="vertical-align:middle;" class="LabelV150">World Name:</td>
                              <td style="width:170px;">
                                 <select size="1" name="world" style="width:165px;">
                                    <option value="'.$config["server"]["serverName"].'" selected="selected">'.$config["server"]["serverName"].'</option>
                                 </select>
                              </td>
                              <td style="text-align:left;">
                                 <div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)">
                                    <div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
                                       <div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);"></div>
                                       <input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/global/buttons/_sbutton_submit.gif">
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
</form>
</br>

	<div class="TableContainer" >
		<table class="Table1" cellpadding="0" cellspacing="0">
			<div class="CaptionContainer" >
				<div class="CaptionInnerContainer" > 
					<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
					<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
					<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
					<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>					
					<div class="Text" >World Information</div>
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
								<td class="LabelV200" >Status:</td>
								<td><div style="position: absolute; top: 35px; right: 6px;" ><img class="PVPTypeIcon" src="'.$layout_name.'/images/account/option_server_pvp_type_open.gif" alt="Server PVP Type" /></div>
									'.(($config['status']['serverStatus_online'] == 1) ? 'Online' : 'Offline').'</td>
							</tr>
							<tr>
								<td class="LabelV200" >Players Online:</td>';
								$playersOnline = $SQL->query("SELECT count(*) as total from `players_online`")->fetch();
								if($playersOnline['total'] == '1'){
                                    $main_content .= '
								    <td>'.$playersOnline['total'].' Player Online</td>';
                                }else{
                                    $main_content .= '
								    <td>'.$playersOnline['total'].' Players Online</td>';
                                }

                            $main_content .= '
							</tr>
							<tr>
								<td class="LabelV200" >Online Record:</td>';
							$record = $SQL->query("SELECT `value` FROM `server_config` WHERE `config` = 'players_record'")->fetch();
							$main_content .= '
								<td>' . $record[0] . ' Player' . ($record[0] != 1 ? 's' : '') . '</td>
							</tr>
							<tr>
								<td class="LabelV200" >Creation Date:</td>
								<td>19/01/2017</td>
							</tr>
							<tr>
								<td class="LabelV200" >Location:</td>
								<td>South America</td>
							</tr>
							<tr>
								<td class="LabelV200" >PvP Type:</td>
								<td>' . $serverType . '</td>
							</tr>
							</tr>
							<tr>
						</table>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<br/>
	<div class="TableContainer" >
		<table class="Table2" cellpadding="0" cellspacing="0">
			<div class="CaptionContainer" >
				<div class="CaptionInnerContainer" > 
					<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
					<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
					<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
					<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>					
					<div class="Text">Players Online<span class="TableHeadlineNavigation"> [
					<a href="#A">A</a>
					<a href="#B">B</a>
					<a href="#C">C</a>
					<a href="#D">D</a>
					<a href="#E">E</a>
					<a href="#F">F</a>
					<a href="#G">G</a>
					<a href="#H">H</a>
					<a href="#I">I</a>
					<a href="#J">J</a>
					<a href="#K">K</a>
					<a href="#L">L</a>
					<a href="#M">M</a>
					<a href="#N">N</a>
					<a href="#O">O</a>
					<a href="#P">P</a>
					<a href="#Q">Q</a>
					<a href="#R">R</a>
					<a href="#S">S</a>
					<a href="#T">T</a>
					<a href="#U">U</a>
					<a href="#V">V</a>
					<a href="#W">W</a>
					<a href="#X">X</a>
					<a href="#Y">Y</a>
					<a href="#Z">Z</a> ]&#160;&#160;</span></div>
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
					if($number_of_players_online == 0)
						$main_content .= '
							<tr>
								<td>No online players.</td>
							</tr>';
					else {
						$main_content .= '
							<tr class="LabelH" >
								<td style="text-align:left;width:90%" >Name&#160;&#160;<small style="font-weight:normal;" >[<a href="?subtopic=whoisonline&order=' . (($order == "name_asc") ? 'name_desc' : 'name_asc') . '" >sort</a>]</small>';
							if($order == "name_asc" || $order == "name_desc")
								$main_content .= ' 
									<img class="sortarrow" src="'.$layout_name.'/images/global/content/order_' . $orderico[1] . '.gif" />';
							else
								$main_content .= ' 
									<img class="sortarrow" src="'.$layout_name.'/images/global/general/blank.gif" />';
									
							$main_content .= '
								</td>
								<td>Level&#160;&#160;<small style="font-weight:normal;" >[<a href="?subtopic=whoisonline&order=' . (($order == "level_asc") ? 'level_desc' : 'level_asc') . '" >sort</a>]</small>'; 
							if($order == "level_asc" || $order == "level_desc")
								$main_content .= ' 
									<img class="sortarrow" src="'.$layout_name.'/images/global/content/order_' . $orderico[1] . '.gif" />';
							else
								$main_content .= ' 
									<img class="sortarrow" src="'.$layout_name.'/images/global/general/blank.gif" />';
							$main_content .= '
								</td>
								<td>Vocation&#160;&#160;<small style="font-weight:normal;" >[<a href="?subtopic=whoisonline&order=' . (($order == "vocation_asc") ? 'vocation_desc' : 'vocation_asc') . '" >sort</a>]</small> ';
							if($order == "vocation_asc" || $order == "vocation_desc")
								$main_content .= ' 
									<img class="sortarrow" src="'.$layout_name.'/images/global/content/order_' . $orderico[1] . '.gif" />';
							else
								$main_content .= ' 
									<img class="sortarrow" src="'.$layout_name.'/images/global/general/blank.gif" />';
							$main_content .= '
								</td>
							</tr>';
						$main_content .= $players_rows;
					}
					$main_content .= '
						</table>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<br/>
	<form method="post" action="?subtopic=characters">
		<div class="TableContainer" >
			<table class="Table1" cellpadding="0" cellspacing="0">
				<div class="CaptionContainer" >
					<div class="CaptionInnerContainer" > 
						<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
						<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
						<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>						
						<div class="Text" >Search Character</div>
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
									<td style="vertical-align:middle;" class="LabelV150" >Character Name:</td>
									<td style="width:170px;" ><input style="width:165px;" name="name" value="" size="29" maxlength="29" /></td>
									<td>
										<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
											<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
												<input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/global/buttons/_sbutton_submit.gif" >
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
	</form>';