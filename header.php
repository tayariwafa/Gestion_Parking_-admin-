<?php 

$bdd=new PDO('mysql:host=127.0.0.1;dbname=pfe2','root','');
if(isset($_SESSION['id']) )
{
    $requser = $bdd->prepare('SELECT * FROM responsables,parkings WHERE responsables.id=? and responsables.id= parkings.id ');
     $requser->execute(array($_SESSION['id']));
      $parkinfo = $requser -> fetch(); 

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="logo1.png" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    
<style type="text/css">
header{
    background-color: #222222 ;
    height: 70px;
}


.icon-user{
height: 20px;
width: 20px;

}
body {
overflow: inherit;
    background-color: #F4F4F4; 
        margin:  :0px;
    padding:  :0px ;
}
.mypark
{
     margin-top: 20px;
     margin-left: 60px;
     float: left;
     color :#C6C6C6;
      font-size: 30px;
       font-style: oblique;
       font-family: "Times New Roman", Times, serif;
}

.nav{
    margin-top: 20px;
     float: right;
          margin:  :0px;
    padding:  :0px ;
}
.navlink,
.navlink:link, 
.navlink:visited, 
.navlink:active,
.submenu-link,
.submenu-link:link, 
.submenu-link:visited, 
.submenu-link:active {
    display: block;
    position: relative;
    font-size: 14px;
    letter-spacing: 1px;
    cursor: pointer;
    text-decoration: none;
    outline: none;
}
.navlink,
.navlink:link, 
.navlink:visited, 
.navlink:active {
    color: #C6C6C6;
    font-weight: bold;
}
.dropdown {
    position: relative;
}
.dropdown .navlink {
    padding-right: 15px;
    height: 17px;
    line-height: 17px;
}

.submenu::after, 
.submenu::before {
    content: ""; 
    position: absolute;
    bottom: 100%;
    left: 50%;
    margin-left: -10px;
    border: 10px solid transparent;
    height: 0;
}

.submenu {
    position: absolute;
    top: 100%;
    left: 50%;
    z-index: 100;
    width: 200px;
    margin-left: -100px;
    background: #fff;
    border-radius: 3px;
    line-height: 1.46667;
    margin-top: -5px;
    box-shadow: 0 0 8px rgba(0,0,0,.3);
   /* opacity:100%;rrrrrreeee*/
    -webkit-transform: translate(0, 0) scale(.85);
    transform: translate(0, 0)scale(.85);
    transition: transform 0.1s ease-out, opacity 0.1s ease-out;
  }
.submenu::after {
    border-bottom-color: #fff;
}

.submenu::before {
    margin-left: -13px;
    border: 13px solid transparent;
    border-bottom-color: rgba(0,0,0,.1);
    -webkit-filter:blur(1px);
    filter:blur(1px);
}


.submenu-item {
 list-style: none;
    text-align: left;
}

.submenu-link:hover {
    text-decoration: underline;
}

.submenu-seperator {
    height: 0;
    margin: 12px 10px;
    border-top: 1px solid #eee;
}

.show-submenu .submenu {
    opacity: 1;
    -webkit-transform: translate(0, 25px) scale(1);
    transform: translate(0, 25px) scale(1);
    pointer-events: auto;
}
.submenu-link,
.submenu-link:link, 
.submenu-link:visited, 
.submenu-link:active {
    color: #222222;
    padding: 10px 20px;
}


/*navigation */
            
            * {
                margin: 0;
                padding: 0;
            }
            
            body {
                font-family: Open Sans, Arial, sans-serif;
                overflow-x: hidden;
            }
            .navul{
              margin: 0;
              padding: 0;
              width: 200px;
              position: fixed; 
              height: 100%;
              background-color: #222222;
             
            }
            .navv {
               margin: 0;
                padding: 0;
                top: 70px;
                width: 200px; 
                height: 120%;
                float: left;
                background-color: #222222;
             
            }
            .navv ul {
                list-style: none;
               

            }
            .navv ul li a {
                text-decoration: none;
                display: block;
                text-align: left;
                color: #C6C6C6;
                padding: 15px 15px;
            }
           hr{
             text-align: center;
         
           }
           
.nav ul ul {

  display : none ;
}
 .nav ul li:hover > ul {

  display : block ;
}
  .navlink{
    margin-bottom: 15px;
  }          
  .avatar{
    width: 40px;
    height: 40px;
    border-radius: 50%;
    position: absolute;
   margin-top: 15px;
   margin-left: 15px;
    margin-right: 10px;
}
        </style>

</head>
<body>
    <header>
     
        <a href="acceuil.php">  <img src="logo1.png" class="avatar"/><strong class="mypark"> <?php echo $parkinfo['Nom_park']; ?> </strong></a>
        <nav role="navigation" class="nav">
  <ul class="submenu-item">    
      <li class="nav-item dropdown">
          <a href="#" class="navlink" ><span><img class="icon-user" src="iconuser.png"></span> Responsable</a>
          <ul class="nav-item dropdown">
              <nav class="submenu">
                    
                      <li class="submenu-item"><a href="Profil.php" class="submenu-link"><img class="   icon-user" src="fa-user.png"/><strong> &nbsp;Profil</strong></a>
                      </li>
                      <li class="submenu-item"><a href="edition.php" class="submenu-link"><img class="    icon-user" src="Edit_user.png"> <strong> &nbsp; Modifier Profil</strong></a></li>
                      <li class="submenu-item"><a href="deconnexion.php" class="submenu-link"><img 
                          class="icon-user" src="téléchargement.png"><strong>&nbsp;&nbsp;Déconnexion</strong></a>
                      </li>
                    
                </nav>
         </ul>
      </li>
</ul>


</nav>
  </header>
  <nav class="navv">
            
            <ul class="navul"><br>
               <li><a href="acceuil.php"><img class="   icon-user" src="iconu5er.png"/>&nbsp;&nbsp;<strong> Acceuil</strong></a></li>
               
                <li><a href="affiche_g.php"><img class="   icon-user" src="iconus4er.png"/>&nbsp;&nbsp;<strong> Gardiens</strong></a></li>
              
                <li><a href="consult.php">
                <img class="   icon-user" src="iconu6ser.png"/>&nbsp;&nbsp;<strong> Entrées/Sorties</strong></a></li>
               
            </ul>
            
        </nav>

     <div class="content"></div>


    <script src="js/index.js"></script>

</body>
</html>
<?php
}
?>