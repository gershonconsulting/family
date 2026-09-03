# attia.net — Family Genealogy

A private, collaborative genealogy web app for the Attia family. Roughly 350 relatives,
seeded from a MyHeritage CSV export, maintained together by the family rather than by one
person.

> **Private by default.** Nothing in this repository or the deployed app is intended to be
> public. Living relatives' details are visible only to signed-in family members.

---

## What makes it different

Most genealogy tools make you find and add each relative by hand. This one starts from the
other end: **email-first invitations**. A member connects their Google Contacts, the app
fuzzy-matches those contacts against names already in the tree, and proposes invitations —
so the tree grows through the family's own address books instead of through data entry.

## Phase 1

Phase 1 is a locked 25-feature MVP. The scope boundary that matters:

| In Phase 1 | Deferred to Phase 2 |
|---|---|
| Import from MyHeritage CSV | Photo library and face tagging |
| Person, family and relationship records | GEDCOM import/export |
| Tree browsing and person pages | Public/shareable branches |
| Search across the tree | Timeline and map views |
| Google Contacts fuzzy-matching | Native mobile apps |
| Email-first invitation flow | |
| Member accounts and roles | |
| Collaborative edits with attribution | |

The feature-by-feature list lives in [`docs/PHASE-1-SPEC.md`](docs/PHASE-1-SPEC.md).

## Stack

Chosen to match the standing platform defaults, not to be interesting:

- **PHP 8.2 + MySQL** on Hostinger Business v3 shared hosting
- **Cloudflare** for DNS, CDN and SSL (existing email DNS preserved)
- **GitHub Actions → FTP** deploy (`.github/workflows/deploy.yml`)
- **Google OAuth** for sign-in and the Contacts scope used by the invitation flow

A VPS is deliberately not used: this app has no workload that shared hosting cannot carry.

## Repository layout

```
public/          document root served by the host
  index.php      entry point / front controller
docs/
  PHASE-1-SPEC.md    the locked 25-feature scope
  RUNBOOK_attia-net.md  deploy, restore and incident steps
.github/workflows/
  deploy.yml     FTP deploy, manual until the FTP secrets exist
```

## Status

| | |
|---|---|
| Repository | scaffolded — this commit |
| Domain | ⚠️ unresolved: `attia.net` currently redirects to the unrelated `www.attia.com`. Tracked as checkpoint **CP-DEC-004**. |
| Hosting | not yet provisioned |
| Data import | MyHeritage CSV not yet loaded |

The domain question and the code are independent — neither blocks the other.

## Contributing

This is a private family project. Changes go through pull requests so that every edit to
the tree's schema or logic has an author and a reason attached, the same way edits to the
tree itself do.
