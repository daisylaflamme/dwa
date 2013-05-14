/*
 * Name: YOUR NAME
 * BattleField Class Member Function Definitions
 * Course: CSI218 (Fall 2012)
 * Date: THE DATE
 * Description: FILL IN A DESCRIPTION.
 */

#include <iostream>
#include "battlefield.h"
using namespace std;

// Definitions for template class member functions.

BattleField::BattleField()
{
	setup();
}

// Display field (with any successfully-bombed locations)
// to standard output.
void BattleField::display() const
{
	int i, j;

	// Display header with col numbers.

	cout << "  ";

	for (j = 0; j < FIELD_SIZE; j++)
	{
		cout << (j+1) << " ";
	}

	cout << endl;

	// Nested loop to display all positions
	// in the field.

	for (i = 0; i < FIELD_SIZE; i++)
	{
		cout << (i+1);  // display row number

		for (j = 0; j < FIELD_SIZE; j++)
		{
			cout << " ";
			cout << field[i][j];  // value of position
		}

		cout << endl;  // each row on own line
	}
}

// Bomb the specified position.
//
// Precondition: row and column passed should be
// numbered starting with 1 (not zero) and be within the
// limited size of the field.
bool BattleField::bomb(int row, int col)
{
	if (!validRowCol(row, col))
	{
		cerr << "Cannot bomb location ("
			<< row << ", " << col << "): outside field"
			<< endl;
		return false;
	}

	// ADD CODE TO MARK POSITION AS SUCCESSFULLY "BOMBED",
	// BUT ONLY IF IT IS "OCCUPIED".  Recall that row/col
	// passed are 1-based, but array indices are zero-based.


	return false;
}

// Place target in the field.  I.e., the target should span
// the field from the start row/col to the end row/col.
//
// Precondition: rows and columns passed should be
// numbered starting with 1 (not zero) and be within the
// limited size of the field.  Also, the start and ending
// row/col should be contained within a single row or column
// in the field (no diagonals).
bool BattleField::occupy(int startRow, int startCol, int endRow, int endCol)
{

	return false;
}

// Reset the field for a new game.
void BattleField::setup()
{
	int i, j;

	// Mark all positions as free.
	for (i = 0; i < FIELD_SIZE; i++)
		for (j = 0; j < FIELD_SIZE; j++)
			field[i][j] = FREE;
}

// Valid if row/col are at least 1 (not zero) and within the
// limited size of the field.
bool BattleField::validRowCol(int row, int col) const
{
	// ADD CODE TO VALIDATE 1-BASED INDICES.
	return false;
}
