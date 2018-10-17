<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <?php ///////////////////::::::::::::::::::::::::::::::::::::::::::  css  :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::://///?>
        
       <style type="text/css">
        .a{ /*le grand contenaire principale */
           margin: 0 auto;
           max-width: 1150px;
           font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
           font-size: 16px;
           color: #545454;
           background-color: white;
           box-shadow: 0 0 20px rgba(0, 0.5, 0, 0.9);
           }

        .b{ /*le titre signalisation des fuites */
        margin-left:1em;
        font-family:impact;
        color:#2E2E2E;
        font-size:'40px;
        }
           .c{
            color: red;
            }

          .d{
              color: #4CAF50;
              margin-left:2em;
              margin-right:2em;
              font-family:Verdana;
             }

           .e{
               border-style:groove;
               border-color:#08088A;
               border-width:3px;
               border-radius:15px;
           }
           .f{
           
	           border-radius:12px 0 12px 0;
	           background: #08088A;
	           border:none;
	           color:#fff;
	           font:bold 12px Verdana;
	           padding:6px 0 6px 0;
               margin-bottom:1em;
               width:90px;
               height:40px;
               
           }
           
           .i{
          
               color:#1C1C1C;
               margin-left:60em;
               margin-bottom:2em;
               font-size:18px;
           }
        
           #customers {
           font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
           border-collapse: collapse;
           width: 100%;
            }

           #customers td, #customers th {
           border: 1px solid #2E2E2E;
              padding: 10px;
           }

          #customers tr:nth-child(even){background-color: #f2f2f2;}

          #customers tr:hover {background-color: #ddd;}

          #customers th {
            padding-top: 6px;
          padding-bottom: 6px;
          text-align: left;
          background-color: #4CAF50;
          color: white;
          }
           
           .j{
           
           overflow-x:auto;
            overflow-y:scroll;
            height: 750px;
               margin-left:2em;
                margin-right:2em;
               border:1px groove;
               border-color:#2E2E2E;
               
         }
          .u{
          
          
          background-color: #4CAF50; /* For browsers that do not support gradients */
             background-image: linear-gradient(to right,#4CAF50, white); /* Standard syntax (must be last) */
          } 


           .topnav {
           background-color: white;
           overflow: hidden;
}


.topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
    background-color: black;
}


.topnav a:hover {
    background-color: #ddd;
    color: black;
}


.topnav a.active {
    background-color: #4CAF50;
    color: white;
}
           
        </style>
        <?php ///////////////////::::::::::::::::::::::::::::::::::: javascript ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::://///?>
        
       <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" >
          
            
           function fun1(b) {
         $.ajax({
        type: "POST",
        url: "buttonfuite.php",
          data:"a="+b,
          success: function(){
              
          window.location.reload();
        }
      });
    }   
            
       function fun2(b) {
         $.ajax({
        type: "POST",
        url: "buttonassgn.php",
          data:"a="+b,
          success: function(){
              
          window.location.reload();
        }
      });
    }      
        function fuite_tab(){
            var x=document.getElementById("fuite");
            var y=document.getElementById("assi");
            if(x.style.display=="none"){
                x.style.display="block"; 
                y.style.display="none";
                document.getElementById("a1").className="active";
                document.getElementById("a2").className="non-active";
                
                
                 }
                else { x.style.display="block"; }
          }
            
        function assi_tab(){
            var x=document.getElementById("assi");
            var y=document.getElementById("fuite");
            if(x.style.display=="none"){ 
                x.style.display="block";   
                y.style.display="none";
                document.getElementById("a2").className="active";
                document.getElementById("a1").className="non-active";
                
                }
                 else { x.style.display="block";  }
          }
            
       function load(){
           document.getElementById("assi").style.display="none";
           document.getElementById("fuite").style.display="block";
           document.getElementById("a1").className="active";
       }
            
           </script> 
        
      <?php ///////////////////:::::::::::::::::::::::::::::::::::::head of the page :::::::::::::::::::::::::::::::::::::::::::::::::::::::::://///?>   
    </head>

    <body style="background-color:#1724ab" onLoad="load();">
        
            
        
        <div class="a" >
            
        <div class="u">    
            <img src="logo.png" height="100px" width="100px" style="margin-left:65em;margin-top:1em;"/>
            <h1 class="b">Signalisation des fuites</h1>
            <a class="i" href="app2.php" title="Voir toutes les signalisations "><img src="icon.png" height="50px" width="43px"></a>
        </div>
        
            <?php require_once __DIR__.'/db_config.php';
        try
          {
	     // On se connecte à MySQL
	    $bdd = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';charset=utf8', DB_USER, DB_PASSWORD);
          }
         catch(Exception $e)
          {
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
           }


        $reponse1 = $bdd->query('SELECT * FROM client');
        $reponse3 = $bdd->query('SELECT * FROM assignissment where status=0');
        $reponse2 = $bdd->query('SELECT * FROM fuite where status=0');

        $cpt1=0;
        $cpt2=0;

        while ( $reponse2->fetch() ) {
        $cpt1=$cpt1+1;
        }
       while ( $reponse3->fetch() ) {
       $cpt2=$cpt2+1;
       }
        ?>
        <div class="topnav">
             <a  href="#fuite" onclick="fuite_tab();" id="a1">Fuites <?php echo "($cpt1)";?></a>
             <a href="#assi" onclick="assi_tab();"  id="a2">assignissments <?php echo "($cpt2)";?></a>
        </div>
 <?php/////////////////////////////////////////////////   Fuites    ///////////////////////////////////////////////////////////////////////////?> 

</br></br>
<div class="j" id="fuite">
<table id="customers" >
    
    <tr>
      <th>Code Client</th>
      <th>Nom du client</th>
      <th>Numéro de téléphone du client </th>
      <th>Identifiant de la fuite</th>
      <th>Adresse de la fuite </th>
      <th>Type de la fuite</th>
      <th>presentation de la fuite</th>
      <th>longitude</th>
      <th>latitude</th>
      <th>Détail sur la fuite</th>
      <th>Image de la fuite</th>
  
    </tr>
    
<?php
$reponse2 = $bdd->query('SELECT * FROM fuite where status=0');
// On affiche chaque entrée une à une
while ($donnees = $reponse2->fetch())
{ 
   $reponsetmp = $bdd->query('SELECT * FROM client where Code='.$donnees['clientcode'] );
    $donneestmp = $reponsetmp->fetch();
?>
        <tr>
    
    
        <td><?php echo $donneestmp['code']; ?></td>
        <td><?php echo $donneestmp['nom']; ?></td>
            <td><?php echo $donneestmp['telephone'];?></td>
            <td><?php echo $donnees['id']; ?></td>
            <td><?php echo $donnees['adresse']; ?></td>
            <td><?php echo $donnees['type']; ?></td>
            <td><?php echo $donnees['presentation']; ?></td>
            <td><?php echo $donnees['longitude']; ?></td>
            <td><?php echo $donnees['latitude']; ?></td>
             <td><?php echo $donnees['detail']; ?></td>
             <td><?php echo '<img src="data:image/png;base64,'.$donnees['image'].'"  width="250px" height="250px"/>';  ?></td>
            <td><button class="f" onclick="fun1(<?php echo $donnees['id'] ?>);" >Vu</button></td>
          
       </tr>
    
   
<?php
}

?>
    </table>
     </div>    
    
<?php///////////////////////////////////////////   assignissment       ////////////////////////////////////////////////////////////////////////////?>
   </br></br>
   <div class="j" id="assi">
   <table id="customers" >
    
    <tr>
      <th>Code Client</th>
      <th>Nom du client</th>
      <th>Numéro de téléphone du client </th>
      <th>Identifiant de la fuite</th>
      <th>Adresse de la fuite </th>
      <th>Type de la fuite</th>
      <th>longitude</th>
      <th>latitude</th>
      <th>>Détail sur la fuite</th>
      <th>Image de la fuite</th>
  
    </tr>
<?php
$reponse3 = $bdd->query('SELECT * FROM assignissment where status=0');
// On affiche chaque entrée une à une
while ($donnees = $reponse3->fetch())
{ 
   $reponsetmp = $bdd->query('SELECT * FROM client where code='.$donnees['codeclient'] );
    $donneestmp = $reponsetmp->fetch();
?>
<tr>
    
    
        <td><?php echo $donneestmp['code']; ?></td>
        <td><?php echo $donneestmp['nom']; ?></td>
            <td><?php echo $donneestmp['telephone'];?></td>
            <td><?php echo $donnees['id']; ?></td>
            <td><?php echo $donnees['adresse']; ?></td>
            <td><?php echo $donnees['type']; ?></td>
            <td><?php echo $donnees['longitude']; ?></td>
            <td><?php echo $donnees['latitude']; ?></td>
             <td><?php echo $donnees['detail']; ?></td>
             <td><?php echo '<img src="data:image/png;base64,'.$donnees['image'].'"  width="250px" height="250px"/>';  ?></td>
            <td><button class="f" onclick="fun2(<?php echo $donnees['id'] ?>);" >Vu</button></td>
          
       </tr>
<?php
}
?>
        
        
        </div>
        
        </body>
    </html>