require('dotenv').config();

const app = require('./src/app');
const { pool } = require('./src/db');

const port = Number(process.env.PORT || 3000);
async function start() {
  await app.locals.sessionStoreReady;
  const server = app.listen(port, () => {
    console.log(`SIPRINT berjalan di http://localhost:${port}`);
  });

  async function shutdown(signal) {
    console.log(`${signal} diterima, menutup SIPRINT...`);
    server.close(async (serverError) => {
      try {
        await app.locals.closeSessionStore();
        await pool.end();
        if (serverError) {
          console.error(serverError);
          process.exitCode = 1;
        }
      } catch (error) {
        console.error('Gagal menutup koneksi SIPRINT:', error);
        process.exitCode = 1;
      }
    });
  }

  process.on('SIGINT', () => shutdown('SIGINT'));
  process.on('SIGTERM', () => shutdown('SIGTERM'));
}

start().catch(async (error) => {
  console.error('SIPRINT gagal terhubung ke database:', error);
  try {
    await app.locals.closeSessionStore();
    await pool.end();
  } catch (closeError) {
    console.error('Gagal menutup koneksi SIPRINT:', closeError);
  }
  process.exitCode = 1;
});
