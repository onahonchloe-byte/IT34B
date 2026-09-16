<?php

require_once ('config/config.php');

$user_id = "root" ?? null;
$user_email = "root" ?? null;

$buttons = [
    'Login',
    'Logout',
    'Create Record', 
    'Update Record',
    'Delete Record',
    'View Record',
    'Upload File',
    'Dowload',
    'Search',
    'Generate Report',

];

?>

<table border="1" cellpadding="10">
    <tr>
        <th>Action</th>
        <th>Text</th>
    </tr>
    <?php foreach ($buttons as $button): ?>
        <tr>
            <td><?= htmlspecialchars($button) ?>?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="action" 
                      value="<?=  htmlspecialchars($button) ?>"
                      >
                    <button type="submit">Test</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $action = $_POST['acttion'] ?? 'test_activity';

    $status = random_int(0,1) === 1? 'success' : 'failure';

    $success = log_Activity(
        $pdo,
        $user_id,
        $user_email,
        $action,
        $status
    );

    if($success){
        echo "<p>Activity: " . htmlspecialchars($action) .
        "Log inserted successfully </p>";
    }else{
        echo "<p>Failed to insert activity log</p>";
    }
}
?>