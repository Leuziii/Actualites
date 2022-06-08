<html>

<head>

  
  <?php
$article_id=$_GET["article_id"];
//var_dump($article_id);
try
    {
      $pdo_options[PDO::ATTR_DEFAULT_FETCH_MODE] = PDO::FETCH_OBJ;
      $bdd = new PDO('mysql:host=localhost;dbname=mglsi_news;', 'root', '',$pdo_options);
      
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
   $reponses = $bdd->query('SELECT * FROM categorie');
$reponse = $bdd->prepare('SELECT * FROM article where article.categorie=:a');
$reponse->bindParam(':a',$article_id);
$reponse->execute();
$reponse=$reponse->fetchAll();
$reponses=$reponses->fetchAll();
//var_dump($reponse);?>
  
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
  
  <div id="menu" style="position: fixed;">
  <h1>MENU</h1>
   <ul>
  <li><a class="active" href="position.php">Accueil</a></li>

<?php for($i=0;$i<sizeof($reponses);$i++){

echo "<li><a href=\"categories.php?article_id=".$reponses[$i]->id."\">". $reponses[$i]->libelle ."</a></li>";
}
?>
</ul>
  
  <?php
foreach($reponse as $article){?>
  <div style="margin: auto; border-radius: 200px;">
      <span><?php    echo $article->titre   ?> </span>
    <p>
      <?php    echo $article->contenu   ?>
      
    </p>
  </div>
<?php   
}
  ?> 
  </div>
  </div>
  
  

</body>

</html>