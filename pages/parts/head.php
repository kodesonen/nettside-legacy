<!-- Takk for at du tar en titt! Ønsker du hele kildekoden så sjekk oss ut på Github: https://github.com/kodesonen -->

<!doctype html><html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
	<link rel='stylesheet' href='/assets/css/animate.css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	
	<link rel="icon" type="image/png" href="favicon.ico" />
	
    <?php if($_GET['side'] == 'skriv-innlegg'){
        echo "
            <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.css' />
            <link rel='stylesheet' href='/assets/css/summernote.css'>
        ";
    } ?>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-138307048-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-138307048-1');
	</script>

</head>
<body>

	<script src="/assets/js/cookiechoices.js"></script>
	<script>
	  document.addEventListener('DOMContentLoaded', function(event) {
		cookieChoices.showCookieConsentBar('Vi bruker informasjonskapsler!', 'Kodesonen bruker informasjonskapsler for å samle inn enkel informasjon over din aktivitet på denne nettsiden. Vi gjør dette for å analysere bruksmønsteret og aktiviteten til alle våre besøkende. Hvis dette er greit for deg, klikk på godkjent.', 
			'godkjent', 'les mer', 'https://www.datatilsynet.no/personvern-pa-ulike-omrader/internett-og-apper/cookies/');
	  });
	</script>