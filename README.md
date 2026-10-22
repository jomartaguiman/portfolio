# Local WordPress Portfolio

A custom portfolio block child theme using Twenty Twenty-Five, for a local WordPress site running under XAMPP.

## Current setup

- Local site: [http://localhost/portfolio](http://localhost/portfolio)
- Active theme: **Portfolio Blocks**, with **Twenty Twenty-Five** as its parent
- Local database: `portfolio_wp`
- The active theme copy is at `C:\xampp\htdocs\portfolio\wp-content\themes\portfolio-blocks`.

Open **Appearance → Editor** in WordPress to edit the homepage, header, footer, templates, colors, and typography visually. Add portfolio items under **Projects**; set a featured image and excerpt for each. The homepage query loop displays those projects automatically.

The editable source copy in this repository is `wp-content/themes/portfolio-blocks`. If you edit those source files directly, copy the changed files into the active XAMPP theme folder above before refreshing the site. The source theme includes `templates/front-page.html`, `templates/single-project.html`, `templates/archive-project.html`, header and footer template parts in `parts/`, reusable patterns in `patterns/`, and global settings in `theme.json`.

## Logo assets

- `wp-content/themes/portfolio-blocks/assets/brand/ja-icon.svg` — standalone JA icon.
- `wp-content/themes/portfolio-blocks/assets/brand/ja-wordmark.svg` — horizontal wordmark for Jomart Aguiman.

Both are transparent SVG vector files and are also copied into the active XAMPP theme's `assets/brand` folder.

## Local safety

This setup is intended for local development. Default XAMPP database credentials should not be exposed to the internet. Keep the site local unless you intentionally configure a production host and security settings.

## Static portfolio export

The `static-site/` folder contains a static export of the rendered homepage from the XAMPP site, including referenced uploads and the active `Portfolio` theme assets. It can be hosted on GitHub Pages without PHP or a database. To refresh it, start Apache and run `static-site/export-from-xampp.ps1`. See [static-site/README.md](static-site/README.md) for preview and publishing steps.
