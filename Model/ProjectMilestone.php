<?php
App::uses('ProjectAppModel', 'Project.Model');

class ProjectMilestone extends ProjectAppModel
{
    public $name = 'ProjectMilestone';

    public $belongsTo = [
        'Project.ProjectProject',
    ];
}

