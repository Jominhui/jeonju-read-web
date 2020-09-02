<?php include_once('../lib/lib.php');?>
<?php include_once('header.php');?>
<div class="list-area">
    <table class="reservation-list">
        <thead>
        <tr class="reservation-list-admin">
            <td>책사진</td>
            <td>책제목</td>
            <td>작가</td>
            <td>타겟</td>
            <td>날짜</td>
            <td>시간</td>
            <td>수정</td>
        </tr>
        </thead>
        <tbody class="list-res">
        <?php
        $rows = fetchAll("SELECT * FROM meet");

        foreach ($rows as $row) {
            ?>
            <tr>
                <td> <?php if($row->Photo):?>
                    <img class="book-img-list" src="../uploads/<?=$row->Photo?>" alt="<?=$row->Photo?>">
                <?php endif;?></td>
                <td><?php echo $row->Title ?></td>
                <td><?php echo $row->Writer?></td>
                <td><?php echo $row->Target?></td>
                <td><?php echo $row->MDate?></td>
                <td><?php echo $row->MTime?></td>
                <td><a href="./Read.php?idx=<?php echo $row->idx ?>"><i class="fa fa-arrow-right"></i></a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <a href="Add_festival.php">
        <div class="registe"> + </div>
    </a>
</div>
<?php include_once ('footer.php'); ?>