# Vorlesung 1
- section : ist logischer container mit einer headline
- article : self contained content
- div: presentation purposes

- ==Physische Tags== formatiert fest kodiert also im html code

>Physical text are used to tell the browser how to display the text enclosed in the physical tag. 
Some example of the physical tags are: `<b>`, `<big>`, `<i>`. Definiert das visuelle Erscheinungsbild. Physische Formatierung schränkt die Darstellungsmöglichkeiten der
Webclients unnötig.

- ==Logische Tags== also in css erstellt _best practice!!!_

>Logical tags are used to tell the meaning of the enclosed text. The example of the logical tag is `<strong> </strong>` tag. When we enclosed text in strong tag then it tell the browser that enclosed text is more important than other text. 

- id : singular/unique --> besetimmte elemente 
- data attribut: erlaubt uns content von daten zu trennen 
- Daten werden nur dann übertragen, wenn die Felder ein name-Attribut haben!

# Vorlesung 4
### Was ist php?
PHP ist eine Skriptsprache die verwendet wird um Inhalte einer anderen Sprache zu erzeugen. 
PHP datei --> PHP interpreter --> Output: HTTP Respone or Buffe(Mime Type) 

- HTML mit eingebettetem PHP
>- ist übersichtlicher, wenn es vorwiegend um die HTML-Ausgabe geht
>- erlaubt die Erzeugung der HTML-Seite mit entsprechenden Tools.
>- Die variablen Teile werden später als PHP-Abschnitte eingebaut.

- PHP mit eingebettetem HTML 
>- geht auch objektorientiert
>- ist übersichtlicher, wenn es vorwiegend um Berechnungen geht
>- also eher angebracht beim Auswerten von Daten, Datenbankoperationen, Algorithmen etc.

# Vorlersung 5
### Wie funktioniert PHP(Grundprinzip) ?
- dynamische seitenerzeugung(--HTML/JSON)
- php interpreter: PHP Code --> HTML code
- contnent type (MIME Type) festlegen CONTENTTYPE KORREKT SETZEN

### Wie tauschen php seiten daten aus?
- via Formulare 
- GET + POST --> Super Global $_GET[...]
- isset verwenden

### An welchen Stellen sichert man seine Seite ab?
- lesen aus DB : XSS(=Cross-Site Scricpting) bevor dem ausdrucken--> htmlspecialchars..
- schreiben: SQL Injection --> real_escape_string || prepared statements

# Vorlesung 6
### JavaScript
get data from the data attribute with 
```javascript
document.querySelector(['data-myData']).dataset.mydata
```
```javascript
var p = {
    "antwort1": "value1",
    "antwort2": "value2",
    "antwort3": "value3"};

for (var key in p) {
    if (p.hasOwnProperty(key) && key.includes("antwort")) { //muss nicht hasOwnProperty nutzen extra check
        console.log(key + " -> " + p[key]);
    }
}
```
for of vs for in 
for of get you the value where as for in gets you the index 

Node manipulation
```javascript
//how to move shit up with JS
        let opts = document.querySelectorAll('option');
        let upbtn = document.querySelector('#up');
        upbtn.addEventListener('click', function () {
            let counter = 0;
            let bool;
            let preSib;

            for (obj of opts) {
                if (!obj.selected) {
                    counter++;
                } else {
                    bool = obj;
                }
            }
            if (counter == opts.length) {
                alert('no selected item'); // check if item is selected
            } else {
                preSib = bool.previousElementSibling;  // to move that down just call nextElementSibling
            }
            if (preSib.nodeName == 'OPTION' && preSib) {
                let temp = preSib.innerText;
                preSib.selected = true;
                bool.selected = false;
                preSib.innerText = bool.innerText;
                bool.innerText = temp;
            }
        });
        'pineapple'.slice(0,4); //get pine if we were to write 4 itll get apple
```
```javascript
function Person(first, last, age, eye) { //create constructor
  this.firstName = first;
  this.lastName = last;
  this.age = age;
  this.eyeColor = eye;
}
var myFather = new Person("John", "Doe", 50, "blue");
var obj = { //create obj with literal
    sProp: 'some string value',
    numProp: 2,
    bProp: false
};
```
#### Primitve Types vs Reference Types
der wert von primitiv types steht in der variable bei reference types wird nur auf dem speicher gezeigt

literal notation: reference value 
constructor function: reference type

`in` operator überprüft ob property im obj enthalten ist.
`instance of` ob ein obj zu einem refernce type gehört.

prototypes definiert eine reihe von funktionen die von objekten geerbt werden. wie eine abstrakte klasse im Objekt Orientiertem Programmieren.

`innerHTML` is bad because it re-parses an already parsed **DOM**

 nextSibling vs nextElementSibling

- >nextSibling' returns the next Node object whereas 'nextElementSibling' returns the next Element object, so probably the real question is what is the difference between a Node & an Element?
Basically an Element is specified by an HTML Tag whereas a Node is any Object in the DOM, so an Element is a Node but a Node can also include Text Nodes in the form of whitespace, comments, text characters or line breaks.

*Achtung: Leerzeichen zwischen Tags werden in leere Textknoten abgebildet!*

**IRI:** allgemeinste Form eines Identifiers; erlaubt die Verwendung vieler über den ASCII-Zeichensatz hinausgehender Unicode-Zeichen; nicht direkt dereferenzierbar ––> sollte HTTP Statuscode 303 unter Verwendung von Content Negotiation zurück liefern; wird idR zur Identifizierung von Non-Information Resources verwendet.

**URI:** analog IRI mit eingeschränktem Zeichensatz

**URL:** Dereferenzierbar ––> liefert HTTP Statuscode 200; Identifier für Information Resources, d.h., für Serialisierungen von Non-Information Resources.

**URN:** häufig verwendet in Verbindung mit UUIDs (URN:UUID...); lokale Identifikation von Ressourcen (bspw. in einer App oder einer Datenbank); idR nicht dereferenzierbar; häufigste Anwendung zur Kennzeichnung von Blank_Nodes in semantischen Wissensgraphe

In HTTP, content negotiation is the mechanism that is used for serving different representations of a resource at the same URI, so that the user agent can specify which is best suited for the user (for example, which language of a document, which image format, or which content encoding).

#### Sortieren is JS
```javascript 
function doAscending(){ array.sort(function(a, b){return a - b})}

`function doDescending(){ array.sort(function(a, b){return b - a})}
```
When receiving a JSONArray from php always parse the array because it'll be a string then parse the objects in a `for of` loop.

#### Allgemeine Theoriefragen
Frage: Was versteht man unter dem Konzept der »Dereferenzierung«?

Antwort: 
>ist genau das selbe Konzept wie bei Zeigern.
Wenn Du auf etwas referenzierst, beziehst Du Dich darauf bzw, verweist darauf.
Eine URL z.B. ist eine Referenz auf den Inhalt dahinter. 
Rufst Du nun die URL in einem Browser auf und lässt Dir den dahinter stehenden Inhalt anzeigen, dereferenzierst Du den Inhalt (URI/IRI). 

#### PHP JSON
`json_encode()` serialize PHP object to JSON can be used for arrays siehe **KundenStatus.php**
`json_decode()` deserialize JSON

JSON Exception handling in PHP
```php
$val = json_encode($myArr);
if($val === false || is_null($val)){
    throw new Exception('Could not encode JSON');
}
```
Starting sessions & setting cookies in PHP
```php
#at the start of the php script write
session_start();
$_SESSION["key"]="bla";
#delete all the data from the session array
session_unset(); 
#destroy the session
session_destroy();
#same for cookies
setcookies("key","value");
#kill the cookie
setcookies("key","value",0);
```
#### Forms
- GET : formulardaten werden an URL gehangen (bookmarkable)
- GET : ist idempotent doesnt change content
- POST : formulardaten werden werden in der HTTP payload geliefert
- POST : ist gut für DB writes senesitive data/ file uploads

#### AJAX Basics
The `readyState` property holds the status of the XMLHttpRequest.

The `onreadystatechange` event is triggered every time the `readyState` changes.

During a server request, the `readyState` changes from 0 to 4:

>0: request not initialized
1: server connection established
2: request received
3: processing request
>4: request finished and response is ready

```javascript
// states
const unsigned short UNSENT = 0;
const unsigned short OPEN = 1;
const unsigned short SENT = 2;
const unsigned short LOADING = 3;
const unsigned short DONE = 4;
```

In the `onreadystatechange` property, specify a function to be executed when the `readyState` changes.

`XMLHttpRequest` ermöglicht genau diese Funktion
- Festlegung einer Funktion zur Verarbeitung von (zurückkommenden) Daten ("Callback-Handler")
- Festlegen der Abfrage (URL etc.)
- Absenden der Abfrage mit asynchroner Antwort
```javascript
let request = new XMLHttpRequest(); // RequestObject anlegen
request.open("GET", "zeit.php"+"?name=watch&values=watch"); // definiert URL für Datenabfrage
request.onreadystatechange = processData; // Callback-Handler zuordnen
request.send();  // Request abschicken
```
>- Ein XMLHttpRequest wird nur einmal ausgeführt 
>- Damit Daten regelmäßig und zeitnah aktualisiert werden, muss der Request zyklisch abgeschickt werden
>- Die Methode requestData wird z.B. sekündlich aufgerufen mit:
>window.setInterval (requestData, 1000);
>- Das Aktivieren der zyklischen Abfrage kann z.B. in einer init()-Funktion erfolgen, die über onload() aufgerufen wird

1. zuerst die gewünschten Daten beschaffen
2. die Daten in eine leicht auswertbare Datenstruktur "verpacken" (z.B. in ein assoziatives Array $Array_mit_Daten)
3. die Daten in einen JSON-String umwandeln
```php 
$JSON_Data = json_encode($Array_mit_Daten);
```
4. den JSON-String in die Ausgabe schreiben
```php
echo $JSON_Data;
```
- Vor dem Beginn der Ausgabe muss angekündigt werden, dass JSON-Daten
übertragen werden mit 
```php
header("Content-Type: application/json; charset=UTF-8");
```
| Vorteile  |Nachteile   |
|---|---|
|  kein Plug-In erforderlich | aufwändig zu entwickeln  |
|  Ladezeit für Frameworks vs. schnelleres Nachladen |   aufwändig zu testen|
|   |  leidet unter Browser Bugs |
|   |  Pull vom Client statt Push vom Server |
|   | kein Zurück-Button bzw undo  |

standardkonforme und browserübergreifende Implementierung ist fehlerträchtig und unbequem

Ein gutes Design will aber trotzdem gelernt sein...
- allein durch Effekte werden weder Inhalt noch Layout besser

Ein Browserfenster muss viele Events verarbeiten

Es gibt einen GUI Thread pro Browser-Tab
 --> Die Laufzeit von Handlern muss "kurz" sein, sonst friert die GUI ein

Für aufwändige Berechnungen gibt es separate Threads: "Web worker"

#### CSS Specifity
`(id, class, tag) == (0-X00, 0-X0, 0-X)`
Pseudo Klassen = 10

#### PHP 
Beim abfragen von user daten und dem schreiben in einer Datenbank immer 
```php
real_escape_strings()
```
aufrufen.
Bei dem ausgeben von daten also nachdem fetchen von daten
```php
htmlspecialchars() anwenden.
```
Format dates 
```php
$sql = "SELECT date FROM table WHERE id = " . $id;
$row = db->select_single($sql); // just an example
$date = $row['date'];
echo date("d.m.Y H:i:s", strtotime($date));
```
#### Flexbox VS. Grid
**Flexbox** is best for arranging elements in either a single row, or a single column.
```CSS
.flex-container{
    display: flex /*create a flex container*/
    flex-direction: row; /*make the flexboxes be in a row*/
    flex-direction: column; /*make the flexboxes be in a column*/
}
.flex-item{
    flex: 1; /*set flex item size*/
}
```
when we use flex-direction row we align our items along the main axis.
when we use flex-direction row we align our items along the cross axis.

`display` Specifies the type of box used for an HTML element 
`flex-direction` Specifies the direction of the flexible items inside a flex container 
`justify-content` Horizontally aligns the flex items when the items do not use all available space on the main-axis 
`align-items` Vertically aligns the flex items when the items do not use all available space on the cross-axis 
`flex-wrap` Specifies whether the flex items should wrap or not, if there is not enough room for them on one flex line 
`align-content`	Modifies the behavior of the flex-wrap property. It is similar to `align-items`, but instead of aligning flex items, it aligns flex lines 
`flex-flow`	A shorthand property for `flex-direction` and `flex-wrap`
`order`	Specifies the order of a flexible item relative to the rest of the flex items inside the same container 
`align-self` Used on flex items. Overrides the container's `align-items` property 
`flex`	A shorthand property for the `flex-grow`, `flex-shrink` and the `flex-basis` properties
`perfect centering` Set both the `justify-content` and `align-items` properties to `center`, and the flex item will be perfectly centered

**Grid** is best for arranging elements in multiple rows and columns.

#### CSS
- Layout ausschließlich über CSS definieren
- Verwendung relativer Maßeinheiten damit die Einstellungen von Browser
When using viewport height or width use `vw` `vh` units.

Wieso sind Tabellen verpönnt?
verhindert automatische Layout-Anpassungen
Auf einem schmalen Bildschirm muss man in 2 Richtungen scrollen(schlecht lesbar)
was zu einer schlechten UX führt

Responsive design: Das Design sollte zuerst für mobile Endgeräte entwickelt werden und erst anschließend für Desktops: "Mobile First".

Ein Responsives Design passt die Ausgabe an den Nutzer an! und nicht umgekehrt!

*If the browser window is 600px or smaller, the background color will be lightblue:*
```css
@media only screen and (max-width: 600px) {
  body {
    background-color: lightblue;}
}
```
#### Sicherheit 
Angriffstypen:
- Ausführen von Befehlen(durch code Injektion)
- Auslesen von Daten
- Transaktionen unter fremden Namen(z.B. Session hijacking)
- Lahmlegen eines Internetauftritts(z.B. DDos)

GET : parameter können durch URL verändert werden.
POST : mit bisschen HTML kenntnissen kann man die Parameter formulieren.
escapeshellarg() um alle systemaufruf befehle lahm zu legen bevor diese eine Schaden machen.

Dateizugriff 
Nur Zahlen und Buchstaben als Dateinamen anhemen, sodass keine shell-Steuerzeichen zugelassen werden.

fest im Skript codierte Dateinamen sind unproblematisch
- zumindest den Pfad fest kodieren

HTTPS anstatt HTTP verwenden um username und passwds nicht als klartext zu haben, da HTTP unverschlüsselt ist.

die gültigen Zeichenfolgen spezifizieren(mit php kein `ereg` nutzen deprecated und nicht binary safe).

clientseitig (JavaScript) nur als Benutzerkomfort.

PHP Sicherstellen durch 

- jede Variable initialisieren, sodass Angreifer nicht uninitialisierte var raten kann
- Warnung aktivieren: error_reporting(E_ALL);
- Entwickler sollte über `$_GET` oder `$_POST` auf Formularparameter zugreifen.

Ein Webserver sollte nur "geprüfte" Skripte ausführen!
Die Ausführung von Skripten muss vom Administrator in der
Serverkonfiguration für ein Verzeichnis explizit "erlaubt" werden.
Skripte in User-Verzeichnissen werden normalerweise nicht ausgeführt.

SQL-Injection
- Formularparameter werden oft in SQL-Anweisungen integriert
- Angriff: Hacker sendet einen String, der die korrekte SQL-Anweisung verändert oder eine weitere anfügt

Lösung => php `mysqli::real_escape_string()` oder Entwickler kann "Prepared Statements" nutzen (dann aber kein real_escape_string).

XSS
- Angriff: Hacker stellt JS Skript zur Verfügung der dann clientseitig ausgeführt wird und vielleicht sensible Daten weiterleitet.
- Abwehr: Unbedingt alle Ausgaben so kodieren, dass HTML-Code als
normaler Text erscheint – und keinesfalls interpretiert wird
    - `htmlspecialchars()` aufrufen

##### Session-Hijacking
Jeder Seitenabruf innerhalb einer Session muss einem bestimmten Benutzer zugeordnet werden
Angriff: Hacker könnte Benutzeridentifikation fälschen, falls im Klartext transferiert.
Lösung : Login identifiziert den Benutzer erstmalig; auf Folgeseiten erfolgt dies über SessionID und Session-Variable
- Benutzerdaten werden bei Bedarf über Session-Variable weitergegeben.

Basis: Ausspähen der SessionID
- Benutzer ist eingeloggt, SessionID wird mit jeder Seite und Seitenanforderung übertragen
- Hacker ersetzt eigene SessionID durch fremde bzw. des Opfers
 
Abwehr : 
- HTTPS nutzen 
- Entwickler sollte lange und kryptische SessionID generieren

#### Some HTML shit I forget
```html
<form action="/action_page.php">
  <label for="male">Male</label>
  <input type="radio" name="gender" id="male" value="male"><br>
  <label for="female">Female</label>
  <input type="radio" name="gender" id="female" value="female"><br>
</form>
<select size="3">
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="audi" selected>Audi</option>
</select>
```

#### AJAX GET & POST Request
|  method | defintion  |
|---|---|
| open(method, url, async)  | method: the type of request: GET or POST url: the server (file) location async: true (async) or false (sync)  |
|  send() | Sends the request to the server (used for GET)   |
| send(string)  | Sends the request to the server (used for POST)   |

to send information with the GET method, add the information to the URL:

```javascript 
xhttp.open("GET", "demo_get2.php?fname=Henry&lname=Ford", true);
xhttp.send();
```
Watch out not every case requires a response for instance SoSe 2019 where we only write our changes to the session variables so they can be later called of the user accidently realoads the page.
