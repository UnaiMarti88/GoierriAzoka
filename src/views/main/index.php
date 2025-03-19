<?php

$env = parse_ini_file(__DIR__ . '/../../../.env');

$APP_DIR = $env["APP_DIR"];

require_once($_SERVER["DOCUMENT_ROOT"] . $APP_DIR . '/src/views/parts/layouts/layoutTop.php'); //Aplikazioaren karpeta edozein lekutatik atzitzeko.

require_once(APP_DIR . '/src/views/parts/sidebar.php');

require_once(APP_DIR  . '/src/views/parts/header.php');

//DBra joan
require_once(APP_DIR . '/src/php/connect.php');

//scanned aldagaia badator estekan formularioa erakutsiko du
$scanned = true;

$kurtsoa = isset($_GET["kurtsoa"]) ? $_GET["kurtsoa"] : 1;

$result = getZikloa($kurtsoa);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    //Ekarri ID-an datorren kurtsoa

    //DBtik ekarritako $row horrekin inprimatu: laburbildura, kurtsoaren izena, 

    $laburbildura = $row["laburbildura"]; //Hau DBko $row-etik atera behar da
    $izena = $row["izena"]; //Hau DBko $row-etik atera behar da
    $multimedia_type = $row["multimedia_type"]; //Hau DBko $row-etik atera behar da
    $bideo_esteka = $row["bideo_esteka"]; //Hau DBko $row-etik atera behar da
    $argazki_esteka = $row["argazki_esteka"]; //Hau DBko $row-etik atera behar da
    $web_esteka = $row["web_esteka"]; //Hau DBko $row-etik atera behar da
    $active = $row["active"];

    if ($active == 1) {
?>
        <div class="middle_text">
            <h1><span id="laburbiLdura_base_datos">
                    <?= $izena ?>
                </span>
            </h1>
            <h2>(<?= $laburbildura ?>)</h2>
            <br>
            <div>
                <?php
                if (!is_null($multimedia_type) && $multimedia_type == Constants::YT_VIDEO) {
                ?>
                    <iframe width="560" height="315" src="<?= $bideo_esteka ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <?php
                } else if (!is_null($multimedia_type) && $multimedia_type == Constants::LOCAL_IMAGE) {
                ?>
                    <img class="mainImage" src="<?= HREF_APP_DIR ?>/public/<?= $argazki_esteka ?>" alt="argazkia">
                <?php
                } else if (!is_null($multimedia_type) && $multimedia_type == Constants::LOCAL_VIDEO) {
                ?>
                    <video class="mainImage" controls>
                        <source src="<?= HREF_APP_DIR ?>/public/<?= $bideo_esteka ?>" type="video/mp4" />
                    </video>
                <?php
                } else if (!is_null($multimedia_type) && $multimedia_type == Constants::DEFAULT_IMAGE) {
                ?>
                    <img class="mainImage" src="<?= HREF_APP_DIR ?>/public/goierriEskolaHandia.jpg" alt="argazkia">
                <?php
                }
                ?>
            </div>
            <div>
                <span class="goierri_link">
                    <a href="<?= $web_esteka ?>" target="_blank">
                        Ziklo honi buruzko informazio gehiago
                    </a>
                </span>
            </div>
            <?php
            if ($scanned) {
            ?>
                <div class="middle_items form_div">
                    <div id="errorMessage">
                        <ul>
                            <li class="hidden" id="emailError">Zure eskolako emaila jarri behar duzu.</li>
                            <li class="hidden" id="valorationError">Balorazio bat gehitzea derrigorrezkoa da.</li>
                            </ol>
                    </div>
                    <div class="correctlySaved mainMessage hidden">
                        <p>
                            Zure erantzuna ongi gorde da. Mila esker parte hartzeagatik!
                        </p>
                    </div>
                    <div class="alreadyAnswered mainMessage hidden">
                        <p>
                            Dagoeneko parte hartu duzu ziklo honetako galderan. Eskerrik asko!
                        </p>
                    </div>
                    <input type="hidden" id="courseId" value="<?= $kurtsoa ?>" />
                    <div class="form">
                        <label for="email">Email:<span class="asterisco">*</span></label>
                        <input type="email" name="email" id="email" placeholder="xxx_xxx_xxx@goierrieskola.org" pattern="(([a-zA-Z]{3}_[a-zA-Z]{3}_)([a-zA-Z]{3})?(_[0-9]{4})?|[a-z]{5,})@(goierrieskola\.org|goierrieskola\.eus)$" required>
                        <br>
                        <label for="balorazioa">Balorazioa<span class="asterisco" id="balorazioa">*</span>:
                            <i id="info-icon" class="fa fa-info-circle"></i>

                            <div class="rating">
                                <span class="star" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star" data-value="3">&#9733;</span>
                                <span class="star" data-value="4">&#9733;</span>
                                <span class="star" data-value="5">&#9733;</span>
                            </div>
                            <div id="ratingResult"></div>
                            <div class="hidden" id="ratingValue"></div>
                        </label>

                        <?php
                        require_once(APP_DIR  . '/src/views/main/index/modal.php');
                        ?>

                        <br>
                        <div class="middle_text">
                            <button type="submit" id="sendResults">Bidali</button>
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="mainMessage qr_explanation">
                    <p>
                        Galdera erantzuteko QR-a irakurri behar duzu mugikorrarekin. Animatu eta parte hartu!
                    </p>
                </div>
            <?php
            }
            ?>

        </div>

        </div>

        <?php
        if (!is_null($multimedia_type) && $multimedia_type == Constants::DEFAULT_IMAGE) {
        ?>
        <!-- Defektuzko argazkia badauka beheran okupatu egingo du. -->
        <div class="botomSpace"></div>
<?php
        }
    } else {
        echo "Barkatu eragozpenak. Arazo bat gertatu da.";
        echo "<br>";
        echo "<br>";
    }
}
require_once(APP_DIR  . '/src//views/parts/layouts/layoutBottom.php');
?>