<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open popup</title>
    <style>
        .hide{
            display:none;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <button type="submit" onclick="openPopup()">Open PopUp</button>
        <div id="formDiv" class="hide">
            <form action="" >
                <div class="name">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name">
                </div><br><br>

                <div>
                    <label for="languages">Select Language: </label>
                        <select name="languages" id="languages">
                            <option value="">Select Language</option>
                            <option value="marathi">Marathi</option>
                            <option value="hindi">Hindi</option>
                            <option value="english">English</option>
                        </select>
                </div><br><br>

                <div>
                    <label for="msg">Message(Optional):</label>
                    <textarea name="msg" id="msg">Message</textarea>
                </div>
            
            </form>
        </div>
    
    <script>
        function openPopup()
        {
                $('#formDiv').removeClass('hide');
            
        }
    </script>
</body>
</html>