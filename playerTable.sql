
$sql = "INSERT INTO players (lastname, firstname, club)
VALUES ('Afobe', 'Benik', 'AFC Bournemouth');";

$sql = "INSERT INTO players (lastname, firstname, club)
VALUES ('Defoe', 'Jermain', 'AFC Bournemouth');";

$sql = "INSERT INTO players (lastname, firstname, club)
VALUES ('King', 'Joshua', 'AFC Bournemouth');";

$sql = "INSERT INTO players (lastname, firstname, club)
VALUES ('Wilson', 'Callum', 'AFC Bournemouth');";

$sql = "INSERT INTO players (lastname, firstname, club)
VALUES ('Giroud', 'Olivier', 'Arsenal');";

$sql = "INSERT INTO players (lastname, firstname, club)
VALUES ('Sánchez', 'Alexis', 'Arsenal');";

$sql = "INSERT INTO players (lastname, firstname, club)
VALUES ('Walcott', 'Theo', 'Arsenal');";

$sql = "INSERT INTO players (lastname, firstname, club)
VALUES ('Welbeck', 'Danny', 'Arsenal');";

$sql = "INSERT INTO players (lastname, firstname, club)
VALUES ('Barnes', 'Ashley', 'Burnley');";

$sql = "INSERT INTO players (lastname, firstname, club)
VALUES ('Wells', 'Nahki', 'Burnley');";

$sql = "INSERT INTO players (lastname, firstname, club)
VALUES ('Wood', 'Chris', 'Burnley');"

if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

/*
0   Afobe, Benik
1   Defoe, Jermain
2   King, Joshua
3   Wilson, Callum
4   Giroud, Olivier
5   Sánchez, Alexis
6   Walcott, Theo
7   Welbeck, Danny
8   Barnes, Ashley
9   Wells, Nahki
10  Wood, Chris
*/