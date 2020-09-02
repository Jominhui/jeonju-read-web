<?php include_once('../lib/lib.php'); ?>
<?php include_once('header.php'); ?>
<div class="list-area">
    <table class="reservation-list">
        <thead>
            <tr class="reservation-list-my">
                <td>작가</td>
                <td>이름</td>
                <td>성별</td>
                <td>나이</td>
                <td>학교</td>
                <td>날짜</td>
                <td>요구사항</td>
                <td>예약여부</td>
                <td>상세보기</td>
            </tr>
        </thead>
        <tbody class="list-res">
            <?php
            $username = $_SESSION['username'];
            $rows = fetchAll("SELECT * FROM reservate WHERE username = '$username'");
            foreach ($rows as $row) {
                ?>
                    <tr class="reservation-list-td">
                        <td><?php echo $row->writer ?></td>
                        <td><?php echo $row->username?></td>
                        <td><?php echo $row->gender?></td>
                        <td><?php echo $row->age?></td>
                        <td><?php echo $row->school?></td>
                        <td><?php echo $row->date?></td>
                        <td class="text-about"><?php echo $row->about?></td>
                        <td><?php echo $row->ready?></td>
                        <td><a href="reservate_read.php?idx=<?php echo $row->idx ?>"><i class="fa fa-arrow-right"></i></a></td>
                    </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php include_once ('footer.php'); ?>