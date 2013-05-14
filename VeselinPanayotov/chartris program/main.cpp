/*
 * Name: YOUR NAME
 * Product Project
 * Course: CSI218 (Fall 2012)
 * Project: Chartris
 * Date: December 3, 2012
 * Description: Using template class to represent queue:
 *				implemented using array (version 2).
 */
#include <iostream>
#include <iomanip>
#include <string>
#include <cstdlib>    // for rand()
#include "stack.cpp"  // Stack template class
#include "queue.cpp"  // Queue template class
using namespace std;

// Display the shape in the correct column and at the correct height.
void displayFallingShape(char item, int columnPos, int howHigh);

// Display what is on top of each column (if anything) and report
// the height of each column.
void displayColumns(Stack<char> columns[], int heights[], int numColumns);

int main()
{
	// The different shapes that may fall down.

	const int NUM_DIFF_SHAPES = 4;
	const char DIFF_SHAPES[NUM_DIFF_SHAPES] = { 'A', 'a', 'B', 'b' };

	// Range of heights from which shapes can start to fall.

	const int MIN_HIGH = 3;
	const int MAX_HIGH = 7;

	// Load queue randomly with shapes.  Order added to the
	// queue is order in which each falls.

	const int NUM_FALLING_SHAPES = 200;
	Queue<char> shapes;

	for (int i = 0; i < NUM_FALLING_SHAPES && !shapes.isFull(); i++)
		shapes.add(DIFF_SHAPES[rand() % NUM_DIFF_SHAPES]);

	// Columns on top of which shapes may accumulate.

	const int NUM_COLS = 4;
	Stack<char> columns[NUM_COLS];
	int heights[NUM_COLS] = { 0 };  // all zero initially

	// Running total of points for clearing columns.
	int score = 0;

	while (!shapes.isEmpty())
	{
		// Get next shape.
		char item = shapes.front();
		shapes.del();

		// Choose column above which shape starts to fall.
		int pos = rand() % NUM_COLS;

		// Choose from how high starts to fall.
		int high = MIN_HIGH + (rand() % (MAX_HIGH - MIN_HIGH + 1));

		// Whether the user chose to manually drop the shape on
		// top of the current column above which it is falling.
		bool dropped = false;

		// Allow moving shape (item) until manually dropped or
		// reaches highest column.

		while (!dropped)
		{
			cout << "\nScore: " << score << endl << endl;

			// Display shape above proper column at proper height.
			displayFallingShape(item, pos, high);

			// Display shape at top of each column and height of column.
			displayColumns(columns, heights, NUM_COLS);

			cout << "\nMove:" << endl
				 << "  L = left" << endl
				 << "  R = right" << endl
				 << "  D = drop" << endl
				 << "Choice: ";
			char choice;
			cin >> choice;

			switch (toupper(choice))
			{
			case 'D':
				dropped = true;
				break;

			case 'L':
				if (pos > 0)
					pos--;
				break;

			case 'R':
				if (pos < NUM_COLS - 1)
					pos++;
				break;

			default:
				cout << "Unknown move: " << choice << endl;
				break;
			}

			// Item falls down one level this turn.
			high--;

			if (!dropped && high == 0)
			{
				cout << "Item '" << item << "' automatically dropped." << endl;
				break;
			}
		}

		// Shape (item) has been manually or automatically dropped.
		// DETERMINE WHETHER FITS WITH SHAPE BELOW IT (IF ANY).  IF SO,
		// REMOVE THOSE SHAPES.  IF NOT, IT JUST GOES ON TOP OF COLUMN.


	}

	return 0;
}

// Display the shape in the correct column and at the correct height.
void displayFallingShape(char item, int columnPos, int howHigh)
{
	// Display shape (item) above proper column.
	cout << setw(columnPos * 6) << ""  // pad empty string with spaces
		 << item << endl;

	// Generate blank lines to represent height
	// above columns.
	for (int i = 0; i < howHigh; i++)
		cout << endl;
}

// Display what is on top of each column (if anything) and report
// the height of each column.
void displayColumns(Stack<char> columns[], int heights[], int numColumns)
{
	const char EMPTY = '-';

	for (int i = 0; i < numColumns; i++)
	{
		if (columns[i].isEmpty())
			cout << EMPTY;
		else
			cout << columns[i].top();

		cout << "(" << setw(2) << heights[i] << ") ";
	}

	cout << endl;
}
