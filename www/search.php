<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
header('Content-Type: application/json');
error_log("Received POST data: " . print_r($_POST, true));


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$searchData = $_POST;
var_dump($searchData);



$conn = new mysqli('music', 'root', '', 'music');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




$sql = "
select c.name,
(select name from genre g where g.genreid = c.genreid),
(select name from artist a where a.artistid = c.artistid),
(select duration from сharacteristics_music cm where cm.audiofileid = c.audiofileid),
(select t.name from tonality t, сharacteristics_music cm where t.tonalityid = cm.tonality and
cm.audiofileid = c.audiofileid) ,
(select bpm from сharacteristics_music cm where cm.audiofileid = c.audiofileid) ,
(select auditions from сharacteristics_music cm where cm.audiofileid = c.audiofileid) ,
(select presencevoice from сharacteristics_music cm where cm.audiofileid = c.audiofileid),
(select coverpath from audiofiles a where a.audiofileid = c.audiofileid)
from composition c 
where artistid in (select artistid from artist where name like '%".$searchData[1]."%')
and genreid in (select genreid from genre where name like '%".$searchData[2]."%')
and name like '%".$searchData[3]."%'";
$result = $conn->query($sql);



if ($result->num_rows < 0) {
    echo json_encode(array('success' => false, 'error' => 'No results found.'));
}
else{
    $data = array();
    while ($row = mysqli_fetch_row($result))
    {
        $data[] = array(
            'name' => $row[0], 
            'genre' => $row[1],
            'artist' => $row[2],
            'duration' => $row[3],
            'tonality' => $row[4],
            'bpm' => $row[5],
            'auditions' => $row[6],
            'presencevoice' => $row[7],
            'cover' => $row[8]);
    }
    echo json_encode(array('success' => true, 'results' => $data));
}

$conn->close();
}
?>
