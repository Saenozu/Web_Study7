<?php
include('./db.php');

$search_target = $_GET['target'];
$search_keyword = $_GET['keyword'];

if (isset($search_keyword)) {
    if ($search_target == 'title')
        $query = "SELECT * FROM FreeBoard_Post WHERE $search_target LIKE \"%$search_keyword%\" ORDER BY no DESC";
    else if ($search_target == 'content')
        $query = "SELECT * FROM FreeBoard_Post WHERE $search_target LIKE \"%$search_keyword%\" ORDER BY no DESC";
    else if ($search_target == 'user')
        $query = "SELECT * FROM FreeBoard_Post WHERE $search_target LIKE \"%$search_keyword%\" ORDER BY no DESC";
    else
        $query = "SELECT * FROM FreeBoard_Post WHERE title LIKE \"%$search_keyword%\" OR content LIKE \"%$search_keyword%\" OR user LIKE \"%$search_keyword%\" ORDER BY no DESC";
}

if ($result = mysqli_query($conn, $query)) {
    while($row = mysqli_fetch_array($result))
        print_r($row);
}
?>