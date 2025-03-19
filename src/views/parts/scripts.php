<!-- External -->

<!-- Bootstrap -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

<!-- Jquery -->
<script src="<?= HREF_APP_DIR ?>/public/jquery_3_7_1.js"></script>

<script src="<?= HREF_JS_DIR ?>/stars.js"></script>
<script src="<?= HREF_JS_DIR ?>/sidebar.js"></script>
<script src="<?= HREF_JS_DIR ?>/modal.js"></script>
<script src="<?= HREF_JS_DIR ?>/form.js"></script>
<script src="<?= HREF_JS_DIR ?>/questionForm.js"></script>

<input type="hidden" id="postDir" value="<?= HREF_APP_DIR ?>/src/php/post.php">

<script>
    $(document).ready(function() {

        $("#sendResults").click(function() {
            submitButtonColorChange(this);
            checkResultsAndSend();
        });

        $("#submitAnswer").click(function() {
            modalSubmitButtonColorChange(this);
            saveAnswer();
        });


    });

    function submitButtonColorChange(elem) {

        $(elem).css("background-color", "white");
        $(elem).css("color", "#024e93");
        $(elem).css("border", "#024e93 solid 1px");

        $(function() {
            setTimeout(function() {
                removeSubmitButtonColorChange(elem);
            }, 200);
        });

    }

    function removeSubmitButtonColorChange(elem) {
        $(elem).css("background-color", "#024e93");
        $(elem).css("color", "white");
        $(elem).css("border", "");
    }

    function modalSubmitButtonColorChange(elem) {

        $(elem).css("background-color", "#024e93");
        $(elem).css("color", "white");
        $(elem).css("border", "white solid 1px");

        $(function() {
            setTimeout(function() {
                removeModalSubmitButtonColorChange(elem);
            }, 200);
        });

    }

    function removeModalSubmitButtonColorChange(elem) {
        $(elem).css("background-color", "white");
        $(elem).css("color", "#024e93");
        $(elem).css("border", "");
    }

</script>