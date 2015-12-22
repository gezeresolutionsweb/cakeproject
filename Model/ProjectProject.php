<?php
App::uses('ProjectAppModel', 'Project.Model');

class ProjectProject extends ProjectAppModel
{
    public $name = 'ProjectProject';

    public $hasMany = array(
        'Project.ProjectTask',
        'Project.ProjectMilestone'
    );

    public $belongsTo = array(
        'ParentProject' => array(
            'className' => 'Project.ProjectProject',
            'foreignKey' => 'parent_id'
        )
    );

    /**
     * Get project view data
     *
     * This function get in one shot all the data we need for the view of a project.
     *
     * @access public
     * @author Sylvain Lévesque <slevesque@gezere.com>
     * @param int $id Project identifier.
     * @return array Structured array of data containing the project and all its related information for the view.
     */
    public function getProjectView($id)
    {
        return $this->find( 'first', array(
            'fields' => array(
                'title',
                'description',
                'created',
                'modified'
            ),
            'conditions' => array(
                $this->alias . '.id' => $id
            ),
            'contain' => array(
                'ParentProject.title',
                'ProjectTask' => array(
                    'fields' => array(
                        'ProjectTask.id',
                        'ProjectTask.title',
                        'ProjectTask.due_date',
                        'ProjectTask.done_ratio',
                        'ProjectTask.estimated_hours',
                    ),
                    'limit' => 10,
                    'order' => array(
                        'ProjectTask.created DESC',
                    ),
                    'conditions' => array(
                        'ProjectTask.project_task_status_id NOT IN' => array( 4,5 )
                    )
                ),
                'ProjectTask.ProjectMilestone.title',
                'ProjectTask.ProjectTaskCategory.title',
                'ProjectTask.ProjectTaskStatus.title',
                'ProjectTask.ProjectTaskPriority.title',
                'ProjectTask.Author.nom_full',
                'ProjectTask.AssignedTo.nom_full',
                'ProjectMilestone' => array(
                    'fields' => array(
                        'ProjectMilestone.title',
                        'ProjectMilestone.description',
                        'ProjectMilestone.created',
                        'ProjectMilestone.effective_date',
                        'ProjectMilestone.is_active',
                    ),
                    'order' => array(
                        'ProjectMilestone.created'
                    )
                )
            )
        ) );
    }

    /**
     * Get a picklist of active projects.
     *
     * @access public
     * @author Sylvain Lévesque <slevesque@gezere.com>
     * @param array $conditions Array of conditions to filter the element in the picklist.
     * @return array Array of project ready to use with picklist.
     * @see AppModel::picklist()
     */
    public function picklist($conditions = [])
    {
        $tempConditions = array(
            $this->alias . '.is_active' => 1
        );

        if( !empty( $conditions ) ) {
            $tempConditions = array_merge( $tempConditions, $conditions );
        }

        return parent::picklist( $tempConditions );
    }
}

