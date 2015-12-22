<div class="well">
<?php if( !empty( $tasks ) ): ?>
    <table class="table table-condensed table-striped table-hover">
    <thead>
        <tr>
            <th><?php echo __d( 'project', 'Title' ); ?></th>
            <th><?php echo __d( 'project', 'Project' ); ?></th>
            <th><?php echo __d( 'project', 'Category' ); ?></th>
            <th><?php echo __d( 'project', 'Priority' ); ?></th>
            <th><?php echo __d( 'project', 'Status' ); ?></th>
            <th></th>
        </tr>
    </thead>
    </tbody>
    <?php foreach( $tasks as $task ): ?>
        <tr>
            <td><?php echo $task[ 'ProjectTask' ][ 'title' ]; ?></td>
            <td><?php echo $task[ 'ProjectProject' ][ 'title' ]; ?></td>
            <td><?php echo $task[ 'ProjectTaskCategory' ][ 'title' ]; ?></td>
            <td><?php echo $task[ 'ProjectTaskPriority' ][ 'title' ]; ?></td>
            <td><?php echo $task[ 'ProjectTaskStatus' ][ 'title' ]; ?></td>
            <td>
                <?php echo $this->Html->badge(
                    count($task['ProjectTaskComment']),
                    ['ga_type' => GA_INFO]
                ); ?>
            </td>
            <td>
                <div class="pull-right">
                    <?php echo $this->Html->link(
                        $this->Html->icon( 'eye' ),
                        array( 'action' => 'view', $task[ 'ProjectTask'][ 'id' ] ),
                        array( 'escape' => false, 'title' => __d( 'project', 'View' ) )
                    ); ?>
                    <?php echo $this->Html->link(
                        $this->Html->icon( 'pencil' ),
                        array( 'action' => 'edit', $task[ 'ProjectTask'][ 'id' ] ),
                        array( 'escape' => false, 'title' => __d( 'project', 'Edit' ) )
                    ); ?>
                    <?php echo $this->Html->link(
                        $this->Html->icon('remove'),
                        ['action' => 'delete', $task['ProjectTask']['id']],
                        ['escape' => false, 'title' => __d('project', 'Delete'), 'confirm' => __d('project', 'Delete this task ?')]
                    ); ?>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
<?php else: ?>
    <p><?php echo __d( 'project', 'No tasks found !' ); ?></p>
<?php endif; ?>
</div>
