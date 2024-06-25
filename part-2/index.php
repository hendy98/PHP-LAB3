<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Class Registration</title>
    <style>
        .cms {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Application name: PHP class registration</h1>
    <?php require 'students.php'; ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Track</th>
        </tr>
        <?php foreach ($students as $student) : ?>
            <tr class="<?php echo $student['track'] == 'CMS' ? 'cms' : ''; ?>">
                <td><?php echo htmlspecialchars($student['name']); ?></td>
                <td><?php echo htmlspecialchars($student['email']); ?></td>
                <td><?php echo htmlspecialchars($student['track']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
