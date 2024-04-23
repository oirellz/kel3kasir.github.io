<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Kelompok 3</title>
	<link rel="stylesheet" type="text/css" href="style5.css">
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

</head>
<style>
.tengah{
  /* align-items: center; */
  /* margin-left: 50px; */
  width: auto;
}
  .garis{
    border-top: 2px blue;
}
hr{
    border: none;
    height: 2px;
    background-color: blue;
}
</style>
<body>
  <!--<title>Dashboard Sidebar Menu</title>-->



  <nav class="sidebar close">
    <header>
      <div class="image-text">
        <span class="image" width="200px">
          <img src="img/logo.jpeg" width="200px" class="m-auto"> 
        </span>

        <div class="text logo-text">
          <span class="name">Pretty Collection</span>
          <span class="profession"><?php echo $_SESSION['nama_petugas']; ?> | <?php echo $_SESSION['level']; ?></span>
        </div>
      </div>

      <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
      <div class="menu">

        <!-- <li class="search-box">
          <i class='bx bx-search icon'></i>
          <input type="text" placeholder="Search Ganes...">
        </li> -->

        <ul class="menu-links">
          <li class="nav-link">
            <a href="beranda.php">
              <i class='bx bx-home-alt icon'></i>
              <span class="text nav-text">Beranda</span>
            </a>
          </li>
		  <?php
		$level= $_SESSION['level']=='petugas';
		if($level){
		?>
         <li class="nav-link">
            <a href="pelanggan/index.php" target="frame">
              <i class='bx bx-bar-chart-alt-2 icon'></i>
              <span class="text nav-text">Pelanggan</span>
            </a>
          </li>

		  <li class="nav-link">
            <a href="produk/index2.php" target="frame">
              <i class='bx bx-bell icon'></i>
              <span class="text nav-text">Produk</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="transaksimin/tampil_transaksi.php" target="frame">
              <i class='bx bx-pie-chart-alt icon'></i>
              <span class="text nav-text">Transaksi</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="about.php" target="frame">
            <i class='bx bx-info-circle icon'></i>
              <span class="text nav-text">Tentang</span>
            </a>
          </li>

<?php } else{ ?>
          <li class="nav-link">
            <a href="pelanggan/index.php" target="frame">
              <i class='bx bx-bar-chart-alt-2 icon'></i>
              <span class="text nav-text">Pelanggan</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="produk/index.php" target="frame">
              <i class='bx bx-bell icon'></i>
              <span class="text nav-text">Produk</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="transaksi/tampil_transaksi.php" target="frame">
              <i class='bx bx-pie-chart-alt icon'></i>
              <span class="text nav-text">Transaksi</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="petugas/index.php" target="frame">
              <i class='bx bx-heart icon'></i>
              <span class="text nav-text">Petugas</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="laporan/index.php?id=<?php echo $_SESSION['nama_petugas']; ?> " target="frame">
              <i class='bx bx-wallet icon'></i>
              <span class="text nav-text">Laporan</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="about.php" target="frame">
            <i class='bx bx-info-circle icon'></i>
              <span class="text nav-text">Tentang</span>
            </a>
          </li>
		  <?php } ?>
        </ul>
      </div>
<hr>
      <!-- <div class="garis"></div> -->

      <div class="bottom-content">
        <li class="">
          <a href="../kelompok3/login.php">
            <i class='bx bx-log-out icon'></i>
            <span class="text nav-text">Keluar</span>
          </a>
        </li>

        <!-- <li class="mode">
          <div class="sun-moon">
            <i class='bx bx-moon icon moon'></i>
            <i class='bx bx-sun icon sun'></i>
          </div>
          <span class="mode-text text">Dark mode</span>

          <div class="toggle-switch">
            <span class="switch"></span>
          </div>
        </li> -->

      </div>
    </div>

  </nav>

  <section class="home">
    <div class="text">PRETTY COLLECTION</div><hr>
	<iframe src="bebas.php" style="margin-left:15px" name="frame" frameborder="0" width="100%" height="100%"></iframe>
  </section>

  <script>
    const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");
    toggle.addEventListener("click", () => {
      sidebar.classList.toggle("close");
    })
    searchBtn.addEventListener("click", () => {
      sidebar.classList.remove("close");
    })
    modeSwitch.addEventListener("click", () => {
      body.classList.toggle("dark");
      if (body.classList.contains("dark")) {
        modeText.innerText = "Light mode";
      } else {
        modeText.innerText = "Dark mode";
      }
    });
  </script>
		
	</div>
</body>
</html>