/*
 * Name: YOUR NAME
 * Stack Member Function Definitions
 * Course: CSI218 (Fall 2012)
 * Project: Chartris
 * Date: December 3, 2012
 * Description: Stack member function definitions.
 *				Implementation using dynamic array.
 */

#ifndef STACK_CPP
#define STACK_CPP

#include <iostream>
#include "stack.h"
using namespace std;

// Stack member function definitions.

// Constructor.
template<class T>
Stack<T>::Stack()
{
	ListObj;
}

// Accessors

// Report whether empty.
template<class T>
bool Stack<T>::isEmpty() const
{
	return ListObj.isEmpty();
	//return 1;
}

// Report whether full.
template<class T>
bool Stack<T>::isFull() const
{
	return ListObj.isFull();
	//return 0;
}

// Give back value on top.
template<class T>
T Stack<T>::top() const
{
	return ListObj.retrieveAtBeginning();
	//return T();
}

// Mutators

// Add value to top.
template<class T>
void Stack<T>::push(const T &val)
{
	ListObj.addAtBeginning(val);
}

// Remove value on top.
template<class T>
void Stack<T>::pop()
{
	ListObj.removeAtBeginning();
}

#endif