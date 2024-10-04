<?php
$url = "https://jsonplaceholder.typicode.com/comments";
$response = file_get_contents($url);
$data = json_decode($response, true);

$filter_id = '';
$filter_name = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filter_id = isset($_POST['filter_id']) ? intval($_POST['filter_id']) : '';
    $filter_name = isset($_POST['filter_name']) ? $_POST['filter_name'] : '';
}

$filtered_data = array_filter($data, function ($comment) use ($filter_id, $filter_name) {
    return (!$filter_id || $comment['id'] == $filter_id) &&
        (!$filter_name || stripos($comment['name'], $filter_name) !== false);
});
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Comments (PHP)</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Data Comments dari JSONPlaceholder API (PHP)</h1>

    <form method="POST" action="">
        <label for="filter_id">Filter by ID:</label>
        <input type="number" name="filter_id" id="filter_id" value="<?php echo htmlspecialchars($filter_id); ?>">

        <label for="filter_name">Filter by Name:</label>
        <input type="text" name="filter_name" id="filter_name" value="<?php echo htmlspecialchars($filter_name); ?>">

        <input type="submit" value="Filter">
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Body</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filtered_data as $comment): ?>
                <tr>
                    <td><?php echo $comment['id']; ?></td>
                    <td><?php echo htmlspecialchars($comment['name']); ?></td>
                    <td><?php echo htmlspecialchars($comment['email']); ?></td>
                    <td><?php echo htmlspecialchars($comment['body']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>