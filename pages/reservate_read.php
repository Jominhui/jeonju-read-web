<?php
    include_once('../lib/lib.php');
    if (isset($_POST['action'])) {
        include_once('../lib/server.php');
    }
    $idx = $_GET['idx'] ?? null;

    $sql = "SELECT * FROM reservate WHERE idx = '{$idx}'";
    $row = fetch($sql);
    include_once('header.php');
?>
<form id="delForm" action="../lib/server.php" method="post">
    <input type="hidden" name="action" id="action" value="res-delete">
    <input type="hidden" name="idx" id="idx" value="<?=$idx?>">
</form>
<div class="read-area">
    <div class="read-image-area">
        <?php if($row->photo):?>
            <img src="../uploads/<?=$row->photo?>" alt="<?=$row->photo?>" width="200" height="200">
        <?php endif;?>
    </div>
    <div class="about-read-area">
        <div class="title-read"><?php echo $row->title ?></div>
        <div class="about-res">Writer : <?php echo $row->writer ?></div>
        <div class="about-res">username : <?php echo $row->username ?></div>
        <div class="about-res">gender : <?php echo $row->gender ?></div>
        <div class="about-res">age : <?php echo $row->age ?></div>
        <div class="about-res">school : <?php echo $row->school ?></div>
        <div class="about-res">date : <?php echo $row->date ?></div>
        <div class="about-res">about : <?php echo $row->about ?></div>
        <div class="about-res">ready : <?php echo $row->ready ?></div>
    <p id="btn_area">
        <a href="#!" onclick="delEvent(<?=$idx?>); return false;" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> 예약 취소</a>
        <a href="./reservate_my_list.php" class="btn btn-secondary btn-sm"><i class="fa fa-list"></i> 예약 목록</a>
    </p>
    </div>
</div>
    <script>
        function delEvent(idx) {
            if( ! idx ) return;
            if( ! confirm("예약을 취소하시겠습니까?") ) return;
            let frm = document.getElementById('delForm');
            document.getElementById('idx').value= idx;
            frm.submit();
        }
    </script>
<?php include_once('footer.php'); ?>