<?php
/**
 * @param string $input
 * @return int|null
 * @example
 * getConstituency("Bouches-du-Rhône (1e circonscription)") => 1
 * getConstituency("Candidat dans la 2e circonscription") => 2
 * @description
 * This function extracts the number of the constituency from a string.
 * It returns null if no constituency is found.
 * The constituency number is expected to be found between parentheses.
 * The number can be followed by "e", "er" or "ère".
 */
function getConstituency(string $input): ?int
{
    preg_match("/\((\d+)[eère]* circonscription\)/", $input, $matches);
    return isset($matches[1]) ? intval($matches[1]) : null;
}
