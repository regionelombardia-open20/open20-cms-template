<?php
/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\admin\mail\user
 * @category   CategoryName
 */

use open20\amos\admin\AmosAdmin;
use yii\helpers\Html;
use Yii;

/**
 * @var yii\web\View $this
 * @var \open20\amos\core\user\User $user
 * @var \open20\amos\admin\models\UserProfile $profile
 */


$privacyUrl = (\Yii::$app->params['platform']['frontendUrl']);
$privacyUrl .= ((\Yii::$app->params['linkConfigurations']['privacyPolicyLinkCommon'])?: '/it/privacy-policy');
$appLink = Yii::$app->urlManager->createAbsoluteUrl(['/']);
$appName = Yii::$app->name;

$this->title = AmosAdmin::t('amosadmin', 'Reimposta password {appName}', ['appName' => $appName]);


?>

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<meta content="width=device-width" name="viewport"/>
<!--[if !mso]><!-->
<meta content="IE=edge" http-equiv="X-UA-Compatible"/>
<!--<![endif]-->
<title></title>
<!--[if !mso]><!-->
<!--<![endif]-->
	<style type="text/css">
		body {
			margin: 0;
			padding: 0;
		}

		table,
		td,
		tr {
			vertical-align: top;
			border-collapse: collapse;
		}

		* {
			line-height: inherit;
		}

		a[x-apple-data-detectors=true] {
			color: inherit !important;
			text-decoration: none !important;
		}
	</style>
	<style id="media-query" type="text/css">
		@media (max-width: 820px) {

			.block-grid,
			.col {
				min-width: 320px !important;
				max-width: 100% !important;
				display: block !important;
			}

			.block-grid {
				width: 100% !important;
			}

			.col {
				width: 100% !important;
			}

			.col>div {
				margin: 0 auto;
			}

			img.fullwidth,
			img.fullwidthOnMobile {
				max-width: 100% !important;
			}

			.no-stack .col {
				min-width: 0 !important;
				display: table-cell !important;
			}

			.no-stack.two-up .col {
				width: 50% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num8 {
				width: 66% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num3 {
				width: 25% !important;
			}

			.no-stack .col.num6 {
				width: 50% !important;
			}

			.no-stack .col.num9 {
				width: 75% !important;
			}

			.video-block {
				max-width: none !important;
			}

			.mobile_hide {
				min-height: 0px;
				max-height: 0px;
				max-width: 0px;
				display: none;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide {
				display: block !important;
				max-height: none !important;
			}
		}
	</style>
</head>


<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: <?= $notifyModule->mailThemeColor['textContrastBgPrimary'] ?>;">
<!--[if IE]><div class="ie-browser"><![endif]-->
	<table bgcolor="<?= $notifyModule->mailThemeColor['textContrastBgPrimary'] ?>" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: <?= $notifyModule->mailThemeColor['textContrastBgPrimary'] ?>; width: 100%;" valign="top" width="100%">
		<tbody>
			<tr style="vertical-align: top;" valign="top">
				<td style="word-break: break-word; vertical-align: top;" valign="top">
				<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:<?= $notifyModule->mailThemeColor['textContrastBgPrimary'] ?>"><![endif]-->
					<div style="background-color:transparent;">
						<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 800px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:800px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
								<!--[if (mso)|(IE)]><td align="center" width="800" style="background-color:transparent;width:800px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
								<div class="col num12" style="min-width: 320px; max-width: 800px; display: table-cell; vertical-align: top; width: 800px;">
									<div style="width:100% !important;">
										<!--[if (!mso)&(!IE)]><!-->
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
										<!--<![endif]-->
											<div align="left" class="img-container left autowidth" style="padding-right: 0px;padding-left: 0px;">
											<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="left"><![endif]--><img alt="Logo Regione Lombardia" border="0" class="left autowidth"  src="<?=str_replace(".it/it/", ".it/",  Yii::$app->urlManager->createAbsoluteUrl(["/img/logo_regione_lombardia.png"])) ?>" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 162px; display: block;" title="Logo Regione Lombardia" width="162"/>
											<!--[if mso]></td></tr></table><![endif]-->
											</div>
											<div align="center" class="img-container center fixedwidth fullwidthOnMobile" style="padding-right: 0px;padding-left: 0px;">
											<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]-->
												<div style="font-size:1px;line-height:10px"> </div><img align="center" alt="Banner" border="0" class="center fixedwidth fullwidthOnMobile" src="<?=str_replace(".it/it/", ".it/",  Yii::$app->urlManager->createAbsoluteUrl(["/img/email/1-LI-email-banner.jpg"])) ?>" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 800px; display: block;" title="Banner" width="800"/>
											<!--[if mso]></td></tr></table><![endif]-->
											</div>
										<!--[if (!mso)&(!IE)]><!-->
										</div>
										<!--<![endif]-->
									</div>
								</div>
								<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
								<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
							</div>
						</div>
					</div>
					<div style="background-color:transparent;">
						<div class="block-grid mixed-two-up" style="Margin: 0 auto; min-width: 320px; max-width: 800px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:800px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
								<!--[if (mso)|(IE)]><td align="center" width="533" style="background-color:transparent;width:533px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
									<div class="col num8" style="display: table-cell; vertical-align: top; min-width: 320px; max-width: 528px; width: 533px;">
										<div style="width:100% !important;">
										<!--[if (!mso)&(!IE)]><!-->
											<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
											<!--<![endif]-->
											<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
												<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
													<div style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
														<p style="font-size: 14px; line-height: 1.5; word-break: break-word; mso-line-height-alt: 17px; margin: 0;"><span style="color: #297b38;"><strong><span style="font-size: 44px;">Password dimenticata</span></strong></span></p>
													</div>
												</div>
											<!--[if mso]></td></tr></table><![endif]-->
											<!--[if (!mso)&(!IE)]><!-->
											</div>
										<!--<![endif]-->
										</div>
									</div>
								<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
								<!--[if (mso)|(IE)]></td><td align="center" width="266" style="background-color:transparent;width:266px; border-top: 0px solid transparent; border-left: 2px solid #0C3754; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:25px; padding-bottom:5px;"><![endif]-->
									<div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 264px; width: 264px;">
										<div style="width:100% !important;">
										<!--[if (!mso)&(!IE)]><!-->
										<div style="border-top:0px solid transparent; border-left:2px solid #0C3754; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:25px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
										<!--<![endif]-->
										<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
										<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
										<div style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
										<p style="line-height: 1.5; word-break: break-word; mso-line-height-alt: 14px; margin: 0;"><em><span style="color: #0c3754; font-size: 20px;">Recupera password</span></em></p>
										</div>
										</div>
										<!--[if mso]></td></tr></table><![endif]-->
										<!--[if (!mso)&(!IE)]><!-->
										</div>
										<!--<![endif]-->
										</div>
									</div>
								<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
								<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
							</div>
						</div>
					</div>
					<div style="background-color:transparent;">
						<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 800px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:800px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
								<!--[if (mso)|(IE)]><td align="center" width="800" style="background-color:transparent;width:800px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
									<div class="col num12" style="min-width: 320px; max-width: 800px; display: table-cell; vertical-align: top; width: 800px;">
										<div style="width:100% !important;">
											<!--[if (!mso)&(!IE)]><!-->
											<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
												<!--<![endif]-->
												<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
												<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
													<div style="line-height: 1.5; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 18px;">
														<p style="font-size: 22px; line-height: 1.5; word-break: break-word; mso-line-height-alt: 33px; margin: 0;"><span style="color: #003354; font-size: 22px;">
															<?= AmosAdmin::tHtml('amosadmin', 'Gentile {nome} {cognome},', [
																'nome' => Html::encode($profile->nome),
																'cognome' => Html::encode($profile->cognome)
															]); ?>
														</span>
                            <br />
                            <span style="color: #003354; font-size: 22px;">
                              <?= AmosAdmin::tHtml('amosadmin', "#forgot_password_request_message") ?>
                            </span>
														</p>
														<p style=" color:#0C3754; text-align:left; font-size: 1.8em; line-height: 1.5; margin: 0 0 20px 0;">
															<?php
															$seconds = Yii::$app->params['user.passwordResetTokenExpire'];
					
															if($seconds >= 86400) {
																$passwordResetTokenExpire = floor($seconds / (3600 * 24));
																if($passwordResetTokenExpire == 1){
																	$textDay = 'giorno';
																} else {
																	$textDay = 'giorni';
																}
															}else {
																if(floor($seconds / 60)>=60){
																	$textDay = chr(8);
																	$passwordResetTokenExpire = sprintf("%d ore",floor($seconds / (60*60)));
																} else {
																	$textDay = 'minuti';
																	$passwordResetTokenExpire = floor($seconds / 60);
																}
					
															}
					
															$passwordResetTokenExpire = $passwordResetTokenExpire . ' ' . $textDay;
															?>
															<?= AmosAdmin::tHtml('amosadmin', '#forgot_password_expire_message', [
																'passwordResetTokenExpire' =>  $passwordResetTokenExpire,
																'supportEmail' => Yii::$app->params['supportEmail']
															]); ?>
															<?php
															$link = $appLink . 'admin/security/insert-auth-data?token=' . $profile->user->password_reset_token;
															if(!empty($community)) {
																$link .= '&community_id='.$community->id;
															}
															if (isset($urlPrevious) && !empty($urlPrevious)) {
																$link .= '&url_previous=' . $urlPrevious;
															}
					
															?>
															<?= Html::beginTag('a', ['href' => $link]) ?>
															<?= AmosAdmin::tHtml('amosadmin', '#forgot_password_link'); ?>
															<?= Html::endTag('a'); ?>
														</p>
														<p style="color:#0C3754; text-align:left; font-size: 1.8em; line-height: 1.5; margin: 0 0 20px 0;">
															<?= AmosAdmin::tHtml('amosadmin', '#forgot_password_broken_link_message') ?>
															<?= AmosAdmin::tHtml('amosadmin', $link) ?>
														</p>
													</div>
												</div>
												<!--[if mso]></td></tr></table><![endif]-->
												<!--[if (!mso)&(!IE)]><!-->
											</div>
											<!--<![endif]-->
										</div>
									</div>
								<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
								<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
							</div>
						</div>
					</div>
			
					<div style="background-color:transparent;">
						<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 800px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:800px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
								<!--[if (mso)|(IE)]><td align="center" width="800" style="background-color:transparent;width:800px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
								<div class="col num12" style="min-width: 320px; max-width: 800px; display: table-cell; vertical-align: top; width: 800px;">
									<div style="width:100% !important;">
										<!--[if (!mso)&(!IE)]><!-->
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
											<!--<![endif]-->
											<div align="left" class="button-container" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
											<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px" align="left"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:30.75pt; width:112.5pt; v-text-anchor:middle;" arcsize="10%" stroke="false" fillcolor="#297438"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:<?= $notifyModule->mailThemeColor['textContrastBgPrimary'] ?>; font-family:Arial, sans-serif; font-size:16px"><![endif]-->
											<div style="text-decoration:none;display:inline-block;color:<?= $notifyModule->mailThemeColor['textContrastBgPrimary'] ?>;background-color:#297438;border-radius:4px;-webkit-border-radius:4px;-moz-border-radius:4px;width:auto; width:auto;;border-top:1px solid #297438;border-right:1px solid #297438;border-bottom:1px solid #297438;border-left:1px solid #297438;padding-top:5px;padding-bottom:5px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;"><span style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;"><span style="font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;">Conferma</span></span></div>
											<!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
											</div>
											<!--[if (!mso)&(!IE)]><!-->
											</div>
											<!--<![endif]-->
									</div>
								</div>
								<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
								<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
							</div>
						</div>
					</div>
					<div style="background-color:#f2f5f6;">
						<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 800px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f2f5f6;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:800px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
								<!--[if (mso)|(IE)]><td align="center" width="800" style="background-color:transparent;width:800px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
								<div class="col num12" style="min-width: 320px; max-width: 800px; display: table-cell; vertical-align: top; width: 800px;">
									<div style="width:100% !important;">
									<!--[if (!mso)&(!IE)]><!-->
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
											<!--<![endif]-->
											<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
											<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
												<div style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
												
												<p style="font-size: 16px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 19px; margin: 0;"><span style="font-size: 16px; color: #003354;">Informativa della privacy di riferimento <a href="<?= $privacyUrl ?>" rel="noopener" style="text-decoration: underline; color: #0068A5;" target="_blank">link informativa privacy.</a></span></p>
												</div>
											</div>
											<!--[if mso]></td></tr></table><![endif]-->
											<!--[if (!mso)&(!IE)]><!-->
										</div>
									<!--<![endif]-->
									</div>
								</div>
								<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
								<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
							</div>
						</div>
					</div>
				<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
				</td>
			</tr>
		</tbody>
	</table>
<!--[if (IE)]></div><![endif]-->
</body>
</html>