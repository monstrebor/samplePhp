<?php include "request/read.php";
include "config.php";
$members = read($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/member.css">
    <title>View | Read Members</title>
</head>

<body>
    <?php
    if (isset($_GET['success'])) {
        echo '<div id="success-message" style="color: green; font-size: 40px; text-align: left; font-weight: bolder; margin-bottom: 10px;">' . htmlspecialchars($_GET['success']) . '</div>';
    }

    if (isset($_GET['error'])) {
        echo '<div id="error-message" style="color: red; font-size: 40px; text-align: left; font-weight: bolder; margin-bottom: 10px;">' . htmlspecialchars($_GET['error']) . '</div>';
    }
    ?>

    <a style="font-size: x-large; font-weight: bold; text-decoration: none;" href="create.php">Create?</a>

    <?php if ($members != 0) { ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($members as $member) {   ?>
                    <tr>
                        <td> <?= $member['id'] ?> </td>
                        <td> <?= $member['first_name'] ?> </td>
                        <td> <?= $member['last_name'] ?> </td>
                        <td> <?= $member['email'] ?> </td>
                        <td>
                            <a style="border-radius: 10px; padding: 5px; 
                            background-color: blue; text-decoration: none; 
                            font-weight: bolder; color: white;"
                                href="update.php?id=<?= $member['id'] ?>">Update</a>
                            <form method="POST" action="request/delete.php" onsubmit="return confirmDelete()" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $member['id'] ?>">
                                <button type="submit" style="border-radius: 10px; padding: 5px; 
                            background-color: red; text-decoration: none; 
                            font-weight: bolder; color: white;">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p style="color: red;" class="error">ERROR: No data found in the Database.</p>
    <?php } ?>

    <script src="script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ['success-message', 'error-message'].forEach(id => {
                const message = document.getElementById(id);
                if (message) {
                    setTimeout(() => {
                        message.style.transition = "opacity 0.5s ease-out";
                        message.style.opacity = "0";
                        setTimeout(() => message.style.display = "none", 500);
                    }, 5000);
                }
            });
        });
    </script>
</body>

</html>