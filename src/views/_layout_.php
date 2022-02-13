<!doctype html>
<html lang="en" class="h-100">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <script src="/js/jquery.js"></script>
  <title><?= $title ?></title>
</head>

<body class="d-flex flex-column h-100">
  <header class="container"></header>
  <div class="container"><?= $this->fetch($navbar) ?></div>
  <div class="container">
    <div class="row">
      <aside class="col-3 py-2 ps-4"><?= $this->fetch($aside) ?></aside>

      <main class="col py-2">
        <?= $content ?>
      </main>

    </div>

  </div>
  <footer class="container mt-auto"><?= $this->fetch($footer) ?></footer>
  <script src="/js/bootstrap.bundle.min.js"></script>
  </body>

</html>
