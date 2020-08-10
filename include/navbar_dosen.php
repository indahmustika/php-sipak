<nav class="navbar navbar-expand-lg navbar-light bg-secondary text-light border-bottom">
	<h6><b><button class="btn btn-primary" id="menu-toggle"><i class="fas fa-bars"></i></button> SISTEM INFORMASI PAK</b></h6>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<?php echo $nama_dosen;?>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="dosen_profile.php?nip_dosen=<?php echo $nip_dosen;?>">Profil</a>
					<a class="dropdown-item" href="dosen_login.php">Log Out</a>
				</div>
			</li>
		</ul>
	</div>
</nav>