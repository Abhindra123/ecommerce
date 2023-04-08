
<html>
<head>
    <link rel="stylesheet" href="search.css">
    <script src="https://kit.fontawesome.com/7f6d2012d0.js" ></script>
    <style>
        * {
  margin: 0;
  padding: 0%;
}
.container {
  height: 100%;
  width: 100%;
  background-image: linear-gradient(rgb(129, 96, 221), rgb(86, 67, 129));
  background-position:center;
  background-size:cover;
  display: flex;
  align-items: center;
  justify-content: center;
}
.search-bar {
  width: 100%;
  max-width: 700px;
  background: rgba(255, 255, 255, 0.2);
  display: flex;
  align-items: center;
  border-radius: 60px;
  border-color: rgba(129, 96, 221);
  padding: 10px;
}
.search-bar input {
  background: transparent;
  flex: 1;
  border: 0;
  padding: 24px 20px;
  font-size: 20px;
  color: #cccc;
}
::placeholder {
  color: whitesmoke;
}
.search-bar button {
  border: 0;
  border-radius: 50%;
  width: 50px;
  height: 50px;
}

    </style>
</head>
<body>
<div class="container">
    <form action="find.php" method="get" class="search-bar">
        <input type="text" placeholder="Search anything" name="q">
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>

<div class="container mt-3">
    <div class="row">

    </div>
</div>



</body>
</html>