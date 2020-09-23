<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/css/index.css">
    <script src="estilos/js/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="estilos/js/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="estilos/js/js/popper.min.js" type="text/javascript"></script>
    <title>Test Sintomas</title>
</head>

<body>
    <?php
    include 'preguntas.php';
    include 'testsintomasbackend.php';
    ?>
    <div id="content">
        <h6>¿Has tenido alguno de los siguientes síntomas en las últimas 24 horas?</h6>
        <br />
        <br />
        <form method="POST">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Si</th>
                        <th scope="col">No</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($consultapreguntas as $elemento) { ?>
                        <tr>
                            <td><?php echo $elemento['pregunta'] ?></td>
                            <td>
                                <div class="form-check checkbox-rounded checkbox-living-coral-filled mb-2">
                                    <input type="checkbox" class="form-check-input filled-in" id="vehiculo" name="si<?php echo $elemento["idtest"] ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-check checkbox-rounded checkbox-living-coral-filled mb-2">
                                    <input type="checkbox" class="form-check-input filled-in" id="moto" checked name="no">
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary" name="registrartest">Finalizar</button>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('input[type="checkbox"]').on('change', function() {
                var checkedValue = $(this).prop('checked');
                // uncheck sibling checkboxes (checkboxes on the same row)
                $(this).closest('tr').find('input[type="checkbox"]').each(function() {
                    $(this).prop('checked', false);
                });
                $(this).prop("checked", checkedValue);

            });
        });
    </script>
    <script>
        if (window.performance) {
            console.info("window.performance works fine on this browser");
        }
        console.info(performance.navigation.type);
        if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
            location.href = "index.php";
            localStorage.setItem('validar', '0');
        }
        window.onbeforeunload = function() {
            localStorage.setItem('validar', '0');
        };
    </script>
    <script>
        // Refresh Rate is how often you want to refresh the page 
        // bassed off the user inactivity. 
        var refresh_rate = 900; //<-- In seconds, change to your needs
        var last_user_action = 0;
        var has_focus = false;
        var lost_focus_count = 0;
        // If the user loses focus on the browser to many times 
        // we want to refresh anyway even if they are typing. 
        // This is so we don't get the browser locked into 
        // a state where the refresh never happens.    
        var focus_margin = 10;

        // Reset the Timer on users last action
        function reset() {
            last_user_action = 0;
            console.log("Reset");
        }

        function windowHasFocus() {
            has_focus = true;
        }

        function windowLostFocus() {
            has_focus = false;
            lost_focus_count++;
            console.log(lost_focus_count + " <~ Lost Focus");
        }

        // Count Down that executes ever second
        setInterval(function() {
            last_user_action++;
            refreshCheck();
        }, 1000);

        // The code that checks if the window needs to reload
        function refreshCheck() {
            var focus = window.onfocus;
            if ((last_user_action >= refresh_rate && !has_focus && document.readyState == "complete") || lost_focus_count > focus_margin) {
                location.href = "index.php"; // If this is called no reset is needed
                localStorage.setItem('validar', '0');
                reset(); // We want to reset just to make sure the location reload is not called.
            }

        }
        window.addEventListener("focus", windowHasFocus, false);
        window.addEventListener("blur", windowLostFocus, false);
        window.addEventListener("click", reset, false);
        window.addEventListener("mousemove", reset, false);
        window.addEventListener("keypress", reset, false);
        window.addEventListener("scroll", reset, false);
        document.addEventListener("touchMove", reset, false);
        document.addEventListener("touchEnd", reset, false);
    </script>
    <script type="text/javascript">
        var valid = localStorage.getItem("validar");
        if (valid <= 0) {
            location.href = "index.php";
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>