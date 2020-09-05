<?php include_once('../lib/lib.php');?>
<?php include_once ('../lib/calendar.php');?>
<?php include_once('header.php');?>
<div class="page-area">
    <h1 class="page-title">Reservate</h1>
    <form method="post" action="../lib/server.php">
        <input type="hidden" name="action" value="reservate">
        <div id="selectBox">
            <div id="calnedar" class="col-xs-6">
                <label>날짜선택</label>
                <table id="calender" border = "1">
                    <th colspan = "2">
                        <select name = "year" id="year" onchange="changeYmd()">
                            <?php for($i=(date('Y')+2);$i>=(date('Y')-12); $i--) {
                                if( $i == $year ) $selected = " selected"; else $selected = "";
                                ?>
                                <option value="<?=$i?>"<?=$selected?>><?=$i?></option>
                            <?php } ?>
                        </select>
                    </th>
                    <th colspan = "3">
                        <select name = "month" id="month" onchange="changeYmd()">
                            <?php for($i=1;$i<=12; $i++) {
                                $m = str_pad($i, 2, '0', STR_PAD_LEFT);
                                if( $m == $month ) $selected = " selected"; else $selected = "";
                                ?>
                                <option value="<?=$m?>"<?=$selected?>><?=$m?></option>
                            <?php } ?>
                        </select>
                    </th>
                    <th colspan = "2">
                        <a href="Reservate.php?year=<?=date('Y')?>&month=<?=date('m')?>&date=<?=date('d')?>">오늘로</a>
                    </th>
                    <tr><td>일</td> <td>월</td><td>화</td><td>수</td><td>목</td><td>금</td><td>토</td></tr>
                    <?php
                    $i = 1;
                    while ($i < sizeof($array_of_days)) {
                        if ((($i - 1  ) % 7 == 0)) {
                            $DayToBrake = $i;
                            echo "\n<tr>";
                        }
                        else if ($i != 1) echo "</td>\n";
                        echo "<td>";
                        if (($year == date('Y')) and ($month == date('n')) and date('j') == $array_of_days[$i]) {
                            echo "<strong><a href='{$year}-{$month}-{$array_of_days[$i]}' style='color:red' class='select-date'>" . $array_of_days[$i] . '</a></strong>';
                        } else {
                            if($array_of_days[$i]) {
                                echo  "<a href='{$year}-{$month}-{$array_of_days[$i]}' class='select-date'>" . $array_of_days[$i] . '</a>';
                            }
                        }
                        if (($i % 7 == 0)) {
                            $DayToBrake = $i;
                            echo "</td></tr>";
                        }
                        $i++;
                    }
                    echo "</td></tr>\n";
                    ?>
                </table>
            </div>
            <div id="selectlist" class="col-xs-6">

            </div>
        </div>

        <div class="text-group">
            <label>Date</label>
            <input type="text" name="date" id="date" class="form-control readonly" required>
        </div>
        <div class="text-group">
            <label>time</label>
            <input type="text" name="time" id="time" class="form-control readonly" required>
        </div>
        <div class="text-group">
            <label>title</label>
            <input type="text" name="title" id="title" class="form-control readonly" required>
        </div>
        <input type="hidden" name="photo" id="photo" class="form-control readonly" required>
        <div class="text-group">
            <label>writer</label>
            <input type="text" name="writer" id="writer" class="form-control" required>
        </div>
        <div class="text-group">
            <label>username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?=$_SESSION['username']?>" required>
        </div>
        <div class="text-group">
            <label>age</label>
            <input type="text" name="age" id="age" class="form-control" value="<?=$_SESSION['userinfo']['age']?>" required>
        </div>
        <div class="text-group">
            <label>school</label>
            <input type="text" name="school" id="school" class="form-control"  value="<?=$_SESSION['userinfo']['school']?>" required>
        </div>
        <div class="text-group">
            <label>gender</label>
            <input type="text" name="gender" id="gender" class="form-control" value="<?=$_SESSION['userinfo']['gender']?>" required>
        </div>
        <div class="text-group">
            <label>About</label>
            <input type="text" name="about" id="about" class="form-control" required>
        </div>
        <input type="hidden" name="ready" id="ready" class="form-control" value="대기중">
        <button type="submit" class="page-btn">예약하기</button>
    </form>
</div>

<?php include_once('footer.php');?>