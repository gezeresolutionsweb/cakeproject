<?php
App::uses('ProjectAppController', 'Project.Controller');

class ProjectTasksController extends ProjectAppController
{
    public $name = 'ProjectTasks';

    public function index()
    {
        // Build conditions table
        $conditions = array();
        if( !empty( $this->request->data[ 'Filter' ][ 'search' ] ) ) {
            $conditions[ 'ProjectTask.title LIKE' ] = '%' . $this->request->data[ 'Filter' ][ 'search' ] . '%';
        }

        if( !empty( $this->request->data[ 'FilterByProject' ] ) ) {
            $conditions[ 'ProjectTask.project_project_id' ] = $this->request->data[ 'FilterByProject' ];
        }

        if( !empty( $this->request->data[ 'FilterByCategory' ] ) ) {
            $conditions[ 'ProjectTask.project_task_category_id' ] = $this->request->data[ 'FilterByCategory' ];
        }

        if( !empty( $this->request->data[ 'FilterByStatus' ] ) ) {
            $conditions[ 'ProjectTask.project_task_status_id' ] = $this->request->data[ 'FilterByStatus' ];
        }

        if( !empty( $this->request->data[ 'FilterByPriority' ] ) ) {
            $conditions[ 'ProjectTask.project_task_priority_id' ] = $this->request->data[ 'FilterByPriority' ];
        }


        $conditions[ 'ProjectTask.project_task_status_id NOT IN' ] = array( 4,5 );

        $this->Paginator->settings[ 'contain' ] = array(
            'ProjectProject.title',
            'ProjectTaskCategory.title',
            'ProjectTaskStatus.title',
            'ProjectTaskPriority.title',
            'ProjectTaskComment.id'
        );

        $viewVars = array(
            'tasks' => $this->Paginator->paginate('ProjectTask', $conditions ),
            'projects' => $this->ProjectTask->ProjectProject->picklist(),
            'categories' => $this->ProjectTask->ProjectTaskCategory->picklist(),
            'statuses' => $this->ProjectTask->ProjectTaskStatus->picklist(),
            'priorities' => $this->ProjectTask->ProjectTaskPriority->picklist()
        );
        
        if ($this->request->is( 'ajax' )) {
            $this->layout = 'ajax';
            $this->autoRender = false;
            $view = new View($this);
            return json_encode(array(
                'content' => $view->element('Project.tasks-table-loop', $viewVars ),
                'pagination' => $view->element('pagination')
            ));
        }

        $this->set( $viewVars );
    }

    public function add()
    {
        if ($this->request->is('post')) {
            if ($this->ProjectTask->save($this->request->data)) {
                $this->Flash->set(__d('project', 'New task added successfully !') , array( 'element' => 'success' ) );
                $this->redirect(array( 'action' => 'index' ));
            }
            $this->Flash->set(__d('project', 'An error occured. Please try again later !') , array( 'element' => 'error' ) );
        }

        $this->set( array(
            'projects' => $this->ProjectTask->ProjectProject->picklist(),
            'categories' => $this->ProjectTask->ProjectTaskCategory->picklist(),
            'statuses' => $this->ProjectTask->ProjectTaskStatus->picklist(),
            'priorities' => $this->ProjectTask->ProjectTaskPriority->picklist(),
        ) );
    }

    public function edit($id)
    {
        if ($this->request->is( array( 'post', 'put' ) ) ) {
            if ($this->ProjectTask->save($this->request->data)) {
                $this->Flash->set(__d('project', 'Task updated successfully !') , array( 'element' => 'success' ) );
                $this->redirect(array( 'action' => 'index' ) );
            }
            $this->Flash->set(__d('project', 'An error occured. Please try again later !') , array( 'element' => 'error' ) );
        } else {
            $this->request->data = $this->ProjectTask->find( 'first', array(
                'conditions' => array(
                    'ProjectTask.id' => $id
                ),
                'contain' => array(
                    'ProjectProject.title',
                    'ProjectTaskCategory.title',
                    'ProjectTaskStatus.title',
                    'ProjectTaskPriority.title',
                    'ProjectTaskComment.id'
                )
            ) );
        }


        $this->set( array(
            'projects' => $this->ProjectTask->ProjectProject->picklist(),
            'categories' => $this->ProjectTask->ProjectTaskCategory->picklist(),
            'statuses' => $this->ProjectTask->ProjectTaskStatus->picklist(),
            'priorities' => $this->ProjectTask->ProjectTaskPriority->picklist(),
        ) );
    }

    public function delete($id)
    {
        if ( $this->request->is( 'get' ) ) {
            $this->ProjectTask->id = $id;
            $this->ProjectTask->saveField('closed', date( 'Y-m-d H:i:s' ) );
            $this->ProjectTask->saveField('project_task_status_id', 4 );
            $this->Flash->set(__d('project', 'Task deleted successfully !') , array( 'element' => 'success' ) );
        }
        $this->redirect($_SERVER['HTTP_REFERER']);
    }
}

