import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';
import fs from 'fs';
import path from 'path';

function chatApiPlugin() {
  return {
    name: 'chat-api-plugin',
    configureServer(server) {
      server.middlewares.use((req, res, next) => {
        if (req.url === '/api/chat/leads' && req.method === 'POST') {
          let body = '';
          req.on('data', (chunk) => {
            body += chunk;
          });
          req.on('end', () => {
            try {
              const data = JSON.parse(body || '{}');
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

        if (req.url === '/api/chat/requests' && req.method === 'POST') {
          let body = '';
          req.on('data', (chunk) => {
            body += chunk;
          });
          req.on('end', () => {
            try {
              const data = JSON.parse(body || '{}');
              const randomSuffix = Math.floor(1000 + Math.random() * 9000);
              const dateStamp = new Date().toISOString().slice(2, 10).replace(/-/g, '');
              const reference = data.reference || `DAOZ-REQ-${dateStamp}-${randomSuffix}`;
              res.setHeader('Content-Type', 'application/json');
              res.end(JSON.stringify({ success: true, reference }));
            } catch (err) {
              res.statusCode = 400;
              res.end(JSON.stringify({ success: false, error: 'Invalid payload' }));
            }
          });
          return;
        }

        next();
      });
    }
  };
}

export default defineConfig({
  plugins: [react(), chatApiPlugin()],
  server: {
    port: 5173,
    host: '127.0.0.1',
    open: false
  },
  build: {
    emptyOutDir: true,
    outDir: 'dist'
  }
});
