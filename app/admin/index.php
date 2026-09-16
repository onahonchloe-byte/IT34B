<?php
require '../../config/config.php';
require '../../config/functions.php';

requireRole('admin');

logActivity(
    $pdo,
    $_SESSION['user_id'];
    $_SESSION['user_email'];
    'view_activity_logs',
    'sucess'
);

//actvity log query#3
$stmt =$pdo->query("
    SELECT *
    FROM activity_logs
    ORDER BY activity_log_created_at DESC
    ");
    
    $activies = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome Admin</h1>
    <a href="../../auth/signout.php">sign out</a>
     <table border="1">
        <thread>
            <tr>
                <th>Record ID</th>
                <th>User ID</th>
                <th>Action</th>
                <th>Status</th>
                <th>IP Address</th>
                <th>User Agent</th>
                <th>Date & Time</th>
            </tr>
        </thread>
        <tbody>
            <?php foreach($activies as $activity):?>
                <tr>
                    <td><?= htmlspecialchars($activity['activity_log_id'])?></td>
                    <td><?= htmlspecialchars($activity['activity_log_id'])?></td>
                    <td><?= htmlspecialchars($activity['activity_log_id'])?></td>
                    <td><?= htmlspecialchars($activity['activity_log_id'])?></td>
                    <td><?= htmlspecialchars($activity['activity_log_id'])?></td>
                    <td><?= htmlspecialchars($activity['activity_log_id'])?></td>
                    <td><?= htmlspecialchars($activity['activity_log_id'])?></td>
                 </tr>

                <?php endforeach; ?>
        </tbody>
            </table>

</body>
</html>