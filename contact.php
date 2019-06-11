<?php
// DO NOT REMOVE!
include("includes/init.php");
// DO NOT REMOVE!
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="style/all.css" media="all" />
  <title>Contact</title>
</head>

<body>
  <div class="content_wrapper">
  <!-- TODO: This should be your main page for your site. -->
  <?php
  $navWork = "";
  $navAbout ="";
  $navContact ="current_page";
  include("includes/header.php");
  ?>
  <div class="spacer200px"></div>
    <p class="header">Contact me</p>
    <p class="body secondary">I would love to get in touch! Either this form or my <a class="underline"href="mailto:xm53@cornell.edu">email</a> would work!</p>


  <!-- Citation: When coding up this form I used lab03 produced by Kyle Harms as a reference to understand the sticky form -->
  <?php
    // Was the form submitted?
    if (isset($_POST['submit'])) {
      // Assume the order is valid
      $valid_form = TRUE;

      // Name is required.
      $contact_name = trim( $_POST['contact_name'] );
      if ( $contact_name == '' ) {
        $valid_form = FALSE;
        $show_form_name_error = TRUE;
      }

      $contact_email = trim( $_POST['contact_email'] );
      if ( $contact_email == '' ) {
        $valid_form = FALSE;
        $show_form_email_error = TRUE;
      }
      $contact_subject = $_POST['contact_subject'];
      if ( $contact_subject == '' ) {
        $valid_form = FALSE;
        $show_form_subject_error = TRUE;
      }

      $contact_message = $_POST['message'];
    } else {
      $contact_name = "";

      $contact_email = "";

      $contact_subject = "";

      $contact_message = "";
    }
    ?>
    <?php
      if ( isset($valid_form) && $valid_form ) { ?>

      <p class="body">Form submitted successfully! Click <a class="underline" href="contact.php">here</a> to go back</p>

      <?php } else { ?>

        <form id="contact_form" class="body secondary" method="post" action="contact.php">

            <p class="error <?php if ( !isset($show_form_name_error) ) { echo 'hidden'; } ?>">Please enter something here</p>
            <p>
              <label for="name_field">Name:</label>
              <input id="name_field" type="text" name="contact_name" value="<?php echo $contact_name; ?>"/>
            </p>
            <p class="error <?php if ( !isset($show_form_email_error) ) { echo 'hidden'; } ?>">Please use a valid email</p>
            <p>
              <label for="email_field">Email:</label>
              <input id="email_field" type="text" name="contact_email" value="<?php echo $contact_email; ?>"/>
            </p>
            <p class="error <?php if ( !isset($show_form_subject_error) ) { echo 'hidden'; } ?>">Please include a subject</p>
            <p>
              <label for="subject_field">Subject:</label>
              <input id="subject_field" type="text" name="contact_subject" value="<?php echo $contact_subject; ?>"/>
            </p>
            <!-- <p>Please enter a message.</p> -->
            <p>Message</p>
            <textarea name="message" form="contact_form"><?php echo $contact_message; ?></textarea>


            <input type="submit" name="submit" value="Submit"/>

        </form>
      <?php } ?>

  <div class="push"></div>
</div>
  <?php
  include("includes/footer.php");
  ?>
</body>
</html>
