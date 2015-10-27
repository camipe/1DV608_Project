# Bildflöde
## Vision
Min vision för projektet var att skapa en anonym bilduppladningssida där alla bilder presenteras i ett gemensamt flöde.
## Krav
### Funktionalitet

1. Uppladdade bilder presenteras sorterade yngst först.
2. Användare ska kunna ladda upp egna bilder.
3. Bilder kan ha korta textbeskrivningar (frivilligt).

###3 Säkerhet

1. Bilder ska valideras innan de laddas upp.
2. Bildbeskrivningar ska saniteras innan de laddas upp.

## Instruktioner

## Användarfall

### UC1 Ladda upp en bild
#### Huvudscenario
1. Startar när användaren vill ladda upp en bild.
2. Systemet tillhandahåller ett förmulär för att ladda upp en bild.
3. Användaren väljer en bild att ladda upp och klickar på en "ladda upp"-knapp.
4. Sidan laddas om och den nya bilden presenteras högst upp i flödet.

#### Alternativt scenario
* 3a. Något går fel under uppladdningen.
..1. Användaren får ett meddelande om att något gått fel och eventuellt hur den kan åtgärda felet.

### UC2 Ladda upp en bild med en beskrivning
#### Huvudscenario
1. Startar när användaren vill ladda upp en bild och en beskrivning.
2. Systemet tillhandahåller ett förmulär för att ladda upp en bild och en kortare text.
3. Användaren väljer en bild att ladda upp samt fyller i en beskrivning i textrutan och klickar på en "ladda upp"-knapp.
4. Sidan laddas om och den nya bilden med beskrivning presenteras högst upp i flödet.

#### Alternativt scenario
* 3a. Något går fel under uppladdningen.
..1. Användaren får ett meddelande om att något gått fel och eventuellt hur den kan åtgärda felet.

### UC3 Se bilder som laddas upp
#### Huvudscenario
1. Startar när användaren kommit till sidan.
2. Alla bilder som laddats upp presenteras i ett flöde på sidan.

#### Alternativt scenario
* 2a. Det finns inga uppladdade bilder.
..1. Användaren går till UC1 eller UC2.