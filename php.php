<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Wyniki zawodów wędkarskich</title>
   <style>
      * {
         box-sizing: border-box;
         
      }

      body {
         position: relative;
         min-height: 100vh;
         margin: 0;
         padding: 48px 20px;
         display: grid;
         place-items: center;
         font-family: "Segoe UI", Arial, sans-serif;
         color: #fff;
         background:
            radial-gradient(ellipse at 12% 12%, rgba(255, 246, 205, .85), transparent 28%),
            radial-gradient(ellipse at 88% 20%, rgba(255, 255, 255, .7), transparent 22%),
            linear-gradient(180deg, #bde3d2 0%, #d8e9d0 42%, #8fc9c1 43%, #4e9fa2 100%);
      }

      html,body{
         background-image: url(tlo.webp);
         background-repeat: no-repeat;
         background-position: center;
         background-size: cover;
      }

      body::before {
         position: fixed;
         right: 0;
         bottom: 0;
         left: 0;
         height: 105px;
         background:
            radial-gradient(ellipse 70px 10px at 12% 30%, rgba(225, 255, 239, .55) 45%, transparent 50%),
            radial-gradient(ellipse 95px 12px at 48% 62%, rgba(225, 255, 239, .4) 45%, transparent 50%),
            radial-gradient(ellipse 75px 10px at 82% 38%, rgba(225, 255, 239, .45) 45%, transparent 50%),
            linear-gradient(180deg, transparent, rgba(22, 102, 111, .22));
         content: "";
         pointer-events: none;
      }

      main {
         position: relative;
         z-index: 1;
         width: min(100%, 520px);
      }

      .fish-school {
         position: fixed;
         z-index: 0;
         inset: 0;
         overflow: hidden;
         pointer-events: none;
      }

      .swimming-fish {
         position: absolute;
         width: 120px;
         height: auto;
         filter: drop-shadow(0 2px 3px rgba(0, 0, 0, .25));
         animation: swim 10s linear infinite alternate;
      }

      @keyframes swim {
         from {
            transform: translate(0, -4px);
         }

         to {
            transform: translate(var(--swim-distance), 4px);
         }
      }

      header {
         margin-bottom: 24px;
         text-align: center;
      }

      .fishing-scene {
         display: block;
         width: 150px;
         height: 90px;
         margin: 0 auto 12px;
         filter: drop-shadow(0 8px 8px rgba(34, 88, 75, .16));
         animation: float 3.5s ease-in-out infinite;
      }

      @keyframes float {
         0%, 100% {
            transform: translateY(0);
         }

         50% {
            transform: translateY(-5px);
         }
      }

      h1 {
         margin: 0 0 10px;
         color: #fff;
         font-size: clamp(1.8rem, 5vw, 2.5rem);
         line-height: 1.15;
      }

      header p {
         margin: 0;
         color: #fff;
         font-size: 1.05rem;
      }

      form,
      .result {
         padding: 30px;
         border: 1px solid rgba(18, 75, 73, .12);
         border-radius: 20px;
         background: rgba(255, 255, 255, 0.1);
         box-shadow: 0 18px 45px rgba(20, 67, 63, .14);
         transition: transform .25s ease, box-shadow .25s ease;
      }

      form:hover,
      .result:hover {
         transform: translateY(-4px);
         box-shadow: 0 24px 55px rgba(20, 67, 63, .2);
      }

      form {
         display: grid;
         gap: 10px;
      }

      label {
         margin-top: 5px;
         font-size: .96rem;
         font-weight: 600;
         transition: color .2s ease;
      }

      label:hover {
         color: #fff;
      }

      input {
         width: 100%;
         padding: 12px 14px;
         border: 1px solid #bfd4ce;
         border-radius: 10px;
         background: rgba(255,255,255,0.2);
         color: #fff;
         font: inherit;
         transition: border-color .2s, box-shadow .2s, background-color .2s, transform .2s;
      }

      input:hover {
         transform: translateY(-2px);
         border-color: #168174;
         background: #f1faf6;
      }

      input:focus {
         border-color: #168174;
         outline: none;
         box-shadow: 0 0 0 3px rgba(22, 129, 116, .15);
      }

      button {
         margin-top: 10px;
         padding: 13px 18px;
         border: 0;
         border-radius: 10px;
         background: #14786e;
         color: white;
         font: inherit;
         font-weight: 700;
         cursor: pointer;
         transition: background .2s, transform .2s, box-shadow .2s;
      }

      button:hover {
         transform: translateY(-3px) scale(1.02);
         background: #0e625a;
         box-shadow: 0 8px 18px rgba(14, 98, 90, .28);
      }

      button:active {
         transform: translateY(0) scale(.98);
         box-shadow: none;
      }

      button:focus-visible {
         outline: 3px solid rgba(22, 129, 116, .35);
         outline-offset: 3px;
      }

      .result {
         margin-top: 20px;
         border-left: 5px solid #168174;
         color: #fff;
         line-height: 1.6;
         cursor: pointer;
      }

      .result.is-launched {
         pointer-events: none;
         animation: launch-into-space 1.6s cubic-bezier(.35, .05, .8, .25) forwards;
      }

      @keyframes launch-into-space {
         0% {
            opacity: 1;
            transform: translate(0, 0) rotate(0) scale(1);
         }

         30% {
            opacity: 1;
            transform: translate(8vw, -12vh) rotate(240deg) scale(.85);
         }

         100% {
            opacity: 0;
            transform: translate(30vw, -120vh) rotate(720deg) scale(.1);
         }
      }

      @media (max-width: 480px) {
         body {
            padding: 32px 16px;
         }

         form,
         .result {
            padding: 22px;
         }
      }

      @media (prefers-reduced-motion: reduce) {
         *,
         *::before,
         *::after {
            scroll-behavior: auto !important;
            transition-duration: .01ms !important;
            animation-duration: .01ms !important;
            animation-iteration-count: 1 !important;
         }

         .result.is-launched {
            animation: none;
         }

         .swimming-fish {
            animation-duration: 20s !important;
            animation-iteration-count: infinite !important;
         }
      }
   </style>
</head>
<body>
   <div class="fish-school" aria-hidden="true"></div>
   <main>
      <header>
         <svg class="fishing-scene" viewBox="0 0 180 100" role="img" aria-label="Wędkarz łowiący ryby nad jeziorem">
            <circle cx="143" cy="22" r="13" fill="#f5c968"/>
            <path d="M0 68 Q25 57 50 68 T100 68 T150 68 T200 68 V100 H0Z" fill="#258b91"/>
            <path d="M0 78 Q25 69 50 78 T100 78 T150 78 T200 78" fill="none" stroke="#b5e8d4" stroke-width="3" opacity=".8"/>
            <path d="M0 90 Q25 81 50 90 T100 90 T150 90 T200 90" fill="none" stroke="#83cfc3" stroke-width="3" opacity=".8"/>
            <path d="M28 70 Q48 54 68 69 L79 77 H20Z" fill="#4c7052"/>
            <circle cx="47" cy="42" r="7" fill="#c98258"/>
            <path d="M41 40 Q43 31 53 36 L55 40Z" fill="#31584a"/>
            <path d="M43 49 Q53 47 59 59 L51 64 L39 56Z" fill="#e7a84e"/>
            <path d="M47 57 L39 69 L30 70 M52 59 L62 68 L72 70" fill="none" stroke="#314c42" stroke-width="5" stroke-linecap="round"/>
            <path d="M55 51 L71 43 L86 25" fill="none" stroke="#604d36" stroke-width="2.5" stroke-linecap="round"/>
            <path d="M86 25 Q98 42 91 57" fill="none" stroke="#f4f0d4" stroke-width="1.5"/>
            <path d="M84 57 Q91 52 98 57 Q91 64 84 57Z" fill="#f4b84e"/>
            <circle cx="96" cy="57" r="1" fill="#31584a"/>
            <path d="M83 57 L80 54 M83 57 L80 60" fill="none" stroke="#f4b84e" stroke-width="1.5"/>
         </svg>
         <h1>Podsumowanie zawodów wędkarskich</h1>
         <p>Wpisz liczbę złowionych ryb dla każdego zawodnika.</p>
      </header>
      <form action="" method="post">
         <label for="l1">Pierwszy wędkarz</label>
         <input id="l1" type="number" name="l1" required>
         <label for="l2">Drugi wędkarz</label>
         <input id="l2" type="number" name="l2" required>
         <label for="l3">Trzeci wędkarz</label>
         <input id="l3" type="number" name="l3" required>
         <label for="l4">Czwarty wędkarz</label>
         <input id="l4" type="number" name="l4" required>
         <button type="submit">Podsumuj wyniki</button>
      </form>
   <?php
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
      function policzwyniki(){
        $l1 = $_POST['l1'];
        $l2 = $_POST['l2'];
        $l3 = $_POST['l3'];
        $l4 = $_POST['l4'];

         $suma = $l1 + $l2 + $l3 + $l4;
         $srednia = $suma / 4;
         
         echo "<div class=\"result\" tabindex=\"0\">Łącznie złowiono <strong>$suma</strong> ryb. Średnia na wędkarza: <strong>$srednia</strong>.</div>";
         }

      policzwyniki();
      }
   ?>
   </main>
   <script>
      const fishSchool = document.querySelector(".fish-school");
      const fishCount = 6;
      const fishWidth = 120;
      const fishHeight = 96;
      const fishMargin = 8;

      for (let i = 0; i < fishCount; i++) {
         const fish = document.createElement("img");
         fish.src = "zlota_rypka.png";
         fish.alt = "";
         fish.className = "swimming-fish";
         fish.style.animationDelay = `${-Math.random() * 20}s`;
         fishSchool.appendChild(fish);
      }

      const positionFish = () => {
         const usableWidth = Math.max(0, window.innerWidth - fishWidth - fishMargin * 2);
         const usableHeight = Math.max(0, window.innerHeight - fishHeight - fishMargin * 2);

         document.querySelectorAll(".swimming-fish").forEach((fish, index) => {
            fish.style.left = `${fishMargin}px`;
            fish.style.top = `${fishMargin + (index / (fishCount - 1)) * usableHeight}px`;
            fish.style.setProperty("--swim-distance", `${usableWidth}px`);
         });
      };

      positionFish();
      window.addEventListener("resize", positionFish);

      const result = document.querySelector(".result");

      if (result) {
         const launchResult = () => result.classList.add("is-launched");
         result.addEventListener("mouseenter", launchResult, { once: true });
         result.addEventListener("focus", launchResult, { once: true });
      }
   </script>
</body>
</html>
