<?php
App::uses('ProjectAppController', 'Project.Controller');

class ProjectProjectsController extends ProjectAppController
{
    public $name = 'ProjectProjects';

    public $uses = array(
        'Project.ProjectProject',
    );

    // Actions
    public function index()
    {
        // Build conditions table
        $conditions = array();

        if( !empty( $this->request->data[ 'Filter' ][ 'search' ] ) ) {
            $conditions[ 'ProjectProject.title LIKE' ] = '%' . $this->request->data[ 'Filter' ][ 'search' ] . '%';
        }


        $this->Paginator->settings['fields'] = array(
            'ProjectProject.id',
            'ProjectProject.title',
            'ProjectProject.is_active'
        );
        $this->Paginator->settings['contain'] = array(
            'ProjectTask' => array(
                'id',
                'conditions' => array(
                    'project_task_status_id NOT IN' => array( 4, 5 )
                )
            ),
        );

        $this->Paginator->settings[ 'order' ] = array(
            'ProjectProject.is_active' => 'DESC',
            'ProjectProject.title'
        );

        $projects = $this->Paginator->paginate( 'ProjectProject', $conditions );

        if ($this->request->is( 'ajax' )) {
            $this->layout = 'ajax';
            $this->autoRender = false;
            $view = new View($this);
            return json_encode(array(
                'content' => $view->element('Project.projects-table-loop', array(
                    'projects' => $projects
                )) ,
                'pagination' => $view->element('pagination')
            ));
        }
        $this->set('projects', $projects );
    }
    public function view( $id ) {
        $project = $this->ProjectProject->getProjectView( $id );
        
        $this->set( array(
            'project' => $project
        ) );
    }
    public function add() {
        if ($this->request->is('post')) {
            if ($this->ProjectProject->save($this->request->data)) {
                $this->Flash->set(__d('project', 'New project added successfully !') , array( 'element' => 'success' ) );
                $this->redirect(array( 'action' => 'index' ));
            }
            $this->Flash->set(__d('project', 'An error occured. Please try again later !') , array( 'element' => 'error' ) );
        }

        $this->set( array(
            'projects' => $this->ProjectProject->picklist()
        ) );
    }
    public function edit($id) {
        if( $this->request->is( array( 'post', 'put' ) ) ) {
            if( $this->ProjectProject->save( $this->request->data ) ) {
                $this->Flash->set(__d('project', 'Project updated successfully !') , array( 'element' => 'success' ) );
                $this->redirect(array( 'action' => 'index' ) );
            }
            $this->Flash->set(__d('project', 'An error occured. Please try again later !') , array( 'element' => 'error' ) );
        } else {
            $this->request->data = $this->ProjectProject->findById( $id );
        }

        $this->set( array(
            'projects' => $this->ProjectProject->picklist()
        ) );
    }
    public function delete($id) {
        if ( $this->request->is( 'get' ) ) {
            $this->ProjectProject->id = $id;
            $this->ProjectProject->saveField('is_active', 0 );
            $this->Flash->set(__d('project', 'Project deleted successfully !') , array( 'element' => 'success' ) );
        }
        $this->redirect($_SERVER['HTTP_REFERER']);
    }

}
