<html>
	<head>
		<title>TDKSpinner</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="form.js"></script>
	</head>
	<body>
		<?php 
			include 'func.php';
			if(isset($_POST['yazii'])){
    			$yedekk=$_POST['yazii'];
    			for($ix=1;$ix<$_POST['sayi'];$ix++){
        			$yedekk=str_replace("{[".$ix."]}", $_POST[$ix], $yedekk);
    			}
    			die ('<center><textarea style="width:100%; height: 400px; float:left;">' . $yedekk . '</textarea></center>');
				sayfa();
			}else{
    			sayfa();
			}
		?>
	</body>
</html>