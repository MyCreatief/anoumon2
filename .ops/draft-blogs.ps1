# Reads blogs-batchN.json and POSTs each as draft to anoumon.nl WP REST.
param([Parameter(Mandatory)][string]$JsonFile)

Set-StrictMode -Version Latest
$ErrorActionPreference = 'Stop'

$cred = Get-Content "$PSScriptRoot\sync-remote.json" -Raw | ConvertFrom-Json
$auth = "Basic " + [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("$($cred.app_user):$($cred.app_password)"))
$h = @{ Authorization = $auth; "Content-Type" = "application/json; charset=utf-8" }

$bytes = [System.IO.File]::ReadAllBytes($JsonFile)
$jsonText = [Text.Encoding]::UTF8.GetString($bytes)
$posts = $jsonText | ConvertFrom-Json

$endpoint = "$($cred.rest_endpoint)/wp-json/wp/v2/posts"

foreach ($p in $posts) {
    $body = [System.Text.Encoding]::UTF8.GetBytes(($p | ConvertTo-Json -Depth 10))
    try {
        $r = Invoke-RestMethod -Uri $endpoint -Method POST -Headers $h -Body $body -TimeoutSec 30
        Write-Host ("[OK] id={0}  slug=/{1}/  {2}" -f $r.id, $r.slug, $p.title)
    } catch {
        $msg = $_.Exception.Message
        $errBody = ""
        if ($_.Exception.Response) {
            try {
                $reader = New-Object System.IO.StreamReader($_.Exception.Response.GetResponseStream())
                $errBody = $reader.ReadToEnd()
            } catch {}
        }
        Write-Host ("[FAIL] {0}: {1} {2}" -f $p.title, $msg, $errBody) -ForegroundColor Red
    }
}
