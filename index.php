
<?php
require_once 'config/config.php';

if (isset($_SESSION['user_id'])) {
    header('Location: ' . BASE_URL . '/app/' . $_SESSION['user_role'] . '/index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    requireCsrfToken();

    $login = trim($_POST['login'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($login === '' || $password === '') {
        $error = 'Invalid login credentials';

        logActivity($pdo, null, $login, 'login', 'failed');
    } else {
        $result = loginUser($pdo, $login, $password);

        if ($result === true) {
            logActivity(
                $pdo,
                $_SESSION['user_id'],
                $_SESSION['user_email'],
                'login',
                'success'
            );

            header('Location: ' . BASE_URL . '/app/' . $_SESSION['user_role'] . '/index.php');
            exit;

        } elseif ($result === 'active_session') {
            $error = 'This Account is already logged in on another device';

        } else {
            $error = 'Invalid login credentials';
        }
    }
}
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h2>Login</h2>

    <?php if (!empty($error)): ?>
        <p><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <?php if (isset($_GET['timeout'])): ?>
        <p>Your session has timed out due to inactivity. Please log in again.</p>
    <?php endif; ?>

    <form method="POST">
        <label>Username or Email</label>

        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(generateCsrfToken(), ENT_QUOTES, 'UTF-8') ?>">

        <input type="text" name="login" required>

        <br>
        <br>

        <label>Password</label>
        <input type="password" name="password" required>

        <br><br>

        <button type="submit">Sign In</button>
    </form>

</body>
</html>