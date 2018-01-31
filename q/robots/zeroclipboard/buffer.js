var clip = null;
function $(id) { return document.getElementById(id); }
function init() {
clip = new ZeroClipboard.Client();
clip.setHandCursor( true );
clip.addEventListener('load', function (client) {});
clip.addEventListener('mouseOver', function (client) {clip.setText( $('fe_text').value );});
clip.addEventListener('complete', function (client, text) {});
clip.glue( 'copy_btn' );
}