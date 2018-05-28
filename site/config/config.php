<?php

c::set('license', 'put your license key here');
c::set('debug', true);
c::set('languages', array(
  array(
    'code'    => 'en',
    'name'    => 'English',
    'default' => true,
    'locale'  => 'en_US',
    'url'     => '/en',
  ),
  array(
    'code'    => 'bg',
    'name'    => 'Български',
    'locale'  => 'bg_BG',
    'url'     => '/',
  )
));