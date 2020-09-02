// class test {
//     constructor() {
//         color : ''
//     }
// }

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
            $("#draw_area").append(`<canvas width="1440" height="750" class="drawing_board" data-idx=${pageIdx}></canvas>`);
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
            console.log("save");
            save_html(this);
        })
        .on('click', '#save_pdf', function () {
            console.log("save");
            save_pdf(this);
        })
}

const stroke = () =>{
    canvas = $('.drawing_board');
    ctx = canvas[select_canvas].getContext('2d');

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
    let sx = 0;
    let sy = 0;
    let ex = 0;
    let ey = 0;

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
    let sx = 0;
    let sy = 0;
    let ex = 0;
    let ey = 0;

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
    let sx = 0;
    let sy = 0;
    let ex = 0;
    let ey = 0;

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
    let sx = 0;
    let sy = 0;
    let ex = 0;
    let ey = 0;

    if( ! select.files ) return;
    if( ! select.files[0] ) return;
    let reader = new FileReader();
    reader.onload = function(event){
        console.log("로드");
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

const login = () =>{

}