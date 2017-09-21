<html>

<head>
    <style type="text/css">
        #gameBox {
            max-width: 100%;
            padding-left: 30px;
            border: 3px solid #FF0000;
        }

        #team-left,
        #team-right {
            border: 3px solid #FF0000;
            max-width: 40%;
        }

        #team-left {
            float: left;
        }

        #team-right {
            float: right;
        }
    </style>
</head>

<body>

    <h2></h2>
    <div> Round + week number </div>
    <div>Entries by 7:45pm, Tuesday 19th September 2017 </div>

    <div id="gameBox">
        <div id="team-left"> Team 1</div>

        <div id="team-right"> Team 2</div>
    </div>

    <form method="post">
        <input type="text" name="username">
        <input type="text" name="password">
        <input type="text" name="newUsername">
        <input type="text" name="newPassword">
        <input type="text" name="newPassword2">
        <input type="text" name="newDOB">
    
    </form>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" <br/><br> Player Selections:
        <input type="text" name="p1">
        <input type="text" name="p2">
        <input type="text" name="p3">
        <input type="text" name="p4">
        <input type="text" name="p5">
        <input type="text" name="p6">

        <input type="submit" name="submit" value="Submit">
    </form>

</body>

</html>
