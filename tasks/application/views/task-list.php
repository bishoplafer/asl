<div class="container">
	<h1 id="strong-title"><b>Bishop's Task Manager App</b></h1>
	<div class="pull-right">
		<?php
			echo anchor('Logout', 'Logout');
		?>
	</div>
	<h2>Welcome <b><?php echo $user; ?></b>!</h2>
	<hr /> 
	<h3>
		Available Tasks ( 
		<?php 
			$this->db->where('task_comp', NULL);
			$this->db->from('tasks');
			echo $this->db->count_all_results();
		?> )
	</h3>
	<?php
		$this->db->where('task_comp', NULL);
		$this->db->from('tasks');
		$query = $this->db->get();
		$counter = 1;

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
		if($counter % 2 == 0){
			echo '<div class="clearfix"></div>';
			$counter++;
		}else{
			$counter++;
		}
	}
	?>