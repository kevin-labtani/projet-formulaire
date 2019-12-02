<?php

// generate country selector
$countries = ['BE' => 'Belgium', 'DK' => 'Denmark', 'DE' => 'Germany', 'IE' => 'Ireland', 'GR' => 'Greece', 'ES' => 'Spain', 'FR' => 'France', 'IT' => 'Italy', 'LU' => 'Luxembourg', 'NL' => 'the Netherlands', 'PT' => 'Portugal', 'GB' => 'the United Kingdom'];

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
    <!-- Champs du formulaire: sujet (3 sujets possibles, plusieurs choix possibles) Tous les champs sont obligatoires, sauf le sujet (dans ce cas, valeur = "Autre") -->


        <!-- CONTACT FORM -->
        <div class="container section">
            <div class="row">
                <div class="col s12 m6 offset-m3">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="input-field">
                            <input type="text" name="firstName" id="firstName" value=""/>
                            <label for="firstName">First Name</label>
                        </div>
                        <div class="input-field">
                            <input type="text" name="lastName" id="lastName" value=""/>
                            <label for="lastName">Last Name</label>
                        </div>
                        <div class="input-field">
                            <input type="email" name="email" id="email" value=""/>
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field">
                            <select>
                            <option value="" disabled selected>Choose your country</option>
                            <?php foreach ($countries as $key => $value) {
    echo "<option value={$key}>{$value}</option>";
}
                            ?>
                            </select>
                            <label>Select your country</label>
                        </div>
                        <div class="input-field">
                            <select>
                            <option value="" disabled selected>Choose your gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="X">X</option>
                            </select>
                            <label>Select your gender</label>
                        </div>
                        <div class="input-field">
                            <select multiple>
                            <option value="other" disabled selected>Choose your message topic</option>
                            <option value="cs">I want to contact Customer Support</option>
                            <option value="sales">I want to contact Sales</option>
                            <option value="info">I want more information about your company</option>
                            <option value="suggest">I want to offer a suggestion</option>
                            </select>
                            <label>Select your Message Topic</label>
                        </div>
                        <div class="input-field">
                            <textarea
                                name="message"
                                class="materialize-textarea"
                                id="message"
                            ></textarea>
                            <label for="message">Your Message</label>
                        </div>
                        <div class="input-field center">
                            <button class="btn-large" type="submit" name="submit" value="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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