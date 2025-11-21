<?php session_start();?>
<!DOCTYPE html>
<html>
  <head>
    <title>CL1001</title>
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
    <div style="padding-left:10%;padding-right:10%;"><div style = "padding:2%; margin:2%; color:black; text-align:center;"><h1>CL1001</h1></div>
    <div class="layui-tabs layui-tabs-card" style="padding:2%;margin:2%;" lay-options="{index:0}">
      <ul class="layui-tabs-header">
        <li>题目描述</li>
        <li>题解</li>
        <li>附件下载</li>
        <li style="float:right;"><a href="/problems/CL1001/submit.php" class="layui-btn">添加题解</a></li>
      </ul>
      <div class="layui-tabs-body">
        <div class="layui-tabs-item layui-panel markdown-body" style="padding:2%; margin:2%;"><?php include "index.html";?></div>
        <div class="layui-tabs-item markdown-body" style=" margin:2%;">
          <?php
            $fl=file("solutions.txt");
            $tit=file("title.txt");
            if(count($fl)==0){
              echo '<div class="layui-panel markdown-body" style="padding:2%;"><p>暂无题解</p></div>';
            }
            for($i=0;$i<count($fl);$i++){
              if(trim($fl[$i])=="1") echo "<div class='layui-card' style='margin-bottom:2%;'>";
              else echo "<div class='layui-card' style='margin-top:2%;margin-bottom:2%;'>";
              echo "<div class='layui-card-header'><b>".$tit[$i]."</b></div>";
              echo "<div class = 'layui-card-body'>";
              include "./solution/".trim($fl[$i]).".html";
              echo "</div></div>";
            }
          ?>
        </div>
        <div class="layui-tabs-item layui-panel markdown-body" style="padding:2%; margin:2%;"><p>跳转中</p></div>
        <div class="layui-tabs-item layui-panel markdown-body" style="padding:2%; margin:2%;"><p>无</p></div>
      </div>
    </div></div>
    <script src = "https://cdn.jsdelivr.net/gh/laiyiwen-02/cdn@0.0.1/prism/prism.js"></script>
    <script>const codeElements = document.querySelectorAll("code");codeElements.forEach(element => {element.className = "language-text"});</script>
    <script src="https://use.sevencdn.com/npm/katex@0.16.11/dist/katex.min.js"></script>
    <script src="https://use.sevencdn.com/npm/katex@0.16.11/dist/contrib/auto-render.min.js" onload = 'renderMathInElement(document.body, {delimiters: [{left: "$$", right: "$$", display: true}, {left: "$", right: "$", display: false} ], macros: {"\\geq": "\\geqslant", "\\leq": "\\leqslant" } }); '></script>
    <script src = 'https://s4.zstatic.net/ajax/libs/layui/2.11.1/layui.js'></script>
  </body>
</html>