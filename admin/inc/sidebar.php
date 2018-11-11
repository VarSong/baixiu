<!-- 也可以使用 $_SERVER['PHP_SELF'] 取代 $current_page -->
<div class="aside">
  <div class="profile">
    <img class="avatar" src="/static/uploads/avatar.jpg">
    <h3 class="name">布头儿</h3>
  </div>
  <ul class="nav">
    <li>
      <a href="/admin/index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
    </li>
    <li>
      <a href="#menu-posts" data-toggle="collapse">
        <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
      </a>
      <ul id="menu-posts" class="collapse">
        <li><a href="/admin/posts.php">所有文章</a></li>
        <li><a href="/admin/post-add.php">写文章</a></li>
        <li><a href="/admin/categories.php">分类目录</a></li>
      </ul>
    </li>
    <li>
      <a href="/admin/comments.php"><i class="fa fa-comments"></i>评论</a>
    </li>
    <li>
      <a href="/admin/users.php"><i class="fa fa-users"></i>用户</a>
    </li>
    
    <li>
      <a href="#menu-settings" data-toggle="collapse">
        <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
      </a>
      <ul id="menu-settings" class="collapse">
        <li><a href="/admin/nav-menus.php">导航菜单</a></li>
        <li><a href="/admin/slides.php">图片轮播</a></li>
        <li><a href="/admin/settings.php">网站设置</a></li>
      </ul>
    </li>
  </ul>
</div>
