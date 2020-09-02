<?php include_once('../lib/lib.php');?>
<?php include_once('header.php');?>
<?php
    $data = array();
    $data2 = array();
    $sql = "SELECT count(*) AS CNT, writer FROM `reservate` group by writer";
    if( $rs = $db->query($sql) ) {
        $data = $rs->fetchAll(PDO::FETCH_ASSOC);
    }

    $sql2 = "SELECT count(*) AS CNT, school FROM `reservate` group by school";
    if( $rs = $db->query($sql2) ) {
        $data2 = $rs->fetchAll(PDO::FETCH_ASSOC);
    }

    $json = json_encode($data, JSON_UNESCAPED_UNICODE);
    $json2 = json_encode($data2, JSON_UNESCAPED_UNICODE);
?>
    <div class="center">
        <canvas id="canvas" width="500" height="500"></canvas>
    </div>
    <div class="center">
        <canvas id="canvas3" width="500" height="500"></canvas>
    </div>
    <div id="writers" class="center"></div>
    <div id="writer" class="center"></div>

    <div class="center">
        <canvas id="canvas2" width="500" height="500"></canvas>
    </div>
    <div class="center">
        <canvas id="canvas4" width="500" height="500"></canvas>
    </div>
    <div id="schools" class="center"></div>
    <div id="school" class="center"></div>

<script>
    let canvas = document.getElementById('canvas');
    let canvas2 = document.getElementById('canvas2');
    let canvas3 = document.getElementById('canvas3');
    let canvas4 = document.getElementById('canvas4');
    let cw = canvas.width;
    let ch = canvas.height;
    let cr = cw / 2;
    let cx = cw / 2;
    let cy = ch / 2;
    let ctx = canvas.getContext('2d');
    let ctx2 = canvas2.getContext('2d');
    let ctx3 = canvas3.getContext('2d');
    let ctx4 = canvas4.getContext('2d');

    let json = <?=$json?>;
    let json2 = <?=$json2?>;
    let total = 0;
    let total2 = 0;
    let start = 0;
    let end = 0;
    let colors = ['#5b6777', '#f15628', '#ffc81b', '#1ca392', '#92769e', '#336e78', '#c8713e'];
    let colors2 = ['#5b6777', '#f15628', '#ffc81b'];

    const getarc = (cx,cy,cr,angle) =>{
        return [cx+Math.cos(angle)*cr,cy+Math.sin(angle)*cr];
    }

    for(let i=0;i<json.length;i++) total += parseInt(json[i].CNT, 10);

    for(let i=0;i<json2.length;i++) total2 += parseInt(json2[i].CNT, 10);

    ctx.beginPath();
    ctx.arc(cw/2, ch/2, 200, 0, 2*Math.PI);
    ctx.strokeStyle = "black";
    ctx.stroke();

    ctx2.beginPath();
    ctx2.arc(cw/2, ch/2, 200, 0, 2*Math.PI);
    ctx2.strokeStyle = "black";
    ctx2.stroke();


    for(let i=0;i<json.length;i++) {
        let rate = json[i].CNT / total;
        end = start + ( rate * (2 * Math.PI) );
        ctx.beginPath();
        ctx.moveTo(cw/2, ch/2);
        ctx.arc(cw/2, ch/2, 200, start, end);
        ctx.moveTo(cw/2, ch/2);
        ctx.fillStyle = colors[i];
        ctx.fill();

        let pos = getarc(cx,cy,cr/1.7,start + 2*Math.PI*(rate/2));
        ctx.fillStyle = 'black';
        ctx.font = "15px Malgun Gothic";
        ctx.textAlign = "center";
        ctx.fillText(json[i].writer, pos[0], pos[1]);
        ctx.fillText(json[i].CNT, pos[0], pos[1]+18);
        start = end;

        let writer = `<span style='width:20px; height: 20px; display: inline-block; background-color: ${colors[i]}'></span>${json[i].writer} `;
        $("#writers").append(writer);
    }

    for(let i=0;i<json2.length;i++) {
        let rate = json2[i].CNT / total2;
        end = start + ( rate * (2 * Math.PI) );
        ctx2.beginPath();
        ctx2.moveTo(cw/2, ch/2);
        ctx2.arc(cw/2, ch/2, 200, start, end);
        ctx2.moveTo(cw/2, ch/2);
        ctx2.fillStyle = colors2[i];
        ctx2.fill();

        let pos = getarc(cx,cy,cr/1.7,start + 2*Math.PI*(rate/2));
        ctx2.fillStyle = 'black';
        ctx2.font = "15px Malgun Gothic";
        ctx2.textAlign = "center";
        ctx2.fillText(json2[i].school, pos[0], pos[1]);
        ctx2.fillText(json2[i].CNT, pos[0], pos[1]+18);
        start = end;

        let schools = `<span style='width:20px; height: 20px; display: inline-block; background-color: ${colors2[i]}'></span>${json2[i].school} `;
        $("#schools").append(schools);
    }

    let bw = 60;
    let bh;
    let xcoord = 40;
    let xcoord2 = 40;
    let base = 90;

    for(let i = 0 ; i < json.length; i++){
        bh = json[i].CNT * 100;
        const DrawBarchart = (ctx3, color, xcoord, ycoord, widht, height) => {
            ctx3.fillStyle = color;
            ctx3.fillRect(xcoord, ycoord, widht, height);
        }
        DrawBarchart(ctx3, colors[i], xcoord, (ch-bh)-base, bw, bh);
        xcoord += bw+10;

        let writer = `<span style='width:20px; height: 20px; display: inline-block; background-color: ${colors[i]}'></span>${json[i].writer} ${json[i].CNT} `;
        $("#writer").append(writer);
    }

    for(let i = 0 ; i < json2.length; i++){
        bh = json2[i].CNT * 100;
        const DrawBarchart = (ctx4, color, xcoord, ycoord, widht, height) => {
            ctx4.fillStyle = color;
            ctx4.fillRect(xcoord, ycoord, widht, height);
        }
        DrawBarchart(ctx4, colors2[i], xcoord2, (ch-bh)-base, bw, bh);
        xcoord2 += bw+10;

        let writer = `<span style='width:20px; height: 20px; display: inline-block; background-color: ${colors2[i]}'></span>${json2[i].school} ${json2[i].CNT} `;
        $("#school").append(writer);
    }
</script>
<?php include_once('footer.php');?>
