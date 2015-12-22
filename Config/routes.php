<?php
Router::connect('/project', array(
    'plugin' => 'project',
    'controller' => 'project_tasks',
    'action' => 'index'
));
