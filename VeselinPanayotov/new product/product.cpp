/*
 * Name:  Veselin Panayotov
 * Product Member Function Definitions
 * Course: CSI218 (Fall 2012)
 * Date: 09/18/2012
 * Description: Product member function definitions.
 */
#include <iostream>
#include <iomanip>  // for setprecision()
#include "product.h"
using namespace std;

// Product member function definitions.

// Constructors

Product::Product()  // default constructor
{
	id = "00-000-00";
	price = 0.00;
	taxable = false;
	newnumberinstore=0;
}

Product::Product(string newId,
				  double newPrice,
				  bool newTaxable,
				  int newnumberinstore)
{
	// Call member function "set" to initialize
	// data members.  Has one disadvantage: if
	// "newPrice" is not positive, "set" does
	// not initialize data members.
	// CHANGE (Replace the “set” member function with 3 member functions)
	setId(newId);
	setPrice(newPrice);
	setTaxable(newTaxable);
	setnewnumberinstore(newnumberinstore);
}

// Accessors

string Product::getId() const
{
	return id;
}

double Product::getPrice() const
{
	return price;
}

int Product::getnewnumberinstore() const
{
	return newnumberinstore;
}
void Product::output() const
{
	cout << "Id: " << id << endl
		<< "Price: $"
		<< fixed << setprecision(2)
		<< price << endl;

	if (taxable)
		cout << "Taxable";
	else
		cout << "Non-taxable"<<endl;
	     cout<<endl<<"newnumberinstore is :" 
			 <<newnumberinstore<<endl;
}

// Precondition: taxRate must be non-negative and represented
// as a decimal (e.g., 0.05 for 5%).
// Postcondition: Returns amount of tax based on price of
// product and given taxRate.
double Product::computeTax(double taxRate) const
{
	if (taxable)
		return price * taxRate;
	else
		return 0.0;
}

// Mutators

// Precondition: newPrice must be a positive number.
// CHANGE (Replace the “set” member function with 3 member functions)
void Product::setId(string newId)
{
  id = newId;
}
void Product::setPrice(double newPrice)
{	
	if (newPrice <= 0.0)
	{
		cerr << "Product price must be positive." << endl;
		return;
	}
 
		price = newPrice;
}
void Product::setTaxable(bool newTaxable)
{
		taxable = newTaxable;
}
void Product::setnewnumberinstore(int newnumberinstore)
{	
	if (newnumberinstore <= 0 || newnumberinstore>=100000)
	{
		cerr << "please check your enter." << endl;
		return;
	}
 
		newnumberinstore = newnumberinstore;
}