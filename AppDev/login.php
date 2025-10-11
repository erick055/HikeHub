<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign In</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <div class="container">
    <form class="signin-form">
      <h2>Sign in</h2>

      <label for="email">Email</label>
      <input type="email" id="email" placeholder="Enter your email" required />

      <label for="password">Password</label>
      <input type="password" id="password" placeholder="Enter your password" required />

      <div class="options">
        <label class="remember">
          <input type="checkbox" />
          Remember me
        </label>
        <a href="#" class="forgot">Forgot your password?</a>
      </div>

      <button type="submit">Sign in</button>

      <p class="signup-link">
        Don't have an account? <a href="register.html">Sign up</a>
      </p>
    </form>
  </div>
</body>
</html>

<style>
    body {
  margin: 0;
  font-family: 'Segoe UI', sans-serif;
  background-color: #f5f5f5;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.container {
  background-color: #fff;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 400px;
}

.signin-form h2 {
  margin-bottom: 1.5rem;
  text-align: center;
  font-weight: 500;
}

label {
  display: block;
  margin-bottom: 0.5rem;
  font-size: 0.95rem;
}

input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 0.75rem;
  margin-bottom: 1rem;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.options {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1.5rem;
  font-size: 0.9rem;
}

.remember input {
  margin-right: 5px;
}

.forgot {
  text-decoration: none;
  color: #0078d4;
}

button {
  width: 100%;
  padding: 0.75rem;
  background-color: #000;
  color: #fff;
  border: none;
  border-radius: 4px;
  font-size: 1rem;
  cursor: pointer;
}

button:hover {
  background-color: #333;
}

.signup-link {
  text-align: center;
  margin-top: 1rem;
  font-size: 0.9rem;
}

.signup-link a {
  color: #0078d4;
  text-decoration: none;
}
</style>