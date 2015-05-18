<div class="container">
	<h1 id="strong-title"><b>Bishop's Task Manager App</b></h1>
	<h2>Login</h2>
	<?php

	echo form_open('Login/validate_credentials');
	echo form_input('username', 'Username');
	echo form_password('password', 'Password');
	echo form_submit('submit', 'Login');


	?>
</div> <!-- end .container -->