<?php 
include 'config.php';
	include('session.php');
	require_once 'controller/ofertaController.php';
$bienvenida = "";
$msg ="";
$cantidad = 1;


if ($_SERVER['REQUEST_METHOD'] == 'GET') 
{
	if(isset($_GET['del']))
	{
		$id_oferta=(isset($_GET['del'])) ? trim($_GET['del']) : '';

		$response = new ofertaController();
		$getOferta	 = $response->deleteOferta($id_oferta);

		if(!$getOferta)
		{
			$msg = "Error en la Eliminacion, Intente nuevamente.";
		}
	}
	
		//linea1=Limones+x+Kg&
		//linea2=Martes+de+Oferta&precio=14&
		//id=22&
		//foto=https%3A%2F%2Fimages2cdn.sanalmarket.com.tr%2Fimages%2F1000%2Furun%2F%2Flarge%2F27262000_large.jpg&
		//categoria=2
		$id_oferta=(isset($_GET['id'])) ? trim($_GET['id']) : '';
		$linea1 = (isset($_GET['linea1'])) ? trim($_GET['linea1']) : '';
   		$linea2=(isset($_GET['linea2'])) ? trim($_GET['linea2']) : '';
		$precio=(isset($_GET['precio'])) ? trim($_GET['precio']) : '';
		$foto=(isset($_GET['foto'])) ? trim($_GET['foto']) : '';
		$id_categoria=(isset($_GET['categoria'])) ? trim($_GET['categoria']) : '';
		
		/*echo $id_oferta . "<br>" .
		$linea1 . "<br>" .
		$linea2 . "<br>" .
		$precio . "<br>" .
		$foto . "<br>" .
		$id_categoria ;
		die();
		*/
		$res = new ofertaController();
		$updOferta	 = $res->updateOferta($id_oferta, $id_categoria, $linea1, $linea2, $precio, $foto );

		
		if(!$updOferta)
		{
			$msg = "Error en la Actualizacion, Intente nuevamente.";
		}	
	
	
}

$userDetails=$usuario->userDetails($session_uid);
$response = new ofertaController();
$cantOfertasDisponibles = $response->ofertasDisponiblesXuser($session_uid);

/*echo "<pre>";
print_r($userDetails);
echo "</pre>";
die();
*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Contact Us</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>

<body>

<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">

		<!-- Top Navigation -->

		<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left">free shipping on all u.s orders over $50</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

								<!-- Currency / Language / My Account -->

								<li class="currency">
									<a href="#">
										usd
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="currency_selection">
										<li><a href="#">cad</a></li>
										<li><a href="#">aud</a></li>
										<li><a href="#">eur</a></li>
										<li><a href="#">gbp</a></li>
									</ul>
								</li>
								<li class="language">
									<a href="#">
										English
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="language_selection">
										<li><a href="#">French</a></li>
										<li><a href="#">Italian</a></li>
										<li><a href="#">German</a></li>
										<li><a href="#">Spanish</a></li>
									</ul>
								</li>
								<li class="account">
									<a href="#">
										My Account
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
										<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
										<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
							<a href="#">colo<span>shop</span></a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
								<li><a href="index.html">home</a></li>
								<li><a href="#">shop</a></li>
								<li><a href="#">promotion</a></li>
								<li><a href="#">pages</a></li>
								<li><a href="#">blog</a></li>
								<li><a href="contact.html">contact</a></li>
							</ul>
							<ul class="navbar_user">
								<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
								<li class="checkout">
									<a href="#">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										<span id="checkout_items" class="checkout_items">2</span>
									</a>
								</li>
							</ul>
							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

	</header>

	<div class="fs_menu_overlay"></div>

	<!-- Hamburger Menu -->

	<div class="hamburger_menu">
		<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="hamburger_menu_content text-right">
			<ul class="menu_top_nav">
				<li class="menu_item has-children">
					<a href="#">
						usd
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="#">cad</a></li>
						<li><a href="#">aud</a></li>
						<li><a href="#">eur</a></li>
						<li><a href="#">gbp</a></li>
					</ul>
				</li>
				<li class="menu_item has-children">
					<a href="#">
						English
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="#">French</a></li>
						<li><a href="#">Italian</a></li>
						<li><a href="#">German</a></li>
						<li><a href="#">Spanish</a></li>
					</ul>
				</li>
				<li class="menu_item has-children">
					<a href="#">
						My Account
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
						<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
					</ul>
				</li>
				<li class="menu_item"><a href="#">home</a></li>
				<li class="menu_item"><a href="#">shop</a></li>
				<li class="menu_item"><a href="#">promotion</a></li>
				<li class="menu_item"><a href="#">pages</a></li>
				<li class="menu_item"><a href="#">blog</a></li>
				<li class="menu_item"><a href="#">contact</a></li>
			</ul>
		</div>
	</div>

	<div class="container contact_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->
<!--
				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Contact</a></li>
					</ul>
				</div>
-->
			</div>
		</div>

		<!-- Map Container -->

		<div class="row">
			<div class="col">

		<h4>Bienvenido <?php echo $userDetails[0]['nombre_usuario'] ?></h4>
		<h6>
			<a href="<?php echo BASE_URL; ?>logout.php">Logout</a>
		</h6>

			</div>
			
	<p><?=$msg?></p>
	<div>

	</div>
	

		</div>
		<div class="row">
			<div class="table-responsive"">
			<table class="table table-bordered table-striped">
				<?php  foreach ($userDetails as $key => $value) { ?>
				 <thead class="thead-dark">
				    <tr>
				      <th scope="col">Oferta Nro <?=$cantidad?></th>
				     
				    </tr>
				  </thead>
				
				<tr>
						<td ><img style="max-width: 20%;" src="<?=$value['foto']?>" alt="" ></td>
					</tr>
					<tr>
						<td><?=$value['linea1']?></td>
					</tr>
					<tr>
						<td><?=$value['linea2']?></td>
					</tr>
					<tr>
						<td>$ <?=$value['precio']?></td>
					</tr>
					
					<tr>
						<td>
							<a href="delOferta.php?delete=<?= $value['id_ofertas'] ?>"><img style="max-width: 5%;" src="images/iconos/delete.png" title = "Borrar" alt=""></a>
							<a href="updateOferta.php?update=<?=$value['id_ofertas']?>"><img style="max-width: 5%;" src="images/iconos/modificar.png" title="Modificar" alt=""></a>
							
						</td>
					</tr>

				<?php  $cantidad++;} ?>
			</table>
		</div>
			</div>

			<div class="row">
				<table>
					<tr>
						<td><p>Cantidad de Ofertas Limite: <?=$cantOfertasDisponibles['cant_ofertas'];?></p></td>
					</tr>
					<tr>
						<td><p>Ofertas Concretadas : <?=$cantidad-1?></p></td>
					</tr>
					<tr>
						<?php 
							if($cantidad-1<$cantOfertasDisponibles['cant_ofertas'])
							{
								$disponible = '';
							}
							else
							{
								$disponible ='disabled';
							}
						?>
						<td><a href="addOferta.php"><input type="text"class="btn btn-primary btn-sm" value="Agregar Oferta"  <?=$disponible?> ></a></td>
					</tr>
				</table>
			</div>

		

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
						<ul class="footer_nav">
							<li><a href="#">Blog</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="contact.html">Contact us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
						<ul>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="footer_nav_container">
						<div class="cr">©2018 All Rights Reserverd. Template by <a href="#">Colorlib</a></div>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="js/contact_custom.js"></script>
</body>

</html>
