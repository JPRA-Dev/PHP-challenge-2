<?php
?>
<main>
    <h1 class="companylist">Users</h1>
    <div class="containercompanylist">
        <table class="container1companylist">
            <tr>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Group</th>
                <th>E-mail</th>
                <th>Administrator</th>
                <th>Moderator</th>
            </tr>

            <?php $i = 0; foreach ($users as $user) { ?>
                <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                    <td><?= $user->lastname?></td>
                    <td><?= $user->firstname?></td>
                    <td><?= $user->name?></td>
                    <td><?= $user->email?></td>
                    <td><?php echo $userModel->userHasPermission($user->group, 'admin') ? 'Yes' : 'No'; ?></td>
                    <td><?= $userModel->userHasPermission($user->group, 'moderator') ? 'Yes' : 'No' ?></td>
                </tr>
            <?php $i++; } ?>

        </table>
    </div>
</main>


