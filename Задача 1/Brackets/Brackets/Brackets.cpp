#include <iostream>

int main() {
	while (true) {
		std::cout << "\nEnter an arithmetic expression:\n";
		std::string str;
		std::cin >> str;
		int uncorrect = 0, find = 0;

		for (int i = 0; i < str.length(); i++) {
			//т.к. начальной всегда является скобка '(', то поиск и отсчёт начинаем с неё
			if (str[i] == '(') {
				find++;
				uncorrect--;
			}
			//если найдены предполагаемые некорректные, с двух сторон "не закрытые", выражения, то это неверно
			if (find <= 0 && (str[i] == '(' || str[i] == ')')) {
				uncorrect++;
			}
			//"компенсация" - если выражение верно, то uncorrect == 0 и find == 0
			if (str[i] == ')') {
				find--;
				uncorrect++;
			}
		}
		(!uncorrect) ? std::cout << "It's correct \n" : std::cout << "It's mistake \n";		
	}
}
//по сути, весь поиск - это 2 счетчика