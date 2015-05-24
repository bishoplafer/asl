<div class="container">
	<h1 id="strong-title"><b>Bishop's Task Manager App</b></h1>
	<div class="pull-right">
		<?php
			echo anchor('Logout', 'Logout');
		?>
	</div>
	<h2>Welcome <b><?php echo $user; ?></b>!</h2>
	<a class="btn btn-primary btn-block" data-toggle="collapse" href="#newTaskForm" aria-expanded="false" aria-controls="newTaskForm">Create a New Task</a>
	<div id="newTaskForm" class="collapse">
		<form class="form-horizontal" action="<?php echo base_url();?>index.php/Site/new_task" method="POST">
			<fieldset>
				<legend>Create a New Task</legend>
				<div class="form-group">
					<label for="taskName" class="col-sm-2 control-label">Task Name:</label>
					<div class="col-sm-10">
						<input required type="text" class="form-control" id="taskName" name="taskName" placeholder="Name the task..." />
					</div>
				</div>
				<div class="form-group">
					<label for="taskDesc" class="col-sm-2 control-label">Task Description:</label>
					<div class="col-sm-10">
						<textarea required type="text" rows=3 class="form-control" id="taskDesc" name="taskDesc" placeholder="Describe the Task..." ></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="taskDead" class="col-sm-2 control-label">Task Deadline:</label>
					<div class="col-sm-2">
						<input required type="datetime" class="form-control" id="datepicker" name="taskDead" placeholder="Deadline" />
					</div>
				</div>
				<div class="form-group">
					<div class="pull-right">
						<button type="submit" class="btn btn-primary">Create Task</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
	<h3>Available Tasks</h3>
	<?php
		$query = $this->db->query('SELECT * FROM tasks');

		foreach($query->result() as $row)
		{ 
	?>
	<div class="col-sm-6">
		<div id="task" class="panel panel-default">
			<div class="panel-heading"><h4><?php echo $row->task_name; ?></h4></div>
			<div class="panel-body">
				<p><b>Description:</b><br /><?php echo $row->task_desc; ?></p>
				<p><b>Deadline:</b><br /><?php echo $row->task_dead; ?></p>
				<div class="col-sm-6">
					<a href="<?php echo base_url();?>index.php/Site/edit_task/<?php echo $row->task_id; ?>" class="btn btn-block btn-warning">Edit Task</a>
				</div>
				<div class="col-sm-6">
					<a href="<?php echo base_url();?>index.php/Site/remove_task/<?php echo $row->task_id; ?>" class="btn btn-block btn-danger">Delete Task</a>
				</div>
			</div>
		</div>
	</div>
	<?php 
	}
	?>