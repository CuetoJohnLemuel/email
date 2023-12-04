<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em;
        }

        section {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        .form-textbox {
            margin-bottom: 20px;
        }

        .submit {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit:hover {
            background-color: #45a049;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<header>
    <h1>Send File</h1>
</header>

<section>
    <?php foreach ($users as $us): ?>
        <p>Welcome <?=$us['fullname']; ?>! You can now send a file.</p>

        <form action="<?php echo site_url('uploadfile');?>" method="POST" class="signup-form" enctype="multipart/form-data">
            <div class="form-textbox">
                <label for="sender">Enter the sender of the Email</label>
                <input type="text" name="sender" id="sender" value="<?=$us['email']; ?>" readonly>
            </div>
            <div class="form-textbox">
                <label for="receiver">Enter the receiver of the Email</label>
                <input type="text" name="receiver" id="receiver" required>
            </div>
            <div class="form-textbox">
                <label for="subject">Enter the subject</label>
                <input type="text" name="subject" id="subject" required>
            </div>
            <div class="form-textbox">
                <label for="content">Enter the content</label>
                <textarea name="content" id="content" rows="4" required></textarea>
            </div>
            <div class="form-textbox">
                <label for="userfile">Choose file to upload</label>
                <input type="file" name="userfile" class="form-control mb-3" accept="image/png, image/gif, image/jpeg" required>
            </div>
            <div class="form-textbox">
                <input type="submit" class="submit" value="Upload" />
            </div>
        </form>
    <?php endforeach; ?>

    <button><a href="<?php echo site_url('logout');?>">Logout</a></button>
</section>

</body>
</html>
