<?php

// Google Analytics & indekseringer (Bing etc.)

if($_GET['side'] == 'home'){
	echo "
			<meta property='og:title' content='Kodesonen'>
			<meta property='og:description' content='Vi har som formål å skape et trivelig, teknologisk og utfordrende miljø for våre medlemmer. '>
			<meta property='og:image' content=''>
			<meta property='og:url' content='https://kodesonen.no'>
		 ";
}
if($_GET['side'] == 'medlem'){
	echo "
			<meta property='og:title' content=''>
			<meta property='og:description' content=''>
			<meta property='og:image' content=''>
			<meta property='og:url' content='https://kodesonen.no/?side=medlem'>
		 ";
}

?>
