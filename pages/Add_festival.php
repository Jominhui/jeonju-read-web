<?php include_once('../lib/lib.php');?>
<?php include_once('header.php');?>
<div class="page-area">
    <h1 class="page-title">festival</h1>

    <form method="post" action="../lib/server.php" enctype="multipart/form-data">
        <input type="hidden" name="action" value="insert">
        <div class="text-group">
            <label>Book Title</label>
            <input type="text" name="Title">
        </div>
        <div class="text-group">
            <label>Book Photo</label>
            <input type="file" name="Photo">
        </div>
        <div class="text-group">
            <label>Writer</label>
            <input type="text" name="Writer">
        </div>
        <div class="text-group">
            <label>Target</label>
            <input type="text" name="Target">
        </div>
        <div class="text-group">
            <label>ReleaseDate</label>
            <input type="date" name="ReleaseDate">
        </div>
        <div class="text-group">
            <label>Meeting(DATE)</label>
            <input type="date" name="meetDate">
        </div>
        <div class="text-group">
            <label>Meeting(DAY)</label>
            <input type="text" name="days">
        </div>
        <div class="text-group">
            <label>Meeting(START TIME)</label>
            <input type="time" name="startTime">
        </div>
        <div class="text-group">
            <label>Meeting(END TIME)</label>
            <input type="time" name="endTime">
        </div>
        <button type="submit" class="page-btn">Complete</button>
    </form>
</div>
<?php include_once('footer.php');?>