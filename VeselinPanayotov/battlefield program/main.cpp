/*
 * Name: YOUR NAME
 * Project 2: Battleship
 * Course: CSI218 (Fall 2012)
 * Date: THE DATE
 * Description: Using class to represent Battleship field.
 */
#include <iostream>
#include <cctype>  // for toupper()
#include "battlefield.h"
using namespace std;


int main()
{
	BattleField field;
	char choice;
	int row, col;
	bool newGame = true;
	bool exitGame = false;

	cout << "Battleship Game:" << endl << endl;

	do
	{
		// Display field with successful bombs.
		cout << endl;
		field.display();

		// Allow user to enter position of ship.  Function occupy()
		// should validate that ship falls completely within a row
		// or column of the field.  If invalid, it returns false.
		if (newGame)
		{
			int startRow, startCol, endRow, endCol;

			do
			{
				cout << "\nEnter starting and ending row/column for ship" << endl;
				cout << "Example: 1 2 1 4"
					 << " (ship in row 1 from column 2 through 4)" << endl;
				cout << "\nStart/end row/col: ";

				cin >> startRow >> startCol >> endRow >> endCol;
			}
			while (!field.occupy(startRow, startCol, endRow, endCol));  // invalid?

			newGame = false;
		}

		// Play the game.
		cout << "\nOptions:\n";
		cout << "  b = bomb (row column)\n"
			 << "  s = start new game\n"
			 << "  x = exit\n"
			 << "Choice: ";
		cin >> choice;

		switch (tolower(choice))
		{
		case 'b':
			cin >> row >> col;
			if (field.bomb(row, col))
				cout << "Hit!" << endl;
			else
				cout << "Miss!" << endl;

			break;

		case 's':
			field.setup();  // clear the field to start new game
			newGame = true;
			break;

		case 'x':
			exitGame = true;
			break;
		}
	}
	while (!exitGame);

	cout << "\nExiting Battleship Game." << endl;

	return 0;
}
