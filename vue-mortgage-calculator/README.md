# Kalkulator kredytu hipotecznego

Zbuduj prosty widget kalkulatora kredytu hipotecznego, który przyjmuje kwotę kredytu, oprocentowanie, okres kredytowania i oblicza miesięczną ratę kredytu, całkowitą kwotę spłaty oraz całkowity zapłacony odsetki.

## Wymagania

* Użytkownik powinien móc wprowadzić:
    * Kwotę kredytu ($)
    * Roczne oprocentowanie (%). Jest to również znane jako roczna stopa oprocentowania (APR)
    * Okres kredytowania (w latach)

* Używając tych danych wejściowych, kalkulator powinien obliczyć następujące wartości i wyświetlić wyniki użytkownikowi:
    * Miesięczna rata kredytu
    * Całkowita kwota spłaty
    * Całkowite zapłacone odsetki

## Wzór

Wzór do obliczania miesięcznej raty:

**M = P × (i(1+i)ⁿ) / ((1+i)ⁿ - 1)**

Gdzie:
* **M**: Miesięczna rata kredytu hipotecznego
* **P**: Kwota kredytu
* **i**: Miesięczne oprocentowanie (APR / 12)
* **n**: Całkowita liczba płatności (okres kredytowania w latach × 12)