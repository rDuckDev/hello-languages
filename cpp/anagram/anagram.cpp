#include <iostream>
#include <fstream>
#include <set>

using namespace std;

// Reads all known words from a dictionary file
// (based on the Ubuntu wamerican package) and
// returns the set containing those words.
set<string> getWords () {
	ifstream inputStream("dictionary.txt");
	set<string> wordSet;

	string word;
	while (inputStream >> word) {
		wordSet.insert(word);
	}

	return wordSet;
}

// Collects user input and enforces
// lower case for later comparisons.
string getInput () {
	string input;
	cin >> input;

	// Make user input lowercase for
	// dictionary comparisons.
	for (char &c : input) {
		c = tolower(c);
	}

	return input;
}

// Generates and adds all permutations of the given word to given set.
// 
// HT: https://www.techiedelight.com/find-permutations-given-string/
void getPermutations(string word, int head, int tail, set<string>* perm) {
	if (head == tail - 1) {
		(*perm).insert(word);
		return;
	}

	for (int current = head; current < tail; current++) {
		swap(word[head], word[current]);
		getPermutations(word, head + 1, tail, perm);
	}
}

int main (int argc, char *argv[]) {
	cout << "Loading dictionary, please wait...\n";
	set<string> wordSet = getWords();

	cout << "Enter a word: ";
	string baseWord = getInput();

	set<string> permutations;
	getPermutations(baseWord, 0, baseWord.length(), &permutations);

	// Assume there are no matches
	// until proven otherwise.
	bool hasAnagram = false;

	cout << "Anagrams: ";
	for ( string wordPerm : permutations ) {
		// Note: a word is allowed to be its own anagram
		// as long as it appears in the dictionary. This
		// is to distinguish the baseWord from fake works.
		if (wordSet.find(wordPerm) != wordSet.end()) {
			// Display valid anagrams.
			cout << wordPerm << " ";
			hasAnagram = true;
		}
	}
	cout << ( hasAnagram ? "\n" : "NONE\n" );

	return EXIT_SUCCESS;
}
