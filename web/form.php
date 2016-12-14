<html>
    <body>
        <form name="form1" action="form.php" method="post">
            name: <input type="text" name="name"/>
            </br>
            password: <input type="password" name="password"/>
            <input type="submit" value="Submit"/>
        </form>
    </body>
</html>

<?php
    print_r($_POST);
?>
