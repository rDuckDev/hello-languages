<?php

class Lexicon
{
    private string $dictionary_file;
    private SQLite3|null $dictionary;
    private array $lexicon;

    function __construct()
    {
        // open the dictionary, if possible
        $this->dictionary_file = "../data/dictionary.db";
        $this->dictionary = file_exists($this->dictionary_file)
            ? new SQLite3($this->dictionary_file)
            : null;

        // fill the lexicon using the dictionary, if possible
        $this->lexicon = $this->fill_lexicon();

        if (!is_null($this->dictionary))
            // close the dictionary, if necessary
            $this->dictionary->close();
    }

    private function fill_lexicon()
    {
        $lexicon = array();

        if (is_null($this->dictionary))
            // early return when the dictionary is inaccessible
            return $lexicon;

        $results = $this->dictionary->query("
            SELECT [Term]
            FROM [Lexicon];
        ");

        if (!$results)
            // early return when nothing is read from the dictionary
            return $lexicon;

        // populate the lexicon using each row read from the dictionary
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $lexicon[$row["Term"]] = true;
        }

        // return the lexicon populated by the dictionary
        return $lexicon;
    }

    public function get_terms()
    {
        return array_merge($this->lexicon);
    }
}
