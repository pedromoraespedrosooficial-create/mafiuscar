<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mafius Car - Mecânica de Luxo</title>
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
      max-width: 1200px;
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
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 25px;
    }
    .card {
      background: #fff;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 6px 15px rgba(0,0,0,0.15);
      transition: transform 0.3s;
      padding: 20px;
    }
    .card:hover {
      transform: translateY(-8px);
    }
    .card h3 {
      font-size: 1.3rem;
      margin-bottom: 10px;
      color: #111;
    }
    .desc {
      font-size: 0.95rem;
      margin-bottom: 8px;
      color: #555;
    }
    .price {
      font-size: 1.1rem;
      font-weight: bold;
      color: #d4af37;
      margin-top: 10px;
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
    <p>Mecânica de Luxo & Performance</p>
  </header>

  <section class="catalogo">
    <h2>Serviços Premium</h2>
    <div class="grid">

      <div class="card">
        <h3>Revisão Completa de Luxo</h3>
        <p class="desc">Inspeção completa de motor, freios, câmbio, suspensão e eletrônica com scanner avançado.</p>
        <p class="price">R$ 7.500,00</p>
      </div>

      <div class="card">
        <h3>Troca de Óleo Mobil 1 Racing</h3>
        <p class="desc">Troca de óleo premium 100% sintético e filtro original homologado.</p>
        <p class="price">R$ 1.200,00</p>
      </div>

      <div class="card">
        <h3>Manutenção de Suspensão Esportiva</h3>
        <p class="desc">Ajuste e troca de amortecedores eletrônicos, molas e calibragem personalizada.</p>
        <p class="price">R$ 12.000,00</p>
      </div>

      <div class="card">
        <h3>Upgrade de Freios Brembo</h3>
        <p class="desc">Instalação de freios Brembo Carbon Ceramic para máxima performance.</p>
        <p class="price">R$ 38.000,00</p>
      </div>

      <div class="card">
        <h3>Detailing Automotivo</h3>
        <p class="desc">Tratamento completo de pintura, polimento técnico e proteção com vitrificação cerâmica.</p>
        <p class="price">R$ 8.500,00</p>
      </div>

      <div class="card">
        <h3>Remapeamento de Motor (Stage 1)</h3>
        <p class="desc">Aumento de potência com ajuste eletrônico de ECU, testado em dinamômetro.</p>
        <p class="price">R$ 15.000,00</p>
      </div>

      <div class="card">
        <h3>Troca de Pneus Michelin Sport 4S</h3>
        <p class="desc">Substituição por pneus Michelin Pilot Sport de alta performance.</p>
        <p class="price">R$ 14.000,00 (jogo)</p>
      </div>

      <div class="card">
        <h3>Instalação de Escapamento Akrapovič</h3>
        <p class="desc">Exaustão esportiva de titânio com redução de peso e som exclusivo.</p>
        <p class="price">R$ 32.000,00</p>
      </div>

    </div>
  </section>

  <footer>
    <p>&copy; 2025 LuxMotors - Mecânica de Luxo</p>
    <p>Av. das Nações, 123 - São Paulo, SP</p>
  </footer>

</body>
</html>
