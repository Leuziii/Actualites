<html>

<head>

	   <?php

try
    {
      $pdo_options[PDO::ATTR_DEFAULT_FETCH_MODE] = PDO::FETCH_OBJ;
      $bdd = new PDO('mysql:host=localhost;dbname=mglsi_news;charset=utf8', 'root', '',$pdo_options);
      
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
$reponse = $bdd->query('SELECT * FROM categorie');
$articles = $bdd->query('SELECT * FROM article');
$reponse=$reponse->fetchAll();
?> 
	
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		*
{
	box-sizing: border-box;
}
body
{
	margin: 0px;
	padding: 0px; 
	top: 0px;
}


#menu 
{ 
	
	color: black;
	text-align: center; 
	background-color: white;
	
	
}
#menu ul, #menu li
{
	display: inline;

}
#menu li a
{

	display: inline-block;
	color: black;
	padding: 10px;
	text-decoration: none;
	
}

#titre-principal
{
	text-align: center;
}
#contenu
{
	color: black;
	padding: 10px;
	padding-top: 10px; 
	overflow: auto; 
	
	
}
#contenu p
{
	line-height: 1.5;
	text-align: justify;
	color: black;
}
#pied 
{ 
	bottom: 0%;
	height:5%;
	background-color: black;
	color: white;
	text-align: center;
	padding: 5px;
}
p
{
	box-shadow:2px 2px 2px ;

	padding-top: 5px;
	padding: 10px 10px;
}
a{
	text-decoration: none;
	color: black;
	text-align: 20%;
}

	</style>
</head>

<body>

 
	<div id="contenu">
	
	<div id="menu">
	<h1>MENU</h1>
	 <ul>
  <li><a class="active" href="">Accueil</a></li>

<?php for($i=0;$i<sizeof($reponse);$i++){

echo "<li><a href=\"categories.php?article_id=".$reponse[$i]->id."\">". $reponse[$i]->libelle ."</a></li>";
}
?>
</ul>
	
	<?php
foreach($articles as $article){?>
  <div style="margin: auto; border-radius: 200px;">
    <span style="font-style:  25px; padding: 15px"><?php    echo $article->titre   ?> </span>
    <p style="padding: 15px">
      <?php    echo $article->contenu   ?><br>
      <?php    echo $article->dateCreation   ?>     
    </p>
  </div>
<?php   
}
  ?> 
	</div>
	</div>
	
	

</body>

</html>