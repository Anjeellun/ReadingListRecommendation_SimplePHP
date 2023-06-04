 <?php
     $errors = "";

     session_start();
     include "koneksi.php";

     if (isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_POST['submit'])) {
          $recommendation = $_POST['recommendation'];
          $rating = $_POST['rating'];
          $cover = $_POST['cover'];
     }

     if (empty($recommendation)) {
     } else {
          mysqli_query($conn, "INSERT INTO recommendation (recommendation, rating, cover) VALUES ('$recommendation',  '$rating', '$cover')");
          header("Location: home.php");
     }

     if (isset($_GET['delete'])) {
          $id = $_GET['delete'];
          mysqli_query($conn, "DELETE FROM recommendation WHERE id=$id");
          header('location: home.php');
     }

     $recommendation = mysqli_query($conn, "SELECT * FROM recommendation");

     ?>

 <!DOCTYPE html>
 <html>

 <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Recommendation</title>

      <!--CSS-->
      <link rel="stylesheet" type="text/css" href="css.css">
 </head>

 <body style="background-image : url('https://bnz06pap001files.storage.live.com/y4mE6444dXobUGha9fQ-skRF7TSFedtJp_mwP3KmmHhjIHbwWOPr5tEhgeL-ltjQoBpj5aersoqbaiRSMXRKmYgzHSHyTlioiR7hvUIgjRSyQ8yBOewygHNUgIPKvTPRwfB_82IlJgeplUka7GlOisHkY0wVikgUPxow4ACYQvGXJlZDrxmHazFXXvHNJ3-1Dg6?width=1540&height=800&cropmode=none');"></body>

 <div class="heading">
      <h1 style="text-decoration: underline;"> Hello, <?php echo $_SESSION['name']; ?></h1>
      <h2>Let Us Know Your New Recommendation! ღゝ◡╹)ノ♡ </h2>
 </div>

 <form method="POST" action="home.php">

      <?php if (isset($errors)) { ?>
      <?php } ?>

      <p><b>Title</b></p>
      <input type="text" name="recommendation" class="recommendation_input">
      <p><b>Rating</b></p>
      <input type="text" name="rating" class="recommendation_input">
      <p><b>Platform to Read</b></p>
      <input type="text" name="cover" class="recommendation_input">
      <br>
      <br>
      <button type="submit" class="recommendation_btn" name="submit">Add New Recommendation</button>

 </form>
 <table>
      <thead>
           <tr>
                <th>No</th>
                <th>Title</th>
                <th>Rating</th>
                <th>Platform</th>
                <th>Action</th>
           </tr>
      </thead>
      <tbody>
           <?php $i = 1;
               while ($row = mysqli_fetch_array($recommendation)) { ?>
                <tr>
                     <td>
                          <center><?php echo $i; ?></center>
                     </td>
                     <td class="recommendation"><?php echo $row['recommendation']; ?></td>
                     <td class="rating">
                          <center><?php echo $row['rating']; ?></center>
                     </td>
                     <td class="cover">
                          <center><?php echo $row['cover']; ?></center>
                     </td>

                     <td class="delete">
                          <a href="home.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin ingin menghapus judul ini?')">Delete</a>
                          <a href="editrc.php?id=<?php echo $row['id']; ?>">Edit</a>
                     </td>
                </tr>
           <?php $i++;
               } ?>
      </tbody>
 </table>
 <a type="submit" class="recommendation_btn2" name="submit" href="logout.php">Log Out</a>

 <br>
 <br>
 <br>

 <footer>
      <center>
           <p>Please Support Author and Artist by Read on Legal Site!<br>
                <a href="https://www.webtoons.com/id" style="color: rgb(22, 21, 59)">Webtoon ID</a> &nbsp; <a href="https://id.kakaowebtoon.com/" style="color: rgb(22, 21, 59)">Kakao Webtoon ID</a> &nbsp;
                <a href="https://tapas.io/" style="color: rgb(22, 21, 59)">Tapas</a> &nbsp; <a href="https://manta.net/" style="color: rgb(22, 21, 59)">Manta</a> &nbsp;
                <a href="https://www.pocketcomics.com/" style="color: rgb(22, 21, 59)">Pocket Comics</a> &nbsp; <a href="https://www.tappytoon.com/de/comics/home" style="color: rgb(22, 21, 59)">Tappytoon</a> &nbsp;
                <a href="https://page.kakao.com/" style="color: rgb(22, 21, 59)">Kakaopage Korea</a> &nbsp; <a href="https://ridibooks.com/webtoon/recommendation" style="color: rgb(22, 21, 59)">Ridibooks</a> &nbsp;
                <a href="https://mangaplus.shueisha.co.jp/manga_list/all" style="color: rgb(22, 21, 59)">Mangaplus</a> &nbsp; etc.
           </p>
 </footer>
 </center>
 </body>

 </html>