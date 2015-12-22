<?php
App::uses('ProjectAppModel', 'Project.Model');

class ProjectTaskComment extends ProjectAppModel
{
    public $name = 'ProjectTaskComment';

    public $belongsTo = array(
        'Author' => array(
            'className' => 'Admin.User',
            'foreignKey' => 'author_id'
        ),
        'ProjectTask'
    );
}

