<?php 
	$getTask = $this->db->query('SELECT * FROM tasks WHERE task_id ="'.$this->uri->segment(3).'";');
	$task = $getTask->row_array();
?>
<div class="container">
	<h1 id="strong-title"><b>Bishop's Task Manager App</b></h1>
	<div class="pull-right">
		<?php
			echo anchor('Logout', 'Logout');
		?>
	</div>
	<form class="form-horizontal" action="<?php echo base_url();?>index.php/Site/change_task/<?php echo $task['task_id']; ?>" method="POST">
	<fieldset>
		<legend>Edit Task</legend>
		<div class="form-group">
			<label for="taskName" class="col-sm-2 control-label">Task Name:</label>
			<div class="col-sm-10">
				<input required type="text" class="form-control" id="taskName" name="taskName" value="<?php echo $task['task_name']; ?>" />
			</div>
		</div>
		<div class="form-group">
			<label for="taskDesc" class="col-sm-2 control-label">Task Description:</label>
			<div class="col-sm-10">
				<textarea required type="text" rows=3 class="form-control" id="taskDesc" name="taskDesc" placeholder="<?php echo $task['task_desc']; ?>"><?php echo $task['task_desc']; ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="taskDead" class="col-sm-2 control-label">Task Deadline:</label>
			<div class="col-sm-2">
				<input required type="datetime" class="form-control" id="datepicker" name="taskDead" value="<?php echo $task['task_dead']; ?>" />
			</div>
		</div>
		<div class="form-group">
			<div class="pull-right">
				<button type="submit" class="btn btn-primary">Edit Task</button>
			</div>
		</div>
	</fieldset>
</form>