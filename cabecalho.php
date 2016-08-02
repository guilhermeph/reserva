<!DOCTYPE html>
<?php
require_once ("session/session.php");
?>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.css" rel="stylesheet">
	<title>Reservas</title>
</head>
<body>
    <div class="container">
        <div class="principal">
        <?php mostraAlerta("success"); ?>
		<?php mostraAlerta("danger"); ?>