# Szerveroldali webprogramozás 2022/23/1 - Laravel beadandó 2022.11.13.

## Feladat

A feladatod egy **számítógépes múzeum** kínálatát kezelő webes alkalmazás elkészítése, ahol az admin kezeli a kiállított tárgyakat, a bejelentkezett felhasználók pedig értékelhetik az említett tárgyakat.

Szeretnénk, ha a feladatot alapvetően kellő **alkotói szabadsággal** fognátok meg, nem pedig kőbe vésett dologként. Lényegében minden (tiszta módon keletkezett) megoldás elfogadható, amíg a leírt követelményeket teljesíti; tehát abban, ami nincs a továbbiakban specifikálva, **szabadon** mozoghattok. Érdemes jól tanulmányozni az elvárásokat, ugyanis **csak az ér pontot, amit expliciten leírtunk** a pontozásban; a kurzus teljesítése szempontjából tehát felesleges egy túlgondolt/bonyolultabb feladatot megoldani, persze mindig örülünk, ha extra szorgalmasak vagytok. :)

A feladathoz kötött **kiinduló csomag nincs**, javasolt azonban a **Laravel Breeze** (esetleg: Laravel UI) használata, amely a frontend beüzemelésen felül még a hitelesítés alapját is biztosítja.

### Adatmodellek

-   `Item` - egy kiállított tárgy alapvető adatai
    -   `id`
    -   `name` (string)
    -   `description` (szöveg)
    -   `obtained` (dátum)
    -   `image` (string, lehet null)
    -   `időbélyegek`
-   `Comment` - a kiállított tárgyakhoz hozzá lehet szólni
    -   `id`
    -   `text` (szöveg)
    -   `időbélyegek`
-   `Label` - a kiállított tárgyak felcímkézhetők tulajdonságokkal
    -   `id`
    -   `name` (string)
    -   `display` (logikai)
    -   `color` (string, hexadecimális színkód)
    -   `időbélyegek`
-   `User` - ez már készen érkezik, csak egy mezővel kell kiegészíteni
    -   `is_admin` (logikai, alapértelmezetten hamis)

### Kapcsolatok

-   `Item` 1 - N `Comment`
-   `User` 1 - N `Comment`
-   `Item` N - N `Label`

## Értékelés

### Minimumkövetelmények (0 pont)

Külön pontszám nélküli **minimumkövetelményként** teljesítendők az alábbi programozási feladatok:

-   Az alkalmazást **Laravel 9** keretrendszerben, **SQLite** adatbázis használatával kell megvalósítani!
-   A csomagkezelők által karbantartott mappákat (`vendor` és `node_modules`) feltölteni **TILOS**! Ugyanakkor alapelvárás, hogy a beadott _.zip_-ből az alkalmazás a következő inicializációs fájlokkal (és nem többel) **beüzemelhető** legyen:
    -   [init.bat](https://gist.githubusercontent.com/totadavid95/10c2b013a5c8a0a98d16cb21c45d217a/raw/b94112422523b68a159a0b96912f86fe46868ac3/init.bat) (Windows-on)
    -   [init.sh](https://gist.githubusercontent.com/totadavid95/10c2b013a5c8a0a98d16cb21c45d217a/raw/b94112422523b68a159a0b96912f86fe46868ac3/init.sh) (Linux-on / Mac-en)
-   Fontos az **igényesen kidolgozott felhasználói felület** (frontend). Ez nem azt jelenti, hogy mindent csicsázni kell, de pl. legyen egy közös elrendezése az oldalaknak, ahonnan minden funkcionalitás elérhető a felhasználók számára (nem kell útvonalakat kutatni a kódban és/vagy lekéréseket kézzel építgetni), az űrlapmezők legyenek egyértelműen felcímkézve, hiba esetén kapjanak megfelelő tájékoztatást a **pontos** hibáról. A frontend technológia is szabadon választható: javasolt a Tailwind CSS vagy Bootstrap.
-   Az **időzóna** legyen magyar időre állítva az alkalmazás konfigurációjában!
-   A felküldött adatokat **minden esetben** validálni kell **szerveroldalon**! HTML szintű validáció (pl. `required` attribútum) **ne is legyen** a kódban, mert ez abszolút nem véd az alkalmazásunkat kijátszani szándékozók ellen!

## Hasznos hivatkozások

Az alábbiakban adunk néhány hasznos hivatkozást, amiket érdemes szemügyre venni a beadandó elkészítésekor.

-   [Órai anyagok 2022/23/1](https://github.com/szerveroldali/2022-23-1)
-   [Laravel nyelvi csomag - magyarosításhoz](https://github.com/Laravel-Lang/lang) (opcionális)
-   Tantárgyi Laravel jegyzetek:
    -   [Laravel projektszerkezet](https://github.com/szerveroldali/leirasok/blob/main/LaravelProjektszerkezet.md)
    -   [Kimenet generálása](http://webprogramozas.inf.elte.hu/#!/subjects/webprog-server/handouts/laravel-01-kimenet)
    -   [Bemeneti adatok, űrlapfeldolgozás](http://webprogramozas.inf.elte.hu/#!/subjects/webprog-server/handouts/laravel-02-bemenet)
    -   [Adattárolás, egyszerű modellek](http://webprogramozas.inf.elte.hu/#!/subjects/webprog-server/handouts/laravel-03-adatt%C3%A1rol%C3%A1s)
    -   [Relációk a modellek között](http://webprogramozas.inf.elte.hu/#!/subjects/webprog-server/handouts/laravel-04-rel%C3%A1ci%C3%B3k)
    -   [Hitelesítés és jogosultságkezelés](http://webprogramozas.inf.elte.hu/#!/subjects/webprog-server/handouts/laravel-05-hiteles%C3%ADt%C3%A9s)
-   Hivatalos dokumentációk:
    -   [Laravel dokumentáció](https://laravel.com/docs)
        -   [Blade direktívák](https://laravel.com/docs/9.x/blade)
        -   [Resource Controllers](https://laravel.com/docs/9.x/controllers#resource-controllers)
        -   [Validációs szabályok](https://laravel.com/docs/9.x/validation#available-validation-rules)
        -   [Migrációknál elérhető mezőtípusok](https://laravel.com/docs/9.x/migrations#available-column-types)
    -   [Laravel API dokumentáció](https://laravel.com/api/master/index.html)
    -   [PHP dokumentáció](https://www.php.net/manual/en/)
    -   [Bootstrap 5 dokumentáció](https://getbootstrap.com/docs/)
-   Programok, fejlesztői eszközök:
    -   [PHP és Composer telepítő](https://github.com/totadavid95/PhpComposerInstaller) (php + composer)
    -   [Node.js](https://nodejs.org/en/download/) (node + npm)
    -   [Visual Studio Code](https://code.visualstudio.com/)
        -   [Live Share](https://marketplace.visualstudio.com/items?itemName=MS-vsliveshare.vsliveshare)
        -   [Laravel Extension Pack](https://marketplace.visualstudio.com/items?itemName=onecentlin.laravel-extension-pack)
        -   [SQLite Viewer](https://marketplace.visualstudio.com/items?itemName=qwtel.sqlite-viewer)
    -   [DB Browser for SQLite](https://sqlitebrowser.org/)
-   További CSS framework tippek (opcionális):
    -   [Tailwind CSS](https://tailwindcss.com/)
    -   [Material Bootstrap](https://mdbootstrap.com/)
    -   [Material UI, React-hez](https://material-ui.com/)
    -   [Fontawesome ikonkészlet](https://fontawesome.com/)
    -   [Bulma](https://bulma.io/)
