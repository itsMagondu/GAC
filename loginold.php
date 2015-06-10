<?php

// Inialize session
session_start();
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['username'])) {
header('Location: securedpage.php');
}

?>
<html>

<head>
<title>PHPMySimpleLogin 0.3</title>
</head>

<body>
<div id="header_main">
<h1></h1><br /><h2><font size="+3" face="Arial, Helvetica, sans-serif"> KIKUYU POLICE PORTAL </font></h2>
			<br />
            <p><font size="+1">Help is only a click away...</font></p>
             <br  />                 
            <p><hr /></p>
</div>

<div style="width:800px; height:300px; padding:30px;  margin:20px; " align="center">
<h3>&nbsp;</h3>
<h3>User Login</h3>
<p>&nbsp;</p>

<table width="336" border="0" align="center">
  <form method="POST" action="loginproc.php" ">
<tr><td>Username</td><td>:</td><td><input type="text" name="username" size="40"></td></tr>
<tr><td>Password</td><td>:</td><td><input type="password" name="password" size="40"></td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" value="Login"></td></tr>
</form>
</table>
</div>
<div id="footer">
     
    <!-- START OF ZYMIC.COM COPYRIGHT, DO NOT REMOVE OR EDIT ANYTHING BELOW WITHOUT PAYING LICENSE FEE (ELSE FACE LEGAL ACTION) -->
  <div id="copyright">
  	<br />
    <br />
    <br />
    <br />
    <p>
    
    <img src="images/kenyaflag.jpg" width="131" height="110" alt="flag" /><img src="images/police and citizen.jpg" width="131" height="110" alt="policeandcitizen" /><img src="images/police marching.jpg" width="131" height="110" alt="marchingpolice" /><img src="images/policecar.jpg" width="131" height="110" alt="policecar" /><img src="images/policelogobig.jpg" width="131" height="110" alt="policelogo" /></p>
     <br />
    <br />
    <p> <center>
      <font color="#000000"> Copyright &copy; 2012 Paul Kahoro</font>
    </center></p>
    <br />
    <br />
</div>
    <!--  -->
</div>
</body>
<?php

?>
</html>