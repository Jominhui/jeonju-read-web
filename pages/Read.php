<?php
    include_once('../lib/lib.php');
    if (isset($_POST['action'])) {
        include_once('../lib/server.php');
    }
    $idx = $_GET['idx'] ?? null;

    $sql = "SELECT * FROM Meet WHERE idx = '{$idx}'";
    $row = fetch($sql);
    include_once('header.php');
?>
<div class="read-page-area">
    <div class="read-area">
        <div class="read-image-area">
            <?php if($row->Photo):?>
                <img src="../upload/<?=$row->Photo?>" alt="<?=$row->Photo?>" width="200" height="200">
            <?php endif;?>
        </div>
        <div class="about-read-area">
            <div class="title-read"><?php echo $row->Title ?></div>
            <div class="about-read">Writer : <?php echo $row->Writer ?></div>
            <div class="about-read">Target : <?php echo $row->Target ?></div>
            <div class="about-read">ReleaseDate : <?php echo $row->ReleaseDate ?></div>
            <div class="about-read">Date : <?php echo $row->meetDate ?></div>
            <div class="about-read">Day : <?php echo $row->days ?></div>
            <div class="about-read">Time : <?php echo $row->startTime ?> ~ <?php echo $row->endTime ?></div>
        <p>
            <a href="./update.php?idx=<?php echo $row->idx?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> 수정</a>
            <a href="#!" onclick="delread(<?=$idx?>); return false;" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> 삭제</a>
            <a href="./festival_list.php" class="btn btn-secondary btn-sm"><i class="fa fa-list"></i> 목록</a>
        </p>
        </div>
    </div>
</div>
<?php include_once('footer.php'); ?>