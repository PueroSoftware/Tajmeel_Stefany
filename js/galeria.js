// js/galeria.js
// Control de sliders de galería con desplazamiento continuo en direcciones opuestas.
// Requiere el HTML generado por includes/slider.php (contenedor .slider-wrapper con .slider-track e imágenes duplicadas).

(function () {
  "use strict";

  function waitForImages(container) {
    const imgs = Array.from(container.querySelectorAll("img"));
    if (imgs.length === 0) return Promise.resolve();
    const pending = imgs.filter((im) => !im.complete);
    if (pending.length === 0) return Promise.resolve();
    return new Promise((resolve) => {
      let loaded = 0;
      pending.forEach((im) => {
        im.addEventListener("load", onDone, { once: true });
        im.addEventListener("error", onDone, { once: true });
      });
      function onDone() {
        loaded += 1;
        if (loaded >= pending.length) resolve();
      }
    });
  }

  function initMarquee(opts) {
    const { id, direction = "rtl", speed = 0.12, pauseOnHover = true, autoDots = true, autoIntervalMs = 3500 } = opts || {};
    const wrapper = document.getElementById(id);
    if (!wrapper) return;
    const track = wrapper.querySelector(".slider-track");
    if (!track) return;

    // Estilos mínimos para asegurar el efecto aunque falte CSS específico
    wrapper.style.overflow = "hidden";
    if (getComputedStyle(wrapper).position === "static") {
      wrapper.style.position = "relative";
    }
    track.style.display = "flex";
    track.style.flexWrap = "nowrap";

    let rafId = null;
    let lastTime = 0;
    let pos = 0;
    let half = 0;
  let running = false;
  let offsets = [];
  let uniqueCount = 0; // cantidad de imágenes únicas (mitad)
  let dotIndex = 0;
  let autoTimer = null;

    function measureOffsets() {
      const imgs = Array.from(track.querySelectorAll("img"));
      if (imgs.length === 0) {
        offsets = [];
        uniqueCount = 0;
        return;
      }
      // Primera mitad son las imágenes "originales"
      uniqueCount = Math.floor(imgs.length / 2) || imgs.length;
      offsets = new Array(uniqueCount).fill(0);
      let acc = 0;
      for (let i = 0; i < uniqueCount; i++) {
        offsets[i] = acc;
        const w = imgs[i].getBoundingClientRect().width;
        acc += w;
      }
    }

    function recalc() {
      // La mitad del ancho total porque las imágenes están duplicadas
      half = track.scrollWidth / 2;
      measureOffsets();
      // Si vamos de izquierda a derecha (contenido moviéndose hacia la derecha), empezamos desde la mitad
      pos = direction === "rtl" ? 0 : half;
      wrapper.scrollLeft = pos;
    }

    function step(ts) {
      if (!running) return;
      if (!lastTime) lastTime = ts;
      const dt = ts - lastTime; // ms desde el último frame
      lastTime = ts;
      const delta = speed * dt; // píxeles aprox.

      if (direction === "rtl") {
        pos += delta; // desplazamos el contenido hacia la izquierda (aumenta scrollLeft)
        if (half > 0 && pos >= half) {
          pos -= half; // reinicio suave
        }
      } else {
        pos -= delta; // desplazamos el contenido hacia la derecha (disminuye scrollLeft)
        if (half > 0 && pos <= 0) {
          pos += half; // reinicio suave
        }
      }
      wrapper.scrollLeft = pos;
      rafId = requestAnimationFrame(step);
    }

    function start() {
      if (running) return;
      running = true;
      lastTime = 0;
      rafId = requestAnimationFrame(step);
    }

    function stop() {
      running = false;
      if (rafId) cancelAnimationFrame(rafId);
      rafId = null;
    }

    function onResize() {
      const prevRunning = running;
      stop();
      recalc();
      if (prevRunning) start();
    }

    function attachHover() {
      if (!pauseOnHover) return;
      wrapper.addEventListener("mouseenter", stop);
      wrapper.addEventListener("mouseleave", () => {
        lastTime = 0;
        start();
      });
    }

    function buildDots() {
      if (!autoDots) return;
      if (!uniqueCount || uniqueCount < 2) return; // sin dots si hay 0/1 imagen
      // crear contenedor de dots si no existe
      let dots = wrapper.parentElement.querySelector(`.slider-dots[data-for="${id}"]`);
      if (!dots) {
        dots = document.createElement("div");
        dots.className = "slider-dots";
        dots.dataset.for = id;
        // Insertar inmediatamente después del wrapper
        wrapper.insertAdjacentElement("afterend", dots);
      } else {
        dots.innerHTML = "";
      }
      for (let i = 0; i < uniqueCount; i++) {
        const btn = document.createElement("button");
        btn.type = "button";
        btn.setAttribute("aria-label", `Ir al slide ${i + 1}`);
        if (i === 0) btn.classList.add("active");
        btn.addEventListener("click", () => {
          // al hacer clic, saltamos y pausamos un momento
          jumpTo(i);
          updateDots(i);
          pauseAuto(4000);
        });
        dots.appendChild(btn);
      }
    }

    function updateDots(i) {
      const dots = wrapper.parentElement.querySelector(`.slider-dots[data-for="${id}"]`);
      if (!dots) return;
      const btns = dots.querySelectorAll("button");
      btns.forEach((b, idx) => b.classList.toggle("active", idx === i));
      dotIndex = i;
    }

    function startAuto() {
      if (!autoDots) return;
      stopAuto();
      autoTimer = setInterval(() => {
        const next = uniqueCount ? (dotIndex + 1) % uniqueCount : 0;
        updateDots(next);
        // opcional: alinear también al slide
        // jumpTo(next);
      }, autoIntervalMs);
    }

    function stopAuto() {
      if (autoTimer) clearInterval(autoTimer);
      autoTimer = null;
    }

    let pauseT = null;
    function pauseAuto(ms) {
      stopAuto();
      if (pauseT) clearTimeout(pauseT);
      pauseT = setTimeout(() => startAuto(), ms || 2000);
    }

    function jumpTo(index) {
      if (!offsets.length) return;
      const clamped = Math.max(0, Math.min(index, offsets.length - 1));
      pos = offsets[clamped];
      // normalizamos dentro de [0, half)
      if (pos >= half) pos = pos % half;
      wrapper.scrollLeft = pos;
    }

    waitForImages(track).then(() => {
      recalc();
      buildDots();
      attachHover();
      start();
      startAuto();
      window.addEventListener("resize", () => {
        onResize();
        // reconstruir dots tras cambios de tamaño que afecten medidas
        buildDots();
      });
    });

    // Devuelve un API mínima por si se requiere depuración
    return { start, stop, recalc };
  }

  document.addEventListener("DOMContentLoaded", function () {
    // Slider A: derecha a izquierda (las imágenes se mueven hacia la izquierda)
  initMarquee({ id: "galeria_slider_a", direction: "rtl", speed: 0.12, autoDots: false });

    // Slider B: izquierda a derecha (las imágenes se mueven hacia la derecha)
  initMarquee({ id: "galeria_slider_b", direction: "ltr", speed: 0.12, autoDots: false });
  });
})();
