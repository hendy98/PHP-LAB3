<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAST_BIS Class Registration</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body>
    <?php
    // Define variables and set to empty values
    $nameErr = $emailErr = $genderErr = $agreeErr = "";
    $name = $email = $gender = $agree = $group = $classdetails = "";
    $courses = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }

        if (empty($_POST["agree"])) {
            $agreeErr = "You must agree to terms";
        } else {
            $agree = test_input($_POST["agree"]);
        }

        $group = test_input($_POST["group"]);
        $classdetails = test_input($_POST["classdetails"]);
        if (isset($_POST["courses"])) {
            $courses = $_POST["courses"];
        }

        if ($name && $email && $gender && $agree && !$nameErr) {
            echo "<h2>Your given values are as:</h2>";
            echo "Name: " . $name . "<br>";
            echo "E-mail: " . $email . "<br>";
            echo "Group #: " . $group . "<br>";
            echo "Class details: " . $classdetails . "<br>";
            echo "Gender: " . $gender . "<br>";
            echo "Your courses are: " . implode(", ", $courses) . "<br>";
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h1>Application name: AAST_BIS class registration</h1>
    <p><span class="error">* Required field.</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Name: <input type="text" name="name" value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        E-mail: <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
        Group #: <input type="text" name="group" value="<?php echo $group;?>">
        <br><br>
        Class details: <textarea name="classdetails" rows="5" cols="40"><?php echo $classdetails;?></textarea>
        <br><br>
        Gender:
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
        <span class="error">* <?php echo $genderErr;?></span>
        <br><br>
        Select Courses:
        <select name="courses[]" multiple>
            <option value="PHP" <?php if (in_array("PHP", $courses)) echo "selected";?>>PHP</option>
            <option value="Java Script" <?php if (in_array("Java Script", $courses)) echo "selected";?>>Java Script</option>
            <option value="MySQL" <?php if (in_array("MySQL", $courses)) echo "selected";?>>MySQL</option>
            <option value="HTML" <?php if (in_array("HTML", $courses)) echo "selected";?>>HTML</option>
        </select>
        <br><br>
        Agree: <input type="checkbox" name="agree" <?php if ($agree) echo "checked";?>>
        <span class="error">* <?php echo $agreeErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
