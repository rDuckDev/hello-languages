<?php

include_once "util.php";

/**
 * This class generates and stores all unique permutations of a word.
 */
class Permutations
{
    /** An associative array that holds all unique permutations of a word. */
    private array $permutations;

    /**
     * This constructor generates all unique permutations of a word.
     *
     * @param string $word The word for which permutations are generated.
     */
    function __construct(string $word)
    {
        // always initialize the permutations array
        $this->permutations = array();

        if ($this->is_valid_word($word))
            // find all permutations of the given word, if possible
            $this->permute($word, 0, strlen($word) - 1);
    }

    /**
     * This method checks whether permutations of a word are possible.
     *
     * @param string $word The word to validate.
     *
     * @return boolean True when permutations are possible, false otherwise.
     */
    private function is_valid_word(string $word)
    {
        return is_string($word)
            && strlen($word) >= 1;
    }

    /**
     * HT: https://www.geeksforgeeks.org/php-program-for-write-a-program-to-print-all-permutations-of-a-given-string/
     *
     * This function generates all permutations of a given string,
     * beginning at the head index, and ending at the tail index.
     *
     * @param string $str The string for which permutations are generated.
     * @param int $i_head The character index at which permutation begins.
     * @param int $i_tail The character index at which permutation ends.
     *
     * @return void
     */
    private function permute($str, $i_head, $i_tail)
    {
        if ($i_head == $i_tail) {
            // save all completed, unique permutations
            // to the permutations associative array
            $this->permutations[$str] = true;
        } else {
            // recursively swap each character of the string
            // until each permutation is completed
            for ($i = $i_head; $i <= $i_tail; $i++) {
                $str = swap($str, $i_head, $i);
                $this->permute($str, $i_head + 1, $i_tail);
                $str = swap($str, $i_head, $i);
            }
        }
    }

    /**
     * Returns an associative array containing all
     * unique permutations of a given word.
     *
     * @return array An associative array containing all
     * unique permutations of a given word.
     */
    public function get_permutations()
    {
        return array_merge($this->permutations);
    }
}
