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
                        <li><a href="#product">Nos produits</a></li>
                        <li><a href="#contact">Nous contacter</a></li>
                    </ul>
                </div>
            </nav>
            <ul class="sidenav" id="mobile-demo">
                <img  class="responsive-img" src="./assets/img/logohp.png" alt="Logo of Hacker Poulette">
                <li><a href="#product">Our product</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <section class="row">
                <img  class="responsive-img" src="./assets/img/logohp.png" alt="Logo of Hacker Poulette">
            </section>
         </header>
                 <!-- MAIN -->        
        <main>
                <!-- SECTION OUR PORDUCTS -->   
            <section class="section container">
                <div class="row cardproduct">
                    <h2 class=" col s12" id="product">Our products</h2>
                    <ul class="tabs">
                        <li class="tab col s3"><a href="#card-panel-1">Rasberry 4</a></li>
                        <li class="tab col s3"><a href="#card-panel-2">Rasberry 3</a></li>
                        <li class="tab col s3"><a href="#card-panel-3">accessories</a></li>
                    </ul>
                    <div id="card-panel-1">
                        
                        <div class="card  col l3 m5 s12 ">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="./assets/img/rasberrypi4.jpg" alt="Rasberry pi model 4">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Pi 4<i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Technical characteristics<i class="material-icons right">close</i></span>
                                <ul>
                                    <li>From $35</li>
                                    <li>1GB/2GB/3GB RAM</li>
                                    <li>2 micro HDMI</li>
                                    <li>USB 2&3</li>
                                    <li>USB C</li>
                                    <li>Ethernet</li>
                                </ul>
                            </div>
                        </div>

                        <div class="card  col   l3 m5 s12">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="./assets/img/kitrasberry4.jpg" alt="Beginer's kit for rasberry pi 4">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Starter kit <i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Technical characteristics<i class="material-icons right">close</i></span>
                                <ul>
                                    <li>80$</li>
                                    <li>PI 4</li>
                                    <li>Mini SD 32 GB</li>
                                    <li>Micro HDMI adaptator</li>
                                    <li>Fan</li>
                                    <li>Box for PI 4</li>
                                    <li>Guide</li>
                                </ul>
                            </div>
                        </div>

                        <div class="card  col   l3 m5 s12">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="./assets/img/fullhdscreen.jpg" alt="Screen full HD for rasberry pi model 4">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">HD screen<i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Technical characteristics<i class="material-icons right">close</i></span>
                                <ul>
                                    <li>90$</li>
                                    <li>4K</li>
                                    <li>Micro HDMI</li>
                                    <li>4h autonomy </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="card-panel-2">
                        
                        <div class="card   col l3 m5 s12">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="./assets/img/aplus.jpg" alt="Rasberry pi model 3A+">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Pi 3 A+<i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Technical characteristics<i class="material-icons right">close</i></span>
                                <p>1.4GHz 64-bit quad-core processor, dual-band wireless LAN, Bluetooth 4.2/BLE in the same mechanical format as the Raspberry Pi 1 Model A+</p>
                            </div>
                        </div>

                        <div class="card   col l3 m5 s12">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="./assets/img/bplus.jpg" alt="Rasberry pi model 3B+">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Pi 3 B+<i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Technical characteristics<i class="material-icons right">close</i></span>
                                <p>1.4GHz 64-bit quad-core processor, dual-band wireless LAN, Bluetooth 4.2/BLE, faster Ethernet, and Power-over-Ethernet support (with separate PoE HAT)</p>
                            </div>
                        </div>

                        <div class="card   col l3 m5 s12">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="./assets/img/bsimple.jpg" alt="Rasberry pi model 3">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Pi 3<i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Technical characteristics<i class="material-icons right">close</i></span>
                                <p>Single-board computer with wireless LAN and Bluetooth connectivity</p>
                            </div>
                        </div>
                    </div>

                    <div id="card-panel-3">

                        <div class="card  col l3 m5 s12">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="./assets/img/powersupply.jpg" alt="Power supply for Rasberry pi">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Power Supply<i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Technical characteristics<i class="material-icons right">close</i></span>
                                <p>The official and recommended USB-C power supply for Raspberry Pi 4</p>
                            </div>
                        </div>

                        <div class="card   col l3 m5 s12">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="./assets/img/adptateur.jpg" alt="Micro HDMI adaptator for Rasberry pi 4">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Micro HDMi<i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Technical characteristics<i class="material-icons right">close</i></span>
                                <p>The official Raspberry Pi micro HDMI to HDMI (A/M) cable designed for the Raspberry Pi 4 computer</p>
                            </div>
                        </div>

                        <div class="card   col l3 m5 s12">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="./assets/img/guide.jpg" alt="Beginer's guide for Rasberry pi model 4">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Official guide<i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Learn how to<i class="material-icons right">close</i></span>
                                
                                <ul>
                                    <li>Set up your Raspberry Pi, install the operating system, and start using this fully functional computer</li>
                                    <li>Start coding projects, with step-by-step guides using the Scratch and Python programming languages</li>
                                    <li>Experiment with connecting electronic components and have fun creating amazing projects</li>
                                </ul>

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