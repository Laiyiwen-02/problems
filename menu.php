<title> CL prob - CL 题目大全 </title>
<link rel="stylesheet" href="https://s4.zstatic.net/ajax/libs/layui/2.11.1/css/layui.css">
<link rel = "stylesheet" href = "https://use.sevencdn.com/npm/github-markdown-css@5.6.1/github-markdown-light.css">
<link rel = "stylesheet" href = "https://cdn.jsdelivr.net/gh/laiyiwen-02/cdn@0.0.3/prism/prism.css">
<link rel="shortcut icon" href="https://cdn.luogu.com.cn/upload/image_hosting/xfli7cxb.png" type="image/x-icon">
<div>
  <ul class = "layui-nav layui-bg-gray">
    <li class = "layui-nav-item">
      <a href = "/">
        <img src = "https://cdn.luogu.com.cn/upload/image_hosting/xfli7cxb.png" class = "layui-nav-img" alt = "CL"> 题集
      </a>
    </li>
    <li class = "layui-nav-item">
      <a href = "/problems/">
        题库 
        <i class = "layui-icon layui-icon-list"></i>
      </a>
    </li>
    <li class = "layui-nav-item">
      <a href = "/discuss/"> 
        讨论区 
        <span class = "layui-badge-dot"></span>
      </a>
    </li>
    <li class = "layui-nav-item">
      <a href = "/about">
        关于我们
        <i class = "layui-icon layui-icon-about"></i>
      </a>
    </li>
    <li class = "layui-layout-right layui-nav-item">
      <?php
        if (isset($_SESSION['user']) && isset($_SESSION['pwd'])) {
          echo $_SESSION['user'] . 
          "<i class = 'layui-icon layui-icon-username'></i>
          <dl class = 'layui-nav-child'>
            <dd>
              <a href = '/admin/'>
                管理
              </a>
            </dd>
            <dd>
              <a href = '/user/1'>
                个人主页
              </a>
            </dd>
            <hr>
            <dd>
              <a href = '/logout.php'>
                登出
              </a>
            </dd>
          </dl>"
            ;
        } else {
          echo 
          '<a href = "/login.php">
            登录
            <i class = "layui-icon layui-icon-username"></i>
          </a>'
            ;
        }
      ?>
    </li>
  </ul>
</div>