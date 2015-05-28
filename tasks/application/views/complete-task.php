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
	<form class="form-horizontal" action="<?php echo base_url();?>index.php/Site/comp_task/<?php echo $task['task_id']; ?>" method="POST">
		<fieldset>
			<legend>Edit Task</legend>
			<div class="form-group">
				<label for="message" class="col-sm-2 control-label">Task Description:</label>
				<div class="col-sm-10">
					<textarea required type="text" rows=3 class="form-control" id="message" name="message" placeholder="Please enter your message.">Please enter your message.</textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="pull-right">
					<button type="submit" class="btn btn-primary">Save Changes</button>
				</div>
			</div>
		</fieldset>
	</form>
