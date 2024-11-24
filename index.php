<?php
$rezultat = null;

// Obrada forme
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $prviBroj = isset($_POST['prvi_broj']) ? (float)$_POST['prvi_broj'] : 0;
    $drugiBroj = isset($_POST['drugi_broj']) ? (float)$_POST['drugi_broj'] : 0;
    $operacija = isset($_POST['operacija']) ? $_POST['operacija'] : "";

    // Izvršenje operacija pomoću switch
    switch ($operacija) {
        case "zbrajanje":
            $rezultat = $prviBroj + $drugiBroj;
            break;
        case "oduzimanje":
            $rezultat = $prviBroj - $drugiBroj;
            break;
        case "mnozenje":
            $rezultat = $prviBroj * $drugiBroj;
            break;
        case "dijeljenje":
            if ($drugiBroj != 0) {
                $rezultat = $prviBroj / $drugiBroj;
            } else {
                $rezultat = "Greška: Dijeljenje s nulom nije dozvoljeno.";
            }
            break;
        default:
            $rezultat = "Nepoznata operacija.";
    }
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kalkulator s operacijama zbrajanja, oduzimanja, množenja i dijeljenja koristeći PHP Switch.">
    <meta name="keywords" content="kalkulator, switch, php, operacije">
    <title>Kalkulator (Switch naredba)</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* Polja za unos lijevo */
            margin-bottom: 20px;
            max-width: 300px; /* Ograničenje širine forme */
            margin-left: auto;
            margin-right: auto; /* Centriranje forme */
        }
        .operacije {
            text-align: center; /* Gumbi centrirani */
            margin-top: 10px;
        }
        .operacija {
            display: inline-block;
            margin: 5px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
            cursor: pointer;
        }
        .rezultat {
            margin-top: 20px;
            padding: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            max-width: 200px; /* Ograničenje širine */
            margin-left: auto;
            margin-right: auto; /* Centriranje */
        }
        input {
            padding: 5px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Kalkulator (Switch naredba)</h1>
    <form method="post" action="">
        <label for="prvi_broj">Upiši prvi broj *:</label>
        <input type="number" step="0.01" id="prvi_broj" name="prvi_broj" required>

        <label for="drugi_broj">Upiši drugi broj *:</label>
        <input type="number" step="0.01" id="drugi_broj" name="drugi_broj" required>

        <div class="operacije">
            <p>Odaberi operaciju:</p>
            <button type="submit" name="operacija" value="zbrajanje" class="operacija">+</button>
            <button type="submit" name="operacija" value="oduzimanje" class="operacija">-</button>
            <button type="submit" name="operacija" value="mnozenje" class="operacija">*</button>
            <button type="submit" name="operacija" value="dijeljenje" class="operacija">/</button>
        </div>
    </form>

    <?php if ($rezultat !== null): ?>
        <div class="rezultat">
            <strong>Rezultat:</strong> <?php echo $rezultat; ?>
        </div>
    <?php endif; ?>
</body>
<!-- Dokument: php-kalkulator-switch-forma-pozicija.php -->
</html>
