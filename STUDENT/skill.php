<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

include '../connection.php';

if (isset($_POST['allocate'])) {
    $id = $_POST['facultyid'];
    $sql = "INSERT INTO `pmas`.`request` (`request_id`, `s_id`, `f_id`) VALUES ('', '$user', '$id');";
    mysqli_query($conn, $sql);
    $conn->close();
    header('Location:skill.php');
}




if (empty($_SESSION['Email'])) {
    header("location:index.php");
} else {
    if ($role == "Admin") {
?>

        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">

        <head>
            <link rel="stylesheet" type="text/css" href="../index.css">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


            <title>Project Management System</title>
        </head>
        <div>

            <body>

            <?php
            header('Location:../Admin.php');
        } elseif ($role == "Faculty") {
            header('Location:../Admin.php');
            ?>

            <?php
        } else {
            ?>
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">

                <head>
                    <link rel="stylesheet" type="text/css" href="../index.css">
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <title>Project Management System</title>
                </head>
                <div>

                    <body>
                        <font class="heading">Project Managenent System</font>
                        <br /><br /><br />
                        <ul>
                            <li><a href="project.php">Project</a></li>

                            <li><a href="skill.php">View Skill Matrix</a></li>

                            <li><a href="mail.php">Mail</a></li>

                            <li><a href="../logout.php">Logout</a></li>

                        </ul>
                    <?php
                }
                    ?>
                <?php
            }
                ?>
                <form method="post" action="skill.php">
                    <div class="login">
                        <table>
                        <tr><font>&nbsp;</font></tr>
                            <tr>
                                <?php
                                include '../connection.php';
                                $sql = "select f_id from faculty";
                                $result =  mysqli_query($conn, $sql)
                                ?> <select name="faculty" style="width: 208px; height: 2em; font-size: 15px;">
                                    <option selected="selected">
                                        <h3>Supervisors</h3>
                                    </option>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $category = $row['f_id'];
                                    ?>
                                        <option selected="selected" value="<?php echo $category; ?>"><?php echo $category; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <tr><font>&nbsp;</font></tr>
                                <tr>
                                <th colspan="1" scope="col">
                                <td><input class="submit" type="submit" name="asses" value="View Skill Matrix" />
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                <form method="post" action="skill.php">
                    <table cellspacing="5" border="0" align="center">
                        <?php
                        if (isset($_POST['asses'])) {
                            $fid = $_POST['faculty'];
                            echo "<tr>"; ?>
                            <td>Faculty ID</td>
                            <td><input type="text" name="facultyid" readonly value="<?php echo $fid; ?>" readonly></td>
                            <?php
                            echo "</tr>";
                            $sql1 = "select * from faculty where f_id ='$fid' ";
                            $rec = mysqli_query($conn, $sql1);
                            while ($std = mysqli_fetch_assoc($rec)) {
                                echo "<tr>";
                                echo "<td>" . "Name" . "</td>";
                                echo "<td>" ?> <input type="text" name="stid" readonly value="<?php echo $std['name']; ?>" />
                                
                                <?php "</td>";
                                                                                                                                                                                                                            echo "</tr>";
                                                                                                                                                                                                                            echo "<tr>";
                                                                                                                                                                                                                            echo "<td>" . "Qualification" . "</td>";
                                                                                                                                                                                                                            echo "<td>" ?> <input type="text" name="faqu" readonly value="<?php echo $std['qualification']; ?>" /> <?php "</td>";
                                                                                                                                                                                                                                        echo "</tr>";
                                                                                                                                                                                                                                        echo "<tr>";
                                                                                                                                                                                                                                        echo "<td>" . "Domain" . "</td>";
                                                                                                                                                                                                                                        echo "<td>" ?> <input type="text" name="fad" readonly value="<?php echo $std['domain']; ?>" /> <?php "</td>";
                                                                                                                                                                                                                                        echo "</tr>";
                                                                                                                                                                                                                                        echo "<tr>";
                                                                                                                                                                                                                                        echo "<td>" . "Research" . "</td>";
                                                                                                                                                                                                                                        echo "<td>" ?> <input type="text" name="far" readonly value="<?php echo $std['research']; ?>" /> <?php "</td>";
                                                                                                                                                                                                                                    echo "</tr>";
                                                                                                                                                                                                                                    echo "<tr>";
                                                                                                                                                                                                                                    echo "<td>" . "Others" . "</td>";
                                                                                                                                                                                                                                    echo "<td>" ?> <input type="text" name="fao" readonly value="<?php echo $std['others']; ?>" /> <?php "</td>";
                                                                                                                                                                                                                                    echo "</tr>";
                                                                                                                                                                                                                                    echo "<tr>";
                                                                                                                                                                                                                                    echo "<td></td>";
                                                                                                                                                                                                                                    echo "<td>" ?> <input type="submit" name="allocate" readonly value="Request For Allocate" /> <?php "</td>";
                                                                                                                                                                                                                                echo "</tr>";
                                                                                                                                                                                                                            }
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                ?>

                    </table>
                </div>
                </form>
                                                                                                                                                                                                                    </body>

                                                                                                                                                                                                                    </html>