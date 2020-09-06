<?php
include_once('../lib/lib.php');
$idx = isset($_GET['idx']) ? (int)$_GET['idx'] : 0;
$data = array("idx"=>0,"Title"=>"","Photo"=>"","Writer"=>"","Target"=>"", "ReleaseDate"=>"","MDate"=>"","MTime"=>"");
if( $idx ) $data = readBook($idx);
include_once('header.php');
?>
<div class="page-area">
    <h1 class="page-title">Update</h1>
    <form method="post" action="../lib/server.php" enctype="multipart/form-data">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="idx" value="<?=$data['idx']?>">
        <div class="text-group">
            <label>Book Title</label>
            <input type="text" name="Title" value="<?=$data['Title']?>">
        </div>
        <div class="text-group">
            <label>Book Photo</label>
            <input type="file" name="Photo">
        </div>
        <div class="text-group">
            <label>Writer</label>
            <input type="text" name="Writer" value="<?=$data['Writer']?>">
        </div>
        <div class="text-group">
            <label>Target</label>
            <input type="text" name="Target" value="<?=$data['Target']?>">
        </div>
        <div class="text-group">
            <label>ReleaseDate</label>
            <input type="date" name="ReleaseDate" value="<?=$data['ReleaseDate']?>">
        </div>
        <div class="text-group">
            <label>Meeting(DATE)</label>
            <input type="date" name="meetDate" value="<?=$data['meetDate']?>">
        </div>
        <div class="text-group">
            <label>Meeting(DAY)</label>
            <input type="text" name="days" value="<?=$data['days']?>">
        </div>
        <div class="text-group">
            <label>Meeting(START TIME)</label>
            <input type="time" name="startTime" value="<?=$data['startTime']?>">
        </div>
        <div class="text-group">
            <label>Meeting(END TIME)</label>
            <input type="time" name="endTime" value="<?=$data['endTime']?>">
        </div>
        <button type="submit" class="page-btn">Complete</button>
    </form>
</div>    
<?php include_once('footer.php'); ?>