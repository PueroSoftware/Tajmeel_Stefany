document.addEventListener("DOMContentLoaded", () => {
  const canvas = document.getElementById('canvas-animacion');
  const ctx = canvas.getContext('2d');
  let width, height;
  let particles = [];
  const numParticles = 35; // Aumenta cantidad de íconos

  function resize() {
    width = canvas.width = canvas.offsetWidth;
    height = canvas.height = canvas.offsetHeight;
  }
  window.addEventListener('resize', resize);
  resize();

  const img = new Image();
  img.src = 'assets/img/mosaico_logo.png'; // ruta del ícono

  class Particle {
    constructor() { this.reset(); }
    reset() {
      this.x = Math.random() * width;
      this.y = Math.random() * height;
      this.size = 60 + Math.random() * 60; // más variedad de tamaños
      this.vx = (Math.random() - 0.5) * 1.5; // movimiento más rápido
      this.vy = (Math.random() - 0.5) * 1.5;
      this.alpha = 0.3 + Math.random() * 0.7;
    }
    update() {
      this.x += this.vx;
      this.y += this.vy;
      // reposiciona al salir del área visible
      if (
        this.x < -this.size || this.x > width + this.size ||
        this.y < -this.size || this.y > height + this.size
      ) {
        this.reset();
      }
    }
    draw() {
      ctx.globalAlpha = this.alpha;
      ctx.drawImage(img, this.x, this.y, this.size, this.size);
      ctx.globalAlpha = 1;
    }
  }

  for (let i = 0; i < numParticles; i++) {
    particles.push(new Particle());
  }

  function animate() {
    ctx.clearRect(0, 0, width, height);
    for (let p of particles) {
      p.update();
      if (img.complete) p.draw();
    }
    requestAnimationFrame(animate);
  }

  animate();
});
