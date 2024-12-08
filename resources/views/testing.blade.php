<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
        .dropdown-button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 16px;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
        .dropdown-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="dropdown">
    <button class="dropdown-button">Select Vehicle</button>
    <div class="dropdown-content">
        <a href="#">Motorcycle</a>
        <a href="#">Car</a>
        <a href="#">Bicycle</a>
    </div>
</div>

</body>
</html>
