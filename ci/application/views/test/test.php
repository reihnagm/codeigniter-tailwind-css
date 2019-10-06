<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form id="form-test">
            <?php  for($i = 1; $i <= 10; $i++): ?>
                <input type="checkbox" name="name_<?php echo $i; ?>">
            <?php endfor; ?>
            <input type="submit" name="submit" value="submit">
        </form>

        <!-- BASE URL -->
        <input type="hidden" name="base_url" value="<?php echo base_url() ?>">

        <!-- JQUERY JS -->
        <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>

        <script type="text/javascript">
            $("#form-test").submit(function(e) {
                e.preventDefault()

                console.log($(this).serialize())
            })
            // function submit(evt)
            // {
            //
            //     let base_url = $("[name=base_url]").val();
            //     let form_test = $("#form-test").serialize();
            //     console.log(form_test, base_url);
            //     // $.post(base_url+"test/submit", form_test, (data) => {
            //     //     console.log(data)
            //     // })
            // }
        </script>
    </body>
</html>
