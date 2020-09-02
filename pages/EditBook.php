<?php include_once('header.php')?>
<section style="margin-top: 50px; margin-bottom: 20px;">
        <div>
            <span class="page_num">page 1 / 3</span>
            <button id="newpage">new page</button>
        </div>
    <hr>
    <button id="stroke" class="btn-select">선</button>
    <button id="square" class="btn-select">사각형</button>
    <button id="Triangle" class="btn-select">삼각형</button>
    <button id="text" class="btn-select">텍스트</button>
    <button id="Eraser" class="btn-select">지우개</button>
    <label for="image_select"></label>
    <input type="file" id="image_select">
    <label for="video_select"></label>
    <input type="file" id="video_select">
    <br>
    <label for="color">색상 : </label>
    <input type="color" value="#ff0000" id="color">
    <label for="line_width">선두께 : </label>
    <input type="number" value="1" id="line_width">

    <label for="font_size">폰트크기 : </label>
    <input type="number" value="1" id="font_size">
</section>

<div id="draw_area">
    <canvas width="1400" height="750" class="drawing_board" name="canvas" data-idx='0'></canvas>
</div>

<div id="save">
    <div><a href="" id="save_html">html로 저장</a></div>
    <div><a href="" id="save_pdf">pdf로 저장</a></div>
</div>

<script src="../assets/js/index.js"></script>
<?php include_once('footer.php') ?>