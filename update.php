<?php
include __DIR__ . "/request/read.php";
include __DIR__ . "/config.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : null;
$member = readById($conn, $id);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $member = readById($conn, $id);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Members</title>
    </head>

    <body>
        <fieldset style="width: 400px;">
            <div class="form-holder">
                <h1 style="text-align: center">Update Members</h1>
                <form action="request/update.php" method="POST">
                    <a href="members_index.php">View | Read</a>
                    <br><br>
                    <?php if (isset($_GET["error"])) { ?>
                        <p id="message" class="error" style="font-size: xx-large; color: red; text-align: center;">
                            <?= htmlspecialchars($_GET["error"]) ?>
                        </p>
                    <?php } else if (isset($_GET["success"])) { ?>
                        <p id="message" class="success" style="font-size: xx-large; color: green; text-align: center;">
                            <?= htmlspecialchars($_GET["success"]) ?>
                        </p>
                    <?php } ?>
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" value="<?= $member['first_name'] ?>">
                    <br><br>
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" value="<?= $member['last_name'] ?>">
                    <br><br>
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="<?= $member['email'] ?>">
                    <input type="hidden" name="id" value="<?= $member['id'] ?>">
                    <br><br>
                    <button class="btn" type="submit">Update</button>
                </form>
            </div>
        </fieldset>


        <script>
            document.addEventListener("DOMContentLoaded", function() {
                setTimeout(function() {
                    var message = document.getElementById("message");
                    if (message) {
                        message.style.transition = "opacity 0.5s ease-out";
                        message.style.opacity = "0";
                        setTimeout(() => message.style.display = "none", 500);
                    }
                }, 5000);
            });
        </script>
    </body>

    </html>
<?php } else {
    header("Location: ../member_index.php");
} ?>