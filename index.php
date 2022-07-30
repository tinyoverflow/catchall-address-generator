<?php

$config = require 'config.php';

$service = trim(strtolower($_POST['service'] ?? ''));

if (isset($_POST['submit']) && !empty($_POST['service'])) {
    $raw = $service . $config['hash'];
    $hash = substr(hash('sha256', $raw), 0, $config['length']);
    $mail = "{$hash}@{$config['domain']}";
}
?>

<!DOCTYPE html>
<html lang="de-DE">
    <head>
        <meta charset="UTF-8">
        <title>Mail Address Generator</title>

        <style lang="text/css">
            * {
                box-sizing: border-box;
                font-size: 1rem;
                padding: 0;
                margin: 0;
                font-family: sans-serif;
                color: #303037;
            }

            body {
                background-color: #303037;
                display: flex;
                height: 100vh;
                align-items: center;
                justify-content: center;
            }

            .wrapper {
                background-color: white;
                border-radius: .25rem;
                padding: 15px;
                width: 350px;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            }

            code {
                font-family: monospace;
            }

            h1 {
                font-size: 1.25rem;
                border-bottom: 1px solid #f0f0fb;
                padding-bottom: 5px;
            }

            .result {
                margin-top: 15px;
                border-radius: .25rem;
                padding: 10px;
                background-color: #303037;
                color: #c2c2d2;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            }

            .result-text {
                background-color: transparent;
                border: none;
                display: block;
                width: 100%;
                font-family: monospace;
                color: whitesmoke;
            }

            label {
                display: block;
                color: #c2c2d2;
                text-transform: uppercase;
                font-size: 0.8rem;
                font-weight: 700;
                letter-spacing: 0.025em;
            }

            label:not(:first-child) {
                margin-top: 10px;
            }

            form {
                margin-top: 15px;
                display: flex;
                border-radius: 0.25rem;
            }

            input {
                outline: none;
            }

            .form-input {
                flex: 1;
                display: block;
                background-color: transparent;
                border: 2px solid #f0f0fb;
                border-top-left-radius: 0.25rem;
                border-bottom-left-radius: 0.25rem;
                padding: 5px 10px;

                transition: all .1s ease-out;
                text-transform: lowercase;
                font-family: monospace;
                color: #c2c2d2;
                border-right: none;
            }

            .form-input {
                border-color: #303037;
                color: #303037;
            }

            .form-button {
                display: block;
                background-color: #f0f0fb;
                border: none;
                color: #c2c2d2;
                border-top-right-radius: 0.25rem;
                border-bottom-right-radius: 0.25rem;
                padding: 0 10px;
                font-size: 0.8rem;
                font-weight: 700;
                font-family: monospace;
                transition: all .1s ease-out;
            }

            .form-input ~ .form-button {
                background-color: #303037;
                color: whitesmoke;
            }

            ::selection {
                border-radius: 0.25rem;
                background-color: rgba(0, 0, 0, 0.2);
            }
        </style>
    </head>

    <body>
        <div class="wrapper">
            <h1>Catch-All Address Generator</h1>

            <form method="POST">
				<label for="service">Service Name</label>
                <input type="text" name="service" id="service" placeholder="Service" class="form-input" value="<?= $service ?>" autofocus />
                <input type="submit" name="submit" value="@<?= $config['domain'] ?>>" class="form-button" />
            </form>

            <?php if(isset($mail)): ?>
                <p class="result">
                    <label for="mail">E-Mail</label>
                    <input type="text" name="mail" id="mail" value="<?= $mail ?>" class="result-text" onClick="onResultClick(this)" />

                    <label for="service">Service</label>
                    <input type="text" name="service" id="service" value="<?= $service ?>" onClick="onResultClick(this)" class="result-text" />
                </p>
            <?php endif; ?>
        </div>

        <script>
            function onResultClick(el) {
                el.focus();
                el.select();
                document.execCommand("copy");
            }

            (function() {
                let el = document.getElementsByClassName("form-input")[0];
                el.focus();
                el.select();
            })();
        </script>
    </body>
</html>