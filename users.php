<?php include "inc/dbh.php" ?>
<?php $q = mysqli_query($conn, "SELECT * FROM users") ?>
<div class="container" style="padding:0px 100px">
    <table class="table">
        <tr>
            <th>NO#</th>
            <th>Username</th>
            <?php $count = 1?>
            <?php while($row = mysqli_fetch_array($q)){ ?>
                <tr>
                    <td><?php echo $count ?></td>
                    <td class="text-start"><?php echo $row['username'] ?></td>
                    <td>
                        <a href="admin.php?q=edit&id=<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            <?php $count++; } ?>
        </tr>
    </table>
</div>