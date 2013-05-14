

#include "stdafx.h"


#include<iostream>
using namespace std;

struct grades
{
    double total; 
		double quiz_value;
		double midterm_value;
		double final_value;
		double score_quiz;
		double score_quiz2;
		double score_midterm;
		double score_final; 
    
};

char letterGrade(double numericGrade);
void final_grade(grades& the_grades);

int main() 
{  
    grades data;

	final_grade(data); 

    double quiz_value, midterm_value, final_value;
	char letter;

    quiz_value = (data.score_quiz + data.score_quiz2)*(1.25) ;
    midterm_value =(data.score_midterm * .25);
    final_value = (data.score_final * .50);
    data.total = (quiz_value + midterm_value + final_value);
    letter = letterGrade(data.total);

    
    cout << "The accumlative score is: "
         << data.total << endl; 
	cout << "Final Letter Grade is :"<< letter << endl;

    return 0;
}

void final_grade(grades& the_grades)

{

cout << "Enter the score of the quiz one: ";
cin >> the_grades.score_quiz;

cout << "Enter the score of the quiz two: "; 
cin >> the_grades.score_quiz2;
cout << "Enter the score of the midterm: ";
cin >> the_grades.score_midterm;
cout << "Enter the score of the final: ";
cin >> the_grades.score_final;

}


char letterGrade (double numericGrade)
{
  char letter;

  if (numericGrade < 60)
    letter = 'F';
  else if (numericGrade < 70)
    letter = 'D';
  else if (numericGrade < 80)
    letter = 'C';
  else if (numericGrade < 90)
    letter = 'B';
  else
    letter = 'A';

  return letter;
}
