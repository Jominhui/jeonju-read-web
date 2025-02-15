<?php
include_once('../lib/lib.php');
include_once('header.php');
$schText = isset($_GET['schText']) ? $_GET['schText'] : "";
?>
<div class="list-area">
    <form id="schFrm" action="festival_manager.php" method="get" class="form-inline">
        <div class="search-group">
            <input type="text" name="schText" required class="form-control" id="reservate-input" value="<?=$schText?>">&nbsp;
            <button type="submit" class="btn btn-primary">검색</button>&nbsp;
            <a href="festival_manager.php" class="btn btn-secondary">검색취소</a>
        </div>
    </form>
    <table class="reservation-list">
        <thead>
        <tr class="reservation-list-my">
            <td>작가</td>
            <td>이름</td>
            <td>성별</td>
            <td>나이</td>
            <td>학교</td>
            <td>날짜</td>
            <td>시간</td>
            <td>요구사항</td>
            <td>예약여부</td>
        </tr>
        </thead>
        <tbody class="list-res">
    <?php
    $sql = "SELECT * FROM reservate";
    if( $schText ) $sql .= " WHERE writer LIKE '%{$schText}%'";
    $rows = fetchAll($sql);

    foreach ($rows as $row) {
        ?>
        <tr>
            <td><?php echo $row->writer ?></td>
            <td><?php echo $row->username?></td>
            <td><?php echo $row->gender?></td>
            <td><?php echo $row->age?></td>
            <td><?php echo $row->school?></td>
            <td><?php echo $row->date?></td>
            <td><?php echo $row->startTime?> ~ <?php echo $row->endTime?></td>
            <td class="text-about"><?php echo $row->about?></td>
            <td><?php if( $row->ready == "대기중" ):?>
                <input type="button" value="<?php echo $row->ready?>" onclick="changeReady(<?=$row->idx?>,'예약중')">
            <?php else: ?>
                예약중
            <?php endif;?></td>
        </tr>
        <?php
    }
    ?>
        </tbody>
    </table>
</div>    

<?php include_once ('footer.php'); ?>