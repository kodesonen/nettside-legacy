<!-- Takk for at du tar en titt! Ønsker du hele kildekoden så sjekk oss ut på Github: https://github.com/kodesonen -->
<!doctype html><html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	
    <?php if($_GET['side'] == 'skriv-innlegg'){
        echo "
            <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.css' />
            <link rel='stylesheet' href='/assets/css/summernote.css'>
        ";
    } ?>
	
	<?php include 'seo.php'; ?>

</head>
<body>
