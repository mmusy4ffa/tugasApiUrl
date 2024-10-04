<?php
$url= "https://jsonplaceholder.typicode.com/comments";

$response=file_get_contents($url);

$data=json_decode($response,true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data comments(PHP)</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>data comments dari jsonplaceholder API(PHP)</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>body</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $comments):?>
                <tr>
                    <td><?php echo $comments['id'];?></td>
                    <td><?php echo htmlspecialchars($comments['name']);?></td>
                    <td><?php echo htmlspecialchars($comments['email']);?></td>
                    <td><?php echo htmlspecialchars($comments['body']);?></td>
                </tr>
                <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>