<?php 
  require_once '../config.php';

  session_start();

  function login () {
    if (empty($_POST['email'])) {
      $GLOBALS['error_message'] = '请输入邮箱';
      return;
    }
    if (empty($_POST['password'])) {
      $GLOBALS['error_message'] = '请输入密码';
      return;
    }
    $email = $_POST['email'];
    $password = $_POST['password'];

    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$con) {
      exit('<h1>连接数据库失败</h1>');
    }

    $query = mysqli_query($con, "select * from users where email = '{$email}' limit 1;");

    if (!$query) {
      $GLOBALS['error_message'] = '登陆失败，请重试';
      return;
    }
    $user = mysqli_fetch_assoc($query);
    if (!$user) {
      $GLOBALS['error_message'] = '邮箱与密码不匹配';
      return;
    }
    if ($user['password'] !== $password) {
      $GLOBALS['error_message'] = '邮箱与密码不匹配';
      return;
    }

    $_SESSION['current_login_user'] = $user;
    
    header('location: /admin/');
  }
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    login();
  }
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Sign in &laquo; Admin</title>
  <link rel="stylesheet" href="/static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/static/assets/vendors/animate/animate.css">
  <link rel="stylesheet" href="/static/assets/css/admin.css">
</head>
<body>
  <div class="login">
    <!-- 可以通过在 form 上添加 novalidate 取消浏览器自带的校验功能 -->
    <!-- autocomplete="off" 关闭客户端的自动完成功能 -->
    <form class="login-wrap<?php echo isset($error_message) ? ' shake animated' : '';?>" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" autocomplete="off" novalidate>
      <img class="avatar" src="/static/assets/img/default.png">
      <!-- 作为一个优秀的页面开发人员，必须考虑一个页面的不同状态下展示的内容不一样的情况 -->
      <!-- 有错误信息时展示 -->
      <?php if (isset($error_message)): ?>
      <div class="alert alert-danger">
        <strong>错误！</strong><?php echo $error_message; ?>
      </div>
      <?php endif; ?>
      <div class="form-group">
        <label for="email" class="sr-only">邮箱</label>
        <input id="email" name="email" type="email" class="form-control" placeholder="邮箱" autofocus value="">
      </div>
      <div class="form-group">
        <label for="password" class="sr-only">密码</label>
        <input id="password" name="password" type="password" class="form-control" placeholder="密码">
      </div>
      <button class="btn btn-primary btn-block">登 录</button>
    </form>
  </div>
</body>
</html>
