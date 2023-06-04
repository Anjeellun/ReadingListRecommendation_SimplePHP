<?php 
    session_start();
    include "koneksi.php";

    if(isset($_POST['update']))
    {   
    $id = $_POST['id'];
    
    $recommendation=$_POST['recommendation'];
    $rating=$_POST['rating'];
    $cover=$_POST['cover']; 
    
    // check fields yang kosong

    if(empty($recommendation) || empty($rating) || empty($cover)) {          
        if(empty($recommendation)) {
            echo "<font color='red'>Silahkan isi tabel terlebih dahulu!</font><br/>";
        }
        
        if(empty($rating)) {
            echo "<font color='red'>Silahkan isi tabel terlebih dahulu!</font><br/>";
        }
        
        if(empty($cover)) {
            echo "<font color='red'>Silahkan isi tabel terlebih dahulu!</font><br/>";
        }       

    } else {    

        //update table

        $result = mysqli_query($conn, "UPDATE recommendation SET recommendation='$recommendation', rating='$rating', cover='$cover' WHERE id=$id");
        
        //Mengarahkan ke halaman home setelah ter-update

        header("Location: home.php");
        }
    }

?>

<?php
        //Get id

        $id = $_GET['id'];

        //Memilih data yang terkait dengan id

        $result = mysqli_query($conn, "SELECT * FROM recommendation WHERE id=$id");

        while($res = mysqli_fetch_array($result))
        {
            $recommendation = $res['recommendation'];
            $rating = $res['rating'];
            $cover = $res['cover'];
        }

?>

    <!DOCTYPE html>
     <html>
     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <title>Edit Recommendation</title>

        <!--CSS-->

        <link rel="stylesheet" type="text/css">
        <style>

        body {
	        background: url('https://bnz06pap001files.storage.live.com/y4m9jKF9Y5YnJlJBKwOtWBs63SL3c52inll8YKafLbi0x_IOdmuVOxkUf4RUXbB0eRu6pzb7EaL0ScTJf6tUvYuPERyZAuKXyNS0hDb0KfQJmbeE-8HuWSNwjN7AnNk-CKmYE2Ey4qxjCtVpGBrrNfmHpALs_uPtRluvcVyFmT_nQrAB2t4b46oAsKVmp5sZsK6?width=1530&height=800&cropmode=none');
	        background-size: 1530px 800px;
	        background-repeat: no-repeat;
	        display: flex;
	        justify-content: center;
	        align-items: center;
	        height: 100vh;
	        flex-direction: column;
	        }
	    ul.navbar {
		    list-style-type: none;
		    padding: 0;
		    margin: 0;
		    position: relative;
		    top: 0.5em;
		    left: 1em;
		    width: 11em;
	        }
	    ul.navbar li {
		    background: black;
		    margin: 0.5em 0;
		    padding: 0.3em;
		    border-right: 1em solid black;
	    }
	    ul.navbar a {
		    text-decoration: none;
	    }
	    h1 {
		    font-family: Gabriola;
	    }

        b {
		    font-family: Gabriola;
            font-size: 30px;
    
        }

        .b1 {
            font-weight: 100;
		    font-family: Gabriola;
            font-size: 25px;
            vertical-align: middle;
            position: relative;
            left: 18%;
    
        }

        .recommendation_btn {
            font-family: Gabriola;
            font-size: 18px;
            height: 39px;
            background: black;
            color: #ffffff;
            border: 2px solid rgb(22, 21, 59);
            border-radius: 5px;
            padding: 5px 20px;
            position: relative;
            border-top: 80%;
            left: 60%;
        }

	    address {
		    margin-top: 1em;
		    padding-top: 1em;
		    border-top: thin dotted
	    }
		a:link,a:visited,a:active {
		    font-family: Gabriola;
		    font-size: 20px;
		    color: #ffffff;
		    text-decoration: none;
	    }
	    a:hover {
		    font-family: Gabriola;
		    font-size: 20px;
		    color: blue;
		    text-decoration: none;
	    }
    </style>
    </head>

    <body>
    <br>
    <form name="form1" method="post" action="editrc.php">

    <table width="1306" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td width="10" bgcolor="#947B98"></td>
        <td width="140" height="120" bgcolor="#947B98"><div align="center"><img src="https://i.ibb.co/HB6dXz8/20221121-114739-0000.png" width="100" height="100"></div></td>
        <td width="10" bgcolor="#947B98"></td>
        <td width="1136" bgcolor="#947B98"><div align="center"><span class="header"><b>Hi, <?php echo $_SESSION['name']; ?>!&nbsp; Wanna Edit Your Recommendation?</b></span>
        <td width="10" bgcolor="#947B98"></td>
    </tr>
    
    <tr>
        <td></td>
        <td rowspan="4" valign="top"><table width="144" height="500" bgcolor="#947B98" border="0" cellspacing="0" cellpadding="0" align="top">
    </tr>

    <tr>
        <td valign="top"><ul class="navbar">
            <li><a href="index.php" title="Balik"><center>Back to Login</center></a></li>
            <li><a href="home.php" title="Balik"><center>Back to Home</center></a></li>
            </ul></td>
            </tr></table></td>
            <td rowspan="4"></td>
        <td rowspan="4" valign="top"><table width="1140" height="500" bgcolor="#DACFDF" border="0" cellspacing="0" cellpadding="0">
            
     </tr>  

    <tr bgcolor="#F8F8FF">

            <tr align="left" class="b1">
                <td>Recommendation</td>
                <td><input type="text" name="recommendation" value="<?php echo $recommendation;?>" required></td>
            </tr>

            <tr align="left" class="b1">
                <td>Rating</td>
                <td><input type="text" name="rating" value="<?php echo $rating;?>" required></td>
            </tr>

            <tr align="left" class="b1">
                <td>Platform to Read</td>
                <td><input type="text" name="cover" value="<?php echo $cover;?>" required></td>
            </tr>

            <tr align="left" >
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input class="recommendation_btn" type="submit" name="update" value="Update"></td>
            </tr>

    <tr bgcolor="#947B98">
        <td height="40" colspan="5" bgcolor="black"><div align="right" style="margin:0 10px 0 0;"><font color="#ffffff">Please Support Author and Artist by Read On Legal Site! ^_^</font><br></div></td>
    </tr>

    </table>
    </form>
    </body>
    </html>