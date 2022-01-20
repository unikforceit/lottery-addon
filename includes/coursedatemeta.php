<?php if ( ! defined( 'ABSPATH' )  ) { die; }

$prefix_page_opts = '_coursedatemeta';


CSF::createMetabox( $prefix_page_opts, array(
  'title'        => 'Course Date Options',
  'post_type'    => ['coursedate'],
  'show_restore' => false,
  'theme'=> 'light',
) );

//
// Create a section
//
CSF::createSection( $prefix_page_opts, array(
  'title'  => 'Course Date Fields',
  'icon'   => 'fas fa-rocket',
  'fields' => array(
      array(
          'id'    => 'date_before',
          'type'  => 'text',
          'title' => 'Date Before',
      ),
      array(
          'id'    => 'date',
          'type'  => 'date',
          'title' => 'Date',
      ),
      array(
          'id'    => 'free',
          'type'  => 'text',
          'title' => 'Free',
      ),
      array(
          'id'    => 'locatie',
          'type'  => 'text',
          'title' => 'Locatie Value',
      ),
      array(
          'id'    => 'detum',
          'type'  => 'text',
          'title' => 'Detum Value',
      ),
  )
) );

