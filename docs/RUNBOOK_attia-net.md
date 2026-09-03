# RUNBOOK — attia.net

Operational steps for the family genealogy app. Written to be followed by whoever is on the
task, without prior context.

## 1. Where things live

| | |
|---|---|
| Repository | `github.com/gershonconsulting/family` |
| Hosting | Hostinger Business v3 shared hosting — **not yet provisioned** |
| DNS / SSL | Cloudflare, zone `attia.net` — **see the domain issue below** |
| Registrar | Tierra.net |
| Deploy | GitHub Actions → FTP (`.github/workflows/deploy.yml`) |
| Document root | `public/` |

## 2. Known blocker: the domain

`attia.net` resolves but redirects to `www.attia.com` — an unrelated site ("ATTIA — Unite the
Family Worldwide"). This looks like an ownership or registrar mix-up rather than a
misconfiguration, so it needs a decision, not a DNS edit. Tracked as checkpoint
**CP-DEC-004** in the gershonCRM checkpoint ledger.

Nothing in this runbook below section 3 can be completed until the app has an address.

## 3. First provision (once the domain is settled)

1. Create the Hostinger Business v3 site and its MySQL database.
2. Point the document root at `public/`.
3. In Cloudflare, add the records for the app **without touching MX or TXT records** — email
   DNS lives in this zone.
4. Issue the Let's Encrypt certificate; confirm with MXtoolbox SuperTool that DNS, SSL and
   email all resolve as expected.
5. Add the four deploy secrets to the GitHub repository (see section 4), then re-enable the
   `push` trigger in `deploy.yml`.
6. Create the mailboxes per the standing default: `info@` primary, with `support@`, `sales@`,
   `billing@` and `social@` as forwarders.
7. Add the 1Password vault entry and the Live Sites Inventory row.

## 4. Deploy

Deployment is a GitHub Action that FTPs `public/` to the host.

Required repository secrets:

| Secret | What it is |
|---|---|
| `FTP_HOST` | Hostinger FTP hostname |
| `FTP_USER` | FTP account user |
| `FTP_PASSWORD` | FTP account password |
| `FTP_REMOTE_DIR` | Absolute remote path of the document root |

Until those exist the workflow runs **only on manual dispatch**, so an unconfigured repo does
not produce a failing check on every push. Re-enable the `push` trigger once the secrets are
in place.

## 5. Backup and restore

- The database is backed up nightly by the host. Verify a restore before the first real
  import — a backup nobody has restored is not a backup.
- The MyHeritage CSV that seeds the tree is the other thing worth keeping: store a copy in
  1Password alongside the credentials, since it is the only way to rebuild from zero.

## 6. Incidents

| Symptom | First thing to check |
|---|---|
| Site returns 500 | Host error log; then the most recent deploy |
| Sign-in fails for everyone | Google OAuth client — redirect URI and consent screen status |
| Invitations not arriving | Sender domain SPF/DKIM via MXtoolbox; then the invitation state table |
| A relative reports wrong data | Do not correct it silently — the audit log and attribution exist so the family can settle it |
