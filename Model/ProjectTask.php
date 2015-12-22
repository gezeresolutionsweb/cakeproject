<?php
App::uses('ProjectAppModel', 'Project.Model');

class ProjectTask extends ProjectAppModel
{
    public $name = 'ProjectTask';

    public $belongsTo = array(
        'Project.ProjectProject',
        'Project.ProjectMilestone',
        'Project.ProjectTaskCategory',
        'Project.ProjectTaskPriority',
        'Project.ProjectTaskStatus',
        'Author' => array(
            'className' => 'Admin.User',
            'foreignKey' => 'author_id'
        ),
        'AssignedTo' => array(
            'className' => 'Admin.User',
            'foreignKey' => 'assigned_to_id'
        )
    );

    public $hasMany = array(
        'Project.ProjectTaskComment'
    );
}

