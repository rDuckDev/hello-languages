package main

import (
	"fmt"
	"unicode"
)

const (
	runeSTX = 0x02 // start-of-text
	runeETX = 0x03 // end-of-text
)

type nodeChildren map[rune]*node

type node struct {
	value  rune // analogous to a character
	index  int  // analogous to a string index
	parent *node
	child  nodeChildren
}

type Trie struct {
	root *node
}

//*** Trie Functions ***//

func NewTrie() *Trie {
	root := newNode(runeSTX, -1, nil)
	return &Trie{root}
}

func (t *Trie) Insert(word string) {
	n := t.root
	for _, c := range word {
		r := unicode.ToLower(c)
		n.addChild(r)
		n = n.child[r]
	}
	n.addChild(runeETX)
}

// FindAll returns all words of the given (or greater) length within the given text.
func (t *Trie) FindAll(text string, length int) []string {
	matches := make(map[string]struct{})
	tries := make(map[int]*node)

	// process each rune of the given text in sequence
	for i, c := range text {
		r := unicode.ToLower(c)
		// create a new trie, when appropriate
		if t.root.hasChild(r) {
			tries[i] = t.root
		}
		// process each existing trie in sequence
		for ii, n := range tries {
			// remove the trie, if cannot advance
			if !n.hasChild(r) {
				delete(tries, ii)
				continue
			}
			// otherwise, advance the trie
			n = n.child[r]
			tries[ii] = n
			// then, check whether the given rune produced a match
			if n.isWord() && n.getLength() >= length {
				matches[n.getWord()] = struct{}{}
			}
		}
	}

	words := []string{}
	for word := range matches {
		words = append(words, word)
	}

	return words
}

func (t *Trie) PrintAll() {
	t.root.printAll()
}

//*** Node Functions ***//

func newNode(r rune, i int, p *node) *node {
	return &node{
		value:  r,
		index:  i,
		parent: p,
		child:  nil,
	}
}

func (n *node) addChild(r rune) {
	// create a set for child nodes, if necessary
	if n.child == nil {
		n.child = make(nodeChildren)
	}
	// create and append the given child, if necessary
	if _, has := n.child[r]; !has {
		if r == runeETX {
			n.child[r] = nil
		} else {
			n.child[r] = newNode(r, n.index+1, n)
		}
	}
}

func (n *node) hasChild(r rune) bool {
	_, has := n.child[r]
	return has
}

func (n *node) hasSTX() bool {
	return n.value == runeSTX
}

func (n *node) hasETX() bool {
	return n.hasChild(runeETX)
}

func (n *node) isWord() bool {
	return n.hasETX()
}

func (n *node) getWord() string {
	if !n.isWord() {
		return ""
	}

	word := make([]rune, n.getLength())

	c := n
	for !c.hasSTX() {
		word[c.index] = c.value
		c = c.parent
	}

	return string(word)
}

func (n *node) getLength() int {
	return n.index + 1
}

func (n *node) printAll() {
	if n.isWord() {
		fmt.Println(n.getWord())
	}
	for _, next := range n.child {
		if next != nil {
			next.printAll()
		}
	}
}
