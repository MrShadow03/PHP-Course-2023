<?php
include 'helper/session.php';
include 'helper/db.php';
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'inter', sans-serif;
    }

    /* Define Material Design colors */
    :root {
        --md-teal-500: #009688;
        --md-blue-500: #2196f3;
        --md-teal-100: #0d47a1;
    }

    /* Apply Material Design styles to navigation */
    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: var(--md-teal-500);
        color: white;
        padding: 1em;
        width: 100%;
    }

    nav ul {
        width: 100%;
        display: flex;
        list-style: none;
        justify-content: space-between;
    }

    nav a {
        color: white;
        text-decoration: none;
    }

    nav a:hover {
        text-decoration: underline;
    }

    /* Apply Material Design styles to table */
    .table_title {
        color: var(--md-blue-500);
        font-size: 2em;
        margin-top: 2em;
        margin-bottom: 1em;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    thead th {
        background-color: var(--md-blue-500);
        color: white;
        font-weight: bold;
        padding: 0.5em;
        text-align: left;
    }

    tbody td {
        border-bottom: 1px solid #ccc;
        padding: 0.5em;
    }

    tbody tr:last-child td {
        border-bottom: none;
    }

    tbody tr:hover {
        background-color: var(--md-teal-500);
        color: white;
    }

    tbody tr:hover td {
        border-bottom-color: white;
    }
</style>

<body>
    <!-- user dashboard with username, logout button and link to profile page -->
    <nav>
        <ul>
            <li>Welcome, <?php echo $_SESSION['name']; ?></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="controller/LogoutController.php">Logout</a></li>
        </ul>
    </nav>
    <h1 class="table_title">Users</h1>
    <?php
    $sql = "SELECT name FROM users WHERE age >= 32";
    $query = mysqli_query($connection, $sql);

    $all_users = mysqli_fetch_all($query);

    echo '<pre>';
    print_r($all_users);
    echo '</pre>';

    //Select all users from database and display them in a table
    // $sql = "SELECT * FROM users";
    //Insert a new user into the database
    // $sql = "INSERT INTO users (name, email, password, age) VALUES ('John Doe', '
    ?>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td>jdoe@gmail.com</td>
                <td>32</td>
            </tr>
            <tr>
                <td>Mr. Miraz</td>
                <td>m@gmail.com</td>
                <td>32</td>
            </tr>
        </tbody>
    </table>

</body>

</html>