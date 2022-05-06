/* 26. Program sprawdza czy liczba jest liczba doskonałą. */
//Liczba doskonała jest liczbą naturalną, która jest równa sumie wszystkich 
// swoich naturalnych dzielników właściwych.
#include <iostream>
#include <cmath>
#include <cstdlib>
#include <ctime>

using namespace std;

int main() {
    int liczba = 0, dzielniki = 0;
    cin >> liczba;
    for(int i = 1; i < liczba; i++){
        if(liczba % i == 0){
            dzielniki += i;
        }
    }
    if(dzielniki == liczba)
        cout << "Liczba jest doskonala!";
    else
        cout << "Liczba nie jest doskonala!";
  return 0;
}
//zrobione