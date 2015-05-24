<div class="container">
	<h1 id="strong-title"><b>Bishop's Task Manager App</b></h1>
	<div class="pull-right">
		<?php
			echo anchor('Logout', 'Logout');
		?>
	</div>
	<h2>Welcome <b><?php echo $user; ?></b>!</h2>
	<hr />
	<a class="btn btn-primary btn-block" data-toggle="collapse" href="#newTaskForm" aria-expanded="false" aria-controls="newTaskForm"><h4>Create a New Task</h4></a>
	<br />
	<div id="newTaskForm" class="collapse">
		<div class="panel" id="task">
			<form class="form-horizontal" action="<?php echo base_url();?>index.php/Site/new_task" method="POST">
				<div class="panel-heading">
					<legend>Create a New Task</legend>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="taskName" class="col-sm-2 control-label">Task Name:</label>
						<div class="col-sm-10">
							<input required type="text" class="form-control" id="taskName" name="taskName" placeholder="Name the task..." />
						</div>
					</div>
					<div class="form-group">
						<label for="taskDesc" class="col-sm-2 control-label">Task Description:</label>
						<div class="col-sm-10">
							<textarea required type="text" rows=3 class="form-control" id="taskDesc" name="taskDesc" placeholder="Describe the task..." ></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="taskDead" class="col-sm-2 control-label">Task Deadline:</label>
						<div class="col-sm-2">
							<input required type="datetime" class="form-control" id="datepicker" name="taskDead" placeholder="Deadline" />
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary center-block">Create Task</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div role="tabpanel">
		<ul class="nav nav-pills nav-justified" role="tablist">
			<li role="presentation" class="active">
				<a href="#available" aria-controls="available" role="tab" data-toggle="tab">
					<h3>
						Available Tasks (
						<?php 
							$this->db->where('task_comp', NULL);
							$this->db->from('tasks');
							echo $this->db->count_all_results();
						?> )
					</h3>
				</a>
			</li>
			<li role="presentation" class="">
				<a href="#completed" aria-controls="completed" role="tab" data-toggle="tab">
					<h3>
						Completed Tasks (
						<?php
							$this->db->where('task_comp IS NOT NULL', null, false);
							$this->db->from('tasks');
							echo $this->db->count_all_results();
						?> )
					</h3>
				</a>
			</li>
		</ul>
		<br />
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="available">
				<?php
					$this->db->where('task_comp', NULL);
					$this->db->from('tasks');
					$query = $this->db->get();

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
			</div>
			<div role="tabpanel" class="tab-pane fade" id="completed">
				<div class="panel" id="task">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Task Name</th>
								<th>Task Description</th>
								<th>Date Completed</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$this->db->where('task_comp IS NOT NULL', null, false);
								$this->db->from('tasks');
								$query = $this->db->get();

								foreach($query->result() as $row)
								{ 
							?>
							<td><?php echo $row->task_name; ?></td>
							<td><?php echo $row->task_desc; ?></td>
							<td><?php echo $row->task_comp; ?></td>
						</tbody>
					</table>
				</div>
				<?php 
				}
				?>
			</div>
		</div>
	</div>