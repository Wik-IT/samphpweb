<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Radio Playlist</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            background: transparent !important; /* fundal transparent */
            font-family: Arial, sans-serif;
            font-size: 14px;
            text-align: left;
            width: 100%;
            height: 100%;
            overflow: hidden; /* scoate scrollbar-ul */
        }
        .song {
            padding: 6px 10px;
            margin: 4px 0;
            font-weight: bold;
        }
        .label {
            font-weight: normal;
            margin-right: 6px;
        }
        .upcoming {
            background: pink;
            color: black;
        }
        .current {
            background: red;
            color: white;
        }
        .recent {
            background: black;
            color: white;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

<?php if(is_array($comingSongs) && count($comingSongs) > 0): ?>
    <?php $nextSong = $comingSongs[0]; ?>
    <div class="song upcoming">
        <span class="label">Coming up:</span>
        <?php echo htmlspecialchars($nextSong->artist).' - '.htmlspecialchars($nextSong->title); ?>
    </div>
<?php endif; ?>

<?php if ($currentSong instanceof Song): ?>
    <div class="song current">
        <span class="label">Now playing:</span>
        <?php echo htmlspecialchars($currentSong->artist).' - '.htmlspecialchars($currentSong->title); ?>
    </div>
<?php endif; ?>

<?php if(is_array($recentSongs) && count($recentSongs) > 0): ?>
    <?php $prevSong = $recentSongs[0]; ?>
    <div class="song recent">
        <span class="label">Previous song:</span>
        <?php echo htmlspecialchars($prevSong->artist).' - '.htmlspecialchars($prevSong->title); ?>
    </div>
<?php endif; ?>

<script type="text/javascript">
//<![CDATA[
<?php if(CHECK_INTERVAL > 0): ?>
    setInterval("DoCheckRefresh()", <?php echo CHECK_INTERVAL; ?>);

    function DoCheckRefresh() {
        var url = 'songcheck.js.php?songID=<?php echo ($currentSong instanceof Song) ? $currentSong->ID : 0; ?>&buster=' + (new Date().getTime());
        $.getScript(url);
    }

    function doSongChanged() {
        DoRefresh();
    }

    function DoRefresh() {
        document.location.href = "live.php?buster=<?php echo date('dhis').rand(1,1000); ?>";
    }
<?php endif; ?>
//]]>
</script>

</body>
</html>
