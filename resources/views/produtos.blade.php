<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mafius Car - Produtos Automotivos</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f5f5f7;
      margin: 0;
      padding: 0;
      color: #333;
    }
    header {
      background: #111;
      color: white;
      padding: 30px;
      text-align: center;
      position: relative;
    }
    header h1 {
      font-size: 2.5rem;
      margin: 0;
      color: #d4af37;
    }
    header p {
      font-size: 1.1rem;
      margin-top: 8px;
    }
    .back-btn {
      position: absolute;
      left: 20px;
      top: 30px;
      background: #d4af37;
      color: #111;
      padding: 10px 18px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
    }
    .back-btn:hover {
      background: #b8962e;
      color: white;
    }
    .catalogo {
      max-width: 1400px;
      margin: 50px auto;
      padding: 0 20px;
    }
    .catalogo h2 {
      text-align: center;
      font-size: 2rem;
      margin-bottom: 30px;
      color: #111;
    }
    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 25px;
    }
    .card {
      background: #fff;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 6px 15px rgba(0,0,0,0.15);
      transition: transform 0.3s;
    }
    .card:hover {
      transform: translateY(-8px);
    }
    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
    .card-content {
      padding: 20px;
    }
    .card-content h3 {
      font-size: 1.2rem;
      margin-bottom: 10px;
      color: #111;
    }
    .brand {
      font-size: 0.95rem;
      margin-bottom: 8px;
      color: #666;
    }
    .price {
      font-size: 1.1rem;
      font-weight: bold;
      color: #d4af37;
      margin-bottom: 10px;
    }
    footer {
      background: #111;
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 50px;
    }
    footer p {
      margin: 5px 0;
    }
  </style>
</head>
<body>

  <header>
    <a href="/concessionaria" class="back-btn">← Voltar</a>
    <h1>Mafius Car</h1>
    <p>Acessórios e Produtos Automotivos Exclusivos</p>
  </header>

  <section class="catalogo">
    <h2>Produtos Premium</h2>
    <div class="grid">

      <div class="card">
        <img src="https://leopneus.com.br/wp-content/uploads/2025/06/eesportiva20-gt-7.jpg" alt="Roda Esportiva Forgiato 20''">
        <div class="card-content">
          <h3>Roda Esportiva Forgiato 20</h3>
          <p class="brand">Marca: Forgiato</p>
          <p class="price">R$ 18.000,00</p>
        </div>
      </div>

      <div class="card">
        <img src="https://dxm.contentcenter.michelin.com/api/wedia/dam/transform/b98rpyxf61b4xdugq1h3a3861w/4w-240_3528706263095_tire_michelin_pilot-sport-4-s_255-slash-35-zr19-96y-xl_a_main_1-30_nopad.webp?t=resize&height=500" alt="Pneu Michelin Pilot Sport 4S">
        <div class="card-content">
          <h3>Pneu Michelin Pilot Sport 4S</h3>
          <p class="brand">Marca: Michelin</p>
          <p class="price">R$ 3.500,00 (cada)</p>
        </div>
      </div>

      <div class="card">
        <img src="https://http2.mlstatic.com/D_NQ_NP_2X_687082-MLB83286590329_032025-F.webp" alt="Escapamento Esportivo Akrapovič">
        <div class="card-content">
          <h3>Escapamento Esportivo Akrapovič</h3>
          <p class="brand">Marca: Akrapovič</p>
          <p class="price">R$ 28.000,00</p>
        </div>
      </div>

      <div class="card">
        <img src="https://www.mypower.pt/imgs/produtos/gr_67fa085_webpnet_resizeimage_61.jpg" alt="Banco Recaro Sportster CS">
        <div class="card-content">
          <h3>Banco Recaro Sportster CS</h3>
          <p class="brand">Marca: Recaro</p>
          <p class="price">R$ 22.000,00 (par)</p>
        </div>
      </div>

      <div class="card">
        <img src="https://m.media-amazon.com/images/I/5164fVYvwjL.__AC_SX300_SY300_QL70_ML2_.jpg" alt="Volante Momo Performance">
        <div class="card-content">
          <h3>Volante Momo Performance</h3>
          <p class="brand">Marca: MOMO</p>
          <p class="price">R$ 8.500,00</p>
        </div>
      </div>

      <div class="card">
        <img src="https://www.nissan-cdn.net/content/dam/Nissan/br/site/veiculos/sentra-my25/premium-excitement/sistema_bose.webp.ximg.l_6_h.smart.webp" alt="Sistema de Som Bose Premium">
        <div class="card-content">
          <h3>Sistema de Som Bose Premium</h3>
          <p class="brand">Marca: Bose</p>
          <p class="price">R$ 35.000,00</p>
        </div>
      </div>

      <div class="card">
        <img src="https://s3.us-east-2.amazonaws.com/main.s3.atacadaoec.astrus/tb_estrutura_produtos/1363/agm-moura_4d8d1bfa84d399f1ada99956efbc42c0.webp" alt="Bateria Moura AGM Start-Stop">
        <div class="card-content">
          <h3>Bateria Moura AGM Start-Stop</h3>
          <p class="brand">Marca: Moura</p>
          <p class="price">R$ 2.200,00</p>
        </div>
      </div>

      <div class="card">
        <img src="https://http2.mlstatic.com/D_NQ_NP_2X_670097-MLB79136035085_092024-F.webp" alt="Óleo Mobil 1 Racing 5W-50">
        <div class="card-content">
          <h3>Óleo Mobil 1 Racing 5W-50</h3>
          <p class="brand">Marca: Mobil</p>
          <p class="price">R$ 450,00 (Lata 5L)</p>
        </div>
      </div>

    </div>
  </section>

  <footer>
    <p>&copy; 2025 LuxMotors - Produtos Automotivos de Luxo</p>
    <p>Av. das Nações, 123 - São Paulo, SP</p>
  </footer>

</body>
</html>