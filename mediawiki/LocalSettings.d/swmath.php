<?php
if ( str_contains($_SERVER['SERVER_NAME'],'swmath') ){
  $wgDBname = 'wiki_swmath';
  $wgLogos = false;
  # Load swMATH specific extensions
  # wfLoadExtension( 'ExternalData' );
}
