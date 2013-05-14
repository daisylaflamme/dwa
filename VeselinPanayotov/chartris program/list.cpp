/*
 * Name: Instructor
 * List Member Function Definitions
 * Course: CSI218 (Fall 2012)
 * Project: Chartris
 * Date: December 3, 2012
 * Description: List member function definitions.
 *				Implementation using dynamic array.
 */

#ifndef LIST_CPP
#define LIST_CPP

#include <iostream>
#include "list.h"
using namespace std;

// List member function definitions.

// Class stores index indicating where beginning is
// as well as number of elements stored in array.
// For example, given B through E currently stored
// in array (in list order):
//
// -----------------------------
// | D | E |   |   |   | B | C |
// -----------------------------
//   0   1   2   3   4   5   6
//
// beginIndex = 5
// numStored = 4
//
// Note that the array is treated as being circular.

// Constructor.
template<class T>
List<T>::List()
{
	elements = new T[MAX_SIZE];  // allocate dynamic array
	capacity = MAX_SIZE;
	beginIndex = 0;
	numStored = 0;
}

// Destructor.
template<class T>
List<T>::~List()
{
	delete [] elements;  // Deallocate dynamic array
	elements = NULL;     // Avoid dangling pointer
	capacity = 0;        // Reset other members
	beginIndex = 0;
	numStored = 0;
}

// Accessors

// Report whether empty.
template<class T>
bool List<T>::isEmpty() const
{
	//if (numStored == 0)	//check if the list is empty(T/F) 
	//	{
	//		return true;
	//	}

	//else
	//	return  false;
	return numStored == 0;
}

// Report whether full.
template<class T>
bool List<T>::isFull() const
{
	//if (numStored == capacity)	//check if the list is empty(T/F) 
	//	{
	//		return true;
	//	}

	//else
	//	return  false;
	return numStored == capacity;
}

template<class T>
T List<T>::retrieveAtBeginning() const
{
	if (numStored == 0)
	{
		cerr << "List empty: no value at beginning" << endl;
		return T();
	}
	
	// Return element at beginning.
	return elements[beginIndex];
}

// Mutators

// Add value to beginning.
template<class T>
void List<T>::addAtBeginning(const T &val)
{
	if (numStored == capacity)
	{
		cerr << "List full: cannot add value at beginning" << endl;
		return;
	}

	// Place new value at beginning of list, wrapping
	// around to end of array if necessary.
	beginIndex--;
	if (beginIndex < 0)
		beginIndex = capacity - 1;
	elements[beginIndex] = val;
	numStored++;
}

// Add value to end.
template<class T>
void List<T>::addAtEnd(const T &val)
{
	if (numStored == capacity)
	{
		cerr << "List full: cannot add value at end" << endl;
		return;
	}

	// Place new value at end of list, wrapping
	// around to beginning of array if necessary.
	int endIndex = (beginIndex + numStored) % capacity;
	elements[endIndex] = val;
	numStored++;
}

// Remove value at beginning.
template<class T>
void List<T>::removeAtBeginning()
{
	if (numStored == 0)
	{
		cerr << "List empty: cannot remove value at beginning" << endl;
		return;
	}

	// Remove element that is at beginning, wrapping
	// around to beginning of array if necessary
	// when advancing index of beginning element.
	beginIndex++;
	if (beginIndex >= capacity)
		beginIndex = 0;
	numStored--;
}

#endif