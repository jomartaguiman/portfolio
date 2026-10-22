# Static export of Jomart Aguiman Portfolio

`index.html` is the rendered homepage exported from the local XAMPP WordPress site. The export includes its original responsive theme styling and the media files referenced by the page. It does not need PHP, WordPress, or a database to serve the page. The page’s navigation, anchor links, and project links are client-side/browser interactions and continue to work in the static copy.

`resume.html` displays the PDF resume in a responsive page, with open and download links. The PDF is stored at `assets/Aguiman_Jomart.pdf`. The export script preserves the Resume link in the homepage navigation when refreshing from XAMPP.

## Preview

Serve this folder from a local web server, for example with `python -m http.server 8000`, then open `http://localhost:8000`. The WordPress navigation scripts use JavaScript modules, so use an HTTP server instead of opening the HTML file directly.

## Refresh from XAMPP

With Apache running and the site available at `http://localhost/portfolio/`, run `./export-from-xampp.ps1`. The script copies the latest rendered homepage and referenced assets into this folder. If your XAMPP location or local site URL changes, pass `-XamppSite` and `-SiteUrl` parameters.

## Publish

Commit the contents of this folder to a GitHub repository. Configure GitHub Pages to publish from the repository root or `docs/`, or use a GitHub Actions workflow to publish this `static-site/` directory. GitHub Pages serves static files; it will not provide the WordPress admin or database.

The live portfolio URL is <https://jomartaguiman.github.io/portfolio/>. The repository workflow in `.github/workflows/pages.yml` deploys this folder whenever changes are pushed to `master`.
