<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#214b50">
  <meta name="description" content="Juegos originales de práctica y directorio orientativo de herramientas citadas en el documento FAND. No son pruebas diagnósticas.">
  <title>FAND · Juegos interactivos</title>
  <style>
    :root {
      --ink: #18383d;
      --muted: #607578;
      --teal: #126d72;
      --teal-dark: #0f5158;
      --paper: #f8f7f3;
      --line: #dce7e2;
      --white: #fff;
      --mint: #e4f1e9;
      --gold: #fff5de;
      --danger: #963f38;
      font-family: system-ui, -apple-system, "Segoe UI", sans-serif;
    }
    * { box-sizing: border-box; }
    html { scroll-behavior: smooth; }
    body { margin: 0; background: var(--paper); color: var(--ink); font-size: 16px; line-height: 1.6; }
    button, input, textarea, select { font: inherit; }
    button { cursor: pointer; }
    a { color: inherit; }
    :focus-visible { outline: 3px solid #b77937; outline-offset: 3px; }
    .masthead { background: #214b50; color: white; }
    .masthead-inner, main, footer { width: min(1000px, calc(100% - 40px)); margin-inline: auto; }
    .masthead-inner { padding: 16px 0 30px; }
    .topline { display: flex; justify-content: space-between; align-items: center; gap: 20px; padding-bottom: 15px; border-bottom: 1px solid rgb(255 255 255 / 20%); }
    .brand { display: flex; align-items: center; gap: 12px; color: white; text-decoration: none; font-weight: 750; }
    .brand img { width: 54px; height: 54px; padding: 4px; border-radius: 12px; background: white; object-fit: contain; }
    .topline nav { display: flex; flex-wrap: wrap; gap: 14px; }
    .topline nav a { color: #edf5f1; font-size: 14px; text-underline-offset: 4px; }
    .eyebrow { margin: 24px 0 6px; color: #cce4d8; font-size: 13px; font-weight: 750; letter-spacing: .06em; }
    h1 { margin: 0; font-size: clamp(32px, 5vw, 49px); line-height: 1.12; letter-spacing: -.035em; }
    .masthead p:last-child { max-width: 730px; margin: 13px 0 0; color: #d5e5e1; font-size: 17px; }
    main { padding: 30px 0 55px; }
    .notice { margin-bottom: 26px; padding: 16px 18px; border: 1px solid #ead7a9; border-radius: 13px; background: var(--gold); color: #68552c; }
    .notice strong { color: #463a20; }
    .section { margin: 38px 0 0; scroll-margin-top: 18px; }
    .section-heading { margin-bottom: 19px; }
    .section-heading h2 { margin: 0; font-size: clamp(25px, 3.5vw, 34px); letter-spacing: -.025em; line-height: 1.2; }
    .section-heading p { max-width: 750px; margin: 8px 0 0; color: var(--muted); }
    .text-maker, .directory-tools, .game-card, .activity, .directory-card {
      border: 1px solid var(--line); border-radius: 17px; background: var(--white);
      box-shadow: 0 8px 24px rgb(23 57 58 / 5%);
    }
    .text-maker { display: grid; grid-template-columns: minmax(0, 1fr) minmax(250px, .75fr); gap: 20px; padding: 20px; }
    .text-maker h3 { margin: 0 0 7px; }
    .text-maker p, .game-card p, .directory-card p { margin: 7px 0 0; color: var(--muted); }
    textarea { display: block; width: 100%; min-height: 190px; resize: vertical; padding: 13px; border: 2px solid var(--line); border-radius: 11px; color: var(--ink); line-height: 1.7; }
    .word-count { display: flex; justify-content: space-between; gap: 8px; margin-top: 6px; color: var(--muted); font-size: 13px; }
    .type-list { display: grid; gap: 9px; margin: 12px 0 16px; }
    .type-option { display: flex; gap: 10px; align-items: flex-start; padding: 10px; border: 1px solid var(--line); border-radius: 10px; }
    .type-option input { width: 19px; height: 19px; margin: 4px 0 0; accent-color: var(--teal); }
    .type-option strong, .type-option small { display: block; }
    .type-option small { color: var(--muted); }
    .primary, .secondary, .token, .choice { min-height: 44px; border: 0; border-radius: 10px; font-weight: 700; }
    .primary { width: 100%; padding: 10px 15px; background: var(--teal); color: white; }
    .primary:hover { background: var(--teal-dark); }
    .secondary { padding: 9px 13px; background: var(--mint); color: var(--teal-dark); }
    .secondary:hover { background: #d5e9dc; }
    .error { min-height: 24px; color: var(--danger); font-size: 14px; }
    .game-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 13px; }
    .game-card { display: flex; flex-direction: column; align-items: flex-start; padding: 17px; }
    .game-icon { display: grid; width: 44px; height: 44px; margin-bottom: 10px; place-items: center; border-radius: 13px; background: var(--mint); font-size: 22px; }
    .game-card h3 { margin: 0; font-size: 17px; line-height: 1.35; }
    .game-card .skills { margin-top: 4px; color: var(--teal-dark); font-size: 13px; font-weight: 700; }
    .game-card .description { margin-bottom: 16px; font-size: 14px; }
    .game-card .secondary { margin-top: auto; }
    #generated-games { display: grid; gap: 14px; margin-top: 17px; }
    .activity { margin-top: 18px; padding: 20px; border-color: #b9d4c2; border-width: 2px; scroll-margin-top: 12px; }
    .activity-top { display: flex; justify-content: space-between; align-items: flex-start; gap: 15px; }
    .activity h3 { margin: 0; }
    .activity p { margin: 7px 0; color: var(--muted); }
    .status { min-height: 28px; margin-top: 12px !important; color: var(--teal-dark) !important; font-weight: 700; }
    .stimulus { margin: 18px 0; padding: 19px; border-radius: 14px; background: #f2f6f1; text-align: center; font-size: 25px; font-weight: 800; }
    .bubble-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(55px, 1fr)); gap: 11px; }
    .bubble { width: 55px; height: 55px; justify-self: center; border: 3px solid rgb(0 0 0 / 12%); border-radius: 50%; background: #76b999; color: #153d2c; font-size: 22px; box-shadow: inset -5px -6px 0 rgb(0 0 0 / 8%); }
    .bubble.distractor { background: #f2c96d; color: #4e3a0c; }
    .bubble.popped { visibility: hidden; }
    .letter-grid, .word-grid, .item-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(85px, 1fr)); gap: 9px; }
    .choice { padding: 9px; border: 1px solid #cbd9cf; background: white; color: var(--ink); }
    .choice:hover, .choice.selected { background: var(--mint); border-color: #8fb8a2; }
    .choice:disabled { cursor: default; }
    .color-pad { display: grid; grid-template-columns: repeat(2, minmax(110px, 170px)); justify-content: center; gap: 12px; margin: 15px 0; }
    .color-pad button { min-height: 66px; border: 3px solid rgb(0 0 0 / 12%); border-radius: 14px; color: #162b23; font-weight: 800; }
    .color-pad button.lit { outline: 4px solid #f3df9b; }
    .spatial-span-grid { display: grid; width: min(100%, 430px); grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 10px; margin: 18px auto; padding: 12px; border: 1px solid var(--line); border-radius: 16px; background: #f2f6f1; }
    .spatial-span-cell { aspect-ratio: 1; min-width: 0; padding: 0; border: 2px solid #8eaaa0; border-radius: 12px; background: #fff; box-shadow: inset 0 -3px 0 rgb(0 0 0 / 5%); transition: background-color .12s, outline-color .12s; }
    .spatial-span-cell:disabled { cursor: default; opacity: 1; }
    .spatial-span-cell.lit { border-color: #126d72; outline: 4px solid #f3df9b; background: #126d72; }
    .spatial-span-cell.selected { background: #cfe5f0; }
    .dots { display: flex; min-height: 115px; flex-wrap: wrap; align-items: center; justify-content: center; gap: 8px; padding: 14px; border: 2px solid var(--line); border-radius: 14px; background: white; }
    .dot { width: 19px; height: 19px; border-radius: 50%; background: #5d8d74; }
    .two-columns { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
    .circle-game-info { display: flex; flex-wrap: wrap; align-items: center; gap: 8px 18px; margin: 14px 0; }
    .circle-game-info strong { color: var(--teal-dark); }
    .circle-game-setup { max-width: 700px; margin: 16px auto 0; padding: 20px; border: 1px solid var(--line); border-radius: 15px; background: #fff; }
    .circle-game-setup h4 { margin: 16px 0 8px; }
    .circle-game-setup select { min-height: 44px; padding: 8px 10px; border: 1px solid #aabcb8; border-radius: 9px; background: #fff; color: var(--ink); }
    .circle-mode-options { display: grid; gap: 9px; margin: 10px 0; }
    .circle-mode { display: flex; gap: 10px; align-items: flex-start; padding: 12px; border: 1px solid var(--line); border-radius: 11px; cursor: pointer; }
    .circle-mode:has(input:checked) { border-color: #8fb8a2; background: #f0f7f2; }
    .circle-mode input { width: 18px; height: 18px; margin: 4px 0 0; accent-color: var(--teal); }
    .circle-mode strong, .circle-mode small { display: block; }
    .circle-mode small { margin-top: 3px; color: var(--muted); }
    .circle-setup-result { margin: 12px 0; padding: 11px 13px; border-radius: 10px; background: #f2f6f1; color: var(--teal-dark); font-weight: 700; }
    .circle-level-time { display: inline-block; margin-left: 8px; color: var(--muted); font-size: 14px; }
    .circle-game-progress { width: 100%; height: 9px; overflow: hidden; border-radius: 99px; background: #e8eeea; }
    .circle-game-progress span { display: block; width: 0; height: 100%; border-radius: inherit; background: var(--teal); transition: width .2s linear; }
    .circle-game-board { position: relative; min-height: 340px; overflow: hidden; border: 1px solid var(--line); border-radius: 16px; background: radial-gradient(ellipse at center, #fff, #f1f6f2); }
    .bubble-game-info { display: flex; flex-wrap: wrap; align-items: center; gap: 8px 18px; margin: 14px 0; }
    .bubble-game-info strong { color: var(--teal-dark); }
    .bubble-game-board { display: grid; min-height: 380px; grid-template-columns: repeat(5, minmax(0, 1fr)); overflow: hidden; border: 1px solid var(--line); border-radius: 16px; background: linear-gradient(#f7fbf8, #eaf4ed); touch-action: manipulation; }
    .bubble-lane { position: relative; overflow: hidden; border-right: 1px dashed #cbd9cf; }
    .bubble-lane:last-child { border-right: 0; }
    .bubble-item { position: absolute; left: 50%; display: grid; width: min(56px, 90%); aspect-ratio: 1; padding: 0; place-items: center; border: 2px solid rgb(0 0 0 / 14%); border-radius: 50%; background: radial-gradient(circle at 34% 28%, #fff 0 7%, #a9d9bd 10% 72%, #6dac88 100%); box-shadow: inset -4px -6px 0 rgb(0 0 0 / 8%), 0 2px 6px rgb(24 56 61 / 12%); font-size: 25px; line-height: 1; transform: translate(-50%, 0); touch-action: manipulation; }
    .bubble-item:focus-visible { z-index: 2; outline-offset: 1px; }
    .bubble-task-board { display: grid; min-height: 370px; grid-template-rows: auto 1fr; overflow: hidden; border: 1px solid var(--line); border-radius: 16px; background: linear-gradient(#f7fbf8, #eaf4ed); }
    .bubble-task-prompt { padding: 16px; border-bottom: 1px solid var(--line); background: rgb(255 255 255 / 82%); }
    .bubble-task-prompt strong, .bubble-task-prompt span { display: block; }
    .bubble-task-prompt span { color: var(--muted); font-size: 14px; }
    .bubble-task-area { display: grid; align-content: center; justify-items: center; gap: 16px; min-height: 250px; padding: 18px; }
    .bubble-choice-grid { display: flex; min-height: 160px; flex-wrap: wrap; align-items: center; justify-content: center; gap: 10px; }
    .bubble-choice { display: grid; width: var(--bubble-size, 64px); height: var(--bubble-size, 64px); flex: 0 0 auto; padding: 0; place-items: center; border: 2px solid rgb(0 0 0 / 14%); border-radius: 50%; background: radial-gradient(circle at 34% 28%, #fff 0 7%, #a9d9bd 10% 72%, #6dac88 100%); box-shadow: inset -4px -6px 0 rgb(0 0 0 / 8%), 0 2px 6px rgb(24 56 61 / 12%); font-size: 25px; line-height: 1; touch-action: manipulation; }
    .bubble-choice.moving { animation: bubble-float 1.25s ease-in-out infinite alternate; }
    .bubble-cue { min-width: 150px; min-height: 120px; padding: 18px; border: 2px solid #90b5a1; border-radius: 20px; background: #fff; color: var(--ink); font-size: 22px; font-weight: 750; }
    .bubble-cue.stop { border-color: #c28565; background: #fff2e9; }
    .bubble-score-grid { display: grid; gap: 10px; margin: 14px 0 24px; }
    .bubble-score-card { display: grid; grid-template-columns: minmax(0, 1fr) auto; gap: 7px 12px; padding: 15px; border: 1px solid #b9d4c2; border-left: 6px solid #16888b; border-radius: 12px; background: #f8fbf8; }
    .bubble-score-card h5 { align-self: center; margin: 0; color: var(--ink); font-size: 16px; }
    .bubble-score-card > strong { grid-column: 2; grid-row: 1; color: var(--teal-dark); font-size: 18px; white-space: nowrap; }
    .bubble-score-explanation, .bubble-score-observation { grid-column: 1 / -1; margin: 0 !important; font-size: 14px; }
    .bubble-score-segments { display: grid; grid-column: 1 / -1; grid-template-columns: repeat(10, minmax(0, 1fr)); gap: 4px; padding: 4px; border-radius: 8px; background: #e6efea; }
    .bubble-score-segments span { display: grid; min-width: 0; height: 30px; place-items: center; border: 1px solid #6f9e91; border-radius: 4px; background: #fff; color: #31534e; font-size: 12px; font-weight: 750; line-height: 1; }
    .bubble-score-segments span.filled { border-color: #126d72; background: #126d72; color: #fff; }
    .bubble-score-scale-labels { display: flex; grid-column: 1 / -1; justify-content: space-between; margin-top: -5px; color: var(--muted); font-size: 12px; }
    .bubble-score-profile-note { margin: 8px 0 0 !important; color: var(--muted); font-size: 14px; }
    .bubble-report-bar { display: grid; grid-template-columns: repeat(10, minmax(0, 1fr)); gap: 3px; margin: 6px 0; }
    .bubble-report-bar span { height: 9px; border: 1px solid #16888b; border-radius: 2px; background: #fff; }
    .bubble-report-bar span.filled { background: #16888b; }
    .bubble-score-note { margin: 6px 0 12px; padding: 12px; border-left: 4px solid #d29a47; background: var(--gold); }
    .bubble-score-summary { padding: 14px; border-radius: 10px; background: #edf5ef; }
    .bubble-score-table-wrap { margin: 14px 0 24px; overflow-x: auto; }
    .bubble-score-table { width: 100%; min-width: 650px; border-collapse: collapse; font-size: 13px; }
    .bubble-score-table th, .bubble-score-table td { padding: 9px 10px; border-bottom: 1px solid var(--line); text-align: left; vertical-align: top; }
    .bubble-score-table th { background: #16888b; color: #fff; }
    .bubble-score-table td:first-child { min-width: 150px; font-weight: 700; }
    .bubble-score-table td:last-child { min-width: 210px; }
    .bubble-score-details { margin: 12px 0; border: 1px solid var(--line); border-radius: 10px; background: #fff; }
    .bubble-score-details summary { padding: 11px 13px; color: var(--teal-dark); font-weight: 700; cursor: pointer; }
    .bubble-score-details p { margin: 8px 13px; color: var(--muted); font-size: 14px; }
    .bubble-report-scores { display: grid; gap: 0; }
    .bubble-report-score { padding: 8px 0; border-bottom: 1px solid var(--line); }
    .bubble-report-score h3 { display: flex; justify-content: space-between; gap: 12px; }
    .bubble-report-score p { margin: 4px 0; }
    @keyframes bubble-float { from { transform: translate(-5px, -4px); } to { transform: translate(5px, 4px); } }
    .bubble-result { margin-top: 18px; padding: 17px; overflow-x: auto; border: 1px solid var(--line); border-radius: 14px; background: #fff; }
    .bubble-result h4 { margin: 0 0 8px; }
    .bubble-result p { color: var(--muted); }
    .bubble-result table { width: 100%; margin: 12px 0; border-collapse: collapse; font-size: 14px; }
    .bubble-result th, .bubble-result td { padding: 8px; border-bottom: 1px solid var(--line); text-align: left; vertical-align: top; }
    .bubble-result th { color: var(--teal-dark); }
    .bubble-result .secondary { margin-top: 8px; }
    .stroop-stimulus { display: grid; justify-items: center; gap: 12px; max-width: 650px; margin: 16px auto; padding: 20px; border: 1px solid var(--line); border-radius: 16px; background: #f5f8f5; }
    .stroop-prompt { margin: 0; text-align: center; font-size: 18px; font-weight: 750; }
    .stroop-word { min-width: 210px; padding: 12px 22px; border: 2px solid #dce7e2; border-radius: 12px; background: #fff; text-align: center; font-size: clamp(34px, 8vw, 58px); font-weight: 850; line-height: 1.15; letter-spacing: .04em; }
    .stroop-choices { display: grid; width: 100%; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px; }
    .stroop-choice { min-height: 82px; border: 2px solid #b9d4c2; border-radius: 12px; background: #fff; font-size: clamp(24px, 5vw, 36px); font-weight: 850; touch-action: manipulation; }
    .stroop-choice:hover { background: var(--mint); }
    .stroop-progress { height: 10px; overflow: hidden; border-radius: 99px; background: #e6efea; }
    .stroop-progress span { display: block; width: 100%; height: 100%; border-radius: inherit; background: var(--teal); transform-origin: left; }
    .stroop-distractors { display: flex; justify-content: space-around; gap: 16px; width: 100%; color: #83968e; font-size: 24px; }
    .stroop-setup { max-width: 680px; margin: 14px auto; padding: 16px; border: 1px solid var(--line); border-radius: 13px; background: #f8fbf8; }
    .stroop-setup select { width: 100%; min-height: 46px; margin: 5px 0 12px; padding: 8px 10px; border: 1px solid #aabcb8; border-radius: 9px; background: #fff; color: var(--ink); }
    .stroop-checks { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 10px; margin-top: 12px; }
    .stroop-check { display: grid; gap: 3px; font-weight: 700; }
    .stroop-check select { margin: 0; font-weight: 400; }
    .attention-setup { max-width: 700px; margin: 14px auto; padding: 17px; border: 1px solid var(--line); border-radius: 13px; background: #f8fbf8; }
    .attention-setup label { display: grid; gap: 4px; margin: 10px 0; font-weight: 700; }
    .attention-setup select { width: 100%; min-height: 44px; padding: 8px 10px; border: 1px solid #aabcb8; border-radius: 9px; background: #fff; color: var(--ink); font-weight: 400; }
    .attention-stage { display: grid; min-height: 230px; place-items: center; margin: 14px 0; padding: 17px; border: 1px solid var(--line); border-radius: 14px; background: #f5f8f5; text-align: center; }
    .attention-stimulus { min-width: 150px; min-height: 120px; padding: 16px; border: 2px solid #cbd9cf; border-radius: 16px; background: #fff; color: var(--ink); font-size: clamp(38px, 8vw, 68px); font-weight: 800; }
    .attention-stimulus-active { animation: attention-stimulus-arrive 220ms ease-out; }
    .attention-go-no-go-state { margin: 0 0 12px; padding: 9px 16px; border-radius: 10px; background: #e6efea; color: var(--ink); font-size: 18px; font-weight: 800; }
    .attention-go-no-go-state.is-ready { background: #e0f2e5; color: #176b34; }
    .attention-go-no-go-state.is-waiting { background: #fff1d6; color: #704d10; }
    .attention-go-no-go-state.is-complete { background: #e4edf5; color: #234e72; }
    .attention-go-no-go-progress { margin: 0 0 12px; color: var(--muted); font-size: 15px; font-weight: 700; }
    @keyframes attention-stimulus-arrive { from { transform: scale(.92); opacity: .45; } to { transform: scale(1); opacity: 1; } }
    @media (prefers-reduced-motion: reduce) { .attention-stimulus-active { animation: none; } }
    .attention-controls { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; margin: 12px 0; }
    .attention-controls button { min-width: 150px; min-height: 58px; }
    .attention-robot-grid { display: grid; width: 100%; grid-template-columns: repeat(auto-fit, minmax(112px, 1fr)); gap: 10px; margin: 15px 0; }
    .attention-robot { display: grid; min-width: 0; min-height: 150px; align-content: center; justify-items: center; padding: 4px; border: 2px solid #cbd9cf; border-radius: 12px; background: #fff; color: var(--ink); touch-action: manipulation; }
    .attention-robot svg { display: block; width: min(100%, 94px); height: 140px; }
    .attention-robot[aria-pressed="true"] { border-color: var(--teal); background: var(--mint); box-shadow: 0 0 0 2px var(--teal); }
    .attention-robot[aria-pressed="true"]:disabled { opacity: 1; cursor: default; }
    .attention-robot-model { display: grid; width: min(100%, 142px); min-height: 190px; place-items: center; margin: 0 auto; padding: 6px; border: 2px solid #b9d4c2; border-radius: 14px; background: white; }
    .attention-robot-model svg { display: block; width: min(100%, 120px); height: 180px; }
    .attention-robot-model strong, .attention-robot-model span { display: block; }
    .attention-robot-prompt { width: 100%; margin: 0; font-weight: 750; }
    .attention-robot-progress { width: 100%; height: 10px; overflow: hidden; border-radius: 99px; background: #e6efea; }
    .attention-robot-progress span { display: block; width: 100%; height: 100%; background: var(--teal); transform-origin: left; }
    .robot-protocol-details { margin-top: 12px; padding-top: 10px; border-top: 1px solid var(--line); }
    .robot-protocol-details summary { color: var(--teal-dark); cursor: pointer; font-weight: 750; }
    .robot-protocol-details p { margin: 10px 0 0; line-height: 1.5; }
    .attention-report { margin-top: 14px; padding: 16px; overflow-x: auto; border: 1px solid var(--line); border-radius: 13px; background: white; }
    .attention-report h4 { margin: 0 0 8px; }
    .attention-report table { width: 100%; margin: 12px 0; border-collapse: collapse; font-size: 14px; }
    .attention-report th, .attention-report td { padding: 8px; border-bottom: 1px solid var(--line); text-align: left; vertical-align: top; }
    .attention-report th { color: var(--teal-dark); }
    .attention-child .attention-stimulus { min-width: 190px; min-height: 145px; }
    .attention-child .attention-controls button { min-height: 68px; font-size: 17px; }
    .attention-child .attention-robot { min-height: 155px; font-size: 13px; }
    .bubble-pdf-report { width: min(850px, calc(100% - 32px)); margin: 24px auto; padding: 24px; border: 1px solid var(--line); border-radius: 14px; background: #fff; box-shadow: 0 8px 24px rgb(23 57 58 / 8%); color: #20373b; font: 15px/1.55 Arial, sans-serif; }
    .bubble-report-page h1 { margin: 0; color: #164f53; font-size: 30px; line-height: 1.2; letter-spacing: 0; }
    .bubble-pdf-report h2 { margin: 26px 0 10px; color: #164f53; font-size: 20px; }
    .bubble-pdf-report h3 { margin: 0 0 8px; color: #164f53; font-size: 16px; }
    .bubble-report-date { margin: 4px 0 20px; color: var(--muted); }
    .bubble-report-notice { padding: 14px 16px; border-left: 5px solid #d29a47; background: var(--gold); }
    .bubble-report-summary { padding: 16px; border-radius: 10px; background: #edf5ef; }
    .bubble-report-metrics { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin: 14px 0; }
    .bubble-report-metric { padding: 12px; border: 1px solid var(--line); border-radius: 9px; }
    .bubble-report-metric strong, .bubble-report-metric span { display: block; }
    .bubble-report-metric strong { color: var(--teal); font-size: 21px; }
    .bubble-report-metric span, .bubble-report-small { color: var(--muted); font-size: 13px; }
    .bubble-report-phase { margin: 10px 0; padding: 13px; border: 1px solid var(--line); border-radius: 9px; break-inside: avoid; }
    .bubble-report-phase p, .bubble-report-definition { margin: 5px 0; }
    .bubble-report-definition { padding-left: 13px; border-left: 3px solid #b9d4c2; }
    .bubble-interpretation { margin: 12px 0; padding: 14px; border: 1px solid var(--line); border-radius: 11px; background: #f5f8f4; }
    .bubble-interpretation h5 { margin: 0 0 7px; color: var(--teal-dark); font-size: 16px; }
    .bubble-interpretation p { margin: 7px 0; }
    .bubble-report-source { overflow-wrap: anywhere; }
    .bubble-report-toolbar { display: flex; flex-wrap: wrap; gap: 9px; margin-bottom: 16px; }
    .bubble-report-toolbar p { flex: 1 1 100%; margin: 0; color: var(--muted); font-size: 13px; }
    .bubble-report-toolbar button { min-height: 44px; padding: 9px 13px; border: 0; border-radius: 9px; background: var(--teal); color: #fff; font-weight: 700; }
    .bubble-report-footer { margin-top: 25px; padding-top: 12px; border-top: 1px solid var(--line); color: var(--muted); font-size: 12px; }
    .circle-game-dot { position: absolute; display: grid; padding: 0; place-items: center; border: 0; border-radius: 50%; background: transparent; transform: translate(-50%, -50%); touch-action: none; }
    .circle-game-dot span { display: block; flex: 0 0 auto; border: 3px solid rgb(24 56 61 / 15%); border-radius: 50%; background: #b8dcc3; box-shadow: inset -5px -6px 0 rgb(0 0 0 / 8%); pointer-events: none; }
    .circle-game-dot span.sizing { animation: circle-size-pulse 1.25s ease-in-out infinite alternate; }
    .circle-game-dot:focus-visible { z-index: 2; outline-offset: 2px; }
    .circle-game-dot.moving { animation: circle-drift 1.7s ease-in-out infinite alternate; }
    .circle-game-dot.vibrating span { animation: circle-vibrate .12s linear infinite; }
    @keyframes circle-drift {
      0% { transform: translate(-50%, -50%) translate(-27px, -20px); }
      100% { transform: translate(-50%, -50%) translate(27px, 20px); }
    }
    @keyframes circle-vibrate {
      0%, 100% { transform: translate(0, 0); }
      25% { transform: translate(-3px, 1px); }
      50% { transform: translate(2px, -2px); }
      75% { transform: translate(3px, 2px); }
    }
    @keyframes circle-size-pulse {
      from { scale: .72; }
      to { scale: 1.28; }
    }
    .circle-result { margin-top: 18px; padding: 17px; overflow-x: auto; border: 1px solid var(--line); border-radius: 14px; background: #fff; }
    .circle-result h4 { margin: 0 0 8px; }
    .circle-result p { color: var(--muted); }
    .circle-result table { width: 100%; margin: 12px 0; border-collapse: collapse; font-size: 14px; }
    .circle-result th, .circle-result td { padding: 8px; border-bottom: 1px solid var(--line); text-align: left; vertical-align: top; }
    .circle-result th { color: var(--teal-dark); }
    @media (prefers-reduced-motion: reduce) {
      .circle-game-progress span { transition: none; }
    }
    .pegs { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; margin-top: 17px; }
    .peg { display: flex; min-height: 160px; flex-direction: column-reverse; align-items: center; justify-content: flex-start; gap: 5px; padding: 10px 4px; border: 2px solid var(--line); border-bottom: 8px solid #a87951; border-radius: 12px 12px 5px 5px; background: #faf9f3; }
    .peg.selected { border-color: var(--teal); background: #f0f7f2; }
    .disk { height: 22px; border: 2px solid rgb(0 0 0 / 12%); border-radius: 99px; background: #76a98a; }
    .tower-panel { margin-top: 16px; padding: 16px; border: 1px solid var(--line); border-radius: 14px; background: #fff; }
    .tower-panel h4, .tower-panel h5 { margin: 0 0 8px; color: var(--teal-dark); }
    .tower-level-list { display: grid; gap: 8px; margin: 12px 0; padding-left: 23px; }
    .tower-level-list li { padding-left: 3px; }
    .tower-controls { display: flex; flex-wrap: wrap; gap: 9px; margin: 12px 0; }
    .tower-controls button { min-height: 44px; padding: 8px 12px; border: 1px solid #b9d4c2; border-radius: 9px; background: var(--mint); color: var(--teal-dark); font-weight: 700; }
    .tower-controls button:disabled { cursor: default; opacity: .55; }
    .tower-level-heading { margin: 14px 0 6px; }
    .tower-objectives { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 14px; margin: 14px 0; }
    .tower-objective { padding: 12px; border: 1px solid var(--line); border-radius: 12px; background: #f8fbf8; }
    .tower-board { display: grid; grid-template-columns: repeat(var(--tower-columns, 3), minmax(0, 1fr)); align-items: end; gap: 8px; min-height: 160px; margin: 8px 0; }
    .tower-peg { display: flex; min-width: 0; min-height: 150px; flex-direction: column-reverse; align-items: center; justify-content: flex-start; gap: 4px; padding: 8px 3px; border: 1px solid #d1ddd6; border-bottom: 7px solid #a87951; border-radius: 9px 9px 3px 3px; background: #fff; }
    button.tower-peg { cursor: pointer; touch-action: manipulation; }
    .tower-peg.selected { outline: 3px solid #16888b; background: #eaf5ee; }
    .tower-objective .tower-peg { min-height: 112px; }
    .tower-disk { display: grid; width: var(--disk-width, 42%); height: 19px; flex: 0 0 19px; place-items: center; border: 1px solid rgb(0 0 0 / 20%); border-radius: 999px; color: #17383d; font-size: 11px; font-weight: 750; }
    .tower-disc-base { width: 80%; height: 7px; margin-top: 1px; border-radius: 99px; background: #a87951; }
    .tower-level-info { display: flex; flex-wrap: wrap; gap: 8px 16px; color: var(--teal-dark); font-weight: 700; }
    .tower-feedback { min-height: 28px; margin: 8px 0 !important; color: var(--teal-dark) !important; font-weight: 650; }
    .tower-hidden-target { min-height: 150px; display: grid; place-items: center; padding: 12px; border: 2px dashed #8fb8a2; border-radius: 9px; color: var(--muted); text-align: center; }
    .tower-result { margin-top: 18px; padding: 17px; overflow-x: auto; border: 1px solid var(--line); border-radius: 14px; background: #fff; }
    .tower-result h4 { margin: 0 0 8px; }
    .tower-result p { color: var(--muted); }
    .tower-summary { margin: 0 0 16px; padding: 12px 14px; border-left: 4px solid var(--teal); border-radius: 8px; background: #f0f7f2; color: var(--ink) !important; }
    .shopping-list { margin: 12px 0; padding: 13px; border-radius: 11px; background: #f2f6f1; }
    .verbal-memory-setup, .verbal-memory-round, .verbal-memory-video { display: grid; gap: 12px; margin: 14px 0; padding: 16px; border: 1px solid var(--line); border-radius: 13px; background: #f8fbf8; }
    .verbal-memory-setup label, .verbal-memory-round label { display: grid; gap: 5px; font-weight: 700; }
    .verbal-memory-setup select, .verbal-memory-round textarea, .verbal-memory-video input { width: 100%; min-height: 46px; padding: 9px 11px; border: 1px solid #aabcb8; border-radius: 9px; background: #fff; color: var(--ink); }
    .verbal-memory-round textarea { min-height: 120px; resize: vertical; }
    .verbal-memory-round .secondary, .verbal-memory-video .secondary { justify-self: start; }
    .verbal-memory-word-status { min-height: 25px; color: var(--teal-dark); font-weight: 700; }
    .verbal-memory-video-frame { width: 100%; aspect-ratio: 16 / 9; border: 0; border-radius: 12px; background: #17282a; }
    .verbal-memory-video-time { color: var(--teal-dark); font-size: 20px; font-weight: 800; }
    .verbal-memory-result { margin-top: 18px; padding: 17px; overflow-x: auto; border: 1px solid var(--line); border-radius: 14px; background: #fff; }
    .verbal-memory-result table { width: 100%; margin: 12px 0; border-collapse: collapse; font-size: 14px; }
    .verbal-memory-result th, .verbal-memory-result td { padding: 8px; border-bottom: 1px solid var(--line); text-align: left; vertical-align: top; }
    .verbal-memory-result th { color: var(--teal-dark); }
    .verbal-memory-chart { display: grid; grid-template-columns: repeat(5, minmax(0, 1fr)); align-items: end; gap: 10px; min-height: 180px; margin: 14px 0; padding: 14px 12px 8px; border-bottom: 2px solid var(--line); background: repeating-linear-gradient(to top, transparent 0 calc(20% - 1px), #e7efea calc(20% - 1px) 20%); }
    .verbal-memory-chart-item { display: grid; grid-template-rows: 1fr auto auto; justify-items: center; align-items: end; gap: 4px; height: 155px; text-align: center; }
    .verbal-memory-chart-bar { width: min(42px, 65%); min-height: 4px; border-radius: 6px 6px 0 0; background: var(--teal); }
    .verbal-memory-chart-item strong { font-size: 13px; }
    .verbal-memory-chart-item span { color: var(--muted); font-size: 12px; }
    .text-game .prompt { color: var(--ink); font-size: 18px; }
    .answer-row, .token-row { display: flex; flex-wrap: wrap; align-items: center; gap: 9px; margin-top: 12px; }
    .answer-input { width: min(100%, 360px); min-height: 44px; padding: 9px 12px; border: 2px solid var(--line); border-radius: 10px; }
    .token { padding: 7px 10px; border: 1px solid #cbd9cf; background: #f5f8f4; color: var(--ink); }
    .token:disabled { opacity: .5; }
    .game-feedback { min-height: 25px; margin-top: 9px; font-weight: 700; }
    .directory-tools { display: flex; flex-wrap: wrap; gap: 10px; margin: 16px 0; padding: 15px; }
    .directory-tools input, .directory-tools select { min-height: 44px; padding: 9px 11px; border: 1px solid #aabcb8; border-radius: 9px; background: white; color: var(--ink); }
    .directory-tools input { flex: 1 1 250px; }
    .directory-tools select { flex: 1 1 200px; }
    .directory-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; }
    .directory-card { padding: 17px; }
    .tag { display: inline-block; margin: 0 5px 5px 0; padding: 4px 8px; border-radius: 5px; background: #e7f1ed; color: #225647; font-size: 12px; font-weight: 650; }
    .directory-card h3 { margin: 9px 0 5px; font-size: 18px; }
    .directory-card .label { margin-top: 12px; color: var(--teal-dark); font-size: 13px; font-weight: 750; }
    .directory-card p { font-size: 14px; }
    .empty { grid-column: 1 / -1; padding: 22px; border-radius: 12px; background: white; color: var(--muted); text-align: center; }
    footer { padding: 19px 0 30px; border-top: 1px solid var(--line); color: var(--muted); font-size: 13px; }
    footer p { margin: 5px 0; }
    .sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border: 0; }
    [hidden] { display: none !important; }
    @media (max-width: 760px) {
      .text-maker { grid-template-columns: 1fr; }
      .game-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
      .topline { align-items: flex-start; }
      .topline nav { justify-content: flex-end; }
    }
    @media (max-width: 560px) {
      .masthead-inner, main, footer { width: min(100% - 32px, 1000px); }
      .game-grid, .directory-grid, .two-columns { grid-template-columns: 1fr; }
      .bubble-score-grid, .bubble-report-scores { grid-template-columns: 1fr; }
      .topline { flex-direction: column; }
      .topline nav { justify-content: flex-start; }
      .activity { padding: 15px; }
      .circle-game-board { min-height: 320px; }
      .spatial-span-grid { gap: 7px; padding: 9px; }
      .stroop-choices { gap: 8px; }
      .stroop-choice { min-height: 70px; }
      .stroop-word { min-width: 0; width: 100%; }
      .stroop-checks { grid-template-columns: 1fr; }
      .verbal-memory-setup, .verbal-memory-round, .verbal-memory-video { padding: 12px; }
    }
    @media (prefers-reduced-motion: reduce) { html { scroll-behavior: auto; } }
    .game-art { width: 100%; height: auto; border-radius: 10px; margin: 4px 0 8px; display: block; }
  </style>
</head>
<body>
  <header class="masthead">
    <div class="masthead-inner">
      <div class="topline">
        <a class="brand" href="index.html">
          <img src="Logo%20FAND%20en%20turquesa%20con%20emblema%20multicolor%20(1).png" alt="">
          <span>FAND · Alianza para la Neurodivergencia</span>
        </a>
        <nav aria-label="Navegación principal">
          <a href="index.html">Inicio</a>
          <a href="#juegos">Juegos</a>
          <a href="#directorio">Directorio informativo</a>
          <a href="FAND_Fichas_Tecnicas.html">Fichas técnicas</a>
          <a href="FAND_Ficha_Usuario.html">Mi ficha</a>
        </nav>
      </div>
      <p class="eyebrow">ACTIVIDADES DE PRÁCTICA Y RECURSOS</p>
      <h1>Juegos interactivos</h1>
      <p>Prueba actividades breves de atención, memoria, lectura, cantidades y planificación. También puedes pegar un texto para crear ejercicios sencillos.</p>
    </div>
  </header>

  <main>
    <div class="notice"><strong>Importante:</strong> estos minijuegos no sustituyen una evaluación profesional. «Burbujas en movimiento» ofrece observaciones provisionales en ocho tareas de atención, percepción visual, velocidad, inhibición, coordinación y flexibilidad. Sus puntuaciones de 1 a 10 no tienen baremos validados, no clasifican a la persona y no diagnostican.</div>

    <section class="section" aria-labelledby="text-title">
      <div class="section-heading">
        <h2 id="text-title">Convierte un texto en juegos</h2>
        <p>Pega una lectura y elige actividades. El texto se procesa localmente en este navegador y no se envía a ningún servicio.</p>
      </div>
      <div class="text-maker">
        <div>
          <label for="source-text"><strong>Tu texto</strong></label>
          <textarea id="source-text" placeholder="Pega aquí una lectura con frases completas…"></textarea>
          <div class="word-count"><span id="word-count">0 palabras</span><span>Procesamiento local</span></div>
        </div>
        <div>
          <h3>Elige qué practicar</h3>
          <div class="type-list">
            <label class="type-option"><input type="checkbox" name="text-game" value="missing" checked><span><strong>Completa la palabra</strong><small>Recuerda una palabra que falta en una frase.</small></span></label>
            <label class="type-option"><input type="checkbox" name="text-game" value="order" checked><span><strong>Ordena la frase</strong><small>Reconstruye una frase tocando sus palabras.</small></span></label>
            <label class="type-option"><input type="checkbox" name="text-game" value="find" checked><span><strong>Caza la palabra</strong><small>Encuentra una palabra entre varias opciones.</small></span></label>
          </div>
          <button class="primary" id="generate-text-games" type="button">Crear juegos desde el texto</button>
          <p class="error" id="text-error" role="alert"></p>
        </div>
      </div>
      <div id="generated-games" aria-live="polite"></div>
    </section>

    <section class="section" id="juegos" aria-labelledby="games-title">
      <div class="section-heading">
        <h2 id="games-title">Elige un minijuego</h2>
        <p>Algunos juegos ofrecen un informe descriptivo que puedes guardar como PDF. Los resultados de estas actividades no se envían ni se guardan automáticamente; no son puntuaciones clínicas ni diagnósticos. Puedes parar cuando quieras.</p>
      </div>
      <div class="game-grid" id="game-grid"></div>
      <section class="activity" id="activity" aria-live="polite" aria-label="Juego en curso" hidden></section>
    </section>

    <section class="section" id="directorio" aria-labelledby="directory-title">
      <div class="section-heading">
        <h2 id="directory-title">Directorio del documento</h2>
        <p>Resumen de herramientas y tipos de actividad que aparecen en el PDF, con la finalidad atribuida en ese documento.</p>
      </div>
      <div class="notice"><strong>Lectura responsable:</strong> el documento advierte de muestras pequeñas, validación externa limitada y referencias bibliográficas incompletas. Las cifras puntuales citadas no son garantías clínicas. Una correlación o resultado de investigación no diagnostica a una persona.</div>
      <div class="directory-tools" aria-label="Filtros del directorio">
        <label class="sr-only" for="directory-search">Buscar herramientas</label>
        <input id="directory-search" type="search" placeholder="Buscar herramienta, perfil o función…">
        <label class="sr-only" for="profile-filter">Filtrar por perfil</label>
        <select id="profile-filter">
          <option value="">Todos los perfiles</option>
          <option>Autismo</option><option>TDAH</option><option>Dislexia</option>
          <option>Discalculia</option><option>Funciones ejecutivas</option><option>Otros perfiles</option>
        </select>
      </div>
      <p id="directory-count" aria-live="polite"></p>
      <div class="directory-grid" id="directory-grid"></div>
      <p class="meta">Fuente: PDF aportado por la persona usuaria. FAND no ha verificado de forma independiente cada estudio ni la disponibilidad actual de cada producto.</p>
    </section>
  </main>

  <footer>
    <p><strong>FAND · Alianza para la Neurodivergencia</strong></p>
    <p>Estos recursos no sustituyen diagnóstico, evaluación, terapia o asesoramiento profesional.</p>
  </footer>

  <script src="assets/js/fand-perfil.js"></script>
  <script>
    (() => {
      const games = [
        { id: "bubbles", icon: "◉", title: "Burbujas en movimiento", skills: "Ocho aptitudes · puntuación visual del 1 al 10", description: "Al terminar verás qué se valoró, cómo se midió en tu partida y una barra con la puntuación de cada aptitud. Son resultados provisionales, no un diagnóstico." },
        { id: "hunt", icon: "⌕", title: "Encuentra la letra", skills: "Búsqueda visual y lectoescritura", description: "Encuentra todas las apariciones de una letra objetivo." },
        { id: "syllables", icon: "Aa", title: "Caza la sílaba", skills: "Conciencia fonológica", description: "Elige las palabras que empiezan por la sílaba indicada." },
        { id: "memory", icon: "◈", title: "Recuerda la secuencia", skills: "Memoria espacial · retención del orden", description: "Recuerda dónde se iluminaron los cuadrados y pulsa sus posiciones en el mismo orden. La dificultad se adapta a tus respuestas." },
        { id: "quantity", icon: "···", title: "¿Dónde hay más?", skills: "Cantidad y sentido numérico", description: "Compara dos grupos de puntos y elige el que tiene más." },
        { id: "size", icon: "◯", title: "El círculo mayor", skills: "Perfil de aptitudes con puntuaciones del 1 al 10", description: "Al terminar, consulta barras de resultados calculadas con los aciertos, el tiempo de selección y la precisión de los toques." },
        { id: "hanoi", icon: "▤", title: "Torres: observa, planifica y construye", skills: "Planificación · organización visoespacial · resolución", description: "Ocho problemas progresivos y módulos independientes para observar planificación, memoria y flexibilidad." },
        { id: "shopping", icon: "▣", title: "La lista", skills: "Memoria verbal · recuerdo y retención", description: "Escucha una lista de 15 palabras, di las que recuerdas en cinco rondas y vuelve a evocarlas después de una pausa con un vídeo de un tema que te interese." },
        { id: "watcher", icon: "◉", title: "El Vigilante", skills: "Atención sostenida", description: "Mantén la atención y responde cada vez que aparezca el estímulo objetivo." },
        { id: "robots", icon: "🤖", title: "Encuentra al Robot", skills: "Atención selectiva · búsqueda visual", description: "Completa una búsqueda visual en cuatro fases. Antes de empezar, elige el tiempo máximo por cuadrícula o juega sin límite." },
        { id: "go-no-go", icon: "✋", title: "Pulsa o Espera", skills: "Control inhibitorio", description: "Responde a los estímulos que indican «pulsa» e inhibe la respuesta cuando aparezca «espera»." },
        { id: "simon", icon: "↔", title: "La Dirección Equivocada", skills: "Interferencia espacial", description: "Responde según el color, aunque la posición del estímulo sugiera el lado contrario." },
        { id: "stop", icon: "✦", title: "Que no te engañen", skills: "Atención selectiva · control de interferencias", description: "Lee el color de la tinta de una palabra y elige la etiqueta correspondiente, aunque la palabra o las opciones intenten distraerte." }
      ];
      const sheetByGame = { robots: "J01", stop: "J02", "go-no-go": "J03", watcher: "J04", hanoi: "J05", shopping: "J06", memory: "J07" };
      const directory = [
        ["ADOS-2", "Autismo", "Clínico estandarizado", "Observación clínica con actividades de juego, interacción y conversación según el módulo.", "Comunicación, reciprocidad social, juego y conductas repetitivas.", "Requiere formación profesional; no basta por sí solo."],
        ["BOSA", "Autismo", "Complementario", "Observación breve mediante interacción y actividades; algunos módulos pueden usar juegos como Jenga.", "Comunicación social y conductas relacionadas con autismo.", "No sustituye una evaluación completa."],
        ["STAT", "Autismo", "Cribado", "Doce actividades interactivas para primera infancia.", "Juego, imitación y comunicación.", "Aplicado y puntuado por personal formado; no confirma diagnóstico."],
        ["ShopAutiPlan", "Autismo", "Experimental", "Supermercado virtual con tareas de planificación.", "Planificación ejecutiva, pausas y eficiencia motora.", "El documento describe un estudio con 57 participantes; las correlaciones no equivalen a diagnóstico."],
        ["Bubble Popping táctil", "Autismo / TDAH", "Experimental", "Paradigma de burbujas móviles con registro de interacciones táctiles.", "Precisión del toque, latencia, duración del contacto y variabilidad; tareas con distractores también pueden describir omisiones y respuestas a distractores.", "Esta actividad FAND es una adaptación lúdica, no reproduce ni valida el protocolo publicado. No diagnostica ni dispone de baremos."],
        ["Creyos (baterías gamificadas)", "Autismo / TDAH", "Complementario", "Subtareas informatizadas de atención, memoria y razonamiento.", "Inhibición, memoria operativa, precisión e intentos.", "El PDF cita clasificaciones del 53–60%; insuficiente para diagnóstico aislado."],
        ["Discriminación de tamaño (9 niveles)", "Autismo / desarrollo global", "Experimental", "Tareas lúdicas de discriminación y conflicto perceptual.", "Percepción, memoria secuencial y conflicto.", "El PDF cita Wang (2026); cifras por verificar en el artículo original."],
        ["QbTest / QbCheck", "TDAH", "Complementario", "Prueba informatizada de atención con registro de actividad motora.", "Atención, impulsividad y actividad.", "Condiciones de uso varían por producto y país."],
        ["MOXO-d-CPT", "TDAH", "Complementario", "Tarea continua con distractores visuales y auditivos.", "Atención, tiempo de respuesta, impulsividad e hiperactividad.", "Apoyo a la evaluación; no es una prueba única."],
        ["Nesplora Aula", "TDAH", "Complementario", "Tareas atencionales en un aula virtual.", "Atención, respuesta ante distractores y comportamiento.", "Conviene revisar baremos de edad y versión."],
        ["Chefmania / Timo's Adventure", "TDAH", "Intervención / experimental", "Minijuegos de atención sostenida y control inhibitorio.", "Aciertos con distractores y respuestas impulsivas.", "Prototipos o investigación según el documento."],
        ["Attention Slackline", "TDAH", "Experimental", "Juego de atención evaluado en niños de 6–11 años.", "Rendimiento atencional y relación con escalas familiares.", "Un estudio concreto no establece sensibilidad diagnóstica general."],
        ["Attention Robots", "TDAH", "Experimental", "Juego evaluado frente a D2-R en una muestra de 58 menores.", "Velocidad y concentración.", "Validez convergente no equivale a precisión diagnóstica."],
        ["FishFinder", "TDAH", "Experimental", "Juego combinado con acelerometría de smartphone.", "Rendimiento y movimiento.", "El documento cita resultados de un estudio; falta verificar validación externa."],
        ["Go/No-Go y Simon digitales", "TDAH / funciones ejecutivas", "Paradigma complementario", "Tareas breves de inhibición y conflicto.", "Aciertos, errores y latencia.", "Resultados de prototipos no extrapolables a diagnóstico."],
        ["Dytective", "Dislexia", "Cribado", "Actividades gamificadas de lectura y procesamiento lingüístico en español.", "Patrones de lectura y respuesta para estimar riesgo.", "No diagnostica; comprobar el rango de edad vigente."],
        ["Helpdy / MusVis", "Dislexia", "Entrenamiento / experimental", "Juegos de identificación visual, ahorcado y colocación de vocales.", "Errores fonológicos, clics y tiempos.", "El PDF cita una precisión del 80% en un estudio; falta verificar su alcance."],
        ["Juegos de grafema-fonema", "Dislexia", "Entrenamiento", "Reconocimiento de letras, sonidos y velocidad de asociación.", "Conciencia fonológica y procesamiento lector.", "Investigación heterogénea; diferenciar cribado y entrenamiento."],
        ["Comparación de cantidades", "Discalculia", "Entrenamiento", "Estimación, correspondencia número-cantidad y cálculo.", "Sentido numérico y habilidades matemáticas.", "Validación diagnóstica variable; muchos son intervenciones."],
        ["Torre de Londres digital", "Funciones ejecutivas", "Prueba cognitiva", "Resolución de problemas de planificación con dificultad variable.", "Latencia, pasos, errores y planificación.", "El perfil de desempeño no determina un diagnóstico."],
        ["Neurospective / Whack-a-Mole", "Funciones ejecutivas", "Experimental", "Tareas tipo Stroop, inhibición, cancelación y emparejamiento.", "Precisión, velocidad y actividad táctil.", "Plataforma emergente; verificar disponibilidad y estudios independientes."],
        ["Ajedrez / cambio de tarea", "Funciones ejecutivas", "Intervención", "Dinámicas de regulación y flexibilidad cognitiva.", "Desempeño durante el entrenamiento.", "Principalmente intervención, no diagnóstico."],
        ["Compras virtuales / laberintos 3D", "Funciones ejecutivas", "Experimental", "Simulación de actividades cotidianas.", "Orientación, planificación y tiempo.", "La validez ecológica en estudio no identifica un perfil por sí sola."],
        ["Tareas motoras", "Otros perfiles", "Complementario", "Actividades de equilibrio, pelota, destreza manual y coordinación.", "Control y planificación motora.", "El documento recomienda instrumentos motores estandarizados."],
        ["Trazado y escritura digital", "Otros perfiles", "Complementario", "Copiado, escritura y uso de tableta.", "Fluidez, presión, velocidad y legibilidad.", "Necesita evaluación específica de escritura."],
        ["Narración y juegos verbales", "Otros perfiles", "Complementario", "Historias, vocabulario e instrucciones.", "Comprensión, gramática y expresión.", "Las pruebas deben adaptarse a lengua y edad."],
        ["Observación en tareas", "Otros perfiles", "Observación clínica", "Actividades con observación de tics.", "Características e interferencia funcional.", "El documento indica que no existe un juego diagnóstico de referencia."],
        ["Patrones, puzles y razonamiento", "Otros perfiles", "Evaluación multidimensional", "Patrones, puzles, razonamiento y tareas académicas.", "Fortalezas y dificultades coexistentes.", "No inferir un diagnóstico a partir de un juego."]
      ];
      const stopWords = new Set("a al algo algunas algunos ante antes bajo cada como con contra cual cuando de del desde donde durante e el ella ellas ellos en entre era es esa esas ese eso esos esta estaba estas este esto estos fue ha hacia hasta hay la las le les lo los más menos mi mis mucha muchas mucho muchos ni no nos o otra otras otro otros para pero por porque que quien se sin sobre son su sus también tan te tiene un una unas uno unos va y ya".split(" "));
      const gameGrid = document.querySelector("#game-grid");
      const activity = document.querySelector("#activity");
      const generatedGames = document.querySelector("#generated-games");
      let timers = [];
      let cleanups = [];

      function element(tag, className, text) {
        const node = document.createElement(tag);
        if (className) node.className = className;
        if (text !== undefined) node.textContent = text;
        return node;
      }

      function downloadReportPdf(report, filename) {
        const printableText = value => value
          .replace(/×/g, "x")
          .replace(/[–—]/g, "-")
          .replace(/[“”]/g, '"')
          .replace(/[‘’]/g, "'")
          .normalize("NFD")
          .replace(/[\u0300-\u036f]/g, "")
          .replace(/[^\x20-\x7E]/g, " ");
        const lines = [];
        const content = report.querySelector(".bubble-report-page") || report;
        content.querySelectorAll("h1, h2, h3, h4, p, tr, .bubble-report-metric, .bubble-report-score, .bubble-score-card").forEach(node => {
          if (node.closest(".bubble-report-toolbar") || node.closest("button")) return;
          if (node.closest(".bubble-report-score, .bubble-score-card") && !node.matches(".bubble-report-score, .bubble-score-card")) return;
          const isScore = node.matches(".bubble-report-score, .bubble-score-card");
          const raw = isScore
            ? (node.querySelector("h3") || node.querySelector("h5")).innerText.trim() + ` ${node.querySelector("strong")?.innerText || ""}`
            : node.tagName === "TR"
            ? [...node.querySelectorAll("th, td")].map(cell => cell.innerText.trim()).join(" | ")
            : node.innerText.trim();
          if (!raw) return;
          if (isScore) {
            const score = node.dataset.score ? Number(node.dataset.score) : null;
            lines.push({ text: printableText(raw), kind: "score", score });
            const description = [...node.querySelectorAll("p")].map(paragraph => paragraph.innerText.trim()).filter(Boolean).join(" ");
            if (description) {
              let line = "";
              printableText(description).split(/\s+/).forEach(word => {
                if (line && `${line} ${word}`.length > 88) {
                  lines.push({ text: line, kind: "body" });
                  line = word;
                } else line = line ? `${line} ${word}` : word;
              });
              if (line) lines.push({ text: line, kind: "body" });
            }
            lines.push({ text: "", kind: "space" });
            return;
          }
          const kind = /^H1$/.test(node.tagName) ? "title" : /^H[234]$/.test(node.tagName) ? "heading" : "body";
          raw.split(/\n+/).forEach(paragraph => {
            const words = printableText(paragraph).split(/\s+/);
            let line = "";
            words.forEach(word => {
              if (line && `${line} ${word}`.length > 88) {
                lines.push({ text: line, kind });
                line = word;
              } else line = line ? `${line} ${word}` : word;
            });
            if (line) lines.push({ text: line, kind });
          });
          lines.push({ text: "", kind: "space" });
        });
        const pageLines = [];
        let currentPage = [];
        let used = 0;
        lines.forEach(line => {
          const height = line.kind === "title" ? 26 : line.kind === "heading" ? 21 : line.kind === "score" ? 31 : line.kind === "space" ? 7 : 14;
          if (used + height > 740 && currentPage.length) {
            pageLines.push(currentPage);
            currentPage = [];
            used = 0;
          }
          currentPage.push(line);
          used += height;
        });
        if (currentPage.length) pageLines.push(currentPage);
        const pdfEscape = value => value.replace(/\\/g, "\\\\").replace(/\(/g, "\\(").replace(/\)/g, "\\)");
        const pageObjects = [];
        const objects = [
          "<< /Type /Catalog /Pages 2 0 R >>",
          "",
          "<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica /Encoding /WinAnsiEncoding >>",
          "<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica-Bold /Encoding /WinAnsiEncoding >>"
        ];
        pageLines.forEach((page, index) => {
          const pageObject = objects.length + 1;
          const contentObject = pageObject + 1;
          pageObjects.push(`${pageObject} 0 R`);
          let y = 790;
          let stream = "";
          page.forEach(line => {
            if (!line.text) {
              y -= 7;
              return;
            }
            const isTitle = line.kind === "title";
            const isHeading = line.kind === "heading";
            const isScore = line.kind === "score";
            const font = isTitle || isHeading ? "F2" : "F1";
            const size = isTitle ? 18 : isHeading ? 12 : isScore ? 11 : 9;
            stream += `BT /${font} ${size} Tf 50 ${y} Td (${pdfEscape(line.text)}) Tj ET\n`;
            if (isScore) {
              const cellGap = 3;
              const cellWidth = (495 - cellGap * 9) / 10;
              for (let segment = 0; segment < 10; segment++) {
                const x = 50 + segment * (cellWidth + cellGap);
                const style = segment < (line.score || 0) ? "0.07 0.53 0.55 rg" : "0.07 0.53 0.55 RG";
                const operation = segment < (line.score || 0) ? "f" : "S";
                stream += `${style} ${x} ${y - 17} ${cellWidth} 8 re ${operation}\n`;
              }
            }
            y -= isTitle ? 28 : isHeading ? 21 : isScore ? 34 : 14;
          });
          stream += `BT /F1 8 Tf 50 28 Td (FAND - Informe descriptivo - Pagina ${index + 1} de ${pageLines.length}) Tj ET\n`;
          objects.push(`<< /Type /Page /Parent 2 0 R /MediaBox [0 0 595 842] /Resources << /Font << /F1 3 0 R /F2 4 0 R >> >> /Contents ${contentObject} 0 R >>`);
          objects.push(`<< /Length ${stream.length} >>\nstream\n${stream}endstream`);
        });
        objects[1] = `<< /Type /Pages /Kids [${pageObjects.join(" ")}] /Count ${pageObjects.length} >>`;
        let pdf = "%PDF-1.4\n";
        const offsets = [0];
        objects.forEach((object, index) => {
          offsets.push(pdf.length);
          pdf += `${index + 1} 0 obj\n${object}\nendobj\n`;
        });
        const xrefOffset = pdf.length;
        pdf += `xref\n0 ${objects.length + 1}\n0000000000 65535 f \n`;
        offsets.slice(1).forEach(offset => { pdf += `${String(offset).padStart(10, "0")} 00000 n \n`; });
        pdf += `trailer\n<< /Size ${objects.length + 1} /Root 1 0 R >>\nstartxref\n${xrefOffset}\n%%EOF`;
        const blob = new Blob([pdf], { type: "application/pdf" });
        const url = URL.createObjectURL(blob);
        const link = document.createElement("a");
        link.href = url;
        link.download = filename;
        document.body.append(link);
        link.click();
        link.remove();
        window.setTimeout(() => URL.revokeObjectURL(url), 1000);
      }

      function schedule(callback, delay) {
        const id = window.setTimeout(callback, delay);
        timers.push(id);
        return id;
      }

      function stopTimers() {
        timers.forEach(window.clearTimeout);
        timers = [];
      }

      function stopGameEffects() {
        cleanups.forEach(cleanup => cleanup());
        cleanups = [];
      }

      function makeActivity(title, description) {
        stopTimers();
        stopGameEffects();
        document.querySelector("#circle-pdf-report, #bubble-pdf-report")?.remove();
        activity.replaceChildren();
        activity.hidden = false;
        const top = element("div", "activity-top");
        const copy = document.createElement("div");
        copy.append(element("h3", "", title), element("p", "", description));
        const close = element("button", "secondary", "Cerrar juego");
        close.type = "button";
        close.addEventListener("click", () => {
          stopTimers();
          stopGameEffects();
          document.querySelector("#circle-pdf-report, #bubble-pdf-report")?.remove();
          activity.hidden = true;
          activity.replaceChildren();
        });
        top.append(copy, close);
        const board = element("div", "board");
        const status = element("p", "status");
        activity.append(top, board, status);
        activity.scrollIntoView({ behavior: "smooth", block: "start" });
        return { board, status };
      }

      function setFeedback(node, text, good) {
        node.textContent = text;
        node.style.color = good ? "var(--teal-dark)" : "var(--danger)";
      }

      games.forEach(game => {
        const card = element("article", "game-card");
        const sheetCode = sheetByGame[game.id];
        card.append(element("div", "game-icon", game.icon), element("h3", "", game.title));
        if (sheetCode) {
          const art = document.createElement("img");
          art.src = `assets/img/juegos/${sheetCode}.svg`;
          art.alt = `Ilustración de ${game.title}`;
          art.className = "game-art";
          art.loading = "lazy";
          card.append(art);
        }
        card.append(element("p", "skills", game.skills), element("p", "description", game.description));
        const button = element("button", "secondary", "Jugar");
        button.type = "button";
        button.addEventListener("click", () => launchGame(game.id));
        card.append(button);
        if (sheetCode) {
          const links = element("p", "meta");
          const sheetLink = element("a", "", `Ficha técnica ${sheetCode}`);
          sheetLink.href = `FAND_Fichas_Tecnicas.html?juego=${sheetCode}`;
          const profileLink = element("a", "", "Mi ficha");
          profileLink.href = "FAND_Ficha_Usuario.html";
          links.append(sheetLink, " · ", profileLink);
          card.append(links);
        }
        gameGrid.append(card);
      });

      function launchGame(id) {
        if (id === "bubbles") return bubbleProfileGame();
        if (id === "hunt") return letterGame();
        if (id === "syllables") return syllableGame();
        if (id === "memory") return memoryGame();
        if (id === "quantity") return quantityGame();
        if (id === "size") return sizeSetup();
        if (id === "hanoi") return hanoiGame();
        if (id === "shopping") return shoppingGame();
        if (id === "watcher") return attentionGame("watcher");
        if (id === "robots") return attentionGame("robots");
        if (id === "go-no-go") return attentionGame("go-no-go");
        if (id === "simon") return attentionGame("simon");
        if (id === "stop") return goNoGoGame();
      }

      window.addEventListener("load", () => {
        const requested = new URLSearchParams(location.search).get("jugar");
        const entry = Object.entries(sheetByGame).find(([, code]) => code === (requested || "").toUpperCase());
        if (entry) launchGame(entry[0]);
      });

      function bubbleProfileGame() {
        const target = "🐼";
        const distractors = ["🐸", "🦊", "🐻", "🐵", "🐯"];
        const bubbleColors = ["#a9d9bd", "#98c9e5", "#f3d477", "#e9b0bf", "#c2b3e4", "#f2ba8f"];
        const taskDuration = 15000;
        const taskDefinitions = [
          { name: "Atención selectiva", instruction: `Toca el panda ${target} y evita los demás animales.`, detail: "Fíjate en el objetivo entre varios distractores." },
          { name: "Atención sostenida", instruction: `Sigue buscando el panda ${target} durante toda esta tarea.`, detail: "Aparecerán nuevas rondas de forma continua." },
          { name: "Discriminación visual", instruction: "En cada grupo, toca la burbuja de mayor tamaño.", detail: "Las burbujas cambian de tamaño en cada ronda." },
          { name: "Velocidad de respuesta", instruction: "Espera a que aparezca el panda y tócalo tan pronto como lo veas.", detail: "Si lo tocas antes de que aparezca, el intento no cuenta como respuesta válida." },
          { name: "Control inhibitorio", instruction: `Toca el panda ${target}, pero no toques la señal «ESPERA».`, detail: "Habrá señales para responder y otras para frenar la respuesta." },
          { name: "Coordinación visomotora", instruction: `Toca el panda ${target} mientras las burbujas se mueven.`, detail: "La precisión del toque requiere ratón o pantalla táctil." },
          { name: "Flexibilidad cognitiva", instruction: "Sigue la regla que aparece: elige la burbuja mayor o la menor.", detail: "La regla alterna entre rondas." },
          { name: "Consistencia del rendimiento", instruction: "Repite la misma tarea: espera la señal y toca el panda.", detail: "Se observa cuánto varían los tiempos entre intentos comparables." }
        ];
        const { board, status } = makeActivity("Burbujas en movimiento", "Completa ocho tareas breves. La partida dura dos minutos y presenta observaciones provisionales de ocho capacidades, sin comparar con otras personas ni emitir un diagnóstico.");
        const setup = element("div", "circle-game-setup");
        const intro = element("p", "prompt", "Harás ocho tareas, de unos 15 segundos cada una. Al finalizar verás una tabla con las aptitudes y cómo se midió cada una en tu partida, seguida de una barra de puntuación del 1 al 10. Las notas son provisionales: todavía no indican si un resultado es bajo, esperado o alto.");
        const start = element("button", "primary", "Empezar");
        start.type = "button";
        setup.append(intro, start);
        board.append(setup);
        status.textContent = "Las puntuaciones no tienen baremos validados ni se guardan o envían automáticamente.";

        start.addEventListener("click", startGame);

        function startGame() {
          const totalDuration = taskDuration * taskDefinitions.length;
          const info = element("div", "bubble-game-info");
          const clock = element("strong", "", "Tiempo: 02:00");
          const taskLabel = element("span", "", "Tarea 1 de 8");
          info.append(clock, taskLabel);
          const taskBoard = element("div", "bubble-task-board");
          const prompt = element("div", "bubble-task-prompt");
          const title = element("strong");
          const detail = element("span");
          prompt.append(title, detail);
          const area = element("div", "bubble-task-area");
          area.setAttribute("aria-live", "polite");
          taskBoard.append(prompt, area);
          board.replaceChildren(info, taskBoard);

          const data = taskDefinitions.map(() => ({
            trials: 0, correct: 0, omissions: 0, distractorResponses: 0,
            responseTimes: [], centerErrors: [], goTrials: 0, goHits: 0,
            noGoTrials: 0, commissions: 0, falseStarts: 0,
            segments: Array.from({ length: 3 }, () => ({ trials: 0, correct: 0 }))
          }));
          const startTime = performance.now();
          let taskIndex = -1;
          let taskStart = startTime;
          let roundNumber = 0;
          let round = null;
          let finished = false;
          let timer = 0;
          const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
          const inhibitionSchedule = Array.from({ length: 5 }, () => {
            const block = [true, true, false];
            for (let index = block.length - 1; index > 0; index--) {
              const other = Math.floor(Math.random() * (index + 1));
              [block[index], block[other]] = [block[other], block[index]];
            }
            return block;
          }).flat();

          const average = values => values.length ? values.reduce((sum, value) => sum + value, 0) / values.length : null;
          function median(values) {
            if (!values.length) return null;
            const sorted = [...values].sort((a, b) => a - b);
            const middle = Math.floor(sorted.length / 2);
            return sorted.length % 2 ? sorted[middle] : (sorted[middle - 1] + sorted[middle]) / 2;
          }
          function deviation(values) {
            if (values.length < 2) return null;
            const mean = average(values);
            return Math.sqrt(average(values.map(value => (value - mean) ** 2)));
          }
          const clamp = value => Math.max(0, Math.min(1, value));
          const rate = (count, total) => total ? `${Math.round(count / total * 100)} % (${count} de ${total})` : "No hubo intentos evaluables";
          const formatTime = value => value === null ? "Sin datos suficientes" : `${Math.round(value)} ms`;
          const accuracyScore = task => task.trials >= 3 ? 1 + 9 * task.correct / task.trials : null;
          function scoreSummary(scores) {
            const available = scores.filter(score => score.value !== null);
            if (!available.length) return "No hubo observaciones suficientes para resumir esta partida.";
            if (available.length === 1) return `Solo hubo datos suficientes para ${available[0].name} (${available[0].value}/10). En las demás aptitudes no hubo suficientes observaciones para compararlas.`;
            const highest = Math.max(...available.map(score => score.value));
            const lowest = Math.min(...available.map(score => score.value));
            const highestNames = available.filter(score => score.value === highest).map(score => score.name).join(", ");
            const lowestNames = available.filter(score => score.value === lowest).map(score => score.name).join(", ");
            if (highest === lowest) return `Las puntuaciones disponibles fueron iguales: ${highestNames} (${highest}/10). La comparación solo describe las tareas de este juego.`;
            return `En esta partida, las puntuaciones más altas fueron en ${highestNames} (${highest}/10) y las más bajas en ${lowestNames} (${lowest}/10). La comparación solo describe las tareas de este juego.`;
          }
          function renderResult() {
            if (finished) return;
            finished = true;
            window.clearInterval(timer);
            const scores = makeScores();
            const result = element("section", "bubble-result");
            result.setAttribute("aria-live", "polite");
            result.append(element("p", "bubble-report-date", "FAND · Propuesta de evaluación por capacidades"));
            result.append(element("h4", "", "Juego de burbujas: puntuaciones y orientación para una consulta profesional"));
            result.append(element("p", "bubble-score-note", "Resultado de esta partida · Las puntuaciones de 1 a 10 son provisionales; todavía no existen valores de referencia validados para este juego."));
            result.append(element("h5", "", "Perfil de aptitudes · puntuación del 1 al 10"));
            result.append(element("p", "bubble-score-profile-note", "Cada bloque numerado representa un punto de la puntuación. Las notas se calculan a partir de tus respuestas, tiempos y precisión en las tareas; no se usa una IA para inferir ni diagnosticar neurodivergencias. «Sin datos» significa que faltaron intentos para calcular una puntuación."));
            const cards = element("div", "bubble-score-grid");
            scores.forEach(score => {
              const card = element("article", "bubble-score-card");
              card.dataset.score = score.value === null ? "" : String(score.value);
              card.append(element("h5", "", score.name));
              card.append(element("strong", "", score.value === null ? "Sin datos" : `${score.value} / 10`));
              card.append(element("p", "bubble-score-explanation", score.explanation));
              const segments = element("div", "bubble-score-segments");
              segments.setAttribute("role", "img");
              segments.setAttribute("aria-label", score.value === null ? `${score.name}: sin datos suficientes en una escala de 1 a 10` : `${score.name}: ${score.value} de 10`);
              for (let index = 1; index <= 10; index++) {
                const segment = element("span", score.value !== null && index <= score.value ? "filled" : "");
                segment.setAttribute("aria-hidden", "true");
                segment.textContent = String(index);
                segments.append(segment);
              }
              card.append(segments);
              card.append(element("div", "bubble-score-scale-labels", "1 · puntuación mínima"));
              card.lastChild.append(document.createTextNode("10 · puntuación máxima"));
              card.append(element("p", "bubble-score-observation", `Dato de esta partida: ${score.raw}`));
              cards.append(card);
            });
            result.append(cards);
            result.append(element("p", "bubble-score-summary", `Resumen explicativo: ${scoreSummary(scores)}`));
            result.append(element("h5", "", "Qué se valoró y cómo se midió"));
            const tableWrap = element("div", "bubble-score-table-wrap");
            const scoreTable = element("table", "bubble-score-table");
            const tableHead = document.createElement("thead");
            const headingRow = document.createElement("tr");
            ["Capacidad", "Qué significa", "Cómo se midió en esta partida"].forEach(label => headingRow.append(element("th", "", label)));
            tableHead.append(headingRow);
            const tableBody = document.createElement("tbody");
            scores.forEach(score => {
              const row = document.createElement("tr");
              [score.name, score.explanation, score.raw].forEach(value => row.append(element("td", "", value)));
              tableBody.append(row);
            });
            scoreTable.append(tableHead, tableBody);
            tableWrap.append(scoreTable);
            result.append(tableWrap);
            const guidance = element("div", "bubble-interpretation");
            guidance.append(element("h5", "", "Cómo interpretar el perfil"));
            guidance.append(element("p", "", "Las barras muestran puntuaciones de 1 a 10; una puntuación más alta representa un resultado mayor en la tarea correspondiente. Aún no se pueden clasificar como bajas, esperadas o altas ni comparar con otras personas. Una puntuación alta tampoco descarta dificultades cotidianas."));
            guidance.append(element("p", "", "El perfil describe lo ocurrido en este juego. No identifica ni descarta autismo, TDAH u otra neurodivergencia."));
            guidance.append(element("p", "", "Si hay dificultades persistentes que afectan al bienestar, el aprendizaje, el trabajo o las relaciones, puedes compartir el informe con pediatría, medicina de familia o un profesional de neurodesarrollo o salud mental y pedir orientación. Una partida aislada no permite recomendar ni descartar un diagnóstico."));
            result.append(guidance);
            const pdfButton = element("button", "secondary", "Preparar informe explicado");
            pdfButton.type = "button";
            pdfButton.addEventListener("click", () => openReport(scores));
            result.append(pdfButton);
            board.append(result);
            status.textContent = "Partida finalizada. El perfil provisional no se ha enviado ni guardado automáticamente; puedes descargar el informe en PDF.";
            result.scrollIntoView({ behavior: "smooth", block: "start" });
          }

          function makeScores() {
            const selective = data[0];
            const sustained = data[1];
            const visual = data[2];
            const speed = data[3];
            const inhibition = data[4];
            const coordination = data[5];
            const flexibility = data[6];
            const consistency = data[7];
            const speedObservations = [...speed.responseTimes, ...Array.from({ length: speed.omissions }, () => 2200)];
            const speedMedian = median(speedObservations);
            const consistencyMean = average(consistency.responseTimes);
            const consistencySd = deviation(consistency.responseTimes);
            const cv = consistencyMean && consistencySd !== null ? consistencySd / consistencyMean : null;
            const meanError = average(coordination.centerErrors);
            const inhibitionTrials = inhibition.noGoTrials;
            const sustainedSegments = sustained.segments.filter(segment => segment.trials > 0);
            const sustainedRates = sustainedSegments.map(segment => segment.correct / segment.trials);
            const sustainedScore = sustained.trials >= 3 && sustainedSegments.length === 3
              ? 1 + 9 * average(sustainedRates)
              : null;
            const taskDescriptions = [
              "Capacidad para centrarse en el objetivo e ignorar estímulos parecidos. Se observa al elegir el panda entre otros animales.",
              "Capacidad para mantener la respuesta en una actividad continua. Se observan rondas repetidas durante 15 segundos y sus aciertos por intervalos.",
              "Capacidad para distinguir tamaños. Se observa al elegir la burbuja más grande de cada grupo.",
              "Tiempo entre la aparición de una señal y el toque. También puede depender del dispositivo y de la familiaridad con la tarea.",
              "Capacidad para frenar una respuesta ante una señal de espera. Se cuentan las veces que se toca esa señal cuando la regla pide no tocarla.",
              "Coordinación entre lo que se ve y el toque. Se observa la distancia al centro de un objetivo móvil; requiere ratón o pantalla táctil.",
              "Capacidad para adaptarse a una regla que cambia. Se alterna entre elegir la burbuja mayor y la menor.",
              "Estabilidad de los tiempos en una tarea repetida. Se calcula con la variación de los tiempos, no con su rapidez media."
            ];
            return [
              { name: taskDefinitions[0].name, value: accuracyScore(selective), explanation: taskDescriptions[0], raw: `Elecciones correctas: ${rate(selective.correct, selective.trials)}; distractores tocados: ${selective.distractorResponses}; rondas omitidas: ${selective.omissions}.` },
              { name: taskDefinitions[1].name, value: sustainedScore, explanation: taskDescriptions[1], raw: `Aciertos en tres intervalos consecutivos: ${sustained.segments.map(segment => rate(segment.correct, segment.trials)).join("; ")}. Cada intervalo cuenta por igual para mostrar posibles cambios durante la tarea.` },
              { name: taskDefinitions[2].name, value: accuracyScore(visual), explanation: taskDescriptions[2], raw: `Burbujas mayores elegidas correctamente: ${rate(visual.correct, visual.trials)}.` },
              { name: taskDefinitions[3].name, value: speedObservations.length >= 3 && speedMedian !== null ? 1 + 9 * (1 - clamp(speedMedian / 2200)) : null, explanation: taskDescriptions[3], raw: `Tiempo mediano (las señales sin respuesta cuentan como 2200 ms): ${formatTime(speedMedian)}; respuestas válidas: ${speed.responseTimes.length}; señales sin respuesta: ${speed.omissions}; anticipaciones: ${speed.falseStarts}.` },
              { name: taskDefinitions[4].name, value: inhibitionTrials >= 3 && inhibition.goTrials >= 3 ? 1 + 9 * ((inhibitionTrials - inhibition.commissions) / inhibitionTrials + inhibition.goHits / inhibition.goTrials) / 2 : null, explanation: taskDescriptions[4], raw: `Señales «ESPERA» no tocadas: ${rate(inhibitionTrials - inhibition.commissions, inhibitionTrials)}; respuestas al panda: ${rate(inhibition.goHits, inhibition.goTrials)}. La puntuación combina ambas proporciones.` },
              { name: taskDefinitions[5].name, value: coordination.centerErrors.length >= 3 && meanError !== null ? 1 + 9 * (1 - clamp(meanError / 100)) : null, explanation: taskDescriptions[5], raw: `Distancia media al centro: ${meanError === null ? "sin mediciones táctiles" : `${meanError.toFixed(1)} % del radio`}; objetivos tocados: ${coordination.correct} de ${coordination.trials}; distractores tocados: ${coordination.distractorResponses}.` },
              { name: taskDefinitions[6].name, value: accuracyScore(flexibility), explanation: taskDescriptions[6], raw: `Reglas seguidas correctamente: ${rate(flexibility.correct, flexibility.trials)}; rondas omitidas: ${flexibility.omissions}.` },
              { name: taskDefinitions[7].name, value: consistency.responseTimes.length >= 3 && cv !== null ? 1 + 9 / (1 + cv) : null, explanation: taskDescriptions[7], raw: `Tiempo mediano: ${formatTime(median(consistency.responseTimes))}; variación relativa de las respuestas registradas: ${cv === null ? "sin datos suficientes" : `${(cv * 100).toFixed(1)} %`}; omisiones: ${consistency.omissions}; anticipaciones: ${consistency.falseStarts}. Las omisiones no se tratan como tiempos iguales.` }
            ].map(score => ({ ...score, value: score.value === null ? null : Math.round(score.value) }));
          }

          function openReport(scores) {
            const escape = value => String(value).replace(/[&<>"']/g, char => ({ "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#39;" })[char]);
            const entries = scores.map(score => `<article class="bubble-report-score" data-score="${score.value === null ? "" : score.value}"><h3>${escape(score.name)} <span>${score.value === null ? "Sin datos" : `${score.value} / 10`}</span></h3><div class="bubble-report-bar" aria-label="${escape(score.name)} ${score.value === null ? "sin datos" : `${score.value} de 10`}">${Array.from({ length: 10 }, (_, index) => `<span class="${score.value !== null && index < score.value ? "filled" : ""}"></span>`).join("")}</div><p>${escape(score.explanation)}</p><p><strong>Cómo se midió en esta partida:</strong> ${escape(score.raw)}</p></article>`).join("");
            const content = `<div class="bubble-report-toolbar"><p>Se descargará el PDF directamente. No necesitas impresora.</p><button type="button" data-download-report>Descargar informe PDF</button><button type="button" data-close-report>Volver al juego</button></div><main class="bubble-report-page">
              <h1>FAND · Evaluación de capacidades</h1><p class="bubble-report-date">Juego de las burbujas · ${escape(new Date().toLocaleString("es-ES"))}</p>
              <p class="bubble-report-notice"><strong>Demostración.</strong> Las puntuaciones son provisionales; todavía no existen valores de referencia validados para este juego.</p>
              <h2>Resultados individuales: escala de 1 a 10</h2><div class="bubble-report-scores">${entries}</div>
              <h2>Resumen explicativo</h2><p>${escape(scoreSummary(scores))}</p>
              <p>Si una tarea no reunió suficientes observaciones, se indica «Sin datos». Esto no equivale a una puntuación baja. El juego todavía no dispone de valores de referencia validados, por lo que no se asignan categorías de bajo, esperado o alto.</p>
              <h2>Qué significa y qué no significa</h2><p>Este perfil describe únicamente lo ocurrido durante el juego. No identifica ni descarta autismo, TDAH u otra neurodivergencia. Una puntuación alta tampoco descarta dificultades cotidianas.</p>
              <p>El dispositivo, la edad, la visión, la comprensión de las instrucciones, el movimiento, la accesibilidad y la experiencia pueden influir. Los resultados no se guardan ni se envían automáticamente.</p>
              <h2>¿Cuándo pedir orientación?</h2><p>Si hay dificultades persistentes que afectan al bienestar, el aprendizaje, el trabajo o las relaciones, puedes compartir el informe con pediatría, medicina de familia o un profesional de neurodesarrollo o salud mental. La decisión requiere una valoración más amplia. Una partida aislada no permite recomendar ni descartar un diagnóstico.</p>
              <footer class="bubble-report-footer">Informe generado localmente en este navegador. La escala y las tareas son provisionales y no constituyen una herramienta diagnóstica.</footer></main>`;
            const panel = document.createElement("section");
            panel.id = "bubble-pdf-report";
            panel.className = "bubble-pdf-report";
            panel.setAttribute("aria-label", "Informe explicativo del perfil del juego de burbujas");
            panel.innerHTML = content;
            document.querySelector("#bubble-pdf-report")?.remove();
            document.body.append(panel);
            panel.querySelector("[data-download-report]").addEventListener("click", () => {
              downloadReportPdf(panel, "informe-perfil-burbujas-fand.pdf");
              status.textContent = "El informe PDF se ha descargado directamente en tu dispositivo.";
            });
            panel.querySelector("[data-close-report]").addEventListener("click", () => panel.remove());
            panel.scrollIntoView({ behavior: "smooth", block: "start" });
          }

          function nextRound() {
            round = null;
            if (!finished && performance.now() - taskStart < taskDuration) startRound();
          }

          function addChoiceRound(mode) {
            const task = mode === "selective" ? 0 : mode === "sustained" ? 1 : mode === "visual" ? 2 : mode === "coordination" ? 5 : 6;
            const taskMetrics = data[task];
            const sizes = mode === "visual" || mode === "flexibility" ? [44, 52, 60, 68, 76].sort(() => Math.random() - .5) : Array.from({ length: 6 }, () => 58);
            const rule = mode === "flexibility" ? roundNumber % 2 === 0 ? "mayor" : "menor" : "mayor";
            const targetIndex = mode === "visual" || mode === "flexibility"
              ? sizes.indexOf(rule === "mayor" ? Math.max(...sizes) : Math.min(...sizes))
              : Math.floor(Math.random() * sizes.length);
            const symbols = sizes.map((_, index) => index === targetIndex || mode === "visual" || mode === "flexibility" ? target : distractors[Math.floor(Math.random() * distractors.length)]);
            const shownAt = performance.now();
            const sustainedSegment = task === 1 ? Math.min(2, Math.floor((shownAt - taskStart) / (taskDuration / 3))) : -1;
            taskMetrics.trials++;
            if (mode === "flexibility") detail.textContent = `${taskDefinitions[6].instruction} Regla actual: elige la burbuja ${rule}.`;
            const grid = element("div", "bubble-choice-grid");
            round = {
              deadline: shownAt + 1900,
              timeout: () => {
                taskMetrics.omissions++;
                if (task === 1) taskMetrics.segments[sustainedSegment].trials++;
              },
              choose: (choice, event) => {
                const correct = choice === targetIndex;
                if (correct) taskMetrics.correct++;
                else if (task === 0 || task === 1 || task === 5) taskMetrics.distractorResponses++;
                if (task === 1) {
                  taskMetrics.segments[sustainedSegment].trials++;
                  if (correct) taskMetrics.segments[sustainedSegment].correct++;
                }
                if (correct && task === 5 && event.detail !== 0) {
                  const bounds = event.currentTarget.getBoundingClientRect();
                  const radius = Math.max(1, Math.min(bounds.width, bounds.height) / 2);
                  taskMetrics.centerErrors.push(Math.min(100, Math.hypot(event.clientX - bounds.left - bounds.width / 2, event.clientY - bounds.top - bounds.height / 2) / radius * 100));
                }
                if (correct && (task === 0 || task === 2 || task === 6)) taskMetrics.responseTimes.push(performance.now() - shownAt);
                roundNumber++;
                nextRound();
              }
            };
            sizes.forEach((size, index) => {
              const button = element("button", `bubble-choice${mode === "coordination" && !reduceMotion ? " moving" : ""}`, symbols[index]);
              button.type = "button";
              button.style.setProperty("--bubble-size", `${size}px`);
              const color = bubbleColors[Math.floor(Math.random() * bubbleColors.length)];
              button.style.background = `radial-gradient(circle at 34% 28%, #fff 0 7%, ${color} 72%, #6d9c84 100%)`;
              button.setAttribute("aria-label", mode === "visual" || mode === "flexibility"
                ? `Burbuja de ${size} píxeles${mode === "flexibility" ? `; elige la ${rule}` : ""}`
                : index === targetIndex ? `Objetivo ${target}` : `Distractor ${symbols[index]}`);
              button.addEventListener("click", event => {
                if (round) round.choose(index, event);
              });
              grid.append(button);
            });
            area.append(grid);
          }

          function addReactionRound(taskIndex) {
            const metrics = data[taskIndex];
            const button = element("button", "bubble-cue", "Espera…");
            button.type = "button";
            button.setAttribute("aria-label", "Espera a que aparezca el panda");
            area.append(button);
            const current = {
              cueAt: performance.now() + 650 + Math.random() * 450,
              ready: false,
              deadline: Infinity,
              timeout: () => { metrics.trials++; metrics.omissions++; },
              choose: () => {
                if (!current.ready) {
                  metrics.falseStarts++;
                  roundNumber++;
                  nextRound();
                } else {
                  metrics.responseTimes.push(performance.now() - current.shownAt);
                  roundNumber++;
                  nextRound();
                }
              }
            };
            button.addEventListener("click", () => { if (round === current) current.choose(); });
            round = current;
          }

          function addInhibitionRound() {
            const metrics = data[4];
            const go = roundNumber < inhibitionSchedule.length
              ? inhibitionSchedule[roundNumber]
              : Math.random() < 2 / 3;
            const button = element("button", `bubble-cue${go ? "" : " stop"}`, go ? target : "✋ Espera");
            button.type = "button";
            button.setAttribute("aria-label", go ? "Panda: toca" : "Señal de espera: no tocar");
            if (go) metrics.goTrials++;
            else metrics.noGoTrials++;
            const current = {
              deadline: performance.now() + 1050,
              timeout: () => { if (go) metrics.trials++; },
              choose: () => {
                if (go) { metrics.trials++; metrics.goHits++; }
                else metrics.commissions++;
                roundNumber++;
                nextRound();
              }
            };
            button.addEventListener("click", () => { if (round === current) current.choose(); });
            area.append(button);
            round = current;
          }

          function startRound() {
            if (finished || performance.now() - taskStart >= taskDuration) return;
            area.replaceChildren();
            if (taskIndex === 0) addChoiceRound("selective");
            else if (taskIndex === 1) addChoiceRound("sustained");
            else if (taskIndex === 2) addChoiceRound("visual");
            else if (taskIndex === 3 || taskIndex === 7) addReactionRound(taskIndex);
            else if (taskIndex === 4) addInhibitionRound();
            else if (taskIndex === 5) addChoiceRound("coordination");
            else addChoiceRound("flexibility");
          }

          function drawCue(now) {
            if (taskIndex !== 3 && taskIndex !== 7) return;
            if (!round || round.ready || now < round.cueAt) return;
            round.ready = true;
            round.shownAt = now;
            round.deadline = now + 2200;
            data[taskIndex].trials++;
            const button = area.querySelector(".bubble-cue");
            if (button) {
              button.textContent = target;
              button.classList.add("lit");
              button.setAttribute("aria-label", "Panda: tocar ahora");
            }
          }

          function tick() {
            if (finished) return;
            const now = performance.now();
            const elapsed = now - startTime;
            if (elapsed >= totalDuration) {
              renderResult();
              return;
            }
            const nextTask = Math.max(0, Math.min(taskDefinitions.length - 1, Math.floor(elapsed / taskDuration)));
            if (nextTask !== taskIndex) {
              taskIndex = nextTask;
              taskStart = now;
              roundNumber = 0;
              round = null;
              title.textContent = `Tarea ${taskIndex + 1} de 8 · ${taskDefinitions[taskIndex].name}`;
              detail.textContent = `${taskDefinitions[taskIndex].instruction} ${taskDefinitions[taskIndex].detail}`;
              startRound();
            }
            const left = Math.ceil((totalDuration - elapsed) / 1000);
            clock.textContent = `Tiempo: ${String(Math.floor(left / 60)).padStart(2, "0")}:${String(left % 60).padStart(2, "0")}`;
            taskLabel.textContent = `Tarea ${taskIndex + 1} de 8 · ${taskDefinitions[taskIndex].name}`;
            drawCue(now);
            if (!round || now < round.deadline) return;
            const endedTask = taskIndex;
            roundNumber++;
            round.timeout();
            if (taskIndex === endedTask) nextRound();
          }

          timer = window.setInterval(tick, 40);
          cleanups.push(() => {
            finished = true;
            window.clearInterval(timer);
          });
        }
      }

      function bubbleGame() {
        const targetAnimal = "🐼";
        const distractorAnimals = ["🐸", "🦊", "🐻", "🐵"];
        const phaseLength = 15000;
        const totalDuration = phaseLength * 4;
        const phaseSettings = [
          { label: "Ritmo inicial · sin distractores", interval: 1500, speed: 42, distractorRate: 0 },
          { label: "Ritmo más rápido · sin distractores", interval: 950, speed: 58, distractorRate: 0 },
          { label: "Ritmo rápido · con distractores", interval: 950, speed: 58, distractorRate: .35 },
          { label: "Ritmo intenso · más distractores", interval: 650, speed: 76, distractorRate: .55 }
        ];
        const { board, status } = makeActivity("Burbujas en movimiento", "Toca solo el panda mientras las burbujas suben por cinco carriles. La actividad dura un minuto y cambia gradualmente de ritmo y distractores.");
        const setup = element("div", "circle-game-setup");
        const startButton = element("button", "primary", "Empezar");
        startButton.type = "button";
        const instruction = element("p", "prompt", `Objetivo: toca únicamente las burbujas con ${targetAnimal}. Las demás son distractores. Puedes usar ratón, pantalla táctil o teclado.`);
        setup.append(instruction, startButton);
        board.append(setup);
        status.textContent = "Al finalizar se mostrarán medidas descriptivas. No hay respuestas diagnósticas.";

        startButton.addEventListener("click", startGame);

        function startGame() {
          const info = element("div", "bubble-game-info");
          const clock = element("strong", "", "Tiempo: 01:00");
          const phaseLabel = element("span", "", "Fase 1 · Ritmo inicial · sin distractores");
          const boardArea = element("div", "bubble-game-board");
          boardArea.setAttribute("aria-label", "Burbujas ascendiendo por cinco carriles");
          const lanes = Array.from({ length: 5 }, (_, index) => {
            const lane = element("div", "bubble-lane");
            lane.setAttribute("aria-label", `Carril ${index + 1}`);
            boardArea.append(lane);
            return lane;
          });
          board.replaceChildren(info, boardArea);
          info.append(clock, phaseLabel);
          const startTime = performance.now();
          let lastSpawn = startTime;
          let lastFrame = startTime;
          let updateTimer = 0;
          let complete = false;
          let lastTargetLane = null;
          const bubbles = new Set();
          const phaseData = phaseSettings.map(() => ({
            targets: 0, hits: 0, omissions: 0, distractors: 0, distractorTouches: 0,
            reactionTimes: [], contactTimes: [], centerErrors: [], pathLengths: [], laneSwitches: 0
          }));
          let backgroundTouches = 0;
          const backgroundTouchesByPhase = phaseSettings.map(() => 0);
          let backgroundTouchStart = null;
          let backgroundTouchPhase = 0;

          function phaseIndexAt(elapsed) {
            return Math.min(phaseSettings.length - 1, Math.floor(elapsed / phaseLength));
          }

          function showClock(seconds) {
            const remaining = Math.max(0, Math.ceil(seconds));
            return `${String(Math.floor(remaining / 60)).padStart(2, "0")}:${String(remaining % 60).padStart(2, "0")}`;
          }

          function resolveBubble(bubble, wasTouched, event, contactDuration, pathLength) {
            if (!bubbles.has(bubble)) return;
            const bounds = wasTouched ? bubble.button.getBoundingClientRect() : null;
            bubbles.delete(bubble);
            bubble.button.remove();
            const data = phaseData[bubble.phase];
            if (bubble.target) {
              if (wasTouched) {
                data.hits++;
                data.reactionTimes.push(Math.max(0, performance.now() - bubble.spawnedAt));
                if (lastTargetLane !== null && lastTargetLane !== bubble.laneIndex) data.laneSwitches++;
                lastTargetLane = bubble.laneIndex;
              } else data.omissions++;
            } else if (wasTouched) data.distractorTouches++;
            if (wasTouched && Number.isFinite(contactDuration)) data.contactTimes.push(contactDuration);
            if (wasTouched && Number.isFinite(pathLength)) data.pathLengths.push(pathLength);
            if (wasTouched && event && Number.isFinite(event.clientX) && Number.isFinite(event.clientY)) {
              const centerX = bounds.left + bounds.width / 2;
              const centerY = bounds.top + bounds.height / 2;
              const radius = Math.max(1, Math.min(bounds.width, bounds.height) / 2);
              data.centerErrors.push(Math.hypot(event.clientX - centerX, event.clientY - centerY) / radius * 100);
            }
          }

          function spawnBubble(now, elapsed, phase) {
            const settings = phaseSettings[phase];
            const laneIndex = Math.floor(Math.random() * lanes.length);
            const target = Math.random() >= settings.distractorRate;
            const icon = target ? targetAnimal : distractorAnimals[Math.floor(Math.random() * distractorAnimals.length)];
            const button = element("button", "bubble-item", icon);
            button.type = "button";
            button.setAttribute("aria-label", target ? `Burbuja objetivo ${targetAnimal}, carril ${laneIndex + 1}` : `Distractor ${icon}, carril ${laneIndex + 1}`);
            lanes[laneIndex].append(button);
            const bubble = {
              button, target, laneIndex, phase, y: boardArea.clientHeight + 2,
              speed: settings.speed, spawnedAt: now, pointerDownAt: null, pointerUpData: null
            };
            bubbles.add(bubble);
            if (target) phaseData[phase].targets++;
            else phaseData[phase].distractors++;
            button.addEventListener("pointerdown", event => {
              bubble.pointerUpData = null;
              bubble.pointerDownAt = {
                time: performance.now(), id: event.pointerId,
                x: event.clientX, y: event.clientY, pathLength: 0
              };
              if (button.setPointerCapture) button.setPointerCapture(event.pointerId);
            });
            button.addEventListener("pointermove", event => {
              const start = bubble.pointerDownAt;
              if (!start || start.id !== event.pointerId) return;
              start.pathLength += Math.hypot(event.clientX - start.x, event.clientY - start.y);
              start.x = event.clientX;
              start.y = event.clientY;
            });
            button.addEventListener("pointerup", event => {
              if (!bubble.pointerDownAt || bubble.pointerDownAt.id !== event.pointerId) return;
              const duration = Math.max(0, performance.now() - bubble.pointerDownAt.time);
              const pathLength = bubble.pointerDownAt.pathLength + Math.hypot(event.clientX - bubble.pointerDownAt.x, event.clientY - bubble.pointerDownAt.y);
              bubble.pointerDownAt = null;
              bubble.pointerUpData = { event, duration, pathLength };
            });
            button.addEventListener("pointercancel", () => { bubble.pointerDownAt = null; });
            button.addEventListener("click", event => {
              if (bubble.pointerUpData) {
                resolveBubble(bubble, true, bubble.pointerUpData.event, bubble.pointerUpData.duration, bubble.pointerUpData.pathLength);
              } else if (event.detail === 0) resolveBubble(bubble, true, null, null);
              else resolveBubble(bubble, true, event, null);
              bubble.pointerUpData = null;
            });
          }

          boardArea.addEventListener("pointerdown", event => {
            if (!event.target.closest(".bubble-item")) {
              backgroundTouchStart = performance.now();
              backgroundTouchPhase = phaseIndexAt(performance.now() - startTime);
            }
          });
          boardArea.addEventListener("pointerup", event => {
            if (!event.target.closest(".bubble-item") && backgroundTouchStart !== null) {
              backgroundTouches++;
              backgroundTouchesByPhase[backgroundTouchPhase]++;
            }
            backgroundTouchStart = null;
          });

          function finish() {
            if (complete) return;
            complete = true;
            bubbles.forEach(bubble => {
              if (bubble.target) phaseData[bubble.phase].targets--;
              bubbles.delete(bubble);
              bubble.button.remove();
            });
            window.clearInterval(updateTimer);
            renderResults();
          }

          function frame() {
            if (complete) return;
            const now = performance.now();
            const elapsed = now - startTime;
            if (elapsed >= totalDuration) {
              finish();
              return;
            }
            const phase = phaseIndexAt(elapsed);
            const settings = phaseSettings[phase];
            const remaining = (totalDuration - elapsed) / 1000;
            clock.textContent = `Tiempo: ${showClock(remaining)}`;
            phaseLabel.textContent = `Fase ${phase + 1} · ${settings.label}`;
            if (now - lastSpawn >= settings.interval) {
              spawnBubble(now, elapsed, phase);
              lastSpawn = now;
            }
            const delta = Math.max(0, now - lastFrame);
            bubbles.forEach(bubble => {
              bubble.y -= bubble.speed * delta / 1000;
              bubble.button.style.top = `${bubble.y}px`;
              if (bubble.y + bubble.button.offsetHeight < 0) resolveBubble(bubble, false, null, null);
            });
            lastFrame = now;
          }

          function average(values) {
            return values.length ? values.reduce((sum, value) => sum + value, 0) / values.length : null;
          }

          function standardDeviation(values) {
            if (values.length < 2) return null;
            const mean = average(values);
            return Math.sqrt(average(values.map(value => (value - mean) ** 2)));
          }

          function formatMs(value) {
            return value === null ? "—" : `${Math.round(value)} ms`;
          }

          function formatPercent(value) {
            return value === null ? "—" : `${value.toFixed(1)} %`;
          }

          function renderResults() {
            const result = element("section", "bubble-result");
            result.setAttribute("aria-live", "polite");
            result.append(element("h4", "", "Resumen descriptivo de esta partida"));
            const overall = phaseData.reduce((sum, data) => {
              Object.keys(sum).forEach(key => {
                if (Array.isArray(sum[key])) sum[key].push(...data[key]);
                else sum[key] += data[key];
              });
              return sum;
            }, { targets: 0, hits: 0, omissions: 0, distractors: 0, distractorTouches: 0, laneSwitches: 0, reactionTimes: [], contactTimes: [], centerErrors: [], pathLengths: [] });
            const hitRate = overall.targets ? overall.hits / overall.targets * 100 : null;
            const meanError = average(overall.centerErrors);
            const errorVariability = standardDeviation(overall.centerErrors);
            const pathVariability = standardDeviation(overall.pathLengths);
            const interpretation = element("p", "");
            interpretation.textContent = overall.targets
              ? `En esta partida se tocaron ${overall.hits} de ${overall.targets} objetivos (${formatPercent(hitRate)}); ${overall.omissions} salieron de la pantalla sin tocar. Se tocaron ${overall.distractorTouches} de ${overall.distractors} distractores y hubo ${backgroundTouches} toques fuera de las burbujas. La distancia media al centro fue ${formatPercent(meanError)} del radio de la burbuja. Estos son datos de esta actividad, no una puntuación clínica.`
              : "No llegaron a generarse burbujas objetivo; no se puede calcular una tasa de aciertos.";
            result.append(interpretation);
            const variability = element("p", "");
            variability.textContent = `Tiempo medio desde que aparece el objetivo hasta tocarlo: ${formatMs(average(overall.reactionTimes))}; duración media del contacto: ${formatMs(average(overall.contactTimes))}; recorrido medio del dedo durante el contacto: ${average(overall.pathLengths) === null ? "—" : `${Math.round(average(overall.pathLengths))} px`}; variabilidad del recorrido: ${pathVariability === null ? "—" : `${Math.round(pathVariability)} px`}; variabilidad de la precisión (dispersión de la distancia normalizada al centro): ${formatPercent(errorVariability)}. Cambios de carril entre aciertos: ${overall.laneSwitches}.`;
            result.append(variability);
            const domains = element("p", "");
            domains.textContent = "Qué funciones describe el juego: la distancia y la variabilidad del toque dan una pista de puntería visomotora; los objetivos que salen sin tocar describen respuestas omitidas en esta tarea; los toques a animales distractores describen respuestas no dirigidas al objetivo; los cambios de carril entre aciertos muestran si se alternaron las pistas visuales. Ninguna medida identifica por sí sola una causa ni una neurodivergencia.";
            result.append(domains);

            const table = document.createElement("table");
            const header = document.createElement("thead");
            const headerRow = document.createElement("tr");
            ["Fase", "Objetivos tocados / evaluables", "Objetivos que salieron sin tocar", "Distractores tocados / vistos", "Toques fuera de burbujas", "Tiempo medio hasta tocar", "Distancia al centro"].forEach(label => headerRow.append(element("th", "", label)));
            header.append(headerRow);
            const body = document.createElement("tbody");
            phaseData.forEach((data, index) => {
              const row = document.createElement("tr");
              const error = average(data.centerErrors);
              [
                `Fase ${index + 1}: ${phaseSettings[index].label}`,
                `${data.hits} / ${data.targets}`,
                String(data.omissions),
                `${data.distractorTouches} / ${data.distractors}`,
                String(backgroundTouchesByPhase[index]),
                formatMs(average(data.reactionTimes)),
                formatPercent(error)
              ].forEach(value => row.append(element("td", "", value)));
              body.append(row);
            });
            table.append(header, body);
            result.append(table);
            const comparisons = [
              { from: 0, to: 1, description: "En la segunda fase aumenta el ritmo de aparición y movimiento." },
              { from: 1, to: 2, description: "En la tercera fase se incorporan distractores, manteniendo el ritmo de la fase anterior." },
              { from: 2, to: 3, description: "En la cuarta fase aumentan a la vez el ritmo y la cantidad de distractores." }
            ];
            const comparison = element("div", "bubble-interpretation");
            comparison.append(element("h5", "", "¿Qué cambió al aumentar la dificultad?"));
            comparisons.forEach(item => {
              const before = phaseData[item.from];
              const after = phaseData[item.to];
              const beforeRate = before.targets ? before.hits / before.targets * 100 : null;
              const afterRate = after.targets ? after.hits / after.targets * 100 : null;
              const detail = beforeRate === null || afterRate === null
                ? "No hubo suficientes objetivos evaluables en ambas fases para compararlas."
                : `Los aciertos pasaron de ${formatPercent(beforeRate)} (${before.hits} de ${before.targets}) a ${formatPercent(afterRate)} (${after.hits} de ${after.targets}).`;
              comparison.append(element("p", "", `${item.description} ${detail} La comparación describe un cambio observado; no demuestra qué lo causó.`));
            });
            result.append(comparison);
            const referral = element("div", "bubble-interpretation");
            referral.append(element("h5", "", "¿Cuándo conviene pedir orientación profesional?"));
            referral.append(element("p", "", `En esta partida: ${overall.omissions} objetivos salieron sin tocar; se tocaron ${overall.distractorTouches} de ${overall.distractors} distractores; la distancia media al centro fue ${formatPercent(meanError)}. Estos datos pueden ayudar a explicar qué ocurrió durante el juego, pero no permiten decidir si alguien es o no neurodivergente.`));
            referral.append(element("p", "", "Si además hay dificultades que se repiten y afectan a la vida diaria —en casa, en el colegio, en el trabajo o en las relaciones—, es razonable compartir este informe con pediatría, medicina de familia o un profesional de neurodesarrollo/salud mental y pedir una valoración. Si no hay dificultades fuera del juego, esta partida aislada no basta para recomendar ni descartar un diagnóstico."));
            result.append(referral);
            const sourceNote = element("p", "");
            sourceNote.append(document.createTextNode("Variables táctiles orientadas por el estudio Bubble Popping de "));
            const source = element("a", "", "Perochon et al. (2023)");
            source.href = "https://consensus.app/papers/a-tabletbased-game-for-the-assessment-of-visual-motor-perochon-martino/1fd0731bfb9b5f32b9cb92ed6455b836/";
            source.target = "_blank";
            source.rel = "noopener noreferrer";
            sourceNote.append(source, document.createTextNode(". Esta adaptación no reproduce el protocolo de investigación, no compara con baremos y no confirma ni descarta autismo, TDAH u otra condición. El resultado puede verse afectado por el dispositivo, la edad, la comprensión de la consigna, la visión y la experiencia."));
            result.append(sourceNote);
            const pdfButton = element("button", "secondary", "Preparar informe explicado");
            pdfButton.type = "button";
            pdfButton.addEventListener("click", () => {
              const escapeHtml = value => String(value).replace(/[&<>"']/g, character => ({
                "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#39;"
              })[character]);
              const display = value => value === null ? "No hay datos suficientes" : value;
              const phaseCards = phaseData.map((data, index) => {
                const rate = data.targets ? data.hits / data.targets * 100 : null;
                return `<article class="bubble-report-phase"><h3>Fase ${index + 1}: ${escapeHtml(phaseSettings[index].label)}</h3>
                  <p><strong>Objetivos tocados:</strong> ${data.hits} de ${data.targets} (${escapeHtml(formatPercent(rate))}).</p>
                  <p><strong>Objetivos que pasaron sin tocar:</strong> ${data.omissions}.</p>
                  <p><strong>Respuestas a distractores:</strong> ${data.distractorTouches} tocados de ${data.distractors} que aparecieron.</p>
                  <p><strong>Toques fuera de las burbujas:</strong> ${backgroundTouchesByPhase[index]}.</p>
                  <p><strong>Tiempo medio para tocar:</strong> ${escapeHtml(formatMs(average(data.reactionTimes)))}.</p>
                  <p><strong>Distancia media del toque al centro:</strong> ${escapeHtml(formatPercent(average(data.centerErrors)))} del radio de la burbuja.</p></article>`;
              }).join("");
              const phaseComparisons = comparisons.map(item => {
                const before = phaseData[item.from];
                const after = phaseData[item.to];
                const beforeRate = before.targets ? before.hits / before.targets * 100 : null;
                const afterRate = after.targets ? after.hits / after.targets * 100 : null;
                const detail = beforeRate === null || afterRate === null
                  ? "No hubo suficientes objetivos evaluables en ambas fases para compararlas."
                  : `Los aciertos pasaron de ${formatPercent(beforeRate)} (${before.hits} de ${before.targets}) a ${formatPercent(afterRate)} (${after.hits} de ${after.targets}).`;
                return `<p><strong>${escapeHtml(item.description)}</strong> ${escapeHtml(detail)} Esta diferencia describe lo ocurrido; no demuestra qué la causó.</p>`;
              }).join("");
              const sourceUrl = "https://consensus.app/papers/a-tabletbased-game-for-the-assessment-of-visual-motor-perochon-martino/1fd0731bfb9b5f32b9cb92ed6455b836/";
              const reportContent = `<div class="bubble-report-toolbar"><p>El archivo se descargará directamente en tu dispositivo. No necesitas impresora ni abrir un diálogo de impresión.</p><button type="button" data-download-report>Descargar informe PDF</button><button type="button" data-close-report>Volver al juego</button></div><main class="bubble-report-page">
                  <h1>Informe del juego de burbujas</h1><p class="bubble-report-date">FAND · Resultado descriptivo de una partida · ${escapeHtml(new Date().toLocaleString("es-ES"))}</p>
                  <p class="bubble-report-notice"><strong>Para qué sirve:</strong> este juego aporta observaciones sobre puntería en pantalla, atención a un objetivo y respuestas a distractores. Puede ser una pieza informativa para compartir con un profesional; no dice por sí solo si alguien es neurodivergente.</p>
                  <h2>Resumen en palabras sencillas</h2><div class="bubble-report-summary"><p>${escapeHtml(overall.targets
                    ? `Durante el juego aparecieron ${overall.targets} objetivos que pudieron evaluarse. Se tocaron ${overall.hits} (${formatPercent(hitRate)}) y ${overall.omissions} salieron sin tocar. De ${overall.distractors} burbujas distractoras, se tocaron ${overall.distractorTouches}.`
                    : "No aparecieron objetivos suficientes para calcular una proporción de aciertos.")}</p>
                    <p>Estos números cuentan lo sucedido en esta partida. No indican por sí solos si el resultado es bueno o malo ni cómo se compara con otras personas.</p></div>
                  <h2>Resultados principales</h2><div class="bubble-report-metrics">
                    <div class="bubble-report-metric"><strong>${overall.hits} de ${overall.targets}</strong><span>Objetivos tocados: pandas que se tocaron de los que pudieron evaluarse.</span></div>
                    <div class="bubble-report-metric"><strong>${escapeHtml(formatPercent(hitRate))}</strong><span>Proporción de objetivos tocados. No es una nota ni un diagnóstico.</span></div>
                    <div class="bubble-report-metric"><strong>${overall.omissions}</strong><span>Objetivos que subieron y salieron de la pantalla sin ser tocados.</span></div>
                    <div class="bubble-report-metric"><strong>${overall.distractorTouches} de ${overall.distractors}</strong><span>Distractores tocados de todos los que aparecieron. Describe respuestas no dirigidas al objetivo en esta tarea, no impulsividad fuera de ella.</span></div>
                    <div class="bubble-report-metric"><strong>${backgroundTouches}</strong><span>Toques que cayeron fuera de las burbujas durante el juego.</span></div>
                    <div class="bubble-report-metric"><strong>${escapeHtml(display(formatMs(average(overall.reactionTimes))))}</strong><span>Tiempo desde que la burbuja aparece abajo hasta que se toca. También depende de su recorrido y velocidad, no solo de la atención.</span></div>
                    <div class="bubble-report-metric"><strong>${escapeHtml(display(formatMs(average(overall.contactTimes))))}</strong><span>Tiempo medio que duró el contacto del dedo o ratón con la burbuja.</span></div>
                    <div class="bubble-report-metric"><strong>${escapeHtml(display(formatPercent(meanError)))}</strong><span>Distancia media del toque al centro de la burbuja, expresada como parte de su radio. Un número menor significa que los toques quedaron más cerca del centro.</span></div>
                    <div class="bubble-report-metric"><strong>${escapeHtml(display(average(overall.pathLengths) === null ? null : `${Math.round(average(overall.pathLengths))} píxeles`))}</strong><span>Recorrido medio registrado del dedo o ratón mientras se mantuvo pulsado. Depende del dispositivo y del tipo de toque.</span></div>
                  </div>
                  <p><strong>Variación entre toques:</strong> la distancia al centro varió ${escapeHtml(display(formatPercent(errorVariability)))}; el recorrido del dedo o ratón varió ${escapeHtml(display(pathVariability === null ? null : `${Math.round(pathVariability)} píxeles`))}. La variación solo indica cuánto cambiaron las mediciones entre sí en esta partida; no significa por sí sola una dificultad.</p>
                  <p><strong>Otros datos:</strong> hubo ${overall.laneSwitches} cambios de carril entre objetivos tocados y ${backgroundTouches} toques en el fondo que no acertaron a una burbuja.</p>
                  <h2>Qué funciones se observan</h2>
                  <p><strong>Puntería visomotora:</strong> la distancia del toque al centro y cuánto varía entre toques describen la precisión dentro de esta actividad. No son una prueba motora estandarizada.</p>
                  <p><strong>Atención al objetivo:</strong> los pandas que salen de la pantalla sin tocarse son omisiones de esta tarea. El juego no puede decir por qué ocurrió cada omisión.</p>
                  <p><strong>Respuestas a distractores:</strong> el número de distractores tocados se compara con cuántos aparecieron. Describe respuestas no dirigidas al panda en el juego; no prueba impulsividad ni TDAH por sí solo.</p>
                  <p><strong>Exploración visual:</strong> los cambios de carril entre aciertos indican si la persona alternó entre zonas de la pantalla. No se consideran mejores o peores por sí solos.</p>
                  <h2>Cambios al aumentar la dificultad</h2><p>Las fases consecutivas ayudan a observar qué ocurre al aumentar el ritmo o añadir distractores. Son descripciones funcionales, no umbrales de normalidad.</p>
                  ${phaseCards}${phaseComparisons}
                  <h2>¿Conviene pedir una valoración?</h2>
                  <p>En esta partida hubo ${overall.omissions} objetivos que salieron sin tocar, ${overall.distractorTouches} respuestas a ${overall.distractors} distractores y una distancia media al centro de ${escapeHtml(formatPercent(meanError))}. Comparte estas observaciones con un profesional si también coinciden con dificultades repetidas en la vida diaria.</p>
                  <p>Si las dificultades afectan al bienestar, el aprendizaje, el trabajo o las relaciones, sería razonable pedir una valoración a pediatría o medicina de familia, o a un profesional de neurodesarrollo o salud mental. Llevar este informe puede ayudar a explicar la preocupación, pero la decisión debe basarse en una evaluación más amplia.</p>
                  <p>Si no hay preocupaciones fuera del juego, una partida aislada no basta para recomendar ni descartar un diagnóstico. Esta adaptación no tiene baremos ni puntos de corte validados.</p>
                  <h2>Guía rápida para entender las medidas</h2>
                  <p class="bubble-report-definition"><strong>Acierto:</strong> tocar una burbuja con el panda, que es el objetivo del juego.</p>
                  <p class="bubble-report-definition"><strong>Omisión:</strong> un panda que salió de la pantalla sin tocarse. Los objetivos que seguían en pantalla al acabar no se cuentan como omisiones.</p>
                  <p class="bubble-report-definition"><strong>Distractor:</strong> una burbuja con otro animal. El juego pide no tocarla; el informe cuenta cuántas se tocaron.</p>
                  <p class="bubble-report-definition"><strong>Distancia al centro:</strong> estima dónde cayó el toque dentro de la burbuja. Es una medida orientativa de puntería en pantalla, no una evaluación clínica de motricidad.</p>
                  <p class="bubble-report-definition"><strong>Variación:</strong> indica cuánto se diferenciaron unos toques de otros. No es lo mismo que un error y no tiene un límite de normalidad definido aquí.</p>
                  <h2>Límites importantes</h2><p>El juego no permite saber si una persona es neurodivergente. No evalúa, entre otras cosas, comunicación social, intereses y rutinas, hiperactividad en otros contextos, historia del desarrollo ni dificultades de aprendizaje específicas.</p>
                  <p>También influyen la velocidad y posición de las burbujas, el dispositivo, el tamaño de pantalla, la edad, la visión, la comprensión de la consigna y la práctica. Las cifras describen esta partida, no comparan con otras personas.</p>
                  <p class="bubble-report-small">Estudios han investigado tareas táctiles de burbujas para describir señales visomotoras y atencionales, entre ellas en grupos de niños autistas o con TDAH. Eso no significa que este juego pueda identificarlos: esta adaptación de FAND no reproduce ni ha sido validada como cribado individual.</p>
                  <p class="bubble-report-small">Variables táctiles inspiradas en el estudio Bubble Popping de Perochon et al. (2023).</p>
                  <p class="bubble-report-small bubble-report-source">Referencia: <a href="${sourceUrl}">${sourceUrl}</a></p>
                  <footer class="bubble-report-footer">Informe generado en este navegador a petición de la persona usuaria. FAND no recibe estos resultados. Las medidas del dispositivo y la interacción pueden ser imprecisas.</footer>
                </main>`;
              const reportPanel = document.createElement("section");
              reportPanel.id = "bubble-pdf-report";
              reportPanel.className = "bubble-pdf-report";
              reportPanel.setAttribute("aria-label", "Informe explicativo del juego de burbujas");
              reportPanel.innerHTML = reportContent;
              document.body.querySelector("#bubble-pdf-report")?.remove();
              document.body.append(reportPanel);
              reportPanel.querySelector("[data-download-report]").addEventListener("click", () => {
                downloadReportPdf(reportPanel, "informe-burbujas-fand.pdf");
                status.textContent = "El informe PDF se ha descargado directamente en tu dispositivo.";
              });
              reportPanel.querySelector("[data-close-report]").addEventListener("click", () => reportPanel.remove());
              reportPanel.scrollIntoView({ behavior: "smooth", block: "start" });
              status.textContent = "El informe explicado está abierto al final de la página. Puedes descargarlo directamente como PDF; no necesitas impresora.";
            });
            result.append(pdfButton);
            board.append(result);
            status.textContent = "Partida finalizada. Los resultados no se han enviado ni guardado automáticamente; puedes crear un informe sencillo y guardarlo como PDF.";
          }

          cleanups.push(() => {
            complete = true;
            window.clearInterval(updateTimer);
          });
          updateTimer = window.setInterval(frame, 50);
        }
      }

      function letterGame() {
        const { board, status } = makeActivity("Encuentra la letra", "Pulsa cada aparición de la letra objetivo.");
        const alphabet = ["a", "e", "i", "o", "u", "m", "n", "r", "t"];
        const target = alphabet[Math.floor(Math.random() * alphabet.length)];
        const letters = Array.from({ length: 25 }, () => alphabet[Math.floor(Math.random() * alphabet.length)]);
        for (let i = 0; i < 3; i++) letters[Math.floor(Math.random() * letters.length)] = target;
        const total = letters.filter(letter => letter === target).length;
        let found = 0;
        status.textContent = `Encuentra todas las letras «${target}».`;
        const grid = element("div", "letter-grid");
        letters.forEach(letter => {
          const button = element("button", "choice", letter);
          button.type = "button";
          button.addEventListener("click", () => {
            if (button.disabled) return;
            if (letter === target) {
              button.disabled = true;
              button.classList.add("selected");
              found++;
              status.textContent = found === total ? "¡Las encontraste todas!" : `¡Encontrada! Te quedan ${total - found}.`;
            } else status.textContent = `Esa es «${letter}». Busca la «${target}».`;
          });
          grid.append(button);
        });
        board.append(element("p", "stimulus", `Letra objetivo: ${target.toLocaleUpperCase("es")}`), grid);
      }

      function syllableGame() {
        const { board, status } = makeActivity("Caza la sílaba", "Selecciona las palabras que empiezan por «pa».");
        const targets = new Set(["pato", "pala", "papel"]);
        const selected = new Set();
        const grid = element("div", "word-grid");
        ["pato", "mesa", "pala", "luna", "papel", "mapa"].forEach(word => {
          const button = element("button", "choice", word);
          button.type = "button";
          button.addEventListener("click", () => {
            if (selected.has(word)) {
              selected.delete(word);
              button.classList.remove("selected");
            } else {
              selected.add(word);
              button.classList.add("selected");
            }
          });
          grid.append(button);
        });
        const check = element("button", "secondary", "Comprobar");
        check.type = "button";
        check.addEventListener("click", () => {
          const correct = selected.size === targets.size && [...targets].every(word => selected.has(word));
          status.textContent = correct ? "¡Muy bien! Encontraste las tres palabras." : "Fíjate en el sonido inicial y prueba otra combinación.";
        });
        board.append(element("p", "stimulus", "PA"), grid, check);
      }

      function memoryGame() {
        const { board, status } = makeActivity("Recuerda la secuencia · memoria espacial", "Observa los cuadrados iluminados y pulsa sus posiciones en el mismo orden. El tablero tiene siempre 16 posiciones y la velocidad de presentación es constante.");
        let phase = "setup";
        let sequenceLength = 2;
        let errors = 0;
        let trialNumber = 0;
        let maxCorrectLength = 0;
        let finished = false;
        let response = [];
        let responseStartedAt = 0;
        let trialStartedAt = 0;
        let firstResponseMs = null;
        let responseTimes = [];
        let lastResponseAt = null;
        let attempts = [];
        let sequence = [];
        let flashIndex = 0;
        const boardGrid = element("div", "spatial-span-grid");
        const cells = [];
        for (let index = 0; index < 16; index++) {
          const cell = element("button", "spatial-span-cell", "");
          cell.type = "button";
          cell.disabled = true;
          cell.setAttribute("aria-label", `Posición ${index + 1}`);
          cell.dataset.position = String(index);
          cell.addEventListener("click", () => selectPosition(index));
          cells.push(cell);
          boardGrid.append(cell);
        }
        const instruction = element("p", "stimulus", "Practica primero con una secuencia corta. Durante la evaluación, una respuesta incorrecta cuenta como un error y la siguiente secuencia se acorta.");
        const info = element("div", "bubble-game-info");
        const levelLabel = element("strong", "", "Práctica");
        const errorLabel = element("span", "", "Errores: 0 de 3");
        const bestLabel = element("span", "", "Secuencia máxima correcta: 0");
        const trialLabel = element("span", "", "Intentos: 0");
        info.append(levelLabel, errorLabel, bestLabel, trialLabel);
        const start = element("button", "primary", "Empezar práctica");
        start.type = "button";
        const replay = element("button", "secondary", "Volver a empezar");
        replay.type = "button";
        replay.hidden = true;
        board.append(instruction, info, boardGrid, start, replay);
        status.textContent = "La actividad solo utiliza y muestra datos de esta partida; no se envían automáticamente.";

        function makeSequence(length) {
          const positions = Array.from({ length: 16 }, (_, index) => index);
          for (let index = positions.length - 1; index > 0; index--) {
            const other = Math.floor(Math.random() * (index + 1));
            [positions[index], positions[other]] = [positions[other], positions[index]];
          }
          return positions.slice(0, length);
        }

        function updateLabels() {
          levelLabel.textContent = ["setup", "practice", "practice-show", "practice-answer", "practice-feedback", "practice-complete"].includes(phase)
            ? "Práctica"
            : `Nivel ${sequenceLength - 1} de 10 · ${sequenceLength} posiciones`;
          errorLabel.textContent = `Errores: ${errors} de 3`;
          bestLabel.textContent = `Secuencia máxima correcta: ${maxCorrectLength}`;
          trialLabel.textContent = `Intentos: ${trialNumber}`;
        }

        function disableCells(disabled) {
          cells.forEach(cell => { cell.disabled = disabled; });
        }

        function presentSequence(isPractice = false) {
          sequence = makeSequence(isPractice ? 2 : sequenceLength);
          response = [];
          responseTimes = [];
          firstResponseMs = null;
          lastResponseAt = null;
          flashIndex = 0;
          phase = isPractice ? "practice-show" : "show";
          disableCells(true);
          instruction.textContent = `Observa el orden. Secuencia de ${sequence.length} posiciones${isPractice ? " · práctica" : ""}.`;
          status.textContent = "Mira los cuadrados iluminados sin tocar el tablero.";
          schedule(flashNext, 450);
        }

        function flashNext() {
          if (flashIndex >= sequence.length) {
            cells.forEach(cell => cell.classList.remove("lit"));
            if (phase === "practice-show") {
              phase = "practice-answer";
              instruction.textContent = "En la práctica, pulsa ahora las posiciones en el mismo orden.";
              disableCells(false);
              responseStartedAt = performance.now();
              status.textContent = "Tu turno: repite la secuencia.";
              return;
            }
            phase = "answer";
            instruction.textContent = `Tu turno: repite las ${sequence.length} posiciones en el mismo orden.`;
            disableCells(false);
            responseStartedAt = performance.now();
            status.textContent = "Tu turno: pulsa los cuadrados en el orden observado.";
            return;
          }
          const cell = cells[sequence[flashIndex++]];
          cell.classList.add("lit");
          schedule(() => {
            cell.classList.remove("lit");
            schedule(flashNext, 300);
          }, 650);
        }

        function selectPosition(index) {
          if (phase !== "answer" && phase !== "practice-answer") return;
          const isPractice = phase === "practice-answer";
          response.push(index);
          const now = performance.now();
          const elapsed = now - responseStartedAt;
          responseTimes.push(lastResponseAt === null ? elapsed : now - lastResponseAt);
          lastResponseAt = now;
          if (firstResponseMs === null) firstResponseMs = elapsed;
          cells[index].classList.add("selected");
          schedule(() => cells[index].classList.remove("selected"), 180);
          const responseIndex = response.length - 1;
          if (index !== sequence[responseIndex]) {
            disableCells(true);
            if (isPractice) {
              phase = "practice-feedback";
              instruction.textContent = "En la práctica puedes volver a observar la secuencia antes de empezar la evaluación.";
              const retry = element("button", "secondary", "Repetir práctica");
              retry.type = "button";
              retry.addEventListener("click", () => {
                retry.remove();
                presentSequence(true);
              });
              start.hidden = true;
              board.insertBefore(retry, replay);
              status.textContent = "La respuesta no coincidió. La práctica no cuenta como resultado.";
              return;
            }
            submitTrial(false, responseIndex, index);
            return;
          }
          if (response.length === sequence.length) {
            disableCells(true);
            if (isPractice) {
              phase = "practice-complete";
              instruction.textContent = "¡Práctica completada! Ya puedes comenzar la evaluación adaptativa.";
              start.textContent = "Empezar evaluación";
              start.hidden = false;
              start.onclick = () => {
                start.onclick = null;
                phase = "test-ready";
                trialNumber = 0;
                errors = 0;
                sequenceLength = 2;
                maxCorrectLength = 0;
                attempts = [];
                startTrial();
              };
              status.textContent = "La práctica no cuenta para las puntuaciones.";
              return;
            }
            submitTrial(true, null, null);
            return;
          }
          status.textContent = `Correcto hasta ahora: ${response.length} de ${sequence.length} posiciones.`;
        }

        function startTrial() {
          if (finished) return;
          phase = "show";
          trialNumber++;
          updateLabels();
          start.hidden = true;
          instruction.textContent = "La prueba se adapta a tus respuestas: si aciertas, sube una posición; si fallas, baja una. Termina al cometer tres errores o completar el nivel 10.";
          trialStartedAt = performance.now();
          presentSequence(false);
        }

        function submitTrial(correct, firstErrorIndex, wrongPosition) {
          disableCells(true);
          phase = "feedback";
          const durationMs = performance.now() - trialStartedAt;
          const locationCorrect = response.filter(position => sequence.includes(position)).length;
          const orderCorrect = response.reduce((total, position, index) => total + (sequence[index] === position ? 1 : 0), 0);
          const firstErrorType = firstErrorIndex === null
            ? "Sin error"
            : sequence.includes(wrongPosition) ? "Orden" : "Ubicación";
          attempts.push({
            number: trialNumber,
            length: sequence.length,
            sequence: [...sequence],
            correct,
            response: [...response],
            locationCorrect,
            orderCorrect,
            omissions: sequence.length - response.length,
            firstErrorIndex: firstErrorIndex === null ? null : firstErrorIndex + 1,
            firstErrorType,
            firstResponseMs,
            responseTimes: [...responseTimes],
            durationMs
          });
          if (correct) {
            maxCorrectLength = Math.max(maxCorrectLength, sequence.length);
            status.textContent = `¡Secuencia correcta! Recuerda ${maxCorrectLength} posiciones como máximo.`;
            sequenceLength = Math.min(11, sequenceLength + 1);
          } else {
            errors++;
            sequenceLength = Math.max(2, sequenceLength - 1);
            status.textContent = `Esta secuencia no coincidió. Error ${errors} de 3; la siguiente tendrá ${sequenceLength} posiciones.`;
          }
          updateLabels();
          instruction.textContent = correct
            ? `Has repetido correctamente ${sequence.length} posiciones.`
            : `Primera diferencia en la posición ${firstErrorIndex + 1} de la respuesta (${firstErrorType.toLowerCase()}).`;
          const continueButton = element("button", "primary", errors >= 3 || sequenceLength === 11 && correct ? "Ver resultados" : "Mostrar siguiente secuencia");
          continueButton.type = "button";
          continueButton.addEventListener("click", () => {
            continueButton.remove();
            if (errors >= 3 || sequenceLength === 11 && correct) finishGame();
            else startTrial();
          });
          board.insertBefore(continueButton, replay);
        }

        function finishGame() {
          if (finished) return;
          finished = true;
          phase = "finished";
          disableCells(true);
          replay.hidden = false;
          start.hidden = true;
          const correctAttempts = attempts.filter(attempt => attempt.correct);
          const totalResponses = attempts.reduce((sum, attempt) => sum + attempt.response.length, 0);
          const locationsCorrect = attempts.reduce((sum, attempt) => sum + attempt.locationCorrect, 0);
          const orderCorrect = attempts.reduce((sum, attempt) => sum + attempt.orderCorrect, 0);
          const expectedResponses = attempts.reduce((sum, attempt) => sum + attempt.length, 0);
          const locationErrors = attempts.filter(attempt => attempt.firstErrorType === "Ubicación").length;
          const orderErrors = attempts.filter(attempt => attempt.firstErrorType === "Orden").length;
          const spatialAccuracy = expectedResponses ? locationsCorrect / expectedResponses : null;
          const orderAccuracy = expectedResponses ? orderCorrect / expectedResponses : null;
          const attemptsByLength = new Map();
          attempts.forEach(attempt => {
            if (!attemptsByLength.has(attempt.length)) attemptsByLength.set(attempt.length, []);
            attemptsByLength.get(attempt.length).push(attempt.correct ? 1 : 0);
          });
          const repeatGroups = [...attemptsByLength.values()].filter(group => group.length >= 2);
          const consistency = repeatGroups.length
            ? 1 - repeatGroups.reduce((sum, group) => {
              let differences = 0;
              let pairs = 0;
              for (let first = 0; first < group.length; first++) {
                for (let second = first + 1; second < group.length; second++) {
                  differences += Math.abs(group[first] - group[second]);
                  pairs++;
                }
              }
              return sum + (pairs ? differences / pairs : 0);
            }, 0) / repeatGroups.length
            : null;
          const scoreFromRate = rate => rate === null ? null : Math.max(1, Math.min(10, Math.round(1 + rate * 9)));
          const spanScore = maxCorrectLength >= 2 ? Math.min(10, maxCorrectLength - 1) : null;
          const responseTimesAll = attempts.flatMap(attempt => attempt.responseTimes);
          const meanResponseMs = responseTimesAll.length ? responseTimesAll.reduce((sum, value) => sum + value, 0) / responseTimesAll.length : null;
          const scores = [
            { name: "Memoria espacial", value: spanScore, explanation: "Longitud de la secuencia más larga que reprodujiste completamente y sin errores.", raw: `Secuencia máxima correcta: ${maxCorrectLength || "ninguna"} posición(es); nivel máximo alcanzado: ${maxCorrectLength >= 2 ? maxCorrectLength - 1 : "sin nivel completado"} de 10.` },
            { name: "Recuerdo del orden", value: scoreFromRate(orderAccuracy), explanation: "Proporción de posiciones que pulsaste exactamente en el lugar correspondiente de la secuencia.", raw: `${orderCorrect} acierto(s) de orden de ${expectedResponses} posiciones esperadas (${expectedResponses ? (orderAccuracy * 100).toFixed(1) : "0.0"} %); ${orderErrors} error(es) de orden identificados como primera diferencia; secuencias completas correctas: ${correctAttempts.length} de ${attempts.length}.` },
            { name: "Recuerdo de posiciones", value: scoreFromRate(spatialAccuracy), explanation: "Proporción de tus respuestas que correspondían a una posición que sí había aparecido, aunque el orden pudiera ser distinto.", raw: `${locationsCorrect} posiciones reconocidas de ${expectedResponses} esperadas (${expectedResponses ? (spatialAccuracy * 100).toFixed(1) : "0.0"} %); ${locationErrors} error(es) de ubicación identificados como primera diferencia; respuestas introducidas: ${totalResponses}; omisiones: ${attempts.reduce((sum, attempt) => sum + attempt.omissions, 0)}.` },
            { name: "Consistencia entre intentos", value: scoreFromRate(consistency), explanation: "Estabilidad de aciertos y errores cuando la prueba repitió longitudes de secuencia equivalentes. Se muestra solo si hubo longitudes repetidas.", raw: consistency === null ? "No hubo al menos dos intentos con la misma longitud; no hay datos suficientes para valorar la consistencia." : `Se compararon ${repeatGroups.length} longitud(es) repetida(s); consistencia media: ${(consistency * 100).toFixed(1)} %.` }
          ];
          saveProfile("J07", {
            ageGroup: "unspecified", level: "Adaptativo 2–11", valid: attempts.length >= 3, completed: errors >= 3 || maxCorrectLength >= 11,
            metrics: {
              attempts: attempts.length, maxSpan: maxCorrectLength || 0,
              orderAccuracy: orderAccuracy === null ? null : orderAccuracy * 100,
              locationAccuracy: spatialAccuracy === null ? null : spatialAccuracy * 100,
              locationErrors, orderErrors, omissions: attempts.reduce((sum, attempt) => sum + attempt.omissions, 0),
              consistency: consistency === null ? null : consistency * 100
            }
          });
          const result = element("section", "bubble-result");
          result.append(element("h4", "", "Recuerda la secuencia · resultados"));
          result.append(element("p", "bubble-score-note", "Este resumen describe únicamente cómo se resolvieron las secuencias de esta partida. Es una actividad experimental sin baremos validados: no identifica ni descarta TDAH, autismo u otra neurodivergencia."));
          const completed = attempts.length;
          const summary = correctAttempts.length
            ? `Completaste ${correctAttempts.length} de ${completed} secuencias y reprodujiste correctamente hasta ${maxCorrectLength} posiciones. Tu precisión al conservar el orden fue ${expectedResponses ? (orderAccuracy * 100).toFixed(1) : "0.0"} % y reconociste ${expectedResponses ? (spatialAccuracy * 100).toFixed(1) : "0.0"} % de las posiciones presentadas.`
            : `No se completó ninguna secuencia en esta partida. Se registraron ${completed} intentos; este resultado aislado no permite concluir que exista una dificultad de memoria.`;
          result.append(element("h5", "", "Resumen de esta partida"));
          result.append(element("p", "bubble-score-summary", `${summary} ${meanResponseMs === null ? "" : `El tiempo medio entre toques fue ${(meanResponseMs / 1000).toFixed(2)} s; se informa como dato complementario y no afecta a las puntuaciones.`} Estos datos no son un diagnóstico.`));
          result.append(element("h5", "", "Perfil provisional · escala del 1 al 10"));
          result.append(element("p", "bubble-score-profile-note", "Las puntuaciones convierten medidas de esta actividad a una escala descriptiva. No son percentiles ni se comparan con personas de referencia. «Sin datos» indica que la partida no aportó observaciones suficientes."));
          const cards = element("div", "bubble-score-grid");
          scores.forEach(score => {
            const card = element("article", "bubble-score-card");
            card.dataset.score = score.value === null ? "" : String(score.value);
            card.append(element("h5", "", score.name));
            card.append(element("strong", "", score.value === null ? "Sin datos" : `${score.value} / 10`));
            card.append(element("p", "bubble-score-explanation", score.explanation));
            const bar = element("div", "bubble-score-segments");
            bar.setAttribute("role", "img");
            bar.setAttribute("aria-label", score.value === null ? `${score.name}: sin datos suficientes en una escala del 1 al 10` : `${score.name}: ${score.value} de 10`);
            for (let point = 1; point <= 10; point++) {
              const segment = element("span", score.value !== null && point <= score.value ? "filled" : "");
              segment.setAttribute("aria-hidden", "true");
              segment.textContent = String(point);
              bar.append(segment);
            }
            card.append(bar);
            const scale = element("div", "bubble-score-scale-labels", "1 · puntuación mínima");
            scale.append(document.createTextNode(" · 10 · puntuación máxima"));
            card.append(scale, element("p", "bubble-score-observation", `Dato de esta partida: ${score.raw}`));
            cards.append(card);
          });
          result.append(cards);
          result.append(element("h5", "", "Detalle de los intentos"));
          const table = document.createElement("table");
          const head = document.createElement("thead");
          const header = document.createElement("tr");
          ["Intento", "Longitud", "Secuencia", "Respuesta", "Resultado", "Posiciones reconocidas", "Orden correcto", "Primer error", "Primera respuesta", "Media entre toques", "Tiempo total"].forEach(title => header.append(element("th", "", title)));
          head.append(header);
          const body = document.createElement("tbody");
          attempts.forEach(attempt => {
            const row = document.createElement("tr");
            [
              String(attempt.number),
              String(attempt.length),
              attempt.sequence.map(position => position + 1).join(" → "),
              attempt.response.map(position => position + 1).join(" → "),
              attempt.correct ? "Correcta" : "Error",
              `${attempt.locationCorrect} de ${attempt.length}`,
              `${attempt.orderCorrect} de ${attempt.length}`,
              attempt.firstErrorIndex === null ? "Ninguno" : `${attempt.firstErrorIndex} · ${attempt.firstErrorType}`,
              attempt.firstResponseMs === null ? "Sin datos" : `${(attempt.firstResponseMs / 1000).toFixed(2)} s`,
              attempt.responseTimes.length ? `${(attempt.responseTimes.reduce((sum, value) => sum + value, 0) / attempt.responseTimes.length / 1000).toFixed(2)} s` : "Sin datos",
              `${(attempt.durationMs / 1000).toFixed(2)} s`
            ].forEach(value => row.append(element("td", "", value)));
            body.append(row);
          });
          table.append(head, body);
          result.append(table);
          result.append(element("p", "", "Regla adaptativa de esta versión FAND: se empieza con 2 posiciones; cada secuencia correcta aumenta una posición y cada error reduce una posición (mínimo 2). La prueba termina tras 3 errores o al completar el nivel 10 (11 posiciones). La presentación es constante; el tiempo de respuesta se informa, pero no se penaliza. La atención durante la presentación y la coordinación al tocar pueden influir, así que los resultados deben interpretarse con cautela."));
          const pdf = element("button", "secondary", "Descargar informe PDF");
          pdf.type = "button";
          pdf.addEventListener("click", () => {
            result.id = "bubble-pdf-report";
            result.classList.add("bubble-pdf-report");
            downloadReportPdf(result, "informe-recuerda-la-secuencia-fand.pdf");
            status.textContent = "El informe PDF se ha descargado en tu dispositivo; no necesitas impresora.";
          });
          result.append(pdf);
          const restart = element("button", "secondary", "Volver a configurar");
          restart.type = "button";
          restart.addEventListener("click", memoryGame);
          result.append(restart);
          board.replaceChildren(result);
          status.textContent = "Partida finalizada. Consulta el perfil descriptivo y el detalle de cada intento.";
          result.scrollIntoView({ behavior: "smooth", block: "start" });
        }

        start.addEventListener("click", () => {
          if (phase === "setup") {
            start.hidden = true;
            presentSequence(true);
          }
        });
        replay.addEventListener("click", memoryGame);
        updateLabels();
      }

      function quantityGame() {
        const { board, status } = makeActivity("¿Dónde hay más?", "Compara los grupos y pulsa el que tiene más puntos.");
        const left = 2 + Math.floor(Math.random() * 5);
        let right = 2 + Math.floor(Math.random() * 5);
        while (right === left) right = 2 + Math.floor(Math.random() * 5);
        const columns = element("div", "two-columns");
        [[left, "izquierdo"], [right, "derecho"]].forEach(([amount, side]) => {
          const group = element("button", "dots");
          group.type = "button";
          group.setAttribute("aria-label", `Grupo ${side}`);
          for (let i = 0; i < amount; i++) group.append(element("span", "dot"));
          group.addEventListener("click", () => {
            status.textContent = amount === Math.max(left, right) ? "¡Correcto! Ese grupo tiene más puntos." : "Mira de nuevo: ¿qué grupo tiene más puntos?";
          });
          columns.append(group);
        });
        board.append(columns);
      }

      function sizeSetup() {
        const { board } = makeActivity("Configura «El círculo mayor»", "Elige los niveles y cómo quieres calcular la duración antes de empezar. Cada nivel avanza tras cuatro pantallas o cuando termina su tiempo.");
        const panel = element("div", "circle-game-setup");
        const levelLabel = element("label", "", "Niveles de dificultad (1 a 6)");
        levelLabel.htmlFor = "circle-level-count";
        const levelSelect = element("select");
        levelSelect.id = "circle-level-count";
        for (let count = 1; count <= 6; count++) {
          const option = element("option", "", `${count} ${count === 1 ? "nivel" : "niveles"}`);
          option.value = String(count);
          option.selected = count === 4;
          levelSelect.append(option);
        }
        const modeTitle = element("h4", "", "Duración de la prueba");
        const modes = element("div", "circle-mode-options");
        const totalMode = element("label", "circle-mode");
        const totalRadio = element("input");
        totalRadio.type = "radio";
        totalRadio.name = "circle-duration-mode";
        totalRadio.value = "total";
        totalRadio.checked = true;
        const totalCopy = document.createElement("span");
        totalCopy.append(element("strong", "", "Elegir el tiempo total"), element("small", "", "La duración se reparte por igual entre los niveles elegidos."));
        totalMode.append(totalRadio, totalCopy);

        const autoMode = element("label", "circle-mode");
        const autoRadio = element("input");
        autoRadio.type = "radio";
        autoRadio.name = "circle-duration-mode";
        autoRadio.value = "auto";
        const autoCopy = document.createElement("span");
        autoCopy.append(element("strong", "", "Calcular según niveles y tiempo por nivel"), element("small", "", "El total se calcula multiplicando los niveles por el tiempo que elijas para cada uno."));
        autoMode.append(autoRadio, autoCopy);
        modes.append(totalMode, autoMode);

        const totalControls = element("div");
        const totalSelectLabel = element("label", "", "Tiempo total");
        totalSelectLabel.htmlFor = "circle-total-time";
        const totalSelect = element("select");
        totalSelect.id = "circle-total-time";
        totalControls.append(totalSelectLabel, totalSelect);

        const autoControls = element("div", "hidden");
        const perLevelLabel = element("label", "", "Tiempo por nivel");
        perLevelLabel.htmlFor = "circle-per-level-time";
        const perLevelSelect = element("select");
        perLevelSelect.id = "circle-per-level-time";
        [15, 30, 45, 60].forEach(seconds => {
          const option = element("option", "", `${seconds} segundos`);
          option.value = String(seconds);
          option.selected = seconds === 30;
          perLevelSelect.append(option);
        });
        autoControls.append(perLevelLabel, perLevelSelect);

        const summary = element("p", "circle-setup-result");
        const note = element("p", "quiet", "El tiempo total se calcula como número de niveles × segundos por nivel. Si completas las cuatro pantallas de un nivel antes, pasarás al siguiente; por eso la partida puede terminar antes del máximo previsto.");
        const start = element("button", "primary", "Empezar juego");
        start.type = "button";
        function selectedLevels() {
          return Number(levelSelect.value);
        }
        function totalSecondsFor(levelCount, secondsPerLevel) {
          return levelCount * secondsPerLevel;
        }
        function perLevelFromTotal() {
          const selectedOption = totalSelect.selectedOptions[0];
          return Number(selectedOption.dataset.secondsPerLevel);
        }
        function refreshTotalOptions() {
          const previousPerLevel = totalSelect.selectedOptions[0]
            ? Number(totalSelect.selectedOptions[0].dataset.secondsPerLevel)
            : 30;
          totalSelect.replaceChildren();
          [15, 30, 45, 60].forEach(secondsPerLevel => {
            const totalSeconds = totalSecondsFor(selectedLevels(), secondsPerLevel);
            const option = element("option", "", `${formatDuration(totalSeconds)} total (${secondsPerLevel} s por nivel)`);
            option.value = String(totalSeconds);
            option.dataset.secondsPerLevel = String(secondsPerLevel);
            option.selected = secondsPerLevel === previousPerLevel;
            totalSelect.append(option);
          });
          if (![...totalSelect.options].some(option => option.selected)) {
            totalSelect.selectedIndex = 1;
          }
          refreshSummary();
        }
        function formatDuration(seconds) {
          const minutes = Math.floor(seconds / 60);
          const remainder = seconds % 60;
          if (!minutes) return `${remainder} s`;
          return remainder ? `${minutes} min ${remainder} s` : `${minutes} min`;
        }
        function refreshSummary() {
          const levels = selectedLevels();
          if (autoRadio.checked) {
            const secondsPerLevel = Number(perLevelSelect.value);
            summary.textContent = `Duración total calculada: ${formatDuration(totalSecondsFor(levels, secondsPerLevel))} (${levels} ${levels === 1 ? "nivel" : "niveles"} × ${secondsPerLevel} s por nivel).`;
          } else {
            summary.textContent = `Duración total: ${formatDuration(Number(totalSelect.value))}. Cada nivel tendrá ${perLevelFromTotal()} segundos como máximo.`;
          }
        }
        function refreshMode() {
          totalControls.classList.toggle("hidden", autoRadio.checked);
          autoControls.classList.toggle("hidden", !autoRadio.checked);
          refreshSummary();
        }

        levelSelect.addEventListener("change", refreshTotalOptions);
        totalSelect.addEventListener("change", refreshSummary);
        perLevelSelect.addEventListener("change", refreshSummary);
        totalRadio.addEventListener("change", refreshMode);
        autoRadio.addEventListener("change", refreshMode);
        start.addEventListener("click", () => {
          const levels = selectedLevels();
          const levelSeconds = autoRadio.checked ? Number(perLevelSelect.value) : perLevelFromTotal();
          sizeGame({ levels, levelSeconds, totalSeconds: totalSecondsFor(levels, levelSeconds) });
        });

        panel.append(levelLabel, levelSelect, modeTitle, modes, totalControls, autoControls, summary, note, start);
        refreshTotalOptions();
        board.append(panel);
      }

      function sizeGame(configuration) {
        const levels = configuration.levels;
        const levelDuration = configuration.levelSeconds;
        const totalDuration = levels * levelDuration;
        const { board, status } = makeActivity("El círculo mayor", "Busca el círculo más grande. Cada nivel presenta hasta cuatro pantallas; si agotas el tiempo del nivel, el juego continúa al siguiente.");
        const screensPerStage = 4;
        const stageNames = [
          "Quietos",
          "En movimiento",
          "Movimiento y cambio de color",
          "Movimiento y color a mayor ritmo",
          "Movimiento, color y vibración por turnos",
          "Movimiento, color, vibración y tamaño cambiante"
        ];
        const stageInstructions = [
          "Compara los círculos quietos y pulsa el más grande.",
          "Los círculos se mueven. Encuentra el más grande.",
          "Los círculos se mueven y cambian de color. El tamaño es la pista.",
          "Se mueven y cambian de color con más frecuencia. El tamaño sigue siendo la pista.",
          "Se mueven, cambian de color y vibran por turnos. Pulsa el más grande.",
          "Se mueven, cambian de color, vibran y cambian de tamaño. Compara el tamaño que ves en ese momento."
        ];
        let answeredScreens = 0;
        let levelIndex = 0;
        let levelScreens = 0;
        let score = 0;
        let mistakes = 0;
        const levelResults = stageNames.map(() => ({ answered: 0, correct: 0, incorrect: 0, responseTimes: [], targetCenterErrors: [], startedAt: null, elapsedSeconds: 0, endedBy: "" }));
        let totalRemaining = totalDuration;
        let levelRemaining = levelDuration;
        const startedAt = Date.now();
        const totalDeadline = startedAt + totalDuration * 1000;
        let levelDeadline = startedAt + levelDuration * 1000;
        levelResults[0].startedAt = startedAt;
        let finished = false;
        let vibrationIndex = 0;
        let circles = [];
        let targetIndex = -1;
        let screenAnswered = false;
        let motionTimer = 0;
        let previousMotionTime = Date.now();
        const colors = ["#36a76a", "#4395ca", "#edb932", "#cc68a6", "#e96a4c", "#8173cc"];

        const info = element("div", "circle-game-info");
        const timeLabel = element("strong", "", `Prueba: ${formatClock(totalDuration)}`);
        const levelTimeLabel = element("span", "circle-level-time", `Nivel: ${formatClock(levelDuration)}`);
        const stageLabel = element("span", "", "Nivel 1 · Quietos");
        const screenLabel = element("span", "", "Pantalla 1 de 4");
        const screenCountLabel = element("span", "", "Pantallas: 0");
        const progress = element("div", "circle-game-progress");
        progress.setAttribute("role", "progressbar");
        progress.setAttribute("aria-label", "Tiempo restante");
        progress.setAttribute("aria-valuemin", "0");
        progress.setAttribute("aria-valuemax", String(levelDuration));
        progress.setAttribute("aria-valuenow", String(levelDuration));
        const progressBar = element("span");
        progressBar.style.width = "100%";
        progress.append(progressBar);
        info.append(timeLabel, levelTimeLabel, stageLabel, screenLabel, screenCountLabel, progress);

        function formatClock(seconds) {
          const value = Math.max(0, Math.ceil(seconds));
          return `${String(Math.floor(value / 60)).padStart(2, "0")}:${String(value % 60).padStart(2, "0")}`;
        }

        const instruction = element("p", "prompt");
        const circleBoard = element("div", "circle-game-board");
        circleBoard.setAttribute("aria-label", "Pulsa el círculo de mayor tamaño");
        board.append(info, instruction, circleBoard);
        status.textContent = stageInstructions[0];

        function currentStage() {
          return levelIndex;
        }

        function advanceLevel() {
          if (finished) return;
          const currentResult = levelResults[levelIndex];
          if (currentResult.startedAt !== null) {
            currentResult.elapsedSeconds = Math.min(levelDuration, Math.round((Date.now() - currentResult.startedAt) / 1000));
            currentResult.endedBy = levelScreens >= screensPerStage ? "Completó las cuatro pantallas" : "Se agotó el tiempo del nivel";
          }
          if (levelIndex + 1 >= levels) {
            endGame(levelScreens >= screensPerStage);
            return;
          }
          levelIndex++;
          levelScreens = 0;
          levelDeadline = Date.now() + levelDuration * 1000;
          levelResults[levelIndex].startedAt = Date.now();
          levelRemaining = levelDuration;
          levelTimeLabel.textContent = `Nivel: ${formatClock(levelDuration)}`;
          progressBar.style.width = "100%";
          progress.setAttribute("aria-valuemax", String(levelDuration));
          progress.setAttribute("aria-valuenow", String(levelDuration));
          drawScreen();
        }

        function drawScreen() {
          if (finished) return;
          const stage = currentStage();
          const screenStartedAt = performance.now();
          screenAnswered = false;
          const count = 7 + Math.floor(Math.random() * 2);
          const columns = Math.min(4, Math.max(3, Math.floor(circleBoard.clientWidth / 105)));
          const rows = Math.ceil(count / columns);
          const boardWidth = circleBoard.clientWidth;
          const boardHeight = circleBoard.clientHeight;
          const sizes = Array.from({ length: count }, () => 46 + Math.floor(Math.random() * 19));
          targetIndex = Math.floor(Math.random() * count);
          sizes[targetIndex] = 78 + Math.floor(Math.random() * 9);
          circleBoard.replaceChildren();
          circles = sizes.map((size, index) => {
            const button = element("button", `circle-game-dot${stage > 0 ? " moving" : ""}`);
            const disc = element("span");
            const col = index % columns;
            const row = Math.floor(index / columns);
            const hitSize = size + 22;
            const radius = hitSize / 2;
            const x = Math.max(radius, Math.min(boardWidth - radius, (col + .5) * boardWidth / columns + (Math.random() - .5) * Math.min(18, boardWidth / columns / 5)));
            const y = Math.max(radius, Math.min(boardHeight - radius, (row + .5) * boardHeight / rows + (Math.random() - .5) * Math.min(16, boardHeight / rows / 5)));
            button.type = "button";
            button.style.width = `${hitSize}px`;
            button.style.height = `${hitSize}px`;
            button.style.left = `${x}px`;
            button.style.top = `${y}px`;
            disc.style.width = `${size}px`;
            disc.style.height = `${size}px`;
            if (stage === 5) disc.classList.add("sizing");
            button.style.zIndex = index === targetIndex ? "1" : "0";
            if (stage >= 2) {
              const colorIndex = Math.floor(Math.random() * colors.length);
              disc.style.backgroundColor = colors[colorIndex];
              button.dataset.colorIndex = String(colorIndex);
            }
            button.setAttribute("aria-label", `Círculo ${index + 1}`);
            button.append(disc);
            function selectCircle(event) {
              if (finished || screenAnswered) return;
              screenAnswered = true;
              const currentLevel = levelResults[levelIndex];
              currentLevel.responseTimes.push(Math.max(0, performance.now() - screenStartedAt));
              if (index === targetIndex) {
                score++;
                currentLevel.correct++;
                if (event && event.type === "pointerdown" && Number.isFinite(event.clientX) && Number.isFinite(event.clientY)) {
                  const bounds = disc.getBoundingClientRect();
                  const radius = Math.max(1, Math.min(bounds.width, bounds.height) / 2);
                  currentLevel.targetCenterErrors.push(Math.hypot(event.clientX - bounds.left - bounds.width / 2, event.clientY - bounds.top - bounds.height / 2) / radius * 100);
                }
              } else {
                mistakes++;
                currentLevel.incorrect++;
              }
              currentLevel.answered++;
              answeredScreens++;
              levelScreens++;
              if (levelScreens >= screensPerStage) advanceLevel();
              else drawScreen();
            }
            button.addEventListener("pointerdown", event => {
              event.preventDefault();
              selectCircle(event);
            });
            button.addEventListener("click", event => {
              if (event.detail === 0) selectCircle(event);
            });
            circleBoard.append(button);
            return {
              button,
              disc,
              x,
              y,
              radius,
              vx: stage > 0 ? (100 + Math.random() * 75) * (Math.random() < .5 ? -1 : 1) : 0,
              vy: stage > 0 ? (80 + Math.random() * 65) * (Math.random() < .5 ? -1 : 1) : 0
            };
          });
          if (stage >= 3) {
            circles.forEach(circle => {
              circle.vx *= stage >= 3 ? 1.25 : 1;
              circle.vy *= stage >= 3 ? 1.25 : 1;
            });
          }
          const visibleStage = currentStage();
          const screenInStage = Math.min(levelScreens + 1, screensPerStage);
          stageLabel.textContent = `Nivel ${visibleStage + 1} · ${stageNames[visibleStage]}`;
          screenLabel.textContent = `Pantalla ${screenInStage} de ${screensPerStage}`;
          screenCountLabel.textContent = `Pantallas: ${answeredScreens}`;
          instruction.textContent = stageInstructions[visibleStage];
          status.textContent = stageInstructions[visibleStage];
          if (visibleStage >= 2) updateEffects();
        }

        function updateEffects() {
          const stage = currentStage();
          if (stage >= 2) {
            circles.forEach(({ disc, button }) => {
              const nextColor = (Number(button.dataset.colorIndex) + 1) % colors.length;
              button.dataset.colorIndex = String(nextColor);
              disc.style.backgroundColor = colors[nextColor];
            });
          }
          if (stage >= 4) {
            circles.forEach(({ button }) => button.classList.remove("vibrating"));
            if (circles.length) {
              circles[vibrationIndex % circles.length].button.classList.add("vibrating");
              vibrationIndex++;
            }
          }
        }

        function moveCircles(timestamp) {
          if (finished) return;
          const delta = Math.min((timestamp - previousMotionTime) / 1000, .08);
          previousMotionTime = timestamp;
          const boundsWidth = circleBoard.clientWidth;
          const boundsHeight = circleBoard.clientHeight;
          circles.forEach(circle => {
            if (currentStage() === 0) return;
            const minX = circle.radius;
            const maxX = Math.max(minX, boundsWidth - circle.radius);
            const minY = circle.radius;
            const maxY = Math.max(minY, boundsHeight - circle.radius);
            circle.x += circle.vx * delta;
            circle.y += circle.vy * delta;
            if (circle.x < minX || circle.x > maxX) {
              circle.x = Math.min(maxX, Math.max(minX, circle.x));
              circle.vx *= -1;
            }
            if (circle.y < minY || circle.y > maxY) {
              circle.y = Math.min(maxY, Math.max(minY, circle.y));
              circle.vy *= -1;
            }
            circle.button.style.left = `${circle.x}px`;
            circle.button.style.top = `${circle.y}px`;
          });
        }

        const colorTimer = window.setInterval(updateEffects, 700);
        motionTimer = window.setInterval(() => moveCircles(Date.now()), 32);
        function endGame(completedAllLevels = false) {
          if (finished) return;
          finished = true;
          const lastResult = levelResults[levelIndex];
          if (lastResult.startedAt !== null && !lastResult.endedBy) {
            lastResult.elapsedSeconds = Math.min(levelDuration, Math.round((Date.now() - lastResult.startedAt) / 1000));
            lastResult.endedBy = completedAllLevels ? "Completó las cuatro pantallas" : "Terminó la prueba";
          }
          window.clearInterval(clockTimer);
          window.clearInterval(colorTimer);
          window.clearInterval(motionTimer);
          circles.forEach(({ button }) => { button.disabled = true; button.classList.remove("vibrating"); });
          const playedSeconds = Math.floor((Date.now() - startedAt) / 1000);
          const outcome = completedAllLevels
            ? "¡Has completado todos los niveles!"
            : totalRemaining <= 0 ? "Se agotó el tiempo total." : "Se agotó el tiempo del último nivel.";
          status.textContent = `${outcome} Resultado: ${score} ${score === 1 ? "acierto" : "aciertos"} y ${mistakes} ${mistakes === 1 ? "respuesta no acertada" : "respuestas no acertadas"} de ${answeredScreens} pantallas respondidas en ${formatClock(playedSeconds)}.`;
          const report = element("section", "circle-result");
          const playedLevels = levelResults.slice(0, levelIndex + 1);
          const attemptedLevels = playedLevels.filter(item => item.startedAt !== null);
          const validResponseTimes = attemptedLevels.flatMap(item => item.responseTimes);
          const validCenterErrors = attemptedLevels.flatMap(item => item.targetCenterErrors);
          const hardestLevel = attemptedLevels[attemptedLevels.length - 1];
          const accuracyValue = item => item.answered ? item.correct / item.answered : null;
          const clampScore = value => Math.max(0, Math.min(1, value));
          const toScore = proportion => proportion === null ? null : Math.round(1 + 9 * clampScore(proportion));
          const median = values => {
            if (!values.length) return null;
            const sorted = [...values].sort((first, second) => first - second);
            const middle = Math.floor(sorted.length / 2);
            return sorted.length % 2 ? sorted[middle] : (sorted[middle - 1] + sorted[middle]) / 2;
          };
          const average = values => values.length ? values.reduce((sum, value) => sum + value, 0) / values.length : null;
          const deviation = values => {
            if (values.length < 2) return null;
            const mean = average(values);
            return Math.sqrt(average(values.map(value => (value - mean) ** 2)));
          };
          const responseMedian = median(validResponseTimes);
          const responseMean = average(validResponseTimes);
          const responseCv = responseMean && deviation(validResponseTimes) !== null ? deviation(validResponseTimes) / responseMean : null;
          const centerErrorMean = average(validCenterErrors);
          const aptitudeScores = [
            {
              name: "Discriminación visual",
              value: answeredScreens >= 3 ? toScore(score / answeredScreens) : null,
              explanation: "Aciertos al distinguir el círculo de mayor tamaño entre los círculos presentados.",
              raw: `${score} aciertos de ${answeredScreens} pantallas respondidas${answeredScreens ? ` (${(score / answeredScreens * 100).toFixed(1)} %)` : ""}.`
            },
            {
              name: "Rendimiento con mayor dificultad visual",
              value: attemptedLevels.length >= 2 && hardestLevel && hardestLevel.answered >= 3 ? toScore(accuracyValue(hardestLevel)) : null,
              explanation: "Aciertos en el nivel más difícil alcanzado, cuando los círculos incorporan más movimiento y cambios visuales.",
              raw: attemptedLevels.length < 2
                ? "Se necesitan al menos dos niveles para evaluar el rendimiento con dificultad visual añadida."
                : hardestLevel && hardestLevel.answered
                  ? `Nivel ${attemptedLevels.length}: ${hardestLevel.correct} aciertos de ${hardestLevel.answered} pantallas (${(accuracyValue(hardestLevel) * 100).toFixed(1)} %).`
                  : "No se respondieron pantallas en el nivel más difícil alcanzado."
            },
            {
              name: "Rapidez de selección",
              value: validResponseTimes.length >= 3 && responseMedian !== null ? toScore(1 - Math.min(responseMedian / 3000, 1)) : null,
              explanation: "Tiempo entre la aparición de una pantalla y la selección. También puede depender del dispositivo, la lectura de la consigna y la estrategia utilizada.",
              raw: validResponseTimes.length ? `Tiempo mediano de selección: ${Math.round(responseMedian)} ms; respuestas registradas: ${validResponseTimes.length}.` : "No se registraron tiempos de selección."
            },
            {
              name: "Precisión visomotora del toque",
              value: validCenterErrors.length >= 3 && centerErrorMean !== null ? toScore(1 - Math.min(centerErrorMean / 100, 1)) : null,
              explanation: "Distancia entre el toque y el centro visible del círculo mayor. Solo se registra con pantalla táctil o ratón.",
              raw: validCenterErrors.length
                ? `Distancia media al centro: ${centerErrorMean.toFixed(1)} % del radio; toques válidos registrados: ${validCenterErrors.length}.`
                : "No hubo suficientes selecciones con ratón o pantalla táctil para estimar esta medida."
            },
            {
              name: "Consistencia del tiempo de selección",
              value: validResponseTimes.length >= 3 && responseCv !== null ? Math.round(1 + 9 / (1 + responseCv)) : null,
              explanation: "Estabilidad de los tiempos entre pantallas respondidas; no mide si la respuesta fue correcta ni la rapidez media.",
              raw: responseCv === null
                ? `Tiempos registrados: ${validResponseTimes.length}; se necesitan al menos tres para estimar la variación.`
                : `Variación relativa de los tiempos: ${(responseCv * 100).toFixed(1)} %; respuestas registradas: ${validResponseTimes.length}.`
            }
          ];
          report.append(element("h4", "", "El círculo mayor · perfil de aptitudes"));
          report.append(element("p", "bubble-score-note", "Perfil provisional de esta partida. Los bloques numerados muestran la puntuación del 1 al 10 calculada con los datos registrados: 1 representa menor rendimiento observado y 10 mayor rendimiento en esta actividad. No hay baremos validados."));
          report.append(element("p", "bubble-score-profile-note", "El informe se calcula automáticamente con reglas transparentes a partir de las respuestas; no usa IA ni realiza un diagnóstico. «Sin datos» indica que no hubo suficientes respuestas para calcular una puntuación; no significa una puntuación baja."));
          const aptitudeCards = element("div", "bubble-score-grid");
          aptitudeScores.forEach(aptitude => {
            const card = element("article", "bubble-score-card");
            card.dataset.score = aptitude.value === null ? "" : String(aptitude.value);
            card.append(element("h5", "", aptitude.name));
            card.append(element("strong", "", aptitude.value === null ? "Sin datos" : `${aptitude.value} / 10`));
            card.append(element("p", "bubble-score-explanation", aptitude.explanation));
            const bar = element("div", "bubble-score-segments");
            bar.setAttribute("role", "img");
            bar.setAttribute("aria-label", aptitude.value === null ? `${aptitude.name}: sin datos suficientes, escala de 1 a 10` : `${aptitude.name}: ${aptitude.value} de 10`);
            for (let segmentNumber = 1; segmentNumber <= 10; segmentNumber++) {
              const segment = element("span", aptitude.value !== null && segmentNumber <= aptitude.value ? "filled" : "");
              segment.setAttribute("aria-hidden", "true");
              segment.textContent = String(segmentNumber);
              bar.append(segment);
            }
            card.append(bar);
            const scaleLabels = element("div", "bubble-score-scale-labels", "1 · puntuación mínima");
            scaleLabels.append(document.createTextNode("10 · puntuación máxima"));
            card.append(scaleLabels);
            card.append(element("p", "bubble-score-observation", `Dato de esta partida: ${aptitude.raw}`));
            aptitudeCards.append(card);
          });
          report.append(aptitudeCards);
          report.append(element("p", "bubble-score-profile-note", "Este juego no mide directamente control inhibitorio, flexibilidad cognitiva ni atención sostenida; harían falta tareas específicas para valorar esas capacidades."));
          report.append(element("h5", "", "Qué significa cada aptitud y cómo se midió"));
          const aptitudeTable = document.createElement("table");
          const aptitudeHead = document.createElement("thead");
          const aptitudeHeaderRow = document.createElement("tr");
          ["Aptitud", "Qué significa", "Cómo se midió en esta partida"].forEach(label => aptitudeHeaderRow.append(element("th", "", label)));
          aptitudeHead.append(aptitudeHeaderRow);
          const aptitudeBody = document.createElement("tbody");
          aptitudeScores.forEach(aptitude => {
            const row = document.createElement("tr");
            [aptitude.name, aptitude.explanation, aptitude.raw].forEach(value => row.append(element("td", "", value)));
            aptitudeBody.append(row);
          });
          aptitudeTable.append(aptitudeHead, aptitudeBody);
          report.append(aptitudeTable);
          report.append(element("p", "bubble-score-profile-note", "Cómo se convierten los datos: los porcentajes de acierto se transforman a la escala 1–10; la rapidez usa 3.000 ms como límite orientativo de esta versión; la precisión compara el toque con el radio del círculo; la consistencia resume la variación entre tiempos. Estas fórmulas no están validadas y no sirven para comparar con otras personas."));
          report.append(element("h4", "", "Resumen de resultados por nivel"));
          report.append(element("p", "", `Duración configurada: ${formatClock(totalDuration)} (${levels} niveles × ${formatClock(levelDuration)} por nivel). Tiempo jugado: ${formatClock(playedSeconds)}.`));
          const overallAccuracy = answeredScreens ? `${(score / answeredScreens * 100).toFixed(1)} %` : "No hay datos";
          report.append(element("p", "", `En total: ${score} aciertos de ${answeredScreens} pantallas respondidas (${overallAccuracy}) y ${mistakes} respuestas no acertadas.`));
          const reportTable = document.createElement("table");
          const reportHead = document.createElement("thead");
          const reportHeadRow = document.createElement("tr");
          ["Nivel", "Pantallas respondidas", "Aciertos", "Proporción de aciertos", "Respuestas no acertadas", "Tiempo activo"].forEach(label => reportHeadRow.append(element("th", "", label)));
          reportHead.append(reportHeadRow);
          const reportBody = document.createElement("tbody");
          levelResults.slice(0, levelIndex + 1).forEach((item, index) => {
            const row = document.createElement("tr");
            [
              `Nivel ${index + 1}: ${stageNames[index]}`,
              String(item.answered),
              String(item.correct),
              item.answered ? `${(item.correct / item.answered * 100).toFixed(1)} %` : "No hay datos",
              String(item.incorrect),
              item.startedAt === null ? "No iniciado" : formatClock(item.elapsedSeconds)
            ].forEach(value => row.append(element("td", "", value)));
            reportBody.append(row);
          });
          reportTable.append(reportHead, reportBody);
          report.append(reportTable);
          const levelEffects = [
            "Referencia visual: círculos quietos, sin cambios de color.",
            "Se añade movimiento; hay que seguir visualmente los círculos.",
            "Se añaden cambios de color, aunque el tamaño sigue siendo la pista.",
            "Aumenta el ritmo del movimiento y del cambio de color.",
            "Se añade una vibración visual breve, aplicada por turnos a los círculos.",
            "Los círculos se agrandan y se reducen mientras se mueven, cambian de color y vibran; el tamaño que hay que comparar cambia en pantalla."
          ];
          levelResults.slice(0, levelIndex + 1).forEach((item, index) => {
            report.append(element("p", "", `Nivel ${index + 1}: ${levelEffects[index]}`));
          });
          const explanation = element("p", "");
          explanation.textContent = "Cómo leerlo: si los aciertos cambian entre niveles, puede estar relacionado con las demandas visuales que se van añadiendo. En el último nivel, el tamaño visible cambia de forma continua, por lo que resulta más difícil comparar los círculos en un único vistazo. Al acumular movimiento, color, vibración y cambio de tamaño, estos datos no permiten saber cuál de esos elementos influyó más. El cambio no demuestra por sí solo un problema de atención, coordinación o percepción.";
          report.append(explanation);
          const caveat = element("p", "");
          caveat.textContent = "Este resumen describe esta partida y no compara con baremos. No diagnostica ni descarta ninguna condición.";
          report.append(caveat);
          const printReport = element("button", "secondary", "Descargar resultados como PDF");
          printReport.type = "button";
          printReport.addEventListener("click", () => {
            report.id = "circle-pdf-report";
            report.classList.add("bubble-pdf-report");
            downloadReportPdf(report, "informe-circulo-mayor-fand.pdf");
            status.textContent = "El informe PDF se ha descargado directamente en tu dispositivo; no necesitas impresora.";
          });
          report.append(printReport);
          document.querySelector("#circle-pdf-report")?.remove();
          board.append(report);
          const replay = element("button", "secondary", "Volver a configurar");
          replay.type = "button";
          replay.addEventListener("click", sizeSetup);
          board.append(replay);
          report.scrollIntoView({ behavior: "smooth", block: "start" });
        }
        const clockTimer = window.setInterval(() => {
          totalRemaining = Math.max(0, (totalDeadline - Date.now()) / 1000);
          levelRemaining = Math.max(0, (levelDeadline - Date.now()) / 1000);
          const totalSeconds = Math.ceil(totalRemaining);
          const levelSeconds = Math.ceil(levelRemaining);
          timeLabel.textContent = `Prueba: ${formatClock(totalSeconds)}`;
          levelTimeLabel.textContent = `Nivel: ${formatClock(levelSeconds)}`;
          progressBar.style.width = `${Math.max(0, Math.min(100, (levelRemaining / levelDuration) * 100))}%`;
          progress.setAttribute("aria-valuenow", String(levelSeconds));
          if (totalRemaining <= 0) {
            endGame();
          } else if (levelRemaining <= 0) {
            advanceLevel();
          }
        }, 100);
        cleanups.push(() => {
          window.clearInterval(clockTimer);
          window.clearInterval(colorTimer);
          window.clearInterval(motionTimer);
        });
        drawScreen();
      }

      function hanoiGame() {
        const levels = [
          { title: "Familiarización A", columns: 3, disks: 3, minimum: 2, focus: "Comprensión de reglas y organización espacial" },
          { title: "Familiarización B", columns: 3, disks: 3, minimum: 3, focus: "Secuenciación básica" },
          { title: "Planificación inicial A", columns: 3, disks: 4, minimum: 4, focus: "Planificación anticipatoria" },
          { title: "Planificación inicial B", columns: 4, disks: 4, minimum: 4, focus: "Selección de estrategias" },
          { title: "Varios pasos A", columns: 4, disks: 5, minimum: 5, focus: "Planificación de varios pasos" },
          { title: "Varios pasos B", columns: 4, disks: 5, minimum: 5, focus: "Planificación de varios pasos" },
          { title: "Mayor profundidad A", columns: 5, disks: 6, minimum: 6, focus: "Planificación compleja" },
          { title: "Mayor profundidad B", columns: 5, disks: 6, minimum: 6, focus: "Planificación compleja y adaptación" }
        ];
        const modules = {
          memory: { title: "Memoria de trabajo visoespacial", levelIndex: 5 },
          flexibility: { title: "Flexibilidad cognitiva", levelIndex: 4 },
          restricted: { title: "Planificación bajo restricciones", level: { title: "Columnas con capacidad", columns: 5, disks: 6, minimum: 5, capacity: 2, focus: "Planificación bajo restricciones" } },
          budget: { title: "Eficiencia con presupuesto", level: { title: "Presupuesto de movimientos", columns: 5, disks: 6, minimum: 6, budget: true, focus: "Eficiencia de planificación" } }
        };
        const startColumn = 0;
        const discColors = ["#d7eaf0", "#cde5d3", "#f2dfae", "#edcaca", "#d9d0ef", "#f2d1b0"];
        const { board, status } = makeActivity("Torres: observa, planifica y construye", "Al comienzo de cada nivel, todas las piezas aparecen apiladas en la primera columna y en el mismo orden: la pieza más pequeña arriba y la más grande abajo. Se registra el tiempo de cada nivel, sin límite ni penalización.");
        const setup = element("div", "tower-panel");
        setup.append(element("h4", "", "Elige cómo quieres jugar"));
        setup.append(element("p", "", "Hay ocho problemas progresivos —los dos primeros sirven para familiarizarse con la tarea— y módulos independientes para memoria, flexibilidad, restricciones y límite de movimientos. En todos, la torre empieza en la primera columna con la pieza más pequeña arriba y la más grande abajo. El cronómetro muestra y registra el tiempo de cada nivel, pero no hay límite ni penalización por tardar. Solo se mueve la pieza superior."));
        const modeLabel = element("label", "", "Modalidad");
        modeLabel.htmlFor = "tower-mode";
        const modeSelect = document.createElement("select");
        modeSelect.id = "tower-mode";
        [
          ["guided", "Recorrido principal (niveles 1 a 8; los dos primeros son de familiarización)"],
          ["practice", "Practicar un nivel del recorrido principal"],
          ["memory", "Módulo independiente · memoria visoespacial"],
          ["flexibility", "Módulo independiente · cambio de objetivo"],
          ["restricted", "Módulo independiente · columnas restringidas"],
          ["budget", "Módulo independiente · presupuesto de movimientos"]
        ].forEach(([value, label]) => {
          const option = element("option", "", label);
          option.value = value;
          modeSelect.append(option);
        });
        const levelLabel = element("label", "", " Nivel para practicar ");
        levelLabel.htmlFor = "tower-practice-level";
        const practiceSelect = document.createElement("select");
        practiceSelect.id = "tower-practice-level";
        levels.forEach((level, index) => {
          const option = element("option", "", `Nivel ${index + 1} · ${level.title}`);
          option.value = String(index);
          practiceSelect.append(option);
        });
        const practiceRow = element("p", "");
        practiceRow.append(levelLabel, practiceSelect);
        practiceRow.hidden = true;
        modeSelect.addEventListener("change", () => {
          practiceRow.hidden = modeSelect.value !== "practice";
          list.hidden = modeSelect.value !== "guided" && modeSelect.value !== "practice";
        });
        const list = element("ol", "tower-level-list");
        levels.forEach((level, index) => list.append(element("li", "", `${String(index + 1).padStart(2, "0")} · ${level.title} — ${level.columns} columnas, ${level.disks} piezas; solución mínima prevista de ${level.minimum} movimientos. ${level.focus}.`)));
        const start = element("button", "primary", "Empezar");
        start.type = "button";
        setup.append(modeLabel, modeSelect, practiceRow, list, element("p", "bubble-score-note", "La puntuación es provisional. Las modalidades de modelo oculto, cambio de objetivo y restricciones se interpretan por separado; no se comparan como si midieran exactamente lo mismo."), start);
        board.append(setup);
        status.textContent = "Los datos se usan solo para mostrar el informe de esta partida; no se guardan ni se envían automáticamente.";
        start.addEventListener("click", () => startRun(modeSelect.value, Number(practiceSelect.value)));

        function encode(state) { return state.join(""); }
        function topDisks(state, columns) {
          const tops = Array(columns).fill(-1);
          state.forEach((column, disk) => { if (tops[column] === -1) tops[column] = disk; });
          return tops;
        }
        function legalMoves(state, columns, capacity) {
          const tops = topDisks(state, columns);
          const counts = Array(columns).fill(0);
          state.forEach(column => { counts[column]++; });
          const moves = [];
          tops.forEach((disk, from) => {
            if (disk === -1) return;
            for (let to = 0; to < columns; to++) {
              if (to === from || (capacity && counts[to] >= capacity)) continue;
              const next = [...state];
              next[disk] = to;
              moves.push({ state: next, disk, from, to });
            }
          });
          return moves;
        }
        function shortestPath(startState, targetState, columns, capacity) {
          const startKey = encode(startState);
          const targetKey = encode(targetState);
          if (startKey === targetKey) return { distance: 0, moves: [] };
          const queue = [startState];
          const parents = new Map([[startKey, null]]);
          let found = false;
          for (let cursor = 0; cursor < queue.length && !found; cursor++) {
            const state = queue[cursor];
            for (const move of legalMoves(state, columns, capacity)) {
              const key = encode(move.state);
              if (parents.has(key)) continue;
              parents.set(key, { previous: encode(state), disk: move.disk, from: move.from, to: move.to });
              if (key === targetKey) {
                found = true;
                break;
              }
              queue.push(move.state);
            }
          }
          if (!found) return null;
          const path = [];
          let key = targetKey;
          while (key !== startKey) {
            const step = parents.get(key);
            path.push({ disk: step.disk, from: step.from, to: step.to });
            key = step.previous;
          }
          path.reverse();
          return { distance: path.length, moves: path };
        }
        function initialState(level) {
          return Array(level.disks).fill(startColumn);
        }
        function createTarget(from, level, minimum) {
          const queue = [[...from]];
          const distances = new Map([[encode(from), 0]]);
          const targets = [];
          for (let cursor = 0; cursor < queue.length; cursor++) {
            const state = queue[cursor];
            const distance = distances.get(encode(state));
            if (distance === minimum) {
              targets.push(state);
              continue;
            }
            for (const move of legalMoves(state, level.columns, level.capacity)) {
              const key = encode(move.state);
              if (distances.has(key)) continue;
              distances.set(key, distance + 1);
              queue.push(move.state);
            }
          }
          return targets.length ? { target: targets[Math.floor(Math.random() * targets.length)], optimal: minimum } : null;
        }
        function startRun(mode, practiceLevel) {
          const moduleLevel = mode === "restricted" ? modules.restricted.level : mode === "budget" ? modules.budget.level : null;
          const activeLevel = mode === "practice" ? practiceLevel : mode === "memory" ? modules.memory.levelIndex : mode === "flexibility" ? modules.flexibility.levelIndex : 0;
          const run = {
            mode,
            activeLevel,
            moduleLevel,
            memoryPhase: mode === "memory" ? "visible" : null,
            memoryTarget: null,
            records: [],
            completedObjectives: 0,
            offeredObjectives: 0,
            current: null,
            selectedColumn: null,
            hintCount: 0,
            placementChecks: [],
            ruleErrors: 0,
            undoCount: 0,
            attemptedMoves: 0,
            hideTimer: 0
          };
          cleanups.push(() => {
            if (run.levelClock) window.clearInterval(run.levelClock);
            if (run.hideTimer) window.clearTimeout(run.hideTimer);
          });
          showLevel(run, run.activeLevel, { level: moduleLevel || undefined });

          function makeBoard(title, state, columns, disks, interactive, selectedColumn, capacity) {
            const wrap = element("section", "tower-objective");
            wrap.append(element("h5", "", title));
            const grid = element("div", "tower-board");
            grid.style.setProperty("--tower-columns", String(columns));
            const tops = topDisks(state, columns);
            const counts = Array(columns).fill(0);
            state.forEach(column => { counts[column]++; });
            for (let column = 0; column < columns; column++) {
              const peg = document.createElement(interactive ? "button" : "div");
              peg.className = `tower-peg${interactive && selectedColumn === column ? " selected" : ""}`;
              if (interactive) {
                peg.type = "button";
                peg.setAttribute("aria-label", `Columna ${column + 1}, ${counts[column]} piezas${tops[column] < 0 ? ", vacía" : `, pieza superior ${tops[column] + 1}`}`);
                peg.addEventListener("click", () => selectPeg(column));
              } else peg.setAttribute("aria-label", `Columna modelo ${column + 1}, ${counts[column]} piezas`);
              for (let disk = disks - 1; disk >= 0; disk--) {
                if (state[disk] !== column) continue;
                const piece = element("span", "tower-disk", String(disk + 1));
                piece.style.setProperty("--disk-width", `${Math.max(32, 84 - (disks - disk - 1) * 9)}%`);
                piece.style.backgroundColor = discColors[disk % discColors.length];
                piece.setAttribute("aria-label", `Pieza ${disk + 1}`);
                peg.append(piece);
              }
              if (!counts[column]) peg.append(element("span", "tower-disc-base"));
              grid.append(peg);
            }
            wrap.append(grid);
            if (capacity) wrap.append(element("p", "", `Máximo ${capacity} piezas por columna.`));
            return wrap;
          }

          function showLevel(run, levelIndex, options = {}) {
            if (run.hideTimer) window.clearTimeout(run.hideTimer);
            if (run.levelClock) window.clearInterval(run.levelClock);
            const level = options.level || levels[levelIndex];
            const state = initialState(level);
            const puzzle = options.target
              ? { target: [...options.target], optimal: options.optimal }
              : createTarget(state, level, level.minimum);
            if (!puzzle) {
              status.textContent = "No se pudo generar un tablero válido para esta modalidad. Vuelve a empezar el juego.";
              return;
            }
            const startedAt = performance.now();
            const task = {
              levelIndex, level, state, target: puzzle.target, optimal: puzzle.optimal,
                moves: 0, moveActions: 0, objectivePlacements: 0, preChangePlacements: 0,
                undos: 0, ruleErrors: 0, hints: 0,
                checks: 0, placementChecks: [], startedAt, firstMoveAt: null,
              completed: false, targetChanges: 0, phaseMoves: 0, phaseOptimal: 0,
              flexibilityMoves: 0, flexibilityOptimal: 0,
              objectivesDone: 0, objectiveMoves: 0, objectiveOptimal: 0,
              budgetExceeded: false, preChangeMoves: 0, lastCheckedState: null, observedStates: new Set(),
              budget: level.budget ? puzzle.optimal + Math.max(2, Math.ceil(puzzle.optimal * .35)) : null,
              mode: run.mode,
              memoryPhase: run.memoryPhase,
              modelHidden: false
            };
            if (run.mode === "memory" && run.memoryPhase === "visible") run.memoryTarget = [...puzzle.target];
            run.current = task;
            run.selectedColumn = null;
            run.offeredObjectives += level.objectives || 1;
            observePlacement(task, run);
            drawLevel(run, true);
          }

          function observePlacement(task, run) {
            const stateKey = encode(task.state);
            if (task.observedStates.has(stateKey)) return;
            task.observedStates.add(stateKey);
            const correctlyPlaced = task.state.reduce((count, column, disk) => count + (column === task.target[disk] ? 1 : 0), 0);
            const accuracy = correctlyPlaced / task.level.disks;
            task.placementChecks.push(accuracy);
            run.placementChecks.push(accuracy);
          }

          function drawLevel(run, isNewObjective = false) {
            const task = run.current;
            if (!task) return;
            if (run.levelClock) window.clearInterval(run.levelClock);
            const { level, levelIndex } = task;
            const container = element("div", "tower-panel");
            const modeTitle = run.mode === "guided" ? `Nivel ${levelIndex + 1} de ${levels.length}` : run.mode === "practice" ? `Práctica del nivel ${levelIndex + 1}` : modules[run.mode] ? modules[run.mode].title : level.title;
            container.append(element("h4", "", `${modeTitle} · ${level.title}`));
            container.append(element("p", "", `Capacidad principal: ${level.focus}. Mueve solo la pieza superior de una columna cada vez. No hay presión de tiempo.`));
            if (run.mode === "memory") container.append(element("p", "bubble-score-note", task.memoryPhase === "visible" ? "Primera parte: reproduce el modelo visible. Después resolverás un problema equiparable sin ver el modelo." : task.modelHidden ? "Segunda parte: el modelo está oculto. Reconstruye la distribución que observaste." : "Observa el modelo durante 8 segundos; después se ocultará para que lo reproduzcas."));
            if (run.mode === "flexibility") container.append(element("p", "bubble-score-note", task.targetChanges ? "El objetivo ha cambiado de forma señalizada. Adapta tu estrategia al nuevo modelo." : "Resuelve el primer modelo; después aparecerá un nuevo objetivo claramente señalado."));
            if (level.budget) container.append(element("p", "bubble-score-note", `Presupuesto orientativo: ${task.budget} movimientos para este objetivo. Si lo superas, puedes continuar; no hay penalización ni se detiene el juego.`));
            if (level.capacity) container.append(element("p", "bubble-score-note", `La torre comienza en la misma posición de referencia que los demás niveles. El máximo de ${level.capacity} piezas se aplica a las columnas de destino al mover.`));
            if (level.objectives) container.append(element("p", "bubble-score-note", `Reto avanzado: objetivo ${task.objectivesDone + 1} de ${level.objectives}. La siguiente distribución se construye desde tu tablero actual.`));
            const objectiveWrap = element("div", "tower-objectives");
            const model = makeBoard(task.modelHidden ? "Modelo oculto durante esta parte" : "Modelo que hay que reproducir", task.target, level.columns, level.disks, false, null, level.capacity);
            model.dataset.towerModel = "true";
            model.hidden = task.modelHidden;
            objectiveWrap.append(model);
            const current = makeBoard("Tu tablero", task.state, level.columns, level.disks, true, run.selectedColumn, level.capacity);
            current.dataset.towerCurrent = "true";
            if (run.mode === "memory" && task.memoryPhase === "hidden" && !task.modelHidden) {
              current.querySelectorAll("button").forEach(button => { button.disabled = true; });
            }
            objectiveWrap.append(current);
            const info = element("div", "tower-level-info");
            info.append(element("span", "", `Acciones de movimiento: ${task.moveActions} (incluye deshacer)`));
            info.append(element("span", "", `Colocaciones: ${task.moves}`));
            info.append(element("span", "", `Deshacer: ${task.undos}`));
            info.append(element("span", "", `Mínimo calculado: ${task.optimal}`));
            if (task.budget) info.append(element("span", "", `Presupuesto: ${task.budget}`));
            const elapsed = element("span", "tower-level-clock", `Tiempo de este nivel: ${((performance.now() - task.startedAt) / 1000).toFixed(1)} s`);
            elapsed.setAttribute("aria-live", "off");
            info.append(elapsed);
            const controls = element("div", "tower-controls");
            const undo = element("button", "", `Deshacer movimiento (${task.undos})`);
            undo.type = "button";
            undo.disabled = !task.lastMove;
            undo.addEventListener("click", () => {
              if (!task.lastMove || task.completed) return;
              task.state = task.lastMove.state;
              task.lastMove = task.lastMove.previous;
              task.moveActions++;
              task.undos++;
              run.undoCount++;
              run.attemptedMoves++;
              if (run.mode === "flexibility" && task.targetChanges) task.flexibilityMoves++;
              observePlacement(task, run);
              run.selectedColumn = null;
              drawLevel(run);
              status.textContent = "Movimiento deshecho. Puedes continuar desde el tablero anterior.";
            });
            const hint = element("button", "", "Pedir una pista");
            hint.type = "button";
            hint.addEventListener("click", () => {
              const path = shortestPath(task.state, task.target, level.columns, level.capacity);
              if (!path || !path.moves.length) {
                status.textContent = "El tablero ya coincide con el modelo.";
                return;
              }
              task.hints++;
              run.hintCount++;
              const step = path.moves[0];
              status.textContent = `Pista: mueve la pieza ${step.disk + 1} de la columna ${step.from + 1} a la columna ${step.to + 1}.`;
            });
            const check = element("button", "", "Comprobar distribución");
            check.type = "button";
            check.addEventListener("click", () => {
              const currentState = encode(task.state);
              if (task.lastCheckedState === currentState) {
                status.textContent = "Esta distribución ya se comprobó. Haz al menos un movimiento para volver a registrarla.";
                return;
              }
              task.lastCheckedState = currentState;
              const correctlyPlaced = task.state.reduce((count, column, disk) => count + (column === task.target[disk] ? 1 : 0), 0);
              task.checks++;
              observePlacement(task, run);
              status.textContent = correctlyPlaced === level.disks
                ? "¡La distribución coincide con el modelo!"
                : `${correctlyPlaced} de ${level.disks} piezas están en su columna correcta. Puedes seguir planificando.`;
            });
            controls.append(undo, hint, check);
            container.append(objectiveWrap, info, controls);
            const feedback = element("p", "tower-feedback", isNewObjective ? "Nuevo objetivo generado desde tu tablero." : "");
            container.append(feedback);
            const area = element("div", "tower-game-content");
            area.append(container);
            const finish = element("button", "secondary", "Terminar y ver el informe");
            finish.type = "button";
            finish.addEventListener("click", () => finishRun(run, false));
            area.append(finish);
            board.replaceChildren(area);
            run.levelClock = window.setInterval(() => {
              if (run.current !== task || task.completed) return;
              elapsed.textContent = `Tiempo de este nivel: ${((performance.now() - task.startedAt) / 1000).toFixed(1)} s`;
            }, 100);
            status.textContent = run.mode === "memory" && task.memoryPhase === "hidden" && !task.modelHidden
              ? "Observa la distribución durante 8 segundos antes de empezar."
              : `Modelo de ${level.columns} columnas y ${level.disks} piezas.`;
            if (run.mode === "memory" && task.memoryPhase === "hidden" && !task.modelHidden && !run.hideTimer) {
              run.hideTimer = window.setTimeout(() => {
                if (run.current !== task || task.completed) return;
                task.modelHidden = true;
                drawLevel(run);
                status.textContent = "El modelo está oculto. Continúa desde lo que recuerdas.";
              }, 8000);
            }
          }

          function selectPeg(column) {
            const task = run.current;
            if (!task || task.completed) return;
            const tops = topDisks(task.state, task.level.columns);
            if (run.selectedColumn === null) {
              if (tops[column] === -1) {
                task.ruleErrors++;
                run.ruleErrors++;
                status.textContent = "Esa columna está vacía. Elige una columna que tenga piezas.";
                return;
              }
              run.selectedColumn = column;
              drawLevel(run);
              status.textContent = `Pieza ${tops[column] + 1} seleccionada en la columna ${column + 1}. Elige dónde colocarla.`;
              return;
            }
            if (run.selectedColumn === column) {
              run.selectedColumn = null;
              drawLevel(run);
              status.textContent = "Selección cancelada.";
              return;
            }
            const from = run.selectedColumn;
            const disk = tops[from];
            const countInDestination = task.state.filter(value => value === column).length;
            if (task.level.capacity && countInDestination >= task.level.capacity) {
              task.ruleErrors++;
              run.ruleErrors++;
              run.selectedColumn = null;
              drawLevel(run);
              status.textContent = `Regla del nivel: una columna admite como máximo ${task.level.capacity} piezas.`;
              return;
            }
            const previousState = [...task.state];
            task.lastMove = { state: previousState, previous: task.lastMove };
            task.state[disk] = column;
            task.moves++;
            task.moveActions++;
            run.attemptedMoves++;
            task.phaseMoves++;
            observePlacement(task, run);
            if (task.firstMoveAt === null) task.firstMoveAt = performance.now();
            run.selectedColumn = null;
            if (run.mode === "flexibility" && task.targetChanges) task.flexibilityMoves++;
            if (encode(task.state) === encode(task.target)) {
              completeObjective(run);
              return;
            }
            if (task.budget && task.moveActions > task.budget) {
              task.budgetExceeded = true;
              status.textContent = `Has superado el presupuesto orientativo de ${task.budget} movimientos. Puedes continuar sin límite ni penalización.`;
            }
            drawLevel(run);
          }

          function completeObjective(run) {
            const task = run.current;
            if (!task || task.completed) return;
            if (run.mode === "flexibility" && !task.targetChanges) {
              drawLevel(run);
              task.completed = true;
              const content = board.querySelector(".tower-game-content");
              content?.querySelector(".tower-controls")?.remove();
              content?.append(element("p", "tower-feedback", "¡Primer modelo reproducido! La distribución final se muestra arriba."));
              const next = element("button", "primary", "Continuar al nuevo objetivo");
              next.type = "button";
              next.addEventListener("click", () => {
                const changedTarget = createTarget(task.state, task.level, task.level.minimum);
                if (!changedTarget) {
                  status.textContent = "No se pudo generar el segundo objetivo de flexibilidad. Termina la partida y consulta los datos disponibles.";
                  return;
                }
                task.phaseOptimal = task.optimal;
                task.preChangePlacements = task.moves;
                task.preChangeMoves = task.moveActions;
                task.target = changedTarget.target;
                task.optimal = changedTarget.optimal;
                task.targetChanges = 1;
                task.flexibilityOptimal = changedTarget.optimal;
                task.moves = 0;
                task.moveActions = 0;
                task.completed = false;
                task.objectivesDone++;
                run.completedObjectives++;
                run.offeredObjectives++;
                task.lastMove = null;
                task.lastCheckedState = null;
                task.observedStates.clear();
                observePlacement(task, run);
                drawLevel(run, true);
                status.textContent = "Nuevo objetivo. La posición inicial de tu tablero actual se conserva.";
              });
              content?.append(next);
              status.textContent = "Primer objetivo completado. Comprueba el tablero final y continúa cuando quieras.";
              return;
            }
            drawLevel(run);
            if (run.levelClock) {
              window.clearInterval(run.levelClock);
              run.levelClock = 0;
            }
            task.elapsedMs = performance.now() - task.startedAt;
            const elapsedLabel = board.querySelector(".tower-level-clock");
            if (elapsedLabel) elapsedLabel.textContent = `Tiempo de este nivel: ${(task.elapsedMs / 1000).toFixed(1)} s`;
            task.objectivesDone++;
            task.objectivePlacements += task.moves;
            task.objectiveMoves += task.moveActions;
            task.objectiveOptimal += task.optimal + task.phaseOptimal;
            task.completed = true;
            run.completedObjectives++;
            if (task.level.objectives && task.objectivesDone < task.level.objectives) {
              const next = createTarget(task.state, task.level, task.level.minimum);
              if (next) {
                task.target = next.target;
                task.optimal = next.optimal;
                task.moves = 0;
                task.moveActions = 0;
                task.completed = false;
                task.lastMove = null;
                task.budget = null;
                task.lastCheckedState = null;
                task.observedStates.clear();
                observePlacement(task, run);
                drawLevel(run, true);
                status.textContent = `Objetivo ${task.objectivesDone} completado. Prepara la estrategia para el siguiente.`;
                return;
              }
            }
            task.firstMoveMs = task.firstMoveAt === null ? null : task.firstMoveAt - task.startedAt;
            task.efficiency = task.objectiveMoves > 0 ? task.objectiveOptimal / task.objectiveMoves : null;
            task.solved = true;
            run.records.push({
              levelIndex: task.levelIndex,
              mode: run.mode,
              memoryPhase: task.memoryPhase,
              title: task.level.title,
              focus: task.level.focus,
              disks: task.level.disks,
              columns: task.level.columns,
              moves: task.targetChanges ? task.preChangePlacements + task.objectivePlacements : task.objectivePlacements,
              moveActions: task.targetChanges ? task.preChangeMoves + task.objectiveMoves : task.objectiveMoves,
              optimal: task.objectiveOptimal,
              undos: task.undos,
              ruleErrors: task.ruleErrors,
              hints: task.hints,
              checks: task.checks,
              placementChecks: task.placementChecks,
              elapsedMs: task.elapsedMs,
              firstMoveMs: task.firstMoveMs,
              objectivesDone: task.objectivesDone,
              objectiveCount: task.level.objectives || (task.targetChanges ? 2 : 1),
              targetChanges: task.targetChanges,
              phaseMoves: task.phaseMoves,
              phaseOptimal: task.phaseOptimal,
              flexibilityMoves: task.flexibilityMoves,
              flexibilityOptimal: task.flexibilityOptimal,
              budgetExceeded: task.budgetExceeded,
              preChangeMoves: task.preChangeMoves,
              efficiency: task.efficiency,
              solved: true
            });
            if (run.mode === "memory" && task.memoryPhase === "visible") {
              const hiddenPuzzle = createTarget(initialState(task.level), task.level, task.level.minimum);
              if (hiddenPuzzle) {
                run.memoryTarget = hiddenPuzzle.target;
                run.memoryPhase = "hidden";
                showLevel(run, task.levelIndex, { level: task.level, target: hiddenPuzzle.target, optimal: hiddenPuzzle.optimal });
                status.textContent = "Ahora resolverás un problema diferente, de dificultad equivalente, con el modelo oculto.";
              } else {
                run.memoryPhase = "unavailable";
                finishRun(run, false);
              }
              return;
            }
            const isFinal = run.mode !== "guided" || task.levelIndex === levels.length - 1;
            const container = board.querySelector(".tower-game-content");
            if (container) {
              const moveLabel = container.querySelector(".tower-level-info span");
              if (moveLabel) moveLabel.textContent = `Acciones de movimiento: ${task.targetChanges ? task.preChangeMoves + task.objectiveMoves : task.objectiveMoves} (incluye deshacer)`;
              container.querySelector(".tower-controls")?.remove();
              container.querySelector(".tower-feedback").textContent = task.targetChanges
                ? `¡Modelo reproducido! Tras el cambio se hicieron ${task.flexibilityMoves} acciones de movimiento para el nuevo objetivo (mínimo: ${task.flexibilityOptimal}). Antes del cambio: ${task.preChangeMoves} acciones.`
                : `¡Modelo reproducido! ${task.objectiveMoves} acciones de movimiento para ${task.objectiveOptimal} acciones mínimas calculadas (${task.objectivePlacements} colocaciones y ${task.undos} deshacer). El tiempo se registra, pero no afecta a la puntuación.`;
              container.append(element("p", "tower-feedback", `Deshacer: ${task.undos} · pistas: ${task.hints} · intentos de movimiento no permitido: ${task.ruleErrors}.`));
              const next = element("button", "primary", isFinal ? "Ver perfil e informe" : `Continuar al nivel ${task.levelIndex + 2}`);
              next.type = "button";
              next.addEventListener("click", () => {
                if (isFinal) finishRun(run, true);
                else showLevel(run, task.levelIndex + 1);
              });
              container.append(next);
            }
            status.textContent = isFinal ? "Reto completado. Revisa el perfil descriptivo." : `Nivel ${task.levelIndex + 1} completado. Cuando quieras, continúa al siguiente.`;
          }

          function finishRun(run, completed) {
            if (run.hideTimer) window.clearTimeout(run.hideTimer);
            if (run.levelClock) {
              window.clearInterval(run.levelClock);
              run.levelClock = 0;
            }
            const partial = run.current;
            if (partial && !partial.completed) {
              run.records.push({
                levelIndex: partial.levelIndex,
                mode: run.mode,
                memoryPhase: partial.memoryPhase,
                title: partial.level.title,
                focus: partial.level.focus,
                disks: partial.level.disks,
                columns: partial.level.columns,
                moves: partial.preChangePlacements + partial.objectivePlacements + partial.moves,
                moveActions: partial.preChangeMoves + partial.objectiveMoves + partial.moveActions,
                optimal: partial.objectiveOptimal + partial.optimal + partial.phaseOptimal,
                undos: partial.undos,
                ruleErrors: partial.ruleErrors,
                hints: partial.hints,
                checks: partial.checks,
                placementChecks: partial.placementChecks,
                elapsedMs: performance.now() - partial.startedAt,
                firstMoveMs: partial.firstMoveAt === null ? null : partial.firstMoveAt - partial.startedAt,
                objectivesDone: partial.objectivesDone,
                objectiveCount: partial.level.objectives || (partial.targetChanges ? 2 : 1),
                targetChanges: partial.targetChanges,
                phaseMoves: partial.phaseMoves,
                phaseOptimal: partial.phaseOptimal,
                flexibilityMoves: partial.flexibilityMoves,
                flexibilityOptimal: partial.flexibilityOptimal,
                budgetExceeded: partial.budgetExceeded,
                preChangeMoves: partial.preChangeMoves,
                efficiency: null,
                solved: false
              });
            }
            const report = element("section", "tower-result");
            report.append(element("h4", "", "Torres y planificación · perfil de aptitudes"));
            report.append(element("p", "bubble-score-note", "Perfil provisional calculado automáticamente con las interacciones de esta partida. No usa IA para inferir diagnósticos y todavía no hay baremos validados. Una puntuación alta o baja aquí no confirma ni descarta una neurodivergencia."));
            report.append(element("p", "bubble-score-profile-note", "Las barras transforman las proporciones observadas a una escala orientativa de 1 a 10: 1 es el extremo inferior de esta escala y 10 el superior. No son percentiles ni una comparación con otras personas."));
            const records = run.records;
            const mean = values => values.length ? values.reduce((sum, value) => sum + value, 0) / values.length : null;
            const toScore = value => value === null || !Number.isFinite(value) ? null : Math.max(1, Math.min(10, Math.round(1 + 9 * value)));
            const solvedRecords = records.filter(record => record.solved);
            const extraMoves = solvedRecords.map(record => Math.max(0, record.moveActions - record.optimal));
            const efficiencies = solvedRecords.filter(record => record.efficiency !== null).map(record => record.efficiency * 100);
            const firstMoves = records.filter(record => record.firstMoveMs !== null).map(record => record.firstMoveMs);
            const towerSolved = solvedRecords.length;
            saveProfile("J05", {
              ageGroup: "unspecified", level: run.mode, valid: records.length >= 2 && solvedRecords.some(record => record.hints === 0), completed,
              metrics: {
                problems: records.length, solvedRate: records.length ? towerSolved / records.length * 100 : null,
                extraMovesMean: mean(extraMoves), efficiencyMean: mean(efficiencies),
                initialLatencyMs: mean(firstMoves), ruleErrors: records.reduce((sum, record) => sum + (record.ruleErrors || 0), 0),
                resets: records.reduce((sum, record) => sum + (record.undos || 0), 0), hints: records.reduce((sum, record) => sum + (record.hints || 0), 0)
              }
            });
            const independentRecords = records.filter(record => record.solved && record.hints === 0 && record.efficiency !== null);
            const planningRecords = run.mode === "guided" ? independentRecords.filter(record => record.levelIndex >= 2) : [];
            const solvedEfficiency = planningRecords.map(record => record.efficiency);
            const spatialObservations = run.placementChecks;
            const spatialRecords = records.filter(record => record.placementChecks.length > 0);
            const planningValue = solvedEfficiency.length >= 3 ? toScore(mean(solvedEfficiency)) : null;
            const spatialValue = spatialRecords.length >= 2 && spatialObservations.length >= 5 ? toScore(mean(spatialObservations)) : null;
            const problemValue = run.mode === "guided" && run.offeredObjectives >= 3 ? toScore(run.completedObjectives / run.offeredObjectives) : null;
            const errorValue = run.attemptedMoves + run.ruleErrors >= 3 ? toScore(1 - run.ruleErrors / (run.attemptedMoves + run.ruleErrors)) : null;
            const visibleMemory = records.find(record => record.solved && record.mode === "memory" && record.memoryPhase === "visible");
            const hiddenMemory = records.find(record => record.solved && record.mode === "memory" && record.memoryPhase === "hidden");
            const memoryRatio = visibleMemory && hiddenMemory && visibleMemory.hints === 0 && hiddenMemory.hints === 0 && visibleMemory.efficiency > 0
              ? Math.min(1, hiddenMemory.efficiency / visibleMemory.efficiency) : null;
            const flexibilityRecord = records.find(record => record.solved && record.mode === "flexibility" && record.targetChanges > 0);
            const moduleRecord = records.find(record => record.solved && record.mode === run.mode && (run.mode === "restricted" || run.mode === "budget"));
            const aptitudes = [];
            if (run.mode === "guided") {
              aptitudes.push({ name: "Planificación", value: planningValue, explanation: "Organizar pasos y elegir una ruta eficaz. Se calcula solo con problemas principales completados sin pistas; hacen falta al menos tres problemas de planificación.", raw: solvedEfficiency.length >= 3 ? `Eficiencia media frente al mínimo calculado: ${(mean(solvedEfficiency) * 100).toFixed(1)} %; ${solvedEfficiency.length} problema(s) de planificación completado(s) sin pistas.` : `Problemas comparables completados sin pistas: ${solvedEfficiency.length} de 3 necesarios para calcular esta puntuación.` });
              aptitudes.push({ name: "Resolución de problemas", value: problemValue, explanation: "Resolver objetivos progresivos. Es una proporción de objetivos completados, no una valoración clínica.", raw: `Objetivos completados: ${run.completedObjectives} de ${run.offeredObjectives} presentados; pistas utilizadas: ${run.hintCount}.` });
            } else if (run.mode === "memory") {
              aptitudes.push({ name: "Memoria de trabajo visoespacial", value: memoryRatio === null ? null : toScore(memoryRatio), explanation: "Mantener el modelo en mente después de ocultarlo. Se compara el rendimiento con el modelo visible y con el modelo oculto, en dos tareas de dificultad equiparable.", raw: visibleMemory && hiddenMemory ? `Modelo visible: ${visibleMemory.moveActions} acciones (${visibleMemory.moves} colocaciones; mínimo ${visibleMemory.optimal}); modelo oculto: ${hiddenMemory.moveActions} acciones (${hiddenMemory.moves} colocaciones; mínimo ${hiddenMemory.optimal}). ${memoryRatio === null ? "Se usaron pistas o faltan datos para comparar." : "Comparación basada en la eficiencia relativa de ambas tareas."}` : "Completa las dos partes de la modalidad para comparar el rendimiento visible y el oculto." });
            } else if (run.mode === "flexibility") {
              aptitudes.push({ name: "Flexibilidad cognitiva", value: flexibilityRecord && flexibilityRecord.hints === 0 && flexibilityRecord.flexibilityMoves > 0 ? toScore(Math.min(1, flexibilityRecord.flexibilityOptimal / flexibilityRecord.flexibilityMoves)) : null, explanation: "Adaptar el plan cuando cambia el objetivo. Se puntúa con las acciones del segundo objetivo, sin pistas.", raw: flexibilityRecord ? flexibilityRecord.hints ? `Se usaron ${flexibilityRecord.hints} pista(s); se muestran las medidas, pero no se calcula puntuación.` : `Nuevo objetivo: ${flexibilityRecord.flexibilityMoves} acciones frente a ${flexibilityRecord.flexibilityOptimal} mínimas calculadas.` : "Aún no se completó el nuevo objetivo." });
            } else if (run.mode === "restricted") {
              aptitudes.push({ name: "Planificación bajo restricciones", value: moduleRecord && moduleRecord.hints === 0 ? toScore(Math.min(1, moduleRecord.efficiency)) : null, explanation: "Encontrar una secuencia válida cuando cada columna tiene una capacidad máxima. Es una modalidad separada del recorrido principal.", raw: moduleRecord ? `Acciones totales: ${moduleRecord.moveActions} (${moduleRecord.moves} colocaciones y ${moduleRecord.undos} deshacer); mínimo: ${moduleRecord.optimal}; pistas: ${moduleRecord.hints}.` : "No se completó el problema con columnas restringidas." });
            } else if (run.mode === "budget") {
              aptitudes.push({ name: "Eficiencia con presupuesto", value: moduleRecord && moduleRecord.solved && moduleRecord.hints === 0 ? toScore(Math.min(1, moduleRecord.efficiency)) : null, explanation: "Acercarse a la solución mínima dentro de un presupuesto orientativo. Superarlo no detiene ni penaliza la partida.", raw: moduleRecord ? `Acciones totales: ${moduleRecord.moveActions} (${moduleRecord.moves} colocaciones y ${moduleRecord.undos} deshacer); mínimo: ${moduleRecord.optimal}; presupuesto superado: ${moduleRecord.budgetExceeded ? "sí" : "no"}; pistas: ${moduleRecord.hints}.` : "No se completó el problema con presupuesto." });
            } else {
              aptitudes.push({ name: "Planificación", value: null, explanation: "Se necesita el recorrido principal para obtener una puntuación basada en varios problemas comparables.", raw: "Esta partida de práctica individual no basta para calcular la planificación." });
            }
            aptitudes.push({ name: "Organización visoespacial", value: spatialValue, explanation: "Comprender las columnas y colocar las piezas en las posiciones que muestra el modelo.", raw: spatialValue === null ? `Posiciones distintas registradas: ${spatialObservations.length}; se necesitan al menos cinco observaciones en dos problemas.` : `Coincidencia media de las posiciones intermedias y finales: ${(mean(spatialObservations) * 100).toFixed(1)} %; observaciones: ${spatialObservations.length} en ${spatialRecords.length} problemas.` });
            aptitudes.push({ name: "Cumplimiento de las reglas", value: errorValue, explanation: "Resume los intentos de movimiento no permitidos. Deshacer se registra aparte y no se considera un error de regla.", raw: `Intentos de movimiento no permitido: ${run.ruleErrors}; acciones de movimiento válidas: ${run.attemptedMoves}; movimientos deshechos: ${run.undoCount}.` });
            const formatDuration = milliseconds => `${(milliseconds / 1000).toFixed(1)} s`;
            const recordedTime = records.reduce((total, record) => total + record.elapsedMs, 0);
            let conclusion;
            if (run.mode === "guided") {
              const solvedLevels = records.filter(record => record.solved && record.mode === "guided");
              conclusion = `Completaste ${solvedLevels.length} de ${levels.length} niveles; el tiempo acumulado registrado es ${formatDuration(recordedTime)}. `;
              conclusion += planningRecords.length
                ? `En ${planningRecords.length} problemas de planificación completados sin pistas realizaste una media de ${mean(planningRecords.map(record => record.moveActions - record.optimal)).toFixed(1)} acciones adicionales respecto al mínimo calculado. Las acciones incluyen los deshacer, que se detallan por separado.`
                : "Aún no hay tres problemas principales comparables completados sin pistas para resumir la eficiencia de planificación.";
            } else if (run.mode === "memory") {
              const visible = records.find(record => record.solved && record.memoryPhase === "visible");
              const hidden = records.find(record => record.solved && record.memoryPhase === "hidden");
              conclusion = visible && hidden
                ? `Completaste ambas partes de memoria en ${formatDuration(recordedTime)}. Con el modelo visible realizaste ${visible.moveActions} acciones y con el modelo oculto ${hidden.moveActions}; ambas tareas tienen el mismo mínimo previsto.`
                : `La modalidad de memoria quedó incompleta. Tiempo registrado: ${formatDuration(recordedTime)}. ${visible ? "La parte visible está completada; falta la parte con el modelo oculto." : "Completa primero el problema con el modelo visible y después el problema equivalente con el modelo oculto."}`;
            } else if (run.mode === "flexibility") {
              const result = records.find(record => record.solved && record.mode === "flexibility");
              conclusion = result
                ? `Completaste los dos objetivos del módulo en ${formatDuration(result.elapsedMs)}. Usaste ${result.preChangeMoves} acciones antes del cambio y ${result.flexibilityMoves} para adaptarte; el mínimo calculado total fue ${result.optimal}.`
                : `El módulo de flexibilidad quedó incompleto. Tiempo registrado: ${formatDuration(recordedTime)}; el informe conserva las acciones realizadas hasta el momento.`;
            } else if (run.mode === "restricted" || run.mode === "budget") {
              const result = records.find(record => record.mode === run.mode);
              conclusion = result
                ? `${result.solved ? "Completaste" : "Interrumpiste"} el problema en ${formatDuration(result.elapsedMs)}: ${result.moveActions} acciones de movimiento frente a ${result.optimal} mínimas; deshacer: ${result.undos}.`
                : "No hay datos registrados en esta modalidad.";
            } else {
              const result = records[0];
              conclusion = result
                ? `La práctica individual quedó ${result.solved ? "completada" : "incompleta"}: ${result.moveActions} acciones frente a ${result.optimal} mínimas y ${formatDuration(result.elapsedMs)}. Una práctica no basta para calcular el perfil del recorrido principal.`
                : "No hay datos de movimientos registrados en esta práctica.";
            }
            report.append(element("h4", "", "Resumen de esta partida"));
            report.append(element("p", "tower-summary", `${conclusion} Este resumen describe únicamente lo ocurrido en el juego; no confirma ni descarta un diagnóstico.`));
            const cards = element("div", "bubble-score-grid");
            aptitudes.forEach(aptitude => {
              const card = element("article", "bubble-score-card");
              card.dataset.score = aptitude.value === null ? "" : String(aptitude.value);
              card.append(element("h5", "", aptitude.name));
              card.append(element("strong", "", aptitude.value === null ? "Sin datos" : `${aptitude.value} / 10`));
              card.append(element("p", "bubble-score-explanation", aptitude.explanation));
              const bar = element("div", "bubble-score-segments");
              bar.setAttribute("role", "img");
              bar.setAttribute("aria-label", aptitude.value === null ? `${aptitude.name}: sin datos suficientes en una escala del 1 al 10` : `${aptitude.name}: ${aptitude.value} de 10`);
              for (let point = 1; point <= 10; point++) {
                const segment = element("span", aptitude.value !== null && point <= aptitude.value ? "filled" : "");
                segment.setAttribute("aria-hidden", "true");
                segment.textContent = String(point);
                bar.append(segment);
              }
              card.append(bar);
              const labels = element("div", "bubble-score-scale-labels", "1 · puntuación mínima");
              labels.append(document.createTextNode(" · 10 · puntuación máxima"));
              card.append(labels);
              card.append(element("p", "bubble-score-observation", `Dato de esta partida: ${aptitude.raw}`));
              cards.append(card);
            });
            report.append(cards);
            report.append(element("p", "bubble-score-profile-note", "Cada modalidad informa solo de las capacidades que puede observar. La planificación principal requiere al menos tres problemas comparables completados sin pistas; compara acciones totales —colocaciones más deshacer— con el mínimo calculado. Memoria y flexibilidad se valoran en sus propios módulos. Las pistas quedan registradas."));
            report.append(element("h5", "", "Resultados observados por problema"));
            const table = document.createElement("table");
            const head = document.createElement("thead");
            const header = document.createElement("tr");
            ["Nivel o modalidad", "Objetivos", "Colocaciones", "Deshacer", "Acciones totales", "Mínimo calculado", "Acciones extra", "Errores de regla", "Pistas", "Presupuesto superado", "Antes del primer movimiento", "Tiempo total"].forEach(label => header.append(element("th", "", label)));
            head.append(header);
            const body = document.createElement("tbody");
            records.forEach(record => {
              const row = document.createElement("tr");
              [
                `${record.mode === "guided" || record.mode === "practice" ? `Nivel ${record.levelIndex + 1}` : modules[record.mode] ? modules[record.mode].title : record.title}${record.memoryPhase ? ` · modelo ${record.memoryPhase === "visible" ? "visible" : "oculto"}` : ""} · ${record.title}`,
                `${record.objectivesDone} de ${record.objectiveCount}`,
                String(record.moves),
                String(record.undos),
                String(record.moveActions),
                String(record.optimal),
                record.solved ? String(Math.max(0, record.moveActions - record.optimal)) : "Pendiente",
                String(record.ruleErrors),
                String(record.hints),
                record.mode === "budget" ? (record.budgetExceeded ? "Sí" : "No") : "No aplica",
                record.firstMoveMs === null ? "Sin datos" : `${(record.firstMoveMs / 1000).toFixed(1)} s`,
                `${(record.elapsedMs / 1000).toFixed(1)} s`
              ].forEach(value => row.append(element("td", "", value)));
              body.append(row);
            });
            table.append(head, body);
            report.append(table);
            report.append(element("p", "", "Las colocaciones cuentan cada movimiento de pieza, incluso si después se deshace. «Deshacer» aparece por separado y «Acciones totales» suma colocaciones y deshacer: ese total se compara con el mínimo calculado. El mínimo se obtiene buscando la solución más corta para cada distribución. El tiempo total por nivel se informa sin penalización."));
            report.append(element("p", "", "Cálculo de las puntuaciones: planificación compara las acciones totales con el mínimo en al menos tres problemas principales completados sin pistas; memoria compara problemas equiparables con modelo visible y oculto; flexibilidad informa de las acciones tras el cambio de objetivo; organización visoespacial resume las coincidencias observadas; cumplimiento de reglas refleja solo los intentos no permitidos. Las medidas son experimentales."));
            report.append(element("p", "", "La escala 1–10 es una transformación descriptiva de esta versión experimental. No hay puntos de corte validados ni datos normativos; no es una prueba diagnóstica ni puede confirmar o descartar TDAH, autismo u otra neurodivergencia. Un inicio rápido o un movimiento deshecho no demuestra impulsividad, y este juego no mide de forma independiente control inhibitorio ni aprendizaje de estrategias."));
            const pdfButton = element("button", "secondary", "Descargar informe PDF");
            pdfButton.type = "button";
            pdfButton.addEventListener("click", () => {
              report.id = "bubble-pdf-report";
              report.classList.add("bubble-pdf-report");
              downloadReportPdf(report, "informe-torres-planificacion-fand.pdf");
              status.textContent = "El informe PDF se ha descargado en tu dispositivo; no necesitas impresora.";
            });
            report.append(pdfButton);
            const replay = element("button", "secondary", "Volver a configurar");
            replay.type = "button";
            replay.addEventListener("click", hanoiGame);
            report.append(replay);
            board.replaceChildren(report);
            status.textContent = completed ? "Partida completada. Perfil descriptivo listo." : "Partida finalizada antes de completar todos los retos; el informe distingue los datos disponibles de las modalidades no evaluadas.";
            report.scrollIntoView({ behavior: "smooth", block: "start" });
          }
        }
      }

      function shoppingGame() {
        const { board, status } = makeActivity("La lista · memoria verbal", "Escucha 15 palabras sencillas. Después de cada escucha, di en voz alta todas las que recuerdes. Repetirás el ciclo cinco veces y, tras un vídeo de tres minutos sobre un tema elegido, harás un recuerdo final sin volver a escuchar la lista.");
        const words = ["granja", "sol", "juego", "sombrero", "verano", "casa", "río", "mesa", "zapato", "nube", "perro", "llave", "árbol", "libro", "silla"];
        const interests = [
          ["animales", "Animales y naturaleza"],
          ["espacio", "Espacio y planetas"],
          ["deportes", "Deportes"],
          ["musica", "Música"],
          ["cocina", "Cocina"],
          ["manualidades", "Manualidades y dibujo"],
          ["videojuegos", "Videojuegos"],
          ["custom", "Otro tema (escribir)"]
        ];
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        const setup = element("div", "verbal-memory-setup");
        setup.append(element("h4", "", "Antes de empezar"));
        const interestLabel = element("label", "", "Elige un tema que te interese para el vídeo de descanso.");
        const interestSelect = document.createElement("select");
        interestSelect.setAttribute("aria-label", "Tema de interés");
        interests.forEach(([value, label]) => {
          const option = document.createElement("option");
          option.value = value;
          option.textContent = label;
          interestSelect.append(option);
        });
        interestLabel.append(interestSelect);
        const customTopic = document.createElement("input");
        customTopic.type = "text";
        customTopic.maxLength = 80;
        customTopic.placeholder = "Escribe tu tema de interés";
        customTopic.setAttribute("aria-label", "Otro tema de interés");
        customTopic.hidden = true;
        interestSelect.addEventListener("change", () => {
          customTopic.hidden = interestSelect.value !== "custom";
        });
        setup.append(interestLabel, customTopic);
        setup.append(element("p", "bubble-score-note", `Di en voz alta las palabras que recuerdes y pulsa «Aceptar».${SpeechRecognition ? " Si el navegador lo permite, se pedirá permiso para el micrófono al empezar y el reconocimiento registrará la respuesta sin mostrar la transcripción." : " Este navegador no ofrece reconocimiento de voz; podrás decirlas igualmente, aunque esta página no podrá contar automáticamente los aciertos."} El navegador o su proveedor podría procesar el audio externamente. FAND no graba ni guarda el audio; el informe conserva solo las palabras que el reconocimiento haya identificado. La actividad no tiene límite de tiempo.`));
        const begin = element("button", "primary", "Empezar y escuchar la lista");
        begin.type = "button";
        setup.append(begin);
        board.append(setup);
        const roundPanel = element("section", "verbal-memory-round");
        const roundHeading = element("h4", "", "");
        const audioStatus = element("p", "verbal-memory-word-status", "");
        const playList = element("button", "primary", "Escuchar las 15 palabras");
        playList.type = "button";
        const saveRecall = element("button", "primary", "Aceptar");
        saveRecall.type = "button";
        saveRecall.disabled = true;
        roundPanel.append(roundHeading, audioStatus, playList);
        roundPanel.append(saveRecall);
        roundPanel.hidden = true;
        board.append(roundPanel);
        let round = 0;
        let recallRecords = [];
        let activeRecognition = null;
        let isListening = false;
        let capturedSpeech = "";
        let speechCaptureAvailable = false;
        let microphonePermission = "not-requested";
        let youtubePlayer = null;
        let youtubeApiPromise = null;
        let breakRemainingMs = 180000;
        let breakTickAt = null;
        let breakPlaying = false;
        let selectedTopic = "";
        let videoFrame = null;
        let videoStatus = null;
        let timeLeft = null;
        let distractionPanel = null;
        let distractionTimer = null;
        let spokenSequence = 0;
        let resultsShown = false;
        const normalizeWord = value => value
          .toLocaleLowerCase("es")
          .normalize("NFD")
          .replace(/[\u0300-\u036f]/g, "")
          .replace(/[^\p{L}\p{N}]+/gu, " ")
          .trim();
        const cancelSpeech = () => {
          if ("speechSynthesis" in window) window.speechSynthesis.cancel();
          if (activeRecognition) {
            activeRecognition.onend = null;
            activeRecognition.abort();
            activeRecognition = null;
          }
          if (distractionTimer !== null) window.clearInterval(distractionTimer);
          if (youtubePlayer && typeof youtubePlayer.destroy === "function") {
            youtubePlayer.destroy();
            youtubePlayer = null;
          }
        };
        cleanups.push(cancelSpeech);

        function getRecalledWords(value) {
          const tokens = new Set(normalizeWord(value).split(/\s+/).filter(Boolean));
          return words.filter(word => tokens.has(normalizeWord(word)));
        }

        function analyzeResponse(value) {
          const tokens = normalizeWord(value).split(/\s+/).filter(Boolean);
          const recalled = getRecalledWords(value);
          const targetTokens = new Set(words.map(normalizeWord));
          const frequencies = new Map();
          tokens.forEach(token => frequencies.set(token, (frequencies.get(token) || 0) + 1));
          const intrusions = [...frequencies].filter(([token]) => !targetTokens.has(token)).map(([token, count]) => `${token}${count > 1 ? ` (×${count})` : ""}`);
          const repeatedWords = [...frequencies].filter(([, count]) => count > 1).map(([token, count]) => `${token} (×${count})`);
          return {
            recalled,
            omissions: words.filter(word => !recalled.includes(word)),
            intrusions,
            perseverations: repeatedWords
          };
        }

        function speakList() {
          playList.disabled = true;
          saveRecall.disabled = true;
          spokenSequence = 0;
          audioStatus.textContent = `Escucha la lista, repetición ${round} de 5.`;
          if (!("speechSynthesis" in window)) {
            audioStatus.textContent = "Este navegador no puede reproducir la lista en audio. No mostraremos las palabras para no cambiar la tarea; prueba un navegador compatible.";
            playList.disabled = true;
            saveRecall.disabled = true;
            return;
          }
          window.speechSynthesis.cancel();
          const speakNextWord = () => {
            if (spokenSequence >= words.length) {
              audioStatus.textContent = `Escuchaste las 15 palabras de la repetición ${round}. Di en voz alta todas las que recuerdes y pulsa «Aceptar respuesta y continuar».`;
              playList.disabled = false;
              saveRecall.disabled = false;
              startRecognition();
              if (microphonePermission !== "granted") {
                audioStatus.textContent += " No se autorizó el micrófono; la respuesta se aceptará igualmente, pero no se podrá puntuar automáticamente.";
              }
              return;
            }
            const currentWord = words[spokenSequence++];
            audioStatus.textContent = `Palabra ${spokenSequence} de 15 · repetición ${round}`;
            const utterance = new SpeechSynthesisUtterance(currentWord);
            utterance.lang = "es-ES";
            utterance.rate = 0.82;
            utterance.onend = () => schedule(speakNextWord, 400);
            utterance.onerror = () => {
              audioStatus.textContent = "No se pudo completar el audio. Vuelve a intentarlo; la respuesta no se habilitará hasta que termine la lista.";
              playList.disabled = false;
              saveRecall.disabled = true;
            };
            window.speechSynthesis.speak(utterance);
          };
          speakNextWord();
        }

        function configureRound() {
          round++;
          roundHeading.textContent = `Recuerdo ${round} de 5`;
          playList.textContent = "Escuchar las 15 palabras";
          capturedSpeech = "";
          audioStatus.textContent = "Pulsa para escuchar la lista completa y, al acabar, recuerda todas las palabras que puedas.";
          playList.disabled = false;
          saveRecall.disabled = true;
          roundPanel.hidden = false;
          roundPanel.scrollIntoView({ behavior: "smooth", block: "center" });
        }

        function startRecognition() {
          if (!SpeechRecognition || isListening || microphonePermission !== "granted") return;
          const recognition = new SpeechRecognition();
          activeRecognition = recognition;
          recognition.lang = "es-ES";
          recognition.continuous = true;
          recognition.interimResults = false;
          isListening = true;
          recognition.onresult = event => {
            for (let index = event.resultIndex; index < event.results.length; index++) {
              if (event.results[index].isFinal) capturedSpeech += `${event.results[index][0].transcript} `;
            }
          };
          recognition.onerror = event => {
            isListening = false;
            activeRecognition = null;
            speechCaptureAvailable = false;
            audioStatus.textContent = event.error === "not-allowed" || event.error === "service-not-allowed"
              ? "No hay permiso de micrófono para registrar la respuesta. Di las palabras en voz alta y pulsa «Aceptar» igualmente."
              : `No se pudo registrar la voz (${event.error}). Di las palabras en voz alta y pulsa «Aceptar» igualmente.`;
          };
          recognition.onend = () => {
            isListening = false;
            activeRecognition = null;
          };
          try {
            recognition.start();
            speechCaptureAvailable = true;
          } catch (error) {
            isListening = false;
            activeRecognition = null;
            speechCaptureAvailable = false;
            audioStatus.textContent = `No se pudo registrar la respuesta por voz (${error.message}). Di las palabras en voz alta y pulsa «Aceptar» igualmente.`;
          }
        }

        function saveRecallResponse() {
          const save = () => {
            const response = analyzeResponse(capturedSpeech);
            recallRecords.push({
              round,
              ...response,
              voiceCaptured: speechCaptureAvailable && Boolean(capturedSpeech.trim())
            });
            capturedSpeech = "";
            speechCaptureAvailable = false;
            if (round < 5) {
              configureRound();
              speakList();
              return;
            }
            startDistraction();
          };
          if (!activeRecognition) {
            save();
            return;
          }
          const recognition = activeRecognition;
          let saved = false;
          const finishSave = () => {
            if (saved) return;
            saved = true;
            activeRecognition = null;
            isListening = false;
            save();
          };
          recognition.onend = finishSave;
          recognition.stop();
          schedule(finishSave, 500);
        }

        async function requestMicrophonePermission() {
          if (!SpeechRecognition || !navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
            microphonePermission = SpeechRecognition ? "unavailable" : "unsupported";
            setup.hidden = true;
            configureRound();
            return;
          }
          begin.disabled = true;
          begin.textContent = "Solicitando permiso para el micrófono…";
          try {
            const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
            stream.getTracks().forEach(track => track.stop());
            microphonePermission = "granted";
          } catch (error) {
            microphonePermission = "denied";
          }
          begin.disabled = false;
          begin.textContent = "Empezar y escuchar la lista";
          setup.hidden = true;
          configureRound();
          if (microphonePermission !== "granted") {
            audioStatus.textContent = "No se pudo autorizar el micrófono. Di en voz alta las palabras que recuerdes y pulsa «Aceptar» igualmente; la respuesta no podrá registrarse automáticamente.";
          }
        }

        function youtubeSearchUrl(topic) {
          const query = `${topic} vídeo popular`;
          return `https://www.youtube.com/results?search_query=${encodeURIComponent(query)}`;
        }

        function loadYoutubePlayerApi() {
          if (window.YT && window.YT.Player) return Promise.resolve(window.YT);
          if (youtubeApiPromise) return youtubeApiPromise;
          youtubeApiPromise = new Promise((resolve, reject) => {
            const previousCallback = window.onYouTubeIframeAPIReady;
            window.onYouTubeIframeAPIReady = () => {
              if (typeof previousCallback === "function") previousCallback();
              resolve(window.YT);
            };
            const script = document.createElement("script");
            script.src = "https://www.youtube.com/iframe_api";
            script.async = true;
            script.onerror = () => reject(new Error("No se pudo cargar la API de reproducción de YouTube."));
            document.head.append(script);
          });
          return youtubeApiPromise;
        }

        function updateBreakClock() {
          if (distractionTimer !== null) {
            window.clearInterval(distractionTimer);
            distractionTimer = null;
          }
          const remainingSeconds = Math.ceil(breakRemainingMs / 1000);
          videoStatus.textContent = breakPlaying
            ? "Vídeo en reproducción; la pausa de tres minutos está avanzando automáticamente."
            : "El vídeo está pausado. Pulsa reproducir y la cuenta atrás continuará.";
          timeLeft.textContent = `Tiempo restante: ${Math.floor(remainingSeconds / 60)}:${String(remainingSeconds % 60).padStart(2, "0")}`;
          if (!breakPlaying || breakRemainingMs <= 0) return;
          breakTickAt = Date.now();
          distractionTimer = window.setInterval(() => {
            const now = Date.now();
            breakRemainingMs = Math.max(0, breakRemainingMs - (now - breakTickAt));
            breakTickAt = now;
            const seconds = Math.ceil(breakRemainingMs / 1000);
            timeLeft.textContent = `Tiempo restante: ${Math.floor(seconds / 60)}:${String(seconds % 60).padStart(2, "0")}`;
            if (breakRemainingMs <= 0) {
              window.clearInterval(distractionTimer);
              distractionTimer = null;
              breakPlaying = false;
              if (youtubePlayer && typeof youtubePlayer.destroy === "function") {
                youtubePlayer.destroy();
                youtubePlayer = null;
              }
              showDelayedRecall(distractionPanel);
            }
          }, 250);
        }

        function embedVideo(value) {
          const trimmed = value.trim();
          let videoId = "";
          try {
            const url = new URL(trimmed);
            if (url.hostname === "youtu.be") videoId = url.pathname.slice(1).split("/")[0];
            else if (["youtube.com", "www.youtube.com", "m.youtube.com", "youtube-nocookie.com", "www.youtube-nocookie.com"].includes(url.hostname)) {
              if (url.pathname === "/watch") videoId = url.searchParams.get("v") || "";
              else if (url.pathname.startsWith("/embed/") || url.pathname.startsWith("/shorts/")) videoId = url.pathname.split("/")[2] || "";
            }
          } catch {
            videoId = "";
          }
          if (!/^[\w-]{11}$/.test(videoId)) {
            videoStatus.textContent = "Pega un enlace válido de YouTube (vídeo de 11 caracteres) para cargarlo aquí.";
            return;
          }
          if (youtubePlayer && typeof youtubePlayer.destroy === "function") {
            youtubePlayer.destroy();
            youtubePlayer = null;
          }
          breakRemainingMs = 180000;
          breakPlaying = false;
          timeLeft.textContent = "La cuenta atrás empezará automáticamente al reproducir el vídeo.";
          loadYoutubePlayerApi().then(YT => {
            if (!videoFrame || !videoFrame.isConnected) return;
            videoFrame.src = `https://www.youtube-nocookie.com/embed/${videoId}?enablejsapi=1&origin=${encodeURIComponent(window.location.origin)}&rel=0`;
            videoFrame.hidden = false;
            youtubePlayer = new YT.Player(videoFrame, {
              events: {
                onReady: () => {
                  videoStatus.textContent = "Vídeo listo. Pulsa reproducir; la cuenta atrás empezará automáticamente.";
                },
                onStateChange: event => {
                  if (event.data === YT.PlayerState.PLAYING) {
                    if (!breakPlaying) {
                      breakPlaying = true;
                      updateBreakClock();
                    }
                  } else if (event.data === YT.PlayerState.PAUSED || event.data === YT.PlayerState.BUFFERING) {
                    if (breakPlaying) {
                      breakRemainingMs = Math.max(0, breakRemainingMs - (Date.now() - breakTickAt));
                      breakPlaying = false;
                      updateBreakClock();
                    }
                  } else if (event.data === YT.PlayerState.ENDED && breakRemainingMs > 0) {
                    if (breakPlaying) breakRemainingMs = Math.max(0, breakRemainingMs - (Date.now() - breakTickAt));
                    breakPlaying = false;
                    updateBreakClock();
                    videoStatus.textContent = "El vídeo terminó antes de los tres minutos. Elige otro vídeo para completar la pausa.";
                  }
                },
                onError: () => {
                  videoStatus.textContent = "No se pudo reproducir este vídeo insertado. Prueba otro vídeo de YouTube.";
                  if (youtubePlayer && typeof youtubePlayer.destroy === "function") {
                    youtubePlayer.destroy();
                    youtubePlayer = null;
                  }
                }
              }
            });
          }).catch(error => {
            videoStatus.textContent = `${error.message} Comprueba la conexión a Internet o abre otro vídeo de YouTube.`;
          });
        }

        function startDistraction() {
          roundPanel.hidden = true;
          const videoPanel = element("section", "verbal-memory-video");
          distractionPanel = videoPanel;
          videoPanel.append(element("h4", "", "Pausa con vídeo · 3 minutos"));
          videoPanel.append(element("p", "", `Tema que elegiste: ${selectedTopic}. Busca un vídeo con muchas visualizaciones. La selección automática de vídeos aleatorios y la verificación de visitas requieren una API de YouTube que esta web no tiene configurada; por eso podrás elegir el vídeo en YouTube y cargarlo aquí. El contador empezará cuando el vídeo comience a reproducirse, se detendrá si lo pausas y, al completar tres minutos de reproducción, el juego pasará automáticamente al recuerdo final.`));
          const searchLink = element("a", "secondary", `Buscar vídeos de ${selectedTopic} en YouTube`);
          searchLink.href = youtubeSearchUrl(selectedTopic);
          searchLink.target = "_blank";
          searchLink.rel = "noopener noreferrer";
          searchLink.setAttribute("aria-label", `Abrir búsqueda de vídeos de ${selectedTopic} en YouTube, en una pestaña nueva`);
          videoPanel.append(searchLink);
          const videoInput = document.createElement("input");
          videoInput.type = "url";
          videoInput.placeholder = "Pega aquí el enlace del vídeo elegido";
          videoInput.setAttribute("aria-label", "Enlace del vídeo de YouTube");
          const loadVideo = element("button", "secondary", "Cargar vídeo");
          loadVideo.type = "button";
          videoFrame = document.createElement("iframe");
          videoFrame.className = "verbal-memory-video-frame";
          videoFrame.title = `Vídeo de entretenimiento sobre ${selectedTopic}`;
          videoFrame.allow = "autoplay; encrypted-media; picture-in-picture";
          videoFrame.allowFullscreen = true;
          videoFrame.referrerPolicy = "strict-origin-when-cross-origin";
          videoFrame.hidden = true;
          videoStatus = element("p", "verbal-memory-word-status", "Abre la búsqueda, elige un vídeo, copia su URL y cárgala aquí. El audio de YouTube se reproduce desde el servicio externo.");
          loadVideo.addEventListener("click", () => embedVideo(videoInput.value));
          timeLeft = element("p", "verbal-memory-video-time", "La cuenta atrás empezará automáticamente al reproducir el vídeo.");
          videoPanel.append(videoInput, loadVideo, videoFrame, videoStatus, timeLeft);
          board.append(videoPanel);
          videoPanel.scrollIntoView({ behavior: "smooth", block: "start" });
        }

        function showDelayedRecall(videoPanel) {
          if (resultsShown) return;
          videoPanel.hidden = true;
          const delayed = element("section", "verbal-memory-round");
          delayed.append(element("h4", "", "Recuerdo final · sin volver a escuchar la lista"));
          delayed.append(element("p", "", "Di en voz alta todas las palabras que recuerdes de la lista. No se reproducirá de nuevo."));
          const delayedStatus = element("p", "verbal-memory-word-status", SpeechRecognition && microphonePermission === "granted"
            ? "Di en voz alta las palabras y pulsa «Aceptar» cuando termines; no aparecerá ninguna transcripción."
            : "El reconocimiento de voz no está disponible; di las palabras y pulsa «Aceptar» para continuar.");
          const delayedSave = element("button", "primary", "Aceptar respuesta final");
          delayedSave.type = "button";
          delayed.append(delayedStatus, delayedSave);
          board.append(delayed);
          capturedSpeech = "";
          if (SpeechRecognition && microphonePermission === "granted") {
            const recognition = new SpeechRecognition();
            activeRecognition = recognition;
            recognition.lang = "es-ES";
            recognition.continuous = true;
            recognition.interimResults = false;
            isListening = true;
            recognition.onresult = event => {
              for (let index = event.resultIndex; index < event.results.length; index++) {
                if (event.results[index].isFinal) capturedSpeech += `${event.results[index][0].transcript} `;
              }
            };
            recognition.onerror = event => {
              isListening = false;
              activeRecognition = null;
              delayedStatus.textContent = `No se pudo registrar la voz (${event.error}). Di las palabras en voz alta y pulsa «Aceptar».`;
            };
            recognition.onend = () => {
              isListening = false;
              activeRecognition = null;
            };
            try {
              recognition.start();
            } catch (error) {
              isListening = false;
              activeRecognition = null;
              delayedStatus.textContent = `No se pudo iniciar el reconocimiento (${error.message}). Di las palabras y pulsa «Aceptar».`;
            }
          }
          delayedSave.addEventListener("click", () => {
            if (activeRecognition) {
              activeRecognition.onend = null;
              activeRecognition.stop();
              activeRecognition = null;
              isListening = false;
            }
            const response = analyzeResponse(capturedSpeech);
            recallRecords.push({
              round: "Final",
              ...response,
              voiceCaptured: microphonePermission === "granted" && Boolean(capturedSpeech.trim())
            });
            resultsShown = true;
            renderReport();
          });
          delayed.scrollIntoView({ behavior: "smooth", block: "center" });
        }

        function renderReport() {
          cancelSpeech();
          const result = element("section", "verbal-memory-result");
          result.append(element("h4", "", "La lista · resultados de memoria verbal"));
          const finalRecord = recallRecords.find(record => record.round === "Final");
          const totalRecall = recallRecords.filter(record => typeof record.round === "number");
          const recordedRounds = totalRecall.filter(record => record.voiceCaptured);
          const roundCounts = totalRecall.map(record => record.voiceCaptured ? record.recalled.length : null);
          const firstCount = roundCounts[0] ?? null;
          const fifthCount = roundCounts[4] ?? null;
          const finalCount = finalRecord?.voiceCaptured ? finalRecord.recalled.length : null;
          const learningTotal = recordedRounds.reduce((sum, record) => sum + record.recalled.length, 0);
          const gain = firstCount !== null && fifthCount !== null ? fifthCount - firstCount : null;
          const wordRecallCounts = new Map(words.map(word => [
            word,
            recordedRounds.filter(record => record.recalled.includes(word)).length
          ]));
          const stableWords = recordedRounds.length === 5 ? words.filter(word => wordRecallCounts.get(word) === 5) : [];
          const intermittentWords = words.filter(word => wordRecallCounts.get(word) > 0 && wordRecallCounts.get(word) < recordedRounds.length);
          const neverRecalledWords = recordedRounds.length ? words.filter(word => wordRecallCounts.get(word) === 0) : [];
          const acquiredWords = words.filter(word => {
            if (!recordedRounds.some(record => record.round === 1)) return false;
            const firstRound = recordedRounds.find(record => record.recalled.includes(word))?.round;
            return firstRound !== undefined && firstRound > 1;
          });
          const retention = finalCount !== null && fifthCount ? finalCount / fifthCount : null;
          const learningInterpretation = gain === null
            ? "No se puede comparar la primera y la quinta escucha porque falta una respuesta de voz registrada en uno o ambos intentos."
            : gain > 0
            ? `El recuerdo aumentó en ${gain} palabra(s) entre la primera y la quinta escucha (${firstCount} a ${fifthCount}).`
            : gain < 0
              ? `El recuento fue ${Math.abs(gain)} palabra(s) menor en la quinta que en la primera escucha (${firstCount} a ${fifthCount}); esto describe esta partida y no identifica la causa.`
              : `El recuento de la primera y la quinta escucha fue igual (${firstCount} palabras); observa también qué palabras cambiaron entre intentos.`;
          const retentionInterpretation = retention === null
            ? finalCount === null
              ? "No se pudo calcular la retención porque no hay respuesta final de voz registrada."
              : "No se puede calcular una proporción de retención respecto a la quinta escucha porque no se recordó ninguna palabra en esa ronda."
            : `Después de la pausa se recordaron ${finalCount} de las ${fifthCount} palabras recuperadas en la quinta escucha (${(retention * 100).toFixed(0)} % como relación descriptiva; no es una puntuación normativa).`;
          const learningSummary = recordedRounds.length
            ? `Se registraron ${recordedRounds.length} de 5 respuestas de voz, con ${learningTotal} palabra(s) correcta(s) sumadas en las rondas con datos${recordedRounds.length === 5 ? " (máximo 75)" : ""}.`
            : "No se registraron respuestas de voz en las cinco escuchas.";
          const conclusion = `${learningInterpretation} ${learningSummary} ${recordedRounds.some(record => record.round === 1) ? `${acquiredWords.length} palabra(s) aparecieron por primera vez después del primer ensayo.` : ""} ${retentionInterpretation} ${recordedRounds.length === 5 ? `De las 15 palabras, ${stableWords.length} aparecieron en las cinco rondas, ${intermittentWords.length} de forma intermitente y ${neverRecalledWords.length} no se identificaron en ninguna ronda.` : "La estabilidad por palabra requiere respuestas de voz registradas en las cinco rondas."}`;
          const roundRecords = recallRecords.filter(record => record.round !== "Final" && record.voiceCaptured);
          saveProfile("J06", {
            ageGroup: "unspecified", level: "15 palabras · R1–R6", valid: recordedRounds.length >= 4, completed: finalCount !== null,
            metrics: {
              recordedRounds: recordedRounds.length, r1: firstCount, r2: roundCounts[1], r3: roundCounts[2], r4: roundCounts[3], r5: fifthCount, r6: finalCount,
              learningTotal: recordedRounds.length === 5 ? learningTotal : null, gain,
              retention: retention === null ? null : retention * 100,
              intrusions: roundRecords.reduce((sum, record) => sum + (record.intrusions ? record.intrusions.length : 0), 0),
              perseverations: roundRecords.reduce((sum, record) => sum + (record.perseverations ? record.perseverations.length : 0), 0)
            }
          });
          result.append(element("h5", "", "Conclusión descriptiva de esta partida"));
          result.append(element("p", "bubble-score-summary", conclusion));
          result.append(element("p", "bubble-score-note", `Tema de distracción elegido: ${selectedTopic}. La actividad no tiene límite de tiempo para responder. No hay baremos FAND validados: el recuento no permite clasificar el rendimiento como bajo, normal o alto, ni identificar una neurodivergencia. Una respuesta sin palabras detectadas por el reconocimiento de voz figura como «sin datos», no como cero palabras recordadas. El reconocimiento puede cometer errores; la transcripción temporal se elimina de la pantalla al aceptar la respuesta y no se incluye en el informe.`));
          result.append(element("h5", "", "Curva de aprendizaje"));
          const chart = element("div", "verbal-memory-chart");
          chart.setAttribute("role", "img");
          chart.setAttribute("aria-label", `Palabras recordadas tras cada escucha: ${roundCounts.map((count, index) => `escucha ${index + 1}, ${count === null ? "sin datos" : `${count} de 15`}`).join("; ")}`);
          roundCounts.forEach((count, index) => {
            const chartItem = element("div", "verbal-memory-chart-item");
            const bar = element("div", "verbal-memory-chart-bar");
            bar.style.height = `${count === null ? 4 : Math.max(4, count / 15 * 100)}%`;
            bar.setAttribute("aria-hidden", "true");
            chartItem.append(bar, element("strong", "", count === null ? "—" : `${count}/15`), element("span", "", `Escucha ${index + 1}`));
            chart.append(chartItem);
          });
          result.append(chart);
          const curve = document.createElement("table");
          const curveHead = document.createElement("thead");
          const curveHeader = document.createElement("tr");
          ["Medida", "Resultado"].forEach(label => curveHeader.append(element("th", "", label)));
          curveHead.append(curveHeader);
          const curveBody = document.createElement("tbody");
          [
            ["Recuerdo tras la primera escucha", firstCount === null ? "Sin datos" : `${firstCount} de 15`],
            ["Recuerdo tras cada escucha", roundCounts.map((count, index) => `${index + 1}: ${count === null ? "sin datos" : `${count}/15`}`).join(" · ")],
            ["Aprendizaje total", recordedRounds.length ? `${learningTotal} palabra(s) sumadas${recordedRounds.length === 5 ? " de 75" : ` en ${recordedRounds.length} ronda(s) con datos`}` : "Sin datos de voz"],
            ["Ganancia (quinta menos primera)", gain === null ? "Sin datos suficientes" : `${gain > 0 ? "+" : ""}${gain} palabra(s)`],
            ["Palabras que aparecieron por primera vez desde la segunda escucha", recordedRounds.length ? acquiredWords.join(", ") || "Ninguna identificada" : "Sin datos"],
            ["Recuerdo tras la pausa", finalCount === null ? "Sin datos" : `${finalCount} de 15`],
            ["Retención relativa a la quinta escucha", retention === null ? "No calculable" : `${(retention * 100).toFixed(0)} % (${finalCount}/${fifthCount})`]
          ].forEach(([label, value]) => {
            const row = document.createElement("tr");
            [label, value].forEach(text => row.append(element("td", "", text)));
            curveBody.append(row);
          });
          curve.append(curveHead, curveBody);
          result.append(curve);
          result.append(element("h5", "", "Palabras recordadas en cada intento"));
          const trialTable = document.createElement("table");
          const trialHead = document.createElement("thead");
          const trialHeader = document.createElement("tr");
          ["Intento", "Aciertos", "Palabras recordadas", "Omisiones", "Intrusiones detectadas por voz", "Perseveraciones detectadas por voz"].forEach(label => trialHeader.append(element("th", "", label)));
          trialHead.append(trialHeader);
          const trialBody = document.createElement("tbody");
          recallRecords.forEach(record => {
            const row = document.createElement("tr");
            [
              record.round === "Final" ? "Recuerdo final" : `Escucha ${record.round}`,
              record.voiceCaptured ? `${record.recalled.length} de 15` : "Sin datos de voz",
              record.voiceCaptured ? record.recalled.join(", ") || "Ninguna identificada" : "Sin datos",
              record.voiceCaptured ? record.omissions.join(", ") || "Ninguna" : "Sin datos",
              record.voiceCaptured ? record.intrusions.join(", ") || "Ninguna identificada" : "Sin datos",
              record.voiceCaptured ? record.perseverations.join(", ") || "Ninguna identificada" : "Sin datos"
            ].forEach(value => row.append(element("td", "", value)));
            trialBody.append(row);
          });
          trialTable.append(trialHead, trialBody);
          result.append(trialTable);
          result.append(element("h5", "", "Registro individual y estabilidad por palabra"));
          const wordTable = document.createElement("table");
          const wordHead = document.createElement("thead");
          const wordHeader = document.createElement("tr");
          ["Palabra", "Primera aparición registrada", "Rondas recordada", "Estabilidad", "Recuerdo final", "Posición original"].forEach(label => wordHeader.append(element("th", "", label)));
          wordHead.append(wordHeader);
          const wordBody = document.createElement("tbody");
          words.forEach((word, index) => {
            const recalledRounds = wordRecallCounts.get(word);
            const firstRound = recordedRounds.find(record => record.recalled.includes(word))?.round;
            const pattern = totalRecall.map(record => !record.voiceCaptured ? "?" : record.recalled.includes(word) ? "✓" : "—").join(" ");
            const stability = recordedRounds.length === 5
              ? recalledRounds === 5 ? "Constante" : recalledRounds > 0 ? "Intermitente" : "No identificada"
              : recordedRounds.length ? "Datos parciales" : "Sin datos";
            const row = document.createElement("tr");
            [
              word,
              firstRound === undefined ? "No apareció" : `Escucha ${firstRound}`,
              `${recalledRounds} de ${recordedRounds.length} con datos · ${pattern}`,
              stability,
              finalCount === null ? "Sin datos" : finalRecord.recalled.includes(word) ? "Recordada" : "No identificada",
              `${index + 1} (${index < 5 ? "inicio" : index > 9 ? "final" : "centro"})`
            ].forEach(value => row.append(element("td", "", value)));
            wordBody.append(row);
          });
          wordTable.append(wordHead, wordBody);
          result.append(wordTable);
          result.append(element("h5", "", "Posición serial"));
          const serialTable = document.createElement("table");
          const serialHead = document.createElement("thead");
          const serialHeader = document.createElement("tr");
          ["Tramo de la lista", "Recuerdo durante las cinco escuchas", "Recuerdo final"].forEach(label => serialHeader.append(element("th", "", label)));
          serialHead.append(serialHeader);
          const serialBody = document.createElement("tbody");
          [
            ["Inicio (1–5)", 0, 5],
            ["Centro (6–10)", 5, 10],
            ["Final (11–15)", 10, 15]
          ].forEach(([label, start, end]) => {
            const row = document.createElement("tr");
            const wordsInRange = words.slice(start, end);
            const roundTotal = recordedRounds.reduce((sum, record) => sum + record.recalled.filter(word => wordsInRange.includes(word)).length, 0);
            const finalTotal = finalCount === null ? null : finalRecord.recalled.filter(word => wordsInRange.includes(word)).length;
            [
              label,
              recordedRounds.length ? `${roundTotal} de ${wordsInRange.length * recordedRounds.length} oportunidades (${recordedRounds.length}/5 rondas)` : "Sin datos de voz",
              finalTotal === null ? "Sin datos de voz" : `${finalTotal} de ${wordsInRange.length} palabras`
            ].forEach(value => row.append(element("td", "", value)));
            serialBody.append(row);
          });
          serialTable.append(serialHead, serialBody);
          result.append(serialTable);
          result.append(element("p", "", `Resumen por palabra: ${recordedRounds.length === 5 ? `constantes — ${stableWords.join(", ") || "ninguna"}; intermitentes — ${intermittentWords.join(", ") || "ninguna"}; no identificadas en los cinco ensayos — ${neverRecalledWords.join(", ") || "ninguna"}.` : `datos disponibles en ${recordedRounds.length} de 5 rondas; no se clasifica la estabilidad.`}`));
          result.append(element("p", "", "Las intrusiones y perseveraciones se calculan sobre la transcripción aceptada, no sobre una grabación comprobada: el reconocimiento de voz puede convertir una palabra en otra o repetir texto. Por eso no se interpretan automáticamente como errores reales de memoria. «No identificada» significa que no apareció en la respuesta transcrita; no demuestra por sí sola que la persona no la recordara."));
          result.append(element("p", "", "Esta actividad es una adaptación experimental inspirada en tareas de aprendizaje verbal; no es el RAVLT ni el CVLT y no utiliza sus baremos. La edad, el idioma, la audición, la familiaridad con las palabras, la pronunciación, la comprensión, el dispositivo y el vídeo pueden afectar al resultado. Si existen dificultades persistentes en la vida diaria, conviene comentarlas con un profesional; esta partida por sí sola no permite recomendar ni descartar un diagnóstico."));
          const pdf = element("button", "secondary", "Descargar informe PDF");
          pdf.type = "button";
          pdf.addEventListener("click", () => {
            result.id = "bubble-pdf-report";
            result.classList.add("bubble-pdf-report");
            downloadReportPdf(result, "informe-la-lista-memoria-verbal-fand.pdf");
            status.textContent = "El informe PDF se ha descargado en tu dispositivo.";
          });
          result.append(pdf);
          const restart = element("button", "secondary", "Volver a empezar");
          restart.type = "button";
          restart.addEventListener("click", shoppingGame);
          result.append(restart);
          board.replaceChildren(result);
          status.textContent = "Partida finalizada. El informe distingue lo recordado en cada ronda y después de la pausa.";
          result.scrollIntoView({ behavior: "smooth", block: "start" });
        }

        begin.addEventListener("click", () => {
          selectedTopic = interestSelect.value === "custom" ? customTopic.value.trim() : interests.find(([value]) => value === interestSelect.value)[1];
          if (!selectedTopic) {
            customTopic.setCustomValidity("Escribe un tema de interés para poder buscar el vídeo.");
            customTopic.reportValidity();
            customTopic.addEventListener("input", () => customTopic.setCustomValidity(""), { once: true });
            return;
          }
          requestMicrophonePermission();
        });
        playList.addEventListener("click", () => {
          speakList();
        });
        saveRecall.addEventListener("click", saveRecallResponse);
      }

      function attentionGame(kind) {
        const configurations = {
          watcher: {
            title: "El Vigilante",
            description: "Pulsa «Lo he visto» solo cuando aparezca una estrella amarilla. Mantén la regla durante la actividad; los resultados describen esta partida y no son diagnósticos."
          },
          robots: {
            title: "Encuentra al Robot",
            description: "Observa el modelo y selecciona los robots idénticos. La búsqueda avanza por cuatro fases con cuadrículas de dificultad creciente."
          },
          "go-no-go": {
            title: "Pulsa o Espera",
            description: "Pulsa cuando veas un círculo verde con la palabra «PULSA». No respondas al círculo rojo con la palabra «ESPERA»."
          },
          simon: {
            title: "La Dirección Equivocada",
            description: "El color decide la respuesta: azul = botón izquierdo y rojo = botón derecho. Ignora si el círculo aparece a la izquierda o a la derecha."
          }
        };
        const config = configurations[kind];
        const { board, status } = makeActivity(config.title, config.description);
        const setup = element("div", "attention-setup");
        setup.append(element("p", "", kind === "robots"
          ? "Protocolo principal de exploración FAND · fases A–D, 20 cuadrículas y unos 8–12 minutos con instrucciones y práctica. Con tiempo, cada cuadrícula tiene su propio máximo; también puedes elegir la modalidad sin límite. Los tiempos son parámetros iniciales, no baremos validados."
          : kind === "watcher"
          ? "Elige la versión según la edad: cada una encadena bloques de dificultad creciente (detección básica, discriminación, distractores similares, vigilancia, atención prolongada y vigilancia avanzada) con la misma regla: estrella amarilla. Entre bloques hay una cuenta atrás de 3 segundos. Incluye práctica con criterio de comprensión del 80 %. Los tiempos y proporciones son parámetros de desarrollo, no baremos validados."
          : kind === "go-no-go"
          ? "Elige el nivel según la edad (el nivel es solo la versión inicial; si hay dificultades de comprensión o accesibilidad, elige el más adecuado). Incluye práctica con criterio de comprensión del 80 %, bloques con una cuenta atrás de 3 segundos entre ellos y una fase de evaluación sin información de aciertos. Los tiempos son parámetros de desarrollo, no baremos validados."
          : "Elige la adaptación visual y el nivel. La versión infantil presenta elementos más grandes; las reglas y medidas se mantienen iguales, por lo que los resultados de edades distintas no deben compararse sin validación."));
        const ageLabel = element("label", "", "Versión de instrucciones y presentación");
        const ageSelect = document.createElement("select");
        ageSelect.setAttribute("aria-label", "Grupo de edad");
        [["child", "Infantil · 6–11 años"], ["teen", "Adolescentes · 12–17 años"], ["adult", "Adultos · 18 años o más"], ["unspecified", "Prefiero no indicar la edad"]].forEach(([value, text]) => {
          const option = document.createElement("option");
          option.value = value;
          option.textContent = text;
          ageSelect.append(option);
        });
        ageLabel.append(ageSelect);
        const levelLabel = element("label", "", "Nivel");
        const levelSelect = document.createElement("select");
        levelSelect.setAttribute("aria-label", "Nivel de dificultad");
        for (let level = 1; level <= (kind === "go-no-go" || kind === "watcher" ? 6 : 5); level++) {
          const option = document.createElement("option");
          option.value = String(level);
          option.textContent = `Nivel ${level}`;
          levelSelect.append(option);
        }
        levelLabel.append(levelSelect);
        setup.append(ageLabel);
        if (kind !== "robots") setup.append(levelLabel);
        let robotDurationSelect = null;
        if (kind === "robots") {
          const durationLabel = element("label", "", "Duración de la búsqueda");
          robotDurationSelect = document.createElement("select");
          robotDurationSelect.setAttribute("aria-label", "Duración de la búsqueda");
          [["timed", "Con tiempo · máximo por cuadrícula (hasta 7 min en total)"], ["untimed", "Sin límite de tiempo"]].forEach(([value, text]) => {
            const option = document.createElement("option");
            option.value = value;
            option.textContent = text;
            robotDurationSelect.append(option);
          });
          durationLabel.append(robotDurationSelect);
          setup.append(durationLabel);
          const protocolDetails = element("details", "robot-protocol-details");
          protocolDetails.append(element("summary", "", "Ver fases, duración y puntuación"));
          protocolDetails.append(
            element("p", "", "La prueba explora principalmente la atención selectiva y la búsqueda visual: localizar objetivos entre distractores y observar cómo influye el parecido entre robots y el tamaño de la cuadrícula. Es distinta de «Recuerda la Secuencia», que explora memoria secuencial visoespacial. Ninguna puntuación aislada representa una capacidad general ni permite diagnosticar."),
            element("p", "", "El protocolo principal contiene 20 cuadrículas: fase A, 4 cuadrículas de 6 robots y 1 objetivo (máximo 15 s cada una); fase B, 6 de 12 robots y 3 objetivos (20 s); fase C, 6 de 20 robots y 4 objetivos (20 s, con similitud baja, media y alta); fase D, 4 de 12, 18, 24 y 30 robots con 1 objetivo (30 s). Las posiciones de los objetivos se distribuyen de forma equilibrada y aleatoria dentro de cada condición. En la fase C se usan objetivos que permiten presentar al menos un distractor que comparte 3 de sus 4 rasgos; el informe registra cuántos distractores de cada similitud aparecieron realmente. En modalidad cronometrada, los límites suman hasta 7 minutos de búsqueda; con instrucciones, práctica y transiciones, la sesión suele durar aproximadamente 8–12 minutos. Sin límite, la duración depende de las respuestas."),
            element("p", "", "Se registran aciertos, omisiones, falsas selecciones, similitud del distractor, orden de selección y tiempos por cuadrícula. Las selecciones no se pueden deshacer y la cuadrícula avanza al completar el número de selecciones previsto o al agotarse el tiempo. No se informa si una selección fue correcta durante la prueba."),
            element("p", "", "Puntuación descriptiva provisional: detección (objetivos encontrados ÷ objetivos presentados en B–C) × 30; control de falsas selecciones (distractores ignorados ÷ distractores presentados en B–C) × 25; discriminación (promedio de sensibilidad y especificidad ante distractores que comparten 3 de 4 rasgos en similitud alta) × 20. La similitud es una clasificación técnica basada en color, forma, antena y expresión, no una medida perceptual validada. La suma calculable es sobre un máximo de 75 puntos. El control de distractores siempre se lee junto con la detección: no seleccionar ningún robot daría control alto, pero detección nula."),
            element("p", "", "La puntuación no incluye puntos por velocidad ni estabilidad: el informe presenta los tiempos de acierto en la fase D por separado; la estabilidad requeriría el módulo complementario de búsqueda continuada. La conclusión describe únicamente esta sesión (por ejemplo, cambios entre similitud baja/alta y número de omisiones/falsas alarmas). No hay baremos por edad validados, comparación con una población de referencia ni diagnóstico. La prueba aporta una dimensión distinta a las otras actividades de FAND y no debe sumarse como una nota cognitiva global.")
          );
          setup.append(protocolDetails);
        }
        const instructions = element("p", "bubble-score-note");
        const practicePrompt = element("h4", "", "Práctica obligatoria · no se registra en los resultados");
        const stage = element("div", "attention-stage");
        stage.setAttribute("aria-live", "polite");
        const stimulus = element("div", "attention-stimulus", "Ejemplo");
        const controls = element("div", "attention-controls");
        const start = element("button", "primary", "Empezar actividad");
        start.type = "button";
        start.disabled = true;
        const feedback = element("p", "status", "Completa los ejemplos de práctica para desbloquear «Empezar actividad».");
        board.append(setup, instructions, practicePrompt, stage, controls, start, feedback);

        let level = 1;
        let running = false;
        let ended = false;
        let practiceComplete = false;
        let timer = null;
        let timeout = null;
        let stopCurrentRun = () => {};
        let trialNumber = 0;
        let activeTrial = null;
        let records = [];
        let summary = null;
        let robotScoringNote = "";
        let goNoGoNote = "";
        let robotInterpretationNote = "";
        let robotTarget = null;
        let robotSelected = new Set();
        let robotTargets = [];
        let robotItems = [];
        let robotLevelResults = [];
        let robotProgressTimer = null;
        let robotCountdown = null;
        let robotProgress = null;
        let robotTimedMode = true;
        let robotLevelStartedAt = 0;
        let robotLevelCaptured = false;
        let robotLevelLocked = false;
        let robotRoundPlans = [];
        let robotRoundIndex = -1;
        let robotSelectionEvents = [];
        const levelValue = () => Number(levelSelect.value);
        const ageValue = () => ageSelect.value;
        const ageInstructions = {
          child: "Versión infantil: lee la regla con calma y usa los botones grandes.",
          teen: "Versión adolescente: mantén la regla indicada durante cada ensayo.",
          adult: "Versión adulta: mantén la regla indicada durante cada ensayo.",
          unspecified: "Sigue la regla indicada y continúa a tu propio ritmo."
        };
        const updateInstructions = () => {
          instructions.textContent = `${ageInstructions[ageValue()]} ${kind === "watcher"
            ? "Ejemplo: estrella amarilla = pulsar; cualquier otra figura = esperar."
            : kind === "robots"
            ? "Observa todos los detalles del dibujo. El modelo aparece arriba; toca únicamente los robots que tengan exactamente el mismo aspecto."
              : kind === "go-no-go"
                ? "Ejemplo: círculo verde «PULSA» = responder; círculo rojo «ESPERA» = no tocar."
                : "Ejemplo: azul siempre significa izquierda y rojo siempre significa derecha, aunque el círculo esté en el lado opuesto. Puedes usar los botones o las teclas de flecha."}`;
          stage.classList.toggle("attention-child", ageValue() === "child");
        };
        ageSelect.addEventListener("change", updateInstructions);
        updateInstructions();
        const randomItem = list => list[Math.floor(Math.random() * list.length)];
        const robotModels = [
          { id: "modelo-01", x: 25, y: 40, width: 118, height: 193, color: "azul", shape: "cuadrada", antenna: "bola", expression: "sonriente" },
          { id: "modelo-02", x: 150, y: 52, width: 117, height: 180, color: "rojo", shape: "cuadrada", antenna: "recta", expression: "seria" },
          { id: "modelo-03", x: 274, y: 51, width: 112, height: 180, color: "amarillo", shape: "redonda", antenna: "espiral", expression: "sorprendida" },
          { id: "modelo-04", x: 397, y: 52, width: 118, height: 180, color: "verde", shape: "cuadrada", antenna: "doble", expression: "sonriente" },
          { id: "modelo-05", x: 522, y: 51, width: 117, height: 181, color: "morado", shape: "cuadrada", antenna: "bola", expression: "seria" },
          { id: "modelo-06", x: 645, y: 57, width: 108, height: 176, color: "rosa", shape: "redonda", antenna: "corazon", expression: "sonriente" },
          { id: "modelo-07", x: 766, y: 72, width: 104, height: 162, color: "turquesa", shape: "cuadrada", antenna: "bola", expression: "seria" },
          { id: "modelo-08", x: 885, y: 51, width: 108, height: 186, color: "naranja", shape: "cuadrada", antenna: "estrella", expression: "sonriente" },
          { id: "modelo-09", x: 25, y: 255, width: 116, height: 168, color: "naranja", shape: "redonda", antenna: "doble", expression: "sorprendida" },
          { id: "modelo-10", x: 151, y: 248, width: 110, height: 172, color: "gris", shape: "redonda", antenna: "espiral", expression: "seria" },
          { id: "modelo-11", x: 278, y: 253, width: 113, height: 173, color: "rosa", shape: "redonda", antenna: "corazon", expression: "sonriente" },
          { id: "modelo-12", x: 407, y: 254, width: 105, height: 172, color: "azul", shape: "cuadrada", antenna: "recta", expression: "sonriente" },
          { id: "modelo-13", x: 530, y: 252, width: 100, height: 171, color: "verde", shape: "redonda", antenna: "triangulo", expression: "sonriente" },
          { id: "modelo-14", x: 637, y: 258, width: 128, height: 167, color: "gris", shape: "cuadrada", antenna: "bola", expression: "seria" },
          { id: "modelo-15", x: 769, y: 251, width: 106, height: 172, color: "morado", shape: "redonda", antenna: "bola", expression: "sorprendida" },
          { id: "modelo-16", x: 884, y: 258, width: 116, height: 161, color: "amarillo", shape: "cuadrada", antenna: "bola", expression: "seria" },
          { id: "modelo-17", x: 1009, y: 250, width: 113, height: 174, color: "rojo", shape: "redonda", antenna: "doble", expression: "sonriente" },
          { id: "modelo-18", x: 19, y: 444, width: 124, height: 147, color: "verde", shape: "cuadrada", antenna: "bola", expression: "seria" },
          { id: "modelo-19", x: 154, y: 437, width: 110, height: 154, color: "naranja", shape: "cuadrada", antenna: "triangulo", expression: "seria" },
          { id: "modelo-20", x: 283, y: 448, width: 101, height: 145, color: "morado", shape: "redonda", antenna: "doble", expression: "sorprendida" },
          { id: "modelo-21", x: 400, y: 443, width: 101, height: 149, color: "amarillo", shape: "cuadrada", antenna: "doble", expression: "sonriente" },
          { id: "modelo-22", x: 513, y: 440, width: 129, height: 152, color: "rojo", shape: "redonda", antenna: "helice", expression: "sonriente" },
          { id: "modelo-23", x: 654, y: 437, width: 97, height: 155, color: "celeste", shape: "redonda", antenna: "bola", expression: "sonriente" },
          { id: "modelo-24", x: 774, y: 452, width: 101, height: 140, color: "rosa", shape: "redonda", antenna: "orejas", expression: "sonriente" },
          { id: "modelo-25", x: 891, y: 431, width: 108, height: 161, color: "verde", shape: "redonda", antenna: "espiral", expression: "sorprendida" },
          { id: "modelo-26", x: 1016, y: 443, width: 110, height: 147, color: "azul", shape: "cuadrada", antenna: "recta", expression: "sonriente" },
          { id: "modelo-27", x: 25, y: 599, width: 124, height: 151, color: "morado", shape: "cuadrada", antenna: "espiral", expression: "seria" },
          { id: "modelo-28", x: 166, y: 614, width: 111, height: 139, color: "gris", shape: "cuadrada", antenna: "cuernos", expression: "sonriente" },
          { id: "modelo-29", x: 294, y: 601, width: 101, height: 153, color: "turquesa", shape: "redonda", antenna: "estrella", expression: "sonriente" },
          { id: "modelo-30", x: 411, y: 611, width: 111, height: 144, color: "naranja", shape: "cuadrada", antenna: "doble", expression: "seria" },
          { id: "modelo-31", x: 534, y: 605, width: 99, height: 149, color: "rosa", shape: "cuadrada", antenna: "recta", expression: "seria" },
          { id: "modelo-32", x: 648, y: 605, width: 102, height: 151, color: "verde", shape: "cuadrada", antenna: "bola", expression: "seria" },
          { id: "modelo-33", x: 768, y: 605, width: 109, height: 148, color: "azul", shape: "cuadrada", antenna: "hexagono", expression: "seria" },
          { id: "modelo-34", x: 893, y: 608, width: 104, height: 146, color: "amarillo", shape: "redonda", antenna: "aro", expression: "sorprendida" },
          { id: "modelo-35", x: 1014, y: 609, width: 115, height: 143, color: "rojo", shape: "cuadrada", antenna: "corazon", expression: "seria" }
        ];
        const traitLabels = {
          shape: { redonda: "cabeza redonda", cuadrada: "cabeza cuadrada" },
          antenna: { bola: "antena con bola", recta: "antena recta", doble: "dos antenas", espiral: "antena en espiral", corazon: "antena con corazón", estrella: "antena con estrella", triangulo: "antena triangular", helice: "antena con hélice", orejas: "antenas laterales", cuernos: "antenas en forma de cuernos", hexagono: "antena hexagonal", aro: "antena en forma de aro" },
          expression: { sonriente: "cara sonriente", seria: "cara seria", sorprendida: "cara sorprendida" }
        };
        function robotGraphic(robot) {
          const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
          svg.setAttribute("viewBox", `${robot.x} ${robot.y} ${robot.width} ${robot.height}`);
          svg.setAttribute("role", "img");
          svg.setAttribute("aria-label", `Robot ${(robot.spriteId || robot.id).replace("modelo-", "")}: ${robot.color}, ${traitLabels.shape[robot.shape]}, ${traitLabels.antenna[robot.antenna]}, ${traitLabels.expression[robot.expression]}`);
          const image = document.createElementNS("http://www.w3.org/2000/svg", "image");
          image.setAttribute("href", "recursos/FAND_Robots_Modelos.png");
          image.setAttribute("x", "0");
          image.setAttribute("y", "0");
          image.setAttribute("width", "1152");
          image.setAttribute("height", "768");
          image.setAttribute("preserveAspectRatio", "none");
          svg.append(image);
          return svg;
        }
        function robotCard(robot, isModel = false) {
          const card = element("div", isModel ? "attention-robot-model" : "");
          card.append(robotGraphic(robot));
          card.setAttribute("aria-label", isModel ? `Modelo objetivo: robot ${robot.color}, ${traitLabels.shape[robot.shape]}, ${traitLabels.antenna[robot.antenna]}, ${traitLabels.expression[robot.expression]}` : `Robot ${robot.color}, ${traitLabels.shape[robot.shape]}, ${traitLabels.antenna[robot.antenna]}, ${traitLabels.expression[robot.expression]}`);
          return card;
        }
        const shuffle = list => {
          for (let index = list.length - 1; index > 0; index--) {
            const other = Math.floor(Math.random() * (index + 1));
            [list[index], list[other]] = [list[other], list[index]];
          }
          return list;
        };
        const makeRobotProtocol = () => {
          const rounds = [];
          for (let index = 0; index < 4; index++) {
            rounds.push({ phase: "A", phaseName: "Reconocimiento básico", phaseRound: index + 1, roundsInPhase: 4, condition: "Diferencias claras", totalItems: 6, targetAmount: 1, maxSeconds: 15, minSimilarity: 0, maxSimilarity: 1 });
          }
          for (let index = 0; index < 6; index++) {
            rounds.push({ phase: "B", phaseName: "Atención selectiva", phaseRound: index + 1, roundsInPhase: 6, condition: "Similitud mixta", totalItems: 12, targetAmount: 3, maxSeconds: 20, minSimilarity: 0, maxSimilarity: 2 });
          }
          const similarityConditions = [
            { name: "Similitud baja", minSimilarity: 0, maxSimilarity: 1 },
            { name: "Similitud media", minSimilarity: 2, maxSimilarity: 2 },
            { name: "Similitud alta", minSimilarity: 3, maxSimilarity: 3 }
          ];
          similarityConditions.forEach(similarity => {
            for (let index = 0; index < 2; index++) {
              rounds.push({ phase: "C", phaseName: "Discriminación visual", phaseRound: index + 1, roundsInPhase: 6, condition: similarity.name, totalItems: 20, targetAmount: 4, maxSeconds: 20, ...similarity });
            }
          });
          [12, 18, 24, 30].forEach((totalItems, index) => {
            rounds.push({ phase: "D", phaseName: "Eficiencia de búsqueda", phaseRound: index + 1, roundsInPhase: 4, condition: `${totalItems} robots`, totalItems, targetAmount: 1, maxSeconds: 30, minSimilarity: 0, maxSimilarity: 2 });
          });
          const phaseGroups = new Map();
          rounds.forEach(round => {
            const key = `${round.phase}|${round.condition}|${round.totalItems}|${round.targetAmount}`;
            if (!phaseGroups.has(key)) phaseGroups.set(key, []);
            phaseGroups.get(key).push(round);
          });
          phaseGroups.forEach(group => {
            const requiredPositions = group.length * group[0].targetAmount;
            const positionDeck = [];
            while (positionDeck.length < requiredPositions) {
              positionDeck.push(...shuffle(Array.from({ length: group[0].totalItems }, (_, index) => index)));
            }
            let positionIndex = 0;
            group.forEach(round => {
              round.targetPositions = positionDeck
                .slice(positionIndex, positionIndex + round.targetAmount)
                .sort((first, second) => first - second);
              positionIndex += round.targetAmount;
            });
          });
          return rounds;
        };
        const record = (condition, correct, responseMs = null, omitted = false, extra = {}) => {
          records.push({ number: trialNumber, condition, correct, responseMs, omitted, ...extra });
        };
        let gngInterruptions = 0;
        let gngPracticeAttempts = 0;
        const gngLevels = [
          { go: 21, noGo: 9, stimulusMs: 1500, blocks: 2, variableGap: false },
          { go: 45, noGo: 15, stimulusMs: 1000, blocks: 2, variableGap: false },
          { go: 68, noGo: 22, stimulusMs: 800, blocks: 3, variableGap: true },
          { go: 90, noGo: 30, stimulusMs: 700, blocks: 4, variableGap: true },
          { go: 90, noGo: 30, stimulusMs: 700, blocks: 4, variableGap: true },
          { go: 90, noGo: 30, stimulusMs: 700, blocks: 4, variableGap: true }
        ];
        function unlockPractice() {
          practiceComplete = true;
          start.disabled = false;
          practicePrompt.textContent = "Práctica completada. Puedes empezar la actividad cuando quieras.";
          feedback.textContent = "¡Correcto! La práctica terminó. Pulsa «Empezar actividad» para iniciar la partida.";
        }
        function preparePractice() {
          if (kind === "robots") {
            const target = robotModels[0];
            const model = robotCard(target, true);
            const grid = element("div", "attention-robot-grid");
            const practiceRobots = [
              { ...target, spriteId: target.id, id: "practice-target" },
              { ...robotModels[1], spriteId: robotModels[1].id, id: "practice-wrong-color" },
              { ...robotModels[2], spriteId: robotModels[2].id, id: "practice-wrong-antenna" }
            ];
            practiceRobots.forEach(robot => {
              const button = element("button", "attention-robot");
              button.type = "button";
              button.append(robotGraphic(robot));
              button.setAttribute("aria-label", `Robot ${robot.color}, ${traitLabels.shape[robot.shape]}, ${traitLabels.antenna[robot.antenna]}, ${traitLabels.expression[robot.expression]}`);
              button.setAttribute("aria-pressed", "false");
              button.addEventListener("click", () => {
                if (practiceComplete || button.disabled) return;
                button.disabled = true;
                button.setAttribute("aria-pressed", "true");
                if (robot.id === "practice-target") {
                  unlockPractice();
                  grid.querySelectorAll("button").forEach(robotButton => { robotButton.disabled = true; });
                } else {
                  feedback.textContent = "Ese robot no coincide en todas sus características. La elección queda fijada; prueba con otro robot.";
                }
              });
              grid.append(button);
            });
            stage.replaceChildren(model, grid);
            controls.replaceChildren();
            practicePrompt.textContent = "Práctica: compara el modelo con los robots. Toca el que coincida en todas sus características; cada elección queda fijada.";
            return;
          }
          if (kind === "simon") {
            const leftSide = element("div");
            const rightSide = element("div");
            rightSide.append(element("div", "attention-stimulus", "●"));
            rightSide.firstChild.style.color = "#1769aa";
            rightSide.firstChild.style.minWidth = "76px";
            rightSide.firstChild.style.minHeight = "76px";
            const position = element("div", "two-columns");
            position.append(leftSide, rightSide);
            stage.replaceChildren(position);
            practicePrompt.textContent = "Práctica: el círculo azul aparece a la derecha. ¿Qué lado debes pulsar según la regla del color?";
            const left = element("button", "secondary", "Izquierda · azul");
            const right = element("button", "secondary", "Derecha · rojo");
            left.type = right.type = "button";
            left.addEventListener("click", unlockPractice);
            right.addEventListener("click", () => { feedback.textContent = "El color azul siempre corresponde a la izquierda; inténtalo de nuevo."; });
            controls.replaceChildren(left, right);
            return;
          }
          const examples = kind === "watcher"
            ? [["Go", "★", "#d39a16", "yes", "Estrella amarilla"], ["No-Go", "●", "#4886a6", "no", "Círculo azul"], ["No-Go", "☆", "#d39a16", "no", "Estrella hueca"], ["Go", "★", "#d39a16", "yes", "Estrella amarilla"], ["No-Go", "■", "#946c89", "no", "Cuadrado"]].map(([type, text, color, expected, label]) => ({ type, text, color, expected, prompt: `${label}: ¿responderías?` }))
            : [["Go", "🟢\nPULSA", "#26733d", "yes"], ["Go", "🟢\nPULSA", "#26733d", "yes"], ["No-Go", "🔴\nESPERA", "#b42318", "no"], ["Go", "🟢\nPULSA", "#26733d", "yes"], ["No-Go", "🔴\nESPERA", "#b42318", "no"]].map(([type, text, color, expected], index) => ({ type, text, color, expected, prompt: `${type === "Go" ? "Círculo verde «PULSA»" : "Círculo rojo «ESPERA»"}: ¿responderías?` }));
          let exampleIndex = 0;
          let practiceAnswers = [];
          const practiceRule = kind === "watcher" ? "responde solo a la estrella amarilla rellena ★; no a otras figuras, aunque se parezcan." : "responde a «PULSA» y espera ante «ESPERA».";
          function showExample() {
            const example = examples[exampleIndex];
            const sample = element("div", "attention-stimulus", example.text);
            sample.style.color = example.color;
            stage.replaceChildren(sample);
            practicePrompt.textContent = `Práctica ${exampleIndex + 1} de ${examples.length}: ${example.prompt}`;
            const yes = element("button", "secondary", "Sí, pulsaría");
            const no = element("button", "secondary", "No, esperaría");
            yes.type = no.type = "button";
            const answer = choice => {
              if (kind === "go-no-go" || kind === "watcher") {
                const ok = choice === example.expected;
                practiceAnswers.push({ type: example.type, ok });
                exampleIndex++;
                if (exampleIndex < examples.length) {
                  feedback.textContent = ok ? "Correcto. Prueba el siguiente ejemplo." : `${practiceRule} Prueba el siguiente ejemplo.`;
                  showExample();
                  return;
                }
                const correct = practiceAnswers.filter(item => item.ok).length;
                const bothTypes = ["Go", "No-Go"].every(type => practiceAnswers.some(item => item.type === type && item.ok));
                if (correct / examples.length >= 0.8 && bothTypes) {
                  unlockPractice();
                  return;
                }
                gngPracticeAttempts++;
                practiceAnswers = [];
                exampleIndex = 0;
                feedback.textContent = gngPracticeAttempts >= 3
                  ? "No se alcanzó el 80 % de aciertos en la práctica tras varios intentos. Esta sesión no se considerará interpretable; consulta con la persona que supervisa la actividad."
                  : `Has acertado ${correct} de ${examples.length}. Se necesita al menos el 80 %, con respuestas correctas ante el objetivo y ante los distractores. Se repite la explicación: ${practiceRule}`;
                showExample();
                return;
              }
              if (choice !== example.expected) {
                feedback.textContent = kind === "watcher"
                  ? "Recuerda: responde solo a la estrella amarilla."
                  : "Recuerda: responde a «PULSA» y espera ante «ESPERA».";
                return;
              }
              exampleIndex++;
              if (exampleIndex === examples.length) unlockPractice();
              else {
                feedback.textContent = "Correcto. Prueba el siguiente ejemplo.";
                showExample();
              }
            };
            yes.addEventListener("click", () => answer("yes"));
            no.addEventListener("click", () => answer("no"));
            controls.replaceChildren(yes, no);
          }
          showExample();
        }

        function makeReport() {
          const report = element("section", "attention-report");
          report.append(element("h4", "", `${config.title} · resultados de la partida`));
          const details = document.createElement("table");
          const body = document.createElement("tbody");
          const rows = [];
          if (kind === "watcher") {
            const pct = (part, total) => total ? part / total * 100 : null;
            const fmtPct = value => value === null ? "Sin datos" : `${value.toFixed(1).replace(".", ",")} %`;
            const median = values => {
              const sorted = values.slice().sort((a, b) => a - b);
              if (!sorted.length) return null;
              const middle = Math.floor(sorted.length / 2);
              return sorted.length % 2 ? sorted[middle] : (sorted[middle - 1] + sorted[middle]) / 2;
            };
            const stats = group => {
              const targets = group.filter(item => item.condition === "Objetivo");
              const distractors = group.filter(item => item.condition === "Distractor");
              const hits = targets.filter(item => item.correct).length;
              const falseAlarms = distractors.filter(item => !item.correct).length;
              const rts = targets.filter(item => item.responseMs !== null && !item.anticipatory).map(item => item.responseMs);
              const mean = rts.length ? rts.reduce((sum, value) => sum + value, 0) / rts.length : null;
              const sd = rts.length > 1 ? Math.sqrt(rts.reduce((sum, value) => sum + (value - mean) ** 2, 0) / (rts.length - 1)) : null;
              return { targets: targets.length, distractors: distractors.length, hits, omissions: targets.length - hits, falseAlarms, rts, mean, sd, median: median(rts) };
            };
            const all = stats(records);
            const anticipatory = records.filter(item => item.anticipatory).length;
            const blockNumbers = [...new Set(records.map(item => item.block))].filter(Boolean);
            const blockLines = blockNumbers.map(number => {
              const group = records.filter(item => item.block === number);
              const blockStats = stats(group);
              const name = watcherLevelSpecs[group[0].watcherLevel - 1].name;
              return `${number}. ${name}: detección ${blockStats.targets ? Math.round(pct(blockStats.hits, blockStats.targets)) + " %" : "—"} (${blockStats.hits}/${blockStats.targets}), falsas alarmas ${blockStats.falseAlarms}/${blockStats.distractors}, mediana ${blockStats.median === null ? "—" : Math.round(blockStats.median) + " ms"}`;
            });
            const longestBlock = blockNumbers.reduce((best, number) => records.filter(item => item.block === number).length > records.filter(item => item.block === best).length ? number : best, blockNumbers[0]);
            const longRecords = records.filter(item => item.block === longestBlock);
            const firstHalf = stats(longRecords.slice(0, Math.ceil(longRecords.length / 2)));
            const secondHalf = stats(longRecords.slice(Math.ceil(longRecords.length / 2)));
            const detectionOf = item => item.targets ? Math.round(pct(item.hits, item.targets)) : null;
            const evolution = firstHalf.targets && secondHalf.targets
              ? `Bloque ${longestBlock}: detección ${detectionOf(firstHalf)} % en la primera mitad y ${detectionOf(secondHalf)} % en la segunda; mediana ${firstHalf.median === null ? "—" : Math.round(firstHalf.median)} ms → ${secondHalf.median === null ? "—" : Math.round(secondHalf.median)} ms`
              : "No calculable";
            const cv = all.sd !== null && all.rts.length >= 10 ? all.sd / all.mean : null;
            const measured = records.filter(item => item.watcherLevel >= 4);
            const measuredStats = stats(measured);
            const observations = [];
            if (all.omissions > 0) observations.push("omisiones: conviene explorar atención sostenida, comprensión y factores perceptivos o motores");
            if (all.falseAlarms > 0) observations.push("respuestas a distractores: conviene explorar control de respuesta y discriminación visual");
            if (cv !== null && cv > 0.35) observations.push("variabilidad temporal elevada en esta sesión: conviene explorar consistencia atencional y condiciones de aplicación");
            if (firstHalf.targets && secondHalf.targets && detectionOf(secondHalf) < detectionOf(firstHalf) - 10) observations.push("descenso de detección dentro del bloque más largo: conviene explorar resistencia a la tarea, fatiga y motivación");
            const quality = [];
            if (anticipatory) quality.push(`${anticipatory} respuesta(s) anticipada(s) (<150 ms), excluidas del tiempo de reacción`);
            if (gngInterruptions) quality.push(`${gngInterruptions} posible(s) interrupción(es) (la pestaña quedó oculta)`);
            const planned = watcherAgePlan[level - 1].reduce((sum, number) => sum + (number === 5 && level <= 3 ? 60 : watcherLevelSpecs[number - 1].trials), 0);
            if (records.length < planned) quality.push("sesión incompleta");
            rows.push(
              ["Versión / grupo", `El Vigilante v1.0 · ${levelDescriptions.watcher[level - 1]}`],
              ["Ensayos presentados", `${records.length} de ${planned}`],
              ["Detección correcta (objetivos respondidos ÷ objetivos)", `${all.hits} de ${all.targets} · ${fmtPct(pct(all.hits, all.targets))}`],
              ["Omisiones (objetivos sin respuesta)", `${all.omissions} de ${all.targets} · ${fmtPct(pct(all.omissions, all.targets))}`],
              ["Falsas alarmas (respuestas a distractores ÷ distractores)", `${all.falseAlarms} de ${all.distractors} · ${fmtPct(pct(all.falseAlarms, all.distractors))}`],
              ["Tiempo de reacción mediano (respuestas correctas)", all.median === null ? "Sin respuestas válidas" : `${Math.round(all.median)} ms`],
              ["Desviación estándar del tiempo de reacción", all.sd === null ? "No calculable" : `${Math.round(all.sd)} ms`],
              ["Coeficiente de variación (DE ÷ media)", cv === null ? "No calculable (se necesitan al menos 10 respuestas correctas)" : cv.toFixed(2).replace(".", ",")],
              ["Respuestas anticipadas (<150 ms)", anticipatory],
              ["Resultados por bloque", blockLines.join(" · ") || "Sin datos"],
              ["Evolución dentro del bloque más largo", evolution],
              ["Condición de medición (bloques 4–6)", measured.length ? `detección ${fmtPct(pct(measuredStats.hits, measuredStats.targets))}, falsas alarmas ${measuredStats.falseAlarms}/${measuredStats.distractors}` : "Esta versión solo incluye bloques de familiarización"],
              ["Calidad de los datos", quality.length ? quality.join("; ") : "Sin incidencias detectadas"],
              ["Práctica de comprensión", gngPracticeAttempts ? `Criterio del 80 % alcanzado tras ${gngPracticeAttempts} repetición(es)` : "Criterio del 80 % alcanzado a la primera"],
              ["Aspectos que podrían explorarse", observations.length ? observations.join("; ") : "No se observan patrones que destacar en esta sesión"],
              ["Percentil por edad", "No disponible: sin baremos FAND validados"]
            );
            summary = `${all.hits} de ${all.targets} objetivos detectados, ${all.omissions} omisión(es) y ${all.falseAlarms} respuesta(s) incorrecta(s) ante ${all.distractors} distractores${all.median === null ? "" : `; tiempo mediano de respuesta correcta ${Math.round(all.median)} ms`}. Estos datos describen el rendimiento en esta sesión; no permiten saber si es inferior a lo esperado para la edad ni identificar su causa sin baremos y evaluación complementaria.`;
                        saveProfile("J04", {
                          ageGroup: ageValue(), level, valid: records.length >= planned && gngInterruptions === 0,
                          completed: records.length >= planned, interruptions: gngInterruptions,
                          metrics: {
                            trials: records.length, targets: all.targets, detectionRate: pct(all.hits, all.targets),
                            omissionRate: pct(all.omissions, all.targets), falseAlarmRate: pct(all.falseAlarms, all.distractors),
                            rtMedianMs: all.median, rtCv: cv, anticipatory,
                            vigilanceDecrement: firstHalf.targets && secondHalf.targets ? detectionOf(firstHalf) - detectionOf(secondHalf) : null
                          }
                        });
                      } else if (kind === "robots") {
            const phaseA = robotLevelResults.filter(result => result.phase === "A");
            const phaseB = robotLevelResults.filter(result => result.phase === "B");
            const phaseC = robotLevelResults.filter(result => result.phase === "C");
            const phaseD = robotLevelResults.filter(result => result.phase === "D");
            const scoredRounds = [...phaseB, ...phaseC];
            const countStats = (results, similarityRange = null) => results.reduce((total, result) => {
              const relevantDistractors = similarityRange
                ? Object.entries(result.similarity)
                  .filter(([matches]) => Number(matches) >= similarityRange[0] && Number(matches) <= similarityRange[1])
                  .reduce((counts, [, group]) => ({
                    shown: counts.shown + group.shown,
                    selected: counts.selected + group.selected
                  }), { shown: 0, selected: 0 })
                : { shown: result.totalItems - result.targetCount, selected: result.falseAlarms };
              return {
                targets: total.targets + result.targetCount,
                hits: total.hits + result.hits,
                omissions: total.omissions + result.omissions,
                distractors: total.distractors + relevantDistractors.shown,
                falseAlarms: total.falseAlarms + relevantDistractors.selected
              };
            }, { targets: 0, hits: 0, omissions: 0, distractors: 0, falseAlarms: 0 });
            const accuracy = stats => stats.targets ? stats.hits / stats.targets : null;
            const specificity = stats => stats.distractors ? (stats.distractors - stats.falseAlarms) / stats.distractors : null;
            const coreStats = countStats(scoredRounds);
            const highSimilarity = countStats(phaseC.filter(result => result.condition === "Similitud alta"), [3, 3]);
            const detectionRate = accuracy(coreStats);
            const distractorRejectionRate = specificity(coreStats);
            const highBalancedAccuracy = accuracy(highSimilarity) === null || specificity(highSimilarity) === null
              ? null
              : (accuracy(highSimilarity) + specificity(highSimilarity)) / 2;
            const detectionPoints = detectionRate === null ? null : 30 * detectionRate;
            const controlPoints = distractorRejectionRate === null ? null : 25 * distractorRejectionRate;
            const discriminationPoints = highBalancedAccuracy === null ? null : 20 * highBalancedAccuracy;
            const availablePoints = (detectionPoints === null ? 0 : 30) + (controlPoints === null ? 0 : 25) + (discriminationPoints === null ? 0 : 20);
            const earnedPoints = (detectionPoints || 0) + (controlPoints || 0) + (discriminationPoints || 0);
            const totalElapsed = robotLevelResults.reduce((total, result) => total + result.elapsed, 0);
            const median = values => {
              const sorted = values.slice().sort((a, b) => a - b);
              if (!sorted.length) return null;
              const middle = Math.floor(sorted.length / 2);
              return sorted.length % 2 ? sorted[middle] : Math.round((sorted[middle - 1] + sorted[middle]) / 2);
            };
            const phaseRates = results => {
              const stats = countStats(results);
              return stats.targets ? `${Math.round(accuracy(stats) * 100)} %` : "Sin datos";
            };
            const lowerSimilarity = countStats(phaseC.filter(result => result.condition === "Similitud baja"), [0, 1]);
            const lowerBalancedAccuracy = accuracy(lowerSimilarity) === null || specificity(lowerSimilarity) === null
              ? null
              : (accuracy(lowerSimilarity) + specificity(lowerSimilarity)) / 2;
            const highVsLowChange = lowerBalancedAccuracy === null || highBalancedAccuracy === null
              ? null
              : Math.round((lowerBalancedAccuracy - highBalancedAccuracy) * 100);
            const omissionLabel = count => `${count} ${count === 1 ? "omisión" : "omisiones"}`;
            const falseAlarmLabel = count => `${count} ${count === 1 ? "falsa alarma" : "falsas alarmas"}`;
            const successfulDRounds = phaseD.filter(result => result.hits > 0 && result.firstTargetSelectionMs !== null);
            const dTimes = successfulDRounds.map(result => result.firstTargetSelectionMs);
            const medianSearchMs = median(dTimes);
            const completedRounds = robotLevelResults.length;
            const protocolComplete = completedRounds === 20;
            const scoreText = `${earnedPoints.toFixed(1)} / ${availablePoints} puntos descriptivos`;
            rows.push(
              ["Fecha de la sesión", new Date().toLocaleString("es-ES")],
              ["Versión", "Protocolo exploratorio principal FAND · A–D · 20 cuadrículas"],
              ["Cuadrículas completadas", `${completedRounds} de 20`],
              ["Fase A · reconocimiento básico", `${phaseA.length} de 4 · ${phaseRates(phaseA)} de objetivos encontrados`],
              ["Fase A · aciertos / omisiones", `${phaseA.reduce((total, result) => total + result.hits, 0)} / ${phaseA.reduce((total, result) => total + result.omissions, 0)} · fase de reconocimiento, fuera de la puntuación principal`],
              ["Fase B · atención selectiva", `${phaseB.length} de 6 · ${phaseRates(phaseB)} de objetivos encontrados`],
              ["Fase C · discriminación visual", `${phaseC.length} de 6 · ${phaseRates(phaseC)} de objetivos encontrados`],
              ["Fase D · eficiencia de búsqueda", `${successfulDRounds.length} de ${phaseD.length} objetivos encontrados`],
              ["Objetivos encontrados en B–C", `${coreStats.hits} de ${coreStats.targets} · ${detectionRate === null ? "sin datos" : `${Math.round(detectionRate * 100)} %`}`],
              ["Omisiones en B–C", coreStats.omissions],
              ["Falsas alarmas en B–C", `${coreStats.falseAlarms} de ${coreStats.distractors} distractores`],
              ["Distractores correctamente ignorados en B–C", specificity(coreStats) === null ? "Sin datos" : `${Math.round(specificity(coreStats) * 100)} %`],
              ["Selección de objetivos en similitud alta", accuracy(highSimilarity) === null ? "Sin datos" : `${highSimilarity.hits} de ${highSimilarity.targets} · ${Math.round(accuracy(highSimilarity) * 100)} %`],
              ["Discriminación ante los distractores más similares", `${highSimilarity.distractors - highSimilarity.falseAlarms} de ${highSimilarity.distractors} ignorados`],
              ["Exactitud equilibrada en similitud alta", highBalancedAccuracy === null ? "Sin datos" : `${Math.round(highBalancedAccuracy * 100)} %`],
              ["Diferencia de exactitud equilibrada (baja − alta)", highVsLowChange === null ? "No calculable" : `${highVsLowChange > 0 ? "+" : ""}${highVsLowChange} puntos porcentuales`],
              ["Puntos descriptivos de detección", detectionPoints === null ? "Sin datos" : `${detectionPoints.toFixed(1)} / 30`],
              ["Puntos descriptivos de control de distractores", controlPoints === null ? "Sin datos" : `${controlPoints.toFixed(1)} / 25`],
              ["Puntos descriptivos de discriminación", discriminationPoints === null ? "Sin datos" : `${discriminationPoints.toFixed(1)} / 20`],
              ["Puntuación descriptiva parcial", scoreText],
              ["Tiempo mediano hasta el primer objetivo correcto en D", medianSearchMs === null ? "Sin datos" : `${(medianSearchMs / 1000).toFixed(1)} s · ${successfulDRounds.length} acierto(s)`],
              ["Tiempo total en cuadrículas (sin transiciones)", `${(totalElapsed / 1000).toFixed(1)} s`],
              ["Modalidad", robotTimedMode ? "Con límite por cuadrícula (15, 20 o 30 s)" : "Sin límite por cuadrícula"],
              ["Estabilidad del rendimiento", "No puntuable: requiere el módulo complementario de búsqueda continuada"],
              ["Módulos complementarios E–F", "No incluidos en el protocolo principal"]
            );
            const comparisons = [];
            if (highVsLowChange !== null && highVsLowChange > 0) comparisons.push(`la exactitud equilibrada fue ${highVsLowChange} puntos porcentuales menor con distractores de similitud alta que con los de similitud baja`);
            else if (highVsLowChange !== null && highVsLowChange < 0) comparisons.push(`la exactitud equilibrada fue ${Math.abs(highVsLowChange)} puntos porcentuales mayor con distractores de similitud alta que con los de similitud baja`);
            if (coreStats.omissions > coreStats.falseAlarms) comparisons.push(`las omisiones (${coreStats.omissions}) superaron a las falsas alarmas (${coreStats.falseAlarms})`);
            else if (coreStats.falseAlarms > coreStats.omissions) comparisons.push(`las falsas alarmas (${coreStats.falseAlarms}) superaron a las omisiones (${coreStats.omissions})`);
            else if (coreStats.targets) comparisons.push(`se registraron ${omissionLabel(coreStats.omissions)} y ${falseAlarmLabel(coreStats.falseAlarms)}`);
            const observed = comparisons.length ? comparisons.join("; ") : "no hay suficientes respuestas para describir diferencias entre condiciones";
            summary = `${protocolComplete ? "Protocolo completado" : "Protocolo interrumpido"}: ${observed}. Estos datos describen únicamente esta sesión; no indican por sí solos una dificultad ni un diagnóstico.`;
            robotScoringNote = "Puntuación descriptiva provisional, no normativa: detección = sensibilidad en B–C × 30; control de distractores = especificidad en B–C × 25; discriminación = exactitud equilibrada en C, calculada con objetivos y distractores de similitud alta (3 de 4 rasgos) × 20. El informe muestra el número real de distractores de alta similitud disponibles. La similitud se define por color, forma, antena y expresión; no es una medida perceptual validada. La suma parcial disponible es sobre 75 puntos. La eficiencia se informa con el tiempo mediano hasta el primer objetivo correcto en D; no recibe puntos. No se asignan puntos a estabilidad ni existen baremos por edad validados.";
            robotInterpretationNote = "Conclusión descriptiva: la fase A comprueba reconocimiento y comprensión; B y C describen detección, omisiones, falsas alarmas y efecto de la similitud; D describe tiempos con distintos tamaños de cuadrícula. La prueba aporta información de búsqueda visual y atención selectiva, distinta de la memoria secuencial visoespacial de «Recuerda la Secuencia».";
            saveProfile("J01", {
              ageGroup: ageValue(), level: "A–D", valid: protocolComplete, completed: protocolComplete,
              timed: robotTimedMode,
              metrics: {
                completedRounds, detectionRate: detectionRate === null ? null : detectionRate * 100,
                omissions: coreStats.omissions, falseAlarms: coreStats.falseAlarms,
                falseAlarmRate: specificity(coreStats) === null ? null : (1 - specificity(coreStats)) * 100,
                highSimilarityBalancedAccuracy: highBalancedAccuracy === null ? null : highBalancedAccuracy * 100,
                similarityEffect: highVsLowChange, searchMedianMs: medianSearchMs
              }
            });
          } else if (kind === "go-no-go") {
            const go = records.filter(item => item.condition === "Go");
            const noGo = records.filter(item => item.condition === "No-Go");
            const goHits = go.filter(item => item.correct).length;
            const commissions = noGo.filter(item => !item.correct).length;
            const omissions = go.filter(item => item.omitted).length;
            const inhibitions = noGo.length - commissions;
            const pct = (part, total) => total ? part / total * 100 : null;
            const fmtPct = value => value === null ? "Sin datos" : `${value.toFixed(1).replace(".", ",")} %`;
            const median = values => {
              const sorted = values.slice().sort((a, b) => a - b);
              if (!sorted.length) return null;
              const middle = Math.floor(sorted.length / 2);
              return sorted.length % 2 ? sorted[middle] : (sorted[middle - 1] + sorted[middle]) / 2;
            };
            const validRt = go.filter(item => item.responseMs !== null && !item.anticipatory).map(item => item.responseMs);
            const anticipatory = go.filter(item => item.anticipatory).length;
            const rtMedian = median(validRt);
            const rtMean = validRt.length ? validRt.reduce((sum, value) => sum + value, 0) / validRt.length : null;
            const rtSd = validRt.length > 1 ? Math.sqrt(validRt.reduce((sum, value) => sum + (value - rtMean) ** 2, 0) / (validRt.length - 1)) : null;
            const cv = rtSd !== null && validRt.length >= 10 ? rtSd / rtMean : null;
            const goAccuracy = pct(goHits, go.length);
            const inhibitionRate = pct(inhibitions, noGo.length);
            const attentionPoints = go.length ? 20 * goHits / go.length : null;
            const inhibitionPoints = noGo.length ? 35 * inhibitions / noGo.length : null;
            const partialPoints = (attentionPoints || 0) + (inhibitionPoints || 0);
            const blockNumbers = [...new Set(records.map(item => item.block))].filter(Boolean);
            const blockStats = blockNumbers.map(number => {
              const group = records.filter(item => item.block === number);
              const groupGo = group.filter(item => item.condition === "Go");
              const groupNoGo = group.filter(item => item.condition === "No-Go");
              const groupRt = groupGo.filter(item => item.responseMs !== null && !item.anticipatory).map(item => item.responseMs);
              return { number, goAcc: pct(groupGo.filter(item => item.correct).length, groupGo.length), inhibition: pct(groupNoGo.filter(item => item.correct).length, groupNoGo.length), rt: median(groupRt) };
            });
            const afterError = [];
            const afterHit = [];
            records.forEach((item, index) => {
              if (index === 0 || item.condition !== "Go" || item.responseMs === null || item.anticipatory) return;
              (records[index - 1].correct ? afterHit : afterError).push(item.responseMs);
            });
            const blockText = blockStats.map(item => `B${item.number}: Go ${item.goAcc === null ? "—" : Math.round(item.goAcc) + " %"}, inhibición ${item.inhibition === null ? "—" : Math.round(item.inhibition) + " %"}, mediana ${item.rt === null ? "—" : Math.round(item.rt) + " ms"}`).join(" · ");
            const firstBlock = blockStats[0];
            const lastBlock = blockStats[blockStats.length - 1];
            const blockChange = blockStats.length > 1 && firstBlock.inhibition !== null && lastBlock.inhibition !== null
              ? `${Math.round(lastBlock.inhibition - firstBlock.inhibition) > 0 ? "+" : ""}${Math.round(lastBlock.inhibition - firstBlock.inhibition)} puntos porcentuales de inhibición entre el primer y el último bloque; ${firstBlock.goAcc !== null && lastBlock.goAcc !== null ? `${Math.round(lastBlock.goAcc - firstBlock.goAcc) > 0 ? "+" : ""}${Math.round(lastBlock.goAcc - firstBlock.goAcc)} puntos en precisión Go` : "precisión Go sin datos"}`
              : "No calculable";
            const observations = [];
            if (commissions > 0) observations.push("errores No-Go: conviene explorar control inhibitorio, estrategia y equilibrio velocidad-precisión");
            if (omissions > 0) observations.push("omisiones Go: conviene explorar atención sostenida, comprensión y factores motores o perceptivos");
            if (cv !== null && cv > 0.35) observations.push("variabilidad temporal elevada en esta sesión: conviene explorar regulación atencional y condiciones de administración");
            if (blockStats.length > 1 && firstBlock.inhibition !== null && lastBlock.inhibition !== null && lastBlock.inhibition < firstBlock.inhibition - 10) observations.push("descenso de inhibición entre bloques: conviene explorar resistencia a la tarea, fatiga y motivación");
            const quality = [];
            if (anticipatory) quality.push(`${anticipatory} respuesta(s) anticipada(s) (<150 ms), excluidas del tiempo de reacción`);
            if (gngInterruptions) quality.push(`${gngInterruptions} posible(s) interrupción(es) (la pestaña quedó oculta)`);
            if (records.length < gngLevels[level - 1].go + gngLevels[level - 1].noGo) quality.push("sesión incompleta");
            rows.push(
              ["Versión / nivel", `Pulsa o Espera v1.0 · nivel ${level} (${levelDescriptions["go-no-go"][level - 1]})`],
              ["Precisión Go (Go correctos ÷ total Go)", `${goHits} de ${go.length} · ${fmtPct(goAccuracy)}`],
              ["Omisiones Go", `${omissions} · ${fmtPct(pct(omissions, go.length))}`],
              ["Inhibición correcta (No-Go sin pulsación ÷ total No-Go)", `${inhibitions} de ${noGo.length} · ${fmtPct(inhibitionRate)}`],
              ["Errores de comisión (pulsaciones ante No-Go)", `${commissions} · ${fmtPct(pct(commissions, noGo.length))}`],
              ["Puntos de atención (20 × precisión Go)", attentionPoints === null ? "Sin datos" : `${attentionPoints.toFixed(1)} / 20`],
              ["Puntos de inhibición (35 × inhibición correcta)", inhibitionPoints === null ? "Sin datos" : `${inhibitionPoints.toFixed(1)} / 35`],
              ["Puntuación parcial provisional", `${partialPoints.toFixed(1)} / 55 · experimental, sin baremos`],
              ["Tiempo de reacción mediano (Go correctos)", rtMedian === null ? "Sin respuestas válidas" : `${Math.round(rtMedian)} ms`],
              ["Desviación estándar del tiempo de reacción", rtSd === null ? "No calculable" : `${Math.round(rtSd)} ms`],
              ["Coeficiente de variación (DE ÷ media)", cv === null ? "No calculable (se necesitan al menos 10 respuestas válidas)" : cv.toFixed(2).replace(".", ",")],
              ["Rendimiento por bloques", blockText || "Sin datos"],
              ["Cambio entre primer y último bloque", blockChange],
              ["Tiempo mediano tras error / tras acierto", `${afterError.length >= 3 ? Math.round(median(afterError)) + " ms" : "pocos datos"} / ${afterHit.length >= 3 ? Math.round(median(afterHit)) + " ms" : "pocos datos"} · indicador exploratorio`],
              ["Respuestas anticipadas (<150 ms)", anticipatory],
              ["Calidad de los datos", quality.length ? quality.join("; ") : "Sin incidencias detectadas"],
              ["Práctica de comprensión", gngPracticeAttempts ? `Criterio del 80 % alcanzado tras ${gngPracticeAttempts} repetición(es)` : "Criterio del 80 % alcanzado a la primera"],
              ["Aspectos que podrían explorarse", observations.length ? observations.join("; ") : "No se observan patrones que destacar en esta sesión"],
              ["Flexibilidad cognitiva (cambio de regla)", "No incluida en esta versión; se informaría por separado de la inhibición"]
            );
            summary = `${goHits} respuesta(s) Go correcta(s) de ${go.length} (${fmtPct(goAccuracy)}) y ${inhibitions} inhibición(es) correcta(s) de ${noGo.length} (${fmtPct(inhibitionRate)}). Una inhibición alta solo es informativa junto con una precisión Go adecuada. Estos datos describen únicamente esta sesión.`;
                        saveProfile("J03", {
                          ageGroup: ageValue(), level, valid: records.length >= gngLevels[level - 1].go + gngLevels[level - 1].noGo && gngInterruptions === 0 && goHits > 0,
                          completed: records.length >= gngLevels[level - 1].go + gngLevels[level - 1].noGo, interruptions: gngInterruptions,
                          metrics: {
                            goTrials: go.length, noGoTrials: noGo.length, goAccuracy, omissionRate: pct(omissions, go.length),
                            commissionRate: pct(commissions, noGo.length), rtMedianMs: rtMedian, rtCv: cv, anticipatory
                          }
                        });
                        goNoGoNote = "La puntuación de 100 puntos de la ficha no se calcula: solo atención (20) e inhibición (35) tienen fórmula directa; consistencia, velocidad ajustada, mantenimiento y autorregulación requieren distribuciones de referencia. Los resultados son directos (lo que hizo la persona); no hay resultado normativo ni percentiles hasta disponer de baremos FAND por edad. No se interpreta automáticamente como diagnóstico ni como rendimiento bajo o alto. Una respuesta lenta no se interpreta como dificultad inhibitoria sin comprobar la precisión y la capacidad motora. Los efectos de práctica pueden influir en repeticiones.";
          } else {
            const congruent = records.filter(item => item.condition === "Congruente");
            const incongruent = records.filter(item => item.condition === "Incongruente");
            const accuracy = list => list.length ? Math.round(list.filter(item => item.correct).length / list.length * 100) : null;
            const mean = list => {
              const values = list.filter(item => item.responseMs !== null).map(item => item.responseMs);
              return values.length ? Math.round(values.reduce((sum, value) => sum + value, 0) / values.length) : null;
            };
            const congruentAccuracy = accuracy(congruent);
            const incongruentAccuracy = accuracy(incongruent);
            const congruentMean = mean(congruent);
            const incongruentMean = mean(incongruent);
            const accuracyCost = congruentAccuracy === null || incongruentAccuracy === null ? "No calculable" : `${congruentAccuracy - incongruentAccuracy} puntos porcentuales`;
            const timeCost = congruentMean === null || incongruentMean === null ? "No calculable" : `${incongruentMean - congruentMean} ms`;
            rows.push(["Aciertos congruentes", congruentAccuracy === null ? "Sin datos" : `${congruentAccuracy} % (${congruent.filter(item => item.correct).length}/${congruent.length})`], ["Aciertos incongruentes", incongruentAccuracy === null ? "Sin datos" : `${incongruentAccuracy} % (${incongruent.filter(item => item.correct).length}/${incongruent.length})`], ["Diferencia de precisión (congruente − incongruente)", accuracyCost], ["Tiempo medio congruente", congruentMean === null ? "Sin respuestas" : `${congruentMean} ms`], ["Tiempo medio incongruente", incongruentMean === null ? "Sin respuestas" : `${incongruentMean} ms`], ["Diferencia de tiempo (incongruente − congruente)", timeCost], ["Ensayos registrados", records.length]);
            summary = `La precisión fue ${congruentAccuracy === null ? "sin datos" : `${congruentAccuracy} %`} en ensayos congruentes y ${incongruentAccuracy === null ? "sin datos" : `${incongruentAccuracy} %`} en incongruentes. Las diferencias de precisión y tiempo son descriptivas de esta partida, no una puntuación diagnóstica.`;
          }
          const deviceType = typeof navigator.userAgentData?.mobile === "boolean"
            ? navigator.userAgentData.mobile ? "Móvil" : "Ordenador o tableta"
            : window.matchMedia("(max-width: 760px)").matches ? "Pantalla pequeña (móvil/tableta)" : "Pantalla grande (ordenador/portátil)";
          const inputType = window.matchMedia("(pointer: coarse)").matches ? "Interacción táctil disponible" : "Puntero fino disponible";
          rows.push(["Tipo de dispositivo (estimado)", deviceType], ["Entrada detectada", inputType]);
          rows.forEach(([label, value]) => {
            const row = document.createElement("tr");
            row.append(element("th", "", label), element("td", "", String(value)));
            body.append(row);
          });
          details.append(body);
          report.append(element("p", "bubble-score-summary", summary), details);
          if (kind === "robots") {
            report.append(element("p", "bubble-score-note", robotScoringNote), element("p", "bubble-score-note", robotInterpretationNote));
          }
          if (kind === "go-no-go") report.append(element("p", "bubble-score-note", goNoGoNote));
          report.append(element("p", "bubble-score-note", `${kind === "robots" ? "Protocolo FAND A–D" : `Nivel ${level}`} · ${ageSelect.options[ageSelect.selectedIndex].text}. Actividad exploratoria, sin baremos validados; el resultado no diagnostica ni permite clasificar una capacidad como baja o alta. El tipo de dispositivo se estima a partir del navegador o el tamaño de pantalla; no es una identificación técnica exacta. El dispositivo y la forma de responder pueden afectar los tiempos.`));
          if (records.length) {
            const detailTable = document.createElement("table");
            const headRow = document.createElement("tr");
            ["Ensayo", ...(records[0].block ? ["Bloque"] : []), "Condición", "Resultado", "Tiempo de respuesta"].forEach(label => headRow.append(element("th", "", label)));
            const head = document.createElement("thead");
            head.append(headRow);
            const detailBody = document.createElement("tbody");
            records.forEach(item => {
              const row = document.createElement("tr");
              row.append(element("td", "", String(item.number)), ...(records[0].block ? [element("td", "", String(item.block))] : []), element("td", "", item.condition), element("td", "", item.omitted ? "Omisión" : item.correct ? "Correcto" : "Error"), element("td", "", item.responseMs === null ? "—" : `${Math.round(item.responseMs)} ms`));
              detailBody.append(row);
            });
            detailTable.append(head, detailBody);
            report.append(element("h5", "", "Registro de ensayos"), detailTable);
          }
          if (kind === "robots") {
            report.append(element("h5", "", "Resultados por cuadrícula"));
            const roundTable = document.createElement("table");
            const roundHead = document.createElement("thead");
            const roundHeader = document.createElement("tr");
            ["Fase", "Condición", "Cuadrícula", "Robots", "Aciertos", "Omisiones", "Falsas alarmas", "Tiempo", "Finalización"].forEach(label => roundHeader.append(element("th", "", label)));
            roundHead.append(roundHeader);
            const roundBody = document.createElement("tbody");
            robotLevelResults.forEach(result => {
              const row = document.createElement("tr");
              [`${result.phase} · ${result.phaseName}`, result.condition, `${result.phaseRound}`, `${result.totalItems}`, `${result.hits} de ${result.targetCount}`, String(result.omissions), String(result.falseAlarms), `${(result.elapsed / 1000).toFixed(1)} s`, result.endedBy].forEach(value => row.append(element("td", "", value)));
              roundBody.append(row);
            });
            roundTable.append(roundHead, roundBody);
            report.append(roundTable);
            const selectionDetails = document.createElement("details");
            selectionDetails.append(element("summary", "", "Registro de selecciones y tiempos"));
            const selectionTable = document.createElement("table");
            const selectionHead = document.createElement("thead");
            const selectionHeader = document.createElement("tr");
            ["Orden", "Fase", "Cuadrícula", "Posición", "Robot", "Resultado", "Coincidencias con el modelo", "Tiempo desde inicio de cuadrícula"].forEach(label => selectionHeader.append(element("th", "", label)));
            selectionHead.append(selectionHeader);
            const selectionBody = document.createElement("tbody");
            robotSelectionEvents.forEach(event => {
              const plan = robotRoundPlans[event.roundIndex];
              const row = document.createElement("tr");
              [
                String(event.order),
                `${plan.phase} · ${plan.phaseName}`,
                String(plan.phaseRound),
                String(event.position),
                event.modelId.replace("modelo-", ""),
                event.target ? "Objetivo seleccionado" : "Falsa alarma",
                event.target ? "4 de 4" : `${event.similarity} de 4`,
                `${(event.elapsedMs / 1000).toFixed(2)} s`
              ].forEach(value => row.append(element("td", "", value)));
              selectionBody.append(row);
            });
            selectionTable.append(selectionHead, selectionBody);
            selectionDetails.append(selectionTable);
            report.append(selectionDetails);
            const stimulusDetails = document.createElement("details");
            stimulusDetails.append(element("summary", "", "Registro de todos los robots presentados y sus posiciones"));
            const stimulusTable = document.createElement("table");
            const stimulusHead = document.createElement("thead");
            const stimulusHeader = document.createElement("tr");
            ["Fase", "Cuadrícula", "Posición", "Robot", "Tipo", "Coincidencias con el modelo"].forEach(label => stimulusHeader.append(element("th", "", label)));
            stimulusHead.append(stimulusHeader);
            const stimulusBody = document.createElement("tbody");
            robotLevelResults.forEach(result => {
              result.stimuli.forEach(item => {
                const row = document.createElement("tr");
                [
                  `${result.phase} · ${result.phaseName}`,
                  String(result.phaseRound),
                  String(item.position),
                  item.modelId.replace("modelo-", ""),
                  item.target ? "Objetivo" : "Distractor",
                  item.target ? "4 de 4" : `${item.similarity} de 4`
                ].forEach(value => row.append(element("td", "", value)));
                stimulusBody.append(row);
              });
            });
            stimulusTable.append(stimulusHead, stimulusBody);
            stimulusDetails.append(stimulusTable);
            report.append(stimulusDetails);
          }
          const pdf = element("button", "secondary", "Descargar informe PDF");
          pdf.type = "button";
          pdf.addEventListener("click", () => downloadReportPdf(report, `informe-${kind}-fand.pdf`));
          const restart = element("button", "secondary", "Volver a jugar");
          restart.type = "button";
          restart.addEventListener("click", () => attentionGame(kind));
          report.append(pdf, restart);
          board.replaceChildren(report);
          status.textContent = "Partida finalizada. El informe presenta observaciones descriptivas, no diagnósticas.";
        }

        function finish() {
          if (ended) return;
          if (kind === "robots" && robotItems.length && !robotLevelCaptured) captureRobotLevel();
          ended = true;
          running = false;
          stopCurrentRun();
          stopCurrentRun = () => {};
          if (timer !== null) window.clearTimeout(timer);
          if (timeout !== null) window.clearTimeout(timeout);
          timer = null;
          timeout = null;
          activeTrial = null;
          makeReport();
          board.querySelector(".attention-report")?.scrollIntoView({ behavior: "smooth", block: "start" });
        }

        function begin() {
          if (running || ended || !practiceComplete) return;
          level = kind === "robots" ? 1 : levelValue();
          running = true;
          setup.hidden = true;
          start.hidden = true;
          practicePrompt.textContent = "Partida en curso · sigue la regla y completa la actividad.";
          feedback.textContent = `Nivel ${level} · ${ageInstructions[ageValue()]}`;
          records = [];
          trialNumber = 0;
          if (kind === "robots") {
            robotTimedMode = robotDurationSelect.value === "timed";
            robotLevelResults = [];
            robotRoundPlans = makeRobotProtocol();
            robotRoundIndex = -1;
            robotSelectionEvents = [];
            timer = null;
            robotProgressTimer = null;
          }
          stage.classList.toggle("attention-child", ageValue() === "child");
          cleanups.push(() => {
            stopCurrentRun();
            if (timer !== null) window.clearTimeout(timer);
            if (timeout !== null) window.clearTimeout(timeout);
            running = false;
          });
          if (kind === "watcher") startWatcher();
          else if (kind === "robots") startRobots(0);
          else if (kind === "go-no-go") startGoNoGo();
          else startSimon();
          stage.scrollIntoView({ behavior: "smooth", block: "center" });
        }

        const watcherLevelSpecs = [
          { name: "Detección básica", prop: 0.4, gap: [1500, 2000], trials: 18, set: "easy" },
          { name: "Discriminación", prop: 0.3, gap: [1500, 2000], trials: 26, set: "mid" },
          { name: "Distractores similares", prop: 0.25, gap: [1500, 2000], trials: 30, set: "similar" },
          { name: "Vigilancia", prop: 0.2, gap: [1500, 2500], trials: 40, set: "similar" },
          { name: "Atención prolongada", prop: 0.2, gap: [1500, 2500], trials: 75, set: "similar" },
          { name: "Vigilancia avanzada", prop: 0.175, gap: [1500, 3000], trials: 100, set: "similar" }
        ];
        const watcherAgePlan = [[1, 2], [1, 2, 3, 4], [1, 2, 3, 4, 5], [1, 2, 3, 4, 5, 6], [1, 2, 3, 4, 5, 6], [1, 2, 3, 4, 5, 6]];
        const watcherGlyphs = {
          easy: [["●", "#4886a6"], ["▲", "#6a8e64"], ["■", "#946c89"]],
          mid: [["●", "#4886a6"], ["▲", "#6a8e64"], ["■", "#946c89"], ["◆", "#bb7154"], ["✚", "#4886a6"]],
          similar: [["☆", "#d39a16"], ["✦", "#d39a16"], ["✶", "#946c89"], ["✩", "#4886a6"], ["✧", "#bb7154"], ["⬟", "#d39a16"]]
        };

        function startWatcher() {
          const specs = watcherAgePlan[level - 1].map(number => {
            const base = watcherLevelSpecs[number - 1];
            const trials = number === 5 && level <= 3 ? 60 : base.trials;
            return { ...base, number, trials, targets: Math.round(trials * base.prop) };
          });
          const stimulusMs = level <= 2 ? 1200 : 900;
          const validSequence = items => items[0] === "Distractor" && !items.some((item, index) => index >= 3 && item === "Objetivo" && items[index - 1] === "Objetivo" && items[index - 2] === "Objetivo" && items[index - 3] === "Objetivo");
          specs.forEach(spec => {
            let items = [];
            for (let attempt = 0; attempt < 300; attempt++) {
              items = shuffle([...Array(spec.targets).fill("Objetivo"), ...Array(spec.trials - spec.targets).fill("Distractor")]);
              if (validSequence(items)) break;
            }
            spec.sequence = items;
          });
          const totalTrials = specs.reduce((sum, spec) => sum + spec.trials, 0);
          const respond = element("button", "primary", "Lo he visto");
          respond.type = "button";
          const goal = element("p", "attention-go-no-go-state is-ready", "OBJETIVO: ★ estrella amarilla · pulsa solo cuando aparezca");
          const progress = element("p", "attention-go-no-go-progress", `Bloque 1 de ${specs.length}`);
          stage.replaceChildren(goal, progress, stimulus);
          controls.replaceChildren(respond);
          stimulus.textContent = "";
          stimulus.removeAttribute("aria-label");
          let currentResponded = false;
          let started = 0;
          let phaseTimer = null;
          let hideTimer = null;
          let blockIndex = 0;
          let trialInBlock = 0;
          gngInterruptions = 0;
          const onVisibility = () => { if (document.hidden && running) gngInterruptions++; };
          document.addEventListener("visibilitychange", onVisibility);
          const clearTimers = () => {
            if (phaseTimer !== null) window.clearTimeout(phaseTimer);
            if (hideTimer !== null) window.clearTimeout(hideTimer);
            phaseTimer = null;
            hideTimer = null;
          };
          function startBlock() {
            if (!running) return;
            const spec = specs[blockIndex];
            trialInBlock = 0;
            progress.textContent = `Bloque ${blockIndex + 1} de ${specs.length} · ${spec.name}`;
            if (blockIndex === 0) {
              phaseTimer = window.setTimeout(nextTrial, 800);
              return;
            }
            let remaining = 3;
            const tick = () => {
              if (!running) return;
              goal.textContent = `Nuevo bloque · continúa en ${remaining}`;
              feedback.textContent = "Descanso breve. La regla no cambia: estrella amarilla.";
              if (remaining === 0) {
                goal.textContent = "OBJETIVO: ★ estrella amarilla · pulsa solo cuando aparezca";
                nextTrial();
                return;
              }
              remaining--;
              phaseTimer = window.setTimeout(tick, 1000);
            };
            tick();
          }
          function endTrial() {
            if (activeTrial && !currentResponded) {
              record(activeTrial.condition, activeTrial.condition !== "Objetivo", null, activeTrial.condition === "Objetivo", { block: activeTrial.block, watcherLevel: activeTrial.watcherLevel });
            }
            activeTrial = null;
          }
          function nextTrial() {
            if (!running) return;
            endTrial();
            const spec = specs[blockIndex];
            if (trialInBlock >= spec.trials) {
              blockIndex++;
              if (blockIndex >= specs.length) {
                finish();
                return;
              }
              startBlock();
              return;
            }
            const condition = spec.sequence[trialInBlock];
            trialInBlock++;
            trialNumber++;
            const isTarget = condition === "Objetivo";
            activeTrial = { condition, block: blockIndex + 1, watcherLevel: spec.number };
            currentResponded = false;
            const [glyph, color] = isTarget ? ["★", "#d39a16"] : randomItem(watcherGlyphs[spec.set]);
            stimulus.textContent = glyph;
            stimulus.style.color = color;
            stimulus.setAttribute("aria-label", isTarget ? "Estrella amarilla" : "Figura distractora");
            stimulus.classList.remove("attention-stimulus-active");
            void stimulus.offsetWidth;
            stimulus.classList.add("attention-stimulus-active");
            progress.textContent = `Bloque ${blockIndex + 1} de ${specs.length} · ${spec.name} · ${trialInBlock} de ${spec.trials}`;
            started = performance.now();
            respond.disabled = false;
            feedback.textContent = "";
            hideTimer = window.setTimeout(() => {
              hideTimer = null;
              stimulus.textContent = "";
              stimulus.removeAttribute("aria-label");
              stimulus.classList.remove("attention-stimulus-active");
            }, stimulusMs);
            const interval = spec.gap[0] + Math.round(Math.random() * (spec.gap[1] - spec.gap[0]));
            phaseTimer = window.setTimeout(nextTrial, interval);
          }
          respond.addEventListener("click", () => {
            if (!running || !activeTrial || currentResponded) return;
            currentResponded = true;
            respond.disabled = true;
            const rt = performance.now() - started;
            record(activeTrial.condition, activeTrial.condition === "Objetivo", rt, false, { block: activeTrial.block, watcherLevel: activeTrial.watcherLevel, anticipatory: rt < 150 });
          });
          status.textContent = `${totalTrials} ensayos en ${specs.length} bloques de dificultad creciente. Pulsa «Lo he visto» solo ante la estrella amarilla. Durante la evaluación no se indica si cada respuesta fue correcta.`;
          startBlock();
          stopCurrentRun = () => {
            clearTimers();
            document.removeEventListener("visibilitychange", onVisibility);
          };
          cleanups.push(() => {
            clearTimers();
            document.removeEventListener("visibilitychange", onVisibility);
          });
        }

        function captureRobotLevel() {
          if (robotLevelCaptured) return;
          const plan = robotRoundPlans[robotRoundIndex];
          if (!plan) return;
          const targetCount = robotTargets.length;
          const hits = robotTargets.filter(item => robotSelected.has(item.id)).length;
          const omissions = targetCount - hits;
          const falseAlarms = robotItems.filter(item => !item.target && robotSelected.has(item.id)).length;
          const similarity = {};
          [0, 1, 2, 3].forEach(matches => {
            const group = robotItems.filter(item => !item.target && item.similarity === matches);
            similarity[matches] = {
              shown: group.length,
              selected: group.filter(item => robotSelected.has(item.id)).length
            };
          });
          const elapsed = Math.max(0, Math.round(performance.now() - robotLevelStartedAt));
          const selections = robotSelectionEvents.filter(item => item.roundIndex === robotRoundIndex);
          robotLevelResults.push({
            level: robotRoundIndex + 1,
            roundIndex: robotRoundIndex,
            phase: plan.phase,
            phaseName: plan.phaseName,
            phaseRound: plan.phaseRound,
            condition: plan.condition,
            totalItems: robotItems.length,
            targetCount,
            hits,
            omissions,
            falseAlarms,
            accuracy: targetCount ? Math.round(hits / targetCount * 100) : 0,
            elapsed,
            maxSeconds: plan.maxSeconds,
            endedBy: robotSelected.size >= plan.targetAmount ? "Selecciones completadas" : "Tiempo agotado",
            firstSelectionMs: selections.length ? selections[0].elapsedMs : null,
            firstTargetSelectionMs: selections.find(item => item.target)?.elapsedMs ?? null,
            selectionCount: selections.length,
            similarity,
            stimuli: robotItems.map((item, index) => ({
              position: index + 1,
              modelId: item.spriteId,
              target: item.target,
              similarity: item.similarity
            }))
          });
          robotLevelCaptured = true;
        }

        function startRobots(roundIndex) {
          if (!running || ended) return;
          robotRoundIndex = roundIndex;
          const plan = robotRoundPlans[roundIndex];
          if (!plan) {
            finish();
            return;
          }
          level = Math.min(5, Math.ceil((roundIndex + 1) / 4));
          const { totalItems, targetAmount, minSimilarity, maxSimilarity } = plan;
          const traitKeys = ["color", "shape", "antenna", "expression"];
          const similarityToTarget = (candidate, target) => traitKeys.filter(key => candidate[key] === target[key]).length;
          const targetsWithCloseDistractors = robotModels.filter(target => robotModels.some(candidate =>
            candidate.id !== target.id && similarityToTarget(candidate, target) === 3
          ));
          robotTarget = randomItem(plan.phase === "C" ? targetsWithCloseDistractors : robotModels);
          robotSelected = new Set();
          robotItems = [];
          robotTargets = [];
          robotLevelCaptured = false;
          robotLevelLocked = false;
          robotLevelStartedAt = performance.now();
          let id = 0;
          const remainingModels = shuffle(robotModels
            .filter(model => model.id !== robotTarget.id)
            .map(model => ({ model, similarity: similarityToTarget(model, robotTarget) })));
          const preferredModels = remainingModels.filter(item => item.similarity >= minSimilarity && item.similarity <= maxSimilarity);
          const otherModels = remainingModels.filter(item => item.similarity < minSimilarity || item.similarity > maxSimilarity);
          const distractorModels = shuffle([...preferredModels, ...otherModels]).slice(0, totalItems - targetAmount);
          const targetPositions = new Set(plan.targetPositions);
          let distractorIndex = 0;
          for (let position = 0; position < totalItems; position++) {
            if (targetPositions.has(position)) {
              robotItems.push({ ...robotTarget, spriteId: robotTarget.id, id: `robot-${id++}`, similarity: 4, target: true });
              continue;
            }
            const { model: distractor, similarity } = distractorModels[distractorIndex++];
            robotItems.push({ ...distractor, spriteId: distractor.id, id: `robot-${id++}`, similarity, target: false });
          }
          robotTargets = robotItems.filter(item => item.target);
          const model = robotCard(robotTarget, true);
          const prompt = element("p", "attention-robot-prompt", `Toca los ${targetAmount} robots idénticos al modelo. Cada elección queda fijada y la cuadrícula avanza automáticamente al completar la selección.`);
          const grid = element("div", "attention-robot-grid");
          robotItems.forEach((item, index) => {
            const button = element("button", "attention-robot");
            button.type = "button";
            button.append(robotGraphic(item));
            button.setAttribute("aria-label", `Robot ${item.color}, ${traitLabels.shape[item.shape]}, ${traitLabels.antenna[item.antenna]}, ${traitLabels.expression[item.expression]}`);
            button.setAttribute("aria-pressed", "false");
            button.addEventListener("click", () => {
              if (!running || robotLevelLocked || robotSelected.has(item.id)) return;
              robotSelected.add(item.id);
              button.disabled = true;
              button.setAttribute("aria-pressed", "true");
              const modelMatch = robotModels.find(candidate => candidate.id === item.spriteId);
              robotSelectionEvents.push({
                roundIndex,
                itemId: item.id,
                modelId: modelMatch ? modelMatch.id : robotTarget.id,
                position: index + 1,
                target: item.target,
                similarity: item.similarity,
                elapsedMs: Math.max(0, Math.round(performance.now() - robotLevelStartedAt)),
                order: robotSelectionEvents.length + 1
              });
              if (robotSelected.size < targetAmount) {
                feedback.textContent = `Selección registrada. Toca ${targetAmount - robotSelected.size} robot(es) más para pasar a la siguiente cuadrícula.`;
                return;
              }
              robotLevelLocked = true;
              grid.querySelectorAll("button").forEach(robotButton => { robotButton.disabled = true; });
              feedback.textContent = roundIndex + 1 < robotRoundPlans.length
                ? "Selección registrada. Avanzando automáticamente…"
                : "Selección registrada. Preparando los resultados…";
              captureRobotLevel();
              advanceRobotRound();
            });
            grid.append(button);
          });
          const timerLabel = element("strong", "attention-robot-countdown", robotTimedMode ? "00:00 restantes" : "Sin límite de tiempo");
          const progressBar = element("div", "attention-robot-progress");
          const progressFill = element("span");
          progressBar.append(progressFill);
          const stageContents = [model, prompt];
          if (robotTimedMode) stageContents.push(timerLabel, progressBar);
          stageContents.push(grid);
          stage.replaceChildren(...stageContents);
          robotCountdown = timerLabel;
          robotProgress = progressFill;
          if (robotTimedMode) {
            const durationMs = plan.maxSeconds * 1000;
            timerLabel.textContent = `${String(Math.floor(plan.maxSeconds / 60)).padStart(2, "0")}:${String(plan.maxSeconds % 60).padStart(2, "0")} restantes`;
            progressFill.style.transform = "scaleX(1)";
            timer = window.setTimeout(() => {
              timer = null;
              feedback.textContent = "Se agotó el tiempo de esta cuadrícula. Avanzando automáticamente…";
              captureRobotLevel();
              advanceRobotRound();
            }, durationMs);
            robotProgressTimer = window.setInterval(() => {
              if (!running || !robotCountdown || !robotProgress) return;
              const timeLeft = Math.max(0, durationMs - (performance.now() - robotLevelStartedAt));
              const secondsLeft = Math.ceil(timeLeft / 1000);
              robotCountdown.textContent = `${String(Math.floor(secondsLeft / 60)).padStart(2, "0")}:${String(secondsLeft % 60).padStart(2, "0")} restantes`;
              robotProgress.style.transform = `scaleX(${timeLeft / durationMs})`;
            }, 100);
          } else {
            timerLabel.textContent = "Sin límite de tiempo";
          }
          controls.replaceChildren();
          practicePrompt.textContent = `Fase ${plan.phase} · ${plan.phaseName} · cuadrícula ${plan.phaseRound} de ${plan.roundsInPhase} · ${totalItems} robots · ${targetAmount} objetivo(s)`;
          status.textContent = robotTimedMode
            ? `${plan.phaseName}: ${plan.condition}. Máximo ${plan.maxSeconds} s en esta cuadrícula. No podrás cambiar una selección; al elegir ${targetAmount} robots o agotarse el tiempo, avanzarás automáticamente.`
            : `${plan.phaseName}: ${plan.condition}. Sin límite de tiempo. No podrás cambiar una selección; al elegir ${targetAmount} robots, avanzarás automáticamente.`;
          stopCurrentRun = () => {
            if (timer !== null) window.clearTimeout(timer);
            if (robotProgressTimer !== null) window.clearInterval(robotProgressTimer);
            timer = null;
            robotProgressTimer = null;
          };
          if (robotTimedMode) timerLabel.setAttribute("aria-live", "off");
          else timerLabel.setAttribute("aria-live", "polite");
        }

        function advanceRobotRound() {
          if (!running || ended) return;
          if (robotProgressTimer !== null) window.clearInterval(robotProgressTimer);
          robotProgressTimer = null;
          robotCountdown = null;
          robotProgress = null;
          if (timer !== null) window.clearTimeout(timer);
          timer = null;
          const nextRound = robotRoundIndex + 1;
          if (nextRound >= robotRoundPlans.length) {
            finish();
            return;
          }
          timeout = window.setTimeout(() => {
            timeout = null;
            if (!running || ended) return;
            startRobots(nextRound);
            stage.scrollIntoView({ behavior: "smooth", block: "center" });
          }, 350);
        }

        function startGoNoGo() {
          const spec = gngLevels[level - 1];
          const trialTotal = spec.go + spec.noGo;
          const blockCount = spec.blocks;
          const blockSizes = Array.from({ length: blockCount }, (_, index) => Math.floor(trialTotal * (index + 1) / blockCount) - Math.floor(trialTotal * index / blockCount));
          const noGoPerBlock = Array.from({ length: blockCount }, (_, index) => Math.floor(spec.noGo * (index + 1) / blockCount) - Math.floor(spec.noGo * index / blockCount));
          const validSequence = items => items[0] === "Go" && !items.some((item, index) => index >= 2 && item === "No-Go" && items[index - 1] === "No-Go" && items[index - 2] === "No-Go");
          const sequence = [];
          blockSizes.forEach((size, blockIndex) => {
            let items = [];
            for (let attempt = 0; attempt < 300; attempt++) {
              items = shuffle([...Array(noGoPerBlock[blockIndex]).fill("No-Go"), ...Array(size - noGoPerBlock[blockIndex]).fill("Go")]);
              if (validSequence(items)) break;
            }
            items.forEach(item => sequence.push({ condition: item, block: blockIndex + 1 }));
          });
          const respond = element("button", "primary", "PULSAR");
          respond.type = "button";
          const state = element("p", "attention-go-no-go-state", "Preparando la primera señal…");
          const progress = element("p", "attention-go-no-go-progress", `Ensayo 0 de ${trialTotal} · bloque 1 de ${blockCount}`);
          stage.replaceChildren(state, progress, stimulus);
          controls.replaceChildren(respond);
          let currentResponded = false;
          let currentStart = 0;
          let phaseTimer = null;
          gngInterruptions = 0;
          const onVisibility = () => { if (document.hidden && running) gngInterruptions++; };
          document.addEventListener("visibilitychange", onVisibility);
          function gap() {
            return spec.variableGap ? 400 + Math.round(Math.random() * 400) : 450;
          }
          function next() {
            if (!running) return;
            if (trialNumber >= trialTotal) {
              activeTrial = null;
              finish();
              return;
            }
            trialNumber++;
            const { condition, block } = sequence[trialNumber - 1];
            const go = condition === "Go";
            activeTrial = { condition, block };
            currentResponded = false;
            currentStart = performance.now();
            stimulus.textContent = go ? "🟢\nPULSA" : "🔴\nESPERA";
            stimulus.style.color = go ? "#26733d" : "#b42318";
            stimulus.setAttribute("aria-label", go ? "Círculo verde: pulsa" : "Círculo rojo: espera");
            progress.textContent = `Ensayo ${trialNumber} de ${trialTotal} · bloque ${block} de ${blockCount}`;
            state.textContent = go ? "¡AHORA! Pulsa el botón" : "ESPERA · No pulses";
            state.classList.toggle("is-ready", go);
            state.classList.toggle("is-waiting", !go);
            state.classList.remove("is-complete");
            stimulus.classList.remove("attention-stimulus-active");
            void stimulus.offsetWidth;
            stimulus.classList.add("attention-stimulus-active");
            respond.textContent = "PULSAR";
            respond.disabled = false;
            feedback.textContent = `Ensayo ${trialNumber} de ${trialTotal}.`;
            phaseTimer = window.setTimeout(() => {
              phaseTimer = null;
              if (!running || !activeTrial) return;
              if (!currentResponded) {
                record(activeTrial.condition, activeTrial.condition === "No-Go", null, activeTrial.condition === "Go", { block: activeTrial.block });
              }
              const finishedBlock = activeTrial.block;
              activeTrial = null;
              respond.disabled = true;
              stimulus.textContent = "";
              stimulus.removeAttribute("aria-label");
              stimulus.classList.remove("attention-stimulus-active");
              state.classList.remove("is-ready", "is-waiting");
              state.classList.add("is-complete");
              const endsBlock = trialNumber < trialTotal && sequence[trialNumber].block !== finishedBlock;
              if (endsBlock) {
                let remaining = 3;
                const tick = () => {
                  if (!running) return;
                  state.textContent = `Bloque ${finishedBlock} de ${blockCount} terminado · continúa en ${remaining}`;
                  feedback.textContent = "Descanso breve. El ejercicio continuará automáticamente; la regla no cambia.";
                  if (remaining === 0) {
                    next();
                    return;
                  }
                  remaining--;
                  phaseTimer = window.setTimeout(tick, 1000);
                };
                tick();
                return;
              }
              state.textContent = "Cambio de señal · espera a que aparezca la siguiente";
              feedback.textContent = "Espera a la siguiente señal; el botón solo se activa mientras aparece un estímulo.";
              phaseTimer = window.setTimeout(next, gap());
            }, spec.stimulusMs);
          }
          respond.addEventListener("click", () => {
            if (!running) return;
            if (!activeTrial || currentResponded) return;
            currentResponded = true;
            respond.disabled = true;
            const go = activeTrial.condition === "Go";
            const rt = performance.now() - currentStart;
            record(activeTrial.condition, go, go ? rt : null, false, { block: activeTrial.block, anticipatory: go && rt < 150 });
            state.textContent = "Respuesta registrada · espera al siguiente";
            state.classList.remove("is-ready", "is-waiting");
            state.classList.add("is-complete");
            feedback.textContent = "Respuesta registrada. El botón queda desactivado hasta la siguiente señal.";
          });
          status.textContent = `Nivel ${level}: ${trialTotal} ensayos en ${blockCount} bloques. Pulsa mientras ves el verde «PULSA»; no pulses ante el rojo «ESPERA». Durante la evaluación no se indica si cada respuesta fue correcta.`;
          next();
          stopCurrentRun = () => {
            if (phaseTimer !== null) window.clearTimeout(phaseTimer);
            phaseTimer = null;
            document.removeEventListener("visibilitychange", onVisibility);
          };
          cleanups.push(() => {
            if (phaseTimer !== null) window.clearTimeout(phaseTimer);
            document.removeEventListener("visibilitychange", onVisibility);
          });
        }

        function startSimon() {
          const trialTotal = [12, 16, 20, 24, 28][level - 1];
          const conditions = shuffle(Array.from({ length: trialTotal }, (_, index) => index % 2 === 0 ? "Congruente" : "Incongruente"));
          const leftSide = element("div", "", "");
          const rightSide = element("div", "", "");
          const position = element("div", "two-columns");
          position.append(leftSide, rightSide);
          stage.replaceChildren(position);
          const leftButton = element("button", "secondary", "Izquierda · azul");
          const rightButton = element("button", "secondary", "Derecha · rojo");
          leftButton.type = rightButton.type = "button";
          controls.replaceChildren(leftButton, rightButton);
          let currentStarted = 0;
          let trialTimer = null;
          const responseLimit = [2500, 2300, 2100, 1900, 1700][level - 1];
          function next() {
            if (!running) return;
            if (trialTimer !== null) {
              window.clearTimeout(trialTimer);
              trialTimer = null;
            }
            if (activeTrial) record(activeTrial.condition, false, null, true);
            if (trialNumber >= trialTotal) {
              activeTrial = null;
              finish();
              return;
            }
            trialNumber++;
            const condition = conditions[trialNumber - 1];
            const color = Math.random() < 0.5 ? "azul" : "rojo";
            const correctSide = color === "azul" ? "left" : "right";
            const shownSide = condition === "Congruente" ? correctSide : correctSide === "left" ? "right" : "left";
            activeTrial = { condition, correctSide };
            leftSide.replaceChildren();
            rightSide.replaceChildren();
            const dot = element("div", "attention-stimulus", "●");
            dot.style.color = color === "azul" ? "#1769aa" : "#b42318";
            dot.style.minWidth = "76px";
            dot.style.minHeight = "76px";
            dot.setAttribute("aria-label", `Círculo ${color}, aparece a la ${shownSide === "left" ? "izquierda" : "derecha"}`);
            (shownSide === "left" ? leftSide : rightSide).append(dot);
            currentStarted = performance.now();
            leftButton.disabled = rightButton.disabled = false;
            feedback.textContent = `Ensayo ${trialNumber} de ${trialTotal}. Responde según el color; si no respondes en ${responseLimit / 1000} segundos, pasará al siguiente.`;
            trialTimer = window.setTimeout(() => {
              trialTimer = null;
              if (!running || !activeTrial) return;
              record(activeTrial.condition, false, null, true);
              activeTrial = null;
              leftButton.disabled = rightButton.disabled = true;
              feedback.textContent = "Sin respuesta en este ensayo; pasa al siguiente.";
              timeout = window.setTimeout(next, 280);
            }, responseLimit);
          }
          function answer(side) {
            if (!running || !activeTrial) return;
            const trial = activeTrial;
            activeTrial = null;
            if (trialTimer !== null) {
              window.clearTimeout(trialTimer);
              trialTimer = null;
            }
            leftButton.disabled = rightButton.disabled = true;
            record(trial.condition, side === trial.correctSide, performance.now() - currentStarted, false);
            feedback.textContent = side === trial.correctSide ? "Correcto." : "Respuesta distinta a la regla del color.";
            timeout = window.setTimeout(next, 280);
          }
          const keyboardAnswer = event => {
            if (!running || (event.key !== "ArrowLeft" && event.key !== "ArrowRight")) return;
            event.preventDefault();
            answer(event.key === "ArrowLeft" ? "left" : "right");
          };
          document.addEventListener("keydown", keyboardAnswer);
          cleanups.push(() => document.removeEventListener("keydown", keyboardAnswer));
          leftButton.addEventListener("click", () => answer("left"));
          rightButton.addEventListener("click", () => answer("right"));
          status.textContent = `Nivel ${level}: ${trialTotal} ensayos, con la mitad congruentes y la mitad incongruentes. Cada estímulo avanza automáticamente si no hay respuesta.`;
          next();
          stopCurrentRun = () => {
            if (trialTimer !== null) window.clearTimeout(trialTimer);
            if (timeout !== null) window.clearTimeout(timeout);
            trialTimer = null;
            timeout = null;
          };
          cleanups.push(() => {
            if (timeout !== null) window.clearTimeout(timeout);
            if (trialTimer !== null) window.clearTimeout(trialTimer);
          });
        }

        const levelDescriptions = {
          watcher: ["4–5 años · bloques 1–2 (≈ 1,5–2 min)", "6–8 años · bloques 1–4 (≈ 4 min)", "9–12 años · bloques 1–5 (≈ 5–6 min)", "13–17 años · bloques 1–6 (≈ 9–10 min)", "18–59 años · bloques 1–6 (≈ 9–10 min)", "60 años o más · bloques 1–6 (≈ 9–10 min)"],
          robots: ["6 robots, 1 objetivo", "12 robots, 3 objetivos", "20 robots, 5 objetivos", "30 robots, 6 objetivos similares", "40 robots en varias filas, 8 objetivos similares"],
          "go-no-go": ["4–5 años · 30 ensayos (21 Go / 9 No-Go) · 1,5 s por estímulo", "6–8 años · 60 ensayos (45 / 15) · 1 s", "9–12 años · 90 ensayos (68 / 22) · 0,8 s", "13–17 años · 120 ensayos (90 / 30) · 0,7 s", "18–59 años · 120 ensayos (90 / 30) · 0,7 s", "60 años o más · 120 ensayos (90 / 30) · 0,7 s"],
          simon: ["12 ensayos", "16 ensayos", "20 ensayos", "24 ensayos", "28 ensayos · orden imprevisible"]
        };
        [...levelSelect.options].forEach(option => {
          option.textContent += ` · ${levelDescriptions[kind][Number(option.value) - 1]}`;
        });
        preparePractice();
        start.addEventListener("click", begin);
        if (kind === "watcher") {
          stimulus.textContent = "★";
          stimulus.style.color = "#d39a16";
        } else if (kind === "robots") {
          stimulus.textContent = "🤖";
        } else if (kind === "go-no-go") {
          stimulus.textContent = "🟢\nPULSA";
          stimulus.style.color = "#26733d";
        } else {
          stimulus.textContent = "●";
          stimulus.style.color = "#1769aa";
        }
      }

      function goNoGoGame() {
        const { board, status } = makeActivity("Que no te engañen · colores en conflicto", "Identifica el color de la tinta de la palabra superior y elige abajo la palabra que nombra ese color. Ignora el significado de la palabra superior y el color de las opciones.");
        const palette = [
          { name: "ROJO", ink: "#b42318" },
          { name: "AZUL", ink: "#1769aa" },
          { name: "VERDE", ink: "#26733d" },
          { name: "AMARILLO", ink: "#946500" }
        ];
        const durationMs = 90000;
        const phaseDurationMs = durationMs / 6;
        const maxStimulusMs = 3500;
        const setup = element("div", "stroop-setup");
        setup.append(element("strong", "", "Elige una modalidad"));
        const modeSelect = document.createElement("select");
        modeSelect.setAttribute("aria-label", "Modalidad de la actividad");
        [
          ["standard", "Prueba principal · seis bloques de 15 segundos · 90 segundos"],
          ["rule-shift", "Cambio de regla avisado · módulo independiente · 90 segundos"],
          ["distractors", "Distractores visuales · módulo independiente · 90 segundos"]
        ].forEach(([value, label]) => {
          const option = document.createElement("option");
          option.value = value;
          option.textContent = label;
          modeSelect.append(option);
        });
        const checks = element("div", "stroop-checks");
        function makeSelfCheck(labelText, ariaLabel, options) {
          const label = element("label", "stroop-check", labelText);
          const select = document.createElement("select");
          select.setAttribute("aria-label", ariaLabel);
          options.forEach(([value, text]) => {
            const option = document.createElement("option");
            option.value = value;
            option.textContent = text;
            select.append(option);
          });
          label.append(select);
          checks.append(label);
          return select;
        }
        const readingCheck = makeSelfCheck("Lectura", "Autoevaluación de lectura", [
          ["not-reported", "Sin indicar"],
          ["comfortable", "Leo palabras con comodidad"],
          ["difficulty", "Me cuesta leer palabras"]
        ]);
        const colorCheck = makeSelfCheck("Percepción de colores", "Autoevaluación de percepción de colores", [
          ["not-reported", "Sin indicar"],
          ["comfortable", "Distingo los colores con comodidad"],
          ["difficulty", "Me cuesta distinguir algunos colores"]
        ]);
        setup.append(modeSelect, checks, element("p", "", "En la prueba principal, los bloques 1–4 presentan por separado las combinaciones de conflicto; los bloques 5–6 mezclan las cuatro condiciones. Los otros dos módulos se informan aparte y no se comparan con la prueba principal."));
        const modeNote = element("p", "bubble-score-note", "Primero completarás una práctica obligatoria. No cuenta para los resultados.");
        const practice = element("div", "stroop-stimulus");
        const prompt = element("p", "stroop-prompt", "¿De qué color está escrita la palabra?");
        const word = element("div", "stroop-word");
        const choices = element("div", "stroop-choices");
        const feedback = element("p", "status", "Práctica: la palabra dice ROJO, pero está escrita en azul. Elige AZUL.");
        const practiceAgain = element("button", "secondary", "Repetir ejemplo");
        practiceAgain.type = "button";
        practiceAgain.hidden = true;
        const start = element("button", "primary", "Empezar práctica");
        start.type = "button";
        start.hidden = true;
        start.disabled = true;
        const setupActions = element("div", "tower-controls");
        setupActions.append(start);
        practice.append(prompt, word, choices, feedback, practiceAgain);
        board.append(setup, modeNote, practice, setupActions);
        word.textContent = "ROJO";
        word.style.color = palette[1].ink;
        let practiceComplete = false;
        let running = false;
        let finished = false;
        let elapsedMs = 0;
        let tickTimer = null;
        let stimulusTimer = null;
        let activeTrial = null;
        let trialStartedAt = 0;
        let trialCount = 0;
        let trials = [];
        let conditionCycle = 0;
        let currentBlock = -1;
        let lastPromptedRule = "ink";
        const countdown = element("strong", "", "90 s");
        const blockLabel = element("span", "", "Práctica");
        const hitLabel = element("span", "", "Aciertos: 0");
        const errorLabel = element("span", "", "Errores: 0");
        const progressBar = element("div", "stroop-progress");
        const progressFill = element("span");
        progressBar.append(progressFill);

        function makeTrial(topConflict, optionConflict, rule = "ink") {
          const targetIndex = Math.floor(Math.random() * palette.length);
          const topWordIndex = topConflict
            ? (targetIndex + 1 + Math.floor(Math.random() * (palette.length - 1))) % palette.length
            : targetIndex;
          const answerLabel = rule === "ink" ? targetIndex : topWordIndex;
          const distractorIndex = (answerLabel + 1 + Math.floor(Math.random() * (palette.length - 1))) % palette.length;
          const lowerLabels = Math.random() < 0.5
            ? [answerLabel, distractorIndex]
            : [distractorIndex, answerLabel];
          return {
            topWordIndex,
            targetIndex,
            topConflict,
            optionConflict,
            rule,
            correctIndex: rule === "ink" ? targetIndex : topWordIndex,
            lowerOptions: lowerLabels.map(labelIndex => ({
              labelIndex,
              inkIndex: optionConflict
                ? (labelIndex + 1 + Math.floor(Math.random() * (palette.length - 1))) % palette.length
                : labelIndex
            }))
          };
        }

        function displayTrial(trial) {
          activeTrial = trial;
          trial.remainingMs = Math.max(0, durationMs - elapsedMs);
          trialCount++;
          prompt.textContent = trial.rule === "ink"
            ? "¿De qué color está escrita la palabra? Elige abajo ese nombre."
            : "¿Qué color nombra la palabra? Elige abajo ese nombre.";
          word.textContent = palette[trial.topWordIndex].name;
          word.style.color = palette[trial.targetIndex].ink;
          choices.replaceChildren();
          trial.lowerOptions.forEach((option, index) => {
            const button = element("button", "stroop-choice", palette[option.labelIndex].name);
            button.type = "button";
            button.style.color = palette[option.inkIndex].ink;
            button.setAttribute("aria-label", `Opción ${index + 1}: palabra ${palette[option.labelIndex].name}, tinta ${palette[option.inkIndex].name.toLowerCase()}`);
            button.addEventListener("click", () => answerTrial(index));
            choices.append(button);
          });
          feedback.textContent = "";
          trialStartedAt = performance.now();
          if (stimulusTimer !== null) window.clearTimeout(stimulusTimer);
          stimulusTimer = schedule(() => {
            stimulusTimer = null;
            if (running && activeTrial === trial) answerTrial(null);
          }, Math.min(maxStimulusMs, durationMs - elapsedMs));
        }

        function getBlockIndex() {
          return Math.min(5, Math.floor(elapsedMs / phaseDurationMs));
        }

        function getConditionForBlock(blockIndex) {
          if (blockIndex < 4) return [{ topConflict: false, optionConflict: false }, { topConflict: true, optionConflict: false }, { topConflict: false, optionConflict: true }, { topConflict: true, optionConflict: true }][blockIndex];
          const conditions = [
            { topConflict: false, optionConflict: false },
            { topConflict: true, optionConflict: false },
            { topConflict: false, optionConflict: true },
            { topConflict: true, optionConflict: true }
          ];
          conditionCycle = (conditionCycle + 1) % conditions.length;
          return conditions[conditionCycle];
        }

        function getCurrentRule() {
          if (modeSelect.value === "rule-shift" && elapsedMs >= durationMs / 2) return "word";
          return "ink";
        }

        function startNextTrial() {
          if (!running || elapsedMs >= durationMs) {
            if (running) finishGame();
            return;
          }
          const blockIndex = getBlockIndex();
          if (blockIndex !== currentBlock) {
            currentBlock = blockIndex;
            const names = modeSelect.value === "standard"
              ? ["Coincidencia completa", "Conflicto en palabra superior", "Conflicto en opciones", "Conflicto en ambas", "Mezcla de condiciones", "Mezcla · atención sostenida"]
              : ["Bloque 1", "Bloque 2", "Bloque 3", "Bloque 4", "Bloque 5", "Bloque 6"];
            blockLabel.textContent = `Nivel ${blockIndex + 1} de 6 · ${names[blockIndex]}`;
            status.textContent = `Bloque ${blockIndex + 1} de 6: ${names[blockIndex]}.`;
          }
          const rule = getCurrentRule();
          if (rule !== lastPromptedRule) {
            lastPromptedRule = rule;
            status.textContent = "¡Cambio de regla anunciado! Desde ahora elige la palabra que nombra el color, no el color de la tinta.";
          }
          const condition = modeSelect.value === "standard"
            ? getConditionForBlock(blockIndex)
            : getConditionForBlock(Math.max(4, blockIndex));
          const trial = makeTrial(condition.topConflict, condition.optionConflict, rule);
          trial.block = blockIndex + 1;
          if (modeSelect.value === "distractors") {
            const marks = element("div", "stroop-distractors");
            ["◆", "●", "▲", "■"].forEach(mark => marks.append(element("span", "", mark)));
            const existing = practice.querySelector(".stroop-distractors");
            if (existing) existing.remove();
            practice.insertBefore(marks, prompt);
          } else {
            practice.querySelector(".stroop-distractors")?.remove();
          }
          displayTrial(trial);
        }

        function answerTrial(choiceIndex) {
          if (!running || !activeTrial) return;
          if (stimulusTimer !== null) {
            window.clearTimeout(stimulusTimer);
            stimulusTimer = null;
          }
          const trial = activeTrial;
          activeTrial = null;
          const responseMs = Math.min(performance.now() - trialStartedAt, maxStimulusMs, trial.remainingMs);
          const correct = choiceIndex === trial.correctIndex;
          trials.push({
            number: trialCount,
            block: trial.block,
            rule: trial.rule,
            topConflict: trial.topConflict,
            optionConflict: trial.optionConflict,
            correct,
            omission: choiceIndex === null,
            responseMs,
            topWord: palette[trial.topWordIndex].name,
            topInk: palette[trial.targetIndex].name,
            options: trial.lowerOptions.map(option => palette[option.labelIndex].name),
            answer: choiceIndex === null ? "Sin respuesta" : palette[trial.lowerOptions[choiceIndex].labelIndex].name
          });
          const correctCount = trials.filter(item => item.correct).length;
          const errorCount = trials.filter(item => !item.correct).length;
          hitLabel.textContent = `Aciertos: ${correctCount}`;
          errorLabel.textContent = `Errores: ${errorCount}`;
          feedback.textContent = choiceIndex === null
            ? "Se agotó el tiempo de este estímulo; queda registrado como omisión."
            : correct ? "Correcto. Mantén la atención en la regla." : "No coincide con la regla: fíjate en la tinta de la palabra superior.";
          schedule(() => {
            if (running) startNextTrial();
          }, 180);
        }

        function startTest() {
          if (!practiceComplete || running || finished) return;
          running = true;
          elapsedMs = 0;
          trialCount = 0;
          trials = [];
          conditionCycle = 0;
          currentBlock = -1;
          lastPromptedRule = "ink";
          setup.hidden = true;
          readingCheck.disabled = true;
          colorCheck.disabled = true;
          modeNote.hidden = true;
          practiceAgain.hidden = true;
          start.hidden = true;
          practice.setAttribute("aria-live", "off");
          const info = element("div", "bubble-game-info");
          info.append(blockLabel, countdown, hitLabel, errorLabel);
          board.insertBefore(info, practice);
          board.insertBefore(progressBar, practice);
          if (modeSelect.value === "rule-shift") {
            status.textContent = "Modo independiente: comienza eligiendo el color de la tinta; al minuto 0:45 se avisará el cambio para elegir el significado de la palabra.";
          } else if (modeSelect.value === "distractors") {
            status.textContent = "Modo independiente: aparecen figuras decorativas. Ignóralas y mantén la regla del color de la tinta.";
          } else {
            status.textContent = "Prueba principal: seis bloques consecutivos, 90 segundos en total. Responde sin prisa innecesaria; el tiempo se analiza por separado.";
          }
          startNextTrial();
          const startedAt = performance.now();
          tickTimer = window.setInterval(() => {
            elapsedMs = Math.min(durationMs, performance.now() - startedAt);
            const remaining = Math.ceil((durationMs - elapsedMs) / 1000);
            countdown.textContent = `${remaining} s`;
            progressFill.style.transform = `scaleX(${Math.max(0, (durationMs - elapsedMs) / durationMs)})`;
            if (elapsedMs >= durationMs) finishGame();
          }, 100);
          cleanups.push(() => {
            if (tickTimer !== null) window.clearInterval(tickTimer);
            if (stimulusTimer !== null) window.clearTimeout(stimulusTimer);
          });
        }

        function finishGame() {
          if (!running || finished) return;
          if (activeTrial) answerTrial(null);
          running = false;
          finished = true;
          if (tickTimer !== null) {
            window.clearInterval(tickTimer);
            tickTimer = null;
          }
          if (stimulusTimer !== null) {
            window.clearTimeout(stimulusTimer);
            stimulusTimer = null;
          }
          activeTrial = null;
          const correctTrials = trials.filter(trial => trial.correct);
          const errors = trials.filter(trial => !trial.correct);
          const mean = values => values.length ? values.reduce((sum, value) => sum + value, 0) / values.length : null;
          const accuracy = group => group.length ? group.filter(trial => trial.correct).length / group.length : null;
          const reaction = group => mean(group.filter(trial => !trial.omission).map(trial => trial.responseMs));
          const deviation = values => {
            if (values.length < 2) return null;
            const average = mean(values);
            return Math.sqrt(mean(values.map(value => (value - average) ** 2)));
          };
          const topCongruent = trials.filter(trial => !trial.topConflict);
          const topConflict = trials.filter(trial => trial.topConflict);
          const optionsCongruent = trials.filter(trial => !trial.optionConflict);
          const optionsConflict = trials.filter(trial => trial.optionConflict);
          const allCongruent = trials.filter(trial => !trial.topConflict && !trial.optionConflict);
          const allConflict = trials.filter(trial => trial.topConflict && trial.optionConflict);
          const congruentAccuracy = accuracy(allCongruent);
          const conflictAccuracy = accuracy(allConflict);
          const interferenceCost = allCongruent.length < 2 || allConflict.length < 2
            ? null
            : (congruentAccuracy - conflictAccuracy) * 100;
          const accuracyScore = (rate, count) => rate === null || count < 5 ? null : Math.max(1, Math.min(10, Math.round(rate * 9) + 1));
          const controlScore = cost => cost === null ? null : Math.max(1, Math.min(10, Math.round(10 - Math.abs(cost) / 100 * 9)));
          const blocks = Array.from({ length: 6 }, (_, index) => trials.filter(trial => trial.block === index + 1));
          const blockAccuracy = blocks.map(accuracy).filter(value => value !== null);
          const consistency = blockAccuracy.length < 2 ? null : Math.max(0, 1 - deviation(blockAccuracy) / 0.5);
          const modes = {
            standard: "Prueba principal · control de interferencias",
            "rule-shift": "Módulo independiente · cambio de regla",
            distractors: "Módulo experimental independiente · distractores visuales"
          };
          const modeName = modes[modeSelect.value];
          const medianOf = values => {
            if (!values.length) return null;
            const sorted = [...values].sort((a, b) => a - b);
            const middle = Math.floor(sorted.length / 2);
            return sorted.length % 2 ? sorted[middle] : (sorted[middle - 1] + sorted[middle]) / 2;
          };
          const rtOf = group => medianOf(group.filter(trial => trial.correct && !trial.omission).map(trial => trial.responseMs));
          const rtCongruent = rtOf(allCongruent);
          const rtConflict = rtOf(allConflict);
          const correctRts = correctTrials.filter(trial => !trial.omission).map(trial => trial.responseMs);
          const rtMeanAll = mean(correctRts);
          if (modeSelect.value === "standard") {
            saveProfile("J02", {
              ageGroup: "unspecified", level: "Prueba principal", valid: trials.length >= 20 && readingCheck.value !== "difficulty" && colorCheck.value !== "difficulty",
              completed: elapsedMs >= durationMs, selfReport: { reading: readingCheck.value, colors: colorCheck.value },
              metrics: {
                trials: trials.length, accuracy: trials.length ? accuracy(trials) * 100 : null,
                omissionRate: trials.length ? trials.filter(trial => trial.omission).length / trials.length * 100 : null,
                rtMedianMs: rtOf(trials), rtCv: correctRts.length >= 10 ? deviation(correctRts) / rtMeanAll : null,
                interferenceTimeCostMs: rtCongruent !== null && rtConflict !== null ? rtConflict - rtCongruent : null,
                interferenceErrorCost: interferenceCost
              }
            });
          }
          const scores = [
            { name: "Atención selectiva", value: accuracyScore(accuracy(trials), trials.length), note: "Aciertos sobre todos los estímulos respondidos o presentados.", raw: `${correctTrials.length} aciertos de ${trials.length} estímulos; precisión total ${trials.length ? (accuracy(trials) * 100).toFixed(1) : "0.0"} %.` },
            { name: "Control de interferencias", value: controlScore(interferenceCost), note: "Compara la precisión en la condición completamente congruente con la condición de doble conflicto. Se expresa el coste en puntos porcentuales, no como diagnóstico.", raw: interferenceCost === null ? "Sin suficientes estímulos en ambas condiciones para calcular el coste de interferencia." : `Condición congruente: ${(congruentAccuracy * 100).toFixed(1)} % (${allCongruent.length} ensayos); doble conflicto: ${(conflictAccuracy * 100).toFixed(1)} % (${allConflict.length} ensayos); coste observado: ${interferenceCost.toFixed(1)} puntos porcentuales.` },
            { name: "Mantenimiento de la regla", value: accuracyScore(accuracy(trials.filter(trial => trial.rule === "ink")), trials.filter(trial => trial.rule === "ink").length), note: "Precisión al responder según la regla de la tinta. En el módulo de cambio de regla, la segunda regla se analiza aparte.", raw: `${trials.filter(trial => trial.rule === "ink" && trial.correct).length} aciertos de ${trials.filter(trial => trial.rule === "ink").length} ensayos con la regla de la tinta.` },
            { name: "Consistencia", value: accuracyScore(consistency, blockAccuracy.length), note: "Estabilidad de la precisión entre los bloques con datos. No describe por qué varían las respuestas.", raw: consistency === null ? "No hubo datos suficientes en varios bloques para estimar la consistencia." : `Variación de precisión entre bloques; consistencia descriptiva ${(consistency * 100).toFixed(1)} %.` }
          ];
          const result = element("section", "bubble-result");
          result.append(element("h4", "", `Que no te engañen · ${modeName}`));
          result.append(element("p", "bubble-score-note", "Informe experimental de una actividad propia inspirada en el principio Stroop. No reproduce la interfaz, la prueba ni la puntuación de Creyos. No existen baremos FAND validados y estas puntuaciones no son percentiles ni diagnósticos."));
          const summary = trials.length
            ? `En 90 segundos completaste ${trials.length} estímulos: ${correctTrials.length} aciertos, ${errors.length} errores y ${trials.filter(trial => trial.omission).length} omisiones. ${interferenceCost === null ? "No se pudo estimar el coste de interferencia porque faltan ensayos en una de las condiciones de comparación." : `La diferencia observada entre la condición congruente y la de doble conflicto fue de ${interferenceCost.toFixed(1)} puntos porcentuales.`}`
            : "No se registraron estímulos en esta partida. No hay resultados que interpretar.";
          result.append(element("h5", "", "Resumen de esta partida"));
          const responseTimes = trials.filter(trial => !trial.omission).map(trial => trial.responseMs);
          const reactionVariation = deviation(responseTimes);
          result.append(element("p", "bubble-score-summary", `${summary} El tiempo medio de respuesta fue ${reaction(trials) === null ? "no disponible" : `${(reaction(trials) / 1000).toFixed(2)} s`}${reactionVariation === null ? "" : `, con una desviación típica de ${(reactionVariation / 1000).toFixed(2)} s`}; se informa por separado y no resta puntos.`));
          result.append(element("p", "bubble-score-note", `Comprobación previa autoinformada: lectura — ${readingCheck.options[readingCheck.selectedIndex].text}; percepción de colores — ${colorCheck.options[colorCheck.selectedIndex].text}. Estas respuestas sirven para contextualizar el resultado y no modifican las puntuaciones.`));
          result.append(element("h5", "", "Perfil descriptivo · escala experimental del 1 al 10"));
          result.append(element("p", "bubble-score-profile-note", "Las barras representan una conversión orientativa de los datos de esta partida y no comparan con otras personas. En interferencia, una puntuación mayor solo indica una diferencia observada menor entre condiciones; si hay pocos ensayos, consulta los recuentos antes de interpretarla."));
          const cards = element("div", "bubble-score-grid");
          scores.forEach(score => {
            const card = element("article", "bubble-score-card");
            card.dataset.score = score.value === null ? "" : String(score.value);
            card.append(element("h5", "", score.name), element("strong", "", score.value === null ? "Sin datos" : `${score.value} / 10`));
            card.append(element("p", "bubble-score-explanation", score.note));
            const bar = element("div", "bubble-score-segments");
            bar.setAttribute("role", "img");
            bar.setAttribute("aria-label", score.value === null ? `${score.name}: sin datos suficientes` : `${score.name}: ${score.value} de 10`);
            for (let point = 1; point <= 10; point++) {
              const segment = element("span", score.value !== null && point <= score.value ? "filled" : "");
              segment.setAttribute("aria-hidden", "true");
              segment.textContent = String(point);
              bar.append(segment);
            }
            card.append(bar);
            const labels = element("div", "bubble-score-scale-labels", "1 · puntuación mínima");
            labels.append(document.createTextNode(" · 10 · puntuación máxima"));
            card.append(labels, element("p", "bubble-score-observation", `Datos observados: ${score.raw}`));
            cards.append(card);
          });
          result.append(cards);
          result.append(element("h5", "", "Precisión y tiempos por condición"));
          const conditionTable = document.createElement("table");
          const conditionHead = document.createElement("thead");
          const conditionHeader = document.createElement("tr");
          ["Condición", "Ensayos", "Aciertos", "Precisión", "Tiempo medio"].forEach(title => conditionHeader.append(element("th", "", title)));
          conditionHead.append(conditionHeader);
          const conditionBody = document.createElement("tbody");
          [
            ["Palabra superior congruente", topCongruent],
            ["Conflicto en palabra superior", topConflict],
            ["Opciones congruentes", optionsCongruent],
            ["Conflicto en opciones", optionsConflict],
            ["Sin conflicto (ambos)", allCongruent],
            ["Doble conflicto", allConflict]
          ].forEach(([label, group]) => {
            const row = document.createElement("tr");
            const meanTime = reaction(group);
            [label, String(group.length), String(group.filter(trial => trial.correct).length), group.length ? `${(accuracy(group) * 100).toFixed(1)} %` : "Sin datos", meanTime === null ? "Sin datos" : `${(meanTime / 1000).toFixed(2)} s`]
              .forEach(value => row.append(element("td", "", value)));
            conditionBody.append(row);
          });
          conditionTable.append(conditionHead, conditionBody);
          result.append(conditionTable);
          if (modeSelect.value === "rule-shift") {
            const inkTrials = trials.filter(trial => trial.rule === "ink");
            const wordTrials = trials.filter(trial => trial.rule === "word");
            result.append(element("p", "", `Cambio de regla (módulo separado): regla de tinta ${inkTrials.filter(trial => trial.correct).length}/${inkTrials.length} correctas; regla de palabra ${wordTrials.filter(trial => trial.correct).length}/${wordTrials.length} correctas. El cambio se anunció a mitad de la actividad.`));
          }
          result.append(element("h5", "", "Detalle de los estímulos"));
          const detail = document.createElement("table");
          const detailHead = document.createElement("thead");
          const detailHeader = document.createElement("tr");
          ["#", "Bloque", "Regla", "Palabra superior", "Tinta objetivo", "Opciones", "Respuesta", "Resultado", "Tiempo"].forEach(title => detailHeader.append(element("th", "", title)));
          detailHead.append(detailHeader);
          const detailBody = document.createElement("tbody");
          trials.forEach(trial => {
            const row = document.createElement("tr");
            [
              String(trial.number), String(trial.block), trial.rule === "ink" ? "Tinta" : "Palabra",
              trial.topWord, trial.topInk, trial.options.join(" / "), trial.answer,
              trial.correct ? "Correcta" : trial.omission ? "Omisión" : "Error",
              `${(trial.responseMs / 1000).toFixed(2)} s`
            ].forEach(value => row.append(element("td", "", value)));
            detailBody.append(row);
          });
          detail.append(detailHead, detailBody);
          result.append(detail);
          result.append(element("p", "", "La precisión, la interferencia, el tiempo de respuesta y la variabilidad son medidas distintas. Leer las palabras, distinguir los colores, comprender la consigna, la fatiga, la ansiedad, la visión y la velocidad motora pueden influir. Un resultado no identifica ni descarta TDAH, autismo, dislexia u otra condición."));
          const pdf = element("button", "secondary", "Descargar informe PDF");
          pdf.type = "button";
          pdf.addEventListener("click", () => {
            result.id = "bubble-pdf-report";
            result.classList.add("bubble-pdf-report");
            downloadReportPdf(result, "informe-que-no-te-enganen-fand.pdf");
            status.textContent = "El informe PDF se ha descargado en tu dispositivo.";
          });
          result.append(pdf);
          const restart = element("button", "secondary", "Volver a jugar");
          restart.type = "button";
          restart.addEventListener("click", goNoGoGame);
          result.append(restart);
          board.replaceChildren(result);
          status.textContent = "Actividad completada. Revisa por separado la precisión, el coste de interferencia y los tiempos.";
          result.scrollIntoView({ behavior: "smooth", block: "start" });
        }

        function completePractice(isCorrect) {
          feedback.textContent = isCorrect
            ? "¡Correcto! AZUL es el color de la tinta. Ya has demostrado que comprendes la regla."
            : "Fíjate solo en la tinta: aunque la palabra dice ROJO, está escrita en azul. La respuesta es AZUL.";
          practiceAgain.hidden = isCorrect;
          practiceAgain.textContent = "Repetir ejemplo";
          start.textContent = "Empezar prueba de 90 segundos";
          start.disabled = !isCorrect;
          start.hidden = !isCorrect;
          if (isCorrect) practiceComplete = true;
        }

        function setupPractice() {
          modeSelect.disabled = true;
          setup.hidden = true;
          practiceAgain.hidden = true;
          const correctIndex = Math.random() < 0.5 ? 0 : 1;
          const practiceOptions = correctIndex === 0 ? ["AZUL", "ROJO"] : ["ROJO", "AZUL"];
          choices.replaceChildren();
          practiceOptions.forEach((label, index) => {
            const button = element("button", "stroop-choice", label);
            button.type = "button";
            button.style.color = palette.find(color => color.name === label).ink;
            button.addEventListener("click", () => {
              completePractice(index === correctIndex);
            });
            choices.append(button);
          });
          feedback.textContent = "Práctica: la palabra dice ROJO, pero está escrita en azul. Elige AZUL.";
          setupActions.append(start);
          start.textContent = "Empezar prueba de 90 segundos";
          start.disabled = true;
          start.hidden = true;
          practiceAgain.hidden = false;
          practiceAgain.textContent = "Practicar ahora";
        }

        practiceAgain.addEventListener("click", () => {
          if (!practiceComplete) {
            setupPractice();
            return;
          }
        });
        start.addEventListener("click", startTest);
        const beginPractice = element("button", "primary", "Empezar práctica obligatoria");
        beginPractice.type = "button";
        beginPractice.addEventListener("click", () => {
          beginPractice.remove();
          setupPractice();
        });
        setupActions.append(beginPractice);
        blockLabel.textContent = "Práctica";
        practiceAgain.hidden = true;
        status.textContent = "La práctica es obligatoria para comprobar que se ha entendido la regla. No tiene límite de tiempo ni cuenta para los resultados.";
      }

      const sourceText = document.querySelector("#source-text");
      const wordCount = document.querySelector("#word-count");
      const textError = document.querySelector("#text-error");
      const wordPattern = /[\p{L}\p{N}]+(?:['’-][\p{L}\p{N}]+)*/gu;
      function cleanText(value) {
        return value.replace(/!\[[^\]]*\]\([^)]*\)/g, " ")
          .replace(/\[([^\]]+)\]\([^)]*\)/g, "$1")
          .replace(/https?:\/\/\S+/g, " ")
          .replace(/[*_`>#]/g, " ")
          .replace(/\s+/g, " ").trim();
      }
      function sentencesFrom(text) {
        return cleanText(text).split(/(?<=[.!?])\s+|\n+/).map(sentence => sentence.trim())
          .filter(sentence => {
            const tokens = sentence.match(wordPattern) || [];
            return tokens.length >= 6 && tokens.length <= 24;
          });
      }
      function importantWords(text) {
        return [...new Set((cleanText(text).toLocaleLowerCase("es").match(/[\p{L}]{4,}/gu) || [])
          .filter(word => !stopWords.has(word)))];
      }
      function makeTextCard(title, type) {
        const card = element("article", "activity text-game");
        const top = element("div", "activity-top");
        top.append(element("h3", "", title), element("span", "tag", type));
        card.append(top);
        return card;
      }
      function createMissing(sentence) {
        const tokens = sentence.match(wordPattern) || [];
        const options = tokens.filter(word => word.length >= 4 && !stopWords.has(word.toLocaleLowerCase("es")));
        if (!options.length) return null;
        const target = options[Math.floor(Math.random() * options.length)];
        const card = makeTextCard("Completa la palabra", "Recuerda");
        card.append(element("p", "prompt", sentence.replace(target, "_____")));
        card.append(element("p", "", `Pista: empieza por «${target[0].toLocaleUpperCase("es")}» y tiene ${target.length} letras.`));
        const row = element("div", "answer-row");
        const input = element("input", "answer-input");
        input.type = "text";
        input.setAttribute("aria-label", "Escribe la palabra que falta");
        const check = element("button", "secondary", "Comprobar");
        check.type = "button";
        const feedback = element("p", "game-feedback");
        const verify = () => setFeedback(feedback, input.value.trim().replace(/[.,!?;:]+$/g, "").toLocaleLowerCase("es") === target.toLocaleLowerCase("es") ? "¡Muy bien! Has encontrado la palabra." : "Prueba otra vez. Lee la frase y usa la pista.", input.value.trim().replace(/[.,!?;:]+$/g, "").toLocaleLowerCase("es") === target.toLocaleLowerCase("es"));
        check.addEventListener("click", verify);
        input.addEventListener("keydown", event => { if (event.key === "Enter") verify(); });
        row.append(input, check);
        card.append(row, feedback);
        return card;
      }
      function createOrder(sentence) {
        const original = sentence.match(wordPattern) || [];
        if (original.length < 6) return null;
        const words = [...original];
        for (let i = words.length - 1; i > 0; i--) {
          const j = Math.floor(Math.random() * (i + 1));
          [words[i], words[j]] = [words[j], words[i]];
        }
        const card = makeTextCard("Ordena la frase", "Construye");
        card.append(element("p", "prompt", "Toca las palabras para reconstruir la frase."));
        const choices = element("div", "token-row");
        const answer = element("div", "token-row");
        const chosen = [];
        const buttons = [];
        const feedback = element("p", "game-feedback");
        function renderAnswer() {
          answer.replaceChildren();
          chosen.forEach((item, index) => {
            const token = element("button", "token", `${item.word} ×`);
            token.type = "button";
            token.setAttribute("aria-label", `Quitar ${item.word}`);
            token.addEventListener("click", () => {
              chosen.splice(index, 1);
              item.source.disabled = false;
              renderAnswer();
            });
            answer.append(token);
          });
        }
        words.forEach(word => {
          const button = element("button", "token", word);
          button.type = "button";
          button.addEventListener("click", () => {
            if (button.disabled) return;
            button.disabled = true;
            chosen.push({ word, source: button });
            renderAnswer();
          });
          buttons.push(button);
          choices.append(button);
        });
        const check = element("button", "secondary", "Comprobar");
        check.type = "button";
        check.addEventListener("click", () => {
          const correct = chosen.map(item => item.word.toLocaleLowerCase("es")).join(" ") === original.map(word => word.toLocaleLowerCase("es")).join(" ");
          setFeedback(feedback, correct ? "¡Frase ordenada! Muy bien." : "Aún no está en el orden original. Puedes cambiar las palabras y probar de nuevo.", correct);
        });
        const reset = element("button", "secondary", "Empezar de nuevo");
        reset.type = "button";
        reset.addEventListener("click", () => {
          chosen.splice(0);
          buttons.forEach(button => { button.disabled = false; });
          feedback.textContent = "";
          renderAnswer();
        });
        card.append(choices, element("p", "", "Tu respuesta:"), answer, element("div", "answer-row"));
        card.lastChild.append(check, reset);
        card.append(feedback);
        return card;
      }
      function createFind(words) {
        if (words.length < 4) return null;
        const target = words[Math.floor(Math.random() * words.length)];
        const options = [target];
        while (options.length < Math.min(8, words.length)) {
          const candidate = words[Math.floor(Math.random() * words.length)];
          if (!options.includes(candidate)) options.push(candidate);
        }
        options.sort(() => Math.random() - .5);
        const card = makeTextCard("Caza la palabra", "Observa");
        card.append(element("p", "prompt", `Busca esta palabra: «${target}»`));
        const grid = element("div", "word-grid");
        const feedback = element("p", "game-feedback");
        options.forEach(word => {
          const button = element("button", "choice", word);
          button.type = "button";
          button.addEventListener("click", () => setFeedback(feedback, word === target ? "¡La encontraste!" : "Esa no es. Vuelve a mirar la palabra objetivo.", word === target));
          grid.append(button);
        });
        card.append(grid, feedback);
        return card;
      }
      function generateTextGames() {
        textError.textContent = "";
        const text = sourceText.value.trim();
        const selected = [...document.querySelectorAll('input[name="text-game"]:checked')].map(input => input.value);
        if (cleanText(text).length < 40) {
          textError.textContent = "Añade un texto un poco más largo (al menos 40 caracteres).";
          sourceText.focus();
          return;
        }
        if (!selected.length) {
          textError.textContent = "Elige al menos un tipo de juego.";
          return;
        }
        const sentences = sentencesFrom(text);
        const words = importantWords(text);
        if ((selected.includes("missing") || selected.includes("order")) && !sentences.length) {
          textError.textContent = "No he encontrado frases completas suficientemente largas. Revisa la puntuación del texto.";
          return;
        }
        if (selected.includes("find") && words.length < 4) {
          textError.textContent = "Necesito al menos cuatro palabras distintas de cuatro letras o más para crear «Caza la palabra».";
          return;
        }
        generatedGames.replaceChildren();
        if (selected.includes("missing")) generatedGames.append(createMissing(sentences[Math.floor(Math.random() * sentences.length)]));
        if (selected.includes("order")) generatedGames.append(createOrder(sentences.find(sentence => (sentence.match(wordPattern) || []).length >= 6)));
        if (selected.includes("find")) generatedGames.append(createFind(words));
        generatedGames.scrollIntoView({ behavior: "smooth", block: "start" });
      }
      sourceText.addEventListener("input", () => {
        const count = sourceText.value.trim().match(/\S+/g) || [];
        wordCount.textContent = `${count.length} ${count.length === 1 ? "palabra" : "palabras"}`;
      });
      document.querySelector("#generate-text-games").addEventListener("click", generateTextGames);

      const directoryGrid = document.querySelector("#directory-grid");
      const directorySearch = document.querySelector("#directory-search");
      const profileFilter = document.querySelector("#profile-filter");
      const directoryCount = document.querySelector("#directory-count");
      function renderDirectory() {
        const query = directorySearch.value.trim().toLocaleLowerCase("es");
        const profile = profileFilter.value;
        const matches = directory.filter(item => {
          const text = item.join(" ").toLocaleLowerCase("es");
          return (!profile || item[1].includes(profile)) && text.includes(query);
        });
        directoryGrid.replaceChildren();
        directoryCount.textContent = `${matches.length} ${matches.length === 1 ? "ficha" : "fichas"}`;
        if (!matches.length) {
          directoryGrid.append(element("p", "empty", "No hay resultados con esos filtros. Prueba otra búsqueda."));
          return;
        }
        matches.forEach(([name, profileName, kind, task, records, note]) => {
          const card = element("article", "directory-card");
          card.append(element("span", "tag", profileName), element("h3", "", name), element("span", "tag", kind));
          card.append(element("p", "label", "Actividad"), element("p", "", task));
          card.append(element("p", "label", "Qué registra según el documento"), element("p", "", records));
          card.append(element("p", "", note));
          directoryGrid.append(card);
        });
      }
      directorySearch.addEventListener("input", renderDirectory);
      profileFilter.addEventListener("change", renderDirectory);
      renderDirectory();
    })();
  </script>
</body>
</html>
