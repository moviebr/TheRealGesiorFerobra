<?php
if(!defined('INITIALIZED'))
	exit;

if($action == "") {				
	$main_content .= '
		<div class="TableContainer">
			<div class="CaptionContainer">
				<div class="CaptionInnerContainer"> 
					<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
					<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
					<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
					<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
					<div class="Text">Information</div>
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
															<td width="30%" class="LabelV">PvP Protection:</td>
															<td>to level '.$config['server']['protectionLevel'].'</td>
														</tr>
														<tr style="background-color:#F1E0C6;" >
															<td class="LabelV">Exp Rate:</td>
															<td>';
														$stages = simplexml_load_file($config['site']['serverPath'].'/data/XML/stages.xml'); //carrega o arquivo XML e retornando um Array
														foreach($stages->stage as $stage)
															$main_content .= '<li>' . $stage['minlevel'] . ((empty($stage['maxlevel'])) ? '' : ' - ') . $stage['maxlevel'] . ', ' . $stage['multiplier'] . 'x</li>';
														$main_content .= '
															</td>
														</tr>
														<tr style="background-color:#D4C0A1;" >
															<td class="LabelV">Skill Rate:</td>
															<td>'.$config['server']['rateSkill'].'x</td>
														</tr>
														<tr style="background-color:#F1E0C6;" >
															<td class="LabelV">Magic Rate:</td>
															<td>'.$config['server']['rateMagic'].'x</td>
														</tr>
														<tr style="background-color:#D4C0A1;" >
															<td class="LabelV">Loot Rate:</td>
															<td>'.$config['server']['rateLoot'].'x</td>
														</tr>
														<tr style="background-color:#F1E0C6;" >
															<td class="LabelV">Kills to RedSkull:</td>
															<td>'.$config['server']['killsToRedSkull'].'x</td>
														</tr>
														<tr style="background-color:#D4C0A1;" >
															<td class="LabelV">Kills to BlackSkull:</td>
															<td>'.$config['server']['killsToBlackSkull'].'x</td>
														</tr>
														<tr style="background-color:#F1E0C6;" >
															<td class="LabelV">Free bless to level:</td>
															<td>100</td>
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
	if ($config['site']['ShopSystem'] == true){
		$main_content .= '
		<div class="TableContainer">
			<div class="CaptionContainer">
				<div class="CaptionInnerContainer"> 
					<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
					<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
					<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
					<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
					<div class="Text">Donation System And Online Shop</div>
					<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
					<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
					<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
					<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
				</div>
			</div>
			<table class="Table5" cellpadding="0" cellspacing="0">
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
															<td>
																<strong>Understand how to use our donation system and shop online.</strong>
																<p>We have the most current donation system, and everyone\'s online shop, where you have practicality in your donations and purchase of items on the server, and everything automatic. Thinking about making your journey on our server a bit more attractive, we have developed a unique shop where you will be happy to help the server grow.</p><p>Click the links and see a simple tutorial on how the <a href="?subtopic=serverinfo&action=tutorialdonate">Donate System</a> and <a href="?subtopic=serverinfo&action=tutorialshop">Shop Online</a>.</p>
															</td>
															<td width="30%"><img src="'.$layout_name.'/images/shop/info.jpg"></td>
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
		</div>';
}}
if($action == "tutorialdonate") {
	$main_content .= '
		<script src="'.$layout_name.'/fancy/jquery.fancybox.js"></script>
        <script src="'.$layout_name.'/fancy/helpers/jquery.fancybox-media.js?v=1.0.5"></script>
        <link href="'.$layout_name.'/fancy/jquery.fancybox.css" rel="stylesheet" />
		<script>
			$(document).ready(function(){
				 $(\'.fancybox-media\').fancybox({
					openEffect  : \'none\',
					closeEffect : \'none\',
					helpers : {
						media : {}
					}
				});
			});
		</script>';
	$main_content .= '
		<center>
			<table>
				<tbody>
					<tr>
						<td><img src="'.$layout_name.'/images/global/content/headline-bracer-left.gif"></td>
						<td style="text-align:center;vertical-align:middle;horizontal-align:center;font-size:17px;font-weight:bold;">Tutorial - Sistema de Doações</td>
						<td><img src="'.$layout_name.'/images/global/content/headline-bracer-right.gif"></td>
					</tr>
				</tbody>
			</table>
		</center>
		<br>';
	$main_content .= '<p>Our donation system consists of 3 types of payment, <strong>PagSeguro</strong>, <strong>PayPal</strong> e <strong>Bank Transfer</strong>. O PagSeguro is the only method that does not require confirmation of payment, since it is automatic, since the others need confirmation, below you will see a brief explanation of how it works.</p>';
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
							<td style="width:100%;text-align:center;" >
							<nobr>[<a href="#PagSeguro" >Pagseguro</a>]</nobr>
							<!--<nobr>[<a href="#PayPal" >PayPal</a>]</nobr>--> 
							<!--<nobr>[<a href="#Bank+Transfer" >Bank Transfer</a>]</nobr>-->
							<nobr>[<a href="#Confirmar" >Confirming your donation</a>]</nobr> 
							<nobr>[<a href="#Obs" >Comments</a>]</nobr></td>
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
		<a name="PagSeguro" ></a>
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
					<div class="Text">Donations - Pagseguro</div>
					<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
					<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
					<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
					<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
				</div>
			</div>
			<table class="Table5" cellpadding="0" cellspacing="0">
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
															<td>
																<p>After logging into your account, go to the menu next to the option <strong>Manage Account</strong>. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img1.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img1.jpg" width="250px">
																</a>
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
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%">
														<tr style="background-color:#D4C0A1;" >
															<td>
																<p>Once you click on manage account, it will open a page containing all the information in your account, then you will click on <strong>Get Extra Service</strong>. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img2.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img2.jpg" width="250px">
																</a>
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
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%">
														<tr style="background-color:#D4C0A1;" >
															<td>
																<p>The following screen shows you some information that will make you understand our donation system if you can read everything. After reading, click <strong>Next</strong>. In this next screen you will see the 3 possible payment options, in this case we will select the<strong>PagSeguro</strong>, then click <strong>Next</strong>. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img3.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img3.jpg" width="250px">
																</a>
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
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%">
														<tr style="background-color:#D4C0A1;" >
															<td>
																<p>In this screen you have a statement of the points packets, converted in the same amount in reais (10 points = $ 10.00). Choose the package of points you want, then click <strong>Next</strong> again. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img4.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img4.jpg" width="250px">
																</a>
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
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%">
														<tr style="background-color:#D4C0A1;" >
															<td>
																<p>This next page is just for you to check your donation, if the data is correct click <strong>Next</strong>. Now is the main part of this type of donation, in this next page you need to click on <strong>Buy Now</strong> to be redirected to the <strong>PagSeguro</strong> and so complete your donation. If you leave the page, you\'ll have to do the whole process again. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img5.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img5.jpg" width="250px">
																</a>
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
	/*
	$main_content .= '
		<a name="PayPal" ></a>
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
					<div class="Text">Doações - PayPal</div>
					<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
					<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
					<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
					<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
				</div>
			</div>
			<table class="Table5" cellpadding="0" cellspacing="0">
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
															<td>
																<p>Depois de logar em sua conta, acesse no menu ao lado a opção <strong>Manage Account</strong>. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img1.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img1.jpg" width="250px">
																</a>
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
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%">
														<tr style="background-color:#D4C0A1;" >
															<td>
																<p>Depois de clicar em manage account, abrirá uma página contendo todas as informações de sua conta, então você ira clicar em <strong>Get Extra Service</strong>. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img2.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img2.jpg" width="250px">
																</a>
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
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%">
														<tr style="background-color:#D4C0A1;" >
															<td>
																<p>A tela seguinte lhe mostra algumas informações que farão você entender nosso sistema de doações, se puder leia tudo. Após ler clique em <strong>Next</strong>. Nessa próxima tela você vai ver as 3 opções de pagamento possiveis, nesse caso vamos selecionar o <strong>PayPal</strong>, depois de selecionado clique em <strong>Next</strong>. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img6.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img6.jpg" width="250px">
																</a>
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
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%">
														<tr style="background-color:#D4C0A1;" >
															<td>
																<p>Nessa tela você tem um demonstrativo dos pacotes de pontos, convertidos na mesma quantidade em reais (10 pontos = R$ 10,00). Escolha o pacote de pontos que deseja, então clique em <strong>Next</strong> novamente. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img4.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img4.jpg" width="250px">
																</a>
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
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%">
														<tr style="background-color:#D4C0A1;" >
															<td>
																<p>Essa próxima página é apenas para você conferir sua doação, se os dados estiverem correto clique em <strong>Next</strong>. Agora você precisa clicar em <strong>Buy Now</strong> nessa página, onde será redirecionado ao site do PayPal, onde finalizará sua doação. <strong>IMPORTANTE:</strong> Doações feitas por PayPal deverão ser confirmadas, veja como clicando <a href="?subtopic=serverinfo&action=tutorialdonate#Confirmar">aqui</a>. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img57.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img7.jpg" width="250px">
																</a>
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
					<div class="Text">Doações - Bank Transfer</div>
					<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
					<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
					<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
					<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
				</div>
			</div>
			<table class="Table5" cellpadding="0" cellspacing="0">
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
															<td>
																<p>Depois de logar em sua conta, acesse no menu ao lado a opção <strong>Manage Account</strong>. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img1.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img1.jpg" width="250px">
																</a>
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
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%">
														<tr style="background-color:#D4C0A1;" >
															<td>
																<p>Depois de clicar em manage account, abrirá uma página contendo todas as informações de sua conta, então você ira clicar em <strong>Get Extra Service</strong>. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img2.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img2.jpg" width="250px">
																</a>
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
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%">
														<tr style="background-color:#D4C0A1;" >
															<td>
																<p>A tela seguinte lhe mostra algumas informações que farão você entender nosso sistema de doações, se puder leia tudo. Após ler clique em <strong>Next</strong>. Nessa próxima tela você vai ver as 3 opções de pagamento possiveis, nesse caso vamos selecionar o <strong>Bank Transfer</strong>, depois de selecionado clique em <strong>Next</strong>. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img8.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img8.jpg" width="250px">
																</a>
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
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%">
														<tr style="background-color:#D4C0A1;" >
															<td>
																<p>Nessa tela você tem um demonstrativo dos pacotes de pontos, convertidos na mesma quantidade em reais (10 pontos = R$ 10,00) e o banco ao qual deseja fazer a transferência. Escolha o banco para o qual irá transferir o valor de sua doação, escolha o pacote de pontos que deseja, então clique em <strong>Next</strong> novamente. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img9.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img9.jpg" width="250px">
																</a>
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
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%">
														<tr style="background-color:#D4C0A1;" >
															<td>
																<p>Essa próxima página é apenas para você conferir sua doação, se os dados estiverem correto clique em <strong>Next</strong>. Sua doação já está em nosso sistema, apenas necessitando de sua confirmação para liberação de seu pacote de pontos. <strong>IMPORTANTE:</strong> Doações feitas por <strong>Bank Transfer</strong> deverão ser confirmadas, veja como clicando <a href="?subtopic=serverinfo&action=tutorialdonate#Confirmar">aqui</a>. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img10.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img10.jpg" width="250px">
																</a>
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
	*/
	$main_content .= '
		<a name="Confirmar" ></a>
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
					<div class="Text">Donations - Confirming your donation</div>
					<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
					<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
					<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
					<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
				</div>
			</div>
			<table class="Table5" cellpadding="0" cellspacing="0">
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
															<td>
																<p>To confirm a donation (PayPal and Bank Transfer), you must go to the page where they are <a href="?subtopic=accountmanagement&action=manage">all your account information</a>. In the box <strong>Donates</strong> you\'ll see a list of donations made and pending confirmation. Click the donation you\'d like to confirm. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img11.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img11.jpg" width="250px">
																</a>
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
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%">
														<tr style="background-color:#D4C0A1;" >
															<td>
																<p>Already on the confirmation page of your donation you will see a field. Enter in this fields all the necessary data so that your confirmation is successful and you can receive your points package. After entering your donation data click on <strong>Next</strong> to confirm. Okay, your donation is confirmed, you have a maximum term of up to 24 hours to receive your points. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img12.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img12.jpg" width="250px">
																</a>
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
	
	$main_content .= '
		<a name="Obs" ></a>
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
					<div class="Text">Donations - Comments</div>
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
															<td>You can only make a purchase in our Shop Online if you have your account properly registered, so register by stating your true email in case you need to recover your account later.</td>
														</tr>
														<tr bgcolor="'.$config['site']['lightborder'].'">
															<td>Avoid using our donation system if you do not really donate, if your account is identified using our system improperly it may be banned or even deleted from the game without prior notice.</td>
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
		<center>
			<form method="post" action="?subtopic=serverinfo">
				<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
				 	<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
						<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
					</div>
				</div>
			</form>
		</center>';
}
if($action == "tutorialshop") {
	$main_content .= '
		<script src="'.$layout_name.'/fancy/jquery.fancybox.js"></script>
        <script src="'.$layout_name.'/fancy/helpers/jquery.fancybox-media.js?v=1.0.5"></script>
        <link href="'.$layout_name.'/fancy/jquery.fancybox.css" rel="stylesheet" />
		<script>
			$(document).ready(function(){
				 $(\'.fancybox-media\').fancybox({
					openEffect  : \'none\',
					closeEffect : \'none\',
					helpers : {
						media : {}
					}
				});
			});
		</script>';
	$main_content .= '
		<center>
			<table>
				<tbody>
					<tr>
						<td><img src="'.$layout_name.'/images/global/content/headline-bracer-left.gif"></td>
						<td style="text-align:center;vertical-align:middle;horizontal-align:center;font-size:17px;font-weight:bold;">Tutorial - Shop Online</td>
						<td><img src="'.$layout_name.'/images/global/content/headline-bracer-right.gif"></td>
					</tr>
				</tbody>
			</table>
		</center>
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
							<td style="width:100%;text-align:center;" ><nobr>[<a href="#Shop" >Shop Online</a>]</nobr> <nobr>[<a href="#Ativar" >Activating the service</a>]</nobr></td>
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
		<a name="Shop" ></a>
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
					<div class="Text">Shop Online - Buying a Service</div>
					<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
					<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
					<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
					<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
				</div>
			</div>
			<table class="Table5" cellpadding="0" cellspacing="0">
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
															<td>We have 3 extra services, they are:
																<ul> 
																	<li><strong>Character Change Name</strong> - <small>Rename your character.</small></li>
																	<li><strong>Account Name Change</strong> - <small>Change the name of your account, the login you use to enter the game and the site.</small></li>
																	<li><strong>Recovery Key</strong> - <small>A new Recovery Key for your account, in case you have lost your.</small></li>
																</ul>
																<p>The purchase shown below is for extra services, items, mounts and addons. All purchases will require the same procedures.</p> 
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
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%">
														<tr style="background-color:#D4C0A1;" >
															<td>
																<p>To buy one of the services mentioned above go to the page where it contains <a href="?subtopic=accountmanagement&action=manage">all your account information</a>. Go the box <strong>Products Available</strong>, and then click <strong>Get Extra Service</strong> in the menu <strong>Extra Services</strong> <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img13.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img13.jpg" width="250px">
																</a>
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
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%">
														<tr style="background-color:#D4C0A1;" >
															<td>
																<p>This page you will see the extra services available and just below the method of payment, which in this case will be by Premium Points. Select the extra service you want, then select points as your payment type and then click <strong>Next</strong>. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img14.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img14.jpg" width="250px">
																</a>
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
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%">
														<tr style="background-color:#D4C0A1;" >
															<td>
																<p>On this page you have two options to activate this service, the first one (which is already selected by default) activates the extra service in your own account, and the second activates the service for a friend of yours.<br><strong>IMPORTANT:</strong> In order for your friend to appear in the list, it must be added to your list <strong>Vip List in-game</strong>, otherwise it will not appear. click in <strong>Next</strong>. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img15.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img15.jpg" width="250px">
																</a>
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
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%">
														<tr style="background-color:#D4C0A1;" >
															<td>
																<p>The next page only shows information about your purchase, and an option for you to accept the server rules, click <strong>Next</strong> after verifying the data of your purchase and accepting the rules. The next page tells you that your purchase has been completed. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img16.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img16.jpg" width="250px">
																</a>
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
	
	$main_content .= '
		<a name="Ativar" ></a>
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
					<div class="Text">Shop Online - Activating The Service</div>
					<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
					<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
					<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
					<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
				</div>
			</div>
			<table class="Table5" cellpadding="0" cellspacing="0">
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
															<td>This is the part where you activate the service in one of the characters in your account, remembering that if you gave the service to a friend, the service will not be available for activation in your account, but in that of your friend.</td>
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
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%">
														<tr style="background-color:#D4C0A1;" >
															<td>
																<p>For the service go to the page where it contains <a href="?subtopic=accountmanagement&action=manage">todas as informações de sua conta</a>. Go to the box <strong>Products Ready To Use</strong>, nit will be all the services you bought in the shop and need to be activated in your account or one of your characters. Choose the service you want to activate (if there is more than one) and then click <strong>Active</strong>. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img17.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img17.jpg" width="250px">
																</a>
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
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%">
														<tr style="background-color:#D4C0A1;" >
															<td>
																<p>On this next page you will see the data of the product you have bought, and the option to choose which character to activate the service. In the case of our example the service is a name change, then there is a field for the new name, and beside which character will receive the new name. Selecting everything correctly click on <strong>Next</strong>, and the service has been activated for your character. Remember that in the case of the name change your character must be logged off. <small>(Click on the image to enlarge.)</small></p>
															</td>
															<td width="30%">
																<a class="fancybox-media" href="'.$layout_name.'/images/shop/tutorial/img18.jpg">
																	<img src="'.$layout_name.'/images/shop/tutorial/img18.jpg" width="250px">
																</a>
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
	$main_content .= '
		<center>
			<form method="post" action="?subtopic=serverinfo">
				<div class="BigButton" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton.gif)" >
				 	<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/global/buttons/sbutton_over.gif);" ></div>
						<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/global/buttons/_sbutton_back.gif" >
					</div>
				</div>
			</form>
		</center>';
}