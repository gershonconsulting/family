# attia.net — Phase 1 specification

**Status:** scaffold. The 25-feature Phase 1 list was locked outside this repository; this
document is the place it now lives. Each feature below is written from the locked scope as
it is currently known. **Anything marked `(confirm)` needs to be checked against the
original locked list before it is built** — the scaffold should not silently invent scope.

---

## 1. Principles

1. **Private by default.** Living people are visible only to signed-in family members. There
   is no public tree in Phase 1.
2. **Collaborative, with attribution.** Every edit records who made it and when. Disagreement
   about a fact is normal in genealogy; the app keeps the history rather than overwriting it.
3. **The tree grows through the family's address books,** not through data entry. This is the
   product's one genuinely different idea and Phase 1 exists to prove it.
4. **No photos, no GEDCOM.** Both are Phase 2. They are the two features most likely to eat
   the whole schedule, which is why they are out.

## 2. Feature areas

### A. Data foundation
- **A1** Import a MyHeritage CSV export into people, families and relationships
- **A2** Person record: names (including maiden and Hebrew names), birth, death, places, notes
- **A3** Family record: partnership, children, ordering
- **A4** Relationship derivation (siblings, cousins, degrees) computed rather than stored
- **A5** Duplicate detection on import, with a human merge step *(confirm)*

### B. Accounts and access
- **B1** Google OAuth sign-in
- **B2** Member account linked to a person in the tree
- **B3** Roles: member, editor, admin
- **B4** Living-person privacy rule enforced at the query layer, not in the template

### C. The invitation flow — the core of Phase 1
- **C1** Connect Google Contacts (read-only scope)
- **C2** Fuzzy-match contacts against names in the tree
- **C3** Review screen: proposed matches, ranked, with the evidence for each
- **C4** Send invitation email to a matched contact
- **C5** Invitation acceptance links the new member to their person record
- **C6** Invitation state tracking (sent, opened, accepted, declined, expired) *(confirm)*

### D. Browsing and editing
- **D1** Tree view centred on any person
- **D2** Person page with relationships, facts and sources
- **D3** Edit a person, with attribution
- **D4** Add a person and attach them to an existing family
- **D5** Search across names, places and dates
- **D6** Recent-changes feed so the family can see the tree moving *(confirm)*

### E. Operations
- **E1** Nightly database backup
- **E2** Audit log of edits
- **E3** Admin view of members and pending invitations

## 3. Explicitly out of scope for Phase 1

Photo library · face tagging · GEDCOM import/export · public or shareable branches ·
timeline and map views · DNA integration · native mobile apps · multi-language UI.

## 4. Open questions

1. **Domain.** `attia.net` currently redirects to the unrelated `www.attia.com`. Until that
   is resolved (checkpoint CP-DEC-004) the app has no canonical address.
2. **Source of truth for the locked 25.** This document reconstructs the scope; the original
   locked list should be reconciled against it and the `(confirm)` markers cleared.
3. **Hebrew name handling** — transliteration, sorting and search need a decision before A2
   is built.
