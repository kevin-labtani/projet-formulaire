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

// SEND EMAIL
// CHECK IF ERROR ARRAY IS EMPTY
// CHECK IF NONEYPOT (name="Name" id="Name") ISN'T FILLED
// GRAB VALUES TO BE EMAILED FROM $SanitizedResult ARRAY nb: GRAB TOPIC FROM $_POST['topic'] (it's also an array!!)
// THEN SEND EMAIL
?>

<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link rel="stylesheet" href="./assets/css/style.css" />
        <title>Hackers Poulette</title>
    </head>
    <body>
        <!-- CONTACT FORM -->
        <section class="container section">
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
                            <label class="grey-text text-darken-4"l>Select your country</label>
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
                </div>
            </div>
        </section>

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