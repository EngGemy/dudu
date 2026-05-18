# cPanel CI/CD Deployment (GitHub Actions)

Production deployments for the **dudu** Laravel application use a **split layout** on cPanel shared hosting:

| Path | Role |
|------|------|
| `/home/egyptdoudou/dudu_app` | Full Laravel application (no web-exposed `public/` tree) |
| `/home/egyptdoudou/public_html` | Web document root only (`index.php`, assets, `build/`, etc.) |

The repository contains both a **root** `index.php` (legacy monolithic layout) and the standard **`public/index.php`**. CI/CD standardizes on Laravel’s `public/` structure: assets sync to `public_html`, the app syncs to `dudu_app`, and a generated `index.php` in `public_html` bootstraps the app via a relative path (default `../dudu_app`).

Workflow file: [`.github/workflows/deploy-production.yml`](../.github/workflows/deploy-production.yml)

---

## cPanel configuration

### PHP version

- In cPanel → **Select PHP Version** (or **MultiPHP Manager**), choose **PHP 8.1+** for the domain.
- Enable extensions Laravel needs: `bcmath`, `ctype`, `curl`, `dom`, `fileinfo`, `json`, `mbstring`, `openssl`, `pdo`, `tokenizer`, `xml`, `zip`.

### SSH access

- cPanel → **SSH Access** → enable SSH for user `egyptdoudou`.
- Note host (often `yourdomain.com` or server hostname) and port (usually `22`).

### Document root

- Domain document root must remain **`public_html`** (default).
- Do **not** point the domain at `dudu_app`; only `public_html` is web-accessible.

### Database

- Create MySQL database and user in cPanel.
- You will configure credentials manually in server `.env` (never committed).

---

## Required directories

Create once via SSH (workflow also runs `mkdir -p` on deploy):

```bash
mkdir -p /home/egyptdoudou/dudu_app
mkdir -p /home/egyptdoudou/public_html
mkdir -p /home/egyptdoudou/dudu_app/storage/framework/{cache/data,sessions,views}
mkdir -p /home/egyptdoudou/dudu_app/storage/logs
mkdir -p /home/egyptdoudou/dudu_app/storage/app/public
mkdir -p /home/egyptdoudou/dudu_app/bootstrap/cache
```

After first deploy, `public_html/storage` is a **symlink** to `dudu_app/storage/app/public` (user uploads).

---

## SSH key: create and import

### On your local machine (recommended: deploy-only key)

```bash
ssh-keygen -t ed25519 -C "github-actions-dudu-deploy" -f ~/.ssh/dudu_cpanel_deploy -N ""
```

- **Private key** → GitHub secret `CPANEL_SSH_KEY` (entire file including `-----BEGIN ...` / `END ...` lines).
- **Public key** → import into cPanel.

### Import public key in cPanel

1. cPanel → **SSH Access** → **Manage SSH Keys**
2. **Import Key** → paste contents of `dudu_cpanel_deploy.pub`
3. **Authorize** the key for user `egyptdoudou`

### Test connection

```bash
ssh -p 22 -i ~/.ssh/dudu_cpanel_deploy egyptdoudou@YOUR_CPANEL_HOST
```

---

## GitHub Secrets

Repository → **Settings** → **Secrets and variables** → **Actions** → **New repository secret**

| Secret | Required | Example / notes |
|--------|----------|-----------------|
| `CPANEL_HOST` | Yes | `egyptdoudou.com` or server hostname |
| `CPANEL_USER` | Yes | `egyptdoudou` |
| `CPANEL_SSH_KEY` | Yes | Full private key (ed25519) |
| `CPANEL_PORT` | No | `22` (default if omitted) |
| `CPANEL_APP_PATH` | No | `/home/egyptdoudou/dudu_app` |
| `CPANEL_PUBLIC_PATH` | No | `/home/egyptdoudou/public_html` |

Do **not** store `.env`, database passwords, or `APP_KEY` in GitHub Secrets for this workflow; configure those only on the server.

---

## What each deployment does

1. **Checkout** code on `ubuntu-latest`.
2. **Composer** `install --no-dev --optimize-autoloader`.
3. **npm** `ci` + `npm run build` (Vite → `public/build`).
4. **Generate** `public_html/index.php` from `deploy/templates/public-index.php.stub` using paths from secrets (relative path from `public_html` → `dudu_app`).
5. **Rsync** app tree to `CPANEL_APP_PATH` (excludes `.env`, `public/`, `node_modules`, tests, writable `storage/*`, etc. — see [`.rsyncignore`](../.rsyncignore)).
6. **Rsync** `public/` contents to `CPANEL_PUBLIC_PATH` (excludes `public/storage/`; symlink created on server).
7. **Upload** generated `index.php` to `public_html`.
8. **Post-deploy** ([`deploy/scripts/post-deploy.sh`](../deploy/scripts/post-deploy.sh)):
   - `chmod` on `storage`, `bootstrap/cache`
   - `storage` symlink in `public_html`
   - `php artisan migrate --force`
   - `php artisan optimize:clear`
   - `php artisan config:cache`
   - `php artisan view:cache`
   - **Does not** run `route:cache` (closure routes in `routes/web.php`).

**Never overwritten by CI:** server `.env`, existing logs, sessions, uploaded files under `storage/app/public`.

---

## index.php strategy (root vs public)

| File | Purpose |
|------|---------|
| `index.php` (repo root) | Legacy: assumes app lives in same directory as the front controller. **Not deployed** to production. |
| `public/index.php` | Standard Laravel (parent dir = app root). Used when docroot is `public/`. |
| Generated `public_html/index.php` | Split deploy: resolves `realpath(__DIR__ . '/../dudu_app')` (or custom relative path from secrets). |

If you change `CPANEL_APP_PATH` or `CPANEL_PUBLIC_PATH`, the workflow recomputes the relative path automatically; no manual path editing on the server.

---

## Safe first deployment

1. Complete the [First Production Deployment Checklist](#first-production-deployment-checklist) below.
2. Push workflow + deploy files to `main`, **or** run **Actions → Deploy Production → Run workflow** after secrets are set.
3. Watch the GitHub Actions log; any failed step fails the workflow.
4. Visit the site; if 500, check `dudu_app/storage/logs/laravel.log` via SSH.

---

## Debug failed deployments

### GitHub Actions

- Open the failed run → expand the failing step (`Rsync`, `Deploy split-deployment index.php`, `Run post-deploy commands`).
- Common failures:
  - **SSH / auth**: wrong `CPANEL_HOST`, `CPANEL_USER`, or unauthorized public key.
  - **rsync not found**: rare on cPanel; install or ask host.
  - **migrate**: DB credentials in `.env` wrong or DB not created.
  - **permission**: `storage` or `bootstrap/cache` not writable.

### On the server (SSH)

```bash
cd /home/egyptdoudou/dudu_app
tail -50 storage/logs/laravel.log
php artisan about
ls -la /home/egyptdoudou/public_html/index.php
ls -la /home/egyptdoudou/public_html/storage   # should be symlink → dudu_app/storage/app/public
php -v
```

### Application path / 500 “Application path not found”

- Verify directories exist and `index.php` contains the correct relative segment (e.g. `../dudu_app`).
- `realpath` must resolve; avoid trailing symlink loops.

### Assets missing (no CSS/JS)

- Confirm `public/build` exists on server: `ls public_html/build`
- Re-run workflow after `npm run build` succeeds in CI.

### Route / cache issues

- This project **skips** `route:cache` because of closure routes in `web.php`.
- If you see stale config: `php artisan optimize:clear` then `config:cache` and `view:cache` manually.

---

## First Production Deployment Checklist

Use this once before relying on automated deploys.

- [ ] **PHP 8.1+** enabled for the domain in cPanel.
- [ ] **MySQL** database and user created; credentials noted.
- [ ] **SSH** enabled; deploy key generated and **authorized** in cPanel.
- [ ] **Directories** created: `dudu_app`, `public_html` subdirs (see [Required directories](#required-directories)).
- [ ] **GitHub Secrets** set: `CPANEL_HOST`, `CPANEL_USER`, `CPANEL_SSH_KEY` (and optional path/port secrets).
- [ ] **Server `.env`** created at `/home/egyptdoudou/dudu_app/.env` (copy from `.env.example`, set `APP_ENV=production`, `APP_DEBUG=false`, strong `APP_KEY`, DB, `APP_URL`, mail, etc.).
- [ ] **`php artisan key:generate`** run once on server if `APP_KEY` is empty (only before first request; do not commit `.env`).
- [ ] **Test SSH** from your machine with the same key/user/host.
- [ ] **Merge / push** workflow to `main` or trigger **workflow_dispatch**.
- [ ] **Verify** site loads, login works, uploads work (`public_html/storage` symlink).
- [ ] **Review** `storage/logs/laravel.log` after first deploy.
- [ ] **Optional**: put site in maintenance for first cutover: `php artisan down` → deploy → `php artisan up`.

---

## Manual one-time commands (cPanel SSH)

Run as `egyptdoudou` after creating `.env` in `dudu_app` (before or after first CI run):

```bash
cd /home/egyptdoudou/dudu_app

# If .env does not exist yet:
cp .env.example .env
# Edit .env with production values (nano/vi), then:
php artisan key:generate --force

mkdir -p storage/framework/{cache/data,sessions,views} storage/logs storage/app/public bootstrap/cache
chmod -R ug+rwx storage bootstrap/cache

# Optional: first migration before CI (CI also runs migrate --force)
php artisan migrate --force
```

Do **not** copy the repo root `index.php` into `public_html`; CI deploys the generated split-deployment `index.php`.

---

## Triggering deployments

| Trigger | When |
|---------|------|
| Push to `main` | Automatic production deploy |
| **Actions → Deploy Production → Run workflow** | Manual (`workflow_dispatch`) |

---

## Security notes

- Laravel code and `.env` stay outside `public_html`.
- `.env` is excluded from rsync; never add it to the repository.
- Use a **dedicated deploy SSH key** with no passphrase stored in GitHub (secret storage only).
- Rotate keys if compromised.

---

## Related files

- [`.github/workflows/deploy-production.yml`](../.github/workflows/deploy-production.yml)
- [`.rsyncignore`](../.rsyncignore)
- [`deploy/templates/public-index.php.stub`](../deploy/templates/public-index.php.stub)
- [`deploy/scripts/post-deploy.sh`](../deploy/scripts/post-deploy.sh)
