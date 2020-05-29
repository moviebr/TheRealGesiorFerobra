<?php
if(!defined('INITIALIZED'))
	exit;
		$main_content .= '
			<script type="text/javascript" >
				g_Deactivated = true;
			</script>';
			
		$services_errors = array();
		if (!isset($_REQUEST['ServiceCategoryID']))
			header("Location: ?subtopic=accountmanagement&action=manage");
		else $serviceCategoryId = $_REQUEST['ServiceCategoryID'];
			
		if (isset($_REQUEST['step']))
			$step = (int) $_REQUEST['step'];
		else $step = 1;
		
		switch($step) {
			case 2:
				$service = "Enter payment data";
				break;
			case 3:
				$service = "Confirm your order";
				break;
			case 4:
				$service = "Summary";
				break;
			default:
				$service = "Select service";
		}
		//Progress Bar
				
		#js part
		$get_Services = $SQL->query("SELECT * FROM `z_shop_offer` WHERE `category` = '$serviceCategoryId'")->fetchAll();
		
		$g_Services = '['; #start
		foreach($get_Services as $g_Ser) {
			$g_Services .= $g_Ser['id'].','; #repeat items
		}
		$g_Services = substr($g_Services,0,-1); #cut 
		$g_Services .= ']';
		
		$g_Prices = '{';
		foreach($get_Services as $g_Ser) {
			$g_Prices .= '"'.$g_Ser['id'].'":{';
			$g_Prices .= '"1":"'.$g_Ser['points'].'"';
			$g_Prices .= '},';
		}
		$g_Prices = substr($g_Prices,0,-1);
		$g_Prices.= '};';
		
		
		$main_content .= '
			<script>	
			$(document).ready(function() { 
			    ChangePMC(1);
			    ChangeService(8,2);
			 });	
			
				var g_Services = '.$g_Services.';
				var g_PaymentMethodCategories = {1:1};
				var g_Prices = '.$g_Prices.'
				var g_QF_Mounts_ServiceCategoryID = 15;
  				var g_QF_Outfits_ServiceCategoryID = 17;
				
				function ChangeService(a_ServiceID, a_ServiceCategoryID) {
					// set the ServiceID for the change country form
					$(\'#ServiceID\').val(a_ServiceID);
					$(\'#ServiceID\').attr(\'name\', \'InitialServiceID\');
					// activate the radio button itself and set the price
					$(\'#ServiceID_\' + a_ServiceID).attr(\'checked\', \'checked\');
					$(\'.ServiceID_Icon_Container\').css(\'background-color\', \'\');
					// handle mounts
					if (a_ServiceCategoryID == g_QF_Mounts_ServiceCategoryID || a_ServiceCategoryID == g_QF_Outfits_ServiceCategoryID) {
						$(\'.ServiceID_Icon_Animation_1\').hide();
						$(\'.ServiceID_Icon_New_Animation_1\').hide();
						$(\'.ServiceID_Icon_New\').show();
						$(\'#ServiceID_Icon_Animation_1_\' + a_ServiceID).show();
						$(\'#ServiceID_Icon_New_\' + a_ServiceID).hide();
					}
					// handle payment methods
					for (var i = 0; i < g_PaymentMethodCategories.length; i++) {
						if (typeof g_Prices[a_ServiceID] !== \'undefined\') {
							if (typeof g_Prices[a_ServiceID][g_PaymentMethodCategories[i]] === \'undefined\') {
								// deactivate the payment method
								// note: the radio button can not be disabled or we will receive the wrong error message
								$(\'#PMCID_NotAllowed_\' + g_PaymentMethodCategories[i]).show();
							} else {
								// activate the payment method
								$(\'#PMCID_NotAllowed_\' + g_PaymentMethodCategories[i]).hide();
							}
						}
					}
					// activate and mark the selected icon
					$(\'.ServiceID_Icon_Selected\').css(\'background-image\', \'\');
					$(\'#ServiceID_Icon_Selected_\' + a_ServiceID).css(\'background-image\', \'url(\' + JS_DIR_IMAGES + \'payment/serviceid_icon_selected.png)\');
					return;
				}
				
				function ChangePMC(a_PaymentMethodID) {
					// set the PMCID for the change country form
					$(\'#PMCID\').val(a_PaymentMethodID);
					$(\'#PMCID\').attr(\'name\', \'InitialPMCID\');
					// activate the radio button
					$(\'#PMCID_\' + a_PaymentMethodID).attr(\'checked\', \'checked\');
					$(\'.PMCID_Icon_Container\').css(\'background-color\', \'\');
					// handle services
					for (var i = 0; i < g_Services.length; i++) {
						if (typeof g_Prices[g_Services[i]] !== \'undefined\') {
							if (typeof g_Prices[g_Services[i]][a_PaymentMethodID] === \'undefined\') {
								// deactivate the service
								// note: the radio button can not be disabled or we will receive the wrong error message
								$(\'#ServiceID_NotAllowed_\' + g_Services[i]).show();
								// set the price
								$(\'#PD_\' + g_Services[i]).html(\'---\');
								$(\'#ServiceID_\' + g_Services[i]).val(\'0\');
							} else {
								// activate the service
								// set the price
								$(\'#PD_\' + g_Services[i]).html(g_Prices[g_Services[i]][a_PaymentMethodID] + \' Points\');
								$(\'#ServiceID_NotAllowed_\' + g_Services[i]).hide();
							}
						}
					}
					// activate and mark the selected icon
					$(\'.PMCID_Icon_Selected\').css(\'background-image\', \'\');
					$(\'#PMCID_Icon_Selected_\' + a_PaymentMethodID).css(\'background-image\', \'url(\' + JS_DIR_IMAGES + \'payment/pmcid_icon_selected.png)\');
					return;
				}
				
				// mouse over effect for payment methods

				function MouseOverPMCID(a_PMCID) {
					$(\'#PMCID_Icon_Over_\' + a_PMCID).css(\'background-image\', \'url(\' + JS_DIR_IMAGES + \'payment/pmcid_icon_over.png)\');
				}
				// mouse out effect for payment methods
				
				function MouseOutPMCID(a_PMCID) {
					$(\'#PMCID_Icon_Over_\' + a_PMCID).css(\'background-image\', \'\');
				}
				
				// mouse over effect for products

				function MouseOverServiceID(a_ServiceID, a_ServiceCategoryID) {
					$(\'#ServiceID_Icon_Over_\' + a_ServiceID).css(\'background-image\', \'url(\' + JS_DIR_IMAGES + \'payment/serviceid_icon_over.png)\');
					if (a_ServiceCategoryID == g_QF_Mounts_ServiceCategoryID || a_ServiceCategoryID == g_QF_Outfits_ServiceCategoryID) {
						$(\'#ServiceID_Icon_Animation_1_\' + a_ServiceID).show();
						$(\'#ServiceID_Icon_New_\' + a_ServiceID).hide();
					}
				}
				// mouse out effect for products

				function MouseOutServiceID(a_ServiceID, a_ServiceCategoryID) {
					$(\'#ServiceID_Icon_Over_\' + a_ServiceID).css(\'background-image\', \'\');
					// mounts have an animation
					if ((a_ServiceCategoryID == g_QF_Mounts_ServiceCategoryID || a_ServiceCategoryID == g_QF_Outfits_ServiceCategoryID) && ($(\'#ServiceID_\' + a_ServiceID).attr(\'checked\') != \'checked\')) {
						$(\'#ServiceID_Icon_Animation_1_\' + a_ServiceID).hide();
						$(\'#ServiceID_Icon_New_\' + a_ServiceID).show();
					}
				}
				
			</script>';
		$main_content .= '
			<div id="ProgressBar">
				<div id="MainContainer">
					<div id="BackgroundContainer">
						<img id="BackgroundContainerLeftEnd" src="'.$layout_name.'/images/global/content/stonebar-left-end.gif" />
						<div id="BackgroundContainerCenter">
							<div id="BackgroundContainerCenterImage" style="background-image:url('.$layout_name.'/images/global/content/stonebar-center.gif);" />
						</div>
					</div>
					<img id="BackgroundContainerRightEnd" src="'.$layout_name.'/images/global/content/stonebar-right-end.gif" />
				</div>
				<img id="TubeLeftEnd" src="'.$layout_name.'/images/global/content/progressbar/progress-bar-tube-left-green.gif" /> 
				<img id="TubeRightEnd" src="'.$layout_name.'/images/global/content/progressbar/progress-bar-tube-right-'.(($step == 4) ? 'green' : 'blue').'.gif" />
				
				<div id="FirstStep" class="Steps" >
				
					<div class="SingleStepContainer" > 
						<img class="StepIcon" src="'.$layout_name.'/images/global/content/progressbar/progress-bar-icon-1-green.gif" />
						<div class="StepText" style="font-weight:'.((!isset($step) || $step == 1) ? 'bold' : 'normal').';" >Select service</div>
					</div>
					
				</div>
				
				<div id="StepsContainer1" >
					<div id="StepsContainer2" >
					
						<div class="Steps" style="width:33%" >
							<div class="TubeContainer" > 
								<img class="Tube" src="'.$layout_name.'/images/global/content/progressbar/progress-bar-tube-'.((!isset($step) || $step == 1) ? 'green-blue' : 'green').'.gif" /> 
							</div>
							<div class="SingleStepContainer" > 
								<img class="StepIcon" src="'.$layout_name.'/images/global/content/progressbar/progress-bar-icon-2-'.(($step >= 2) ? 'green' : 'blue').'.gif" />
								<div class="StepText" style="font-weight:'.(($step == 2) ? 'bold' : 'normal').';" >Enter payment data</div>
							</div>
						</div>
						
						<div class="Steps" style="width:33%" >
							<div class="TubeContainer" >';
							if ($step == 2) {
								$main_content .= ' 
								<img class="Tube" src="'.$layout_name.'/images/global/content/progressbar/progress-bar-tube-green-blue.gif" />';
							}elseif ($step >= 3) {
								$main_content .= ' 
								<img class="Tube" src="'.$layout_name.'/images/global/content/progressbar/progress-bar-tube-green.gif" />';
							}else{
								$main_content .= ' 
								<img class="Tube" src="'.$layout_name.'/images/global/content/progressbar/progress-bar-tube-blue.gif" />';
							}
						$main_content .= '
							</div>
							<div class="SingleStepContainer" > 
								<img class="StepIcon" src="'.$layout_name.'/images/global/content/progressbar/progress-bar-icon-3-'.(($step >= 3) ? 'green' : 'blue').'.gif" />
								<div class="StepText" style="font-weight:'.(($step == 3) ? 'bold' : 'normal').';" >Confirm your order</div>
							</div>
						</div>
						
						<div class="Steps" style="width:33%" >
							<div class="TubeContainer" > ';
								if ($step == 3) {
								$main_content .= ' 
								<img class="Tube" src="'.$layout_name.'/images/global/content/progressbar/progress-bar-tube-green-blue.gif" />';
							}elseif ($step >= 4) {
								$main_content .= ' 
								<img class="Tube" src="'.$layout_name.'/images/global/content/progressbar/progress-bar-tube-green.gif" />';
							}else{
								$main_content .= ' 
								<img class="Tube" src="'.$layout_name.'/images/global/content/progressbar/progress-bar-tube-blue.gif" />';
							}
						$main_content .= ' 
							</div>
							<div class="SingleStepContainer" > 
								<img class="StepIcon" src="'.$layout_name.'/images/global/content/progressbar/progress-bar-icon-4-'.(($step == 4) ? 'green' : 'blue').'.gif" />
								<div class="StepText" style="font-weight:'.(($step == 4) ? 'bold' : 'normal').';" >Summary</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>';
		#progress bar end
		
		if ($step == 1) {
			$doubleStatus = $SQL->query("SELECT `value` FROM `server_config` WHERE `config` = 'double'")->fetch();
			$main_content .= '
				<style>
					.ribbonShop-double {
					background:url('.$layout_name.'/images/shop/ribbon-double.png) no-repeat;
					width: 80px;
					height: 80px;
					position:absolute;
					right: -5px;
					top: -5px;
					z-index:999;
					}
				</style>';
			$main_content .= '
				<form method="post" action="?subtopic=accountmanagement&action=services">
				<div class="TableContainer" style="position:relative;">
				'.(($doubleStatus['value'] == "active") ? '<div class="ribbonShop-double"></div>' : '').'
					<table class="Table5" cellpadding="0" cellspacing="0">
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span> 
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span> 
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
							<div class="Text" >'.$service.'</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span> 
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span> 
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span> 
						</div>
					</div>
					<tr>
						<td>
							<div class="InnerTableContainer">
								<table style="width:100%;" >';
								#menu
								$main_content .= '
									<tr>
										<td>';
									$getCat = $SQL->query("SELECT * FROM `z_shop_category` WHERE `hide` = 0 ORDER BY `id` ASC")->fetchAll();
									
									foreach($getCat as $category) {
										$main_content .= '
											<span class="HelperDivIndicator" onMouseOver="ActivateHelperDiv($(this), \''.$category['name'].'\', \''.$category['desc'].'\', \'ProductCategoryHelperDiv_'.$category['id'].'\');" onMouseOut="$(\'#HelperDivContainer\').hide();" >
												<div class="InnerTableTab '.(($serviceCategoryId == $category['id']) ? 'ActiveInnerTableTab' : '').'">
													<div id="ProductCategoryHelperDiv_'.$category['id'].'" class="ProductCategoryHelperDiv" ></div>
													<a href="?subtopic=accountmanagement&action=services&ServiceCategoryID='.$category['id'].'&step='.$step.'">
														<img src="'.$layout_name.'/images/payment/products_tab_'.(($serviceCategoryId == $category['id']) ? '' : 'non').'active.png" />
														<div class="InnerTableTabLabel" >'.$category['name'].'</div>';
														$newCategory = $category['id'];
														$getNews = $SQL->query("SELECT `offer_date` FROM `z_shop_offer` WHERE `category` = '$newCategory' ORDER BY `offer_date` DESC LIMIT 1")->fetch();
														if ((time() - ($config['shop']['newitemdays'] * 86400)) < $getNews['offer_date'])
															$main_content .= '<div class="RibbonNewProduct" style="background-image: url('.$layout_name.'/images/payment/ribbon-tab-new-product'.(($serviceCategoryId == $category['id']) ? '_active' : '').'.png);" ></div>';
									
												$main_content .= '
													</a>
												</div>
											</span>';
									}
										
									$main_content .= '	
										</td>
									</tr>';
									#services
									
								$main_content .= '
									<tr>
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
														<tr>
															<td style="text-align: center;" align="center" >
																<div style="max-height: 500px; min-height: 100px; overflow-y: auto;">';
															
															$getProducts = $SQL->query("SELECT * FROM `z_shop_offer` WHERE `category` = '$serviceCategoryId' AND `hide` = 0 ORDER BY `offer_date` DESC")->fetchAll();
															
															if (count($getProducts) >= 1)
																foreach($getProducts as $product) {
																
																	$main_content .= '
																		<div class="ServiceID_Icon_Container" id="ServiceID_Icon_Container_'.$product['id'].'">
																			<div class="ServiceID_Icon_Container_Background" id="" style="background-image:url('.$layout_name.'/images/payment/serviceid_icon_normal.png);" >
																				<div class="ServiceID_Icon" id="ServiceID_Icon_'.$product['id'].'" '.(($product['category'] == 2) ? 'style="background-image:url('.$layout_name.'/images/payment/'.$product['default_image'].');"' : '').' onclick="ChangeService('.$product['id'].', '.$product['category'].');" onmouseover="MouseOverServiceID('.$product['id'].', '.$product['category'].');" onmouseout="MouseOutServiceID('.$product['id'].', '.$product['category'].');" >
																					<div class="PermanentDeactivated" >';
																				if(!empty($product['offer_description']))
																					$main_content .= '
																						<span class="HelperDivIndicator" onMouseOver="ActivateHelperDiv($(this), \''.$product['offer_name'].'\', \''.$product['offer_description'].'\', \'\');" onMouseOut="$(\'#HelperDivContainer\').hide();" >';
																						$main_content .= '
																							<div class="ServiceID_HelperDiv" ></div>
																						</span>
																					</div>
																					<div class="PermanentDeactivated ServiceID_Deactivated_ByChoice" id="ServiceID_NotAllowed_'.$product['id'].'" style="display: none;" >
																						<span class="HelperDivIndicator" onMouseOver="ActivateHelperDiv($(this), \'Service Info:\', \'&lt;p&gt;The product is not available for the selected payment method!&lt;/p&gt;\', \'\');" onMouseOut="$(\'#HelperDivContainer\').hide();" >
																							<div class="ServiceID_Deactivated" style="background-image: url('.$layout_name.'/images/payment/serviceid_deactivated.png);" ></div>
																						</span>
																					</div>';
																			if ((time() - ($config['shop']['newitemdays'] * 86400)) < $product['offer_date'])
																				$main_content .= '
																					<div class="RibbonNewProduct" style="background-image: url('.$layout_name.'/images/payment/ribbon-new-product.png);"></div>
																					<div class="PermanentDeactivated" >
																						<span class="HelperDivIndicator" onMouseOver="ActivateHelperDiv($(this), \'New Product!\', \'We have a new product for you in store - the &lt;b&gt;'.$product['offer_name'].'&lt;/b&gt;.\', \'\');" onMouseOut="$(\'#HelperDivContainer\').hide();" >
																							<div class="ServiceID_HelperDiv" style="z-index: 999;" ></div>
																						</span>
																					</div>';
																			if ($product['category'] == 3) {
																				$main_content .= '
																					<div class="ServiceID_Icon_New" id="ServiceID_Icon_New_'.$product['id'].'" style="background-image:url('.$layout_name.'/images/shop/outfits/'.strtolower(str_replace(" ","_",$product['addon_name'])).'_male.gif); background-repeat:no-repeat; margin:5px 0;" ></div>
																					<div class="ServiceID_Icon_New" id="ServiceID_Icon_New_'.$product['id'].'" style="background-image:url('.$layout_name.'/images/shop/outfits/'.strtolower(str_replace(" ","_",$product['addon_name'])).'_female.gif); background-repeat:no-repeat; margin:5px 60px;" ></div>';
																			}
																			if ($product['category'] == 4)
																				$main_content .= '
																					<div class="ServiceID_Icon_New" id="ServiceID_Icon_New_'.$product['id'].'" style="background-image:url('.$layout_name.'/images/shop/items/'.$product['itemid'].'.gif); background-repeat:no-repeat; margin:20px 45px;" ></div>';
																			if ($product['category'] == 6) {
																				$main_content .= '
																					<div class="ServiceID_Icon_New" id="ServiceID_Icon_New_'.$product['id'].'" style="background-image:url('.$layout_name.'/images/shop/points.gif); background-repeat:no-repeat; margin:20px 45px;" ></div>';
																			}
																			
																				$main_content .= '
																					<div class="ServiceID_Icon_Selected" id="ServiceID_Icon_Selected_'.$product['id'].'" ></div>
																					<div class="ServiceID_Icon_Over" id="ServiceID_Icon_Over_'.$product['id'].'" ></div>';
																				$main_content .= '
																					<div class="ServiceID_Icon_Animation_1" id="ServiceID_Icon_Animation_1_'.$product['id'].'" style="background-image: url('.$layout_name.'/images/shop/items/serviceid_'.$product['id'].'_animation_1.gif);" ></div>';
																				$main_content .= '
																					<label for="ServiceID_'.$product['id'].'" >
																						<div class="ServiceIDLabelContainer" >
																							<div class="ServiceIDLabel" >
																								<input type="radio" id="ServiceID_'.$product['id'].'" class="ServiceID" name="ServiceID" value="'.$product['id'].'" />
																								'.$product['offer_name'].' </div>
																						</div>
																						<div class="ServiceIDPriceContainer" ><span class="ServiceIDPrice" id="PD_'.$product['id'].'" >'.$product['points'].' Points</span></div>
																					</label>
																				</div>
																			</div>
																		</div>';
																}
															else {
																if($serviceCategoryId == 2)
																	$itemName = "Extra Services";
																if($serviceCategoryId == 3)
																	$itemName = "Outfits";
																if($serviceCategoryId == 4)
																	$itemName = "Items";
																	
																$main_content .= '<p>None <strong>'.$itemName.'</strong> has been added for sale yet .</p>';
															}
															$main_content .= '
																</div>
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
									</tr>';
								$main_content .= '
									<tr>
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
														<tr>
															<td style="text-align: center;" align="center" >
																<div style="max-height: 240px; overflow-y: auto;" >
																	<div class="PMCID_Icon_Container" id="PMCID_Icon_Container_1" >
																		<div class="PMCID_Icon" id="PMCID_Icon_1" style="background-image:url('.$layout_name.'/images/payment/pmcid_icon_normal.png);" onclick="ChangePMC(1);" onmouseover="MouseOverPMCID(1);" onmouseout="MouseOutPMCID(1);" >
																			<div class="PermanentDeactivated PMCID_Deactivated_ByChoice" id="PMCID_NotAllowed_1" style="display: none;"" >
																				<span class="HelperDivIndicator" onMouseOver="ActivateHelperDiv($(this), \'Payment Method Info:\', \'&lt;p&gt;The payment method is not allowed for the selected service!&lt;/p&gt;\', \'\');" onMouseOut="$(\'#HelperDivContainer\').hide();" >
																					<div class="PMCID_Deactivated" style="background-image: url('.$layout_name.'/images/payment/pmcid_deactivated.png);" ></div>
																				</span>
																			</div>
																			<div class="PMCID_Icon_Selected" id="PMCID_Icon_Selected_1" ></div>
																			<div class="PMCID_Icon_Over" id="PMCID_Icon_Over_1" ></div>
																			<span style="position: absolute; left: 125px; top: 53px; z-index: 99;" >
																				<span style="margin-left: 5px; position: absolute; margin-top: 2px;" >																					
																					<span class="HelperDivIndicator" onMouseOver="ActivateHelperDiv($(this), \'Information:\', \'Premium Points can be used to purchase addons, mounts, items and extra services.\', \'\');" onMouseOut="$(\'#HelperDivContainer\').hide();" >
																						<image style="border:0px;" src="'.$layout_name.'/images/global/content/info.gif" />
																					</span>
																				</span>
																			</span>
																			<img class="PMCID_CP_Icon" src="'.$layout_name.'/images/payment/points.gif" />
																			<div class="PMCID_CP_Label" >
																				<input type="radio" id="PMCID_1" name="PMCID" value="1">
																				<label for="PMCID_1" >Points</label>
																			</div>
																		</div>
																	</div>
																</div>
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
									</tr>';
											
							$main_content .= '									
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div>';
		#next and back buttons
		$main_content .= '
			<div class="SubmitButtonRow" >
				<div class="LeftButton" >
					<input type="hidden" name="ServiceCategoryID" value="'.$serviceCategoryId.'">
					<input type="hidden" name="step" value="2">
					<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green.gif)" >
						<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green_over.gif);" ></div>
							<input id="sendService" class="ButtonText" type="image" name=s"Next" alt="Next" src="'.$layout_name.'/images/global/buttons/_sbutton_next.gif" >
						</div>
					</div>
				</div>
				</form>
				<div class="RightButton" >
					<form action="?subtopic=accountmanagement&action=manage" method="post" style="padding:0px;margin:0px;" >
						<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_red.gif)" >
							<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_red_over.gif);" ></div>
								<input class="ButtonText" type="image" name="Cancel" alt="Cancel" src="'.$layout_name.'/images/global/buttons/_sbutton_cancel.gif" >
							</div>
						</div>
					</form>
				</div>
			</div>';
		}
		if($step == 2) {
			$serviceCategoryID = (int) $_REQUEST['ServiceCategoryID'];
			$payment_method = (int) $_REQUEST['PMCID'];
			$service_id = (int) $_REQUEST['ServiceID'];
			
			if($service_id == 0)
				$services_errors[] = "You need to select a valid service you wish to purchase.";
			if($payment_method == 0)
				$services_errors[] = "You must select a valid payment method to purchase the service.";
			if(empty($services_errors)) {
				$shop_offer = $SQL->query("SELECT * FROM `z_shop_offer` WHERE `id` = '$service_id'")->fetch();
				$service_price = $shop_offer['price'];
				$service_points = $shop_offer['points'];
				$service_name = $shop_offer['offer_name'];
				if($account_logged->getPremiumPoints() < $service_points)
					$services_errors[] = "You need at least ".$service_points." premium points to purchase the ".$service_name.".";
			}
			if(empty($services_errors))
				if($account_logged->getKey() == "")
					$services_errors[] = "Your account has not yet been registered, you need to register to buy on ".$config['server']['serverName']." Shop.";
			if(empty($services_errors)) {
					
				$main_content .= '
				<form method="post" action="?subtopic=accountmanagement&action=services">
					<div class="TableContainer" >
						<table class="Table5" cellpadding="0" cellspacing="0">
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span> 
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span> 
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
								<div class="Text" >'.$service.'</div>
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
															<tr><td class="LabelV">Send to my account <input type="radio" name="sendTo" value="me" checked></td></tr>
															<tr>
																<td class="LabelV">Send to my friend <input type="radio" name="sendTo" value="friend" onBlur="showSelect()">
																	<select name="selectFriend">
																		<option value="">Select a Friend</option>';
																$get_friends = $SQL->query("SELECT * FROM `account_viplist` WHERE `account_id` = '".$account_logged->getID()."'")->fetchAll();
																foreach($get_friends as $fID) {
																	$friend = new Player();
																	$friend->loadById($fID['player_id']);
																	$main_content .= '<option value="'.$friend->getName().'">'.$friend->getName().'</option>';
																}
																$main_content .= '
																	</select>
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
										<tr>
											<td>The friend list above is according to your vip list in-game.</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
				</div>
				<div class="SubmitButtonRow" >
					<div class="LeftButton" >
						<input type="hidden" name="ServiceCategoryID" value="'.$serviceCategoryID.'">
						<input type="hidden" name="PMCID" value="'.$payment_method.'">
						<input type="hidden" name="ServiceID" value="'.$service_id.'">
						<input type="hidden" name="step" value="3">
						<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green.gif)" >
							<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green_over.gif);" ></div>
								<input class="ButtonText" type="image" name="Next" alt="Next" src="'.$layout_name.'/images/global/buttons/_sbutton_next.gif" >
							</div>
						</div>
					</div>
					</form>
					<div class="RightButton" >
						<form method="post" action="?subtopic=accountmanagement&action=services" >
							<input type="hidden" name="ServiceCategoryID" value="'.$serviceCategoryID.'" />
							<input type="hidden" name="step" value="1">
							<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
								<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
									<input class="ButtonText" type="image" name="Previous" alt="Previous" src="'.$layout_name.'/images/global/buttons/_sbutton_previous.gif" >
								</div>
							</div>
						</form>
					</div>
				</div>';
			}
			if(!empty($services_errors)) {
					$main_content .= '
						<div class="TableContainer" >
							<table class="Table1" cellpadding="0" cellspacing="0" >
								<div class="CaptionContainer" >
									<div class="CaptionInnerContainer" > 
										<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
										<div class="Text" >Services Page Errors</div>
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
													foreach($services_errors as $service_error)
														$main_content .= $service_error . '<br>';
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
										<form action="?subtopic=accountmanagement&action=services" method="post">
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
				}			
		}
		if($step == 3) {
			
			$serviceCategoryID = (int) $_REQUEST['ServiceCategoryID'];
			$payment_method = (int) $_REQUEST['PMCID'];
			$service_id = (int) $_REQUEST['ServiceID'];
			$sendTo = $_REQUEST['sendTo'];
			if($sendTo == "friend")
				$friend_name = $_REQUEST['selectFriend'];
			
			if($sendTo == "friend" && $_REQUEST['selectFriend'] == "")
				$services_errors[] = "You need to select a friend to send this service.";
					
			$service_info = $SQL->query("SELECT * FROM `z_shop_offer` WHERE `id` = '$service_id'")->fetch();
				if(empty($services_errors)) {
					$main_content .= '
						<div class="TableContainer" >
							<table class="Table5" cellpadding="0" cellspacing="0">
								<div class="CaptionContainer" >
									<div class="CaptionInnerContainer" > 
										<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span> 
										<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span> 
										<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
										<div class="Text" >'.$service.'</div>
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
																		<td class="LabelV200" >Service</td>
																		<td>' . $service_info['offer_name'] . '</td>
																	</tr>';
																	$main_content .= '
																	<tr>
																		<td class="LabelV200" >Points</td>
																		<td>' . $service_info['points'] . ' Premium Points</td>
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
												<tr>
													<td>
														<div class="TableShadowContainerRightTop" >
															<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
														</div>
														<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
															<div class="TableContentContainer" >
																<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
																	<tr>
																		<td class="LabelV200" >Payment Method</td>
																		<td>Premium Points</td>
																	</tr>';
															if($sendTo == "friend")
																$main_content .= '
																	<tr>
																		<td class="LabelV200" >Sendo to:</td>
																		<td>' . $friend_name . '</td>
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
												<tr>
													<td>
														<div class="TableShadowContainerRightTop" >
															<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
														</div>
														<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
															<div class="TableContentContainer" >
																<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
																	<form method="post" action="?subtopic=accountmanagement&action=services" >
																	
																	<tr>
																		<td colspan="2" >
																			<input type="checkbox" name="RulesAccept" value="1" id="AgreementsCheckbox" />
																			<span>
																			<Label for="AgreementsCheckbox" >I have read and I agree to the <a href="#" target="_blank" >' . $config['server']['serverName'] . ' Rules</a>.</label>
																			</span>
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
						</div>';
					$main_content .= '
						<div class="SubmitButtonRow" >
							<div class="LeftButton" >
								<input type="hidden" name="ServiceID" value="' . $service_id . '" >
								<input type="hidden" name="PMCID" value="' . $payment_method . '" >
								<input type="hidden" name="ServiceCategoryID" value="' . $serviceCategoryID . '" >
								<input type="hidden" name="Points" value="' . $service_info['points'] . '" />
								<input type="hidden" name="selectFriend" value="'.$friend_name.'">
								<input type="hidden" name="sendTo" value="'.$sendTo.'">
								<input type="hidden" name="step" value="4" >
								<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green.gif)" >
									<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_green_over.gif);" ></div>
										<input class="ButtonText" type="image" name="BuyNow" alt="BuyNow" src="'.$layout_name.'/images/global/buttons/_sbutton_buynow.gif" >
									</div>
								</div>
							</div>
							</form>
							<div class="RightButton" >
								<form method="post" action="?subtopic=accountmanagement&action=services" >
									<input type="hidden" name="ServiceCategoryID" value="' . $serviceCategoryID . '" >
									<input type="hidden" name="ServiceID" value="' . $service_id . '" >
									<input type="hidden" name="PMCID" value="' . $payment_method . '" >
									<input type="hidden" name="step" value="2" >
									<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
										<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
											<input class="ButtonText" type="image" name="Previous" alt="Previous" src="'.$layout_name.'/images/global/buttons/_sbutton_previous.gif" >
										</div>
									</div>
								</form>
							</div>
				</div>';
				} else {
					$main_content .= '
						<div class="TableContainer" >
							<table class="Table1" cellpadding="0" cellspacing="0" >
								<div class="CaptionContainer" >
									<div class="CaptionInnerContainer" > 
										<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
										<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
										<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
										<div class="Text" >Services Page Errors</div>
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
													foreach($services_errors as $service_error)
														$main_content .= $service_error . '<br>';
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
										<form action="?subtopic=accountmanagement&action=services" method="post">
											<input type="hidden" name="ServiceID" value="' . $service_id . '" >
											<input type="hidden" name="PMCID" value="' . $payment_method . '" >
											<input type="hidden" name="ServiceCategoryID" value="'.$serviceCategoryID.'" />
											<input type="hidden" name="selectFriend" value="'.$friend_name.'">
											<input type="hidden" name="sendTo" value="'.$sendTo.'">
											<input type="hidden" name="step" value="2">
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
		if($step == 4) {
			
			$serviceCategoryID = (int) $_REQUEST['ServiceCategoryID'];
			$payment_method = (int) $_REQUEST['PMCID'];
			$service_id = (int) $_REQUEST['ServiceID'];

			$service_info = $SQL->query("SELECT * FROM `z_shop_offer` WHERE `id` = '$service_id'")->fetch();
			
			$sendTo = $_REQUEST['sendTo'];
			$sendFriend = $_REQUEST['selectFriend'];
			
			$friendInfo = new Player();
			$friendInfo->find($sendFriend);
			if($sendTo == "friend" && !$friendInfo->isLoaded())
				$services_errors[] = "The friend to whom you want to send the gift does not exist.";

			$service_points = $service_info['points'];
			$debitPoints = $account_logged->getPremiumPoints() - $service_points;
					
			$rules_accept = (int) $_REQUEST['RulesAccept'];
			$orderDate = time();
			$account_name = $account_logged->getName();
			$friend_acc = $friendInfo->getAccount()->getName();
			
			if($account_logged->getPremiumPoints() < $service_points)
				$services_errors[] = "You need at least ".$service_points." premium points to purchase it.";
				
			
			if($rules_accept == 0)
				$services_errors[] = "You have to accept the ".$config['server']['serverName']." Rules.";
				
			if(empty($services_errors)) {				
				if( $_SERVER['REQUEST_METHOD']=='POST' ) {
					$hash = md5( implode( $_POST ) );			
					if( isset( $_SESSION['hash'] ) && $_SESSION['hash'] == $hash ) {		
						// Refresh! NÃƒÂ£o faz nada ou re-exibe o formulÃƒÂ¡rio preenchido			
					} else {			
						$_SESSION['hash']  = $request;
						
						if($sendTo == "friend") {
							$add_order = $SQL->query("INSERT INTO `z_shop_payment` (`account_name`,`service_id`,`service_category_id`,`payment_method_id`,`points`,`status`,`date`,`gift`) VALUES ('$account_name','$service_id','$serviceCategoryID','$payment_method','$service_points','gift','$orderDate','0')");
							$add_friend = $SQL->query("INSERT INTO `z_shop_payment` (`account_name`,`service_id`,`service_category_id`,`payment_method_id`,`points`,`status`,`date`,`gift`) VALUES ('$friend_acc','$service_id','$serviceCategoryID','$payment_method','$service_points','ready','$orderDate','1')");
						} else {
							$add_order = $SQL->query("INSERT INTO `z_shop_payment` (`account_name`,`service_id`,`service_category_id`,`payment_method_id`,`points`,`status`,`date`,`gift`) VALUES ('$account_name','$service_id','$serviceCategoryID','$payment_method','$service_points','ready','$orderDate','0')");
						}							
						$account_logged->setPremiumPoints($debitPoints);
						$account_logged->save();
					}
				}
			}
			
			if(empty($services_errors)) {
					$main_content .= '
							<div class="TableContainer" >
								<table class="Table5" cellpadding="0" cellspacing="0">
									<div class="CaptionContainer" >
										<div class="CaptionInnerContainer" > 
											<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span> 
											<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span> 
											<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
											<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>
											<div class="Text" >'.$service.'</div>
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
																		<tr>';
																	if($sendTo == "friend") 
																		$main_content .= '
																			<td>Thank you for your order. The '.$service_info['offer_name'].' been sent to your friend successfully.</td>';
																	else 
																	
																		$main_content .= '
																			<td>Thank you for your order. The '.$service_info['offer_name'].' is available for you to choose the character which will activate . Simply access your available products and activate.</td>';
																	
																	$main_content .= '
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
										<form action="?subtopic=accountmanagement&action=manage" method="post" style="padding:0px;margin:0px;" >
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
			if(!empty($services_errors)) {
				$main_content .= '
							<div class="TableContainer" >
								<table class="Table1" cellpadding="0" cellspacing="0" >
									<div class="CaptionContainer" >
										<div class="CaptionInnerContainer" > 
											<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);" /></span>
											<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);" ></span> 
											<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);" /></span>							
											<div class="Text" >Services Page Errors</div>
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
														foreach($services_errors as $service_error)
															$main_content .= $service_error . '<br>';
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
											<form action="?subtopic=accountmanagement&action=services" method="post">
												<input type="hidden" name="ServiceID" value="' . $_REQUEST['ServiceID'] . '" />
												<input type="hidden" name="PMCID" value="' . $_REQUEST['PMCID'] . '" />
												<input type="hidden" name="ServiceCategoryID" value="' . $_REQUEST['ServiceCategoryID'] . '" />
												<input type="hidden" name="Price" value="' . $_REQUEST['Price'] . '" />
												<input type="hidden" name="selectFriend" value="'.$sendFriend.'">
												<input type="hidden" name="sendTo" value="'.$sendTo.'">
												<input type="hidden" name="step" value="3">
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