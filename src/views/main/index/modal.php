<section class="modal hidden">
    <div class="modal-content">
        <header class="titulo modal-info ">
            <h2>Info</h2>
            <button class="info-icon-close">X</button>
        </header>
        <header class="titulo modal-question hidden">
            <h2><?= $izena ?> - GALDERA</h2>
        </header>
    </div>
    <div class="text">
        <p class="modal-info ">
            Ondorengo formularioa osatzen baduzu <b>zozketa batean parte hartuko duzu</b>. Proiektu bakoitzeko balorazio
            bakarra sartzeko aukera izango duzu. Parte hartzeko:
            <br>
            - Zure goierri eskolako emaila idatzi.
            <br>
            - Balorazio bat gehitu: izar kopurua aukeratu. Ezkerretik eskubira 1etik 5 puntura.
            <br><br>
            Zorte on!
        </p>
        <div class="modal-question hidden">
            <div class="question">
                <?= $row["galdera"] ?>
            </div>
            <div class="options">
                <div><input type="radio" name="answer" value="1"> <?= isset($row["option1"]) ? $row["option1"] : "" ?></div>
                <div><input type="radio" name="answer" value="2" checked> <?= isset($row["option2"]) ? $row["option2"] : "" ?></div>
                <div><input type="radio" name="answer" value="3"> <?= isset($row["option3"]) ? $row["option3"] : "" ?></div>
            </div>
        </div>

        <div class="modal-question submitButton hidden">
            <button id="submitAnswer">Erantzun eta parte hartu</button>
        </div>
    </div>
</section>
<div class="overlay hidden"></div>