/*
 * Name: YOUR NAME
 * Queue Member Function Definitions
 * Course: CSI218 (Fall 2012)
 * Project: Chartris
 * Date: December 3, 2012
 * Description: Queue member function definitions.
 *				Implementation using dynamic array.
 */

#ifndef QUEUE_CPP
#define QUEUE_CPP

#include <iostream>
#include "queue.h"
using namespace std;

// Queue member function definitions.

// Constructor.
template<class T>
Queue<T>::Queue()
{
	ListObj;
}

// Accessors

// Report whether empty.
template<class T>
bool Queue<T>::isEmpty() const
{
	
	return ListObj.isEmpty();
	//return 1;
}

// Report whether full.
template<class T>
bool Queue<T>::isFull() const
{
	return ListObj.isFull();
	//return 0;
}

// Give back value at front.
template<class T>
T Queue<T>::front() const
{
	return ListObj.retrieveAtBeginning();
}

// Mutators

// Add value to rear.
template<class T>
void Queue<T>::add(const T &val)
{
	ListObj.addAtEnd(val);

}

// Remove value at front.
template<class T>
void Queue<T>::del()
{
	ListObj.removeAtBeginning();
}

#endif