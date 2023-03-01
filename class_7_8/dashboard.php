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

    /* tbody tr:hover {
        background-color: var(--md-teal-500);
        color: white;
    }

    tbody tr:hover td {
        border-bottom-color: white;
    } */
    .btn{
        padding: 0.5em 1em;
        border: none;
        border-radius: 5px;
        color: white;
        background-color: var(--md-teal-100);
        cursor: pointer;
        text-decoration: none;
        font-size: 14px;
    }
    .btn:hover{
        background-color: var(--md-teal-500);
    }
    .btn-danger{
        background-color: #f44336;
    }
    .btn-danger:hover{
        background-color: #d32f2f;
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
    $sql = "SELECT * FROM users";
    $query = mysqli_query($connection, $sql);
    // $all_users = mysqli_fetch_array($query);

    // echo '<pre>';
    // while($row = mysqli_fetch_assoc($query)){
    //     print_r($row);
    // }
    // echo '</pre>';

    ?>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Photo</th>
                <th>Age</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($query)){ ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <img src="./storage/<?php echo $row['photo']; ?>" alt="" width="50">
                    </td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td>
                        <a href="./edit.php/?id=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="./delete.php/?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this user?')" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>