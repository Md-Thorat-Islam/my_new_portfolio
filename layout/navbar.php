<?php
/**
 * Created by PhpStorm.
 * User: Tourat
 * Date: 20-Apr-22
 * Time: 11:31 PM
 */?>
<style>
    a {
        text-decoration: none;
        font-family: montserrat;
        text-transform: uppercase;
        font-weight: bold;
        font-size: 1em;
        color: #118ab2;
    }

    a:hover {
        text-decoration: none;
        color: #fff;
    }
    .menu {
        display: flex;
        justify-content: space-around;
        align-items: center;
        position: relative;
        width: 900px;
        height: 60px;
        padding: 0 30px;
        border-radius: 5px;
        background: rgb(255, 255, 255);
        background: linear-gradient(236deg,rgba(255, 255, <black>, 0.8169642857142857) -15%,rgba(111, 174, 212, 1) 100%
        );
    }

    .nav-item-one {
        border: 1px solid #a9d6e5;
        padding: 10px 30px;
        border-radius: 22px;
    }

    .nav-item-one:hover {
        border: 1px solid #fff;
    }

    .house-heart,
    .search-heart,
    .notifications,
    .heart,
    .person {
        position: relative;
        margin-left: 4px;
    }
    
    /*Lamp start*/
    

</style>
<div class="vg-page page-home" id="home" style="background-image: url(assets/img/bg_image_1.jpg);">
	<!-- Navbar -->
	<div class="navbar navbar-expand-lg navbar-dark sticky menu" data-offset="300">
		<div class="container">
			<?php
			$result=$db->query("SELECT c.id,c.name,b.href,a.disable,b.href From title_tb a,menu_tb b, users c where b.id=a.menu_href_id and c.id=a.Users_id ORDER BY a.id DESC");
			list($id,$name,$href,$disable)=$result->fetch_row();;
			?>
			<a href="<?php if ($href="home"){echo $_SERVER["PHP_SELF"];};?>" class="navbar-brand nav-item-one"><?php echo $name;?>
			</a>
			<button class="navbar-toggler" data-toggle="collapse" data-target="#main-navbar" aria-expanded="true">
				<span class="ti-menu"></span>
			</button>
			<div class="collapse navbar-collapse" id="main-navbar">
				<ul class="navbar-nav ml-auto">
					<?php
					$result=$db->query("SELECT id,name,href from menu_tb");
					foreach ($result as $row)
					{
						?>
						<li class="nav-item">
							<a href="#<?php echo strtolower($row["href"]);?>" class="nav-link" data-animate="scrolling">
								<?php echo ucfirst($row["name"]);?>
							</a>
						</li>
						<?php
					}
					?>
				</ul>
				<ul class="nav ml-auto">
					<li class="nav-item">
						<button class="btn btn-fab btn-theme no-shadow">
							<img src="assets/img/logo/my_sign.png" alt="" srcset="" width="50">
						</button>
					</li>
				</ul>
			</div>
		</div>
	</div> <!-- End Navbar -->
	<!-- Caption header -->
	<div class="caption-header text-center wow zoomInDown">
		<h5 class="fw-normal" id="wlcome">Welcome</h5>
		<h1 class="fw-light mb-4" >I'm <b  class="fg-theme"><?php echo ucwords(substr($name,0,4));?></b>&ensp;
            <span id="titlename"><?php echo ucwords(substr($name,5));?></span> </h1>
		<div class="badge">I am
            <?php $laravel=["Laravel","Wordpress"]?>
            
			<span class="txt-rotate" data-period="2000" data-rotate='["Software","Laravel","Wordpress"]'>
          
          </span>&nbsp;Developer</div>
	</div> <!-- End Caption header -->
	<div class="floating-button"><span class="ti-mouse"></span></div>
</div>
<script>

</script>

