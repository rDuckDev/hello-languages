package main

import (
	"bufio"
	"fmt"
	"os"
	"sort"
	"strings"
)

const dictionaryPath string = "dictionary.txt"

func buildDictionary() map[string]struct{} {
	// HT: https://stackoverflow.com/a/34020023
	// create an empty "set" of dictionary terms
	dictionary := make(map[string]struct{})

	// attempt to open the dictionary file
	file, err := os.Open(dictionaryPath)
	if err != nil {
		// stop execution if the dictionary does not exist, or it cannot open
		fmt.Fprintf(os.Stderr, "Error: cannot open dictionary.")
		os.Exit(0)
	}
	defer file.Close()

	// read each line-delimited term from the dictionary
	// TODO: better error handling; as-is, an error can produce an empty/incomplete dictionary
	scanner := bufio.NewScanner(file)
	for scanner.Scan() {
		dictionary[scanner.Text()] = struct{}{}
	}

	return dictionary
}

func promptWord() string {
	var word string

	fmt.Print("Enter a word: ")
	fmt.Scan(&word)

	return strings.ToLower(word)
}

// HT: https://www.geeksforgeeks.org/python-ways-to-find-all-permutation-of-a-string/
func producePermutations(chars []rune, index int, length int, ch chan<- string) {
	if index == length {
		ch <- string(chars)
	} else {
		for i := index; i <= length; i++ {
			// HT: https://golangbyexample.com/swap-characters-string-golang/
			chars[index], chars[i] = chars[i], chars[index]
			producePermutations(chars, index+1, length, ch)
			chars[index], chars[i] = chars[i], chars[index]
		}
	}
	// close the channel after (recursively) producing all permutations
	if index == 0 {
		close(ch)
	}
}

func filterPermutations(dictionary map[string]struct{}, ch <-chan string) []string {
	permutations := make(map[string]bool)
	anagrams := []string{}

	for {
		// as each permutation is produced . . .
		candidate, isOpen := <-ch
		if isOpen {
			// save it, and mark whether it's present in the dictionary
			_, isPresent := dictionary[candidate]
			permutations[candidate] = isPresent
			continue
		}
		break
	}

	// after processing all permutations, filter out invalid words . . .
	for candidate, isWord := range permutations {
		if isWord {
			anagrams = append(anagrams, candidate)
		}
	}
	// and return all valid anagrams
	return anagrams
}

func printAnagrams(anagrams []string) {
	fmt.Println("Anagrams:")
	sort.Strings(anagrams)
	for _, word := range anagrams {
		fmt.Println(word)
	}
}

func main() {
	dictionary := buildDictionary()
	// HT: https://stackoverflow.com/a/24894202
	// use runes since Go strings are immutable
	word := []rune(promptWord())

	ch := make(chan string)
	go producePermutations(word, 0, len(word)-1, ch)
	anagrams := filterPermutations(dictionary, ch)
	printAnagrams(anagrams)
}
