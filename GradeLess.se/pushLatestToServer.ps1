
# Set-ExecutionPolicy -ExecutionPolicy unrestricted

$Username = "dev"       # fornamn.efternamn
#$MyServer = "172.16.32.7"  # IP till min server (172.16.33.xx)

$Firewall = "194.22.31.74" # Clavister W20b ( https://172.16.32.1, User: guest, Pass: FramtidNuIT20 )
$FirewallPort = "8322"

#mstsc

echo ""
#ssh -L 3390:${MyServer}:3389 -L 8080:osticket.it20.test:80 -p ${FirewallPort} ${Username}@${Firewall}
ssh -p ${FirewallPort} ${Username}@${Firewall} "cd /srv/http/NTI-Website; sudo -S git pull"

# pause
Write-Host -NoNewLine 'Press any key to continue...';
$null = $Host.UI.RawUI.ReadKey('NoEcho,IncludeKeyDown');