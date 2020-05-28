<?php

$playersOnline = $SQL->query("SELECT count(*) as total from `players_online`")->fetch();
$record = $SQL->query("SELECT `value` FROM `server_config` WHERE `config` = 'players_record'")->fetch();

if($_REQUEST['world'] == ""){
    $main_content = '
    <div class="TableContainer">
        <div class="CaptionContainer">
            <div class="CaptionInnerContainer">
                <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
                <div class="Text">Game World Overview</div>
                <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span>
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
                                        <div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);"></div>
                                    </div>
                                    <div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);">
                                        <div class="TableContentContainer">
                                            <table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
                                                <tbody>
                                                <tr>
                                                    <td><b>Overall Maximum:</b>   ' . $record[0] . ' Player' . (($record[0] != 1) ? 's' : '') . '</td>
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
                            <tr>
                                <td>
                                    <div class="TableShadowContainerRightTop">
                                        <div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);"></div>
                                    </div>
                                    <div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);">
                                        <div class="TableContentContainer">
                                            <table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
                                                <tbody>
                                                <tr class="LabelH">
                                                    <td>World</td>
                                                    <td>Online</td>
                                                    <td>Location</td>
                                                    <td>PvP Type</td>
                                                    <td>BattlEye</td>
                                                    <td>Additional Information</td>
                                                </tr>
                                                <tr class="Odd">
                                                    <td><a href="./?subtopic=worlds&world='.$config["server"]["serverName"].'">'.$config["server"]["serverName"].'</a></td>
                                                    <td>'.$playersOnline[0].'</td>
                                                    <td>'.$config["server"]["location"].'</td>
													<td>Open PVP</td>
                                                    <!--<td>'.$config["server"]["worldType"].'</td>-->
                                                    <td align="center" valign="middle"> <span style="width: 18px; height: 18px;"><a href="../common/help.php?subtopic=battleye" target="_blank">
													<span class="HelperDivIndicator" onMouseOver="ActivateHelperDiv($(this), \'Staff present in game world:\', \'On this game world, Staff blocks cheats from the game. The game world has been protected by Staff since its release.\', \'\');" onMouseOut="$(\'#HelperDivContainer\').hide();" >
													<img style="border:0px;" src="'.$layout_name.'/images/global/content/icon_battleyeinitial.gif"></span></a></span></td>
                                                    <td>premium, released
														<span>
															<span class="HelperDivIndicator" onmouseover="ActivateHelperDiv($(this), \'Free Premium game world:\', \'<p>This game world free premium for players.</p>\', \'\');" onmouseout="$(\'#HelperDivContainer\').hide();">
															<image style="border:0px;" src="'.$layout_name.'/images/global/content/info.gif" />
															</span>
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
    </div>';

}else{
    if($_REQUEST['world'] == $config['server']['serverName'] || $_POST['world'] == $config['server']['serverName']){
        include "whoisonline.php";
    }else{
        header("Location: ./?subtopic=worlds");
    }
}