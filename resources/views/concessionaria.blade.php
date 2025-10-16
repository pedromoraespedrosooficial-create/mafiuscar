<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title> Mafius Car — Concessionária de Luxo</title>
<style>
  /* ======== RESET & BASE ======== */
  :root{
    --bg:#ffffff;
    --text:#0b0b0b;
    --muted:#6b6b6b;
    --accent:#b28a00; /* gold */
    --accent-dark:#997400;
    --card-bg: #faf9f8;
    --glass: rgba(255,255,255,0.6);
    --shadow: 0 8px 30px rgba(11,11,11,0.08);
    --radius: 14px;
    --img-size: 220px; /* default card image size for grid */
    --font-sans: "Inter", "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
  }
  *{box-sizing:border-box}
  html,body{height:100%}
  body{
    margin:0;
    font-family:var(--font-sans);
    background:var(--bg);
    color:var(--text);
    -webkit-font-smoothing:antialiased;
    -moz-osx-font-smoothing:grayscale;
    padding:28px;
  }

  /* ======== LAYOUT ======== */
  header{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:18px;
    margin-bottom:22px;
  }
  .brand{
    display:flex;
    gap:12px;
    align-items:center;
  }
  .logo{
    width:64px;
    height:64px;
    border-radius:12px;
    background:linear-gradient(135deg,#000,#111);
    display:flex;
    align-items:center;
    justify-content:center;
    color:var(--accent);
    font-weight:800;
    font-size:20px;
    box-shadow:var(--shadow);
    border:2px solid rgba(0,0,0,0.06);
  }
  .brand h1{margin:0;font-size:20px;letter-spacing:0.6px;}
  .brand p{margin:0;font-size:12px;color:var(--muted)}

  nav.buttons{
    display:flex;
    gap:10px;
    align-items:center;
  }
  .btn{
    padding:10px 14px;
    border-radius:10px;
    border:1px solid rgba(0,0,0,0.08);
    background:transparent;
    cursor:pointer;
    font-weight:600;
    transition:all .18s ease;
    color: black;
  }
  .btn.primary{
    background:linear-gradient(90deg,var(--accent),var(--accent-dark));
    color:#111;
    box-shadow: 0 6px 18px rgba(178,138,0,0.18);
    border:none;
  }
  .btn.ghost{background:transparent}
  .btn:hover{transform:translateY(-3px)}

  /* ======== CONTROLS ======== */
  .controls{
    display:flex;
    gap:12px;
    align-items:center;
    margin-bottom:18px;
    flex-wrap:wrap;
  }
  .search{
    flex:1;
    min-width:220px;
    display:flex;
    gap:8px;
    align-items:center;
  }
  .search input, .controls select, .controls .range{
    padding:10px 12px;
    border-radius:10px;
    border:1px solid rgba(0,0,0,0.08);
    font-size:14px;
    outline:none;
  }

  .toggles{
    display:flex;
    gap:8px;
    align-items:center;
  }
  .counter{
    font-size:14px;
    color:var(--muted);
    margin-left:8px;
  }

  /* ======== GRID/LIST ======== */
  .catalog{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(320px,1fr));
    gap:18px;
  }
  .card{
    background:var(--card-bg);
    border-radius:var(--radius);
    box-shadow:var(--shadow);
    overflow:hidden;
    display:flex;
    flex-direction:column;
    transition:transform .16s ease, box-shadow .16s ease;
    border:1px solid rgba(0,0,0,0.04);
  }
  .card:hover{transform:translateY(-6px)}
  .card .media{
    width:100%;
    height:var(--img-size);
    overflow:hidden;
    display:flex;
    align-items:center;
    justify-content:center;
    background:linear-gradient(180deg, rgba(0,0,0,0.02), rgba(0,0,0,0.02));
  }
  .card .media img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
    transition:transform .5s ease;
  }
  .card .body{
    padding:14px;
    display:flex;
    gap:12px;
    flex-direction:column;
    flex:1;
  }
  .card .meta{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:10px;
  }
  .title{
    font-weight:700;
    font-size:16px;
    margin:0;
  }
  .price{
    color:var(--accent);
    font-weight:800;
  }
  .specs{
    font-size:13px;
    color:var(--muted);
    display:flex;
    gap:8px;
    flex-wrap:wrap;
    margin-top:8px;
  }
  .card .actions{
    margin-top:12px;
    display:flex;
    gap:8px;
  }

  .badge{
    background:rgba(0,0,0,0.03);
    color:var(--muted);
    padding:6px 8px;
    border-radius:8px;
    font-weight:600;
    font-size:12px;
  }

  /* LIST VIEW adjustments */
  body.list-view .catalog{
    display:flex;
    flex-direction:column;
  }
  body.list-view .card{
    flex-direction:row;
    gap:12px;
    height:180px;
    align-items:center;
  }
  body.list-view .card .media{
    width:260px;
    height:100%;
    flex:0 0 260px;
    border-radius:12px;
    margin-left:12px;
  }
  body.list-view .card .body{
    padding:12px 18px;
    flex:1;
  }

  /* responsive */
  @media (max-width:900px){
    .brand h1{font-size:18px}
    body.list-view .card{height:160px}
  }

  /* DETAILS MODAL */
  .modal-backdrop{
    position:fixed;
    inset:0;
    background:rgba(11,11,11,0.5);
    display:none;
    align-items:center;
    justify-content:center;
    z-index:60;
    padding:28px;
  }
  .modal{
    width:min(1100px,98%);
    background:linear-gradient(180deg,#fff,#fbfbfb);
    border-radius:16px;
    box-shadow:0 20px 60px rgba(0,0,0,0.35);
    display:flex;
    overflow:hidden;
  }
  .modal .left{
    flex:1;
    min-width:420px;
  }
  .modal .left img{width:100%;height:100%;object-fit:cover;display:block}
  .modal .right{
    flex:1;
    padding:24px;
    display:flex;
    flex-direction:column;
    gap:12px;
  }
  .close{
    margin-left:auto;
    background:transparent;
    border:none;
    font-size:18px;
    cursor:pointer;
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
    a{
      text-decoration: none; /* remove o sublinhado */
    }

  /* small helpers */
  .muted{color:var(--muted);font-size:13px}
  .grid-icon{width:36px;height:36px;border-radius:8px;border:1px solid rgba(0,0,0,0.06);display:inline-flex;align-items:center;justify-content:center}
  footer{margin-top:20px;color:var(--muted);font-size:13px;text-align:center}
</style>
</head>
<body>

<header>
  <div class="brand">
    <div class="logo">MC</div>
    <div>
      <h1>Mafius Car</h1>
      <p>Concessionária & Atelier de Performance — Luxo, Exclusividade, Paixão</p>
    </div>
  </div>

  <nav class="buttons">
    <a href="/produtos" class="btn">Produtos</a>
    <a href="/mecanica" class="btn">Mecanica</a>
    <button class="btn">Nosso Acervo</button>
    <button class="btn">Sobre Nós</button>
    <button class="btn primary">Agende uma Visita</button>
    </div>
    <div class="counter" id="count"><br>Carros encontrados: 0</div>
  </div>
  </nav>
</header>

<section class="controls">
  <div class="search">
    <input id="topSearch" placeholder="Pesquisar marca, modelo, ano, potência..." oninput="applyFilters()" />
    <select id="brandFilter" onchange="applyFilters()">
      <option value="">Todas as marcas</option>
    </select>
    <select id="viewToggle" onchange="toggleView(this.value)">
      <option value="grid">Grade</option>
      <option value="list">Lista</option>
    </select>
  </div>

  <div style="display:flex;gap:10px;align-items:center;">
    <label class="muted">Preço até</label>
    <input id="priceMax" class="range" type="number" placeholder="US$ max" oninput="applyFilters()" style="width:120px"/>
  </div>

  <div style="display:flex;gap:10px;align-items:center;">
    <label class="muted">Ano ≥</label>
    <input id="yearMin" class="range" type="number" placeholder="Ano" oninput="applyFilters()" style="width:100px"/>
  </div>

  <div class="toggles">
    <div class="grid-icon" title="ordenar">
      <select id="sortBy" onchange="applyFilters()" style="border:none;background:transparent">
        <option value="relevance">Mais relevantes</option>
        <option value="priceAsc">Preço ↑</option>
        <option value="priceDesc">Preço ↓</option>
        <option value="vmaxDesc">Vmax ↓</option>
        <option value="yearDesc">Ano ↓</option>
        <br>
      </select>
</section>

<main>
  <section id="catalog" class="catalog" aria-live="polite">
    </section>
</main>

<footer>
  © <strong>Mafius Car</strong> — Crafted for connoisseurs. &nbsp; Design: Preto & Dourado • Fundo branco
</footer>

<div id="modalBackdrop" class="modal-backdrop" onclick="closeModal(event)">
  <div class="modal" role="dialog" aria-modal="true" onclick="event.stopPropagation()">
    <div class="left">
      <img id="modalImg" src="" alt="imagem do carro">
    </div>
    <div class="right">
      <div style="display:flex;gap:12px;align-items:center;">
        <h2 id="modalTitle" style="margin:0"></h2>
        <button class="close" onclick="closeModal()">✕</button>
      </div>
      <div class="muted" id="modalPremium"></div>
      <div style="display:flex;gap:12px;flex-wrap:wrap;">
        <div class="badge" id="modalPrice"></div>
        <div class="badge" id="modalYear"></div>
        <div class="badge" id="modalPower"></div>
        <div class="badge" id="modalVmax"></div>
      </div>

      <p id="modalSummary" style="margin-top:10px"></p>

      <div style="display:flex;gap:10px;margin-top:auto;">
        <button class="btn primary" onclick="agendarTeste()">Agendar Teste</button>
        <button class="btn" onclick="openSpecs()">Ver Especificações</button>
      </div>

      <hr style="border:none;border-top:1px solid rgba(0,0,0,0.06);margin-top:12px">

      <div id="modalSpecs" class="muted" style="font-size:13px"></div>
    </div>
  </div>
</div>

<script>
// =================================================================================
// DADOS DOS CARROS - EDITE AQUI
// Cada carro é um objeto {}. Para alterar a imagem, troque o link na propriedade `img`.
// =================================================================================
const carData = [
  /* Lamborghini */
  { marca: "Lamborghini", model: "Aventador SVJ", ano: 2018, priceUSD: 517000, summary: "Superesportivo de alta performance com aerodinâmica avançada e tração integral.", potencia: "770 cv", zeroCem: "2.8 s", vmax: "350 km/h", motor: "V12 6.5L", img: "https://s2-autoesporte.glbimg.com/M3LP5O96N2cTgeaDSo-hWf8rxfg=/0x0:1280x853/888x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2021/X/S/SSjzBeSoaAQessJx6xJg/lambofrente.jpg" },
  { marca: "Lamborghini", model: "Aventador J", ano: 2012, priceUSD: 2800000, summary: "Um one-off radical sem teto ou para-brisa, a experiência de condução mais extrema.", potencia: "700 cv", zeroCem: "2.9 s", vmax: "300+ km/h", motor: "V12 6.5L", img: "https://cdn-ds.com/blogs-media/sites/94/2019/07/02092242/Lamborghini-Aventador-J__2_o.jpg" },
  /* === LAMBORGHINI: A DINASTIA AVENTADOR === */
{ marca: "Lamborghini", model: "Aventador LP700-4", ano: 2011, priceUSD: 400000, summary: "O sucessor do Murciélago. O início de uma nova era para os V12 da Lamborghini, com chassi de fibra de carbono.", potencia: "700 cv", zeroCem: "2.9 s", vmax: "350 km/h", motor: "V12 6.5L", img: "https://lh7-us.googleusercontent.com/GV7hHsBDC5mnOr2SA_FzYzRqBHJ-puX0NJYjzXnjlNCfM7eZz01oaJ4osE3y6C4ap00BJHBceQ0zntldvcJE82nJ_nhyh39DJpSLxLaaUNixdFW1R4PPxb_JWxw1xvQVy-eDFpfVcQ3tT3Br-rxuuvs" },
{ marca: "Lamborghini", model: "Aventador LP700-4 Roadster", ano: 2013, priceUSD: 445000, summary: "A experiência visceral do Aventador com a emoção de um teto removível de duas peças em carbono.", potencia: "700 cv", zeroCem: "3.0 s", vmax: "350 km/h", motor: "V12 6.5L", img: "https://images.collectingcars.com/021168/main-.jpg?w=1263&fit=fillmax&crop=edges&auto=format,compress&cs=srgb&q=85" },
{ marca: "Lamborghini", model: "Aventador S LP740-4", ano: 2017, priceUSD: 421000, summary: "A evolução do Aventador, com mais potência, aerodinâmica aprimorada e o inovador sistema de rodas traseiras direcionais.", potencia: "740 cv", zeroCem: "2.9 s", vmax: "350 km/h", motor: "V12 6.5L", img: "https://i.ytimg.com/vi/lPgR0C3NwnE/maxresdefault.jpg" },
{ marca: "Lamborghini", model: "Aventador S Roadster", ano: 2017, priceUSD: 460000, summary: "Combina as inovações do Aventador S com a liberdade da versão Roadster.", potencia: "740 cv", zeroCem: "3.0 s", vmax: "350 km/h", motor: "V12 6.5L", img: "https://www.amarisupercars.com/blobs/stock/1241235/images/05959036-47dd-433d-b4ba-4b434ee42721.jpg?width=2000&height=1333" },
{ marca: "Lamborghini", model: "Aventador LP750-4 SV", ano: 2015, priceUSD: 750000, summary: "O 'SuperVeloce'. Mais leve, mais potente e focado em performance de pista. Um ícone de agressividade.", potencia: "750 cv", zeroCem: "2.8 s", vmax: "350 km/h", motor: "V12 6.5L", img: "https://quatrorodas.abril.com.br/wp-content/uploads/2016/11/5658cb77cc505d14c8328e03671-lambo-01.jpeg?quality=70&strip=info&resize=1080,565&crop=1" },
{ marca: "Lamborghini", model: "Aventador LP750-4 SV Roadster", ano: 2016, priceUSD: 850000, summary: "A fúria do SuperVeloce a céu aberto. Limitado a apenas 500 unidades.", potencia: "750 cv", zeroCem: "2.9 s", vmax: "350 km/h", motor: "V12 6.5L", img: "https://www.the-lowdown.com/wp-content/uploads/2015/09/lambo-sv-roadster-13.jpg" },
{ marca: "Lamborghini", model: "Aventador LP780-4 Ultimae", ano: 2021, priceUSD: 550000, summary: "A edição final da era Aventador. A fusão perfeita entre a performance do SVJ e a elegância do S.", potencia: "780 cv", zeroCem: "2.8 s", vmax: "355 km/h", motor: "V12 6.5L", img: "https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/facelift_2019/model_detail/aventador/Ultimae/2023/02_21/aven_ultimae_s_02_m.jpg" },
{ marca: "Lamborghini", model: "Aventador LP780-4 Ultimae Roadster", ano: 2021, priceUSD: 600000, summary: "A despedida do V12 aspirado puro em um roadster. O capítulo final de uma lenda.", potencia: "780 cv", zeroCem: "2.9 s", vmax: "355 km/h", motor: "V12 6.5L", img: "https://uploads.diariodopoder.com.br/2021/07/0400e97d-lamborghini-aventador_lp780-4_ultimae_roadster-2022-1600-01-960x640.jpg" },
  { marca: "Lamborghini", model: "Huracan STO", ano: 2021, priceUSD: 331000, summary: "Versão track-focused do Huracan, leve e precisa.", potencia: "640 cv", zeroCem: "3.0 s", vmax: "310 km/h", motor: "V10 5.2L", img: "https://cdn.motor1.com/images/mgl/zPRQ7/s1/lamborghini-huracan-sto.webp" },
  { marca: "Lamborghini", model: "Huracán LP610-4", ano: 2014, priceUSD: 240000, summary: "O sucessor do Gallardo. Introduziu um chassi híbrido de alumínio e carbono e um design mais moderno.", potencia: "610 cv", zeroCem: "3.2 s", vmax: "325 km/h", motor: "V10 5.2L", img: "https://www.lamborghinilongisland.com/imagetag/1564/main/l/New-2015-Lamborghini-Huracan-LP-610-4-1441396357.jpg" },
{ marca: "Lamborghini", model: "Huracán LP580-2", ano: 2016, priceUSD: 205000, summary: "A versão purista do Huracán, com tração apenas traseira para uma experiência de pilotagem mais desafiadora.", potencia: "580 cv", zeroCem: "3.4 s", vmax: "320 km/h", motor: "V10 5.2L", img: "https://cdn.prod.website-files.com/5b4a3b3971d099f78f362505/65d54acd15b7df75b60e3502_2016-Lamborghini-Huracan-580-2%20Coupe-Red-ZHWUC2ZF2GLA04856_012.webp" },
{ marca: "Lamborghini", model: "Huracán Evo", ano: 2019, priceUSD: 261000, summary: "A evolução do Huracán, com a potência do Performante, rodas traseiras direcionais e um novo cérebro eletrônico (LDVI).", potencia: "640 cv", zeroCem: "2.9 s", vmax: "325 km/h", motor: "V10 5.2L", img: "https://s2-autoesporte.glbimg.com/ok_hAXxmpfPIjNfY8KljUAUwstQ=/0x0:620x413/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2020/x/f/QFDrleRJCNQwmhk0GCHg/2019-01-08-lamborghini-huracan-evo-2019-1600-01.jpg" },
{ marca: "Lamborghini", model: "Huracán Evo Spyder", ano: 2019, priceUSD: 287000, summary: "Toda a tecnologia e potência do Huracán Evo com a emoção de um teto de lona retrátil.", potencia: "640 cv", zeroCem: "3.1 s", vmax: "325 km/h", motor: "V10 5.2L", img: "https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202506/20250610/lamborghini-huracan-5-2-v10-gasolina-lp-640-evo-spyder-ldf-wmimagem21561510235.webp" },
{ marca: "Lamborghini", model: "Huracán Tecnica", ano: 2022, priceUSD: 280000, summary: "O ponto de equilíbrio perfeito, combinando a usabilidade do Evo RWD com a performance de pista do STO.", potencia: "640 cv", zeroCem: "3.2 s", vmax: "325 km/h", motor: "V10 5.2L", img: "https://s2-autoesporte.glbimg.com/N4d-m709GuXGEZaLKHdnOYtG6zQ=/0x0:1920x1133/888x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2022/s/N/pGZdU4ROqjK9fLWt8LsQ/2022-lamborghini-huracan-tecnica-00001.jpg" },
{ marca: "Lamborghini", model: "Huracán Performante", ano: 2017, priceUSD: 330000, summary: "Mais leve, mais potente e com o inovador sistema de aerodinâmica ativa 'ALA'. Quebrou o recorde de Nürburgring.", potencia: "640 cv", zeroCem: "2.9 s", vmax: "325 km/h", motor: "V10 5.2L", img: "https://www.webmotors.com.br/wp-content/uploads/2018/02/14160447/2-lamborghini-huracan_performante-2018-1600-06.jpg" },
{ marca: "Lamborghini", model: "Huracán Performante Spyder", ano: 2018, priceUSD: 360000, summary: "A performance recordista do Performante com a experiência de dirigir a céu aberto.", potencia: "640 cv", zeroCem: "3.1 s", vmax: "325 km/h", motor: "V10 5.2L", img: "https://classic.exame.com/wp-content/uploads/2018/09/lamborghini-huracan-performante-spyder-1.jpg" },
{ marca: "Lamborghini", model: "Huracán Sterrato", ano: 2023, priceUSD: 300000, summary: "Um supercarro V10 projetado para se divertir fora do asfalto, com suspensão elevada e pneus de rali.", potencia: "610 cv", zeroCem: "3.4 s", vmax: "260 km/h", motor: "V10 5.2L", img: "https://www.topgear.com/sites/default/files/2023/05/1%20Lamborghini%20Huracan%20Sterrato.jpg" },
{ marca: "Lamborghini", model: "Huracán Super Trofeo EVO2", ano: 2022, priceUSD: 380000, summary: "O carro de corrida usado no campeonato monomarca da Lamborghini. Pura performance de pista.", potencia: "620 cv", zeroCem: "2.9 s", vmax: "300+ km/h", motor: "V10 5.2L", img: "https://www.planetcarsz.com/assets/uploads/2021/05/f3741a8d0d30d897cb996280aab4030a.jpg" },
  { marca: "Lamborghini", model: "Murcielago SV", ano: 2009, priceUSD: 400000, summary: "Ícone da Lamborghini com design agressivo e desempenho extremo.", potencia: "670 cv", zeroCem: "3.4 s", vmax: "342 km/h", motor: "V12 6.2L", img: "http://global.discourse-cdn.com/forza/original/4X/f/b/e/fbe5410313385e55e48c35234b61f230f2d95b70.jpeg" },
  { marca: "Lamborghini", model: "Murciélago LP640", ano: 2006, priceUSD: 250000, summary: "A primeira grande atualização do Murciélago, com design renovado e um motor V12 mais potente.", potencia: "640 cv", zeroCem: "3.4 s", vmax: "340 km/h", motor: "V12 6.5L", img: "https://media.carsandbids.com/cdn-cgi/image/width=2080,quality=70/171ab1e538119e13fa98382f268326fc825fdc20/photos/9aBLAJ5o-PtHAdjIE6I-(edit).jpg?t=169812312755" },
{ marca: "Lamborghini", model: "Murciélago LP670-4 SuperVeloce", ano: 2009, priceUSD: 450000, summary: "A despedida do Murciélago. Mais leve, mais potente e com uma aerodinâmica radical. A versão 'China Edition' é ainda mais rara.", potencia: "670 cv", zeroCem: "3.2 s", vmax: "342 km/h", motor: "V12 6.5L", img: "https://i.pinimg.com/736x/73/75/fe/7375febb470fbb220eb31a18b1fddbe7.jpg" },
{ marca: "Lamborghini", model: "Murciélago 40th Anniversary", ano: 2003, priceUSD: 350000, summary: "Edição comemorativa de 40 anos da marca (50 unidades), na exclusiva cor Verde Artemis.", potencia: "580 cv", zeroCem: "3.8 s", vmax: "330 km/h", motor: "V12 6.2L", img: "https://bringatrailer.com/wp-content/uploads/2022/03/2003_lamborghini_murcielago_lambo_011_web-50031.jpg" },
  { marca: "Lamborghini", model: "Gallardo", ano: 2012, priceUSD: 200000, summary: "Superesportivo popular, equilibrado e confiável.", potencia: "570 cv", zeroCem: "3.8 s", vmax: "325 km/h", motor: "V10 5.2L", img: "https://revistacarro.com.br/wp-content/uploads/2018/05/lamborghini-gallardo_lp570-4_superleggera_2011_1280x960_wallpaper_06.jpg" },
  { marca: "Lamborghini", model: "Gallardo LP560-4", ano: 2008, priceUSD: 180000, summary: "O facelift do Gallardo, com novo design, injeção direta de combustível e um salto significativo em potência.", potencia: "560 cv", zeroCem: "3.7 s", vmax: "325 km/h", motor: "V10 5.2L", img: "https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/masterpieces/gallardo-lp-550-2-2/Gallardo%20LP%20550-2-HEADER.jpg" },
{ marca: "Lamborghini", model: "Gallardo LP550-2 Valentino Balboni", ano: 2009, priceUSD: 220000, summary: "Homenagem ao lendário piloto de testes. Uma edição limitada com tração traseira e uma faixa icônica.", potencia: "550 cv", zeroCem: "3.9 s", vmax: "320 km/h", motor: "V10 5.2L", img: "https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/masterpieces/gallardo-balboni/HEADER.jpg" },
{ marca: "Lamborghini", model: "Gallardo LP570-4 Superleggera", ano: 2010, priceUSD: 240000, summary: "A segunda geração 'Superleggera', ainda mais leve e potente, focada em performance de pista.", potencia: "570 cv", zeroCem: "3.4 s", vmax: "325 km/h", motor: "V10 5.2L", img: "https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202509/20250928/lamborghini-gallardo-5.2-v10-gasolina-lp5704-superleggera-egear-WMIMAGEM17340961580.jpg" },
{ marca: "Lamborghini", model: "Gallardo LP570-4 Squadra Corse", ano: 2013, priceUSD: 260000, summary: "A edição final do Gallardo, baseada no carro de corrida Super Trofeo, com uma asa traseira gigante de carbono.", potencia: "570 cv", zeroCem: "3.4 s", vmax: "320 km/h", motor: "V10 5.2L", img: "https://exclusivecarregistry.com/images/cars/preview/thumb_26136.jpg" },
  { marca: "Lamborghini", model: "Centenario", ano: 2016, priceUSD: 1900000, summary: "Edição limitada com visual futurista e performance de topo.", potencia: "770 cv", zeroCem: "2.8 s", vmax: "350 km/h", motor: "V12 6.5L", img: "https://i.pinimg.com/736x/bf/e7/84/bfe7848ba358315e413d6d1a542710b7.jpg" },
  { marca: "Lamborghini", model: "Veneno", ano: 2013, priceUSD: 14000000, summary: "Extremamente raro e focado em performance.", potencia: "750 cv", zeroCem: "2.9 s", vmax: "355 km/h", motor: "V12 6.5L", img: "https://www.super-hobby.nl/zdjecia/6/9/1/10403_rd.jpg" },
  { marca: "Lamborghini", model: "Diablo", ano: 1990, priceUSD: 300000, summary: "Clássico superesportivo dos anos 90.", potencia: "580 cv", zeroCem: "4.0 s", vmax: "325 km/h", motor: "V12 5.7L", img: "https://revistafullpower.com.br/wp-content/uploads/2024/01/diablo-trump01.jpg" },
  { marca: "Lamborghini", model: "Urus", ano: 2018, priceUSD: 225000, summary: "SUV super desportivo com DNA da marca.", potencia: "650 cv", zeroCem: "3.6 s", vmax: "305 km/h", motor: "V8 4.0L biturbo", img: "https://s2-autoesporte.glbimg.com/v-F6iahPMLL8vpBHqUeK0_dg5gE=/0x0:1980x1297/924x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2022/2/T/d44Td5TVyhPzPEdyatBA/lamborghini-urus-s-3-.jpg" },
  { marca: "Lamborghini", model: "Sian", ano: 2019, priceUSD: 3000000, summary: "Híbrido limitado da Lamborghini, tecnologia e performance.", potencia: "819 cv", zeroCem: "2.8 s", vmax: "350 km/h", motor: "V12 6.5L híbrido", img: "https://hips.hearstapps.com/hmg-prod/images/2021-lamborghini-sian-121-1614969494.jpg?crop=0.667xw:0.500xh;0.276xw,0.375xh&resize=1200:*" },
  { marca: "Lamborghini", model: "Revuelto", ano: 2023, priceUSD: 600000, summary: "Sucessor moderno do Aventador com propulsão híbrida.", potencia: "830 cv", zeroCem: "2.6 s", vmax: "350+ km/h", motor: "V12 6.5L híbrido", img: "https://s2-autoesporte.glbimg.com/YU636hPSoMIip99QQFCNgf1qQkc=/0x0:1600x1066/888x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2023/F/g/3AQK2vScKHNDiBk1DM8w/lambo-revuelto-1.jpg" },
  { marca: "Lamborghini", model: "Countach LPI 800-4", ano: 2021, priceUSD: 2000000, summary: "Ressurreição moderna do icônico Countach.", potencia: "455 cv", zeroCem: "3.4 s", vmax: "309 km/h", motor: "V12 5.2L", img: "https://revistacarro.com.br/wp-content/uploads/2021/08/Lamborghini-Countach-2022_2.jpg" },
  /* === LAMBORGHINI: ONE-OFFS E PROJETOS ESPECIAIS === */
{ marca: "Lamborghini", model: "Essenza SCV12", ano: 2020, priceUSD: 2600000, summary: "Hypercar exclusivo para as pistas (40 unidades), com o motor V12 aspirado mais potente já feito pela Lamborghini.", potencia: "830 cv", zeroCem: "2.6 s", vmax: "330+ km/h", motor: "V12 6.5L", img: "https://s2-autoesporte.glbimg.com/kSOsmL3l8dcri8pjvqdJh5zEX6U=/0x0:620x413/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2020/Q/i/iL95LYT3K16FRQUVWlhQ/2020-07-29-lamborghini-essenza-scv12-102.jpeg" },
{ marca: "Lamborghini", model: "SC18 Alston", ano: 2018, priceUSD: 7000000, summary: "O primeiro one-off da Squadra Corse, um Aventador SVJ de rua com aerodinâmica de carro de corrida.", potencia: "770 cv", zeroCem: "2.8 s", vmax: "350+ km/h", motor: "V12 6.5L", img: "https://quatrorodas.abril.com.br/wp-content/uploads/2018/11/526147-e1542408320105.jpg?quality=70&strip=info&w=720&crop=1" },
{ marca: "Lamborghini", model: "SC20", ano: 2020, priceUSD: 6000000, summary: "Um roadster único, sem para-brisa, criado pela Squadra Corse para uma experiência de pilotagem extrema.", potencia: "770 cv", zeroCem: "2.8 s", vmax: "350+ km/h", motor: "V12 6.5L", img: "https://cdn.motor1.com/images/mgl/2WwGK/s1/lamborghini-sc20.jpg" },
{ marca: "Lamborghini", model: "Invencible", ano: 2023, priceUSD: 5000000, summary: "Coupé one-off de despedida do Aventador e do V12 puro, com design que celebra a história da marca.", potencia: "780 cv", zeroCem: "2.8 s", vmax: "355 km/h", motor: "V12 6.5L", img: "https://autoentusiastas.com.br/ae/wp-content/uploads/2023/02/Lamborghini-Invencible-2023-1280-01.jpg" },
{ marca: "Lamborghini", model: "Auténtica", ano: 2023, priceUSD: 5000000, summary: "Roadster one-off, 'irmão' do Invencible, marcando o fim de uma era para o V12 aspirado da Lamborghini.", potencia: "780 cv", zeroCem: "2.9 s", vmax: "355 km/h", motor: "V12 6.5L", img: "https://i0.wp.com/asphalt9.info/wp-content/uploads/2024/10/Asphalt-Legends-Unite-Lamborghini-Autentica.jpg?fit=1200%2C672&ssl=1" },

/* === LAMBORGHINI: CLÁSSICOS E FUNDADORES === */
{ marca: "Lamborghini", model: "350 GT", ano: 1964, priceUSD: 750000, summary: "O primeiro carro de produção da Lamborghini. Um elegante GT que nasceu do desejo de Ferruccio de superar a Ferrari.", potencia: "280 cv", zeroCem: "6.8 s", vmax: "254 km/h", motor: "V12 3.5L", img: "https://s2-autoesporte.glbimg.com/4ya4Fxsy5_RjkiLx0R025wYo8fM=/0x0:620x413/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2020/h/g/SyUnF4RJCJLEO9gkmbrg/2017-02-09-dianteiralambo.jpg" },
{ marca: "Lamborghini", model: "Espada", ano: 1968, priceUSD: 200000, summary: "Um revolucionário GT de quatro lugares com design de Marcello Gandini e a potência de um motor V12 dianteiro.", potencia: "325 cv", zeroCem: "6.5 s", vmax: "250 km/h", motor: "V12 3.9L", img: "https://upload.wikimedia.org/wikipedia/commons/6/63/Lamborghini-Espada.jpg" },
{ marca: "Lamborghini", model: "Jarama", ano: 1970, priceUSD: 150000, summary: "O GT 2+2 favorito de Ferruccio Lamborghini. Um carro de luxo potente e discreto.", potencia: "350 cv", zeroCem: "6.8 s", vmax: "260 km/h", motor: "V12 3.9L", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Lamborghini_Jarama_at_AutoItalia_Brooklands_May_2012_1-cropped.jpg/1200px-Lamborghini_Jarama_at_AutoItalia_Brooklands_May_2012_1-cropped.jpg" },
{ marca: "Lamborghini", model: "Urraco P250", ano: 1972, priceUSD: 100000, summary: "O 'mini-Miura'. Um esportivo 2+2 com motor V8 central-traseiro, projetado para ser mais acessível.", potencia: "220 cv", zeroCem: "6.9 s", vmax: "240 km/h", motor: "V8 2.5L", img: "https://upload.wikimedia.org/wikipedia/commons/e/ef/Lamborghini_Urraco_P111_%28France%29.jpg" },
{ marca: "Lamborghini", model: "Jalpa", ano: 1981, priceUSD: 120000, summary: "O último esportivo V8 da Lamborghini até a era moderna. Um 'baby-Lambo' com teto targa.", potencia: "255 cv", zeroCem: "6.0 s", vmax: "234 km/h", motor: "V8 3.5L", img: "http://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Paris_-_RM_Sotheby%E2%80%99s_2018_-_Lamborghini_Jalpa_-_1985_-_001.jpg/1200px-Paris_-_RM_Sotheby%E2%80%99s_2018_-_Lamborghini_Jalpa_-_1985_-_001.jpg" },
{ marca: "Lamborghini", model: "LM002", ano: 1986, priceUSD: 400000, summary: "O 'Rambo Lambo'. O primeiro SUV da marca, com o motor V12 do Countach e capacidade off-road militar.", potencia: "450 cv", zeroCem: "7.8 s", vmax: "210 km/h", motor: "V12 5.2L", img: "https://upload.wikimedia.org/wikipedia/commons/e/e3/Lamborghini_LM002_Gen1_Type129_1986-1993_1988_frontleft_2013-03-17_U.JPG" },

/* === LAMBORGHINI: CONCEITOS E PROTÓTIPOS === */
{ marca: "Lamborghini", model: "Egoista", ano: 2013, priceUSD: 117000000, summary: "Conceito monoposto criado para o 50º aniversário da marca, inspirado em um caça a jato.", potencia: "600 cv", zeroCem: "2.9 s", vmax: "325 km/h", motor: "V10 5.2L", img: "http://img1.icarros.com/dbimg/imgadicionalnoticia/4/52505_1.jpg" },
{ marca: "Lamborghini", model: "Asterion LPI 910-4", ano: 2014, priceUSD: 1200000, summary: "O primeiro conceito híbrido plug-in da Lamborghini, combinando um V10 com três motores elétricos.", potencia: "910 cv", zeroCem: "3.0 s", vmax: "320 km/h", motor: "V10 5.2L Híbrido", img: "https://www.classicdriver.com/cdn-cgi/image/format=auto,fit=scale-down,width=1280/sites/default/files/article_images/lamborghini-asterion-lpi-910-4-7.jpg?itok=fKrzi1s9" },
{ marca: "Lamborghini", model: "Estoque", ano: 2008, priceUSD: 400000, summary: "Um impressionante conceito de sedã esportivo de quatro portas que explorava um novo segmento para a marca.", potencia: "560 cv", zeroCem: "4.5 s", vmax: "310 km/h", motor: "V10 5.2L", img: "https://upload.wikimedia.org/wikipedia/commons/c/cc/Lamborghini_Estoque_2-1.jpg" },
{ marca: "Lamborghini", model: "Calà", ano: 1995, priceUSD: 500000, summary: "Protótipo da Italdesign que serviu de inspiração para o design do Gallardo, com um motor V10.", potencia: "400 cv", zeroCem: "5.0 s", vmax: "291 km/h", motor: "V10 3.9L", img: "https://www.italdesign.it/wp-content/uploads/2014/06/06e62_coverimage.jpg" },
{ marca: "Lamborghini", model: "Concept S", ano: 2005, priceUSD: 3000000, summary: "Um protótipo de Gallardo roadster com um design de 'duplo cockpit' que separa o motorista e o passageiro.", potencia: "500 cv", zeroCem: "4.2 s", vmax: "320 km/h", motor: "V10 5.0L", img: "https://quatrorodas.abril.com.br/wp-content/uploads/2016/11/56740d250e2163522f01f041lamborghini-concept-s1.jpeg?quality=70&strip=all" },
   /* === NOVOS LAMBORGHINI ADICIONADOS === */
   { marca: "Lamborghini", model: "Reventón", ano: 2008, priceUSD: 2000000, summary: "Edição limitadíssima inspirada em caças a jato, com design angular e exclusivo.", potencia: "650 cv", zeroCem: "3.4 s", vmax: "340 km/h", motor: "V12 6.5L", img: "https://i.pinimg.com/736x/1d/9e/89/1d9e893e87b1a15ba5a0c229eca9fc3e.jpg" },
  { marca: "Lamborghini", model: "Sesto Elemento", ano: 2011, priceUSD: 2200000, summary: "Hypercar ultraleve focado para pistas, construído quase inteiramente de fibra de carbono.", potencia: "570 cv", zeroCem: "2.5 s", vmax: "330 km/h", motor: "V10 5.2L", img: "https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/masterpieces/sesto-elemento/sesto-elemento-HEADER.jpg" },
  { marca: "Lamborghini", model: "Miura", ano: 1966, priceUSD: 2500000, summary: "Considerado o primeiro supercarro da história com seu motor V12 central-traseiro.", potencia: "350 cv", zeroCem: "6.7 s", vmax: "280 km/h", motor: "V12 3.9L", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Lamborghini_miura_coup%C3%A9_1967_-aa.jpg/1200px-Lamborghini_miura_coup%C3%A9_1967_-aa.jpg" },

  /* Ferrari */
  { marca: "Ferrari", model: "LaFerrari", ano: 2013, priceUSD: 1420000, summary: "Hypercar híbrido com tecnologia derivada da F1.", potencia: "950 cv", zeroCem: "2.6 s", vmax: "350 km/h", motor: "V12 6.3L híbrido", img: "https://upload.wikimedia.org/wikipedia/commons/e/e5/LaFerrari_in_Beverly_Hills_%2814563979888%29.jpg" },
  { marca: "Ferrari", model: "488 Pista", ano: 2018, priceUSD: 350000, summary: "Focado em pista, potência concentrada e leveza.", potencia: "720 cv", zeroCem: "2.85 s", vmax: "340 km/h", motor: "V8 3.9L biturbo", img: "https://cdn.ferrari.com/cms/network/media/img/resize/5d371735c3f9ec0af647572d-ferrari_488pista_intro_socialshare?width=1080" },
  { marca: "Ferrari", model: "458 Italia", ano: 2009, priceUSD: 230000, summary: "Clássico moderno, equilíbrio dinâmico e som inconfundível.", potencia: "570 cv", zeroCem: "3.4 s", vmax: "325 km/h", motor: "V8 4.5L", img: "https://http2.mlstatic.com/D_NQ_NP_945585-MLB86479696968_062025-O.webp" },
  { marca: "Ferrari", model: "812 Competizione", ano: 2021, priceUSD: 600000, summary: "V12 de alta performance com aerodinâmica refinada.", potencia: "830 cv", zeroCem: "2.9 s", vmax: "340 km/h", motor: "V12 6.5L", img: "https://67cdn.co.uk/137/3/442472/17375488556790e43794d91_0s2a8073.jpg?width=479&height=352&crop=auto" },
  { marca: "Ferrari", model: "F12 TDF", ano: 2015, priceUSD: 620000, summary: "Edição limitada do F12 com foco em leveza e performance.", potencia: "770 cv", zeroCem: "3.1 s", vmax: "340 km/h", motor: "V12 6.3L", img: "https://cdn.rmsothebys.com/c/1/0/6/1/7/c10617520cca94321cc3eb1cdffa342f6fde1f7f.webp" },
  { marca: "Ferrari", model: "Enzo", ano: 2002, priceUSD: 659000, summary: "Homenagem ao fundador, hypercar icônico com alma de F1.", potencia: "660 cv", zeroCem: "3.3 s", vmax: "350 km/h", motor: "V12 6.0L", img: "https://www.estadao.com.br/resizer/v2/F2NSASMZFBKDFACPTSP4EHJ2BA.jpg?quality=80&auth=31205f41724165132129fa47578644fc853810b9049e11abed376dd34f7ef206&width=1262&height=710&smart=true" },
  { marca: "Ferrari", model: "F50", ano: 1995, priceUSD: 475000, summary: "Superesportivo com motor derivado de F1 e design icônico.", potencia: "520 cv", zeroCem: "3.7 s", vmax: "325 km/h", motor: "V12 4.7L", img: "https://www.automaistv.com.br/wp-content/uploads/2022/11/F50-1.jpg" },
  { marca: "Ferrari", model: "SP3 Daytona", ano: 2021, priceUSD: 2250000, summary: "One-off inspirado nos carros de endurance históricos.", potencia: "840 cv", zeroCem: "2.85 s", vmax: "340 km/h", motor: "V12 6.5L", img: "https://images.pistonheads.com/nimg/49934/sp3.jpg" },
  { marca: "Ferrari", model: "SF90 Stradale", ano: 2019, priceUSD: 515000, summary: "Híbrido plug-in com quase 1000 cv de potência combinada.", potencia: "1000 cv", zeroCem: "2.5 s", vmax: "340 km/h", motor: "V8 4.0L híbrido", img: "https://carrosbemmontados.com.br/wp-content/uploads/2023/06/FERRARI-SF90-XX-STRADALE-16.jpg" },
  { marca: "Ferrari", model: "Purosangue", ano: 2022, priceUSD: 398000, summary: "SUV premium da Ferrari com desempenho esportivo.", potencia: "680 cv", zeroCem: "3.3 s", vmax: "310 km/h", motor: "V8 3.9L biturbo", img: "https://img.odcdn.com.br/wp-content/uploads/2023/11/Ferrari-Purosangue.jpg" },
  /* === NOVOS FERRARI ADICIONADOS === */
  { marca: "Ferrari", model: "SP1 Monza", ano: 2019, priceUSD: 1750000, summary: "Barchetta monoposto da série 'Icona', sem para-brisa para uma experiência única.", potencia: "810 cv", zeroCem: "2.9 s", vmax: "300 km/h", motor: "V12 6.5L", img: "http://images.girardo.com/girardo/image/upload/2024/PS233%20-%202020%20Ferrari%20Monza%20SP1/_DSC1930_copy.jpg" },
  { marca: "Ferrari", model: "SP2 Monza",  ano: 2019,  priceUSD: 1750000,  summary: "Versão de dois lugares (biposto) da série 'Icona'. Uma barchetta moderna, inspirada nos carros de corrida dos anos 50, proporcionando uma experiência de pilotagem pura e visceral.",  potencia: "810 cv",  zeroCem: "2.9 s",  vmax: "300+ km/h",  motor: "V12 6.5L", img: "https://news.dupontregistry.com/wp-content/uploads/2021/08/Monza-Main.jpg" },
  { marca: "Ferrari", model: "250 GTO", ano: 1962, priceUSD: 51705000, summary: "O Santo Graal dos colecionadores. Um dos carros mais caros e desejados do mundo.", potencia: "300 cv", zeroCem: "6.1 s", vmax: "280 km/h", motor: "V12 3.0L", img: "https://s2-autoesporte.glbimg.com/LCLI36TXEYxfQrDh-FhT96sUSS0=/0x0:1862x1241/924x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2024/H/c/BPmBv8QUAPm7Lpfw8aCw/ferrari-250-gto-3.jpg" },
  { marca: "Ferrari", model: "Testarossa", ano: 1984, priceUSD: 250000, summary: "Ícone dos anos 80, famoso por seu design com entradas de ar laterais e motor flat-12.", potencia: "390 cv", zeroCem: "5.3 s", vmax: "290 km/h", motor: "Flat-12 4.9L", img: "https://media.autoexpress.co.uk/image/private/s--X-WVjvBW--/f_auto,t_content-image-full-desktop@1/v1753205551/evo/2025/07%20July/Ferrari_Testarossa_evo_01_hvqdc8.jpg" },
  { marca: "Ferrari", model: "599 GTO", ano: 2010, priceUSD: 800000, summary: "Versão de rua do 599XX de pista, um dos carros mais rápidos da Ferrari na sua época.", potencia: "670 cv", zeroCem: "3.3 s", vmax: "335 km/h", motor: "V12 6.0L", img: "https://auto-drive.pt/wp-content/uploads/2020/04/2011-ferrari-599-gto-for-sale-at-mecum-auctions-indy-2020.jpg" },
  { marca: "Ferrari", model: "FXX K", ano: 2015, priceUSD: 2600000, summary: "Versão de pista da LaFerrari, não homologada para corridas, apenas para eventos exclusivos.", potencia: "1050 cv", zeroCem: "2.5 s", vmax: "350 km/h", motor: "V12 6.3L Híbrido", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/2015_Ferrari_FXX-K_in_Shanghai.jpg/1200px-2015_Ferrari_FXX-K_in_Shanghai.jpg" },
  { marca: "Ferrari", model: "F40", ano: 1987, priceUSD: 2500000, summary: "A lendária F40. O último carro aprovado por Enzo Ferrari, criado para celebrar os 40 anos da marca. Uma máquina de corrida pura e visceral para as ruas.", potencia: "478 cv", zeroCem: "4.1 s", vmax: "324 km/h", motor: "V8 2.9L Twin-Turbo", img: "https://upload.wikimedia.org/wikipedia/commons/0/0d/Ferrari_F40_at_Auto_Salon_Singen_Germany_432393386.jpg" },
  { marca: "Ferrari", model: "335 S Spider Scaglietti", ano: 1957, priceUSD: 35700000, summary: "Um dos carros de corrida da Ferrari mais importantes dos anos 50, pilotado por lendas como Stirling Moss em corridas como a Mille Miglia.", potencia: "390 cv", zeroCem: "5.0 s", vmax: "300 km/h", motor: "V12 4.0L 'Jano'", img: "https://www.ultimatecarpage.com/images/car/3361/Ferrari-335-S-Scaglietti-Spyder-61446.jpg" },
  { marca: "Ferrari", model: "275 GTB/4 S N.A.R.T. Spider", ano: 1967, priceUSD: 27500000, summary: "Apenas 10 unidades foram feitas desta deslumbrante versão conversível do 275 GTB, encomendada para o mercado americano.", potencia: "300 cv", zeroCem: "6.0 s", vmax: "260 km/h", motor: "V12 3.3L Colombo", img: "https://www.sportscarmarket.com/wp-content/uploads/2013/11/14a7918fcdf6dc302c80fa10f1a86a7a.jpg" },
  { marca: "Ferrari", model: "250 GT SWB California Spider", ano: 1961, priceUSD: 25305000, summary: "Uma obra-prima de design e engenharia. A versão 'Competizione' com chassi de liga leve é ainda mais rara e cobiçada.", potencia: "280 cv", zeroCem: "6.5 s", vmax: "250 km/h", motor: "V12 3.0L Colombo", img: "https://www.sportscarmarket.com/wp-content/uploads/2016/05/1961-ferrari-250-gt-swb-california-spyder-pass-front.jpg" },
  { marca: "Ferrari", model: "F40 LM", ano: 1993, priceUSD: 11005000, summary: "A versão de competição da F40, preparada pela Michelotto. Mais leve, potente e com aerodinâmica radical para dominar as pistas.", potencia: "720 cv", zeroCem: "3.1 s", vmax: "367 km/h", motor: "V8 2.9L Twin-Turbo", img: "https://cdn.rmsothebys.com/c/7/f/7/f/4/c7f7f4ec9d060f8af6382cf72ef2c07f405e2ca0.webp" },

  /* === FERRARI: PROGRAMA XX E CARROS DE PISTA === */
{ marca: "Ferrari", model: "288 GTO Evoluzione", ano: 1986, priceUSD: 10000000, summary: "O protótipo que serviu de base para a F40. Um monstro de corrida do Grupo B que nunca competiu. Apenas 5 existem.", potencia: "650 cv", zeroCem: "3.5 s", vmax: "370 km/h", motor: "V8 2.9L Twin-Turbo", img: "https://www.planetcarsz.com/img/noticias/2022/09/ferrari-f288-gto-evoluzione-1987-01-20220928133201-1600x1200.jpg" },
{ marca: "Ferrari", model: "FXX", ano: 2005, priceUSD: 2000000, summary: "A versão de pista da Enzo. Um laboratório sobre rodas para clientes-pilotos selecionados pela Ferrari.", potencia: "800 cv", zeroCem: "2.8 s", vmax: "345 km/h", motor: "V12 6.3L Aspirado", img: "https://images.squarespace-cdn.com/content/v1/5caed8960cf57d49530e8c60/c38365a8-0200-49b9-a323-e46d3bfe7340/art-mg-ferrarifxx+04.jpg" },
{ marca: "Ferrari", model: "FXX Evo", ano: 2007, priceUSD: 2500000, summary: "A evolução da FXX, com mais potência, aerodinâmica aprimorada e eletrônica mais rápida.", potencia: "860 cv", zeroCem: "2.5 s", vmax: "365 km/h", motor: "V12 6.3L Aspirado", img: "https://cdn.awsli.com.br/600x1000/2292/2292287/produto/317043676/71ne2f3avfl-_ac_sx679_-2taf8a4yat.jpg" },
{ marca: "Ferrari", model: "599XX", ano: 2009, priceUSD: 1500000, summary: "A versão de pista da 599 GTB Fiorano, com aerodinâmica radical e motor V12 girando a 9.000 RPM.", potencia: "730 cv", zeroCem: "2.9 s", vmax: "315 km/h", motor: "V12 6.0L Aspirado", img: "https://www.automoli.com/common/vehicles/_assets/img/gallery/f120/ferrari-599xx.jpg" },
{ marca: "Ferrari", model: "599XX Evo", ano: 2011, priceUSD: 2000000, summary: "Atualização da 599XX com asa traseira ativa inspirada na F1 (DRS) e ainda mais performance.", potencia: "750 cv", zeroCem: "2.8 s", vmax: "320 km/h", motor: "V12 6.0L Aspirado", img: "https://www.supercars.net/blog/wp-content/uploads/2019/09/1078526-1024.jpg" },
{ marca: "Ferrari", model: "488 Challenge Evo", ano: 2020, priceUSD: 350000, summary: "Carro de corrida para o campeonato monomarca da Ferrari, com aerodinâmica e performance otimizadas.", potencia: "670 cv", zeroCem: "2.8 s", vmax: "300+ km/h", motor: "V8 3.9L Twin-Turbo", img: "https://carroscomcamanzi.com.br/wp-content/uploads/2019/10/Ferrari-488_Challenge_Evo-2020-1600-02.jpg" },

/* === FERRARI: V12 BERLINETTAS MODERNAS === */
{ marca: "Ferrari", model: "812 Superfast", ano: 2017, priceUSD: 335000, summary: "A expressão máxima do Gran Turismo V12 com motor dianteiro. Uma combinação de luxo, potência e agilidade.", potencia: "800 cv", zeroCem: "2.9 s", vmax: "340 km/h", motor: "V12 6.5L Aspirado", img: "https://s2-autoesporte.glbimg.com/i8tXNF6tp0Hnq0rjjqDjPqAETgo=/0x0:620x413/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2020/i/Y/QXlnZZT3aJ9bPtoNRBXA/2017-02-20-ferrari-812-superfast-2018-1280-01.jpg" },
{ marca: "Ferrari", model: "812 GTS", ano: 2019, priceUSD: 400000, summary: "A versão conversível do 812 Superfast, o spider de produção mais potente do mercado em seu lançamento.", potencia: "800 cv", zeroCem: "3.0 s", vmax: "340 km/h", motor: "V12 6.5L Aspirado", img: "https://www.europeanprestige.co.uk/blobs/stock/608/images/a285475c-bbf1-4d5f-9e96-1dcab478b5bc/812-gts-16.jpg?width=2000&height=1333" },
{ marca: "Ferrari", model: "F12berlinetta", ano: 2012, priceUSD: 280000, summary: "Antecessora do 812, uma berlinetta V12 que redefiniu os padrões de performance para um GT de motor dianteiro.", potencia: "740 cv", zeroCem: "3.1 s", vmax: "340 km/h", motor: "V12 6.3L Aspirado", img: "https://s3.ecompletocarros.dev/images/lojas/285/veiculos/75824/veiculoInfoVeiculoImagesMobile/vehicle_image_1632967417_d41d8cd98f00b204e9800998ecf8427e.jpeg" },

/* === FERRARI: V8 ESPECIAIS E TURBO === */
{ marca: "Ferrari", model: "458 Speciale", ano: 2013, priceUSD: 450000, summary: "A versão de pista da 458 Italia. A despedida do motor V8 aspirado de motor central da Ferrari.", potencia: "605 cv", zeroCem: "3.0 s", vmax: "325 km/h", motor: "V8 4.5L Aspirado", img: "https://motorshow.com.br/wp-content/uploads/sites/2/2020/12/ferrari-458-speciale-blindada-2.jpg" },
{ marca: "Ferrari", model: "458 Speciale Aperta", ano: 2014, priceUSD: 800000, summary: "A versão conversível ('Aperta') da 458 Speciale. Produção limitadíssima e muito cobiçada.", potencia: "605 cv", zeroCem: "3.0 s", vmax: "320 km/h", motor: "V8 4.5L Aspirado", img: "https://car-images.bauersecure.com/wp-images/14009/ferrariaperta1.jpg" },
{ marca: "Ferrari", model: "488 GTB", ano: 2015, priceUSD: 250000, summary: "Marcou o retorno da Ferrari aos motores V8 turbo em seus esportivos de motor central.", potencia: "670 cv", zeroCem: "3.0 s", vmax: "330 km/h", motor: "V8 3.9L Twin-Turbo", img: "https://img2.icarros.com/dbimg/imgadicionalnoticia/4/74799_1.jpg" },
{ marca: "Ferrari", model: "488 Spider", ano: 2015, priceUSD: 280000, summary: "A versão conversível da 488 GTB, combinando a performance do turbo com a experiência ao ar livre.", potencia: "670 cv", zeroCem: "3.0 s", vmax: "325 km/h", motor: "V8 3.9L Twin-Turbo", img: "https://media-cdn.tripadvisor.com/media/attractions-splice-spp-674x446/06/6c/58/f0.jpg" },
{ marca: "Ferrari", model: "F8 Tributo", ano: 2019, priceUSD: 300000, summary: "Uma homenagem ao premiado motor V8 da Ferrari. A evolução da 488 GTB com mais potência e aerodinâmica da F1.", potencia: "720 cv", zeroCem: "2.9 s", vmax: "340 km/h", motor: "V8 3.9L Twin-Turbo", img: "https://upload.wikimedia.org/wikipedia/commons/8/8b/Ferrari_F8_Tributo_Genf_2019_1Y7A5665.jpg" },
{ marca: "Ferrari", model: "F8 Spider", ano: 2019, priceUSD: 330000, summary: "A versão conversível do F8 Tributo, combinando a performance extrema com um teto retrátil rápido.", potencia: "720 cv", zeroCem: "2.9 s", vmax: "340 km/h", motor: "V8 3.9L Twin-Turbo", img: "https://quatrorodas.abril.com.br/wp-content/uploads/2024/01/ferrari_f8_tributo_3.jpg?quality=70&strip=info" },

/* === FERRARI: GTS DE MOTOR DIANTEIRO === */
{ marca: "Ferrari", model: "California", ano: 2008, priceUSD: 120000, summary: "O primeiro V8 dianteiro da Ferrari moderna, com teto rígido retrátil e dupla embreagem.", potencia: "460 cv", zeroCem: "3.9 s", vmax: "310 km/h", motor: "V8 4.3L Aspirado", img: "https://i0.wp.com/thegarage.b-cdn.net/2025/07/2012-ferrari-california-novitec-venda-compra-the-garage-for-sale-71-2400x1600.jpg?ssl=1" },
{ marca: "Ferrari", model: "California T", ano: 2014, priceUSD: 160000, summary: "A atualização da California, trazendo um motor V8 turbo mais eficiente e potente.", potencia: "560 cv", zeroCem: "3.6 s", vmax: "316 km/h", motor: "V8 3.9L Twin-Turbo", img: "https://img0.icarros.com/dbimg/imgnoticia/4/17358_1" },
{ marca: "Ferrari", model: "Portofino", ano: 2017, priceUSD: 215000, summary: "A sucessora da California T, com um chassi mais leve, mais potência e design mais agressivo.", potencia: "600 cv", zeroCem: "3.5 s", vmax: "320 km/h", motor: "V8 3.9L Twin-Turbo", img: "https://www.motorsportmaranello.com.br/wp-content/uploads/2022/11/Ferrari-Portofino-1024x682.jpg" },
{ marca: "Ferrari", model: "Portofino M", ano: 2020, priceUSD: 245000, summary: "A versão 'Modificata' da Portofino, com mais potência, câmbio de 8 marchas e visual refinado.", potencia: "620 cv", zeroCem: "3.45 s", vmax: "320 km/h", motor: "V8 3.9L Twin-Turbo", img: "https://s2-autoesporte.glbimg.com/IsE17MaScTIhgNwU78bizpqmDMI=/0x0:1600x1067/924x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2023/G/B/y5NVHNRXWKmC4nQGtXGA/ferrari-portofino-m-71.jpeg" },
{ marca: "Ferrari", model: "Roma", ano: 2020, priceUSD: 225000, summary: "Um coupé com design 'La Nuova Dolce Vita', elegante e minimalista, mas com a performance de um V8 Ferrari.", potencia: "620 cv", zeroCem: "3.4 s", vmax: "320 km/h", motor: "V8 3.9L Twin-Turbo", img: "https://upload.wikimedia.org/wikipedia/commons/9/9d/2021_Ferrari_Roma_in_Rosso_Fiorano%2C_front_right.jpg" },
{ marca: "Ferrari", model: "Roma Spider", ano: 2023, priceUSD: 270000, summary: "A versão conversível da Roma, trazendo de volta o teto de lona para um V8 dianteiro da Ferrari após 54 anos.", potencia: "620 cv", zeroCem: "3.4 s", vmax: "320 km/h", motor: "V8 3.9L Twin-Turbo", img: "https://hips.hearstapps.com/hmg-prod/images/2024-ferrari-roma-spider-117-650b3c92b4ae2.jpg?crop=0.742xw:0.624xh;0.176xw,0.376xh&resize=2048:*" },

/* === FERRARI: CLÁSSICOS LENDÁRIOS === */
{ marca: "Ferrari", model: "166 Inter", ano: 1948, priceUSD: 2000000, summary: "Um dos primeiros carros de rua da Ferrari. Um GT elegante e exclusivo que estabeleceu a reputação da marca.", potencia: "110 cv", zeroCem: "10.0 s", vmax: "170 km/h", motor: "V12 2.0L Colombo", img: "https://www.talacrest.com/Riyadh-Car-Show/images/1949-Ferrari-Tipo-166-Inter-Coupe.jpg" },
{ marca: "Ferrari", model: "250 Testa Rossa", ano: 1957, priceUSD: 40000000, summary: "Um dos carros de corrida mais vitoriosos e valiosos da história, famoso por seus para-lamas em formato de 'ponton'.", potencia: "300 cv", zeroCem: "6.0 s", vmax: "270 km/h", motor: "V12 3.0L Colombo", img: "https://cloudfront-us-east-1.images.arcpublishing.com/estadao/QEWCDIGTLVILJCNDBOEIDYJGZE.jpg" },
{ marca: "Ferrari", model: "250 LM", ano: 1964, priceUSD: 18000000, summary: "O último Ferrari a vencer as 24 Horas de Le Mans. Um carro de corrida de motor central-traseiro.", potencia: "320 cv", zeroCem: "5.5 s", vmax: "295 km/h", motor: "V12 3.3L Colombo", img: "https://carroemotos.com.br/wp-content/uploads/2023/07/4-4.jpg" },
{ marca: "Ferrari", model: "275 GTB/4", ano: 1966, priceUSD: 3000000, summary: "A evolução do 275, com 4 comandos de válvula. Um dos mais belos e desejados GTs de todos os tempos.", potencia: "300 cv", zeroCem: "6.0 s", vmax: "268 km/h", motor: "V12 3.3L Colombo", img: "https://cdn.rmsothebys.com/9/0/0/9/8/3/9009835c4fa432719a84a035be7a0b38c7e5d450.webp" },
{ marca: "Ferrari", model: "330 P4", ano: 1967, priceUSD: 30000000, summary: "Considerado por muitos o mais belo protótipo de corrida já feito. A arma da Ferrari contra o Ford GT40 em Le Mans.", potencia: "450 cv", zeroCem: "4.5 s", vmax: "320 km/h", motor: "V12 4.0L", img: "https://www.ultimatecarpage.com/images/car/708/Ferrari-330-P4-66188.jpg" },
{ marca: "Ferrari", model: "512 S", ano: 1970, priceUSD: 15000000, summary: "Protótipo de corrida com um monstruoso motor V12 de 5 litros, imortalizado no filme 'Le Mans' com Steve McQueen.", potencia: "550 cv", zeroCem: "3.8 s", vmax: "340 km/h", motor: "V12 5.0L", img: "https://www.ultimatecarpage.com/images/car/2181/Ferrari-512-S-1171.jpg" },
{ marca: "Ferrari", model: "512 BB", ano: 1976, priceUSD: 350000, summary: "O 'Berlinetta Boxer'. O sucessor do Daytona com um motor flat-12 de 5 litros montado em posição central.", potencia: "360 cv", zeroCem: "5.5 s", vmax: "288 km/h", motor: "Flat-12 4.9L", img: "https://images.pistonheads.com/nimg/46137/blobid0.jpg" },
{ marca: "Ferrari", model: "Dino 246 GT", ano: 1969, priceUSD: 400000, summary: "Uma obra-prima de design e dirigibilidade. Oficialmente uma 'Dino', mas com coração e alma Ferrari.", potencia: "195 cv", zeroCem: "7.1 s", vmax: "238 km/h", motor: "V6 2.4L", img: "https://www.amalgamcollection.com/cdn/shop/articles/M5751-SPI-ERO-BES-SN12_website_photos_1_1024x1024.jpg?v=1656090700" },

/* === FERRARI: GTS MODERNAS E 2+2 === */
{ marca: "Ferrari", model: "456 GT", ano: 1992, priceUSD: 100000, summary: "Um elegante GT 2+2 com design Pininfarina e um suave motor V12, marcando o retorno deste layout à Ferrari.", potencia: "442 cv", zeroCem: "5.2 s", vmax: "302 km/h", motor: "V12 5.5L", img: "https://i.pinimg.com/736x/5d/7a/27/5d7a275f3caf1c6fea3c510b631a7f4b.jpg" },
{ marca: "Ferrari", model: "550 Maranello", ano: 1996, priceUSD: 180000, summary: "O aclamado retorno da Ferrari às berlinettas de 2 lugares com motor V12 dianteiro e câmbio manual.", potencia: "485 cv", zeroCem: "4.4 s", vmax: "320 km/h", motor: "V12 5.5L", img: "https://cdn.ferrari.com/cms/network/media/img/resize/5dd6b60484077c3b2432caed-ferrari-550-maranello-1996-design-history-focus-2?" },
{ marca: "Ferrari", model: "575M Maranello", ano: 2002, priceUSD: 200000, summary: "A versão 'Modificata' da 550, com mais potência, freios melhores e a introdução do câmbio F1.", potencia: "515 cv", zeroCem: "4.2 s", vmax: "325 km/h", motor: "V12 5.75L", img: "https://images.squarespace-cdn.com/content/v1/62bd0c7b5c7e937a4ad7e256/1727296392656-UXJDXK2E1ADOFZS5QS6O/1.jpg" },
{ marca: "Ferrari", model: "612 Scaglietti", ano: 2004, priceUSD: 150000, summary: "Um GT 2+2 espaçoso e potente, com chassi de alumínio e design que homenageia o 375 MM de Rossellini.", potencia: "540 cv", zeroCem: "4.0 s", vmax: "320 km/h", motor: "V12 5.75L", img: "https://images.pistonheads.com/nimg/45656/mceu_61236387811652137209143.jpg" },
{ marca: "Ferrari", model: "FF", ano: 2011, priceUSD: 180000, summary: "O primeiro carro de produção da Ferrari com tração nas 4 rodas. Um shooting brake V12 revolucionário.", potencia: "660 cv", zeroCem: "3.7 s", vmax: "335 km/h", motor: "V12 6.3L", img: "https://uploads.vrum.com.br/2011/11/20111127111445478392o.jpg" },
{ marca: "Ferrari", model: "GTC4Lusso", ano: 2016, priceUSD: 260000, summary: "A evolução da FF, com design refinado, interior luxuoso e a introdução de rodas traseiras direcionais.", potencia: "690 cv", zeroCem: "3.4 s", vmax: "335 km/h", motor: "V12 6.3L", img: "https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202509/20250913/FERRARI-GTC4LUSSO-3.9-V8-TURBO-GASOLINA-T-F1DCT-wmimagem10592479837.jpg" },

/* === FERRARI: PROJETOS ESPECIAIS (ONE-OFFS) === */
{ marca: "Ferrari", model: "Sergio", ano: 2015, priceUSD: 3000000, summary: "Baseado na 458 Spider, este carro-conceito que virou produção (6 unidades) homenageia Sergio Pininfarina.", potencia: "605 cv", zeroCem: "3.0 s", vmax: "320 km/h", motor: "V8 4.5L Aspirado", img: "https://extra.globo.com/incoming/14768652-1fb-8b9/w976h550-PROP/17990230347978699022.jpg" },
{ marca: "Ferrari", model: "P4/5 by Pininfarina", ano: 2006, priceUSD: 4000000, summary: "Um one-off espetacular baseado na Enzo, encomendado por James Glickenhaus com design inspirado na 330 P4.", potencia: "660 cv", zeroCem: "3.0 s", vmax: "375 km/h", motor: "V12 6.0L", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Ferrari_P4-5.jpg/1200px-Ferrari_P4-5.jpg" },
{ marca: "Ferrari", model: "SP38 Deborah", ano: 2018, priceUSD: 5000000, summary: "One-off baseado na 488 GTB, com design único inspirado na F40 e pintura vermelha metálica especial.", potencia: "670 cv", zeroCem: "3.0 s", vmax: "330 km/h", motor: "V8 3.9L Twin-Turbo", img: "https://mir-s3-cdn-cf.behance.net/project_modules/1400/e0ab9181314169.5cfbce2118a7f.jpg" },
{ marca: "Ferrari", model: "Omologata", ano: 2020, priceUSD: 6000000, summary: "One-off baseado na 812 Superfast. Um GT V12 com carroceria única que levou 2 anos para ser construído.", potencia: "800 cv", zeroCem: "2.9 s", vmax: "340 km/h", motor: "V12 6.5L Aspirado", img: "https://cdn.motor1.com/images/mgl/JvB4M/s1/2021-ferrari-omologata.webp" },
{ marca: "Ferrari", model: "KC23", ano: 2023, priceUSD: 8000000, summary: "O mais recente one-off da Ferrari, baseado no carro de corrida 488 GT3 Evo, com aerodinâmica ativa e design futurista.", potencia: "600 cv (corrida)", zeroCem: "3.0 s", vmax: "300+ km/h", motor: "V8 3.9L Twin-Turbo", img: "https://cloudfront-us-east-1.images.arcpublishing.com/estadao/YUYMSRUCIFPYXNJEOGGFJW4JUY.jpg" },

  /* McLaren */
  { marca: "McLaren", model: "Senna", ano: 2018, priceUSD: 958000, summary: "Carro de pista homologado para rua, foco total em desempenho.", potencia: "800 cv", zeroCem: "2.8 s", vmax: "340 km/h", motor: "V8 4.0L biturbo", img: "https://i0.statig.com.br/bancodeimagens/imgalta/4j/56/zg/4j56zg1ztbixcq43v8ywt7q88.jpg" },  { marca: "McLaren", model: "P1", ano: 2013, priceUSD: 1150000, summary: "Hypercar híbrido com aerodinâmica ativa e tecnologia avançada.", potencia: "903 cv", zeroCem: "2.6 s", vmax: "350 km/h", motor: "V8 3.8L híbrido", img: "https://upload.wikimedia.org/wikipedia/commons/1/1f/Paris_Motor_Show_2012_%288065253081%29.jpg" },
  { marca: "McLaren", model: "720S", ano: 2017, priceUSD: 295000, summary: "Supercarro leve e ágil com design futurista.", potencia: "720 cv", zeroCem: "2.9 s", vmax: "341 km/h", motor: "V8 4.0L biturbo", img: "https://www.boatshopping.com.br/wp-content/uploads/2018/03/mclaren-carro-boat-shopping-1024x640.jpg" },
  { marca: "McLaren", model: "W1", ano: 2025, priceUSD: 2100000, summary: "Hypercar raro com histórico de Le Mans (exótico).", potencia: "627 cv", zeroCem: "2.7 s", vmax: "351 km/h", motor: "V12 6.1L", img: "http://mclaren.scene7.com/is/image/mclaren/Gallery-3:crop-16x9?wid=1600&hei=900" },
  { marca: "McLaren", model: "600LT", ano: 2018, priceUSD: 240000, summary: "Versão leve do 600 para foco em pista e dirigibilidade.", potencia: "600 cv", zeroCem: "3.0 s", vmax: "330 km/h", motor: "V8 3.8L", img: "https://s2-autoesporte.glbimg.com/sl74Uv5SjmoZrUZD1Mand86VaNM=/0x0:620x349/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2020/M/B/f4DxEXQ2m5SVeGYLEofQ/2018-06-28-hss-storage-midas-856b4faddc1472eec3e5e9c885ee2d7f-206488566-1.jpg" },
  { marca: "McLaren", model: "F1 LM", ano: 1995, priceUSD: 20000000, summary: "Edição especial lendária com pedigree de corrida.", potencia: "680 cv", zeroCem: "3.2 s", vmax: "362 km/h", motor: "V12 6.1L", img: "https://images.squarespace-cdn.com/content/v1/5caed8960cf57d49530e8c60/1600417633747-36S48HEMIYT2SRJ96YDZ/art-mg-mclarenf1lm1s500.jpg?format=1500w" },
  { marca: "McLaren", model: "Artura", ano: 2021, priceUSD: 237000, summary: "Híbrido leve com desempenho e eficiência.", potencia: "680 cv", zeroCem: "3.0 s", vmax: "330 km/h", motor: "V6 3.0L híbrido", img: "https://revistafullpower.com.br/wp-content/uploads/2021/02/mc01.jpg" },
  { marca: "McLaren", model: "GTS", ano: 2023, priceUSD: 210000, summary: "Coupé esportivo de uso diário com performance refinada.", potencia: "630 cv", zeroCem: "3.5 s", vmax: "322 km/h", motor: "V8 4.0L", img: "https://cdn.motor1.com/images/mgl/W8GLB3/s1/2024-mclaren-gts.webp" },
  { marca: "McLaren", model: "750S", ano: 2023, priceUSD: 324000, summary: "Versão potenciada do 720S com controle aerodinâmico.", potencia: "750 cv", zeroCem: "2.85 s", vmax: "341 km/h", motor: "V8 4.0L", img: "https://www.mclarencf.com/imagetag/383/main/l/New-2024-McLaren-750S-Spider-Performance.jpg" },
  { marca: "McLaren", model: "MP4-12C", ano: 2011, priceUSD: 235000, summary: "Supercarro que marcou uma nova era para McLaren.", potencia: "625 cv", zeroCem: "3.1 s", vmax: "330 km/h", motor: "V8 3.8L", img: "https://s2.glbimg.com/WTZeWVTUjeZ2A1eo-9bL19keO0Q=/1200x630/s.glbimg.com/jo/g1/f/original/2012/06/07/mclaren-1-620.jpg" },
  /* BMW */
  { marca: "BMW", model: "X6 M", ano: 2020, priceUSD: 129000, summary: "SUV esportivo com performance de alto nível.", potencia: "625 cv", zeroCem: "3.8 s", vmax: "290 km/h", motor: "V8 4.4L biturbo", img: "https://pugachev.miami/wp-content/uploads/2023/09/bmw-x6-m-competition-graphite-1.jpg" },
  { marca: "BMW", model: "M4", ano: 2020, priceUSD: 78000, summary: "Coupé esportivo com equilíbrio entre potência e dirigibilidade.", potencia: "510 cv", zeroCem: "3.6 s", vmax: "290 km/h", motor: "I6 3.0L biturbo", img: "https://delightgarage.com.au/wp-content/uploads/2024/08/IMG_0045-scaled.jpg" },
  { marca: "BMW", model: "M2", ano: 2023, priceUSD: 66000, summary: "Compacto esportivo com resposta ágil e diversão ao volante.", potencia: "450 cv", zeroCem: "4.0 s", vmax: "280 km/h", motor: "I6 3.0L biturbo", img: "https://bmw.scene7.com/is/image/BMW/g87_cs_dynamics_fb?qlt=80&wid=1024&fmt=webp" },
  { marca: "BMW", model: "M3", ano: 2020, priceUSD: 78000, summary: "Ícone esportivo com tecnologia e dinâmica apurada.", potencia: "510 cv", zeroCem: "3.9 s", vmax: "290 km/h", motor: "I6/V8", img: "https://abcdoabc.com.br/wp-content/uploads/2024/10/unnamed-26-2-e1729023776935.jpg" },
  { marca: "BMW", model: "M8", ano: 2019, priceUSD: 155000, summary: "Gran turismo de alta performance com luxo e potência.", potencia: "625 cv", zeroCem: "3.1 s", vmax: "305 km/h", motor: "V8 4.4L", img: "https://storage.googleapis.com/trinityrental-e51d5.appspot.com/0_m8_competition_main_361a9ab631/0_m8_competition_main_361a9ab631.jpeg" },
  { marca: "BMW", model: "320i", ano: 2018, priceUSD: 40000, summary: "Sedã premium eficiente e confortável.", potencia: "184 cv", zeroCem: "8.2 s", vmax: "235 km/h", motor: "I4 2.0L", img: "https://blog.usadosbr.com/wp-content/uploads/2019/07/P90332322_highRes_the-all-new-bmw-320d.jpg" },
  { marca: "BMW", model: "M5", ano: 2017, priceUSD: 110000, summary: "Sedã esportivo com performance de supercarro.", potencia: "625 cv", zeroCem: "3.3 s", vmax: "305 km/h", motor: "V8 4.4L", img: "https://www.thedrive.com/wp-content/uploads/images-by-url-td/content/2022/01/IMG_3706-1.jpeg?quality=85" },
  { marca: "BMW", model: "X5", ano: 2018, priceUSD: 66000, summary: "SUV versátil com variantes potentes e luxo.", potencia: "335 cv", zeroCem: "6.1 s", vmax: "250 km/h", motor: "I6/V8", img: "https://s2-autoesporte.glbimg.com/nA58d5V-8QruTflztNE8yatGrl0=/0x0:940x628/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2020/z/a/zG1V4sSJabKxRYBwC9FQ/2019-01-28-novo-bmw-x5.jpg" },
  { marca: "BMW", model: "Serie1", ano: 2019, priceUSD: 39000, summary: "Hatch premium, ágil e eficiente.", potencia: "306 cv", zeroCem: "6.5 s", vmax: "250 km/h", motor: "I3/I4", img: "https://www.automaistv.com.br/wp-content/uploads/2019/11/BMW-S%C3%A9rie-1.jpg" },
  { marca: "BMW", model: "i8", ano: 2014, priceUSD: 135700, summary: "Coupé híbrido futurista, design icônico.", potencia: "369 cv", zeroCem: "4.4 s", vmax: "250 km/h", motor: "Híbrido 1.5L+elétrico", img: "https://www.canaldapeca.com.br/blog/wp-content/uploads/2016/06/BMW-i8-N%C3%A3o-Parece-mas-ele-%C3%A9-feito-na-Terra.jpg" },
  /* Koenigsegg */
  { marca: "Koenigsegg", model: "Agera RS", ano: 2015, priceUSD: 2500000, summary: "Recordista sueco de velocidade máxima.", potencia: "1175 cv", zeroCem: "2.6 s", vmax: "447 km/h", motor: "V8 5.0L biturbo", img: "https://bluesky.cdn.imgeng.in/cogstock-images/21716ccc-a84b-435b-8844-67237915a594.jpg?imgeng=/w_1920/" },
  { marca: "Koenigsegg", model: "Regera", ano: 2015, priceUSD: 2000000, summary: "Hypercar híbrido com transmissão única.", potencia: "1500 cv", zeroCem: "2.8 s", vmax: "410 km/h", motor: "V8 5.0L híbrido", img: "https://www.supervettura.com/blobs/Cars/123/5aca99e9-6ac1-4a28-92d7-03c1e4bdc365.jpg?width=1920&height=1080&mode=crop" },
  { marca: "Koenigsegg", model: "Gemera", ano: 2020, priceUSD: 1800000, summary: "Mega-GT de 4 lugares, luxo e performance.", potencia: "1700 cv", zeroCem: "2.9 s", vmax: "400 km/h", motor: "V8 híbrido", img: "https://www.supervettura.com/blobs/Cars/106/b217d8fd-d626-45b2-9d80-311fe8e76f8c.jpg?width=1920&height=1080&mode=crop" },
  { marca: "Koenigsegg", model: "Jesko Absolut", ano: 2020, priceUSD: 3000000, summary: "Focado em velocidade máxima; extremo em aerodinâmica.", potencia: "1600 cv", zeroCem: "2.5 s", vmax: "530 km/h (teoria)", motor: "V8 5.0L", img: "https://www.thesupercarblog.com/wp-content/uploads/2025/04/Koenigsegg-Jesko-Absolut-Kronos-4-1.jpg" },
  { marca: "Koenigsegg", model: "Jesko Attack", ano: 2020, priceUSD: 3000000, summary: "Versão focada em pista com downforce massivo.", potencia: "1600 cv", zeroCem: "2.6 s", vmax: "482 km/h", motor: "V8 5.0L", img: "https://d15-a.sdn.cz/d_15/c_img_gV_Z/ERTCdA.jpeg?fl=cro,0,1,1276,717%7Cres,1200,,1%7Cjpg,80,,1" },
  { marca: "Koenigsegg", model: "CC850", ano: 2022, priceUSD: 3650000, summary: "Edição limitada comemorativa com pedigree.", potencia: "1400 cv", zeroCem: "2.7 s", vmax: "410 km/h", motor: "V8 5.0L", img: "https://s2-autoesporte.glbimg.com/sm1QiXwcG6fF0qDpNPwC0THEbuc=/0x0:1920x1074/924x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2022/L/O/Bk5MGCTUaml8gyR9OpWA/koenigsegg-cc850-the-swedish-hypercar-new-years-resolution-came-true-196424-1.jpg" },
  { marca: "Koenigsegg", model: "Sadair's Spear", ano: 2022, priceUSD: 5000000, summary: "Hypercar conceito ultra exclusivo.", potencia: "1350 cv", zeroCem: "2.7 s", vmax: "400 km/h", motor: "V8 5.0L", img: "https://www.mnzmotors.com.br/content/images/2025/06/koenigsegg-sadair-s-spear.jpg" },
  { marca: "Koenigsegg", model: "CCX", ano: 2006, priceUSD: 700000, summary: "Clássico Koenigsegg com performance notável.", potencia: "806 cv", zeroCem: "3.0 s", vmax: "410 km/h", motor: "V8 4.7L", img: "https://www.supervettura.com/blobs/Cars/194/10608f17-e2ec-4f95-a09f-3221b6cd3f34.jpg?width=1920&height=1080&mode=crop" },
  { marca: "Koenigsegg", model: "Chimera", ano: 2020, priceUSD: 1200000, summary: "Edição rara de alto desempenho.", potencia: "820 cv", zeroCem: "2.9 s", vmax: "410 km/h", motor: "V8 4.7L", img: "https://cdn.motor1.com/images/mgl/AkQlKx/s1/koenigsegg-chimera.jpg" },
  { marca: "Koenigsegg", model: "CCGT", ano: 2007, priceUSD: 3300000, summary: "Protótipo/edição limitada inspirado em corrida.", potencia: "750 cv", zeroCem: "3.2 s", vmax: "400 km/h", motor: "V8 4.7L", img: "https://di-uploads-pod25.dealerinspire.com/koenigseggflorida/uploads/2020/12/CCGTasset6.jpg" },
  /* Bugatti */
  { marca: "Bugatti", model: "Chiron", ano: 2016, priceUSD: 3000000, summary: "Hypercar W16 com luxo e potência extraordinária.", potencia: "1500 cv", zeroCem: "2.4 s", vmax: "420 km/h", motor: "W16 8.0L quad-turbo", img: "https://cdn.motor1.com/images/mgl/VzMq0z/s3/bugatti-chiron-1500.jpg" },
  { marca: "Bugatti", model: "Pur Sport", ano: 2020, priceUSD: 3600000, summary: "Focado em agilidade e curvas com pacote leve.", potencia: "1479 cv", zeroCem: "2.4 s", vmax: "350 km/h", motor: "W16 8.0L", img: "https://news.dupontregistry.com/wp-content/uploads/2023/08/bugatti-chiron-pur-sport-sur-mesure-scaled.jpg" },
  { marca: "Bugatti", model: "Chiron Super Sport 300+", ano: 2021, priceUSD: 3900000, summary: "Versão de velocidade máxima extrema.", potencia: "1600 cv", zeroCem: "2.3 s", vmax: "490 km/h (comprovado)", motor: "W16 8.0L", img: "https://www.automaistv.com.br/wp-content/uploads/2019/09/bugatti_chiron_prototype.jpg" },
  { marca: "Bugatti", model: "Divo", ano: 2018, priceUSD: 5800000, summary: "Mais leve e ágil que o Chiron, foco pista.", potencia: "1500 cv", zeroCem: "2.4 s", vmax: "380 km/h", motor: "W16 8.0L", img: "https://cdn.motor1.com/images/mgl/gZlkg/s1/bugatti-divo-front-view.jpg" },
  { marca: "Bugatti", model: "Centodieci", ano: 2019, priceUSD: 9000000, summary: "Edição limitada homenageando EB110.", potencia: "1600 cv", zeroCem: "2.3 s", vmax: "380 km/h", motor: "W16 8.0L", img: "https://s1.cdn.autoevolution.com/images/news/someone-spent-a-fortune-to-buy-a-bugatti-centodieci-is-trying-to-cash-after-272-miles-243969_1.jpg" },
  { marca: "Bugatti", model: "Tourbillon", ano: 2024, priceUSD: 4100000, summary: "Conceito de luxo com performance elevada.", potencia: "1500 cv", zeroCem: "2.3 s", vmax: "420 km/h", motor: "W16 8.0L", img: "https://onpost.com.br/wp-content/uploads/2024/11/Photo_18321_1530-1.jpg" },
  { marca: "Bugatti", model: "La Voiture Noire", ano: 2019, priceUSD: 18500000, summary: "One-off ultra exclusivo e caro.", potencia: "1500 cv", zeroCem: "2.3 s", vmax: "420 km/h", motor: "W16 8.0L", img: "https://s2-autoesporte.glbimg.com/utKejaHN0NZfy3gu5WadFjtw0Ic=/0x0:1280x920/1008x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2019/d/i/OVBSOuSRmiSM7LOcLJ9g/bugatti-la-voiture-noire-2019-1280-02.jpg" },
  { marca: "Bugatti", model: "Mistral", ano: 2022, priceUSD: 5000000, summary: "Roadster moderno com performance máxima.", potencia: "1600 cv", zeroCem: "2.4 s", vmax: "420 km/h", motor: "W16 8.0L", img: "http://exclusivecarregistry.com/render-images?imgid=903848" },
  { marca: "Bugatti", model: "Veyron", ano: 2005, priceUSD: 1300000, summary: "Lendário hypercar que mudou era dos supercars.", potencia: "1001 cv", zeroCem: "2.5 s", vmax: "407 km/h", motor: "W16 8.0L", img: "https://bordalo.observador.pt/v2/rs:fill:900/c:770:433:nowe:0:0/q:70/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2018/12/10143748/se-image-1b8a7c167bd3c67312baf6b785410cab_770x433_acf_cropped.jpg" },
  { marca: "Bugatti", model: "Brouillard", ano: 2025, priceUSD: 30000000, summary: "Edição ultra limitada - dados não oficiais.", potencia: "1500 cv", zeroCem: "2.3 s", vmax: "420 km/h", motor: "W16 8.0L", img: "https://i0.statig.com.br/bancodeimagens/e5/8x/kv/e58xkvru959dwjm3oisosnlob.jpg" },
  /* Aston Martin */
  { marca: "Aston Martin", model: "DB5", ano: 1963, priceUSD: 1000000, summary: "Clássico de James Bond, raridade e elegância.", potencia: "290 cv", zeroCem: "8.5 s", vmax: "235 km/h", motor: "I6 4.0L", img: "https://autoentusiastas.com.br/ae/wp-content/uploads/2023/09/DB5-1963-1280-0d.jpg" },
  { marca: "Aston Martin", model: "DB9", ano: 2004, priceUSD: 155000, summary: "Coupé de luxo elegante e refinado.", potencia: "510 cv", zeroCem: "4.3 s", vmax: "295 km/h", motor: "V12 5.9L", img: "https://www.motoringresearch.com/wp-content/uploads/2015/08/01_Aston_Martin_DB9_GT_2015-1.jpg" },
  { marca: "Aston Martin", model: "DB11", ano: 2016, priceUSD: 214000, summary: "Gran turismo moderno com luxo e performance.", potencia: "510 cv", zeroCem: "4.0 s", vmax: "300 km/h", motor: "V8/V12", img: "https://images.pistonheads.com/nimg/44059/dc11d.jpg" },
  { marca: "Aston Martin", model: "DBS Superleggera", ano: 2018, priceUSD: 304000, summary: "Gran turismo de alta performance com V12 biturbo.", potencia: "715 cv", zeroCem: "3.4 s", vmax: "340 km/h", motor: "V12 5.2L", img: "https://img.sm360.ca/images/article/dilawri-group-of-companies/66253//fdb-b1568758130113.jpg" },
  { marca: "Aston Martin", model: "Vantage", ano: 2018, priceUSD: 149000, summary: "Coupé esportivo, equilíbrio entre luxo e performance.", potencia: "510 cv", zeroCem: "3.6 s", vmax: "314 km/h", motor: "V8 4.0L", img: "https://cdn.motor1.com/images/mgl/Akg9l6/s1/aston-martin-vantage-gt4.webp" },
  { marca: "Aston Martin", model: "Vanquish", ano: 2001, priceUSD: 228000, summary: "Super GT elegante e potente.", potencia: "603 cv", zeroCem: "3.9 s", vmax: "330 km/h", motor: "V12 5.9L", img: "https://cdn.motor1.com/images/mgl/6ZoZeE/s3/aston-martin-vanquish_6.jpg" },
  { marca: "Aston Martin", model: "Rapide", ano: 2010, priceUSD: 199000, summary: "Sedã esportivo de luxo com quatro portas.", potencia: "558 cv", zeroCem: "4.2 s", vmax: "305 km/h", motor: "V12 6.0L", img: "https://media.ed.edmunds-media.com/aston-martin/rapide-s/2016/oem/2016_aston-martin_rapide-s_sedan_base_fq_oem_1_1600.jpg" },
  { marca: "Aston Martin", model: "Valkyrie", ano: 2017, priceUSD: 3000000, summary: "Hypercar com tecnologia de F1 e desempenho extremo.", potencia: "1160 cv", zeroCem: "2.5 s", vmax: "402 km/h", motor: "V12 6.5L", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Aston_Martin_Valkyrie_Verification_Prototype_001_Genf_2019_1Y7A5569.jpg/330px-Aston_Martin_Valkyrie_Verification_Prototype_001_Genf_2019_1Y7A5569.jpg" },
  { marca: "Aston Martin", model: "Valhalla", ano: 2021, priceUSD: 800000, summary: "Hypercar híbrido com foco em aerodinâmica.", potencia: "950 cv", zeroCem: "2.8 s", vmax: "330 km/h", motor: "V6/V8 híbrido", img: "https://www.topgearmag.in/uploads/News/Image/1734940217-1.jpg" },
  { marca: "Aston Martin", model: "One-77", ano: 2009, priceUSD: 1400000, summary: "Edição limitada exclusiva, luxo extremo.", potencia: "750 cv", zeroCem: "3.4 s", vmax: "354 km/h", motor: "V12 7.3L", img: "https://www.thesupercarblog.com/wp-content/uploads/2017/02/Striking-Blue-Aston-Martin-One-77-For-Sale-in-the-US-2.jpg" },
  /* Porsche */
  { marca: "Porsche", model: "911 Carrera S", ano: 2019, priceUSD: 120000, summary: "Coupé esportivo icônico com dinâmica apurada.", potencia: "450 cv", zeroCem: "3.7 s", vmax: "308 km/h", motor: "B6 3.0L", img: "https://s3.ecompletocarros.dev/images/lojas/285/veiculos/205800/veiculoInfoVeiculoImagesMobile/vehicle_image_1723695436_d41d8cd98f00b204e9800998ecf8427e.jpeg" },
  { marca: "Porsche", model: "911 GT3 RS (992)", ano: 2022, priceUSD: 241300, summary: "Versão pista do 911, aerodinâmica extrema.", potencia: "520 cv", zeroCem: "3.2 s", vmax: "312 km/h", motor: "B6 4.0L", img: "https://cdn.elferspot.com/wp-content/uploads/2023/01/27/Porsche-911-992-GT3-RS-kaufen-gebraucht-1.jpg?class=xl" },
  { marca: "Porsche", model: "911 Turbo S", ano: 2020, priceUSD: 216000, summary: "Coupé de referência em performance e luxo.", potencia: "650 cv", zeroCem: "2.7 s", vmax: "330 km/h", motor: "B6 3.8L", img: "https://assets.bwbx.io/images/users/iqjWHBFdfxIU/ijsxlvQB.bu8/v0/-1x-1.webp" },
    /* === 🏁 SÉRIE 911 (TODAS AS VARIAÇÕES) === */
{ marca: "Porsche", model: "911 GT3 (992)", ano: 2022, priceUSD: 185000, summary: "A expressão mais pura do 911 para as pistas, com um motor aspirado de alta rotação e foco na dirigibilidade.", potencia: "510 cv", zeroCem: "3.4 s", vmax: "318 km/h", motor: "Flat-6 4.0L Aspirado", img: "http://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhy7dxIryATH9MhLubYG0btgZsNegStDdvACeXSmN4DMqU9OBkLFbp0-yN8OpjbdcY6fg33zxyj4uvf1mGOj_UGPupC-PMOv3HW0zKrcM-fY_JiOMSy32XorDIPwV2fABybmBN3qYQQDK_l/s2048/Porsche-911-GT3-992+%25287%2529.jpg" },
{ marca: "Porsche", model: "911 GT2 (997)", ano: 2008, priceUSD: 300000, summary: "A versão turbo e de tração traseira do GT3, conhecida por sua performance brutal e exigente. O antecessor do RS.", potencia: "530 cv", zeroCem: "3.7 s", vmax: "329 km/h", motor: "Flat-6 3.6L Twin-Turbo", img: "https://www.tomhartleyjnr.com/wp-content/uploads/2019/05/55BD-000_1024x768.jpg" },
{ marca: "Porsche", model: "911 GT2 RS (991.2)", ano: 2018, priceUSD: 650000, summary: "Apelidado de 'Widowmaker'. O 911 de rua mais potente e rápido já feito, combinando o motor Turbo com um chassi de GT3.", potencia: "700 cv", zeroCem: "2.8 s", vmax: "340 km/h", motor: "Flat-6 3.8L Twin-Turbo", img: "https://cdn.awsli.com.br/2500x2500/2571/2571273/produto/2232958698e38929870.jpg" },
{ marca: "Porsche", model: "911 R (991)", ano: 2016, priceUSD: 550000, summary: "Uma edição limitada para puristas, combinando o motor do GT3 RS com um câmbio manual e um visual mais discreto.", potencia: "500 cv", zeroCem: "3.8 s", vmax: "323 km/h", motor: "Flat-6 4.0L Aspirado", img: "https://www.tomhartleyjnr.com/wp-content/uploads/2019/05/911R-000_1024x768.jpg" },
{ marca: "Porsche", model: "911 Sport Classic (997)", ano: 2010, priceUSD: 350000, summary: "A primeira edição retrô, com traseira 'ducktail', rodas Fuchs e interior exclusivo. Apenas 250 unidades.", potencia: "408 cv", zeroCem: "4.6 s", vmax: "302 km/h", motor: "Flat-6 3.8L Aspirado", img: "https://images.collectingcars.com/020887/mainimage.jpg?w=1263&fit=fillmax&crop=edges&auto=format,compress&cs=srgb&q=85" },
{ marca: "Porsche", model: "911 Sport Classic (992)", ano: 2023, priceUSD: 450000, summary: "A segunda edição retrô, combinando o visual clássico 'ducktail' com o motor do 911 Turbo e câmbio manual.", potencia: "550 cv", zeroCem: "4.1 s", vmax: "315 km/h", motor: "Flat-6 3.7L Twin-Turbo", img: "https://cdn.motor1.com/images/mgl/400Zl1/s1/2023-porsche-911-sport-classic-exterior-view.jpg" },
{ marca: "Porsche", model: "911 Dakar (992)", ano: 2023, priceUSD: 280000, summary: "Homenagem às vitórias da Porsche no Rali Paris-Dakar. Um 911 com suspensão elevada e capacidade off-road.", potencia: "480 cv", zeroCem: "3.4 s", vmax: "240 km/h", motor: "Flat-6 3.0L Twin-Turbo", img: "https://www.stuttcars.com/wp-content/uploads/2023/10/2023_porsche_911-dakar_0025-scaled-1.jpg" },
{ marca: "Porsche", model: "911 Targa 4 (992)", ano: 2022, priceUSD: 145000, summary: "A versão de entrada do icônico Targa, combinando tração integral com o teto de vidro retrátil.", potencia: "385 cv", zeroCem: "4.4 s", vmax: "289 km/h", motor: "Flat-6 3.0L Twin-Turbo", img: "https://www.tomhartleyjnr.com/wp-content/uploads/2023/06/Porsche-911-Targa-4-010.jpg" },
{ marca: "Porsche", model: "911 Targa 4S (992)", ano: 2022, priceUSD: 160000, summary: "A versão 'S' do Targa, com mais potência e freios maiores, mantendo o estilo clássico.", potencia: "450 cv", zeroCem: "3.8 s", vmax: "304 km/h", motor: "Flat-6 3.0L Twin-Turbo", img: "https://cdn.motor1.com/images/mgl/OpLky/s1/porsche-911-targa-heritage-design-edition-2020.webp" },
{ marca: "Porsche", model: "911 Targa 4 GTS (992)", ano: 2022, priceUSD: 180000, summary: "O Targa mais potente e focado em performance, com o pacote GTS e visual escurecido.", potencia: "480 cv", zeroCem: "3.5 s", vmax: "307 km/h", motor: "Flat-6 3.0L Twin-Turbo", img: "https://www.stuttcars.com/wp-content/uploads/2022/12/Porsche-911-Targa-4-GTS-992-Specs-2023.jpeg" },
{ marca: "Porsche", model: "911 Carrera 4 (992)", ano: 2022, priceUSD: 125000, summary: "A versão coupé com tração integral, oferecendo mais segurança e estabilidade em todas as condições.", potencia: "385 cv", zeroCem: "4.2 s", vmax: "291 km/h", motor: "Flat-6 3.0L Twin-Turbo", img: "https://media.autoexpress.co.uk/image/private/s--X-WVjvBW--/f_auto,t_content-image-full-desktop@1/v1679665625/evo/2023/03/Litchfield%20Porsche%20911%20Carrera%204%20992-5.jpg" },
{ marca: "Porsche", model: "911 Carrera 4S (992)", ano: 2022, priceUSD: 140000, summary: "A combinação de mais potência da versão 'S' com a segurança da tração integral.", potencia: "450 cv", zeroCem: "3.6 s", vmax: "306 km/h", motor: "Flat-6 3.0L Twin-Turbo", img: "https://images-porsche.imgix.net/-/media/962D135C95E74E8897E80ED6875AE529_576C477FB3BC477D9EF3D8C8AAF98C41_CZ26W03OX0001-911-carrera-s-open-graph" },
{ marca: "Porsche", model: "911 Speedster (997)", ano: 2011, priceUSD: 300000, summary: "Edição limitada (356 unidades) da geração 997, com para-brisa rebaixado e a traseira 'double bubble'.", potencia: "408 cv", zeroCem: "4.6 s", vmax: "305 km/h", motor: "Flat-6 3.8L Aspirado", img: "https://static0.topspeedimages.com/wordpress/wp-content/uploads/2022/12/a9b074b4a50b51f8ba1cebdbd8ae201c7a0928ef.jpg" },
{ marca: "Porsche", model: "911 Speedster (991)", ano: 2019, priceUSD: 500000, summary: "Edição comemorativa e limitada com o motor do GT3, para-brisa rebaixado e uma capota minimalista.", potencia: "510 cv", zeroCem: "4.0 s", vmax: "310 km/h", motor: "Flat-6 4.0L Aspirado", img: "https://www.topgear.com/sites/default/files/images/news-article/2018/06/d4533c9f126ca9afcb977bcfe0844f9d/embargo_20_30_cest_8_june_2018_porsche_911_speedster_concept.jpg" },
{ marca: "Porsche", model: "911 GT3 Cup (992)", ano: 2021, priceUSD: 275000, summary: "O carro de corrida mais vendido do mundo, usado na categoria monomarca Porsche Supercup.", potencia: "510 cv", zeroCem: "3.0 s", vmax: "300 km/h", motor: "Flat-6 4.0L Aspirado", img: "https://www.supercars.net/blog/wp-content/uploads/2021/09/img_2-scaled.jpg" },
{ marca: "Porsche", model: "911 GT3 R (992)", ano: 2023, priceUSD: 570000, summary: "A versão de corrida para a categoria GT3, usada por equipes de clientes em campeonatos de endurance ao redor do mundo.", potencia: "565 cv", zeroCem: "3.1 s", vmax: "300+ km/h", motor: "Flat-6 4.2L Aspirado", img: "https://cdn.motor1.com/images/mgl/9mmboX/s1/porsche-911-gt3-r.jpg" },
{ marca: "Porsche", model: "911 RSR (GTE)", ano: 2019, priceUSD: 1000000, summary: "O carro de corrida oficial da Porsche para Le Mans. Diferente dos 911 de rua, seu motor é central-traseiro.", potencia: "515 cv", zeroCem: "3.0 s", vmax: "300+ km/h", motor: "Flat-6 4.2L Aspirado", img: "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhKkxAraP_nElnfX_sFweyP1Jyo5SDUtwmgP5t6vAViBynAy6w_iWWf7CvDMe1KmOmvWrmM_1X_hJ4fK1LH2_JFFiZbm8_-dogP1Df5fwUR9_dcXoOw6t8zDPYCeUjRPR_qZJwdxb47nglh/s1600/911+RSR+GTE+1.jpg" },
  { marca: "Porsche", model: "Taycan", ano: 2019, priceUSD: 110000, summary: "Elétrico de alta performance da Porsche.", potencia: "761 cv", zeroCem: "2.8 s", vmax: "260 km/h", motor: "Elétrico", img: "https://images-porsche.imgix.net/-/media/7C527F1DC7424F3A83AC32342BC57830_0F6B57C8930443629954E5FBA89A3F57_EX25Q3QIX0001-taycan-gts-open-graph" },
  { marca: "Porsche", model: "918 Spyder", ano: 2013, priceUSD: 845000, summary: "Hypercar híbrido com tecnologia avançada.", potencia: "887 cv", zeroCem: "2.6 s", vmax: "340 km/h", motor: "V8 4.6L híbrido", img: "https://cdn.elferspot.com/wp-content/uploads/2023/10/12/DSC_3983.jpg?class=xl" },
  { marca: "Porsche", model: "718 Cayman", ano: 2016, priceUSD: 65000, summary: "Coupé compacto para pista e rua.", potencia: "365 cv", zeroCem: "4.5 s", vmax: "285 km/h", motor: "B4 2.5L", img: "https://media.ed.edmunds-media.com/porsche/718-cayman/2025/oem/2025_porsche_718-cayman_coupe_gt4-rs_fq_oem_1_1600.jpg" },
  { marca: "Porsche", model: "718 Boxster", ano: 2016, priceUSD: 68000, summary: "Roadster divertido, experiência de condução pura.", potencia: "365 cv", zeroCem: "4.7 s", vmax: "285 km/h", motor: "B4 2.5L", img: "https://miamiimports.com.br/wp-content/uploads/2023/09/mi_logo-black-4-copiar-32-1.png" },
  
  /* === 🐍 PORSCHE 718 / Cayman / Boxster === */
{ marca: "Porsche", model: "718 Cayman GT4", ano: 2020, priceUSD: 110000, summary: "O retorno do motor de 6 cilindros aspirado à linha 718, em uma versão focada para as pistas.", potencia: "420 cv", zeroCem: "4.4 s", vmax: "304 km/h", motor: "Flat-6 4.0L Aspirado", img: "https://conteudo.imguol.com.br/c/entretenimento/a5/2019/07/16/porsche-718-cayman-gt4-1563310866204_v2_4x3.jpg" },
{ marca: "Porsche", model: "718 Cayman GT4 RS", ano: 2022, priceUSD: 180000, summary: "O ápice da linha 718. Um carro de pista para as ruas com o glorioso motor aspirado do 911 GT3.", potencia: "500 cv", zeroCem: "3.4 s", vmax: "315 km/h", motor: "Flat-6 4.0L Aspirado", img: "https://www.manthey-racing.com/sites/default/files/styles/header/public/2024-04/M01_TEQ_GT4Manthey_gesamt_wf03_RGB_neu.jpg.webp?itok=0anksIo4" },
{ marca: "Porsche", model: "718 Spyder", ano: 2020, priceUSD: 105000, summary: "A versão roadster do GT4, com o mesmo motor aspirado e um design único com 'corcovas' traseiras.", potencia: "420 cv", zeroCem: "4.4 s", vmax: "301 km/h", motor: "Flat-6 4.0L Aspirado", img: "https://www.topgear.com/sites/default/files/cars-car/image/2019/11/rp_-_porsche_718_boxster_spyder-19_0.jpg" },
{ marca: "Porsche", model: "718 Spyder RS", ano: 2023, priceUSD: 190000, summary: "A versão conversível do GT4 RS. A experiência mais intensa de um roadster de motor central que a Porsche já criou.", potencia: "500 cv", zeroCem: "3.4 s", vmax: "308 km/h", motor: "Flat-6 4.0L Aspirado", img: "https://garagem360.com.br/wp-content/uploads/2024/02/porsche-718-spyder-rs-2024-3.jpeg" },
{ marca: "Porsche", model: "Cayman R (987)", ano: 2011, priceUSD: 85000, summary: "O Cayman 'R' de 'Racing'. Uma versão mais leve e focada do Cayman S da geração 987, um clássico moderno.", potencia: "330 cv", zeroCem: "4.7 s", vmax: "282 km/h", motor: "Flat-6 3.4L Aspirado", img: "https://dragon2000-multisite.s3.eu-west-2.amazonaws.com/wp-content/uploads/sites/509/2024/09/09112330/1769-frt2-Large.jpg" },
{ marca: "Porsche", model: "Boxster Spyder (981)", ano: 2016, priceUSD: 120000, summary: "A geração 981 do Spyder, aclamada por sua dirigibilidade e pelo motor 3.8 do Carrera S.", potencia: "375 cv", zeroCem: "4.5 s", vmax: "290 km/h", motor: "Flat-6 3.8L Aspirado", img: "https://www.stuttcars.com/wp-content/uploads/2021/10/stuttcars-981-spyder-25-copyright-porsche.jpg" },

/* === 🏎️ SUPERESPORTIVOS E LENDAS DAS PISTAS === */
{ marca: "Porsche", model: "911 GT1 Straßenversion", ano: 1996, priceUSD: 12000000, summary: "A versão de rua do carro campeão de Le Mans. Um verdadeiro protótipo de corrida legalizado para as ruas.", potencia: "544 cv", zeroCem: "3.7 s", vmax: "310 km/h", motor: "Flat-6 3.2L Twin-Turbo", img: "https://cdn.motor1.com/images/mgl/pb7nwr/s1/porsche-911-gt1.jpg" },
{ marca: "Porsche", model: "935 (2019)", ano: 2019, priceUSD: 1500000, summary: "Uma reinterpretação moderna do lendário 'Moby Dick', baseada no GT2 RS. Apenas 77 unidades, para uso em pista.", potencia: "700 cv", zeroCem: "2.7 s", vmax: "340 km/h", motor: "Flat-6 3.8L Twin-Turbo", img: "https://s2-autoesporte.glbimg.com/lts8yF09rXMsXzYGLIl2L8vlQTE=/0x0:620x349/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2020/D/V/Cfqt4iS8mT8XOKGt8ZpQ/2019-05-20-9961c8a3-porsche-935-livery-3.jpg" },
{ marca: "Porsche", model: "904 Carrera GTS", ano: 1964, priceUSD: 2500000, summary: "Um belíssimo carro de corrida com carroceria de fibra de vidro, o último Porsche com motor de 4 cilindros a vencer corridas.", potencia: "180 cv", zeroCem: "5.5 s", vmax: "260 km/h", motor: "Flat-4 2.0L Aspirado", img: "https://images.squarespace-cdn.com/content/v1/5e7918a4b1051f6e49dcfdb1/1692394044827-FY9KTZOTCH6IEHFWMZYC/DS102004FF.jpg" },
{ marca: "Porsche", model: "906 Carrera 6", ano: 1966, priceUSD: 2000000, summary: "O primeiro protótipo de corrida da Porsche com carroceria de fibra de vidro, sucessor do 904.", potencia: "210 cv", zeroCem: "5.3 s", vmax: "280 km/h", motor: "Flat-6 2.0L Aspirado", img: "https://cdn.rmsothebys.com/a/2/3/1/f/8/a231f833b9c70dfec9a1751b6a8c60febe04ceed.webp" },
{ marca: "Porsche", model: "908/03 Spyder", ano: 1970, priceUSD: 5000000, summary: "Um protótipo de corrida ultraleve e ágil, projetado especificamente para pistas sinuosas como Nürburgring e Targa Florio.", potencia: "350 cv", zeroCem: "4.0 s", vmax: "290 km/h", motor: "Flat-8 3.0L Aspirado", img: "https://i.ytimg.com/vi/4ih8pEeNH8M/maxresdefault.jpg" },
{ marca: "Porsche", model: "910", ano: 1967, priceUSD: 2200000, summary: "Evolução do 906, com rodas de 13 polegadas e fixação central, uma inovação na época.", potencia: "220 cv", zeroCem: "5.0 s", vmax: "285 km/h", motor: "Flat-6 2.0L Aspirado", img: "https://upload.wikimedia.org/wikipedia/commons/b/b7/Porsche_910_at_Barber_2010_01.jpg" },
{ marca: "Porsche", model: "917 K", ano: 1970, priceUSD: 20000000, summary: "A lenda de Le Mans. Imortalizado por Steve McQueen, o 917 deu à Porsche suas primeiras vitórias na geral.", potencia: "630 cv", zeroCem: "2.7 s", vmax: "362 km/h", motor: "Flat-12 4.9L Aspirado", img: "https://www.stuttcars.com/wp-content/uploads/2021/07/original3.jpeg" },
{ marca: "Porsche", model: "956", ano: 1982, priceUSD: 9000000, summary: "O primeiro protótipo de corrida com chassi monocoque de alumínio e o primeiro a explorar o efeito solo.", potencia: "620 cv", zeroCem: "2.8 s", vmax: "370 km/h", motor: "Flat-6 2.65L Turbo", img: "https://www.ultimatecarpage.com/images/car/426/Porsche-956-3243.jpg" },
{ marca: "Porsche", model: "962C", ano: 1985, priceUSD: 10000000, summary: "A evolução do 956, um dos protótipos de corrida mais dominantes da história, vencendo Le Mans e Daytona.", potencia: "680 cv", zeroCem: "2.8 s", vmax: "390 km/h", motor: "Flat-6 3.0L Turbo", img: "https://www.ultimatecarpage.com/images/car/754/Porsche-962C-7190.jpg" },
{ marca: "Porsche", model: "RS Spyder (9R6)", ano: 2005, priceUSD: 6000000, summary: "Protótipo da categoria LMP2 desenvolvido com a Penske Racing que dominou a American Le Mans Series.", potencia: "503 cv", zeroCem: "3.0 s", vmax: "330 km/h", motor: "V8 3.4L Aspirado", img: "https://cdn.dealeraccelerate.com/bagauction/9/1521/75875/1920x1440/2007-porsche-rs-spyder-evo" },

/* === 🚘 CLÁSSICOS DE RUA E COLECIONADOR === */
{ marca: "Porsche", model: "356 A Speedster", ano: 1956, priceUSD: 350000, summary: "O primeiro carro da Porsche. Leve, simples e com um design icônico, deu início à lenda.", potencia: "60 cv", zeroCem: "14.0 s", vmax: "160 km/h", motor: "Flat-4 1.6L Aspirado", img: "https://cdn.motor1.com/images/mgl/BoRM6/s1/1959-porsche-356-speedster-aquamarine-transitional-by-emory-motorsport.webp" },
{ marca: "Porsche", model: "911 Turbo (930)", ano: 1975, priceUSD: 250000, summary: "O primeiro 911 Turbo. Famoso por seu visual agressivo e pela entrega de potência brutal e desafiadora.", potencia: "260 cv", zeroCem: "5.5 s", vmax: "250 km/h", motor: "Flat-6 3.0L Turbo", img: "https://upload.wikimedia.org/wikipedia/commons/c/c4/Porsche_911_Turbo.jpg" },
{ marca: "Porsche", model: "911 Carrera RS 2.7", ano: 1973, priceUSD: 1000000, summary: "Um dos 911 mais valiosos e celebrados. Uma edição de homologação leve e focada na dirigibilidade.", potencia: "210 cv", zeroCem: "5.8 s", vmax: "245 km/h", motor: "Flat-6 2.7L Aspirado", img: "https://cdn.rmsothebys.com/d/6/0/5/9/e/d6059e9724f1cc13448d98f164718c032f6ee881.webp" },
{ marca: "Porsche", model: "911 SC", ano: 1981, priceUSD: 75000, summary: "O 'Super Carrera' marcou uma era de confiabilidade e durabilidade para o 911 nos anos 80.", potencia: "204 cv", zeroCem: "6.5 s", vmax: "235 km/h", motor: "Flat-6 3.0L Aspirado", img: "https://mediaassets.pca.org/pages/pca/images/content/911-sc.jpg" },
{ marca: "Porsche", model: "911 (993) Turbo", ano: 1995, priceUSD: 280000, summary: "O último dos 911 com motor refrigerado a ar. Um marco na história da Porsche, combinando design clássico e performance moderna.", potencia: "408 cv", zeroCem: "4.5 s", vmax: "290 km/h", motor: "Flat-6 3.6L Twin-Turbo", img: "https://cdn.elferspot.com/wp-content/uploads/2022/11/21/porsche-993-turbo-s-for-sale01.jpg?class=xl" },
{ marca: "Porsche", model: "911 Carrera (964)", ano: 1989, priceUSD: 100000, summary: "A geração que modernizou o 911 com molas helicoidais, ABS e Tiptronic, mantendo o visual clássico.", potencia: "250 cv", zeroCem: "5.7 s", vmax: "260 km/h", motor: "Flat-6 3.6L Aspirado", img: "https://upload.wikimedia.org/wikipedia/commons/b/b5/1991_Porsche_964_Turbo_in_Summer_Yellow%2C_front_right.jpg" },
{ marca: "Porsche", model: "912", ano: 1965, priceUSD: 60000, summary: "A versão de entrada do 911, com o mesmo chassi mas com o motor de 4 cilindros do 356.", potencia: "90 cv", zeroCem: "12.0 s", vmax: "185 km/h", motor: "Flat-4 1.6L Aspirado", img: "https://images-porsche.imgix.net/-/media/FB73E6373E9648F797C03EE5270F1659_C2D233B127524E4190EC75F321815AC8_020_info-slider_912_16_1965-69_desktop?w=1299&q=85&auto=format" },
{ marca: "Porsche", model: "914/6", ano: 1970, priceUSD: 100000, summary: "Esportivo de motor central feito com a VW. A versão '/6' usava o motor de 6 cilindros do 911 T.", potencia: "110 cv", zeroCem: "8.7 s", vmax: "201 km/h", motor: "Flat-6 2.0L Aspirado", img: "https://upload.wikimedia.org/wikipedia/commons/6/67/Porsche_914_6_GT_1970_%28Volante%29_jm20580.jpg" },
{ marca: "Porsche", model: "924 Turbo", ano: 1979, priceUSD: 25000, summary: "O esportivo de entrada da Porsche com motor dianteiro, que ganhou a performance que merecia com a adição de um turbo.", potencia: "170 cv", zeroCem: "7.8 s", vmax: "225 km/h", motor: "I4 2.0L Turbo", img: "https://images.collectingcars.com/002496/cover.jpg?w=1263&fit=fillmax&crop=edges&auto=format,compress&cs=srgb&q=85" },
{ marca: "Porsche", model: "944 Turbo", ano: 1986, priceUSD: 50000, summary: "A evolução do 924. Um esportivo de motor dianteiro aclamado por seu equilíbrio e dirigibilidade.", potencia: "220 cv", zeroCem: "6.3 s", vmax: "245 km/h", motor: "I4 2.5L Turbo", img: "https://www.beverlyhillscarclub.com/galleria_images/15540/15540_main_l.jpg" },
{ marca: "Porsche", model: "968 Club Sport", ano: 1993, priceUSD: 80000, summary: "A evolução final da linha 924/944. A versão Club Sport é a mais leve e desejada pelos puristas.", potencia: "240 cv", zeroCem: "6.5 s", vmax: "252 km/h", motor: "I4 3.0L Aspirado", img: "https://www.pcarmarket.com/static/media/uploads/galleries/photos/uploads/galleries/42481-monarch-1993-porsche-968-clubsport/.thumbnails/Porsche-968cs-111-of-125-84407.webp/Porsche-968cs-111-of-125-84407-tiny-1200x0.webp" },

/* === 🚙 SUVS E SEDANS === */
{ marca: "Porsche", model: "Panamera", ano: 2020, priceUSD: 92000, summary: "Sedã/gran turismo de luxo com opções potentes.", potencia: "630 cv", zeroCem: "3.6 s", vmax: "310 km/h", motor: "V6/V8", img: "https://http2.mlstatic.com/D_NQ_856615-MLA78295633356_082024-OO.jpg" },
{ marca: "Porsche", model: "Macan", ano: 2018, priceUSD: 60000, summary: "SUV compacto esportivo.", potencia: "440 cv", zeroCem: "5.3 s", vmax: "270 km/h", motor: "I4/V6", img: "https://cdn.motor1.com/images/mgl/Vz8VzM/s3/2022-porsche-macan-t.jpg" },
{ marca: "Porsche", model: "Cayenne", ano: 2017, priceUSD: 80000, summary: "SUV de luxo, potente e versátil.", potencia: "680 cv", zeroCem: "4.2 s", vmax: "285 km/h", motor: "V6/V8", img: "https://hips.hearstapps.com/hmg-prod/images/2025-porsche-cayenne-gts-160-68504e3083082.jpg?crop=0.792xw:0.668xh;0.112xw,0.204xh&resize=2048:*" },
{ marca: "Porsche", model: "Cayenne Turbo GT", ano: 2023, priceUSD: 200000, summary: "O Cayenne mais rápido e esportivo, projetado para quebrar recordes em Nürburgring. Exclusivo da versão Coupé.", potencia: "640 cv", zeroCem: "3.3 s", vmax: "300 km/h", motor: "V8 4.0L Twin-Turbo", img: "https://media.ed.edmunds-media.com/porsche/cayenne-coupe/2024/oem/2024_porsche_cayenne-coupe_4dr-suv_turbo-gt_fq_oem_1_1600.jpg" },
{ marca: "Porsche", model: "Macan T", ano: 2023, priceUSD: 70000, summary: "A versão 'Touring', focada na agilidade e no prazer de dirigir, com um motor 4 cilindros mais leve.", potencia: "265 cv", zeroCem: "6.2 s", vmax: "232 km/h", motor: "I4 2.0L Turbo", img: "https://images-porsche.imgix.net/-/media/A0BDAE18C393426EAF3D7B7592FFD884_87919E93A7A0464CADD32AC9B8881AC8_MA22T3GOX0003-macan-t-front?w=2560&h=1440&q=45&crop=faces%2Centropy%2Cedges&auto=format" },
{ marca: "Porsche", model: "Macan GTS", ano: 2023, priceUSD: 90000, summary: "A versão 'Gran Turismo Sport' do Macan, focada em ser o SUV mais ágil e com a melhor dirigibilidade do mercado.", potencia: "440 cv", zeroCem: "4.3 s", vmax: "272 km/h", motor: "V6 2.9L Twin-Turbo", img: "https://images-porsche.imgix.net/-/media/EBABFB82E35E40B587953C8287893BAB_101DA40C5B1148A79B77515567A338F7_MA22T3EOX0001-macan-gts-front?w=2560&h=1440&q=45&crop=faces%2Centropy%2Cedges&auto=format" },
{ marca: "Porsche", model: "Macan Turbo Electric", ano: 2024, priceUSD: 110000, summary: "A nova geração do Macan, agora 100% elétrica, com performance de supercarro e tecnologia de ponta.", potencia: "639 cv", zeroCem: "3.3 s", vmax: "260 km/h", motor: "Dois Motores Elétricos", img: "https://images-porsche.imgix.net/-/media/812E658B03C1400CB5FA2BFBC64F5A34_7833FB9BE1AB4792957649DDAD6E7F98_MA24T4EOX0014-macan-turbo-front?w=999&q=85&auto=format" },
{ marca: "Porsche", model: "Panamera Turbo S E-Hybrid", ano: 2022, priceUSD: 210000, summary: "O sedã mais potente da Porsche, combinando um motor V8 biturbo com um sistema híbrido para performance extrema.", potencia: "700 cv", zeroCem: "3.2 s", vmax: "315 km/h", motor: "V8 4.0L Twin-Turbo Híbrido", img: "https://images-porsche.imgix.net/-/media/730FE3C58C394077ACAF4990A20B0B61_BACDF254ED004E75B738EAA1D6532F25_PA24P5AOX0001-panamera-turbo-e-hybrid-front?w=2560&h=1440&q=45&crop=faces%2Centropy%2Cedges&auto=format" },

/* === ⚡ ELÉTRICOS E HÍBRIDOS === */
{ marca: "Porsche", model: "Taycan 4S", ano: 2023, priceUSD: 115000, summary: "A versão de entrada com tração integral do Taycan, oferecendo um excelente equilíbrio entre performance e autonomia.", potencia: "571 cv", zeroCem: "4.0 s", vmax: "250 km/h", motor: "Dois Motores Elétricos", img: "https://images-porsche.imgix.net/-/media/92C77A76FFFE4CB6AC4808FC077B9F4B_8B0BB52914224A8F81898F68A30289D3_taycan-4s?w=1759&q=85&auto=format" },
{ marca: "Porsche", model: "Taycan Turbo S", ano: 2023, priceUSD: 195000, summary: "O primeiro carro totalmente elétrico da Porsche, definindo um novo padrão de performance e dirigibilidade para EVs.", potencia: "761 cv", zeroCem: "2.8 s", vmax: "260 km/h", motor: "Dois Motores Elétricos", img: "https://ev-database.org/img/auto/Porsche_Taycan_Turbo_S/Porsche_Taycan_Turbo_S-01@2x.jpg" },
{ marca: "Porsche", model: "Taycan Cross Turismo", ano: 2023, priceUSD: 120000, summary: "A versão 'aventureira' do Taycan, com maior altura do solo e um design de 'shooting brake'.", potencia: "476 cv", zeroCem: "5.1 s", vmax: "220 km/h", motor: "Dois Motores Elétricos", img: "https://revistacarro.com.br/wp-content/uploads/2021/03/Porsche-Taycan-Cross-Turismo_1.jpg" },
{ marca: "Porsche", model: "Taycan Sport Turismo", ano: 2023, priceUSD: 140000, summary: "Combina a praticidade do Cross Turismo com a altura e o foco no asfalto do Taycan sedã.", potencia: "598 cv", zeroCem: "3.7 s", vmax: "250 km/h", motor: "Dois Motores Elétricos", img: "https://images-porsche.imgix.net/-/media/1C629EC0A58C4337AAAED5D6B34760E7_B2E33D71A51F42779EA51AF3A60A14B6_TA25Q3RIX0002-taycan-gts-sport-turismo-front?w=999&q=85&auto=format" },
{ marca: "Porsche", model: "Taycan Turbo GT", ano: 2024, priceUSD: 240000, summary: "O Porsche de produção mais potente da história. Um monstro elétrico que quebrou recordes em Nürburgring e Laguna Seca.", potencia: "1108 cv", zeroCem: "2.2 s", vmax: "305 km/h", motor: "Dois Motores Elétricos", img: "https://cdn.motor1.com/images/mgl/RqYJnP/s1/4x3/2025-porsche-taycan-turbo-gt.webp" },
{ marca: "Porsche", model: "Mission E (conceito)", ano: 2015, priceUSD: 250000, summary: "O conceito que chocou o mundo e deu origem ao Taycan, mostrando a visão da Porsche para um futuro elétrico.", potencia: "600 cv (estimado)", zeroCem: "3.5 s (estimado)", vmax: "250 km/h (estimado)", motor: "Dois Motores Elétricos", img: "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEguDb6rhlBtdXJEBuh-1XXLgTFFmCTsOs9AoYN4FWLGyipUAdGoBON4xmAQIQg4NYvaYcVC5o8iafw-ccgd0khiJEZBzQH9W4DO1Mwa2Hw7XcJ_-ZNAZQi9anM-VHHlgb1tK2mBYC-TqmHd/s1600/Porsche-Mission-E+%25281%2529.jpg" },
{ marca: "Porsche", model: "Mission X (conceito)", ano: 2023, priceUSD: 2000000, summary: "O conceito do futuro hypercar elétrico da Porsche, sucessor espiritual do 918 Spyder e 959.", potencia: "1500+ cv (estimado)", zeroCem: "2.0 s (estimado)", vmax: "340+ km/h (estimado)", motor: "Motores Elétricos", img: "https://www.automaistv.com.br/wp-content/uploads/2023/06/S23_0969_fine-1200x720.jpg" },

/* === 🧩 CONCEITOS E PROTÓTIPOS === */
{ marca: "Porsche", model: "989 (conceito)", ano: 1988, priceUSD: 350000, summary: "O 'pai' do Panamera. Um protótipo de sedã esportivo de 4 portas que foi cancelado nos anos 90.", potencia: "300 cv", zeroCem: "6.5 s", vmax: "250 km/h", motor: "V8 3.6L", img: "https://upload.wikimedia.org/wikipedia/commons/0/02/14352324_10154820894067668_2458497425004573089_oa.jpg" },
{ marca: "Porsche", model: "Vision 357", ano: 2023, priceUSD: 600000, summary: "Conceito comemorativo dos 75 anos da Porsche, uma reinterpretação moderna do icônico 356.", potencia: "500 cv", zeroCem: "3.5 s", vmax: "N/A", motor: "Flat-6 4.0L Aspirado", img: "https://newsroom.porsche.com/.imaging/mte/porsche-templating-theme/image_1290x726/dam/pnr/2023/Products/Porsche-Vision-357-Speedster/_Q1A0225.jpg/jcr:content/_Q1A0225.jpg" },
{ marca: "Porsche", model: "Vision Gran Turismo", ano: 2021, priceUSD: 2000000, summary: "Um hypercar elétrico virtual, criado exclusivamente para o jogo Gran Turismo, explorando o futuro do design da marca.", potencia: "1100 cv", zeroCem: "2.1 s", vmax: "350 km/h", motor: "Dois Motores Elétricos", img: "https://www.topgear.com/sites/default/files/2021/12/S.Bogner-2222_RGB_fullres.jpg" },
{ marca: "Porsche", model: "Vision Renndienst", ano: 2018, priceUSD: 250000, summary: "Um conceito de van elétrica e esportiva para até 6 pessoas, inspirado na van de serviço da equipe de corrida da Porsche.", potencia: "N/A", zeroCem: "N/A", vmax: "N/A", motor: "Elétrico", img: "https://media.zenfs.com/en/the_edge_961/d169e8d3d244c72c06841aeb847fcecf" },
{ marca: "Porsche", model: "911 Vision Safari (conceito)", ano: 2012, priceUSD: 350000, summary: "Protótipo baseado no 911 (991) com suspensão elevada e visual de rali, que mais tarde inspirou o 911 Dakar.", potencia: "400 cv", zeroCem: "4.5 s", vmax: "250 km/h", motor: "Flat-6 3.8L Aspirado", img: "https://www.carscoops.com/wp-content/uploads/2020/11/porsche-911-vision-safari-spinoff-14.jpg" },
  /* Hennessey */
  { marca: "Hennessey", model: "Venom F5", ano: 2020, priceUSD: 2100000, summary: "Hypercar americano projetado para 500+ km/h.", potencia: "1817 cv", zeroCem: "2.1 s", vmax: "437 km/h", motor: "V8 6.6L biturbo", img: "https://contents-cdn.viewus.co.kr/image/2025/05/CP-2023-0030/image-11ee49f1-4d9b-426d-ad2c-c1ec4e126cd6.jpeg" },
  { marca: "Hennessey", model: "Venom GT", ano: 2011, priceUSD: 1200000, summary: "Recordista de velocidade em sua época.", potencia: "1244 cv", zeroCem: "2.2 s", vmax: "435 km/h", motor: "V8 7.0L biturbo", img: "https://images.hgmsites.net/hug/2016-hennessey-venom-gt-spyder-naval-air-station-lemoore_100554253_h.jpg" },
  { marca: "Hennessey", model: "The Exorcist", ano: 2017, priceUSD: 120000, summary: "Camaro upgrade com potência absurda.", potencia: "1000 cv", zeroCem: "3.1 s", vmax: "350 km/h", motor: "V8 6.2L supercharged", img: "https://cdn-hednb.nitrocdn.com/yYolPsxkHfeoqRKSyqGQlaFpLZMHhVYI/assets/images/optimized/rev-4192b0d/hpe-photos.s3.us-east-2.amazonaws.com/wp-content/uploads/20220211135505/hennessey-hpe850-camaro-zl1-9-2048x1363.webp" },
  { marca: "Hennessey", model: "Demon 1700", ano: 2022, priceUSD: 200000, summary: "Versão extrema do Challenger Demon com 1700 cv.", potencia: "1700 cv", zeroCem: "1.9 s", vmax: "370 km/h", motor: "V8 6.2L biturbo", img: "https://www.hennesseymedia.com/wp-content/uploads/2023/12/John-Hennessey-Dodge-Challenger-SRT-Demon-170-Print-1.jpg" },
  { marca: "Hennessey", model: "Super Venom", ano: 2021, priceUSD: 2200000, summary: "Protótipo ultra raro para performance máxima.", potencia: "1800 cv", zeroCem: "2.0 s", vmax: "435 km/h", motor: "V8 7.6L biturbo", img: "https://uploads.automaistv.com.br/2025/02/Hennessey-Super-Venom-Mustang-frente-movimento.webp" },
  { marca: "Hennessey", model: "Cadillac Escalade Supercharged", ano: 2020, priceUSD: 110000, summary: "Escalade modificado com potência elevada.", potencia: "1000 cv", zeroCem: "4.8 s", vmax: "280 km/h", motor: "V8 6.2L supercharged", img: "https://cdn.motor1.com/images/mgl/g4Exvw/s3/cadillac-escalade-v-by-hennessey.jpg" },
  { marca: "Hennessey", model: "Mammoth", ano: 2021, priceUSD: 150000, summary: "Ram TRX upgrade com mais de 1000 cv.", potencia: "1012 cv", zeroCem: "4.2 s", vmax: "250 km/h", motor: "V8 6.2L supercharged", img: "http://professionalpickup.com/wp-content/uploads/2022/04/Hennessey-Mammoth-1000-6x6-TRX-2022-Professional-Pickup-05.jpg" },
  { marca: "Hennessey", model: "Hellcat Upgrade", ano: 2020, priceUSD: 120000, summary: "Upgrade para Charger Hellcat com 1000 cv.", potencia: "1000 cv", zeroCem: "3.6 s", vmax: "330 km/h", motor: "V8 6.2L supercharged", img: "https://www.kpmmotorsport.com.au/wp-content/uploads/2023/08/hennessey-hpe1000-charger-redeye-11-2048x1366-1.webp" },
  { marca: "Hennessey", model: "Venom F5-M", ano: 2022, priceUSD: 3000000, summary: "Edição roadster/track do F5 com aerodinâmica atualizada.", potencia: "1817 cv", zeroCem: "2.1 s", vmax: "437 km/h", motor: "V8 6.6L biturbo", img: "https://www.thesupercarblog.com/wp-content/uploads/2024/09/Hennessey-Venom-F5-M-Roadster-01-1000x600.jpg" },
  { marca: "Hennessey", model: "Velociraptor 1000", ano: 2023, priceUSD: 135000, summary: "F-150 upgrade extremo com 1000 cv.", potencia: "1000 cv", zeroCem: "4.8 s", vmax: "200+ km/h", motor: "V6 3.5L biturbo modificado", img: "https://cdn.motor1.com/images/mgl/ZnyOeK/s1/hennessey-velociraptor-1000-super-truck.jpg" },
  /* Pagani */
  { marca: "Pagani", model: "Huayra", ano: 2011, priceUSD: 1400000, summary: "Supercarro artesanal com materiais exóticos.", potencia: "740 cv", zeroCem: "2.8 s", vmax: "370 km/h", motor: "V12 6.0L biturbo", img: "http://cdn.awsli.com.br/2500x2500/2571/2571273/produto/22330071036e427816d.jpg" },
  { marca: "Pagani", model: "Huayra BC", ano: 2016, priceUSD: 2600000, summary: "Versão mais leve e extrema do Huayra.", potencia: "789 cv", zeroCem: "2.7 s", vmax: "380 km/h", motor: "V12 6.0L", img: "https://cdn.awsli.com.br/2571/2571273/produto/210230463/pagani-huayra-bc-118-autoart-azul-a946a756.jpg" },
  { marca: "Pagani", model: "Huayra Roadster", ano: 2017, priceUSD: 2400000, summary: "Conversível extremamente exclusivo.", potencia: "764 cv", zeroCem: "2.8 s", vmax: "370 km/h", motor: "V12 6.0L", img: "https://cdn.rmsothebys.com/8/4/1/c/c/4/841cc49ef4aeb3ca93bcf6f7a0488895c2955b63.webp" },
  { marca: "Pagani", model: "Huayra R", ano: 2021, priceUSD: 3100000, summary: "Modelo de pista com motor aspirado para altas rotações.", potencia: "850 cv", zeroCem: "2.6 s", vmax: "400 km/h", motor: "V12 6.0L aspirado", img: "https://www.tpejapan.com/wp-content/uploads/2020/01/image001.jpg" },
  { marca: "Pagani", model: "Zonda", ano: 1999, priceUSD: 500000, summary: "Ícone que lançou a marca ao mundo automotivo.", potencia: "394 cv", zeroCem: "3.8 s", vmax: "335 km/h", motor: "V12 6.0-7.3L", img: "https://upload.wikimedia.org/wikipedia/commons/2/28/2003_Pagani_Zonda_C12_S_7.3_Front.jpg" },
  { marca: "Pagani", model: "Zonda R", ano: 2009, priceUSD: 1800000, summary: "Versão de pista extremamente leve e potente.", potencia: "750 cv", zeroCem: "2.9 s", vmax: "370 km/h", motor: "V12 6.0L aspirado", img: "https://www.classicdriver.com/cdn-cgi/image/format=auto,fit=scale-down,width=1280/sites/default/files/article_images/c599d63925431c0abed39836c4860d5c.jpg" },
  { marca: "Pagani", model: "Utopia", ano: 2022, priceUSD: 2500000, summary: "Novo supercarro com atenção artesanal aos detalhes.", potencia: "864 cv", zeroCem: "2.6 s", vmax: "350 km/h", motor: "V12 6.0L biturbo", img: "https://www.motortrend.com/files/6765a48236942500084e3888/001-2024-pagani-utopia.jpg?w=768&width=768&q=75&format=webp" },
  { marca: "Pagani", model: "Utopia Roadster", ano: 2024, priceUSD: 2800000, summary: "Versão conversível do Utopia, ainda mais exclusiva.", potencia: "864 cv", zeroCem: "2.6 s", vmax: "350 km/h", motor: "V12 6.0L", img: "https://quatrorodas.abril.com.br/wp-content/uploads/2024/07/Pagani-Utopia-Roadster-010401-Tre-quarti-anteriore-aperta-portiere-chiuse.jpg?quality=70&strip=info&resize=1080,565&crop=1" },
  { marca: "Pagani", model: "Zonda Cinque", ano: 2009, priceUSD: 2000000, summary: "Série limitada com apenas 5 unidades produzidas.", potencia: "678 cv", zeroCem: "3.1 s", vmax: "350 km/h", motor: "V12 7.3L", img: "https://exclusivecarregistry.com/images/cars/preview/thumb_1482.jpg" },
  { marca: "Pagani", model: "Huayra Epitome", ano: 2023, priceUSD: 5400000, summary: "Última obra-prima da Pagani em edição bespoke.", potencia: "864 cv", zeroCem: "2.5 s", vmax: "370 km/h", motor: "V12 6.0L", img: "https://www.topgear.com/sites/default/files/2024/07/Pagani-Huayra-Epitome_2-1-4_Anteriore_Portiera-guidatore-chiusa.jpg" },

{ marca: "Pagani", model: "Zonda C12", ano: 1999, priceUSD: 1000000, summary: "O carro que deu início a tudo. A primeira obra-prima de Horacio Pagani com um motor V12 6.0L da Mercedes-AMG.", potencia: "394 cv", zeroCem: "4.2 s", vmax: "298 km/h", motor: "Mercedes-AMG M120 V12 6.0L", img: "https://cdn.motor1.com/images/mgl/Xgp2l/s1/1999-pagani-zonda-c12.jpg" },
{ marca: "Pagani", model: "Zonda C12 S", ano: 2001, priceUSD: 1200000, summary: "Primeira grande evolução do Zonda, com o motor AMG aumentado para 7.0 litros e mais performance.", potencia: "540 cv", zeroCem: "3.8 s", vmax: "330 km/h", motor: "Mercedes-AMG M120 V12 7.0L", img: "https://cdn.shopcar.com.br/stored/news/1238003279_14132.jpg" },
{ marca: "Pagani", model: "Zonda S 7.3", ano: 2002, priceUSD: 1500000, summary: "A evolução do C12 com o motor V12 aumentado para 7.3 litros, mais potência e aerodinâmica aprimorada.", potencia: "555 cv", zeroCem: "3.7 s", vmax: "335 km/h", motor: "Mercedes-AMG M297 V12 7.3L", img: "https://images.squarespace-cdn.com/content/v1/5caed8960cf57d49530e8c60/fe1a5405-e791-4e74-9852-1271424f768f/art-mg-paganizondac12s73+01.jpg" },
{ marca: "Pagani", model: "Zonda F", ano: 2005, priceUSD: 2500000, summary: "Uma homenagem ao pentacampeão de F1 Juan Manuel Fangio. Mais leve, potente e refinado.", potencia: "602 cv", zeroCem: "3.6 s", vmax: "345 km/h", motor: "Mercedes-AMG M297 V12 7.3L", img: "https://en.wheelz.me/wp-content/uploads/2024/12/2006-Pagani-Zonda-F-Coupe_1301514.webp" },
{ marca: "Pagani", model: "Zonda F Roadster", ano: 2006, priceUSD: 3000000, summary: "A experiência visceral do Zonda F com a emoção de um teto removível, sem comprometer a performance.", potencia: "650 cv", zeroCem: "3.7 s", vmax: "345 km/h", motor: "Mercedes-AMG M297 V12 7.3L", img: "https://i.pinimg.com/736x/c8/ae/25/c8ae25646921c93a45e98f00aeb52590.jpg" },
{ marca: "Pagani", model: "Zonda Tricolore", ano: 2010, priceUSD: 5500000, summary: "Edição especial (3 unidades) em homenagem à 'Frecce Tricolori', a esquadrilha acrobática da Força Aérea Italiana.", potencia: "670 cv", zeroCem: "3.4 s", vmax: "350 km/h", motor: "Mercedes-AMG M297 V12 7.3L", img: "https://images.hypercars.co/hypercars-images/1740773357405.jpg" },
{ marca: "Pagani", model: "Zonda Revolución", ano: 2013, priceUSD: 4500000, summary: "A evolução final do Zonda R. Mais leve, mais potente e com aerodinâmica de F1, incluindo um sistema DRS.", potencia: "800 cv", zeroCem: "2.6 s", vmax: "350+ km/h", motor: "Mercedes-AMG GT 112 V12 6.0L", img: "https://robbreport.com/wp-content/uploads/2021/05/Pagani_Zonda_Revolucion3.jpeg" },
{ marca: "Pagani", model: "Zonda Uno", ano: 2010, priceUSD: 3500000, summary: "Um one-off construído para a família real do Qatar, famoso por sua cor azul-turquesa única.", potencia: "700 cv", zeroCem: "3.3 s", vmax: "350 km/h", motor: "Mercedes-AMG M297 V12 7.3L", img: "https://www.supercars.net/blog/wp-content/uploads/2020/11/a1f916ce4142cc1bed4f2fe1291d14b5.jpeg" },
{ marca: "Pagani", model: "Zonda 760RS", ano: 2012, priceUSD: 6500000, summary: "O primeiro da lendária série 760. Encomendado no Chile, com carroceria de carbono exposto e 760 cv.", potencia: "760 cv", zeroCem: "2.9 s", vmax: "350 km/h", motor: "Mercedes-AMG M297 V12 7.3L", img: "https://www.supercars.net/blog/wp-content/uploads/2020/11/pagani-zonda-760-rs.jpg" },
{ marca: "Pagani", model: "Zonda 760LH", ano: 2014, priceUSD: 10000000, summary: "A famosa versão pessoal de Lewis Hamilton, com pintura roxa e um raro câmbio manual de 6 marchas.", potencia: "760 cv", zeroCem: "2.9 s", vmax: "350 km/h", motor: "Mercedes-AMG M297 V12 7.3L", img: "https://i.ytimg.com/vi/U6RQfp_V4Mo/maxresdefault.jpg" },
{ marca: "Pagani", model: "Zonda Fantasma Evo", ano: 2017, priceUSD: 12000000, summary: "Um one-off que foi reconstruído e evoluído após um acidente, renascendo como 'Fantasma Evo'.", potencia: "760 cv", zeroCem: "2.9 s", vmax: "350 km/h", motor: "Mercedes-AMG M297 V12 7.3L", img: "https://i.pinimg.com/736x/bd/37/7d/bd377d4d5be3b0c76a8f224b3d2b34aa.jpg" },
{ marca: "Pagani", model: "Zonda Riviera", ano: 2017, priceUSD: 5500000, summary: "One-off da série 760, com pintura branca pérola, detalhes em azul e carbono exposto, inspirado na Riviera Francesa.", potencia: "760 cv", zeroCem: "2.9 s", vmax: "350 km/h", motor: "Mercedes-AMG M297 V12 7.3L", img: "https://www.thesupercarblog.com/wp-content/uploads/2017/12/Pagani-Zonda-Riviera-2.jpg" },
{ marca: "Pagani", model: "Zonda HP Barchetta", ano: 2017, priceUSD: 17500000, summary: "O presente de 60 anos de Horacio Pagani para si mesmo. Apenas 3 unidades, com para-brisa cortado e sem teto.", potencia: "800 cv", zeroCem: "3.1 s", vmax: "355 km/h", motor: "Mercedes-AMG M297 V12 7.3L", img: "https://s2-autoesporte.glbimg.com/qGTF8iYBjJiDKzsXTjQrYs0eE6A=/0x89:1200x800/1008x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2018/x/D/nhGJnpRIGkS5WY9HYsqQ/horaciopagani-in-zonda-barchetta.jpg" },
{ marca: "Pagani", model: "Huayra Roadster BC", ano: 2019, priceUSD: 4000000, summary: "A performance extrema do BC com a experiência de um teto aberto. Mais leve que o Roadster normal.", potencia: "802 cv", zeroCem: "2.9 s", vmax: "370 km/h", motor: "Mercedes-AMG V12 6.0L Biturbo", img: "https://cdn.motor1.com/images/mgl/3XMGX/s1/pagani-huayra-roadster-bc.jpg" },
{ marca: "Pagani", model: "Huayra Codalunga", ano: 2022, priceUSD: 7400000, summary: "Versão 'longtail' do Huayra, inspirada nos carros de corrida de Le Mans dos anos 60. Apenas 5 unidades.", potencia: "840 cv", zeroCem: "2.9 s", vmax: "350 km/h", motor: "Mercedes-AMG V12 6.0L Biturbo", img: "https://upload.wikimedia.org/wikipedia/commons/d/d1/2022_Pagani_Huayra_Codalunga.jpg" },
{ marca: "Pagani", model: "Huayra Imola", ano: 2020, priceUSD: 5400000, summary: "Um laboratório sobre rodas. Edição ultralimitada (5 unidades) com tecnologia de pista e performance brutal.", potencia: "827 cv", zeroCem: "2.7 s", vmax: "380 km/h", motor: "Mercedes-AMG V12 6.0L Biturbo", img: "https://static0.hotcarsimages.com/wordpress/wp-content/uploads/2019/09/Imola-via-NM2255-Car-HD-Videos-on-YouTube.jpg" },
{ marca: "Pagani", model: "Huayra Dinastia", ano: 2014, priceUSD: 4000000, summary: "Edição especial (3 unidades) para o mercado chinês, com pinturas inspiradas nos dragões da Cidade Proibida.", potencia: "730 cv", zeroCem: "3.2 s", vmax: "370 km/h", motor: "Mercedes-AMG M158 V12 6.0L Biturbo", img: "https://exclusivecarregistry.com/images/cars/preview/thumb_5817.jpg" },
{ marca: "Pagani", model: "Huayra Pearl", ano: 2016, priceUSD: 5000000, summary: "O primeiro one-off do programa de customização da Pagani, com aerodinâmica única e detalhes exclusivos.", potencia: "730 cv", zeroCem: "3.2 s", vmax: "370 km/h", motor: "Mercedes-AMG M158 V12 6.0L Biturbo", img: "https://www.topgear.com/sites/default/files/news-listicle/image/huayra-pearl-6.jpg" },
{ marca: "Pagani", model: "Huayra L'Ultimo", ano: 2018, priceUSD: 6000000, summary: "O último Huayra coupé produzido, com uma pintura especial inspirada no carro de F1 de Lewis Hamilton.", potencia: "730 cv", zeroCem: "3.2 s", vmax: "370 km/h", motor: "Mercedes-AMG M158 V12 6.0L Biturbo", img: "https://images.hgmsites.net/lrg/pagani-huayra-lultimo--image-via-prestige-imports-miami_100664356_l.jpg" },
{ marca: "Pagani", model: "Huayra Lampo", ano: 2017, priceUSD: 5500000, summary: "One-off encomendado pela Garage Italia, com pintura inspirada no carro-conceito Fiat Turbina de 1954.", potencia: "789 cv", zeroCem: "2.8 s", vmax: "370 km/h", motor: "Mercedes-AMG M158 V12 6.0L Biturbo", img: "https://www.topgear.com/sites/default/files/images/news-article/2017/12/98d0c13621c7b8309bb86f3f1ea5e0a4/dsc_5110.jpg" },
{ marca: "Pagani", model: "Zonda GR", ano: 2003, priceUSD: 1800000, summary: "Versão de corrida baseada no Zonda S, desenvolvida por uma equipe privada para competir em Le Mans e na American Le Mans Series.", potencia: "600 cv", zeroCem: "3.5 s", vmax: "340 km/h", motor: "Mercedes-AMG M297 V12 7.3L", img: "https://gt-place.com/wp-content/uploads/2018/03/1e166__f1712262.jpg" },
{ marca: "Pagani", model: "Zonda Monza", ano: 2004, priceUSD: 2000000, summary: "Um one-off 'track-day' encomendado por um colecionador americano, com inspiração nos carros de endurance.", potencia: "600 cv", zeroCem: "3.5 s", vmax: "340 km/h", motor: "Mercedes-AMG M297 V12 7.3L", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/1/11/Pagani_Zonda_Monza.jpg/2560px-Pagani_Zonda_Monza.jpg" },
  
/* Rolls-Royce */
  { marca: "Rolls-Royce", model: "Droptail 'La Rose Noire'", ano: 2023, priceUSD: 30000000, summary: "Coachbuilt bespoke: luxo extremo e exclusividade.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V12 6.75L approx", img: "https://quatrorodas.abril.com.br/wp-content/uploads/2023/08/rolls-royce_la_rose_noire_droptail_3x2.jpg?crop=1&resize=1212,909" },
  { marca: "Rolls-Royce", model: "Boat Tail", ano: 2021, priceUSD: 28000000, summary: "Coachbuilt: um dos carros mais caros já feitos.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V12 6.75L approx", img: "https://img.odcdn.com.br/wp-content/uploads/2021/06/P90423785_highRes_rolls-royce-boat-tai-1920x1080.jpg" },
  { marca: "Rolls-Royce", model: "Sweptail", ano: 2017, priceUSD: 13000000, summary: "Modelo único sob medida; raridade absoluta.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V12 6.75L approx", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c6/Rolls-Royce_Sweptail_front.jpg/1200px-Rolls-Royce_Sweptail_front.jpg" },
  { marca: "Rolls-Royce", model: "Phantom Series II", ano: 2018, priceUSD: 460000, summary: "Sedã ultra-luxuoso com acabamento bespoke.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V12 6.75L", img: "https://mediapool.bmwgroup.com/cache/P9/202211/P90485602/P90485602-rolls-royce-phantom-series-ii-2635px.jpg" },
  { marca: "Rolls-Royce", model: "Cullinan", ano: 2020, priceUSD: 350000, summary: "SUV de luxo com muita presença e customização.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V12 6.75L", img: "https://www.topgear.com/sites/default/files/cars-car/image/2024/01/1%20Rolls-Royce%20Cullinan%20review.jpg" },
  { marca: "Rolls-Royce", model: "Wraith", ano: 2016, priceUSD: 343350, summary: "Coupé de luxo com presença imponente.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V12", img: "https://quatrorodas.abril.com.br/wp-content/uploads/2023/03/P90498647-lowRes-e1679584397487.jpg?crop=1&resize=1212,909" },
  { marca: "Rolls-Royce", model: "Ghost", ano: 2021, priceUSD: 330000, summary: "Sedã moderno de luxo com tecnologia avançada.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V12", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/2022_Rolls_Royce_Ghost_Black_Badge.jpg/1200px-2022_Rolls_Royce_Ghost_Black_Badge.jpg" },
  { marca: "Rolls-Royce", model: "Dawn", ano: 2019, priceUSD: 345000, summary: "Conversível de luxo para cruising com estilo.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V12", img: "https://s2.glbimg.com/ujAh-EmkFTdKdxjpxIN2zPJGqJM=/smart/e.glbimg.com/og/ed/f/original/2015/09/08/rolls-royce-dawn-lateral.jpg" },
  { marca: "Rolls-Royce", model: "Phantom VIII", ano: 2021, priceUSD: 500000, summary: "Topo de gama em luxo e conforto absoluto.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V12", img: "https://mansoryamerica.com/wp-content/uploads/2019/01/mansory-rolls-royce-phantom-viii-8-white-front-bumper-led-drl-fender-side-skirt-m8-forged-wheel-rim.jpg" },
  { marca: "Rolls-Royce", model: "Boat Tail Bespoke", ano: 2022, priceUSD: 30000000, summary: "Outra run de coachbuilding ultraluxuosa.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V12", img: "https://images.squarespace-cdn.com/content/v1/5e1e8a13e8a3102d5c82d1b1/1652936963097-369JEDT2QEQSVB66ZPX4/Rolls-Royce+Boat+Tail+Main.jpg" },
  /* Audi */
  { marca: "Audi", model: "R8 V10 Performance", ano: 2022, priceUSD: 190000, summary: "Supercarro V10 com dinâmica refinada.", potencia: "620 cv", zeroCem: "3.1 s", vmax: "330 km/h", motor: "V10", img: "https://hips.hearstapps.com/hmg-prod/images/a217488-medium-1633596863.jpg?crop=1xw:0.8890977443609023xh;center,top&resize=1200:*" },
  { marca: "Audi", model: "R8 Decennium", ano: 2021, priceUSD: 260000, summary: "Edição comemorativa do R8, V10 apurado.", potencia: "620 cv", zeroCem: "3.1 s", vmax: "330 km/h", motor: "V10", img: "https://s2-autoesporte.glbimg.com/IRjHz7CRYSusKyfN-rX3JuK-JwY=/0x0:620x413/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2020/K/r/kunMKARZOWDR3dh9UGaQ/2019-03-01-audi-r8-v10-decennium-2019-1600-01.jpg" },
  { marca: "Audi", model: "R8 GT Spyder", ano: 2018, priceUSD: 255000, summary: "Versão raríssima e leve do R8 conversível.", potencia: "620 cv", zeroCem: "3.1 s", vmax: "330 km/h", motor: "V10", img: "https://ogimg.infoglobo.com.br/in/5805872-48b-8a0/FT1086A/01-audi-r8-gt-spyder.jpg" },
  { marca: "Audi", model: "RS Q8", ano: 2022, priceUSD: 136200, summary: "SUV esportivo com performance da Audi Sport.", potencia: "600 cv", zeroCem: "3.8 s", vmax: "305 km/h", motor: "V8", img: "https://www.motornet.com.br/files/uploads/61a300a7-0cd8-415f-bdef-3aa336c143e0.jpg" },
  { marca: "Audi", model: "RS7 Performance", ano: 2021, priceUSD: 128600, summary: "Sedã fastback poderoso e luxuoso.", potencia: "600 cv", zeroCem: "3.6 s", vmax: "305 km/h", motor: "V8", img: "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhCXCI8IbzdJv8EexfCnc3SCvkz4asNSCkNWe30C2EvmxtxpKXKbFNMG348YjO5yAxTt44YZomn_kFrhIwhxp3XgTLvfQfP8DLYVhLW3iHXo-6WUyjAtlD6iQ0d_Z8Xy-RC3Ce-zPJd3F0YOikehRzDFv2PgfhmYR9AvRbcj1n5zog7mi0RbpJU95dpVYY8/s1965/Audi-RS6-Avant-Performance%5D%20%2851%29-001.jpg" },
  { marca: "Audi", model: "RS6 Avant", ano: 2021, priceUSD: 126800, summary: "Wagon de alta performance para uso diário.", potencia: "600 cv", zeroCem: "3.6 s", vmax: "305 km/h", motor: "V8", img: "https://s2-autoesporte.glbimg.com/y8KgwNcGzj1CAqt_bO_jSp4JISM=/0x0:1980x1230/924x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2023/A/9/Dj5A32QNecX95FBZCvJQ/nova-audi-rs6-avant-performance-frente.jpg" },
  { marca: "Audi", model: "S8", ano: 2021, priceUSD: 125300, summary: "Sedã executivo com combinações de luxo e performance.", potencia: "600 cv", zeroCem: "3.6 s", vmax: "305 km/h", motor: "V8/W12 variants", img: "https://hips.hearstapps.com/hmg-prod/images/2022-audi-s8-fd-112-1649645153.jpg?crop=0.744xw:0.558xh;0.120xw,0.353xh&resize=1200:*" },
  { marca: "Audi", model: "A8 L W12", ano: 2019, priceUSD: 150000, summary: "Top de gama A8 com motor W12 e luxo espaçoso.", potencia: "~", zeroCem: "-", vmax: "-", motor: "W12", img: "http://motorshow.com.br/wp-content/uploads/sites/2/2015/08/img-365237-audi-a8-l-w12.jpg" },
  { marca: "Audi", model: "RS e-tron GT", ano: 2025, priceUSD: 167000, summary: "Elétrico de alto desempenho com design marcante.", potencia: "912 cv", zeroCem: "3.1 s", vmax: "250 km/h", motor: "Elétrico", img: "https://revistacarro.com.br/wp-content/uploads/2021/03/audi-rs-e-tron-GT.jpg" },
  { marca: "Audi", model: "Q8 RS", ano: 2023, priceUSD: 140000, summary: "SUV coupé com performance e presença imponente.", potencia: "600 cv", zeroCem: "3.8 s", vmax: "305 km/h", motor: "V8", img: "https://admin.cnnbrasil.com.br/wp-content/uploads/sites/12/2024/06/2025-Audi-RS-Q8-37-e1719436662582.webp?w=1200&h=900&crop=1" },
  /* Mercedes */
  { marca: "Mercedes", model: "300 SLR Uhlenhaut Coupe", ano: 1955, priceUSD: 135000000, summary: "Lenda da história automobilística; recorde em leilão.", potencia: "~", zeroCem: "-", vmax: "-", motor: "I6/V12 historic", img: "https://quatrorodas.abril.com.br/wp-content/uploads/2022/05/museum_virtueller-rundgang_300-SLR-1_2560x1440.jpeg?quality=70&strip=info&w=720&crop=1" },
  { marca: "Mercedes", model: "Maybach Exelero", ano: 2004, priceUSD: 8000000, summary: "One-off conceito de luxo extremo com V12 biturbo.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V12 biturbo", img: "https://www.minutoseguros.com.br/blog/wp-content/uploads/2022/03/mercedes-maybach-exelero.jpg" },
  { marca: "Mercedes", model: "AMG One", ano: 2022, priceUSD: 2700000, summary: "Híbrido com motor derivado de F1; produção limitada.", potencia: "1000 cv", zeroCem: "2.6 s", vmax: "350 km/h", motor: "V6 híbrido F1 tech", img: "https://cdn.motor1.com/images/mgl/P30BKG/s3/mercedes-amg-one-for-sale.jpg" },
  { marca: "Mercedes", model: "CLK GTR Super Sport", ano: 2000, priceUSD: 3300000, summary: "Raro e extremo com pedigree de corrida.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V12", img: "https://cdn.motor1.com/images/mgl/VPnnM/s1/mercedes-clk-gtr-un-esemplare-all-asta-a-pebble-beach.jpg" },
  { marca: "Mercedes", model: "Maybach S680 4MATIC", ano: 2022, priceUSD: 229000, summary: "Sedã ultra-luxuoso com V12 e acabamento sublime.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V12", img: "https://www.topgear.com/sites/default/files/2021/07/1%20BEH_2521.jpg" },
  { marca: "Mercedes", model: "AMG GT 63 SE Performance", ano: 2023, priceUSD: 250000, summary: "Híbrido com alta performance e tecnologia.", potencia: "805 cv", zeroCem: "3.1 s", vmax: "320 km/h", motor: "V8 híbrido", img: "https://uploads.automaistv.com.br/2024/04/mercedes-amg-gt-63-s-e-performance-1.jpg" },
  { marca: "Mercedes", model: "SL63 S", ano: 2021, priceUSD: 200000, summary: "Roadster/cabriolet de luxo com V8 biturbo.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V8", img: "https://img-ik.cars.co.za/news-site-za/images/2025/06/sl63-red-1.jpg?tr=h-347,w-617,q-80" },
  { marca: "Mercedes", model: "G 63 AMG", ano: 2022, priceUSD: 180000, summary: "SUV icônico com performance e acabamento topo.", potencia: "577 cv", zeroCem: "4.5 s", vmax: "240 km/h", motor: "V8 biturbo", img: "https://s2-autoesporte.glbimg.com/oACJJ4qHlemqZPlB2S7kqtvt4b4=/0x0:1920x1280/888x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2025/l/L/A2ucElRTuV0h0u0maBow/mercedes-amg-g-63-frente.jpg" },
  { marca: "Mercedes", model: "300 SL Gullwing", ano: 1954, priceUSD: 1400000, summary: "Clássico histórico com portas asas de gaivota.", potencia: "~", zeroCem: "-", vmax: "-", motor: "I6 classic", img: "https://robbreport.com/wp-content/uploads/2022/02/Alloy_Gullwing5.jpg" },
  { marca: "Mercedes", model: "SLR McLaren", ano: 2004, priceUSD: 450000, summary: "Uma 'Flecha de Prata' moderna. Supercarro GT desenvolvido em parceria com a McLaren, com motor V8 Kompressor.", potencia: "626 cv", zeroCem: "3.8 s", vmax: "334 km/h", motor: "V8 5.4L Supercharged", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8b/Mercedes-Benz_SLR_McLaren_2.jpg/1200px-Mercedes-Benz_SLR_McLaren_2.jpg" },
  { marca: "Mercedes", model: "SLR Stirling Moss", ano: 2009, priceUSD: 2600000, summary: "A despedida do SLR. Uma barchetta radical sem teto ou para-brisa, em homenagem ao lendário piloto.", potencia: "650 cv", zeroCem: "3.5 s", vmax: "350 km/h", motor: "V8 5.4L Supercharged", img: "https://cimg2.ibsrv.net/ibimg/hgm/1920x1080-1/100/873/mercedes-benz-slr-mclaren-stirling-moss--photo-credit-rm-sothebys_100873170.jpg" },
  { marca: "Mercedes", model: "SLS AMG", ano: 2010, priceUSD: 300000, summary: "O sucessor espiritual do 300 SL, com portas 'asa de gaivota' e o poderoso motor V8 6.2 aspirado.", potencia: "571 cv", zeroCem: "3.8 s", vmax: "317 km/h", motor: "V8 6.2L M159 Aspirado", img: "https://s2.glbimg.com/VZyw-zP2tWqSrW8zIuA7U1k_fs37SrIH_m5Fl5QsZNJIoz-HdGixxa_8qOZvMp3w/s.glbimg.com/jo/g1/f/original/2012/11/09/sls1.jpg" },
  { marca: "Mercedes", model: "GT Black Series", ano: 2021, priceUSD: 450000, summary: "A versão mais extrema do AMG GT, com aerodinâmica de carro de corrida e recorde em Nürburgring.", potencia: "730 cv", zeroCem: "3.2 s", vmax: "325 km/h", motor: "V8 4.0L Biturbo", img: "https://revistafullpower.com.br/wp-content/uploads/2021/09/me02.jpg" },
  { marca: "Mercedes", model: "GT R Pro", ano: 2019, priceUSD: 200000, summary: "Edição limitada focada em performance de pista, com suspensão ajustável e mais componentes em carbono.", potencia: "585 cv", zeroCem: "3.6 s", vmax: "318 km/h", motor: "V8 4.0L Biturbo", img: "https://cdn.motor1.com/images/mgl/MlngN/s1/mercedes-amg-gt-r-pro.webp" },
  { marca: "Mercedes", model: "CLK DTM AMG", ano: 2004, priceUSD: 400000, summary: "Um carro de corrida do DTM para as ruas. Extremamente raro, com para-lamas alargados e performance brutal.", potencia: "582 cv", zeroCem: "3.9 s", vmax: "320 km/h", motor: "V8 5.4L Supercharged", img: "https://cdn.shopcar.com.br/stored/news/1208963505_69311.jpg" },
  { marca: "Mercedes", model: "C 63 AMG Black Series", ano: 2012, priceUSD: 150000, summary: "A versão mais selvagem do C 63, com visual inspirado no DTM e o som glorioso do V8 6.2 aspirado.", potencia: "517 cv", zeroCem: "4.2 s", vmax: "300 km/h", motor: "V8 6.2L M156 Aspirado", img: "https://cdn.motor1.com/images/mgl/VEg7z/s1/inden-design-mercedes-c63-amg-black-series-conversion.jpg" },
  { marca: "Mercedes", model: "A 45 S 4MATIC+", ano: 2023, priceUSD: 70000, summary: "O 'hyper hatch' que redefiniu o segmento, com o motor de 4 cilindros mais potente do mundo.", potencia: "421 cv", zeroCem: "3.9 s", vmax: "270 km/h", motor: "I4 2.0L Turbo", img: "https://cdn.motor1.com/images/mgl/ZnGXeK/s1/mercedes-amg-a-45-s-2024-als-sondermodell-limited-edition.jpg" },
  { marca: "Mercedes", model: "CLA 45 S 4MATIC+", ano: 2023, priceUSD: 75000, summary: "A performance insana do A 45 S em uma carroceria de 'cupê de 4 portas' mais elegante e aerodinâmica.", potencia: "421 cv", zeroCem: "4.0 s", vmax: "270 km/h", motor: "I4 2.0L Turbo", img: "https://s2-autoesporte.glbimg.com/sABrK4BhiMNeeui5XqAKSmhQmpE=/1835x1911:6384x4700/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2020/Q/D/3kLWZwS1qvm9lQBsW9qg/mercedes-amg-cla-45-2021-dianteira-estatica.jpeg" },
  { marca: "Mercedes", model: "190E 2.5-16 Evolution II", ano: 1990, priceUSD: 400000, summary: "Ícone do DTM. Um sedã de homologação com aerodinâmica agressiva e um motor Cosworth de alta rotação.", potencia: "235 cv", zeroCem: "7.1 s", vmax: "250 km/h", motor: "I4 2.5L 16v Cosworth", img: "https://motorshow.com.br/wp-content/uploads/sites/2/2022/01/mercedes-benz-190e-25-16-evolution-ii-9.jpg" },
  { marca: "Mercedes", model: "GT3 (corrida)", ano: 2020, priceUSD: 600000, summary: "A arma da Mercedes para corridas de GT. Campeão em Nürburgring, Spa e ao redor do mundo.", potencia: "630 cv", zeroCem: "3.0 s", vmax: "300+ km/h", motor: "V8 6.2L Aspirado", img: "https://i0.statig.com.br/bancodeimagens/1a/if/4k/1aif4kf5jinhlmhu7szk4sref.jpg" },
  { marca: "Mercedes", model: "C 111 (protótipo)", ano: 1970, priceUSD: 15000000, summary: "Laboratório sobre rodas. Um protótipo com motor Wankel, portas 'asa de gaivota' e design futurista.", potencia: "350 cv", zeroCem: "4.8 s", vmax: "300 km/h", motor: "Wankel de 4 rotores", img: "https://auto-drive.pt/wp-content/uploads/2023/06/mercedes-benz-vision-one-eleven-concept-exterior00.jpg" },
  { marca: "Mercedes", model: "540K Streamliner", ano: 1938, priceUSD: 5000000, summary: "Um one-off de pré-guerra com uma carroceria aerodinâmica de alumínio, projetado para alta velocidade.", potencia: "180 cv", zeroCem: "15.0 s", vmax: "185 km/h", motor: "I8 5.4L Supercharged", img: "https://www.ultimatecarpage.com/images/car/5966/Mercedes-Benz-540-K-Streamliner-49475.jpg" },
  { marca: "Mercedes", model: "600 Pullman 'Grosser'", ano: 1964, priceUSD: 1000000, summary: "O carro de chefes de estado e celebridades. Símbolo máximo de luxo, poder e engenharia hidráulica.", potencia: "250 cv", zeroCem: "12.0 s", vmax: "205 km/h", motor: "V8 6.3L M100", img: "https://upload.wikimedia.org/wikipedia/commons/b/be/Mercedes-Benz_600_vl_silver_TCE.jpg" },
  { marca: "Mercedes", model: "S-Class W140", ano: 1992, priceUSD: 40000, summary: "Apelidado de 'O Tanque'. Um marco de engenharia, luxo e robustez que definiu os anos 90.", potencia: "408 cv", zeroCem: "6.3 s", vmax: "250 km/h", motor: "V12 6.0L M120", img: "https://static0.topspeedimages.com/wordpress/wp-content/uploads/2023/08/resize_restomod-mercedes-benz-600-sel-w140-s76r-renntech-26.jpeg" },
  { marca: "Mercedes", model: "S 65 AMG (W221)", ano: 2008, priceUSD: 80000, summary: "O auge do luxo com uma força brutal escondida: um V12 Biturbo com mais de 1000 Nm de torque.", potencia: "612 cv", zeroCem: "4.4 s", vmax: "250 km/h", motor: "V12 6.0L Biturbo", img: "https://arenda-mercedes.kiev.ua/static/previews/1645121616tfkmiCZzo3N.webp" },
  { marca: "Mercedes", model: "GLS 600", ano: 2023, priceUSD: 200000, summary: "O pináculo do luxo em formato SUV, combinando o espaço do GLS com o acabamento requintado da Maybach.", potencia: "558 cv", zeroCem: "4.9 s", vmax: "250 km/h", motor: "V8 4.0L Biturbo", img: "https://cdn.motor1.com/images/mgl/QE2rN/s1/mercedes-maybach-gls-2020.jpg" },
  { marca: "Mercedes", model: "E 63 S 4MATIC+", ano: 2023, priceUSD: 120000, summary: "O 'lobo em pele de cordeiro'. Um sedã executivo de luxo com performance de supercarro e modo 'Drift'.", potencia: "612 cv", zeroCem: "3.4 s", vmax: "300 km/h", motor: "V8 4.0L Biturbo", img: "https://www.comprecar.com.br/storage/news/featured/8_fbR9235_9141H.jpg" },
  /* Corvette */
  { marca: "Corvette", model: "ZR1 (C8)", ano: 2025, priceUSD: 175000, summary: "O Corvette mais potente, V8 biturbo de altas rotações.", potencia: "1064 cv", zeroCem: "2.9 s", vmax: "350 km/h", motor: "V8 5.5L biturbo", img: "https://i.poweredtemplates.com/p/sp/146757/sp_slide_h_1.jpg" },
  { marca: "Corvette", model: "ZR1X", ano: 2026, priceUSD: 220000, summary: "Versão híbrida/altamente limitada do ZR1 com performance extra.", potencia: "1250 cv", zeroCem: "2.5 s", vmax: "360 km/h", motor: "V8+híbrido", img: "https://miamiimports.com.br/wp-content/uploads/2025/06/Corvette-ZR1-X_1.png" },
  { marca: "Corvette", model: "E-Ray", ano: 2023, priceUSD: 108000, summary: "Primeiro Corvette híbrido com tração integral.", potencia: "655 cv", zeroCem: "2.9 s", vmax: "295 km/h", motor: "V8 + motor elétrico", img: "https://images.pistonheads.com/nimg/47748/mceu_57726184811697203735390.jpg" },
  { marca: "Corvette", model: "Z06 (C8)", ano: 2023, priceUSD: 110000, summary: "Versão pista-orientada do Stingray com motor aspirado.", potencia: "670 cv", zeroCem: "3.0 s", vmax: "315 km/h", motor: "V8 5.5L aspirado", img: "https://www.thedrive.com/wp-content/uploads/2022/10/03/corvette-z06-lead-image.png?quality=85" },
  { marca: "Corvette", model: "ZR1 (C7)", ano: 2019, priceUSD: 120000, summary: "Icônico ZR1 da geração anterior com supercharger.", potencia: "755 cv", zeroCem: "3.3 s", vmax: "340 km/h", motor: "V8 6.2L supercharged", img: "https://hips.hearstapps.com/hmg-prod/images/2019-chevrolet-corvette-zr1-201-1527205719.jpg" },
  { marca: "Corvette", model: "Stingray 3LT (C8)", ano: 2021, priceUSD: 100000, summary: "Stingray topo de gama com acabamento luxuoso.", potencia: "495 cv", zeroCem: "3.4 s", vmax: "312 km/h", motor: "V8 6.2L", img: "https://www.autooutlet.cz/wp-content/uploads/2024/11/dsc02640-1298x730.jpg" },
  { marca: "Corvette", model: "Stingray Convertible (C8)", ano: 2022, priceUSD: 105000, summary: "Conversível com desempenho e estilo.", potencia: "495 cv", zeroCem: "3.6 s", vmax: "310 km/h", motor: "V8 6.2L", img: "https://media.carsandbids.com/cdn-cgi/image/width=2080,quality=70/d32c8dde23a1411d0ef2e05bea168897e96c369b/photos/r4Z2oEOP-Nq8MAGDNrb-(edit).jpg?t=172185826399" },
  { marca: "Corvette", model: "C2 L88", ano: 1967, priceUSD: 3400000, summary: "Clássico raro e de colecionador, valorizado em leilões.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V8 big block", img: "https://www.corvetteblogger.com/images/content/uploads/2021/01/011621_2.jpg" },
  { marca: "Corvette", model: "C3 L88", ano: 1969, priceUSD: 2800000, summary: "Clássico antigo com história em corridas e leilões.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V8 big block", img: "https://www.pcarmarket.com/static/media/uploads/galleries/photos/uploads/galleries/20851-pa-ed-kavetski-county-corvette-610-721-3986-1969-corvette-l88-coupe-final/.thumbnails/A-004.webp/A-004-1200x0.webp" },
  { marca: "Corvette", model: "C1 1953", ano: 1953, priceUSD: 1000000, summary: "Primeira geração, raridade histórica.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V6 Blue Flame", img: "https://www.secret-classics.com/wp-content/uploads/2021/12/ChevroletCorvetteC1_03.jpg" },
  /* Lexus */
  { marca: "Lexus", model: "LFA", ano: 2011, priceUSD: 480000, summary: "Supercarro V10 produzido em série limitada.", potencia: "560 cv", zeroCem: "3.7 s", vmax: "325 km/h", motor: "V10 4.8L", img: "https://images.squarespace-cdn.com/content/v1/5caed8960cf57d49530e8c60/e96d71ef-2165-4009-b667-2d9fafe45fc7/art-mg-lexuslfa05.jpg" },
  { marca: "Lexus", model: "LX 700h Ultra Luxury", ano: 2024, priceUSD: 140000, summary: "SUV híbrido ultra-luxuoso de grande porte.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V6 híbrido", img: "https://hips.hearstapps.com/hmg-prod/images/2025-lexus-lx2-6707f22f102f5.jpg?crop=0.774xw:1.00xh;0.100xw,0&resize=980:*" },
  { marca: "Lexus", model: "LC 500 Inspiration Series", ano: 2022, priceUSD: 120000, summary: "Edição especial do cupê conversível com acabamento único.", potencia: "471 cv", zeroCem: "4.4 s", vmax: "270 km/h", motor: "V8 5.0L", img: "https://media.lexus.ca/en/releases/2023/2024-lexus-lc-500-inspiration-series/_jcr_content/root/container/lexusmediacontainer/leftContainer/image.coreimg.jpeg/1692098782547/2024-lexus-lc-inspiration-001.jpeg" },
  { marca: "Lexus", model: "LX 600 Ultra Luxury", ano: 2023, priceUSD: 134000, summary: "SUV premium de luxo com interior bespoke.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V6 biturbo", img: "https://static.wixstatic.com/media/1377dc_c0c1eef7dcbc4f0b82286a8dec92d94a~mv2.jpg/v1/fill/w_1000,h_563,al_c,q_85,usm_0.66_1.00_0.01/1377dc_c0c1eef7dcbc4f0b82286a8dec92d94a~mv2.jpg" },
  { marca: "Lexus", model: "RC F Track Edition", ano: 2020, priceUSD: 100000, summary: "Versão de pista do RC F com redução de peso.", potencia: "472 cv", zeroCem: "4.6 s", vmax: "270 km/h", motor: "V8 5.0L", img: "https://cdn.motor1.com/images/mgl/0lBP3/s1/2020-lexus-rc-f-track-edition-review.jpg" },
  { marca: "Lexus", model: "LS 500 Executive", ano: 2021, priceUSD: 110000, summary: "Sedã executivo de luxo com acabamentos refinados.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V6 3.5L biturbo", img: "https://tmna.aemassets.toyota.com/is/image/toyota/lexus/images/models/ls/2025/hero/Lexus-LS-hero-modelpage-mobile-960x1109-LEX-LSG-MY24-0050-02.jpg?wid=960&hei=1109" },
  { marca: "Lexus", model: "IS 500 F Sport", ano: 2022, priceUSD: 70000, summary: "Edição especial com motor aspirado potente.", potencia: "472 cv", zeroCem: "4.4 s", vmax: "250 km/h", motor: "V8 5.0L", img: "https://cdn.motor1.com/images/mgl/Wmqv1/s1/lexus-is-500-f-sport-performance-launch-edition-cornering-detail.jpg" },
  { marca: "Lexus", model: "GX 550 Overtrail+", ano: 2024, priceUSD: 80000, summary: "SUV off-road premium com luxo e capacidade.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V6 3.4L biturbo", img: "https://global.toyota/pages/news/images/2024/01/12/1000_JAOS/001.jpg" },
  { marca: "Lexus", model: "SC 430", ano: 2007, priceUSD: 100000, summary: "Conversível de luxo, valorizado por colecionadores.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V8 4.3L", img: "https://media.carsandbids.com/cdn-cgi/image/width=2080,quality=70/39ba75f9b610a05237adc3ca976891cd48f5832c/photos/Kdl7z4J5-lt0V2zfIym-(edit).jpg?t=169564373727" },
  { marca: "Lexus", model: "LX 570 Super Sport", ano: 2019, priceUSD: 120000, summary: "Versão topo de gama com muitos pacotes de luxo.", potencia: "~", zeroCem: "-", vmax: "-", motor: "V8 5.7L", img: "https://www.lexus.com.vn/content/dam/lexus-v3-vietnam/news-and-events/2024/lexus-570-super-sport/lexus-570-super-sport-2.jpeg" },
  /* === COLEÇÃO MASERATI: LENDAS E MODERNOS === */
{  marca: "Maserati",   model: "MC20",   ano: 2022,   priceUSD: 212000, summary: "O retorno da Maserati aos supercarros de motor central, com o inovador motor V6 'Nettuno'.",   potencia: "630 cv",   zeroCem: "2.9 s",   vmax: "325 km/h",   motor: "V6 3.0L Biturbo 'Nettuno'",   img: "https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/Maserati_MC20_IAA_2021_1X7A0087.jpg/1200px-Maserati_MC20_IAA_2021_1X7A0087.jpg" },
{   marca: "Maserati",   model: "Quattroporte Trofeo",   ano: 2023, priceUSD: 155000,   summary: "O sedã de luxo com alma de supercarro, equipado com um poderoso motor V8 de origem Ferrari.",   potencia: "580 cv",   zeroCem: "4.5 s",   vmax: "326 km/h",   motor: "V8 3.8L Biturbo",   img: "https://news.dupontregistry.com/wp-content/uploads/2023/01/2022_quattroporte-1.jpg"  },
{   marca: "Maserati",   model: "Ghibli SS (1967)",   ano: 1967,   priceUSD: 300000,   summary: "Um dos mais belos Gran Turismos dos anos 60, com design de Giorgetto Giugiaro e um potente motor V8.", potencia: "335 cv",   zeroCem: "6.8 s",   vmax: "280 km/h",   motor: "V8 4.9L",   img: "https://sportscardigest.com/wp-content/uploads/2023/12/1967-Maserati-Ghibli-4-7-Coupe-by-Ghia1089927_-scaled.jpg" },
{  marca: "Maserati",  model: "Bora",  ano: 1971,  priceUSD: 200000,  summary: "O primeiro supercarro de motor central da Maserati, combinando performance V8 com luxo e conforto.",  potencia: "310 cv",  zeroCem: "6.5 s",  vmax: "280 km/h",  motor: "V8 4.7L",  img: "https://images.squarespace-cdn.com/content/v1/5e7918a4b1051f6e49dcfdb1/1700255339084-SHRHBBSHWLAHPUCK03Z6/DS102048FF.jpg" },
{   marca: "Maserati",   model: "Merak SS",   ano: 1976,   priceUSD: 90000, summary: "O 'irmão menor' do Bora. Um esportivo 2+2 de motor central com um ágil motor V6.",   potencia: "220 cv",   zeroCem: "7.5 s",   vmax: "240 km/h",   motor: "V6 3.0L",   img: "https://www.beverlyhillscarclub.com/galleria_images/14766/14766_p48_l.jpg" },
{   marca: "Maserati",   model: "GranTurismo Trofeo",   ano: 2024,   priceUSD: 190000,   summary: "A nova geração do icônico GT da Maserati, agora com o motor V6 Nettuno e design estonteante.",   potencia: "550 cv",   zeroCem: "3.5 s",   vmax: "320 km/h",   motor: "V6 3.0L Biturbo 'Nettuno'",   img: "https://www.topgear.com/sites/default/files/2023/02/Maserati%20GranTurismo%20Trofeo%20Rosso%20GranTurismo%20%2812%29.jpg" },
{  marca: "Maserati",   model: "Khamsin",   ano: 1974,   priceUSD: 160000, summary: "Um GT V8 com design futurista de Marcello Gandini, famoso por sua traseira de vidro e faróis escamoteáveis.",   potencia: "320 cv",   zeroCem: "6.6 s",   vmax: "270 km/h",   motor: "V8 4.9L",   img: "https://upload.wikimedia.org/wikipedia/commons/e/ea/Maserati_Khamsin_%28Kirchzarten%29_jm20688.jpg" },
{   marca: "Maserati",   model: "3500 GT",   ano: 1957,   priceUSD: 250000, summary: "O carro que salvou a Maserati. Um Gran Turismo elegante e de sucesso, com carroceria da Touring.",   potencia: "220 cv",   zeroCem: "8.5 s",   vmax: "230 km/h",   motor: "I6 3.5L",   img: "https://upload.wikimedia.org/wikipedia/commons/1/13/Maserati_3500_GT_front.jpg" },
{   marca: "Maserati",   model: "Tipo 61 'Birdcage'",   ano: 1959,   priceUSD: 4000000,   summary: "Lenda das corridas, famoso por seu chassi tubular complexo que parecia uma 'gaiola de pássaros'.",   potencia: "250 cv",   zeroCem: "5.0 s",   vmax: "285 km/h",   motor: "I4 2.9L",   img: "https://media.goodingco.com/image/upload/c_fill,g_auto,q_88,w_1800/v1/Prod/PB24_Pebble%20Beach%20Auctions%202024/774_1959%20Maserati%20Tipo%2061%20Birdcage/1959_Maserati_Tipo_61_Birdcage_28_ltz8wz" },
{   marca: "Maserati",   model: "Levante Trofeo",   ano: 2023,   priceUSD: 165000,   summary: "O SUV da Maserati em sua forma mais extrema, com um motor V8 Ferrari que entrega performance e som inigualáveis.",   potencia: "580 cv",   zeroCem: "4.1 s",   vmax: "302 km/h",   motor: "V8 3.8L Biturbo",   img: "https://s2-autoesporte.glbimg.com/TwpiNhswLoGGOInH9IK98efT89c=/0x0:620x413/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2020/S/u/491C1EQ4AhkgDAvO5Z0Q/2018-08-27-maserati-levante-trofeo-2019-1024-01.jpg" },
  /* === COLEÇÃO SHELBY: LENDAS AMERICANAS === */
{ marca: "Shelby", model: "Cobra 289", ano: 1962, priceUSD: 1100000, summary: "O Cobra original. Leve, ágil e com um V8 'small block', o início de uma lenda.", potencia: "271 cv", zeroCem: "5.8 s", vmax: "240 km/h", motor: "Ford V8 4.7L (289ci)", img: "https://www.sportscarmarket.com/wp-content/uploads/2021/05/1963-shelby-cobra-289-front.jpg" },
{ marca: "Shelby", model: "Cobra 427 S/C", ano: 1965, priceUSD: 2100000, summary: "A versão mais brutal do Cobra, com um motor 'big block' 427. 'S/C' significa Semi-Competition.", potencia: "485 cv", zeroCem: "4.2 s", vmax: "265 km/h", motor: "Ford V8 7.0L (427ci)", img: "https://classic-recreations.com/wp-content/uploads/2021/04/CR_11172020_DallasShoot_0147.jpg" },
{ marca: "Shelby", model: "GT350 (1965)", ano: 1965, priceUSD: 450000, summary: "O primeiro Mustang a receber o tratamento Shelby. Um carro de corrida para as ruas.", potencia: "306 cv", zeroCem: "6.6 s", vmax: "220 km/h", motor: "Ford V8 4.7L (289ci)", img: "https://hips.hearstapps.com/hmg-prod/amv-prod-cad-assets/images/11q2/407261/1965-ford-mustang-shelby-gt350-photo-409758-s-986x603.jpg?crop=0.838xw:0.768xh;0.0862xw,0.232xh&resize=640:*" },
{ marca: "Shelby", model: "GT350R", ano: 1965, priceUSD: 1500000, summary: "A versão de competição pura do GT350. Apenas 34 foram construídos para dominar as pistas.", potencia: "350 cv", zeroCem: "5.5 s", vmax: "240 km/h", motor: "Ford V8 4.7L (289ci)", img: "https://www.estadao.com.br/resizer/v2/KLUDHSEJ7NO2DBUJ6SJD2Q7YVU.png?quality=80&auth=62121ab96eef86a0779c93434d7a66d1a7649e584028b840f23ff0dac17dd845&width=1262&height=710&smart=true" },
{ marca: "Shelby", model: "GT500 (1967)", ano: 1967, priceUSD: 250000, summary: "O icônico 'Eleanor'. O primeiro Mustang GT500, combinando estilo e a força de um motor 'big block'.", potencia: "355 cv", zeroCem: "6.2 s", vmax: "225 km/h", motor: "Ford V8 7.0L (428ci)", img: "https://robbreport.com/wp-content/uploads/2024/02/2-w-A-FrontSide.jpg" },
{ marca: "Shelby", model: "GT500KR (1968)", ano: 1968, priceUSD: 300000, summary: "'King of the Road'. Equipado com o motor 428 Cobra Jet, era o auge da performance Shelby na época.", potencia: "335 cv (subestimado)", zeroCem: "5.4 s", vmax: "225 km/h", motor: "V8 7.0L (428 Cobra Jet)", img: "https://bringatrailer.com/wp-content/uploads/2021/08/1968_shelby_mustang_gt500kr_16294021058a42a7ce40890.jpg" },
{ marca: "Shelby", model: "Daytona Coupe", ano: 1964, priceUSD: 25000000, summary: "Criado para vencer a Ferrari em Le Mans. Apenas 6 foram feitos, um tesouro da história do automobilismo.", potencia: "390 cv", zeroCem: "4.4 s", vmax: "305 km/h", motor: "Ford V8 4.7L (289ci)", img: "https://upload.wikimedia.org/wikipedia/commons/5/59/Shelby_Daytona%2C_1964.JPG" },
{ marca: "Shelby", model: "Series 1", ano: 1999, priceUSD: 180000, summary: "O único carro projetado do zero por Carroll Shelby. Um roadster moderno com chassi de alumínio.", potencia: "320 cv", zeroCem: "4.4 s", vmax: "270 km/h", motor: "Oldsmobile L47 V8 4.0L", img: "https://static0.carbuzzimages.com/wordpress/wp-content/uploads/gallery-images/original/921000/500/921523.jpg" },
{ marca: "Shelby", model: "GT500 Super Snake (atual)", ano: 2024, priceUSD: 350000, summary: "A versão mais extrema do GT500 moderno, com potência que ultrapassa os 800 cavalos.", potencia: "825 cv", zeroCem: "3.4 s", vmax: "300+ km/h", motor: "V8 5.2L Supercharged", img: "https://cdn.motor1.com/images/mgl/mM24KP/s1/2024-ford-mustang-shelby-super-snake---8.webp" },
{ marca: "Shelby", model: "GT500 (2020)", ano: 2020, priceUSD: 100000, summary: "O Mustang de produção mais potente já feito pela Ford, com performance para rivalizar com supercarros europeus.", potencia: "760 cv", zeroCem: "3.5 s", vmax: "290 km/h", motor: "V8 5.2L Supercharged 'Predator'", img: "https://s2-autoesporte.glbimg.com/2WiuTpp4fPWcRQFz1HkGpW-Y6Gg=/0x0:620x413/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2020/S/K/fnrtkXRtGatSrknYLpqQ/2019-08-16-ford-mustang-shelby-gt500-venom.jpg" },
  /* === COLEÇÃO JAGUAR: ELEGÂNCIA E FÚRIA BRITÂNICA === */
{ marca: "Jaguar", model: "F-Type SVR", ano: 2017, priceUSD: 125000, summary: "A versão mais selvagem do F-Type, com tração integral e o som ensurdecedor do V8 Supercharged.", potencia: "575 cv", zeroCem: "3.7 s", vmax: "322 km/h", motor: "V8 5.0L Supercharged", img: "https://blog.usadosbr.com/wp-content/uploads/2016/09/jaguar-f-Type-SVR.jpg" },
{ marca: "Jaguar", model: "XJR-15", ano: 1990, priceUSD: 1900000, summary: "O primeiro carro de rua feito inteiramente de fibra de carbono, baseado no campeão de Le Mans.", potencia: "450 cv", zeroCem: "3.9 s", vmax: "307 km/h", motor: "V12 6.0L", img: "https://www.topgear.com/sites/default/files/2022/01/1991-Jaguar-XJR-15-_0.jpg" },
{ marca: "Jaguar", model: "XJR-9 (corrida)", ano: 1988, priceUSD: 21000000, summary: "O lendário carro de corrida 'Silk Cut' que deu à Jaguar a vitória nas 24 Horas de Le Mans de 1988.", potencia: "750 cv", zeroCem: "3.0 s", vmax: "394 km/h", motor: "V12 7.0L", img: "https://upload.wikimedia.org/wikipedia/commons/8/80/Jaguar_XJR9.jpg" },
{ marca: "Jaguar", model: "XK120", ano: 1948, priceUSD: 150000, summary: "Um dos carros mais belos do pós-guerra e o carro de produção mais rápido do mundo em sua época.", potencia: "160 cv", zeroCem: "10.0 s", vmax: "200 km/h", motor: "I6 3.4L", img: "https://cdn.dealeraccelerate.com/bagauction/9/1494/62866/1920x1440/1950-jaguar-xk120-alloy-roadster.webp" },
{ marca: "Jaguar", model: "D-Type", ano: 1954, priceUSD: 22000000, summary: "Lenda de Le Mans, venceu a corrida três vezes. Famoso por sua barbatana aerodinâmica e tecnologia inovadora.", potencia: "250 cv", zeroCem: "6.0 s", vmax: "278 km/h", motor: "I6 3.4L", img: "https://www.fiskens.com/blobs/images/stock/f6405f32-c8db-4521-9d35-d87fec493034.jpg?width=2000&height=1333&mode=crop" },
{ marca: "Jaguar", model: "C-Type", ano: 1951, priceUSD: 14000000, summary: "O 'Competition-Type' que venceu Le Mans em sua estreia e foi pioneiro no uso de freios a disco.", potencia: "200 cv", zeroCem: "8.0 s", vmax: "232 km/h", motor: "I6 3.4L", img: "https://lartbr.com.br/wp-content/uploads/2024/02/IMG_3963.jpeg" },
{ marca: "Jaguar", model: "XFR-S", ano: 2014, priceUSD: 70000, summary: "Um 'super sedã' britânico, combinando o luxo do XF com a força bruta do motor V8 Supercharged.", potencia: "550 cv", zeroCem: "4.6 s", vmax: "300 km/h", motor: "V8 5.0L Supercharged", img: "https://s2.glbimg.com/jMuyZKOA9w-G5005ZqRVBueW9SbJcU0fmMB2O6KHhJ5Ioz-HdGixxa_8qOZvMp3w/s.glbimg.com/jo/g1/f/original/2012/11/28/jaguar.jpg" },
{ marca: "Jaguar", model: "XKR-S GT", ano: 2013, priceUSD: 200000, summary: "Versão de pista do XKR-S, com aerodinâmica agressiva, freios de carbono-cerâmica e produção limitadíssima.", potencia: "550 cv", zeroCem: "3.9 s", vmax: "300 km/h", motor: "V8 5.0L Supercharged", img: "https://eliteautomotive.pt/images/upload/41a3e8fb4cd14968b824535b0abffe1e.jpg" },
{ marca: "Jaguar", model: "I-Pace", ano: 2024, priceUSD: 72000, summary: "O primeiro SUV totalmente elétrico da Jaguar, aclamado por seu design arrojado e dinâmica de condução.", potencia: "400 cv", zeroCem: "4.8 s", vmax: "200 km/h", motor: "Dois Motores Elétricos", img: "https://cdn.motor1.com/images/mgl/3o0Xx/s3/2021-jaguar-i-pace.jpg" },
{ marca: "Jaguar", model: "XJ (X351)", ano: 2018, priceUSD: 85000, summary: "A última geração do sedã de luxo XJ, com um design radical e um interior suntuoso. A versão V8 é um 'sleeper'.", potencia: "470 cv", zeroCem: "5.1 s", vmax: "250 km/h", motor: "V8 5.0L Supercharged", img: "https://images.pistonheads.com/nimg/43655/JaguarXJLWBSupersportMY2014024.jpg" },
/* === COLEÇÃO LOTUS: A FILOSOFIA DA LEVEZA === */
{ marca: "Lotus", model: "Seven", ano: 1957, priceUSD: 60000, summary: "O esportivo minimalista que virou ícone; ainda vive como Caterham Seven. A mais pura conexão homem-máquina.", potencia: "40 cv", zeroCem: "15.0 s", vmax: "130 km/h", motor: "Ford Sidevalve I4 1.2L", img: "https://doubleredcars.eu/wp-content/uploads/2022/06/thumb-1920-1084237.jpg" },
{ marca: "Lotus", model: "Elan", ano: 1962, priceUSD: 75000, summary: "Compacto, leve e ágil; considerado um dos carros com a melhor dirigibilidade já feitos, inspirou o Mazda MX-5.", potencia: "105 cv", zeroCem: "8.5 s", vmax: "185 km/h", motor: "Lotus Twin-Cam I4 1.6L", img: "https://images.pistonheads.com/nimg/47140/blobid0.jpg" },
{ marca: "Lotus", model: "Esprit V8", ano: 1996, priceUSD: 100000, summary: "Supercarro com design futurista de Giugiaro, famoso em filmes de James Bond. A versão V8 Biturbo é a mais potente.", potencia: "350 cv", zeroCem: "4.4 s", vmax: "282 km/h", motor: "V8 3.5L Twin-Turbo", img: "https://hips.hearstapps.com/hmg-prod/images/1997-lotus-esprit-v-8-104-64ac4e40945af.jpg" },
{ marca: "Lotus", model: "49 (F1)", ano: 1967, priceUSD: 9000000, summary: "Revolucionário carro de F1, o primeiro a usar o motor Ford-Cosworth DFV como parte estrutural do chassi.", potencia: "410 cv", zeroCem: "2.5 s", vmax: "320 km/h", motor: "Ford-Cosworth DFV V8 3.0L", img: "https://p2.trrsf.com/image/fget/cf/1200/630/middle/images.terra.com/2022/08/30/lotus-49-clarck---legendary-f1-qxqjtjbbgleu.jpg" },
{ marca: "Lotus", model: "79 (F1)", ano: 1978, priceUSD: 8000000, summary: "Apelidado de 'Black Beauty', dominou a F1 com o efeito solo ('wing car'), mudando a engenharia da categoria.", potencia: "480 cv", zeroCem: "2.8 s", vmax: "310 km/h", motor: "Ford-Cosworth DFV V8 3.0L", img: "http://snaplap.net/wp-content/uploads/2017/07/lotus-79-peterson.jpg" },
{ marca: "Lotus", model: "Elise S3", ano: 2011, priceUSD: 65000, summary: "Pequeno roadster, ultra leve graças ao seu chassi de alumínio colado, famoso pela dirigibilidade pura e direta.", potencia: "217 cv", zeroCem: "4.6 s", vmax: "233 km/h", motor: "I4 1.8L Supercharged", img: "https://upload.wikimedia.org/wikipedia/commons/9/90/2014_Lotus_Elise_S_Club_Racer_1.8_Front.jpg" },
{ marca: "Lotus", model: "Exige V6 Cup 430", ano: 2017, priceUSD: 130000, summary: "A versão mais radical do Elise, com foco em pista, mais potência e aerodinâmica agressiva.", potencia: "430 cv", zeroCem: "3.3 s", vmax: "280 km/h", motor: "V6 3.5L Supercharged", img: "https://f7432d8eadcf865aa9d9-9c672a3a4ecaaacdf2fee3b3e6fd2716.ssl.cf3.rackcdn.com/C3439/U81/IMG_2299-large.jpg" },
{ marca: "Lotus", model: "Evora GT", ano: 2020, priceUSD: 97000, summary: "Mais confortável e refinado para o dia a dia, mas ainda fiel ao DNA de leveza e performance da Lotus.", potencia: "416 cv", zeroCem: "3.8 s", vmax: "303 km/h", motor: "V6 3.5L Supercharged", img: "https://www.cnet.com/a/img/resize/8a5badb4d7bc02025b31d0fdb494d7b37f535bdc/hub/2019/07/31/3429b8ac-fd83-4e30-b729-b46a384175d4/ogi1-2020-lotus-evora-gt-009.jpg?auto=webp&fit=crop&height=900&width=1200" },
{ marca: "Lotus", model: "Emira", ano: 2023, priceUSD: 96000, summary: "O último Lotus a combustão, mistura design de supercarro com a opção de motor V6 Supercharged ou AMG turbo.", potencia: "400 cv", zeroCem: "4.2 s", vmax: "290 km/h", motor: "V6 3.5L Supercharged", img: "https://live.staticflickr.com/65535/52259136910_2479148b85_c.jpg" },
{ marca: "Lotus", model: "Evija", ano: 2023, priceUSD: 2300000, summary: "O primeiro hipercarro elétrico da marca. Com quase 2000 cv, é um dos carros mais potentes do mundo.", potencia: "2011 cv", zeroCem: "2.8 s", vmax: "350 km/h", motor: "Quatro Motores Elétricos", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e3/2020_Lotus_Evija.jpg/1200px-2020_Lotus_Evija.jpg" },
/* === COLEÇÃO GORDON MURRAY AUTOMOTIVE: A PURA ENGENHARIA === */
{ marca: "GMA", model: "T.50", ano: 2023, priceUSD: 3000000, summary: "O sucessor espiritual do McLaren F1. Um hypercar analógico com posição de dirigir central e uma ventoinha para downforce.", potencia: "663 cv", zeroCem: "2.8 s", vmax: "350 km/h", motor: "Cosworth GMA V12 3.9L", img: "https://www.topgear.com/sites/default/files/2023/11/20%20Gordon%20Murray%20Automotive%20T.50.jpg" },
{ marca: "GMA", model: "T.50s Niki Lauda", ano: 2024, priceUSD: 4300000, summary: "A versão de pista do T.50. Mais leve, mais potente e com aerodinâmica extrema para a experiência de pilotagem definitiva.", potencia: "735 cv", zeroCem: "2.5 s", vmax: "338 km/h", motor: "Cosworth GMA V12 3.9L", img: "https://cimg3.ibsrv.net/ibimg/hgm/1920x1080-1/100/925/gma-t-50s-niki-lauda-prototype_100925919.jpg" },
{ marca: "GMA", model: "T.33", ano: 2024, priceUSD: 1850000, summary: "Um supercarro GT mais 'convencional', com dois lugares e a mesma atenção obsessiva aos detalhes e ao baixo peso.", potencia: "615 cv", zeroCem: "2.9 s", vmax: "335 km/h", motor: "Cosworth GMA.2 V12 3.9L", img: "https://www.rccdbcars.com/images/blog/102_-_gordon_murray/t33-view-quarter.webp" },
{ marca: "GMA", model: "T.33 Spider", ano: 2025, priceUSD: 2350000, summary: "A versão conversível do T.33, projetada para oferecer a experiência do V12 aspirado ao ar livre sem comprometer a rigidez.", potencia: "615 cv", zeroCem: "3.0 s", vmax: "330 km/h", motor: "Cosworth GMA.2 V12 3.9L", img: "https://supercarblondie.com/wp-content/uploads/gordon-murray-automotive-t-33-spider-unveiled-2.png" },
/* === COLEÇÃO SSC NORTH AMERICA: A BUSCA PELA VELOCIDADE MÁXIMA === */
{ marca: "SSC", model: "Tuatara", ano: 2020, priceUSD: 2000000, summary: "Um hypercar americano projetado com um único objetivo: ser o carro de produção mais rápido do mundo, com foco em aerodinâmica e potência.", potencia: "1750 cv (E85)", zeroCem: "2.5 s", vmax: "475 km/h (verificado)", motor: "V8 5.9L Twin-Turbo Flat-Plane", img: "https://cdn.motor1.com/images/mgl/KbY1vl/s1/ssc-tuatara-striker-first-drive-review.jpg" },
{ marca: "SSC", model: "Tuatara Aggressor", ano: 2021, priceUSD: 2500000, summary: "A versão 'track-only' e sem limites do Tuatara, com ainda mais potência e opções de personalização para uso exclusivo em pista.", potencia: "2200 cv", zeroCem: "2.3 s", vmax: "474,8", motor: "V8 5.9L Twin-Turbo Flat-Plane", img: "https://quatrorodas.abril.com.br/wp-content/uploads/2021/05/SSC-TUATARA.jpg?quality=70&strip=info&resize=1080,565&crop=1" },
{ marca: "SSC", model: "Ultimate Aero TT", ano: 2007, priceUSD: 740000, summary: "O carro que colocou a SSC no mapa ao quebrar o recorde mundial de velocidade do Bugatti Veyron em 2007. Um hypercar analógico e brutal.", potencia: "1287 cv", zeroCem: "2.8 s", vmax: "412 km/h (recorde)", motor: "V8 6.3L Twin-Turbo", img: "https://upload.wikimedia.org/wikipedia/commons/8/80/SSC_Ultimate_Aero_TT_-_1.jpg" },
/* === COLEÇÃO DE LENDAS DE LEILÃO E RARIDADES HISTÓRICAS === */
{ marca: "Mercedes", model: "W196 R 'Stromlinienwagen'", ano: 1954, priceUSD: 53000000, summary: "O carro de Fórmula 1 pilotado por Juan Manuel Fangio, com uma carroceria aerodinâmica. Um dos carros mais caros já leiloados.", potencia: "290 cv", zeroCem: "8.0 s", vmax: "300 km/h", motor: "8-cil em linha 2.5L", img: "https://i.guim.co.uk/img/media/b57227ab2395c26a65309e18744540025d805f75/134_663_3615_2168/master/3615.jpg?width=465&dpr=1&s=none&crop=none" },
{ marca: "Rolls-Royce", model: "10 hp Two-Seater", ano: 1904, priceUSD: 11001000, summary: "Um dos primeiros carros já produzidos pela Rolls-Royce e o mais antigo a sobreviver. Uma peça fundamental da história automotiva.", potencia: "10 cv", zeroCem: "N/A", vmax: "63 km/h", motor: "2-cilindros 1.8L", img: "https://coimages.sciencemuseumgroup.org.uk/279/368/medium_1935_0070_0001__0001_.jpg" },
/* === COLEÇÃO DE TOMASO: EDIÇÃO CURADA === */
{ marca: "De Tomaso", model: "P72", ano: 2023, priceUSD: 1000000, summary: "A ressurreição da marca. Uma homenagem aos carros de corrida dos anos 60 com design atemporal e mecânica moderna.", potencia: "700 cv", zeroCem: "3.0 s", vmax: "350 km/h", motor: "Ford Coyote V8 5.0L Supercharged", img: "https://framerusercontent.com/images/BHkTGppqpfsKaioQslzMyem3jo.jpg" },
{ marca: "De Tomaso", model: "P900", ano: 2024, priceUSD: 3000000, summary: "Um hypercar exclusivo para as pistas (track-only) com um motor V12 de altíssima rotação e aerodinâmica de F1.", potencia: "900 cv", zeroCem: "2.2 s", vmax: "340 km/h", motor: "V12 6.2L Aspirado", img: "https://www.webmotors.com.br/wp-content/uploads/2022/12/05115750/De-Tomaso-P900-1-1-F5.jpg" },
{ marca: "De Tomaso", model: "Guarà", ano: 1994, priceUSD: 120000, summary: "O último carro desenvolvido sob a liderança de Alejandro de Tomaso, com base em um protótipo de corrida da Maserati.", potencia: "283 cv", zeroCem: "5.0 s", vmax: "270 km/h", motor: "BMW M60 V8 4.0L", img: "https://upload.wikimedia.org/wikipedia/commons/8/82/Guara_2.jpg" },
{ marca: "De Tomaso", model: "Biguà (Qvale Mangusta)", ano: 1999, priceUSD: 70000, summary: "Inicialmente um projeto De Tomaso, este roadster 'targa' acabou sendo produzido como Qvale Mangusta.", potencia: "320 cv", zeroCem: "5.3 s", vmax: "250 km/h", motor: "Ford SVT V8 4.6L", img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRc01isKLm3HfxFUZNmAyk3Hb-XxOtW-89L6Q&s" },
{ marca: "De Tomaso", model: "Pantera Si", ano: 1991, priceUSD: 220000, summary: "A evolução final do Pantera, com um facelift radical por Marcello Gandini e produção muito limitada.", potencia: "305 cv", zeroCem: "5.3 s", vmax: "280 km/h", motor: "Ford 302 V8 5.0L", img: "https://media.goodingco.com/image/upload/c_fill,g_auto,q_88,w_1280/v1/Prod/Portal/1991%20De%20Tomaso%20Pantera%2090%20Si/1991-De-Tomaso-Pantera-90-Si-20" },
{ marca: "De Tomaso", model: "Pantera GT5-S", ano: 1985, priceUSD: 250000, summary: "O Pantera com o visual mais icônico dos anos 80: para-lamas alargados e uma asa traseira imponente.", potencia: "350 cv", zeroCem: "5.4 s", vmax: "280 km/h", motor: "Ford Cleveland V8 5.8L", img: "https://images.squarespace-cdn.com/content/v1/5caed8960cf57d49530e8c60/a408c776-3d05-4390-9845-040477b50951/01NDX.jpg" },
{ marca: "De Tomaso", model: "Pantera GTS", ano: 1974, priceUSD: 180000, summary: "Versão de alta performance do Pantera para a Europa, com maior compressão e visual mais agressivo.", potencia: "350 cv", zeroCem: "5.7 s", vmax: "260 km/h", motor: "Ford Cleveland V8 5.8L", img: "https://www.classicdriver.com/sites/default/files/cars_images/dsc_8389_2.jpg" },
{ marca: "De Tomaso", model: "Longchamp", ano: 1972, priceUSD: 75000, summary: "Um elegante coupé Grand Tourer 2+2 com motor V8 dianteiro, baseado na plataforma do sedã Deauville.", potencia: "330 cv", zeroCem: "6.5 s", vmax: "240 km/h", motor: "Ford Cleveland V8 5.8L", img: "https://www.autoblog.pt/wp-content/uploads/2014/10/de-tomaso-longchamp-01.jpg" },
{ marca: "De Tomaso", model: "Mangusta", ano: 1969, priceUSD: 350000, summary: "Antecessor do Pantera, com design estonteante de Giorgetto Giugiaro e portas 'asa de gaivota' sobre o motor.", potencia: "306 cv", zeroCem: "6.0 s", vmax: "250 km/h", motor: "Ford V8 4.7L (289ci)", img: "https://upload.wikimedia.org/wikipedia/commons/7/7e/De_Tomaso_Mangusta_%28Kirchzarten%29_jm20706.jpg" },
{ marca: "De Tomaso", model: "Vallelunga", ano: 1965, priceUSD: 400000, summary: "O primeiro carro de rua da De Tomaso. Um esportivo leve e raro com chassi de viga central e motor Ford Kent.", potencia: "104 cv", zeroCem: "7.0 s", vmax: "215 km/h", motor: "Ford Kent I4 1.5L", img: "https://bringatrailer.com/wp-content/uploads/2024/06/1969_detomaso_vallelunga_0p3a7068-70812.jpg?fit=1728%2C1152" },
/* === COLEÇÃO DODGE SRT: FORÇA BRUTA AMERICANA === */
{ marca: "Dodge", model: "Challenger SRT Demon 170", ano: 2023, priceUSD: 250000, summary: "A despedida do Challenger a combustão. Um monstro de arrancada com mais de 1000 cv usando etanol E85.", potencia: "1025 cv", zeroCem: "1.66 s", vmax: "346 km/h", motor: "V8 6.2L Supercharged Hemi", img: "https://bringatrailer.com/wp-content/uploads/2024/04/2023_dodge_challenger-srt-demon-170_img_1107-48505.jpeg?fit=940%2C627" },
{ marca: "Dodge", model: "Challenger SRT Demon", ano: 2018, priceUSD: 180000, summary: "O carro de arrancada legalizado para as ruas que chocou o mundo com sua capacidade de empinar.", potencia: "840 cv", zeroCem: "2.3 s", vmax: "270 km/h", motor: "V8 6.2L Supercharged Hemi", img: "https://hips.hearstapps.com/hmg-prod/images/challengerdemon-1557775422.jpg?crop=0.926xw:0.846xh;0.0593xw,0.154xh&resize=2048:*" },
{ marca: "Dodge", model: "Challenger SRT Hellcat Redeye", ano: 2022, priceUSD: 90000, summary: "A fusão do Hellcat com a alma do Demon, resultando em um muscle car com performance implacável.", potencia: "797 cv", zeroCem: "3.4 s", vmax: "327 km/h", motor: "V8 6.2L Supercharged Hemi", img: "https://i.gaw.to/content/photos/59/18/591875-dodge-challenger-srt-hellcat-redeye-jailbreak-2023-que-du-muscle.jpeg?1024x640" },
{ marca: "Dodge", model: "Charger SRT Hellcat Redeye", ano: 2022, priceUSD: 95000, summary: "O sedã de produção em massa mais potente e rápido do mundo. Um supercarro para a família.", potencia: "797 cv", zeroCem: "3.6 s", vmax: "327 km/h", motor: "V8 6.2L Supercharged Hemi", img: "https://moparinsiders.com/wp-content/uploads/2024/08/Image-668.jpeg" },
{ marca: "Dodge", model: "Viper ACR (2016)", ano: 2016, priceUSD: 250000, summary: "O 'American Club Racer'. Um carro de corrida para as ruas com aerodinâmica extrema e um motor V10 monstruoso.", potencia: "645 cv", zeroCem: "3.3 s", vmax: "285 km/h", motor: "V10 8.4L Aspirado", img: "https://cdn.motor1.com/images/mgl/xEyvz/s1/2016-dodge-viper-acr.jpg" },
{ marca: "Dodge", model: "Viper SRT-10", ano: 2008, priceUSD: 120000, summary: "A quarta geração do Viper, com um V10 de 8.4 litros e 600 cavalos de potência bruta.", potencia: "600 cv", zeroCem: "3.7 s", vmax: "325 km/h", motor: "V10 8.4L Aspirado", img: "https://images.caradisiac.com/logos/2/9/4/0/132940/S0-Dodge-Viper-SRT10-ACR-X-la-meme-mais-en-colere-37303.jpg" },
{ marca: "Dodge", model: "Durango SRT Hellcat", ano: 2021, priceUSD: 95000, summary: "Um SUV de 7 lugares com o coração de um Hellcat. Força e praticidade em um pacote insano.", potencia: "710 cv", zeroCem: "3.5 s", vmax: "290 km/h", motor: "V8 6.2L Supercharged Hemi", img: "https://cdn.motor1.com/images/mgl/lpB9w/s3/2021-dodge-durango-srt-hellcat.jpg" },
{ marca: "Dodge", model: "Ram SRT-10", ano: 2004, priceUSD: 60000, summary: "Uma picape absurda que a Dodge equipou com o motor e a transmissão do Viper.", potencia: "500 cv", zeroCem: "4.9 s", vmax: "248 km/h", motor: "V10 8.3L Aspirado", img: "https://www.thedrive.com/wp-content/uploads/images-by-url-td/content/2020/05/2004-Dodge-Ram-SRT-10-VCA-Edition-%C2%A92020-Courtesy-of-RM-Sothebys-2.jpg?quality=85" },
{ marca: "Dodge", model: "Challenger R/T Scat Pack", ano: 2023, priceUSD: 55000, summary: "Considerado o melhor custo-benefício em performance, com um motor Hemi 392 aspirado.", potencia: "485 cv", zeroCem: "4.2 s", vmax: "281 km/h", motor: "V8 6.4L Hemi 392", img: "https://www.autooutlet.cz/wp-content/uploads/2022/12/dsc06870-1298x730.jpg" },
{ marca: "Dodge", model: "Neon SRT-4", ano: 2003, priceUSD: 20000, summary: "Um 'pocket rocket' dos anos 2000. Um sedã compacto e barato com um motor turbo surpreendentemente potente.", potencia: "215 cv", zeroCem: "5.6 s", vmax: "246 km/h", motor: "I4 2.4L Turbo", img: "https://media.carsandbids.com/cdn-cgi/image/width=2080,quality=70/4822e9034b0b6b357b3f73fabdfc10e586c36f68/photos/KPmnmNko-jUkyJgfUzp-(edit).jpg?t=168778398348" },
  /* === TOP 10 MUSCLE CARS ICÔNICOS === */
{ marca: "Ford", model: "Mustang Boss 429", ano: 1969, priceUSD: 550000, summary: "Um dos Mustang mais raros e potentes, criado para homologar o motor 429 para a NASCAR.", potencia: "375 cv (subestimado)", zeroCem: "6.5 s", vmax: "200 km/h", motor: "V8 7.0L (429ci)", img: "https://onlycars.com.br/wp-content/uploads/2024/08/mustang-boss-429-e1724592554483-1200x918.jpg" },
{ marca: "Dodge", model: "Charger R/T 426 Hemi", ano: 1968, priceUSD: 200000, summary: "O 'General Lee' original. Um ícone de design e força bruta da era de ouro dos muscle cars.", potencia: "425 cv", zeroCem: "5.5 s", vmax: "240 km/h", motor: "V8 7.0L (426 Hemi)", img: "https://cdn.dealeraccelerate.com/rkm/1/3779/260161/1920x1440/1969-dodge-charger-r-t" },
{ marca: "Chevrolet", model: "Chevelle SS 454", ano: 1970, priceUSD: 150000, summary: "No seu lançamento, foi um dos carros de produção mais potentes do mundo. O rei das ruas em 1970.", potencia: "450 cv", zeroCem: "5.4 s", vmax: "230 km/h", motor: "V8 7.4L (454ci)", img: "https://www.sportscarmarket.com/wp-content/uploads/2021/05/dbe05350458c15fa6c802fb686391131.jpg" },
{ marca: "Plymouth", model: "Hemi 'Cuda", ano: 1971, priceUSD: 400000, summary: "Raro, colorido e extremamente potente. Um dos 'holy grails' dos colecionadores de Mopar.", potencia: "425 cv", zeroCem: "5.6 s", vmax: "240 km/h", motor: "V8 7.0L (426 Hemi)", img: "https://media.autoexpress.co.uk/image/private/s--X-WVjvBW--/f_auto,t_content-image-full-desktop@1/v1562242687/autoexpress/2016/05/71-cuda_1.jpg" },
{ marca: "Pontiac", model: "GTO 'The Judge'", ano: 1969, priceUSD: 100000, summary: "Considerado o primeiro muscle car, 'The Judge' era um pacote de performance com estilo extravagante.", potencia: "370 cv", zeroCem: "6.2 s", vmax: "210 km/h", motor: "V8 6.6L Ram Air IV", img: "https://static0.topspeedimages.com/wordpress/wp-content/uploads/2022/11/1969-Pontiac-GTO-Judge----Mecum---main.jpg" },
{ marca: "Chevrolet", model: "Camaro ZL1", ano: 1969, priceUSD: 750000, summary: "Um monstro de arrancada encomendado via COPO, com um motor de corrida de alumínio 427.", potencia: "430 cv (subestimado)", zeroCem: "5.3 s", vmax: "220 km/h", motor: "V8 7.0L (L72 427)", img: "https://stories.hemmings.com/wp-content/uploads/2024/03/origin-400-scaled.jpg" },
{ marca: "Plymouth", model: "Road Runner Superbird", ano: 1970, priceUSD: 500000, summary: "Criado para a NASCAR, com um nariz aerodinâmico e uma asa traseira gigante para dominar as pistas.", potencia: "425 cv", zeroCem: "5.5 s", vmax: "260 km/h", motor: "V8 7.0L (426 Hemi)", img: "https://static.overfuel.com/dealers/trust-auto/image/1970-Plymouth-Superbird-1024x576.jpg" },
{ marca: "Ford", model: "Torino Talladega", ano: 1969, priceUSD: 90000, summary: "A resposta da Ford ao Superbird, um carro de homologação para a NASCAR com foco em aerodinâmica.", potencia: "335 cv", zeroCem: "7.0 s", vmax: "230 km/h", motor: "V8 7.0L (428 Cobra Jet)", img: "https://www.motortrend.com/uploads/2022/09/001-1969-ford-torino-talladega-tribute-front-left-action.jpg" },
{ marca: "Oldsmobile", model: "442 W-30", ano: 1970, priceUSD: 80000, summary: "Um muscle car de luxo, mas com o pacote W-30, se tornava uma máquina de performance temível.", potencia: "370 cv", zeroCem: "5.7 s", vmax: "215 km/h", motor: "V8 7.5L (455ci)", img: "https://www.garageandsocial.com/wp-content/uploads/2020/05/IMG_5309_1080x1080.jpg" },
{ marca: "Buick", model: "GSX Stage 1", ano: 1970, priceUSD: 185000, summary: "Conhecido como o 'rei do torque', o GSX Stage 1 era um dos muscle cars mais rápidos de sua época.", potencia: "360 cv", zeroCem: "5.5 s", vmax: "220 km/h", motor: "V8 7.5L (455ci)", img: "https://cdn.dealeraccelerate.com/ag/1/3539/294984/1920x1440/1970-buick-gsx-stage-1" },
/* === 20 SUPER CLÁSSICOS INESQUECÍVEIS === */
{ marca: "Jaguar", model: "XJ220", ano: 1992, priceUSD: 650000, summary: "Por um breve período, foi o carro de produção mais rápido do mundo. Um projeto ambicioso e belo.", potencia: "542 cv", zeroCem: "3.6 s", vmax: "349 km/h", motor: "V6 3.5L Twin-Turbo", img: "https://p.turbosquid.com/ts-thumb/Nz/Nf4SPG/tQ/jaguar_xj220_1992_0000/jpg/1697546123/1920x1080/fit_q87/0ca3ef9939d780fd163f9c4db6098386ee2f8780/jaguar_xj220_1992_0000.jpg" },
{ marca: "Porsche", model: "959", ano: 1986, priceUSD: 2000000, summary: "Um marco tecnológico com tração integral, biturbo e suspensão ajustável. Um carro à frente de seu tempo.", potencia: "450 cv", zeroCem: "3.7 s", vmax: "317 km/h", motor: "Flat-6 2.85L Biturbo", img: "https://upload.wikimedia.org/wikipedia/commons/b/b2/Porsche_959_%E2%80%93_Frontansicht_%282%29%2C_21._M%C3%A4rz_2013%2C_D%C3%BCsseldorf.jpg" },
{ marca: "Ford", model: "GT40 Mk I", ano: 1966, priceUSD: 11000000, summary: "A lenda de Le Mans, construído para derrotar a Ferrari, e conseguiu por 4 anos consecutivos.", potencia: "380 cv", zeroCem: "5.3 s", vmax: "270 km/h", motor: "V8 4.7L (289ci)", img: "https://www.superformance.com/themes/default/assets/images/cars/gt40-mki/slider/07-original.webp" },
{ marca: "Lamborghini", model: "Countach LP400", ano: 1974, priceUSD: 1500000, summary: "O 'Periscopio'. A forma mais pura do design de Marcello Gandini que definiu uma geração de supercarros.", potencia: "375 cv", zeroCem: "5.4 s", vmax: "290 km/h", motor: "V12 3.9L", img: "https://www.artcurial.com/item-images/849601/PICTURE_CATALOG/Lamborghini%20Countach%201%20(1).jpg?w=700&force_webp=true" },
{ marca: "Bugatti", model: "EB110 Super Sport", ano: 1992, priceUSD: 2800000, summary: "O renascimento da Bugatti nos anos 90, um monstro de tecnologia com 4 turbos e tração integral.", potencia: "611 cv", zeroCem: "3.2 s", vmax: "351 km/h", motor: "V12 3.5L Quad-Turbo", img: "https://upload.wikimedia.org/wikipedia/commons/6/6a/1995_Bugatti_EB110SS_in_Blu_Bugatti%2C_front_left_%28Greenwich%29.jpg" },
{ marca: "BMW", model: "M1", ano: 1978, priceUSD: 700000, summary: "O único supercarro de motor central da BMW, com design de Giugiaro e pedigree de corrida.", potencia: "277 cv", zeroCem: "5.6 s", vmax: "262 km/h", motor: "M88 I6 3.5L", img: "https://s2-autoesporte.glbimg.com/CGNQIDmMBN7Y_dewUY8gOO8Rmjk=/267x291:1911x1365/924x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2021/X/v/VxNbPYTyuRkWeH2YaGMg/bmw-m1-1.jpg" },
{ marca: "Jaguar", model: "E-Type Series 1", ano: 1961, priceUSD: 400000, summary: "Descrito por Enzo Ferrari como 'o carro mais bonito já feito'. Um ícone do design automotivo.", potencia: "265 cv", zeroCem: "6.9 s", vmax: "240 km/h", motor: "6-Cil em Linha 3.8L", img: "https://marketplacemagazine.co.nz/wp-content/uploads/2023/11/jaguar.jpg" },
{ marca: "Porsche", model: "Carrera GT", ano: 2004, priceUSD: 1500000, summary: "Com um motor V10 derivado de um projeto de F1, é um dos supercarros mais analógicos e desafiadores de se pilotar.", potencia: "612 cv", zeroCem: "3.5 s", vmax: "330 km/h", motor: "V10 5.7L", img: "https://upload.wikimedia.org/wikipedia/commons/6/65/Porsche_Carrera_GT_-_Goodwood_Breakfast_Club_%28July_2008%29.jpg" },
{ marca: "Aston Martin", model: "DB4 GT Zagato", ano: 1960, priceUSD: 14300000, summary: "Uma versão mais leve, potente e aerodinâmica do DB4, com uma carroceria deslumbrante da Zagato.", potencia: "314 cv", zeroCem: "6.1 s", vmax: "247 km/h", motor: "I6 3.7L", img: "https://www.williamloughran.co.uk//media/5653/aston-martin-db4-zagato-re-creation-2265-1.jpg" },
{ marca: "Ferrari", model: "288 GTO", ano: 1984, priceUSD: 3500000, summary: "O primeiro supercarro moderno da Ferrari. Criado para homologação do Grupo B, que nunca chegou a correr.", potencia: "400 cv", zeroCem: "4.9 s", vmax: "304 km/h", motor: "V8 2.9L Twin-Turbo", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/8/81/Ferrari_288_GTO_%281%29.JPG/1200px-Ferrari_288_GTO_%281%29.JPG" },
{ marca: "Alfa Romeo", model: "33 Stradale", ano: 1967, priceUSD: 17000000, summary: "Considerado por muitos o carro mais bonito de todos os tempos. Uma versão de rua de um protótipo de corrida.", potencia: "230 cv", zeroCem: "5.5 s", vmax: "260 km/h", motor: "V8 2.0L", img: "https://www.razaoautomovel.com/wp-content/uploads/2017/08/1967_alfa_romeo_tipo_33_stradale_4-e1504025267843.jpg.webp" },
{ marca: "Maserati", model: "MC12", ano: 2004, priceUSD: 3000000, summary: "Baseado na Ferrari Enzo, mas mais longo, largo e com uma aerodinâmica focada nas pistas. Extremamente raro.", potencia: "630 cv", zeroCem: "3.8 s", vmax: "330 km/h", motor: "V12 6.0L", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/MC12._%285234528513%29.jpg/1200px-MC12._%285234528513%29.jpg" },
/* === COLEÇÃO VECTOR: O SONHO AEROESPACIAL AMERICANO === */
{ marca: "Vector", model: "W8", ano: 1990, priceUSD: 1000000, summary: "Um supercarro americano com design de caça a jato e tecnologia aeroespacial. Ambicioso e radical.", potencia: "625 cv", zeroCem: "4.2 s", vmax: "350 km/h", motor: "V8 6.0L Twin-Turbo", img: "https://images.hgmsites.net/hug/1990-vector-w8-twin-turbo-chassis-001_100932023_h.webp" },
{ marca: "Vector", model: "M12", ano: 1996, priceUSD: 189000, summary: "Produzido sob nova direção, o M12 usava o chassi do Diablo e o lendário motor V12 da Lamborghini.", potencia: "492 cv", zeroCem: "4.8 s", vmax: "305 km/h", motor: "Lamborghini V12 5.7L", img: "http://cdn.prod.website-files.com/662e6423ff88861916362956/67ec11e3610dec46a8c36cf0_secondary_image-1743524321840.webp" },
{ marca: "Vector", model: "WX-3 (protótipo)", ano: 1992, priceUSD: 1500000, summary: "O protótipo que deveria ser o sucessor do W8, com um motor de até 1000 cv e design ainda mais futurista.", potencia: "1000 cv", zeroCem: "3.3 s", vmax: "400 km/h", motor: "V8 7.0L Twin-Turbo", img: "https://cdn.dealeraccelerate.com/bagauction/9/1565/72866/1920x1440/1993-vector-avtech-wx-3-prototype" },
{ marca: "Vector", model: "SRV8 (protótipo)", ano: 1999, priceUSD: 100000, summary: "Protótipo para ser uma versão 'de entrada' do M12, usando um motor V8 do Corvette LT1.", potencia: "350 cv", zeroCem: "5.0 s", vmax: "290 km/h", motor: "Corvette LT1 V8 5.7L", img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSizPlYePSgjAzf6gcuQ5XglZLzw5gWKrILOw&s" },
{ marca: "Vector", model: "WX-8 (protótipo)", ano: 2007, priceUSD: 15000000, summary: "O último conceito da Vector. Um hypercar que prometia mais de 1200 cv, mas que nunca saiu do papel.", potencia: "1250 cv (estimado)", zeroCem: "2.5 s (estimado)", vmax: "440 km/h (estimado)", motor: "V8 10.0L Supercharged", img: "https://www.supercars.net/blog/wp-content/uploads/2015/12/695677.jpg" },
{ marca: "Vector", model: "Avtech WX-3R Roadster", ano: 1993, priceUSD: 1500000, summary: "A versão roadster do protótipo WX-3. Um dos carros-conceito mais radicais e desejados dos anos 90.", potencia: "1000 cv", zeroCem: "3.3 s", vmax: "400 km/h", motor: "V8 7.0L Twin-Turbo", img: "https://cdn.rmsothebys.com/b/8/b/4/e/3/b8b4e3c552ca934cac9548f7d31534ad4187bd96.webp" },
/* === A ELITE DOS 2000CV+: HYPERCARS EXTREMOS === */
{ marca: "Devel", model: "Sixteen (Não foi desenvolvido)", ano: 2025, priceUSD: 2200000, summary: "O mítico hypercar de Dubai. A versão de pista promete mais de 5000 cv, embora seu status de produção ainda seja um protótipo.", potencia: "5007 cv (protótipo)", zeroCem: "1.8 s (estimado)", vmax: "(estimado) 560+ km/h ", motor: "V16 12.3L Quad-Turbo", img: "https://i0.wp.com/asphalt9.info/wp-content/uploads/2024/09/Asphalt-Legends-Unite-Devel-Sixteen.jpg?fit=1928%2C1080&ssl=1" },
{ marca: "BYD", model: "Yangwang U9", ano: 2024, priceUSD: 230000, summary: "Hypercar elétrico chinês com suspensão ativa revolucionária. A versão de produção tem 1300cv; edições mais potentes são esperadas.", potencia: "3019 cv", zeroCem: "2.36 s", vmax: "496,22 km/h (estimado)", motor: "Quatro Motores Elétricos", img: "https://uploads.automaistv.com.br/2025/08/BYD-YangWang-u9-Track-Edition.webp" },
{ marca: "Koenigsegg", model: "Gemera (HV8)", ano: 2025, priceUSD: 2100000, summary: "O 'Mega-GT' de 4 lugares. Com a opção do motor V8 'Hot V8' (HV8), a potência combinada supera os 2300 cv.", potencia: "2300 cv", zeroCem: "1.9 s", vmax: "400 km/h", motor: "V8 5.0L Twin-Turbo Híbrido", img: "https://media.drive.com.au/obj/tx_q:50,rs:auto:1920:1080:1/driveau/upload/cms/uploads/uapcu7o7vzx3bkvor6g4" },
{ marca: "Rimac", model: "Nevera", ano: 2024, priceUSD: 2400000, summary: "O hypercar elétrico que quebrou múltiplos recordes. Sua potência oficial é de 1914 cv, muito próxima da marca dos 2000 cv.", potencia: "2107 cv", zeroCem: "1.85 s", vmax: "412 km/h", motor: "Quatro Motores Elétricos", img: "https://s2-autoesporte.glbimg.com/dp_039jXBZG7ruV79J9Ok-ZHVW8=/0x0:1400x788/888x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2021/L/U/eVfXIpQS64NIz6msSWeg/rmc-.jpg" },
{ marca: "Lotus", model: "Evija", ano: 2024, priceUSD: 2300000, summary: "O primeiro hypercar elétrico da Lotus. Com quase 2000 cv, é um dos carros de produção mais potentes do mundo.", potencia: "2011 cv", zeroCem: "2.8 s", vmax: "350 km/h", motor: "Quatro Motores Elétricos", img: "https://cdn.motor1.com/images/mgl/G32nGG/s3/lotus-evija-fittipaldi.jpg" },
{ marca: "Hennessey", model: "Venom F5 Evolution", ano: 2024, priceUSD: 2100000, summary: "Construído para ultrapassar as 300 mph, o F5 tem 1817 cv. Versões futuras podem ter ainda mais potência, tem como objetivo atingir mais de 500 km/h.", potencia: "2031 cv", zeroCem: "2.6 s", vmax: "434 km/h", motor: "V8 6.6L Twin-Turbo 'Fury'", img: "https://quatrorodas.abril.com.br/wp-content/uploads/2025/04/Hennessey-Finalizes-Testing-of-2031-HP-Venom-F5-Evolution-Hypercar-Low-2-1.jpg?crop=1&resize=1212,909" },
{ marca: "DEUS", model: "Vayanne", ano: 2025, priceUSD: 2000000, summary: "Hypercar elétrico austríaco que promete ser um dos mais potentes do mundo, com produção limitada a 99 unidades.", potencia: "2243 cv (projetado)", zeroCem: "1.99 s (projetado)", vmax: "400+ km/h (projetado)", motor: "Três Motores Elétricos", img: "https://upload.wikimedia.org/wikipedia/commons/e/e5/Deus_Vayanne%2C_front_NYIAS_2022.jpg" },
];

// =================================================================================
// LÓGICA DA APLICAÇÃO (não precisa editar abaixo desta linha)
// =================================================================================

/**
 * Função que processa a lista `carData` e a transforma na lista final `carros`,
 * adicionando um ID único e um objeto de especificações para cada um.
 * @param {Array} data A lista de objetos de carros.
 * @returns {Array} A lista de objetos de carros pronta para ser usada.
 */
function buildCarCatalog(data) {
  return data.map((car, index) => ({
    id: index + 1,
    ...car, // Copia todas as propriedades do objeto original
    specs: {
      Motor: car.motor || "—",
      Potencia: car.potencia || "—",
      "0–100 km/h": car.zeroCem || "—",
      "Velocidade máxima": car.vmax || "—",
      Ano: car.ano || "—",
      Preço: (typeof car.priceUSD === "number" ? `US$ ${car.priceUSD.toLocaleString()}` : car.priceUSD || "—")
    }
  }));
}

const carros = buildCarCatalog(carData);
let activeCar = null;

// Elementos do DOM
const catalogEl = document.getElementById("catalog");
const countEl = document.getElementById("count");
const brandFilterEl = document.getElementById("brandFilter");
const searchInput = document.getElementById("topSearch");
const priceMaxInput = document.getElementById("priceMax");
const yearMinInput = document.getElementById("yearMin");
const sortByEl = document.getElementById("sortBy");
const modalBackdrop = document.getElementById("modalBackdrop");

// Funções do Modal
function openModal(carId) {
  activeCar = carros.find(c => c.id === carId);
  if (!activeCar) return;

  document.getElementById("modalImg").src = activeCar.img;
  document.getElementById("modalTitle").textContent = `${activeCar.marca} ${activeCar.model}`;
  document.getElementById("modalSummary").textContent = activeCar.summary;
  document.getElementById("modalPrice").textContent = `Preço: ${activeCar.specs.Preço}`;
  document.getElementById("modalYear").textContent = `Ano: ${activeCar.ano}`;
  document.getElementById("modalPower").textContent = `Potência: ${activeCar.potencia}`;
  document.getElementById("modalVmax").textContent = `V.Max: ${activeCar.vmax}`;
  
  const specsHtml = Object.entries(activeCar.specs)
    .map(([key, value]) => `<div><strong>${key}:</strong> ${value}</div>`)
    .join('');
  document.getElementById("modalSpecs").innerHTML = specsHtml;

  modalBackdrop.style.display = "flex";
}

function closeModal(event) {
  // Se o clique foi no backdrop (e não no modal), fecha.
  if (event && event.target !== modalBackdrop) return;
  modalBackdrop.style.display = "none";
  activeCar = null;
}

// Funções de Filtro e Renderização
function populateBrandFilter() {
  const brands = [...new Set(carros.map(c => c.marca))].sort();
  brands.forEach(brand => {
    const option = document.createElement("option");
    option.value = brand;
    option.textContent = brand;
    brandFilterEl.appendChild(option);
  });
}

function applyFilters() {
  const searchTerm = searchInput.value.toLowerCase();
  const brand = brandFilterEl.value;
  const priceMax = parseFloat(priceMaxInput.value) || Infinity;
  const yearMin = parseInt(yearMinInput.value) || 0;
  const sortBy = sortByEl.value;

  let filteredCars = carros.filter(car => {
    const carText = `${car.marca} ${car.model} ${car.ano} ${car.potencia} ${car.summary}`.toLowerCase();
    const matchesSearch = carText.includes(searchTerm);
    const matchesBrand = !brand || car.marca === brand;
    const matchesPrice = car.priceUSD <= priceMax;
    const matchesYear = car.ano >= yearMin;
    return matchesSearch && matchesBrand && matchesPrice && matchesYear;
  });
  
  // Ordenação
  switch (sortBy) {
    case 'priceAsc':
      filteredCars.sort((a, b) => a.priceUSD - b.priceUSD);
      break;
    case 'priceDesc':
      filteredCars.sort((a, b) => b.priceUSD - a.priceUSD);
      break;
    case 'yearDesc':
      filteredCars.sort((a, b) => b.ano - a.ano);
      break;
    case 'vmaxDesc':
      // Tratamento para valores não numéricos em vmax
      filteredCars.sort((a, b) => {
        const vmaxA = parseInt(a.vmax) || 0;
        const vmaxB = parseInt(b.vmax) || 0;
        return vmaxB - vmaxA;
      });
      break;
  }

  renderCatalog(filteredCars);
}

function renderCatalog(filteredCars) {
  catalogEl.innerHTML = "";
  if (filteredCars.length === 0) {
    catalogEl.innerHTML = "<p style='grid-column: 1 / -1; text-align: center;'>Nenhum carro encontrado com os filtros aplicados.</p>";
  } else {
    filteredCars.forEach(car => {
      const card = document.createElement("article");
      card.className = "card";
      card.innerHTML = `
        <div class="media">
          <img src="${car.img}" alt="${car.marca} ${car.model}" loading="lazy">
        </div>
        <div class="body">
          <div class="meta">
            <h3 class="title">${car.marca} ${car.model}</h3>
            <div class="price">US$ ${car.priceUSD.toLocaleString()}</div>
          </div>
          <p class="muted" style="font-size:12px; margin: 4px 0;">${car.summary.substring(0, 80)}...</p>
          <div class="specs">
            <span class="badge">Ano: ${car.ano}</span>
            <span class="badge">${car.potencia}</span>
            <span class="badge">${car.vmax}</span>
          </div>
          <div class="actions">
            <button class="btn" onclick="openModal(${car.id})">Ver Detalhes</button>
          </div>
        </div>
      `;
      catalogEl.appendChild(card);
    });
  }
  countEl.textContent = `Carros encontrados: ${filteredCars.length}`;
}

function toggleView(view) {
  if (view === 'list') {
    document.body.classList.add('list-view');
  } else {
    document.body.classList.remove('list-view');
  }
}

// Funções auxiliares (stubs)
function agendarTeste() {
  if (activeCar) {
    alert(`Ótima escolha! Entraremos em contato para agendar seu teste drive com o ${activeCar.marca} ${activeCar.model}.`);
  }
}

function openSpecs() {
  alert("Exibindo especificações completas...");
}

// Inicialização
document.addEventListener('DOMContentLoaded', () => {
  populateBrandFilter();
  applyFilters();
});
</script>

</body>
</html>