<div class="container">
	<h1 id="strong-title"><b>Bishop's Task Manager App</b></h1>
	<div class="pull-right">
		<?php
			echo anchor('Logout', 'Logout');
		?>
	</div>
	<h3>Welcome <b><?php echo $user; ?></b>, here are the available tasks!</h3>
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
				<a href="" class="btn btn-primary btn-block">Complete Task</a>
			</div>
		</div>
	</div>
	<?php 
	}
	?>