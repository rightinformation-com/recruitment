## Zadanie
W repozytorium znajduje się implementacja API koszyka zakupowego. Twoim zadaniem jest naprawa błędu w zliczaniu produktów oraz dodanie nowej funkcjonalności do obliczania całkowitej wagi produktów w koszyku.

### Istniejąca Implementacja
Obecna implementacja zawiera:
- Model `Product` z polami: name, price, quantity, weight
- Model `Cart` do zarządzania koszykiem zakupowym
- Model `CartItem` do reprezentowania pozycji w koszyku
- Migracje dla tabel `products`, `carts` i `cart_items`
- Kontroler `CartController` z metodami do zarządzania koszykiem
- Trasy API w pliku `routes/api.php`

### Wymagania

#### Zadanie 1: Naprawa Błędu
W obecnej implementacji koszyk zlicza liczbę pozycji w koszyku (liczbę wierszy), zamiast sumować ilość wszystkich produktów w koszyku. Twoim zadaniem jest naprawienie tego błędu.

#### Zadanie 2: Rozszerzenie Funkcjonalności
Zaimplementuj metodę `getTotalWeight()` w modelu `Cart`, która będzie zwracać sumę wagi wszystkich produktów w koszyku.
