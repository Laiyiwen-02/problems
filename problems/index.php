<?php include "../menu.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>问题列表</title>
</head>
<body>
    <div class="layui-container">
        <div class="layui-card" style="padding:2%;margin:2%;">
            <div class="layui-card-body">
                <?php
                $fl = file("problems.txt");
                if (empty($fl)) {
                    echo '<div class="layui-empty">题库为空</div>';
                } else {
                    echo '<table class="layui-table">';
                    echo '<colgroup><col width="60"><col><col width="100"></colgroup>';
                    echo '<thead><tr><th>序号</th><th>题目名称</th><th>操作</th></tr></thead>';
                    echo '<tbody>';
                    
                    $counter = 1;
                    foreach ($fl as $line) {
                        $cleanedLine = trim($line);
                        if (!empty($cleanedLine)) {
                            echo '<tr>';
                            echo '<td>' . $counter . '</td>';
                            echo '<td><a href="/problems/' . $cleanedLine . '" class="layui-link">' . $cleanedLine . '</a></td>';
                            echo '<td><a href="/problems/' . $cleanedLine . '" class="layui-btn layui-btn-xs layui-btn-primary">查看</a></td>';
                            echo '</tr>';
                            $counter++;
                        }
                    }
                    
                    echo '</tbody></table>';
                }
                ?>
            </div>
        </div>
    </div>

    <?php include "../footer.php"; ?>
</body>
</html>