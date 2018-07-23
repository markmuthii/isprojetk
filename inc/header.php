<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="/">IS Proje.Tk</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#is_nav" aria-controls="is_nav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="is_nav">
  	<ul class="navbar-nav mr-auto"> 
			<?php
				if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {
		  		echo '
			  		<li class="nav-item">
			  			<a class="nav-link" href="/admin/">Admin</a>
						</li>
						<li class="nav-item">
				  		<a href="/admin/upload.php" class="nav-link">New Upload</a>
				  	</li>
		  		';
		  	}
		  	if (isset($_SESSION["username"])) {
		  		echo '
			  		<li class="nav-item">
				  		<a href="/logout.php" class="nav-link">Log Out</a>
				  	</li>
					';
		  	}else{
		  		echo '
			  		<li class="nav-item">
				  		<a href="/login.php" class="nav-link">Log In</a>
				  	</li>
				  	<li class="nav-item">
				  		<a href="/signup.php" class="nav-link">Sign Up</a>
				  	</li>
					';
		  	}		
		  ?> 		
  	</ul>
  </div>
</nav>