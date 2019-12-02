<?php

?>

<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link rel="stylesheet" href="./assets/css/style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
             <!-- HEADER -->   
        <header>
            <nav>
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo center">Hacker Poulette</a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul id="nav-mobile" class="left hide-on-med-and-down">
                        <li><a href="#">Nos produits</a></li>
                        <li><a href="#">Nous contacter</a></li>
                    </ul>
                </div>
            </nav>
            <ul class="sidenav" id="mobile-demo">
                <img  class="responsive-img" src="./assets/img/logohp.png" alt="">
                <li><a href="#">Nos Produits</a></li>
                <li><a href="#">Nous contacter</a></li>
            </ul>
            <section class="row">
                <img  class="responsive-img" src="./assets/img/logohp.png" alt="">
            </section>
         </header>
                 <!-- MAIN -->        
        <main>
                <!-- SECTION OUR PORDUCTS -->   
            <section class="section container">
                <div class="row cardproduct">
                    <h2 class=" col s12">Our products</h2>
                    <ul class="tabs">
                        <li class="tab col s3"><a href="#card-panel-1">Rasberry 4</a></li>
                        <li class="tab col s3"><a href="#card-panel-2">Rasberry 3</a></li>
                        <li class="tab col s3"><a href="#card-panel-3">accessories</a></li>
                    </ul>
                    <div id="card-panel-1">
                        
                        <div class="card small col l3 m5 s12">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="./assets/img/rasberrypi4.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Pi 4<i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Technical characteristics<i class="material-icons right">close</i></span>
                                <p>Here is some more information about this product that is only revealed once clicked on.</p>
                            </div>
                        </div>

                        <div class="card  col small  l3 m5 s12">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="./assets/img/kitrasberry4.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Starter kit <i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Technical characteristics<i class="material-icons right">close</i></span>
                                <p>Here is some more information about this product that is only revealed once clicked on.</p>
                            </div>
                        </div>

                        <div class="card  col small  l3 m5 s12">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="./assets/img/fullhdscreen.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">HD screen<i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Technical characteristics<i class="material-icons right">close</i></span>
                                <p>Here is some more information about this product that is only revealed once clicked on.</p>
                            </div>
                        </div>
                    </div>
                    <div id="card-panel-2">
                        
                        <div class="card small  col l3 m5 s12">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="./assets/img/aplus.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Pi 3 A+<i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Technical characteristics<i class="material-icons right">close</i></span>
                                <p>Here is some more information about this product that is only revealed once clicked on.</p>
                            </div>
                        </div>

                        <div class="card small  col l3 m5 s12">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="./assets/img/bplus.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Pi 3 B+<i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Technical characteristics<i class="material-icons right">close</i></span>
                                <p>Here is some more information about this product that is only revealed once clicked on.</p>
                            </div>
                        </div>

                        <div class="card small  col l3 m5 s12">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="./assets/img/bsimple.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Pi 3<i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Technical characteristics<i class="material-icons right">close</i></span>
                                <p>Here is some more information about this product that is only revealed once clicked on.</p>
                            </div>
                        </div>
                    </div>
                    <div id="card-panel-3">
                        <div class="card small col l3 m5 s12">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="./assets/img/powersupply.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Power Supply<i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Technical characteristics<i class="material-icons right">close</i></span>
                                <p>Here is some more information about this product that is only revealed once clicked on.</p>
                            </div>
                        </div>

                        <div class="card small  col l3 m5 s12">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="./assets/img/adptateur.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Micro HDMi<i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Technical characteristics<i class="material-icons right">close</i></span>
                                <p>Here is some more information about this product that is only revealed once clicked on.</p>
                            </div>
                        </div>

                        <div class="card small  col l3 m5 s12">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="./assets/img/guide.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Official guide<i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Technical characteristics<i class="material-icons right">close</i></span>
                                <p>Here is some more information about this product that is only revealed once clicked on.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
                 <!-- FOOTER -->   
        <footer>

        </footer>
        <!--JavaScript at end of body for optimized loading-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
            // init materialize js stuff
            document.addEventListener("DOMContentLoaded", function() {
                M.AutoInit();
            });
    </script>
    </body>
</html>