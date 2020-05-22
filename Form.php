<?php require_once 'includes/header.php' ?>
<head>
<link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css" />
</head>

<div class = form> 
<form method="POST" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" accept-charset="UTF-8">
<p><label>Your Name<strong>*</strong><br>
<input type="text" size="48" name="name" value="<?PHP if(isset($_POST['name'])) echo htmlspecialchars($_POST['name']); ?>"></label></p>
<p><label>Email Address<strong>*</strong><br>
<input type="email" size="48" name="email" value="<?PHP if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>"></label></p>
<p><label>Subject<br>
<input type="text" size="48" name="subject" value="<?PHP if(isset($_POST['subject'])) echo htmlspecialchars($_POST['subject']); ?>"></label></p>
<p><label>Enquiry<strong>*</strong><br>
<textarea name="message" cols="48" rows="8"><?PHP if(isset($_POST['message'])) echo htmlspecialchars($_POST['message']); ?></textarea></label></p>
<p><input type="submit" name="sendfeedback" value="Send Message"></p>
</form>

