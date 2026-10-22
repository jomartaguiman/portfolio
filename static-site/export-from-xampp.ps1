param(
    [string]$SiteUrl = 'http://localhost/portfolio/',
    [string]$XamppSite = 'C:\xampp\htdocs\portfolio'
)

$ErrorActionPreference = 'Stop'
$outputRoot = $PSScriptRoot

if (-not (Test-Path (Join-Path $XamppSite 'wp-load.php'))) {
    throw "WordPress was not found at $XamppSite"
}

$response = Invoke-WebRequest -Uri $SiteUrl -UseBasicParsing
$html = $response.Content
$html = $html.Replace('http://localhost/portfolio/wp-content/', 'wp-content/')
$html = $html.Replace('http://localhost/portfolio/wp-includes/', 'wp-includes/')
$html = $html.Replace('http://localhost/portfolio/#', '#')
$html = $html.Replace('http://localhost/portfolio/', '#top')
$html = $html -replace '<meta name=[''\"]robots[''\"] content=[''\"]noindex, nofollow[''\"]\s*/?>', '<meta name="robots" content="index, follow">'
$html = $html -replace '<link[^>]+(?:wp-json|/feed/|comments/feed|xmlrpc\.php)[^>]*>\s*', ''

# Copy only WordPress runtime assets referenced by the rendered page. Media,
# stylesheets, fonts, and JavaScript retain their original relative paths.
$localPaths = [regex]::Matches($response.Content, 'https?://localhost/portfolio/(?<path>wp-content/[^\s"''<>),]+|wp-includes/[^\s"''<>),]+)') |
    ForEach-Object { $_.Groups['path'].Value -replace '&amp;.*$', '' -replace '\?.*$', '' } |
    Sort-Object -Unique

foreach ($relativePath in $localPaths) {
    $sourcePath = Join-Path $XamppSite ($relativePath -replace '/', '\')
    if (Test-Path -LiteralPath $sourcePath -PathType Leaf) {
        $destinationPath = Join-Path $outputRoot ($relativePath -replace '/', '\')
        New-Item -ItemType Directory -Force -Path (Split-Path $destinationPath) | Out-Null
        Copy-Item -LiteralPath $sourcePath -Destination $destinationPath -Force
    }
}

$html | Set-Content -LiteralPath (Join-Path $outputRoot 'index.html') -Encoding utf8
Write-Host "Exported the rendered WordPress homepage and its referenced assets to $outputRoot"
