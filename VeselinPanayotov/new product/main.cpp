/*
 * Name:  Veselin Panayotov 
 * Project 1: New Product
 * Course: CSI218 (Fall 2012)
 * Date: 09/18/2012
 * Description: Using class to represent products.
 */
#include <iostream>
#include "product.h"
using namespace std;


int main()
{
	// Declare objects (variables) of class type Product.
	Product product1;
	Product product2("99-999-99", 1.00, true,36);

	// Set data members by calling member function.
	product1.setId("45-667-10");
	product1.setPrice(5.99);	// CHANGE: setting a particular data member individually
	product1.setTaxable(true);	// CHANGE: setting a particular data member individually
	product1.setnewnumberinstore(36);	// CHANGE : setting a particular data member individually
	cout << "product1:" << endl;
	product1.output();
	cout << endl << endl;

	// Test passing improper value for price (zero).
	product2.setId("12-900-34");	
	product2.setPrice(0.00);	// CHANGE: setting a particular data member individually
	product2.setTaxable(false);	// CHANGE: setting a particular data member individually
	product2.setnewnumberinstore(37);	// CHANGE: setting a particular data member individually

	cout << "product2:" << endl;
	product2.output();
	cout << endl;

	// Output floating-point numbers to 2 decimal places.
	cout.setf(ios::fixed);
	cout.setf(ios::showpoint);
	cout.precision(2);

	// Compute tax on product for given tax rate.
	cout << "\nTax on product1 at rate of 6.25%: $"
		 << product1.computeTax(0.0625)
		 << endl;

	// Change data members via member function (access original
	// values using "get" member functions).
	product1.setId(product1.getId());
	product1.setPrice(product1.getPrice());	// CHANGE: setting a particular data member individually
	product1.setTaxable(false);			    // CHANGE: setting a particular data member individually
	product1.setnewnumberinstore(product1.getnewnumberinstore()); // CHANGE: setting a particular data member individually
	cout << "\nproduct1 (no longer taxable):" << endl;
	product1.output();
	cout << endl;

	// Compute tax on product for given tax rate.
	cout << "\nTax on product1 is now: $"
		 << product1.computeTax(0.0625)
		 << endl;

	// Test passing improper value for price (zero).
	cout << "\nproduct2:" << endl;
	product2.setId("12-900-34");
	product2.setPrice(0.00);	// CHANGE: setting a particular data member individually
	product2.setTaxable(false); // CHANGE: setting a particular data member individually
	product2.setnewnumberinstore(9999999); // CHANGE: setting a particular data member individually
	product2.output();
	cout << endl;

	return 0;
}
