<!DOCTYPE html>
<html>
<head>
    <title>PHP Code Editor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.2/codemirror.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.2/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.2/mode/javascript/javascript.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.2/mode/python/python.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.2/mode/clike/clike.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.2/mode/shell/shell.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.2/mode/php/php.min.js"></script>
    <style>
        .CodeMirror {
            height: 400px;
        }
    </style>
</head>
<body>
    <h1>PHP Code Editor</h1>
    <label for="language">Select Language:</label>
    <select id="language" onchange="changeLanguage()">
        <option value="javascript">JavaScript</option>
        <option value="python">Python</option>
        <option value="cpp">C++</option>
        <option value="sh">Shell</option>
        <option value="php">PHP</option>
    </select>

    <?php
    // Handle the form submission to save the code to a file
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $code = $_POST['code'];
        $filename = $_POST['filename'];

        // Specify the directory where the files will be saved
        $directory = getcwd();

        // Create the directory if it doesn't exist
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        // Generate the file path
        $filePath = $directory . "/" . $filename;

        // Save the code to the file
        $fileSaved = file_put_contents($filePath, $code);

        // Check if the file saving was successful
        if ($fileSaved !== false) {
            echo '<p class="success">Code saved successfully to: ' . $filePath . '</p>';
        } else {
            echo '<p class="error">Error saving the code to the file.</p>';
        }
    }

    // Load the file contents into the editor if the filename is provided
    if (isset($_GET['filename'])) {
        $filename = $_GET['filename'];

        // Specify the directory where the files are stored
        $directory = getcwd();

        // Generate the file path
        $filePath = $directory . "/" . $filename;

        // Read the file contents
        $fileContents = file_get_contents($filePath);
    } else {
        $fileContents = '';
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input type="text" name="filename" placeholder="Enter the filename">
        <textarea id="code" name="code"><?php echo htmlspecialchars($fileContents); ?></></textarea>
        <br>
        <input type="submit" value="Save Code">
    </form>

    <script>
        var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
            lineNumbers: true,
            mode: "javascript",
            theme: "default",
            autofocus: true
        });

        // Function to change the CodeMirror mode based on the selected language
        function changeLanguage() {
            var language = document.getElementById("language").value;
            var mode;

            if (language === "javascript") {
                mode = "javascript";
            } else if (language === "python") {
                mode = "python";
            } else if (language === "cpp") {
                mode = "text/x-c++src";
            } else if (language === "sh") {
                mode = "shell";
            } else if (language === "php") {
                mode = "php";
            }

            editor.setOption("mode", mode);
        }
    </script>
</body>
</html>

