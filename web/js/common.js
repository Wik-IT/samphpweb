/**
 * Trigger a popup window to display info of the current song
 */
function songinfo(songID) {
  var songwin = window.open(
    "songinfo.php?songID=" + songID,
    "songinfowin",
    "location=no,status=no,menubar=no,scrollbars=yes,height=400,width=650"
  );
  songwin.focus();
}

/**
 * Handle requests on this same webserver
 */
function requestPrivate(songID) {
  reqwin = window.open(
    "request.php?songID=" + songID,
    "_AR_request",
    "location=no,status=no,menubar=no,scrollbars=yes,resizeable=yes,height=420,width=668"
  );
  reqwin.focus();
}

/**
 * Hide pictures if show = false
 */
function showPicture(obj, show) {
  if (show) {
    $(obj).show();
  } else {
    $(obj).hide();
  }
}
