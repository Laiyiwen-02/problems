<?php session_start(); ?>
<?php include "../menu.php"; ?>
<?php
system("mkdir ../problems/" . $_POST['title']);
system("mkdir ../problems/" . $_POST['title'] . "/solution");
$file = fopen("../problems/" . $_POST['title'] . "/index.md", "w");fwrite($file, $_POST['t']);fclose($file);
$file2 = fopen("../problems/" . $_POST['title'] . "/cnt.txt", "w"); fwrite($file2, "0");fclose($file2);
$file3 = fopen("../problems/" . $_POST['title'] . "/index.html", "w"); fwrite($file3, $_POST['h']);fclose($file3);
fopen("../problems/" . $_POST['title'] . "/solutions.txt", "w");
fopen("../problems/" . $_POST['title'] . "/title.txt", "w");
file_put_contents("../problems/problems.txt", $_POST['title'] . "\n", FILE_APPEND);
$problem_id = $_POST['title'];
$content = <<<EOT
<?php session_start();?>
<!DOCTYPE html>
<html>
  <head>
    <title>{$problem_id}</title>
    <?php include "../../menu.php"; ?>
    <link rel="stylesheet" href="https://use.sevencdn.com/npm/katex@0.16.11/dist/katex.min.css">
    <style>
      html, body {
          height: 100%;
          margin: 0;
          overflow: auto;
      }
    </style>
  </head>
  <body>
    <div style="padding-left:10%;padding-right:10%;"><div style = "padding:2%; margin:2%; color:black; text-align:center;"><h1>{$problem_id}</h1></div>
    <div class="layui-tabs layui-tabs-card" style="padding:2%;margin:2%;" lay-options="{index:0}">
      <ul class="layui-tabs-header">
        <li>题目描述</li>
        <li>题解</li>
        <li>附件下载</li>
        <li style="float:right;"><a href="/problems/{$problem_id}/submit.php" class="layui-btn">添加题解</a></li>
      </ul>
      <div class="layui-tabs-body">
        <div class="layui-tabs-item layui-panel markdown-body" style="padding:2%; margin:2%;"><?php include "index.html";?></div>
        <div class="layui-tabs-item markdown-body" style=" margin:2%;">
          <?php
            \$fl=file("solutions.txt");
            \$tit=file("title.txt");
            if(count(\$fl)==0){
              echo '<div class="layui-panel markdown-body" style="padding:2%;"><p>暂无题解</p></div>';
            }
            for(\$i=0;\$i<count(\$fl);\$i++){
              if(trim(\$fl[\$i])=="1") echo "<div class='layui-card' style='margin-bottom:2%;'>";
              else echo "<div class='layui-card' style='margin-top:2%;margin-bottom:2%;'>";
              echo "<div class='layui-card-header'><b>".\$tit[\$i]."</b></div>";
              echo "<div class = 'layui-card-body'>";
              include "./solution/".trim(\$fl[\$i]).".html";
              echo "</div></div>";
            }
          ?>
        </div>
        <div class="layui-tabs-item layui-panel markdown-body" style="padding:2%; margin:2%;"><p>无</p></div>
        <div class="layui-tabs-item layui-panel markdown-body" style="padding:2%; margin:2%;"><p>跳转中</p></div>
      </div>
    </div></div>
    <script src="https://use.sevencdn.com/npm/katex@0.16.11/dist/katex.min.js"></script>
    <script src="https://use.sevencdn.com/npm/katex@0.16.11/dist/contrib/auto-render.min.js" onload = 'renderMathInElement(document.body, {delimiters: [{left: "$$", right: "$$", display: true}, {left: "$", right: "$", display: false} ], macros: {"\\\\geq": "\\\\geqslant", "\\\\leq": "\\\\leqslant" } }); '></script>
    <?php include "../../footer.php"; ?>
  </body>
</html>
EOT;
file_put_contents("../problems/" . $_POST['title'] . "/index.php", $content);
$content = <<<EOT
<!DOCTYPE html>
<html>
  <?php include "../../menu.php"; ?>
  <head>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            overflow: auto;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/gh/laiyiwen-02/cdn@master/prism/prism.js"></script>
    <link rel="stylesheet" href="https://use.sevencdn.com/npm/katex@0.16.11/dist/katex.min.css">
  </head>
  <body>
    <div class = "layui-panel" style = "padding: 2%; margin: 2%;height: 60%;">
      <form class="layui-form" action="/problems/{$problem_id}/action.php" method="post" style="height: 100%;">
        <div class="layui-form-item" style="height: 100%;">
          <label class="layui-form-label" style="height: 10%;">标题</label>
          <div class="layui-input-block">
            <input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-form-item" style="height: 80%;">
            <label class="layui-form-label">内容</label>
            <div class="layui-input-block" style="height: 100%;">
              <div style = "height: 90%;" class = "layui-row">
                  <div class = "layui-col-md6" style = "height: 100%;">
                      <div id="editor" style = "width: 100%; height: 100%; max-height: 100%;"></div>
                      <textarea id = "t" name = "t" hidden></textarea>
                  </div>
                  <div class = "layui-col-md6" style = "height: 100%; overflow:auto;">
                      <div id = "show" class = "markdown-body"></div>
                      <textarea id = "h" name = "h" hidden></textarea>
                  </div>
              </div>
            </div>
          </div>
          <div style = "height: 10%; width:100%;">
                <button type="submit" class="layui-btn layui-btn-normal layui-btn-radius" style = "float: right;">
                    提交
                </button>
          </div>
        </div>
      </form>
    </div>
    <script src="https://use.sevencdn.com/npm/marked/marked.min.js"></script>
    <script src="https://use.sevencdn.com/npm/katex@0.16.11/dist/katex.min.js"></script>
    <script src="https://use.sevencdn.com/npm/katex@0.16.11/dist/contrib/auto-render.min.js" onload = 'renderMathInElement(document.body, {delimiters: [{left: "$$", right: "$$", display: true}, {left: "$", right: "$", display: false} ], macros: {"\\\\geq": "\\\\geqslant", "\\\\leq": "\\\\leqslant" } }); '></script>
    <script src="https://s4.zstatic.net/ajax/libs/monaco-editor/0.52.2/min/vs/loader.min.js"></script>
    <script>
        require.config({
            paths: {
                "vs": "https://s4.zstatic.net/ajax/libs/monaco-editor/0.52.2/min/vs/"
            }
        });
        require(["vs/editor/editor.main"], function () {
            var editor = monaco.editor.create(document.getElementById("editor"), {
                value: "",
                language: "markdown"
            });
            // monaco.editor.setTheme("vs");
            editor.onDidChangeModelContent((e) => {
                var t = document.getElementById("t");
                function trans(md) {
                    // md = md.replace(/\\/g, '\\\\');
                    // md = md.replace(/\\\\\&/g, '\\\&');
                    return md;
                }
                var md = editor.getValue(); md = trans(md);
                t.value = md; md = marked.parse(md); document.getElementById("show").innerHTML = md;
                renderMathInElement(document.getElementById("show"), {
                    delimiters: [
                        {left: "$$", right: "$$", display: true},
                        {left: "$", right: "$", display: false}
                    ],
                    macros: {
                        "\\\\geq": "\\\\geqslant",
                        "\\\\leq": "\\\\leqslant"
                    }
                }); 
                Prism.highlightAll(); document.getElementById("h").value = md;
            });
        });
    </script>
    <?php include "../../footer.php"; ?>
  </body>
</html>
EOT;
file_put_contents("../problems/" . $_POST['title'] . "/submit.php", $content);
$content = '<?php
$rp = file("cnt.txt");
$file = fopen("solution/" . $rp[0] + 1 . ".html", "w");
fwrite($file, $_POST[\'h\']);
file_put_contents("cnt.txt", $rp[0] + 1);
file_put_contents("solutions.txt", ($rp[0] + 1)."\n", FILE_APPEND);
file_put_contents("title.txt", $_POST[\'title\']."\n", FILE_APPEND);
echo "done";
?>';
file_put_contents("../problems/" . $_POST['title'] . "/action.php", $content);
echo "<script>alert('提交成功');</script>";
echo "<script>window.location.href = '/problems/';</script>";
?>
<?php include "../footer.php"; ?>