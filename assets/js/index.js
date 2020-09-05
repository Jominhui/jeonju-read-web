let pagenum = 1;
let pageIdx = 0;
let color = 'red';
let select_canvas = 0;
let line_width = $('#line_width').val();
let font_size = $('#font_size').val();
let canvas;
let ctx;
let video = document.createElement("video");
let currJob = null;
let isDrawing = false;
let src;
let txtX;
let txtY;
let istxt = false;
let isvideo = false;
let sx = 0;
let sy = 0;
let ex = 0;
let ey = 0;

const Email = /[a-z0-9._%]+@[a-z0-9.-]+\.[a-z]{2,}$/;
const Name = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;
const Password = /[a-zA-Z0-9]{4,}/;

const init = () => {
    canvas = $('.drawing_board');
    ctx = canvas[select_canvas].getContext('2d');
}

$(() => {
    initEvent();
    init();
})

const initEvent = () => {
    $(document)
        .on('click','.btn-select', function(){
            let btnId = $(this).attr("id");

            if( btnId == "stroke" ) {
                currJob = "stroke";
                stroke();
            }
            else if( btnId == "square" ) {
                currJob = "square";
                square();
            }
            else if(btnId == "Triangle"){
                currJob = "Triangle";
                Triangle();
            }
            else if(btnId == "Eraser"){
                currJob = "Eraser";
                Eraser();
            }
            else if(btnId == "text"){
                currJob = "text";
                isDrawing = true;
                text();
            }
        })
        .on('click', '#newpage', function() {
            pagenum++;
            pageIdx++;
            $(".page_num").html(`page ${pagenum} / 3`);
            $("#draw_area").append(`<canvas width="1400" height="750" class="drawing_board" data-idx=${pageIdx}></canvas>`);
        })
        .on('click keyup', '#line_width', function() {
            line_width = $('#line_width').val();
        })
        .on('click keyup', '#font_size', function() {
            font_size = $('#font_size').val();
        })
        .on('click', '.drawing_board', function () {
            select_canvas = parseInt($(this).attr("data-idx"));
            init();
        })
        .on('keydown', '#text_in', function (e) {
            if(e.keyCode === 13){
                let txt = $(this).val();
                draw_txt(txt, txtX, txtY);
                istxt = false;
            }
        })
        .on('change', '#image_select', function () {
            currJob = "image";
            image_select(this);
        })
        .on('change', '#video_select', function () {
            currJob = "video";
            isvideo = true;
            video_select(this);
        })
        .on('click', '#save_html', function () {
            save_html(this);
        })
        .on('click', '#save_pdf', function () {
            save_pdf(this);
        })
}

// 그림판
const stroke = () =>{
    const down = (e) =>{
        if ( currJob != "stroke" ) return;
        isDrawing = true;
        ctx.beginPath();
        ctx.lineWidth = line_width;
        ctx.moveTo(e.offsetX, e.offsetY);
    }

    const move = (e) =>{
        if ( currJob != "stroke" ) return;
        if(!isDrawing) return;
        ctx.lineTo(e.offsetX, e.offsetY);
        ctx.strokeStyle = $('#color').val();
        ctx.stroke();
    }

    const draw_stroke = () => {
        if ( currJob != "stroke" ) return;
        isDrawing = false;
    }

    canvas[select_canvas].addEventListener('mousedown', down, true);
    canvas[select_canvas].addEventListener('mousemove', move, true);
    canvas[select_canvas].addEventListener('mouseup', draw_stroke, true);
    canvas[select_canvas].addEventListener('mouseout', draw_stroke, true);
}

const square = () =>{
    const down = (e) =>{
        if ( currJob != "square" ) return;
        isDrawing = true;
        ctx.beginPath();
        sx = e.offsetX;
        sy = e.offsetY;
    }

    const move = (e) => {
        if ( currJob != "square" ) return;
        if(!isDrawing) return;
        ex = e.offsetX;
        ey = e.offsetY;
    }

    const draw_square = (e) => {
        if ( currJob != "square" ) return;
        if(!isDrawing) return;
        ex = e.offsetX;
        ey = e.offsetY;
        ctx.rect(sx, sy, ex-sx, ey-sy);
        ctx.fillStyle = $('#color').val();
        ctx.fill();
        isDrawing = false;
    }

    canvas[select_canvas].addEventListener('mousedown', down, true);
    canvas[select_canvas].addEventListener('mousemove', move, true);
    canvas[select_canvas].addEventListener('mouseup', draw_square, true);
    canvas[select_canvas].addEventListener('mouseout', draw_square, true);
}

const Triangle = () => {
    const down = (e) =>{
        if ( currJob != "Triangle" ) return;
        isDrawing = true;
        ctx.beginPath();
        sx = e.offsetX;
        sy = e.offsetY;
    }

    const move = (e) => {
        if ( currJob != "Triangle" ) return;
        if(!isDrawing) return;
        ex = e.offsetX;
        ey = e.offsetY;
    }

    const draw_triangle = (e) =>{
        if ( currJob != "Triangle" ) return;
        if(!isDrawing) return;
        ex = e.offsetX;
        ey = e.offsetY;
        ctx.moveTo((ex + sx)/2, sy);
        ctx.lineTo(sx, ey);
        ctx.lineTo(ex, ey);
        ctx.lineTo((ex + sx)/2, sy);
        ctx.fillStyle = $('#color').val();
        ctx.fill();
        isDrawing = false;;
    }

    canvas[select_canvas].addEventListener('mousedown', down, true);
    canvas[select_canvas].addEventListener('mousemove', move, true);
    canvas[select_canvas].addEventListener('mouseup', draw_triangle, true);
    canvas[select_canvas].addEventListener('mouseout', draw_triangle, true);
}

const Eraser = () =>{
    const down = (e) =>{
        if ( currJob != "Eraser" ) return;
        isDrawing = true;
        ctx.clearRect(e.offsetX, e.offsetY , 20, 20);
    }

    const move = (e) =>{
        if ( currJob != "Eraser" ) return;
        if(!isDrawing) return;
        ctx.clearRect(e.offsetX, e.offsetY , 20, 20);
    }

    const draw_stroke = (e) => {
        if ( currJob != "Eraser" ) return;
        isDrawing = false;
    }

    canvas[select_canvas].addEventListener('mousedown', down, true);
    canvas[select_canvas].addEventListener('mousemove', move, true);
    canvas[select_canvas].addEventListener('mouseup', draw_stroke, true);
    canvas[select_canvas].addEventListener('mouseout', draw_stroke, true);
}

const text = () =>{
    const down = (e) =>{
        if ( currJob != "text" ) return;
        if(!isDrawing) return;
        if(istxt) return;
        txtX = e.offsetX;
        txtY = e.offsetY;
        let inputBox = `<div id='inputTxt' style='position:absolute;left:${txtX}px;top:${txtY + 150}px'><form onsubmit="return false"><input type='text' id="text_in"></form></div>`;
        $('body').append(inputBox);
        isDrawing = false;
        istxt = true;
    }

    canvas[select_canvas].addEventListener('mousedown', down, true);
}

const draw_txt = (str,x,y) => {
    ctx.font = `${font_size}px Arial`;
    ctx.fillStyle = $('#color').val();
    ctx.fillText(str, x, y);
    $('body #inputTxt').remove();
}

const image_select = (photo) =>{
    if( ! photo.files ) return;
    if( ! photo.files[0] ) return;
    let reader = new FileReader();
    reader.onload = function(event){
        src = event.target.result;
        image_draw(src);
    };
    reader.readAsDataURL(photo.files[0]);
}

const image_draw = (src) =>{
    const down = (e) =>{
        if ( currJob != "image" ) return;
        isDrawing = true;
        ctx.beginPath();
        sx = e.offsetX;
        sy = e.offsetY;
    }

    const move = (e) => {
        if ( currJob != "image" ) return;
        if(!isDrawing) return;
        ex = e.offsetX;
        ey = e.offsetY;
    }

    const draw = (e) => {
        if ( currJob != "image" ) return;
        if(!isDrawing) return;
        ex = e.offsetX;
        ey = e.offsetY;
        if( ! src ) return;
        let img = new Image();
        img.onload = function(){
            ctx.drawImage(img, sx, sy, ex-sx, ey-sy);
        };
        img.src = src;
        src = null;
        isDrawing = false;
    }

    canvas[select_canvas].addEventListener('mousedown', down, true);
    canvas[select_canvas].addEventListener('mousemove', move, true);
    canvas[select_canvas].addEventListener('mouseup', draw, true);
    canvas[select_canvas].addEventListener('mouseout', draw, true);
}

const video_select = (select) =>{
    if( ! select.files ) return;
    if( ! select.files[0] ) return;
    let reader = new FileReader();
    reader.onload = function(event){
        let src = event.target.result;
        video.src = src;
    };

    const down = (e) =>{
        if ( currJob != "video" ) return;
        if(!isvideo) return;
        isDrawing = true;
        ctx.beginPath();
        sx = e.offsetX;
        sy = e.offsetY;
    }

    const move = (e) => {
        if ( currJob != "video" ) return;
        if(!isDrawing) return;
        ex = e.offsetX;
        ey = e.offsetY;
    }

    const draw = () =>{
        if ( currJob != "video" ) return;
        video.play();


        load();
        isDrawing = false;
        isvideo = false;
    }

    const load = () =>{
        ctx.drawImage(video, sx, sy, ex-sx, ey-sy);
        requestAnimationFrame(load);
    }

    canvas[select_canvas].addEventListener('mousedown', down, true);
    canvas[select_canvas].addEventListener('mousemove', move, true);
    canvas[select_canvas].addEventListener('mouseup', draw, true);
    canvas[select_canvas].addEventListener('mouseout', draw, true);

    reader.readAsDataURL(select.files[0]);
}

const save_html = (link) => {
    let src = canvas[select_canvas].toDataURL("text/plain");
    link.download = "canvas.html";
    link.href = src;
}

const save_pdf = (link) => {
    let src = canvas[select_canvas].toDataURL("image/png");
    link.download = "canvas.pdf";
    link.href = src;
}

// 회원가입
const refresh_captcha = () => {
    document.getElementById("capt_img").src = "captcha.php?waste=" + Math.random();
}

const Check = () => {
    let email = $('#input-email').val();
    let name = $('#input-name').val();
    let password = $('#input-password').val();

    if(!Email.test(email) === true){
        alert('이메일 형식을 맞춰주세요.');
    }
    else if(!Name.test(name) === true) {
        alert('한국어 이름을 입력해 주세요.');
    }
    else if(!Password.test(password) === true) {
        alert('비밀번호는 영문 및 숫자이며 4글자 이상이어야 합니다.');
    }
}

const checkForm = () => {
    let captcha = $("#captcha").val();
    if( ! captcha ) {
        alert("캡차는 필수항목입니다.");
        return false;
    }
    if( $("#captchaOk").val() !== "yes" ) {
        alert("캡차가 일치하지 않습니다.");
        return false;
    }
}

const checkCaptcha = () => {
    let captcha = $("#captcha").val();
    let send_data = {};
    send_data.action = "checkcaptcha";
    send_data.captcha = captcha;
    $.post("../lib/action.php", send_data, function(result){
        let res = $.parseJSON(result);
        if( res.success ) $("#captchaOk").val("yes");
        else $("#captchaOk").val("no");
    });
}

// 예약여부
const changeReady = (idx, ready) => {
    $.post("../lib/action.php", {idx:idx, ready:ready, action: "changereadystate"}, function(result){
        let res = $.parseJSON(result);
        if( res.success ) {
            $("#schFrm").submit();
        } else {
            alert("변경실패");
        }
    } );
}

// 예약 가능 목록
const changeYmd = () => {
    let y=$("#year").val();
    let m=$("#month").val();
    location.href = "Reservate.php?year=" + y + "&month=" + m;
}
$(function(){
    $(".select-date").on("click", function(e){
        e.preventDefault();
        let send_data = {};
        send_data.mdate = $(this).attr("href");
        send_data.action = "getmeets";

        $.post("../lib/action.php", send_data, function(result){
            let res = $.parseJSON(result);
            let table = "<table class='table'>";
            table += "<tr><td>제목</td><td>작가</td><td>날짜</td><td>시간</td><td>선택</td></tr>";
            for(let i=0; i<res.length; i++) {
                table += tr = `
                    <tr>
                        <td>${res[i].Title}</td>
                        <td>${res[i].Writer}</td>
                        <td>${res[i].MDate}</td>
                        <td>${res[i].MTime}</td>
                        <td><a href="#!" onclick="selectDate('${res[i].MDate}','${res[i].Writer}','${res[i].MTime}', '${res[i].Title}', '${res[i].Photo}')">선택</a></td>
                    </tr>
                `;
            }
            table += "</table>";
            $("#selectlist").html(table);
        });
    });
});

const selectDate = (MDate, Writer, MTime, Title, Photo) => {
    $("#date").val(MDate);
    $("#time").val(MTime);
    $("#writer").val(Writer);
    $("#title").val(Title);
    $("#photo").val(Photo);
}

$(".readonly").on('keydown paste', function(e){
    e.preventDefault();
});

// 예약 취소
const delEvent = (idx) => {
    if( ! idx ) return;
    if( ! confirm("예약을 취소하시겠습니까?") ) return;
    let frm = document.getElementById('delForm');
    document.getElementById('idx').value= idx;
    frm.submit();
}