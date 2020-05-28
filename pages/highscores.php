<?php

$list = 5;
if (isset($_REQUEST['list'])) {
    $list = $_REQUEST['list'];
} elseif (isset($_POST['list'])) {
    $list = $_POST['list'];
}

$page = 0;
if (isset($_REQUEST['page'])) {
    $page = min(50, $_REQUEST['page']);
}elseif (isset($_POST['page'])){
    $page = $_POST['page'];
}
$vocations = [
    10 => "(all)",
    15 => "No Vocation",
    2 => "Druids",
    4 => "Knights",
    3 => "Paladins",
    1 => "Sorcerers"
];
$vocations_equival = '';
$vocation = 10;
if (isset($_REQUEST['vocation'])) {
    $vocation = $_REQUEST['vocation'];
} elseif (isset($_POST['profession'])) {
    $vocation = $_POST['profession'];
}

$lists = [
//    1 => "Achievements",
    2 => "Axe Fighting",
    3 => "Club Fighting",
    4 => "Distance Fighting",
    5 => "Experience Points",
    6 => "Fishing",
    7 => "First Fighting",
//    8 => "Loyalty Points",
    9 => "Magic Level",
    10 => "Shielding",
    11 => "Sword Fighting"
];
//$list_order = '';
switch ($list) {
    case 1:
        $list = 5;
//        $list_order = '';
        break;
    case 2:
        $list_order = 'skill_axe';
        break;
    case 3:
        $list_order = 'skill_club';
        break;
    case 4:
        $list_order = 'skill_dist';
        break;
    case 5:
        $list_order = 'experience';
        break;
    case 6:
        $list_order = 'skill_fishing';
        break;
    case 7:
        $list_order = 'skill_fist';
        break;
    case 8:
        $list = 5;
//        $list_order = '';
        break;
    case 9:
        $list_order = 'maglevel';
        break;
    case 10:
        $list_order = 'skill_shielding';
        break;
    case 11:
        $list_order = 'skill_sword';
        break;
    default:
        $list_order = 'experience';
        $list = 5;
        break;
}

switch ($vocation) {
    case 15:
        $vocation = 0;
        break;
    case 1:
        $vocations_equival = 5;
        break;
    case 2:
        $vocations_equival = 6;
        break;
    case 3:
        $vocations_equival = 7;
        break;
    case 4:
        $vocations_equival = 8;
        break;
    default:
        $vocations_equival = '';
        break;
}


$limit = 25;  //limite players por de pagina
$offset = 0 * $limit;
$limitOffsetAll = 300; //Limita a quantidade maxima de players no rank
$grupacc = "1,2,3,6"; //Seleciona os grupos de class que irão aparecer no rank
if ($_REQUEST['page'] && $_REQUEST['page'] > 0) {
    $offset = (intval($_REQUEST['page']) - 1) * $limit;
}
if ($list_order) {
    if ($vocation == 0) {
        $allquery = $SQL->query("SELECT * FROM `players` WHERE `vocation` = 0 AND `group_id` IN ({$grupacc}) and `account_id`!= 1 AND `deleted` = 0 ORDER BY `{$list_order}` DESC LIMIT {$limitOffsetAll}")->fetchAll();
        $tr = count($allquery);
        $tp = $tr / $limit;
        if ($offset > $tr) {
            $offset = ($tp * $limit) - 1;
            //var_dump($offset);
        }
        $skills = $SQL->query("SELECT * FROM `players` WHERE `vocation` = 0 AND `group_id` IN ({$grupacc}) and `account_id`!= 1 AND `deleted` = 0 ORDER BY `{$list_order}` DESC LIMIT {$limit} OFFSET {$offset}")->fetchAll();
    } elseif ($vocations_equival) {
        $allquery = $SQL->query("SELECT * FROM `players` WHERE `vocation` IN ({$vocation},{$vocations_equival}) and `account_id`!= 1 AND `deleted` = 0 AND `group_id` IN ({$grupacc}) ORDER BY `{$list_order}` DESC LIMIT {$limitOffsetAll}")->fetchAll();
        $tr = count($allquery);
        $tp = $tr / $limit;
        if ($offset > $tr) {
            $offset = ($tp * $limit) - 1;
            //var_dump($offset);
        }
        $skills = $SQL->query("SELECT * FROM `players` WHERE `vocation` IN ({$vocation},{$vocations_equival}) and `account_id`!= 1 AND `deleted` = 0 AND `group_id` IN ({$grupacc}) ORDER BY `{$list_order}` DESC LIMIT {$limit} OFFSET {$offset}")->fetchAll();
    } else {
        $allquery = $SQL->query("SELECT * FROM `players` WHERE `group_id` IN ({$grupacc}) and `account_id`!= 1 AND `deleted` = 0 ORDER BY `{$list_order}` DESC LIMIT {$limitOffsetAll}")->fetchAll();
        $tr = count($allquery);
        $tp = $tr / $limit;
        if ($offset > $tr) {
            $offset = ($tp * $limit) - 1;
            //var_dump($offset);
        }
        $skills = $SQL->query("SELECT * FROM `players` WHERE `group_id` IN ({$grupacc}) and `account_id`!= 1 AND `deleted` = 0 ORDER BY `{$list_order}` DESC LIMIT {$limit} OFFSET {$offset}")->fetchAll();
    }
}
$main_content = '
   <form action="./?subtopic=highscores" method="POST">
      <div class="TableContainer">
         <div class="CaptionContainer">
            <div class="CaptionInnerContainer">
               <span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>        <span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>        <span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"></span>        <span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span>        
               <div class="Text">Highscores Filter</div>
               <span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span>        <span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>        <span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>      
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
                                 <td>World:</td>
                                 <td>
                                    <select size="1" name="world" style="width:165px;">
                                       <option value="' . $config["server"]["serverName"] . '" selected="selected">' . $config["server"]["serverName"] . '</option>
                                    </select>
                                 </td>
                                 <td rowspan="3">
                                    <div class="BigButton" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton.gif)">
                                       <div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
                                          <div class="BigButtonOver" style="background-image:url(' . $layout_name . '/images/global/buttons/sbutton_over.gif);"></div>
                                          <input class="ButtonText" type="image" name="Submit" alt="Submit" src="' . $layout_name . '/images/global/buttons/_sbutton_submit.gif">
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Vocation:</td>
                                 <td>
                                    <select name="profession">';
foreach ($vocations as $key => $vocations) {
    if ($vocation == 0) {
        $vocation = 15;
    }
    $main_content .= "
                                       <option value=" . ($key ? $key : '') . " " . ($key == $vocation ? 'selected=selected' : '') . ">{$vocations}</option>
    ";
}


$main_content .= '
                                    </select>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Category:</td>
                                 <td>
                                    <select name="list">';
foreach ($lists as $key => $lista) {
    $main_content .= '<option value="' . $key . '" ' . ($key == $list ? "selected=selected" : "") . '>' . $lista . '</option>';
}
$main_content .= '
                                    </select>
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
   <br/>
   <div class="TableContainer">
      <div class="CaptionContainer">
         <div class="CaptionInnerContainer">
            <span class="CaptionEdgeLeftTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>        <span class="CaptionEdgeRightTop" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>        <span class="CaptionBorderTop" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"></span>        <span class="CaptionVerticalLeft" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span>        
            <div class="Text">Highscores</div>
            <span class="CaptionVerticalRight" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-vertical.gif);"></span>        <span class="CaptionBorderBottom" style="background-image:url(' . $layout_name . '/images/global/content/table-headline-border.gif);"></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>        <span class="CaptionEdgeRightBottom" style="background-image:url(' . $layout_name . '/images/global/content/box-frame-edge.gif);"></span>      
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
                                          <tbody>';
if ($list == 5) {
    $main_content .= '                        <tr class="LabelH">
                                                <td style="width: 5%;">Rank</td>
                                                <td style="width: 45%;">Name</td>
                                                <td style="width: 20%;">Vocation</td>
                                                <td style="width: 10%; text-align: right;">Level</td>
                                                <td style="width: 20%; text-align: right;">Points</td>
                                             </tr>';
} else {
    $main_content .= '                        <tr class="LabelH">
                                                <td style="width: 5%;">Rank</td>
                                                <td style="width: 45%;">Name</td>
                                                <td style="width: 20%;">Vocation</td>
                                                <td style="width: 10%; text-align: right;">Level</td>
                                                <!--<td style="width: 20%; text-align: right;">Points</td>-->
                                             </tr>';
}

if(count($skills) != 0){

    foreach ($skills as $skill) {
        $voc = $skill['vocation'];
        switch ($voc) {
            case 0:
                $voc = "No Vocation";
                break;
            case 1:
                $voc = "Sorcerer";
                break;
            case 2:
                $voc = "Druid";
                break;
            case 3:
                $voc = "Paladin";
                break;
            case 4:
                $voc = "Knight";
                break;
            case 5:
                $voc = "Master Sorcerer";
                break;
            case 6:
                $voc = "Elder Druid";
                break;
            case 7:
                $voc = "Royal Paladin";
                break;
            case 8:
                $voc = "Elite Knight";
                break;
            default:
                break;
        }
        $bgcolor = (($number_of_rows++ % 2 == 1) ? $config['site']['darkborder'] : $config['site']['lightborder']);
        if ($list == 5) {
            $main_content .= '
                                            <tr style="background-color: ' . $bgcolor . ';">
                                                <td>' . ($offset + $number_of_rows) . '</td>
                                                <td><a href="./?subtopic=characters&name=' . urlencode($skill["name"]) . '">' . htmlspecialchars($skill["name"]) . '</a></td>
                                                <td>' . $voc . '</td>
                                                <td style="text-align: right;">' . $skill["level"] . '</td>
                                                <td style="text-align: right;">' . $skill["experience"] . '</td>
                                             </tr>
    ';
        } else {

            $main_content .= '
                                            <tr style="background-color: ' . $bgcolor . ';">
                                                <td>' . ($offset + $number_of_rows) . '</td>
                                                <td><a href="./?subtopic=characters&name=' . urlencode($skill["name"]) . '">' . htmlspecialchars($skill["name"]) . '</a></td>
                                                <td>' . $voc . '</td>
                                                <td style="text-align: right;">' . $skill[$list_order] . '</td>
                                                <!--<td style="text-align: right;">' . $skill["experience"] . '</td>-->
                                             </tr>
    ';
        }

    }

}else{
    $bgcolor = $config['site']['lightborder'];
    $main_content .= '
                                            <tr style="background-color: ' . $bgcolor . ';">
                                                <td colspan="5" style="text-align: center">Nenhum personagem encontrado.</td>
                                             </tr>
     ';
}

$main_content .= '
                                             <tr>
                                                <td style="padding-right: 10px;" colspan="5">
                                                   <small>
                                                      <div style="float:left;"><b>» Pages:</b>';
if(!isset($_REQUEST["page"])){
    $_REQUEST["page"] = 1;
}
for ($i = 0; $i < $tp; $i++) {
    if((int)$_REQUEST["page"]-1 != $i){
        $main_content .= '<a style="margin-left:4px;" href="./?subtopic=highscores&world=' . $config["server"]["serverName"] . '&vocation=' . $vocation . '&page=' . ($i + 1) . '">' . ($i + 1) . '</a>';
    }else{
        $main_content .= "<b style='margin-left:4px;'>".($i + 1)."</b>";
    }
}
$main_content .= '
                                                      </div>
                                                      <div style="float:right;"><b>» Results: ' . $tr . '</b></div>
                                                   </small>
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
                        </tbody>
                     </table>
                  </div>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
';