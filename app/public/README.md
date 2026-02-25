# Indigo Tree Project – Developer Guide

This project is built by [Indigo Tree](https://indigotree.co.uk).  
It uses [WordPress](https://wordpress.org) and is hosted on [WP Engine](https://wpengine.com/more/partnerspecialoffer/?w_agcid=v74Matyq).

This guide explains how to:

-   Get access and set up your environment.
-   Run and build the project.
-   Work with our branching, code, and deployment processes.

---

## 📋 Quick Navigation

-   [Onboarding](#onboarding)
-   [Project Setup](#project-setup)
    -   [Assets & Commands](#assets--commands)
-   [Development Process](#development-process)
    -   [Branching & PRs](#branching--prs)
    -   [Coding Standards](#coding-standards)
    -   [Node Version](#node-version)
-   [Deployment](#deployment)

---

## 🚀 Onboarding

To start work you’ll need access to:

-   GitHub (permission to create repos in the `indigotree` org).
-   Hosting environments on WP Engine.
-   The project in Teamwork.

➡️ Contact the **project manager** or a **developer colleague** for access.  
⚠️ You must enable **multi-factor authentication** on all accounts.

---

## 🛠 Project Setup

The main setup instructions are in our [Platform Docs](https://github.com/indigotree/platform-docs).

### Assets & Commands

We use **Webpack** for building CSS and JavaScript.  
All tasks are run via **NPM scripts** in `package.json`.

#### Core Plugin

| Command                 | What it does             |
| ----------------------- | ------------------------ |
| `npm run install:core`  | Install dependencies     |
| `npm run build:core`    | Build assets             |
| `npm run watch:core`    | Watch files, dev mode    |
| `npm run format:core`   | Auto-format code         |
| `npm run composer:core` | Install PHP dependencies |

#### Theme

| Command               | What it does          |
| --------------------- | --------------------- |
| `npm run build:theme` | Build theme assets    |
| `npm run watch:theme` | Watch files, dev mode |

#### Project-Wide

| Command                   | What it does          |
| ------------------------- | --------------------- |
| `npm run build`           | Full build            |
| `npm run format`          | Format everything     |
| `npm run lint:style`      | Lint CSS              |
| `npm run lint:js`         | Lint JS               |
| `npm run lint:md:docs`    | Lint docs             |
| `npm run lint:pkg-json`   | Lint `package.json`   |
| `npm run packages-update` | Update wp-scripts     |
| `npm start`               | Run theme in dev mode |

---

## 🔄 Development Process

### Git identity

Make sure your Git repo email is correct:

-   Work email (not personal).  
    [GitHub guide](https://help.github.com/articles/setting-your-email-in-git/#setting-your-email-address-for-a-single-repository).

### Branching & PRs

We follow Indigo Tree’s [Branching & PR Process](https://kb.indigotree.co.uk/github-branching-and-pr-process/).

-   Work in **feature branches**.
-   Merge into:
    -   `develop` → Development environment
    -   `staging` → Staging environment
    -   `main` → Production

**Pull Requests (PRs):**

1. Open a PR.
2. Assign a colleague for review.
3. After approval, **you merge it**.

### Coding Standards

We follow the [WordPress.org Coding Standards](https://developer.wordpress.org/coding-standards/).  
You don’t need to memorise them — they are enforced through the `lint` and `format` scripts described above.

### Node Version

Check `.nvmrc` for required version.

Commands:

-   `node -v` → current version
-   `nvm list` → installed versions
-   `nvm use <VERSION>` → switch version
-   `nvm alias default node` → set default

---

## 🚢 Deployment

We deploy via **GitHub Actions**.  
Branches map to environments:

-   `develop` → Development
-   `staging` → Staging
-   `main` → Production

### General Notes

-   Some files must **not** deploy. Add them to `.deployignore`.
-   The theme’s `assets/` folder (source files) is not deployed.

### Deployment Steps

Each environment works the same way:

1. Merge into the branch (`develop`, `staging`, or `main`).
2. PHP + JS checks run.
3. If they pass → GitHub deploys to WP Engine.

---

✅ You’re ready to develop, test, and deploy.
