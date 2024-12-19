<!DOCTYPE html>
<html lang="pt-BR">
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/secret.css">
    <title>Caramella</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="icon" href="../../../public/assets/icon-logo.png" type="image/png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kurale&display=swap" rel="stylesheet">
  </head>
  <body>

  <?php include "navbar.php"; ?>

  <div class = "tronco">
    <!-- Apresentaçao da pagina  -->
    <div class = "aprese">
      <div class = "apre">
        <h1>Você acaba de descobrir o segredo mais doce da Caramella</h1>
        <p>A receita do cookie perfeito agora esta a poucos passos de você!</p>
      </div>
      <div class = "ap"><h1>Prepare-se para criar o melhor cookie da sua vida!</h1></div>
    </div>
    <!-- Fim da div mas de fato o melhor cookie  -->
    <!-- Ingredientes  -->
    <div class = "ingreb">
      <h2>Ingredientes</h2>
        <ul>
          <li>200g de Manteiga ou Margarina</li>
          <li>100g de Açúcar</li>
          <li>120g de Açúcar Mascavo</li>
          <li>1 Ovo</li>
          <li>350g de Farinha</li>
          <li>1/2 colher (sobremesa) de Fermento</li>
          <li>2 Barras de Chocolate</li>
        </ul>
    </div>
    <!-- Fim dos Ingredientes  -->
    <!-- Modo de Preparo  -->
    <div class = "modob">
      <h2>Modo de Preparo</h2>
        <ol>
          <li>Em uma tigela, misture bem a margarina com os açúcares até a mistura ficar mais clara e cremosa.</li>
          <li>Adicione o ovo e mexa até incorporar totalmente à massa.</li>
          <li>Em outra tigela separada, misture a farinha e o fermento e peneire essa mistura sobre a massa preparada.</li>
          <li>Pique as barras de chocolate e reserve uma parte para decorar os cookies depois.</li>
          <li>Misture o chocolate picado à massa até que fique bem distribuído.</li>
          <li>Modele bolinhas com a massa no tamanho desejado, coloque-as em uma assadeira, decore, e leve ao freezer por 12 minutos ou à geladeira por 30 minutos.</li>
          <li>Preaqueça o forno a 200°C por 10 minutos.</li>
          <li>Coloque os cookies no forno por 8 minutos.</li>
          <li>Após reduza a temperatura do forno para 180°C e asse por mais 8 minutos até os cookies ficarem levemente dourados.</li>
        </ol>
    </div>
    <!-- Fim modo de preparo  -->
    <!-- Dicas para nossos cozinheiros  -->
    <div class = "dicas">
      <h2>Dicas</h2>
        <ul>
          <div class = "rece"><a>Se preferir cookies mais crocantes, deixe-os no forno por mais tempo, até que fiquem bem dourados por dentro.</a></div>
          <div class = "rece"><a>Deixe espaço suficiente entre os cookies na assadeira, pois eles se espalham ao assar.</a></div>
          <div class = "rece"><a>Armazene os cookies em um pote fechado para mantê-los frescos por mais tempo.</a></div>
          <div class = "rece"><a>Para um sabor extra, adicione 1 colher de chá de essência de baunilha à massa junto com o ovo.</a></div>
          <div class = "rece"><a>Os cookies podem queimar rapidamente, então observe com atenção enquanto assam. Lembre-se de que cada forno é diferente e os tempos podem variar.</a></div>
        </ul>
    </div>
    <!-- Fim das Dicks -->

    <script src="https://cdn.jsdelivr.net/npm/js-confetti@latest/dist/js-confetti.browser.js"></script>
<script>
const jsConfetti = new JSConfetti({
    canvas: document.querySelector('.confete')
});

window.onload = () => {
    jsConfetti.addConfetti({
        confettiRadius: 6,
        confettiNumber: 150
    });
};

</script>

    <canvas class = "confete"></canvas>

    </div>



    <?php include 'footer.view.php';
 ?>

  </body>
</html>
