import { defineConfig } from 'vite';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const savedReferences = new Map();

function chatApiPlugin() {
  return {
    name: 'chat-api-plugin',
    configureServer(server) {
      server.middlewares.use((req, res, next) => {
        if (req.url === '/home' && req.method === 'GET') {
          res.statusCode = 301;
          res.setHeader('Location', '/');
          res.end();
          return;
        }

        if (req.url === '/api/chat/leads' && req.method === 'POST') {
          let body = '';
          req.on('data', (chunk) => {
            body += chunk;
          });
          req.on('end', () => {
            try {
              const payload = JSON.parse(body || '{}');
              const name = (payload.name || '').trim();
              const email = (payload.email || '').trim();
              if (!name || name.length > 80 || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                res.statusCode = 422;
                res.setHeader('Content-Type', 'application/json');
                res.end(JSON.stringify({ success: false, error: 'Validation failed' }));
                return;
              }
              const sessionId = `ses_${Date.now().toString(36)}_${Math.random().toString(36).substring(2, 8)}`;
              const leadId = `lead_${Date.now().toString(36)}`;
              res.setHeader('Content-Type', 'application/json');
              res.end(JSON.stringify({ success: true, sessionId, leadId }));
            } catch (err) {
              res.statusCode = 400;
              res.end(JSON.stringify({ success: false, error: 'Invalid payload' }));
            }
          });
          return;
        }

        if (req.url === '/api/chat/messages' && req.method === 'POST') {
          let body = '';
          req.on('data', (chunk) => {
            body += chunk;
          });
          req.on('end', () => {
            try {
              const data = JSON.parse(body || '{}');
              res.setHeader('Content-Type', 'application/json');
              res.end(
                JSON.stringify({
                  success: true,
                  sessionId: data.sessionId || 'ses_active'
                })
              );
            } catch (err) {
              res.statusCode = 400;
              res.end(JSON.stringify({ success: false, error: 'Invalid payload' }));
            }
          });
          return;
        }

        if (req.url === '/api/chat/requests' && req.method === 'POST') {
          let body = '';
          req.on('data', (chunk) => {
            body += chunk;
          });
          req.on('end', () => {
            try {
              const data = JSON.parse(body || '{}');
              const idemKey = data.idempotencyKey || data.reference;
              if (idemKey && savedReferences.has(idemKey)) {
                res.setHeader('Content-Type', 'application/json');
                res.end(
                  JSON.stringify({
                    success: true,
                    reference: savedReferences.get(idemKey),
                    deduplicated: true
                  })
                );
                return;
              }
              const randomSuffix = Math.floor(1000 + Math.random() * 9000);
              const dateStamp = new Date().toISOString().slice(2, 10).replace(/-/g, '');
              const reference = data.reference || `DAOZ-REQ-${dateStamp}-${randomSuffix}`;
              if (idemKey) {
                savedReferences.set(idemKey, reference);
              }
              res.setHeader('Content-Type', 'application/json');
              res.end(JSON.stringify({ success: true, reference }));
            } catch (err) {
              res.statusCode = 400;
              res.end(JSON.stringify({ success: false, error: 'Invalid payload' }));
            }
          });
          return;
        }

        if ((req.url === '/contact/submit' || req.url === '/api/contact') && req.method === 'POST') {
          let body = '';
          req.on('data', (chunk) => {
            body += chunk;
          });
          req.on('end', () => {
            const randomSuffix = Math.floor(1000 + Math.random() * 9000);
            const dateStamp = new Date().toISOString().slice(2, 10).replace(/-/g, '');
            const reference = `DAOZ-INQ-${dateStamp}-${randomSuffix}`;
            res.setHeader('Content-Type', 'application/json');
            res.end(
              JSON.stringify({
                success: true,
                reference,
                message: `Thank you! Your inquiry (${reference}) has been received by our team.`
              })
            );
          });
          return;
        }

        next();
      });
    }
  };
}

export default defineConfig({
  plugins: [chatApiPlugin()],
  server: {
    port: 5173,
    host: '127.0.0.1',
    open: false
  },
  build: {
    emptyOutDir: true,
    outDir: 'dist',
    rollupOptions: {
      input: {
        main: path.resolve(__dirname, 'index.html'),
        pricing: path.resolve(__dirname, 'pricing/index.html'),
        privacyPolicy: path.resolve(__dirname, 'privacy-policy/index.html'),
        termsConditions: path.resolve(__dirname, 'terms-conditions/index.html'),
        contact: path.resolve(__dirname, 'contact/index.html'),
        notFound: path.resolve(__dirname, '404.html')
      }
    }
  }
});
