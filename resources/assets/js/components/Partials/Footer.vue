<template>
    <div>
        <v-footer color="#f6f6f6">
            <v-layout row wrap align-center>
                <v-flex xs6>
                    <div class="white--text ml-3 align-center">
                        <div class="footer-link ml-2" @click.stop="dialog1 = !dialog1">Dodací podmínky</div>
                        <div class="footer-link mr-3" @click.stop="dialog2 = !dialog2">Obchodní podmínky</div>
                    </div>
                </v-flex>
                <v-flex xs6>
                    <div class="white--text ml-3 align-center">
                        <img :src="gopayUrl" height="30px">
                        <img :src="visaVerifiedUrl" height="30px">
                        <img :src="visaUrl" height="30px">
                        <img :src="mastecardSecureUrl" height="30px">
                        <img :src="mastecardUrl" height="40px">
                    </div>
                </v-flex>
            </v-layout>
        </v-footer>
        <v-footer class="primary">
            <v-layout row wrap align-center>
                <v-flex xs12>
                    <div class="white--text ml-3 align-center">
                        <v-flex xs12 class="footer-center">
                            2018 © Alfatisk všechna práva vyhrazena
                        </v-flex>
                    </div>
                </v-flex>
            </v-layout>
        </v-footer>
        <v-dialog v-model="dialog1" width="600px">
            <v-card>
                <v-card-title>
                    <span class="headline">Dodací podmínky</span>
                </v-card-title>
                <v-card-text>
                    Upozorňujeme, že veškeré objednávky jsou závazné. V případě nevyzvednutí či nepřevzetí zásilky budou vymáhány náklady za výrobu a doručení v plné výši. Dodání zásilek je v rozmezí 7-14 pracovních dní. V průběhu vánoční sezóny  (1.12.-30.12.) se dodání může prodloužit až na 30 pracovních dní . Termín dodání vždy záleží na aktuálním počtu zakázek.

                    Způsob dopravy
                    Česká pošta: 120,- Kč (cena do 30 kg váhy balíku)
                    Vyzvednutí na pobočce ALFATISK, s.r.o., Americká 17, 301 00, Plzeň: ZDARMA
                    Způsob platby
                    Dobírka (hodnota objednávky do 500,- Kč): 39,- Kč
                    Při placení na pobočce: 0,- Kč
                    Platba na účet: 0,- Kč
                    Ceny jsou uvedeny včetně DPH.

                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="primary" flat="flat" @click="dialog1 = false">Souhlasím</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
        <v-dialog v-model="dialog2" width="600px">
            <v-card>
                <v-card-title>
                    <span class="headline">Obchodní podmínky</span>
                </v-card-title>
                <v-card-text>
                    Obchodní podmínky společnosti

                    ALFA-TISK.CZ s.r.o., se sídlem Třemošná, PSČ 330 11

                    IČ: 05413273, C33233 vedená u Krajského soudu v Plzni

                    (dale též jen jako “Prodávající”)


                    1. Úvodní ustanovení

                    Právní vztahy účastníků při realizaci nákupu zboží/digitálního obsahu a/nebo provedení díla (dále též jen jako „zboží“ a/nebo „dílo“) třetí osobou (dále též jen jako “Kupující”) z nabídky Prodávajícího na webových stránkách http://eshop.alfa-tisk.cz/ (dále též jen jako “e – shop”) se řídí právem ČR, zejména zákonem č. 89/2012 Sb., občanský zákoník ve znění pozdějších předpisů (dále též jen jako „OZ“), těmito obchodními podmínkami (dále též jen jako „OP“) a, je-li Kupujícím spotřebitel, též zákonem č. 634/1992 Sb. o ochraně spotřebitele.

                    2. Obchodní podmínky

                    OP jsou vydány v souladu s ust. § 1751 odst. 1 OZ a vztahují se na všechny kupní smlouvy, smlouvy o dílo a smlouvy o poskytnutí služby, jejichž předmětem je nákup a prodej zboží a/nebo provedení díla či poskytnutí služby z nabídky Prodávajícího v rámci e – shopu, uzavřené mezi Prodávajícím a Kupujícím, přičemž jsou, resp. se stávají nedílnou součástí každé takové smlouvy, určují část jejího obsahu a jsou závazné pro úpravu právních vztahů Prodávajícího a Kupujícího ze smlouvy.

                    Případná odchylná ujednání smlouvy mají přednost před ustanoveními OP.

                    Provedením registrace a zřízením účtu ve smyslu bodu 3.1. těchto OP (dále též jen jako „Účet“) a dále vždy a/nebo podáním jednotlivé objednávky vyjadřuje registrovaný zřizovatel Účtu, resp. Kupující souhlas s těmito OP a deklaruje přijetí povinnosti se jimi řídit, jakož i vyjadřuje souhlas s použitím prostředků komunikace na dálku pro uzavření smlouvy.

                    Prodávající si vyhrazuje právo změnit OP. Taková změna je vůči Kupujícímu účinná okamžikem, kdy bude Prodávajícím Kupujícímu oznámena. Oznámení provede Prodávající uveřejněním nového znění OP v rámci příslušné sekce e – shopu. Taková změna OP se však nedotýká právních vztahů Prodávajícího a Kupujícího dříve vzniklých.

                    Prodávající sděluje, že náklady na prostředky komunikace na dálku se neliší od základní sazby Kupujícího (v příp. internetového i telefonického připojení dle podmínek operátora Kupujícího), přičemž Prodávající si neúčtuje žádné další poplatky nebo ceny nad jejich rámec.

                    3. Objednávka zboží/díla/služeb a smlouva

                    3.1. Objednávku je Kupující oprávněn uskutečnit jen elektronicky, s využitím svého individuálního uživatelského Účtu, zřízeného v rámci e – shopu, vždy však jen po seznámení se s těmito OP a jejich odsouhlasení.

                    Objednávka zadaná Kupujícím je pro Kupujícího závazná po dobu 10 – ti dnů. Před odesláním (zadáním) závazné objednávky má Kupující možnost zkontrolovat a měnit veškeré údaje, které do objednávky vložil, jakož i možnost objednávku jako celek zrušit. Objednávku Kupující odešle (závazně zadá) vůči Prodávajícímu příkazem “Dokončit objednávku” v rámci e – shopu.

                    3.2. Objednávka je návrhem Kupujícího na uzavření smlouvy kupní a/nebo o dílo a/nebo o zajištění služby. Smlouva je uzavřena, pokud Prodávající objednávku v době její závaznosti akceptuje. Akceptaci provede Prodávající elektronicky odesláním e – mailové zprávy obsahující výslovnou informaci o přijetí návrhu Kupujícího na uzavření smlouvy na e – mailovou adresu Kupujícího, definovanou v rámci Účtu. Kupující je oprávněn i závaznou objednávku jednostranně zrušit kdykoliv před přijetím objednávky ze strany Prodávajícího.

                    Takto uzavřenou smlouvu lze měnit nebo rušit jen po vzájemné dohodě obou stran, z důvodů a způsobem stanovených zákonem, nebo těmito OP.

                    3.3. Nepřijme-li Prodávající objednávku ve lhůtě její závaznosti, nebo před jejím zrušením Kupujícím, smlouva uzavřena není. Prodávající není povinen objednávku přijmout.

                    3.4. Na základě uzavřené smlouvy se Prodávající zejména zavazuje dodat Kupujícímu zboží/digitální obsah a/nebo provést dílo či poskytnout službu dle uzavřené smlouvy a umožnit Kupujícímu nabýt vlastnické právo/licenci ke zboží a/nebo k dílu a Kupující se zejména zavazuje zboží/digitální obsah a/nebo dílo a/nebo předmět služby převzít a zaplatit za to Prodávajícímu sjednanou cenu, poštovné a balné (expediční poplatky).

                    3.5. Smlouva se uzavírá pouze v českém jazyce.

                    4. Kupní cena zboží, cena díla a/nebo služby, poštovné a balné – výše a splatnost

                    Kupní cena zboží, cena díla a/nebo služby se určí podle ceníku Prodávajícího ve výši, v níž je u konkrétního zboží/díla/služby uvedena ke dni, kdy Kupující zadal objednávku. Cena je vždy stanovena včetně DPH.

                    Prodávající si vyhrazuje právo měnit ceník. Změna ceníku je účinná okamžikem uveřejnění na serveru http://eshop.alfa-tisk.cz/. Akční ceny platí výhradně po dobu akce a při splnění vyhlášených podmínek.

                    Cena zboží je vždy splatná bezhotovostním převodem před dodáním zboží/provedením díla či služby, nejpozději však do 5 – ti dnů po přijetí objednávky Kupujícího Prodávajícím.

                    Výše poštovného a balného (ceny placené Kupujícím za dopravu zboží) je stanovena ve smlouvě a je splatná spolu s cenou za stejných podmínek.

                    V případě prodlení Kupujícího se zaplacením sjednané ceny a/nebo poštovného a balného se příslušná smlouva ruší, a to od počátku.

                    5. Dodání zboží/provedení díla nebo služby

                    Není-li ve smlouvě uvedeno jinak, zavazuje se Prodávající vyexpedovat Kupujícímu zboží, provést dílo či poskytnout službu ve lhůtě do 10–ti pracovních dnů po zaplacení ceny. Ve výjimečných případech (např. údržba nebo oprava strojů v Provozovně) může dojít k prodloužení doby potřebné na vyexpedování.

                    Není-li dohodnuto jinak, je místem dodání zboží, provedeného díla či výsledku služby adresa Kupujícího uvedená v rámci jeho Účtu na území ČR nebo SR. Kupující je povinen řádně dodané zboží, dílo či výsledek služby převzít a jeho převzetí Prodávajícímu písemně potvrdit (zpravidla osobě, která provádí doručení) či elektronicky při odpovídajícím druhu dodávky.

                    Vlastnické právo ke zboží/dílu a nebezpečí škody na nich přechází na Kupujícího, který je spotřebitelem, okamžikem, kdy je mu zboží/dílo předáno, resp. kdy je Kupujícímu Prodávajícím umožněno s ním disponovat. Předáním zboží/díla či umožněním dispozice s ním je splněna povinnost Prodávajícího odevzdat zboží/provést dílo/poskytnout službu Kupujícímu, který je spotřebitelem. Je-li Kupující podnikatelem, splní Prodávající povinnost odevzdat mu zboží/provést dílo/poskytnout službu umožněním dispozice s ním, nebo jeho předáním prvnímu dopravci k přepravě pro Kupujícího, umožní-li mu uplatnit práva z přepravní smlouvy vůči přepravci; stejným okamžikem přechází na takového Kupujícího též vlastnické právo ke zboží/dílu/výsledku služby a nebezpečí škody na nich.

                    Dodání zboží/díla/výsledku služby zajišťuje Prodávající prostřednictvím dopravců. Zásilka obsahuje dodací list nebo fakturu a případně návod na používání v českém jazyce. Daňový doklad (faktura) je vždy ke stažení na webových stránkách http://eshop.alfa-tisk.cz/ po přihlíšení se Kupujícího ke svému účtu.

                    6. Množství a jakost, práva z vad, reklamační řád

                    Prodávající odpovídá Kupujícímu, že zboží/dílo/služba při převzetí nemá vady. Zejména Prodávající odpovídá Kupujícímu, že v době, kdy Kupující věc převzal,

                    má takové vlastnosti, které Prodávající nebo výrobce popsal, nebo které Kupující očekával s ohledem na její povahu a na základě reklamy jimi prováděné,

                    se hodí k účelu, kterému se věc tohoto druhu obvykle používá,

                    je v odpovídajícím množství, kvalitě, míře nebo hmotnosti a

                    vyhovuje požadavkům právních předpisů.

                    Projeví-li se vada v průběhu šesti měsíců od převzetí zboží/díla/výsledku služby, má se za to, že vada existovala již při převzetí; Kupující je oprávněn uplatnit právo z vady, která se u zboží/díla vyskytne, v době 24 měsíců od převzetí; to neplatí v případě dle § 2158 OZ.

                    Kupující je povinen bez zbytečného odkladu po převzetí zboží/díla/výsledku služby provést jeho prohlídku. Je-li dodáno s vadami, řídí se práva a povinnosti stran příslušnými obecně závaznými právními předpisy (zejména ustanoveními § 1914 až 1925, § 2099 až 2117 a § 2161 až 2174 o.z.).

                    Pokud zboží/dílo/výsledek služby při převzetí Kupujícím není ve shodě se smlouvou, má Kupující právo na to, aby jej Prodávající bezplatně a bez zbytečného odkladu uvedl do stavu odpovídajícího smlouvě, a to podle požadavku Kupujícího buď výměnou, nebo opravou; není-li takový postup možný, může Kupující požadovat přiměřenou slevu z ceny nebo od smlouvy odstoupit. To neplatí, pokud Kupující před převzetím o vadě věděl nebo ji sám způsobil.

                    Práva z vad (reklamaci) uplatňuje Kupující u Prodávajícího, a to písemně, nebo e – mailem na adresu http://eshop.alfa-tisk.cz/ . Reklamaci Prodávající vyřídí, nebude-li s Kupujícím dohodnuto jinak, bez zbytečného odkladu, nejpozději do 30 - ti kalendářních dnů ode dne uplatnění reklamace. Reklamované zboží/dílo/výsledek služby Kupující, po vyzvání Prodávajícím, odesílá na adresu provozovny Prodávajícího (Americká 17, 301 00, Plzeň), kde je též zajišťován záruční a pozáruční servis.

                    Po obdržení reklamovaného zboží/díla/výsledku služby Prodávající Kupujícímu obratem e - mailem zašle potvrzení o reklamaci - Reklamační protokol.

                    Uzná-li Prodávající reklamaci za oprávněnou, a není-li možná výměna za bezvadné plnění či odstranění vady, Prodávající uhrazenou cenu, včetně částky za poštovné a balné, poukáže na účet Kupujícího (kromě částky představující dodatečné náklady na dodání zboží vzniklé v důsledku kupujícím zvoleného způsobu dodání, který je jiný než nejlevnější způsob standardního dodání nabízený prodávajícím v souladu s § 1832 odst. 2 OZ).

                    Lhůta pro vyřízení reklamace neběží po dobu, dokud Kupující nepředal Prodávajícímu veškeré podklady potřebné pro vyřízení reklamace (části zboží, díla, dalších podkladů). Prodávající je povinen si vyžádat doplnění podkladů od Kupujícího v nejkratší možné době.

                    V případě požadavku na tisk více kopií od 1 originálu se předpokládá, že si Kupující objednal v předchozí zakázce 1 zkušební tisk. Pokud k tomuto nedojde, nelze se oprávněně domáhat reklamace na tisk více kopií od 1 originálu.

                    Snížená kvalita zboží/díla/výsledku služby, která vznikla v důsledku nízkého rozlišení předaných materiálů Kupujícím, nemůže být předmětem reklamace.

                    Právo na reklamaci zboží/díla/výsledku služby není možné uplatňovat u záležitostí vkusu a osobního cítění, jako je např. odstín fotografií a barevné podání. Stejně tak není možné uplatňovat právo na reklamaci v případě, že barvy na dodaných produktech stoprocentně nesouhlasí s předanými materiály Kupujícího.

                    V případě nespokojenosti se Kupující může se svým podnětem obrátit na subjekt mimosoudního řešení sporů. K mimosoudnímu řešení spotřebitelských sporů ze smlouvy kupní a/nebo o dílo a/nebo o zajištění služby je příslušná Česká obchodní inspekce, se sídlem Štěpánská 567/15, 120 00 Praha 2, IČ: 000 20 869, internetová adresa: http://www.coi.cz.

                    Lhůta pro podání návrhu na řešení sporu je 1 rok ode dne, kdy Kupující poprvé kontaktoval Prodávajícího za účelem řešení sporu.

                    7. Odstoupení od smlouvy Kupujícím

                    Kupující bere na vědomí, že uzavírá smlouvu o dodávce zboží nebo díla, které bylo upraveno podle přání kupujícího nebo pro jeho osobu. V souladu s § 1837 OZ tedy Kupujícímu nevzniká právo na odstoupení od smlouvy ve lhůtě 14 dnů bez uvedení důvodu.

                    Kupující, jako spotřebitel, nemůže podle § 1837 OZ odstoupit od smlouvy

                    o poskytování služeb, jestliže byly splněny s jeho předchozím výslovným souhlasem před uplynutím lhůty pro odstoupení od smlouvy a podnikatel před uzavřením smlouvy sdělil spotřebiteli, že v takovém případě nemá právo na odstoupení od smlouvy,

                    o dodávce zboží nebo služby, jejichž cena závisí na výchylkách finančního trhu nezávisle na vůli podnikatele a k němuž může dojít během lhůty pro odstoupení od smlouvy,

                    o dodání alkoholických nápojů, jež mohou být dodány až po uplynutí třiceti dnů a jejichž cena závisí na výchylkách finančního trhu nezávislých na vůli podnikatele,

                    o dodávce zboží nebo díla, které bylo upraveno podle přání spotřebitele nebo pro jeho osobu,

                    o dodávce zboží, které podléhá rychlé zkáze, jakož i zboží, které bylo po dodání nenávratně smíseno s jiným zbožím,

                    o opravě nebo údržbě provedené v místě určeném spotřebitelem na jeho žádost; to však neplatí v případě následného provedení jiných než vyžádaných oprav či dodání jiných než vyžádaných náhradních dílů,

                    o dodávce zboží v uzavřeném obalu, které spotřebitel z obalu vyňal a z hygienických důvodů jej není možné vrátit,

                    o dodávce zvukové nebo obrazové nahrávky nebo počítačového programu, pokud porušil jejich původní obal,

                    o dodávce novin, periodik nebo časopisů,

                    o ubytování, dopravě, stravování nebo využití volného času, pokud podnikatel tato plnění poskytuje v určeném termínu,

                    uzavírané na základě veřejné dražby podle zákona upravujícího veřejné dražby, nebo

                    o dodání digitálního obsahu, pokud nebyl dodán na hmotném nosiči a byl dodán s předchozím výslovným souhlasem spotřebitele před uplynutím lhůty pro odstoupení od smlouvy a podnikatel před uzavřením smlouvy sdělil spotřebiteli, že v takovém případě nemá právo na odstoupení od smlouvy.

                    8. Záruka

                    Prodávající poskytuje Kupujícímu záruku za jakost zboží/díla pořízeného prostřednictvím e – shopu v délce trvání 24 měsíců. Záruční doba počíná běžet převzetím zboží/provedením díla Kupujícím. Pro uplatnění práv ze záruky platí příslušná ustanovení OZ.

                    9. Ochrana osobních údajů a zasílání obchodních sdělení

                    Jakékoliv údaje o Kupujícím, včetně osobních, jakož i o všech osobách, které jednají ve vztahu k Prodávajícímu jménem Kupujícího, jsou uchovávány v souladu s platnými zákony České republiky, zejména se zákonem o ochraně osobních údajů č. 101/2000 Sb. ve znění pozdějších dodatků a předpisů.

                    Osobní údaje Prodávající uchovává a shromažďuje pouze za účelem uzavření smlouvy, splnění smlouvy, provedení reklamace a úkonů souvisejících, jakož i pro archivní účely Prodávajícího o provedených nákupech, pro účely poskytování případných slev, zasílaní obchodních sdělení a jiných výhod pro zákazníky.

                    Kupující má právo přístupu ke svým osobním údajům, právo na jejich kontrolu a opravu včetně dalších zákonných práv ve vztahu k těmto údajům. Změny osobních údajů lze provést prostřednictvím Účtu.

                    Osobní údaje Kupujícího jsou plně zabezpečeny proti zneužití. Prodávající osobní údaje Kupujícího nepředává žádné další osobě, v minimálním rozsahu nezbytně nutném pro doručení je poskytne přepravci.

                    Jednotlivé smlouvy jsou po svém uzavření Prodávajícím archivovány po dobu nejméně 5 – ti let, nejdéle však po dobu stanovenou právním přepisem, a to pouze v elektronické formě a jsou přístupné pouze Prodávajícímu a Kupujícímu v rámci jeho Účtu. Informace o jednotlivých technických krocích vedoucích k uzavření smlouvy jsou zřejmé z těchto OP, kde jsou srozumitelně popsány.

                    Kupující bere na vědomí svá oprávnění dle z.č. 101/2000 Sb., tj. zejména, že poskytnutí údajů je dobrovolné, že svůj souhlas může bezplatně kdykoliv na adrese Prodávajícího písemně odvolat, že má právo přístupu ke svým osobním údajům a právo na opravu těchto údajů, blokování nesprávných údajů, jejich likvidaci, jakož i další práva vymezená uvedeným právním předpisem.

                    Zřízením Účtu nebo zadáním závazné objednávky při jednorázovém nákupu vyslovuje Kupující též souhlas:

                    se shora uvedeným zpracováním a shromažďováním svých osobních údajů v databázi Prodávajícího a

                    se zasíláním informací souvisejících se zbožím, díly, službami nebo podnikem Prodávajícího na elektronickou adresu Kupujícího a se zasíláním obchodních sdělení Prodávajícího na elektronickou adresu Kupujícího

                    s ukládáním tzv. cookies na jeho počítač, které podporují správnou funkci stránek. Zároveň tím dává souhlas k propojení jeho osobních údajů, které v souladu s obchodními podmínkami za účelem naplnění předmětu smlouvy kupní a/nebo o dílo a/nebo o zajištění služby Prodávajícímu poskytl, s informacemi obsaženými v souborech cookies, které se ukládají nebo již jsou uloženy na jeho koncovém zařízení. Kupující prohlašuje, že tento souhlas dává dobrovolně. Tento souhlas Kupující poskytuje až do doby jeho odvolání.

                    10. Autorská práva

                    Kupující prohlašuje, že je majitelem autorských práv veškerého materiálu, který předává Prodávajícímu ke zpracování. Kupující tedy plně zodpovídá za případná porušení autorských či jiných práv a za případnou způsobenou škodu.

                    11. Další ustanovení

                    Je-li předmětem plnění provedení tiskového díla či poskytnutí tiskových služeb, dle specifikací uvedených na serveru http://eshop.alfa-tisk.cz/, jsou tyto prováděny dle aktuálních Technických podmínek Prodávajícího. Technické podmínky jsou vždy uvedeny na serveru http://www.alfa-tisk.cz/jedinecny_tisk_plzen

                    Kupující nesmí v rámci e - shopu umisťovat či užívat materiály, které jsou v rozporu s platným právním řádem ČR, jsou v rozporu s morálními principy a základy etiky, nebo jiným způsobem omezují soukromí jiných osob. Takové materiály je Prodávající oprávněn bez náhrady odstranit.

                    12. Používání souborů cookies

                    Soubory cookies jsou malé textové soubory, které se ukládají do koncového zařízení či paměti koncových zařízení uživatelů webových stránek http://eshop.alfa-tisk.cz/ a jejich zákazníků (tito dále jen „Kupující“). Tyto soubory nutně neobsahují osobní údaje jednotlivých Kupujících či uživatelů webových stránek Prodávajícího, ale v případě, kdy Kupující takové údaje společnosti ALFA-TISK.CZ s.r.o. v souvislosti s uzavřením závazkového právního vztahu, zejména pak smlouvy kupní a/nebo o dílo a/nebo o zajištění služby, poskytne, mohou být takové osobní údaje přiřazeny k informacím uloženým v příslušných souborech cookies.

                    Společnost ALFA-TISK.CZ s.r.o využívá technologii souborů cookies výhradně za účelem zlepšení a zjednodušení pohybu uživatelů na jejich webových stránkách, optimalizaci těchto stránek pro jejich uživatele, dále za účelem zajištění lepších služeb pro Kupujícího a dále pro marketingové účely, vše za účelem zlepšení péče o své současné i budoucí zákazníky (Kupující) a uživatele webových stránek Prodávajícího odpovídající jejich individuálním potřebám.

                    Kupující i uživatelé mohou souhlas s používáním cookies odmítnout prostřednictvím individuálního nastavení ukládání souborů cookies na svém koncovém zařízení (povolení jen pro určité weby), dále prostřednictvím spuštění funkce tzv. anonymního prohlížení v prohlížeči, které jejich koncové zařízení využívá, popř. manuálním smazáním všech či jednotlivých souborů cookies, které jsou v jejich koncovém zařízení již uloženy.

                    Společnost ALFA-TISK.CZ s.r.o. si vyhrazuje právo zpřístupnit určitý obsah svých webových stránek jen těm Kupujícím či uživatelům, kteří poskytli souhlas s ukládáním souborů cookies do jejich koncového zařízení.

                    13. Závěrečná ustanovení

                    Právní vztahy mezi Kupujícím a Prodávajícím při nákupu v e – shopu se řídí Českým právem a těmito OP. Pokud jakékoli ustanovení těchto OP je nebo se stane neplatným či nevymahatelným, nebude toto mít vliv na platnost a vymahatelnost ostatních ustanovení těchto OP. Tyto OP Kupujícímu umožňují jejich archivaci a reprodukci.

                    Tyto OP nabývají účinnosti dne 3. října 2016

                    ALFA-TISK.CZ s.r.o.

                    C 33233 vedená u Krajského soudu v Plzni</v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="primary" flat="flat" @click="dialog2 = false">Souhlasím</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>

</template>
<style>
    footer.custom-footer {
        z-index: 1;
    }
    .footer-center {
        text-align: center;
    }
    .footer-link {
        cursor: pointer;
        float: right;
        color: purple;
        display:inline-block;
        line-height: inherit;
    }

</style>
<script>
    export default {
        data() {
            return {
                mastecardUrl: 'http://eshop.alfa-tisk.cz/Client/Themes/t28-alfatisk-2/Images/Footer/320px-MasterCard_logo.png',
                mastecardSecureUrl: 'http://eshop.alfa-tisk.cz/Theme/Images/Payments/banners/mastercard-secure-code.png',
                visaUrl: 'http://eshop.alfa-tisk.cz/Theme/Images/Payments/banners/visa.png',
                visaVerifiedUrl: 'http://eshop.alfa-tisk.cz/Theme/Images/Payments/banners/verified-by-visa.png',
                gopayUrl: 'http://eshop.alfa-tisk.cz/Theme/Images/Payments/banners/gopay-white.png',
                dialog1: false,
                dialog2: false,
            }
        }
    }
</script>