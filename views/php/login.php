<?php page_start($title, 'login-page'); ?>
<main class="login-layout">
  <section class="login-story">
    <a class="brand brand-light login-brand" href="<?= e(url('/login')) ?>"><span class="brand-mark brand-mark-light"><img src="<?= e(url('/images/logo-cirebon-transparent.png')) ?>" alt=""></span><span class="brand-copy"><strong>Dinas Perpustakaan dan Kearsipan</strong><small>Kabupaten Cirebon</small></span></a>
    <div class="story-content">
      <h1>Selamat Datang<br>di <em>SIPRINT</em></h1>
      <span class="login-title-rule"></span>
      <p>Satu Akses untuk Layanan<br>Perpustakaan dan Kearsipan</p>
      <div class="login-benefits">
        <span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 5.5c3.4-.9 6.4-.4 9 1.5v13c-2.6-1.9-5.6-2.4-9-1.5z"/><path d="M21 5.5c-3.4-.9-6.4-.4-9 1.5v13c2.6-1.9 5.6-2.4 9-1.5z"/><path d="M6 9h3m-3 3h3m6-3h3m-3 3h3"/></svg><span>Perpustakaan<small>Digital</small></span></span>
        <span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 7h7l2 2h9v10H3z"/><path d="M3 7V5h7l2 2m-5 7h8m-8 3h6"/></svg><span>Arsip<small>Terpadu</small></span></span>
        <span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 3h9l4 4v14H6z"/><path d="M15 3v5h4M9 12h6m-6 3h4"/><circle cx="18" cy="18" r="3"/><path d="m20.2 20.2 1.3 1.3"/></svg><span>Layanan<small>Administrasi</small></span></span>
      </div>
      <div class="login-wave" aria-hidden="true"></div>
    </div>
    <div class="login-footer"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 2 9 4v6c0 5-3.8 8.5-9 10-5.2-1.5-9-5-9-10V6l9-4Z"/><path d="m8.5 12 2.2 2.2 4.8-5"/></svg><span>Aman <i>•</i> Cepat <i>•</i> Terpercaya</span></div>
  </section>
  <section class="login-panel"><div class="login-form-wrap"><div class="login-card">
    <div class="login-emblem"><img src="<?= e(url('/images/logo-cirebon-transparent.png')) ?>" alt="Lambang Kabupaten Cirebon" width="72" height="86"></div>
    <div class="login-identity"><h2>SIPRINT</h2><p>Login ke Akun Anda</p></div>
    <div class="login-divider"><span></span><i></i><span></span></div>
    <?php page_flash(); ?>
    <form action="<?= e(url('/login')) ?>" method="post" class="form-stack">
      <input type="hidden" name="_csrf" value="<?= e($csrfToken) ?>">
      <div class="input-with-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/></svg><label class="sr-only" for="email">Email terdaftar</label><input id="email" name="email" type="email" autocomplete="username" placeholder="Email terdaftar" maxlength="190" required autofocus></div>
      <div class="input-with-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="10" width="16" height="11" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3m-4 4v3"/></svg><label class="sr-only" for="password">Kata sandi</label><input id="password" name="password" type="password" autocomplete="current-password" placeholder="Masukkan password" maxlength="128" required><button class="password-toggle" type="button" aria-label="Tampilkan kata sandi" title="Tampilkan kata sandi">◉</button></div>
      <div class="login-help-row"><button class="login-account-help" type="button" aria-expanded="false" aria-controls="login-account-detail"><span class="help-dot" aria-hidden="true">i</span>Akun dikelola administrator</button></div>
      <p class="login-account-detail" id="login-account-detail" hidden>Akun SIPRINT dibuat oleh administrator. Pegawai yang sudah terdaftar dapat masuk menggunakan email dan kata sandi akun.</p>
      <button class="button button-primary button-wide login-submit" type="submit"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M10 17l5-5-5-5m5 5H3m10-9h5a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3h-5"/></svg>Masuk</button>
    </form>
    <div class="login-divider login-security-divider"><span></span><span>Akses khusus pengguna terdaftar</span><span></span></div>
    <div class="login-security"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 2 9 4v6c0 5-3.8 8.5-9 10-5.2-1.5-9-5-9-10V6l9-4Z"/><path d="m8.5 12 2.2 2.2 4.8-5"/></svg>Keamanan data Anda adalah prioritas kami</div>
  </div><div class="login-panel-footer">© <?= date('Y') ?> Dinas Perpustakaan dan Kearsipan Kabupaten Cirebon</div></div></section>
</main>
</body>
</html>
