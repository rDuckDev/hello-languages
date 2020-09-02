#!/usr/bin/env python3
import itertools


# Returns a set of valid words from a dictionary file,
# which is based on the Ubuntu wamerican package.
def load_dictionary():
    print("Loading dictionary, please wait...")
    f = open("dictionary.txt")
    dictionary = set([word.strip() for word in f.readlines()])
    f.close()
    return dictionary


# Reads user input as a lowercase string.
def get_word():
    word = ""
    while word == "":
        word = input("Enter a word: ")
    return word.lower()


# Given a word and a dictionary (as a set of words),
# this function returns all permutations of the word
# that are valid within the given dictionary.
def get_anagrams(word, dictionary):
    anagrams = set([])
    permutations = set(["".join(perm) for perm in itertools.permutations(word)])
    for perm in permutations:
        if perm != word and perm in dictionary:
            anagrams.add(perm)
    return anagrams


def main():
    dictionary = load_dictionary()
    word = get_word()
    anagrams = get_anagrams(word, dictionary)
    print("Anagrams: %s" % (", ".join(anagrams) or "none"))


if __name__ == "__main__":
    main()
