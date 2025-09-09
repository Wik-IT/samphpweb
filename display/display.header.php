<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title><?php echo STATION_NAME; ?> - powered by SAM Broadcaster</title>
		<link rel="shortcut icon" href="favicon.ico" />
		<!-- General styles of the samPHPweb pages -->
		<link rel="stylesheet" type="text/css" href="styles/style.css" />

		<!-- Common Javascript functions -->
		<script type="text/javascript" src="js/common.js"></script>
		<?php if (ALLOW_REQUESTS) : ?>
		<!-- Javascript for request and songinfo actions -->
		<script type="text/javascript">
			/**
			 * Open a popup window to send a song request to SAM
			 */
			function request(songID)
			{
				requestPrivate(songID);
			}
		</script>
		<?php endif; ?>
		<!-- JQuery library to do cool Javascript stuff -->
		<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
		<!-- JQuery plugin for Cross-Browser compatible rounding of corners -->
		<script type="text/javascript" src="js/jquery.corner.js"></script>

	</head>

	<body>

		<!-- BEGIN:PAGE -->
		<div id="page">


			<!-- BEGIN:LOGO -->
			<div id="logo">
				<a href="./">
					<img src="<?php echo STATION_LOGO; ?>"/>
				</a>
				<?php if (!empty($currentSong) && $currentSong->listeners > 0): ?>
					<div id="listener_count">Users Listening: <?php echo $currentSong->listeners; ?></div>
				<?php endif; ?>
			</div>
			<!-- END:LOGO -->


			<!-- BEGIN:ERROR_MESSAGE
			<?php if(isset($err_message) && is_array($err_message) && count($err_message)>0) : ?>
			<div id="err_message" class="error">
				<?php foreach($err_message as $errmsg) { echo '<div>'.$errmsg.'</div>'; } ?>
			</div>
			<?php endif; ?>
			END:ERROR_MESSAGE -->


			<!-- BEGIN:NAVIGATION -->
			<div id="navigation">
				<dl>
					<dt>Menu</dt>
<!--					<?php
						$station_listen = constant('STATION_LISTEN');
						if (!empty($station_listen) && !is_null($station_listen)) :
					?> -->
<!-- 					<dd><a href="<?php echo $station_listen ?>" title="Click to Listen" target="_blank"><img src="images/menu/speaker.png" /> Listen</a></dd> -->
					<dd><a href="player.php" title="Click to Listen"><img src="images/menu/speaker.png" /> Listen</a></dd>
					<?php endif; ?>

					<dd><a href="playing.php" title="Now playing"><img src="images/menu/play.png" /> Now playing</a></dd>
					<dd><a href="playlist.php" title="Playlist &amp; Requests"><img src="images/menu/tb-file-list.png" /> Playlist<?php if (ALLOW_REQUESTS) : ?> &amp; Requests<?php endif; ?></a></dd>
<!--					<?php
						$station_email = constant('STATION_EMAIL');
						if (!empty($station_email) && !is_null($station_email)) :
					?>
							<dd><a href="mailto:<?php echo $station_email ?>" title="Email us!"><img src="images/menu/email.png" /> Email us!</a></dd>
					<?php endif; ?> -->
				</dl>
			</div>
			<!-- END:NAVIGATION -->

			<!-- BEGIN:TOP_REQUESTS -->
			<?php if (ALLOW_REQUESTS && SHOW_TOP_REQUESTS && is_array($topRequestedSongs) && count($topRequestedSongs) > 0): ?>
			<div id="top_requests">
				<dl>
					<dt>Top Requested</dt>
					<?php
						  $counter = 1;
						  foreach ($topRequestedSongs as $topRequestedSong): ?>
						<dd>
							<a href="javascript:songinfo(<?php echo $topRequestedSong->ID; ?>)" title="<?php echo $topRequestedSong->artist_title; ?>">
								<?php echo $counter++;?>. <?php echo $topRequestedSong->title; ?>
								<?php if(!empty($topRequestedSong->artist)) : ?><br />&nbsp;&nbsp;&nbsp;&nbsp;by  <?php echo $topRequestedSong->artist; ?><?php endif; ?>
								(<?php echo $topRequestedSong->cnt; ?>)
							</a>
						</dd>
					<?php endforeach; ?>
				</dl>
			</div>
			<?php endif; ?>
			<!-- END:TOP_REQUESTS -->


			<!-- BEGIN:PARTER LINKS -->
			<div id="partner-links">
				<!--- SpacialAudioSolutions_Link_BEGIN
				<a href="http://spacial.com/sam-broadcaster" title="Powered by SAM Broadcaster" target="_blank"><img src="http://media.spacial.com/images/affiliate-badge-sam-broadcaster-20x60.jpg" title="Powered by SAM Broadcaster" border="0" /></a>
				 SpacialAudioSolutions_Link_END -->
			</div>
			<!-- END:PARTER LINKS -->
