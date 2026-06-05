# Drafts 4 blog posts for anoumon.nl (batch 1 of 2).
# Reads creds from sync-remote.json, posts as status=draft.

Set-StrictMode -Version Latest
$ErrorActionPreference = 'Stop'

$cred = Get-Content "$PSScriptRoot\sync-remote.json" -Raw | ConvertFrom-Json
$auth = "Basic " + [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("$($cred.app_user):$($cred.app_password)"))
$h = @{ Authorization = $auth; "Content-Type" = "application/json; charset=utf-8" }

# ---------- BLOG 1 ----------
$post1 = @{
    status = "draft"
    title = "Vage klachten waar je arts geen oorzaak voor vindt — wat doe je dan?"
    slug = "vage-klachten-zonder-oorzaak"
    categories = @(5)
    excerpt = "Je voelt je al maanden niet lekker, maar bloedonderzoek en scans zeggen niks. Vier oorzaken die de reguliere zorg vaak mist - en wat je er zelf aan kunt doen."
    content = @"
<p>Je gaat naar de dokter omdat je je al maanden niet jezelf voelt. Vermoeidheid, vage pijnen, een hoofd dat niet helder is, een onrustig gevoel in je lichaam. De huisarts kijkt mee, het bloed wordt geprikt, misschien volgen er nog wat scans. En dan komt het: <strong>er is niets gevonden</strong>. Alles &#8216;normaal&#8217;.</p>

<p>Maar jij weet beter. Want jij voelt het lichaam waarin je woont, en dat lichaam vertelt iets. Herken je dit? Dan ben je niet de enige.</p>

<h2>Waarom vinden artsen vaak niets bij vage klachten?</h2>

<p>De reguliere zorg is fenomenaal in het herkennen van duidelijk afwijkende waarden — een te lage schildklierwaarde, een infectie, een tumor. Maar veel klachten beginnen op een laag dat met bloedprikken niet zichtbaar is: in je <em>energiehuishouding</em>.</p>

<p>Levensenergie is voor mij geen vaag concept. Het is het fundament waarop een gezond lichaam draait. Stroomt die energie vrij door je lichaam, dan voel je je veerkrachtig, helder en thuis in jezelf. Zit er een blokkade — een klont gestolde energie van iets uit je verleden — dan begint je systeem ergens af te wijken. Eerst subtiel, later steeds duidelijker. Tegen de tijd dat het bloedonderzoek iets aanwijst, is het probleem vaak al lang aan het broeien.</p>

<h2>Vier oorzaken die ik vaak zie</h2>

<p><strong>1. Oude emotionele lading uit je jeugd.</strong> Niet altijd grote trauma's. Soms is het de optelsom van kleine momenten — een afwijzing op de basisschool, een ouder die te druk was om jou echt te zien, een verhuizing die je niet kon verwerken. Die ervaringen zetten zich vast als blokkades in je energieveld.</p>

<p><strong>2. Chronische stress die nooit volledig is uitgewerkt.</strong> Je lichaam reageert op stress door alarm te slaan. Als dat alarm jaren achter elkaar aan staat zonder echte rust ertussen, raakt je systeem uitgeput. Je voelt je gespannen, slaapt slecht en je lichaam mist de capaciteit om te herstellen.</p>

<p><strong>3. Niet-verwerkte verlieservaringen.</strong> Een overlijden, een scheiding, een baan die wegviel — verdriet dat geen plek heeft gekregen blijft als energie hangen. Dat kan zich jaren later uiten als depressie, brain fog of een hardnekkige vermoeidheid.</p>

<p><strong>4. Een leven dat niet bij je past.</strong> Als je dagelijks dingen doet die in essentie niet bij je horen — werk dat niet klopt, relaties die je leeg trekken — maakt je lichaam zich uiteindelijk hoorbaar. Het probeert je iets te vertellen.</p>

<h2>Wat helpt</h2>

<p>De kortste weg om weer in balans te komen, is naar binnen keren. Onderzoeken wat er onder je klachten zit. Dat is precies wat ik in mijn praktijk doe met <a href=&quot;https://anoumon.nl/energetische-therapie/&quot;>energetische therapie</a>: we lossen niet alleen het symptoom op, we ruimen de blokkade op die het symptoom veroorzaakt.</p>

<p>Veel mensen die bij mij komen hebben al een traject door de reguliere zorg achter de rug. Ze zijn niet ongelovig, ze zijn klaar met &#8216;leren leven&#8217; met klachten. Dat begrijp ik diep — die plek heb ik zelf ook gekend. En de goede berichten zijn: het kan echt anders.</p>

<h2>Een eerste kennismaking</h2>

<p>Wil je ervaren hoe een energetische behandeling voelt zonder direct een heel traject in te gaan? Dan is <a href=&quot;https://anoumon.nl/meettreat-en-investering/&quot;>Meet &amp; Treat</a> bedoeld. In 30 minuten bespreken we jouw situatie en geef ik je een korte energetische behandeling. €35, en je weet meteen of energetisch werk bij jou past.</p>

<p>Je hoeft niet door te leven met klachten waar geen verklaring voor is.</p>
"@
}

# ---------- BLOG 2 ----------
$post2 = @{
    status = "draft"
    title = "Brain fog: waarom je hoofd in de mist zit en wat helpt"
    slug = "brain-fog-hersenmist-wat-helpt"
    categories = @(5)
    excerpt = "Wakker maar wazig, woorden die niet komen, een hoofd vol watten. Wat brain fog is, waar het vandaan komt en welke route uit de mist leidt."
    content = @"
<p>Je staat in de keuken en bent vergeten wat je daar kwam doen. Een woord ligt op het puntje van je tong en blijft daar liggen. Een gesprek volgen kost je meer moeite dan vroeger, alsof je hoofd door watten heen moet luisteren. Welkom in de wereld van <strong>brain fog</strong>, of zoals het in het Nederlands wel heet: hersenmist.</p>

<p>Brain fog is geen medische diagnose. Het is een verzamelnaam voor een gevoel dat steeds meer mensen herkennen sinds we leven in een wereld vol prikkels, deadlines en chronische lichte stress. Maar dat maakt het niet onschuldig — wie er last van heeft weet hoe verlammend het kan zijn.</p>

<h2>Hoe voelt brain fog eigenlijk?</h2>

<p>Mensen die bij mij komen met hersenmist beschrijven het ongeveer zo: je hoofd voelt zwaar en troebel. Je hebt moeite om je te concentreren, simpele beslissingen kosten energie en je geheugen werkt traag. Niet één keer, maar bijna elke dag een beetje.</p>

<p>Daarbij komt vaak het gevoel dat je &#8216;de regie kwijt bent&#8217;. Je weet dat je vroeger scherper was, sneller, doortastender. Nu zit je daar, met een hoofd vol mist, en je vraagt je af waar dat is gebleven.</p>

<h2>Waar komt brain fog vandaan?</h2>

<p>In mijn werk zie ik een paar terugkerende patronen:</p>

<p><strong>Energetische blokkades op je voorhoofd-gebied.</strong> Het derde-oogchakra, de plek tussen je wenkbrauwen, is verbonden met heldere waarneming en denken. Als daar gestolde energie zit — vaak van te lang &#8216;moeten&#8217;, perfectionisme of niet luisteren naar je intuïtie — werkt je denken trager.</p>

<p><strong>Chronische overprikkeling.</strong> Je zenuwstelsel staat permanent in een lichte vecht-of-vluchtstand. Daar gaat veel energie naartoe, en je hersenen krijgen niet meer wat ze nodig hebben om helder te functioneren.</p>

<p><strong>Onverwerkte emoties die je &#8216;wegrationaliseert&#8217;.</strong> Wat je niet door je hart laat passeren blijft als ruis in je systeem zitten. Op een gegeven moment voelt dat als ruis in je hoofd.</p>

<p><strong>Hooggevoeligheid plus te weinig rust.</strong> Als je veel binnenkrijgt van anderen en je hebt onvoldoende momenten waarop je je systeem leeg laat lopen, raakt je hoofd verstopt.</p>

<h2>Wat haalt de mist op</h2>

<p>De gemakkelijke kant: zorg voor goede slaap, beweging, gezond eten en minder schermtijd. Dat helpt allemaal. Maar als je dat al doet en je merkt geen verschil, dan zit het probleem dieper.</p>

<p>De diepere kant is naar binnen kijken en onderzoeken welke energetische blokkades je helderheid bemoeilijken. Tijdens <a href=&quot;https://anoumon.nl/energetische-therapie/&quot;>energetische therapie</a> werken we aan precies dat — we ruimen de gestolde lading op die je systeem belast, zodat je levensenergie weer vrij kan stromen. Vrijwel iedereen die bij mij brain fog adresseert, merkt na een paar sessies dat het lichter wordt in hun hoofd.</p>

<p>Daarnaast helpt het om <strong>echt naar je lichaam te luisteren</strong>. Brain fog is vaak het laatste signaal voordat een burn-out zich aandient. Het is geen storing om weg te wuiven, het is je systeem dat aanbelt.</p>

<h2>Eerst even ervaren?</h2>

<p>Wil je voelen hoe energetisch werk bij jou aanvoelt voordat je een heel traject ingaat? Bij <a href=&quot;https://anoumon.nl/meettreat-en-investering/&quot;>Meet &amp; Treat</a> bespreken we jouw situatie en geef ik je een korte behandeling. 30 minuten, €35 — een lichte instap om te ontdekken of dit jouw weg uit de mist is.</p>
"@
}

# ---------- BLOG 3 ----------
$post3 = @{
    status = "draft"
    title = "Diepe vermoeidheid die niet weggaat: 4 oorzaken die artsen vaak missen"
    slug = "chronische-vermoeidheid-oorzaken"
    categories = @(5)
    excerpt = "Je slaapt 8 uur en bent nog moe. Bloedonderzoek wijst niks aan, maar de uitputting blijft. Vier oorzaken voorbij de medische standaardtests."
    content = @"
<p>Je staat moe op, je gaat moe naar bed. Je slaapt voldoende uren, soms zelfs meer dan vroeger, en toch laad je niet meer op. Het bloedonderzoek wijst geen tekorten aan. Schildklier in orde, ijzer prima. En toch — je voelt je leeg.</p>

<p>Een diepe, hardnekkige vermoeidheid is meer dan &#8216;een dipje&#8217;. Het is een signaal van een systeem dat ergens uit balans is. En vaak zit die balans op een laag dat met standaard medisch onderzoek niet zichtbaar is.</p>

<h2>1. Je bent emotioneel uitgeput zonder het te beseffen</h2>

<p>Veel mensen die bij mij komen denken dat ze fysiek moe zijn, terwijl hun lichaam vooral &#8216;voor anderen werkt&#8217;. Zorgen voor familie, harde eisen op het werk, een innerlijke perfectionist die nooit tevreden is — dat kost continu energie.</p>

<p>Je merkt het zelf niet als het stapsgewijs gebeurt. Maar als ik mensen vraag wanneer ze voor het laatst echt voor zichzelf hebben gezorgd, blijft het stil. Emotionele uitputting voelt aan als fysieke vermoeidheid. Alleen helpt slapen niet.</p>

<h2>2. Oude trauma's slokken nog steeds energie op</h2>

<p>Een gebeurtenis uit je verleden die niet volledig is verwerkt blijft in je systeem hangen. Je weet vaak niet eens meer bewust dat het er is — je hebt het &#8216;weggezet&#8217;, je doet ermee verder, je hebt er &#8216;leren leven&#8217;. Maar je energieveld weet het wel. Het draagt die last permanent mee.</p>

<p>Pas wanneer we die oude lading actief onder ogen zien en helen, krijgt je systeem zijn energie terug. Veel cliënten beschrijven het na een paar sessies als &#8216;ik wist niet dat ik dit allemaal aan het dragen was&#8217;.</p>

<h2>3. Je leven past niet meer bij wie je nu bent</h2>

<p>Soms is moeheid een vorm van protest. Je lichaam zegt: dit klopt niet meer. Een baan waar je niet meer in past, een relatie waarvan je weet dat ze leeg is, vriendschappen die je oppervlakkig houden — dat kost je dagelijks meer dan je beseft.</p>

<p>De vermoeidheid is dan een vraag: wat heb je werkelijk nodig? Veranderen kost lef, maar blijven zoals het is kost meer energie dan je nog hebt.</p>

<h2>4. Je energieveld lekt zonder dat je het merkt</h2>

<p>Als je hooggevoelig bent — en veel van mijn cliënten zijn dat in meer of mindere mate — neem je veel op van mensen om je heen. Een vol kantoor, een gespannen vergadering, een verdrietige vriendin — je voelt het allemaal. Als je geen manier hebt om je systeem regelmatig leeg te laten lopen, raak je oververhit.</p>

<p>Aarden, even alleen zijn in de natuur, lichaamsgerichte oefeningen — dat zijn praktische dingen die helpen. Maar als je structureel lekt, is een energetisch onderhoud nodig.</p>

<h2>Wat ik in mijn praktijk doe</h2>

<p>Bij <a href=&quot;https://anoumon.nl/energetische-therapie/&quot;>energetische therapie</a> kijk ik welke blokkades en lekken in jouw energieveld zitten. We werken niet aan het symptoom (de moeheid), maar aan de oorzaken eronder. Je merkt vaak al na een paar sessies dat je opladen weer mogelijk wordt.</p>

<p>Voor mensen die regelmatig &#8216;leeglopen&#8217; door drukke periodes raad ik <a href=&quot;https://anoumon.nl/apk-preventief/&quot;>energetische APK</a> aan — een periodiek onderhoud zodat je niet eerst hoeft in te storten voordat je iets aan je systeem doet.</p>

<p>Wil je eerst voelen hoe een energetische behandeling werkt? Met <a href=&quot;https://anoumon.nl/meettreat-en-investering/&quot;>Meet &amp; Treat</a> (30 min, €35) maak je kennis zonder een lang traject vooraf vast te leggen.</p>
"@
}

# ---------- BLOG 4 ----------
$post4 = @{
    status = "draft"
    title = "Hooggevoelig en uitgeput: waarom HSP'ers extra rust nodig hebben"
    slug = "hooggevoelig-hsp-uitgeput"
    categories = @(5)
    excerpt = "Hooggevoelige mensen vangen alles op - sferen, emoties, prikkels. En raken sneller leeg dan ze beseffen. Wat HSP eigenlijk is, en hoe je niet meer dagelijks instort."
    content = @"
<p>Je voelt dingen die andere mensen niet lijken op te merken. De ondertoon in een gesprek. De spanning in een kamer voordat iemand iets zegt. Een drukke supermarkt voelt voor jou als een aanslag op je systeem terwijl je partner er fluitend doorheen loopt. Klinkt bekend? Grote kans dat je hooggevoelig bent.</p>

<p><strong>HSP</strong> — Hoog Sensitief Persoon — is geen ziekte en geen stoornis. Het is een eigenschap van je zenuwstelsel: je verwerkt prikkels intensiever en dieper dan de gemiddelde persoon. Volgens onderzoek geldt dat voor ongeveer 1 op de 5 mensen.</p>

<h2>De keerzijde van hooggevoeligheid</h2>

<p>HSP-zijn heeft mooie kanten: je voelt verbinding diep, je hebt vaak een sterke intuïtie, je herkent schoonheid en emotie waar anderen het missen. Maar er hangt een prijs aan — je raakt sneller overprikkeld dan andere mensen, en je hebt meer hersteltijd nodig.</p>

<p>Veel hooggevoelige mensen leggen dat patroon pas op latere leeftijd voor zichzelf neer. Tot die tijd dragen ze rond met het idee dat ze &#8216;te gevoelig&#8217; zijn, &#8216;te emotioneel&#8217; reageren of &#8216;niet tegen drukte kunnen&#8217;. Die labels komen niet uit jezelf, die komen uit een wereld die zich heeft afgestemd op het minder gevoelige type. Maar ze raken je wel.</p>

<h2>Waarom je sneller leeg loopt</h2>

<p>Energetisch gezien werkt het zo: je energieveld staat open. Je neemt veel op uit je omgeving — sferen, emoties, ongezegde dingen. Als ander mens iets met je deelt, neem je daarvan een deel mee in je eigen systeem. Dat is een gave wanneer je het bewust kunt hanteren. Maar zonder die bewustwording, vul je je systeem dag na dag met dingen die niet van jezelf zijn.</p>

<p>Resultaat: je voelt je voortdurend lichtelijk overprikkeld. Een dag in een vol kantoor kost je een avond op de bank. Een familiebijeenkomst betekent het weekend uitzieken. En als je dat patroon te lang volhoudt, krijg je klassieke uitputtingsverschijnselen: slaapproblemen, brain fog, een zwaar gevoel dat niet weggaat.</p>

<h2>Wat helpt — praktisch</h2>

<p><strong>Plan herstelmomenten in voordat je ze nodig hebt.</strong> Niet pas rust nemen als je instort, maar dagelijks korte momenten waarop je je systeem laat zakken. Tien minuten buiten lopen, een stilte-pauze tussen afspraken door, een avond bewust niets plannen.</p>

<p><strong>Aarden.</strong> Je voeten op de grond, even buiten zijn, je handen in koud water — eenvoudig, en het werkt. Hooggevoelige mensen lopen sneller &#8216;in hun hoofd&#8217; en die loskoppeling van het lichaam vergroot de overbelasting.</p>

<p><strong>Leer onderscheid maken tussen jouw emoties en die van anderen.</strong> Niet alles wat je voelt is van jezelf. Een lichte, snelle stemmingswisseling in een sociale omgeving komt vaak van iemand om je heen. Bewustwording daarvan is een vaardigheid die je kunt leren.</p>

<h2>De energetische kant</h2>

<p>Voor veel HSP'ers helpt het om periodiek een energetisch onderhoud te doen — wat ik in mijn praktijk de <a href=&quot;https://anoumon.nl/apk-preventief/&quot;>APK preventief</a> noem. We kijken naar wat zich heeft opgehoopt in je veld en ruimen het op voordat het zich uit als fysieke of mentale klachten.</p>

<p>Voor zwaardere lading — bijvoorbeeld als je al langer last hebt van uitputting of een burn-out aan voelt komen — is <a href=&quot;https://anoumon.nl/energetische-therapie/&quot;>energetische therapie</a> de plek waar we dieper gaan. We werken aan de blokkades die je systeem belasten, niet alleen aan het oplossen van het moment.</p>

<p>Hooggevoelig zijn is geen probleem dat opgelost moet worden. Maar als je er decennia mee rondloopt zonder een goede manier om je systeem te onderhouden, raak je leeg. Dat hoeft niet.</p>

<p>Wil je voelen hoe een energetische behandeling bij jou aanvoelt? <a href=&quot;https://anoumon.nl/meettreat-en-investering/&quot;>Meet &amp; Treat</a> is een korte kennismaking — 30 minuten, €35.</p>
"@
}

# ---------- POST ALL FOUR ----------
$posts = @($post1, $post2, $post3, $post4)
$endpoint = "$($cred.rest_endpoint)/wp-json/wp/v2/posts"

foreach ($p in $posts) {
    $body = $p | ConvertTo-Json -Depth 10
    try {
        $r = Invoke-RestMethod -Uri $endpoint -Method POST -Headers $h -Body $body -TimeoutSec 30
        "[OK] id=$($r.id)  /?p=$($r.id)  $($p.title)"
    } catch {
        $reader = if ($_.Exception.Response) { New-Object System.IO.StreamReader($_.Exception.Response.GetResponseStream()) } else { $null }
        $errBody = if ($reader) { $reader.ReadToEnd() } else { "" }
        "[FAIL] $($p.title): $($_.Exception.Message)`n  $errBody"
    }
}
