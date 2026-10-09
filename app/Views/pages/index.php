<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#153e45">
  <meta name="description" content="Conoce FAND, su propuesta para una sociedad más inclusiva, sus tres pilares y los recursos sobre neurodivergencia, derechos y apoyos.">
  <title>FAND · Centro de recursos</title>
  <style>
    :root {
      color-scheme: light;
      --ink: #18383d;
      --muted: #607578;
      --teal: #126d72;
      --teal-dark: #0f5158;
      --paper: #f8f7f3;
      --line: #dce7e2;
      --white: #fff;
      --shadow: 0 16px 45px rgb(23 57 58 / 8%);
    }

    * { box-sizing: border-box; }
    html { scroll-behavior: smooth; }
    body {
      margin: 0;
      background: var(--paper);
      color: var(--ink);
      font: 16px/1.6 system-ui, -apple-system, "Segoe UI", sans-serif;
    }
    button, input, select { font: inherit; }
    a { color: inherit; }
    button:focus-visible, input:focus-visible, select:focus-visible,
    a:focus-visible, iframe:focus-visible {
      outline: 3px solid #b77937;
      outline-offset: 3px;
    }

    .hero {
      position: relative;
      overflow: hidden;
      background:
        radial-gradient(ellipse at 82% 5%, rgb(236 162 94 / 38%), transparent 25%),
        radial-gradient(ellipse at 64% 96%, rgb(185 109 176 / 25%), transparent 35%),
        linear-gradient(116deg, #123d45 4%, #1d5862 46%, #3a4d79 100%);
      background-size: 130% 130%;
      color: #fff;
      animation: hero-color-drift 20s ease-in-out infinite alternate;
    }
    .hero::after {
      position: absolute;
      top: -255px;
      right: max(-180px, calc((100vw - 1180px) / 2 - 130px));
      width: 620px;
      height: 620px;
      border: 1px solid rgb(255 255 255 / 19%);
      border-radius: 50%;
      box-shadow: 0 0 0 45px rgb(255 255 255 / 4%), 0 0 0 95px rgb(255 255 255 / 3%);
      content: "";
      pointer-events: none;
      animation: ring-drift 17s ease-in-out infinite alternate;
    }
    .hero::before {
      position: absolute;
      right: 24%;
      bottom: -175px;
      width: 320px;
      height: 320px;
      border-radius: 45% 55% 61% 39% / 51% 41% 59% 49%;
      background: linear-gradient(135deg, rgb(237 185 105 / 22%), rgb(236 145 135 / 17%));
      content: "";
      transform: rotate(-24deg);
      pointer-events: none;
      animation: shape-float 12s ease-in-out infinite alternate;
    }
    @keyframes hero-color-drift {
      from { background-position: 0% 0%; }
      to { background-position: 100% 70%; }
    }
    @keyframes ring-drift {
      from { transform: translate3d(0, 0, 0) scale(1); }
      to { transform: translate3d(-22px, 16px, 0) scale(1.04); }
    }
    @keyframes shape-float {
      from { transform: translate3d(0, 0, 0) rotate(-24deg); border-radius: 45% 55% 61% 39% / 51% 41% 59% 49%; }
      to { transform: translate3d(15px, -18px, 0) rotate(-12deg); border-radius: 55% 45% 42% 58% / 42% 58% 42% 58%; }
    }
    .hero-inner, main, footer {
      width: min(1160px, calc(100% - 48px));
      margin-inline: auto;
    }
    .hero-inner {
      position: relative;
      z-index: 1;
      padding: 34px 0 52px;
    }
    .hero-layout {
      display: grid;
      grid-template-columns: minmax(0, 1fr) minmax(230px, 310px);
      align-items: center;
      gap: 56px;
    }
    .brand {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      color: #bde0d2;
      font-size: 13px;
      font-weight: 750;
      letter-spacing: .14em;
      text-transform: uppercase;
    }
    .brand-mark {
      display: grid;
      width: 34px;
      height: 34px;
      place-items: center;
      border: 1px solid rgb(255 255 255 / 40%);
      border-radius: 11px;
      background: linear-gradient(145deg, #54aa91, #d29569);
      color: #fff;
      font-size: 14px;
      letter-spacing: 0;
    }
    .hero h1 {
      max-width: 720px;
      margin: 38px 0 14px;
      font-size: clamp(38px, 6vw, 66px);
      font-weight: 650;
      letter-spacing: -.045em;
      line-height: 1.06;
    }
    .hero-copy {
      max-width: 620px;
      margin: 0;
      color: #d5e5e1;
      font-size: clamp(17px, 2vw, 20px);
    }
    .hero-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 27px;
    }
    .hero-meta span {
      padding: 6px 12px;
      border: 1px solid rgb(255 255 255 / 27%);
      border-radius: 999px;
      background: rgb(255 255 255 / 8%);
      color: #e5f0ed;
      font-size: 13px;
    }
    .hero-shortcuts {
      padding: 22px;
      border: 1px solid rgb(255 255 255 / 27%);
      border-radius: 18px;
      background: linear-gradient(145deg, rgb(255 255 255 / 15%), rgb(255 255 255 / 6%));
      backdrop-filter: blur(8px);
    }
    .hero-shortcuts p {
      margin: 0 0 13px;
      color: #d5e5e1;
      font-size: 13px;
      font-weight: 700;
    }
    .shortcut-list { display: grid; gap: 8px; }
    .shortcut {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      width: 100%;
      padding: 10px 12px;
      border: 1px solid rgb(255 255 255 / 19%);
      border-radius: 10px;
      background: rgb(255 255 255 / 7%);
      color: #fff;
      cursor: pointer;
      font-size: 14px;
      text-align: left;
      transition: background .18s ease, transform .18s ease;
    }
    .shortcut:hover { transform: translateX(3px); border-color: rgb(255 255 255 / 40%); background: rgb(255 255 255 / 16%); }
    .shortcut span:last-child { color: #bde0d2; }

    main { padding: 38px 0 60px; }
    .welcome-media {
      position: relative;
      margin-bottom: 62px;
      padding: clamp(22px, 4vw, 42px);
      overflow: hidden;
      border: 1px solid #e2dce7;
      border-radius: 26px;
      background:
        radial-gradient(ellipse at 96% 3%, rgb(248 203 128 / 43%), transparent 24%),
        radial-gradient(ellipse at 0% 100%, rgb(187 220 239 / 50%), transparent 33%),
        linear-gradient(125deg, #fff9ee 0%, #fff 48%, #f8f1fa 100%);
      box-shadow: 0 14px 38px rgb(67 58 82 / 7%);
    }
    .welcome-heading {
      display: grid;
      grid-template-columns: minmax(0, 1fr) minmax(200px, 320px);
      align-items: end;
      gap: 24px;
      margin-bottom: 23px;
    }
    .section-kicker {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      margin-bottom: 9px;
      color: #7d4b71;
      font-size: 12px;
      font-weight: 800;
      letter-spacing: .12em;
      text-transform: uppercase;
    }
    .section-kicker::before {
      width: 9px;
      height: 9px;
      border-radius: 50% 50% 50% 15%;
      background: #e59c52;
      content: "";
      transform: rotate(-35deg);
    }
    .welcome-heading h2 {
      max-width: 690px;
      margin: 0;
      font-size: clamp(26px, 3.8vw, 39px);
      letter-spacing: -.035em;
      line-height: 1.12;
    }
    .welcome-heading p {
      margin: 0;
      color: #5f7071;
      font-size: 14px;
    }
    .welcome-grid {
      display: grid;
      grid-template-columns: minmax(0, .95fr) minmax(0, 1.05fr);
      align-items: stretch;
      gap: 17px;
    }
    .about-content { display: grid; gap: 18px; margin-bottom: 24px; }
    .about-intro {
      display: grid;
      grid-template-columns: minmax(0, 1.25fr) minmax(240px, .75fr);
      gap: 16px;
    }
    .about-panel {
      padding: 21px;
      border: 1px solid #e6e4dc;
      border-radius: 17px;
      background: rgb(255 255 255 / 88%);
    }
    .about-panel h3, .about-section-title {
      margin: 0 0 8px;
      font-size: 18px;
      letter-spacing: -.015em;
      line-height: 1.3;
    }
    .about-panel p { margin: 0; color: #53696a; font-size: 14px; }
    .mission-panel {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      border-color: #e7d5a9;
      background: linear-gradient(145deg, #fff1d4, #ffe6d8 52%, #f7e7f2);
    }
    .mission-panel .mission-quote {
      margin-top: 12px;
      color: #5f3e4d;
      font-size: clamp(18px, 2.4vw, 24px);
      font-weight: 750;
      letter-spacing: -.025em;
      line-height: 1.25;
    }
    .audience-intro { margin-bottom: 14px !important; }
    .profile-list {
      display: flex;
      flex-wrap: wrap;
      gap: 7px;
      margin: 14px 0 0;
      padding: 0;
      list-style: none;
    }
    .profile-list li {
      padding: 5px 10px;
      border: 1px solid #dce7e2;
      border-radius: 999px;
      background: #fff;
      color: #405d5b;
      font-size: 12px;
      font-weight: 650;
    }
    .about-aside {
      margin-top: 13px !important;
      font-size: 12px !important;
    }
    .about-pillars {
      padding: 21px;
      border: 1px solid #e6e0e9;
      border-radius: 18px;
      background: rgb(255 255 255 / 78%);
    }
    .about-section-heading {
      display: flex;
      align-items: end;
      justify-content: space-between;
      gap: 16px;
      margin-bottom: 14px;
    }
    .about-section-heading h3 {
      margin: 0;
      font-size: 20px;
      letter-spacing: -.02em;
    }
    .about-section-heading p {
      max-width: 380px;
      margin: 0;
      color: var(--muted);
      font-size: 12px;
    }
    .pillar-grid {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 11px;
    }
    .pillar-card {
      min-width: 0;
      padding: 15px;
      border: 1px solid #d9e8dc;
      border-radius: 14px;
      background: linear-gradient(145deg, #f0f8ef, #fff);
    }
    .pillar-card:nth-child(2) {
      border-color: #d7e2f1;
      background: linear-gradient(145deg, #edf3fc, #fff);
    }
    .pillar-card:nth-child(3) {
      border-color: #ead9e7;
      background: linear-gradient(145deg, #f9eef5, #fff);
    }
    .pillar-number {
      display: inline-grid;
      width: 28px;
      height: 28px;
      margin-bottom: 10px;
      place-items: center;
      border-radius: 9px;
      background: #d7ebd9;
      color: #256349;
      font-size: 13px;
      font-weight: 800;
    }
    .pillar-card:nth-child(2) .pillar-number { background: #dce7fa; color: #315e9b; }
    .pillar-card:nth-child(3) .pillar-number { background: #f1dcef; color: #824e79; }
    .pillar-card h4 { margin: 0 0 6px; font-size: 15px; line-height: 1.35; }
    .pillar-card p { margin: 0; color: #5b7071; font-size: 12px; line-height: 1.55; }
    .principles-panel {
      padding: 19px 21px;
      border: 1px solid #d9e3e1;
      border-radius: 17px;
      background: linear-gradient(110deg, #f1f7fa, #f7f0f7 55%, #fff7e9);
    }
    .principles-panel h3 { margin: 0 0 12px; font-size: 18px; }
    .principle-list {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 9px;
      margin: 0;
      padding: 0;
      list-style: none;
    }
    .principle-list li {
      display: flex;
      align-items: center;
      gap: 8px;
      min-height: 40px;
      padding: 8px 10px;
      border: 1px solid rgb(255 255 255 / 90%);
      border-radius: 10px;
      background: rgb(255 255 255 / 75%);
      color: #41595d;
      font-size: 12px;
      font-weight: 700;
    }
    .principle-list li::before {
      width: 8px;
      height: 8px;
      flex: 0 0 8px;
      border-radius: 50%;
      background: #df9b55;
      content: "";
    }
    .principle-list li:nth-child(3n + 2)::before { background: #659b85; }
    .principle-list li:nth-child(3n)::before { background: #a373a0; }
    .project-status {
      margin: 0;
      padding: 12px 14px;
      border: 1px solid #ead7a9;
      border-radius: 12px;
      background: #fff9e9;
      color: #68552c;
      font-size: 12px;
    }
    .media-heading {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 14px;
      margin: 25px 0 13px;
    }
    .media-heading h3 { margin: 0; font-size: 19px; }
    .media-heading p { margin: 0; color: #617173; font-size: 12px; text-align: right; }
    .welcome-card {
      min-width: 0;
      padding: 16px;
      border: 1px solid rgb(255 255 255 / 85%);
      border-radius: 19px;
      background: rgb(255 255 255 / 86%);
      box-shadow: 0 8px 23px rgb(41 62 72 / 7%);
    }
    .welcome-card-header {
      display: flex;
      align-items: start;
      justify-content: space-between;
      gap: 12px;
      margin-bottom: 11px;
    }
    .welcome-card h3 {
      margin: 0;
      font-size: 18px;
      letter-spacing: -.015em;
      line-height: 1.3;
    }
    .welcome-card-header p {
      margin: 4px 0 0;
      color: var(--muted);
      font-size: 13px;
    }
    .media-label {
      flex: 0 0 auto;
      padding: 5px 9px;
      border-radius: 999px;
      background: #f4e9f2;
      color: #784366;
      font-size: 11px;
      font-weight: 750;
    }
    .welcome-video {
      display: block;
      width: 100%;
      aspect-ratio: 16 / 9;
      border: 1px solid #d8d4e0;
      border-radius: 13px;
      background:
        radial-gradient(circle at 75% 24%, rgb(231 177 117 / 44%), transparent 24%),
        linear-gradient(135deg, #183f50, #4d4675);
      object-fit: contain;
    }
    .welcome-document {
      display: block;
      width: 100%;
      height: 300px;
      border: 1px solid #e3ded5;
      border-radius: 13px;
      background: #fff;
    }
    .media-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 8px 16px;
      margin-top: 12px;
    }
    .media-link {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      min-height: 36px;
      color: #315d74;
      font-size: 13px;
      font-weight: 750;
      text-decoration-thickness: 1px;
      text-underline-offset: 3px;
    }
    .media-link:hover { color: #784366; }
    .media-note {
      margin: 9px 0 0;
      color: #617173;
      font-size: 12px;
    }
    .section-heading {
      display: flex;
      align-items: end;
      justify-content: space-between;
      gap: 20px;
      margin-bottom: 20px;
    }
    .section-heading h2 {
      margin: 0;
      font-size: clamp(24px, 3vw, 32px);
      letter-spacing: -.025em;
      line-height: 1.2;
    }
    .section-heading p { margin: 7px 0 0; color: var(--muted); }
    .catalogue-count {
      flex: 0 0 auto;
      padding: 7px 12px;
      border: 1px solid #eadcbd;
      border-radius: 999px;
      background: #fff4dc;
      color: #725424;
      font-size: 14px;
    }
    .filters {
      display: grid;
      grid-template-columns: minmax(240px, 1fr) auto;
      align-items: end;
      gap: 18px;
      margin: 25px 0 17px;
    }
    .field label {
      display: block;
      margin: 0 0 5px;
      color: #425c60;
      font-size: 13px;
      font-weight: 700;
    }
    .field input, .field select {
      width: 100%;
      min-height: 50px;
      padding: 10px 15px;
      border: 1px solid #c4d5ce;
      border-radius: 12px;
      background: #fff;
      color: var(--ink);
      box-shadow: 0 4px 16px rgb(23 57 58 / 4%);
    }
    .search-field { position: relative; }
    .search-field input { padding-left: 45px; }
    .search-mark {
      position: absolute;
      bottom: 12px;
      left: 15px;
      color: #67817c;
      font-size: 19px;
      pointer-events: none;
    }
    .field input::placeholder { color: #87999a; }
    .reset-button {
      min-height: 44px;
      padding: 9px 15px;
      border: 0;
      border-radius: 8px;
      background: transparent;
      color: var(--teal);
      cursor: pointer;
      font-size: 14px;
      font-weight: 700;
      white-space: nowrap;
    }
    .reset-button:hover { background: #eaf3ef; }
    .reset-button[hidden] { display: none; }
    .category-tabs {
      display: flex;
      flex-wrap: wrap;
      gap: 9px;
      margin: 0 0 24px;
    }
    .category-tab {
      padding: 8px 14px;
      border: 1px solid #d5e2dc;
      border-radius: 999px;
      background: #fff;
      color: #45605e;
      cursor: pointer;
      font-size: 13px;
      font-weight: 650;
      transition: background .16s ease, border-color .16s ease, color .16s ease;
    }
    .category-tab:hover { border-color: #9dbdb0; background: #eff6f2; }
    .category-tab[aria-pressed="true"] {
      border-color: var(--teal-dark);
      background: var(--teal-dark);
      color: #fff;
    }
    .category-tab[data-category="guia"][aria-pressed="true"] { border-color: #19785c; background: #19785c; }
    .category-tab[data-category="apoyos"][aria-pressed="true"] { border-color: #385f9a; background: #385f9a; }
    .category-tab[data-category="formacion"][aria-pressed="true"] { border-color: #95601b; background: #95601b; }
    .category-tab[data-category="experiencias"][aria-pressed="true"] { border-color: #944b78; background: #944b78; }
    .category-tab span {
      display: inline-grid;
      min-width: 19px;
      min-height: 19px;
      margin-left: 4px;
      place-items: center;
      border-radius: 999px;
      background: #edf3ef;
      color: #526c67;
      font-size: 11px;
    }
    .category-tab[aria-pressed="true"] span { background: rgb(255 255 255 / 18%); color: #fff; }

    .cards {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 18px;
      perspective: 1000px;
    }
    .card {
      --accent: #18755e;
      --accent-soft: #dcf2e7;
      --accent-glow: #b9e4cf;
      display: flex;
      min-width: 0;
      flex-direction: column;
      overflow: hidden;
      padding: 0 21px 18px;
      border: 1px solid color-mix(in srgb, var(--accent) 15%, white);
      border-radius: 17px;
      background: var(--white);
      box-shadow: 0 6px 20px rgb(23 57 58 / 4%);
      transition: border-color .2s ease, box-shadow .2s ease, transform .2s ease;
      animation: card-arrive .35s both;
    }
    .card[data-category="guia"] { --accent: #18755e; --accent-soft: #dff3e6; --accent-glow: #a7ddba; }
    .card[data-category="apoyos"] { --accent: #315e9b; --accent-soft: #e0eaff; --accent-glow: #b7ceff; }
    .card[data-category="formacion"] { --accent: #965b13; --accent-soft: #fff0cf; --accent-glow: #f4d28d; }
    .card[data-category="experiencias"] { --accent: #944b78; --accent-soft: #f8e1ef; --accent-glow: #eab8d4; }
    @keyframes card-arrive {
      from { opacity: 0; transform: translateY(8px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .card:hover {
      transform: translateY(-5px);
      border-color: color-mix(in srgb, var(--accent) 40%, white);
      box-shadow: 0 18px 40px color-mix(in srgb, var(--accent) 15%, transparent);
    }
    .card[hidden] { display: none; }
    .card-banner {
      display: flex;
      align-items: center;
      justify-content: space-between;
      min-height: 86px;
      margin: 0 -21px 17px;
      padding: 15px 21px;
      background:
        radial-gradient(circle at 93% 18%, rgb(255 255 255 / 72%) 0 5px, transparent 6px),
        radial-gradient(circle at 89% 37%, var(--accent-glow) 0 18px, transparent 19px),
        radial-gradient(circle at 97% 95%, rgb(255 255 255 / 48%) 0 26px, transparent 27px),
        linear-gradient(115deg, var(--accent-soft), color-mix(in srgb, var(--accent-glow) 65%, white));
      background-size: auto;
      position: relative;
      isolation: isolate;
    }
    .card-top {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 10px;
    }
    .card-icon {
      display: grid;
      width: 52px;
      height: 52px;
      place-items: center;
      border: 1px solid rgb(255 255 255 / 85%);
      border-radius: 17px 13px 17px 13px;
      background: linear-gradient(145deg, #fff, rgb(255 255 255 / 76%));
      color: var(--accent);
      font-size: 22px;
      box-shadow: 0 7px 16px color-mix(in srgb, var(--accent) 14%, transparent);
      transform: rotate(-4deg);
    }
    .card-category {
      color: var(--accent);
      font-size: 12px;
      font-weight: 750;
      letter-spacing: .06em;
      text-align: right;
      text-transform: uppercase;
    }
    .card h3 {
      margin: 1px 0 9px;
      font-size: 22px;
      letter-spacing: -.02em;
      line-height: 1.25;
    }
    .card p {
      flex: 1;
      margin: 0;
      color: #5b7071;
      font-size: 14px;
    }
    .tags {
      display: flex;
      flex-wrap: wrap;
      gap: 6px;
      margin: 18px 0;
    }
    .tag {
      padding: 4px 9px;
      border-radius: 999px;
      background: color-mix(in srgb, var(--accent-soft) 72%, white);
      color: var(--accent);
      font-size: 11px;
      font-weight: 650;
    }
    .card-actions {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 10px;
      padding-top: 14px;
      border-top: 1px solid #edf1ef;
    }
    .view-button {
      padding: 8px 13px;
      border: 0;
      border-radius: 9px;
      background: var(--accent);
      color: #fff;
      cursor: pointer;
      font-weight: 750;
      text-align: left;
      transition: filter .16s ease, transform .16s ease;
    }
    .view-button span { display: inline-block; margin-left: 5px; transition: transform .16s ease; }
    .view-button:hover span { transform: translateX(4px); }
    .view-button:hover { filter: brightness(.9); transform: translateY(-1px); }
    .new-tab {
      color: #687e7d;
      font-size: 13px;
      font-weight: 600;
      text-decoration: none;
    }
    .new-tab:hover { color: var(--teal-dark); text-decoration: underline; }
    .empty {
      grid-column: 1 / -1;
      padding: 36px 20px;
      border: 1px dashed #b8cdc5;
      border-radius: 14px;
      color: var(--muted);
      text-align: center;
    }

    .viewer {
      margin-top: 45px;
      overflow: hidden;
      border: 1px solid #cbdcd5;
      border-radius: 17px;
      background: #fff;
      box-shadow: var(--shadow);
      scroll-margin-top: 20px;
    }
    .viewer[hidden] { display: none; }
    .viewer-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      padding: 14px 18px;
      border-bottom: 1px solid var(--line);
      background: #fbfdfc;
    }
    .viewer-heading { min-width: 0; }
    .viewer-heading span {
      display: block;
      color: var(--muted);
      font-size: 11px;
      font-weight: 750;
      letter-spacing: .09em;
      text-transform: uppercase;
    }
    .viewer-heading h2 {
      overflow: hidden;
      margin: 2px 0 0;
      font-size: 18px;
      text-overflow: ellipsis;
      white-space: nowrap;
    }
    .viewer-actions { display: flex; flex: 0 0 auto; gap: 8px; }
    .viewer-actions a, .viewer-actions button {
      padding: 7px 11px;
      border: 1px solid #c5d6d0;
      border-radius: 8px;
      background: #fff;
      color: var(--teal-dark);
      cursor: pointer;
      font-size: 13px;
      font-weight: 700;
      text-decoration: none;
    }
    .viewer iframe {
      display: block;
      width: 100%;
      height: min(80vh, 900px);
      min-height: 520px;
      border: 0;
      background: #fff;
    }
    footer {
      padding: 19px 0 30px;
      border-top: 1px solid var(--line);
      color: var(--muted);
      font-size: 13px;
    }
    footer p { margin: 4px 0; }
    .sr-only {
      position: absolute;
      width: 1px;
      height: 1px;
      overflow: hidden;
      clip: rect(0, 0, 0, 0);
      white-space: nowrap;
      clip-path: inset(50%);
    }

    @media (max-width: 850px) {
      .hero-layout { grid-template-columns: 1fr; gap: 24px; }
      .hero-shortcuts { max-width: 620px; }
      .shortcut-list { grid-template-columns: repeat(2, minmax(0, 1fr)); }
      .welcome-heading { grid-template-columns: 1fr; gap: 10px; }
      .about-intro { grid-template-columns: 1fr; }
      .cards { grid-template-columns: repeat(2, minmax(0, 1fr)); }
      .filters { grid-template-columns: 1fr; gap: 4px; }
      .reset-button { justify-self: start; margin-left: -12px; }
    }
    @media (max-width: 700px) {
      .welcome-grid { grid-template-columns: 1fr; }
      .pillar-grid, .principle-list { grid-template-columns: 1fr; }
      .pillar-card { display: grid; grid-template-columns: 32px minmax(0, 1fr); column-gap: 10px; }
      .pillar-number { grid-row: span 2; margin: 0; }
      .pillar-card h4, .pillar-card p { grid-column: 2; }
      .about-panel, .about-pillars, .principles-panel { padding: 16px; }
      .about-section-heading, .media-heading { align-items: start; flex-direction: column; }
      .media-heading p { text-align: left; }
    }
    @media (max-width: 560px) {
      .hero-inner, main, footer { width: min(100% - 32px, 1160px); }
      .hero-inner { padding: 24px 0 36px; }
      .hero-shortcuts { padding: 15px; }
      .hero h1 { margin-top: 29px; }
      main { padding-top: 29px; }
      .welcome-media { margin-bottom: 43px; padding: 18px; border-radius: 20px; }
      .welcome-grid { grid-template-columns: 1fr; }
      .welcome-card { padding: 13px; }
      .welcome-document { height: 340px; }
      .section-heading { align-items: start; flex-direction: column; gap: 4px; }
      .cards { grid-template-columns: 1fr; }
      .filters { margin-top: 20px; }
      .category-tabs { gap: 7px; margin-bottom: 18px; }
      .category-tab { padding: 7px 11px; }
      .card { padding: 19px; }
      .card-banner { margin-inline: -19px; padding-inline: 19px; }
      .viewer-header { align-items: start; flex-direction: column; }
      .viewer-actions { flex-wrap: wrap; }
      .viewer iframe { height: 72vh; min-height: 430px; }
    }
    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after { scroll-behavior: auto !important; transition: none !important; }
      .hero, .hero::before, .hero::after, .card { animation: none; }
    }

    .hero {
      background: #214b50;
      animation: none;
    }
    .hero::before, .hero::after { display: none; animation: none; }
    .hero-inner, main, footer { width: min(1000px, calc(100% - 40px)); }
    .hero-inner { padding: 18px 0 34px; }
    .hero-top {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 22px;
      padding-bottom: 18px;
      border-bottom: 1px solid rgb(255 255 255 / 18%);
    }
    .brand { display: inline-flex; align-items: center; gap: 14px; color: #fff; text-decoration: none; letter-spacing: 0; }
    .brand-logo { width: 76px; height: 76px; padding: 5px; border-radius: 17px; background: #fff; object-fit: contain; box-shadow: 0 4px 14px rgb(0 0 0 / 16%); }
    .brand-name { display: grid; gap: 3px; }
    .brand-name strong { font-size: 17px; letter-spacing: .025em; }
    .brand-name span { color: #d5e5e1; font-size: 12px; }
    .site-nav { display: flex; flex-wrap: wrap; gap: 8px 20px; }
    .site-nav a {
      min-height: 40px;
      display: inline-flex;
      align-items: center;
      color: #edf5f1;
      font-size: 14px;
      font-weight: 650;
      text-underline-offset: 4px;
    }
    .site-nav a:hover { color: #fff; text-decoration-thickness: 2px; }
    .hero-copy-block {
      display: grid;
      grid-template-columns: minmax(220px, 300px) minmax(0, 1fr);
      align-items: center;
      column-gap: clamp(28px, 7vw, 88px);
      max-width: none;
      padding: 37px 0 0;
    }
    .hero-copy-block > :not(.hero-feature-logo) { grid-column: 2; }
    .hero-feature-logo {
      grid-column: 1;
      grid-row: 1 / span 4;
      width: min(100%, 300px);
      aspect-ratio: 1;
      padding: 14px;
      border: 1px solid rgb(255 255 255 / 58%);
      border-radius: 28px;
      background: #fff;
      object-fit: contain;
      box-shadow: 0 18px 44px rgb(0 0 0 / 19%);
    }
    .hero-eyebrow {
      margin: 0 0 9px;
      color: #cce4d8;
      font-size: 13px;
      font-weight: 750;
      letter-spacing: .06em;
    }
    .hero h1 {
      max-width: 670px;
      margin: 0 0 13px;
      font-size: clamp(34px, 5vw, 52px);
      letter-spacing: -.03em;
      line-height: 1.12;
    }
    .hero-copy { max-width: 600px; font-size: 18px; }
    .hero-cta {
      display: inline-flex;
      align-items: center;
      gap: 12px;
      min-height: 48px;
      margin-top: 22px;
      padding: 10px 16px;
      border: 1px solid #fff;
      border-radius: 9px;
      background: #fff;
      color: #214b50;
      font-weight: 750;
      text-decoration: none;
    }
    .hero-cta:hover { background: #edf5f0; }
    .article-highlights {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 12px;
      margin: 0 0 40px;
    }
    .highlight-card {
      min-width: 0;
      padding: 19px;
      border: 1px solid #dbe6e2;
      border-radius: 15px;
      background: #fff;
      box-shadow: 0 6px 18px rgb(23 57 58 / 5%);
    }
    .highlight-card:nth-child(3n+2) { background: #fff8e9; border-color: #eadbb5; }
    .highlight-card:nth-child(3n+3) { background: #f0f7f4; border-color: #d6e7dd; }
    .highlight-card .highlight-topic { margin: 0 0 10px; color: #725019; font-size: 12px; font-weight: 800; letter-spacing: .055em; text-transform: uppercase; }
    .highlight-card blockquote { margin: 0; color: #2b484b; font-size: 16px; font-weight: 650; line-height: 1.55; }
    .highlight-source { display: inline-flex; min-height: 42px; align-items: center; margin-top: 12px; color: #175d62; font-size: 13px; font-weight: 750; text-underline-offset: 3px; }
    main { padding: 30px 0 48px; }
    .welcome-media {
      margin-bottom: 38px;
      padding: 23px;
      border: 1px solid #dce4df;
      border-radius: 15px;
      background: #fff;
      box-shadow: none;
    }
    .welcome-heading { grid-template-columns: minmax(0, 1fr) minmax(180px, 260px); gap: 18px; margin-bottom: 15px; }
    .welcome-heading h2 { font-size: clamp(24px, 3vw, 32px); }
    .welcome-heading p { max-width: 250px; }
    .section-kicker { letter-spacing: .06em; }
    .info-disclosure {
      margin-top: 12px;
      border-top: 1px solid #e5ebe7;
    }
    .info-disclosure > summary {
      min-height: 48px;
      padding: 12px 4px;
      color: #315e59;
      cursor: pointer;
      font-size: 15px;
      font-weight: 750;
    }
    .info-disclosure > summary:hover { color: #153e45; text-decoration: underline; text-underline-offset: 4px; }
    .about-content { gap: 12px; margin: 4px 0 18px; }
    .about-panel, .about-pillars, .principles-panel { box-shadow: none; }
    .mission-panel { background: #fbf4e9; }
    .welcome-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .media-disclosure { margin-top: 0; }
    .media-heading { margin-top: 12px; }
    .section-heading { align-items: start; margin-bottom: 10px; }
    .section-heading h2 { font-size: clamp(26px, 3vw, 34px); }
    .section-heading p { max-width: 620px; }
    .catalogue-count {
      border-color: #dce4df;
      background: #fff;
      color: #425d5c;
    }
    .filters { grid-template-columns: minmax(0, 1fr) auto; gap: 8px; margin: 17px 0 12px; }
    .field input, .field select { border-radius: 9px; box-shadow: none; }
    .category-tabs { gap: 7px; margin-bottom: 17px; }
    .category-tab {
      min-height: 42px;
      padding: 8px 13px;
      border-color: #d7e0dc;
      border-radius: 9px;
      color: #344f51;
      font-size: 14px;
    }
    .category-tab:hover { border-color: #6b9287; background: #eff5f1; }
    .category-tab[data-category="articulos"][aria-pressed="true"] { border-color: #355f68; background: #355f68; }
    .cards { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; perspective: none; }
    .card {
      padding: 0 18px 16px;
      border: 1px solid #dce4df;
      border-radius: 13px;
      box-shadow: none;
      animation: none;
    }
    .card[data-category="articulos"] { --accent: #355f68; --accent-soft: #eaf1f1; --accent-glow: #cadede; }
    .card[data-category="articulos"]:nth-of-type(3n+2) { --accent: #9a5a27; --accent-soft: #fff0dc; --accent-glow: #f2d0a2; }
    .card[data-category="articulos"]:nth-of-type(3n+3) { --accent: #66518f; --accent-soft: #f0eafb; --accent-glow: #d4c4f0; }
    .card[data-category="articulos"] > .article-excerpt { flex: none; margin: 13px -3px 0; padding: 12px; border-left: 4px solid var(--accent); border-radius: 0 9px 9px 0; background: var(--accent-soft); color: #344e51; font-size: 14px; font-weight: 650; line-height: 1.5; }
    .card:hover { transform: none; border-color: #7f9e93; box-shadow: 0 4px 14px rgb(23 57 58 / 7%); }
    .card-banner { min-height: 64px; margin: 0 -18px 14px; padding: 10px 18px; }
    .card-icon { width: 40px; height: 40px; border-radius: 10px; font-size: 17px; box-shadow: none; transform: none; }
    .card-category { font-size: 11px; letter-spacing: .03em; }
    .card h3 { margin: 0 0 8px; font-size: 20px; }
    .card p { font-size: 15px; }
    .tags { gap: 5px; margin: 13px 0; }
    .tag { border-radius: 6px; font-size: 12px; }
    .card-actions { padding-top: 10px; }
    .view-button { min-height: 42px; padding: 9px 12px; border-radius: 8px; font-size: 14px; text-decoration: none; }
    .new-tab { font-size: 12px; }
    .viewer { margin-top: 28px; }
    footer { border-color: #dce4df; }
    @media (max-width: 700px) {
      .hero-inner, main, footer { width: min(100% - 32px, 1000px); }
      .hero-top { align-items: start; flex-direction: column; gap: 9px; }
      .brand-logo { width: 64px; height: 64px; border-radius: 14px; }
      .article-highlights { grid-template-columns: 1fr; gap: 9px; margin-bottom: 32px; }
      .highlight-card { padding: 16px; }
      .hero-copy-block { display: block; padding-top: 26px; }
      .hero-feature-logo { display: none; }
      .site-nav { gap: 4px 18px; }
      .welcome-heading { grid-template-columns: 1fr; }
      .welcome-heading p { max-width: none; }
      .welcome-grid { grid-template-columns: 1fr; }
      .filters { grid-template-columns: 1fr; }
      .reset-button { margin-left: 0; }
      .cards { grid-template-columns: 1fr; }
    }
    @media (max-width: 430px) {
      .welcome-media { padding: 17px; }
      .hero h1 { font-size: 36px; }
      .category-tabs { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); }
      .category-tab { text-align: left; }
      .card-actions { align-items: start; flex-direction: column; }
      .new-tab { padding-bottom: 3px; }
    }
    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after { animation: none !important; scroll-behavior: auto !important; transition: none !important; }
    }
    @media print {
      .site-nav, .hero-cta, .filters, .category-tabs, .card-actions, .welcome-video { display: none !important; }
      .info-disclosure:not([open]) > :not(summary), .media-disclosure:not([open]) > :not(summary) { display: block; }
      .cards { display: block; }
      .card, .about-panel, .pillar-card { margin: 10px 0; break-inside: avoid; }
    }
  </style>
</head>
<body>
  <header class="hero">
    <div class="hero-inner">
      <div class="hero-top">
        <a class="brand" href="#inicio" aria-label="FAND, Alianza para la Neurodivergencia — inicio">
          <img class="brand-logo" src="Logo%20FAND%20en%20turquesa%20con%20emblema%20multicolor%20(1).png" alt="Logotipo de FAND: Alianza para la Neurodivergencia">
          <span class="brand-name"><strong>FAND</strong><span>Alianza para la Neurodivergencia</span></span>
        </a>
        <nav class="site-nav" aria-label="Navegación principal">
          <a href="#sobre">Quiénes somos</a>
          <a href="#catalogue-title">Artículos y recursos</a>
          <a href="FAND_Juegos_Interactivos.html">Juegos interactivos</a>
        </nav>
      </div>
      <div class="hero-copy-block" id="inicio">
        <p class="hero-eyebrow">Información y recursos</p>
        <h1>Encuentra lo que necesitas, a tu ritmo.</h1>
        <p class="hero-copy">Artículos, herramientas y apoyos sobre neurodivergencia, derechos y vida cotidiana.</p>
        <a class="hero-cta" href="#catalogue-title">Ver artículos y recursos <span aria-hidden="true">↓</span></a>
        <img class="hero-feature-logo" src="Logo%20FAND%20en%20turquesa%20con%20emblema%20multicolor%20(1).png" alt="" aria-hidden="true">
      </div>
    </div>
  </header>

  <main>
    <section class="welcome-media" id="sobre" aria-labelledby="welcome-title">
      <div class="welcome-heading">
        <div>
          <span class="section-kicker">Quiénes somos</span>
          <h2 id="welcome-title">FAND promueve apoyo, derechos e inclusión.</h2>
        </div>
        <p>Conoce la propuesta de la asociación si quieres saber más.</p>
      </div>

      <details class="info-disclosure">
        <summary>Qué es FAND y cómo quiere trabajar</summary>
      <div class="about-content">
        <div class="about-intro">
          <article class="about-panel">
            <h3>¿Qué es FAND?</h3>
            <p>FAND —Alianza para la Neurodivergencia— es un proyecto de asociación sin ánimo de lucro que busca defender los derechos de las personas neurodivergentes y favorecer su inclusión social. Propone hacerlo mediante la concienciación, la colaboración, el conocimiento compartido y el apoyo entre personas. Está pensado especialmente para las personas neurodivergentes y sus familias, y permanece abierto a profesionales, entidades y personas interesadas.</p>
          </article>
          <article class="about-panel mission-panel">
            <div>
              <h3>Lo que queremos hacer posible</h3>
              <p>Que cada persona pueda participar en la sociedad con reconocimiento, autonomía y los apoyos que necesita.</p>
            </div>
            <p class="mission-quote">La diversidad también necesita entornos que sepan acogerla.</p>
          </article>
        </div>

        <article class="about-panel">
          <h3>Una propuesta abierta a todos los perfiles</h3>
          <p class="audience-intro">La neurodivergencia no es una categoría clínica única ni una lista cerrada. FAND quiere tener en cuenta distintos perfiles, sus combinaciones, diferentes necesidades de apoyo y todas las etapas de la vida.</p>
          <ul class="profile-list" aria-label="Perfiles contemplados en el proyecto">
            <li>Autismo</li>
            <li>TDAH</li>
            <li>Dislexia</li>
            <li>Disgrafía y disortografía</li>
            <li>Discalculia</li>
            <li>Lenguaje y comunicación</li>
            <li>Tourette y tics</li>
            <li>Discapacidad intelectual</li>
            <li>Altas capacidades</li>
            <li>Doble o múltiple excepcionalidad</li>
            <li>Procesamiento sensorial</li>
            <li>Otros perfiles del neurodesarrollo</li>
          </ul>
          <p class="about-aside">La lista es orientativa, no sirve para diagnosticar y no pretende excluir a quienes tengan perfiles menos conocidos o combinados.</p>
        </article>

        <section class="about-pillars" aria-labelledby="pillars-title">
          <div class="about-section-heading">
            <h3 id="pillars-title">Tres pilares para construir comunidad</h3>
            <p>Las líneas de trabajo que plantea el proyecto se refuerzan entre sí.</p>
          </div>
          <div class="pillar-grid">
            <article class="pillar-card">
              <span class="pillar-number" aria-hidden="true">01</span>
              <h4>Conocimiento compartido, recursos e investigación</h4>
              <p>Reunir y difundir información y herramientas útiles; colaborar en su contraste, mejora y estudio, reconociendo sus límites.</p>
            </article>
            <article class="pillar-card">
              <span class="pillar-number" aria-hidden="true">02</span>
              <h4>Colaboración, concienciación y defensa de derechos</h4>
              <p>Conectar a personas, familias, entidades y profesionales para combatir estigmas, impulsar la inclusión y acercar los apoyos.</p>
            </article>
            <article class="pillar-card">
              <span class="pillar-number" aria-hidden="true">03</span>
              <h4>Comunidad neurodivergente y apoyo entre iguales</h4>
              <p>Crear espacios para compartir experiencias y encontrar comprensión, orientación y acompañamiento entre personas y familias.</p>
            </article>
          </div>
        </section>

        <section class="principles-panel" aria-labelledby="principles-title">
          <h3 id="principles-title">Principios que atraviesan el proyecto</h3>
          <ul class="principle-list">
            <li>Participación y diversidad</li>
            <li>Accesibilidad y respeto</li>
            <li>Rigor y mejora continua</li>
            <li>Transparencia y orientación de los fondos</li>
            <li>Privacidad, autonomía y protección</li>
            <li>Complementariedad y colaboración</li>
          </ul>
        </section>

        <p class="project-status"><strong>Estado de la información:</strong> este resumen adapta el borrador conceptual del proyecto (versión 2.0, 4 de octubre de 2026). Describe objetivos y líneas propuestas; no es una confirmación de servicios activos ni sustituye la información oficial de la asociación.</p>
      </div>

      </details>

      <details class="info-disclosure media-disclosure">
        <summary>Ver vídeo o consultar la presentación</summary>
      <div class="media-heading">
        <h3>Conoce también el proyecto en otros formatos</h3>
        <p>El vídeo incluye movimiento y sonido. No se reproduce automáticamente.</p>
      </div>
      <div class="welcome-grid">
        <article class="welcome-card" aria-labelledby="video-title">
          <div class="welcome-card-header">
            <div>
              <h3 id="video-title">Animación de presentación</h3>
              <p>Vídeo con movimiento y audio · 1 min 49 s</p>
            </div>
            <span class="media-label">VÍDEO</span>
          </div>
          <video class="welcome-video" controls playsinline preload="metadata" poster="recursos/fand-video-poster.svg" aria-label="Animación de presentación de FAND, con sonido">
            <source src="recursos/fand_video_mejorado.mp4" type="video/mp4">
            Tu navegador no puede reproducir este vídeo.
            <a href="recursos/fand_video_mejorado.mp4">Abrir la animación de presentación de FAND</a>.
          </video>
          <p class="media-note">Incluye movimiento y audio, pero no se inicia por sí solo. Si prefieres un formato estático, consulta el documento PDF del proyecto.</p>
        </article>

        <article class="welcome-card" aria-labelledby="document-title">
          <div class="welcome-card-header">
            <div>
              <h3 id="document-title">Documento del proyecto</h3>
              <p>Presentación completa · PDF</p>
            </div>
            <span class="media-label">DOCUMENTO</span>
          </div>
          <iframe class="welcome-document" src="recursos/FAND_Proyecto_Inicial_Actualizado.pdf#view=FitH" title="Vista previa del documento FAND Proyecto Inicial Actualizado" loading="lazy"></iframe>
          <div class="media-actions">
            <a class="media-link" href="recursos/FAND_Proyecto_Inicial_Actualizado.pdf" target="_blank" rel="noopener">Abrir presentación ↗</a>
            <a class="media-link" href="recursos/FAND_Proyecto_Inicial_Actualizado.pdf" download>Descargar PDF ↓</a>
          </div>
        </article>
      </div>
      </details>
    </section>

    <section class="article-highlights" aria-label="Ideas destacadas de los artículos">
      <article class="highlight-card">
        <p class="highlight-topic">Lo que indican las cifras</p>
        <blockquote>«Los registros diagnósticos no equivalen a la prevalencia real.»</blockquote>
        <a class="highlight-source" href="articulos/poblacion-neurodivergente.html">Leer sobre población y datos <span aria-hidden="true">→</span></a>
      </article>
      <article class="highlight-card">
        <p class="highlight-topic">Comunidad y redes</p>
        <blockquote>«Las redes pueden acercar comunidad y apoyo; la calidad de la información también importa.»</blockquote>
        <a class="highlight-source" href="articulos/neurodivergencia-redes-sociales.html">Leer sobre redes sociales <span aria-hidden="true">→</span></a>
      </article>
      <article class="highlight-card">
        <p class="highlight-topic">Trabajo e inclusión</p>
        <blockquote>«La igualdad de oportunidades no debe depender de demostrar un rendimiento extraordinario.»</blockquote>
        <a class="highlight-source" href="FAND_Neurodivergencia_Inclusion_Laboral_2026.html">Leer sobre inclusión laboral <span aria-hidden="true">→</span></a>
      </article>
    </section>

    <section id="articulos" aria-labelledby="catalogue-title">
      <div class="section-heading">
        <div>
          <span class="section-kicker">Empieza por aquí</span>
          <h2 id="catalogue-title">Artículos y recursos</h2>
          <p>Elige una opción o usa la búsqueda. No hace falta seguir un orden.</p>
        </div>
        <span id="count" class="catalogue-count" role="status" aria-live="polite"></span>
      </div>

      <div class="filters" aria-label="Buscar y filtrar recursos">
        <div class="field">
          <label for="search">Buscar en todos los recursos</label>
          <div class="search-field">
            <span class="search-mark" aria-hidden="true">⌕</span>
            <input id="search" type="search" placeholder="Prueba «autismo», «formación» o «apoyos»…" autocomplete="off">
          </div>
        </div>
        <button class="reset-button" id="reset" type="button" hidden>Quitar filtros</button>
      </div>

      <nav class="category-tabs" aria-label="Filtrar recursos por tema">
        <button class="category-tab" type="button" data-category="" aria-pressed="true">Todo</button>
        <button class="category-tab" type="button" data-category="articulos" aria-pressed="false">Artículos</button>
        <button class="category-tab" type="button" data-category="guia" aria-pressed="false">Guías y consulta</button>
        <button class="category-tab" type="button" data-category="apoyos" aria-pressed="false">Apoyos y recursos</button>
        <button class="category-tab" type="button" data-category="formacion" aria-pressed="false">Formación</button>
        <button class="category-tab" type="button" data-category="experiencias" aria-pressed="false">Experiencias</button>
      </nav>

      <div class="cards" id="cards" aria-label="Páginas disponibles">
        <article class="card" data-category="articulos" data-search="artículo investigación divulgación cuántas personas somos prevalencia población españa europa internacional infradiagnóstico coexistencia perfiles datos evidencia">
          <div class="card-banner"><span class="card-icon" aria-hidden="true">01</span><span class="card-category">Artículo · Investigación</span></div>
          <h3>¿Cuántas personas neurodivergentes somos?</h3>
          <p>Qué cifras existen en España y otros países, cómo interpretarlas y qué grupos siguen poco representados.</p>
          <div class="tags"><span class="tag">Población</span><span class="tag">Datos</span><span class="tag">Vacíos de investigación</span></div>
          <div class="card-actions">
            <a class="view-button" href="articulos/poblacion-neurodivergente.html">Leer artículo <span aria-hidden="true">→</span></a>
            <span class="new-tab">Actualizado 2026</span>
          </div>
        </article>

        <article class="card" data-category="articulos" data-search="artículo investigación divulgación redes sociales tiktok instagram comunidad amistad identidad accesibilidad información desinformación bienestar ciberacoso">
          <div class="card-banner"><span class="card-icon" aria-hidden="true">02</span><span class="card-category">Artículo · Investigación</span></div>
          <h3>Neurodivergencia y redes sociales</h3>
          <p>Beneficios, riesgos, accesibilidad y calidad de la información para personas neurodivergentes.</p>
          <div class="tags"><span class="tag">Redes sociales</span><span class="tag">Comunidad</span><span class="tag">Bienestar</span></div>
          <p class="article-excerpt">Las redes pueden ofrecer comunidad y apoyo; la evidencia también pide atender a la desinformación, la accesibilidad y los riesgos.</p>
          <div class="card-actions">
            <a class="view-button" href="articulos/neurodivergencia-redes-sociales.html">Leer artículo <span aria-hidden="true">→</span></a>
            <span class="new-tab">Actualizado 2026</span>
          </div>
        </article>

        <article class="card" data-category="articulos" data-search="artículo investigación divulgación neurodivergencia inclusión laboral empleo trabajo barreras contratación flexibilidad seguridad psicológica productividad derechos">
          <div class="card-banner"><span class="card-icon" aria-hidden="true">03</span><span class="card-category">Artículo · Trabajo e inclusión</span></div>
          <h3>Neurodivergencia e inclusión laboral</h3>
          <p>Barreras en el empleo y condiciones que pueden favorecer la inclusión, el bienestar y la permanencia.</p>
          <div class="tags"><span class="tag">Empleo</span><span class="tag">Accesibilidad</span><span class="tag">Derechos</span></div>
          <p class="article-excerpt">«La igualdad de oportunidades no debe depender de demostrar una ventaja económica o un rendimiento extraordinario.»</p>
          <div class="card-actions">
            <a class="view-button" href="FAND_Neurodivergencia_Inclusion_Laboral_2026.html">Leer artículo <span aria-hidden="true">→</span></a>
            <span class="new-tab">Actualizado 2026</span>
          </div>
        </article>

        <article class="card" data-category="guia" data-search="diccionario conceptos palabras vocabulario neurodivergencia autismo tdah derechos aprendizaje comunicación">
          <div class="card-banner"><span class="card-icon" aria-hidden="true">Aa</span><span class="card-category">Guías y consulta</span></div>
          <h3>Diccionario de neurodivergencia</h3>
          <p>Consulta conceptos, experiencias, comunicación, aprendizaje, apoyos y derechos con filtros por tema y perfil.</p>
          <div class="tags"><span class="tag">Conceptos</span><span class="tag">Filtros</span><span class="tag">Fuentes</span></div>
          <div class="card-actions">
            <button class="view-button" type="button" data-title="Diccionario de neurodivergencia" data-src="FAND_Diccionario_Neurodivergencia.html">Consultar aquí <span aria-hidden="true">→</span></button>
            <a class="new-tab" href="FAND_Diccionario_Neurodivergencia.html" target="_blank" rel="noopener">Abrir página ↗</a>
          </div>
        </article>

        <article class="card" data-category="guia" data-search="historia cronología neurodivergencia derechos apoyos hitos ciencia leyes perfiles">
          <div class="card-banner"><span class="card-icon" aria-hidden="true">◷</span><span class="card-category">Guías y consulta</span></div>
          <h3>Historia y cronología</h3>
          <p>Recorre hitos históricos, científicos y jurídicos relacionados con la neurodivergencia, sus derechos y apoyos.</p>
          <div class="tags"><span class="tag">Cronología</span><span class="tag">Historia</span><span class="tag">Derechos</span></div>
          <div class="card-actions">
            <button class="view-button" type="button" data-title="Historia y cronología" data-src="FAND_Historia_Neurodivergencia_Orden_Cronologico.html">Consultar aquí <span aria-hidden="true">→</span></button>
            <a class="new-tab" href="FAND_Historia_Neurodivergencia_Orden_Cronologico.html" target="_blank" rel="noopener">Abrir página ↗</a>
          </div>
        </article>

        <article class="card" data-category="apoyos" data-search="directorio comunidad asociaciones profesionales centros apoyos terapia diagnóstico inclusión recursos">
          <div class="card-banner"><span class="card-icon" aria-hidden="true">⌖</span><span class="card-category">Apoyos y recursos</span></div>
          <h3>Directorio de recursos</h3>
          <p>Busca asociaciones, centros, profesionales y otros apoyos por territorio, etapa de vida y tipo de necesidad.</p>
          <div class="tags"><span class="tag">Comunidad</span><span class="tag">Servicios</span><span class="tag">Territorio</span></div>
          <div class="card-actions">
            <button class="view-button" type="button" data-title="Directorio de recursos" data-src="FAND_Directorio.html">Consultar aquí <span aria-hidden="true">→</span></button>
            <a class="new-tab" href="FAND_Directorio.html" target="_blank" rel="noopener">Abrir página ↗</a>
          </div>
        </article>

        <article class="card" data-category="apoyos" data-search="herramientas digitales aplicaciones recursos organización bienestar aprendizaje comunicación derechos">
          <div class="card-banner"><span class="card-icon" aria-hidden="true">⌘</span><span class="card-category">Apoyos y recursos</span></div>
          <h3>Herramientas digitales</h3>
          <p>Explora aplicaciones y recursos digitales para la organización, el aprendizaje, la comunicación y el bienestar.</p>
          <div class="tags"><span class="tag">Aplicaciones</span><span class="tag">Recursos</span><span class="tag">Digital</span></div>
          <div class="card-actions">
            <button class="view-button" type="button" data-title="Herramientas digitales" data-src="FAND_Herramientas_Digitales.html">Consultar aquí <span aria-hidden="true">→</span></button>
            <a class="new-tab" href="FAND_Herramientas_Digitales.html" target="_blank" rel="noopener">Abrir página ↗</a>
          </div>
        </article>

        <article class="card" data-category="apoyos" data-search="juegos interactivos práctica atención memoria lectoescritura dislexia conciencia fonológica cantidades planificación funciones ejecutivas directorio pruebas neurodivergencia">
          <div class="card-banner"><span class="card-icon" aria-hidden="true">▶</span><span class="card-category">Apoyos y recursos</span></div>
          <h3>Juegos interactivos</h3>
          <p>Practica con minijuegos de atención, memoria, lectura y planificación. Incluye un directorio orientativo de las herramientas citadas en el documento FAND.</p>
          <div class="tags"><span class="tag">Juegos de práctica</span><span class="tag">Desde un texto</span><span class="tag">No diagnósticos</span></div>
          <div class="card-actions">
            <button class="view-button" type="button" data-title="Juegos interactivos" data-src="FAND_Juegos_Interactivos.html">Jugar aquí <span aria-hidden="true">→</span></button>
            <a class="new-tab" href="FAND_Juegos_Interactivos.html" target="_blank" rel="noopener">Abrir página ↗</a>
          </div>
        </article>

        <article class="card" data-category="formacion" data-search="formaciones oficiales estudios máster universidades idiomas becas reconocimiento europa">
          <div class="card-banner"><span class="card-icon" aria-hidden="true">▤</span><span class="card-category">Formación</span></div>
          <h3>Formaciones oficiales</h3>
          <p>Compara estudios y titulaciones oficiales relacionados con el neurodesarrollo, y consulta sus condiciones.</p>
          <div class="tags"><span class="tag">Estudios</span><span class="tag">Universidades</span><span class="tag">Europa</span></div>
          <div class="card-actions">
            <button class="view-button" type="button" data-title="Formaciones oficiales" data-src="FAND_Formaciones_Oficiales.html">Consultar aquí <span aria-hidden="true">→</span></button>
            <a class="new-tab" href="FAND_Formaciones_Oficiales.html" target="_blank" rel="noopener">Abrir página ↗</a>
          </div>
        </article>

        <article class="card" data-category="experiencias" data-search="cuestionarios experiencias apoyos edades perfiles autismo tdah aprendizaje necesidades reflexión">
          <div class="card-banner"><span class="card-icon" aria-hidden="true">☷</span><span class="card-category">Experiencias y cuestionarios</span></div>
          <h3>Experiencias y necesidades de apoyo</h3>
          <p>Explora cuestionarios por etapa de edad y módulos de experiencias. No son herramientas diagnósticas.</p>
          <div class="tags"><span class="tag">Por edades</span><span class="tag">Experiencias</span><span class="tag">Privado en tu dispositivo</span></div>
          <div class="card-actions">
            <button class="view-button" type="button" data-title="Experiencias y necesidades de apoyo" data-src="FAND_Cuestionarios_Edades_Perfiles.html">Consultar aquí <span aria-hidden="true">→</span></button>
            <a class="new-tab" href="FAND_Cuestionarios_Edades_Perfiles.html" target="_blank" rel="noopener">Abrir página ↗</a>
          </div>
        </article>
      </div>
      <p id="empty" class="empty" hidden>No hay páginas que coincidan con la búsqueda. Prueba con otras palabras o limpia los filtros.</p>
    </section>

    <section id="viewer" class="viewer" aria-labelledby="viewer-title" hidden>
      <div class="viewer-header">
        <div class="viewer-heading">
          <span>Recurso seleccionado</span>
          <h2 id="viewer-title"></h2>
        </div>
        <div class="viewer-actions">
          <a id="open-page" href="#" target="_blank" rel="noopener">Abrir en otra pestaña ↗</a>
          <button id="close-viewer" type="button">Cerrar vista</button>
        </div>
      </div>
      <iframe id="page-frame" title="Página consultada" loading="lazy"></iframe>
    </section>
  </main>

  <footer>
    <p><strong>FAND · Alianza para la Neurodivergencia</strong></p>
    <p>Este centro reúne páginas informativas independientes. Consulta en cada recurso sus fuentes, alcance y avisos.</p>
  </footer>

  <script>
    (() => {
      const search = document.querySelector("#search");
      const cards = [...document.querySelectorAll(".card")];
      const categoryTabs = [...document.querySelectorAll(".category-tab")];
      const shortcuts = [...document.querySelectorAll(".shortcut")];
      const resetButton = document.querySelector("#reset");
      const count = document.querySelector("#count");
      const empty = document.querySelector("#empty");
      const viewer = document.querySelector("#viewer");
      const viewerTitle = document.querySelector("#viewer-title");
      const frame = document.querySelector("#page-frame");
      const openPage = document.querySelector("#open-page");
      let selectedCategory = "";

      function filterCards() {
        const query = search.value.trim().toLocaleLowerCase("es");
        let visible = 0;

        for (const card of cards) {
          const matchesQuery = `${card.textContent} ${card.dataset.search}`
            .toLocaleLowerCase("es")
            .includes(query);
          const matchesCategory = !selectedCategory || card.dataset.category === selectedCategory;
          const isVisible = matchesQuery && matchesCategory;
          card.hidden = !isVisible;
          if (isVisible) visible += 1;
        }

        count.textContent = `${visible} de ${cards.length} ${cards.length === 1 ? "página" : "páginas"}`;
        empty.hidden = visible !== 0;
        resetButton.hidden = !query && !selectedCategory;
      }

      search.addEventListener("input", filterCards);
      categoryTabs.forEach((tab) => {
        tab.addEventListener("click", () => {
          selectedCategory = tab.dataset.category;
          categoryTabs.forEach((item) => item.setAttribute("aria-pressed", String(item === tab)));
          filterCards();
        });
      });
      shortcuts.forEach((shortcut) => {
        shortcut.addEventListener("click", () => {
          const tab = categoryTabs.find((item) => item.dataset.category === shortcut.dataset.category);
          tab.click();
          document.querySelector("#catalogue-title").scrollIntoView({ behavior: "smooth", block: "start" });
        });
      });
      resetButton.addEventListener("click", () => {
        search.value = "";
        selectedCategory = "";
        categoryTabs.forEach((item) => item.setAttribute("aria-pressed", String(!item.dataset.category)));
        filterCards();
        search.focus();
      });

      document.querySelector("#cards").addEventListener("click", (event) => {
        const button = event.target.closest("button.view-button");
        if (!button) return;

        const source = button.dataset.src;
        viewerTitle.textContent = button.dataset.title;
        frame.title = `Página: ${button.dataset.title}`;
        openPage.href = source;
        viewer.hidden = false;
        if (frame.getAttribute("src") !== source) frame.src = source;
        viewer.scrollIntoView({ behavior: "smooth", block: "start" });
      });

      document.querySelector("#close-viewer").addEventListener("click", () => {
        viewer.hidden = true;
        frame.removeAttribute("src");
        document.querySelector("#catalogue-title").focus({ preventScroll: true });
      });

      document.querySelector("#catalogue-title").setAttribute("tabindex", "-1");
      filterCards();
    })();
  </script>
</body>
</html>
