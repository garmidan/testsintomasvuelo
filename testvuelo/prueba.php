<!DOCTYPE html>
<html>

<head>
    <title>Loading</title>
</head>

<body>
    <div id="loading"><button type="submit">aca para no refrescar</button></div>

    <script>
        if (window.performance) {
            console.info("window.performance works fine on this browser");
        }
        console.info(performance.navigation.type);
        if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
            location.href = "index.php";
            localStorage.setItem('validar', '0');
        }
        window.onbeforeunload = function () {
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
</body>

</html>