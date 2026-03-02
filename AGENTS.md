# AGENTS.md — Indigo Tree WordPress Plugin & Theme Guidelines

## 1. Purpose

This document defines the **coding standards**, **environment setup**, **build commands**, and **pull request requirements** for all Indigo Tree WordPress projects.
It applies to both **human developers** and **automated agents** (e.g. CI tools, AI assistants, code generators).

The file **must exist at the project root** (`AGENTS.md`) so tooling can automatically locate it.

---

## 2. Environment & Required Versions

### Core Requirements

| Tool                  | Minimum Version               | Notes                                             |
| --------------------- | ----------------------------- | ------------------------------------------------- |
| **PHP**               | 8.2+ (8.4 preferred)          | Confirm via `composer.json` or platform directory |
| **WordPress**         | 6.8.3+                        | Maintain compatibility with this minimum version  |
| **Node.js**           | Version specified in `.nvmrc` | Use `nvm use` to switch                           |
| **npm**               | 10.8.2+                       | Matches Node 20+                                  |
| **Composer**          | 2.8.12+                       | Required for PHP dependencies and linting         |
| **Local Environment** | LocalWP                       | Used for development and testing                  |

---

## 3. Dependency Installation

**ALWAYS install dependencies in this order:**

1. **npm dependencies (JavaScript & build tools):**

    ```bash
    npm install
    ```

    - Creates `node_modules/`
    - May show non-critical deprecation warnings
    - Takes approximately 30-60 seconds

2. **Composer dependencies (PHP linting only):**

    ```bash
    composer install --no-interaction
    ```

    - Installs WordPress Coding Standards (WPCS)
    - Creates `wp-content/platform/vendor/` directory
    - Takes approximately 30-60 seconds

---

## 4. Coding & Style Guide

### 4.1 General

-   Follow **WordPress Core Coding Standards** for PHP, HTML, CSS, and JavaScript:

    -   [https://developer.wordpress.org/coding-standards/](https://developer.wordpress.org/coding-standards/)

-   Use **tabs for indentation** (per `.editorconfig`).
-   Run `npm run format` before committing.

### 4.2 PHP Guidelines

-   Namespaces must begin with `IndigoTree\`, followed by the project name (e.g. `IndigoTree\ProjectName`).
-   Use **PSR-4 autoloading** with one class per file.
-   All functions and classes must include **PHPDoc comments** with type hints.
-   Use **strict typing** where possible; validate mixed types early.
-   **CRITICAL:** Hook registration must ALWAYS come before the callback function definition.

This ensures that the code is clear and follows WordPress best practices. The hook registration tells WordPress what function to call, so it makes logical sense to define the hook first, then define the function it will call.

**Correct pattern:**

```php
<?php
add_action( 'init', __NAMESPACE__ . '\\my_function' );

function my_function() {
	// function content here
}
```

-   For new major functionality, create a **new plugin**:

    -   Name format: `indigotree-site-<feature-name>`
    -   Base it on `indigotree-site-core` template.

### 4.3 JavaScript Guidelines

-   Use **ES Modules** (`import` / `export`).
-   Enqueue modules with `wp_enqueue_script_module()` (WordPress 6.5+).
-   Use **JSDoc** for all functions, parameters, and return types.
-   Format with **Prettier** (`npm run format`).
-   Register scripts using WordPress APIs (`wp_enqueue_script()`, `wp_add_inline_script()`, etc.).
-   Build process must generate self-contained, minified modules ready for direct use (no additional build steps by consumers).

Add the following revised text **as a new subsection under Section 4 — “Coding & Style Guide”**, immediately **after 4.3 JavaScript Guidelines** and **before Section 5 (Project Structure)**.

---

### 4.4 Linting and Code Quality

**JavaScript/JSX Linting:**

```bash
npm run lint:js
```

-   Uses **ESLint** with WordPress coding standards.
-   Checks all `.js` files in `src/`.
-   Must pass with no errors before committing (some warnings acceptable).

**CSS/SCSS Linting:**

```bash
npm run lint:css
```

-   Uses **stylelint** with WordPress standards.
-   Checks all `.scss` files in `src/`.
-   Must pass with no errors before committing.

**Auto-formatting:**

```bash
npm run format
```

-   Uses **Prettier** to auto-format JavaScript, JSON, and CSS/SCSS files.
-   **Run this before linting** if Prettier errors occur.
-   Automatically fixes most formatting-related lint issues.
-   Safe to run on all files.

**PHP Linting:**

```bash
./vendor/bin/phpcs [your-plugin-file.php]
```

-   Uses **PHP_CodeSniffer (PHPCS)** with WordPress Coding Standards.
-   Available standards: `WordPress`, `WordPress-Core`, `WordPress-Docs`, `WordPress-Extra`.
-   The main plugin file may contain acceptable warnings (e.g. tabs vs spaces, line length).
-   Automatically fix many issues with:

    ```bash
    ./vendor/bin/phpcbf [your-plugin-file.php]
    ```

**NOTE:** This project uses **tabs for indentation** per WordPress standards and `.editorconfig`.
PHPCS warnings about “spaces must be used” are incorrect and can be ignored.

---

## 5. Project Structure

### Directory Layout

```

/
├── mu-plugins/
│ └── 0-platform.php
├── platform/
│ ├── platform.php
│ └── vendor/
├── plugins/
│ └── indigotree-site-core/
│ ├── includes/
│ └── indigotree-site-core.php
├── themes/
│ └── indigotree-theme-2025/
│ ├── assets/
│ │ ├── js/
│ │ ├── sass/
│ │ └── images/
│ ├── parts/
│ ├── patterns/
│ ├── styles/
│ ├── templates/
│ ├── theme.json
│ └── functions.php

```

### Build Output (Plugins and Blocks)

```

build/
├── blocks-manifest.php
└── [module-or-block-name]/
├── block.json # Copied from src
├── index.js # Minified editor script
├── index.css # Compiled styles (LTR)
├── index-rtl.css # Compiled styles (RTL)
├── index.asset.php # WordPress dependencies array
├── view.js # Minified front-end script
├── view.asset.php # WordPress dependencies array
├── style-index.css # Compiled front-end styles (LTR)
└── style-index-rtl.css # Compiled front-end styles (RTL)

```

---

## 6. Commands Reference

| Command                 | Purpose                            |
| ----------------------- | ---------------------------------- |
| `npm run install:core`  | Install plugin dependencies        |
| `npm run composer:core` | Install PHP dependencies           |
| `npm run build:core`    | Build plugin assets                |
| `npm run watch:core`    | Watch plugin files                 |
| `npm run build:theme`   | Build theme assets                 |
| `npm run watch:theme`   | Watch theme files                  |
| `npm run build`         | Build all assets                   |
| `npm run format`        | Auto-format code (Prettier)        |
| `npm run lint:js`       | Lint JavaScript (ESLint)           |
| `npm run lint:css`      | Lint CSS/SCSS (stylelint)          |
| `npm start`             | Run in development/watch mode      |
| `npm run plugin-zip`    | Create distributable ZIP of plugin |

---

## 7. Validation Workflow

Before committing or opening a PR, **ALWAYS run in this order**:

1. Format:

    ```bash
    npm run format
    ```

2. Lint JavaScript:

    ```bash
    npm run lint:js
    ```

3. Lint CSS:

    ```bash
    npm run lint:css
    ```

4. Build assets:

    ```bash
    npm run build
    ```

5. Verify `build/` output exists and contains expected files.
6. If PHP changed:

    ```bash
    ./vendor/bin/phpcs [your-plugin-file.php]
    ```

---

## 8. Pull Request Requirements

Before opening or merging a pull request:

1. Ensure builds complete with **no errors**.
2. Run formatting and linting — fix all issues.
3. Follow the **feature branch** workflow.
4. Update documentation (PHPDoc, enqueue paths, constants, public APIs).
5. Remove debugging code (`console.log`, unused imports, etc.).
6. Confirm asset URLs, constants, and enqueue references match the target environment.

---

## 9. Testing & Code Quality

-   Automated tests **not yet required**, but encouraged.
-   Future testing stack:

    -   **PHP:** PHPUnit
    -   **JavaScript:** Jest + Puppeteer

-   Place tests in `tests/php/` or `tests/js/`.
-   Recurring issues or common feedback should be added to this file for agent reference.

---

## 10. Versioning & Compatibility

-   If maintaining backwards compatibility, isolate legacy code under:
    `/compat/wordpress-X.Y/`
-   Ensure the plugin/theme functions in all supported WordPress and PHP versions.

---

## 11. Troubleshooting

| Issue                          | Solution                                                 |
| ------------------------------ | -------------------------------------------------------- |
| `npm run build` fails          | Run `npm install` again                                  |
| Prettier errors                | Run `npm run format`                                     |
| Missing `vendor/bin/phpcs`     | Run `composer install --no-interaction`                  |
| Composer asks for GitHub token | Add `--no-interaction` or wait for cache clone           |
| Build folder empty             | Ensure valid source files exist and no errors in console |
| Plugin not working after edits | Run `npm run build` after every change                   |

---

## 12. Summary for Automated Agents

-   Respect environment versions defined above.
-   Use provided commands; do not invent new build or linting steps.
-   Never modify generated files under `/build/`.
-   Maintain compatibility with WordPress 6.8+ and PHP 8.2+.
-   When adding new functionality:

    -   Use modular plugin structure.
    -   Follow naming conventions (`indigotree-site-*`).

-   Always perform format → lint → build → validate sequence before committing.

Add the following revised text **as a new Section 13 — “Important Notes & Agent Conduct”**, immediately **after Section 12 (Summary for Automated Agents)** and **before the “End of File” line**.

---

## 13. Important Notes & Agent Conduct

-   `build/` directories is **git-ignored but required** for the plugin or theme to function.
-   **Never edit files in `build/` folders directly** — they are automatically generated by the build process.
-   This project follows **WordPress coding standards**, which mandate **tabs for indentation** as defined in `.editorconfig`.
-   Do **not** generate or commit any additional files beyond what is explicitly required for the assigned task (e.g., summaries, reports, or documentation files).

### Trust These Instructions

These instructions are tested and validated for this repository.
Only perform additional exploration or search if:

-   The information here is incomplete for your specific task.
-   You encounter an error not documented in **Troubleshooting**.
-   You are adding new functionality not covered by existing patterns.

For all routine operations, **trust this document as the single source of truth** and follow it precisely.
