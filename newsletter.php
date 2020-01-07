<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="styles/newsletter.css">
    <title>Document</title>
</head>

<body>
    <Header class="headerBanner">
        <img class="headerBanner" src="assets/logo/logo.png" alt="GamesForReview Logo">
    </Header>
    <div class="headerNavBar" role="menubar">
        <a class="headerNavbarElement" href="index.html" role="menuitem">Startseite</a>
        <a class="headerNavbarElement" href="news.html" role="menuitem">News</a>
        <a class="headerNavbarElement" href="review.html" role="menuitem">Reviews</a>
        <a class="active" href="newsletter.html" role="menuitem">Newsletter</a>
    </div>
    <section class="content">
        <!-- Main Content -->
        <section class="content main">

            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : //Überprüfen ob das Form abgeschickt wurde
                //Eingabebereinigung
                function clean_input($data)
                {
                    $data = trim($data); //Leerzeichen rechts und links vom String entfernen
                    $data = stripslashes($data); //entfernt Backslashes
                    $data = htmlspecialchars($data); //konvertiert special characters zu HTML entities, um Cross-site scripting zu verhindern(ScriptCode als Eingabe)
                    return $data;
                }
            
                function test_name($data){
                    return (bool)preg_match("/^[a-zA-Z-'\s]+$/", $data); //testet ob Name nur aus Leerzeichen, Buchstaben oder (' und -) besteht
                }

                function test_mail($data){
                    if (filter_var($data, FILTER_VALIDATE_EMAIL) == false) {
                        return false;
                    }
                    return true;   
                }

                $name = $email = ""; // leere Variablen initialisieren

                $name = clean_input($_POST["name"]);
                $email = clean_input($_POST["mail"]);

                if(test_name($name)) {
                    if(test_mail($email)) {
                        echo '<h2>Vielen Dank <?php echo $name; ?> </h2>
                        <p>Du wirst in kurzer Zeit eine Bestätigungsemail in deinem Postfach
                        <?php echo $email ?>
                        </p>
                        <p><a href="/newsletter.php">zurück</a> zum Newsletter</p>';
                        $filename = "newsletterlist.txt";
                        $file = fopen ('newsletterlist.txt', 'a') or die ("Fehler beim Schreiben");
                        fwrite($file, $name." : ".$email."\n");
                    }
                    else {
                        echo '<h2>Bitte überprüfe, ob deine E-Mail korrekt ist</h2>
                        <p><a href="/newsletter.php">zurück</a> zum Newsletter</p>';  
                    }
                }
                else {
                    if(test_mail($email)) {
                        echo '<h2>Bitte überprüfe, ob dein Name korrekt ist</h2>
                        <p><a href="/newsletter.php">zurück</a> zum Newsletter</p>';    
                    }
                    else {
                        echo '<h2>Bitte überprüfe, deinen Namen und deine E-Mail</h2>
                        <p><a href="/newsletter.php">zurück</a> zum Newsletter</p>';
                    }
                }
            ?>
                
            <?php else : ?>

                <h1 class="content header">Abboniere jetzt unseren Newsletter</h1>

                <p class="newsletter text" role="document">Mit unseren Newslettern erhältst du genau die News, die
                    dich interessieren - direkt in deine Mailbox.</p>

                <form action="newsletter.php" method="POST">

                    <input class="input element" type="text" placeholder="Name" name="name" maxlength="50" aria-label="Eingabefeld für den Namen">

                    <input class="input element" type="text" placeholder="E-Mail-Adresse" name="mail" maxlength="50" aria-label="Eingabefeld für die E-Mail-Adresse">

                    <input type="submit" value="Submit">

                </form>

            <?php endif; ?>

        </section>
        <!--ADS-->
        <section class="content adsSide">

            <aside>

                <h2 class="content header optionalHeader">Unsere Partner</h2>
                <div class="adsContainer">
                    <img class="adsImg" src="assets/advertising.jpg" alt="Advertising">
                    <img class="adsImg" src="assets/advertising.jpg" alt="Advertising">
                    <img class="adsImg" src="assets/advertising.jpg" alt="Advertising">
                </div>

            </aside>

        </section>
    </section>
    <footer>
        <a href="impressum.html">Impressum</a>
        <a href="kontakt.html">Kontakt</a>
        <a href="aboutUs.html">Über uns</a>
        <a href="career.html">Karriere</a>
    </footer>

</body>

</html>