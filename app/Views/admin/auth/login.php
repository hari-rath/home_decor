


<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  background: #e0e5ec;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.login-container {
  background: #e0e5ec;
  border-radius: 25px;
  box-shadow: 10px 10px 20px #a3b1c6,
    -10px -10px 20px #ffffff;
  padding: 50px 40px;
  width: 340px;
  text-align: center;
}

.profile-img {
  width: 80px;
  height: 80px;
  margin: 0 auto 20px;
  border-radius: 50%;
  background: #e0e5ec;
  background: url('<?php echo base_url('assets/images/deep_logo.png'); ?>');
  background-size: contain;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: inset 6px 6px 10px rgb(163,177,198, 0.5),
    inset -6px -6px 10px rgb(255,255,255, 0.5);
  overflow: hidden;
}

h2 {
  color: #333;
  font-size: 1.3rem;
  margin-bottom: 5px;
}

p {
  font-size: 9px;
  color: #666;
  margin-bottom: 25px;
}

.input-field {
  position: relative;
  margin-bottom: 20px;
}

.input-field input {
  width: 100%;
  padding: 12px 45px;
  border: none;
  border-radius: 15px;
  background: #e0e5ec;
  box-shadow: inset 6px 6px 10px #a3b1c6,
    inset -6px -6px 10px #ffffff;
  font-size: 0.95rem;
  color: #333;
  outline: none;
}

.input-field i {
  position: absolute;
  left: 15px;
  top: 50%;
  transform: translateY(-50%);
  color: #666;
}

.btn {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 20px;
  background: #40a9c3;
  color: white;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  box-shadow: 5px 5px 15px #a3b1c6,
    -5px -5px 15px #ffffff;
  transition: 0.2s;
}

.btn:hover {
  background: #3a97af;
}

.options {
  margin-top: 15px;
  font-size: 0.85rem;
  color: #555;
}

.options a {
  color: #111;
  text-decoration: none;
  font-weight: 600;
}

    </style>
</head>
<body>


<div class="login-container">
  <div class="profile-img"></div>
  <h2>Deep Home Decoration</h2>
  <p>Experience Timeless Elegance</p>

  <?php if (session()->getFlashdata('error')) : ?>
    <p style="color:red"><?= session()->getFlashdata('error') ?></p>
<?php endif; ?>


<form method="post" action="<?= base_url('admin/login-process') ?>">
    <?= csrf_field() ?>
    <div class="input-field">
      <i>👤</i>
      <input type="text" name="email"  placeholder="username" required>
    </div>

    <div class="input-field">
      <i>🔒</i>
      <input type="password" name="password" placeholder="password" required>
    </div>

    <button class="btn" type="submit">Login</button>

    <div class="options">
      <!-- Forgot password? <a href="#">or Sign Up</a> -->
    </div>
  </form>
</div>

<!-- <h2>Admin Login</h2>



<form method="post" action="<?= base_url('admin/login-process') ?>">
    <?= csrf_field() ?>

    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>

    <button type="submit">Login</button>
</form> -->

</body>
</html>
