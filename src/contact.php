

<main role="main" class="container">



    <?php
    include 'header.php';

    mb_internal_encoding("UTF-8");

    $hlaska = '';
    if (isset($_GET['uspech']))
        $hlaska = 'Email byl úspěšně odeslán, brzy vám odpovíme.';
    if ($_POST)
    {
        if (isset($_POST['jmeno']) && $_POST['jmeno'] &&
            isset($_POST['email']) && $_POST['email'] &&
            isset($_POST['zprava']) && $_POST['zprava'] &&
            isset($_POST['rok']) && $_POST['rok'] == date('Y'))
        {
            $hlavicka = 'From:' . $_POST['email'];
            $hlavicka .= "\nMIME-Version: 1.0\n";
            $hlavicka .= "Content-Type: text/html; charset=\"utf-8\"\n";
            $adresa = 'pescihla@seznam.cz';
            $predmet = 'Nová zpráva z mailformu';
            $uspech = mb_send_mail($adresa, $predmet, $_POST['zprava'], $hlavicka);
            if ($uspech)
            {
                $hlaska = 'Email byl úspěšně odeslán, brzy vám odpovíme.';
                header('Location: mailform.php?uspech=ano');
                exit;
            }
            else
                $hlaska = 'Email se nepodařilo odeslat. Zkontrolujte adresu.';
        }
        else
            $hlaska = 'Formulář není správně vyplněný!';
    }

    ?>

    <h3> Kontaktní formulář</h3>

    <?php
    if ($hlaska)
        echo('<p>' . htmlspecialchars($hlaska) . '</p>');

    $jmeno = (isset($_POST['jmeno'])) ? $_POST['jmeno'] : '';
    $email = (isset($_POST['email'])) ? $_POST['email'] : '';
    $zprava = (isset($_POST['zprava'])) ? $_POST['zprava'] : '';
    ?>

    <form method="POST">
        <table>
            <tr>
                <td>Vaše jméno:</td>
                <td><input name="jmeno" type="text" <?= htmlspecialchars($jmeno) ?>"/></td>
            </tr>
            <tr>
                <td>Váš email:</td>
                <td><input name="email" type="email" value="@" <?= htmlspecialchars($email) ?>"/></td>
            </tr>
            <tr>
                <td>Aktuální rok:</td>
                <td><input name="rok" type="<h4> h4numberh4 </h4> " /></td>
            </tr>
        </table>
        <textarea name="zprava" placeholder=" <h4> Sem napište Váš vzkaz... </h4>" ><?= htmlspecialchars($zprava) ?></textarea>
        <br />

        <input type="submit" value="Odeslat" />
    </form>
