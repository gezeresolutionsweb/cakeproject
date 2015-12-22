<?php
// Adding plugin view path to global view paths. For AssetCompress to work.
App::build(array(
    'View' => CakePlugin::path('Project') . 'View'
) , App::APPEND);
