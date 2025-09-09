<?php require_once('display.header.php'); ?>

<div id="radio-player" style="max-width:400px;height:75px;margin:20px auto;padding:20px;border:1px solid #ccc;border-radius:10px;text-align:center;background:#f9f9f9;">
    
    <!-- Player audio nativ -->
    <audio id="audioPlayer" controls autoplay style="width:100%;height:100%;" preload="none">
        <source src="https://radio.pinkie.ro/stream" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

</div>

<?php require_once('display.footer.php'); ?>

</div>

<!-- JQuery to round corners some of the HTML items on the page -->
<script type="text/javascript">
//<![CDATA[
// Make sure the DOM is ready
$(document).ready(function() {
// Rounding of corners (Cross-browser compatible)
// See http://jquery.malsup.com/corner/ for different Styles.

// Rounds the page corners
$('#page').corner();

// Rounds the Navigation Menu Corners
$('#navigation dl').corner();

// Rounds the Currently Playing Table Corners
$('#currently_playing').corner();

// Rounds the Coming Up Corners
$('#coming-up').corner();

// Rounds the Recently Played Table Corners
$('#recently_played').corner();
// Style odd and even rows in Currently Playing Table (Cross-browser compatible)
$('#recently_played table tbody tr:nth-child(odd)').addClass('recently_played_odd');
$('#recently_played table tbody tr:nth-child(even)').addClass('recently_played_even');

// Round the Dedication Corners
$('#dedication dl').corner('tl tr').corner();

// Round the Top Request Corners
$('#top_requests dl').corner();
});
//]]>
</script>
</body>
</html>
