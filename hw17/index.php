<?php
    session_start();
?>
<html>
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="./assets/css/story-main.css">
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
        <?php
            $valid_pages = array("content", "contact");

            if (isset($_GET['page']) && in_array($_GET['page'], $valid_pages))
            {
                $page=$_GET['page'];
            }
            else
            {
                $page="content";
            }

            include('navigation.php');

            include($page.'.php');
        ?>
	</body>
</html>