## Testfall

## Testfall 1.1, Navigera till sidan
Navigera till sidan, sidan visas.

### Input:
* Navigera till sidan.
* (Minst en lagrad bild i databasen sen innan.)

### Output:
* En header med texten "Bildflöde" visas.
* Ett uppladdningsformulär med inputs för en fil, en beskrivning samt en submit knapp visas.
* Ett bild flöde med minst en bild visas.

## Testfall 1.2, Ladda upp en bild
Kontrollera så en bild kan laddas upp.

### Input:
* Välj en bild att ladda upp.
* Klicka på "Upload".
### Output:
* Sidan laddas om.
* Den uppladdade bilden visas högst upp i flödet.

## Testfall 1.3, Ladda upp bild med beskrivning
Kontrollera så att det går att ladda upp en bild med en tillhörande beskrivning.
### Input:
* Välj en bild att ladda upp.
* Fyll i en kort beskrivning i rutan "Description".
* Klicka på "Upload".
### Output:
* Sidan laddas om.
* Den uppladdade bilden visas högst upp i flödet.
* Under bilden visas beskrivningen.

## Testfall 1.4 Ladda upp bild utan att välja fil
Kontrollera så att ett felmeddelande presenteras om användaren inte väljer en fil att ladda upp.

### Input:
* Lämna fälten tomma.
* Klicka på knappen "Upload".
### Output:
* Felmeddelandet "File field can not be empty. Please select a file." visas.

## Testfall 1.5, Ladda upp en ogiltig filtyp
Kontrollera så det bara går att ladda upp filer av typen .jpeg eller .gif.

### Input:
* Välj en fil av ogiltig typ.
* Klicka på "Upload".
### Output:
* Felmeddelandet "File type is invalid. Must be .jpeg or .gif." visas och det filen laddas inte upp. (Svårt att se utan att kolla databasen.)

## Testfall 1.6, Ladda upp en bild med script-taggar i beskrivningen
Kontrollera så att script-taggar inte körs.
### Input:
* Välj en bild.
* Fyll i <script>alert("Farligt!")</script> i description.
* Klicka på "Upload".
### Output:
* Sidan laddas om.
* Bilden högst upp i flödet.
* Under bilden står det "<script>alert("Farligt!")</script>"".
* (Kommer inte upp någon js alert-ruta).
