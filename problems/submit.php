
<!DOCTYPE html>
<html>
  <?php include "../menu.php"; ?>
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
      <form class="layui-form" action="/problems/action.php" method="post" style="height: 100%;">
        <div class="layui-form-item" style="height: 100%;">
          <label class="layui-form-label" style="height: 10%;">题目</label>
          <div class="layui-input-block">
            <input type="text" name="title" required  lay-verify="required" placeholder="请输入题目" autocomplete="off" class="layui-input">
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
    <script src="https://use.sevencdn.com/npm/katex@0.16.11/dist/contrib/auto-render.min.js" onload = 'renderMathInElement(document.body, {delimiters: [{left: "$$", right: "$$", display: true}, {left: "$", right: "$", display: false} ], macros: {"\\geq": "\\geqslant", "\\leq": "\\leqslant" } }); '></script>
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
                        "\\geq": "\\geqslant",
                        "\\leq": "\\leqslant"
                    }
                }); 
                Prism.highlightAll(); document.getElementById("h").value = md;
            });
        });
    </script>
    <?php include "../footer.php"; ?>
  </body>
</html>