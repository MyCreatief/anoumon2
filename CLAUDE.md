# Anoumon — Instructions for Claude

## What this project is

Anoumon.nl is a WordPress website managed by Mylene.

## Stack

| Layer | Tech |
|---|---|
| CMS | WordPress |
| Theme | anoumon (custom) |
| Hosting | SiteGround (Hostingpakket Advanced 1415) |

## Architecture rules

- Custom code lives in `app/public/wp-content/themes/anoumon/`
- Third-party plugins and WordPress core are NOT tracked in git

## Deploy

Code deploys via GitHub Actions on push to `main`.
GitHub repo: https://github.com/MyCreatief/anoumon2

## Local development

- LOCAL domain: anoumon.local
- MySQL: 127.0.0.1:10023, DB=local, user=root, password=root

## Handoff

Read `/.github/chat-handoff-log.md` at the start of every session.
Update it at the end with facts, decisions, open issues, and the next first step.
