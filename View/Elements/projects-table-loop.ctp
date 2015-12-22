<?php if( !empty( $projects ) ): ?>
<div class="well">
    <table class="table table-condensed table-hover table-striped">
    <thead>
        <tr>
            <th><?php echo __d( 'project', 'Project #' ); ?></th>
            <th><?php echo $this->Paginator->sort( 'ProjectProject.title', __d( 'project', 'Title' ) ); ?></th>
            <th><span class="pull-right"><?php echo __d( 'project', 'Tasks' ); ?></span></th>
            <th><span class="pull-right"><?php echo $this->Paginator->sort( 'ProjectProject.is_active', __d( 'project', 'Is active' ) ); ?></span></th>
            <th></th>
        </tr>
    </thead>
    </tbody>
    <?php foreach( $projects as $project ): ?>
            <td><?php echo $project[ 'ProjectProject' ][ 'id' ]; ?></td>
            <td>
                <?php echo $this->Html->link(
                    $project[ 'ProjectProject' ][ 'title' ],
                    array( 'action' => 'view', $project[ 'ProjectProject' ][ 'id' ] ),
                    array( 'title' => __d( 'project', 'view' ), 'escape' => false )
                ); ?>
		    </td>
            <td><span class="pull-right">
                <?php echo $this->Html->badge(
                    count($project['ProjectTask']),
                    ['ga_type' => (empty($project['ProjectTask'])) ? GA_DEFAULT : GA_SUCCESS]
                ); ?>
            </span></td>
            <td><span class="pull-right">
                <?php echo $this->Html->badge(
                    $project['ProjectProject']['is_active'],
                    ['ga_type' => (empty($project['ProjectProject']['is_active'])) ? GA_INFO : GA_DEFAULT]
                ); ?>
            </span></td>
            <td>
                <div class="pull-right">
                    <?php echo $this->Html->link(
                        $this->Html->icon( 'eye' ),
                        array( 'action' => 'view', $project[ 'ProjectProject' ][ 'id' ] ),
                        array( 'title' => __d( 'project', 'view' ), 'escape' => false )
                    ); ?>

                    <?php echo $this->Html->link(
                        $this->Html->icon( 'pencil' ),
                        array( 'action' => 'edit', $project[ 'ProjectProject'][ 'id' ] ),
                        array( 'escape' => false, 'title' => __d( 'project', 'edit' ) )
                    ); ?>
                    <?php echo $this->Html->link(
                        $this->Html->icon('remove'),
                        ['action' => 'delete', $project['ProjectProject']['id']],
                        ['escape' => false, 'title' => __d('project', 'delete'), 'confirm' => __d('project', 'Delete this project ?')]
                    ); ?>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
</div>
<?php else: ?>
    <p><?php echo __d( 'project', 'No projects found !' ); ?></p>
<?php endif; ?>
