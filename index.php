<?php
$url= "https://jsonplaceholder.typicode.com/posts";

$response=file_get_contents($url);

$data=json_decode($response,true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data posts(PHP)</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>data post dari jsonplaceholder API(PHP)</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>body</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $post):?>
                <tr>
                    <td><?php echo $post['id'];?></td>
                    <td><?php echo htmlspecialchars($post['title']);?></td>
                    <td><?php echo htmlspecialchars($post['body']);?></td>
                </tr>
                <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>