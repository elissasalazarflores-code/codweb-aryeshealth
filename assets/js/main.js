(function () {
  'use strict';

  var nav = document.getElementById('nav');
  var burger = document.getElementById('burger');
  var mobileMenu = document.getElementById('mobileMenu');

  /* ---------- Nav: estado al hacer scroll ---------- */
  function onScroll() {
    nav.classList.toggle('is-scrolled', window.scrollY > 40);
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* ---------- Menú móvil ---------- */
  function setMenu(open) {
    nav.classList.toggle('is-open', open);
    burger.setAttribute('aria-expanded', String(open));
    burger.setAttribute('aria-label', open ? 'Cerrar menú' : 'Abrir menú');
  }
  burger.addEventListener('click', function () {
    setMenu(!nav.classList.contains('is-open'));
  });
  mobileMenu.addEventListener('click', function (e) {
    if (e.target.closest('a')) setMenu(false);
  });

  /* ---------- Reveal al entrar en pantalla ---------- */
  var revealEls = document.querySelectorAll('.reveal');
  // Escalonar elementos hermanos
  var groups = new Map();
  revealEls.forEach(function (el) {
    var parent = el.parentElement;
    var i = groups.get(parent) || 0;
    el.style.setProperty('--d', Math.min(i * 0.08, 0.48) + 's');
    groups.set(parent, i + 1);
  });

  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-in');
          io.unobserve(entry.target);
        }
      });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
    revealEls.forEach(function (el) { io.observe(el); });
  } else {
    revealEls.forEach(function (el) { el.classList.add('is-in'); });
  }

  /* ---------- Enlace activo en la navegación ---------- */
  var navLinks = document.querySelectorAll('.nav__links a');
  if ('IntersectionObserver' in window) {
    var spy = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        var id = entry.target.id;
        navLinks.forEach(function (a) {
          a.classList.toggle('is-current', a.getAttribute('href') === '#' + id);
        });
      });
    }, { rootMargin: '-45% 0px -50% 0px' });
    document.querySelectorAll('main section[id]').forEach(function (s) { spy.observe(s); });
  }

  /* ---------- Pestañas de equipos ---------- */
  var tabs = Array.prototype.slice.call(document.querySelectorAll('.tab'));
  var indicator = document.querySelector('.tabs__indicator');

  function moveIndicator(tab) {
    if (!indicator || !tab) return;
    indicator.style.width = tab.offsetWidth + 'px';
    indicator.style.transform = 'translateX(' + tab.offsetLeft + 'px)';
  }

  function activate(name, focus) {
    tabs.forEach(function (t) {
      var on = t.dataset.target === name;
      t.classList.toggle('is-active', on);
      t.setAttribute('aria-selected', String(on));
      t.tabIndex = on ? 0 : -1;
      var panel = document.getElementById('panel-' + t.dataset.target);
      if (panel) {
        panel.hidden = !on;
        panel.classList.toggle('is-active', on);
      }
      if (on) {
        moveIndicator(t);
        if (focus) t.focus();
      }
    });
  }

  tabs.forEach(function (tab, i) {
    tab.addEventListener('click', function () { activate(tab.dataset.target); });
    tab.addEventListener('keydown', function (e) {
      var dir = e.key === 'ArrowRight' ? 1 : e.key === 'ArrowLeft' ? -1 : 0;
      if (!dir) return;
      e.preventDefault();
      var next = tabs[(i + dir + tabs.length) % tabs.length];
      activate(next.dataset.target, true);
    });
  });

  // Enlaces desde las tarjetas de especialidades
  document.querySelectorAll('[data-tab]').forEach(function (a) {
    a.addEventListener('click', function () { activate(a.dataset.tab); });
  });

  window.addEventListener('resize', function () {
    moveIndicator(document.querySelector('.tab.is-active'));
  });
  window.addEventListener('load', function () {
    moveIndicator(document.querySelector('.tab.is-active'));
  });
  if (document.fonts && document.fonts.ready) {
    document.fonts.ready.then(function () { moveIndicator(document.querySelector('.tab.is-active')); });
  }
  moveIndicator(document.querySelector('.tab.is-active'));

  /* ---------- Parallax suave del hero ---------- */
  var prism = document.querySelector('.hero__prism');
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (prism && !reduce) {
    var ticking = false;
    window.addEventListener('scroll', function () {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(function () {
        var y = Math.min(window.scrollY, window.innerHeight);
        prism.style.transform = 'translateY(' + y * 0.18 + 'px)';
        ticking = false;
      });
    }, { passive: true });
  }

  /* ---------- Formulario de contacto (mailto) ---------- */
  var form = document.getElementById('contactForm');
  var note = document.getElementById('formNote');
  if (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var nombre = form.nombre.value.trim();
      var correo = form.correo.value.trim();
      var valid = true;
      [form.nombre, form.correo].forEach(function (f) { f.classList.remove('is-invalid'); });
      if (!nombre) { form.nombre.classList.add('is-invalid'); valid = false; }
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correo)) { form.correo.classList.add('is-invalid'); valid = false; }
      if (!valid) {
        note.textContent = 'Por favor complete su nombre y un correo válido.';
        return;
      }
      var lineas = Array.prototype.map.call(form.querySelectorAll('input[name=linea]:checked'), function (c) { return c.value; });
      var body = [
        'Nombre: ' + nombre,
        'Institución: ' + form.institucion.value.trim(),
        'Correo: ' + correo,
        'Teléfono: ' + form.telefono.value.trim(),
        'Línea de interés: ' + (lineas.join(', ') || '—'),
        '',
        form.mensaje.value.trim()
      ].join('\n');
      var subject = 'Solicitud de información — ' + (form.institucion.value.trim() || nombre);
      window.location.href = 'mailto:admin@aryesht.com?subject=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(body);
      note.textContent = 'Abrimos su cliente de correo para enviar la solicitud. Gracias por escribirnos.';
    });
  }

  /* ---------- Año del footer ---------- */
  var year = document.getElementById('year');
  if (year) year.textContent = new Date().getFullYear();
})();
