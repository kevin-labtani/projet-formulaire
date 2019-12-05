<?php

// form vars
$firstName = $lastName = $email = $message = '';

// errors array
$errors = ['firstName' => '', 'lastName' => '', 'email' => '', 'message' => '', 'gender' => '', 'country' => ''];

// regex safety check
// thanks to stackoverflow for the regex
$regSafe = '/[\^<,\"@\/\{\}\(\)\*\$%\?=>:\|]+/i';
$regSafeEmail = '/[\^<,\"\/\{\}\(\)\*\$%\?=>:\|]+/i';

// check for form submit
if (isset($_POST['submit'])) {
    // filter list to sanitize entries
    $filters = [
        'firstName' => FILTER_SANITIZE_STRING,
        'lastName' => FILTER_SANITIZE_STRING,
        'country' => FILTER_SANITIZE_STRING,
        'gender' => FILTER_SANITIZE_STRING,
        'email' => FILTER_SANITIZE_EMAIL,
        'message' => FILTER_SANITIZE_STRING,
    ];

    // array with sanitized vars
    $SanitizedResult = filter_input_array(INPUT_POST, $filters);

    // grab all sanitized vars
    foreach ($filters as $key => $value) {
        $SanitizedResult[$key] = trim($SanitizedResult[$key]);
    }

    // generate error messages

    // sanitized and validated email
    if (empty($SanitizedResult['email'])) {
        $errors['email'] = 'An email is required';
    } elseif (preg_match($regSafeEmail, $SanitizedResult['email'])) {
        $errors['email'] = 'Please use valid characters only';
    } elseif (!filter_var($SanitizedResult['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email must be a valid email address';
    } else {
        $SanitizedResult['email'] = filter_var($SanitizedResult['email'], FILTER_VALIDATE_EMAIL);
    }

    // sanitized and valid chars and max length for name
    if (empty($SanitizedResult['firstName'])) {
        $errors['firstName'] = 'A first name is required';
    } elseif (preg_match($regSafe, $SanitizedResult['firstName'])) {
        $errors['firstName'] = 'Please use valid characters only';
    } elseif (strlen($_POST['firstName']) > 20) {
        $errors['firstName'] = 'The maximum allowed length is 20 characters';
    }

    // sanitized and valid chars and max length for name
    if (empty($SanitizedResult['lastName'])) {
        $errors['lastName'] = 'A last name is required';
    } elseif (preg_match($regSafe, $SanitizedResult['lastName'])) {
        $errors['lastName'] = 'Please use valid characters only';
    } elseif (strlen($_POST['lastName']) > 20) {
        $errors['lastName'] = 'The maximum allowed length is 20 characters';
    }

    // sanitized and max length message, do not check for valid chars as messages might legitimately contain some and sanitization should be enough
    if (empty($SanitizedResult['message'])) {
        $errors['message'] = 'A message is required';
    } elseif (strlen($_POST['message']) > 200) {
        $errors['message'] = 'The maximum allowed length is 200 characters';
    }

    // a country must be selected
    if (empty($SanitizedResult['country'])) {
        $errors['country'] = 'You must select your country';
    }

    // a gender must be selected
    if (empty($SanitizedResult['gender'])) {
        $errors['gender'] = 'You must select your gender';
    }

    // SENDING EMAIL
    // var
    $submit_message = '';
    $honeypot = $_POST['Name'];
    //informations to put inside the email
    $mail_to = 'loiclissens@gmail.com';
    $subject_mail = 'Subject: '.implode(',', $_POST['topic']);
    $content_mail = 'From: '.$SanitizedResult['fistName'].' '.$SanitizedResult['lastName']."\n"
                        .'Live in: '.$SanitizedResult['country']."\n"
                        .'Gender: '.$SanitizedResult['gender']."\n"
                        .'Email: '.$SanitizedResult['email']."\n"
                        .'Message: '.$SanitizedResult['message'];
    //  !array_filter use to check if the errors array is empty
    if (empty($honeypot) and !array_filter($errors)) {
        mail($mail_to, $subject_mail, $content_mail);
        $submit_message = 'Thank you for your submission, an email has been send to our team!';
        $SanitizedResult['firstName'] = $SanitizedResult['lastName'] = $SanitizedResult['email'] = $SanitizedResult['message'] = $_POST['topic'] = $_POST['country'] = $_POST['gender'] = '';
    }
}

// generate country selector
$countries = ['BE' => 'Belgium', 'DK' => 'Denmark', 'DE' => 'Germany', 'IE' => 'Ireland', 'GR' => 'Greece', 'ES' => 'Spain', 'FR' => 'France', 'IT' => 'Italy', 'LU' => 'Luxembourg', 'NL' => 'the Netherlands', 'PT' => 'Portugal', 'GB' => 'the United Kingdom'];

function countrySelector($countries)
{
    echo'<option value="" disabled selected>Choose your country</option>';

    foreach ($countries as $key => $value) {
        $selected = '';
        if (($key == $_POST['country'])) {
            $selected = 'selected';
        }
        echo "<option {$selected} value={$key}>{$value}</option>";
    }
}

// generate gender selector
$gender = ['male' => 'Male', 'female' => 'Female', 'x' => 'X'];

function genderSelector($gender)
{
    echo'<option value="" disabled selected>Choose your gender</option>';

    foreach ($gender as $key => $value) {
        $selected = '';
        if (($key == $_POST['gender'])) {
            $selected = 'selected';
        }
        echo "<option {$selected} value={$key}>{$value}</option>";
    }
}

// generate message topic selector
$topic = [
    'cs' => 'I want to contact Customer Support',
    'sales' => 'I want to contact Sales',
    'info' => 'I want more information about your company',
    'suggest' => 'I want to offer a suggestion',
    'other' => 'I want to contact you for another reason',
];

function topicSelector($topic)
{
    echo'<option value="" disabled selected>Choose your message topic</option>';
    foreach ($topic as $key => $value) {
        $selected = '';
        if ((in_array($key, $_POST['topic']))) {
            $selected = 'selected';
        }
        echo "<option {$selected} value={$key}>{$value}</option>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link rel="stylesheet" href="./assets/css/style.css" />
        <link rel="shortcut icon" type="image/png" href="assets/img/favicon.ico"/>
        <title>Hackers Poulette</title>
    </head>
    <body>
        <!-- HEADER -->   
        <header>
            <nav>
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo center">Hacker Poulette</a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul id="nav-mobile" class="left hide-on-med-and-down">
                        <li><a href="#product">Our products</a></li>
                        <li><a href="#contact">Contact</a></li>
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

            <div class="section container product">
                <h2 id="product" class="scrollspy">Our products</h2>
                <div class="row cardproduct">
                    <ul class="tabs">
                        <li class="tab col s4"><a href="#card-panel-1">Rasberry 4</a></li>
                        <li class="tab col s4"><a href="#card-panel-2">Rasberry 3</a></li>
                        <li class="tab col s4"><a href="#card-panel-3">accessories</a></li>
                    </ul>
                    <div id="card-panel-1">
                        
                        <div class="  col l4 m6 s12 ">
                            <div class="card hoverable">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="./assets/img/rasberrypi4.jpg" alt="Rasberry pi model 4">
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">Pi 4<i class="material-icons right">more_vert</i></span>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">Technical characteristics<i class="material-icons right">close</i></span>
                                    <ul class="browser-default">
                                        <li>From $35</li>
                                        <li>1GB/2GB/3GB RAM</li>
                                        <li>2 micro HDMI</li>
                                        <li>USB 2&3</li>
                                        <li>USB C</li>
                                        <li>Ethernet</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="  col   l4 m6 s12">
                            <div class="card hoverable">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="./assets/img/kitrasberry4.jpg" alt="Beginer's kit for rasberry pi 4">
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">Starter kit <i class="material-icons right">more_vert</i></span>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">Technical characteristics<i class="material-icons right">close</i></span>
                                    <ul class="browser-default">
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
                        </div>

                        <div class="col l4 m6 s12">
                            <div class="card hoverable">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="./assets/img/fullhdscreen.jpg" alt="Screen full HD for rasberry pi model 4">
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">HD screen<i class="material-icons right">more_vert</i></span>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">Technical characteristics<i class="material-icons right">close</i></span>
                                    <ul class="browser-default">
                                        <li>90$</li>
                                        <li>4K</li>
                                        <li>Micro HDMI</li>
                                        <li>4h autonomy </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="card-panel-2">
                        
                        <div class=" col l4 m6 s12">
                            <div class="card hoverable">
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
                        </div>

                        <div class="col l4 m6 s12">
                            <div class="card hoverable">
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
                        </div>

                        <div class="col l4 m6 s12">
                            <div class="card hoverable">
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
                    </div>

                    <div id="card-panel-3">

                        <div class="col l4 m6 s12">
                            <div class="card hoverable">
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
                        </div>

                        <div class="col l4 m6 s12">
                            <div class="card hoverable">
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
                        </div>

                        <div class="col l4 m6 s12">
                            <div class="card hoverable">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="./assets/img/guide.jpg" alt="Beginer's guide for Rasberry pi model 4">
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">Official guide<i class="material-icons right">more_vert</i></span>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">Learn how to<i class="material-icons right">close</i></span>
                                    <ul class="browser-default">
                                        <li>Set up your Raspberry Pi, install the operating system, and start using this fully functional computer</li>
                                        <li>Start coding projects, with step-by-step guides using the Scratch and Python programming languages</li>
                                        <li>Experiment with connecting electronic components and have fun creating amazing projects</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Paralax -->

            
            <div class="row">
                <div class="parallax-container hide-on-med-and-down">
                    <div class="parallax col s12"><img src="./assets/img/rasberrypi.jpg" alt="picture of a motherboard"></div>
                </div>
            </div>
            

             <!-- CONTACT FORM -->

        <div id= "contact" class="container section scrollspy">
            <h2 class="center-align">Contact Us</h2>
            <div class="row">
                <div class="col s12 m6 offset-m3">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <!-- first name -->
                        <div class="input-field">
                            <label for="firstName" class="grey-text text-darken-4">First Name</label>
                            <input type="text" name="firstName" id="firstName" class="validate" required data-length="20" value="<?php echo $SanitizedResult['firstName'] ?? ''; ?>"/>
                            <div class="red-text fn-error"><?php echo $errors['firstName']; ?></div>
                        </div>
                        <!-- last name -->
                        <div class="input-field">
                            <label for="lastName" class="grey-text text-darken-4">Last Name</label>
                            <input type="text" name="lastName" id="lastName" class="validate" data-length="20" required value="<?php echo $SanitizedResult['lastName'] ?? ''; ?>"/>
                            <div class="red-text ln-error"><?php echo $errors['lastName']; ?></div>
                        </div>
                        <!-- email -->
                        <div class="input-field">
                            <label for="email" class="grey-text text-darken-4">Email</label>
                            <input type="email" name="email" id="email" class="validate" required value="<?php echo $SanitizedResult['email'] ?? ''; ?>"/>
                            <div class="red-text email-error"><?php echo $errors['email']; ?></div>
                        </div>
                        <!-- country -->
                        <div class="input-field">
                            <select name="country" id="country">
                                <?php countrySelector($countries); ?>
                            </select>
                            <label class="grey-text text-darken-4">Select your country</label>
                            <div class="red-text"><?php echo $errors['country']; ?></div>
                        </div>
                        <!-- gender -->
                        <div class="input-field">
                            <select name="gender" id="gender">
                                <?php genderSelector($gender); ?>
                            </select>
                            <label class="grey-text text-darken-4">Select your gender</label>
                            <div class="red-text"><?php echo $errors['gender']; ?></div>
                        </div>
                        <!-- topic -->
                        <div class="input-field">
                            <select multiple name="topic[]" id="topic">
                                <?php topicSelector($topic); ?>
                            </select>
                            <label class="grey-text text-darken-4">Select your Message Topic</label>
                        </div>
                        <!-- message-->
                        <div class="input-field">
                            <label for="message" class="grey-text text-darken-4">Your Message</label>
                            <textarea
                                name="message"
                                class="materialize-textarea"
                                id="message"
                                data-length="200"
                                required
                            ><?php echo $SanitizedResult['message'] ?? ''; ?></textarea>
                            <div class="red-text"><?php echo $errors['message']; ?></div>
                        </div>
                        <div class="input-field center">
                            <button class="btn-large waves-effect waves-light" type="submit" name="submit" value="submit">Submit</button>
                        </div>
                        <!-- honeypot -->
                        <div style="display: none;">
                            <label for="Name" class="grey-text text-darken-4">Name</label>
                            <input type="text" name="Name" id="Name" value=""/>
                        </div>
                    </form>
                    <div>
                        <p><?php echo $submit_message; ?></p>
                    </div>
                </div>
            </div>
        </div>
        </main>
                 <!-- FOOTER -->   
        
        <footer class="page-footer">
            <div class="container">
                <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Info</h5>
                    <ul>
                        <li>0473/54.23.23</li>
                        <li>TVA : BE 0999999999</li>
                        <li>mail@mail.com</li>
                        <li>Quai Arthur Rimbaud 10, 6000 Charleroi</li>
                        <li>
                            <img src="./assets/img/visa.svg" alt="Logo visa">
                            <img src="./assets/img/mastercard.svg" alt="Logo mastercard">
                            <img src="./assets/img/paypal.svg" alt="Logo paypal">
                            <img src="./assets/img/bancontact.svg" alt="Logo bancontact">
                        </li>
                    </ul>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Connect with Us</h5>
                    <div class="flex-footer">
                        
                        <a class="grey-text text-lighten-3" href="#!"><img src="./assets/img/facebook.svg" alt="Logo Facebook"></a>
                        <a class="grey-text text-lighten-3" href="#!"><img src="./assets/img/instagram.svg" alt="Logo instagram"></a>
                        <a class="grey-text text-lighten-3" href="#!"><img src="./assets/img/twitter.svg" alt="Logo twitter"></a>
                        
                    </div>
                </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                © 2018 Hacker poulette
                <a class="grey-text text-lighten-4 right" href="#!">Terms and Conditions</a>
                </div>
            </div>
        </footer>
            
        
        <!--JavaScript at end of body for optimized loading-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="assets/js/validate.js"></script>
        <script>
            // init materialize js stuff
            document.addEventListener("DOMContentLoaded", function() {
                M.AutoInit();
            });
            // init char counters for fields with max length
            var textNeedCount = document.querySelectorAll('#firstName, #lastName, #message');
            M.CharacterCounter.init(textNeedCount);
    </script>
    </body>
</html>