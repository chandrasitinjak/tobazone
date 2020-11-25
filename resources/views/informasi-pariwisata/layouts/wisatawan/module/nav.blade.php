<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
	    <a class="navbar-brand" href="{{url('/')}}">Tobazone</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="{{url('/')}}" class="nav-link">Beranda</a></li>
	          <li class="nav-item dropdown">
	          	<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Informasi <b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a href="{{url('informasi1')}}" class="dropdown-item">Objek Wisata</a></li>
					<li><a href="{{url('informasi2')}}" class="dropdown-item">Akomodasi</a></li>
					<li><a href="{{url('informasi5')}}" class="dropdown-item">Event</a></li>
					<li><a href="{{url('informasi3')}}" class="dropdown-item">Budaya</a></li>
					<li><a href="{{url('informasi4')}}" class="dropdown-item">Kuliner</a></li>
				</ul>
	          </li>
	          <li class="nav-item dropdown">
	          	<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Kabupaten <b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a href="{{url('Kab',['id' => 2])}}" class="dropdown-item">Toba</a></li>
					<li><a href="{{url('Kab',['id' => 3])}}" class="dropdown-item">Tapanuli Utara</a></li >
					<li><a href="{{url('Kab',['id' => 5])}}" class="dropdown-item">Samosir</a></li>
					<li><a href="{{url('Kab',['id' => 4])}}" class="dropdown-item">Simalungun</a></li>
					<li><a href="{{url('Kab',['id' => 7])}}" class="dropdown-item">Dairi</a></li>
					<li><a href="{{url('Kab',['id' => 1])}}" class="dropdown-item">Humbang Hasundutan</a></li>
					<li><a href="{{url('Kab',['id' => 6])}}" class="dropdown-item">Karo</a></li>
					<li><a href="{{url('Kab',['id' => 8])}}" class="dropdown-item">Pakpak Barat</a></li>
				</ul>
	          </li>
	          <li class="nav-item"><a href="{{url('/transportasion')}}" class="nav-link">Transportasi</a></li>
	          <li class="nav-item dropdown">
	          	<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Map <b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a href="{{url('map1')}}" class="dropdown-item">Objek Wisata</a></li>
					<li><a href="{{url('map2')}}" class="dropdown-item">Akomodasi</a></li>
					<li><a href="{{url('map3')}}" class="dropdown-item">Kuliner</a></li>
				</ul>
	          </li>
	          <li class="nav-item cta"><a href="{{url('/login')}}" class="nav-link">Login</a></li>

	        </ul>
	      </div>
	</div>
</nav>