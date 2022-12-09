package main

import (
	"bufio"
	"fmt"
	"os"
	"sort"
	"strings"
)

const dictionaryPath string = "dictionary.txt"

func buildDictionary() *Trie {
	dictionary := NewTrie()

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
		dictionary.Insert(scanner.Text())
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

func filterPermutations(dictionary *Trie, ch <-chan string) []string {
	matches := make(map[string]struct{})
	anagrams := []string{}

	for {
		// as each permutation is produced . . .
		if text, ok := <-ch; ok {
			// check for any anagrams (including substrings)
			for _, match := range dictionary.FindAll(text, 3) {
				matches[match] = struct{}{}
			}
			continue
		}
		break
	}

	// after processing all permutations, return a list of anagrams
	for word := range matches {
		anagrams = append(anagrams, word)
	}
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
