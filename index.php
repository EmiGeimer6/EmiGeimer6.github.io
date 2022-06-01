<?php
  session_start();

  require './paginas/conexion.php';
  $categCom='Comida';
  $categDep='Deporte';
  $categJoy='Joyeria';
  $categModa='Moda';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT idclient, mailclient,contraclient,nomclient FROM clientes WHERE idclient = :idclient');
    $records->bindParam(':idclient', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Bazarro</title>
    <link rel="icon" href="favicon.ico" style="max-width:150%;height:auto;" >
    <link rel="stylesheet" type="text/css" href="./css/index.css?ts=<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="./css/nav.css?ts=<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="./css/slider.css?ts=<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="./css/responsive.css?ts=<?=time()?>" />
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <script src="https://kit.fontawesome.com/61c7880572.js" crossorigin="anonymous"></script>
</head>
<body >

    <header>
        <nav>
            <div id="brand">
                <div id="logo"><img src="./imagenes/Logos/LogoNuevo.png" style="max-width:100%;height:auto;"></div>
            </div>

            <div id="menu"> 
                <ul id="navul">
                    <span class="material-symbols-outlined" id="menu_icon">menu</span>
                    
                    <?php if(!empty($user)):?>
                    <li><a href="./paginas/logout.php">Cerrar Sesión</a></li>
                    <script> alert('Bienvenido <?php echo $results['nomclient'];?>')</script>
                    <?php else: ?>
                    <li><a href="./paginas/insesion2.php">Iniciar Sesión</a></li>
                    <li><a href="./paginas/signup2.php">Registrate</a></li>
                    <?php endif; ?>
                    <li><a href="./paginas/bazares.php">Articulos</a></li>
                    <li><a href="./paginas/blog.php">Sobre nosotros</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <section>
        <div class="cont">
            <div class="front">
                    <div id="Titulo"></div>
            </div>
    
            <div class="info">
                    <section class="contenido">
                            <div>
                            <h1>El Bazar de Bazares!</h1>
                            <h2>Nosotros somos Bazarro, el unico espacio donde se reunen todos y cada uno de nuestros bazares de la hermosa localidad de Puerto Vallarta. Nos enorgullece formar parte de esta comunidad y brindar un apoyo a toda la gente que desee cumplir sus sueños.</h2>
                            <a href="./paginas/blog.php">Más Info.</a>
                            </div>
                            <img src="./imagenes/animacion.svg" alt="">
                        
                    </section>
            </div>


                    <h1 class= "subtitulo1">Explora en nuestras categorías.</h1>
                    <div class="container-slider">
                        
                        <div class="slider" id="slider">
                            <div id="slid1" class="slider__section">
                                <a href="./paginas/bazares.php?categ=<?php echo urlencode($categDep); ?>">
                                <img src="./imagenes/deporteF.png" alt="" class="slider__img">
                                </a>
                            </div>
                            <div id="slid2" class="slider__section">
                            <a href="./paginas/bazares.php?categ=<?php echo urlencode($categCom); ?> ">
                                <img src="./imagenes/comidaF.png" alt="" class="slider__img">
                                </a>
                            </div>
                            <div id="slid3" class="slider__section">
                            <a href="./paginas/bazares.php?categ=<?php echo urlencode($categJoy); ?>">
                                <img src="./imagenes/joyeriaF.png" alt="" class="slider__img">
                                </a>
                            </div>
                            <div id="slid4" class="slider__section">
                            <a href="./paginas/bazares.php?categ=<?php echo urlencode($categModa); ?>">
                                <img src="./imagenes/modaF.png" alt="" class="slider__img">
                                </a>
                            </div>
                        </div>
                        <div class="slider__btn slider__btn--right" id="btn-right">></div>
                        <div class="slider__btn slider__btn--left" id="btn-left"><</div>
                    </div>
            
        </div>

        <div class="mapa">
            <h1 class="subtitulo1">Ubicación</h1>
            <div class="mapinfo">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.3427480112337!2d-105.22243218255615!3d20.655630199999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8421458768a66f71%3A0x53c4b4ef9176b07e!2sC.%20Exiquio%20Corona%20239%2C%20Bobadilla%2C%2048298%20Puerto%20Vallarta%2C%20Jal.!5e0!3m2!1ses-419!2smx!4v1652190967449!5m2!1ses-419!2smx" width="600" height="450"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="ubi"></iframe>
                <h2>Visita nuestro local ubicado en C. Exiquio Corona 239, Bobadilla, 48298 Puerto Vallarta, Jal. <br><br> Te esperamos!</h2>
            </div>
        </div>
               
        <div class= "galeria">
                <h1 class="subtitulo1">Bazares asociados.</h1>
            <div class="gallery__container">
                <a href="https://www.instagram.com/lapasticceriapvr/"><div class="gallery__item"><img src="./imagenes/Logos/LogoE1.jpeg" alt="" class="gallery__img"></div></a>
                <a href="https://www.instagram.com/fitboutique_mx/"><div class="gallery__item"><img src="./imagenes/Logos/LogoE2.jpeg" alt="" class="gallery__img"></div></a>
                <a href="https://www.instagram.com/marest_sport/"><div class="gallery__item"><img src="./imagenes/Logos/LogoE3.jpeg" alt="" class="gallery__img"></div></a>
                <a href="https://www.instagram.com/leembal_pv/"><div class="gallery__item"><img src="./imagenes/Logos/LogoE4.jpeg" alt="" class="gallery__img"></div></a>
                <a href="https://www.instagram.com/4bross.pv/"><div class="gallery__item"><img src="./imagenes/Logos/LogoE5.jpeg" alt="" class="gallery__img"></div></a>
                <a href="https://www.instagram.com/smilebazar23_/"><div class="gallery__item"><img src="./imagenes/Logos/LogoE6.jpeg" alt="" class="gallery__img"></div></a>
                <a href="https://www.instagram.com/tiendita_pv/"><div class="gallery__item"><img src="./imagenes/Logos/LogoE7.jpeg" alt="" class="gallery__img"></div></a>
                <a href="https://www.instagram.com/bazar_eight_shop.mx/"><div class="gallery__item"><img src="./imagenes/Logos/LogoE8.jpeg" alt="" class="gallery__img"></div></a>
                <a href="https://www.instagram.com/calcetines_chidos/"><div class="gallery__item"><img src="./imagenes/Logos/LogoE9.jpeg" alt="" class="gallery__img"></div></a>
            </div>
        </div>
    </section>
       
    <footer class="pie-pagina">
        <div class="grupo1">
            <div class="box">
                <figure>
                    <a href="#">
                        <img src="./imagenes/Logos/LogoF.png" alt="Logo">
                    </a>
                </figure>
            </div>
            <div class="box">
                <h2>Sobre Nosotros</h2>
                <hr>
                <p>Bazarro es un espacio que reune diferentes emprendimientos locales de jovenes trabajadores, 
                    ofreciendoles un lugar para promocionarse y crecer, 
                    todo esto como un apoyo a todos los servicios de nuestra localidad.</p>
             

            </div>
            <div class="box">
                <h2>Siguenos
                </h2>
                <hr>
                <div class="redsocial">
                    <a href="https://www.facebook.com/Bazarro-104194292295198" class="fa-brands fa-facebook-f"></a>
                    <a href="https://www.instagram.com/xxbazarroxx/" class="fa-brands fa-instagram"></a>
                </div>
            </div>
        </div>
        <div class="grupo2">
            <small>&copy; 2021 <b>Bazarro</b> - Todos los derechos reservados.</small>
        </div>
    </footer>

  
   <script src="./js/slider.js"></script>
</body>
</html>