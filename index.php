<?php

// form vars
$firstName = $lastName = $email = $message = '';

// errors array
$errors = ['firstName' => '', 'lastName' => '', 'email' => '', 'message' => '', 'gender' => '', 'country' => ''];

if (isset($_POST['submit'])) {
    // filter list for sanitize and validate entries
    $filters = [
        'firstName' => FILTER_SANITIZE_STRING,
        'lastName' => FILTER_SANITIZE_STRING,
        'country' => FILTER_SANITIZE_STRING,
        'gender' => FILTER_SANITIZE_STRING,
        'topic' => FILTER_SANITIZE_STRING,
        'email' => FILTER_VALIDATE_EMAIL,
        'message' => FILTER_SANITIZE_STRING,
    ];

    // array with sanitized vars
    $result = filter_input_array(INPUT_POST, $filters);

    // grab all sanitized vars
    $firstName = $result['firstName'].'<br/>';
    $lastName = $result['lastName'].'<br/>';
    $email = $result['email'].'<br/>';
    $message = $result['country'].'<br/>';
    $gender = $result['gender'].'<br/>';
    $topic = $result['topic'].'<br/>';
    $message = $result['message'].'<br/>';

    if (empty($result['email'])) {
        $errors['email'] = 'An email is required <br/>';
    }

    if (empty($result['firstName'])) {
        $errors['firstName'] = 'A first name is required <br/>';
    }

    if (empty($result['lastName'])) {
        $errors['lastName'] = 'A last name is required <br/>';
    }

    if (empty($result['email'])) {
        $errors['email'] = 'An email is required <br/>';
    }

    if (empty($result['message'])) {
        $errors['message'] = 'A message is required <br/>';
    }

    if (empty($result['country'])) {
        $errors['country'] = 'A country is required <br/>';
    }

    if (empty($result['gender'])) {
        $errors['gender'] = 'A gender is required <br/>';
    }
}

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
        <section class="container section">
            <div class="row">
                <div class="col s12 m6 offset-m3">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="input-field">
                            <label for="firstName">First Name</label>
                            <input type="text" name="firstName" id="firstName" value="<?php echo htmlspecialchars($result['firstName'] ?? ''); ?>"/>
                            <div class="red-text"><?php echo $errors['firstName']; ?>
                        </div>
                        <div class="input-field">
                            <label for="lastName">Last Name</label>
                            <input type="text" name="lastName" id="lastName" value="<?php echo htmlspecialchars($result['lastName'] ?? ''); ?>"/>
                            <div class="red-text"><?php echo $errors['lastName']; ?>
                        </div>
                        <div class="input-field">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($result['email'] ?? ''); ?>"/>
                            <div class="red-text"><?php echo $errors['email']; ?>
                        </div>
                        <div class="input-field">
                            <select name="country" id="country">
                            <option value="" disabled selected>Choose your country</option>
                            <?php foreach ($countries as $key => $value) {
    echo "<option value={$key}>{$value}</option>";
}
                            ?>
                            </select>
                            <label>Select your country</label>
                            <div class="red-text"><?php echo $errors['country']; ?>
                        </div>
                        <div class="input-field">
                            <select name="gender" id="gender">
                            <option value="" disabled selected>Choose your gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="X">X</option>
                            </select>
                            <label>Select your gender</label>
                            <div class="red-text"><?php echo $errors['gender']; ?>
                        </div>
                        <div class="input-field">
                            <select multiple name="topic" id="topic">
                            <option value="other" disabled selected>Choose your message topic</option>
                            <option value="cs">I want to contact Customer Support</option>
                            <option value="sales">I want to contact Sales</option>
                            <option value="info">I want more information about your company</option>
                            <option value="suggest">I want to offer a suggestion</option>
                            </select>
                            <label>Select your Message Topic</label>
                        </div>
                        <div class="input-field">
                            <label for="message">Your Message</label>
                            <textarea
                                name="message"
                                class="materialize-textarea"
                                id="message"
                            ><?php echo htmlspecialchars($result['message'] ?? ''); ?></textarea>
                            <div class="red-text"><?php echo $errors['message']; ?>
                        </div>
                        <div class="input-field center">
                            <button class="btn-large waves-effect waves-light" type="submit" name="submit" value="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

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